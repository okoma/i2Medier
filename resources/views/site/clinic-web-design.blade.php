@extends('public.layouts.app')

@section('title', 'Web Design for Clinics, Hospitals & Healthcare Providers | i2Medier')

@push('meta')
<meta name="description" content="Professional web design for clinics, hospitals, private practices, and healthcare providers. i2Medier builds fast, HIPAA-aware, SEO-optimised medical websites with appointment booking, patient portals, and doctor profiles. Nigeria & UK specialists."/>
<meta name="keywords" content="web design for clinics Nigeria, medical website design, hospital website development, doctor website design Nigeria, healthcare website design, clinic website Lagos, appointment booking website clinic, private practice website Nigeria, dental website design, medical website SEO Nigeria"/>
<meta name="robots" content="index, follow"/>
<meta name="author" content="i2Medier Konceptz"/>
<link rel="canonical" href="{{ url('/services/web-design/clinic-website-design') }}"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{ url('/services/web-design/clinic-website-design') }}"/>
<meta property="og:title" content="Web Design for Clinics & Healthcare Providers | i2Medier"/>
<meta property="og:description" content="We build professional, trust-first medical websites with appointment booking, doctor profiles, patient portals, and Google rankings that bring new patients through your door."/>
<meta property="og:image" content="{{ url('/og-clinic-web-design.jpg') }}"/>
<meta property="og:site_name" content="i2Medier"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="Web Design for Clinics | i2Medier"/>
<meta name="twitter:description" content="Medical websites that build patient trust, enable online booking, and rank on Google — Nigeria & UK specialists."/>
<script type="application/ld+json">{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'Service',
  'name' => 'Web Design for Clinics and Healthcare Providers',
  'serviceType' => 'Web Design & Development',
  'description' => 'Professional web design for clinics, hospitals, private practices, dental surgeries, and healthcare providers. We build trust-first medical websites with appointment booking, patient portals, doctor profiles, and healthcare SEO.',
  'provider' => [
    '@type' => 'Organization',
    'name' => 'i2Medier',
    'url' => url('/'),
    'email' => 'hello@i2medier.com',
  ],
  'areaServed' => ['Nigeria', 'United Kingdom', 'United States', 'Canada'],
  'audience' => [
    '@type' => 'Audience',
    'audienceType' => 'Clinics, Hospitals, Dental practices, Private GP surgeries, Physiotherapy clinics, Specialist medical practices, Diagnostic centres, Pharmacies',
  ],
  'offers' => [
    '@type' => 'Offer',
    'priceCurrency' => 'NGN',
    'price' => '400000',
    'description' => 'Clinic website starting from ₦400,000',
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'BreadcrumbList',
  'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
    ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
    ['@type' => 'ListItem', 'position' => 4, 'name' => 'Clinic Website Design', 'item' => url('/services/web-design/clinic-website-design')],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'FAQPage',
  'mainEntity' => [
    ['@type' => 'Question', 'name' => 'How much does a clinic website cost in Nigeria?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Clinic websites start from ₦400,000 for a professional 6-page site with service descriptions, doctor profiles, contact forms, and basic SEO. Full-featured websites with online appointment booking, patient portals, speciality service pages, and comprehensive healthcare SEO start from ₦800,000. Larger hospital or multi-speciality platforms with patient management integration are quoted individually after a free consultation.']],
    ['@type' => 'Question', 'name' => 'Can patients book appointments through the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. Online appointment booking is a core feature we build into clinic websites. We integrate Calendly, custom booking forms with real-time slot availability, or connect to existing practice management software. Patients can select a doctor, choose their appointment type, pick a date and time, and receive an automatic confirmation email, all without your staff needing to make a single phone call.']],
    ['@type' => 'Question', 'name' => 'Will my clinic website rank on Google?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Every medical website we build includes a complete SEO foundation, including MedicalClinic and LocalBusiness schema markup, optimised title tags and meta descriptions for every page, individual service pages targeting specific medical keyword combinations, Google Business Profile optimisation for local search rankings, and Google Search Console setup. For competitive healthcare markets, we offer monthly SEO retainers.']],
    ['@type' => 'Question', 'name' => 'How do you handle patient data and privacy on clinic websites?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Patient trust and data privacy are paramount in healthcare web design. Every clinic website we build uses SSL/TLS encryption, secure contact forms with appropriate data handling disclaimers, GDPR-compliant cookie notices, and minimal data collection principles. Appointment booking systems are configured to store only necessary information. We advise on privacy policy requirements and can help draft appropriate patient data notices.']],
    ['@type' => 'Question', 'name' => 'Do you build websites for specialist practices, dental, physiotherapy, dermatology?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We have built websites for general practice clinics, dental surgeries, physiotherapy practices, diagnostic centres, eye clinics, dermatology practices, mental health clinics, and specialist consultant practices. Each requires a different approach to content, keywords, and trust signals. We tailor the design and copy specifically to your medical speciality and patient audience.']],
    ['@type' => 'Question', 'name' => 'How long does it take to build a clinic website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard clinic website with service pages, doctor profiles, appointment booking, and SEO setup typically takes 3 to 5 weeks from design approval to launch. Larger multi-speciality hospital websites with patient portals may take 6 to 10 weeks. We provide a detailed, milestone-based timeline before work begins.']],
  ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/clinic-web-design.css')
@endpush

