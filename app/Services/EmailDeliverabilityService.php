<?php

namespace App\Services;

use RuntimeException;

class EmailDeliverabilityService
{
    private const CHECK_WEIGHTS = [
        'dns' => 12,
        'spf' => 16,
        'dkim' => 16,
        'dmarc' => 16,
        'blacklist' => 16,
        'content' => 10,
        'reputation' => 14,
    ];

    private const DKIM_SELECTORS = [
        'default',
        'selector1',
        'selector2',
        'google',
        'k1',
        'k2',
        's1',
        's2',
        'dkim',
        'mail',
        'smtp',
        'mandrill',
        'pm',
        'postmark',
        'amazonses',
    ];

    private const ESP_SELECTORS = [
        'mailchimp' => ['k1', 'k2', 'mandrill', 'dkim'],
        'sendgrid' => ['s1', 's2'],
        'ses' => ['amazonses', 'default'],
        'postmark' => ['pm', 'postmark', 'default'],
        'zoho' => ['zoho', 'default'],
        'unknown' => [],
    ];

    private const PROVIDER_PATTERNS = [
        'zoho' => ['zoho.'],
        'google-workspace' => ['google.com', 'googlemail.com', 'aspmx.l.google.com'],
        'microsoft-365' => ['protection.outlook.com', 'outlook.com'],
        'postmark' => ['postmark', 'mtasv.net'],
        'sendgrid' => ['sendgrid.net'],
        'amazon-ses' => ['amazonses.com'],
        'mailchimp' => ['servers.mcsv.net', 'mandrillapp.com', 'mailchimp.com'],
    ];

    private const DNSBLS = [
        'zen.spamhaus.org' => 'Spamhaus ZEN',
        'bl.spamcop.net' => 'SpamCop',
    ];

    public function analyze(array $input, array $aiConfig, AiService $aiService): array
    {
        $context = $this->prepareContext($input);
        $email = $context['email'];
        $domain = $context['domain'];
        $subject = $context['subject'];

        $dnsCheck = $this->buildDnsCheck(
            $domain,
            $context['mailDomain'],
            $context['orgDomain'],
            $context['aRecords'],
            $context['aaaaRecords'],
            $context['mxRecords'],
            $context['txtRecords'],
            $context['providerContext']
        );
        $spfCheck = $this->buildSpfCheck($domain, $context['mailDomain'], $context['orgDomain'], $context['mailTxtRecords']);
        $dkimCheck = $this->buildDkimCheck($domain, $context['mailDomain'], $context['esp']);
        $dmarcCheck = $this->buildDmarcCheck($domain, $context['orgDomain']);
        $blacklistCheck = $this->buildBlacklistCheck($context['resolvedIps'], $context['providerContext']);
        $contentCheck = $this->buildContentCheck($subject, (string) ($input['checkType'] ?? 'full'));
        $reputationCheck = $this->buildReputationCheck(
            $domain,
            $context['resolvedIps'],
            $spfCheck['status'],
            $dkimCheck['status'],
            $dmarcCheck['status'],
            $blacklistCheck['status'],
            (string) ($input['volume'] ?? 'low'),
            (string) ($input['clientTarget'] ?? 'all'),
            $context['providerContext']
        );

        return $this->compileReport($email, $domain, $subject, $checks = [
            $dnsCheck,
            $spfCheck,
            $dkimCheck,
            $dmarcCheck,
            $blacklistCheck,
            $contentCheck,
            $reputationCheck,
        ], $aiConfig, $aiService, $context['providerContext']);
    }

    public function analyzeLiveTest(array $input, array $message, array $aiConfig, AiService $aiService): array
    {
        $context = $this->prepareContext($input);
        $email = $message['from_address'] ?? $context['email'];
        $subject = trim((string) ($message['subject'] ?? $context['subject']));
        $auth = $this->parseAuthSignals((string) ($message['authentication_results'] ?? ''), (string) ($message['headers'] ?? ''));

        $dnsCheck = $this->buildDnsCheck(
            $context['domain'],
            $context['mailDomain'],
            $context['orgDomain'],
            $context['aRecords'],
            $context['aaaaRecords'],
            $context['mxRecords'],
            $context['txtRecords'],
            $context['providerContext']
        );
        $spfCheck = $this->buildLiveSpfCheck($context['domain'], $context['mailDomain'], $context['orgDomain'], $context['mailTxtRecords'], $auth);
        $dkimCheck = $this->buildLiveDkimCheck($context['domain'], $context['mailDomain'], $context['esp'], $auth, (string) ($message['headers'] ?? ''));
        $dmarcCheck = $this->buildLiveDmarcCheck($context['domain'], $context['orgDomain'], $auth);
        $blacklistCheck = $this->buildBlacklistCheck($context['resolvedIps'], $context['providerContext']);
        $contentCheck = $this->buildContentCheck($subject, (string) ($input['checkType'] ?? 'full'));
        $reputationCheck = $this->buildReputationCheck(
            $context['domain'],
            $context['resolvedIps'],
            $spfCheck['status'],
            $dkimCheck['status'],
            $dmarcCheck['status'],
            $blacklistCheck['status'],
            (string) ($input['volume'] ?? 'low'),
            (string) ($input['clientTarget'] ?? 'all'),
            $context['providerContext']
        );

        return $this->compileReport($email, $context['domain'], $subject, $checks = [
            $dnsCheck,
            $spfCheck,
            $dkimCheck,
            $dmarcCheck,
            $blacklistCheck,
            $contentCheck,
            $reputationCheck,
        ], $aiConfig, $aiService, $context['providerContext']);
    }

