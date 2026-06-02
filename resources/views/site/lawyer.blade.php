@extends('public.layouts.app')

@section('title', 'Law Firm Website Design - i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/lawyer.css')
@endpush

@push('scripts')
    @vite('resources/js/public/pages/lawyer.js')
@endpush

@section('content')
<section class="hero">
  <div class="hero-glow" aria-hidden="true"></div>
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-left fade-up visible">
    <div class="hero-badge">Law Firm Web Design</div>
    <h1 class="hero-headline">
      Your Firm Deserves a Website That<br>
      <em>Commands Respect.</em>
    </h1>
    <p class="hero-sub">We build high-converting, professionally crafted websites for law firms and legal practices designed to generate leads, establish authority, and win clients before the first consultation.</p>
    <div class="hero-actions">
      <a href="#pricing" class="btn-primary">Start My Lawyer Website</a>
      <a href="#work" class="btn-ghost">See examples <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
    </div>
  </div>
  <div class="hero-right">
    <div class="mockup-frame">
      <div class="mockup-bar">
        <div class="mockup-dot"></div>
        <div class="mockup-dot"></div>
        <div class="mockup-dot"></div>
        <div class="mockup-url">www.hartley-associates.com</div>
      </div>
      <div class="mockup-content">
        <div class="mockup-hero-section">
          <div class="mockup-tag">Trusted Legal Counsel Since 1994</div>
          <div class="mockup-h1">Justice Starts With<br><span>The Right Firm.</span></div>
          <div class="mockup-p">Hartley &amp; Associates brings 30 years of courtroom expertise to your most critical legal matters from corporate litigation to personal injury.</div>
          <div class="mockup-btn">Book a Free Consultation</div>
        </div>
        <div class="mockup-services">
          <div class="mockup-service-card">
            <div class="mockup-service-icon"><svg viewBox="0 0 24 24"><path d="M12 3v18"/><path d="M7 7h10"/><path d="m6 7-3 5h6l-3-5Z"/><path d="m18 7-3 5h6l-3-5Z"/><path d="M8 21h8"/></svg></div>
            <div class="mockup-service-title">Corporate Law</div>
            <div class="mockup-service-desc">Mergers, contracts, and compliance handled with precision.</div>
          </div>
          <div class="mockup-service-card">
            <div class="mockup-service-icon"><svg viewBox="0 0 24 24"><path d="m3 10 9-6 9 6"/><path d="M4 10h16"/><path d="M6 10v8"/><path d="M10 10v8"/><path d="M14 10v8"/><path d="M18 10v8"/><path d="M3 20h18"/></svg></div>
            <div class="mockup-service-title">Litigation</div>
            <div class="mockup-service-desc">Aggressive courtroom representation for complex disputes.</div>
          </div>
          <div class="mockup-service-card">
            <div class="mockup-service-icon"><svg viewBox="0 0 24 24"><path d="m3 11 9-8 9 8"/><path d="M5 10v10h14V10"/><path d="M9 20v-6h6v6"/></svg></div>
            <div class="mockup-service-title">Real Estate</div>
            <div class="mockup-service-desc">Property transactions and dispute resolution services.</div>
          </div>
          <div class="mockup-service-card">
            <div class="mockup-service-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20a8 8 0 0 1 16 0"/></svg></div>
            <div class="mockup-service-title">Personal Injury</div>
            <div class="mockup-service-desc">Fight for the compensation you truly deserve.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="logos-strip">
  <div class="logos-label">Trusted by firms in</div>
  <div class="logos-track">
    <span>Lagos, Nigeria</span>
    <span>Abuja, Nigeria</span>
    <span>Port Harcourt</span>
    <span>London, UK</span>
    <span>Houston, USA</span>
    <span>Accra, Ghana</span>
    <span>Lagos, Nigeria</span>
    <span>Abuja, Nigeria</span>
    <span>Port Harcourt</span>
    <span>London, UK</span>
    <span>Houston, USA</span>
    <span>Accra, Ghana</span>
  </div>
</div>