@section('content')
<!-- ═══ HERO ═══ -->
<header class="hero">
  <div class="hero-glow" aria-hidden="true"></div>
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-cross" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4v16M4 12h16" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg></div>

  <div class="hero-left">
    <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
      <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services.web-design') }}">Web Design</a><span class="breadcrumb-sep">›</span>
      <span aria-current="page">Clinic Website Design</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Healthcare Web Design</span>
    <h1>Medical websites that<br>build patient <em>trust</em><br>and fill appointment books</h1>
    <p class="hero-sub">We build professional, compassionate, and Google-ranked websites for clinics, hospitals, private practices, and healthcare providers — with online appointment booking, doctor profiles, patient portals, and healthcare SEO that brings new patients through your door every week.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Clinic Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5L20 7" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>Built for healthcare — not generic templates</span>
      <span class="hero-trust-item"><svg viewBox="0 0 24 24" fill="none"><rect x="3.5" y="5" width="17" height="15" rx="2.5" stroke="currentColor" stroke-width="2"/><path d="M8 3.5v3M16 3.5v3M3.5 9.5h17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Online booking included</span>
      <span class="hero-trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M12 3 5 6v5c0 4.8 2.9 8.9 7 10 4.1-1.1 7-5.2 7-10V6l-7-3Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="m9.5 12 1.8 1.8 3.8-3.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Secure & privacy-compliant</span>
      <span class="hero-trust-item"><svg viewBox="0 0 24 24" fill="none"><path d="M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Z" stroke="currentColor" stroke-width="2"/><path d="M3.5 12h17M12 3c2.3 2.3 3.5 5.5 3.5 9S14.3 18.7 12 21c-2.3-2.3-3.5-5.5-3.5-9S9.7 5.3 12 3Z" stroke="currentColor" stroke-width="2"/></svg>Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Clinic website mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24" fill="none"><rect x="3.5" y="5" width="17" height="15" rx="2.5" stroke="currentColor" stroke-width="2"/><path d="M8 3.5v3M16 3.5v3M3.5 9.5h17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
        <div>
          <div class="float-notif-text">Appointment confirmed</div>
          <div class="float-notif-sub">Dr Adeyemi · Wed 10:00 AM · 2 min ago</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24" fill="none"><rect x="5.5" y="10" width="13" height="10" rx="2" stroke="currentColor" stroke-width="2"/><path d="M8.5 10V8a3.5 3.5 0 1 1 7 0v2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
            <span class="mock-url-text">lagosmedicalgroupng.com</span>
          </div>
        </div>
        <!-- Site content -->
        <div class="mock-site-nav">
          <div class="msn-logo">Lagos <span>Medical Group</span></div>
          <div class="msn-links">
            <span class="msn-link">Services</span>
            <span class="msn-link">Doctors</span>
            <span class="msn-link">About</span>
            <span class="msn-emergency">Emergency: 0800-MEDIC</span>
            <span class="msn-cta">Book Now</span>
          </div>
        </div>
        <div class="mock-site-hero">
          <div class="msh-tag">Accredited · Lagos · Est. 2008</div>
          <div class="msh-h1">Expert care for every<br><span>stage of life</span></div>
          <div class="msh-sub">15 specialist doctors · Walk-in & appointments · Insurance accepted</div>
          <div class="msh-book"><svg viewBox="0 0 24 24" fill="none"><rect x="3.5" y="5" width="17" height="15" rx="2.5" stroke="currentColor" stroke-width="2"/><path d="M8 3.5v3M16 3.5v3M3.5 9.5h17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Book an Appointment →</div>
        </div>
        <div class="mock-site-doctors">
          <div class="msd-label">Our Specialist Doctors</div>
          <div class="msd-grid">
            <div class="msd-card">
              <div class="msd-avatar"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.2" stroke="currentColor" stroke-width="2"/><path d="M6.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M18.5 5.5h4M20.5 3.5v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
              <div class="msd-name">Dr. Adeyemi</div>
              <div class="msd-spec">Cardiology</div>
              <div class="msd-rating"><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg></div>
            </div>
            <div class="msd-card">
              <div class="msd-avatar"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.2" stroke="currentColor" stroke-width="2"/><path d="M6.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M18.5 5.5h4M20.5 3.5v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
              <div class="msd-name">Dr. Okafor</div>
              <div class="msd-spec">Paediatrics</div>
              <div class="msd-rating"><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg></div>
            </div>
            <div class="msd-card">
              <div class="msd-avatar"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.2" stroke="currentColor" stroke-width="2"/><path d="M6.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M18.5 5.5h4M20.5 3.5v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
              <div class="msd-name">Dr. Bello</div>
              <div class="msd-spec">General Surgery</div>
              <div class="msd-rating"><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg></div>
            </div>
          </div>
        </div>
        <div class="mock-site-services">
          <div class="mss-label">Our Services</div>
          <div class="mss-grid">
            <div class="mss-item"><div class="mss-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 20s-6-3.6-6-9a3.5 3.5 0 0 1 6-2.5A3.5 3.5 0 0 1 18 11c0 5.4-6 9-6 9Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></div><div class="mss-name">Cardiology</div></div>
            <div class="mss-item"><div class="mss-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3" stroke="currentColor" stroke-width="2"/><path d="M7 19a5 5 0 0 1 10 0M5 11.5a2 2 0 1 0 0 4m14-4a2 2 0 1 1 0 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div><div class="mss-name">Paediatrics</div></div>
            <div class="mss-item"><div class="mss-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M9 4v5l-4 7a3 3 0 0 0 2.6 4.5h8.8A3 3 0 0 0 19 16l-4-7V4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 8h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div><div class="mss-name">Laboratory</div></div>
            <div class="mss-item"><div class="mss-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M7 7.5c0-2.5 2.1-4.5 5-4.5s5 2 5 4.5c0 1.6-.8 3-2.1 3.9l-2.9 1.9-2.9-1.9A4.7 4.7 0 0 1 7 7.5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9.5 13.2 8 20m6.5-6.8L16 20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div><div class="mss-name">Dental Care</div></div>
            <div class="mss-item"><div class="mss-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M2.5 12S6 6.5 12 6.5 21.5 12 21.5 12 18 17.5 12 17.5 2.5 12 2.5 12Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="2"/></svg></div><div class="mss-name">Eye Clinic</div></div>
            <div class="mss-item"><div class="mss-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M10 3v7.5L6 17a3 3 0 0 0 2.7 4.5h6.6A3 3 0 0 0 18 17l-4-6.5V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 14h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div><div class="mss-name">Diagnostics</div></div>
          </div>
        </div>
        <div class="mock-site-stats">
          <div class="mst-item"><div class="mst-num">15K+</div><div class="mst-lbl">Patients</div></div>
          <div class="mst-item"><div class="mst-num">15</div><div class="mst-lbl">Doctors</div></div>
          <div class="mst-item"><div class="mst-num">HEFAMAA</div><div class="mst-lbl">Accredited</div></div>
          <div class="mst-item"><div class="mst-num">4.9</div><div class="mst-lbl">Rating</div></div>
        </div>
      </div>
      <div class="float-badge2"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="2"/><path d="m16 16 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>#1 · "private clinic Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> General Practice Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Private Hospitals</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Dental Surgeries</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Physiotherapy Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Diagnostic Centres</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Eye Clinics & Optometrists</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Mental Health Practices</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Dermatology Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Maternity & Women's Health</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Specialist Consultant Practices</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> General Practice Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Private Hospitals</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Dental Surgeries</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Physiotherapy Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Diagnostic Centres</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Eye Clinics & Optometrists</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Mental Health Practices</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Dermatology Clinics</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Maternity & Women's Health</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Specialist Consultant Practices</span>
  </div>
</div>

<!-- TRUST BAND -->
<div class="trust-band" aria-label="Healthcare web design principles">
  <div class="trust-band-inner">
    <div class="tb-item reveal">
      <div class="tb-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 3 5 6v5c0 4.8 2.9 8.9 7 10 4.1-1.1 7-5.2 7-10V6l-7-3Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="m9.5 12 1.8 1.8 3.8-3.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      <div class="tb-text">
        <h4>Privacy-First by Design</h4>
        <p>SSL encryption, GDPR-compliant forms, and minimal patient data collection built into every page.</p>
      </div>
    </div>
    <div class="tb-item reveal">
      <div class="tb-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M5 20V6.5A1.5 1.5 0 0 1 6.5 5H17a2 2 0 0 1 2 2v13" stroke="currentColor" stroke-width="2"/><path d="M9 5V3m6 2V3M9 10h2m-2 4h2m4-4h2m-2 4h2M10 20v-4h4v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
      <div class="tb-text">
        <h4>Healthcare-Specific Design</h4>
        <p>Trust signals, credential displays, and patient-journey UX patterns built specifically for healthcare providers.</p>
      </div>
    </div>
    <div class="tb-item reveal">
      <div class="tb-ico"><svg viewBox="0 0 24 24" fill="none"><rect x="3.5" y="5" width="17" height="15" rx="2.5" stroke="currentColor" stroke-width="2"/><path d="M8 3.5v3M16 3.5v3M3.5 9.5h17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
      <div class="tb-text">
        <h4>Online Booking Built In</h4>
        <p>Real-time appointment scheduling that reduces phone enquiries and fills your diary automatically 24/7.</p>
      </div>
    </div>
    <div class="tb-item reveal">
      <div class="tb-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="2"/><path d="m16 16 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
      <div class="tb-text">
        <h4>Healthcare SEO Standards</h4>
        <p>MedicalClinic schema, E-E-A-T compliance, and local SEO — built to meet Google's healthcare content standards.</p>
      </div>
    </div>
  </div>
</div>

