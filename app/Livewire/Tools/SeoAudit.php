<?php

namespace App\Livewire\Tools;

use App\Models\ToolLead;
use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SeoAudit extends Component
{
    public string $url = '';
    public array $results = [];
    public int $score = 0;
    public string $error = '';
    public bool $emailSubmitted = false;
    public string $email = '';
    public string $emailError = '';

    protected array $rules = ['url' => 'required|url'];

    public function audit(): void
    {
        $this->error = '';
        $this->results = [];
        $this->emailSubmitted = false;
        $this->validate();

        $start = microtime(true);

        try {
            $response = Http::timeout(10)->get($this->url);
        } catch (\Exception) {
            $this->error = "We couldn't reach that URL. Check it's publicly accessible and try again.";
            return;
        }

        if (! $response->successful()) {
            $this->error = "We couldn't reach that URL. Check it's publicly accessible and try again.";
            return;
        }

        $responseTime = (int) ((microtime(true) - $start) * 1000);

        $dom = new DOMDocument();
        @$dom->loadHTML($response->body());
        $xpath = new DOMXPath($dom);

        $this->results = $this->runChecks($xpath, $responseTime);
        $this->score = $this->calculateScore($this->results);
    }

    private function runChecks(DOMXPath $xpath, int $responseTime): array
    {
        $base = rtrim(
            parse_url($this->url, PHP_URL_SCHEME) . '://' . parse_url($this->url, PHP_URL_HOST),
            '/'
        );

        return [
            $this->checkTitle($xpath),
            $this->checkMetaDescription($xpath),
            $this->checkH1($xpath),
            $this->checkH2($xpath),
            $this->checkCanonical($xpath),
            $this->checkRobotsMeta($xpath),
            $this->checkImagesAlt($xpath),
            $this->checkResponseTime($responseTime),
            $this->checkRobotsTxt($base),
            $this->checkSitemap($base),
        ];
    }

    private function checkTitle(DOMXPath $xpath): array
    {
        $titles = $xpath->query('//title');
        if ($titles->length === 0) {
            return ['name' => 'Title tag', 'status' => 'fail', 'message' => 'Missing title tag'];
        }
        $len = mb_strlen(trim($titles->item(0)->textContent));
        if ($len >= 50 && $len <= 60) {
            return ['name' => 'Title tag', 'status' => 'pass', 'message' => "Good length ({$len} chars)"];
        }
        return ['name' => 'Title tag', 'status' => 'warn', 'message' => "Length {$len} chars (ideal: 50–60)"];
    }

    private function checkMetaDescription(DOMXPath $xpath): array
    {
        $nodes = $xpath->query('//meta[@name="description"]/@content');
        if ($nodes->length === 0) {
            return ['name' => 'Meta description', 'status' => 'fail', 'message' => 'Missing meta description'];
        }
        $len = mb_strlen(trim($nodes->item(0)->textContent));
        if ($len >= 120 && $len <= 160) {
            return ['name' => 'Meta description', 'status' => 'pass', 'message' => "Good length ({$len} chars)"];
        }
        return ['name' => 'Meta description', 'status' => 'warn', 'message' => "Length {$len} chars (ideal: 120–160)"];
    }

    private function checkH1(DOMXPath $xpath): array
    {
        $h1s = $xpath->query('//h1');
        if ($h1s->length === 0) {
            return ['name' => 'H1 tag', 'status' => 'fail', 'message' => 'No H1 found'];
        }
        if ($h1s->length === 1) {
            return ['name' => 'H1 tag', 'status' => 'pass', 'message' => 'Exactly 1 H1 found'];
        }
        return ['name' => 'H1 tag', 'status' => 'warn', 'message' => "{$h1s->length} H1 tags found (ideal: exactly 1)"];
    }

    private function checkH2(DOMXPath $xpath): array
    {
        $h2s = $xpath->query('//h2');
        if ($h2s->length >= 1) {
            return ['name' => 'H2 tags', 'status' => 'pass', 'message' => "{$h2s->length} H2 tag(s) found"];
        }
        return ['name' => 'H2 tags', 'status' => 'fail', 'message' => 'No H2 tags found'];
    }

    private function checkCanonical(DOMXPath $xpath): array
    {
        $canonical = $xpath->query('//link[@rel="canonical"]');
        if ($canonical->length > 0) {
            return ['name' => 'Canonical tag', 'status' => 'pass', 'message' => 'Canonical tag present'];
        }
        return ['name' => 'Canonical tag', 'status' => 'fail', 'message' => 'No canonical tag found'];
    }

    private function checkRobotsMeta(DOMXPath $xpath): array
    {
        $nodes = $xpath->query('//meta[@name="robots"]/@content');
        if ($nodes->length > 0 && str_contains(strtolower($nodes->item(0)->textContent), 'noindex')) {
            return ['name' => 'Robots meta', 'status' => 'fail', 'message' => 'noindex found — page blocked from search'];
        }
        return ['name' => 'Robots meta', 'status' => 'pass', 'message' => 'Not blocking indexing'];
    }

    private function checkImagesAlt(DOMXPath $xpath): array
    {
        $images = $xpath->query('//img');
        $missing = 0;
        foreach ($images as $img) {
            if (! $img->hasAttribute('alt') || trim($img->getAttribute('alt')) === '') {
                $missing++;
            }
        }
        if ($missing === 0) {
            return ['name' => 'Images without alt', 'status' => 'pass', 'message' => 'All images have alt text'];
        }
        if ($missing <= 3) {
            return ['name' => 'Images without alt', 'status' => 'warn', 'message' => "{$missing} image(s) missing alt text"];
        }
        return ['name' => 'Images without alt', 'status' => 'fail', 'message' => "{$missing} images missing alt text"];
    }

    private function checkResponseTime(int $ms): array
    {
        if ($ms < 1000) {
            return ['name' => 'Response time', 'status' => 'pass', 'message' => "{$ms}ms"];
        }
        if ($ms <= 2500) {
            return ['name' => 'Response time', 'status' => 'warn', 'message' => "{$ms}ms (target: under 1000ms)"];
        }
        return ['name' => 'Response time', 'status' => 'fail', 'message' => "{$ms}ms (slow — target: under 1000ms)"];
    }

    private function checkRobotsTxt(string $base): array
    {
        try {
            $r = Http::timeout(5)->get("{$base}/robots.txt");
            if ($r->successful()) {
                return ['name' => 'robots.txt', 'status' => 'pass', 'message' => 'robots.txt found'];
            }
        } catch (\Exception) {
        }
        return ['name' => 'robots.txt', 'status' => 'fail', 'message' => 'robots.txt not found or unreachable'];
    }

    private function checkSitemap(string $base): array
    {
        try {
            $r = Http::timeout(5)->get("{$base}/sitemap.xml");
            if ($r->successful()) {
                return ['name' => 'sitemap.xml', 'status' => 'pass', 'message' => 'sitemap.xml found'];
            }
        } catch (\Exception) {
        }
        return ['name' => 'sitemap.xml', 'status' => 'fail', 'message' => 'sitemap.xml not found or unreachable'];
    }

    private function calculateScore(array $results): int
    {
        return array_sum(array_map(
            fn (array $c): int => match ($c['status']) { 'pass' => 10, 'warn' => 5, default => 0 },
            $results
        ));
    }

    public function submitEmail(): void
    {
        $this->emailError = '';
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->emailError = 'Enter a valid email address.';
            return;
        }
        ToolLead::create(['tool' => 'free-seo-audit', 'email' => $this->email, 'ip' => request()->ip()]);
        $this->emailSubmitted = true;
    }

    public function render()
    {
        return view('livewire.tools.seo-audit');
    }
}
