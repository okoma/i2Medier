@extends('public.layouts.app')

@section('title', 'About Us — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/about.css')
@endpush

@push('scripts')
<script>
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.fade-up').forEach((el) => observer.observe(el));
</script>
@endpush

@section('content')
<div class="about-page">
  <section class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-badge">About i2Medier</div>
    <h1>
      We build <em>digital</em><br>
      <strong>Experiences</strong>
    </h1>
    <p>i2Medier Konceptz is a premium digital studio crafting web applications, mobile apps, and scalable cloud solutions that help ambitious businesses grow faster.</p>
  </section>

  <div class="mission-shell">
    <div class="mission-strip">
      <div>
        <p class="label">Our Mission</p>
        <h2>Turning ideas into <em>scalable</em> digital realities</h2>
        <p>We partner with startups, SMEs, and established brands to deliver premium digital solutions — from sleek interfaces to powerful backend systems — with the precision and care your vision deserves.</p>
      </div>
      <div class="mission-visual">
        <div class="big-stat">
          <div class="number">24<span>/7</span></div>
          <div class="caption">Support for every client, always.</div>
        </div>
      </div>
    </div>
  </div>

  <div class="stats-banner">
    <div class="stats-inner">
      <div class="stat-item fade-up">
        <div class="value">50<sup>+</sup></div>
        <div class="stat-label">Projects Delivered</div>
      </div>
      <div class="stat-item fade-up" style="transition-delay:0.1s">
        <div class="value">98<sup>%</sup></div>
        <div class="stat-label">Client Satisfaction</div>
      </div>
      <div class="stat-item fade-up" style="transition-delay:0.2s">
        <div class="value">10<sup>+</sup></div>
        <div class="stat-label">Countries Reached</div>
      </div>
      <div class="stat-item fade-up" style="transition-delay:0.3s">
        <div class="value">5<sup>+</sup></div>
        <div class="stat-label">Years of Excellence</div>
      </div>
    </div>
  </div>

  <div class="section">
    <p class="section-label fade-up">What drives us</p>
    <h2 class="section-title fade-up">Our core <em>values</em></h2>
    <p class="section-sub fade-up">Every pixel, every line of code, and every strategy is guided by principles we refuse to compromise on.</p>

    <div class="values-grid">
      <div class="value-card fade-up">
        <div class="value-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"></path><path d="M2 17l10 5 10-5"></path><path d="M2 12l10 5 10-5"></path></svg>
        </div>
        <h3>Precision Engineering</h3>
        <p>We write code that is clean, maintainable, and built to scale. Quality is non-negotiable at every stage of development.</p>
      </div>

      <div class="value-card fade-up" style="transition-delay:0.1s">
        <div class="value-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
        </div>
        <h3>Client-First Thinking</h3>
        <p>Your goals are our goals. We invest deeply in understanding your business before writing a single line of code.</p>
      </div>

      <div class="value-card fade-up" style="transition-delay:0.2s">
        <div class="value-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path></svg>
        </div>
        <h3>Speed & Delivery</h3>
        <p>We work with urgency. Deadlines matter, and we ship fast without cutting corners on quality or reliability.</p>
      </div>

      <div class="value-card fade-up" style="transition-delay:0.1s">
        <div class="value-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
        </div>
        <h3>Long-Term Partnership</h3>
        <p>We don't disappear after launch. We're in it for the long haul — supporting, optimizing, and growing with you.</p>
      </div>

      <div class="value-card fade-up" style="transition-delay:0.2s">
        <div class="value-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
        </div>
        <h3>Global Perspective</h3>
        <p>Operating across borders, we build solutions designed to work for diverse audiences and markets worldwide.</p>
      </div>

      <div class="value-card fade-up" style="transition-delay:0.3s">
        <div class="value-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
        </div>
        <h3>Continuous Innovation</h3>
        <p>We stay ahead of the curve — adopting modern frameworks, AI tooling, and cutting-edge architecture patterns.</p>
      </div>
    </div>
  </div>

  <div class="team-shell">
    <div class="section">
      <p class="section-label fade-up">The people behind it</p>
      <h2 class="section-title fade-up">Meet the <em>team</em></h2>
      <p class="section-sub fade-up">A small but mighty crew of designers, engineers, and strategists passionate about building things that matter.</p>

      <div class="team-grid">
        <div class="team-card fade-up">
          <div class="team-avatar" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);">
            <span class="avatar-initials">CE</span>
          </div>
          <div class="team-info">
            <h3>Chukwuemeka Obi</h3>
            <div class="role">Founder & CEO</div>
            <p>Visionary behind i2Medier. Over 7 years building digital products that scale and convert.</p>
          </div>
        </div>

        <div class="team-card fade-up" style="transition-delay:0.1s">
          <div class="team-avatar" style="background: linear-gradient(135deg, #1e3a2f 0%, #2d5a47 100%);">
            <span class="avatar-initials">AA</span>
          </div>
          <div class="team-info">
            <h3>Amaka Adeyemi</h3>
            <div class="role">Lead UI/UX Designer</div>
            <p>Turns user research into intuitive, beautiful interfaces. Champion of clarity and usability.</p>
          </div>
        </div>

        <div class="team-card fade-up" style="transition-delay:0.2s">
          <div class="team-avatar" style="background: linear-gradient(135deg, #2a1a3e 0%, #4a2d6a 100%);">
            <span class="avatar-initials">TN</span>
          </div>
          <div class="team-info">
            <h3>Tunde Nwosu</h3>
            <div class="role">Backend Engineer</div>
            <p>Architects robust, high-performance APIs and cloud infrastructure with surgical precision.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="why-grid">
      <div class="why-visual fade-up">
        <div class="badge">Why i2Medier</div>
        <h3>We build for <em>performance,</em> not just presence</h3>
        <ul class="check-list">
          <li>Production-ready code from day one — no shortcuts</li>
          <li>End-to-end delivery: design, development, deployment</li>
          <li>Transparent communication and weekly progress updates</li>
          <li>Post-launch support with guaranteed response times</li>
          <li>Scalable architecture built for your next 5 years, not just today</li>
        </ul>
      </div>
      <div class="why-text fade-up" style="transition-delay:0.15s">
        <p class="section-label" style="text-align:left;">Our Story</p>
        <h2>From a small idea to a <em>premium</em> digital studio</h2>
        <p>i2Medier Konceptz started with a simple conviction: that businesses in Africa and beyond deserve world-class digital solutions. We grew from a one-person operation into a full-service studio trusted by clients across multiple industries and continents.</p>
        <p>Today, we combine strategic thinking with elite technical execution — delivering web apps, mobile products, and cloud systems that help businesses not just compete, but lead.</p>
        <a href="{{ route('portfolio.index') }}" class="btn-primary" style="background:var(--black);color:var(--white);display:inline-flex;margin-top:8px;">View our work →</a>
      </div>
    </div>
  </div>

  <section class="cta-section">
    <p class="label">Let's work together</p>
    <h2>Ready to build something <em>great?</em></h2>
    <p>Whether you're starting from scratch or scaling an existing product, we'd love to hear about your project.</p>
    <div class="btn-group">
      <a href="mailto:hello@i2medier.com" class="btn-primary">Start Your Project →</a>
      <a href="{{ route('portfolio.index') }}" class="btn-secondary">View Portfolio</a>
    </div>
  </section>
</div>
@endsection