<!-- ═══ PROBLEMS ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most clinic websites<br><em>lose patients before hello</em></h2>
    </div>
    <p>When a patient searches for a doctor or clinic online, they are often anxious, unwell, or making a time-sensitive decision. The quality of your website in that moment is the proxy for the quality of your care. A poor digital first impression does not just cost you a booking — it loses a patient to a less qualified competitor who simply presents better online.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 21s7-4.4 7-10.2A4.3 4.3 0 0 0 12 7a4.3 4.3 0 0 0-7 3.8C5 16.6 12 21 12 21Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9 11.5h.01M15 11.5h.01M9.5 15c.7-.7 1.5-1 2.5-1s1.8.3 2.5 1" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <h3 class="prob-title">No trust signals — patients cannot confirm your credentials</h3>
      <p class="prob-desc">Healthcare is a high-stakes purchasing decision. Patients need to see MDCN registration, HEFAMAA accreditation, hospital affiliations, and doctor qualifications before they book. A website that buries or omits these signals makes patients anxious and sends them searching for a provider who makes their credentials obvious.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Doctor credentials, regulatory registrations, accreditation badges, and professional affiliations displayed prominently as primary trust anchors — not footnotes.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M6.8 4.5h2.7l1.4 3.9-1.8 1.8a14.6 14.6 0 0 0 4.7 4.7l1.8-1.8 3.9 1.4v2.7a1.8 1.8 0 0 1-2 1.8A15.8 15.8 0 0 1 5 6.5a1.8 1.8 0 0 1 1.8-2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></span>
      <h3 class="prob-title">Phone-only booking — losing patients at every step</h3>
      <p class="prob-desc">A patient searching for an appointment at 10pm cannot call your clinic. A patient who prefers not to speak on the phone will simply choose a competitor with online booking. In 2025, requiring a phone call to book an appointment is a significant barrier that eliminates a large fraction of potential new patients.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Real-time online appointment booking — select a doctor, pick a date and time, get an instant confirmation. Available 24/7, no staff interaction required.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 20s6-5.5 6-10a6 6 0 1 0-12 0c0 4.5 6 10 6 10Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.2" stroke="currentColor" stroke-width="2"/></svg></span>
      <h3 class="prob-title">Invisible on Google when patients search locally</h3>
      <p class="prob-desc">The majority of patients choose their clinic based on location and availability — not prior relationships. "Private clinic near me", "doctor Lagos Island", "paediatrician Lekki" — these are searches your potential patients are making daily. If your clinic does not appear in these results, you simply do not exist for that patient at that moment.</p>
      <div class="prob-solution"><strong>Our Fix</strong> MedicalClinic schema, Google Business Profile optimisation, location-specific landing pages, and local SEO that puts your clinic in front of patients searching in your area.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.2" stroke="currentColor" stroke-width="2"/><path d="M6.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <h3 class="prob-title">Faceless clinics — no doctor profiles to build connection</h3>
      <p class="prob-desc">Patients choose doctors, not clinics. A patient searching for a cardiologist or a paediatrician wants to see the doctor's face, read their qualifications and experience, and feel a sense of connection before they book. A website without professional doctor profiles loses this emotional connection to competitors who have it.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Individual doctor profile pages with professional photography, qualifications, specialisms, publications, languages spoken, and direct booking links.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24" fill="none"><rect x="7" y="3.5" width="10" height="17" rx="2.5" stroke="currentColor" stroke-width="2"/><path d="M11 17.5h2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <h3 class="prob-title">Difficult to navigate on mobile when patients need it most</h3>
      <p class="prob-desc">A patient searching for a clinic on their phone — often while in pain or worried — needs to find what they are looking for immediately. If your website is difficult to navigate on mobile, the phone number is hard to tap, or the booking form requires 15 fields to complete, you have failed them at their most vulnerable moment.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Mobile-first design with prominent emergency contact buttons, one-tap calling, simplified booking flows, and navigation designed for a patient in a hurry on a small screen.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M14 4H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9l-5-5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M14 4v5h5M9 13h6M9 17h4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <h3 class="prob-title">Generic content that does not address patient concerns</h3>
      <p class="prob-desc">Patients search Google with very specific questions: "what happens during a colonoscopy", "how much does an MRI cost in Lagos", "best paediatrician for autism diagnosis Nigeria". If your website does not have content that answers these questions, Google sends those patients to websites that do.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Service-specific content written for patient comprehension — explaining procedures, costs, what to expect, and recovery — plus a health blog for ongoing SEO content authority.</div>
    </div>

  </div>
</section>

<!-- ═══ FEATURES ═══ -->
<section aria-labelledby="features-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="features-heading">Every feature your clinic<br>website <em>must have</em></h2>
    </div>
    <p>Healthcare websites carry responsibilities that generic business websites do not — patient trust, privacy compliance, accessibility, and the ability to function as a genuine clinical tool for patient acquisition and communication. Every feature below is purpose-built for medical and healthcare providers.</p>
  </div>
  <div class="features-grid">

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24" fill="none"><rect x="3.5" y="5" width="17" height="15" rx="2.5" stroke="currentColor" stroke-width="2"/><path d="M8 3.5v3M16 3.5v3M3.5 9.5h17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
      <h3 class="feat-title">Online Appointment Booking System</h3>
      <p class="feat-desc">Real-time appointment scheduling allowing patients to select a doctor, choose their appointment type (consultation, follow-up, procedure), view available dates and times, and receive an instant email confirmation — all without any staff involvement. Integrates with Calendly or existing practice management software.</p>
      <div class="feat-tags"><span class="feat-tag">Real-time Slots</span><span class="feat-tag">Email Confirmation</span><span class="feat-tag">Calendly Integration</span><span class="feat-tag">Multi-doctor</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.2" stroke="currentColor" stroke-width="2"/><path d="M6.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M18.5 5.5h4M20.5 3.5v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
      <h3 class="feat-title">Doctor & Specialist Profiles</h3>
      <p class="feat-desc">Full professional bio pages for every doctor and specialist — with qualifications, MDCN registration, specialisms, professional memberships, research and publications, languages spoken, and a direct booking link. Patients choose doctors before they choose clinics — these pages are your most important conversion pages.</p>
      <div class="feat-tags"><span class="feat-tag">Professional Bios</span><span class="feat-tag">Credentials</span><span class="feat-tag">MDCN Display</span><span class="feat-tag">Person Schema</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M5 20V6.5A1.5 1.5 0 0 1 6.5 5H17a2 2 0 0 1 2 2v13" stroke="currentColor" stroke-width="2"/><path d="M9 5V3m6 2V3M9 10h2m-2 4h2m4-4h2m-2 4h2M10 20v-4h4v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
      <h3 class="feat-title">Individual Medical Service Pages</h3>
      <p class="feat-desc">A dedicated page for every medical service and speciality — explaining the condition or procedure, what to expect, preparation requirements, recovery, and costs. Patient-friendly language, not medical jargon. Each page is an SEO landing page targeting specific medical keyword combinations that patients actually search.</p>
      <div class="feat-tags"><span class="feat-tag">Patient-friendly Copy</span><span class="feat-tag">Procedure Info</span><span class="feat-tag">Pricing Guides</span><span class="feat-tag">Keyword Optimised</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 3 5 6v5c0 4.8 2.9 8.9 7 10 4.1-1.1 7-5.2 7-10V6l-7-3Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="m9.5 12 1.8 1.8 3.8-3.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
      <h3 class="feat-title">Secure Patient Contact & Data Handling</h3>
      <p class="feat-desc">All patient enquiry forms and data submission are SSL-encrypted and handled under privacy-by-design principles. GDPR-compliant cookie notices, minimal data collection philosophy, appropriate privacy policy language, and secure form submission with automated acknowledgement emails — meeting the trust expectations of healthcare patients.</p>
      <div class="feat-tags"><span class="feat-tag">SSL Encrypted</span><span class="feat-tag">GDPR Notices</span><span class="feat-tag">Privacy Policy</span><span class="feat-tag">Secure Forms</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M5 7.5A2.5 2.5 0 0 1 7.5 5H19v11.5A2.5 2.5 0 0 1 16.5 19H7.5A2.5 2.5 0 0 1 5 16.5v-9Z" stroke="currentColor" stroke-width="2"/><path d="M8.5 9.5h7M8.5 12.5h7M8.5 15.5h4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
      <h3 class="feat-title">Patient Education Blog & Health Content</h3>
      <p class="feat-desc">A fully managed WordPress health content section for publishing articles on conditions, treatments, preventive care, and health tips. Each article builds topical authority in your specialities — helping Google recognise your clinic as a credible medical source — and attracts organic traffic from patients searching for health information.</p>
      <div class="feat-tags"><span class="feat-tag">Health Blog</span><span class="feat-tag">Patient Education</span><span class="feat-tag">SEO Authority</span><span class="feat-tag">E-E-A-T Compliant</span></div>
    </div>

    <div class="feat-card reveal">
      <div class="feat-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 20s6-5.5 6-10a6 6 0 1 0-12 0c0 4.5 6 10 6 10Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.2" stroke="currentColor" stroke-width="2"/></svg></div>
      <h3 class="feat-title">Location Pages & Emergency Information</h3>
      <p class="feat-desc">Clear location pages for every branch with Google Maps embed, parking information, public transport directions, and opening hours. Prominent emergency contact display across all pages — a persistent phone number and emergency department location visible at all times. Telemedicine information where applicable.</p>
      <div class="feat-tags"><span class="feat-tag">Google Maps</span><span class="feat-tag">Opening Hours</span><span class="feat-tag">Emergency Contact</span><span class="feat-tag">Telemedicine</span></div>
    </div>

  </div>
</section>

