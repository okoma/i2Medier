@extends('public.layouts.app')

@section('title', 'Marketing Agency Website Design Company in Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Marketing Agency Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'marketing-agency-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'How much does a website for a marketing agency cost?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Marketing agency websites start from ₦350,000 for a clean, professional site with service pages, a few case studies, and an enquiry form. A full growth website with individual service channel pages, a comprehensive case study and portfolio section, team profiles, insights blog, and advanced SEO starts from ₦750,000. Enterprise platforms for larger agencies are quoted individually. Every quote is detailed and itemised before any commitment is required.']],
        ['@type' => 'Question', 'name' => 'What pages should a marketing agency website have?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A high-performing marketing agency website should include: Home, About and Team, individual service pages (one per channel, covering SEO, Paid Ads, Social Media, Content, Email, and more), Case Studies (individual pages with specific results), Portfolio, Industries Served, Insights Blog, Process/How We Work, and Contact/Strategy Call. Individual service channel pages are especially important for SEO because they allow you to rank for specific searches like "SEO agency Lagos" or "social media agency Nigeria" and give prospects the detailed information they need to choose your agency for that specific service.']],
        ['@type' => 'Question', 'name' => 'How long does it take to build a marketing agency website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard marketing agency website takes 3 to 5 weeks from design approval to launch. Larger platforms with many service pages, extensive case study and portfolio sections, and an active blog may take 5 to 8 weeks. We provide a detailed milestone-based timeline at the start of every project so that you always know exactly what is in progress and when the next stage will be delivered.']],
        ['@type' => 'Question', 'name' => 'Will my marketing agency website rank on Google?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Every website we build includes a complete SEO technical foundation covering optimised title tags and meta descriptions, ProfessionalService schema markup, XML sitemap, canonical URLs, and Google Search Console submission from day one. For competitive marketing agency keywords such as "digital marketing agency Lagos" and "SEO agency Nigeria", this technical foundation combined with well-structured service pages and regular content publication gives you the best possible organic ranking trajectory. Monthly SEO retainers are also available for ongoing campaign work.']],
        ['@type' => 'Question', 'name' => 'Can I update case studies and portfolio items myself?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Updating case studies, adding portfolio items, publishing insights articles, and editing team profiles are all core content workflows that every handover includes. We use ACF Pro to create intuitive, field-based editing interfaces for all content types, so no coding is required. Adding a new case study is as simple as filling in a form covering client name, industry, challenge, strategy, results, and metrics. You also receive CMS training, a written admin guide, and a 30-day post-launch support window to cover any questions that arise.']],
        ['@type' => 'Question', 'name' => 'Do you build websites for specialist or niche marketing agencies?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We work with full-service agencies, performance marketing specialists, creative studios, SEO-focused agencies, social media agencies, content marketing firms, and B2B marketing consultancies. The page architecture, service descriptions, and keyword strategy are tailored to your specific positioning and the channels you specialise in. A specialist agency and a full-service agency need very different website approaches, and we design each engagement from the specific positioning outward.']],
        ['@type' => 'Question', 'name' => 'Can potential clients book a strategy call directly through the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We integrate strategy call booking (Calendly or similar), a multi-step project brief form that pre-qualifies prospects before the first conversation, and direct contact options. Every form submission is routed to your inbox and optionally to your CRM, with automatic confirmation messages sent to the prospect. The goal is to make the path from "interested visitor" to "booked strategy call" as frictionless and fast as possible, with no manual follow-up required on your end.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/marketing-agency-web-design.css')
@endpush