<section class="why-section" id="why">
  <div class="section-tag">The Problem</div>
  <h2 class="section-title">Most Lawyer Websites<br><em>Lose Cases Before Trial</em></h2>
  <p class="section-sub">Your website is your first impression to every potential client. A weak site means lost trust and lost business to competing firms who invested in theirs.</p>

  <div class="why-grid">
    <div class="why-points">
      <div class="why-point fade-up">
        <div class="why-num">01</div>
        <div>
          <div class="why-point-title">First impressions are made in 0.05 seconds</div>
          <div class="why-point-desc">Before they read a single word, potential clients have already judged your firm's credibility based on your website's visual presentation.</div>
        </div>
      </div>
      <div class="why-point fade-up">
        <div class="why-num">02</div>
        <div>
          <div class="why-point-title">68% of clients Google their lawyer first</div>
          <div class="why-point-desc">If your site isn't ranking or doesn't convert visitors into consultation bookings, your competitors are getting those clients, not you.</div>
        </div>
      </div>
      <div class="why-point fade-up">
        <div class="why-num">03</div>
        <div>
          <div class="why-point-title">Legal websites need trust signals, not just design</div>
          <div class="why-point-desc">We understand what makes legal clients convert: credentials, case results, testimonials, clear CTAs, and authoritative visual language.</div>
        </div>
      </div>
    </div>
    <div class="why-visual fade-up">
      <div class="why-stat-card">
        <div class="why-stat-num">3×</div>
        <div class="why-stat-label">Average increase in consultation bookings after our redesigns</div>
      </div>
      <div class="why-stat-row">
        <div class="why-stat-sm">
          <div class="why-stat-num">94%</div>
          <div class="why-stat-label">Client satisfaction rate across all projects</div>
        </div>
        <div class="why-stat-sm">
          <div class="why-stat-num">14d</div>
          <div class="why-stat-label">Average delivery time for full law firm site</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="features">
  <div class="section-tag">What You Get</div>
  <h2 class="section-title">Every Detail Built to<br><em>Convert &amp; Impress</em></h2>
  <p class="section-sub">We don't just make things look beautiful. Every element is engineered to build trust and turn website visitors into paying clients.</p>

  <div class="included-grid">
    <div class="included-item fade-up">
      <div class="included-icon"><svg viewBox="0 0 24 24"><path d="M12 3v18"/><path d="M7 7h10"/><path d="m6 7-3 5h6l-3-5Z"/><path d="m18 7-3 5h6l-3-5Z"/><path d="M8 21h8"/></svg></div>
      <div class="included-title">Custom Legal Design</div>
      <div class="included-desc">Built specifically for your practice area from criminal defense to corporate law. No generic templates.</div>
      <div class="included-check">
        <div class="check-item">Unique visual identity</div>
        <div class="check-item">Practice area pages</div>
        <div class="check-item">Attorney profile pages</div>
      </div>
    </div>
    <div class="included-item fade-up">
      <div class="included-icon"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></div>
      <div class="included-title">Mobile-First Development</div>
      <div class="included-desc">Over 70% of clients search on phones. Your site will look immaculate on every screen size and device.</div>
      <div class="included-check">
        <div class="check-item">Responsive across all devices</div>
        <div class="check-item">Lightning fast load speed</div>
        <div class="check-item">Touch-optimized interactions</div>
      </div>
    </div>
    <div class="included-item fade-up">
      <div class="included-icon"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <div class="included-title">Local SEO Built In</div>
      <div class="included-desc">Rank on Google when clients search "lawyer near me." We optimize every page for your target keywords.</div>
      <div class="included-check">
        <div class="check-item">Google My Business setup</div>
        <div class="check-item">Local keyword optimization</div>
        <div class="check-item">Schema markup for law firms</div>
      </div>
    </div>
    <div class="included-item fade-up">
      <div class="included-icon"><svg viewBox="0 0 24 24"><path d="M9 3h6"/><path d="M10 7h4"/><rect x="5" y="5" width="14" height="16" rx="2"/><path d="M9 12h6"/><path d="M9 16h4"/></svg></div>
      <div class="included-title">Lead Generation Forms</div>
      <div class="included-desc">Strategic CTAs and intake forms at every key decision point, turning readers into consultation requests.</div>
      <div class="included-check">
        <div class="check-item">Multi-step intake forms</div>
        <div class="check-item">Live chat integration</div>
        <div class="check-item">Email notification system</div>
      </div>
    </div>
    <div class="included-item fade-up">
      <div class="included-icon"><svg viewBox="0 0 24 24"><path d="M8 21h8"/><path d="M12 17v4"/><path d="M7 4h10v5a5 5 0 0 1-10 0z"/><path d="M17 6h2a2 2 0 0 1 0 4h-2"/><path d="M7 6H5a2 2 0 0 0 0 4h2"/></svg></div>
      <div class="included-title">Trust &amp; Authority Elements</div>
      <div class="included-desc">Awards badges, bar association memberships, case results, and testimonials displayed for maximum credibility.</div>
      <div class="included-check">
        <div class="check-item">Credentials showcase</div>
        <div class="check-item">Case result highlights</div>
        <div class="check-item">Client testimonials section</div>
      </div>
    </div>
    <div class="included-item fade-up">
      <div class="included-icon"><svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></div>
      <div class="included-title">Blog &amp; Content System</div>
      <div class="included-desc">A fully manageable blog to publish legal insights, answer common questions, and dominate search rankings.</div>
      <div class="included-check">
        <div class="check-item">Easy-to-use CMS</div>
        <div class="check-item">Blog post templates</div>
        <div class="check-item">Newsletter integration</div>
      </div>
    </div>
  </div>