<!-- ═══ BOOKING SECTION ═══ -->
<section class="booking-section" aria-labelledby="booking-heading">
  <div class="booking-layout">
    <div class="booking-copy reveal">
      <span class="s-label" style="color:var(--gold)">Online Appointment Booking</span>
      <h2 class="s-head" style="color:var(--white)" id="booking-heading">Your appointment book fills<br>while your clinic <em>sleeps</em></h2>
      <p>The most transformative change in healthcare patient acquisition is the shift from phone-only booking to 24/7 online scheduling. Patients searching for a doctor at 10pm on a Saturday can book with your clinic immediately — or they will book with a competitor who offers online scheduling.</p>
      <p>We build appointment booking systems that integrate directly into your existing workflow. When a patient books online, your team sees the appointment in their existing schedule, gets an automated notification, and the patient receives an immediate confirmation email with all the details they need. No admin calls, no double bookings, no missed enquiries.</p>
      <ul class="bullets">
        <li>Real-time slot availability — patients only see times that are actually open</li>
        <li>Multi-doctor, multi-speciality booking — patients select their preferred doctor or department</li>
        <li>Appointment type selection — new patient, follow-up, specific procedure, urgent care</li>
        <li>Automatic confirmation emails with appointment details, directions, and preparation notes</li>
        <li>Reminder emails 24 hours and 2 hours before the appointment — reducing no-shows</li>
        <li>Cancellation and rescheduling flow that returns slots to availability automatically</li>
        <li>Integration with Calendly, Google Calendar, or existing PMS on request</li>
      </ul>
      <a href="#contact" class="booking-cta">Build My Booking System →</a>
    </div>

    <!-- Booking widget demo -->
    <div class="reveal">
      <div class="booking-widget">
        <div class="bw-head">
          <div class="bw-title">Book an Appointment</div>
          <div class="bw-sub">Lagos Medical Group · Available online 24/7</div>
        </div>
        <div class="bw-body">

          <!-- Step 1: Select doctor -->
          <div class="bw-step">
            <div class="bw-step-label">1. Select Specialist</div>
            <div class="bw-doctors">
              <div class="bw-doc active">
                <div class="bw-doc-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.2" stroke="currentColor" stroke-width="2"/><path d="M6.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
                <div><div class="bw-doc-name">Dr. Adeyemi</div><div class="bw-doc-spec">Cardiology</div></div>
              </div>
              <div class="bw-doc">
                <div class="bw-doc-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.2" stroke="currentColor" stroke-width="2"/><path d="M6.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
                <div><div class="bw-doc-name">Dr. Okafor</div><div class="bw-doc-spec">Paediatrics</div></div>
              </div>
              <div class="bw-doc">
                <div class="bw-doc-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3.2" stroke="currentColor" stroke-width="2"/><path d="M6.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></div>
                <div><div class="bw-doc-name">Dr. Bello</div><div class="bw-doc-spec">Surgery</div></div>
              </div>
            </div>
          </div>

          <!-- Step 2: Select date -->
          <div class="bw-step">
            <div class="bw-step-label">2. Choose Date — June 2025</div>
            <div class="bw-calendar">
              <div class="bw-day-head">Mo</div><div class="bw-day-head">Tu</div><div class="bw-day-head">We</div><div class="bw-day-head">Th</div><div class="bw-day-head">Fr</div><div class="bw-day-head">Sa</div><div class="bw-day-head">Su</div>
              <div class="bw-day past">2</div><div class="bw-day past">3</div><div class="bw-day past">4</div><div class="bw-day past">5</div><div class="bw-day past">6</div><div class="bw-day past">7</div><div class="bw-day past">8</div>
              <div class="bw-day available">9</div><div class="bw-day available">10</div><div class="bw-day selected">11</div><div class="bw-day available">12</div><div class="bw-day available">13</div><div class="bw-day">14</div><div class="bw-day">15</div>
              <div class="bw-day available">16</div><div class="bw-day available">17</div><div class="bw-day available">18</div><div class="bw-day available">19</div><div class="bw-day available">20</div><div class="bw-day">21</div><div class="bw-day">22</div>
            </div>
          </div>

          <!-- Step 3: Select time -->
          <div class="bw-step">
            <div class="bw-step-label">3. Available Times — Wed 11 June</div>
            <div class="bw-times">
              <div class="bw-time">08:00</div>
              <div class="bw-time">09:30</div>
              <div class="bw-time sel">10:00</div>
              <div class="bw-time">11:30</div>
              <div class="bw-time">14:00</div>
              <div class="bw-time">15:30</div>
            </div>
          </div>

          <button class="bw-confirm">Confirm Appointment →</button>
          <div class="bw-note"><svg viewBox="0 0 24 24" fill="none"><path d="M12 3 5 6v5c0 4.8 2.9 8.9 7 10 4.1-1.1 7-5.2 7-10V6l-7-3Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="m9.5 12 1.8 1.8 3.8-3.8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Your information is securely encrypted</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SPECIALITIES ═══ -->