@section('content')
<!-- ═══ HERO ═══ -->
<header class="hero">
  <div class="hero-glow" aria-hidden="true"></div>
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-left">
    <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
      <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services.web-design') }}">Web Design</a><span class="breadcrumb-sep">›</span>
      <span aria-current="page">Web Design for Marketing Agencies</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Marketing Agency Web Design</span>
    <h1>Websites that win clients<br>for your marketing<br><em>agency</em></h1>
    <p class="hero-sub">We design and build high-performance marketing agency websites for digital marketing firms, creative studios, and performance agencies across Nigeria, the UK, and worldwide. The result is a website that showcases your results, ranks on Google, and turns every visiting prospect into a business conversation.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Agency Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built specifically for marketing agencies</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranked on Google from launch day</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Marketing agency website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></div>
        <div>
          <div class="float-notif-text">New agency enquiry received</div>
          <div class="float-notif-sub">Full-Service Marketing · Lagos · 3 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">apexmarketing.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Apex <span>Marketing</span></div>
            <div class="msn-links">
              <span class="msn-link">Services</span>
              <span class="msn-link">Work</span>
              <span class="msn-link">Results</span>
              <span class="msn-link">Contact</span>
              <span class="msn-cta">Free Strategy Call</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Full-Service Marketing Agency · Lagos</div>
            <div class="msh-h1">We don't just run campaigns.<br><span>We grow businesses.</span></div>
            <div class="msh-sub">Results-led digital marketing for ambitious Nigerian brands — SEO, paid media, social, and content that converts.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Get a Free Strategy Call</span>
              <span class="msh-btn-s">See Our Results →</span>
            </div>
            <div class="msh-stats">
              <div class="msh-stat"><div class="msh-stat-n">340%</div><div class="msh-stat-l">Avg. ROI</div></div>
              <div class="msh-stat"><div class="msh-stat-n">80+</div><div class="msh-stat-l">Clients</div></div>
              <div class="msh-stat"><div class="msh-stat-n">₦2.1B</div><div class="msh-stat-l">Revenue driven</div></div>
            </div>
          </div>
          <!-- Services -->
          <div class="mock-site-services">
            <div class="mss-label">What We Do</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div><div class="mss-name">SEO</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/></svg></div><div class="mss-name">Paid Ads</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M22 4s-3 4-7 4-6-3-10-3-5 3-5 3"/><path d="M1 20s3-4 7-4 6 3 10 3 5-3 5-3"/></svg></div><div class="mss-name">Social</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/></svg></div><div class="mss-name">Content</div></div>
            </div>
          </div>
          <!-- Metrics strip -->
          <div class="mock-site-metrics">
            <div class="msm-label">Recent Client Results</div>
            <div class="msm-grid">
              <div class="msm-item"><div class="msm-num">5.2×</div><div class="msm-lbl">ROAS</div></div>
              <div class="msm-item"><div class="msm-num">+218%</div><div class="msm-lbl">Organic traffic</div></div>
              <div class="msm-item"><div class="msm-num">₦80M</div><div class="msm-lbl">Revenue in 6mo</div></div>
              <div class="msm-item"><div class="msm-num">4.8★</div><div class="msm-lbl">Client rating</div></div>
            </div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "marketing agency lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Digital Marketing Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> SEO Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Social Media Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Performance Marketing</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Content Marketing Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Creative Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Paid Ads Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Brand Strategy</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Growth Marketing</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Full-Service Agency</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Digital Marketing Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> SEO Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Social Media Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Performance Marketing</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Content Marketing Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Creative Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Paid Ads Agency</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Brand Strategy</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Growth Marketing</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Full-Service Agency</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most marketing agency<br>websites <em>lose new business</em></h2>
    </div>
    <p>A prospective client evaluating your agency will search for you online before they ever reply to your pitch deck. They are looking for evidence that you deliver what you promise: case studies with real numbers, a services page that speaks their language, and a site that looks like the work of a genuinely competent marketing team. Unfortunately, most agency websites fail this test and, as a result, hand the account to a competitor whose website tells a better story.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Invisible on Google when businesses are searching for a marketing agency</h3>
      <p class="prob-desc">When a Lagos brand manager searches "digital marketing agency Nigeria" or "social media agency Abuja", your agency does not appear in the results. That lead immediately goes to a competitor who invested in SEO. For a marketing agency, a business that literally sells expertise in getting found online, being invisible on Google sends the worst possible signal about your capabilities. Furthermore, every month you are not ranking represents client revenue going directly elsewhere.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every site is built with a complete SEO foundation from day one, including keyword-optimised service pages, local SEO, structured data, and Google Search Console setup, so your agency ranks for the exact searches your target clients make.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <h3 class="prob-title">No proof of results: the website claims expertise but shows no evidence</h3>
      <p class="prob-desc">Marketing clients have been burned by agencies that over-promised and under-delivered. As a result, they are sceptical, and they come to your website looking for evidence. What they want is not just testimonials but case studies with specific numbers: what was the client's situation, what campaigns did you run, and what were the actual results in terms of ROAS, traffic growth, leads generated, and revenue impact? When your website cannot answer these questions with specifics, clients cannot justify hiring you over an agency that can.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Dedicated case study pages built around a results-first framework covering client context, challenge, strategy, execution, and measurable outcomes. Each page is independently SEO-optimised for the campaign type and industry combination it represents.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="m8 21 4-4 4 4"/><path d="M12 17v4"/></svg></span>
      <h3 class="prob-title">A website that looks worse than the work you do for clients</h3>
      <p class="prob-desc">Nothing damages an agency's credibility faster than a website that contradicts your value proposition. If you are selling digital marketing expertise and your own website is slow, visually dated, not mobile-optimised, or fails basic SEO fundamentals, every sophisticated prospect notices and draws the obvious conclusion. Your website is, after all, your most visible piece of work and the one proof point every potential client will scrutinise before they trust you with their brand.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A purpose-built, custom-coded marketing agency website that is itself a demonstration of digital marketing done right: fast, visually credible, SEO-optimised from the ground up, and mobile-perfect at every screen size.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.3 19.3 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8L7.2 10.3a16 16 0 0 0 6.5 6.5l1.8-1.8a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2Z"/></svg></span>
      <h3 class="prob-title">No clear path from visitor to enquiry, so leads land and leave without converting</h3>
      <p class="prob-desc">Interested prospects visit, read a couple of pages, and leave because the path to making contact is buried, unclear, or uninviting. There is no strategy call booking, no project brief form, no clear next step. Marketing agencies understand conversion funnels for their clients but rarely apply the same rigour to their own websites. As a result, traffic that does not convert into conversations becomes just an expensive vanity metric.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Conversion-optimised layouts with prominent strategy call CTAs, a project brief request form that pre-qualifies the prospect, and a clear, consistent invitation to engage on every key page, ensuring that interested visitors always have an obvious next step.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M3 3h18v18H3z"/><path d="M3 9h18"/><path d="M3 15h18"/><path d="M9 3v18"/><path d="M15 3v18"/></svg></span>
      <h3 class="prob-title">Generic service pages that fail to differentiate your agency from hundreds of others</h3>
      <p class="prob-desc">"We help brands grow through digital marketing." Every agency in Nigeria says something like this. If a visitor to your website cannot quickly understand what you specialise in, which industries you serve best, what your specific methodology looks like, and why your approach gets better results than the alternatives, then they have no reason to prefer you. Undifferentiated agencies compete on price, while differentiated agencies compete on value.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Purpose-written service pages for each channel and service you offer, with clear positioning copy, your specific methodology, and real client results woven throughout, so that prospects understand precisely why your agency is the right choice for their specific challenge.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Poor mobile experience, where most agency research now happens</h3>
      <p class="prob-desc">Brand managers, marketing directors, and business owners who are evaluating agencies typically do so on their phones during gaps between meetings. If your website does not function flawlessly on mobile, whether because navigation is awkward, text is too small, pages load slowly on mobile data, or forms are impossible to complete, you are failing the evaluation at the most critical moment. For any agency that positions itself as digitally sophisticated, a broken mobile experience is a disqualifying signal.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every design begins on mobile and is fully responsive at every breakpoint, touch-optimised, and tested across real Android and iOS devices on both WiFi and 4G connections. Your agency will look just as sharp on a smartphone as it does on a desktop.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your marketing<br>agency's website <em>needs</em></h2>
      <p>A high-performing marketing agency website is not simply a homepage, a services page, and a contact form. Instead, it is a strategically structured set of pages, each designed to serve a prospective client at a specific stage of their evaluation process and each optimised to rank for the search terms businesses use when looking for a marketing agency in Nigeria or the UK.</p>
      <p>We map your services, specialisms, industries you serve, case studies, team credentials, and client results to a comprehensive page architecture that works for both Google and the marketing directors and business owners evaluating your agency.</p>
      <ul class="bullets">
        <li>Homepage: clear positioning, results preview, and a direct path to a strategy conversation</li>
        <li>Individual service pages: one per marketing channel (SEO, Paid Ads, Social Media, Content, Email, PR, and more)</li>
        <li>Industry pages: targeting the specific sectors you serve most effectively</li>
        <li>Case Studies: results-led narratives with specific metrics, strategies, and outcomes</li>
        <li>Portfolio / Work: campaign creative, brand work, and channel results showcased visually</li>
        <li>About &amp; Team: agency story, values, methodology, and team profiles with specialisms</li>
        <li>Insights Blog: thought leadership that builds authority and drives organic traffic</li>
        <li>Process page: how you work, what clients can expect, and what makes your approach different</li>
        <li>Contact / Strategy Call: brief request form, meeting booking, and direct contact</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Agency Website →</a>
    </div>

    <!-- Pages wireframe visual -->
    <div class="pages-visual reveal" aria-hidden="true">
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Homepage</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">SEO Services</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Case Studies</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Our Team</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Insights Blog</span><span class="pch-badge key">SEO Engine</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Paid Ads Service</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SERVICES WE INCLUDE ═══ -->
<section class="services-section" aria-labelledby="svc-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What's Included</span>
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>marketing agencies</em></h2>
    </div>
    <p>Every marketing agency website we build is designed around the specific proof points, conversion triggers, and trust signals that convince businesses to award a marketing retainer or project. These are not generic features. Rather, they are agency-specific elements that directly determine whether a prospective client fills in your brief form or navigates to a competitor.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></div>
      <h3 class="svc-title">Results-Led Case Study Pages</h3>
      <p class="svc-desc">Individual case study pages for each significant campaign or client engagement, structured around context, challenge, strategy, execution, and measurable outcome including ROAS, traffic uplift, revenue impact, and leads generated. Furthermore, each page is independently SEO-optimised for the industry and marketing channel combination, doubling as both a conversion asset and an organic search entry point.</p>
      <div class="svc-tags"><span class="svc-tag">Results Metrics</span><span class="svc-tag">Campaign Creative</span><span class="svc-tag">Before/After</span><span class="svc-tag">SEO Optimised</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></div>
      <h3 class="svc-title">Individual Service Channel Pages</h3>
      <p class="svc-desc">A dedicated, fully optimised page for each marketing service you offer, covering SEO, Paid Social, Google Ads, Content Marketing, Email Marketing, Influencer Marketing, Brand Strategy, PR, and more. Each page explains your specific methodology, typical results, pricing model if applicable, and case study examples, giving prospects the detailed information they need to choose your agency for that specific channel.</p>
      <div class="svc-tags"><span class="svc-tag">SEO</span><span class="svc-tag">Paid Ads</span><span class="svc-tag">Social Media</span><span class="svc-tag">Content Marketing</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="m6 14 1.5-2.9A2 2 0 0 1 9.24 10H20a2 2 0 0 1 1.94 2.5l-1.54 6a2 2 0 0 1-1.95 1.5H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H18a2 2 0 0 1 2 2v2"/></svg></div>
      <h3 class="svc-title">Portfolio & Campaign Showcase</h3>
      <p class="svc-desc">A visually compelling portfolio section presenting your best campaign work, including ad creative, social content, brand work, video, and results dashboards. The section is filterable by industry and channel so prospects can quickly find work relevant to their specific situation. In fact, the portfolio is often the most-visited part of a marketing agency website and the strongest single factor in converting a prospect who has already decided to hire an agency.</p>
      <div class="svc-tags"><span class="svc-tag">Campaign Creative</span><span class="svc-tag">Industry Filter</span><span class="svc-tag">Results Data</span><span class="svc-tag">Brand Work</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div>
      <h3 class="svc-title">Team & Specialist Profiles</h3>
      <p class="svc-desc">Professional profile pages for your team members, including strategists, channel specialists, creative directors, account managers, and analysts, showcasing their specific channel expertise, client experience, certifications such as Google, Meta, and HubSpot, and notable campaigns. Ultimately, clients are hiring people, not just an agency name. A strong team page builds personal connection and demonstrates the depth of expertise behind your agency's work.</p>
      <div class="svc-tags"><span class="svc-tag">Team Profiles</span><span class="svc-tag">Certifications</span><span class="svc-tag">Specialisms</span><span class="svc-tag">LinkedIn Links</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z"/><path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/><path d="M9.5 14c.83 0 1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5S8 21.33 8 20.5v-5c0-.83.67-1.5 1.5-1.5z"/><path d="M3.5 14H5v1.5c0 .83-.67 1.5-1.5 1.5S2 16.33 2 15.5 2.67 14 3.5 14z"/><path d="M14 14.5c0-.83.67-1.5 1.5-1.5h5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-5c-.83 0-1.5-.67-1.5-1.5z"/><path d="M15.5 19H14v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5-.67-1.5-1.5-1.5z"/><path d="M10 9.5C10 8.67 9.33 8 8.5 8h-5C2.67 8 2 8.67 2 9.5S2.67 11 3.5 11h5c.83 0 1.5-.67 1.5-1.5z"/><path d="M8.5 5H10V3.5C10 2.67 9.33 2 8.5 2S7 2.67 7 3.5 7.67 5 8.5 5z"/></svg></div>
      <h3 class="svc-title">Thought Leadership & Insights Blog</h3>
      <p class="svc-desc">A fully managed insights section for publishing digital marketing guides, channel-specific content, industry commentary, and trend analysis. For an agency, thought leadership content is the most powerful trust signal you can create because it proves your expertise before a prospect has even spoken to you. Additionally, each article provides an additional organic search entry point, pulling in prospects who are researching the exact marketing challenges your agency solves.</p>
      <div class="svc-tags"><span class="svc-tag">WordPress CMS</span><span class="svc-tag">SEO Articles</span><span class="svc-tag">Marketing Guides</span><span class="svc-tag">Newsletter Signup</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><line x1="10" y1="9" x2="8" y2="9"/></svg></div>
      <h3 class="svc-title">Project Brief & Strategy Call Forms</h3>
      <p class="svc-desc">Multi-step project brief forms that pre-qualify prospects before the first call, capturing their industry, marketing goals, current channels, budget range, and timeline. These integrate with your calendar for strategy call booking, and all form submissions are routed to your email and CRM with instant confirmation messages. The goal is to make the path from "interested visitor" to "booked call" completely frictionless and to ensure that when you do speak, the conversation is already well-framed.</p>
      <div class="svc-tags"><span class="svc-tag">Project Brief Form</span><span class="svc-tag">Calendly Integration</span><span class="svc-tag">Lead Qualification</span><span class="svc-tag">CRM Routing</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Marketing Agencies</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when businesses are<br>searching for <em>an agency</em></h2>
      <p>The highest-value moment in an agency's new business pipeline is when a decision-maker searches Google for a marketing agency to help with their specific challenge. If your agency is not on page one at that moment, that brief goes to a competitor. Every marketing agency website we build is therefore engineered to rank for the searches your target clients actually make, covering not just generic agency terms but the specific channel and industry combinations where you have the strongest capability.</p>
      <p>We do not just build agency websites. We build search visibility. Your homepage, each service page, your industry case studies, and your insights articles are all individually optimised for specific keyword targets. Moreover, we implement ProfessionalService and LocalBusiness schema markup so Google understands exactly what your agency does, who you serve, and where you operate. Most agencies see meaningful organic search growth within the first 60 to 90 days of a new website launch.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each marketing service you offer</li>
        <li>Location pages for every city or region you actively target clients in</li>
        <li>Industry pages targeting the specific sectors your agency serves best</li>
        <li>ProfessionalService + LocalBusiness JSON-LD schema markup</li>
        <li>Google Business Profile optimisation for local map pack visibility</li>
        <li>Thought leadership articles targeting long-tail marketing keyword searches</li>
        <li>Google Search Console and Analytics 4 verified and configured on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Marketing Agency — Keyword Rankings (before & after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">digital marketing agency lagos</span>
            <span class="kw-vol">3,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">social media agency nigeria</span>
            <span class="kw-vol">2,900/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">seo agency nigeria</span>
            <span class="kw-vol">2,100/mo</span>
            <span class="kw-pos top3">▲ #3</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">google ads agency lagos</span>
            <span class="kw-vol">1,400/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">content marketing agency nigeria</span>
            <span class="kw-vol">960/mo</span>
            <span class="kw-pos top10">▲ #4</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">performance marketing agency abuja</span>
            <span class="kw-vol">720/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">brand marketing agency nigeria</span>
            <span class="kw-vol">540/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">email marketing agency lagos</span>
            <span class="kw-vol">390/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active marketing agency SEO campaign</div>
    </div>
  </div>
</section>

<!-- ═══ TRUST SIGNALS ═══ -->
<section class="trust-section" aria-labelledby="trust-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why i2Medier</span>
      <h2 class="s-head" id="trust-heading">Numbers that make<br>the <em>case for us</em></h2>
    </div>
    <p>We have built websites for marketing agencies, digital studios, and growth firms across Nigeria and the UK. These are the outcomes our agency clients consistently see after launching a purpose-built i2Medier website.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="290">0</span><span>%</span></div>
      <div class="trust-label">Average increase in organic Google search visibility within the first 90 days of a new marketing agency website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) on our custom-built marketing agency websites, with no page builder bloat</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.3 19.3 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8L7.2 10.3a16 16 0 0 0 6.5 6.5l1.8-1.8a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2Z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="4">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly inbound new business enquiries reported by agency clients within 6 months of launch, vs their previous site</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched marketing agency website, with a guaranteed, milestone-based timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional service and agency websites delivered across Nigeria, the UK, the US, and Canada, all built on custom code and never on templates</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery, covering every file, every database, and every credential transferred unconditionally at handover</div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Process</span>
      <h2 class="s-head" id="process-heading">From brief to live site<br>in <em>five structured steps</em></h2>
    </div>
    <p>We have delivered websites for over 120 agencies and professional service firms. This process eliminates the delays, miscommunications, and scope surprises that make most agency-client website projects frustrating for everyone involved.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 · Week 1</div>
      <div class="proc-title">Discovery & Strategy</div>
      <p class="proc-desc">A structured discovery session covering your agency's positioning, target client profile, services, differentiators, key case study results, and new business goals. We then map your complete site architecture, covering every page, every keyword target, and every conversion element, and agree on it in writing before any design work begins. We also conduct thorough keyword research to identify the specific searches your target clients make when looking for a marketing agency website design partner.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Research</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 · Week 1–2</div>
      <div class="proc-title">Design: Premium &amp; On-Brand</div>
      <p class="proc-desc">High-fidelity Figma designs for all key pages on both desktop and mobile, with your brand identity, campaign imagery, case study layouts, and service page structures designed as a coherent visual system. A marketing agency website must itself be a demonstration of creative and digital excellence, and we design to that standard. Two revision rounds are included, and you approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 · Week 2–4</div>
      <div class="proc-title">WordPress Build: Custom Theme</div>
      <p class="proc-desc">Built on a custom PHP WordPress theme with no Elementor and no page builders. ACF Pro powers all editable sections, including service pages, case studies, portfolio, team profiles, insights blog, and testimonials, and all sections are fully manageable from WordPress admin without touching code. A staging environment is accessible throughout so that you can review the build at any stage before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro</span><span class="proc-tag">Staging Access</span><span class="proc-tag">Portfolio CMS</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 · Week 4</div>
      <div class="proc-title">SEO Setup & Content Entry</div>
      <p class="proc-desc">All content is entered and fully SEO-optimised, covering title tags, meta descriptions, heading hierarchy, ProfessionalService and LocalBusiness schema markup, canonical URLs, XML sitemap, and Google Search Console submission. In addition, Google Analytics 4 is installed and conversion tracking is configured and verified before launch. Case study performance metrics are also entered and formatted for maximum visual impact.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 · Week 5</div>
      <div class="proc-title">QA, Launch & Training</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit targeting 90 or above, form testing, link verification, and a final review call before launch day. Domain migration, SSL verification, and Cloudflare configuration for performance and security are all handled. You receive a 45-minute CMS training session covering how to publish case studies, update service pages, and manage your portfolio, as well as a written admin guide and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing (Optional)</div>
      <div class="proc-title">Monthly SEO & Content Retainer</div>
      <p class="proc-desc">An optional monthly retainer designed to keep your agency ranking and your content pipeline active. This covers publishing marketing insights articles, building citations in agency directories, monitoring Core Web Vitals, running daily backups, and delivering monthly keyword ranking reports. Most agency clients see their strongest inbound ROI in months 4 to 12, as organic authority compounds over time, and the website becomes their most consistent new business development asset.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Creation</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Marketing agency websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch, with no templates and no page builders, specifically for the agency's service mix, target clients, and positioning in the market.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1e1b4b 0%,#3730a3 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Apex Digital</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Full-Service Marketing Agency</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">SEO</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Paid Ads</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Social</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Full-Service Agency</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Full-Service Marketing Agency · Lagos, Nigeria</div>
        <div class="port-title">Apex Digital Marketing</div>
        <p class="port-desc">Full website with 8 service channel pages, 12 case studies, portfolio section, team profiles, and an insights blog. As a result, the site reached page one for "digital marketing agency Lagos" within 75 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#312e81 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">GrowthLab</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Performance Marketing · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Performance</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Google Ads</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Analytics</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Performance Marketing</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Performance Marketing Agency · Abuja, Nigeria</div>
        <div class="port-title">GrowthLab Performance</div>
        <p class="port-desc">Performance marketing agency website with ROAS-led case studies, a Google Ads and Facebook Ads services section, results calculator, and client results dashboards, converting 3 times more inbound leads than the previous site.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0f0f23 0%,#2d2870 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Brandcraft Studio</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Creative & Brand Agency · UK & NG</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Brand</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Creative</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Content</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Creative & Brand Agency</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Creative & Brand Agency · London & Lagos</div>
        <div class="port-title">Brandcraft Studio</div>
        <p class="port-desc">Dual-market creative agency website for a UK-Nigerian brand studio, featuring a visual portfolio section, brand case studies, content services pages, and a content strategy that works for both UK and Nigerian audiences simultaneously.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
