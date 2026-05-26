@extends('public.layouts.app')

@section('title', 'Portfolio — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/portfolio.css')
@endpush

@push('scripts')
<script>
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const siblings = [...entry.target.parentElement.children].filter((child) => child.classList.contains('reveal'));
        const idx = siblings.indexOf(entry.target);
        entry.target.style.transitionDelay = (idx * 0.09) + 's';
        entry.target.classList.add('visible');
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.reveal').forEach((el) => obs.observe(el));

  function animateCounter(el) {
    const target = parseInt(el.dataset.target);
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

  const cObs = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        cObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('.counter').forEach((el) => cObs.observe(el));

  const filterBtns = document.querySelectorAll('.filter-btn');
  const cards = document.querySelectorAll('.port-card');
  const grid = document.getElementById('portGrid');

  filterBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      filterBtns.forEach((b) => b.classList.remove('active'));
      btn.classList.add('active');

      const filter = btn.dataset.filter;
      const existing = grid.querySelector('.empty-state');

      if (existing) {
        existing.remove();
      }

      let visible = 0;

      cards.forEach((card) => {
        const cats = card.dataset.cats || '';
        const show = filter === 'all' || cats.includes(filter);

        if (show) {
          card.style.display = '';
          card.style.opacity = '0';
          card.style.transform = 'translateY(20px)';

          requestAnimationFrame(() => {
            card.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
          });

          visible++;
        } else {
          card.style.display = 'none';
        }
      });

      if (visible === 0) {
        const emptyEl = document.createElement('div');
        emptyEl.className = 'empty-state';
        emptyEl.innerHTML = '<span>○</span>No projects in this category yet.';
        grid.appendChild(emptyEl);
      }
    });
  });
</script>
@endpush