<section class="spec-section" aria-labelledby="spec-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Specialities We Serve</span>
      <h2 class="s-head" id="spec-heading">We build for every<br><em>medical speciality</em></h2>
    </div>
    <p>Every medical discipline has different patient journeys, trust signals, and keyword opportunities. We have built websites across the full range of healthcare specialities — each designed around the specific needs of that practice type and its patients.</p>
  </div>
  <div class="spec-grid">
    <div class="spec-card reveal">
      <span class="spec-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M5 20V6.5A1.5 1.5 0 0 1 6.5 5H17a2 2 0 0 1 2 2v13" stroke="currentColor" stroke-width="2"/><path d="M9 5V3m6 2V3M9 10h2m-2 4h2m4-4h2m-2 4h2M10 20v-4h4v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <div class="spec-name">General Practice & Primary Care</div>
      <p class="spec-desc">Family health clinics, walk-in centres, and GP surgeries. Patient registration, appointment booking, repeat prescriptions, and health screening services.</p>
    </div>
    <div class="spec-card reveal">
      <span class="spec-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M7 7.5c0-2.5 2.1-4.5 5-4.5s5 2 5 4.5c0 1.6-.8 3-2.1 3.9l-2.9 1.9-2.9-1.9A4.7 4.7 0 0 1 7 7.5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M9.5 13.2 8 20m6.5-6.8L16 20" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <div class="spec-name">Dental Surgery & Oral Health</div>
      <p class="spec-desc">Dental clinic websites with treatment galleries, before/after photo cases, dental service pages, and patient-friendly cost guides for nervous first-timers.</p>
    </div>
    <div class="spec-card reveal">
      <span class="spec-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="8" r="3" stroke="currentColor" stroke-width="2"/><path d="M7 19a5 5 0 0 1 10 0M5 11.5a2 2 0 1 0 0 4m14-4a2 2 0 1 1 0 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <div class="spec-name">Paediatrics & Child Health</div>
      <p class="spec-desc">Child-friendly website design for paediatric practices — warm visual language, vaccination schedules, developmental milestone content, and parent-focused communication.</p>
    </div>
    <div class="spec-card reveal">
      <span class="spec-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 20s-6-3.6-6-9a3.5 3.5 0 0 1 6-2.5A3.5 3.5 0 0 1 18 11c0 5.4-6 9-6 9Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></span>
      <div class="spec-name">Cardiology & Heart Health</div>
      <p class="spec-desc">Authoritative websites for cardiologists and cardiac centres — condition explainers, procedure information, cardiac screening packages, and specialist profile showcases.</p>
    </div>
    <div class="spec-card reveal">
      <span class="spec-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M9 5.5A2.5 2.5 0 0 1 13 7v10a2.5 2.5 0 0 1-4 1.9A2.7 2.7 0 0 1 5 16.5c0-1 .4-1.8 1-2.4A3.4 3.4 0 0 1 6 9a3.5 3.5 0 0 1 3-3.5Zm6 0A3.5 3.5 0 0 1 18 9c0 .7-.2 1.4-.6 2 .7.6 1.1 1.5 1.1 2.5a2.7 2.7 0 0 1-1.5 2.4A2.5 2.5 0 0 1 13 17V7a2.5 2.5 0 0 1 2-1.5Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></span>
      <div class="spec-name">Mental Health & Psychology</div>
      <p class="spec-desc">Compassionate, discreet website design for mental health clinics and therapists — emphasising safety, confidentiality, and the first-step reassurance that anxious patients need.</p>
    </div>
    <div class="spec-card reveal">
      <span class="spec-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M2.5 12S6 6.5 12 6.5 21.5 12 21.5 12 18 17.5 12 17.5 2.5 12 2.5 12Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="12" cy="12" r="2.5" stroke="currentColor" stroke-width="2"/></svg></span>
      <div class="spec-name">Eye Clinics & Optometry</div>
      <p class="spec-desc">Visual-led websites for eye care providers — LASIK information, frame galleries, eye test booking, and condition pages for cataracts, glaucoma, and refractive errors.</p>
    </div>
    <div class="spec-card reveal">
      <span class="spec-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M4 9v6M7 7v10M17 7v10M20 9v6M7 12h10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <div class="spec-name">Physiotherapy & Rehabilitation</div>
      <p class="spec-desc">Exercise video embeds, condition-specific treatment pages, sports injury recovery content, and self-referral booking — for physio practices and sports medicine clinics.</p>
    </div>
    <div class="spec-card reveal">
      <span class="spec-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M10 3v4l-3.5 5.5A4 4 0 0 0 9.9 19h4.2a4 4 0 0 0 3.4-6.5L14 7V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.5 11h7" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <div class="spec-name">Diagnostic Centres & Laboratories</div>
      <p class="spec-desc">Test catalogue pages with turnaround times, result delivery information, home sample collection booking, and corporate health screening packages.</p>
    </div>
  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Healthcare SEO</span>
      <h2 class="s-head" id="seo-heading">Rank when patients search<br>for <em>care in your area</em></h2>
    </div>
    <p>Medical SEO is one of the most specialised areas of search engine optimisation. Google applies its highest content quality standards — E-E-A-T (Experience, Expertise, Authoritativeness, Trustworthiness) — to healthcare content. This means medical websites must demonstrate genuine clinical credentials, authoritative content, and clear patient safety information to rank well. We build all of this into every healthcare website from the ground up.</p>
  </div>
  <div class="seo-layout">
    <div class="seo-copy reveal">
      <p>Every clinic website we build includes a complete healthcare SEO foundation. MedicalClinic and LocalBusiness schema markup tells Google exactly what your clinic does, where it is, and which specialities you offer. Physician schema for each doctor tells Google the credentials, specialisms, and affiliations of your medical team — contributing directly to E-E-A-T scores.</p>
      <p>Individual service pages targeting local keyword combinations — "cardiologist Lagos", "private GP Lekki", "paediatrician Abuja" — give each speciality its own ranking opportunity. Location pages targeting neighbourhood searches ensure you appear for patients searching in your immediate catchment area.</p>
      <ul class="bullets" style="color:var(--g700)">
        <li>MedicalClinic JSON-LD schema on all clinic pages</li>
        <li>Physician schema for every doctor profile — qualifications, specialisms, affiliations</li>
        <li>Individual service pages targeting "[speciality] [city]" keyword combinations</li>
        <li>Google Business Profile optimisation for local map pack rankings</li>
        <li>E-E-A-T signals — author credentials, review dates, clinical source citations</li>
        <li>Patient review acquisition strategy — Google and NHS/LASG review platform integration</li>
        <li>Health blog targeting common patient search queries in your specialities</li>
        <li>Google Search Console and Analytics 4 setup from launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get a Healthcare SEO Audit →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Medical Clinic — Keyword Rankings (After Campaign)</div>
        <div style="padding:1rem">
          <div class="kw-row"><span class="kw-term">private clinic lagos</span><span class="kw-vol">3,200/mo</span><span class="kw-pos top3">▲ #1</span></div>
          <div class="kw-row"><span class="kw-term">paediatrician lekki</span><span class="kw-vol">1,800/mo</span><span class="kw-pos top3">▲ #2</span></div>
          <div class="kw-row"><span class="kw-term">cardiologist lagos</span><span class="kw-vol">1,400/mo</span><span class="kw-pos top3">▲ #3</span></div>
          <div class="kw-row"><span class="kw-term">dental clinic victoria island</span><span class="kw-vol">1,100/mo</span><span class="kw-pos top10">▲ #4</span></div>
          <div class="kw-row"><span class="kw-term">physiotherapist abuja</span><span class="kw-vol">880/mo</span><span class="kw-pos top10">▲ #5</span></div>
          <div class="kw-row"><span class="kw-term">eye clinic near me lagos</span><span class="kw-vol">760/mo</span><span class="kw-pos top3">▲ #2</span></div>
          <div class="kw-row"><span class="kw-term">diagnostic centre lekki</span><span class="kw-vol">640/mo</span><span class="kw-pos top10">▲ #3</span></div>
          <div class="kw-row"><span class="kw-term">mental health clinic nigeria</span><span class="kw-vol">520/mo</span><span class="kw-pos top3">▲ #1</span></div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.72rem;color:var(--g400);font-style:italic;text-align:center">Representative keyword rankings — Nigerian healthcare SEO campaign</div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Process</span>
      <h2 class="s-head" id="process-heading">From brief to live clinic website<br>in <em>five structured steps</em></h2>
    </div>
    <p>Healthcare website projects require careful attention to patient privacy, content accuracy, and trust signal design. Our process handles all of it — delivering a website your clinical team can be proud of and your patients can trust.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Clinical Content Mapping</div>
      <p class="proc-desc">A structured discovery session covering your specialities, doctor roster, patient demographic, competitive landscape, accreditations, and digital goals. We map your complete site architecture — service pages per speciality, doctor profiles, location pages, and keyword targets — and agree on it in writing. We also discuss the appointment booking integration requirements and your existing practice management tools.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Session</span><span class="proc-tag">Service Mapping</span><span class="proc-tag">Keyword Strategy</span><span class="proc-tag">Booking Integration Plan</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Trust-First Design</div>
      <p class="proc-desc">High-fidelity Figma designs for all key pages — Homepage, Services, Individual Service pages, Doctor Profiles, Appointment Booking, About, and Contact. Healthcare design follows strict visual principles: clinical but warm, authoritative but approachable, and rigidly accessibility-compliant (WCAG 2.1 AA). Credential display, trust signals, and emergency contact placement are all designed with patient psychology in mind. Two revision rounds included.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">WCAG 2.1 AA</span><span class="proc-tag">Trust Signal Layout</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">WordPress Build & Booking Integration</div>
      <p class="proc-desc">Custom PHP WordPress theme built without page builders. ACF Pro drives doctor profiles, service pages, testimonials, and facility galleries — all self-manageable without developer access. The appointment booking system is integrated and tested end-to-end: slot creation, patient submission, confirmation emails, and admin notifications. Privacy notices, cookie consent, and data handling disclaimers are configured to appropriate standards.</p>
      <div class="proc-tags"><span class="proc-tag">Custom Theme</span><span class="proc-tag">ACF Doctor Profiles</span><span class="proc-tag">Booking System</span><span class="proc-tag">Privacy Compliance</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">Healthcare SEO & Content Entry</div>
      <p class="proc-desc">Full SEO setup across all pages: MedicalClinic and Physician schema markup, title tag and meta description optimisation, Google Business Profile update, XML sitemap submission, and Google Search Console and Analytics 4 configuration. Content populated and reviewed for E-E-A-T compliance — author credentials displayed, clinical source references included, and content review dates set.</p>
      <div class="proc-tags"><span class="proc-tag">MedicalClinic Schema</span><span class="proc-tag">Physician Schema</span><span class="proc-tag">E-E-A-T Setup</span><span class="proc-tag">GBP Optimisation</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA, Accessibility Audit & Launch</div>
      <p class="proc-desc">Cross-device QA testing including screen reader compatibility and keyboard navigation testing for WCAG 2.1 AA compliance. Booking system end-to-end test — patient submits, confirmation delivered, staff notified. PageSpeed audit targeting 90+ on mobile. All patient-facing forms tested for data handling, confirmation, and error messages. Launch day: DNS cutover, SSL verification, and 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Accessibility Audit</span><span class="proc-tag">Booking System Test</span><span class="proc-tag">PageSpeed 90+</span><span class="proc-tag">30-Day Support</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly SEO, Content & Maintenance</div>
      <p class="proc-desc">An optional monthly retainer covering healthcare SEO — publishing patient education articles that build topical authority, optimising service pages for new keyword opportunities, building medical directory citations, monitoring Core Web Vitals, and keeping WordPress and all plugins updated and secure. Monthly ranking report included.</p>
      <div class="proc-tags"><span class="proc-tag">Health Content</span><span class="proc-tag">Citation Building</span><span class="proc-tag">Monthly Rankings</span><span class="proc-tag">Security Updates</span></div>
    </div>

  </div>
