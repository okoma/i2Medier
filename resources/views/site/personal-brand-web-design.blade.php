@extends('public.layouts.app')

@section('title', 'Web Design for Personal Brands | Personal Brand Website Design Nigeria | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/personal-brand-web-design.css')
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
      <span aria-current="page">Web Design for Personal Brands</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Personal Brand Website Design</span>
    <h1>Websites that position you as the<br><em>undeniable authority</em> in your field</h1>
    <p class="hero-sub">Your expertise, story, and offers deserve a website that works as hard as you do. We build personal brand websites that establish thought leadership, attract high-value speaking invitations, book coaching and consulting clients, and generate passive income — even while you're offline.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Personal Brand Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Authority-positioning design — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span> Speaking & booking integration built-in</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Personal brand website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.3 19.3 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8L7.2 10.3a16 16 0 0 0 6.5 6.5l1.8-1.8a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2Z"/></svg></div>
        <div>
          <div class="float-notif-text">New speaking enquiry · Digital Summit Lagos · October 2026</div>
          <div class="float-notif-sub">just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">dradaezeobi.com</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Dr. Adaeze <span>Obi</span></div>
            <div class="msn-links">
              <span class="msn-link">About</span>
              <span class="msn-link">Speaking</span>
              <span class="msn-link">Coaching</span>
              <span class="msn-link">Books</span>
              <span class="msn-link">Media</span>
              <span class="msn-cta">Contact</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Digital Transformation Expert · Lagos, Nigeria</div>
            <div class="msh-h1">Nigeria's Leading Voice on<br><span>Digital Transformation</span></div>
            <div class="msh-creds">
              <span class="msh-cred">PhD</span>
              <span class="msh-cred">TEDx Speaker</span>
              <span class="msh-cred">Forbes Africa</span>
              <span class="msh-cred">CNN</span>
            </div>
            <div class="msh-btns">
              <span class="msh-btn-p">Book a Speaking Slot</span>
              <span class="msh-btn-s">Start Coaching →</span>
            </div>
          </div>
          <!-- Services / Offers -->
          <div class="mock-site-services">
            <div class="mss-label">Work With Me</div>
            <div class="mss-grid">
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/></svg></div><div class="mss-name">1:1 Coaching<br><span style="color:var(--personal);font-size:.42rem">₦150k/session</span></div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/></svg></div><div class="mss-name">Online Course<br><span style="color:var(--personal);font-size:.42rem">from ₦45k</span></div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg></div><div class="mss-name">Speaking<br><span style="color:var(--g400);font-size:.42rem">Enquiries</span></div></div>
              <div class="mss-card"><div class="mss-ico"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div><div class="mss-name">Masterclass<br><span style="color:var(--personal);font-size:.42rem">₦25k</span></div></div>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">50k<span>+</span></div><div class="mst-lbl">Followers</div></div>
            <div class="mst-item"><div class="mst-num">100<span>+</span></div><div class="mst-lbl">Talks</div></div>
            <div class="mst-item"><div class="mst-num">3</div><div class="mst-lbl">Books</div></div>
            <div class="mst-item"><div class="mst-num">4.9<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "digital transformation speaker Nigeria"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Business Coaches & Mentors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Executive Coaches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Public Speakers & Keynote Speakers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Authors & Thought Leaders</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Financial Advisors & Money Coaches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fitness & Wellness Coaches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Career Coaches & HR Consultants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Relationship & Life Coaches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Leadership Trainers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Online Course Creators & Educators</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Business Coaches & Mentors</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Executive Coaches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Public Speakers & Keynote Speakers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Authors & Thought Leaders</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Financial Advisors & Money Coaches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fitness & Wellness Coaches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Career Coaches & HR Consultants</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Relationship & Life Coaches</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Leadership Trainers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Online Course Creators & Educators</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most personal brand<br>websites <em>cost you opportunities</em></h2>
    </div>
    <p>Your credentials, experience, and expertise are impressive. But when a conference organiser, potential coaching client, or media journalist lands on your website, do they immediately see that? Within seven seconds they have formed a judgement about your authority and relevance. If your website does not pass that test, they close the tab — and the opportunity disappears. Here is what is going wrong on most personal brand websites — and exactly what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></span>
      <h3 class="prob-title">Credibility and expertise exist in abundance but a weak website undermines first impressions</h3>
      <p class="prob-desc">You may have decades of experience, multiple degrees, published books, and media features — but a poorly designed website signals the opposite. Decision-makers judge authority by the quality of digital presence before engaging with the substance behind it.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A premium, professionally designed website that immediately signals authority through design quality, media features, credentials, and clear positioning — so your digital presence matches the expertise behind it.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg></span>
      <h3 class="prob-title">Speaking and media enquiries go to the wrong inbox or fall through because there's no dedicated page</h3>
      <p class="prob-desc">Event organisers and journalists look for a speaking page with topic descriptions, audience types, past engagements, and a video reel. If that page does not exist, the enquiry goes to someone whose website makes it easier to say yes.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated speaking page with your topic list, past engagements, audience types, speaker video reel, and a simple booking enquiry form that captures the right information instantly.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></span>
      <h3 class="prob-title">Coaching clients only come through referrals — the website doesn't attract new ones</h3>
      <p class="prob-desc">Referral-only growth has a ceiling. If your coaching or consulting page does not clearly explain your methodology, show client transformations, and provide a low-friction path to book a discovery call, your website is invisible to the majority of your potential client base.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Clear coaching methodology pages, client transformation stories, results-focused copywriting, and a consultation booking form integrated with Calendly or Paystack so prospects can act immediately.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></span>
      <h3 class="prob-title">Online courses and digital products exist but aren't discoverable or sold from a first-party website</h3>
      <p class="prob-desc">Relying on Teachable, Selar, or Udemy means you do not own your audience or the sale. Platform fees erode margins. Dependency on third-party algorithms limits reach. Your course should live on your domain — building your email list and your asset base.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Course and product landing pages hosted under your personal brand domain — building email list ownership and reducing dependency on platforms, while integrating seamlessly with your existing delivery tools.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Missing on Google when the target audience searches for expertise in your field</h3>
      <p class="prob-desc">When a Lagos CEO searches "leadership coach Nigeria" or "keynote speaker on digital transformation" and your name does not appear, that slot is filled by a competitor. Your expertise may be superior — but Google cannot rank what it cannot find and understand.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Content strategy and SEO across your speaking topics, coaching niches, and thought leadership articles that rank for long-tail discovery searches — bringing the right audience to you organically, month after month.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M19 11H5"/><path d="m12 18-7-7 7-7"/></svg></span>
      <h3 class="prob-title">No press room — media features, podcast appearances, and publications are scattered across social media</h3>
      <p class="prob-desc">Journalists, event organisers, and collaborators need to see your media history in one credible, structured place. Social media posts fade. A disorganised online presence signals that your media profile is thinner than it actually is.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated media room and "As Seen In" section that aggregates all press coverage, podcast appearances, published articles, and TV and radio features in one credible, search-indexed location.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your personal<br>brand website <em>needs</em></h2>
      <p>A high-performing personal brand website is far more than a homepage and a contact form. It is a structured, strategic platform — each page designed to serve a specific audience at a specific moment in their decision process, and each optimised to rank for the keywords your ideal clients, event organisers, and media contacts actually search for.</p>
      <p>We map your expertise, offers, speaking topics, publications, and story to a comprehensive page architecture that works for Google, for prospective coaching clients, and for the conference producers who are deciding whether to put you on their stage.</p>
      <ul class="bullets">
        <li>Homepage — authority-positioning hero, media features strip, services call-to-action</li>
        <li>About & story — credentials, mission, values, and the human narrative behind the brand</li>
        <li>Speaking page — topics, past talks, video reel, audience types, and booking form</li>
        <li>Coaching & consulting page — methodology, packages, and client testimonials</li>
        <li>Books & publications page — showcase your written work and drive sales</li>
        <li>Online courses & digital products — landing pages that convert visitors to buyers</li>
        <li>Media room — press, podcasts, published articles, and TV and radio features</li>
        <li>Blog & thought leadership articles — positioning content that ranks on Google</li>
        <li>Email list & lead magnet landing pages — own your audience, not just your followers</li>
        <li>Contact & discovery call booking — Calendly or Paystack integrated for instant scheduling</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Personal Brand Website →</a>
    </div>

    <!-- Pages wireframe visual -->
    <div class="pages-visual reveal" aria-hidden="true">
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Homepage</span><span class="pch-badge key">Authority Hub</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Speaking Page</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Coaching Page</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Media Room</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Course Landing Pages</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Blog & Thought Leadership</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>personal brands</em></h2>
    </div>
    <p>Every personal brand website we build is designed around the specific trust signals, booking workflows, and conversion patterns of expert-led businesses. These are not generic business website features — they are personal brand-specific elements that have a direct impact on whether a visiting prospect books a call, enquires about speaking, or purchases your course.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></div>
      <h3 class="svc-title">Authority Homepage Design</h3>
      <p class="svc-desc">Your homepage is designed to communicate credibility within three seconds — professional headshot placement, credentials display, media feature logos (Forbes, CNN, TEDx, and others), an authority-positioning headline, and a clear path to your primary offers. Visitors should immediately understand who you are, who you serve, and why you are the expert they have been looking for.</p>
      <div class="svc-tags"><span class="svc-tag">Credibility Signals</span><span class="svc-tag">Media Features</span><span class="svc-tag">Clear Positioning</span><span class="svc-tag">Authority Design</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg></div>
      <h3 class="svc-title">Speaking Page</h3>
      <p class="svc-desc">A dedicated page structured specifically for event organisers — your speaking topics with descriptions, past engagements list, audience types you serve best, a video speaker reel embed, and a clean enquiry form that captures event details, budget range, and audience size. Make it as easy as possible for the right event to book you.</p>
      <div class="svc-tags"><span class="svc-tag">Topics & Reel</span><span class="svc-tag">Past Engagements</span><span class="svc-tag">Booking Form</span><span class="svc-tag">Video Embed</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div>
      <h3 class="svc-title">Coaching & Consulting Pages</h3>
      <p class="svc-desc">Methodology-first coaching pages that walk potential clients through your approach, your process, the transformation they can expect, your packages, and the stories of past clients who have achieved results. Calendly or Paystack integration makes booking a discovery call the natural next step — with no unnecessary friction between interest and action.</p>
      <div class="svc-tags"><span class="svc-tag">Methodology</span><span class="svc-tag">Packages</span><span class="svc-tag">Calendly / Paystack</span><span class="svc-tag">Transformation Stories</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 20V10"/><path d="M10 20V4"/><path d="M16 20v-7"/><path d="M22 20v-4"/></svg></div>
      <h3 class="svc-title">Media Room & Press Page</h3>
      <p class="svc-desc">A structured media room that aggregates every press mention, podcast appearance, published article, TV or radio feature, and award in a single, searchable, credibility-building page. Complete with a downloadable press kit, high-resolution headshot gallery, and an official bio in multiple lengths for event programmes and publications.</p>
      <div class="svc-tags"><span class="svc-tag">Press Coverage</span><span class="svc-tag">Podcast Embeds</span><span class="svc-tag">Press Kit</span><span class="svc-tag">Bio Library</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></div>
      <h3 class="svc-title">Course & Digital Product Landing Pages</h3>
      <p class="svc-desc">Conversion-optimised course landing pages on your own domain — with curriculum outlines, learning outcomes, instructor credentials, student testimonials, and payment integration. Each page is also an SEO entry point — ranking for the course topic and building your email list as a first-party asset you own, not a platform you rent.</p>
      <div class="svc-tags"><span class="svc-tag">Course Pages</span><span class="svc-tag">Payment Integration</span><span class="svc-tag">Email List</span><span class="svc-tag">SEO Optimised</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Thought Leadership Keywords</h3>
      <p class="svc-desc">Title tags, meta descriptions, and content optimised for personal brand search terms — "business coach Lagos", "keynote speaker Nigeria", "digital transformation expert". Person schema markup helps Google build a knowledge panel for your name. Content strategy across speaking topics, coaching niches, and article subjects creates compound organic growth over time.</p>
      <div class="svc-tags"><span class="svc-tag">Personal Brand Keywords</span><span class="svc-tag">Person Schema</span><span class="svc-tag">Knowledge Panel</span><span class="svc-tag">Content Strategy</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Personal Brands</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when the right people are<br>searching for <em>your expertise</em></h2>
      <p>The most valuable moments in your personal brand journey are when the right person — a conference organiser, a potential coaching client, a journalist, or a podcast host — opens Google and searches for an expert exactly like you. If you are not on page one, you do not get the call.</p>
      <p>Every personal brand website we build is engineered to rank for the specific search terms your ideal audience uses. Your homepage, speaking page, coaching pages, course landing pages, and thought leadership articles are each individually optimised for targeted keyword combinations. We implement Person schema so Google can build a knowledge panel for your name and authority signal your expertise in your field.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each coaching and consulting offer you have</li>
        <li>Speaking page targeting city and niche combinations — "keynote speaker Lagos", "leadership speaker Nigeria"</li>
        <li>Person, Event, and Course schema markup for rich Google search results</li>
        <li>Google Knowledge Panel optimisation — making your name searchable and authoritative</li>
        <li>Long-tail content strategy targeting discovery searches in your niche and geography</li>
        <li>Podcast and article backlink structure to build domain authority for your personal brand</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an SEO Strategy Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Personal Brand — Keyword Rankings (active campaign)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">business coach nigeria</span>
            <span class="kw-vol">4,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">keynote speaker lagos</span>
            <span class="kw-vol">2,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">life coach abuja</span>
            <span class="kw-vol">2,100/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">executive coach nigeria</span>
            <span class="kw-vol">1,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">financial coach nigeria</span>
            <span class="kw-vol">2,400/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">leadership trainer nigeria</span>
            <span class="kw-vol">1,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">online course creator nigeria</span>
            <span class="kw-vol">1,900/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">personal brand consultant lagos</span>
            <span class="kw-vol">1,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from active personal brand SEO campaigns</div>
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
    <p>We have built websites for personal brands, coaches, speakers, and thought leaders across Nigeria and the UK. These are the outcomes our clients consistently see.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="380">0</span><span>%</span></div>
      <div class="trust-label">Average increase in inbound speaking, coaching, and media opportunities within 90 days of launching a new personal brand website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) achieved on our custom-built personal brand websites — no page builder bloat, no compromise</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.3 19.3 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.5 3a2 2 0 0 1-.6 1.8L7.2 10.3a16 16 0 0 0 6.5 6.5l1.8-1.8a2 2 0 0 1 1.8-.6l3 .5a2 2 0 0 1 1.7 2Z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="6">0</span><span>×</span></div>
      <div class="trust-label">Increase in monthly speaking and coaching enquiries reported by personal brand clients within 6 months of their website launch</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched personal brand website — with a guaranteed, milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Expert and personal brand websites delivered across Nigeria, the UK, the US, and Canada — all built on custom code, never templates</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery — every file, every database, every credential transferred to you unconditionally at project handover</div>
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
    <p>We have delivered over 120 professional websites for experts, coaches, and thought leaders. This process works — it has been refined across every one of them to eliminate the surprises, delays, and scope disagreements that make most agency relationships frustrating for busy, high-output professionals.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Positioning Discovery & Brand Audit</div>
      <p class="proc-desc">A structured discovery session covering your positioning, your multiple offers (speaking, coaching, courses, books), your target audiences, your competitive landscape, and your specific authority goals. We audit your existing digital presence, identify the gaps, and map your complete site architecture — every page, every keyword target, every conversion pathway — agreed in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Positioning Audit</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design — Authority-First, Premium Personal Aesthetics</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. We design your brand colours, professional photography placement, credentials display, media feature strips, and conversion elements to work as a coherent, authoritative system. Your visual identity must communicate premium positioning at a glance. Two revision rounds are included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build — Speaking, Coaching, Media, Courses</div>
      <p class="proc-desc">Your website is built on a custom WordPress theme — no Elementor, no page builders. ACF Pro powers your speaking topics, coaching packages, course listings, media room, testimonials, and thought leadership content — all fully editable from WordPress admin without touching code. Calendly or Paystack booking integration is built directly into the coaching and speaking enquiry flows. A staging environment is accessible throughout so you can review progress at any point.</p>
      <div class="proc-tags"><span class="proc-tag">Custom PHP Theme</span><span class="proc-tag">ACF Pro</span><span class="proc-tag">Calendly / Paystack</span><span class="proc-tag">Staging Access</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO & Content Strategy</div>
      <p class="proc-desc">Your content is entered across all pages, formatted correctly, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, Person and Course schema markup, canonical URLs, XML sitemap, and Google Search Console submission. We implement structured data specifically for personal brands — helping Google understand your expertise, your speaking topics, and your coaching offers. Analytics 4 is installed, goals configured, and all tracking verified before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Person Schema</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA & Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), booking form testing, Calendly and Paystack integration verification, link checking, and a final review call before launch day. Your domain is transferred to the new site, SSL is verified, and Cloudflare is configured. You receive a 45-minute CMS training session, a written admin guide, and a post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span><span class="proc-tag">SSL + Cloudflare</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly Retainer — SEO, Content & Maintenance</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and growing — publishing thought leadership articles that rank for your expertise keywords, managing your media room as new press features arrive, monitoring Core Web Vitals, updating WordPress, running daily backups, and delivering monthly keyword ranking reports. The compound SEO effect is strongest in months 4–12 and beyond.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Creation</span><span class="proc-tag">Media Room Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Personal brand websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the individual's expertise, audience, and business model. Every site is built to position, attract, and convert.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--personal-dk) 0%,#065f46 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Dr. Adaeze Obi</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Digital Transformation Speaker & Coach</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Speaking</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Coaching</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Courses</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Digital Transformation Expert</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Speaker & Executive Coach · Lagos, Nigeria</div>
        <div class="port-title">Dr. Adaeze Obi</div>
        <p class="port-desc">Full personal brand platform with speaking page, 1:1 coaching booking, online course landing pages, media room, and an SEO campaign that ranked her name and topic on Google page one within 60 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a2218 0%,#083344 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Emeka Nwosu</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Leadership Trainer & Executive Coach</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Leadership</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Executive</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Corporate</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Leadership Trainer</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Leadership Trainer & Executive Coach · Abuja, Nigeria</div>
        <div class="port-title">Emeka Nwosu</div>
        <p class="port-desc">Authority-first personal brand website with a corporate training enquiry system, speaking booking page, leadership masterclass sales page, and thought leadership blog that drives organic discovery for "executive coach Abuja" and related terms.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#064e3b 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Fatima Aliyu</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Financial Coach & Author</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Finance</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Author</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">UK + Lagos</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Financial Coach & Author · UK + Lagos</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Financial Coach & Author · London and Lagos</div>
        <div class="port-title">Fatima Aliyu</div>
        <p class="port-desc">Dual-market personal brand site for a UK-based Nigerian financial coach — book sales pages, group coaching registration, money masterclass landing pages, podcast media room, and a content strategy targeting both UK diaspora and Nigerian financial wellness search terms.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every stage of your <em>personal brand</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Emerging Experts & Coaches</div>
        <div class="price-name">Essential Site</div>
        <p class="price-tagline">A clean, credible personal brand website for an expert ready to establish a proper online presence and start attracting the right opportunities.</p>
        <div class="price-amount">₦450k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Homepage with authority design</div>
        <div class="price-feat">About & credentials page</div>
        <div class="price-feat">Speaking or coaching page</div>
        <div class="price-feat">Contact & discovery call form</div>
        <div class="price-feat">Basic blog setup</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Media room</div>
        <div class="price-feat no">Course landing pages</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Website</div>
        <p class="price-tagline">A full authority site for the expert ready to monetise multiple offers — speaking, coaching, courses, and thought leadership — from a single platform.</p>
        <div class="price-amount">₦900k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full authority homepage</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Speaking page with booking form</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Coaching & consulting pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Media room & press page</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Course & product landing pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Email list & lead magnet pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Calendly / Paystack integration</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Newsletter setup</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + Person schema</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Established Thought Leaders</div>
        <div class="price-name">Enterprise Platform</div>
        <p class="price-tagline">A comprehensive personal brand platform for the established expert with multiple revenue streams, a community, a podcast, and a digital product empire to build.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Full personal brand platform</div>
        <div class="price-feat">Course delivery integration</div>
        <div class="price-feat">Community membership area</div>
        <div class="price-feat">Podcast integration & archive</div>
        <div class="price-feat">Book sales & signed copies</div>
        <div class="price-feat">Digital product store</div>
        <div class="price-feat">Advanced email automation</div>
        <div class="price-feat">Affiliate & referral system</div>
        <div class="price-feat">90-day support & SLA</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn solid">Request a Proposal →</a></div>
    </div>

  </div>