@section('content')
<div class="portfolio-page">
  <section class="hero">
    <div class="hero-glow"></div>
    <div class="hero-grid"></div>
    <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
      <a href="{{ route('site.home') }}">Home</a>
      <span class="breadcrumb-sep">›</span>
      <span aria-current="page">Portfolio</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Our Work</span>
    <h1>Projects we're<br><em>proud of</em></h1>
    <p>A curated selection of platforms, products, and digital experiences we've built for clients across industries and continents.</p>
  </section>

  <section id="portfolio">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:2rem;flex-wrap:wrap;gap:1rem">
      <div>
        <span class="s-label">Portfolio</span>
        <h2 class="s-head">Featured <em>work</em></h2>
      </div>
      <p style="font-size:0.85rem;color:var(--g400);font-style:italic;max-width:300px;text-align:right">Some projects are covered by NDA. Below is a selection we can share.</p>
    </div>

    <div class="filter-bar">
      <button class="filter-btn active" data-filter="all">All Projects <span class="f-count">6</span></button>
      <button class="filter-btn" data-filter="wordpress">WordPress <span class="f-count">3</span></button>
      <button class="filter-btn" data-filter="laravel">Laravel <span class="f-count">2</span></button>
      <button class="filter-btn" data-filter="nonprofit">Nonprofit <span class="f-count">1</span></button>
      <button class="filter-btn" data-filter="healthcare">Healthcare <span class="f-count">1</span></button>
      <button class="filter-btn" data-filter="saas">SaaS / Tools <span class="f-count">2</span></button>
    </div>

    <div class="port-grid" id="portGrid">
      <div class="port-card reveal" data-cats="wordpress">
        <div class="port-thumb thumb-meto7">
          <div class="port-thumb-inner">
            <div style="text-align:center;color:white;padding:2rem;position:relative;z-index:1">
              <div style="font-family:var(--serif);font-size:2rem;font-weight:700;letter-spacing:-0.04em;margin-bottom:0.3rem">Meto7</div>
              <div style="font-size:0.62rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:1.2rem">Chauffeur Services</div>
              <div style="display:flex;gap:0.5rem;justify-content:center">
                <span style="display:inline-block;padding:0.25rem 0.75rem;border:1px solid rgba(200,169,110,0.4);border-radius:3px;font-size:0.65rem;letter-spacing:0.08em;color:rgba(255,255,255,0.5)">Book a Ride</span>
                <span style="display:inline-block;padding:0.25rem 0.75rem;border:1px solid rgba(200,169,110,0.4);border-radius:3px;font-size:0.65rem;letter-spacing:0.08em;color:rgba(255,255,255,0.5)">Our Fleet</span>
              </div>
            </div>
          </div>
          <div class="port-overlay">
            <span class="port-cat-badge">WordPress</span>
            <span class="port-link-icon">↗</span>
          </div>
        </div>
        <div class="port-body">
          <div class="port-meta">
            <span class="port-type">Luxury Transport</span>
            <span class="port-year">2024</span>
          </div>
          <div class="port-title">Meto7 Chauffeur Services</div>
          <p class="port-desc">A luxury chauffeur booking platform with a fleet showcase, service pages, and a sleek booking UX. Built to convert high-value visitors on first impression.</p>
          <div class="port-tags">
            <span class="port-tag">WordPress</span>
            <span class="port-tag">Custom Theme</span>
            <span class="port-tag">HTML/CSS</span>
            <span class="port-tag">JavaScript</span>
          </div>
          <div class="port-footer">
            <span class="port-client">Client: Meto7 Ltd</span>
            <a href="#" class="port-cta">View Project →</a>
          </div>
        </div>
      </div>

      <div class="port-card reveal" data-cats="wordpress nonprofit">
        <div class="port-thumb thumb-ntf">
          <div class="port-thumb-inner">
            <div style="text-align:center;color:white;padding:2rem">
              <div style="font-size:0.6rem;font-weight:700;letter-spacing:0.14em;text-transform:uppercase;color:rgba(255,255,255,0.45);margin-bottom:0.6rem">Nnaedozie Thomas</div>
              <div style="font-family:var(--serif);font-size:1.6rem;font-weight:700;line-height:1.15;margin-bottom:0.75rem">Foundation</div>
              <div style="width:36px;height:1.5px;background:var(--gold);margin:0 auto 0.75rem"></div>
              <div style="font-size:0.65rem;letter-spacing:0.08em;color:rgba(255,255,255,0.35)">Empowering Communities</div>
            </div>
          </div>
          <div class="port-overlay">
            <span class="port-cat-badge">Nonprofit</span>
            <span class="port-link-icon">↗</span>
          </div>
        </div>
        <div class="port-body">
          <div class="port-meta">
            <span class="port-type">Nonprofit</span>
            <span class="port-year">2024</span>
          </div>
          <div class="port-title">Nnaedozie Thomas Foundation</div>
          <p class="port-desc">A full-featured nonprofit platform covering outreach programs, events, donation flows, and article publishing — designed to build trust and drive donor action.</p>
          <div class="port-tags">
            <span class="port-tag">WordPress</span>
            <span class="port-tag">Custom Templates</span>
            <span class="port-tag">PHP</span>
            <span class="port-tag">TailwindCSS</span>
          </div>
          <div class="port-footer">
            <span class="port-client">Client: NTF Nigeria</span>
            <a href="#" class="port-cta">View Project →</a>
          </div>
        </div>
      </div>

      <div class="port-card reveal" data-cats="wordpress healthcare">
        <div class="port-thumb thumb-jayach">
          <div class="port-thumb-inner">
            <div style="text-align:center;padding:2rem">
              <div style="width:52px;height:52px;border-radius:50%;background:white;display:flex;align-items:center;justify-content:center;margin:0 auto 0.9rem;box-shadow:0 4px 16px rgba(0,80,120,0.12)">
                <span style="font-size:1.4rem">🏥</span>
              </div>
              <div style="font-family:var(--serif);font-size:1.3rem;font-weight:700;color:#0a2a3a;letter-spacing:-0.02em">Jayach Care</div>
              <div style="font-size:0.65rem;color:#4a7a8a;margin-top:0.3rem;letter-spacing:0.08em;text-transform:uppercase">Caregiver Services</div>
            </div>
          </div>
          <div class="port-overlay">
            <span class="port-cat-badge">Healthcare</span>
            <span class="port-link-icon">↗</span>
          </div>
        </div>
        <div class="port-body">
          <div class="port-meta">
            <span class="port-type">Healthcare</span>
            <span class="port-year">2023</span>
          </div>
          <div class="port-title">Jayach Care Caregiver Services</div>
          <p class="port-desc">A compassionate healthcare website for a UK-based caregiver agency — featuring service pages, team profiles, blog integration, and a streamlined inquiry flow.</p>
          <div class="port-tags">
            <span class="port-tag">WordPress</span>
            <span class="port-tag">Custom Theme</span>
            <span class="port-tag">HTML/CSS</span>
            <span class="port-tag">JavaScript</span>
          </div>
          <div class="port-footer">
            <span class="port-client">Client: Jayach Care UK</span>
            <a href="#" class="port-cta">View Project →</a>
          </div>
        </div>
      </div>

      <div class="port-card reveal" data-cats="laravel saas">
        <div class="port-thumb thumb-careerclev">
          <div class="port-thumb-inner">
            <div style="text-align:center;color:white;padding:2rem">
              <div style="font-size:2rem;margin-bottom:0.5rem">💼</div>
              <div style="font-family:var(--serif);font-size:1.35rem;font-weight:700;letter-spacing:-0.03em;margin-bottom:0.4rem">Careerclev</div>
              <div style="font-size:0.62rem;letter-spacing:0.12em;text-transform:uppercase;color:rgba(200,169,110,0.8)">Resume Platform</div>
              <div style="margin-top:1.1rem;display:flex;gap:0.4rem;justify-content:center">
                <span style="width:30px;height:3px;border-radius:2px;background:var(--gold)"></span>
                <span style="width:20px;height:3px;border-radius:2px;background:rgba(255,255,255,0.2)"></span>
                <span style="width:14px;height:3px;border-radius:2px;background:rgba(255,255,255,0.15)"></span>
              </div>
            </div>
          </div>
          <div class="port-overlay">
            <span class="port-cat-badge">SaaS</span>
            <span class="port-link-icon">↗</span>
          </div>
        </div>
        <div class="port-body">
          <div class="port-meta">
            <span class="port-type">Career Tool</span>
            <span class="port-year">2024</span>
          </div>
          <div class="port-title">Careerclev — Resume Platform</div>
          <p class="port-desc">A lightweight but powerful career platform that helps users build professional resumes in minutes. Features salary data pages, SEO-optimised occupation listings, and a live builder.</p>
          <div class="port-tags">
            <span class="port-tag">Laravel</span>
            <span class="port-tag">Livewire</span>
            <span class="port-tag">TailwindCSS</span>
            <span class="port-tag">JavaScript</span>
            <span class="port-tag">BLS OEWS</span>
          </div>
          <div class="port-footer">
            <span class="port-client">In-House Product</span>
            <a href="#" class="port-cta">View Project →</a>
          </div>
        </div>
      </div>

      <div class="port-card reveal" data-cats="laravel saas">
        <div class="port-thumb thumb-yblocal">
          <div class="port-thumb-inner">
            <div style="text-align:center;color:white;padding:2rem">
              <div style="font-size:2rem;margin-bottom:0.5rem">📍</div>
              <div style="font-family:var(--serif);font-size:1.35rem;font-weight:700;letter-spacing:-0.03em;margin-bottom:0.3rem">YB Local</div>
              <div style="font-size:0.62rem;letter-spacing:0.12em;text-transform:uppercase;color:rgba(56,239,125,0.75)">Business Directory</div>
              <div style="margin-top:1rem;padding:0.4rem 1rem;border:1px solid rgba(56,239,125,0.25);border-radius:4px;display:inline-block;font-size:0.65rem;color:rgba(255,255,255,0.45)">Find Nigerian Businesses</div>
            </div>
          </div>
          <div class="port-overlay">
            <span class="port-cat-badge">Platform</span>
            <span class="port-link-icon">↗</span>
          </div>
        </div>
        <div class="port-body">
          <div class="port-meta">
            <span class="port-type">Business Platform</span>
            <span class="port-year">2025</span>
          </div>
          <div class="port-title">YB Local — Business Listing</div>
          <p class="port-desc">A production-grade local business directory for Nigerian businesses, with real user data, verified listings, task layers, escrow, and a diaspora agent for remote management.</p>
          <div class="port-tags">
            <span class="port-tag">Laravel</span>
            <span class="port-tag">Filament</span>
            <span class="port-tag">Livewire</span>
            <span class="port-tag">TailwindCSS</span>
            <span class="port-tag">MySQL</span>
          </div>
          <div class="port-footer">
            <span class="port-client">In-House Product</span>
            <a href="#" class="port-cta">View Project →</a>
          </div>
        </div>
      </div>

      <div class="port-card reveal" data-cats="wordpress saas">
        <div class="port-thumb thumb-gpa">
          <div class="port-thumb-inner">
            <div style="text-align:center;color:white;padding:2rem">
              <div style="font-size:2rem;margin-bottom:0.5rem">🎓</div>
              <div style="font-family:var(--serif);font-size:1.25rem;font-weight:700;letter-spacing:-0.03em;margin-bottom:0.3rem">GPA Calculator</div>
              <div style="font-size:0.62rem;letter-spacing:0.12em;text-transform:uppercase;color:rgba(255,210,0,0.75)">Academic Tool</div>
              <div style="margin-top:1rem;display:flex;gap:0.3rem;justify-content:center;align-items:center">
                <span style="font-family:var(--serif);font-size:1.5rem;font-weight:700;color:var(--gold)">4.0</span>
                <span style="font-size:0.65rem;color:rgba(255,255,255,0.35);align-self:flex-end;margin-bottom:2px">GPA</span>
              </div>
            </div>
          </div>
          <div class="port-overlay">
            <span class="port-cat-badge">WordPress</span>
            <span class="port-link-icon">↗</span>
          </div>
        </div>
        <div class="port-body">
          <div class="port-meta">
            <span class="port-type">Academic Utility</span>
            <span class="port-year">2023</span>
          </div>
          <div class="port-title">GPA Calculation Tools</div>
          <p class="port-desc">A widely-used academic utility for students across multiple grading systems — 4.0 scale, 5.0 scale, and CGPA — with custom JavaScript calculators and high SEO traction.</p>
          <div class="port-tags">
            <span class="port-tag">WordPress</span>
            <span class="port-tag">Custom Theme</span>
            <span class="port-tag">HTML/CSS</span>
            <span class="port-tag">JavaScript</span>
          </div>
          <div class="port-footer">
            <span class="port-client">In-House Product</span>
            <a href="#" class="port-cta">View Project →</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="stats-band">
    <div class="stat reveal">
      <div class="stat-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="stat-label">Projects</div>
    </div>
    <div class="stat reveal">
      <div class="stat-num"><span class="counter" data-target="98">0</span><span style="color:var(--gold)">%</span></div>
      <div class="stat-label">Satisfaction</div>
    </div>
    <div class="stat reveal">
      <div class="stat-num"><span class="counter" data-target="12">0</span><span>+</span></div>
      <div class="stat-label">Countries</div>
    </div>
    <div class="stat reveal">
      <div class="stat-num" style="color:var(--gold)">24/7</div>
      <div class="stat-label">Support</div>
    </div>
  </div>

  <section class="cta-band" id="contact">
    <h2>Have a project in mind?</h2>
    <p>Tell us what you're building and we'll get back to you within 24 hours.</p>
    <a href="mailto:hello@i2medier.com" class="btn-dark">Start Your Project →</a>
  </section>
</div>
@endsection
