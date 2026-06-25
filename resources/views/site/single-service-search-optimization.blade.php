@extends('public.layouts.app')

@section('title', 'SEO Services Company in Nigeria | i2Medier')
@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'SEO Services', 'item' => route('site.services.search-optimization')],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How long does SEO take to show results?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'SEO is a medium-to-long-term investment. Most businesses see measurable improvements in rankings within 3–6 months of consistent work. For new domains or those with serious technical issues, 6–12 months is more realistic before competitive keywords reach page one.']],
        ['@type' => 'Question', 'name' => 'Do you do local SEO for Nigerian businesses?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes, local SEO for Nigerian businesses is one of our strongest service areas. We optimise Google Business Profile listings, build local citation consistency, create city-specific landing pages, and implement LocalBusiness schema markup for Lagos, Abuja, Port Harcourt, and other major Nigerian cities.']],
        ['@type' => 'Question', 'name' => 'Can you guarantee first-page rankings?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'No ethical SEO agency can guarantee specific rankings. Any agency promising guaranteed positions is either misleading you or using black-hat tactics that will eventually trigger a Google penalty. What we guarantee: rigorous, transparent, best-practice work that consistently improves organic visibility over time.']],
        ['@type' => 'Question', 'name' => 'How much does SEO cost in Nigeria?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Our one-time SEO audit starts from ₦80,000. Monthly retainers start from ₦150,000/month for a basic ongoing campaign, with our most popular Growth Retainer at ₦250,000/month. Competitive Authority campaigns start from ₦500,000/month.']],
        ['@type' => 'Question', 'name' => 'Do I need SEO if I am already running Google Ads?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Google Ads delivers instant visibility but stops when you stop paying. SEO builds organic rankings that continue working for free, compounding over time and gradually reducing your dependence on paid traffic.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush


@push('page_css')
    @vite('resources/css/public/pages/search-optimization.css')
@endpush

@push('scripts')
    @vite('resources/js/public/pages/service-search-optimization.js')
@endpush

@section('content')
<header class="hero">
  <div class="hero-glow" aria-hidden="true"></div>
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-left">
    <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
      <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
      <span aria-current="page">Search Engine Optimisation</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> SEO Services</span>
    <h1>Get found on Google.<br>Rank higher.<br><em>Grow organically.</em></h1>
    <p class="hero-sub">We move businesses from invisible to page one through rigorous technical SEO, precision on-page optimisation, content strategy, local search domination, and transparent monthly reporting. No guesswork, just data, results, and honest work.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-white">Get a Free SEO Audit →</a>
      <a href="{{ route('portfolio.index') }}" class="btn-ghost">See Our Results</a>
    </div>
    <div class="hero-pills">
      <span class="hero-pill"><span class="hero-pill-dot"></span> Technical SEO Audits</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> On-Page Optimisation</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Local SEO Nigeria</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Content Strategy</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Link Building</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Monthly Reporting</span>
    </div>
  </div>
  <div class="hero-right" aria-hidden="true">
    <div class="serp-wrap">
      <div class="serp-float-badge"><span class="badge-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 19c5-1 8-4 10-9l4-2-2 4c-5 2-8 5-9 10l-3-3Z"></path><path d="M10 14 6 10"></path></svg></span>Ranked #1 in 90 days</div>
      <div class="serp-browser">
        <div class="serp-bar">
          <div class="serp-dot" style="background:#ff5f57"></div>
          <div class="serp-dot" style="background:#febc2e"></div>
          <div class="serp-dot" style="background:#28c840"></div>
          <div class="serp-input">
            <span class="serp-input-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.35-4.35"></path></svg></span>
            <span class="serp-input-text">chauffeur service london</span>
          </div>
        </div>
        <div class="serp-body">
          <div class="serp-ads-label">About 2,840,000 results</div>
          <div class="serp-result pos-1">
            <div class="serp-pos-badge"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 14 6-6 6 6"></path></svg> Position #1 · Up from #34</div>
            <div class="serp-result-url"><div class="serp-result-favicon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 15h14"></path><path d="M7 15l1-4h8l1 4"></path><path d="M8 11V9a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><circle cx="8" cy="16.5" r="1.5"></circle><circle cx="16" cy="16.5" r="1.5"></circle></svg></div><span class="serp-result-domain">meto7.com</span><span class="serp-result-path"> › london-chauffeur</span></div>
            <div class="serp-result-title">Premium Chauffeur Service London | Airport Transfers | Meto7</div>
            <div class="serp-result-desc">Book a luxury <span>chauffeur service in London</span> from ₤49. S-Class Mercedes, executive drivers, real-time tracking. <span>Airport transfers</span>, corporate travel & events.</div>
          </div>
          <div class="serp-rich">
            <div class="serp-rich-label">People also ask</div>
            <div class="serp-rich-faq">
              <div class="serp-rich-q">How much does a chauffeur cost in London? ▾</div>
              <div class="serp-rich-q">Is Meto7 available at Heathrow? ▾</div>
              <div class="serp-rich-q">How do I book a last-minute chauffeur? ▾</div>
            </div>
          </div>
          <div class="serp-result" style="margin-top:.4rem">
            <div class="serp-result-url"><div class="serp-result-favicon" style="background:#e8f0fe">C</div><span class="serp-result-domain">corporaterides.co.uk</span></div>
            <div class="serp-result-title">London Chauffeur & Executive Car Service</div>
            <div class="serp-result-desc">Corporate and <span>private chauffeur services</span> across London. Book online in minutes.</div>
          </div>
          <div class="serp-result">
            <div class="serp-result-url"><div class="serp-result-favicon" style="background:#fff0f0">E</div><span class="serp-result-domain">elitedriving.com</span></div>
            <div class="serp-result-title">Elite London Chauffeur — Business & Leisure</div>
            <div class="serp-result-desc">Trusted by 5,000+ clients. <span>Luxury chauffeur hire</span> for all occasions.</div>
          </div>
        </div>
      </div>
      <div class="serp-float-badge2"><span class="badge-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16"></path><path d="M7 15l3-3 3 2 4-5"></path><path d="M17 9h2v2"></path></svg></span>340% more organic traffic</div>
    </div>
  </div>
</header>

<div class="stats-band">
  <div class="stats-grid">
    <div class="stat-item reveal"><div class="stat-num"><span class="counter" data-target="340">0</span><span>%</span></div><div class="stat-lbl">Avg organic traffic lift</div></div>
    <div class="stat-item reveal"><div class="stat-num"><span class="counter" data-target="90">0</span><span> days</span></div><div class="stat-lbl">To first measurable results</div></div>
    <div class="stat-item reveal"><div class="stat-num">from <span>₦80k</span></div><div class="stat-lbl">One-time audit price</div></div>
    <div class="stat-item reveal"><div class="stat-num"><span class="counter" data-target="100">0</span><span>%</span></div><div class="stat-lbl">Transparent reporting</div></div>
  </div>
</div>

<section class="services-section" aria-labelledby="svc-overview-heading">
  <div class="two-col-intro">
    <div><span class="s-label">What We Do</span><h2 class="s-head" id="svc-overview-heading">Six SEO disciplines,<br>one <em>coherent strategy</em></h2></div>
    <p>SEO is not a single tactic. It is a system of interconnected disciplines. A technically flawless site that publishes poor content will not rank. Excellent content on a site that crawlers cannot index is invisible. We work across all six pillars simultaneously, because real ranking gains require all of them working together.</p>
  </div>
  <div class="services-grid">
    <div class="svc-card reveal"><div class="svc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.35-4.35"></path><path d="M11 8v6"></path><path d="M8 11h6"></path></svg></div><h3 class="svc-title">Technical SEO Audits</h3><p class="svc-desc">A systematic analysis of everything that affects how search engines discover, crawl, and index your website, including Core Web Vitals, crawl errors, duplicate content, structured data, site architecture, and mobile usability. Every issue is ranked by impact and turned into a clear action plan.</p><div class="svc-tags"><span class="svc-tag">Crawl Analysis</span><span class="svc-tag">Core Web Vitals</span><span class="svc-tag">Schema Markup</span><span class="svc-tag">Indexation</span></div></div>
    <div class="svc-card reveal"><div class="svc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 4h10l3 3v13H7z"></path><path d="M14 4v4h4"></path><path d="M10 12h6"></path><path d="M10 16h4"></path></svg></div><h3 class="svc-title">On-Page Optimisation</h3><p class="svc-desc">Optimisation of every on-page ranking signal, including title tags, meta descriptions, heading hierarchy, keyword usage, content depth, internal linking, image alt text, and semantic HTML structure.</p><div class="svc-tags"><span class="svc-tag">Title Tags</span><span class="svc-tag">Meta Descriptions</span><span class="svc-tag">Content Depth</span><span class="svc-tag">Internal Links</span></div></div>
    <div class="svc-card reveal"><div class="svc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18"></path><path d="M7 8h7a3 3 0 1 1 0 6H9a3 3 0 1 0 0 6h8"></path></svg></div><h3 class="svc-title">Keyword Research & Strategy</h3><p class="svc-desc">In-depth keyword research using Ahrefs, SEMrush, and Google Search Console data to uncover the exact search terms your customers use, including valuable long-tail opportunities your competitors are still missing.</p><div class="svc-tags"><span class="svc-tag">Intent Mapping</span><span class="svc-tag">Gap Analysis</span><span class="svc-tag">Long-tail</span><span class="svc-tag">Competitor Research</span></div></div>
    <div class="svc-card reveal"><div class="svc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s6-4.35 6-10a6 6 0 1 0-12 0c0 5.65 6 10 6 10Z"></path><circle cx="12" cy="11" r="2.5"></circle></svg></div><h3 class="svc-title">Local SEO</h3><p class="svc-desc">Dominate local search results for your city, neighbourhood, or service area. Google Business Profile optimisation, local citation building, review strategy, LocalBusiness schema, and location-specific landing pages.</p><div class="svc-tags"><span class="svc-tag">Google Business Profile</span><span class="svc-tag">Citations</span><span class="svc-tag">LocalBusiness Schema</span><span class="svc-tag">Map Pack</span></div></div>
    <div class="svc-card reveal"><div class="svc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20h4l10-10-4-4L4 16v4Z"></path><path d="m12 6 4 4"></path></svg></div><h3 class="svc-title">Content Strategy & Creation</h3><p class="svc-desc">A content calendar and editorial strategy built to capture organic traffic at every stage of the buyer journey, from awareness articles to comparison pages and conversion-focused service landing pages.</p><div class="svc-tags"><span class="svc-tag">Editorial Calendar</span><span class="svc-tag">Pillar Pages</span><span class="svc-tag">Topic Clusters</span><span class="svc-tag">SEO Copywriting</span></div></div>
    <div class="svc-card reveal"><div class="svc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 14 8 16a3 3 0 1 1-4-4l2-2"></path><path d="M14 10l2-2a3 3 0 1 1 4 4l-2 2"></path><path d="M9 15l6-6"></path></svg></div><h3 class="svc-title">Link Building</h3><p class="svc-desc">Acquisition of high-quality, editorially placed backlinks from relevant and authoritative websites through digital PR, content outreach, resource link building, and business directory submissions.</p><div class="svc-tags"><span class="svc-tag">Digital PR</span><span class="svc-tag">Guest Posts</span><span class="svc-tag">Resource Links</span><span class="svc-tag">Citation Building</span></div></div>
  </div>
</section>

<section aria-labelledby="audit-heading">
  <div class="audit-layout">
    <div class="audit-copy reveal">
      <span class="s-label">The SEO Audit</span>
      <h2 class="s-head" id="audit-heading">We start with<br>a <em>full diagnostic</em></h2>
      <p>Most businesses asking us for SEO help have no accurate picture of why their site is not ranking. They have tried blog posts, added keywords to titles, maybe submitted to Google, but rankings have barely moved.</p>
      <p>Our comprehensive SEO audit is the diagnostic that reveals exactly what is holding your site back. It covers every technical signal Google uses to evaluate your site, every on-page factor across all key pages, your backlink profile health, and a full gap analysis against the top three competitors for your target keywords.</p>
      <div class="quote-box"><p>"An SEO audit is not a one-time deliverable you file away. It is the map you work from for the next 12 months. Every strategy decision flows from what the audit reveals."</p></div>
      <p>You receive a written report with every issue classified by impact and effort, so you always know what to fix first regardless of your internal resources or budget cycle.</p>
      <a href="#contact" class="pillar-cta">Get Your Site Audited →</a>
    </div>
    <div class="reveal">
      <div class="audit-scorecard">
        <div class="audit-score-head"><h4>SEO Health Report</h4><span>example.com · run today</span></div>
        <div class="score-row"><div class="score-row-label"><span class="score-row-name">Core Web Vitals (LCP)</span><span class="score-row-val good">1.8s ✓</span></div><div class="score-bar-wrap"><div class="score-bar good" style="width:88%"></div></div></div>
        <div class="score-row"><div class="score-row-label"><span class="score-row-name">Mobile Usability</span><span class="score-row-val good">Passed ✓</span></div><div class="score-bar-wrap"><div class="score-bar good" style="width:96%"></div></div></div>
        <div class="score-row"><div class="score-row-label"><span class="score-row-name">Indexation Coverage</span><span class="score-row-val warn">72% ⚠</span></div><div class="score-bar-wrap"><div class="score-bar warn" style="width:72%"></div></div></div>
        <div class="score-row"><div class="score-row-label"><span class="score-row-name">Title Tag Optimisation</span><span class="score-row-val warn">58% ⚠</span></div><div class="score-bar-wrap"><div class="score-bar warn" style="width:58%"></div></div></div>
        <div class="score-row"><div class="score-row-label"><span class="score-row-name">Structured Data (Schema)</span><span class="score-row-val bad">Missing ✗</span></div><div class="score-bar-wrap"><div class="score-bar bad" style="width:8%"></div></div></div>
        <div class="score-row"><div class="score-row-label"><span class="score-row-name">Backlink Profile Quality</span><span class="score-row-val warn">44% ⚠</span></div><div class="score-bar-wrap"><div class="score-bar warn" style="width:44%"></div></div></div>
        <div class="score-row"><div class="score-row-label"><span class="score-row-name">Internal Linking Structure</span><span class="score-row-val bad">Weak ✗</span></div><div class="score-bar-wrap"><div class="score-bar bad" style="width:22%"></div></div></div>
        <div class="score-row"><div class="score-row-label"><span class="score-row-name">Content Keyword Coverage</span><span class="score-row-val warn">61% ⚠</span></div><div class="score-bar-wrap"><div class="score-bar warn" style="width:61%"></div></div></div>
        <hr class="score-divider">
        <div style="display:flex;justify-content:space-between;align-items:center;padding:.35rem 0"><span style="font-size:.8rem;font-weight:600;color:var(--black)">Overall SEO Score</span><span style="font-family:var(--serif);font-size:1.4rem;font-weight:700;color:#e37400">48 / 100</span></div>
        <div style="background:#fff8e1;border:1px solid #fde68a;border-radius:6px;padding:.75rem;font-size:.78rem;color:#92400e;line-height:1.6;margin-top:.25rem">⚠ <strong>5 high-impact issues found.</strong> Schema markup and internal linking represent the fastest ranking opportunities. Full remediation report available, contact us for a free audit.</div>
      </div>
    </div>
  </div>
</section>

<section class="pillar-section off" id="technical" aria-labelledby="tech-seo-heading">
  <div class="pillar-inner reveal">
    <div class="pillar-copy">
      <span class="s-label">Technical SEO</span>
      <h2 class="s-head" id="tech-seo-heading">If Google can't crawl it,<br>it <em>can't rank it</em></h2>
      <p>Technical SEO is the foundation everything else is built on. No matter how good your content is, if Google's crawler hits errors, if your pages load slowly, or if your site structure sends conflicting signals, your rankings will underperform.</p>
      <p>We use Screaming Frog, Ahrefs, Google Search Console, and PageSpeed Insights to systematically audit your entire site, identifying crawl errors, broken links, duplicate content, orphaned pages, slow-loading resources, missing canonical tags, and structured data opportunities.</p>
      <ul class="pillar-bullets">
        <li>Full crawl analysis, broken links, redirect chains, canonicalisation errors</li>
        <li>Core Web Vitals remediation, LCP, CLS, and INP optimisation</li>
        <li>XML sitemap audit and resubmission to Google Search Console</li>
        <li>robots.txt review and crawl budget optimisation</li>
        <li>Structured data (JSON-LD) opportunities</li>
        <li>HTTPS, security headers, and mobile usability verification</li>
      </ul>
      <a href="#contact" class="pillar-cta">Request a Technical Audit →</a>
    </div>
    <div class="pillar-visual" aria-hidden="true">
      <div class="vis-pad">
        <div class="cwv-panel">
          <div class="cwv-title">Core Web Vitals — After Optimisation</div>
          <div class="cwv-row">
            <div class="cwv-row-head"><span class="cwv-metric">Largest Contentful Paint</span><span class="cwv-val good">1.2s</span></div>
            <div class="cwv-bar-bg"><div class="cwv-bar-fill good" style="width:92%"></div></div>
          </div>
          <div class="cwv-row">
            <div class="cwv-row-head"><span class="cwv-metric">Cumulative Layout Shift</span><span class="cwv-val good">0.04</span></div>
            <div class="cwv-bar-bg"><div class="cwv-bar-fill good" style="width:97%"></div></div>
          </div>
          <div class="cwv-row">
            <div class="cwv-row-head"><span class="cwv-metric">Interaction to Next Paint</span><span class="cwv-val good">88ms</span></div>
            <div class="cwv-bar-bg"><div class="cwv-bar-fill good" style="width:88%"></div></div>
          </div>
          <div class="cwv-row">
            <div class="cwv-row-head"><span class="cwv-metric">Time to First Byte</span><span class="cwv-val good">320ms</span></div>
            <div class="cwv-bar-bg"><div class="cwv-bar-fill good" style="width:94%"></div></div>
          </div>
          <div class="cwv-score-row">
            <span class="cwv-score-label">PageSpeed Score (Mobile)</span>
            <span class="cwv-score-num">96</span>
          </div>
        </div>
        <div style="margin-top:1rem">
          <div class="schema-block">
            <div class="schema-block-bar"><span>structured-data.json</span><span class="lang">JSON-LD</span></div>
<pre><span class="c-c">// FAQ schema for rich search snippets</span>
{
  <span class="c-n">"@type"</span>: <span class="c-s">"FAQPage"</span>,
  <span class="c-n">"mainEntity"</span>: [{
    <span class="c-n">"@type"</span>: <span class="c-s">"Question"</span>,
    <span class="c-n">"name"</span>: <span class="c-s">"How do I book?"</span>,
    <span class="c-n">"acceptedAnswer"</span>: {
      <span class="c-n">"@type"</span>: <span class="c-s">"Answer"</span>,
      <span class="c-n">"text"</span>: <span class="c-s">"Book online in 2 mins"</span>
    }
  }]
}</pre>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pillar-section" id="content" aria-labelledby="kw-heading">
  <div class="pillar-inner rev reveal">
    <div class="pillar-copy">
      <span class="s-label">Keyword Research & On-Page SEO</span>
      <h2 class="s-head" id="kw-heading">Rank for what your<br>customers <em>actually search</em></h2>
      <p>Good SEO begins with search intent, not vanity keywords. We research how your audience searches, group those keywords into logical clusters, and map them to the right landing pages, service pages, and supporting content. Each keyword is evaluated not just by search volume, but by commercial intent, ranking difficulty, SERP layout, and how closely it aligns with your actual business goals.</p>
      <p>Then we optimise every on-page signal: titles, descriptions, headings, semantic structure, internal links, image alt attributes, and the content itself, so each page sends a strong, unambiguous relevance signal to Google. We do not "sprinkle keywords." We build pages to satisfy search intent completely.</p>
      <ul class="pillar-bullets">
        <li>Keyword clustering by search intent and funnel stage</li>
        <li>Competitor keyword gap analysis</li>
        <li>Title tags, meta descriptions, and heading optimisation</li>
        <li>Internal linking architecture built around priority pages</li>
        <li>Content briefs designed to win snippets and rankings</li>
      </ul>
      <a href="#contact" class="pillar-cta">Plan an SEO Content Strategy →</a>
    </div>
    <div class="pillar-visual" aria-hidden="true">
      <div class="vis-pad">
        <table class="kw-table">
          <thead><tr><th>Keyword</th><th>Current</th><th>Target</th></tr></thead>
          <tbody>
            <tr><td class="kw-term">chauffeur service london</td><td><span class="rank-badge p2">#34</span></td><td><span class="rank-badge top3">Top 3</span></td></tr>
            <tr><td class="kw-term">heathrow airport transfer</td><td><span class="rank-badge top10">#9</span></td><td><span class="rank-badge top3">Top 3</span></td></tr>
            <tr><td class="kw-term">executive car service london</td><td><span class="rank-badge nr">NR</span></td><td><span class="rank-badge top10">Top 10</span></td></tr>
            <tr><td class="kw-term">wedding chauffeur london</td><td><span class="rank-badge top10">#7</span></td><td><span class="rank-badge top3">Top 3</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<section class="pillar-section off" id="local" aria-labelledby="local-seo-heading">
  <div class="pillar-inner reveal">
    <div class="pillar-copy">
      <span class="s-label">Local SEO</span>
      <h2 class="s-head" id="local-seo-heading">Own your city,<br>not just the <em>blue links</em></h2>
      <p>Local SEO is how service businesses win high-intent traffic from people ready to call, visit, or book now. We optimise your Google Business Profile, citation consistency, local landing pages, and review acquisition flow so you show up where buyers are making decisions, especially in the map pack where so much local intent now lives.</p>
      <p>For Nigerian businesses, we tailor local SEO for the way people search here, from city modifiers to neighbourhood terms and mobile-first query behaviour. We also support diaspora-facing businesses that need to rank locally in the UK or North America while remaining relevant to Nigerian search audiences.</p>
      <ul class="pillar-bullets">
        <li>Google Business Profile optimisation</li>
        <li>Local citation cleanup and expansion</li>
        <li>City and region landing pages</li>
        <li>LocalBusiness schema implementation</li>
        <li>Review generation strategy and trust signals</li>
      </ul>
      <a href="#contact" class="pillar-cta">Improve Local Visibility →</a>
    </div>
    <div class="pillar-visual" aria-hidden="true">
      <div class="vis-pad">
        <div class="map-mock">
          <div class="map-mock-top">
            <div class="map-grid-lines"></div>
            <div class="map-road-h"></div>
            <div class="map-road-v"></div>
            <div class="pin-ico" style="top:30px;left:80px"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s6-4.35 6-10a6 6 0 1 0-12 0c0 5.65 6 10 6 10Z"></path></svg></div>
            <div class="pin-ico" style="top:45px;left:160px"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s6-4.35 6-10a6 6 0 1 0-12 0c0 5.65 6 10 6 10Z"></path></svg></div>
            <div class="pin-ico" style="top:60px;left:240px"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s6-4.35 6-10a6 6 0 1 0-12 0c0 5.65 6 10 6 10Z"></path></svg></div>
          </div>
          <div class="map-listings">
            <div class="map-listing top"><div class="ml-num">1</div><div><div class="ml-name">i2Medier SEO Services</div><div class="ml-sub">Lagos · SEO Agency</div><div class="ml-stars">★★★★★</div></div></div>
            <div class="map-listing"><div class="ml-num">2</div><div><div class="ml-name">SearchLab NG</div><div class="ml-sub">Lagos · Marketing</div><div class="ml-stars">★★★★☆</div></div></div>
            <div class="map-listing"><div class="ml-num">3</div><div><div class="ml-name">Local Rank Co.</div><div class="ml-sub">Abuja · SEO</div><div class="ml-stars">★★★★☆</div></div></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pillar-section dark" id="traffic" aria-labelledby="content-heading">
  <div class="pillar-inner rev reveal">
    <div class="pillar-copy">
      <span class="s-label">Content Strategy & Growth</span>
      <h2 class="s-head" style="color:var(--white)" id="content-heading">Organic traffic grows when<br>content <em>compounds</em></h2>
      <p>SEO content is not random blog posting. It is a structured publishing system built around keyword clusters, business priorities, and internal linking paths that strengthen your highest-value pages over time. Every new page should make your whole site stronger, not just exist on its own.</p>
      <p>We plan and produce pillar pages, supporting articles, location pages, comparison pages, FAQs, and evergreen assets that expand your topical authority month after month. We also continuously improve existing pages when search behaviour or rankings reveal new opportunities.</p>
      <ul class="pillar-bullets">
        <li>Editorial calendars aligned to keyword opportunities</li>
        <li>Pillar pages and topic clusters</li>
        <li>Conversion-focused service page copy</li>
        <li>FAQ content designed for snippet capture</li>
        <li>Monthly reporting on rankings, traffic, and conversions</li>
      </ul>
      <a href="#contact" class="pillar-cta">Build an Organic Growth Plan →</a>
    </div>
    <div class="pillar-visual" aria-hidden="true">
      <div class="vis-pad">
        <div class="traffic-chart">
          <div class="tc-header"><div><div class="tc-title">Organic sessions</div><div class="tc-total">28,440</div></div><div class="tc-delta">+340%</div></div>
          <div class="tc-bars">
            <div class="tc-bar old" style="height:14px"></div><div class="tc-bar old" style="height:18px"></div><div class="tc-bar old" style="height:20px"></div><div class="tc-bar old" style="height:24px"></div><div class="tc-bar old" style="height:28px"></div><div class="tc-bar old" style="height:32px"></div>
            <div class="tc-bar new" style="height:38px"></div><div class="tc-bar new" style="height:46px"></div><div class="tc-bar new" style="height:54px"></div><div class="tc-bar new" style="height:62px"></div><div class="tc-bar new" style="height:68px"></div><div class="tc-bar new" style="height:70px"></div>
          </div>
          <div class="tc-months"><span>Jan</span><span>Mar</span><span>May</span><span>Jul</span><span>Sep</span><span>Nov</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="process-section" aria-labelledby="process-heading">
  <div class="process-header">
    <div><span class="s-label" style="color:var(--gold)">Our Process</span><h2 class="s-head" style="color:var(--white)" id="process-heading">How we run an SEO campaign<br>that <em>actually moves</em></h2></div>
    <p>SEO works best when the process is disciplined. We start with research and technical foundations, move into on-page execution and content, and then scale rankings through link building, reporting, and continuous iteration.</p>
  </div>
  <div class="process-grid">
    <div class="proc-card reveal"><div class="proc-num">Month 1</div><div class="proc-title">Audit, Research & Strategy</div><p class="proc-desc">Comprehensive technical audit, full keyword universe research, competitor gap analysis, content audit of existing pages, backlink profile review, and Google Search Console and Analytics setup. Deliverable: a full SEO strategy document and 90-day action plan with every task prioritised by impact.</p><div class="proc-tags"><span class="proc-tag">Technical Audit</span><span class="proc-tag">Keyword Research</span><span class="proc-tag">Competitor Analysis</span><span class="proc-tag">Strategy Doc</span></div></div>
    <div class="proc-card reveal"><div class="proc-num">Month 2</div><div class="proc-title">Technical Fixes & On-Page Optimisation</div><p class="proc-desc">Systematic implementation of all high-priority technical fixes, crawl errors, Core Web Vitals, schema markup, canonical tags, redirect chains, sitemap resubmission. Simultaneously, on-page optimisation of the top 10 highest-priority pages: title tags, meta descriptions, heading structure, content depth, and internal links.</p><div class="proc-tags"><span class="proc-tag">Technical Remediation</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">On-Page Rewrite</span><span class="proc-tag">GSC Fixes</span></div></div>
    <div class="proc-card reveal"><div class="proc-num">Month 3</div><div class="proc-title">Content Production Begins</div><p class="proc-desc">First batch of content created and published, typically 2–4 long-form pieces targeting identified keyword clusters. Local SEO work starts: Google Business Profile optimisation, citation submissions, and location page creation. First ranking movement usually visible by end of month three for lower-competition keywords.</p><div class="proc-tags"><span class="proc-tag">Content Publishing</span><span class="proc-tag">GBP Optimisation</span><span class="proc-tag">Citation Building</span><span class="proc-tag">First Rankings</span></div></div>
    <div class="proc-card reveal"><div class="proc-num">Month 4–6</div><div class="proc-title">Momentum & Link Acquisition</div><p class="proc-desc">Continuous content production against the editorial calendar. Link building campaign begins: digital PR outreach, resource link requests, and guest post placements on relevant, high-authority websites. Mid-competition keywords begin to reach page one. Monthly ranking report delivered with keyword-level performance data and organic traffic trends.</p><div class="proc-tags"><span class="proc-tag">Link Building</span><span class="proc-tag">Digital PR</span><span class="proc-tag">Page-1 Rankings</span><span class="proc-tag">Monthly Report</span></div></div>
    <div class="proc-card reveal"><div class="proc-num">Month 7–12</div><div class="proc-title">Scale, Compound & Optimise</div><p class="proc-desc">Rankings compound. Content published in months 3–6 matures and climbs. We focus on moving page-two positions to page one, targeting the next tier of competitive keywords, expanding content into new topic clusters, and growing the backlink profile. Quarterly strategy reviews recalibrate the plan based on what the data shows is working.</p><div class="proc-tags"><span class="proc-tag">Compound Growth</span><span class="proc-tag">Competitive Keywords</span><span class="proc-tag">Quarterly Review</span><span class="proc-tag">Scaling</span></div></div>
    <div class="proc-card reveal"><div class="proc-num">Ongoing</div><div class="proc-title">Reporting & Algorithm Monitoring</div><p class="proc-desc">Monthly written report covering: keyword rankings (position + movement), organic traffic (sessions, users, conversions), top-performing pages, backlinks acquired, content published, and technical health status. Algorithm updates are monitored and responded to within 48 hours of a confirmed Google core update.</p><div class="proc-tags"><span class="proc-tag">Monthly Report</span><span class="proc-tag">Algorithm Watch</span><span class="proc-tag">KPI Dashboard</span><span class="proc-tag">Transparency</span></div></div>
  </div>
</section>

<section aria-labelledby="deliv-heading">
  <div class="two-col-intro">
    <div><span class="s-label">What You Get</span><h2 class="s-head" id="deliv-heading">Everything included in<br>every <em>SEO engagement</em></h2></div>
    <p>These are not hidden upsells. They are core deliverables in the way we run SEO, from diagnosis and implementation to reporting and ongoing refinement. If we are running your campaign, these are the assets and systems you should expect to receive.</p>
  </div>
  <div class="deliv-grid">
    <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6"></path><path d="M10 3v3"></path><path d="M14 3v3"></path><path d="M8 9h8"></path><path d="M7 6h10l2 13H5L7 6Z"></path></svg></div><div class="deliv-body"><h4>Full Technical Audit Report</h4><p>A complete site technical health report in month one, every issue classified by impact and effort, with remediation guidance for each. Refreshed every six months or after major site changes.</p></div></div>
    <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18"></path><path d="M7 8h7a3 3 0 1 1 0 6H9a3 3 0 1 0 0 6h8"></path></svg></div><div class="deliv-body"><h4>Keyword Tracking Dashboard</h4><p>A live ranking dashboard showing the position of every target keyword, with history going back to campaign start. You always know where you stand in real time.</p></div></div>
    <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20h4l10-10-4-4L4 16v4Z"></path><path d="m12 6 4 4"></path></svg></div><div class="deliv-body"><h4>SEO Content Pieces</h4><p>Monthly content production as agreed in scope, long-form pillar pages and supporting cluster articles, each with a defined target keyword and fully optimised on-page.</p></div></div>
    <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 14 8 16a3 3 0 1 1-4-4l2-2"></path><path d="M14 10l2-2a3 3 0 1 1 4 4l-2 2"></path><path d="M9 15l6-6"></path></svg></div><div class="deliv-body"><h4>Link Building Report</h4><p>A monthly summary of every backlink acquired, source domain, authority score, anchor text, and live URL, so you can verify every link we claim to have built.</p></div></div>
    <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s6-4.35 6-10a6 6 0 1 0-12 0c0 5.65 6 10 6 10Z"></path><circle cx="12" cy="11" r="2.5"></circle></svg></div><div class="deliv-body"><h4>Local SEO Assets</h4><p>For local clients: updated Google Business Profile, citation submissions, location page copy, and monthly map-pack position tracking for all target city and service combinations.</p></div></div>
    <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="15" rx="2"></rect><path d="M8 3v4"></path><path d="M16 3v4"></path><path d="M4 10h16"></path></svg></div><div class="deliv-body"><h4>Quarterly Strategy Review</h4><p>A scheduled 60-minute call every three months to review performance, recalibrate keyword targets, discuss algorithm changes, and plan the next quarter's activity.</p></div></div>
    <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 5h12a2 2 0 0 1 2 2v10l-4-3H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"></path></svg></div><div class="deliv-body"><h4>Dedicated Account Manager</h4><p>A single point of contact for all SEO activity. One person manages your account, knows your goals, and is reachable via email or Slack.</p></div></div>
    <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16"></path><path d="M7 15l3-3 3 2 4-5"></path><path d="M17 9h2v2"></path></svg></div><div class="deliv-body"><h4>Monthly Reporting</h4><p>Clear reporting on rankings, traffic, conversions, wins, losses, and the exact actions we are taking next, not vague "SEO work" summaries.</p></div></div>
  </div>
</section>

<section class="pkg-section" aria-labelledby="pkg-heading">
  <div class="two-col-intro">
    <div><span class="s-label">Pricing</span><h2 class="s-head" id="pkg-heading">SEO packages for<br>every <em>growth stage</em></h2></div>
    <p>SEO is a monthly investment and results compound over time, meaning the longer the campaign runs, the higher the return. We offer monthly retainers at three tiers, plus one-time audit and strategy packages for businesses that want to start with clarity before committing to a full campaign.</p>
  </div>
  <div class="pkg-grid">
    <div class="pkg-card reveal"><div class="pkg-head"><div class="pkg-badge">Audit & Strategy</div><div class="pkg-name">SEO Audit</div><p class="pkg-tagline">A full diagnostic of where your site stands and exactly what to do to improve it. One-time project, no retainer required.</p><div class="pkg-price">₦80k <sub>one-time</sub></div></div><div class="pkg-body"><div class="pkg-feat">Full technical SEO audit</div><div class="pkg-feat">Keyword research & gap analysis</div><div class="pkg-feat">On-page audit (up to 20 pages)</div><div class="pkg-feat">Backlink profile review</div><div class="pkg-feat">Competitor comparison (3 rivals)</div><div class="pkg-feat">Prioritised action report</div><div class="pkg-feat">60-min strategy call walkthrough</div><div class="pkg-feat no">Monthly ongoing work</div><div class="pkg-feat no">Content creation</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn outline">Order an Audit →</a></div></div>
    <div class="pkg-card featured reveal"><div class="pkg-head"><div class="pkg-badge">Best Value</div><div class="pkg-name">Growth Retainer</div><p class="pkg-tagline">Full monthly SEO campaign, technical, content, links, local, and reporting. Everything needed to climb and stay on page one.</p><div class="pkg-price">₦250k <sub>/month</sub></div></div><div class="pkg-body"><div class="pkg-feat">Full technical monitoring & fixes</div><div class="pkg-feat">On-page optimisation (ongoing)</div><div class="pkg-feat">2 long-form SEO articles/month</div><div class="pkg-feat">Local SEO (GBP + citations)</div><div class="pkg-feat">4+ backlinks acquired/month</div><div class="pkg-feat">Keyword tracking (50 keywords)</div><div class="pkg-feat">Monthly written report</div><div class="pkg-feat">Dedicated account manager</div><div class="pkg-feat">Quarterly strategy review</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn gold">Start Your Campaign →</a></div></div>
    <div class="pkg-card reveal"><div class="pkg-head"><div class="pkg-badge">High Competition</div><div class="pkg-name">Authority Campaign</div><p class="pkg-tagline">For businesses in competitive industries that need maximum content output, aggressive link acquisition, and enterprise-level reporting.</p><div class="pkg-price">₦500k+ <sub>/month</sub></div></div><div class="pkg-body"><div class="pkg-feat">Everything in Growth, plus:</div><div class="pkg-feat">4–6 long-form articles/month</div><div class="pkg-feat">10+ backlinks/month (DR 50+)</div><div class="pkg-feat">Digital PR campaign</div><div class="pkg-feat">Keyword tracking (150 keywords)</div><div class="pkg-feat">Conversion rate optimisation</div><div class="pkg-feat">Weekly check-in calls</div><div class="pkg-feat">Custom reporting dashboard</div><div class="pkg-feat">Algorithm impact response (48h)</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn solid">Discuss Your Goals →</a></div></div>
  </div>
</section>

<section class="results-section" aria-labelledby="results-heading">
  <div class="two-col-intro">
    <div><span class="s-label">Proven Results</span><h2 class="s-head" id="results-heading">Real rankings. Real traffic.<br><em>Real business impact.</em></h2></div>
    <p>These are real numbers from live SEO campaigns we have run. Good SEO is measurable in keyword positions, organic sessions, and ultimately in enquiries and revenue. Here is what our work delivers.</p>
  </div>
  <div class="results-grid">
    <div class="result-card reveal"><div class="result-num"><span class="counter" data-target="340">0</span><span>%</span></div><div class="result-label">Increase in organic search visibility within 90 days of campaign launch</div><p class="result-project">Meto7 Chauffeur Services moved from zero page-one rankings to position #1 for "chauffeur service London" and 6 additional target keywords within 3 months.</p><a href="{{ route('portfolio.show', ['portfolioProject' => 'meto7']) }}" class="result-link">Read Case Study →</a></div>
    <div class="result-card reveal"><div class="result-num">#<span class="counter" data-target="1">0</span></div><div class="result-label">Google ranking for primary target keyword, up from position #34</div><p class="result-project">Achieved through a combination of technical SEO remediation, on-page optimisation of the target landing page, structured data implementation, and 12 high-authority backlinks acquired in the first 90 days.</p></div>
    <div class="result-card reveal"><div class="result-num"><span class="counter" data-target="6">0</span>× <span style="font-size:1.5rem">more</span></div><div class="result-label">Web-form enquiries per month after first 6 months compared to pre-campaign baseline</div><p class="result-project">Organic traffic improvement translated directly to business outcomes. The client reported the website became their primary lead source, surpassing all paid channels within 6 months of SEO campaign start.</p></div>
  </div>
</section>

<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What clients say about<br>our <em>SEO work</em></h2>
  <div class="test-grid">
    <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"We went from not appearing in Google at all to ranking number one for our main search term within three months. i2Medier showed us exactly what they were doing and why at every stage. The monthly reports are detailed and honest, we always know exactly where we stand."</p><div class="test-author"><div class="test-avatar">M</div><div><div class="test-name">Operations Director</div><div class="test-role">Meto7 Chauffeur Services, UK</div></div></div></div>
    <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"The technical audit they delivered was eye-opening, we had no idea our site had so many crawl issues and missing structured data. Within six weeks of implementing the fixes, we saw clear ranking improvements on terms we hadn't moved on in over a year."</p><div class="test-author"><div class="test-avatar">J</div><div><div class="test-name">Founder & Director</div><div class="test-role">Jayach Care Services, UK</div></div></div></div>
    <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"Local SEO was the missing piece for us. After i2Medier optimised our Google Business Profile and built our local citations, we started appearing in the map pack for searches in Lagos and Abuja. Our inquiry volume from Google nearly tripled in four months."</p><div class="test-author"><div class="test-avatar">O</div><div><div class="test-name">Managing Director</div><div class="test-role">Professional Services Firm, Lagos</div></div></div></div>
  </div>
</section>

<section aria-labelledby="faq-heading">
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">SEO questions,<br><em>answered honestly</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal"><h3>Still have questions?</h3><p>SEO can feel opaque, we know. Email us and we'll answer your specific question directly, with no sales pressure.</p><a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a></div>
    <div class="faq-list reveal">
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f1">How long does SEO take to show results?<span class="faq-icon">+</span></button><div class="faq-a" id="f1">SEO is a medium-to-long-term investment. Most businesses see measurable improvements in rankings within 3–6 months of consistent work. For new domains or those with serious technical issues, 6–12 months is more realistic before competitive keywords reach page one. That said, technical fixes, resolving crawl errors, improving Core Web Vitals, adding schema markup, can produce ranking improvements within weeks. The first 90 days typically show clear movement on lower-competition keywords, with more competitive terms following.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f2">What is included in an SEO audit?<span class="faq-icon">+</span></button><div class="faq-a" id="f2">Our audit covers four areas: Technical (crawlability, indexation, Core Web Vitals, mobile usability, structured data, site speed, duplicate content, redirect health), On-Page (title tags, meta descriptions, heading hierarchy, content quality, keyword usage, internal linking, image optimisation), Off-Page (backlink profile quality, domain authority, anchor text distribution, competitor backlink comparison), and Keyword Gaps (terms you should rank for but do not, comparing your position against the top three competitors). Every issue is classified by impact level and provided with a clear remediation action.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f3">Do you do local SEO for Nigerian businesses?<span class="faq-icon">+</span></button><div class="faq-a" id="f3">Yes, local SEO for Nigerian businesses is one of our strongest service areas. We optimise Google Business Profile listings, build local citation consistency across Nigerian and international directories, create city and region-specific landing pages, and implement LocalBusiness schema markup. We have successfully ranked businesses in the Google Map Pack for competitive local searches in Lagos, Abuja, Port Harcourt, and other major Nigerian cities. For UK-based Nigerian diaspora businesses, we handle both UK local and international Nigerian search simultaneously.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f4">What is the difference between on-page and technical SEO?<span class="faq-icon">+</span></button><div class="faq-a" id="f4">On-page SEO covers what visitors can see and read, title tags, meta descriptions, heading structure, the written content, keyword usage, image alt text, and internal links. It determines relevance signals for your target keywords. Technical SEO covers the infrastructure underneath, how Google discovers and crawls your pages, site speed and Core Web Vitals, canonical URL handling, XML sitemaps, robots.txt, structured data, HTTPS, and mobile usability. Both are essential.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f5">Can you guarantee first-page rankings?<span class="faq-icon">+</span></button><div class="faq-a" id="f5">No ethical SEO agency can guarantee specific rankings, Google's algorithm changes constantly, competition shifts, and no one outside Google controls the index. Any agency promising guaranteed positions is either lying or relying on black-hat tactics that will eventually trigger a manual or algorithmic penalty far worse than starting from scratch. What we can guarantee: rigorous, transparent, best-practice work that consistently improves organic visibility over time.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f6">How much does SEO cost in Nigeria?<span class="faq-icon">+</span></button><div class="faq-a" id="f6">Our one-time SEO audit starts from ₦80,000. Monthly retainers start from ₦150,000/month for a basic ongoing campaign, with our most popular Growth Retainer at ₦250,000/month covering technical monitoring, content creation, link building, local SEO, and full reporting. Competitive Authority campaigns for businesses in high-competition industries start from ₦500,000/month. Pricing is transparent and fixed, no surprise invoices.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f7">Do I need SEO if I am already running Google Ads?<span class="faq-icon">+</span></button><div class="faq-a" id="f7">Yes, and the two work better together than either does alone. Google Ads delivers instant visibility but stops the moment you stop paying. SEO builds organic rankings that continue working for free, compounding over time and gradually reducing your dependence on paid traffic. Many businesses run Ads to generate leads while SEO is being built, then shift budget as organic rankings mature.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f8">What tools do you use for SEO?<span class="faq-icon">+</span></button><div class="faq-a" id="f8">Our core SEO toolkit: Ahrefs (backlink analysis, keyword research, rank tracking, competitor research), SEMrush (keyword gaps, position tracking, on-page audit), Screaming Frog (full-site technical crawl), Google Search Console (indexation, Core Web Vitals, search performance data), Google Analytics 4 (traffic and conversion analysis), PageSpeed Insights and Lighthouse (performance auditing), and Surfer SEO (content optimisation briefs). All clients receive access to a shared reporting dashboard so you can see live ranking data at any time.</div></div>
    </div>
  </div>
</section>

<section class="related-section" aria-labelledby="related-heading">
  <span class="s-label">Related Services</span>
  <h2 class="s-head" id="related-heading">Often paired <em>with SEO</em></h2>
  <div class="related-grid">
    <a href="{{ route('site.services.wordpress-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M8.5 8.5c1 4.5 3 7.5 3.5 7.5s2.5-3 3.5-7.5"></path><path d="M7.5 10h9"></path></svg></div><div class="ri-name">WordPress Development</div><p class="ri-desc">A fast, well-structured WordPress site is the foundation every SEO campaign is built on. We build both.</p></a>
    <a href="{{ route('site.services.cloud-architecture') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 5 14h6l-1 8 8-12h-6l1-8Z"></path></svg></div><div class="ri-name">Performance Optimisation</div><p class="ri-desc">Core Web Vitals are a ranking factor. We optimise existing sites to score 90+ on mobile PageSpeed.</p></a>
    <a href="{{ route('site.services.laravel-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1 1 0 0 0 .2 1.1l.1.1a2 2 0 0 1-2.8 2.8l-.1-.1a1 1 0 0 0-1.1-.2 1 1 0 0 0-.6.9V20a2 2 0 1 1-4 0v-.2a1 1 0 0 0-.7-.9 1 1 0 0 0-1.1.2l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1 1 0 0 0 .2-1.1 1 1 0 0 0-.9-.6H4a2 2 0 1 1 0-4h.2a1 1 0 0 0 .9-.7 1 1 0 0 0-.2-1.1l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1 1 0 0 0 1.1.2 1 1 0 0 0 .6-.9V4a2 2 0 1 1 4 0v.2a1 1 0 0 0 .7.9 1 1 0 0 0 1.1-.2l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1 1 0 0 0-.2 1.1 1 1 0 0 0 .9.6H20a2 2 0 1 1 0 4h-.2a1 1 0 0 0-.9.7Z"></path></svg></div><div class="ri-name">Laravel Development</div><p class="ri-desc">SEO-ready Laravel applications with structured data, canonical URLs, sitemaps, and fast page delivery built in from the start.</p></a>
    <a href="{{ route('site.services.ui-ux-design') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16"></path><path d="M7 4v16"></path><path d="m14 14 6 6"></path><circle cx="16" cy="16" r="3"></circle></svg></div><div class="ri-name">UI/UX Design</div><p class="ri-desc">High dwell time and low bounce rate are SEO signals. Better UX means better rankings and stronger conversion performance.</p></a>
  </div>
</section>

<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to rank higher<br>on Google?</h2>
  <p>Get a free SEO audit and strategy consultation. We will show you exactly what is holding your site back and what it will take to fix it.</p>
  <a href="{{ route('site.start', ['services' => 'seo', 'source_page' => 'service-search-optimization', 'source_label' => 'Search Optimization Service Page']) }}" class="btn-dark">Get Your Free SEO Audit →</a>
</section>
@endsection