    private function prepareContext(array $input): array
    {
        $target = strtolower(trim((string) ($input['input'] ?? '')));
        $target = preg_replace('/^https?:\/\//', '', $target) ?? $target;
        $target = trim($target, "/ \t\n\r\0\x0B");

        if ($target === '') {
            throw new RuntimeException('Enter an email address or domain.');
        }

        $email = filter_var($target, FILTER_VALIDATE_EMAIL) ? $target : null;
        $domain = $email ? substr(strrchr($email, '@') ?: '', 1) : $target;

        if (! $domain || ! preg_match('/^[a-z0-9.-]+\.[a-z]{2,}$/i', $domain)) {
            throw new RuntimeException('Enter a valid email address or domain.');
        }

        $domain = strtolower($domain);
        $mailDomain = strtolower(trim((string) ($input['sendingDomain'] ?? ''))) ?: $domain;
        $mailDomain = preg_replace('/^https?:\/\//', '', $mailDomain) ?? $mailDomain;
        $mailDomain = trim($mailDomain, "/ \t\n\r\0\x0B");
        $orgDomain = $this->organizationalDomain($domain);
        $esp = strtolower((string) ($input['esp'] ?? 'unknown'));
        $subject = trim((string) ($input['subject'] ?? ''));
        $aRecords = $this->dnsRecords($domain, DNS_A);
        $aaaaRecords = $this->dnsRecords($domain, DNS_AAAA);
        $mxRecords = $this->dnsRecords($domain, DNS_MX);
        $orgMxRecords = $domain !== $orgDomain ? $this->dnsRecords($orgDomain, DNS_MX) : [];
        $effectiveMxRecords = $mxRecords !== [] ? $mxRecords : $orgMxRecords;
        $txtRecords = $this->dnsRecords($domain, DNS_TXT);
        $orgTxtRecords = $domain !== $orgDomain ? $this->dnsRecords($orgDomain, DNS_TXT) : [];
        $mailTxtRecords = $mailDomain !== $domain ? $this->dnsRecords($mailDomain, DNS_TXT) : $txtRecords;
        $nsRecords = $this->dnsRecords($domain, DNS_NS);
        $mxHosts = collect($effectiveMxRecords)
            ->pluck('target')
            ->filter(fn ($value) => is_string($value) && $value !== '')
            ->map(fn ($value) => rtrim(strtolower($value), '.'))
            ->values()
            ->all();
        $providerContext = $this->detectProviderContext(
            $esp,
            $domain,
            $mailDomain,
            $orgDomain,
            $effectiveMxRecords,
            array_merge($txtRecords, $orgTxtRecords, $mailTxtRecords),
            $nsRecords
        );

        return [
            'email' => $email,
            'domain' => $domain,
            'mailDomain' => $mailDomain,
            'orgDomain' => $orgDomain,
            'esp' => $esp,
            'subject' => $subject,
            'aRecords' => $aRecords,
            'aaaaRecords' => $aaaaRecords,
            'mxRecords' => $effectiveMxRecords,
            'txtRecords' => $txtRecords,
            'mailTxtRecords' => $mailTxtRecords,
            'providerContext' => $providerContext,
            'resolvedIps' => $this->resolveHostsToIps($mxHosts !== [] ? $mxHosts : [$domain]),
        ];
    }

    private function compileReport(?string $email, string $domain, string $subject, array $checks, array $aiConfig, AiService $aiService, array $providerContext): array
    {
        $contentStatus = collect($checks)->firstWhere('id', 'content')['status'] ?? 'info';

        [$score, $stats] = $this->scoreChecks($checks);
        $verdict = $this->scoreVerdict($score);
        $tags = $this->buildTags($checks, $score, $verdict, $providerContext);
        $recommendations = $this->buildRecommendations($checks, $subject !== '');
        $summary = $this->summarize($checks, $score, $verdict, $aiConfig, $aiService, $domain, $providerContext);
        $blacklistStatus = collect($checks)->firstWhere('id', 'blacklist')['status'] ?? 'warn';
        $placement = $this->placement($score, $blacklistStatus, $contentStatus);

        $report = [
            'score' => $score,
            'verdict' => $verdict,
            'summary' => $summary['summary'],
            'tags' => $tags,
            'stats' => $stats,
            'checks' => $checks,
            'recommendations' => $recommendations,
            'inbox_preview' => $this->buildInboxPreview(
                $email,
                $domain,
                $subject,
                $summary['preview_text'],
                $placement['placement'],
                $placement['reason']
            ),
        ];

        return [
            'provider' => $summary['provider'],
            'data' => $report,
        ];
    }

    private function buildDnsCheck(
        string $domain,
        string $mailDomain,
        string $orgDomain,
        array $aRecords,
        array $aaaaRecords,
        array $mxRecords,
        array $txtRecords,
        array $providerContext
    ): array
    {
        $hasAddress = $aRecords !== [] || $aaaaRecords !== [];
        $mxCount = count($mxRecords);
        $txtPayloads = collect($txtRecords)->map(fn ($record) => strtolower($this->txtPayload($record)))->all();
        $hasSpf = collect($txtPayloads)->contains(fn ($value) => str_starts_with($value, 'v=spf1'));
        $hasDmarc = collect($this->dnsRecords('_dmarc.' . $domain, DNS_TXT))
            ->map(fn ($record) => strtolower($this->txtPayload($record)))
            ->contains(fn ($value) => str_starts_with($value, 'v=dmarc1'));
        $hasMailSignals = $mxCount > 0 || $hasSpf || $hasDmarc || ($providerContext['provider'] ?? null) !== null;
        $providerLabel = $providerContext['label'] ?? 'your mail provider';
        $dnsHost = $providerContext['dns_host_label'] ?? null;

        if ($mxCount === 0 && ! $hasAddress && ! $hasMailSignals) {
            return $this->check(
                'dns',
                'DNS',
                'DNS records are missing',
                'fail',
                'Your domain is not publishing usable website or mail host records.',
                'No A, AAAA, or MX records were found for ' . $domain . '.'
            );
        }

        if ($mxCount === 0) {
            return $this->check(
                'dns',
                'DNS',
                $hasMailSignals ? 'Mail DNS looks partial on this exact host' : 'Domain resolves but MX is missing',
                'warn',
                $hasMailSignals
                    ? 'We found authentication or provider signals, but this exact host is not publishing dedicated MX records.'
                    : 'The domain resolves on the internet, but inbound mail delivery has no dedicated MX records.',
                $hasMailSignals
                    ? sprintf('This is common when mail is handled on %s or a related mail subdomain. Audit SPF, DKIM, and DMARC against %s for the real sending identity.', $providerLabel, $mailDomain)
                    : 'A/AAAA records exist, but no MX records were found. Some providers will fall back to the root host, but deliverability confidence is lower.'
            );
        }

        return $this->check(
            'dns',
            'DNS',
            'DNS and MX routing look healthy',
            'pass',
            'Core DNS records needed for email routing are present.',
            trim(sprintf(
                '%d MX record%s found for %s, with %d web host record%s available as fallback signals.%s%s',
                $mxCount,
                $mxCount === 1 ? '' : 's',
                $domain !== $orgDomain && $mxRecords !== [] ? $orgDomain : $domain,
                count($aRecords) + count($aaaaRecords),
                (count($aRecords) + count($aaaaRecords)) === 1 ? '' : 's',
                ($providerContext['provider_managed'] ?? false) ? ' Mail appears to be handled by ' . $providerLabel . '.' : '',
                $dnsHost ? ' DNS appears to be managed by ' . $dnsHost . '.' : ''
            ))
        );
    }

