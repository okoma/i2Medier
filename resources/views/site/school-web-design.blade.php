@extends('public.layouts.app')

@section('title', 'School & College Website Design Company in Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'School Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'school-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'Can parents submit admissions applications directly through the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We build online admissions enquiry forms as standard, and for schools wanting a full application portal, we can build a custom system where parents complete the full application online, upload required documents, and receive automated acknowledgement emails. All submissions are forwarded to your admissions team instantly. More advanced portals with status tracking are available in our Enterprise package.']],
        ['@type' => 'Question', 'name' => 'Can we update the gallery and news section ourselves after the website launches?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — this is a core principle of every school website we build. We use ACF Pro to create simple, intuitive editing interfaces so your admin, school secretary, or communications officer can upload new photos, publish news articles, add events to the calendar, and update any content without touching code. Every handover includes a CMS training session and a written admin guide specific to your school\'s website workflows.']],
        ['@type' => 'Question', 'name' => 'How do you display WAEC and JAMB results on the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We build a dedicated Results and Achievements section where your WAEC pass rates, NECO performance, JAMB statistics, and subject-specific results are presented in a visually clear, credible format — with summary statistics, year-on-year comparisons where available, and subject breakdown. This section is structured with schema markup so Google can read and surface your results data in rich search results. You can update these annually through the CMS without developer help.']],
        ['@type' => 'Question', 'name' => 'Can the website include a school events calendar and term dates?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We build a fully integrated school calendar where you can add term dates, open days, PTFA meetings, examination periods, sports fixtures, and school events. Each event can include details, location, and a download link. The calendar is publicly visible and also helps with SEO — events are marked up with Event schema so Google can surface them in search results, especially useful for open day visibility in your target area.']],
        ['@type' => 'Question', 'name' => 'How long does it take to build a school website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard school website with 10–15 pages, gallery, news section, and admissions form typically takes 3–5 weeks from design approval to launch. Larger projects with full programme pages, a custom application portal, or virtual tour integration may take 6–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when. Many schools time their launch to coincide with a new admissions season or the start of a new term.']],
        ['@type' => 'Question', 'name' => 'Will our school website rank on Google without additional monthly payments?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Every website we build includes a full on-site SEO foundation — semantic HTML, optimised title tags and meta descriptions per page, EducationalOrganization and LocalBusiness schema markup, XML sitemap, canonical URLs, and Google Search Console submission. This foundation gives your school the technical basis to rank. For schools in competitive markets — major cities like Lagos and Abuja — we recommend our ongoing SEO retainer, which adds off-page SEO, monthly content, citation building, and ranking reports to drive long-term organic growth.']],
        ['@type' => 'Question', 'name' => 'Can the website serve parents who speak languages other than English?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. For international schools or institutions serving communities with Yoruba, Igbo, Hausa, French, or other language preferences, we can build a multilingual website using the WPML or TranslatePress plugins. Each language version is independently SEO-optimised, with separate URL structures, hreflang tags, and localised content. This is particularly valuable for international schools serving expatriate communities or French-speaking families in Nigeria. We discuss multilingual requirements during the initial discovery session.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/school-web-design.css')
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
      <span aria-current="page">Web Design for Schools</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> School Website Design</span>
    <h1>Websites that turn curious parents into <em>enrolled students</em></h1>
    <p class="hero-sub">We build professional, enrollment-focused websites for private schools, colleges, universities, and educational institutions in Nigeria and the UK. Showcase your academic excellence, communicate your values, and convert visits into admissions enquiries.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See School Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for schools &amp; education</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranked on Google from launch</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Admission-focused design</span>
    </div>
  </div>

  <!-- School website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.3 19.3 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8L7.2 10.3a16 16 0 0 0 6.5 6.5l1.8-1.8a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2Z"/></svg></div>
        <div>
          <div class="float-notif-text">New admission enquiry</div>
          <div class="float-notif-sub">Secondary School · Lagos · 6 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">greenleafacademy.edu.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Greenleaf <span>Academy</span></div>
            <div class="msn-links">
              <span class="msn-link">About</span>
              <span class="msn-link">Academics</span>
              <span class="msn-link">Admissions</span>
              <span class="msn-link">Gallery</span>
              <span class="msn-link">Contact</span>
              <span class="msn-cta">Apply Now</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Excellence in Education Since 1998</div>
            <div class="msh-h1">Raising leaders of<br><span>tomorrow, today</span></div>
            <div class="msh-sub">A premier private secondary school in Lagos delivering world-class education, strong values, and exceptional WAEC results.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Apply for Admission</span>
              <span class="msh-btn-s">Our Programmes →</span>
            </div>
          </div>
          <!-- Academic programmes -->
          <div class="mock-site-services">
            <div class="mss-label">Academic Programmes</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M12 2 2 7l10 5 10-5-10-5Z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div><div class="mss-name">Primary</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></div><div class="mss-name">Secondary</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div><div class="mss-name">Sixth Form</div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M9 12l2 2 4-4"/></svg></div><div class="mss-name">Extra-Curricular</div></div>
            </div>
          </div>
          <!-- Stats bar -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">1,200<span>+</span></div><div class="mst-lbl">Students</div></div>
            <div class="mst-item"><div class="mst-num">98<span>%</span></div><div class="mst-lbl">Pass Rate</div></div>
            <div class="mst-item"><div class="mst-num">WAEC</div><div class="mst-lbl">Accredited</div></div>
            <div class="mst-item"><div class="mst-num">25<span>yrs</span></div><div class="mst-lbl">Experience</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "private school Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Private Primary Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Private Secondary Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> International Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Universities &amp; Polytechnics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Nursery &amp; Crèche Centres</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Montessori Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Vocational Training Centres</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Online Learning Platforms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Music &amp; Art Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Coaching &amp; Tutorial Centres</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Private Primary Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Private Secondary Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> International Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Universities &amp; Polytechnics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Nursery &amp; Crèche Centres</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Montessori Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Vocational Training Centres</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Online Learning Platforms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Music &amp; Art Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Coaching &amp; Tutorial Centres</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most school websites<br><em>lose enrolments</em></h2>
    </div>
    <p>Before a parent ever walks through your school gate, they have already judged your institution online. Within seconds of landing on your website, parents form an impression of your school's quality, values, and suitability for their child. If your website does not pass that test, they move on to the next school on their list — and you never know it happened.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Parents can't find the school online when searching for options</h3>
      <p class="prob-desc">When a Lagos parent searches "best private school in Lekki" or "secondary school with good WAEC results Abuja", your school does not appear. That search goes to a competitor whose website was built with SEO in mind. Every missed search is a missed enrolment.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every school site includes a complete SEO foundation — location-specific pages, education keyword strategy, structured data, and Google Search Console setup from launch day.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg></span>
      <h3 class="prob-title">Website looks outdated — parents judge school quality by digital presence</h3>
      <p class="prob-desc">Parents evaluating schools for their children apply the same logic to every assessment: if the school's website looks neglected and unprofessional, what does that say about the quality of education and administration inside? First impressions are made in seconds, and a poor website costs enrolments before a word is read.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Modern, professionally designed school websites that communicate quality, warmth, and academic rigour — building parental confidence from the very first page load.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">No clear admissions pathway — parents don't know how to apply</h3>
      <p class="prob-desc">An interested parent visits the website, cannot quickly find the admissions process, cannot locate a form, does not know the age or entry requirements, and eventually gives up. Every point of friction in the admissions journey is an enrolment lost to a school that made it simpler.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Dedicated admissions pages with a step-by-step process, eligibility criteria, downloadable or online application forms, key dates, and a direct contact path — all in one place.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <h3 class="prob-title">Academic achievements and results aren't prominently displayed</h3>
      <p class="prob-desc">Your students achieved excellent WAEC results. Your JAMB scores are consistently strong. You have produced doctors, engineers, and business leaders. None of this is visible on your website — so competing parents have no way to compare your academic track record against other schools in their shortlist.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Dedicated results and achievements sections — WAEC pass rates, JAMB scores, scholarships won, alumni achievements, and academic awards — designed as primary trust elements, not footnotes.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></span>
      <h3 class="prob-title">No photo or video gallery — parents can't see the school environment</h3>
      <p class="prob-desc">Parents choosing a school want to visualise their child's environment: the classrooms, the sports fields, the laboratories, the libraries, the school events, and the culture. A school without a proper gallery forces parents to imagine — and their imagination defaults to doubt rather than confidence.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A professionally structured photo gallery and optional virtual tour section showcasing your campus, facilities, classrooms, student life, sports, and events — updated easily through the CMS.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Mobile experience is poor — most parents browse on phones</h3>
      <p class="prob-desc">Over 78% of Nigerian web visits happen on mobile devices. If your school website renders poorly on a phone — with misaligned text, slow loading, and buttons that are difficult to tap — the majority of prospective parents are receiving a broken first impression of your institution, on the most important device they own.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every school website we build is designed mobile-first — responsive at every breakpoint, touch-optimised, and load-tested on real Android and iOS devices before launch.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your school<br>website <em>needs</em></h2>
      <p>A high-performing school website is not a homepage and a contact form. It is a carefully structured set of pages — each designed to serve parents, prospective students, or stakeholders at a specific stage of their decision process, and each optimised to rank for the search terms Nigerian parents use when choosing a school for their child.</p>
      <p>We map your academic programmes, extracurricular activities, admissions process, staff, achievements, and facilities to a comprehensive page architecture that works for both Google and the parents visiting your site.</p>
      <ul class="bullets">
        <li>Homepage with enrollment CTA — the first impression that converts curiosity into enquiry</li>
        <li>About / Vision &amp; Mission — your school's ethos, values, and founding story</li>
        <li>Academic programmes per level — primary, secondary, sixth form, vocational</li>
        <li>Admissions process &amp; application form — step-by-step pathway for new families</li>
        <li>Staff &amp; leadership profiles — the faces behind the education</li>
        <li>Gallery — photos, videos, and optional virtual campus tour</li>
        <li>News &amp; events — term calendar, upcoming events, school announcements</li>
        <li>Fees &amp; scholarships information — transparent, easy to find</li>
        <li>Contact &amp; directions — phone, email, map, and WhatsApp link</li>
        <li>Alumni section — for older schools with notable graduates and community</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My School Website →</a>
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
        <div class="page-card-head"><span class="pch-name">Admissions</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Academic Programmes</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Results &amp; Achievements</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Gallery &amp; Campus Tour</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">News &amp; Events</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>schools &amp; education</em></h2>
    </div>
    <p>Every school website we build is designed around the specific trust signals, admissions conversion patterns, and parental decision-making behaviour of Nigerian educational institutions. These are not generic business website features — they are school-specific elements with a direct impact on whether a parent fills in an enquiry form or navigates away.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Admissions Funnel &amp; Application Forms</h3>
      <p class="svc-desc">A dedicated admissions section with a step-by-step process guide, age and entry requirements per class level, term dates, fee structures, and an online or downloadable application form. Every enquiry captured goes directly to your admissions team by email, and optionally to a Google Sheet or CRM for tracking.</p>
      <div class="svc-tags"><span class="svc-tag">Online Application</span><span class="svc-tag">Admissions Flow</span><span class="svc-tag">Entry Requirements</span><span class="svc-tag">Term Dates</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M12 2 2 7l10 5 10-5-10-5Z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg></div>
      <h3 class="svc-title">Academic Programme Pages (per level and subject)</h3>
      <p class="svc-desc">Individual pages for every academic level and subject area — primary, secondary, sixth form, vocational tracks, and specialist programmes. Each page details the curriculum, teaching approach, class sizes, resources, and learning outcomes. These pages rank for specific keyword searches and demonstrate academic depth to discerning parents.</p>
      <div class="svc-tags"><span class="svc-tag">Curriculum Pages</span><span class="svc-tag">Subject Areas</span><span class="svc-tag">Class Levels</span><span class="svc-tag">Learning Outcomes</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></div>
      <h3 class="svc-title">Results &amp; Achievements Showcase (WAEC, JAMB, International)</h3>
      <p class="svc-desc">A dedicated section displaying your school's WAEC pass rates, NECO results, JAMB performance, Cambridge/IB results for international schools, subject prizes, state scholarship recipients, and notable alumni. Presented visually with statistics and structured data so Google can read and surface these achievement signals in search results.</p>
      <div class="svc-tags"><span class="svc-tag">WAEC Results</span><span class="svc-tag">JAMB Stats</span><span class="svc-tag">NECO</span><span class="svc-tag">Alumni Success</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></div>
      <h3 class="svc-title">Photo Gallery &amp; Virtual Campus Tour</h3>
      <p class="svc-desc">A fully managed photo gallery organised by category — classrooms, laboratories, sports facilities, dining hall, events, student life, and graduation ceremonies. For schools wanting a premium experience, we integrate a virtual campus tour so parents can explore your facilities from anywhere in Nigeria or abroad, before making an enquiry.</p>
      <div class="svc-tags"><span class="svc-tag">Photo Gallery</span><span class="svc-tag">Virtual Tour</span><span class="svc-tag">Video Embed</span><span class="svc-tag">Easy CMS Update</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></div>
      <h3 class="svc-title">News, Events &amp; School Calendar</h3>
      <p class="svc-desc">A CMS-driven news section for school announcements, prize-giving day updates, sporting results, and community events. An integrated school calendar displaying term dates, open days, PTFA meetings, and upcoming examinations. Parents can see at a glance what is happening at the school — which builds engagement and reduces administrative enquiries.</p>
      <div class="svc-tags"><span class="svc-tag">News &amp; Announcements</span><span class="svc-tag">School Calendar</span><span class="svc-tag">Open Day Events</span><span class="svc-tag">Term Dates</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Education Keywords (private school [city], admissions [school type])</h3>
      <p class="svc-desc">Title tags, meta descriptions, and content optimised for the exact searches Nigerian parents use — "private secondary school Lagos", "best school Abuja admissions", "international school Nigeria fees", "nursery school Lekki". EducationalOrganization, LocalBusiness, and Event schema markup for rich search results and local map pack visibility.</p>
      <div class="svc-tags"><span class="svc-tag">Education Keywords</span><span class="svc-tag">Local SEO</span><span class="svc-tag">Schema Markup</span><span class="svc-tag">GSC Setup</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Schools</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when parents are<br>searching for <em>your school</em></h2>
      <p>The most important moment in your school's enrolment journey is when a Nigerian parent opens Google and types "best private school near me" or "secondary school with hostel Lagos". If your school is not on page one, those parents never know you exist. Every website we build for schools is engineered to rank for the exact searches that drive admissions enquiries.</p>
      <p>We do not just build websites — we build search visibility. Your homepage, each programme page, your admissions page, and your results showcase are all individually optimised for specific keyword targets. We implement EducationalOrganization and LocalBusiness schema markup so Google understands exactly what type of institution you are and who you serve.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each academic level and programme offered</li>
        <li>Location pages targeting Lagos, Abuja, Port Harcourt, and every city you serve</li>
        <li>EducationalOrganization + LocalBusiness JSON-LD schema markup on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Citation building across Nigerian education directories and business listings</li>
        <li>Long-tail keyword content strategy targeting parent search intent</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">School — Keyword Rankings (representative results)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">private school lagos</span>
            <span class="kw-vol">4,100/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">best school abuja</span>
            <span class="kw-vol">2,800/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">international school nigeria</span>
            <span class="kw-vol">2,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">secondary school website design</span>
            <span class="kw-vol">1,500/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">nursery school lagos</span>
            <span class="kw-vol">1,200/mo</span>
            <span class="kw-pos top10">▲ #3</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">school admission form online nigeria</span>
            <span class="kw-vol">980/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">primary school abuja admissions</span>
            <span class="kw-vol">760/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">college website design nigeria</span>
            <span class="kw-vol">540/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active school SEO campaign</div>
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
    <p>We have built websites for educational institutions and professional service organisations across Nigeria and the UK. These are the outcomes our school clients consistently achieve.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="350">0</span><span>%</span></div>
      <div class="trust-label">Average increase in admission enquiries within the first 90 days of a new school website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="95">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built school websites</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="8">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly online applications reported by school clients within 6 months of launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched school website — with a milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Professional websites delivered across Nigeria, the UK, the US, and Canada — all built on custom code</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery — every file, database, and credential transferred unconditionally at handover</div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Process</span>
      <h2 class="s-head" id="process-heading">From brief to live site<br>in <em>six structured steps</em></h2>
    </div>
    <p>We have delivered over 120 professional websites. This process has been refined across every one of them to eliminate surprises, delays, and scope disagreements — so your school website launches on time, within budget, and performing from day one.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery &amp; Content Audit</div>
      <p class="proc-desc">A structured discovery session covering your school's academic programmes, values, admissions process, target parents, competitive landscape, and digital goals. We audit any existing content — prospectus, photos, results, testimonials — and map the complete site architecture. Every page, content type, and keyword target is agreed in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Discovery Call</span><span class="proc-tag">Content Audit</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Design — Trust-First Education Aesthetics</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. We design with a trust-first education aesthetic: professional, warm, and reassuring for parents while reflecting your school's identity and values. Your brand colours, photography placement, achievements display, and admissions CTAs are designed as a coherent system. Two revision rounds included.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build — Custom WordPress Theme</div>
      <p class="proc-desc">Your school website is built on a custom PHP WordPress theme — no Elementor, no page builders. ACF Pro powers your programme pages, staff profiles, achievements sections, news articles, event calendar, and gallery — all fully editable from WordPress admin without touching code. A staging environment is accessible throughout the build so you can review progress at any stage.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro</span><span class="proc-tag">Staging Access</span><span class="proc-tag">Gallery Integration</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO &amp; Content Entry</div>
      <p class="proc-desc">All content is entered, formatted, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, EducationalOrganization and LocalBusiness schema markup, canonical URLs, XML sitemap, and Google Search Console submission. Every programme page and location page is individually optimised for its target keyword cluster. GA4 is installed, goals configured, and all tracking verified before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA &amp; Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit targeting 90+, form testing, link verification, gallery load testing, and a final review call before launch day. Your domain is transferred, SSL verified, and Cloudflare configured. You receive a 45-minute CMS training session so your admin or bursar can update content independently, plus a written admin guide and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO &amp; Maintenance Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your school website ranking and running perfectly — publishing news articles and event updates, building local SEO citations, monitoring Core Web Vitals, updating WordPress, running daily backups, and delivering monthly keyword ranking reports. Schools on retainer consistently see growing organic enquiry volume through each term.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Updates</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">School websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each was designed from scratch — no templates, no page builders — specifically for the school's academic programmes, admissions goals, and target parent community.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#14532d 0%,#166534 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Greenleaf Academy</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Private Secondary School</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">WAEC</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Admissions Portal</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Gallery</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Private Secondary School</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Private Secondary School · Lagos, Nigeria</div>
        <div class="port-title">Greenleaf Academy</div>
        <p class="port-desc">Full website with dedicated admissions portal, WAEC results showcase, photo gallery, news section, and an SEO campaign that reached page one for "private secondary school Lagos" within 90 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0c1a3a 0%,#1e3a6e 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Pinnacle International School</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">International School · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Cambridge</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Virtual Tour</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Multi-lingual</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">International School</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">International School · Abuja, Nigeria</div>
        <div class="port-title">Pinnacle International School</div>
        <p class="port-desc">Premium international school website with Cambridge curriculum pages, virtual campus tour integration, multilingual admissions section, and results showcase — targeting expat and premium Nigerian parent segments in Abuja.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#3b1f6e 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Harmony Learning Centre</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Primary &amp; Secondary · UK+Nigeria</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Dual Market</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Online Enrolment</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Events</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Primary &amp; Secondary · UK+Nigeria</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Primary &amp; Secondary School · UK + Nigeria</div>
        <div class="port-title">Harmony Learning Centre</div>
        <p class="port-desc">Dual-market school website serving Nigerian diaspora parents in the UK alongside its Nigeria campus — with a dual content strategy targeting both UK and Nigerian-specific search intent and online enrolment capabilities for both markets.</p>
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
    <p>Not all web development options are equal — especially for schools where trust and first impressions directly affect enrolment decisions.</p>
  </div>
  <div class="compare-wrap"><table class="compare-table reveal" role="table" aria-label="Web design comparison for schools">
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
        <td class="feature">Built specifically for schools &amp; education</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Education-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Online admissions form &amp; application flow</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic forms only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full admissions funnel</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely structured</span></td>
      </tr>
      <tr>
        <td class="feature">WAEC / JAMB results showcase</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed score 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 40–65</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
      </tr>
      <tr>
        <td class="feature">Photo gallery &amp; events calendar</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full gallery + calendar</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Inconsistent</span></td>
      </tr>
      <tr>
        <td class="feature">EducationalOrganization schema markup</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">CMS training — non-tech staff can update</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Platform-guided only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Always included</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely provided</span></td>
      </tr>
      <tr>
        <td class="feature">Full code ownership on delivery</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked forever</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Unconditional ownership</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often withheld</span></td>
      </tr>
    </tbody>
  </table></div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What school leaders say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before i2Medier built our new website, parents could barely find us online. Within two terms of launching, our admissions enquiries nearly tripled. We now get prospective parents reaching out from as far as Port Harcourt because they found us on Google. The admissions form alone has saved our registrar hours every week."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Mrs. Adunola Bello</div><div class="test-role">Principal · Greenleaf Academy, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"As a school proprietor, I was worried the technical side would be overwhelming. It was not. The i2Medier team handled everything — the design, the content, the WAEC results pages, the gallery — and then showed our school secretary how to update the site herself. Now we post news and update events without any outside help."</p>
      <div class="test-author">
        <div class="test-avatar">E</div>
        <div><div class="test-name">Mr. Emeka Eze</div><div class="test-role">Proprietor · Pinnacle International School, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We needed a website that could serve parents in the UK and families still in Nigeria simultaneously. i2Medier built us exactly that — with content and SEO structured for both markets. We have had enquiries from British-Nigerian parents who found us on Google UK and enrolled their children in our Lagos campus. That is the ROI we needed."</p>
      <div class="test-author">
        <div class="test-avatar">F</div>
        <div><div class="test-name">Dr. Funmi Okafor</div><div class="test-role">Head Teacher · Harmony Learning Centre, UK &amp; Nigeria</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free school website audit —<br>see what's costing you enrolments</h2>
    <p>We will review your current website, identify your biggest SEO and conversion gaps, and show you exactly what is causing parents to leave without enquiring. No commitment required.</p>
  </div>
  <div class="cta2-right">
    <a href="#contact" class="btn-white-solid">Get Your Free Audit →</a>
  </div>