</section>

<!-- ═══ TRUST STATS ═══ -->
<section class="stats-section" aria-labelledby="stats-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why i2Medier</span>
      <h2 class="s-head" id="stats-heading">Numbers that build<br>confidence in <em>our work</em></h2>
    </div>
    <p>We have delivered professional websites across healthcare, professional services, and technology — building measurable outcomes that matter to business owners and their patients.</p>
  </div>
  <div class="stats-grid">
    <div class="stat-card reveal">
      <span class="stat-ico"><svg viewBox="0 0 24 24" fill="none"><rect x="3.5" y="5" width="17" height="15" rx="2.5" stroke="currentColor" stroke-width="2"/><path d="M8 3.5v3M16 3.5v3M3.5 9.5h17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <div class="stat-num"><span class="counter" data-target="40">0</span><span>%</span></div>
      <div class="stat-label">Reduction in no-show appointments reported by clinic clients who implemented online booking with automated reminder emails</div>
    </div>
    <div class="stat-card reveal">
      <span class="stat-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M4 17.5 9 12l3 3 8-8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 7h5v5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
      <div class="stat-num"><span class="counter" data-target="4">0</span><span>×</span></div>
      <div class="stat-label">Increase in new patient enquiries within 6 months of launching a new clinic website with our healthcare SEO foundation</div>
    </div>
    <div class="stat-card reveal">
      <span class="stat-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M13 2 5 13h5l-1 9 8-11h-5l1-9Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg></span>
      <div class="stat-num"><span class="counter" data-target="94">0</span></div>
      <div class="stat-label">Average Google PageSpeed score (mobile) on our healthcare websites — fast enough to retain the anxious, time-pressured patient</div>
    </div>
    <div class="stat-card reveal">
      <span class="stat-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="11" cy="11" r="6.5" stroke="currentColor" stroke-width="2"/><path d="m16 16 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></span>
      <div class="stat-num">#<span class="counter" data-target="1">0</span></div>
      <div class="stat-label">Google ranking achieved for "private clinic [city]" target keywords within 90 days for multiple Nigerian healthcare clients</div>
    </div>
    <div class="stat-card reveal">
      <span class="stat-ico"><svg viewBox="0 0 24 24" fill="none"><path d="M12 3a9 9 0 1 0 0 18 9 9 0 0 0 0-18Z" stroke="currentColor" stroke-width="2"/><path d="M3.5 12h17M12 3c2.3 2.3 3.5 5.5 3.5 9S14.3 18.7 12 21c-2.3-2.3-3.5-5.5-3.5-9S9.7 5.3 12 3Z" stroke="currentColor" stroke-width="2"/></svg></span>
      <div class="stat-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="stat-label">Professional websites delivered for clients in Nigeria, the UK, and internationally — all custom built, zero templates or page builders</div>
    </div>
    <div class="stat-card reveal">
      <span class="stat-ico"><svg viewBox="0 0 24 24" fill="none"><circle cx="13" cy="5" r="2" stroke="currentColor" stroke-width="2"/><path d="M11 8h3l2 3h-3l1.5 8H12l-1-5-2 2H6.5M10.5 11 8 12.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
      <div class="stat-num">WCAG</div>
      <div class="stat-label">Every healthcare website we build is tested for WCAG 2.1 AA accessibility compliance — ensuring patients with disabilities can access your services</div>
    </div>
  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Healthcare websites we've<br><em>built and launched</em></h2>
    </div>
    <p>Each built from scratch for the specific clinical context, patient audience, and SEO opportunity of that practice.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#021a2a 0%,#062a3a 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Lagos Medical Group</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.75rem">Multi-speciality Clinic · Lagos</div>
            <div style="display:flex;gap:.4rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">15 Doctors</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Online Booking</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">HEFAMAA</span>
            </div>
          </div>
        </div>
        <div class="port-overlay"><span class="port-badge">Multi-speciality Clinic</span></div>
      </div>
      <div class="port-body">
        <div class="port-type">Multi-speciality Clinic · Lagos, Nigeria</div>
        <div class="port-title">Lagos Medical Group</div>
        <p class="port-desc">15-doctor multi-speciality clinic website with individual doctor profiles, online appointment booking, service pages for 8 specialities, and an SEO campaign reaching #1 for "private clinic Lagos" within 90 days.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a0a1a 0%,#2a1040 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">BrightSmile Dental</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.75rem">Dental Clinic · Abuja</div>
            <div style="display:flex;gap:.4rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Before/After</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Treatment Gallery</span>
            </div>
          </div>
        </div>
        <div class="port-overlay"><span class="port-badge">Dental Clinic</span></div>
      </div>
      <div class="port-body">
        <div class="port-type">Dental Clinic · Abuja, Nigeria</div>
        <div class="port-title">BrightSmile Dental Care</div>
        <p class="port-desc">Dental clinic website with full treatment gallery, before/after case studies, patient-friendly procedure guides, cost transparency pages, and anxiety-reassurance content for nervous patients — ranked #1 for "dentist Abuja".</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a1a28 0%,#0e2c40 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Jayach Care Services</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.75rem">Caregiver Services · UK</div>
            <div style="display:flex;gap:.4rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">CQC Registered</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">NHS Funded</span>
            </div>
          </div>
        </div>
        <div class="port-overlay"><span class="port-badge">Healthcare · UK</span></div>
      </div>
      <div class="port-body">
        <div class="port-type">Caregiver Services · United Kingdom</div>
        <div class="port-title">Jayach Care Services</div>
        <p class="port-desc">UK-based caregiver agency website with CQC registration display, service area pages, staff profiles, carer recruitment section, and enquiry forms — built to communicate trust to both clients and families of care recipients.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Clinic website packages<br>for every <em>practice size</em></h2>
    </div>
    <p>Every project is quoted individually after a free consultation. These ranges reflect typical scope — your detailed, itemised quote will be provided before any commitment is made.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Solo Practitioners & Small Clinics</div>
        <div class="price-name">Essential Clinic Site</div>
        <p class="price-tagline">A professional, trust-first clinic website with service pages, doctor profiles, and appointment booking.</p>
        <div class="price-amount">₦400k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Up to 8 pages</div>
        <div class="price-feat">Custom WordPress theme</div>
        <div class="price-feat">Up to 3 doctor profiles</div>
        <div class="price-feat">Appointment booking form</div>
        <div class="price-feat">Full SEO + MedicalClinic schema</div>
        <div class="price-feat">Emergency contact display</div>
        <div class="price-feat">WCAG 2.1 AA accessibility</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Real-time booking system</div>
        <div class="price-feat no">Patient health blog</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Clinic Website</div>
        <p class="price-tagline">A full-featured clinic website with real-time booking, full doctor profiles, speciality pages, and healthcare SEO.</p>
        <div class="price-amount">₦800k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Up to 20 pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Real-time appointment booking</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Unlimited doctor profiles</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Individual service/speciality pages</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Patient health blog CMS</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + Physician schema</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Google Business Profile setup</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">CMS training session</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Hospitals & Multi-Site Groups</div>
        <div class="price-name">Hospital Platform</div>
        <p class="price-tagline">A comprehensive healthcare platform for hospitals, multi-speciality groups, and chains with patient portals.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Unlimited pages & specialities</div>
        <div class="price-feat">Patient portal & login</div>
        <div class="price-feat">Test result access portal</div>
        <div class="price-feat">Multi-branch location pages</div>
        <div class="price-feat">Insurance & HMO integration info</div>
        <div class="price-feat">Telemedicine consultation booking</div>
        <div class="price-feat">PMS API integration</div>
        <div class="price-feat">GDPR / NDPR compliance audit</div>
        <div class="price-feat">90-day support & SLA</div>
        <div class="price-feat">Monthly SEO retainer available</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn solid">Request a Proposal →</a></div>
    </div>

  </div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What healthcare clients say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg></div>
      <p class="test-quote">"Since we launched the new website, new patient enquiries have quadrupled. The online booking system alone has saved my reception team at least three hours of phone work every day. Patients now book at midnight on Sundays — appointments we would have missed entirely before. It has transformed how the clinic runs."</p>
      <div class="test-author">
        <div class="test-avatar">K</div>
        <div><div class="test-name">Dr. Kunle Adeyemi</div><div class="test-role">Medical Director · Lagos Medical Group</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg></div>
      <p class="test-quote">"Patients keep telling us they chose us because of our website — specifically because our before/after cases and treatment guides made them feel confident about what to expect. That was not happening before. The investment in a proper dental website has genuinely changed the quality of patient we attract."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Dr. Amara Obi BDS</div><div class="test-role">Principal Dentist · BrightSmile Dental, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg><svg viewBox="0 0 24 24" fill="currentColor"><path d="m12 3.8 2.5 5.1 5.6.8-4.1 4 1 5.7-5-2.6-5 2.6 1-5.7-4.1-4 5.6-.8L12 3.8Z"/></svg></div>
      <p class="test-quote">"We were worried about how to present a healthcare service in a way that builds trust with families making very sensitive decisions about care for their loved ones. i2Medier understood the emotional register completely — the website is warm and professional and it clearly communicates our CQC registration. We are now the top result for caregiver services in our area."</p>
      <div class="test-author">
        <div class="test-avatar">J</div>
        <div><div class="test-name">Founder & Director</div><div class="test-role">Jayach Care Services, UK</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ COMPARISON ═══ -->