    private function buildSpfCheck(string $domain, string $mailDomain, string $orgDomain, array $txtRecords): array
    {
        $spfRecords = collect($txtRecords)
            ->map(fn ($record) => $this->txtPayload($record))
            ->filter(fn ($value) => str_starts_with(strtolower($value), 'v=spf1'))
            ->values()
            ->all();

        if ($spfRecords === [] && $mailDomain !== $orgDomain) {
            $fallbackRecords = collect($this->dnsRecords($orgDomain, DNS_TXT))
                ->map(fn ($record) => $this->txtPayload($record))
                ->filter(fn ($value) => str_starts_with(strtolower($value), 'v=spf1'))
                ->values()
                ->all();

            if ($fallbackRecords !== []) {
                $spfRecords = $fallbackRecords;
            }
        }

        if ($spfRecords === []) {
            return $this->check(
                'spf',
                'SPF',
                'SPF record not found',
                'fail',
                'Mailbox providers cannot confirm which servers are allowed to send mail for this domain.',
                'Publish a TXT record beginning with v=spf1 and include every sending platform you use.'
            );
        }

        if (count($spfRecords) > 1) {
            return $this->check(
                'spf',
                'SPF',
                'Multiple SPF records detected',
                'fail',
                'More than one SPF policy is published, which causes SPF checks to fail.',
                'Combine your SPF includes into a single v=spf1 TXT record.'
            );
        }

        $record = $spfRecords[0];
        $includeCount = preg_match_all('/\binclude:/i', $record) ?: 0;
        $hasHardFail = str_contains(strtolower($record), '-all');
        $hasSoftFail = str_contains(strtolower($record), '~all');
        $hasPermissive = str_contains(strtolower($record), '+all') || str_contains(strtolower($record), '?all');

        if ($hasPermissive) {
            return $this->check(
                'spf',
                'SPF',
                'SPF policy is too permissive',
                'fail',
                'Your SPF record currently allows any server to claim it can send for this domain.',
                'Replace +all or ?all with -all or ~all after you confirm your approved senders.'
            );
        }

        if ($includeCount > 10) {
            return $this->check(
                'spf',
                'SPF',
                'SPF lookup count is likely too high',
                'warn',
                'The SPF record is present, but it probably triggers the 10-DNS-lookup limit on some providers.',
                sprintf('This SPF record contains %d include mechanisms. Flatten or simplify the policy before it causes permerror.', $includeCount)
            );
        }

        if ($hasSoftFail) {
            return $this->check(
                'spf',
                'SPF',
                'SPF is valid but still soft-failing',
                'warn',
                'Authentication is present, but your policy still treats unauthorised senders as soft failures.',
                'Move from ~all to -all once you are certain every sender is included.'
            );
        }

        if ($hasHardFail) {
            return $this->check(
                'spf',
                'SPF',
                'SPF policy is valid',
                'pass',
                'The domain publishes a single SPF record with a firm fail policy.',
                sprintf('SPF record found on %s with %d include mechanism%s.', $mailDomain, $includeCount, $includeCount === 1 ? '' : 's')
            );
        }

        return $this->check(
            'spf',
            'SPF',
            'SPF record exists but policy is incomplete',
            'warn',
            'A valid SPF version string is present, but the enforcement ending is unclear.',
            'Make sure the record ends with -all or ~all so mailbox providers can interpret it consistently.'
        );
    }

    private function buildDkimCheck(string $domain, string $mailDomain, string $esp): array
    {
        $espSelectors = self::ESP_SELECTORS[$esp] ?? [];
        $selectors = array_values(array_unique([
            ...$espSelectors,
            ...self::DKIM_SELECTORS,
        ]));

        $hits = [];

        foreach ($selectors as $selector) {
            $host = $selector . '._domainkey.' . $mailDomain;
            $cname = $this->dnsRecords($host, DNS_CNAME);
            $txt = $this->dnsRecords($host, DNS_TXT);

            if ($cname !== [] || collect($txt)->map(fn ($record) => strtolower($this->txtPayload($record)))->contains(fn ($value) => str_contains($value, 'v=dkim1'))) {
                $hits[] = $selector;
            }
        }

        if ($hits === [] && $mailDomain !== $domain) {
            foreach ($selectors as $selector) {
                $host = $selector . '._domainkey.' . $domain;
                $cname = $this->dnsRecords($host, DNS_CNAME);
                $txt = $this->dnsRecords($host, DNS_TXT);

                if ($cname !== [] || collect($txt)->map(fn ($record) => strtolower($this->txtPayload($record)))->contains(fn ($value) => str_contains($value, 'v=dkim1'))) {
                    $hits[] = $selector;
                }
            }
        }

        if ($hits === []) {
            return $this->check(
                'dkim',
                'DKIM',
                'No DKIM selector detected',
                $esp === 'unknown' ? 'warn' : 'fail',
                'We could not find a working DKIM selector on the common hostnames used for this domain and sender setup.',
                $esp === 'unknown'
                    ? 'A DKIM record may exist on a custom selector. If you know it, keep it enabled and aligned with this sending domain.'
                    : 'For the selected ESP, publish and verify the vendor-issued DKIM CNAME or TXT selectors before sending at scale.'
            );
        }

        if (count($hits) === 1) {
            return $this->check(
                'dkim',
                'DKIM',
                'DKIM selector detected',
                'pass',
                'A deliverability-friendly DKIM record was found on a common selector.',
                sprintf('Selector found: %s._domainkey.%s', $hits[0], $mailDomain)
            );
        }

        return $this->check(
            'dkim',
            'DKIM',
            'Multiple DKIM selectors detected',
            'pass',
            'Several DKIM selectors appear to be live, which is common on mature sending setups.',
            'Detected selectors: ' . implode(', ', array_slice($hits, 0, 4)) . (count($hits) > 4 ? '…' : '')
        );
    }