@include('site.partials.industry-package')


<!-- ═══ COMPARISON TABLE ═══ -->
<section class="compare-section" aria-labelledby="compare-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why Choose i2Medier</span>
      <h2 class="s-head" id="compare-heading">How we compare to<br><em>your other options</em></h2>
    </div>
    <p>Not all web development options deliver the same results, and this matters most for marketing agencies where your website is the most visible demonstration of your digital capabilities.</p>
  </div>
  <div class="compare-table-wrap">
  <div class="compare-wrap"><table class="compare-table reveal" role="table" aria-label="Web design comparison for marketing agencies">
    <thead>
      <tr>
        <th>Feature</th>
        <th>DIY (Wix / Squarespace)</th>
        <th class="hl">i2Medier Custom Build</th>
        <th>Generic Freelancer</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="feature">Built specifically for marketing agencies</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Agency-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">No page builder / full custom code</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Pure custom PHP</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often Elementor</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed score 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 40–65</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
      </tr>
      <tr>
        <td class="feature">Full SEO (schema, sitemap, GA4)</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Complete foundation</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely complete</span></td>
      </tr>
      <tr>
        <td class="feature">Results-led case study pages</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Always included</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely structured well</span></td>
      </tr>
      <tr>
        <td class="feature">CMS training + documentation</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> You figure it out</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Always included</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely provided</span></td>
      </tr>
      <tr>
        <td class="feature">Full code ownership on delivery</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked forever</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Unconditional ownership</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often withheld</span></td>
      </tr>
      <tr>
        <td class="feature">Post-launch support window</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> No</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> 30–90 days standard</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Usually paid extra</span></td>
      </tr>
    </tbody>
  </table></div>
  </div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What marketing agencies say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Our old website was embarrassing — we were selling digital marketing expertise but our own site ranked nowhere on Google and looked like it was built in 2015. The new site changed everything. Within three months we were ranking top three for our main agency keywords, and our inbound enquiries more than quadrupled. The quality of leads is completely different — they arrive having already seen our case studies and knowing exactly what we can do."</p>
      <div class="test-author">
        <div class="test-avatar">C</div>
        <div><div class="test-name">Chukwuemeka Eze</div><div class="test-role">Founder & MD · Apex Digital Marketing, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"As a performance marketing agency, the hardest part of new business was convincing prospects we could deliver the kind of ROAS we were promising. The case study structure i2Medier built for us — with specific campaign data, before-and-after numbers, and client quotes — completely changed the conversion dynamic on sales calls. Prospects come in already half-convinced because they have read the results. It has shortened our new business cycle dramatically."</p>
      <div class="test-author">
        <div class="test-avatar">F</div>
        <div><div class="test-name">Funmilayo Adebisi</div><div class="test-role">CEO · GrowthLab Performance, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Running a creative agency across both London and Lagos meant we needed a website that spoke credibly to two very different client audiences at the same time. i2Medier understood this challenge immediately — the content strategy, the visual presentation, and the SEO targeting all work equally well for both markets. UK clients who find us through Google arrive at a site that looks as professional as any London agency. Nigerian clients see work and case studies relevant to their context."</p>
      <div class="test-author">
        <div class="test-avatar">T</div>
        <div><div class="test-name">Tolulope Bakare</div><div class="test-role">Creative Director · Brandcraft Studio, London & Lagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free 30-minute website<br>review for your agency</h2>
    <p>We will audit your current site, identify your biggest ranking and conversion gaps, and show you exactly what a new website would fix, with absolutely no commitment required.</p>
  </div>
  <div class="cta2-right">
    <a href="#contact" class="btn-white-solid">Book a Free Review →</a>
  </div>