<section class="compare-section" aria-labelledby="compare-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why Not Generic</span>
      <h2 class="s-head" id="compare-heading">i2Medier vs your<br><em>other options</em></h2>
    </div>
    <p>Generic website builders and non-specialist developers lack the healthcare-specific design patterns, SEO standards, and patient trust architecture that medical websites demand.</p>
  </div>
  <table class="compare-table reveal">
    <thead>
      <tr>
        <th>Feature</th>
        <th>Wix / Website Builder</th>
        <th class="hl">i2Medier Custom Build</th>
        <th>Generic Developer</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="feature">Healthcare-specific design patterns</td>
        <td><span class="no"><svg viewBox="0 0 24 24" fill="none"><path d="M6 6 18 18M18 6 6 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>Generic templates</span></td>
        <td class="hl"><span class="yes"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Medical trust architecture</span></td>
        <td><span class="maybe"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4 3.5 19h17L12 4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M12 9v4m0 3h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Unlikely without health exp.</span></td>
      </tr>
      <tr>
        <td class="feature">MedicalClinic + Physician schema</td>
        <td><span class="no"><svg viewBox="0 0 24 24" fill="none"><path d="M6 6 18 18M18 6 6 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>Not available</span></td>
        <td class="hl"><span class="yes"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>On every relevant page</span></td>
        <td><span class="no"><svg viewBox="0 0 24 24" fill="none"><path d="M6 6 18 18M18 6 6 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>Rarely implemented</span></td>
      </tr>
      <tr>
        <td class="feature">Real-time appointment booking</td>
        <td><span class="maybe"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4 3.5 19h17L12 4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M12 9v4m0 3h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>3rd-party widget only</span></td>
        <td class="hl"><span class="yes"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Custom-integrated system</span></td>
        <td><span class="maybe"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4 3.5 19h17L12 4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M12 9v4m0 3h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Extra cost, rarely done well</span></td>
      </tr>
      <tr>
        <td class="feature">WCAG 2.1 AA accessibility compliance</td>
        <td><span class="maybe"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4 3.5 19h17L12 4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M12 9v4m0 3h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Partial at best</span></td>
        <td class="hl"><span class="yes"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Audited on every build</span></td>
        <td><span class="no"><svg viewBox="0 0 24 24" fill="none"><path d="M6 6 18 18M18 6 6 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>Rarely tested</span></td>
      </tr>
      <tr>
        <td class="feature">E-E-A-T content standards for health</td>
        <td><span class="no"><svg viewBox="0 0 24 24" fill="none"><path d="M6 6 18 18M18 6 6 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>No guidance provided</span></td>
        <td class="hl"><span class="yes"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Built into every service page</span></td>
        <td><span class="no"><svg viewBox="0 0 24 24" fill="none"><path d="M6 6 18 18M18 6 6 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>Usually unknown</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed 90+</td>
        <td><span class="no"><svg viewBox="0 0 24 24" fill="none"><path d="M6 6 18 18M18 6 6 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>Typically 35–60</span></td>
        <td class="hl"><span class="yes"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Guaranteed target</span></td>
        <td><span class="maybe"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4 3.5 19h17L12 4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M12 9v4m0 3h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Rarely achieved</span></td>
      </tr>
      <tr>
        <td class="feature">Full code ownership on delivery</td>
        <td><span class="no"><svg viewBox="0 0 24 24" fill="none"><path d="M6 6 18 18M18 6 6 18" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>Platform-locked forever</span></td>
        <td class="hl"><span class="yes"><svg viewBox="0 0 24 24" fill="none"><path d="m5 12 5 5L20 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>Unconditional transfer</span></td>
        <td><span class="maybe"><svg viewBox="0 0 24 24" fill="none"><path d="M12 4 3.5 19h17L12 4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M12 9v4m0 3h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>Often withheld</span></td>
      </tr>
    </tbody>
  </table>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free clinic website review<br>for your practice</h2>
    <p>We'll audit your current website, identify what's costing you patients, and show you exactly how we'd fix it. No obligation required.</p>
  </div>
  <div>
    <a href="#contact" class="btn-white-solid">Book a Free Review →</a>
  </div>
</div>