    private function buildDmarcCheck(string $domain, string $orgDomain): array
    {
        $records = collect($this->dnsRecords('_dmarc.' . $domain, DNS_TXT))
            ->map(fn ($record) => $this->txtPayload($record))
            ->filter(fn ($value) => str_starts_with(strtolower($value), 'v=dmarc1'))
            ->values()
            ->all();

        if ($records === [] && $orgDomain !== $domain) {
            $records = collect($this->dnsRecords('_dmarc.' . $orgDomain, DNS_TXT))
                ->map(fn ($record) => $this->txtPayload($record))
                ->filter(fn ($value) => str_starts_with(strtolower($value), 'v=dmarc1'))
                ->values()
                ->all();
        }

        if ($records === []) {
            return $this->check(
                'dmarc',
                'DMARC',
                'DMARC record not found',
                'fail',
                'Mailbox providers do not have a policy telling them how to handle spoofed messages from this domain.',
                'Publish a _dmarc TXT record with a policy and reporting address.'
            );
        }

        $record = $records[0];
        preg_match('/\bp=([a-z]+)/i', $record, $policyMatch);
        $policy = strtolower($policyMatch[1] ?? 'none');
        $hasRua = preg_match('/\brua=mailto:/i', $record) === 1;

        if ($policy === 'reject') {
            return $this->check(
                'dmarc',
                'DMARC',
                'DMARC enforcement is strong',
                'pass',
                'DMARC is enabled with the strongest protection policy.',
                $hasRua ? 'Policy is set to reject and aggregate reporting is enabled.' : 'Policy is set to reject. Add rua reporting if you want clearer monitoring.'
            );
        }

        if ($policy === 'quarantine') {
            return $this->check(
                'dmarc',
                'DMARC',
                'DMARC is active but not fully strict',
                'pass',
                'DMARC is configured to quarantine suspicious mail, which is a solid protection step.',
                $hasRua ? 'Quarantine policy is active and aggregate reporting is enabled.' : 'Quarantine policy is active. Add rua reporting for visibility.'
            );
        }

        return $this->check(
            'dmarc',
            'DMARC',
            'DMARC is monitor-only',
            'warn',
            'DMARC exists, but the policy is still set to none so spoofed mail is only being observed, not blocked.',
            $hasRua ? 'Monitor reports are enabled. Move toward quarantine or reject after cleanup.' : 'Add rua reporting, review aligned mail sources, then move toward quarantine or reject.'
        );
    }

    private function buildLiveSpfCheck(string $domain, string $mailDomain, string $orgDomain, array $txtRecords, array $auth): array
    {
        $baseline = $this->buildSpfCheck($domain, $mailDomain, $orgDomain, $txtRecords);

        if (($auth['spf'] ?? null) === null) {
            return $baseline;
        }

        return match ($auth['spf']) {
            'pass' => $this->check(
                'spf',
                'SPF',
                'SPF passed on the real message',
                'pass',
                'The received test email passed SPF according to the destination mailbox provider.',
                $baseline['detail']
            ),
            'softfail', 'neutral' => $this->check(
                'spf',
                'SPF',
                'SPF result is weak on the real message',
                'warn',
                'The received message did not achieve a confident SPF pass even though a policy exists.',
                'The destination server reported SPF=' . strtoupper($auth['spf']) . '. Check envelope sender alignment and allowed senders.'
            ),
            default => $this->check(
                'spf',
                'SPF',
                'SPF failed on the real message',
                'fail',
                'The destination mailbox provider reported that the actual message failed SPF.',
                'The received message shows SPF=' . strtoupper($auth['spf']) . '. Update the SPF policy or the sender path before testing again.'
            ),
        };
    }

    private function buildLiveDkimCheck(string $domain, string $mailDomain, string $esp, array $auth, string $headers): array
    {
        $baseline = $this->buildDkimCheck($domain, $mailDomain, $esp);
        $hasSignature = preg_match('/^DKIM-Signature:/mi', $headers) === 1;

        if (($auth['dkim'] ?? null) === null) {
            if ($hasSignature && $baseline['status'] !== 'pass') {
                return $this->check(
                    'dkim',
                    'DKIM',
                    'DKIM signature exists but validation is unclear',
                    'warn',
                    'The message includes a DKIM-Signature header, but the mailbox provider result was not visible in the captured headers.',
                    'Confirm the provider-specific authentication-results headers or send another test to a mailbox that exposes them.'
                );
            }

            return $baseline;
        }

        return match ($auth['dkim']) {
            'pass' => $this->check(
                'dkim',
                'DKIM',
                'DKIM passed on the real message',
                'pass',
                'The received test email passed DKIM validation at the destination mailbox.',
                $baseline['detail']
            ),
            'temperror', 'neutral' => $this->check(
                'dkim',
                'DKIM',
                'DKIM validation is inconsistent',
                'warn',
                'The destination mailbox could not confirm a clean DKIM pass for the test message.',
                'The received message shows DKIM=' . strtoupper($auth['dkim']) . '. Re-check selector DNS and signing configuration.'
            ),
            default => $this->check(
                'dkim',
                'DKIM',
                'DKIM failed on the real message',
                'fail',
                'The destination mailbox provider reported that the actual message failed DKIM validation.',
                'The received message shows DKIM=' . strtoupper($auth['dkim']) . '. Fix selector publishing or signing alignment before retesting.'
            ),
        };
    }