</section>

<!-- ═══ COMPARISON TABLE ═══ -->
<section class="compare-section" aria-labelledby="compare-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why Choose i2Medier</span>
      <h2 class="s-head" id="compare-heading">How we compare to<br><em>your other options</em></h2>
    </div>
    <p>Not all web development options are equal — especially for personal brands where your website is your most valuable business asset and first impression.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for personal brands">
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
        <td class="feature">Dedicated speaking page with booking form</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Purpose-built for speakers</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely understood</span></td>
      </tr>
      <tr>
        <td class="feature">Media room with press & podcast aggregation</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included and structured</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely included</span></td>
      </tr>
      <tr>
        <td class="feature">Coaching methodology & transformation pages</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic service blocks</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Conversion-optimised</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Course & digital product landing pages</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> SEO-optimised on your domain</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Sometimes available</span></td>
      </tr>
      <tr>
        <td class="feature">Person schema markup for Google Knowledge Panel</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Email list integration & lead magnet pages</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Platform-dependent</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Custom-built and owned</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely strategic</span></td>
      </tr>
      <tr>
        <td class="feature">Calendly / Paystack booking integration</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Embed only, no custom flow</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Fully integrated</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often basic embed</span></td>
      </tr>
      <tr>
        <td class="feature">Full code ownership on delivery</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked forever</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Unconditional ownership</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often withheld</span></td>
      </tr>
    </tbody>
  </table>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What personal brand clients say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"I had been speaking at events for years and my website was genuinely embarrassing compared to my reputation. Within six weeks of the new site going live, I received three unsolicited speaking enquiries directly through my speaking page — one of which was the biggest corporate keynote I have ever done. The ROI is undeniable."</p>
      <div class="test-author">
        <div class="test-avatar">B</div>
        <div><div class="test-name">Dr. Bola Adeyemi</div><div class="test-role">Keynote Speaker & Leadership Expert · Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before my new website, every coaching client came through a personal referral. Now I get three to five qualified discovery call bookings per week from people who found me on Google, read my methodology page, and arrived ready to commit. i2Medier understood exactly what a business coach's website needs to communicate — they did not need me to explain my industry to them."</p>
      <div class="test-author">
        <div class="test-avatar">C</div>
        <div><div class="test-name">Mr. Chidi Okafor</div><div class="test-role">Business Coach & Founder · Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"I have published two books and been featured in multiple Nigerian national publications but my website looked like it was built in 2015. The media room i2Medier built for me now aggregates everything in one place — and I have had two journalists reference my press page when writing about me. That was not possible before. The investment pays for itself every time someone decides I am credible because of what they see online."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Mrs. Amaka Eze</div><div class="test-role">Author, Speaker & Thought Leader · Lagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free personal brand website<br>audit — see what your online<br>presence is costing your authority</h2>
    <p>We will review your current digital presence, identify the biggest gaps in your positioning, speaking page, and SEO, and show you exactly what a professional personal brand website would change. No commitment required.</p>
  </div>
  <div class="cta2-right">
    <a href="#contact" class="btn-white-solid">Book a Free Audit →</a>
  </div>
