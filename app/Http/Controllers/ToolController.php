<?php

namespace App\Http\Controllers;

use App\Models\EmailDeliverabilityTest;
use App\Models\ToolLead;
use App\Services\AiService;
use App\Services\EmailDeliverabilityService;
use App\Services\EmailDeliverabilityLiveTestService;
use App\Support\Honeypot;
use App\Support\SiteSettings as SiteSettingsManager;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ToolController extends Controller
{
    public function hub(): View
    {
        $tools = array_values($this->tools());

        return view('tools.hub', [
            'tools' => $tools,
            'seo' => $this->seo(
                'Free Business Tools for Nigerian Businesses | i2Medier',
                'Explore free business tools from i2Medier including an SEO audit, website cost calculator, name generators, an email deliverability checker, a website brief generator, a WhatsApp link generator, and an invoice generator.',
                '/tools',
                'CollectionPage'
            ),
        ]);
    }

    public function seoAudit(): View
    {
        return $this->toolPage('free-seo-audit', 'tools.seo-audit');
    }

    public function costCalculator(): View
    {
        return $this->toolPage('website-cost-calculator', 'tools.cost-calculator');
    }

    public function costCalculatorPrint(): View
    {
        return view('tools.cost-calculator-print');
    }

    public function businessNameGenerator(): View
    {
        return $this->toolPage('business-name-generator', 'tools.business-name-generator');
    }

    public function domainNameGenerator(): View
    {
        return $this->toolPage('domain-name-generator', 'tools.domain-name-generator');
    }

    public function websiteBriefGenerator(): View
    {
        return $this->toolPage('website-brief-generator', 'tools.website-brief-generator');
    }

    public function websiteBriefPrint(): View
    {
        return view('tools.website-brief-generator-print');
    }

    public function whatsappLinkGenerator(): View
    {
        return $this->toolPage('whatsapp-link-generator', 'tools.whatsapp-link-generator');
    }

    public function emailDeliverabilityChecker(): View
    {
        return $this->toolPage('email-deliverability-checker', 'tools.email-deliverability-checker');
    }

    public function invoiceGenerator(): View
    {
        return $this->toolPage('invoice-generator', 'tools.invoice-generator');
    }

    public function invoiceGeneratorPrint(): View
    {
        return view('tools.invoice-generator-print');
    }

    public function storeLead(Request $request): JsonResponse
    {
        Honeypot::ensureValid($request);

        $tool = (string) $request->string('tool');
        $email = trim((string) $request->string('email'));

        if (! array_key_exists($tool, $this->tools())) {
            return response()->json([
                'success' => false,
                'error' => 'Unknown tool.',
            ], 422);
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'success' => false,
                'error' => 'Enter a valid email address.',
            ], 422);
        }

        ToolLead::create([
            'tool' => $tool,
            'email' => $email,
            'ip' => $request->ip(),
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function seoFetchHtml(Request $request): JsonResponse
    {
        Honeypot::ensureValid($request);

        $url = (string) $request->string('url');

        if (! filter_var($url, FILTER_VALIDATE_URL) || ! preg_match('/^https?:\/\//i', $url)) {
            return response()->json(['html' => ''], 422);
        }

        $validatedIp = $this->resolveToValidatedIp($url);
        if (! $validatedIp) {
            return response()->json(['html' => ''], 422);
        }

        try {
            $response = $this->fetchHtmlPinned($url, $validatedIp);

            // Follow up to 3 redirects, re-validating and re-pinning each hop
            $hops = 0;
            while ($response->redirect() && $hops < 3) {
                $location = $response->header('Location');
                if (! $location) break;
                if (! preg_match('/^https?:\/\//i', $location)) {
                    $parts    = parse_url($url);
                    $location = ($parts['scheme'] ?? 'https') . '://' . ($parts['host'] ?? '') . '/' . ltrim($location, '/');
                }
                $validatedIp = $this->resolveToValidatedIp($location);
                if (! $validatedIp) break;
                $url      = $location;
                $response = $this->fetchHtmlPinned($url, $validatedIp);
                $hops++;
            }

            return response()->json(['html' => $response->successful() ? $response->body() : '']);
        } catch (\Exception) {
            return response()->json(['html' => '']);
        }
    }

    private function fetchHtmlPinned(string $url, string $validatedIp): \Illuminate\Http\Client\Response
    {
        $parts = parse_url($url);
        $host  = $parts['host'] ?? '';
        $port  = $parts['port'] ?? (($parts['scheme'] ?? 'https') === 'https' ? 443 : 80);

        return Http::timeout(15)
            ->withUserAgent('Mozilla/5.0 (compatible; i2Medier-SEO-Audit/1.0; +https://i2medier.com)')
            ->withOptions([
                'allow_redirects' => false,
                'curl'            => [CURLOPT_RESOLVE => ["{$host}:{$port}:{$validatedIp}"]],
            ])
            ->get($url);
    }

    /**
     * Resolves all IPs for the URL's hostname, validates every one against
     * private/reserved ranges, and returns the first IP to pin cURL to.
     * Returns null if the URL is unsafe or unresolvable.
     * Using the returned IP with CURLOPT_RESOLVE eliminates the DNS rebinding
     * TOCTOU window between this check and the actual HTTP request.
     */
    private function resolveToValidatedIp(string $url): ?string
    {
        $parts = parse_url($url);

        if (! $parts || empty($parts['host'])) {
            return null;
        }

        $host = strtolower(rtrim($parts['host'], '.'));
        $port = $parts['port'] ?? null;

        if ($port !== null && ! in_array($port, [80, 443])) {
            return null;
        }

        $ips = [];

        foreach (dns_get_record($host, DNS_A) as $r) {
            if (isset($r['ip'])) $ips[] = $r['ip'];
        }

        foreach (dns_get_record($host, DNS_AAAA) as $r) {
            if (isset($r['ipv6'])) $ips[] = $r['ipv6'];
        }

        if (empty($ips)) {
            $ips = gethostbynamel($host) ?: [];
        }

        if (empty($ips)) {
            return null;
        }

        foreach ($ips as $ip) {
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
                return null;
            }
        }

        return $ips[0];
    }

    public function seoFetchPsi(Request $request, SiteSettingsManager $settings): JsonResponse
    {
        Honeypot::ensureValid($request);

        $url = (string) $request->string('url');

        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            return response()->json(['message' => 'Enter a valid URL.'], 422);
        }

        $apiKey = $settings->pagespeedApiKey();
        if (! $apiKey) {
            return response()->json(['message' => 'The PageSpeed Insights API key is not configured.'], 503);
        }

        // Google PSI requires repeated keys for multiple categories — http_build_query
        // with an array produces category[0]=... which Google ignores, causing it to
        // run all audits and take 15+ seconds. Build the query string manually instead.
        $query = http_build_query(['url' => $url, 'strategy' => 'mobile', 'key' => $apiKey])
            . '&category=performance&category=seo&category=accessibility&category=best-practices';

        try {
            $response = Http::timeout(28)->get(
                'https://www.googleapis.com/pagespeedonline/v5/runPagespeed?' . $query
            );

            if (! $response->successful()) {
                return response()->json([
                    'message' => 'PageSpeed Insights did not return a valid audit for this URL.',
                ], 502);
            }

            $lhr    = $response->json('lighthouseResult', []);
            $cats   = $lhr['categories'] ?? [];
            $audits = $lhr['audits'] ?? [];

            return response()->json([
                'psi' => [
                    'requestedUrl'    => $lhr['requestedUrl'] ?? $url,
                    'finalUrl'        => $lhr['finalUrl'] ?? $url,
                    'mainDocumentUrl' => $lhr['mainDocumentUrl'] ?? $url,
                    'performance'   => $cats['performance']['score'] ?? null,
                    'seo'           => $cats['seo']['score'] ?? null,
                    'accessibility' => $cats['accessibility']['score'] ?? null,
                    'bestPractices' => $cats['best-practices']['score'] ?? null,
                    'fcp'           => $audits['first-contentful-paint']['displayValue'] ?? null,
                    'lcp'           => $audits['largest-contentful-paint']['displayValue'] ?? null,
                    'tbt'           => $audits['total-blocking-time']['displayValue'] ?? null,
                    'cls'           => $audits['cumulative-layout-shift']['displayValue'] ?? null,
                    'si'            => $audits['speed-index']['displayValue'] ?? null,
                ],
            ]);
        } catch (\Exception) {
            return response()->json([
                'message' => 'PageSpeed Insights could not be reached right now.',
            ], 502);
        }
    }

    public function seoFetchCrux(Request $request, SiteSettingsManager $settings): JsonResponse
    {
        Honeypot::ensureValid($request);

        $url = (string) $request->string('url');
        $finalUrl = (string) $request->string('finalUrl');

        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            return response()->json(['message' => 'Enter a valid URL.'], 422);
        }

        $apiKey = $settings->cruxApiKey();
        if (! $apiKey) {
            return response()->json(['message' => 'The Chrome UX Report API key is not configured.'], 503);
        }

        $candidateUrls = array_values(array_unique(array_filter([$finalUrl, $url], fn ($value) => filter_var($value, FILTER_VALIDATE_URL))));

        try {
            foreach ($candidateUrls as $candidateUrl) {
                $pageLookup = $this->queryCrux($apiKey, [
                    'url' => $candidateUrl,
                    'formFactor' => 'PHONE',
                ]);

                if ($pageLookup['ok']) {
                    return response()->json([
                        'crux' => $this->transformCruxRecord($pageLookup['record'], 'url'),
                    ]);
                }

                if (! $pageLookup['not_found']) {
                    return response()->json([
                        'message' => 'Chrome UX Report could not return data for this URL.',
                    ], 502);
                }

                $origin = $this->originFromUrl($candidateUrl);
                if ($origin === null) {
                    continue;
                }

                $originLookup = $this->queryCrux($apiKey, [
                    'origin' => $origin,
                    'formFactor' => 'PHONE',
                ]);

                if ($originLookup['ok']) {
                    return response()->json([
                        'crux' => $this->transformCruxRecord($originLookup['record'], 'origin'),
                    ]);
                }

                if (! $originLookup['not_found']) {
                    return response()->json([
                        'message' => 'Chrome UX Report could not return origin data for this URL.',
                    ], 502);
                }
            }

            return response()->json([
                'message' => 'Chrome UX Report has no field data for this URL or its origin yet.',
            ], 404);
        } catch (\Exception) {
            return response()->json([
                'message' => 'Chrome UX Report could not be reached right now.',
            ], 502);
        }
    }

    public function seoRecommend(Request $request, SiteSettingsManager $settings, AiService $service): JsonResponse
    {
        Honeypot::ensureValid($request);

        $signals = $request->input('signals', []);
        $scores  = $request->input('scores', []);
        $prompt = $this->buildRecommendationPrompt($signals, $scores);

        try {
            $result = $service->generateSeoRecommendations($settings->businessNameAiConfig(), $prompt);

            return response()->json([
                'recommendations' => $result['data'],
                'provider' => $result['provider'],
            ]);
        } catch (\RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 502);
        }
    }

    public function businessNameGenerate(Request $request, SiteSettingsManager $settings, AiService $service): JsonResponse
    {
        Honeypot::ensureValid($request);

        $description = trim((string) $request->string('description'));

        if ($description === '') {
            return response()->json(['message' => 'Please describe the business first.'], 422);
        }

        try {
            $result = $service->generateNames($settings->businessNameAiConfig(), [
                'description' => $description,
                'styles' => $request->input('styles', []),
                'length' => trim((string) $request->string('length', 'any')),
                'market' => trim((string) $request->string('market', 'Nigeria')),
                'keywords' => trim((string) $request->string('keywords')),
                'avoid' => trim((string) $request->string('avoid')),
            ]);

            return response()->json([
                'names' => array_values($result['data']),
                'provider' => $result['provider'],
            ]);
        } catch (\RuntimeException $exception) {
            return response()->json(['message' => $exception->getMessage()], 502);
        }
    }

    public function businessNameVariations(Request $request, SiteSettingsManager $settings, AiService $service): JsonResponse
    {
        Honeypot::ensureValid($request);

        $name = trim((string) $request->string('name'));
        $tagline = trim((string) $request->string('tagline'));

        if ($name === '') {
            return response()->json(['message' => 'A base name is required.'], 422);
        }

        try {
            $result = $service->generateVariations($settings->businessNameAiConfig(), $name, $tagline);

            return response()->json([
                'variations' => array_values($result['data']),
                'provider' => $result['provider'],
            ]);
        } catch (\RuntimeException $exception) {
            return response()->json(['message' => $exception->getMessage()], 502);
        }
    }

    public function domainNameGenerate(Request $request, SiteSettingsManager $settings, AiService $service): JsonResponse
    {
        Honeypot::ensureValid($request);

        $description = trim((string) $request->string('description'));
        $tlds = collect($request->input('tlds', []))
            ->map(fn ($tld) => trim((string) $tld))
            ->filter()
            ->values()
            ->all();

        if ($description === '') {
            return response()->json(['message' => 'Please describe the business first.'], 422);
        }

        if ($tlds === []) {
            return response()->json(['message' => 'Please select at least one TLD.'], 422);
        }

        try {
            $result = $service->generateDomains($settings->businessNameAiConfig(), $this->buildDomainNamePrompt([
                'description' => $description,
                'keywords' => trim((string) $request->string('keywords')),
                'must_include' => trim((string) $request->string('mustInclude')),
                'style' => trim((string) $request->string('style', 'Any')),
                'max_length' => trim((string) $request->string('maxLength', 'any')),
                'tlds' => $tlds,
            ]));

            return response()->json([
                'domains' => array_values($result['data']),
                'provider' => $result['provider'],
            ]);
        } catch (\RuntimeException $exception) {
            return response()->json(['message' => $exception->getMessage()], 502);
        }
    }

    public function websiteBriefGenerate(Request $request, SiteSettingsManager $settings, AiService $service): JsonResponse
    {
        Honeypot::ensureValid($request);

        $data = [
            'bizName' => trim((string) $request->string('bizName')),
            'bizIndustry' => trim((string) $request->string('bizIndustry')),
            'bizDesc' => trim((string) $request->string('bizDesc')),
            'bizAudience' => trim((string) $request->string('bizAudience')),
            'bizLocation' => trim((string) $request->string('bizLocation')),
            'bizCurrentUrl' => trim((string) $request->string('bizCurrentUrl')),
            'bizCompetitors' => trim((string) $request->string('bizCompetitors')),
            'websiteType' => trim((string) $request->string('websiteType')),
            'primaryGoal' => trim((string) $request->string('primaryGoal')),
            'successMetrics' => trim((string) $request->string('successMetrics')),
            'stakeholders' => trim((string) $request->string('stakeholders')),
            'pages' => collect($request->input('pages', []))->map(fn ($page) => trim((string) $page))->filter()->values()->all(),
            'contentStatus' => trim((string) $request->string('contentStatus')),
            'copywriting' => trim((string) $request->string('copywriting')),
            'specialPages' => trim((string) $request->string('specialPages')),
            'visualStyle' => trim((string) $request->string('visualStyle')),
            'colors' => [
                'primary' => trim((string) data_get($request->input('colors', []), 'primary')),
                'accent' => trim((string) data_get($request->input('colors', []), 'accent')),
                'bg' => trim((string) data_get($request->input('colors', []), 'bg')),
            ],
            'noBrandColors' => (bool) $request->boolean('noBrandColors'),
            'sitesLove' => trim((string) $request->string('sitesLove')),
            'sitesAvoid' => trim((string) $request->string('sitesAvoid')),
            'designNotes' => trim((string) $request->string('designNotes')),
            'features' => collect($request->input('features', []))->map(fn ($feature) => trim((string) $feature))->filter()->values()->all(),
            'platform' => trim((string) $request->string('platform')),
            'domainStatus' => trim((string) $request->string('domainStatus')),
            'hosting' => trim((string) $request->string('hosting')),
            'existingTools' => trim((string) $request->string('existingTools')),
            'seoReq' => trim((string) $request->string('seoReq')),
            'timeline' => trim((string) $request->string('timeline')),
            'budget' => trim((string) $request->string('budget')),
            'extraNotes' => trim((string) $request->string('extraNotes')),
        ];

        if ($data['bizName'] === '' || $data['bizIndustry'] === '' || $data['bizDesc'] === '' || $data['bizAudience'] === '') {
            return response()->json(['message' => 'Please complete the business details first.'], 422);
        }

        if ($data['websiteType'] === '' || $data['primaryGoal'] === '') {
            return response()->json(['message' => 'Please complete the project goals section.'], 422);
        }

        if ($data['pages'] === []) {
            return response()->json(['message' => 'Please select at least one page.'], 422);
        }

        if ($data['visualStyle'] === '') {
            return response()->json(['message' => 'Please choose a design direction first.'], 422);
        }

        if ($data['timeline'] === '' || $data['budget'] === '') {
            return response()->json(['message' => 'Please choose a timeline and budget range.'], 422);
        }

        try {
            $result = $service->generateWebsiteBrief(
                $settings->businessNameAiConfig(),
                $this->buildWebsiteBriefPrompt($data)
            );

            return response()->json([
                'brief' => $result['data'],
                'provider' => $result['provider'],
            ]);
        } catch (\RuntimeException $exception) {
            return response()->json(['message' => $exception->getMessage()], 502);
        }
    }

    public function emailDeliverabilityGenerate(
        Request $request,
        SiteSettingsManager $settings,
        AiService $aiService,
        EmailDeliverabilityService $deliverabilityService
    ): JsonResponse
    {
        Honeypot::ensureValid($request);

        $input = trim((string) $request->string('input'));
        $data = [
            'input' => $input,
            'checkType' => trim((string) $request->string('checkType', 'full')),
            'clientTarget' => trim((string) $request->string('clientTarget', 'all')),
            'esp' => trim((string) $request->string('esp', 'unknown')),
            'volume' => trim((string) $request->string('volume', 'low')),
            'sendingDomain' => trim((string) $request->string('sendingDomain')),
            'subject' => trim((string) $request->string('subject')),
        ];

        if ($input === '') {
            return response()->json(['message' => 'Please enter an email address or domain first.'], 422);
        }

        if (! $this->looksLikeEmailOrDomain($input)) {
            return response()->json(['message' => 'Enter a valid email address or domain.'], 422);
        }

        try {
            $result = $deliverabilityService->analyze(
                $data,
                $settings->businessNameAiConfig(),
                $aiService
            );

            return response()->json([
                'report' => $result['data'],
                'provider' => $result['provider'],
            ]);
        } catch (\RuntimeException $exception) {
            return response()->json(['message' => $exception->getMessage()], 502);
        }
    }

    public function emailDeliverabilityStartLiveTest(
        Request $request,
        SiteSettingsManager $settings,
        EmailDeliverabilityLiveTestService $liveTestService
    ): JsonResponse {
        Honeypot::ensureValid($request);

        $input = trim((string) $request->string('input'));
        $data = [
            'input' => $input,
            'checkType' => trim((string) $request->string('checkType', 'full')),
            'clientTarget' => trim((string) $request->string('clientTarget', 'all')),
            'esp' => trim((string) $request->string('esp', 'unknown')),
            'volume' => trim((string) $request->string('volume', 'low')),
            'sendingDomain' => trim((string) $request->string('sendingDomain')),
            'subject' => trim((string) $request->string('subject')),
        ];

        if ($input === '') {
            return response()->json(['message' => 'Please enter the sender email address first.'], 422);
        }

        if (! filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['message' => 'Live inbox tests require a valid sender email address.'], 422);
        }

        try {
            $test = $liveTestService->createTest($data, $settings->deliverabilityTestConfig());

            return response()->json([
                'test' => [
                    'id' => $test->public_id,
                    'recipient_address' => $test->test_recipient,
                    'subject_line' => $test->expected_subject,
                    'instructions' => 'Send a real email from the sender address you want to test to this generated address. You can use the suggested subject line or your own realistic campaign subject.',
                ],
            ]);
        } catch (\RuntimeException $exception) {
            return response()->json(['message' => $exception->getMessage()], 422);
        }
    }

    public function emailDeliverabilityPollLiveTest(
        Request $request,
        SiteSettingsManager $settings,
        EmailDeliverabilityLiveTestService $liveTestService,
        EmailDeliverabilityService $deliverabilityService,
        AiService $aiService
    ): JsonResponse {
        $testId = trim((string) $request->string('testId'));

        if ($testId === '') {
            return response()->json(['message' => 'Missing live test reference.'], 422);
        }

        $test = EmailDeliverabilityTest::query()->where('public_id', $testId)->first();

        if (! $test) {
            return response()->json(['message' => 'Live test not found.'], 404);
        }

        try {
            $test = $liveTestService->pollAndProcess(
                $test,
                $settings->deliverabilityTestConfig(),
                $deliverabilityService,
                $settings->businessNameAiConfig(),
                $aiService
            );
        } catch (\RuntimeException $exception) {
            return response()->json(['message' => $exception->getMessage()], 502);
        }

        if ($test->status !== 'completed' || ! is_array($test->report)) {
            return response()->json([
                'status' => $test->status,
            ]);
        }

        return response()->json([
            'status' => 'completed',
            'report' => $test->report,
            'provider' => $test->meta['summary_provider'] ?? 'system',
        ]);
    }

    public function emailDeliverabilityPostmarkWebhook(
        Request $request,
        string $token,
        SiteSettingsManager $settings,
        EmailDeliverabilityLiveTestService $liveTestService,
        EmailDeliverabilityService $deliverabilityService,
        AiService $aiService
    ): JsonResponse {
        try {
            $test = $liveTestService->captureFromPostmark(
                $request->all(),
                $token,
                $settings->deliverabilityTestConfig(),
                $deliverabilityService,
                $settings->businessNameAiConfig(),
                $aiService
            );

            return response()->json([
                'accepted' => true,
                'matched' => $test !== null,
            ]);
        } catch (\RuntimeException $exception) {
            return response()->json(['message' => $exception->getMessage()], 403);
        }
    }

    private function extractCruxMetric(array $metrics, string $key): ?array
    {
        $metric = $metrics[$key] ?? null;

        if (! is_array($metric)) {
            return null;
        }

        return [
            'percentile' => $metric['percentiles']['p75'] ?? null,
            'histogram' => $metric['histogram'] ?? [],
            'good' => $metric['histogram'][0]['density'] ?? null,
            'needsImprovement' => $metric['histogram'][1]['density'] ?? null,
            'poor' => $metric['histogram'][2]['density'] ?? null,
        ];
    }

    private function queryCrux(string $apiKey, array $payload): array
    {
        $response = Http::timeout(30)->post(
            'https://chromeuxreport.googleapis.com/v1/records:queryRecord?key=' . urlencode($apiKey),
            $payload
        );

        if ($response->successful()) {
            return [
                'ok' => true,
                'not_found' => false,
                'record' => $response->json('record', []),
            ];
        }

        $notFound = $response->status() === 404
            && str_contains(strtolower((string) $response->json('error.message', '')), 'data not found');

        return [
            'ok' => false,
            'not_found' => $notFound,
            'record' => [],
        ];
    }

    private function transformCruxRecord(array $record, string $source): array
    {
        $metrics = $record['metrics'] ?? [];

        return [
            'source' => $source,
            'key' => $record['key'] ?? [],
            'lcp' => $this->extractCruxMetric($metrics, 'largest_contentful_paint'),
            'cls' => $this->extractCruxMetric($metrics, 'cumulative_layout_shift'),
            'inp' => $this->extractCruxMetric($metrics, 'interaction_to_next_paint'),
            'collectionPeriod' => $record['collectionPeriod'] ?? null,
        ];
    }

    private function originFromUrl(string $url): ?string
    {
        $parts = parse_url($url);

        if (! is_array($parts) || empty($parts['scheme']) || empty($parts['host'])) {
            return null;
        }

        $origin = $parts['scheme'] . '://' . $parts['host'];

        if (! empty($parts['port'])) {
            $origin .= ':' . $parts['port'];
        }

        return $origin;
    }

    private function buildRecommendationPrompt(array $signals, array $scores): string
    {
        $url            = $signals['url'] ?? 'unknown';
        $title          = $signals['title']['content'] ?? 'none';
        $metaDesc       = $signals['metaDesc']['content'] ?? 'none';
        $h1Count        = count($signals['h1s'] ?? []);
        $wordCount      = $signals['wordCount'] ?? 0;
        $isHTTPS        = ! empty($signals['isHTTPS']) ? 'yes' : 'no';
        $schemaCount    = $signals['schema']['count'] ?? 0;
        $hasOgImage     = ! empty($signals['og']['image']) ? 'yes' : 'no';
        $hasCanonical   = ! empty($signals['canonical']) ? 'yes' : 'no';
        $missingAlt     = $signals['images']['withoutAlt'] ?? 0;
        $overall        = $scores['overall'] ?? 0;
        $metaScore      = $scores['meta'] ?? 0;
        $contentScore   = $scores['content'] ?? 0;
        $technicalScore = $scores['technical'] ?? 0;
        $socialScore    = $scores['social'] ?? 0;

        return <<<PROMPT
You are an SEO expert. Analyse the following website audit data and return a JSON array of prioritised recommendations.

URL: {$url}
Overall SEO Score: {$overall}/100
Category Scores: Meta={$metaScore}, Content={$contentScore}, Technical={$technicalScore}, Social={$socialScore}

Key signals:
- Title tag: {$title}
- Meta description: {$metaDesc}
- H1 count: {$h1Count}
- Word count: {$wordCount}
- HTTPS: {$isHTTPS}
- Schema markup blocks: {$schemaCount}
- Has OG image: {$hasOgImage}
- Has canonical tag: {$hasCanonical}
- Images missing alt text: {$missingAlt}

Return ONLY a valid JSON array (no markdown, no explanation, no code fences) with up to 6 recommendations in exactly this structure:
[{"priority":"critical|high|medium|low","category":"Meta Tags|Content|Technical|Schema|Social|Performance","title":"Short action title","description":"1-2 sentence fix explanation.","impact":"One sentence on why this matters."}]
PROMPT;
    }

    private function buildWebsiteBriefPrompt(array $data): string
    {
        $refNumber = 'WB-' . now()->format('Y') . '-' . str_pad((string) random_int(1, 999), 3, '0', STR_PAD_LEFT);
        $pages = implode(', ', $data['pages']);
        $features = $data['features'] !== [] ? implode(', ', $data['features']) : 'Standard brochure-site functionality';
        $location = $data['bizLocation'] !== '' ? $data['bizLocation'] : 'Nigeria';
        $currentWebsite = $data['bizCurrentUrl'] !== '' ? $data['bizCurrentUrl'] : 'None';
        $competitors = $data['bizCompetitors'] !== '' ? $data['bizCompetitors'] : 'Not provided';
        $successMetrics = $data['successMetrics'] !== '' ? $data['successMetrics'] : 'To be defined';
        $stakeholders = $data['stakeholders'] !== '' ? $data['stakeholders'] : 'Not provided';
        $contentStatus = $data['contentStatus'] !== '' ? $data['contentStatus'] : 'Not specified';
        $copywriting = $data['copywriting'] !== '' ? $data['copywriting'] : 'Not specified';
        $specialPages = $data['specialPages'] !== '' ? $data['specialPages'] : 'None specified';
        $sitesLove = $data['sitesLove'] !== '' ? $data['sitesLove'] : 'None provided';
        $sitesAvoid = $data['sitesAvoid'] !== '' ? $data['sitesAvoid'] : 'None provided';
        $designNotes = $data['designNotes'] !== '' ? $data['designNotes'] : 'None';
        $platform = $data['platform'] !== '' ? $data['platform'] : 'No preference';
        $domainStatus = $data['domainStatus'] !== '' ? $data['domainStatus'] : 'Not specified';
        $hosting = $data['hosting'] !== '' ? $data['hosting'] : 'Not specified';
        $existingTools = $data['existingTools'] !== '' ? $data['existingTools'] : 'None specified';
        $seoReq = $data['seoReq'] !== '' ? $data['seoReq'] : 'Standard SEO setup';
        $extraNotes = $data['extraNotes'] !== '' ? $data['extraNotes'] : 'None';
        $brandColors = $data['noBrandColors']
            ? 'No brand colours yet. The design team should propose a suitable palette.'
            : sprintf(
                'Primary %s, Accent %s, Background %s',
                $data['colors']['primary'] ?: 'not provided',
                $data['colors']['accent'] ?: 'not provided',
                $data['colors']['bg'] ?: 'not provided'
            );

        return <<<PROMPT
Generate a comprehensive website project brief for this client. Return ONLY a valid JSON object with this exact structure:

{
  "refNumber": "{$refNumber}",
  "executiveSummary": "string",
  "sections": [
    {
      "number": "01",
      "title": "Business Overview",
      "paragraphs": ["string", "string"],
      "table": [{"key": "string", "value": "string"}]
    }
  ],
  "siteArchitecture": {
    "description": "string",
    "pages": [{"name": "string", "purpose": "string"}]
  },
  "featureRequirements": {
    "mustHave": ["string"],
    "niceToHave": ["string"],
    "outOfScope": ["string"]
  },
  "timeline": [
    {"phase": "string", "duration": "string", "deliverables": ["string"]}
  ],
  "budgetGuidance": "string",
  "nextSteps": ["string", "string", "string", "string"]
}

Rules:
- Return no markdown, no prose outside JSON, and no extra top-level keys.
- The "sections" array must contain exactly these 7 sections in this order:
  1. Business Overview
  2. Target Audience
  3. Project Objectives & Success Metrics
  4. Design & Brand Direction
  5. Technical Architecture
  6. Content Strategy & SEO
  7. Risk Considerations
- Make every section specific to this client's inputs. Mention the business name, industry, target audience, and goals directly.
- Keep the writing professional, practical, and useful for a design and development team.
- Site architecture pages should reflect the selected pages and explain why each one matters.
- Feature requirements should separate must-have, nice-to-have, and out-of-scope items realistically based on the client's budget and timeline.
- Timeline should be plausible for the stated budget and urgency.

CLIENT DATA
Business: {$data['bizName']}
Industry: {$data['bizIndustry']}
Business description: {$data['bizDesc']}
Target audience: {$data['bizAudience']}
Location/market: {$location}
Current website: {$currentWebsite}
Competitors: {$competitors}

PROJECT GOALS
Website type: {$data['websiteType']}
Primary goal: {$data['primaryGoal']}
Success metrics: {$successMetrics}
Stakeholders: {$stakeholders}

CONTENT & PAGES
Selected pages: {$pages}
Content status: {$contentStatus}
Copywriting needs: {$copywriting}
Special pages/sections: {$specialPages}

DESIGN
Visual style: {$data['visualStyle']}
Brand colours: {$brandColors}
Reference sites liked: {$sitesLove}
Reference sites to avoid: {$sitesAvoid}
Additional design notes: {$designNotes}

FEATURES & TECH
Requested features: {$features}
Platform preference: {$platform}
Domain status: {$domainStatus}
Hosting preference: {$hosting}
Existing tools/integrations: {$existingTools}
SEO requirements: {$seoReq}

DELIVERY
Timeline: {$data['timeline']}
Budget: {$data['budget']}
Additional notes: {$extraNotes}
PROMPT;
    }

    private function looksLikeEmailOrDomain(string $input): bool
    {
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return preg_match('/^(?:[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?\.)+[a-z]{2,}$/i', $input) === 1;
    }

    private function buildDomainNamePrompt(array $input): string
    {
        $description = trim((string) ($input['description'] ?? ''));
        $keywords = trim((string) ($input['keywords'] ?? ''));
        $mustInclude = trim((string) ($input['must_include'] ?? ''));
        $style = trim((string) ($input['style'] ?? 'Any'));
        $maxLength = trim((string) ($input['max_length'] ?? 'any'));
        $tlds = collect($input['tlds'] ?? [])->map(fn ($tld) => trim((string) $tld))->filter()->values()->all();

        $tldString = implode(', ', $tlds);
        $lengthRule = $maxLength === 'any'
            ? 'any length is acceptable'
            : "maximum {$maxLength} characters for the name part (before the TLD)";
        $styleRule = $style === 'Any'
            ? 'mix of brandable, keyword-rich, short, and creative names'
            : 'names that are specifically ' . strtolower($style);

        return <<<PROMPT
Generate exactly 12 domain name suggestions for the following business:

Description: {$description}
Keywords/inspiration: {$keywords}
Must include this word or root: {$mustInclude}
Preferred TLDs to use: {$tldString}
Domain style: {$styleRule}
Length limit: {$lengthRule}

Rules:
- Assign each domain the most appropriate TLD from the preferred list
- Use .com first when suitable, but use other TLDs when they better suit the brand or create a clever hack
- Names must be memorable, pronounceable, spell-check friendly, and not obvious trademarks
- Vary the styles: some short, some brandable invented words, some keyword combos, 1-2 creative domain hacks if suitable
- For Nigerian market domains (.ng, .co.ng, .com.ng), include 2-3 if those TLDs are selected
- Score each domain out of 100 based on memorability, pronounceability, brandability, and length

Return ONLY a valid JSON array of exactly 12 objects. No markdown, no text outside the JSON array. Each object must have:
- "domain": string (name part only, lowercase, no spaces)
- "tld": string (with leading dot)
- "full": string (complete domain)
- "type": string (one of: Brandable, Keyword-rich, Short, Creative, Exact Match, Hack)
- "score": number (0-100)
- "length": number
- "explanation": string (2-3 sentences)
- "tags": array of 2-4 strings
- "altTLDs": array of 2-4 alternative TLD strings chosen from the preferred TLDs
- "isHack": boolean
- "hackNote": string or null
PROMPT;
    }

    private function toolPage(string $slug, string $view): View
    {
        $tool = $this->findTool($slug);

        return view($view, [
            'tool' => $tool,
            'relatedTools' => $this->relatedTools($slug),
            'seo' => $this->seo(
                "{$tool['title']} | i2Medier Tools",
                $tool['description'],
                "/tools/{$tool['slug']}",
                'WebPage'
            ),
        ]);
    }

    private function relatedTools(string $slug): array
    {
        return collect($this->tools())
            ->reject(fn (array $tool): bool => $tool['slug'] === $slug)
            ->take(3)
            ->values()
            ->all();
    }

    private function findTool(string $slug): array
    {
        return $this->tools()[$slug] ?? abort(404);
    }

    private function tools(): array
    {
        return [
            'free-seo-audit' => [
                'slug' => 'free-seo-audit',
                'title' => 'Free SEO Audit',
                'route' => 'tools.seo-audit',
                'description' => 'Run a free SEO audit on any webpage. Check title tags, meta descriptions, headings, Core Web Vitals, schema, and 50+ signals instantly. No sign-up.',
                'summary' => 'Run a quick SEO health check across titles, meta tags, headings, response speed, and crawlability basics.',
                'label' => 'FREE TOOL',
                'gate' => true,
                'features' => [
                    'Review title, meta description, H1, H2, canonical, and robots signals',
                    'Check images without alt text and basic crawl file availability',
                    'See a simple score with fast, practical improvement cues',
                ],
                'steps' => [
                    'Enter a publicly accessible URL.',
                    'We review key SEO signals and render your audit summary.',
                    'Unlock the full result with your email if you want the detailed breakdown.',
                ],
            ],
            'website-cost-calculator' => [
                'slug' => 'website-cost-calculator',
                'title' => 'Website Cost Calculator',
                'route' => 'tools.cost-calculator',
                'description' => 'Estimate your website development cost instantly. Configure type, pages, and features — real-time pricing for your project. Free, no sign-up needed.',
                'summary' => 'Get a guided cost range for brochure sites, business websites, e-commerce builds, and custom applications.',
                'label' => 'FREE TOOL',
                'gate' => true,
                'features' => [
                    'Choose the kind of website or application you need',
                    'Layer on features like bookings, payments, and motion',
                    'See an estimated project range plus possible monthly care costs',
                ],
                'steps' => [
                    'Select the closest project type and required features.',
                    'The estimate updates as you change scope.',
                    'Unlock the final range with your email if you want to keep the result.',
                ],
            ],
            'business-name-generator' => [
                'slug' => 'business-name-generator',
                'title' => 'Business Name Generator',
                'route' => 'tools.business-name-generator',
                'description' => 'Generate brandable business name ideas with AI. Describe your business, pick a style and market, and get unique company name ideas in seconds. Free.',
                'summary' => 'Blend keywords, prefixes, suffixes, and industry cues to produce practical naming ideas for modern businesses.',
                'label' => 'FREE TOOL',
                'gate' => true,
                'features' => [
                    'Mix user keywords with curated business naming patterns',
                    'Support industry-aware name variants',
                    'See a batch of reusable, copy-friendly suggestions',
                ],
                'steps' => [
                    'Enter your keyword and choose an industry.',
                    'Generate a fresh set of naming combinations.',
                    'Unlock the result list with your email if you want to keep exploring.',
                ],
            ],
            'domain-name-generator' => [
                'slug' => 'domain-name-generator',
                'title' => 'Domain Name Generator',
                'route' => 'tools.domain-name-generator',
                'description' => 'Generate domain name ideas using AI. Explore .com, .ng, and other TLD options instantly. Free AI domain name generator — no account needed.',
                'summary' => 'Generate domain ideas from your naming direction and explore common TLD variants for business use.',
                'label' => 'FREE TOOL',
                'gate' => true,
                'features' => [
                    'Create domain variants from business name ideas',
                    'Try multiple TLD combinations including `.ng` and `.com.ng`',
                    'Flag options that may be too long to remember easily',
                ],
                'steps' => [
                    'Add your keyword and preferred industry or naming angle.',
                    'Generate domain-friendly variations with different TLDs.',
                    'Unlock the shortlist with your email and continue checking ideas.',
                ],
            ],
            'website-brief-generator' => [
                'slug' => 'website-brief-generator',
                'title' => 'Website Brief Generator',
                'route' => 'tools.website-brief-generator',
                'description' => 'Create a professional website brief in minutes using AI. Answer questions about your goals, pages, and budget — get a ready-to-share brief document. Free.',
                'summary' => 'Capture business context, website goals, pages, style direction, budget, and timeline in one cleaner brief.',
                'label' => 'FREE TOOL',
                'gate' => true,
                'features' => [
                    'Walk through business info, goals, and scope in clear steps',
                    'Generate a tidy, professional brief format',
                    'Prepare a stronger starting point for real web projects',
                ],
                'steps' => [
                    'Fill in your business context and website goals.',
                    'Choose pages, style direction, budget, and timing.',
                    'Unlock the final brief with your email and print or share it.',
                ],
            ],
            'whatsapp-link-generator' => [
                'slug' => 'whatsapp-link-generator',
                'title' => 'WhatsApp Link Generator',
                'route' => 'tools.whatsapp-link-generator',
                'description' => 'Generate a WhatsApp click-to-chat link with a pre-filled message instantly. Works for any phone number worldwide. Copy, share, and use anywhere. Free.',
                'summary' => 'Build a ready-to-share WhatsApp link with country code handling, copy support, and QR-ready output.',
                'label' => 'FREE TOOL',
                'gate' => false,
                'features' => [
                    'Generate click-to-chat links for local or international numbers',
                    'Add a pre-filled message for sales or support flows',
                    'Copy and reuse the final link across your channels',
                ],
                'steps' => [
                    'Choose a country code and enter the phone number.',
                    'Add an optional pre-filled message.',
                    'Copy the generated link and use it on your website or campaigns.',
                ],
            ],
            'email-deliverability-checker' => [
                'slug' => 'email-deliverability-checker',
                'title' => 'Email Deliverability Checker',
                'route' => 'tools.email-deliverability-checker',
                'description' => 'Check your email deliverability free. Tests SPF, DKIM, DMARC, blacklist status, PTR records, and sender reputation. Get a full action plan in under a minute.',
                'summary' => 'Run a practical deliverability audit for an email address or domain and get a clearer action plan for inbox placement.',
                'label' => 'FREE TOOL',
                'gate' => false,
                'features' => [
                    'Review DNS, SPF, DKIM, DMARC, blacklist, and reputation signals',
                    'Get a simple score with realistic inbox placement guidance',
                    'See practical recommendations to improve deliverability',
                ],
                'steps' => [
                    'Enter an email address or domain and choose your audit focus.',
                    'We analyse key deliverability signals and simulate likely inbox outcomes.',
                    'Review the score, checks, recommendations, and inbox preview.',
                ],
            ],
            'invoice-generator' => [
                'slug' => 'invoice-generator',
                'title' => 'Invoice Generator',
                'route' => 'tools.invoice-generator',
                'description' => 'Create professional PDF invoices free. Add line items, tax, bank details, and download as PDF instantly. Multi-currency support for businesses worldwide.',
                'summary' => 'Build an invoice with sender details, client details, line items, tax, totals, and a clean print layout.',
                'label' => 'FREE TOOL',
                'gate' => false,
                'features' => [
                    'Add sender, client, dates, line items, and notes',
                    'Calculate subtotal, tax, and total in real time',
                    'Print or export the invoice using the browser print flow',
                ],
                'steps' => [
                    'Fill in the invoice header and client details.',
                    'Add your billable items and optional tax.',
                    'Review the layout and print or save as PDF.',
                ],
            ],
        ];
    }

    private function seo(string $title, string $description, string $path, string $schemaType): array
    {
        return [
            'title' => $title,
            'description' => $description,
            'keywords' => 'free business tools, free SEO audit, website cost calculator, business name generator, domain name generator, website brief generator, WhatsApp link generator, email deliverability checker, invoice generator',
            'robots' => 'index,follow',
            'author' => 'i2Medier',
            'url' => url($path),
            'og_type' => 'website',
            'schema_type' => $schemaType,
        ];
    }
}