    private function buildLiveDmarcCheck(string $domain, string $orgDomain, array $auth): array
    {
        $baseline = $this->buildDmarcCheck($domain, $orgDomain);

        if (($auth['dmarc'] ?? null) === null) {
            return $baseline;
        }

        return match ($auth['dmarc']) {
            'pass' => $this->check(
                'dmarc',
                'DMARC',
                'DMARC passed on the real message',
                'pass',
                'The destination mailbox provider confirmed DMARC alignment on the received test email.',
                $baseline['detail']
            ),
            'bestguesspass', 'none' => $this->check(
                'dmarc',
                'DMARC',
                'DMARC is not consistently enforced in practice',
                'warn',
                'A DMARC record may exist, but the received message did not show a strong aligned DMARC pass.',
                'The received message shows DMARC=' . strtoupper($auth['dmarc']) . '. Re-check alignment between From, SPF, and DKIM.'
            ),
            default => $this->check(
                'dmarc',
                'DMARC',
                'DMARC failed on the real message',
                'fail',
                'The destination mailbox provider reported that the actual message failed DMARC alignment.',
                'The received message shows DMARC=' . strtoupper($auth['dmarc']) . '. Fix SPF/DKIM alignment for the visible From domain.'
            ),
        };
    }

    private function parseAuthSignals(string $authenticationResults, string $headers): array
    {
        $signals = [
            'spf' => null,
            'dkim' => null,
            'dmarc' => null,
        ];

        $haystack = strtolower($authenticationResults !== '' ? $authenticationResults : $headers);

        foreach (['spf', 'dkim', 'dmarc'] as $key) {
            if (preg_match('/\b' . $key . '=([a-z]+)/i', $haystack, $matches) === 1) {
                $signals[$key] = strtolower($matches[1]);
            }
        }

        if ($signals['spf'] === null && preg_match('/received-spf:\s*([a-z]+)/i', $headers, $matches) === 1) {
            $signals['spf'] = strtolower($matches[1]);
        }

        return $signals;
    }

    private function buildBlacklistCheck(array $ips, array $providerContext): array
    {
        if ($ips === []) {
            return $this->check(
                'blacklist',
                'Blacklist',
                ($providerContext['provider_managed'] ?? false) ? 'Provider-managed sending IPs were not directly exposed' : 'No public sending IPs resolved for blacklist checks',
                ($providerContext['provider_managed'] ?? false) ? 'info' : 'warn',
                ($providerContext['provider_managed'] ?? false)
                    ? 'Your mail appears to be routed through a managed provider, so the checker could not safely attribute a public sender IP from DNS alone.'
                    : 'We could not identify a public mail server IP to query against common blocklists.',
                ($providerContext['provider_managed'] ?? false)
                    ? 'This is common with providers like Zoho, Google Workspace, and Microsoft 365. Use the live inbox test for the most accurate real-sender validation.'
                    : 'This can happen when MX points to providers that hide IPs behind indirection. Confirm your sending IPs separately if needed.'
            );
        }

        $hits = [];

        foreach ($ips as $ip) {
            if (! filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                continue;
            }

            $reversed = implode('.', array_reverse(explode('.', $ip)));

            foreach (self::DNSBLS as $zone => $label) {
                $lookup = $reversed . '.' . $zone;
                $listed = $this->dnsRecords($lookup, DNS_A);

                if ($listed !== []) {
                    $hits[] = $label . ' (' . $ip . ')';
                }
            }
        }

        if ($hits !== []) {
            return $this->check(
                'blacklist',
                'Blacklist',
                'A sending IP appears on a public blocklist',
                'fail',
                'At least one resolved mail server IP returned a positive DNSBL listing.',
                'Listings detected on: ' . implode(', ', array_unique($hits)) . '. Investigate before increasing volume.'
            );
        }

        return $this->check(
            'blacklist',
            'Blacklist',
            'No common blacklist hits found',
            'pass',
            'Resolved sending hosts did not appear on the common public DNSBLs checked by this audit.',
            'This does not guarantee perfect reputation, but it is a healthy baseline signal.'
        );
    }

    private function buildContentCheck(string $subject, string $checkType): array
    {
        if ($subject === '') {
            return $this->check(
                'content',
                'Content',
                'No subject line submitted for content review',
                $checkType === 'content' ? 'warn' : 'info',
                'Technical checks can still run, but the content analysis section is limited without a subject line.',
                'Add a real campaign subject later if you want a more realistic spam-trigger review.'
            );
        }

        $flags = [];
        $spamScore = 0;
        $lower = strtolower($subject);

        foreach (['free', 'urgent', 'act now', 'limited time', 'winner', 'guaranteed', 'click here', 'risk-free'] as $term) {
            if (str_contains($lower, $term)) {
                $flags[] = '"' . $term . '"';
                $spamScore += 2;
            }
        }

        if (preg_match('/[A-Z]{5,}/', $subject) === 1) {
            $flags[] = 'heavy uppercase';
            $spamScore += 2;
        }

        if (preg_match('/!{2,}/', $subject) === 1) {
            $flags[] = 'excess punctuation';
            $spamScore += 2;
        }

        if (preg_match('/[$€£₦]/u', $subject) === 1) {
            $flags[] = 'currency symbols';
            $spamScore += 1;
        }

        if ($spamScore >= 5) {
            return $this->check(
                'content',
                'Content',
                'Subject line looks promotional or spammy',
                'fail',
                'The subject line includes multiple patterns that often reduce trust or trigger filtering.',
                'Risk flags: ' . implode(', ', $flags) . '.'
            );
        }

        if ($spamScore >= 2) {
            return $this->check(
                'content',
                'Content',
                'Subject line needs refinement',
                'warn',
                'The content is likely deliverable, but it still carries a few traits that can hurt open rates or tab placement.',
                'Risk flags: ' . implode(', ', $flags) . '.'
            );
        }

        return $this->check(
            'content',
            'Content',
            'Subject line reads cleanly',
            'pass',
            'The submitted subject line avoids the common spam-pattern flags covered by this audit.',
            'No obvious trigger words, shouting patterns, or heavy punctuation were found.'
        );
    }

