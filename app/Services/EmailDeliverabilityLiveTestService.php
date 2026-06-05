<?php

namespace App\Services;

use App\Models\EmailDeliverabilityTest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use RuntimeException;

class EmailDeliverabilityLiveTestService
{
    public function createTest(array $input, array $config): EmailDeliverabilityTest
    {
        $inboxDomain = $this->normalizeInboxDomain((string) ($config['test_inbox_address'] ?? ''));

        if ($inboxDomain === '') {
            throw new RuntimeException('The live deliverability inbox domain is not configured yet.');
        }

        $driver = trim((string) ($config['driver'] ?? 'imap')) ?: 'imap';

        if ($driver === 'imap') {
            foreach (['imap_host', 'imap_port', 'imap_username', 'imap_password'] as $key) {
                if (trim((string) ($config[$key] ?? '')) === '') {
                    throw new RuntimeException('The IMAP mailbox settings are incomplete for live email testing.');
                }
            }
        }

        if ($driver === 'postmark' && trim((string) ($config['postmark_webhook_token'] ?? '')) === '') {
            throw new RuntimeException('The Postmark webhook token is missing for live email testing.');
        }

        $target = trim((string) ($input['input'] ?? ''));
        $senderAddress = filter_var($target, FILTER_VALIDATE_EMAIL) ? strtolower($target) : null;
        $domain = $senderAddress ? substr(strrchr($senderAddress, '@') ?: '', 1) : strtolower($target);
        $sendingDomain = trim((string) ($input['sendingDomain'] ?? ''));

        $publicId = (string) Str::ulid();
        $subjectToken = strtoupper(Str::random(8));
        $localToken = strtolower(Str::random(10));
        $baseSubject = trim((string) ($input['subject'] ?? '')) ?: 'Deliverability test message';
        $expectedSubject = $baseSubject;
        $recipient = $localToken . '@' . $inboxDomain;

        return EmailDeliverabilityTest::query()->create([
            'public_id' => $publicId,
            'subject_token' => $subjectToken,
            'source_driver' => $driver,
            'status' => 'pending',
            'input' => $target,
            'normalized_domain' => strtolower($domain),
            'sender_address' => $senderAddress,
            'sending_domain' => $sendingDomain !== '' ? strtolower($sendingDomain) : null,
            'check_type' => trim((string) ($input['checkType'] ?? 'full')),
            'client_target' => trim((string) ($input['clientTarget'] ?? 'all')),
            'esp' => trim((string) ($input['esp'] ?? 'unknown')),
            'volume' => trim((string) ($input['volume'] ?? 'low')),
            'test_recipient' => strtolower($recipient),
            'expected_subject' => $expectedSubject,
            'meta' => [
                'created_from' => 'public_tool',
                'inbox_domain' => $inboxDomain,
            ],
        ]);
    }

    public function pollAndProcess(
        EmailDeliverabilityTest $test,
        array $config,
        EmailDeliverabilityService $deliverabilityService,
        array $aiConfig,
        AiService $aiService
    ): EmailDeliverabilityTest {
        if (in_array($test->status, ['completed', 'failed'], true)) {
            return $test->fresh() ?? $test;
        }

        if ($test->source_driver !== 'imap') {
            return $test;
        }

        $message = $this->pullFromImap($test, $config);

        if ($message === null) {
            return $test;
        }

        return $this->processCapturedMessage($test, $message, $config, $deliverabilityService, $aiConfig, $aiService);
    }

    public function captureFromPostmark(
        array $payload,
        string $routeToken,
        array $config,
        EmailDeliverabilityService $deliverabilityService,
        array $aiConfig,
        AiService $aiService
    ): ?EmailDeliverabilityTest {
        $configuredToken = trim((string) ($config['postmark_webhook_token'] ?? ''));

        if ($configuredToken === '' || ! hash_equals($configuredToken, $routeToken)) {
            throw new RuntimeException('Invalid Postmark webhook token.');
        }

        $subject = trim((string) ($payload['Subject'] ?? ''));
        $toAddress = $this->postmarkToAddress($payload);

        $test = EmailDeliverabilityTest::query()
            ->where('test_recipient', strtolower((string) $toAddress))
            ->where('status', 'pending')
            ->latest('id')
            ->first();

        if (! $test) {
            $subjectToken = $this->extractSubjectToken($subject);

            if ($subjectToken !== null) {
                $test = EmailDeliverabilityTest::query()
                    ->where('subject_token', $subjectToken)
                    ->where('status', 'pending')
                    ->latest('id')
                    ->first();
            }
        }

        if (! $test) {
            return null;
        }

        $message = [
            'subject' => $subject,
            'from_address' => $this->postmarkFromAddress($payload),
            'from_name' => $this->postmarkFromName($payload),
            'to_address' => $toAddress,
            'headers' => $this->flattenPostmarkHeaders($payload['Headers'] ?? []),
            'authentication_results' => $this->postmarkHeaderValue($payload['Headers'] ?? [], 'Authentication-Results'),
            'text_body' => trim((string) ($payload['TextBody'] ?? '')),
            'html_body' => trim((string) ($payload['HtmlBody'] ?? '')),
            'provider_message_id' => trim((string) ($payload['MessageID'] ?? '')),
            'source_message_uid' => null,
            'received_at' => Carbon::now(),
        ];

        return $this->processCapturedMessage($test, $message, $config, $deliverabilityService, $aiConfig, $aiService);
    }

