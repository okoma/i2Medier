@extends('public.layouts.app')

@section('title', 'i2Medier — Premium Digital Solutions')

@push('page_css')
    @vite('resources/css/public/pages/home.css')
@endpush

@push('scripts')
<script>
const obs = new IntersectionObserver((entries) => {
  entries.forEach((e) => {
    if (e.isIntersecting) {
      const siblings = [...e.target.parentElement.children].filter((c) => c.classList.contains('reveal'));
      const idx = siblings.indexOf(e.target);
      e.target.style.transitionDelay = (idx * 0.08) + 's';
      e.target.classList.add('visible');
      obs.unobserve(e.target);
    }
  });
}, { threshold: 0.12 });
document.querySelectorAll('.reveal').forEach((el) => obs.observe(el));

function animateCounter(el) {
  const target = parseInt(el.dataset.target, 10);
  const duration = 1800;
  const step = target / (duration / 16);
  let current = 0;
  const timer = setInterval(() => {
    current += step;
    if (current >= target) {
      current = target;
      clearInterval(timer);
    }
    el.textContent = Math.floor(current);
  }, 16);
}

const counterObs = new IntersectionObserver((entries) => {
  entries.forEach((e) => {
    if (e.isIntersecting) {
      animateCounter(e.target);
      counterObs.unobserve(e.target);
    }
  });
}, { threshold: 0.5 });
document.querySelectorAll('.counter').forEach((el) => counterObs.observe(el));
</script>
@endpush

@section('content')
<section class="home-hero">
  <div class="home-hero-glow"></div>
  <div class="home-hero-grid"></div>
  <span class="hero-tag"><span class="hero-dot"></span> Premium Digital Solutions</span>
  <h1><span class="line1">Elevate your</span><span class="line2">Business <span class="pill">Growth</span></span></h1>
  <p>i2Medier delivers premium web applications, scripts, and digital solutions that help businesses scale faster with cutting-edge technology.</p>
  <div class="hero-btns">
    <a href="mailto:hello@i2medier.com" class="btn-white">Start Your Projects →</a>
    <a href="#portfolio" class="btn-ghost">⊞ View Portfolio</a>
  </div>
</section>

<div class="logos-bar">
  <div class="logos-track">
    <div class="logo-item"><span class="li-dot">▲</span>treva.</div>
    <div class="logo-item">⊕EARTH<span class="li-sub">2.0</span></div>
    <div class="logo-item">{:}CodeLab</div>
    <div class="logo-item">○ circle</div>
    <div class="logo-item">velocity<span class="li-sub" style="color:var(--gold)">9</span></div>
    <div class="logo-item">⚡LightAI</div>
    <div class="logo-item"><span class="li-dot">▲</span>treva.</div>
    <div class="logo-item">⊕EARTH<span class="li-sub">2.0</span></div>
    <div class="logo-item">{:}CodeLab</div>
    <div class="logo-item">○ circle</div>
    <div class="logo-item">velocity<span class="li-sub" style="color:var(--gold)">9</span></div>
    <div class="logo-item">⚡LightAI</div>
  </div>
</div>

<section class="home-section services" id="services">
  <div class="services-intro">
    <div><span class="s-label">Services</span><h2 class="s-head">What we <em>build</em></h2></div>
    <a href="{{ route('site.services') }}" class="btn-dark" style="font-size:.8rem;padding:.65rem 1.4rem">All Services →</a>
  </div>
  <div class="svc-grid">
    <div class="svc-card reveal"><div class="svc-ico">⟨/⟩</div><div class="svc-name">Web Development</div><p class="svc-blurb">We develop modern web applications, client portals, dashboards, and custom systems using production-ready frameworks.</p></div>
    <div class="svc-card reveal"><div class="svc-ico">📱</div><div class="svc-name">Mobile Apps</div><p class="svc-blurb">We build functional, utility-driven mobile applications designed around performance, clarity, and real-world usability.</p></div>
    <div class="svc-card reveal"><div class="svc-ico">🔍</div><div class="svc-name">Search Optimization</div><p class="svc-blurb">We focus on improving how your platforms and applications are found across search engines, app stores, and AI-driven discovery systems.</p></div>
    <div class="svc-card reveal"><div class="svc-ico" style="font-size:.75rem">UX</div><div class="svc-name">UI/UX Design</div><p class="svc-blurb">We design interfaces that feel natural, reduce friction, and guide people through complex workflows.</p></div>
    <div class="svc-card reveal"><div class="svc-ico" style="font-size:.75rem">WP</div><div class="svc-name">WordPress</div><p class="svc-blurb">We use it as a flexible development platform for content-driven systems and custom functionality that goes far beyond standard themes.</p></div>
    <div class="svc-card reveal"><div class="svc-ico">☁</div><div class="svc-name">Cloud Architecture</div><p class="svc-blurb">We design cloud environments that are built for performance, stability, and long-term scalability.</p></div>
  </div>
