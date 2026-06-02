# Tools Hub Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Implement interactive logic for all 7 tools in the i2Medier tools hub — four Livewire server-side tools and three Alpine.js client-side tools — including the email blur-gate lead capture on the five gated tools.

**Architecture:** Each tool lives in its own Livewire component (PHP class + Blade view) or as Alpine.js inline in the tool's Blade view. All gated Livewire tools expose `$emailSubmitted` + `submitEmail()` and conditionally apply `tool-result--blurred`. The gated Alpine tool (Cost Calculator) POSTs to `POST /tools/leads` via `fetch()`. The `ToolController`, routes, CSS, `ToolLead` model, and migration are already in place — only the interactive layer is missing.

**Tech Stack:** Laravel 11, Livewire 3, Alpine.js 3, PHPUnit 12, `Illuminate\Support\Facades\Http` (with `Http::fake()` in tests), PHP DOMDocument for HTML parsing.

---

## File Map

| Action | File |
|---|---|
| Modify | `app/Livewire/Tools/SeoAudit.php` |
| Modify | `resources/views/livewire/tools/seo-audit.blade.php` |
| Modify | `resources/views/tools/seo-audit.blade.php` |
| Modify | `app/Livewire/Tools/BusinessNameGenerator.php` |
| Modify | `resources/views/livewire/tools/business-name-generator.blade.php` |
| Modify | `resources/views/tools/business-name-generator.blade.php` |
| Modify | `app/Livewire/Tools/DomainNameGenerator.php` |
| Modify | `resources/views/livewire/tools/domain-name-generator.blade.php` |
| Modify | `resources/views/tools/domain-name-generator.blade.php` |
| Modify | `app/Livewire/Tools/WebsiteBriefGenerator.php` |
| Modify | `resources/views/livewire/tools/website-brief-generator.blade.php` |
| Modify | `resources/views/tools/website-brief-generator.blade.php` |
| Modify | `resources/views/tools/cost-calculator.blade.php` |
| Modify | `resources/views/tools/whatsapp-link-generator.blade.php` |
| Modify | `resources/views/tools/invoice-generator.blade.php` |
| Create | `tests/Feature/Tools/ToolRoutesTest.php` |
| Create | `tests/Feature/Tools/StoreLeadTest.php` |
| Create | `tests/Feature/Tools/SeoAuditTest.php` |
| Create | `tests/Feature/Tools/BusinessNameGeneratorTest.php` |
| Create | `tests/Feature/Tools/DomainNameGeneratorTest.php` |
| Create | `tests/Feature/Tools/WebsiteBriefGeneratorTest.php` |

---

## Task 0: Run migration and verify routes

**Files:**
- No code changes — just environment setup and a test to confirm the baseline

- [ ] **Step 1: Run the migration**

```bash
cd /Users/okoma/i2medier && php artisan migrate
```

Expected: `Migrating: 2026_06_01_000002_create_tool_leads_table` then `Migrated`.

- [ ] **Step 2: Write failing route smoke tests**

Create `tests/Feature/Tools/ToolRoutesTest.php`:

```php
<?php

namespace Tests\Feature\Tools;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToolRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_hub_returns_200(): void
    {
        $this->get('/tools')->assertStatus(200);
    }

    public function test_seo_audit_returns_200(): void
    {
        $this->get('/tools/free-seo-audit')->assertStatus(200);
    }

    public function test_cost_calculator_returns_200(): void
    {
        $this->get('/tools/website-cost-calculator')->assertStatus(200);
    }

    public function test_business_name_generator_returns_200(): void
    {
        $this->get('/tools/business-name-generator')->assertStatus(200);
    }

    public function test_domain_name_generator_returns_200(): void
    {
        $this->get('/tools/domain-name-generator')->assertStatus(200);
    }

    public function test_website_brief_generator_returns_200(): void
    {
        $this->get('/tools/website-brief-generator')->assertStatus(200);
    }

    public function test_whatsapp_link_generator_returns_200(): void
    {
        $this->get('/tools/whatsapp-link-generator')->assertStatus(200);
    }

    public function test_invoice_generator_returns_200(): void
    {
        $this->get('/tools/invoice-generator')->assertStatus(200);
    }
}
```

- [ ] **Step 3: Write failing storeLead tests**

Create `tests/Feature/Tools/StoreLeadTest.php`:

```php
<?php

namespace Tests\Feature\Tools;

use App\Models\ToolLead;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreLeadTest extends TestCase
{
    use RefreshDatabase;

    public function test_stores_valid_lead(): void
    {
        $this->postJson('/tools/leads', [
            'tool' => 'free-seo-audit',
            'email' => 'test@example.com',
        ])->assertJson(['success' => true]);

        $this->assertDatabaseHas('tool_leads', [
            'tool' => 'free-seo-audit',
            'email' => 'test@example.com',
        ]);
    }

    public function test_rejects_invalid_email(): void
    {
        $this->postJson('/tools/leads', [
            'tool' => 'free-seo-audit',
            'email' => 'not-an-email',
        ])->assertStatus(422)->assertJson(['success' => false]);

        $this->assertDatabaseEmpty('tool_leads');
    }

    public function test_rejects_unknown_tool(): void
    {
        $this->postJson('/tools/leads', [
            'tool' => 'fake-tool',
            'email' => 'test@example.com',
        ])->assertStatus(422)->assertJson(['success' => false]);
    }
}
```

- [ ] **Step 4: Run the tests — expect failures on routes (Livewire not wired yet)**

```bash
php artisan test tests/Feature/Tools/ToolRoutesTest.php tests/Feature/Tools/StoreLeadTest.php --stop-on-failure
```

StoreLeadTest should pass. ToolRoutesTest may pass (scaffold views render) or fail. Note any failures and proceed.

- [ ] **Step 5: Commit**

```bash
git add tests/Feature/Tools/ToolRoutesTest.php tests/Feature/Tools/StoreLeadTest.php
git commit -m "test: add tool route smoke tests and storeLead feature test"
```

---

## Task 1: SEO Audit Livewire Component

**Files:**
- Modify: `app/Livewire/Tools/SeoAudit.php`
- Modify: `resources/views/livewire/tools/seo-audit.blade.php`
- Modify: `resources/views/tools/seo-audit.blade.php`
- Create: `tests/Feature/Tools/SeoAuditTest.php`

- [ ] **Step 1: Write failing Livewire tests**

Create `tests/Feature/Tools/SeoAuditTest.php`:

```php
<?php

namespace Tests\Feature\Tools;

use App\Livewire\Tools\SeoAudit;
use App\Models\ToolLead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class SeoAuditTest extends TestCase
{
    use RefreshDatabase;

    private function fakeHtml(array $overrides = []): string
    {
        $title = $overrides['title'] ?? '<title>Good Title For Testing Here</title>';
        $meta = $overrides['meta'] ?? '<meta name="description" content="This is a good meta description that is between one hundred and twenty and one sixty characters exactly here yes.">';
        $h1 = $overrides['h1'] ?? '<h1>Heading One</h1>';
        $h2 = $overrides['h2'] ?? '<h2>Heading Two</h2>';
        $canonical = $overrides['canonical'] ?? '<link rel="canonical" href="https://example.com">';
        $robots = $overrides['robots'] ?? '';
        $imgs = $overrides['imgs'] ?? '<img src="a.jpg" alt="good">';

        return "<!DOCTYPE html><html><head>{$title}{$meta}{$canonical}{$robots}</head><body>{$h1}{$h2}{$imgs}</body></html>";
    }

    public function test_audit_passes_with_good_html(): void
    {
        Http::fake([
            'example.com' => Http::response($this->fakeHtml(), 200),
            'example.com/robots.txt' => Http::response('User-agent: *', 200),
            'example.com/sitemap.xml' => Http::response('<sitemap/>', 200),
        ]);

        $component = Livewire::test(SeoAudit::class)
            ->set('url', 'https://example.com')
            ->call('audit');

        $component->assertSet('error', '');
        $component->assertSet('score', 100);
    }

    public function test_audit_fails_on_unreachable_url(): void
    {
        Http::fake(['*' => Http::response(null, 500)]);

        $component = Livewire::test(SeoAudit::class)
            ->set('url', 'https://example.com')
            ->call('audit');

        $component->assertSet('error', "We couldn't reach that URL. Check it's publicly accessible and try again.");
        $component->assertSet('results', []);
    }

    public function test_audit_detects_missing_title(): void
    {
        Http::fake([
            'example.com' => Http::response($this->fakeHtml(['title' => '']), 200),
            'example.com/robots.txt' => Http::response('', 200),
            'example.com/sitemap.xml' => Http::response('', 200),
        ]);

        $component = Livewire::test(SeoAudit::class)
            ->set('url', 'https://example.com')
            ->call('audit');

        $results = $component->get('results');
        $title = collect($results)->firstWhere('name', 'Title tag');
        $this->assertEquals('fail', $title['status']);
    }

    public function test_audit_detects_noindex(): void
    {
        Http::fake([
            'example.com' => Http::response(
                $this->fakeHtml(['robots' => '<meta name="robots" content="noindex,nofollow">']),
                200
            ),
            'example.com/robots.txt' => Http::response('', 200),
            'example.com/sitemap.xml' => Http::response('', 200),
        ]);

        $component = Livewire::test(SeoAudit::class)
            ->set('url', 'https://example.com')
            ->call('audit');

        $results = $component->get('results');
        $robots = collect($results)->firstWhere('name', 'Robots meta');
        $this->assertEquals('fail', $robots['status']);
    }

    public function test_submit_email_stores_lead_and_unlocks(): void
    {
        Http::fake([
            'example.com' => Http::response($this->fakeHtml(), 200),
            'example.com/robots.txt' => Http::response('', 200),
            'example.com/sitemap.xml' => Http::response('', 200),
        ]);

        $component = Livewire::test(SeoAudit::class)
            ->set('url', 'https://example.com')
            ->call('audit')
            ->set('email', 'test@example.com')
            ->call('submitEmail');

        $component->assertSet('emailSubmitted', true);
        $this->assertDatabaseHas('tool_leads', ['tool' => 'free-seo-audit', 'email' => 'test@example.com']);
    }

    public function test_submit_email_rejects_bad_email(): void
    {
        $component = Livewire::test(SeoAudit::class)
            ->set('email', 'bad-email')
            ->call('submitEmail');

        $component->assertSet('emailSubmitted', false);
        $component->assertSet('emailError', 'Enter a valid email address.');
        $this->assertDatabaseEmpty('tool_leads');
    }
}
```