    private function pullFromImap(EmailDeliverabilityTest $test, array $config): ?array
    {
        $stream = @imap_open(
            $this->imapMailboxPath($config),
            (string) ($config['imap_username'] ?? ''),
            (string) ($config['imap_password'] ?? '')
        );

        if (! $stream) {
            throw new RuntimeException('Could not connect to the configured IMAP mailbox.');
        }

        try {
            $uids = imap_search($stream, 'TO "' . addslashes($test->test_recipient) . '"', SE_UID) ?: [];

            if ($uids === []) {
                $uids = imap_search($stream, 'TEXT "' . addslashes($test->test_recipient) . '"', SE_UID) ?: [];
            }

            if ($uids === [] && $test->subject_token !== '') {
                $uids = imap_search($stream, 'SUBJECT "' . addslashes($test->subject_token) . '"', SE_UID) ?: [];
            }

            if ($uids === []) {
                return null;
            }

            rsort($uids);
            $uid = (string) $uids[0];
            $messageNo = imap_msgno($stream, (int) $uid);
            $headers = (string) imap_fetchheader($stream, $messageNo, FT_PREFETCHTEXT);
            $body = (string) imap_body($stream, $messageNo, FT_PEEK);
            $overview = imap_fetch_overview($stream, $uid, FT_UID);
            $parsedHeaders = @imap_rfc822_parse_headers($headers);

            $message = [
                'subject' => isset($overview[0]->subject) ? imap_utf8((string) $overview[0]->subject) : $test->expected_subject,
                'from_address' => $this->parsedAddress($parsedHeaders->from ?? []),
                'from_name' => $this->parsedName($parsedHeaders->from ?? []),
                'to_address' => $this->parsedAddress($parsedHeaders->to ?? []),
                'headers' => $headers,
                'authentication_results' => $this->headerBlockValue($headers, 'Authentication-Results'),
                'text_body' => trim($body),
                'html_body' => null,
                'provider_message_id' => property_exists($parsedHeaders, 'message_id') ? trim((string) $parsedHeaders->message_id, '<>') : null,
                'source_message_uid' => $uid,
                'received_at' => Carbon::now(),
            ];

            if ((bool) ($config['auto_delete'] ?? true)) {
                imap_delete($stream, (string) $messageNo);
                imap_expunge($stream);
                $message['auto_deleted_at'] = Carbon::now();
            }

            return $message;
        } finally {
            imap_close($stream);
        }
    }

    private function processCapturedMessage(
        EmailDeliverabilityTest $test,
        array $message,
        array $config,
        EmailDeliverabilityService $deliverabilityService,
        array $aiConfig,
        AiService $aiService
    ): EmailDeliverabilityTest {
        $result = $deliverabilityService->analyzeLiveTest([
            'input' => $test->input,
            'checkType' => $test->check_type,
            'clientTarget' => $test->client_target,
            'esp' => $test->esp,
            'volume' => $test->volume,
            'sendingDomain' => $test->sending_domain,
            'subject' => $message['subject'] ?: $test->expected_subject,
        ], $message, $aiConfig, $aiService);

        $test->forceFill([
            'status' => 'completed',
            'received_to_address' => $message['to_address'] ?? null,
            'received_from_address' => $message['from_address'] ?? null,
            'received_from_name' => $message['from_name'] ?? null,
            'provider_message_id' => $message['provider_message_id'] ?? null,
            'source_message_uid' => $message['source_message_uid'] ?? null,
            'raw_headers' => $message['headers'] ?? null,
            'authentication_results' => $message['authentication_results'] ?? null,
            'raw_text' => $message['text_body'] ?? null,
            'raw_html' => $message['html_body'] ?? null,
            'report' => $result['data'],
            'received_at' => $message['received_at'] ?? Carbon::now(),
            'processed_at' => Carbon::now(),
            'auto_deleted_at' => $message['auto_deleted_at'] ?? null,
            'meta' => array_merge($test->meta ?? [], [
                'summary_provider' => $result['provider'],
                'source_driver' => $test->source_driver,
            ]),
        ])->save();

        return $test->fresh() ?? $test;
    }