</div>

<!-- ═══ LONG-FORM SEO CONTENT ═══ -->
<section class="content-section" aria-labelledby="content-heading">
  <div class="two-col-intro" style="margin-bottom:2rem">
    <div>
      <span class="s-label">The Full Picture</span>
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>school website design in Nigeria</em></h2>
    </div>
    <p>A comprehensive guide to building a school website that attracts parents, builds credibility, and ranks on Google — written specifically for Nigerian educational institutions.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for schools in Nigeria">

      <h2>Why Nigerian schools need professional websites in 2025</h2>
      <p>The decision-making process for Nigerian parents choosing a school has changed irreversibly. What was once guided almost entirely by word-of-mouth and community recommendations now begins with an online search. A parent in Lagos shortlisting secondary schools for their child will search Google, read websites, look at galleries, check results, and form strong opinions about each institution — all before making a single phone call.</p>
      <p>This shift is accelerating. Smartphone penetration in Nigeria continues to rise, internet access is broader than ever, and the parents now enrolling children in private schools are the most digitally literate generation of Nigerian parents in history. They comparison-shop schools online with the same rigour they apply to choosing a car or a hospital — and your website is how they evaluate you.</p>
      <p>A professional school website is not a marketing expense. It is an institutional asset that works 24 hours a day, seven days a week, presenting your school to every parent who searches for it in Lagos, Abuja, Port Harcourt, Kano, and beyond. A poor website does not just fail to help — it actively costs you enrolments by making the school look less credible than competitors who invested in their digital presence.</p>

      <h2>What makes a great school website in Nigeria?</h2>
      <p>The best school websites in Nigeria share a set of characteristics that distinguish them from generic institutional sites. Understanding these helps clarify what you should demand when commissioning a new school website.</p>

      <h3>Trust-first design that reassures parents immediately</h3>
      <p>Within three seconds of landing on a school website, parents should feel that the institution is credible, established, and appropriate for their child. This is communicated visually before a word is read — through the quality of photography, the clarity of design, the prominence of accreditation badges, and the warmth of the overall presentation. <strong>A professional school website communicates quality before it communicates content.</strong></p>

      <h3>A clear, frictionless admissions pathway</h3>
      <p>Every page of your school website should offer parents a clear next step toward enquiry or application. The admissions process should be documented step-by-step — age requirements, entry assessments, required documents, key dates, fee structures, and how to apply. The easier you make it for a parent to enquire, the higher your conversion rate from website visit to admission enquiry.</p>

      <h3>Academic results prominently displayed</h3>
      <p>Nigerian parents choosing schools are intensely results-focused. Your WAEC pass rates, NECO performance, JAMB scores, scholarship achievements, and external examination results are the most persuasive evidence of your school's academic quality. These should not be buried in a prospectus PDF — they should be front and centre on your website, structured for maximum credibility and visibility.</p>

      <h2>The admissions funnel online</h2>
      <p>Every school website should be designed with a clear admissions funnel in mind. The funnel has four stages: awareness (parents find you on Google), interest (parents explore your programmes and values), intent (parents review admissions process and requirements), and action (parents submit an enquiry or application).</p>
      <p>Most school websites only serve the first two stages. The best school websites serve all four — with dedicated admissions pages, online application forms, clear requirement criteria, and multiple contact options (phone, WhatsApp, email, and contact form) that match the communication preferences of different parents.</p>
      <p>Conversion optimisation on a school website is not about manipulation — it is about removing friction. Every additional click a parent must take, every form field they cannot find, every piece of information they cannot locate is a reason for them to close the tab and call a competitor instead.</p>

      <h2>SEO for schools in Nigeria</h2>
      <p>Search engine optimisation for Nigerian schools centres on a set of high-intent keyword patterns that parents use at different stages of their school search:</p>
      <ul>
        <li><strong>Location + school type:</strong> "private secondary school Lagos", "international school Abuja", "nursery school Lekki"</li>
        <li><strong>Quality signals:</strong> "best school in Lagos", "school with good WAEC results Abuja", "top private schools Port Harcourt"</li>
        <li><strong>Admissions searches:</strong> "school admission form Nigeria 2025", "JSS1 admission Lagos", "JS1 admission form online"</li>
        <li><strong>Feature-specific:</strong> "boarding school Lagos", "school with swimming pool Abuja", "school with hostel Nigeria"</li>
        <li><strong>Programme-specific:</strong> "A-Level school Nigeria", "Cambridge school Lagos", "IB school Nigeria"</li>
      </ul>
      <p>Every school website we build targets a comprehensive keyword map covering all these categories — with individual pages created and optimised for each cluster. We also implement EducationalOrganization and LocalBusiness JSON-LD schema markup across all relevant pages, which helps Google understand exactly what type of institution you are and surfaces your results in rich search features.</p>

      <h2>Gallery and virtual tour importance for school enrolments</h2>
      <p>Photography is one of the most powerful trust-building tools a school website has. Parents evaluating schools are trying to visualise their child's environment. Strong, well-organised photography of your classrooms, laboratories, sports fields, library, dining hall, and student events creates emotional connection and answers the questions parents ask when they cannot yet visit in person.</p>
      <p>For schools targeting international or diaspora parents — such as Nigerian families in the UK seeking a school for their child studying in Lagos — a virtual campus tour can be the difference between an enquiry and a bounce. A well-executed virtual tour allows parents to explore your campus from anywhere in the world, building enough confidence to begin the admissions process without an in-person visit first.</p>
      <p>We build galleries that are easy to update through the CMS — meaning your administrative staff can upload new event photos and graduation images without any technical knowledge, keeping the website current throughout the school year.</p>

      <h2>How much does a school website cost in Nigeria?</h2>
      <p>School website costs in Nigeria vary based on the number of pages required, the complexity of the admissions system, and whether you need a gallery, events calendar, or custom application portal. As a general guide for the Nigerian market:</p>
      <ul>
        <li><strong>Essential school website</strong> (8 pages, enquiry form, gallery, basic SEO): ₦400,000–₦600,000</li>
        <li><strong>Growth school website</strong> (15+ pages, programme pages, news, events, results showcase, full SEO): ₦800,000–₦1.4M</li>
        <li><strong>Enterprise platform</strong> (multi-campus, online application portal, alumni system, e-learning integration): ₦1.8M+</li>
      </ul>
      <p>The single most important factor affecting ROI is not the upfront cost — it is the quality of the SEO foundation and the admissions conversion architecture. A well-built school website that attracts three additional enrolments per term pays for itself within a single academic year. Most of our school clients see their initial investment recovered within 6–9 months of launch.</p>

      <h2>Choosing a web design agency for your school</h2>
      <p>When selecting a web design agency for your school, look beyond portfolio aesthetics. The agency should understand the Nigerian parent's decision-making journey, have demonstrable experience with education-sector SEO keyword research, and build websites on a CMS your non-technical administrative staff can manage without developer involvement. They should also provide proper post-launch support and a CMS training session rather than simply handing over an unfamiliar system.</p>
      <p>i2Medier works exclusively on custom-built, hand-coded WordPress themes — no page builders, no Elementor, no templates. This approach gives your school a website that loads fast, scores high on PageSpeed, and gives you complete ownership of every file on delivery. We have built and launched school and education websites across Nigeria and the UK, and we understand the specific trust signals, keyword patterns, and parental conversion behaviour of the Nigerian education market.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website audit and proposal for your school.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why school websites lose enrolments</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for schools</a></li>
          <li><a href="#process-heading" class="toc-link">Our process (6 steps)</a></li>
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
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">Questions about school<br><em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every school has different requirements. Email us and we will give you a direct, honest answer specific to your institution — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">Can parents submit admissions applications directly through the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Yes. We build online admissions enquiry forms as standard, and for schools wanting a full application portal, we can build a custom system where parents complete the full application online, upload required documents, and receive automated acknowledgement emails. All submissions are forwarded to your admissions team instantly. More advanced portals with status tracking are available in our Enterprise package.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can we update the gallery and news section ourselves after the website launches?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes — this is a core principle of every school website we build. We use ACF Pro to create simple, intuitive editing interfaces so your admin, school secretary, or communications officer can upload new photos, publish news articles, add events to the calendar, and update any content without touching code. Every handover includes a CMS training session and a written admin guide specific to your school's website workflows.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How do you display WAEC and JAMB results on the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">We build a dedicated Results and Achievements section where your WAEC pass rates, NECO performance, JAMB statistics, and subject-specific results are presented in a visually clear, credible format — with summary statistics, year-on-year comparisons where available, and subject breakdown. This section is structured with schema markup so Google can read and surface your results data in rich search results. You can update these annually through the CMS without developer help.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">Can the website include a school events calendar and term dates?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Yes. We build a fully integrated school calendar where you can add term dates, open days, PTFA meetings, examination periods, sports fixtures, and school events. Each event can include details, location, and a download link. The calendar is publicly visible and also helps with SEO — events are marked up with Event schema so Google can surface them in search results, especially useful for open day visibility in your target area.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">How long does it take to build a school website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">A standard school website with 10–15 pages, gallery, news section, and admissions form typically takes 3–5 weeks from design approval to launch. Larger projects with full programme pages, a custom application portal, or virtual tour integration may take 6–8 weeks. We provide a detailed, milestone-based timeline at the start of every project so you always know what is happening and when. Many schools time their launch to coincide with a new admissions season or the start of a new term.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Will our school website rank on Google without additional monthly payments?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Every website we build includes a full on-site SEO foundation — semantic HTML, optimised title tags and meta descriptions per page, EducationalOrganization and LocalBusiness schema markup, XML sitemap, canonical URLs, and Google Search Console submission. This foundation gives your school the technical basis to rank. For schools in competitive markets — major cities like Lagos and Abuja — we recommend our ongoing SEO retainer, which adds off-page SEO, monthly content, citation building, and ranking reports to drive long-term organic growth.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can the website serve parents who speak languages other than English?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes. For international schools or institutions serving communities with Yoruba, Igbo, Hausa, French, or other language preferences, we can build a multilingual website using the WPML or TranslatePress plugins. Each language version is independently SEO-optimised, with separate URL structures, hreflang tags, and localised content. This is particularly valuable for international schools serving expatriate communities or French-speaking families in Nigeria. We discuss multilingual requirements during the initial discovery session.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a school website<br>that drives admissions?</h2>
  <p>Get a free, no-obligation consultation and school website proposal. We will review your current site, map your keyword opportunities, and show you exactly what we would build — and why.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