- [ ] **Step 2: Run tests — expect failures**

```bash
php artisan test tests/Feature/Tools/SeoAuditTest.php --stop-on-failure
```

Expected: all fail — component has no properties or actions.

- [ ] **Step 3: Implement SeoAudit.php**

Replace `app/Livewire/Tools/SeoAudit.php` entirely:

```php
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
```

- [ ] **Step 4: Implement the Livewire view**

Replace `resources/views/livewire/tools/seo-audit.blade.php` entirely:

```blade
<div>
    @if($error)
        <div class="tool-error">{{ $error }}</div>
    @endif

    <form wire:submit="audit" class="tool-form">
        <label>
            Website URL
            <input wire:model="url" id="seo-url" type="url" placeholder="https://example.com" required>
        </label>
        @error('url') <span class="tool-field-error">{{ $message }}</span> @enderror
        <button type="submit" wire:loading.attr="disabled" class="tools-button tools-button--dark">
            <span wire:loading.remove wire:target="audit">Run Audit</span>
            <span wire:loading wire:target="audit">Analysing…</span>
        </button>
    </form>

    @if(count($results))
        <div class="tool-result {{ $emailSubmitted ? '' : 'tool-result--blurred' }}">
            <div class="tool-score">
                <span class="tool-score__number">{{ $score }}/100</span>
                <span class="tool-score__label">SEO Score</span>
            </div>
            <div class="tool-checks">
                @foreach($results as $check)
                    <div class="tool-check tool-check--{{ $check['status'] }}">
                        <span class="tool-check__status-icon">
                            @if($check['status'] === 'pass') ✓
                            @elseif($check['status'] === 'warn') ⚠
                            @else ✗
                            @endif
                        </span>
                        <span class="tool-check__name">{{ $check['name'] }}</span>
                        <span class="tool-check__message">{{ $check['message'] }}</span>
                    </div>
                @endforeach
            </div>

            @if(!$emailSubmitted)
                <div class="tool-gate">
                    <strong>Your SEO audit is ready</strong>
                    <p>Enter your email to unlock the full breakdown.</p>
                    <div class="tool-gate__form">
                        <input wire:model="email" type="email" placeholder="you@example.com" class="tool-gate__input">
                        @if($emailError)
                            <span class="tool-field-error">{{ $emailError }}</span>
                        @endif
                        <button wire:click="submitEmail" type="button" class="tools-button tools-button--dark">Unlock Results →</button>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
```

- [ ] **Step 5: Wire the Livewire component into the tool page**

Replace `resources/views/tools/seo-audit.blade.php` entirely:

```blade
@extends('public.layouts.app')

@section('title', 'Free SEO Audit — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <livewire:tools.seo-audit />
    @endcomponent
@endsection
```

- [ ] **Step 6: Run tests — expect pass**

```bash
php artisan test tests/Feature/Tools/SeoAuditTest.php
```

Expected: all 5 tests pass.

- [ ] **Step 7: Commit**

```bash
git add app/Livewire/Tools/SeoAudit.php \
        resources/views/livewire/tools/seo-audit.blade.php \
        resources/views/tools/seo-audit.blade.php \
        tests/Feature/Tools/SeoAuditTest.php
git commit -m "feat: implement SEO audit Livewire component with scoring and email gate"
```

---

## Task 2: Business Name Generator

**Files:**
- Modify: `app/Livewire/Tools/BusinessNameGenerator.php`
- Modify: `resources/views/livewire/tools/business-name-generator.blade.php`
- Modify: `resources/views/tools/business-name-generator.blade.php`
- Create: `tests/Feature/Tools/BusinessNameGeneratorTest.php`

- [ ] **Step 1: Write failing tests**

Create `tests/Feature/Tools/BusinessNameGeneratorTest.php`:

```php
<?php

namespace Tests\Feature\Tools;

use App\Livewire\Tools\BusinessNameGenerator;
use App\Models\ToolLead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BusinessNameGeneratorTest extends TestCase
{
    use RefreshDatabase;

    public function test_generate_returns_names_from_keyword(): void
    {
        $component = Livewire::test(BusinessNameGenerator::class)
            ->set('keyword', 'Apex')
            ->set('industry', 'tech')
            ->call('generate');

        $names = $component->get('names');
        $this->assertNotEmpty($names);
        $this->assertGreaterThanOrEqual(20, count($names));
        $this->assertTrue(collect($names)->contains(fn ($n) => str_contains($n, 'Apex')));
    }

    public function test_generate_requires_keyword(): void
    {
        $component = Livewire::test(BusinessNameGenerator::class)
            ->set('keyword', '')
            ->call('generate');

        $component->assertHasErrors(['keyword']);
    }

    public function test_generate_deduplicates_names(): void
    {
        $component = Livewire::test(BusinessNameGenerator::class)
            ->set('keyword', 'test')
            ->set('industry', 'general')
            ->call('generate');

        $names = $component->get('names');
        $this->assertEquals(count($names), count(array_unique($names)));
    }

    public function test_submit_email_stores_lead_and_unlocks(): void
    {
        $component = Livewire::test(BusinessNameGenerator::class)
            ->set('keyword', 'Nova')
            ->call('generate')
            ->set('email', 'founder@example.ng')
            ->call('submitEmail');

        $component->assertSet('emailSubmitted', true);
        $this->assertDatabaseHas('tool_leads', ['tool' => 'business-name-generator', 'email' => 'founder@example.ng']);
    }

    public function test_submit_email_rejects_bad_email(): void
    {
        $component = Livewire::test(BusinessNameGenerator::class)
            ->set('email', 'not-valid')
            ->call('submitEmail');

        $component->assertSet('emailSubmitted', false);
        $component->assertSet('emailError', 'Enter a valid email address.');
    }
}
```

- [ ] **Step 2: Run tests — expect failures**

```bash
php artisan test tests/Feature/Tools/BusinessNameGeneratorTest.php
```

- [ ] **Step 3: Implement BusinessNameGenerator.php**

Replace `app/Livewire/Tools/BusinessNameGenerator.php` entirely:

```php
<?php

namespace App\Livewire\Tools;

use App\Models\ToolLead;
use Livewire\Component;

class BusinessNameGenerator extends Component
{
    public string $keyword = '';
    public string $industry = 'general';
    public array $names = [];
    public bool $emailSubmitted = false;
    public string $email = '';
    public string $emailError = '';

    protected array $rules = [
        'keyword' => 'required|string|max:50',
    ];

    private array $suffixes = [
        'Hub', 'Labs', 'Pro', 'HQ', 'Co', 'Group', 'Digital', 'Media',
        'Works', 'Agency', 'Studio', 'Solutions', 'Global', 'Connect',
        'Africa', 'Ng', 'Plus', 'Edge', '360', 'Partners',
    ];

    private array $prefixes = [
        'Smart', 'Prime', 'Swift', 'Bold', 'Peak', 'Apex', 'Nova', 'Nexus', 'Elite', 'Pure',
    ];

    private array $industryTerms = [
        'tech'        => ['Tech', 'Soft', 'Dev', 'Byte'],
        'finance'     => ['Fin', 'Pay', 'Vest', 'Cap'],
        'health'      => ['Health', 'Med', 'Care', 'Life'],
        'food'        => ['Food', 'Kitchen', 'Fresh', 'Eats'],
        'fashion'     => ['Style', 'Wear', 'Fashion', 'Look'],
        'real-estate' => ['Homes', 'Realty', 'Property', 'Estates'],
        'logistics'   => ['Haul', 'Move', 'Fleet', 'Express'],
        'education'   => ['Learn', 'Academy', 'Edu', 'School'],
        'media'       => ['Media', 'Press', 'Cast', 'Broadcast'],
        'retail'      => ['Store', 'Shop', 'Mart', 'Market'],
        'consulting'  => ['Consult', 'Advisory', 'Strategy', 'Partners'],
        'agriculture' => ['Agro', 'Farm', 'Harvest', 'Crop'],
        'beauty'      => ['Beauty', 'Glow', 'Luxe', 'Radiant'],
        'sports'      => ['Sport', 'Fit', 'Active', 'Performance'],
        'general'     => ['Group', 'Corp', 'Global', 'Hub'],
    ];

    public function generate(): void
    {
        $this->validate();
        $this->emailSubmitted = false;

        $base = ucfirst(strtolower(trim($this->keyword)));
        $terms = $this->industryTerms[$this->industry] ?? $this->industryTerms['general'];

        $generated = [];
        foreach ($this->suffixes as $suffix) { $generated[] = $base . $suffix; }
        foreach ($this->prefixes as $prefix) { $generated[] = $prefix . $base; }
        foreach ($terms as $term) {
            $generated[] = $base . $term;
            $generated[] = $term . $base;
        }

        $generated = array_values(array_unique($generated));
        shuffle($generated);
        $this->names = array_slice($generated, 0, 28);
    }

    public function submitEmail(): void
    {
        $this->emailError = '';
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->emailError = 'Enter a valid email address.';
            return;
        }
        ToolLead::create(['tool' => 'business-name-generator', 'email' => $this->email, 'ip' => request()->ip()]);
        $this->emailSubmitted = true;
    }

    public function render()
    {
        return view('livewire.tools.business-name-generator');
    }
}
```

- [ ] **Step 4: Implement the Livewire view**

Replace `resources/views/livewire/tools/business-name-generator.blade.php` entirely:

```blade
<div>
    <form wire:submit="generate" class="tool-form">
        <label>
            Keyword
            <input wire:model="keyword" type="text" placeholder="e.g. Apex, Nova, Lagos" required>
        </label>
        @error('keyword') <span class="tool-field-error">{{ $message }}</span> @enderror
        <label>
            Industry
            <select wire:model="industry">
                <option value="general">General</option>
                <option value="tech">Technology</option>
                <option value="finance">Finance</option>
                <option value="health">Health</option>
                <option value="food">Food & Beverage</option>
                <option value="fashion">Fashion</option>
                <option value="real-estate">Real Estate</option>
                <option value="logistics">Logistics</option>
                <option value="education">Education</option>
                <option value="media">Media</option>
                <option value="retail">Retail</option>
                <option value="consulting">Consulting</option>
                <option value="agriculture">Agriculture</option>
                <option value="beauty">Beauty</option>
                <option value="sports">Sports & Fitness</option>
            </select>
        </label>
        <button type="submit" class="tools-button tools-button--dark">Generate Names</button>
    </form>

    @if(count($names))
        <div class="tool-result {{ $emailSubmitted ? '' : 'tool-result--blurred' }}">
            <div class="tool-name-chips">
                @foreach($names as $name)
                    <button
                        type="button"
                        class="tool-chip"
                        onclick="navigator.clipboard.writeText('{{ $name }}')"
                        title="Click to copy"
                    >{{ $name }}</button>
                @endforeach
            </div>

            @if(!$emailSubmitted)
                <div class="tool-gate">
                    <strong>Your name ideas are ready</strong>
                    <p>Enter your email to unlock and copy the full list.</p>
                    <div class="tool-gate__form">
                        <input wire:model="email" type="email" placeholder="you@example.com" class="tool-gate__input">
                        @if($emailError)
                            <span class="tool-field-error">{{ $emailError }}</span>
                        @endif
                        <button wire:click="submitEmail" type="button" class="tools-button tools-button--dark">Unlock Results →</button>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
```

- [ ] **Step 5: Wire into the tool page**

Replace `resources/views/tools/business-name-generator.blade.php` entirely:

```blade
@extends('public.layouts.app')

@section('title', 'Business Name Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <livewire:tools.business-name-generator />
    @endcomponent
@endsection
```

- [ ] **Step 6: Run tests — expect pass**

```bash
php artisan test tests/Feature/Tools/BusinessNameGeneratorTest.php
```

- [ ] **Step 7: Commit**

```bash
git add app/Livewire/Tools/BusinessNameGenerator.php \
        resources/views/livewire/tools/business-name-generator.blade.php \
        resources/views/tools/business-name-generator.blade.php \
        tests/Feature/Tools/BusinessNameGeneratorTest.php
git commit -m "feat: implement business name generator Livewire component"
```

---

## Task 3: Domain Name Generator

**Files:**
- Modify: `app/Livewire/Tools/DomainNameGenerator.php`
- Modify: `resources/views/livewire/tools/domain-name-generator.blade.php`
- Modify: `resources/views/tools/domain-name-generator.blade.php`
- Create: `tests/Feature/Tools/DomainNameGeneratorTest.php`

- [ ] **Step 1: Write failing tests**

Create `tests/Feature/Tools/DomainNameGeneratorTest.php`:

```php
<?php

namespace Tests\Feature\Tools;

use App\Livewire\Tools\DomainNameGenerator;
use App\Models\ToolLead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DomainNameGeneratorTest extends TestCase
{
    use RefreshDatabase;

    public function test_generate_returns_domains_with_tlds(): void
    {
        $component = Livewire::test(DomainNameGenerator::class)
            ->set('keyword', 'apex')
            ->set('industry', 'tech')
            ->call('generate');

        $domains = $component->get('domains');
        $this->assertNotEmpty($domains);

        $domainStrings = array_column($domains, 'domain');
        $this->assertTrue(collect($domainStrings)->contains(fn ($d) => str_ends_with($d, '.ng')));
        $this->assertTrue(collect($domainStrings)->contains(fn ($d) => str_ends_with($d, '.com')));
    }

    public function test_generate_lowercases_and_strips_special_chars(): void
    {
        $component = Livewire::test(DomainNameGenerator::class)
            ->set('keyword', 'My Business!')
            ->call('generate');

        $domains = $component->get('domains');
        foreach ($domains as $d) {
            $this->assertSame(strtolower($d['domain']), $d['domain']);
            $this->assertDoesNotMatchRegularExpression('/[^a-z0-9.\-]/', $d['domain']);
        }
    }

    public function test_generate_flags_long_names(): void
    {
        $component = Livewire::test(DomainNameGenerator::class)
            ->set('keyword', 'superlongkeyword')
            ->call('generate');

        $domains = $component->get('domains');
        $longDomains = array_filter($domains, fn ($d) => $d['long'] === true);
        $this->assertNotEmpty($longDomains);
    }

    public function test_submit_email_stores_lead(): void
    {
        $component = Livewire::test(DomainNameGenerator::class)
            ->set('keyword', 'nova')
            ->call('generate')
            ->set('email', 'dev@example.com')
            ->call('submitEmail');

        $component->assertSet('emailSubmitted', true);
        $this->assertDatabaseHas('tool_leads', ['tool' => 'domain-name-generator', 'email' => 'dev@example.com']);
    }
}
```

- [ ] **Step 2: Run tests — expect failures**

```bash
php artisan test tests/Feature/Tools/DomainNameGeneratorTest.php
```

- [ ] **Step 3: Implement DomainNameGenerator.php**

Replace `app/Livewire/Tools/DomainNameGenerator.php` entirely:

```php
<?php

namespace App\Livewire\Tools;

use App\Models\ToolLead;
use Livewire\Component;

class DomainNameGenerator extends Component
{
    public string $keyword = '';
    public string $industry = 'general';
    public array $domains = [];
    public bool $emailSubmitted = false;
    public string $email = '';
    public string $emailError = '';

    protected array $rules = ['keyword' => 'required|string|max:50'];

    private array $suffixes = [
        'Hub', 'Labs', 'Pro', 'HQ', 'Co', 'Group', 'Digital', 'Media',
        'Works', 'Agency', 'Studio', 'Solutions', 'Global', 'Connect',
        'Africa', 'Plus', 'Edge', '360',
    ];

    private array $prefixes = [
        'Smart', 'Prime', 'Swift', 'Bold', 'Peak', 'Apex', 'Nova', 'Nexus', 'Elite', 'Pure',
    ];

    private array $industryTerms = [
        'tech'        => ['Tech', 'Soft', 'Dev', 'Byte'],
        'finance'     => ['Fin', 'Pay', 'Vest', 'Cap'],
        'health'      => ['Health', 'Med', 'Care', 'Life'],
        'food'        => ['Food', 'Kitchen', 'Fresh', 'Eats'],
        'fashion'     => ['Style', 'Wear', 'Fashion', 'Look'],
        'real-estate' => ['Homes', 'Realty', 'Property', 'Estates'],
        'logistics'   => ['Haul', 'Move', 'Fleet', 'Express'],
        'education'   => ['Learn', 'Academy', 'Edu', 'School'],
        'media'       => ['Media', 'Press', 'Cast', 'Broadcast'],
        'retail'      => ['Store', 'Shop', 'Mart', 'Market'],
        'consulting'  => ['Consult', 'Advisory', 'Strategy', 'Partners'],
        'agriculture' => ['Agro', 'Farm', 'Harvest', 'Crop'],
        'beauty'      => ['Beauty', 'Glow', 'Luxe', 'Radiant'],
        'sports'      => ['Sport', 'Fit', 'Active', 'Performance'],
        'general'     => ['Group', 'Corp', 'Global', 'Hub'],
    ];

    private array $tlds = ['.com', '.ng', '.co', '.io', '.africa', '.com.ng'];

    public function generate(): void
    {
        $this->validate();
        $this->emailSubmitted = false;

        $base = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', trim($this->keyword)));
        $terms = $this->industryTerms[$this->industry] ?? $this->industryTerms['general'];

        $names = [];
        foreach ($this->suffixes as $suffix) { $names[] = $base . strtolower($suffix); }
        foreach ($this->prefixes as $prefix) { $names[] = strtolower($prefix) . $base; }
        foreach ($terms as $term) {
            $names[] = $base . strtolower($term);
            $names[] = strtolower($term) . $base;
        }

        $names = array_values(array_unique($names));
        shuffle($names);
        $names = array_slice($names, 0, 10);

        $domains = [];
        foreach ($names as $name) {
            foreach ($this->tlds as $tld) {
                $domains[] = [
                    'domain'    => $name . $tld,
                    'long'      => strlen($name) > 15,
                    'check_url' => 'https://domainr.com/?q=' . urlencode($name . $tld),
                ];
            }
        }

        $this->domains = $domains;
    }

    public function submitEmail(): void
    {
        $this->emailError = '';
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->emailError = 'Enter a valid email address.';
            return;
        }
        ToolLead::create(['tool' => 'domain-name-generator', 'email' => $this->email, 'ip' => request()->ip()]);
        $this->emailSubmitted = true;
    }

    public function render()
    {
        return view('livewire.tools.domain-name-generator');
    }
}
```

- [ ] **Step 4: Implement the Livewire view**

Replace `resources/views/livewire/tools/domain-name-generator.blade.php` entirely:

```blade
<div>
    <form wire:submit="generate" class="tool-form">
        <label>
            Keyword
            <input wire:model="keyword" type="text" placeholder="e.g. swift, nova, lagos" required>
        </label>
        @error('keyword') <span class="tool-field-error">{{ $message }}</span> @enderror
        <label>
            Industry
            <select wire:model="industry">
                <option value="general">General</option>
                <option value="tech">Technology</option>
                <option value="finance">Finance</option>
                <option value="health">Health</option>
                <option value="food">Food & Beverage</option>
                <option value="fashion">Fashion</option>
                <option value="real-estate">Real Estate</option>
                <option value="logistics">Logistics</option>
                <option value="education">Education</option>
                <option value="media">Media</option>
                <option value="retail">Retail</option>
                <option value="consulting">Consulting</option>
                <option value="agriculture">Agriculture</option>
                <option value="beauty">Beauty</option>
                <option value="sports">Sports & Fitness</option>
            </select>
        </label>
        <button type="submit" class="tools-button tools-button--dark">Generate Domains</button>
    </form>

    @if(count($domains))
        <div class="tool-result {{ $emailSubmitted ? '' : 'tool-result--blurred' }}">
            <div class="tool-domain-list">
                @foreach($domains as $d)
                    <div class="tool-domain-row {{ $d['long'] ? 'tool-domain-row--long' : '' }}">
                        <span class="tool-domain-row__name">{{ $d['domain'] }}</span>
                        @if($d['long'])
                            <span class="tool-domain-row__flag">Long name</span>
                        @endif
                        <a href="{{ $d['check_url'] }}" target="_blank" rel="noopener" class="tool-domain-row__check">Check →</a>
                    </div>
                @endforeach
            </div>

            @if(!$emailSubmitted)
                <div class="tool-gate">
                    <strong>Your domain ideas are ready</strong>
                    <p>Enter your email to unlock the full list.</p>
                    <div class="tool-gate__form">
                        <input wire:model="email" type="email" placeholder="you@example.com" class="tool-gate__input">
                        @if($emailError)
                            <span class="tool-field-error">{{ $emailError }}</span>
                        @endif
                        <button wire:click="submitEmail" type="button" class="tools-button tools-button--dark">Unlock Results →</button>
                    </div>
                </div>
            @endif
        </div>
    @endif
</div>
```

- [ ] **Step 5: Wire into the tool page**

Replace `resources/views/tools/domain-name-generator.blade.php` entirely:

```blade
@extends('public.layouts.app')

@section('title', 'Domain Name Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <livewire:tools.domain-name-generator />
    @endcomponent
@endsection
```

- [ ] **Step 6: Run tests — expect pass**

```bash
php artisan test tests/Feature/Tools/DomainNameGeneratorTest.php
```

- [ ] **Step 7: Commit**

```bash
git add app/Livewire/Tools/DomainNameGenerator.php \
        resources/views/livewire/tools/domain-name-generator.blade.php \
        resources/views/tools/domain-name-generator.blade.php \
        tests/Feature/Tools/DomainNameGeneratorTest.php
git commit -m "feat: implement domain name generator Livewire component"
```

---

## Task 4: Website Brief Generator (Step Wizard)

**Files:**
- Modify: `app/Livewire/Tools/WebsiteBriefGenerator.php`
- Modify: `resources/views/livewire/tools/website-brief-generator.blade.php`
- Modify: `resources/views/tools/website-brief-generator.blade.php`
- Create: `tests/Feature/Tools/WebsiteBriefGeneratorTest.php`

- [ ] **Step 1: Write failing tests**

Create `tests/Feature/Tools/WebsiteBriefGeneratorTest.php`:

```php
<?php

namespace Tests\Feature\Tools;

use App\Livewire\Tools\WebsiteBriefGenerator;
use App\Models\ToolLead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class WebsiteBriefGeneratorTest extends TestCase
{
    use RefreshDatabase;

    public function test_starts_at_step_one(): void
    {
        Livewire::test(WebsiteBriefGenerator::class)
            ->assertSet('step', 1);
    }

    public function test_next_step_validates_step_one_fields(): void
    {
        Livewire::test(WebsiteBriefGenerator::class)
            ->call('nextStep')
            ->assertHasErrors(['businessName', 'industry', 'targetAudience', 'location']);
    }

    public function test_advances_to_step_two_when_step_one_valid(): void
    {
        Livewire::test(WebsiteBriefGenerator::class)
            ->set('businessName', 'Apex Tech')
            ->set('industry', 'tech')
            ->set('targetAudience', 'SMBs in Lagos')
            ->set('location', 'Lagos, Nigeria')
            ->call('nextStep')
            ->assertSet('step', 2);
    }

    public function test_prev_step_goes_back(): void
    {
        Livewire::test(WebsiteBriefGenerator::class)
            ->set('step', 2)
            ->call('prevStep')
            ->assertSet('step', 1);
    }

    public function test_prev_step_does_not_go_below_one(): void
    {
        Livewire::test(WebsiteBriefGenerator::class)
            ->set('step', 1)
            ->call('prevStep')
            ->assertSet('step', 1);
    }

    public function test_submit_email_on_step_three_stores_lead(): void
    {
        $component = Livewire::test(WebsiteBriefGenerator::class)
            ->set('step', 3)
            ->set('businessName', 'Apex Tech')
            ->set('industry', 'tech')
            ->set('targetAudience', 'SMBs')
            ->set('location', 'Lagos')
            ->set('budget', 'Under ₦200k')
            ->set('timeline', 'ASAP')
            ->set('email', 'cto@example.com')
            ->call('submitEmail');

        $component->assertSet('emailSubmitted', true);
        $this->assertDatabaseHas('tool_leads', ['tool' => 'website-brief-generator', 'email' => 'cto@example.com']);
    }
}
```

