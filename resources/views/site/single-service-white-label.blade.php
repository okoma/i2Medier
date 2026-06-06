@extends('public.layouts.app')

@section('title', 'White Label Digital Services | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/white-label.css')
@endpush

@section('content')
<div class="wl-page">
  <header class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-left">
      <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
        <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
        <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
        <span aria-current="page">White Label Services</span>
      </div>
      <span class="hero-tag"><span class="hero-dot"></span> White Label Services</span>
      <h1>Your agency's output,<br>delivered under<br><em>your brand.</em></h1>
      <p class="hero-sub">We build, design, and deliver digital work on behalf of agencies and consultancies — under your name, to your standards, with full NDA protection. Your clients never know we exist. Your team never gets stretched beyond capacity.</p>
      <div class="hero-btns">
        <a href="#contact" class="btn-white">Start a White Label Project</a>
        <a href="#what-we-deliver" class="btn-ghost">What We Deliver</a>
      </div>
      <div class="hero-tags-row">
        <span class="hero-badge"><span class="hero-badge-dot"></span> NDA on Every Project</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Your Branding Only</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Agency-Ready Comms</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> No i2Medier Footprint</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Scalable Capacity</span>
      </div>
    </div>

    <div class="hero-right">
      <div class="wl-visual-wrap">
        <div class="floating-badge nda"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg> NDA Protected</div>
        <div class="brief-card">
          <div class="bc-titlebar">
            <div class="bc-dot" style="background:#ff5f57"></div>
            <div class="bc-dot" style="background:#febc2e"></div>
            <div class="bc-dot" style="background:#28c840"></div>
            <div class="bc-filename">client-deliverable.pdf</div>
          </div>
          <div class="bc-body">
            <div class="bc-agency-brand">
              <div class="bc-logo-placeholder">
                <div class="bc-logo-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2L2 7l10 5 10-5-10-5Z"></path><path d="m2 17 10 5 10-5"></path><path d="m2 12 10 5 10-5"></path></svg></div>
                <div>
                  <div class="bc-logo-name">Apex Digital Agency</div>
                  <div class="bc-logo-sub">apex-digital.co</div>
                </div>
              </div>
            </div>
            <div class="bc-divider"></div>
            <div class="bc-title-block">
              <div class="bc-doc-label">PROJECT DELIVERABLE</div>
              <div class="bc-doc-title">E-Commerce Platform<br>Development</div>
            </div>
            <div class="bc-meta-row">
              <div class="bc-meta-item"><div class="bc-meta-label">Client</div><div class="bc-meta-val">TechVentures Ltd.</div></div>
              <div class="bc-meta-item"><div class="bc-meta-label">Prepared by</div><div class="bc-meta-val">Apex Digital Agency</div></div>
            </div>
            <div class="bc-stack-row">
              <span class="bc-stack-tag">Laravel</span>
              <span class="bc-stack-tag">Vue.js</span>
              <span class="bc-stack-tag">Stripe</span>
              <span class="bc-stack-tag">AWS</span>
            </div>
            <div class="bc-footer">
              <div class="bc-footer-line"></div>
              <div class="bc-footer-text">Confidential — Apex Digital Agency © 2026</div>
            </div>
          </div>
        </div>
        <div class="floating-tag built-by"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg> Built by i2Medier · invisible to your client</div>
      </div>
    </div>
  </header>

  <div class="intro-band" role="complementary">
    <div class="intro-grid">
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="60">0</span><span>+</span></div><div class="intro-label">Agency Partners Served</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="200">0</span><span>+</span></div><div class="intro-label">White Label Projects Delivered</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span style="color:var(--gold)">100</span><span>%</span></div><div class="intro-label">NDA Compliance Record</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span style="color:var(--gold)">7</span><span style="font-size:1.1rem"> services</span></div><div class="intro-label">Available as White Label</div></div>
    </div>
  </div>

  <section class="deliver-section" id="what-we-deliver" aria-labelledby="deliver-heading">
    <div class="deliver-intro">
      <div><span class="s-label">What We Deliver</span><h2 class="s-head" id="deliver-heading">Every service your agency<br>needs, <em>white labelled</em></h2></div>
      <p class="s-sub">We cover the full range of digital work your clients demand. Whether you need a single project delivered or ongoing capacity across multiple service lines, every output comes branded to your agency with no trace of our involvement.</p>
    </div>
    <div class="deliver-grid">
      <div class="deliver-card reveal">
        <div class="dc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div>
        <h3 class="dc-title">Website Design & Development</h3>
        <p class="dc-desc">Marketing websites, landing pages, and conversion-focused web experiences delivered under your agency's name. We match your preferred stack and handoff format — Figma files, WordPress, Laravel, or static HTML.</p>
        <div class="dc-tags"><span class="dc-tag">HTML/CSS</span><span class="dc-tag">WordPress</span><span class="dc-tag">Laravel</span><span class="dc-tag">React</span><span class="dc-tag">Figma Handoff</span></div>
      </div>
      <div class="deliver-card reveal">
        <div class="dc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></div>
        <h3 class="dc-title">WordPress Development</h3>
        <p class="dc-desc">Custom themes, plugin development, WooCommerce builds, and full WordPress projects completed to specification. Delivered as clean, documented codebases ready for you to present or hand over under your brand.</p>
        <div class="dc-tags"><span class="dc-tag">Custom Themes</span><span class="dc-tag">WooCommerce</span><span class="dc-tag">ACF</span><span class="dc-tag">Custom Plugins</span><span class="dc-tag">Elementor</span></div>
      </div>
      <div class="deliver-card reveal">
        <div class="dc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5"></path><path d="M20 19V9"></path><path d="M4 19h16"></path><path d="M8 19V11"></path><path d="M12 19V7"></path><path d="M16 19v-5"></path></svg></div>
        <h3 class="dc-title">Laravel & Custom Development</h3>
        <p class="dc-desc">SaaS platforms, admin systems, APIs, and custom web applications built in Laravel or your preferred backend stack. We handle architecture, development, testing, and deployment documentation — all under your brief.</p>
        <div class="dc-tags"><span class="dc-tag">Laravel</span><span class="dc-tag">REST APIs</span><span class="dc-tag">SaaS Platforms</span><span class="dc-tag">Admin Panels</span><span class="dc-tag">Queues & Jobs</span></div>
      </div>
      <div class="deliver-card reveal">
        <div class="dc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h9"></path><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg></div>
        <h3 class="dc-title">UI/UX Design</h3>
        <p class="dc-desc">User research, wireframes, high-fidelity prototypes, and design systems delivered as Figma files with your agency's file naming and handoff conventions. The design work is indistinguishable from your own output.</p>
        <div class="dc-tags"><span class="dc-tag">Figma</span><span class="dc-tag">Wireframes</span><span class="dc-tag">Prototypes</span><span class="dc-tag">Design Systems</span><span class="dc-tag">Component Libraries</span></div>
      </div>
      <div class="deliver-card reveal">
        <div class="dc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2" width="10" height="20" rx="2"></rect><line x1="11" y1="18" x2="13" y2="18"></line></svg></div>
        <h3 class="dc-title">Mobile App Development</h3>
        <p class="dc-desc">Cross-platform mobile apps for iOS and Android built in React Native or Flutter. App Store and Google Play submission support included. Codebase, documentation, and assets delivered under your agency's project structure.</p>
        <div class="dc-tags"><span class="dc-tag">React Native</span><span class="dc-tag">Flutter</span><span class="dc-tag">iOS & Android</span><span class="dc-tag">App Store Ready</span><span class="dc-tag">Firebase</span></div>
      </div>
      <div class="deliver-card reveal">
        <div class="dc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></div>
        <h3 class="dc-title">SEO Services</h3>
        <p class="dc-desc">Technical SEO audits, on-page optimisation, schema markup, Core Web Vitals work, and monthly reporting — all formatted to your agency's report templates and delivered under your name to your clients.</p>
        <div class="dc-tags"><span class="dc-tag">Technical SEO</span><span class="dc-tag">Content Strategy</span><span class="dc-tag">Core Web Vitals</span><span class="dc-tag">Schema Markup</span><span class="dc-tag">Monthly Reports</span></div>
      </div>
      <div class="deliver-card reveal">
        <div class="dc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="m9 12 2 2 4-4"></path></svg></div>
        <h3 class="dc-title">Website Maintenance & Support</h3>
        <p class="dc-desc">Ongoing updates, security scans, backups, performance monitoring, and emergency fixes delivered as a white label care plan. Your clients see your agency as the provider. We handle the actual work behind the scenes.</p>
        <div class="dc-tags"><span class="dc-tag">Updates & Patches</span><span class="dc-tag">Security Scans</span><span class="dc-tag">Uptime Monitoring</span><span class="dc-tag">Backups</span><span class="dc-tag">Emergency Fixes</span></div>
      </div>
    </div>
  </section>

  <section class="why-section" aria-labelledby="why-heading">
    <div class="why-layout">
      <div class="why-copy">
        <span class="s-label">Why Agencies Partner With Us</span>
        <h2 class="s-head" id="why-heading">Expand your agency's capacity<br>without <em>hiring or overhead</em></h2>
        <p>Winning new clients is hard enough. Losing them because your team is stretched, a specialist skill is missing, or a deadline is too tight is worse. White label partnerships give you access to a full delivery team without the cost or commitment of growing headcount.</p>
        <p>We understand agency timelines, client expectations, and the importance of consistent quality across every deliverable. Our work fits seamlessly into your existing process — whether you brief us via Notion, Slack, email, or your project management tool of choice.</p>
        <div class="highlight-box">
          <h4>We are your <span class="hb-gold">invisible production partner</span></h4>
          <p>No i2Medier branding appears on deliverables, documentation, code comments, Figma file metadata, or any client-facing output. We operate as your extended team, not as a visible supplier. Every project begins with a signed NDA, and our communication style adapts to match your agency's tone.</p>
        </div>
        <p>The result: you take on more work, deliver better outcomes, and protect your client relationships — while we handle the execution.</p>
      </div>
      <div class="why-cards">
        <div class="wcard reveal">
          <div class="wc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="11" width="16" height="9" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></svg></div>
          <h4 class="wc-title">NDA on Every Engagement</h4>
          <p class="wc-desc">We sign a non-disclosure agreement before any project brief is shared. Your client names, project details, and IP are protected from day one.</p>
        </div>
        <div class="wcard reveal">
          <div class="wc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></div>
          <h4 class="wc-title">Zero i2Medier Footprint</h4>
          <p class="wc-desc">No branding, no watermarks, no code comments, no metadata. What we produce is yours, completely and invisibly.</p>
        </div>
        <div class="wcard reveal">
          <div class="wc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg></div>
          <h4 class="wc-title">Scales With Your Pipeline</h4>
          <p class="wc-desc">One project or ten running simultaneously. We scale to match your sales cycle without you managing recruitment cycles.</p>
        </div>
        <div class="wcard reveal">
          <div class="wc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></div>
          <h4 class="wc-title">Consistent Quality Standards</h4>
          <p class="wc-desc">Clean code, documented deliverables, and work that holds up to your review before it goes anywhere near your client.</p>
        </div>
        <div class="wcard reveal">
          <div class="wc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></div>
          <h4 class="wc-title">Fits Your Workflow</h4>
          <p class="wc-desc">We adapt to your project management tool, file naming conventions, brief format, and communication cadence — not the other way around.</p>
        </div>
        <div class="wcard reveal">
          <div class="wc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></div>
          <h4 class="wc-title">Agency-Pace Turnaround</h4>
          <p class="wc-desc">We operate on agency timelines. If your client brief has a tight window, we work within it — not against it.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="process-section" aria-labelledby="process-heading">
    <div class="process-header">
      <div><span class="s-label" style="color:var(--gold)">How It Works</span><h2 class="s-head" id="process-heading" style="color:var(--white)">From your brief to<br>a <em>client-ready deliverable</em></h2></div>
      <p>We've built the onboarding and delivery process specifically for agencies. No lengthy setup, no learning curve on your end. Once we're aligned, work flows just like it would with an internal team member.</p>
    </div>
    <div class="process-steps">
      <div class="ps-item reveal"><div class="ps-num">01</div><div class="ps-body"><h3 class="ps-title">Agency Onboarding & NDA</h3><p class="ps-desc">We begin every partnership with a short onboarding session to understand your agency's standards, preferred tools, file conventions, and communication style — and we sign an NDA before any brief is exchanged.</p><div class="ps-deliverables"><span class="ps-del">Signed NDA</span><span class="ps-del">Workflow Alignment</span><span class="ps-del">Tool & Format Preferences</span><span class="ps-del">Rate & Scope Agreement</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">02</div><div class="ps-body"><h3 class="ps-title">Project Brief Intake</h3><p class="ps-desc">You share the brief via your preferred channel — a Notion doc, a detailed email, a Figma file, or a call. We ask the right clarifying questions upfront so the execution doesn't stall mid-project on ambiguity.</p><div class="ps-deliverables"><span class="ps-del">Brief Review</span><span class="ps-del">Scope Confirmation</span><span class="ps-del">Timeline Agreed</span><span class="ps-del">Questions Resolved</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">03</div><div class="ps-body"><h3 class="ps-title">Design or Development Execution</h3><p class="ps-desc">We execute the work to your specification — design, build, or both. Regular check-ins at agreed milestones give you visibility without disruption. All interim files are labelled under your agency's naming conventions.</p><div class="ps-deliverables"><span class="ps-del">Your Brand on All Files</span><span class="ps-del">Milestone Checkpoints</span><span class="ps-del">No i2Medier Labelling</span><span class="ps-del">Revisions Included</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">04</div><div class="ps-body"><h3 class="ps-title">Your Agency Review</h3><p class="ps-desc">Before any deliverable leaves our hands, you review it. We apply your feedback, make adjustments, and return a version that is ready to put in front of your client under your name — without any further editing needed on your end.</p><div class="ps-deliverables"><span class="ps-del">Draft Submitted to You</span><span class="ps-del">Feedback Round</span><span class="ps-del">Final Version Prepared</span><span class="ps-del">Your Sign-Off</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">05</div><div class="ps-body"><h3 class="ps-title">Delivery in Your Format</h3><p class="ps-desc">Final files are packaged in whatever format you need — Figma file, Git repository, ZIP, staging link, PDF document — all labelled with your agency's name. You deliver to your client. We remain invisible.</p><div class="ps-deliverables"><span class="ps-del">Your-Branded Output</span><span class="ps-del">Format of Your Choice</span><span class="ps-del">Handover Documentation</span><span class="ps-del">Post-Delivery Support</span></div></div></div>
    </div>
  </section>

  <section class="engagement-section" aria-labelledby="engagement-heading">
    <div class="engagement-intro">
      <div><span class="s-label">Engagement Models</span><h2 class="s-head" id="engagement-heading">Work with us the way<br><em>your agency works</em></h2></div>
      <p class="s-sub">Not every agency has the same capacity model. We offer three ways to engage depending on how predictable your pipeline is and how much flexibility you need month to month.</p>
    </div>
    <div class="engage-grid">
      <div class="engage-card reveal">
        <div class="ec-head">
          <span class="ec-badge">Flexible</span>
          <div class="ec-name">Project-Based</div>
          <div class="ec-tagline">Perfect for agencies who want to partner on specific projects without a recurring commitment.</div>
          <div class="ec-price">Quoted per project</div>
        </div>
        <div class="ec-body">
          <div class="ec-feat">Scoped and priced per brief</div>
          <div class="ec-feat">Signed NDA per project</div>
          <div class="ec-feat">Any service line available</div>
          <div class="ec-feat">No minimum volume</div>
          <div class="ec-feat">Turnaround agreed upfront</div>
          <div class="ec-feat">Ideal for overflow or specialist work</div>
        </div>
        <div class="ec-foot"><a href="#contact" class="ec-btn outline">Send a Brief</a></div>
      </div>
      <div class="engage-card featured reveal">
        <div class="ec-head">
          <span class="ec-badge">Best for Ongoing Partners</span>
          <div class="ec-name">Monthly Retainer</div>
          <div class="ec-tagline">A set number of hours per month across any service mix — locked in, predictable, and prioritised ahead of project-based work.</div>
          <div class="ec-price">From ₦250,000 <sub>/month</sub></div>
        </div>
        <div class="ec-body" style="background:#1a1a1a">
          <div class="ec-feat" style="color:rgba(255,255,255,.6)">Dedicated monthly hours block</div>
          <div class="ec-feat" style="color:rgba(255,255,255,.6)">Priority scheduling over project work</div>
          <div class="ec-feat" style="color:rgba(255,255,255,.6)">All service lines included</div>
          <div class="ec-feat" style="color:rgba(255,255,255,.6)">Signed NDA + partnership agreement</div>
          <div class="ec-feat" style="color:rgba(255,255,255,.6)">Monthly rollover on unused hours</div>
          <div class="ec-feat" style="color:rgba(255,255,255,.6)">Dedicated point of contact</div>
          <div class="ec-feat" style="color:rgba(255,255,255,.6)">Quarterly scope reviews</div>
        </div>
        <div class="ec-foot" style="background:#1a1a1a;padding-bottom:1.6rem"><a href="#contact" class="ec-btn gold">Discuss a Retainer →</a></div>
      </div>
      <div class="engage-card reveal">
        <div class="ec-head">
          <span class="ec-badge">High-Volume Agencies</span>
          <div class="ec-name">Dedicated Team</div>
          <div class="ec-tagline">A named team embedded in your operations for agencies with consistent, high-volume delivery needs across multiple active clients.</div>
          <div class="ec-price">Custom <sub>scoped per team size</sub></div>
        </div>
        <div class="ec-body">
          <div class="ec-feat">Named team members assigned to you</div>
          <div class="ec-feat">Full-time or part-time capacity blocks</div>
          <div class="ec-feat">Embedded in your tools & Slack</div>
          <div class="ec-feat">Your internal standards applied</div>
          <div class="ec-feat">Flexible team composition</div>
          <div class="ec-feat">Direct communication channel</div>
        </div>
        <div class="ec-foot"><a href="#contact" class="ec-btn solid">Talk About a Dedicated Team</a></div>
      </div>
    </div>
  </section>

  <section class="promise-section" aria-labelledby="promise-heading">
    <div class="promise-intro">
      <div><span class="s-label" style="color:var(--gold)">What We Guarantee</span><h2 class="s-head" id="promise-heading" style="color:var(--white)">The promises we make<br><em>to every agency partner</em></h2></div>
      <p>White label partnerships only work if they are built on absolute trust. These are not aspirations — they are the operational commitments we hold ourselves to on every engagement.</p>
    </div>
    <div class="promise-grid">
      <div class="promise-card reveal"><div class="pc-num">01</div><h4 class="pc-title">Your client never knows we exist</h4><p class="pc-desc">No i2Medier branding on any deliverable, no metadata trail, no code comments. Every output is yours to present as your own work.</p></div>
      <div class="promise-card reveal"><div class="pc-num">02</div><h4 class="pc-title">NDA signed before any brief is shared</h4><p class="pc-desc">We do not begin any project relationship without a signed non-disclosure agreement. Your clients, their requirements, and your commercial arrangements are protected.</p></div>
      <div class="promise-card reveal"><div class="pc-num">03</div><h4 class="pc-title">We never contact your clients directly</h4><p class="pc-desc">All communication goes through you. We do not reach out to your clients, solicit their business, or acknowledge any knowledge of them outside your engagement.</p></div>
      <div class="promise-card reveal"><div class="pc-num">04</div><h4 class="pc-title">Timelines we commit to, we keep</h4><p class="pc-desc">If we agree to a deadline, we hold it. If something changes that affects the timeline, we tell you immediately — before it becomes your problem with your client.</p></div>
      <div class="promise-card reveal"><div class="pc-num">05</div><h4 class="pc-title">Quality that survives your review</h4><p class="pc-desc">We do not deliver work that we would not be proud to put our own name on. Every deliverable passes our internal quality check before it reaches you.</p></div>
      <div class="promise-card reveal"><div class="pc-num">06</div><h4 class="pc-title">We never poach your clients</h4><p class="pc-desc">We are your production partner, not a competitor. We will never approach your clients independently, now or in the future.</p></div>
    </div>
  </section>

  <section class="test-section" aria-labelledby="test-heading">
    <div class="test-intro"><span class="s-label">Agency Testimonials</span><h2 class="s-head" id="test-heading">What agency partners say<br>about working with <em>us</em></h2></div>
    <div class="test-grid">
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"We've been using them as our white label dev team for over a year. Our clients have no idea, the work is solid, and we've been able to take on projects we would have had to turn away. It genuinely feels like an internal team."</p><div class="test-author"><div class="test-avatar">EO</div><div><div class="test-name">Emeka Okafor</div><div class="test-role">MD, Creovate Studio · Lagos</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"The NDA process was straightforward, the brief was picked up immediately, and the Figma files came back labelled exactly as we would have done them ourselves. I reviewed, tweaked two things, and presented to the client the same day."</p><div class="test-author"><div class="test-avatar">SR</div><div><div class="test-name">Sophia Ramirez</div><div class="test-role">Creative Director, Inkform Agency · London</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"We had a Laravel project come in that was outside our team's current bandwidth. Handed it over, got clean code with proper documentation back, and the client thought it came from us. Exactly what white label should be."</p><div class="test-author"><div class="test-avatar">KN</div><div><div class="test-name">Kolade Nwachukwu</div><div class="test-role">Founder, BoldStack Agency · Abuja</div></div></div></div>
    </div>
  </section>

  <section class="faq-section" aria-labelledby="faq-heading">
    <span class="s-label">Frequently Asked Questions</span>
    <h2 class="s-head" id="faq-heading">Questions about our<br><em>white label services</em></h2>
    <div class="faq-layout">
      <div class="faq-sidebar">
        <h3>Ready to expand your agency's output?</h3>
        <p>We're happy to talk through your current pipeline, what service lines you need support on, and whether a project-based or retainer model makes more sense for your situation.</p>
        <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us Directly →</a>
      </div>
      <div class="faq-list" role="list">
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqwl1">Will my clients find out you were involved?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqwl1" role="region">No. We operate with complete invisibility. No i2Medier branding appears on any file, document, code repository, or communication. Our name does not appear in metadata, comments, Git history, or Figma file properties. Your client sees only your agency's name.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqwl2">Do you sign NDAs?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqwl2" role="region">Yes — unconditionally. We sign a non-disclosure agreement before any project information is shared. This covers client identities, project briefs, pricing, and all commercial details. We can work from your NDA template or provide our own.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqwl3">What information do you need to start a project?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqwl3" role="region">A clear brief, the expected deliverable format, your timeline, and any brand or style references relevant to the project. We ask clarifying questions upfront to remove ambiguity before work begins — which saves revisions later.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqwl4">Can I use you for ongoing work across multiple clients?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqwl4" role="region">Yes. Our retainer and dedicated team models are specifically designed for agencies with recurring multi-client needs. A monthly retainer locks in your hours, gives you priority scheduling, and means we're always available when your pipeline needs us.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqwl5">What happens if the deliverable doesn't meet our standards?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqwl5" role="region">Every engagement includes a revision round. If the first draft doesn't meet the brief, we revise it — that is part of the agreement. We do not deliver and disappear. We stay on the work until it is genuinely presentable to your client.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqwl6">How do we communicate during a project?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqwl6" role="region">However works best for your agency — email, WhatsApp, Slack, Notion, or your existing project management tool. We adapt to your workflow. You will have a single point of contact from our side for all active work.</div></div>
      </div>
    </div>
  </section>

  <section class="related-section" aria-labelledby="related-heading">
    <span class="s-label">Related Services</span>
    <h2 class="s-head" id="related-heading">The services most often<br><em>white labelled by agencies</em></h2>
    <div class="related-grid">
      <a href="{{ route('site.services.web-design') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div><div class="ri-name">Website Design</div><p class="ri-desc">Conversion-focused websites for your agency clients, delivered as your own work.</p></a>
      <a href="{{ route('site.services.wordpress-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M7.5 8.5l2.5 7 2-5 2 5 2.5-7"></path></svg></div><div class="ri-name">WordPress Development</div><p class="ri-desc">Custom WordPress builds and WooCommerce stores handled end-to-end under your brand.</p></a>
      <a href="{{ route('site.services.laravel-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5"></path><path d="M20 19V9"></path><path d="M4 19h16"></path><path d="M8 19V11"></path><path d="M12 19V7"></path><path d="M16 19v-5"></path></svg></div><div class="ri-name">Laravel Development</div><p class="ri-desc">SaaS platforms, admin systems, and custom Laravel applications delivered as your agency's output.</p></a>
      <a href="{{ route('site.services.ui-ux-design') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5"></rect><rect x="13" y="4" width="7" height="7" rx="1.5"></rect><rect x="4" y="13" width="7" height="7" rx="1.5"></rect><rect x="13" y="13" width="7" height="7" rx="1.5"></rect></svg></div><div class="ri-name">UI/UX Design</div><p class="ri-desc">Figma wireframes, prototypes, and design systems delivered under your agency's naming conventions.</p></a>
    </div>
  </section>

  <section class="cta-band" id="contact" aria-labelledby="cta-h">
    <h2 id="cta-h">Ready to expand what<br>your agency can deliver?</h2>
    <p>Tell us about your pipeline and what you need support with. We will send you our agency partner brief within 24 hours.</p>
    <a href="{{ route('site.start', ['services' => 'whitelabel', 'source_page' => 'service-white-label', 'source_label' => 'White Label Service Page']) }}" class="btn-dark">Start a White Label Partnership →</a>
  </section>
</div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/service-white-label.js')
@endpush