    private function buildReputationCheck(
        string $domain,
        array $ips,
        string $spfStatus,
        string $dkimStatus,
        string $dmarcStatus,
        string $blacklistStatus,
        string $volume,
        string $clientTarget,
        array $providerContext
    ): array {
        $warnings = [];

        if ($spfStatus !== 'pass') {
            $warnings[] = 'SPF is not fully trusted yet';
        }

        if ($dkimStatus === 'fail') {
            $warnings[] = 'DKIM is not verifiable on common selectors';
        }

        if ($dmarcStatus !== 'pass') {
            $warnings[] = 'DMARC policy is not fully enforced';
        }

        if ($blacklistStatus === 'fail') {
            return $this->check(
                'reputation',
                'Reputation',
                'Reputation risk is elevated',
                'fail',
                'A blacklist hit combined with incomplete authentication creates strong delivery risk.',
                'Fix the blacklist issue first, then tighten SPF, DKIM, and DMARC before sending larger volumes.'
            );
        }

        if ($warnings !== []) {
            $volumeNote = $volume === 'high' ? 'At higher volume, these gaps will usually hurt faster.' : 'These gaps matter more once volume grows.';
            $clientNote = $clientTarget === 'gmail' ? 'Gmail especially rewards aligned authentication.' : 'Major mailbox providers reward aligned authentication.';

            return $this->check(
                'reputation',
                'Reputation',
                'Reputation signals are mixed',
                'warn',
                'The domain is not showing direct blacklist damage, but trust signals are still inconsistent.',
                implode('; ', $warnings) . '. ' . $volumeNote . ' ' . $clientNote
            );
        }

        $detail = $ips === []
            ? (($providerContext['provider_managed'] ?? false)
                ? 'Authentication is aligned and the domain appears to use a provider-managed mail path, so blacklist visibility is limited without a live header test.'
                : 'Authentication is aligned and no common DNSBL hits were found.')
            : sprintf('Authentication is aligned and %d public sending IP%s resolved without common DNSBL hits.', count($ips), count($ips) === 1 ? '' : 's');

        return $this->check(
            'reputation',
            'Reputation',
            'Reputation baseline looks healthy',
            'pass',
            'The domain shows the trust signals expected from a responsible sender setup.',
            $detail
        );
    }

    private function check(string $id, string $category, string $title, string $status, string $description, string $detail): array
    {
        $weight = self::CHECK_WEIGHTS[$id] ?? 10;
        $impact = match ($status) {
            'pass' => (int) round($weight / 2),
            'fail' => (int) round(-$weight / 2),
            default => 0,
        };

        return [
            'id' => $id,
            'category' => $category,
            'title' => $title,
            'status' => $status,
            'description' => $description,
            'detail' => $detail,
            'score_impact' => $impact,
        ];
    }

    private function scoreChecks(array $checks): array
    {
        $total = array_sum(self::CHECK_WEIGHTS);
        $earned = 0.0;
        $passed = 0;
        $failed = 0;
        $warned = 0;
        $spamScore = 0;

        foreach ($checks as $check) {
            $weight = self::CHECK_WEIGHTS[$check['id']] ?? 10;

            switch ($check['status']) {
                case 'pass':
                    $earned += $weight;
                    $passed++;
                    break;
                case 'warn':
                    $earned += $weight * 0.55;
                    $warned++;
                    break;
                case 'info':
                    $earned += $weight * 0.45;
                    break;
                default:
                    $failed++;
                    break;
            }

            if ($check['id'] === 'content') {
                $spamScore += match ($check['status']) {
                    'pass' => 1,
                    'warn' => 4,
                    'fail' => 7,
                    default => 2,
                };
            }

            if (in_array($check['id'], ['spf', 'dkim', 'dmarc'], true) && $check['status'] !== 'pass') {
                $spamScore += 1;
            }

            if ($check['id'] === 'blacklist' && $check['status'] === 'fail') {
                $spamScore += 3;
            }
        }

        $score = (int) max(0, min(100, round(($earned / $total) * 100)));
        $spamScore = (int) max(0, min(10, $spamScore));

        return [
            $score,
            [
                'checks_passed' => $passed,
                'checks_failed' => $failed,
                'checks_warned' => $warned,
                'spam_score' => $spamScore,
            ],
        ];
    }

    private function scoreVerdict(int $score): string
    {
        return match (true) {
            $score >= 85 => 'excellent',
            $score >= 70 => 'good',
            $score >= 45 => 'poor',
            default => 'critical',
        };
    }