- [ ] **Step 2: Run tests — expect failures**

```bash
php artisan test tests/Feature/Tools/WebsiteBriefGeneratorTest.php
```

- [ ] **Step 3: Implement WebsiteBriefGenerator.php**

Replace `app/Livewire/Tools/WebsiteBriefGenerator.php` entirely:

```php
<?php

namespace App\Livewire\Tools;

use App\Models\ToolLead;
use Livewire\Component;

class WebsiteBriefGenerator extends Component
{
    public int $step = 1;

    // Step 1
    public string $businessName = '';
    public string $industry = '';
    public string $targetAudience = '';
    public string $location = '';

    // Step 2
    public string $primaryGoal = 'generate leads';
    public array $pages = [];
    public string $designStyle = 'clean & minimal';

    // Step 3
    public string $budget = 'Under ₦200k';
    public string $timeline = 'ASAP';
    public string $additionalNotes = '';

    // Gate
    public bool $emailSubmitted = false;
    public string $email = '';
    public string $emailError = '';

    private function stepRules(): array
    {
        return match ($this->step) {
            1 => [
                'businessName'   => 'required|string|max:100',
                'industry'       => 'required|string',
                'targetAudience' => 'required|string|max:200',
                'location'       => 'required|string|max:100',
            ],
            2 => [
                'primaryGoal' => 'required|string',
                'pages'       => 'array',
                'designStyle' => 'required|string',
            ],
            default => [
                'budget'   => 'required|string',
                'timeline' => 'required|string',
            ],
        };
    }

    public function nextStep(): void
    {
        $this->validate($this->stepRules());
        $this->step++;
    }

    public function prevStep(): void
    {
        $this->step = max(1, $this->step - 1);
    }

    public function submitEmail(): void
    {
        $this->emailError = '';
        if (! filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->emailError = 'Enter a valid email address.';
            return;
        }
        ToolLead::create(['tool' => 'website-brief-generator', 'email' => $this->email, 'ip' => request()->ip()]);
        $this->emailSubmitted = true;
    }

    public function render()
    {
        return view('livewire.tools.website-brief-generator');
    }
}
```

- [ ] **Step 4: Implement the Livewire view**

Replace `resources/views/livewire/tools/website-brief-generator.blade.php` entirely:

```blade
<div>
    <div class="tool-wizard-steps">
        <span class="tool-wizard-step {{ $step === 1 ? 'tool-wizard-step--active' : '' }}">1. Business</span>
        <span class="tool-wizard-divider">→</span>
        <span class="tool-wizard-step {{ $step === 2 ? 'tool-wizard-step--active' : '' }}">2. Goals</span>
        <span class="tool-wizard-divider">→</span>
        <span class="tool-wizard-step {{ $step === 3 ? 'tool-wizard-step--active' : '' }}">3. Budget</span>
    </div>

    @if($step === 1)
        <div class="tool-form">
            <label>
                Business name
                <input wire:model="businessName" type="text" placeholder="e.g. Apex Solutions">
            </label>
            @error('businessName') <span class="tool-field-error">{{ $message }}</span> @enderror

            <label>
                Industry
                <select wire:model="industry">
                    <option value="">Select industry…</option>
                    <option value="tech">Technology</option>
                    <option value="finance">Finance</option>
                    <option value="health">Health</option>
                    <option value="food">Food & Beverage</option>
                    <option value="fashion">Fashion</option>
                    <option value="real-estate">Real Estate</option>
                    <option value="logistics">Logistics</option>
                    <option value="education">Education</option>
                    <option value="media">Media</option>
                    <option value="retail">Retail</option>
                    <option value="consulting">Consulting</option>
                    <option value="agriculture">Agriculture</option>
                    <option value="beauty">Beauty</option>
                    <option value="sports">Sports & Fitness</option>
                    <option value="other">Other</option>
                </select>
            </label>
            @error('industry') <span class="tool-field-error">{{ $message }}</span> @enderror

            <label>
                Target audience
                <input wire:model="targetAudience" type="text" placeholder="e.g. SMBs in Lagos, working professionals 25–45">
            </label>
            @error('targetAudience') <span class="tool-field-error">{{ $message }}</span> @enderror

            <label>
                Location / market
                <input wire:model="location" type="text" placeholder="e.g. Lagos, Nigeria">
            </label>
            @error('location') <span class="tool-field-error">{{ $message }}</span> @enderror

            <button wire:click="nextStep" type="button" class="tools-button tools-button--dark">Next →</button>
        </div>
    @endif

    @if($step === 2)
        <div class="tool-form">
            <label>
                Primary goal
                <select wire:model="primaryGoal">
                    <option value="generate leads">Generate leads</option>
                    <option value="sell products">Sell products</option>
                    <option value="share information">Share information</option>
                    <option value="build credibility">Build credibility</option>
                </select>
            </label>

            <fieldset class="tool-form__fieldset">
                <legend>Pages needed</legend>
                <label><input type="checkbox" wire:model="pages" value="Home"> Home</label>
                <label><input type="checkbox" wire:model="pages" value="About"> About</label>
                <label><input type="checkbox" wire:model="pages" value="Services"> Services</label>
                <label><input type="checkbox" wire:model="pages" value="Blog"> Blog</label>
                <label><input type="checkbox" wire:model="pages" value="Portfolio"> Portfolio</label>
                <label><input type="checkbox" wire:model="pages" value="Contact"> Contact</label>
                <label><input type="checkbox" wire:model="pages" value="Shop"> Shop</label>
            </fieldset>

            <label>
                Design style
                <select wire:model="designStyle">
                    <option value="clean & minimal">Clean & Minimal</option>
                    <option value="bold & modern">Bold & Modern</option>
                    <option value="classic & elegant">Classic & Elegant</option>
                    <option value="playful & vibrant">Playful & Vibrant</option>
                </select>
            </label>

            <div class="tool-wizard-nav">
                <button wire:click="prevStep" type="button" class="tools-button">← Back</button>
                <button wire:click="nextStep" type="button" class="tools-button tools-button--dark">Next →</button>
            </div>
        </div>
    @endif

    @if($step === 3)
        <div class="tool-form">
            <label>
                Estimated budget
                <select wire:model="budget">
                    <option value="Under ₦200k">Under ₦200k</option>
                    <option value="₦200k–₦500k">₦200k–₦500k</option>
                    <option value="₦500k–₦1.5m">₦500k–₦1.5m</option>
                    <option value="₦1.5m+">₦1.5m+</option>
                </select>
            </label>

            <label>
                Timeline
                <select wire:model="timeline">
                    <option value="ASAP">ASAP</option>
                    <option value="2–4 weeks">2–4 weeks</option>
                    <option value="1–3 months">1–3 months</option>
                    <option value="Flexible">Flexible</option>
                </select>
            </label>

            <label>
                Additional notes (optional)
                <textarea wire:model="additionalNotes" rows="3" placeholder="Anything else we should know…"></textarea>
            </label>

            <div class="tool-wizard-nav">
                <button wire:click="prevStep" type="button" class="tools-button">← Back</button>
            </div>
        </div>

        @if($step === 3 && $businessName)
            <div class="tool-result {{ $emailSubmitted ? '' : 'tool-result--blurred' }}">
                <div class="tool-brief">
                    <h3>Website Brief — {{ $businessName }}</h3>
                    <dl class="tool-brief__list">
                        <dt>Industry</dt><dd>{{ $industry }}</dd>
                        <dt>Target audience</dt><dd>{{ $targetAudience }}</dd>
                        <dt>Location</dt><dd>{{ $location }}</dd>
                        <dt>Primary goal</dt><dd>{{ $primaryGoal }}</dd>
                        <dt>Pages</dt><dd>{{ count($pages) ? implode(', ', $pages) : 'Not specified' }}</dd>
                        <dt>Design style</dt><dd>{{ $designStyle }}</dd>
                        <dt>Budget</dt><dd>{{ $budget }}</dd>
                        <dt>Timeline</dt><dd>{{ $timeline }}</dd>
                        @if($additionalNotes)
                            <dt>Notes</dt><dd>{{ $additionalNotes }}</dd>
                        @endif
                    </dl>
                </div>

                @if(!$emailSubmitted)
                    <div class="tool-gate">
                        <strong>Your brief is ready</strong>
                        <p>Enter your email to unlock and print your brief.</p>
                        <div class="tool-gate__form">
                            <input wire:model="email" type="email" placeholder="you@example.com" class="tool-gate__input">
                            @if($emailError)
                                <span class="tool-field-error">{{ $emailError }}</span>
                            @endif
                            <button wire:click="submitEmail" type="button" class="tools-button tools-button--dark">Unlock Brief →</button>
                        </div>
                    </div>
                @else
                    <button onclick="window.print()" type="button" class="tools-button tools-button--dark">Print / Save PDF</button>
                @endif
            </div>
        @endif
    @endif
</div>
```