<!-- ═══ LONG-FORM CONTENT ═══ -->
<section class="content-section" aria-labelledby="content-heading">
  <div class="two-col-intro" style="margin-bottom:2rem">
    <div>
      <span class="s-label">The Complete Guide</span>
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>clinic & healthcare web design</em></h2>
    </div>
    <p>A comprehensive guide to building a medical website that ranks on Google, builds patient trust, and supports efficient appointment management — written specifically for Nigerian and UK healthcare providers.</p>
  </div>
  <div class="content-layout">

    <article class="content-body">

      <h2>Why healthcare websites are different from all other websites</h2>
      <p>When someone visits a retail website and has a poor experience, they lose confidence in a brand. When someone visits a healthcare website and has a poor experience, they may delay seeking medical care, choose an inferior provider, or — in the worst case — not get care they urgently need. The stakes of a healthcare website are fundamentally higher than in any other industry.</p>
      <p>Google recognises this. Its Search Quality Evaluator Guidelines apply the concept of "Your Money or Your Life" (YMYL) to healthcare content — meaning any page that could directly affect a user's health, safety, or wellbeing is held to a significantly higher standard. Specifically, medical content must demonstrate strong E-E-A-T: Experience, Expertise, Authoritativeness, and Trustworthiness.</p>
      <p>For a healthcare provider, this means your website must not only look professional — it must provide genuine clinical credentials, authoritative service content, clear practitioner qualifications, and transparent patient safety information. This is not simply a design requirement. It is an SEO requirement. Medical websites that fail these standards rank poorly on Google regardless of their technical performance.</p>

      <h2>The critical role of online appointment booking in modern healthcare</h2>
      <p>The adoption of online appointment booking in Nigerian healthcare is accelerating rapidly. The COVID-19 pandemic accelerated digital health adoption, and patients who experienced the convenience of digital-first interactions in other sectors now expect the same from their healthcare providers.</p>
      <p>Research consistently shows that <strong>40–60% of online appointment bookings happen outside business hours</strong> — evenings and weekends. A phone-only booking system is structurally incapable of capturing this demand. Every patient who tries to book at 9pm and finds only a phone number either books with a competitor who offers online scheduling or simply does not book at all.</p>
      <p>Beyond accessibility, online booking systems also reduce clinical administration load. Staff spend fewer hours on the phone managing appointments and more time on direct patient care. Automated reminder emails reduce no-shows by an average of 30–40%. The operational benefit of a well-implemented booking system often exceeds its patient acquisition benefit within 6 months of launch.</p>

      <h2>Healthcare SEO in Nigeria — what you need to know</h2>
      <p>Medical SEO in Nigeria is a combination of local search optimisation and medical content authority building — two strategies that reinforce each other over time. Patients searching for medical care use highly specific search terms: they are not looking for information, they are looking for a provider to trust with their health.</p>

      <h3>Local search is the primary channel</h3>
      <p>The most valuable patient acquisition search queries are location-specific: "private clinic Lagos", "paediatrician Lekki", "dentist near me Abuja". These searches have high intent — the person searching is typically ready to book an appointment. Ranking for them requires <strong>Google Business Profile optimisation</strong> (for the local map pack), <strong>LocalBusiness and MedicalClinic schema markup</strong>, and <strong>location-specific service page content</strong>.</p>

      <h3>Specialty content builds long-term authority</h3>
      <p>Patient education content — articles explaining conditions, procedures, and what to expect — builds long-term SEO authority in your clinical specialities. Each article targets a different patient search query ("what is a coronary angiogram", "how much does a dental implant cost in Nigeria", "symptoms of diabetes in children") and brings a warm, interested visitor to your website at the start of their healthcare journey.</p>
      <p>For Nigerian healthcare providers, this content opportunity is particularly significant. Patient health literacy search volume is high and competition from local providers is currently low — meaning well-written, clinically authoritative content can achieve strong rankings relatively quickly.</p>

      <h2>How much does a clinic website cost in Nigeria?</h2>
      <p>As a general guide for Nigerian healthcare providers:</p>
      <ul>
        <li><strong>Essential clinic site</strong> (solo practitioner, 6–8 pages, booking form): ₦400,000–₦600,000</li>
        <li><strong>Growth clinic website</strong> (multi-doctor, real-time booking, speciality pages, health blog): ₦800,000–₦1.5M</li>
        <li><strong>Hospital platform</strong> (patient portal, multi-speciality, PMS integration): ₦2M+</li>
      </ul>
      <p>Monthly hosting for a well-configured clinic website typically costs ₦12,000–₦30,000 depending on traffic. An optional monthly SEO and maintenance retainer starts from ₦150,000/month. The average well-designed clinic website recoups its investment through new patient bookings within 3–4 months of launch for active SEO campaigns.</p>

    </article>

    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free clinic website review and proposal for your practice.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Review →</a>
      </div>
      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why clinic websites lose patients</a></li>
          <li><a href="#features-heading" class="toc-link">Features every site needs</a></li>
          <li><a href="#booking-heading" class="toc-link">Online appointment booking</a></li>
          <li><a href="#spec-heading" class="toc-link">Medical specialities we serve</a></li>
          <li><a href="#seo-heading" class="toc-link">Healthcare SEO</a></li>
          <li><a href="#process-heading" class="toc-link">Our 5-step process</a></li>
          <li><a href="#pricing" class="toc-link">Pricing</a></li>
          <li><a href="#faq-heading" class="toc-link">FAQ</a></li>
          <li><a href="#contact" class="toc-link">Get a free quote</a></li>
        </ul>
      </nav>
    </aside>

  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section class="faq-section" aria-labelledby="faq-heading">
  <div class="two-col-intro" style="margin-bottom:0">
    <div>
      <span class="s-label">FAQ</span>
      <h2 class="s-head" id="faq-heading">Questions about clinic<br><em>website design</em></h2>
    </div>
    <p>Every practice is different. Here are the questions we hear most often from healthcare clients — and honest answers to each.</p>
  </div>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Email us and we'll give you a direct, honest answer specific to your clinic or practice — no sales pressure, no waiting.</p>
      <a href="mailto:hello@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">How much does a clinic website cost in Nigeria?<span class="faq-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg></span></button>
        <div class="faq-a" id="f1">Clinic websites start from ₦400,000 for a solo practitioner or small practice — up to 8 pages, doctor profiles, appointment booking form, and full SEO. Growth websites with real-time booking, unlimited doctor profiles, speciality service pages, and a health blog start from ₦800,000. Hospital platforms with patient portals and PMS integration are priced on scope after a detailed discovery session. We provide a written, itemised quote after a free consultation — no hidden fees.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can patients book appointments online through the website?<span class="faq-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg></span></button>
        <div class="faq-a" id="f2">Yes — online appointment booking is core to every growth-tier clinic website we build. Patients select a doctor, choose their appointment type, view real-time availability, pick a date and time, and receive an automatic confirmation email. Your clinical team receives an immediate notification. The system integrates with Calendly or Google Calendar, or we can connect to your existing practice management software where an API is available. Automated appointment reminders 24 hours before are also configured.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Will my clinic website rank on Google?<span class="faq-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg></span></button>
        <div class="faq-a" id="f3">Every medical website we build includes a complete healthcare SEO foundation — MedicalClinic and LocalBusiness schema markup, individual Physician schema for each doctor, optimised service pages targeting specific keyword + location combinations, Google Business Profile optimisation, and Google Search Console setup. For competitive healthcare markets, we also offer monthly SEO retainers covering content creation, patient education articles, and citation building that sustain and improve rankings over time.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do you handle patient data and privacy?<span class="faq-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg></span></button>
        <div class="faq-a" id="f4">Patient privacy is a fundamental design principle on every healthcare website we build. All patient-facing forms are SSL-encrypted, collect only necessary information, and are accompanied by appropriate data handling notices. We configure GDPR-compliant (and NDPR-aligned for Nigerian practices) cookie notices and privacy policies. Appointment data is not stored on the website beyond what is necessary to complete the booking — sensitive health information is handled by your practice management software, not your website. We advise on privacy policy requirements relevant to your jurisdiction.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Do you build websites for specialist practices?<span class="faq-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg></span></button>
        <div class="faq-a" id="f5">Yes — we have built websites for general practice clinics, dental surgeries, physiotherapy practices, paediatric clinics, cardiology centres, eye clinics, diagnostic centres, mental health practices, and caregiver agencies. Each speciality has different patient trust signals, content requirements, keyword opportunities, and conversion patterns. We design and write content specifically for your medical speciality — not a generic healthcare template adapted for your practice.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">How long does it take to build a clinic website?<span class="faq-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg></span></button>
        <div class="faq-a" id="f6">A standard clinic website with service pages, doctor profiles, appointment booking, and SEO setup typically takes 3–5 weeks from design approval to launch. Larger multi-speciality hospital websites with patient portals may take 6–10 weeks. We provide a detailed, milestone-by-milestone timeline before work begins — so your clinical team always knows what is happening and when to expect each deliverable.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can my staff update the website after launch without technical knowledge?<span class="faq-icon"><svg viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg></span></button>
        <div class="faq-a" id="f7">Yes. Every clinic website we build is designed for self-management by non-technical clinical staff. ACF Pro creates intuitive editing interfaces for doctor profiles, service descriptions, opening hours, news and health blog posts, and testimonials — all updatable without any code knowledge. A CMS training session and written admin guide are included in every project handover. Adding a new doctor profile takes under 5 minutes. Publishing a health blog article takes under 10 minutes.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a clinic website<br>that fills your appointment book?</h2>
  <p>Get a free, no-obligation website review and proposal tailored to your practice's specialities, patient audience, and local market.</p>
  <a href="mailto:hello@i2medier.com" class="btn-dark">Get Your Free Clinic Website Proposal →</a>
</section>
@endsection

@push('scripts')
<script>
const obs = new IntersectionObserver(entries => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      const siblings = [...e.target.parentElement.children].filter(c => c.classList.contains('reveal'));
      const idx = siblings.indexOf(e.target);
      e.target.style.transitionDelay = (idx * 0.08) + 's';
      e.target.classList.add('visible');
      obs.unobserve(e.target);
    }
  });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

function animateCounter(el) {
  const target = parseInt(el.dataset.target);
  const step = target / (1800 / 16);
  let cur = 0;
  const t = setInterval(() => {
    cur += step;
    if (cur >= target) { cur = target; clearInterval(t); }
    el.textContent = Math.floor(cur);
  }, 16);
}
const cObs = new IntersectionObserver(entries => {
  entries.forEach(e => { if (e.isIntersecting) { animateCounter(e.target); cObs.unobserve(e.target); } });
}, { threshold: 0.5 });
document.querySelectorAll('.counter').forEach(el => cObs.observe(el));

document.querySelectorAll('.faq-q').forEach(btn => {
  btn.addEventListener('click', () => {
    const id = btn.getAttribute('aria-controls');
    const answer = document.getElementById(id);
    const isOpen = btn.getAttribute('aria-expanded') === 'true';
    document.querySelectorAll('.faq-q').forEach(b => {
      b.setAttribute('aria-expanded', 'false');
      const a = document.getElementById(b.getAttribute('aria-controls'));
      if (a) a.classList.remove('open');
    });
    if (!isOpen) {
      btn.setAttribute('aria-expanded', 'true');
      answer.classList.add('open');
    }
  });
});
</script>
@endpush