    private function buildTags(array $checks, int $score, string $verdict, array $providerContext): array
    {
        $tags = [$score >= 85 ? 'Inbox-ready baseline' : ($score >= 70 ? 'Mostly healthy setup' : 'Needs deliverability cleanup')];

        if (($providerContext['label'] ?? null) !== null) {
            $tags[] = $providerContext['label'] . ' detected';
        }

        if (($providerContext['dns_host_label'] ?? null) !== null) {
            $tags[] = $providerContext['dns_host_label'] . ' DNS';
        }

        foreach ($checks as $check) {
            if ($check['id'] === 'spf' && $check['status'] === 'pass') {
                $tags[] = 'SPF valid';
            }

            if ($check['id'] === 'dkim' && $check['status'] === 'pass') {
                $tags[] = 'DKIM detected';
            }

            if ($check['id'] === 'dmarc') {
                $tags[] = match ($check['status']) {
                    'pass' => 'DMARC enforced',
                    'warn' => 'DMARC monitor only',
                    'fail' => 'DMARC missing',
                    default => 'DMARC unknown',
                };
            }

        if ($check['id'] === 'blacklist') {
                $tags[] = match ($check['status']) {
                    'fail' => 'Blacklist risk',
                    'info' => 'Provider-managed sender path',
                    default => 'No common blacklist hit',
                };
            }
        }

        if ($verdict === 'critical') {
            $tags[] = 'High inbox risk';
        }

        return array_values(array_unique($tags));
    }

    private function buildRecommendations(array $checks, bool $hasSubject): array
    {
        $items = [];

        foreach ($checks as $check) {
            if ($check['status'] === 'pass' || $check['status'] === 'info') {
                continue;
            }

            $items[] = match ($check['id']) {
                'dns' => $this->recommendation('high', 'Publish proper MX records', 'Mailbox providers need clear mail-routing records before they can trust delivery results.', 'Add or correct MX records for the domain and confirm they point to your real inbound mail provider.'),
                'spf' => $this->recommendation('high', 'Fix the SPF policy', 'SPF is a first-line sender authentication check for most inbox providers.', 'Keep one SPF TXT record only, include all approved senders, and end with -all or ~all.'),
                'dkim' => $this->recommendation('high', 'Enable and verify DKIM signing', 'DKIM proves your platform is cryptographically authorised to send on behalf of the domain.', 'Publish the vendor-issued DKIM selector records and confirm messages are being signed after propagation.'),
                'dmarc' => $this->recommendation('high', 'Strengthen DMARC enforcement', 'DMARC aligns SPF and DKIM results and gives providers a clear anti-spoofing policy.', 'Start with reporting, then move from p=none to quarantine or reject once aligned traffic is clean.'),
                'blacklist' => $this->recommendation('high', 'Investigate blacklist exposure', 'A listed sending IP can hurt inbox placement immediately, even with good content.', 'Identify the affected IP, pause risky campaigns, and follow the blocklist provider removal process after remediation.'),
                'content' => $this->recommendation($hasSubject ? 'med' : 'low', 'Refine campaign copy signals', 'Subject-line phrasing affects both filtering and open-rate performance.', $hasSubject ? 'Reduce urgency words, heavy punctuation, and all-caps phrasing before the next send.' : 'Test real campaign copy later so content risk can be scored more precisely.'),
                'reputation' => $this->recommendation('med', 'Tighten sender reputation inputs', 'Authentication, blacklist hygiene, and sending consistency all compound into reputation.', 'Warm up carefully, keep list hygiene clean, and avoid scaling volume until the authentication gaps above are fixed.'),
                default => null,
            };
        }

        $items = array_values(array_filter($items));

        if ($items === []) {
            $items[] = $this->recommendation('low', 'Keep monitoring authentication drift', 'Your baseline looks healthy right now, but deliverability can change quickly after DNS or ESP changes.', 'Re-check after any DNS change, ESP migration, or sudden increase in sending volume.');
        }

        return array_slice($items, 0, 6);
    }

    private function recommendation(string $priority, string $title, string $description, string $fix): array
    {
        return [
            'priority' => $priority,
            'title' => $title,
            'description' => $description,
            'fix' => $fix,
        ];
    }

    private function summarize(array $checks, int $score, string $verdict, array $aiConfig, AiService $aiService, string $domain, array $providerContext): array
    {
        $failed = array_values(array_filter($checks, fn ($check) => $check['status'] === 'fail'));
        $warned = array_values(array_filter($checks, fn ($check) => $check['status'] === 'warn'));
        $providerLabel = $providerContext['label'] ?? null;
        $dnsHostLabel = $providerContext['dns_host_label'] ?? null;

        $fallback = [
            'provider' => 'system',
            'summary' => $this->fallbackSummary($failed, $warned, $score, $domain, $providerLabel, $dnsHostLabel),
            'preview_text' => $this->fallbackPreviewText($failed, $warned, $verdict),
        ];

        try {
            $result = $aiService->summarizeEmailDeliverability($aiConfig, [
                'domain' => $domain,
                'score' => $score,
                'verdict' => $verdict,
                'failed' => array_map(fn ($check) => $check['title'], $failed),
                'warned' => array_map(fn ($check) => $check['title'], $warned),
                'recommendations' => array_map(fn ($check) => $check['detail'], array_slice(array_merge($failed, $warned), 0, 3)),
                'mail_provider' => $providerLabel,
                'dns_provider' => $dnsHostLabel,
            ]);

            $summary = trim((string) ($result['data']['summary'] ?? ''));
            $previewText = trim((string) ($result['data']['preview_text'] ?? ''));

            if ($summary === '') {
                return $fallback;
            }

            return [
                'provider' => $result['provider'],
                'summary' => $summary,
                'preview_text' => $previewText !== '' ? $previewText : $fallback['preview_text'],
            ];
        } catch (\Throwable) {
            return $fallback;
        }
    }

    private function fallbackSummary(array $failed, array $warned, int $score, string $domain, ?string $providerLabel, ?string $dnsHostLabel): string
    {
        if ($failed === [] && $warned === []) {
            $suffix = $providerLabel ? ' Mail appears to be handled by ' . $providerLabel . '.' : '';
            if ($dnsHostLabel) {
                $suffix .= ' DNS is managed through ' . $dnsHostLabel . '.';
            }

            return sprintf('%s has a strong technical baseline for inbox delivery, with authentication and reputation signals looking healthy.%s', $domain, $suffix);
        }

        $priority = $failed !== [] ? $failed : $warned;
        $lead = implode(', ', array_slice(array_map(fn ($check) => strtolower($check['title']), $priority), 0, 2));
        $context = $providerLabel ? ' The checker also detected ' . $providerLabel . ' in the mail setup.' : '';

        return sprintf(
            '%s scores %d/100 right now. The biggest deliverability drag comes from %s, so fixing those first will do the most to improve inbox placement.%s',
            $domain,
            $score,
            $lead,
            $context
        );
    }