</section>

<section class="home-section" id="portfolio">
  <div class="portfolio-intro">
    <div><span class="s-label">Portfolios</span><h2 class="s-head">Featured <em>projects</em></h2></div>
    <p class="portfolio-note">Some projects are private. Below is a selection of work we can share.</p>
  </div>
  <div class="port-grid">
    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#16213e 50%,#0f3460 100%)"><div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;padding:1.5rem"><div style="text-align:center;color:white"><div style="font-family:var(--serif);font-size:1.4rem;font-weight:700;margin-bottom:.4rem">Meto7</div><div style="font-size:.72rem;opacity:.6;letter-spacing:.1em;text-transform:uppercase">Chauffeur Services</div></div></div><div class="port-overlay"><span class="port-overlay-tag">View Project</span></div></div>
      <div class="port-title">Meto7 Chauffeur Services</div>
      <p class="port-desc">Luxury ride & booking UX. Responsive design with service pages & fleet showcase.</p>
      <div class="port-tags"><span class="port-tag">WordPress</span><span class="port-tag">Custom Theme</span><span class="port-tag">HTML</span><span class="port-tag">CSS</span><span class="port-tag">JavaScript</span></div>
    </div>
    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a2a1a 0%,#1a4a2a 50%,#0d3320 100%)"><div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;padding:1.5rem"><div style="text-align:center;color:white"><div style="font-size:.65rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.5);margin-bottom:.5rem">Nnaedozie Thomas</div><div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;line-height:1.2">Foundation</div></div></div><div class="port-overlay"><span class="port-overlay-tag">View Project</span></div></div>
      <div class="port-title">Nnaedozie Thomas Foundation</div>
      <p class="port-desc">A nonprofit platform designed to support outreach, events, articles, and donations.</p>
      <div class="port-tags"><span class="port-tag">WordPress</span><span class="port-tag">Custom Templates</span><span class="port-tag">PHP</span><span class="port-tag">TailwindCSS</span></div>
    </div>
    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#e8f4f8 0%,#d0e8f0 50%,#b8d8e8 100%)"><div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;padding:1.5rem"><div style="text-align:center;color:#1a3a4a"><div style="font-size:1.8rem;margin-bottom:.4rem">🏥</div><div style="font-family:var(--serif);font-size:1.1rem;font-weight:700">Jayach Care</div><div style="font-size:.7rem;color:#4a7a8a;margin-top:.3rem">Caregiver Services</div></div></div><div class="port-overlay"><span class="port-overlay-tag">View Project</span></div></div>
      <div class="port-title">Jayach Care Caregiver Services</div>
      <p class="port-desc">Healthcare & caregiving website with service pages and blog integration.</p>
      <div class="port-tags"><span class="port-tag">WordPress</span><span class="port-tag">Custom Theme</span><span class="port-tag">HTML</span><span class="port-tag">CSS</span><span class="port-tag">JavaScript</span></div>
    </div>
  </div>
</section>

<div class="stats-band">
  <div class="stat reveal"><div class="stat-num"><span class="counter" data-target="120">0</span><span>+</span></div><div class="stat-label">Projects</div></div>
  <div class="stat reveal"><div class="stat-num"><span class="counter" data-target="98">0</span><span style="color:var(--gold)">%</span></div><div class="stat-label">Satisfaction</div></div>
  <div class="stat reveal"><div class="stat-num"><span class="counter" data-target="12">0</span><span>+</span></div><div class="stat-label">Countries</div></div>
  <div class="stat reveal"><div class="stat-num" style="color:var(--gold)">24/7</div><div class="stat-label">Support</div></div>