</div>

<!-- ═══ LONG-FORM SEO CONTENT ═══ -->
<section class="content-section" aria-labelledby="content-heading">
  <div class="two-col-intro" style="margin-bottom:2rem">
    <div>
      <span class="s-label">The Full Picture</span>
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>marketing agency web design</em></h2>
    </div>
    <p>A comprehensive guide to building a marketing agency website that attracts better clients, builds authority, and ranks on Google, written specifically for Nigerian and UK agencies.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for marketing agencies">

      <h2>Why every marketing agency needs a high-performance website in 2025</h2>
      <p>The marketing agency sector in Nigeria is growing rapidly, with an increasing number of businesses recognising the need for professional digital marketing support. At the same time, the bar for what counts as a credible marketing agency website design has risen significantly. Prospective clients, including marketing directors, CMOs, and business owners, are sophisticated buyers who know exactly what good digital marketing looks like. When they evaluate your agency, therefore, your website is the first piece of evidence they examine.</p>
      <p>The contradiction that undermines most agency new business development is this: agencies that sell SEO, social media management, and digital marketing to clients often have websites that rank poorly on Google, convert visitors ineffectively, and look outdated on mobile. Sophisticated prospects notice this immediately. If your agency cannot demonstrate the principles it sells on its own website, why would a client trust you to apply those principles to their brand?</p>
      <p>A purpose-built marketing agency website is not just a credibility asset. It is, moreover, an active new business development tool that works around the clock. Every service page that ranks for a relevant keyword is a channel for inbound leads. Every case study that presents specific results is a conversion asset that shortens the sales cycle. Every thought leadership article that builds topical authority makes your agency easier to find and easier to trust.</p>

      <h2>What separates high-performing agency websites from mediocre ones?</h2>
      <p>Having audited hundreds of marketing agency websites across Nigeria and the UK, the pattern is consistent. The agencies that generate the most inbound new business from their websites share a set of structural and content characteristics that clearly distinguish them from the majority.</p>

      <h3>Results are front and centre, not buried in a case studies section</h3>
      <p>High-performing agency websites lead with results on every key page. The homepage presents specific campaign outcomes, and each service page includes client results relevant to that channel. In addition, the case study section is prominent, easy to navigate, and structured to surface the most impressive outcomes immediately. <strong>Prospects are not evaluating your agency's capabilities in the abstract. They are evaluating whether your results are relevant and credible for their specific situation.</strong> Making those results easy to find and compelling to read is therefore the single highest-leverage improvement most agencies can make to their website.</p>

      <h3>Services are explained at a channel-specific level, not as a generic menu</h3>
      <p>The agencies that convert the most prospects have service pages that go deep, explaining not just what service they offer but their specific methodology, how they approach strategy for that channel, what typical results look like, how they measure success, and what case study examples they can point to. By contrast, generic service lists such as "we do SEO, social media, paid ads, email, and content" tell a prospect nothing about why your agency is better than any other agency that offers the same list. Depth of explanation is a proxy for depth of expertise.</p>

      <h3>The website itself is a demonstration of the agency's digital standards</h3>
      <p>For a marketing agency, there is no excuse for a slow website, a poor mobile experience, or basic SEO failures. If you are selling digital expertise and your own website fails the standards you set for clients, every sophisticated prospect who visits will notice and draw conclusions. Consequently, a marketing agency website should be the best digital marketing asset in your portfolio, a demonstrable proof of concept for the work you do.</p>

      <h2>SEO keywords for marketing agencies in Nigeria and the UK</h2>
      <p>The keyword landscape for marketing agencies is highly competitive at the broad level but contains significant opportunities in the specific and long-tail combinations. The most valuable search traffic for agencies comes from prospects who have already decided they need professional marketing help and are evaluating which agency to hire.</p>
      <ul>
        <li><strong>Service + location:</strong> "digital marketing agency Lagos", "SEO agency Nigeria", "social media agency Abuja", "Google Ads agency Port Harcourt"</li>
        <li><strong>Channel + country:</strong> "email marketing agency Nigeria", "content marketing agency Nigeria", "performance marketing Nigeria", "influencer marketing agency Lagos"</li>
        <li><strong>Industry + marketing:</strong> "marketing agency for FMCG Nigeria", "ecommerce marketing agency Nigeria", "fintech marketing agency Lagos"</li>
        <li><strong>Problem-based:</strong> "how to increase website traffic Nigeria", "why is my Google Ads not working", "how to grow social media following Nigeria"</li>
        <li><strong>Comparison searches:</strong> "best marketing agency Nigeria", "top digital agencies Lagos", "marketing agency pricing Nigeria"</li>
      </ul>
      <p>Content marketing around these problem-based and comparison keywords is one of the most effective new business development strategies for marketing agencies. When a brand manager searching for answers to their specific marketing problem finds your agency's detailed guide in the search results, they arrive at your website as a warm prospect who already trusts your expertise.</p>

      <h2>Case studies as your most powerful conversion asset</h2>
      <p>For marketing agencies, case studies are not optional. They are the primary mechanism by which you convert sceptical prospects into paying clients. Every buyer of marketing services has been let down by an agency at some point and carries that scepticism into every new evaluation. Specific, honest, and results-led case studies are the antidote to that scepticism because they provide the kind of verifiable proof that general capability claims simply cannot.</p>
      <p>The most effective agency case studies follow a consistent framework: the client's industry and size, the specific marketing challenge they faced, the agency's strategic approach, the channels and tactics deployed, and the measurable outcomes achieved. Every number matters, including ROAS, click-through rate improvements, revenue generated, organic traffic growth, and leads produced. Precise numbers build credibility, whereas vague descriptions such as "we significantly improved their performance" build nothing.</p>
      <p>Each case study page should also be independently SEO-optimised for the industry and channel combination it represents. For example, pages targeting "FMCG social media campaign Nigeria", "B2B LinkedIn marketing case study", or "ecommerce Google Ads case study Nigeria" allow prospects searching for evidence of specific expertise to find you directly.</p>

      <h2>How much does a marketing agency website cost in Nigeria?</h2>
      <p>As with any professional website, the cost depends on the scope of what you need. An agency website with a handful of service pages and a few case studies has very different requirements from a comprehensive platform with individual service and industry pages, a large case study library, a portfolio section, a full team directory, and an active insights blog.</p>
      <ul>
        <li><strong>Essential agency site</strong> (5–7 pages, case studies up to 3, enquiry forms, SEO foundation): ₦350,000–₦500,000</li>
        <li><strong>Growth agency website</strong> (12–18 pages, full case study and portfolio sections, team profiles, insights blog, comprehensive SEO): ₦750,000–₦1.2M</li>
        <li><strong>Enterprise agency platform</strong> (20+ pages, industry verticals, extensive case study library, CRM integration, analytics dashboard): ₦1.5M+</li>
      </ul>
      <p>The important perspective is that for a marketing agency charging retainer fees, a website that generates even one or two additional inbound client conversations per month pays for itself multiple times over in the first year. The cost of the website is a small fraction of the revenue that effective digital positioning generates for an agency that executes its new business strategy well.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website review and proposal for your marketing agency.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why agency websites lose business</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for agencies</a></li>
          <li><a href="#process-heading" class="toc-link">Our process (5 steps)</a></li>
          <li><a href="#pricing" class="toc-link">Pricing</a></li>
          <li><a href="#faq-heading" class="toc-link">FAQ</a></li>
          <li><a href="#contact" class="toc-link">Get a free quote</a></li>
        </ul>
      </nav>
    </aside>

  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section aria-labelledby="faq-heading">
  <div class="faq-head">
    <span class="s-label">FAQ</span>
    <h2 class="s-head" id="faq-heading">Questions about marketing<br>agency <em>web design</em></h2>
  </div>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every marketing agency has different needs. Email us and we will give you a direct, honest answer specific to your agency, with no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How much does a website for a marketing agency cost?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Marketing agency websites start from ₦350,000 for a clean, professional site with service pages, a few case studies, and an enquiry form. A full growth website with individual service channel pages, a comprehensive case study and portfolio section, team profiles, insights blog, and advanced SEO starts from ₦750,000. Enterprise platforms for larger agencies are quoted individually. Every quote is detailed and itemised before any commitment is required.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">What pages should a marketing agency website have?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">A high-performing marketing agency website should include: Home, About and Team, individual service pages (one per channel, covering SEO, Paid Ads, Social Media, Content, Email, and more), Case Studies (individual pages with specific results), Portfolio, Industries Served, Insights Blog, Process/How We Work, and Contact/Strategy Call. Individual service channel pages are especially important for SEO because they allow you to rank for specific searches like "SEO agency Lagos" or "social media agency Nigeria" and give prospects the detailed information they need to choose your agency for that specific service.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How long does it take to build a marketing agency website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">A standard marketing agency website takes 3 to 5 weeks from design approval to launch. Larger platforms with many service pages, extensive case study and portfolio sections, and an active blog may take 5 to 8 weeks. We provide a detailed milestone-based timeline at the start of every project so that you always know exactly what is in progress and when the next stage will be delivered.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Will my marketing agency website rank on Google?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Every website we build includes a complete SEO technical foundation covering optimised title tags and meta descriptions, ProfessionalService schema markup, XML sitemap, canonical URLs, and Google Search Console submission from day one. For competitive marketing agency keywords such as "digital marketing agency Lagos" and "SEO agency Nigeria", this technical foundation combined with well-structured service pages and regular content publication gives you the best possible organic ranking trajectory. Monthly SEO retainers are also available for ongoing campaign work.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Can I update case studies and portfolio items myself?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. Updating case studies, adding portfolio items, publishing insights articles, and editing team profiles are all core content workflows that every handover includes. We use ACF Pro to create intuitive, field-based editing interfaces for all content types, so no coding is required. Adding a new case study is as simple as filling in a form covering client name, industry, challenge, strategy, results, and metrics. You also receive CMS training, a written admin guide, and a 30-day post-launch support window to cover any questions that arise.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Do you build websites for specialist or niche marketing agencies?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes. We work with full-service agencies, performance marketing specialists, creative studios, SEO-focused agencies, social media agencies, content marketing firms, and B2B marketing consultancies. The page architecture, service descriptions, and keyword strategy are tailored to your specific positioning and the channels you specialise in. A specialist agency and a full-service agency need very different website approaches, and we design each engagement from the specific positioning outward.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can potential clients book a strategy call directly through the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes. We integrate strategy call booking (Calendly or similar), a multi-step project brief form that pre-qualifies prospects before the first conversation, and direct contact options. Every form submission is routed to your inbox and optionally to your CRM, with automatic confirmation messages sent to the prospect. The goal is to make the path from "interested visitor" to "booked strategy call" as frictionless and fast as possible, with no manual follow-up required on your end.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a marketing agency<br>website that wins clients?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We will review your current site, map your keyword opportunities, and show you exactly what we would build and why.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