</section>

<section class="process-section" id="process">
  <div class="section-tag">How It Works</div>
  <h2 class="section-title">From Brief to Launch in<br><em>14 Days or Less</em></h2>
  <p class="section-sub">A streamlined, zero-stress process. We handle every detail so you can focus on your clients.</p>

  <div class="process-steps">
    <div class="process-step fade-up">
      <div class="process-num-wrap"><div class="process-num">01</div></div>
      <div class="process-step-title">Discovery Call</div>
      <div class="process-step-desc">We learn your firm, your clients, your goals, and what makes you different from every other lawyer in your market.</div>
    </div>
    <div class="process-step fade-up">
      <div class="process-num-wrap"><div class="process-num">02</div></div>
      <div class="process-step-title">Design Concept</div>
      <div class="process-step-desc">We deliver a full visual design mockup in 3 to 5 days for your review, with revisions until it's exactly right.</div>
    </div>
    <div class="process-step fade-up">
      <div class="process-num-wrap"><div class="process-num">03</div></div>
      <div class="process-step-title">Build &amp; Test</div>
      <div class="process-step-desc">Full development, content integration, SEO setup, and quality testing across devices and browsers.</div>
    </div>
    <div class="process-step fade-up">
      <div class="process-num-wrap"><div class="process-num">04</div></div>
      <div class="process-step-title">Launch &amp; Support</div>
      <div class="process-step-desc">We handle deployment, domain setup, and provide 30 days of post-launch support to make sure everything runs perfectly.</div>
    </div>
  </div>
</section>

<section id="pricing">
  <div class="section-tag">Investment</div>
  <h2 class="section-title">Simple, Transparent<br><em>Pricing</em></h2>
  <p class="section-sub">No surprises, no hidden fees. Choose the package that fits your firm's size and ambition.</p>

  <div class="pricing-grid">
    <div class="pricing-card fade-up">
      <div class="pricing-tier">Starter</div>
      <div class="pricing-price"><span>$</span>1,200</div>
      <div class="pricing-period">One-time payment · Delivered in 7 days</div>
      <div class="pricing-divider"></div>
      <div class="pricing-features">
        <div class="pricing-feature active">5-page custom website</div>
        <div class="pricing-feature active">Mobile-responsive design</div>
        <div class="pricing-feature active">Contact &amp; consultation form</div>
        <div class="pricing-feature active">Basic SEO setup</div>
        <div class="pricing-feature active">1 revision round</div>
        <div class="pricing-feature inactive">Blog / content system</div>
        <div class="pricing-feature inactive">Live chat integration</div>
        <div class="pricing-feature inactive">Attorney profile pages</div>
      </div>
      <a href="{{ route('site.start') }}" class="btn-primary" style="display:block;text-align:center;width:100%">Get Started</a>
    </div>
    <div class="pricing-card featured fade-up">
      <div class="featured-tag">Most Popular</div>
      <div class="pricing-tier">Professional</div>
      <div class="pricing-price"><span>$</span>2,800</div>
      <div class="pricing-period">One-time payment · Delivered in 14 days</div>
      <div class="pricing-divider"></div>
      <div class="pricing-features">
        <div class="pricing-feature active">Up to 12 custom pages</div>
        <div class="pricing-feature active">Mobile-first development</div>
        <div class="pricing-feature active">Lead capture &amp; intake forms</div>
        <div class="pricing-feature active">Full local SEO optimization</div>
        <div class="pricing-feature active">3 revision rounds</div>
        <div class="pricing-feature active">Blog / content system</div>
        <div class="pricing-feature active">Live chat integration</div>
        <div class="pricing-feature active">Attorney profile pages</div>
      </div>
      <a href="#contact" class="btn-primary" style="display:block;text-align:center;width:100%">Start This Package</a>
    </div>
    <div class="pricing-card fade-up">
      <div class="pricing-tier">Enterprise</div>
      <div class="pricing-price">Custom</div>
      <div class="pricing-period">Multi-attorney firms · Custom timeline</div>
      <div class="pricing-divider"></div>
      <div class="pricing-features">
        <div class="pricing-feature active">Unlimited pages</div>
        <div class="pricing-feature active">Custom web application features</div>
        <div class="pricing-feature active">Client portal integration</div>
        <div class="pricing-feature active">Advanced SEO &amp; content strategy</div>
        <div class="pricing-feature active">Unlimited revisions</div>
        <div class="pricing-feature active">CRM &amp; billing integration</div>
        <div class="pricing-feature active">Ongoing maintenance retainer</div>
        <div class="pricing-feature active">Priority support</div>
      </div>
      <a href="#contact" class="btn-primary" style="display:block;text-align:center;width:100%;background:transparent;border:1px solid var(--gold);color:var(--gold)">Talk to Us</a>
    </div>
  </div>