</div>

<section class="home-section products" id="products">
  <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:1rem">
    <div><span class="s-label">Products</span><h2 class="s-head">In-House <em>products</em></h2></div>
    <a href="#" class="btn-dark" style="font-size:.8rem;padding:.65rem 1.4rem">All Products →</a>
  </div>
  <div class="prod-grid">
    <div class="prod-card reveal"><div class="prod-thumb" style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%)"><div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center"><div style="text-align:center;color:white;padding:1.5rem"><div style="font-size:2rem;margin-bottom:.5rem">💼</div><div style="font-family:var(--serif);font-size:1.1rem;font-weight:700">Your Career<br>Starts Here</div></div></div></div><div class="prod-body"><div class="prod-name">Careerclev — Resume Platform</div><p class="prod-desc">A lightweight career tool that helps users generate professional resumes in minutes.</p><div class="prod-tags"><span class="prod-tag">Laravel</span><span class="prod-tag">Livewire</span><span class="prod-tag">TailwindCSS</span><span class="prod-tag">JavaScript</span></div></div></div>
    <div class="prod-card reveal"><div class="prod-thumb" style="background:linear-gradient(135deg,#11998e 0%,#38ef7d 100%)"><div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center"><div style="text-align:center;color:white;padding:1.5rem"><div style="font-size:1.8rem;margin-bottom:.5rem">📍</div><div style="font-family:var(--serif);font-size:1rem;font-weight:700">Find Nigerian<br>Businesses Near You</div></div></div></div><div class="prod-body"><div class="prod-name">Yb Local — Business Listing</div><p class="prod-desc">A production platform that handles real users, real data, and real business interactions.</p><div class="prod-tags"><span class="prod-tag">Laravel</span><span class="prod-tag">Filament</span><span class="prod-tag">Livewire</span><span class="prod-tag">TailwindCSS</span></div></div></div>
    <div class="prod-card reveal"><div class="prod-thumb" style="background:linear-gradient(135deg,#f7971e 0%,#ffd200 100%)"><div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center"><div style="text-align:center;color:#1a1a1a;padding:1.5rem"><div style="font-size:1.8rem;margin-bottom:.5rem">🎓</div><div style="font-family:var(--serif);font-size:1rem;font-weight:700">Instantly Calculate<br>Your GPA Online</div></div></div></div><div class="prod-body"><div class="prod-name">GPA Calculation Tools</div><p class="prod-desc">A powerful academic utility tool used by students across different grading systems.</p><div class="prod-tags"><span class="prod-tag">WordPress</span><span class="prod-tag">Custom Theme</span><span class="prod-tag">HTML</span><span class="prod-tag">CSS</span><span class="prod-tag">JavaScript</span></div></div></div>
  </div>
</section>

<section class="home-section" id="support">
  <div style="text-align:center;max-width:560px;margin:0 auto 0"><span class="s-label">Support</span><h2 class="s-head" style="margin-bottom:.5rem">We're here to <em>help</em></h2></div>
  <div class="support-grid">
    <div class="sup-card reveal"><div class="sup-ico">⟨/⟩</div><div class="sup-name">Priority Support</div><p class="sup-desc">Fast track assistance with guaranteed response for critical and urgent issues.</p><a href="mailto:hello@i2medier.com" class="sup-link">Get Help →</a></div>
    <div class="sup-card reveal"><div class="sup-ico">📱</div><div class="sup-name">Technical Support</div><p class="sup-desc">Expert help for debugging, optimization, and resolving complex technical challenges.</p><a href="mailto:hello@i2medier.com" class="sup-link">Submit Form →</a></div>
    <div class="sup-card reveal"><div class="sup-ico">💬</div><div class="sup-name">General Inquiry</div><p class="sup-desc">Questions about services or consultations? We're happy to discuss your next project.</p><a href="mailto:hello@i2medier.com" class="sup-link">Ask Question →</a></div>
  </div>
</section>

<section class="cta-band" id="contact">
  <h2>Ready to scale your business?</h2>
  <p>Tell us about your project and we'll get back to you within 24 hours.</p>
  <a href="mailto:hello@i2medier.com" class="btn-dark">Start Your Projects →</a>
</section>
@endsection