    private function imapMailboxPath(array $config): string
    {
        $host = trim((string) ($config['imap_host'] ?? ''));
        $port = (int) ($config['imap_port'] ?? 993);
        $folder = trim((string) ($config['imap_folder'] ?? 'INBOX')) ?: 'INBOX';
        $encryption = trim((string) ($config['imap_encryption'] ?? 'ssl'));

        $flags = match ($encryption) {
            'tls' => '/imap/tls/novalidate-cert',
            'none' => '/imap/notls',
            default => '/imap/ssl/novalidate-cert',
        };

        return '{' . $host . ':' . $port . $flags . '}' . $folder;
    }

    private function extractSubjectToken(string $subject): ?string
    {
        if (preg_match('/\[I2MTEST\s+([A-Z0-9]{8})\]/i', $subject, $matches) === 1) {
            return strtoupper($matches[1]);
        }

        return null;
    }

    private function normalizeInboxDomain(string $value): string
    {
        $value = strtolower(trim($value));

        if ($value === '') {
            return '';
        }

        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return strtolower(substr(strrchr($value, '@') ?: '', 1));
        }

        return trim(preg_replace('/^https?:\/\//', '', $value) ?? $value, "/ \t\n\r\0\x0B");
    }

    private function parsedAddress(array $addresses): ?string
    {
        $first = $addresses[0] ?? null;

        if (! is_object($first) || empty($first->mailbox) || empty($first->host)) {
            return null;
        }

        return strtolower($first->mailbox . '@' . $first->host);
    }

    private function parsedName(array $addresses): ?string
    {
        $first = $addresses[0] ?? null;

        if (! is_object($first)) {
            return null;
        }

        $personal = trim((string) ($first->personal ?? ''));

        return $personal !== '' ? $personal : null;
    }

    private function headerBlockValue(string $headers, string $name): ?string
    {
        $pattern = '/^' . preg_quote($name, '/') . ':\s*(.+(?:\R[ \t].+)*)/mi';

        if (preg_match($pattern, $headers, $matches) !== 1) {
            return null;
        }

        return preg_replace("/\R[ \t]+/", ' ', trim($matches[1])) ?: null;
    }

    private function flattenPostmarkHeaders(array $headers): string
    {
        $lines = [];

        foreach ($headers as $header) {
            $name = trim((string) ($header['Name'] ?? ''));
            $value = trim((string) ($header['Value'] ?? ''));

            if ($name !== '' && $value !== '') {
                $lines[] = $name . ': ' . $value;
            }
        }

        return implode("\r\n", $lines);
    }

    private function postmarkHeaderValue(array $headers, string $name): ?string
    {
        foreach ($headers as $header) {
            if (strcasecmp((string) ($header['Name'] ?? ''), $name) === 0) {
                return trim((string) ($header['Value'] ?? '')) ?: null;
            }
        }

        return null;
    }

    private function postmarkFromAddress(array $payload): ?string
    {
        $fromFull = $payload['FromFull'] ?? null;

        if (is_array($fromFull) && ! empty($fromFull['Email'])) {
            return strtolower((string) $fromFull['Email']);
        }

        if (! empty($payload['From'])) {
            if (preg_match('/<([^>]+)>/', (string) $payload['From'], $matches) === 1) {
                return strtolower($matches[1]);
            }

            return strtolower(trim((string) $payload['From']));
        }

        return null;
    }

    private function postmarkFromName(array $payload): ?string
    {
        $fromFull = $payload['FromFull'] ?? null;

        if (is_array($fromFull) && ! empty($fromFull['Name'])) {
            return trim((string) $fromFull['Name']);
        }

        return null;
    }

    private function postmarkToAddress(array $payload): ?string
    {
        $toFull = $payload['ToFull'] ?? null;

        if (is_array($toFull) && isset($toFull[0]['Email']) && $toFull[0]['Email'] !== '') {
            return strtolower((string) $toFull[0]['Email']);
        }

        if (! empty($payload['To'])) {
            if (preg_match('/<([^>]+)>/', (string) $payload['To'], $matches) === 1) {
                return strtolower($matches[1]);
            }

            return strtolower(trim((string) $payload['To']));
        }

        return null;
    }
}
