@extends('public.layouts.app')

@section('title', 'Web Design for Gyms & Fitness Studios | Fitness Website Design Nigeria | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/fitness-web-design.css')
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
      <span aria-current="page">Web Design for Gyms & Fitness Studios</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Gym & Fitness Website Design</span>
    <h1>Fitness websites that turn<br>visitors into<br><em>paying members</em></h1>
    <p class="hero-sub">We build energetic, fast, and Google-ranked fitness websites for gyms, studios, and personal trainers across Nigeria and the UK. Turn your website into a 24/7 membership engine — showcasing your facilities, class schedules, and online sign-up to fill your floor with paying members.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Fitness Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Built for gyms &amp; studios — not generic templates</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 9.5c0-1.1 1.1-2 2.5-2h2c1.4 0 2.5.9 2.5 2s-1.1 2-2.5 2h-2c-1.4 0-2.5.9-2.5 2s1.1 2 2.5 2h2c1.4 0 2.5-.9 2.5-2"/><path d="M12 6v12"/></svg></span> Online membership &amp; booking built in</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria &amp; UK specialists</span>
    </div>
  </div>

  <!-- Fitness website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
        <div>
          <div class="float-notif-text">New membership signup · Annual Plan</div>
          <div class="float-notif-sub">Lekki · just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">ironpeakfitness.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">IronPeak <span>Fitness</span></div>
            <div class="msn-links">
              <span class="msn-link">Classes</span>
              <span class="msn-link">Membership</span>
              <span class="msn-link">Trainers</span>
              <span class="msn-link">Gallery</span>
              <span class="msn-link">Schedule</span>
              <span class="msn-cta">Join Now</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Commercial Gym · Lagos, Nigeria</div>
            <div class="msh-h1">Where <span>Champions</span><br>Train in Lagos</div>
            <div class="msh-sub">State-of-the-art equipment, expert trainers, and a community that pushes you further — every single day.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Join Today</span>
              <span class="msh-btn-s">View Classes →</span>
            </div>
          </div>
          <!-- Class Schedule Strip -->
          <div class="mock-site-schedule">
            <div class="msch-label">Today's Classes</div>
            <div class="msch-grid">
              <div class="msch-item"><div class="msch-time">6:00am</div><div class="msch-class">HIIT</div></div>
              <div class="msch-item"><div class="msch-time">8:00am</div><div class="msch-class">Yoga</div></div>
              <div class="msch-item"><div class="msch-time">10:00am</div><div class="msch-class">Boxing</div></div>
              <div class="msch-item"><div class="msch-time">5:00pm</div><div class="msch-class">Spinning</div></div>
            </div>
          </div>
          <!-- Membership Tiers -->
          <div class="mock-site-membership">
            <div class="msm-label">Membership Plans</div>
            <div class="msm-grid">
              <div class="msm-card"><div class="msm-name">Monthly</div><div class="msm-price">₦15,000</div></div>
              <div class="msm-card featured"><div class="msm-name">Quarterly</div><div class="msm-price">₦40,000</div></div>
              <div class="msm-card"><div class="msm-name">Annual</div><div class="msm-price">₦130,000</div></div>
            </div>
          </div>
          <!-- Trust -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">500<span>+</span></div><div class="mst-lbl">Members</div></div>
            <div class="mst-item"><div class="mst-num">15</div><div class="mst-lbl">Trainers</div></div>
            <div class="mst-item"><div class="mst-num">3</div><div class="mst-lbl">Locations</div></div>
            <div class="mst-item"><div class="mst-num">4.9<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "gym Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial Gyms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Boutique Fitness Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Personal Training Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> CrossFit Gyms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Yoga Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Pilates Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Martial Arts Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Boxing Gyms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Dance Fitness Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Online Personal Trainers</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Commercial Gyms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Boutique Fitness Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Personal Training Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> CrossFit Gyms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Yoga Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Pilates Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Martial Arts Schools</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Boxing Gyms</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Dance Fitness Studios</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Online Personal Trainers</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most gym &amp; fitness<br>websites <em>lose members</em></h2>
    </div>
    <p>A potential member searches for a gym in their area and visits three websites before deciding where to sign up. Within seven seconds they have judged your facility's quality, your energy, and whether you are the right fit for their goals. If your website does not convey the right message, they join your competitor. Here is what goes wrong on most fitness websites — and what we fix.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Potential members can't find the gym online</h3>
      <p class="prob-desc">When someone in Lekki searches "gym near me" or "CrossFit Lagos", your facility does not appear. That search goes to a competitor whose website is built for SEO. You are investing in equipment, trainers, and facilities — but none of it matters if new members cannot find you on Google.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every fitness website we build includes a complete local SEO foundation — SportsActivityLocation and LocalBusiness schema, optimised location pages, Google Business Profile integration, and keyword-targeted content for every class type and location you serve.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <h3 class="prob-title">No online membership sign-up — leads drop off</h3>
      <p class="prob-desc">Interested prospects visit your website, see your membership prices, then have to call, WhatsApp, or come in person to sign up. Every step between interest and commitment costs you members. In 2026, people expect to complete membership sign-up entirely online, at midnight, from their phone.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Full online membership sign-up with Paystack integration — choose a plan, pay securely, and get immediate access confirmation. No phone calls, no friction, no lost signups.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Class schedule only on Instagram</h3>
      <p class="prob-desc">Your class timetable lives in Instagram Stories and disappears after 24 hours. Prospective members who visit your website cannot see what classes you offer, when they run, or how to book a spot. This is the single biggest conversion killer for fitness businesses with group classes.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A live, filterable class schedule embedded directly in your website — searchable by class type, trainer, and time. With one-click booking and automated confirmation emails, members can reserve spots without any staff involvement.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg></span>
      <h3 class="prob-title">Website doesn't convey the facility's energy and atmosphere</h3>
      <p class="prob-desc">Generic stock photos and white backgrounds do not communicate the energy, culture, and atmosphere of your gym. Prospective members cannot visualise themselves training there. The emotional pull of a fitness brand — the intensity, the community, the transformation — is being completely lost in a lifeless website.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Bold, high-energy design built around your actual photography and brand colours — with dynamic class grids, transformation galleries, and facilities tours that make visitors feel your gym's energy before they walk through the door.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></span>
      <h3 class="prob-title">No trainer profiles — members don't know who will coach them</h3>
      <p class="prob-desc">Choosing a gym is often really about choosing a trainer. Prospective members want to see who will be coaching them, what their credentials are, and whether their coaching style matches what they are looking for. A website without trainer profiles removes one of the most powerful conversion tools a fitness business has.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Individual trainer profile pages with photos, certifications, specialisms, and class schedules — making each trainer a trust signal that converts browsers into committed members who feel they already know their coach.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <h3 class="prob-title">No transformation stories to inspire sign-ups</h3>
      <p class="prob-desc">Before-and-after results are the most persuasive content a fitness business can publish. People join gyms because they want to change — and seeing that transformation happen to real members who look like them is what closes the decision. Without a transformation gallery, you are leaving your most powerful proof off the table entirely.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A fully managed transformation gallery with before/after sliders, member stories, video testimonials, and consent-managed photo display — turning your members' results into your most effective marketing asset.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your fitness<br>business's website <em>needs</em></h2>
      <p>A high-performing fitness website is not a homepage and a contact form. It is a strategic collection of pages — each designed to speak to a prospective member at a specific point in their decision journey and to rank for the search terms they use when looking for a gym, class, or trainer in your area.</p>
      <p>We map your services, classes, trainers, membership tiers, and locations to a comprehensive page architecture that works for both Google and your potential members — converting browser traffic into signed-up, fee-paying members every single day.</p>
      <ul class="bullets">
        <li>Homepage with membership CTA — credibility, energy, and a clear join path</li>
        <li>Membership plans &amp; online sign-up — with Paystack payment integration</li>
        <li>Class schedule &amp; booking system — live, filterable, bookable online</li>
        <li>Individual class pages — HIIT, Yoga, Boxing, Spinning, CrossFit, and more</li>
        <li>Trainer profiles — with certifications, specialisms, and class timetables</li>
        <li>Transformation gallery — before/after results with member stories</li>
        <li>Facilities tour — photo and video showcase of your equipment and spaces</li>
        <li>Blog — fitness tips, nutrition guides, training programmes, and SEO content</li>
        <li>Contact &amp; locations — with maps, hours, and parking for each site</li>
        <li>Free trial offer page — a dedicated landing page to capture first-time visits</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Website Architecture →</a>
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
        <div class="page-card-head"><span class="pch-name">Class Schedule</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Membership Plans</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Trainer Profiles</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Transformations</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Blog / Fitness Tips</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>fitness businesses</em></h2>
    </div>
    <p>Every fitness website we build is designed around the specific conversion patterns, trust signals, and community dynamics of the fitness industry. These are not generic features — they are fitness-specific elements that have a direct impact on whether a visiting prospect signs up for a membership or books their first class.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <h3 class="svc-title">Online Membership Sign-up (Paystack Integration)</h3>
      <p class="svc-desc">Full end-to-end online membership sign-up — prospective members choose their plan, pay securely via Paystack, and receive an immediate confirmation with access details. Monthly, quarterly, and annual tiers fully configurable. New member data is sent directly to your admin panel and email in real time, with no manual processing required from your team.</p>
      <div class="svc-tags"><span class="svc-tag">Paystack</span><span class="svc-tag">Plan Selection</span><span class="svc-tag">Auto-confirm</span><span class="svc-tag">Member Dashboard</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></div>
      <h3 class="svc-title">Class Schedule &amp; Online Booking</h3>
      <p class="svc-desc">A live, filterable class timetable that lets visitors browse by class type, trainer, day, or time — and book their spot with a single click. Automated confirmation and reminder emails keep no-show rates low. The schedule is fully editable from your admin panel — add, edit, and cancel classes without touching code. Capacity limits and waitlists are built in automatically.</p>
      <div class="svc-tags"><span class="svc-tag">Live Timetable</span><span class="svc-tag">One-click Booking</span><span class="svc-tag">Reminders</span><span class="svc-tag">Waitlists</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4v2"/><circle cx="9.5" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.9"/><path d="M16 3.1a4 4 0 0 1 0 7.8"/></svg></div>
      <h3 class="svc-title">Trainer Profiles &amp; Expertise Pages</h3>
      <p class="svc-desc">Individual trainer profile pages for every coach and instructor — featuring professional photography, certification details, specialisms, class schedule, and a direct booking link. Trainer pages are individually optimised for "personal trainer [area]" searches and create additional SEO entry points for people searching by name or specialism in your local area.</p>
      <div class="svc-tags"><span class="svc-tag">Trainer Bios</span><span class="svc-tag">Certifications</span><span class="svc-tag">Person Schema</span><span class="svc-tag">Class Links</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></div>
      <h3 class="svc-title">Transformation Gallery &amp; Results Showcase</h3>
      <p class="svc-desc">A curated before-and-after gallery with comparison sliders, member success stories, and video testimonials — all managed through a consent-controlled admin system. Real member results are your most persuasive marketing asset. We design the gallery to be visually impactful, inspire confidence, and create an emotional pull that generic competitor websites simply cannot replicate.</p>
      <div class="svc-tags"><span class="svc-tag">Before/After Sliders</span><span class="svc-tag">Video Stories</span><span class="svc-tag">Consent System</span><span class="svc-tag">Member Results</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 9.5c0-1.1 1.1-2 2.5-2h2c1.4 0 2.5.9 2.5 2s-1.1 2-2.5 2h-2c-1.4 0-2.5.9-2.5 2s1.1 2 2.5 2h2c1.4 0 2.5-.9 2.5-2"/><path d="M12 6v12"/></svg></div>
      <h3 class="svc-title">Membership Tier Pages (Monthly / Quarterly / Annual)</h3>
      <p class="svc-desc">Dedicated pages for each membership tier with clear feature comparisons, pricing breakdowns, and direct sign-up flows. We design membership pages to overcome objections, highlight value, and make the most profitable plan visually prominent. Corporate membership pages, student discounts, and free trial offers are all built as separate landing pages for maximum conversion and SEO.</p>
      <div class="svc-tags"><span class="svc-tag">Plan Comparison</span><span class="svc-tag">Free Trial Page</span><span class="svc-tag">Corporate Plans</span><span class="svc-tag">Paystack</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Fitness Keywords (Gym [City], Personal Trainer [Area])</h3>
      <p class="svc-desc">Title tags, meta descriptions, and content optimised for high-intent fitness search terms — "gym Lagos", "personal trainer Lekki", "yoga studio Abuja", "CrossFit gym Victoria Island". SportsActivityLocation and LocalBusiness schema markup for rich Google search results. Every class type and location gets its own optimised landing page to capture local traffic across every geography you serve.</p>
      <div class="svc-tags"><span class="svc-tag">Fitness Keywords</span><span class="svc-tag">Schema Markup</span><span class="svc-tag">Local SEO</span><span class="svc-tag">GSC Setup</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Fitness Businesses</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when members are<br>searching for <em>your gym</em></h2>
      <p>The most valuable moment in your membership acquisition journey is when someone in your area opens Google and types "gym near me" or "personal trainer Lagos". If you are not on page one, you do not exist. Every fitness website we build is engineered from day one to rank for the exact search terms your prospective members use — by class type, location, and fitness specialism.</p>
      <p>We do not just build websites — we build search visibility. Your homepage, each class page, your trainer profiles, and your blog articles are all individually optimised for specific keyword targets. SportsActivityLocation and LocalBusiness schema markup ensures Google understands exactly what you offer, where you are, and who you serve — creating eligibility for rich results and local map pack rankings.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for each class type and fitness programme</li>
        <li>Location pages targeting every area and neighbourhood you serve in Lagos, Abuja, or the UK</li>
        <li>SportsActivityLocation + LocalBusiness JSON-LD schema on every relevant page</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>Citation building across Nigerian fitness directories and business platforms</li>
        <li>Long-tail content strategy targeting low-competition searches with high buying intent</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get a Fitness SEO Strategy →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Fitness Business — Keyword Rankings (before & after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">gym lagos</span>
            <span class="kw-vol">14,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">gym abuja</span>
            <span class="kw-vol">6,800/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">personal trainer lagos</span>
            <span class="kw-vol">4,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">fitness studio lekki</span>
            <span class="kw-vol">2,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">yoga studio lagos</span>
            <span class="kw-vol">3,100/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">crossfit gym nigeria</span>
            <span class="kw-vol">1,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">gym membership lagos</span>
            <span class="kw-vol">3,800/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">fitness centre abuja</span>
            <span class="kw-vol">2,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active fitness business SEO campaign</div>
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
    <p>We have built websites for fitness businesses across Nigeria and the UK. These are the outcomes our clients consistently achieve after launching a new fitness website with us.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="290">0</span><span>%</span></div>
      <div class="trust-label">Average increase in membership enquiries within the first 90 days of a new fitness website launch — driven by local SEO and conversion-optimised landing pages</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="97">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) on our custom-built fitness websites — no page builder bloat, no slow-loading galleries</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="4">0</span><span>×</span></div>
      <div class="trust-label">Increase in online membership sign-ups reported by fitness clients within 6 months of launch — compared to enquiry-only contact forms on their previous sites</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched fitness website — with a guaranteed, milestone-based delivery timeline agreed upfront</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Business websites delivered across Nigeria, the UK, the US, and Canada — all built on custom code, never page builders or templates</div>
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
    <p>We have delivered websites for fitness businesses across Nigeria and the UK. This process has been refined to eliminate the delays, miscommunications, and scope disagreements that make most agency relationships frustrating — and get your membership engine live as quickly as possible.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery &amp; Facility Audit</div>
      <p class="proc-desc">A structured discovery session covering your gym or studio's services, class types, membership tiers, trainer team, target member profile, competitive landscape, and growth goals. We audit your current online presence — Google Business Profile, existing site, social channels — and map your complete site architecture, keyword targets, and content strategy in a signed brief before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design (High-Energy Fitness Aesthetics)</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — built around your brand colours, photography, and the high-energy visual language that fitness brands demand. We design your membership pages, class schedule layout, trainer profile grid, transformation gallery, and conversion elements as a coherent visual system. Two revision rounds are included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build (Membership System + Class Booking)</div>
      <p class="proc-desc">Your website is built on a custom WordPress theme — no Elementor, no page builders. The membership sign-up flow is integrated with Paystack for secure payments. The class schedule system is built with live timetable display, bookable slots, capacity limits, waitlists, and automated email confirmations. ACF Pro powers all editable content. A staging environment is accessible throughout the build.</p>
      <div class="proc-tags"><span class="proc-tag">Custom Theme</span><span class="proc-tag">Paystack Integration</span><span class="proc-tag">Booking System</span><span class="proc-tag">Staging Access</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO &amp; Content</div>
      <p class="proc-desc">Your content is entered across all pages, formatted correctly, and optimised for search — title tags, meta descriptions, heading hierarchy, SportsActivityLocation and LocalBusiness schema markup, canonical URLs, XML sitemap, and Google Search Console submission. Each class page, trainer profile, and location page is individually targeted at specific high-intent search terms. GA4 goals and conversion tracking are configured before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Setup</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA &amp; Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 90+), payment flow testing, booking system verification, form testing, and a final review call before launch day. Your domain is transferred to the new site, SSL is verified, and Cloudflare is configured. You receive a 45-minute CMS training session, a written admin guide covering all content management workflows, and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Payment Testing</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO &amp; Maintenance Retainer</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your site ranking and running — publishing fitness tips, nutrition guides, and training content; building local citations and backlinks; monitoring Core Web Vitals; updating WordPress and plugins; running daily backups; and delivering monthly keyword ranking reports. Most fitness clients see their strongest membership growth in months 4–12 as SEO competes.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Content Creation</span><span class="proc-tag">Security Updates</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Fitness websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — specifically for the gym or studio's class offering, membership structure, and target member base.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#111827 0%,#1f2937 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">IronPeak Fitness</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:#ea580c;margin-bottom:.8rem">Commercial Gym · Lekki</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(234,88,12,.12);color:#ea580c;font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Membership</span>
              <span style="background:rgba(234,88,12,.12);color:#ea580c;font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Booking</span>
              <span style="background:rgba(234,88,12,.12);color:#ea580c;font-size:.48rem;padding:.15rem .4rem;border-radius:2px">SEO</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Commercial Gym</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Commercial Gym · Lekki, Lagos</div>
        <div class="port-title">IronPeak Fitness</div>
        <p class="port-desc">Full membership website with Paystack sign-up, live class booking, trainer profiles, transformation gallery, and an SEO campaign that reached page one for "gym Lekki" within 60 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a2e1a 0%,#2d4a2d 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Zen Flow Studio</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:#ea580c;margin-bottom:.8rem">Yoga & Pilates · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(234,88,12,.12);color:#ea580c;font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Yoga</span>
              <span style="background:rgba(234,88,12,.12);color:#ea580c;font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Pilates</span>
              <span style="background:rgba(234,88,12,.12);color:#ea580c;font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Retreats</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Yoga & Pilates Studio</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Yoga &amp; Pilates Studio · Abuja, Nigeria</div>
        <div class="port-title">Zen Flow Studio</div>
        <p class="port-desc">Serene, high-converting studio website with online class booking, membership tiers, instructor profiles, and a retreat booking system — ranking top 3 for "yoga studio Abuja" within 90 days.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1215 0%,#2d1a20 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Champion Boxing Academy</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:#ea580c;margin-bottom:.8rem">Martial Arts & Boxing · London+Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(234,88,12,.12);color:#ea580c;font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Boxing</span>
              <span style="background:rgba(234,88,12,.12);color:#ea580c;font-size:.48rem;padding:.15rem .4rem;border-radius:2px">MMA</span>
              <span style="background:rgba(234,88,12,.12);color:#ea580c;font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Youth</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Martial Arts &amp; Boxing</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Martial Arts &amp; Boxing · London &amp; Lagos</div>
        <div class="port-title">Champion Boxing Academy</div>
        <p class="port-desc">Dual-market boxing and martial arts website with class schedules, membership sign-up, youth programme pages, and coach profiles — serving both London and Lagos audiences from a single WordPress platform.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every size of <em>fitness business</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Solo Trainers &amp; Small Studios</div>
        <div class="price-name">Essential Site</div>
        <p class="price-tagline">A clean, high-energy website for a personal trainer or boutique studio that needs a strong online presence fast.</p>
        <div class="price-amount">₦380k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Homepage with membership CTA</div>
        <div class="price-feat">Membership &amp; pricing pages</div>
        <div class="price-feat">Class schedule (static)</div>
        <div class="price-feat">Enquiry &amp; contact forms</div>
        <div class="price-feat">Photo gallery</div>
        <div class="price-feat">Full SEO foundation</div>
        <div class="price-feat">Mobile-responsive design</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Online Paystack sign-up</div>
        <div class="price-feat no">Live booking system</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Website</div>
        <p class="price-tagline">A full-service fitness website built to convert visitors, grow membership, and dominate local search results.</p>
        <div class="price-amount">₦780k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Online membership sign-up (Paystack)</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Live class booking system</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Trainer profile pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Transformation gallery</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Blog &amp; fitness content CMS</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + schema markup</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Google Analytics 4 &amp; GSC</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">CMS training session</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Multi-Location Gyms &amp; Chains</div>
        <div class="price-name">Enterprise Gym</div>
        <p class="price-tagline">A comprehensive fitness platform for gym groups with multiple locations, loyalty systems, and e-commerce.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Multi-location management system</div>
        <div class="price-feat">Member loyalty &amp; points system</div>
        <div class="price-feat">Online PT session booking</div>
        <div class="price-feat">E-commerce (supplements, gear)</div>
        <div class="price-feat">Member portal &amp; attendance tracking</div>
        <div class="price-feat">Corporate membership management</div>
        <div class="price-feat">Full analytics dashboard</div>
        <div class="price-feat">90-day support &amp; SLA</div>
        <div class="price-feat">Ongoing SEO retainer available</div>
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
    <p>Not all web development options are equal — especially for fitness businesses where a slow or generic website directly costs you membership sign-ups every single day.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for fitness businesses">
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
        <td class="feature">Built specifically for gyms &amp; fitness studios</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Fitness-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Online membership sign-up with Paystack</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Limited payment options</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full Paystack integration</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely implemented</span></td>
      </tr>
      <tr>
        <td class="feature">Live class booking system</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Third-party app required</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Built-in &amp; custom</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Usually a plugin</span></td>
      </tr>
      <tr>
        <td class="feature">Trainer profiles with SEO</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Basic profiles only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full profiles + schema</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely with schema</span></td>
      </tr>
      <tr>
        <td class="feature">Transformation gallery (consent-managed)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically built</span></td>
      </tr>
      <tr>
        <td class="feature">SportsActivityLocation schema markup</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Multi-location gym management</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Limited</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full multi-location</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Complex to implement</span></td>
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
  <h2 class="s-head" id="test-heading">What fitness businesses say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before the new website, people found us through referrals or Instagram — and joining meant calling us or visiting in person. Within two months of the new site going live, we were getting 15 to 20 online sign-ups a week from people who had never heard of us before. The Paystack integration is seamless and our front desk team are no longer processing memberships manually."</p>
      <div class="test-author">
        <div class="test-avatar">K</div>
        <div><div class="test-name">Kola Adewale</div><div class="test-role">Founder · IronPeak Fitness, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The class booking system alone has transformed how we operate. Our instructors check their class rosters from their phones, members get automatic reminders, and the studio is consistently full. I was nervous about the investment but we recovered the cost within six weeks from additional bookings that simply would not have happened without the website."</p>
      <div class="test-author">
        <div class="test-avatar">S</div>
        <div><div class="test-name">Sade Okonkwo</div><div class="test-role">Studio Director · Zen Flow Studio, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"As a head trainer, having my own profile page with my certifications and class schedule has made a genuine difference. New members tell me they chose the academy specifically because they read my profile and liked my coaching background. The transformation gallery has also been incredible — seeing real results from our members is what convinces people to commit."</p>
      <div class="test-author">
        <div class="test-avatar">E</div>
        <div><div class="test-name">Emeka Obi</div><div class="test-role">Head Trainer · Champion Boxing Academy, Lagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free gym website audit — see what's<br>stopping members from joining online</h2>
    <p>We will review your current site, identify every barrier between a visitor and a membership sign-up, and show you exactly what a new website would fix — no commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>fitness website design</em></h2>
    </div>
    <p>A comprehensive guide to building a gym or fitness studio website that converts visitors into paying members, ranks on Google, and grows your business automatically — written for Nigerian fitness businesses in 2026.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for gyms and fitness studios">

      <h2>Why Nigerian gyms need professional websites in 2026</h2>
      <p>The Nigerian fitness industry has grown significantly over the past five years. Lagos, Abuja, and Port Harcourt now host hundreds of gyms, studios, and personal training services competing for the same pool of health-conscious Nigerians — a pool that is rapidly expanding as awareness of lifestyle-related health conditions and the economic benefits of fitness grows among the urban professional class.</p>
      <p>In this environment, a professional website is no longer a nice-to-have. It is the primary tool by which prospective members discover, evaluate, and decide to join a gym. A Lagos professional looking for a gym in their area will open Google, read three or four websites, check the class schedules, compare the membership prices, and make a decision — all before speaking to a single person. If your website is not in that consideration set, or if it fails to communicate your gym's value when it gets there, you lose that member to a competitor.</p>
      <p>The fitness businesses that are growing fastest in Nigeria in 2026 are not necessarily the ones with the best equipment or the most experienced trainers. They are the ones with websites that find new members on Google, make the sign-up process frictionless, and communicate the energy and community of their facility online. A strong website is now a competitive advantage that compounds over time.</p>

      <h2>The Instagram problem for fitness businesses</h2>
      <p>Most Nigerian gyms and studios have learned to use Instagram effectively for content — workout videos, transformation posts, class highlights, and motivational content. Instagram builds brand awareness and keeps existing members engaged. But Instagram has a fundamental limitation as a business tool: <strong>it does not capture people who are actively searching for a gym to join.</strong></p>
      <p>Someone searching "gym Victoria Island" or "yoga classes Lagos" on Google is at a completely different stage of the buying journey than someone scrolling their feed. They have already decided they want a gym. They are evaluating options. They are ready to commit. If your business is only discoverable through Instagram, you are invisible to the highest-intent prospects in your market — the people most likely to sign up today.</p>
      <p>A professionally built fitness website solves this by making you findable on Google at exactly the moment a prospective member is looking. It captures the high-intent traffic that Instagram cannot reach, converts that traffic into sign-ups with a streamlined membership process, and builds a permanent, growing asset for your business — rather than content that disappears from feeds in 24 hours.</p>

      <h2>Online membership sign-up: removing friction to join</h2>
      <p>The single biggest conversion improvement a fitness website can make is enabling complete online membership sign-up. Every step between a prospective member's decision to join and their actual membership reduces the number of people who complete the process. Requiring a phone call, a WhatsApp message, or an in-person visit to the gym to join is — in 2026 — an unnecessary barrier that is costing fitness businesses memberships every single day.</p>
      <p>When a prospect visits your website at 10pm after a long day and decides they want to start training, they should be able to choose a plan, pay securely via Paystack, and receive a confirmation with their access details — all in under three minutes, without speaking to anyone. This is what the best-performing fitness websites in Nigeria do. The gyms and studios that have implemented online sign-up consistently report a dramatic increase in the number of memberships sold — simply because removing the friction makes it easier for interested people to commit.</p>
      <p>Paystack integration is the standard for Nigerian fitness websites because it supports card payments, bank transfers, and USSD — covering the full range of payment preferences across the market. A well-built membership flow with Paystack also provides your team with real-time notifications, automated receipts, and a clean admin dashboard for managing active memberships without manual data entry.</p>

      <h2>Class scheduling as both a conversion tool and an SEO asset</h2>
      <p>A live, filterable class schedule on your website serves two distinct but equally important functions. The first is conversion: prospective members who can see your full schedule, understand what each class involves, and book a spot online are far more likely to actually show up and commit to a membership. A schedule that lives only on Instagram Stories disappears after 24 hours and is invisible to anyone who is not already following you.</p>
      <p>The second function is SEO. Individual class pages — HIIT Lagos, Yoga classes Lekki, CrossFit Abuja, Spinning Victoria Island — each represent a distinct keyword opportunity. People do not just search for "gym Lagos" — they search for the specific type of training they want. A website with dedicated pages for each class type you offer captures a much broader range of search traffic than a homepage alone, and each of those pages can be individually optimised for the specific search terms people use when looking for that type of class in your area.</p>

      <h2>Trainer profiles and the trust factor</h2>
      <p>Choosing a gym is, for many people, really about choosing a coach. The decision to join is often less about the equipment or the location and more about whether a particular trainer's style, credentials, and personality feel like the right fit. A website without trainer profiles removes one of the most powerful conversion tools a fitness business has.</p>
      <p>Individual trainer profile pages — with professional photography, certification details, coaching specialisms, a summary of their approach, and links to the classes they teach — make each trainer a trust signal. Prospective members who read a trainer's profile and feel a connection are far more likely to book a class or sign up for a membership. These pages also create additional SEO opportunities, as trainer names and specialisms create additional search entry points.</p>

      <h2>Pricing guide for fitness websites in Nigeria</h2>
      <p>As a general guide for the Nigerian market in 2026:</p>
      <ul>
        <li><strong>Essential fitness site</strong> (homepage, membership pages, class schedule, gallery, contact, SEO): ₦380,000–₦550,000</li>
        <li><strong>Growth website</strong> (all of the above plus Paystack sign-up, live booking system, trainer profiles, transformation gallery, blog): ₦780,000–₦1.3M</li>
        <li><strong>Enterprise gym platform</strong> (multi-location management, loyalty system, e-commerce, member portal, corporate memberships): ₦1.5M+</li>
      </ul>
      <p>The key factor in ROI is not the upfront cost — it is the quality of the membership conversion flow. A fitness website that converts 5% more visitors into paying members pays for itself many times over in the first year. Every month of additional members joining online compounds the return on your initial investment.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free website audit and proposal for your gym or fitness studio.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why fitness websites lose members</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">SEO for fitness businesses</a></li>
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
  <h2 class="s-head" id="faq-heading">Questions about gym &amp;<br>fitness <em>website design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every fitness business has different needs. Email us and we will give you a direct, honest answer specific to your gym or studio — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">What payment options can the membership sign-up support?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">We integrate Paystack as the payment gateway for Nigerian fitness websites, which supports card payments (Visa, Mastercard, Verve), bank transfers, USSD, and Pay with Bank. This covers the full range of payment preferences across the Nigerian market. Members can choose their plan, pay securely in under two minutes, and receive an automatic confirmation email with their membership details. Recurring billing for monthly memberships can also be configured through Paystack's subscription API.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can the class booking system handle capacity limits and waitlists?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes — capacity management is built into the booking system as standard. Each class has a configurable maximum capacity. When a class is full, the system automatically moves to a waitlist and notifies waitlisted members if a spot becomes available. Automated reminder emails are sent 24 hours and 1 hour before each class. You can also set cancellation windows — for example, requiring 2 hours notice to cancel — and configure penalty policies for late cancellations.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Can the website manage multiple gym locations?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Yes. Multi-location gym management is available on our Enterprise tier. Each location has its own schedule, trainer team, membership availability, and location-specific SEO page. A centralised admin panel manages all locations from a single dashboard. Members can filter the class schedule by location, and membership plans can be configured to cover a single location or all locations. This is particularly useful for gym chains expanding across Lagos or operating across multiple Nigerian cities.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do you handle consent for the transformation gallery?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">The transformation gallery is built with a consent management system from the outset. Before any member's before-and-after photos or video testimonials are published, a digital consent form is sent to and signed by that member — specifying exactly what content will be used, where it will appear, and confirming their permission. All signed consent records are stored in your admin panel. Members can request removal of their content at any time, and the system makes this straightforward to process without any technical intervention.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Do you set up Google My Business for the gym?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes — Google Business Profile (formerly Google My Business) optimisation is included with every fitness website we build. This covers profile completion (category, hours, services, photos), schema markup integration between your website and your Google listing, and initial setup of review generation. A well-optimised Google Business Profile is essential for appearing in the local map pack when someone searches "gym near me" or "gym [your area]" — which is often where your most high-intent local traffic comes from.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How long does a fitness website take to build?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">A standard fitness website with membership sign-up, class booking, trainer profiles, and a transformation gallery typically takes 3–5 weeks from design approval to launch. Larger builds with multiple locations, a loyalty system, or e-commerce functionality may take 6–8 weeks. We provide a detailed, milestone-based timeline at the start of every project — with a staging environment accessible throughout the build so you can review progress at every stage before launch day.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can my gym staff update the class schedule without technical help?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes — this is a core design principle of every fitness website we build. The class schedule, trainer profiles, membership pricing, gallery, and blog are all editable through a simple admin interface that requires no technical knowledge. Your reception team or studio manager can add new classes, update trainer availability, change membership prices, and publish new content entirely on their own. Every handover includes a CMS training session and a written admin guide covering every workflow your team will regularly need.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a fitness website<br>that fills your gym with members?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We will audit your current site, map your keyword opportunities, and show you exactly what we would build — and why it will grow your member base.</p>
  <a href="{{ route('site.start', ['services' => 'webdesign', 'source_page' => 'industry-fitness-website-design', 'source_label' => 'Fitness Industry Page']) }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