</div>

<!-- ═══ LONG-FORM SEO CONTENT ═══ -->
<section class="content-section" aria-labelledby="content-heading">
  <div class="two-col-intro" style="margin-bottom:2rem">
    <div>
      <span class="s-label">The Full Picture</span>
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>personal brand web design</em></h2>
    </div>
    <p>A comprehensive guide to building a personal brand website that establishes authority, attracts speaking opportunities, books coaching clients, and ranks on Google — written for Nigerian experts, founders, and thought leaders.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for personal brands">

      <h2>Why Nigerian experts and founders need a personal brand website in 2026</h2>
      <p>The landscape for experts, coaches, speakers, and thought leaders in Nigeria has shifted dramatically. Where authority was once built almost exclusively through word of mouth, in-person networks, and traditional media, digital presence has become the primary credibility signal for the most valuable opportunities available to personal brands — keynote speaking slots, executive coaching retainers, media features, corporate training contracts, and course purchases.</p>
      <p>Consider the journey of a corporate HR director in Lagos looking to book a keynote speaker for their annual leadership conference. They receive three names from their network. Before calling any of them, they go to Google and search each name. The speaker with the most professionally designed, strategically structured website wins the shortlisting process before a single phone call has been made. This pattern repeats across every type of opportunity a personal brand can attract.</p>
      <p>A personal brand website is not a vanity project. It is your 24-hour digital business development tool — working while you sleep, during flights, during client sessions, and during school holidays. Every day your website is weak is a day opportunities pass silently to a competitor whose digital presence communicates authority more effectively than yours does.</p>

      <h2>The authority gap: why social media alone is not enough</h2>
      <p>Many Nigerian experts have significant social media followings. Thousands of LinkedIn connections. Tens of thousands of Instagram followers. But social media, despite its reach, has a fundamental structural limitation: you do not own it. The algorithm controls who sees your content. Platform policies can restrict your reach overnight. And crucially, the formats available on social media platforms are not designed to present the full depth of your expertise, your methodology, your media history, and your offer portfolio in the way a properly architected website can.</p>
      <p>A personal brand website gives you three things social media cannot:</p>
      <ul>
        <li><strong>Ownership:</strong> Your domain, your hosting, your email list. No algorithm, no platform policy, no account suspension can take it from you.</li>
        <li><strong>Depth:</strong> The space to explain your methodology in full, present your speaking topics with context, tell the story of client transformations, and aggregate your entire media history in one credible location.</li>
        <li><strong>Search visibility:</strong> When someone searches "leadership coach Nigeria" or "financial wellness speaker Lagos", social media profiles rarely dominate those results. A well-optimised website does.</li>
      </ul>
      <p>The strongest personal brands in Nigeria use social media to build awareness and drive traffic — but they direct that traffic to a website they own and control, where conversion happens on their terms.</p>

      <h2>Speaking pages: how to attract high-value speaking invitations</h2>
      <p>Most speakers underestimate the role their website plays in the decision-making process of event organisers. A conference director evaluating potential keynote speakers typically reviews dozens of options. The speakers who get shortlisted are overwhelmingly those whose websites make the organiser's job easier — clearly presenting speaking topics, demonstrating the speaker's relevance to the audience, showing evidence of past engagements, and providing a direct path to enquiry.</p>
      <p>A properly built speaking page should include: a list of your specific speaking topics with one-paragraph descriptions of what each talk covers and what the audience leaves with; a curated list of past engagements with event names, audience types, and approximate sizes; a video reel — even a two-minute compilation of past talk footage is dramatically more persuasive than text alone; a section describing your ideal audience types and the event formats you are available for; and a simple enquiry form that asks for the event name, date, expected audience size, and budget range so you can respond with a relevant proposal immediately.</p>
      <p>The difference between a generic contact form and a properly structured speaking enquiry page is the difference between getting three cold-call speaking enquiries per year and receiving a steady flow of warm, pre-qualified speaking invitations from organisers who have already decided they want you before they reach out.</p>

      <h2>Coaching websites: converting visitors into paying clients</h2>
      <p>The single biggest failing of most coaching websites is that they describe what the coach does without explaining the transformation the client experiences. Prospective coaching clients are not buying sessions — they are buying outcomes. They want to know what changes in their life, career, or business as a result of working with you, and they want evidence that those changes are real.</p>
      <p>An effective coaching website page should lead with the problem your ideal client is experiencing, transition to the transformation you offer, explain your methodology in enough detail to demonstrate that you have a structured approach rather than just advice, present your packages clearly, and close with client testimonials that describe specific outcomes — not generic praise about your personality or communication style.</p>
      <p>For Nigerian coaches specifically, the Calendly or Paystack integration on a coaching website is particularly important. Friction in the booking process is the enemy of conversion. When a prospective client is ready to take the next step, they should be able to book a discovery call or pay for a session immediately — without needing to email and wait for a reply. The websites that convert best are those where the path from "I want to work with this person" to "I have booked my session" takes less than sixty seconds.</p>

      <h2>SEO for personal brands: ranking for your expertise and niche</h2>
      <p>Search engine optimisation for personal brands requires a different approach from standard business SEO. The goal is not just to rank for service terms — it is to rank for your name, your niche, your speaking topics, and the specific transformation you offer in your coaching practice.</p>
      <p>Person schema markup is one of the most powerful and most underutilised SEO tools available to personal brands. When implemented correctly, it signals to Google that you are a notable person in your field — triggering the conditions for a Google Knowledge Panel that appears in search results when someone searches your name. This significantly increases click-through rates and builds perceived authority in a way that no amount of on-page content alone can achieve.</p>
      <p>For Nigerian personal brands targeting specific niches, high-value keyword categories include: name-based searches ("Dr. Adaeze Obi", your name plus location); niche and service combinations ("executive coach Lagos", "financial wellness speaker Nigeria"); topic-specific searches ("how to build a personal brand Nigeria", "leadership development for Nigerian executives"); and long-tail discovery searches in your area of thought leadership. A content strategy that systematically targets these keyword clusters creates a compound SEO effect — building search visibility that grows month over month regardless of algorithm changes on social platforms.</p>

      <h2>Pricing guide for personal brand website design in Nigeria</h2>
      <p>Personal brand website design in Nigeria varies significantly in cost depending on the complexity of your offer portfolio, the number of pages required, and the integrations needed. As a general guide:</p>
      <ul>
        <li><strong>Essential personal brand site</strong> (homepage, about, speaking or coaching page, basic blog, contact): from ₦450,000. Suitable for an emerging expert establishing their first professional online presence.</li>
        <li><strong>Growth personal brand website</strong> (full authority site with speaking page, coaching pages, media room, course landing pages, email list integration): from ₦900,000. Suitable for an established expert with multiple revenue streams and a growing public profile.</li>
        <li><strong>Enterprise personal brand platform</strong> (full platform with course delivery, community membership, podcast integration, book sales, digital product store): custom-quoted. Suitable for a high-profile thought leader with a complex, multi-channel business.</li>
      </ul>
      <p>The most important factor affecting return on investment for a personal brand website is the quality of the strategic thinking behind the site architecture — the clarity of positioning, the strength of the speaking and coaching page conversion flows, and the depth of the SEO foundation. A website built to rank and convert pays for itself in a single high-value speaking engagement or a handful of coaching clients. The ROI calculation for Nigerian experts is almost always compelling once the website is built correctly.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free personal brand website audit and proposal for your expert business.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most personal brand websites cost you opportunities</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for personal brands</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about personal brand<br><em>website design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every personal brand has different needs, different offer structures, and different audiences. Email us and we will give you a direct, honest answer specific to your situation — no sales pressure, no generic response.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">Can you integrate Calendly directly into my coaching and speaking pages?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Yes — Calendly integration is built directly into your coaching and speaking pages as part of the build, not just a simple embed. For coaching pages, we design a multi-step flow where a visitor reads your methodology, reviews packages, and is then directed to a Calendly booking form for their specific session type. For speaking enquiries, we typically use a custom enquiry form rather than Calendly, so you can capture event details, budget, and audience information before responding. Paystack payment links can also be integrated for session deposits or course purchases.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Should my courses live on my personal brand website or on a platform like Teachable or Selar?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">The ideal answer for most Nigerian personal brands is both — with your personal brand website as the primary sales and marketing channel. Your course landing page lives on your domain, captures leads and builds your email list, and handles the sale. Delivery can happen through Teachable, Selar, or a custom portal depending on your preference and budget. This approach means you own the customer relationship from the first touchpoint, you benefit from SEO on your course landing page, and you reduce dependency on third-party platform algorithms for discoverability.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">How does the website help me build my email list?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">We build dedicated lead magnet landing pages for your free resources — eBooks, checklists, frameworks, mini-courses, or webinar registrations. These pages are SEO-optimised to rank for relevant search terms, and they integrate directly with Mailchimp, ConvertKit, Flodesk, or your preferred email marketing platform. We also add newsletter signup prompts to your blog articles and coaching pages. The goal is to convert website visitors into email subscribers who you can nurture over time — independent of social media algorithms.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do I keep my media room updated as new press features arrive?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">Your media room is built with ACF Pro in WordPress, which means you can add new press mentions, podcast appearances, and media features directly from your WordPress admin without any coding knowledge. We build a simple "Add Media Feature" interface where you input the publication name, feature type (article, podcast, TV, radio, award), date, summary, and external link. New additions appear automatically in the correct category on your media room page. We include a full training session covering this workflow in every project handover.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Can my website embed podcast episodes from my show or guest appearances?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. Your media room can include embedded podcast players for both episodes of your own podcast and guest appearances on other shows. We support Spotify, Apple Podcasts, and Anchor embeds, as well as custom audio player embeds. For personal brands with their own podcast, we can build a full podcast archive section separate from the media room — with individual episode pages that rank for the topic covered in each episode, creating additional SEO entry points for your personal brand website.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Will I appear on Google with a Knowledge Panel if I have a personal brand website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">A Google Knowledge Panel is triggered by a combination of factors including Person schema markup (which we implement on your website), consistent NAP data across the web, Wikipedia presence, and the overall authority of your online footprint. We implement all the technical foundations — Person schema, sameAs links to verified social profiles, and structured data connecting your website to your other authoritative web presences. For most established Nigerian experts with existing media features and social profiles, a knowledge panel typically begins appearing within 3–6 months of launching a properly optimised website.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">How long does it take to build a personal brand website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">A standard personal brand website — homepage, about, speaking page, coaching page, media room, basic blog, and contact — typically takes 3–5 weeks from design approval to launch. Larger platforms with course delivery integration, community membership, podcast archive, and multiple coaching tier pages may take 5–8 weeks. We provide a detailed, milestone-based timeline at the start of every project. The most common cause of delays is slow content delivery from the client — so we provide a structured content collection guide to help you prepare everything efficiently before the build phase begins.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a personal brand website<br>that positions you as the authority?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We will audit your current digital presence, identify your biggest positioning and SEO gaps, and show you exactly what we would build — and why it will attract the right speaking enquiries, coaching clients, and media opportunities.</p>
  <a href="{{ route('site.start', ['services' => 'webdesign', 'source_page' => 'industry-personal-brand-website-design', 'source_label' => 'Personal Brand Industry Page']) }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