</section>

<section class="testi-section" id="work">
  <div class="section-tag">Client Results</div>
  <h2 class="section-title">Lawyers Who Invested<br><em>In Their Online Presence</em></h2>

  <div class="testi-grid">
    <div class="testi-card fade-up">
      <div class="testi-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <div class="testi-text">"Within 3 weeks of launching our new site, consultation requests doubled. The design communicates authority in a way our old WordPress site never could."</div>
      <div class="testi-author">
        <div class="testi-avatar">A</div>
        <div>
          <div class="testi-name">Adaeze Nwosu</div>
          <div class="testi-role">Partner, Nwosu &amp; Associates — Lagos</div>
        </div>
      </div>
    </div>
    <div class="testi-card fade-up">
      <div class="testi-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <div class="testi-text">"i2Medier understood exactly what a law firm website needs. Not just beautiful, but built to convert. Our Google rankings improved significantly within 60 days."</div>
      <div class="testi-author">
        <div class="testi-avatar">K</div>
        <div>
          <div class="testi-name">Kwame Asante</div>
          <div class="testi-role">Principal, Asante Legal Group — Accra</div>
        </div>
      </div>
    </div>
    <div class="testi-card fade-up">
      <div class="testi-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <div class="testi-text">"The intake form system alone has saved my receptionist 10 hours a week. Clients come pre-qualified. The professionalism of the site has elevated how people perceive our firm."</div>
      <div class="testi-author">
        <div class="testi-avatar">T</div>
        <div>
          <div class="testi-name">Temi Adeyemi</div>
          <div class="testi-role">Managing Partner, Adeyemi Law — Abuja</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="faq">
  <div class="section-tag">FAQ</div>
  <h2 class="section-title">Questions You're<br><em>Probably Thinking</em></h2>

  <div class="faq-grid">
    <div class="faq-item fade-up">
      <div class="faq-q">How long does it take to build my website?</div>
      <div class="faq-a">The Starter package is delivered in 7 days, the Professional in 14 days. Enterprise timelines depend on scope, typically 3 to 6 weeks. We've never missed a deadline.</div>
    </div>
    <div class="faq-item fade-up">
      <div class="faq-q">Do I need to provide content and photos?</div>
      <div class="faq-a">We guide you through exactly what's needed. We provide copywriting support and can source professional stock photography if you don't have brand photos yet.</div>
    </div>
    <div class="faq-item fade-up">
      <div class="faq-q">Will I be able to update the site myself?</div>
      <div class="faq-a">Absolutely. We build on WordPress or a headless CMS so you can update blog posts, team profiles, and service pages without any technical knowledge.</div>
    </div>
    <div class="faq-item fade-up">
      <div class="faq-q">Do you offer hosting and maintenance?</div>
      <div class="faq-a">Yes. We offer monthly maintenance retainers that include hosting, security updates, backups, and content updates so your site stays fast, secure, and current.</div>
    </div>
    <div class="faq-item fade-up">
      <div class="faq-q">Can this template be adapted for other industries?</div>
      <div class="faq-a">This page is specifically for law firms, but i2Medier builds dedicated landing pages for medical practices, financial advisors, real estate agencies, and more, each uniquely crafted.</div>
    </div>
    <div class="faq-item fade-up">
      <div class="faq-q">What if I don't like the initial design?</div>
      <div class="faq-a">Every package includes revision rounds. We work with you until you love it. Our discovery process ensures we understand your vision before a single pixel is placed.</div>
    </div>
  </div>
</section>

<section class="cta-final" id="contact">
  <div class="cta-final-inner">
    <div class="section-tag" style="justify-content:center">Ready to Start?</div>
    <h2 class="cta-big">Your Next Client Is<br>Searching Right <em>Now.</em></h2>
    <p class="section-sub" style="margin:0 auto;text-align:center">Don't let them find a competitor's website first. Let's build yours today, strategic, fast, and built to win.</p>
    <div class="cta-actions">
      <a href="mailto:hello@i2medier.com?subject=Lawyer%20Website%20Quote" class="btn-primary">Start My Project →</a>
      <a href="https://i2medier.com/contact" class="btn-ghost">Schedule a Call <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
    </div>
    <div class="cta-note">Free consultation · No commitment · Response within 24 hours</div>
  </div>
</section>
@endsection