    private function fallbackPreviewText(array $failed, array $warned, string $verdict): string
    {
        if ($failed === [] && $warned === []) {
            return 'Authentication looks aligned, so this message has a healthy chance of landing where subscribers expect it.';
        }

        if ($verdict === 'critical') {
            return 'Providers are likely to doubt this sender until the missing authentication and reputation issues are fixed.';
        }

        return 'This sender can probably deliver, but a few trust signals still need work before placement becomes reliable.';
    }

    private function placement(int $score, string $blacklistStatus, string $contentStatus): array
    {
        if ($blacklistStatus === 'fail' || $score < 45) {
            return [
                'placement' => 'spam',
                'reason' => 'Authentication or reputation gaps are large enough that many providers would treat this sender cautiously and may place mail in spam.',
            ];
        }

        if ($contentStatus === 'fail' || $score < 72) {
            return [
                'placement' => 'promotions',
                'reason' => 'The setup is partially trusted, but content or policy signals still suggest promotional tab placement on stricter mailbox providers.',
            ];
        }

        return [
            'placement' => 'inbox',
            'reason' => 'Authentication and reputation signals look consistent enough for a reasonable primary-inbox baseline, assuming list quality is also healthy.',
        ];
    }

    private function buildInboxPreview(?string $email, string $domain, string $subject, string $previewText, string $placement, string $reason): array
    {
        $brand = $this->brandFromDomain($domain);

        return [
            'from_name' => $brand,
            'from_address' => $email ?: 'hello@' . $domain,
            'subject' => $subject !== '' ? $subject : 'A quick update from ' . $brand,
            'preview_text' => $previewText,
            'likely_placement' => $placement,
            'placement_reason' => $reason,
        ];
    }

    private function brandFromDomain(string $domain): string
    {
        $first = explode('.', $domain)[0] ?? $domain;
        $first = str_replace(['-', '_'], ' ', $first);

        return ucwords($first);
    }

    private function detectProviderContext(
        string $esp,
        string $domain,
        string $mailDomain,
        string $orgDomain,
        array $mxRecords,
        array $txtRecords,
        array $nsRecords
    ): array {
        $mxHosts = collect($mxRecords)
            ->pluck('target')
            ->filter(fn ($value) => is_string($value) && $value !== '')
            ->map(fn ($value) => strtolower(rtrim($value, '.')))
            ->all();
        $txtPayloads = collect($txtRecords)
            ->map(fn ($record) => strtolower($this->txtPayload($record)))
            ->filter()
            ->all();
        $nsHosts = collect($nsRecords)
            ->pluck('target')
            ->filter(fn ($value) => is_string($value) && $value !== '')
            ->map(fn ($value) => strtolower(rtrim($value, '.')))
            ->all();

        $provider = $esp !== 'unknown' ? $esp : null;

        if ($provider === null) {
            foreach (self::PROVIDER_PATTERNS as $candidate => $patterns) {
                if ($this->arrayContainsPatterns($mxHosts, $patterns) || $this->arrayContainsPatterns($txtPayloads, $patterns)) {
                    $provider = $candidate;
                    break;
                }
            }
        }

        $dnsHost = $this->arrayContainsPatterns($nsHosts, ['cloudflare.com']) ? 'Cloudflare' : null;

        return [
            'provider' => $provider,
            'label' => $this->providerLabel($provider),
            'provider_managed' => $provider !== null,
            'dns_host_label' => $dnsHost,
            'mail_domain' => $mailDomain,
            'domain' => $domain,
            'org_domain' => $orgDomain,
            'mx_hosts' => $mxHosts,
        ];
    }

    private function providerLabel(?string $provider): ?string
    {
        return match ($provider) {
            'zoho' => 'Zoho Mail',
            'google-workspace' => 'Google Workspace',
            'microsoft-365' => 'Microsoft 365',
            'postmark' => 'Postmark',
            'sendgrid' => 'SendGrid',
            'amazon-ses', 'ses' => 'Amazon SES',
            'mailchimp' => 'Mailchimp',
            'unknown', null => null,
            default => ucwords(str_replace(['-', '_'], ' ', $provider)),
        };
    }

    private function arrayContainsPatterns(array $haystack, array $patterns): bool
    {
        foreach ($haystack as $value) {
            foreach ($patterns as $pattern) {
                if (str_contains((string) $value, strtolower($pattern))) {
                    return true;
                }
            }
        }

        return false;
    }

    private function organizationalDomain(string $domain): string
    {
        $parts = explode('.', $domain);

        if (count($parts) <= 2) {
            return $domain;
        }

        return implode('.', array_slice($parts, -2));
    }

    private function dnsRecords(string $host, int $type): array
    {
        $records = @dns_get_record($host, $type);

        return is_array($records) ? $records : [];
    }

    private function txtPayload(array $record): string
    {
        if (isset($record['txt']) && is_string($record['txt'])) {
            return $record['txt'];
        }

        if (isset($record['entries']) && is_array($record['entries'])) {
            return implode('', array_map('strval', $record['entries']));
        }

        return '';
    }

    private function resolveHostsToIps(array $hosts): array
    {
        $ips = [];

        foreach ($hosts as $host) {
            foreach ($this->dnsRecords($host, DNS_A) as $record) {
                if (isset($record['ip'])) {
                    $ips[] = $record['ip'];
                }
            }

            foreach ($this->dnsRecords($host, DNS_AAAA) as $record) {
                if (isset($record['ipv6'])) {
                    $ips[] = $record['ipv6'];
                }
            }
        }

        return array_values(array_unique($ips));
    }
}