- [ ] **Step 5: Wire into the tool page**

Replace `resources/views/tools/website-brief-generator.blade.php` entirely:

```blade
@extends('public.layouts.app')

@section('title', 'Website Brief Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <livewire:tools.website-brief-generator />
    @endcomponent
@endsection
```

- [ ] **Step 6: Run tests — expect pass**

```bash
php artisan test tests/Feature/Tools/WebsiteBriefGeneratorTest.php
```

- [ ] **Step 7: Commit**

```bash
git add app/Livewire/Tools/WebsiteBriefGenerator.php \
        resources/views/livewire/tools/website-brief-generator.blade.php \
        resources/views/tools/website-brief-generator.blade.php \
        tests/Feature/Tools/WebsiteBriefGeneratorTest.php
git commit -m "feat: implement website brief generator step wizard with email gate"
```

---

## Task 5: Cost Calculator (Alpine.js)

**Files:**
- Modify: `resources/views/tools/cost-calculator.blade.php`

No server-side logic. The email gate uses the already-tested `POST /tools/leads` endpoint.

- [ ] **Step 1: Replace the cost-calculator view**

Replace `resources/views/tools/cost-calculator.blade.php` entirely:

```blade
@extends('public.layouts.app')

@section('title', 'Website Cost Calculator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <div x-data="costCalculator()" x-init="updateEstimate()">
            <form class="tool-form" @submit.prevent>
                <label>
                    Project type
                    <select x-model="projectType" @change="updateEstimate()">
                        <option value="brochure">Basic brochure site (1–5 pages)</option>
                        <option value="business">Business site (6–15 pages)</option>
                        <option value="ecommerce">E-commerce</option>
                        <option value="webapp">Custom web app</option>
                    </select>
                </label>

                <fieldset class="tool-form__fieldset">
                    <legend>Add features</legend>
                    <label><input type="checkbox" x-model="features.blog" @change="updateEstimate()"> Blog / CMS</label>
                    <label><input type="checkbox" x-model="features.booking" @change="updateEstimate()"> Booking system</label>
                    <label><input type="checkbox" x-model="features.payment" @change="updateEstimate()"> Payment integration</label>
                    <label><input type="checkbox" x-model="features.animations" @change="updateEstimate()"> Animations / motion</label>
                    <label><input type="checkbox" x-model="features.urgent" @change="updateEstimate()"> Urgent timeline (&lt;2 weeks) +20%</label>
                </fieldset>
            </form>

            <div class="tool-result" :class="{'tool-result--blurred': !emailSubmitted}">
                <div class="tool-estimate">
                    <h3>Estimated range: <span x-text="formatRange()"></span></h3>
                    <p class="tool-estimate__maintenance">Monthly maintenance care: ₦30,000 – ₦80,000/mo</p>
                </div>

                <template x-if="!emailSubmitted">
                    <div class="tool-gate">
                        <strong>Your estimate is ready</strong>
                        <p>Enter your email to keep this result.</p>
                        <div class="tool-gate__form">
                            <input x-model="gateEmail" type="email" placeholder="you@example.com" class="tool-gate__input">
                            <span x-show="gateError" x-text="gateError" class="tool-field-error"></span>
                            <button @click="submitEmail()" type="button" class="tools-button tools-button--dark">Unlock Results →</button>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    @endcomponent
@endsection

@push('scripts')
<script>
function costCalculator() {
    return {
        projectType: 'brochure',
        features: { blog: false, booking: false, payment: false, animations: false, urgent: false },
        minCost: 0,
        maxCost: 0,
        emailSubmitted: false,
        gateEmail: '',
        gateError: '',

        projectPrices: {
            brochure:  { min: 150000, max: 400000 },
            business:  { min: 400000, max: 900000 },
            ecommerce: { min: 600000, max: 1500000 },
            webapp:    { min: 1200000, max: 4000000 },
        },

        featurePrices: {
            blog:       { min: 100000, max: 250000 },
            booking:    { min: 150000, max: 400000 },
            payment:    { min: 100000, max: 300000 },
            animations: { min: 80000,  max: 200000 },
        },

        updateEstimate() {
            const base = this.projectPrices[this.projectType];
            let min = base.min;
            let max = base.max;
            for (const [key, active] of Object.entries(this.features)) {
                if (active && key !== 'urgent' && this.featurePrices[key]) {
                    min += this.featurePrices[key].min;
                    max += this.featurePrices[key].max;
                }
            }
            if (this.features.urgent) {
                min = Math.round(min * 1.2);
                max = Math.round(max * 1.2);
            }
            this.minCost = min;
            this.maxCost = max;
        },

        formatRange() {
            return '₦' + this.minCost.toLocaleString() + ' – ₦' + this.maxCost.toLocaleString();
        },

        async submitEmail() {
            this.gateError = '';
            const res = await fetch('/tools/leads', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ tool: 'website-cost-calculator', email: this.gateEmail }),
            });
            const data = await res.json();
            if (data.success) {
                this.emailSubmitted = true;
            } else {
                this.gateError = data.error || 'Something went wrong. Try again.';
            }
        },
    };
}
</script>
@endpush
```

- [ ] **Step 2: Run the route smoke test to confirm the page renders**

```bash
php artisan test tests/Feature/Tools/ToolRoutesTest.php::test_cost_calculator_returns_200
```

Expected: pass.

- [ ] **Step 3: Commit**

```bash
git add resources/views/tools/cost-calculator.blade.php
git commit -m "feat: implement website cost calculator with Alpine.js and email gate"
```

---

## Task 6: WhatsApp Link Generator (Alpine.js)

**Files:**
- Modify: `resources/views/tools/whatsapp-link-generator.blade.php`

No email gate. QR code via qrcode.js CDN.

- [ ] **Step 1: Replace the view**

Replace `resources/views/tools/whatsapp-link-generator.blade.php` entirely:

```blade
@extends('public.layouts.app')

@section('title', 'WhatsApp Link Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <div x-data="waGenerator()">
            <form class="tool-form" @submit.prevent>
                <label>
                    Country code
                    <select x-model="countryCode" @change="generate()">
                        <option value="234">+234 — Nigeria</option>
                        <option value="233">+233 — Ghana</option>
                        <option value="254">+254 — Kenya</option>
                        <option value="27">+27 — South Africa</option>
                        <option value="44">+44 — United Kingdom</option>
                        <option value="1">+1 — United States / Canada</option>
                    </select>
                </label>
                <label>
                    Phone number
                    <input x-model="phone" @input="generate()" type="text" placeholder="8012345678">
                </label>
                <label>
                    Pre-filled message (optional)
                    <textarea x-model="message" @input="generate()" rows="3" placeholder="Hello, I'd like to ask about…"></textarea>
                </label>
            </form>

            <div class="tool-result" x-show="link">
                <h3>Your WhatsApp link</h3>
                <div class="tool-link-display">
                    <a :href="link" target="_blank" rel="noopener" x-text="link" class="tool-link-display__link"></a>
                </div>
                <div class="tool-actions">
                    <button @click="copyLink()" type="button" class="tools-button tools-button--dark">
                        <span x-text="copied ? 'Copied!' : 'Copy link'"></span>
                    </button>
                    <a :href="link" target="_blank" rel="noopener" class="tools-button">Open in WhatsApp</a>
                </div>
                <div id="wa-qr" class="tool-qr" x-ref="qrContainer"></div>
            </div>
        </div>
    @endcomponent
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSE7lDoLDi2pEPQKZiS+n/1RG5TFblkfYFa==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
function waGenerator() {
    return {
        countryCode: '234',
        phone: '',
        message: '',
        link: '',
        copied: false,
        _qr: null,

        generate() {
            const number = this.phone.replace(/\D/g, '');
            if (!number) { this.link = ''; return; }
            const encoded = this.message ? '?text=' + encodeURIComponent(this.message) : '';
            this.link = 'https://wa.me/' + this.countryCode + number + encoded;
            this.$nextTick(() => this.renderQr());
        },

        renderQr() {
            const el = document.getElementById('wa-qr');
            if (!el || !this.link || typeof QRCode === 'undefined') return;
            el.replaceChildren();
            this._qr = new QRCode(el, { text: this.link, width: 128, height: 128, colorDark: '#000000', colorLight: '#ffffff' });
        },

        copyLink() {
            navigator.clipboard.writeText(this.link);
            this.copied = true;
            setTimeout(() => { this.copied = false; }, 2000);
        },
    };
}
</script>
@endpush
```

- [ ] **Step 2: Run smoke test**

```bash
php artisan test tests/Feature/Tools/ToolRoutesTest.php::test_whatsapp_link_generator_returns_200
```

Expected: pass.

- [ ] **Step 3: Commit**

```bash
git add resources/views/tools/whatsapp-link-generator.blade.php
git commit -m "feat: implement WhatsApp link generator with QR code"
```

---

## Task 7: Invoice Generator (Alpine.js)

**Files:**
- Modify: `resources/views/tools/invoice-generator.blade.php`

No email gate. Print via `window.print()`.

- [ ] **Step 1: Replace the view**

Replace `resources/views/tools/invoice-generator.blade.php` entirely:

```blade
@extends('public.layouts.app')

@section('title', 'Invoice Generator — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/tools.css')
@endpush

@section('content')
    @component('tools.partials.tool-page', ['tool' => $tool, 'relatedTools' => $relatedTools])
        <div x-data="invoiceGenerator()">
            <div class="tool-form tool-form--two-col">
                <label>
                    From — Business name
                    <input x-model="from.name" type="text" placeholder="Your business name">
                </label>
                <label>
                    To — Client name
                    <input x-model="to.name" type="text" placeholder="Client name">
                </label>
                <label>
                    From — Email
                    <input x-model="from.email" type="email" placeholder="you@example.com">
                </label>
                <label>
                    To — Email
                    <input x-model="to.email" type="email" placeholder="client@example.com">
                </label>
                <label>
                    From — Address
                    <textarea x-model="from.address" rows="2" placeholder="Your address"></textarea>
                </label>
                <label>
                    To — Address
                    <textarea x-model="to.address" rows="2" placeholder="Client address"></textarea>
                </label>
                <label>
                    Invoice number
                    <input x-model="invoiceNumber" type="text" placeholder="INV-001">
                </label>
                <label>
                    Invoice date
                    <input x-model="invoiceDate" type="date">
                </label>
                <label class="tool-form__full">
                    Due date
                    <input x-model="dueDate" type="date">
                </label>
            </div>

            <div class="tool-line-items">
                <h3>Line items</h3>
                <template x-for="(item, i) in items" :key="i">
                    <div class="tool-line-item">
                        <input x-model="item.description" type="text" placeholder="Description">
                        <input x-model.number="item.qty" type="number" min="1" placeholder="Qty">
                        <input x-model.number="item.price" type="number" min="0" placeholder="Unit price (₦)">
                        <button @click="removeItem(i)" type="button" class="tool-line-item__remove">×</button>
                    </div>
                </template>
                <button @click="addItem()" type="button" class="tools-button">+ Add line item</button>
            </div>

            <div class="tool-form">
                <label>
                    Tax
                    <select x-model="taxType">
                        <option value="none">No tax</option>
                        <option value="vat">VAT 7.5%</option>
                        <option value="custom">Custom %</option>
                    </select>
                </label>
                <template x-if="taxType === 'custom'">
                    <label>
                        Custom tax %
                        <input x-model.number="customTax" type="number" min="0" max="100" placeholder="0">
                    </label>
                </template>
                <label>
                    Notes / payment terms
                    <textarea x-model="notes" rows="2" placeholder="e.g. Payment due within 7 days."></textarea>
                </label>
            </div>

            <div class="tool-result" id="invoice-preview">
                <div class="tool-invoice">
                    <div class="tool-invoice__header">
                        <div>
                            <strong x-text="from.name || 'Your Business'"></strong>
                            <span x-text="from.email"></span>
                            <span x-text="from.address"></span>
                        </div>
                        <div class="tool-invoice__meta">
                            <strong>INVOICE</strong>
                            <span>No. <span x-text="invoiceNumber || 'INV-001'"></span></span>
                            <span>Date: <span x-text="invoiceDate || '—'"></span></span>
                            <span>Due: <span x-text="dueDate || '—'"></span></span>
                        </div>
                    </div>
                    <div class="tool-invoice__to">
                        <strong>Bill to:</strong>
                        <span x-text="to.name || 'Client'"></span>
                        <span x-text="to.email"></span>
                        <span x-text="to.address"></span>
                    </div>
                    <table class="tool-invoice__table">
                        <thead>
                            <tr><th>Description</th><th>Qty</th><th>Unit price</th><th>Amount</th></tr>
                        </thead>
                        <tbody>
                            <template x-for="item in items" :key="item.description">
                                <tr>
                                    <td x-text="item.description || '—'"></td>
                                    <td x-text="item.qty"></td>
                                    <td x-text="'₦' + Number(item.price).toLocaleString()"></td>
                                    <td x-text="'₦' + (item.qty * item.price).toLocaleString()"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <div class="tool-invoice__totals">
                        <div>Subtotal: <strong x-text="'₦' + subtotal().toLocaleString()"></strong></div>
                        <template x-if="taxType !== 'none'">
                            <div>Tax (<span x-text="taxRate()"></span>%): <strong x-text="'₦' + taxAmount().toLocaleString()"></strong></div>
                        </template>
                        <div class="tool-invoice__total-line">Total: <strong x-text="'₦' + total().toLocaleString()"></strong></div>
                    </div>
                    <template x-if="notes">
                        <div class="tool-invoice__notes">
                            <strong>Notes:</strong>
                            <p x-text="notes"></p>
                        </div>
                    </template>
                </div>
            </div>

            <button onclick="window.print()" type="button" class="tools-button tools-button--dark">Download / Print PDF</button>
        </div>
    @endcomponent
@endsection

@push('scripts')
<script>
function invoiceGenerator() {
    return {
        from: { name: '', email: '', address: '' },
        to:   { name: '', email: '', address: '' },
        invoiceNumber: 'INV-001',
        invoiceDate: new Date().toISOString().split('T')[0],
        dueDate: '',
        items: [{ description: '', qty: 1, price: 0 }],
        taxType: 'none',
        customTax: 0,
        notes: '',

        addItem() { this.items.push({ description: '', qty: 1, price: 0 }); },
        removeItem(i) { if (this.items.length > 1) this.items.splice(i, 1); },
        subtotal() { return this.items.reduce((s, i) => s + (i.qty * i.price), 0); },
        taxRate() {
            if (this.taxType === 'vat') return 7.5;
            if (this.taxType === 'custom') return this.customTax;
            return 0;
        },
        taxAmount() { return Math.round(this.subtotal() * this.taxRate() / 100); },
        total() { return this.subtotal() + this.taxAmount(); },
    };
}
</script>
@endpush
```

- [ ] **Step 2: Run smoke test**

```bash
php artisan test tests/Feature/Tools/ToolRoutesTest.php::test_invoice_generator_returns_200
```

Expected: pass.

- [ ] **Step 3: Commit**

```bash
git add resources/views/tools/invoice-generator.blade.php
git commit -m "feat: implement invoice generator with Alpine.js and print support"
```

---

## Task 8: Add CSS for new UI elements and run full suite

Several new classes are used across the tools that aren't in `tools.css` yet. Add them in one pass.

**Files:**
- Modify: `resources/css/public/pages/tools.css`

- [ ] **Step 1: Append new styles to tools.css**

Add to the end of `resources/css/public/pages/tools.css`:

```css
/* Tool checks (SEO audit) */
.tool-checks { display: grid; gap: 0.5rem; margin-top: 1rem; }
.tool-check { display: grid; grid-template-columns: 1.2rem 1fr auto; gap: 0.5rem; align-items: start; padding: 0.65rem 0.8rem; background: var(--white); border: 1px solid var(--g200); font-size: 0.9rem; }
.tool-check--pass { border-left: 3px solid #22c55e; }
.tool-check--warn { border-left: 3px solid #f59e0b; }
.tool-check--fail { border-left: 3px solid #ef4444; }
.tool-check__name { font-weight: 600; color: var(--black); }
.tool-check__message { color: var(--g700); }
.tool-check__status-icon { font-weight: 700; font-size: 0.85rem; }
.tool-check--pass .tool-check__status-icon { color: #22c55e; }
.tool-check--warn .tool-check__status-icon { color: #f59e0b; }
.tool-check--fail .tool-check__status-icon { color: #ef4444; }

/* Score */
.tool-score { display: flex; align-items: baseline; gap: 0.6rem; margin-bottom: 1rem; }
.tool-score__number { font-family: var(--serif); font-size: 2.4rem; font-weight: 700; color: var(--black); letter-spacing: -0.04em; }
.tool-score__label { color: var(--g700); font-size: 0.88rem; }

/* Error and field error */
.tool-error { padding: 0.85rem 1rem; background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; margin-bottom: 1rem; font-size: 0.9rem; }
.tool-field-error { color: #b91c1c; font-size: 0.82rem; }

/* Gate form */
.tool-gate__form { display: grid; gap: 0.6rem; margin-top: 0.8rem; }
.tool-gate__input { padding: 0.75rem 1rem; border: 1px solid var(--g200); background: var(--white); font: inherit; width: 100%; }

/* Name chips */
.tool-name-chips { display: flex; flex-wrap: wrap; gap: 0.5rem; }
.tool-chip { padding: 0.5rem 0.9rem; background: var(--off); border: 1px solid var(--g200); color: var(--black); font-size: 0.9rem; cursor: pointer; transition: background 0.15s; }
.tool-chip:hover { background: var(--black); color: var(--white); }

/* Domain list */
.tool-domain-list { display: grid; gap: 0.45rem; }
.tool-domain-row { display: flex; align-items: center; gap: 0.8rem; padding: 0.65rem 0.8rem; background: var(--white); border: 1px solid var(--g200); }
.tool-domain-row__name { flex: 1; font-family: var(--sans, inherit); font-size: 0.95rem; color: var(--black); }
.tool-domain-row__flag { font-size: 0.75rem; color: #f59e0b; font-weight: 600; }
.tool-domain-row__check { color: var(--gold); text-decoration: none; font-size: 0.85rem; font-weight: 600; }

/* Estimate */
.tool-estimate h3 { margin: 0 0 0.4rem; }
.tool-estimate__maintenance { font-size: 0.88rem; color: var(--g700); margin: 0; }

/* Link display */
.tool-link-display { padding: 0.85rem 1rem; background: var(--off); border: 1px solid var(--g200); margin: 0.8rem 0; word-break: break-all; }
.tool-link-display__link { color: var(--gold); text-decoration: none; font-size: 0.9rem; }
.tool-actions { display: flex; gap: 0.6rem; flex-wrap: wrap; }
.tool-qr { margin-top: 1.2rem; }

/* Invoice */
.tool-invoice { font-size: 0.9rem; }
.tool-invoice__header { display: flex; justify-content: space-between; gap: 1rem; margin-bottom: 1.2rem; }
.tool-invoice__meta { text-align: right; display: grid; gap: 0.25rem; font-size: 0.85rem; color: var(--g700); }
.tool-invoice__to { margin-bottom: 1.2rem; display: grid; gap: 0.2rem; }
.tool-invoice__table { width: 100%; border-collapse: collapse; margin-bottom: 1rem; }
.tool-invoice__table th, .tool-invoice__table td { border: 1px solid var(--g200); padding: 0.5rem 0.7rem; text-align: left; }
.tool-invoice__table th { background: var(--g100); font-weight: 600; font-size: 0.82rem; }
.tool-invoice__totals { display: grid; gap: 0.3rem; text-align: right; margin-bottom: 1rem; font-size: 0.9rem; }
.tool-invoice__total-line { font-weight: 700; font-size: 1.05rem; border-top: 2px solid var(--black); padding-top: 0.4rem; }
.tool-invoice__notes { font-size: 0.85rem; color: var(--g700); }

/* Line items */
.tool-line-items { margin: 1.2rem 0; }
.tool-line-items h3 { margin-bottom: 0.6rem; font-size: 1rem; }
.tool-line-item { display: grid; grid-template-columns: 1fr 80px 120px 36px; gap: 0.5rem; margin-bottom: 0.5rem; }
.tool-line-item input { padding: 0.65rem 0.75rem; border: 1px solid var(--g200); background: var(--off); font: inherit; }
.tool-line-item__remove { background: var(--g100); border: 1px solid var(--g200); cursor: pointer; font-size: 1.1rem; color: var(--g700); }
.tool-line-item__remove:hover { background: #fef2f2; color: #b91c1c; }

/* Brief */
.tool-brief h3 { margin-bottom: 1rem; }
.tool-brief__list { display: grid; grid-template-columns: 160px 1fr; gap: 0.5rem 1rem; }
.tool-brief__list dt { font-weight: 600; color: var(--black); font-size: 0.88rem; }
.tool-brief__list dd { color: var(--g700); margin: 0; font-size: 0.9rem; }

/* Wizard */
.tool-wizard-steps { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.4rem; }
.tool-wizard-step { font-size: 0.82rem; font-weight: 600; color: var(--g700); }
.tool-wizard-step--active { color: var(--black); }
.tool-wizard-divider { color: var(--g400); font-size: 0.8rem; }
.tool-wizard-nav { display: flex; gap: 0.5rem; margin-top: 0.8rem; }
.tool-form__fieldset { border: 1px solid var(--g200); padding: 0.85rem 1rem; display: grid; gap: 0.5rem; }
.tool-form__fieldset legend { font-size: 0.88rem; font-weight: 600; padding: 0 0.4rem; }
.tool-form__full { grid-column: 1 / -1; }

/* Print styles */
@media print {
    body > *:not(#invoice-preview) { display: none !important; }
    #invoice-preview { display: block !important; padding: 0; border: none; }
    .tool-invoice { font-size: 11pt; }
}
```

- [ ] **Step 2: Run the full test suite**

```bash
php artisan test tests/Feature/Tools/
```

Expected: all tests pass.

- [ ] **Step 3: Commit**

```bash
git add resources/css/public/pages/tools.css
git commit -m "style: add CSS for tool check results, invoice, names, domains, wizard, gate form"
```

---

## Spec Coverage Check

| Spec requirement | Covered by |
|---|---|
| Hub page at `/tools` | Scaffold (already done) |
| 7 tool routes | Scaffold (already done) |
| `POST /tools/leads` | Task 0 (StoreLeadTest) |
| SEO audit — 10 checks with pass/warn/fail | Task 1 (SeoAudit.php `runChecks`) |
| SEO audit — 100-point scoring | Task 1 (`calculateScore`) |
| SEO audit — unreachable URL error | Task 1 (exception catch) |
| Business name generator — 20–30 names | Task 2 |
| Business name generator — suffixes/prefixes/industry terms | Task 2 |
| Domain generator — 6 TLDs | Task 3 |
| Domain generator — long name flag (>15 chars) | Task 3 |
| Domain generator — domainr.com check link | Task 3 |
| Brief generator — 3-step wizard | Task 4 |
| Brief generator — print support | Task 4 (`window.print()`) |
| Cost calculator — price ranges in ₦ | Task 5 |
| Cost calculator — 20% urgent premium | Task 5 |
| Cost calculator — monthly maintenance note | Task 5 |
| WhatsApp generator — QR code via CDN | Task 6 (qrcode.js CDN) |
| WhatsApp generator — copy to clipboard | Task 6 |
| Invoice generator — line items + tax | Task 7 |
| Invoice generator — print/PDF | Task 7 (`window.print()`) |
| Email gate on 5 gated tools | Tasks 1–5 |
| No email gate on WhatsApp + Invoice | Tasks 6–7 (no gate) |
| Leads stored with `tool`, `email`, `ip` | Tasks 1–5 (each `submitEmail`) |
| `tools.css` — all new UI classes | Task 8 |
