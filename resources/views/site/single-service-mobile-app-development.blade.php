@extends('public.layouts.app')

@section('title', 'Mobile App Development Services | iOS & Android | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/mobile-app-development.css')
@endpush

@push('scripts')
<script>
const mobileObs = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const siblings = [...entry.target.parentElement.children].filter((child) => child.classList.contains('reveal'));
      const idx = siblings.indexOf(entry.target);
      entry.target.style.transitionDelay = (idx * 0.08) + 's';
      entry.target.classList.add('visible');
      mobileObs.unobserve(entry.target);
    }
  });
}, { threshold: 0.08 });
document.querySelectorAll('.reveal').forEach((el) => mobileObs.observe(el));

function animateMobileCounter(el) {
  const target = parseInt(el.dataset.target);
  const step = target / (1800 / 16);
  let cur = 0;
  const t = setInterval(() => {
    cur += step;
    if (cur >= target) { cur = target; clearInterval(t); }
    el.textContent = Math.floor(cur);
  }, 16);
}
const mobileCounterObs = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      animateMobileCounter(entry.target);
      mobileCounterObs.unobserve(entry.target);
    }
  });
}, { threshold: 0.5 });
document.querySelectorAll('.counter').forEach((el) => mobileCounterObs.observe(el));

document.querySelectorAll('.faq-q').forEach((btn) => {
  btn.addEventListener('click', () => {
    const id = btn.getAttribute('aria-controls');
    const answer = document.getElementById(id);
    const isOpen = btn.getAttribute('aria-expanded') === 'true';
    document.querySelectorAll('.faq-q').forEach((other) => {
      other.setAttribute('aria-expanded', 'false');
      const target = document.getElementById(other.getAttribute('aria-controls'));
      if (target) target.classList.remove('open');
    });
    if (! isOpen) {
      btn.setAttribute('aria-expanded', 'true');
      answer.classList.add('open');
    }
  });
});
</script>
@endpush

@section('content')
<header class="hero">
  <div class="hero-glow" aria-hidden="true"></div>
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-left">
    <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
      <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
      <span aria-current="page">Mobile App Development</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Mobile App Development</span>
    <h1>iOS & Android apps<br>built to <em>delight users</em><br>and scale fast</h1>
    <p class="hero-sub">We build polished, production-ready mobile applications for iOS and Android, backed by robust Laravel APIs, shipped to the App Store and Google Play, and designed to convert every tap into measurable business value.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-white">Discuss Your App →</a>
      <a href="{{ route('portfolio.index') }}" class="btn-ghost">See Our Work</a>
    </div>
    <div class="store-badges" aria-label="Platform coverage">
      <span class="store-badge"><span class="store-badge-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 5c-.9 1.1-1.3 2.2-1.2 3.3 1.3.1 2.4-.4 3.3-1.3.8-1 .9-2 .9-2.6-1.2-.1-2.2.2-3 .6Z"></path><path d="M16.8 12.2c0-2.2 1.8-3.3 1.9-3.4-1-1.5-2.7-1.7-3.2-1.7-1.4-.1-2.6.8-3.3.8-.7 0-1.7-.8-2.9-.8-1.5 0-2.8.9-3.6 2.2-1.6 2.7-.4 6.7 1.2 9 0 .1 1.5 2.2 3.1 2.1 1.4-.1 1.9-.9 3.5-.9s2.1.9 3.5.9c1.5 0 2.5-1.3 3-2.1.7-1 1-2 1.1-2.1-.1 0-4.3-1.7-4.3-5Z"></path></svg></span><span><span class="store-badge-sub">Available on</span><span class="store-badge-name">App Store</span></span></span>
      <span class="store-badge"><span class="store-badge-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17.5 5.5 20"></path><path d="M17 17.5 18.5 20"></path><path d="M7 7.5 5 4.5"></path><path d="M17 7.5 19 4.5"></path><rect x="4" y="8" width="16" height="8" rx="3"></rect><path d="M8 12h.01"></path><path d="M16 12h.01"></path></svg></span><span><span class="store-badge-sub">Available on</span><span class="store-badge-name">Google Play</span></span></span>
    </div>
    <div class="hero-pills">
      <span class="hero-pill"><span class="hero-pill-dot"></span> React Native</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Native iOS (Swift)</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Native Android (Kotlin)</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Laravel API Backend</span>
      <span class="hero-pill"><span class="hero-pill-dot"></span> Push Notifications</span>
    </div>
  </div>
  <div class="hero-right" aria-hidden="true">
    <div class="phones-wrap">
      <div class="push-notif">
        <div class="push-notif-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Z"></path><path d="M4 7.5V16.5L12 21"></path><path d="M20 7.5V16.5L12 21"></path><path d="M12 12v9"></path></svg></div>
        <div><div class="push-notif-title">Order Confirmed</div><div class="push-notif-body">Your order #4821 is on its way</div></div>
      </div>
      <div class="phone phone-ios">
        <div class="phone-notch"><div class="phone-notch-pill"></div></div>
        <div class="phone-screen ios-screen">
          <div class="ios-status"><span>9:41</span><span class="status-icons"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20h2"></path><path d="M8 16h2"></path><path d="M12 12h2"></path><path d="M16 8h2"></path></svg><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="7" width="18" height="10" rx="2"></rect><path d="M22 11v2"></path><path d="M5 10h8v4H5z" fill="currentColor" stroke="none"></path></svg></span></div>
          <div class="ios-header"><div class="ios-header-title">Dashboard</div><div class="ios-header-sub">Good morning, Chidi</div></div>
          <div class="ios-cards">
            <div class="ios-card-row">
              <div class="ios-card"><div class="ios-card-label">Revenue</div><div class="ios-card-val">₦2.4M</div><div class="ios-card-sub">▲ 18% this month</div></div>
              <div class="ios-card"><div class="ios-card-label">Orders</div><div class="ios-card-val">842</div><div class="ios-card-sub">▲ 24 today</div></div>
            </div>
            <div class="ios-card">
              <div class="ios-card-label">Recent Activity</div>
              <div style="display:flex;flex-direction:column;gap:4px;margin-top:3px">
                <div style="font-size:.5rem;color:#333;display:flex;justify-content:space-between"><span>New user signup</span><span style="color:var(--ios)">Just now</span></div>
                <div style="font-size:.5rem;color:#333;display:flex;justify-content:space-between"><span>Payment received</span><span style="color:var(--g400)">2m ago</span></div>
                <div style="font-size:.5rem;color:#333;display:flex;justify-content:space-between"><span>Order #4820 shipped</span><span style="color:var(--g400)">5m ago</span></div>
              </div>
            </div>
          </div>
          <div class="ios-nav">
            <div class="ios-nav-item active"><span class="ios-nav-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 10.5 12 3l9 7.5"></path><path d="M5 9.5V21h14V9.5"></path></svg></span><span>Home</span></div>
            <div class="ios-nav-item"><span class="ios-nav-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19h16"></path><path d="M7 16V9"></path><path d="M12 16V5"></path><path d="M17 16v-3"></path></svg></span><span>Stats</span></div>
            <div class="ios-nav-item"><span class="ios-nav-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Z"></path><path d="M4 7.5V16.5L12 21"></path><path d="M20 7.5V16.5L12 21"></path></svg></span><span>Orders</span></div>
            <div class="ios-nav-item"><span class="ios-nav-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg></span><span>Profile</span></div>
          </div>
        </div>
        <div class="phone-home-bar"><div class="phone-home-bar-line"></div></div>
      </div>
      <div class="phone phone-and">
        <div class="phone-notch"><div class="phone-notch-pill"></div></div>
        <div class="phone-screen and-screen">
          <div class="and-status"><span>9:41</span><span class="status-icons"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20h2"></path><path d="M8 16h2"></path><path d="M12 12h2"></path><path d="M16 8h2"></path></svg><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="7" width="18" height="10" rx="2"></rect><path d="M22 11v2"></path><path d="M5 10h12v4H5z" fill="currentColor" stroke="none"></path></svg></span></div>
          <div class="and-header"><div class="and-header-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18"></path><path d="M5 8c3 0 4-2 7-2s4 2 7 2"></path><path d="M5 16c3 0 4-2 7-2s4 2 7 2"></path></svg></div><div class="and-header-title">YBLocal</div></div>
          <div class="and-content">
            <div class="and-section-label">Nearby Businesses</div>
            <div class="and-item"><div class="and-item-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 8h16"></path><path d="M6 8V6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2"></path><path d="M6 12h12"></path><path d="M8 16h8"></path><path d="M7 20h10"></path></svg></div><div style="flex:1"><div class="and-item-name">Spice Kitchen</div><div class="and-item-sub">Restaurant · 0.3km</div></div><div class="and-item-badge">Open</div></div>
            <div class="and-item"><div class="and-item-ico" style="background:rgba(0,113,227,.15);color:var(--ios)"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 4h6"></path><path d="M7 7h10"></path><path d="M8 7v4a4 4 0 0 0 8 0V7"></path><path d="M7 20c1.5-2.5 3.5-3.5 5-3.5S15.5 17.5 17 20"></path></svg></div><div style="flex:1"><div class="and-item-name">Glam Studio</div><div class="and-item-sub">Beauty · 0.8km</div></div><div class="and-item-badge">Open</div></div>
            <div class="and-item"><div class="and-item-ico" style="background:rgba(200,169,110,.15);color:var(--gold)"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m14 7 3-3 3 3-3 3"></path><path d="m4 20 7.5-7.5"></path><path d="m12 7 5 5"></path><path d="M6 18 4 20"></path></svg></div><div style="flex:1"><div class="and-item-name">FixIt Pro</div><div class="and-item-sub">Services · 1.2km</div></div><div class="and-item-badge" style="background:var(--g400)">Closed</div></div>
            <div class="and-section-label" style="margin-top:4px">Quick Actions</div>
            <div style="display:flex;gap:5px">
              <div style="flex:1;background:rgba(52,168,83,.12);border:1px solid rgba(52,168,83,.2);border-radius:6px;padding:6px;text-align:center;font-size:.48rem;color:var(--android)"><span class="and-action-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-6-4.5-6-10a6 6 0 1 1 12 0c0 5.5-6 10-6 10Z"></path><circle cx="12" cy="11" r="2.5"></circle></svg></span> Map</div>
              <div style="flex:1;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);border-radius:6px;padding:6px;text-align:center;font-size:.48rem;color:rgba(255,255,255,.4)"><span class="and-action-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 17.3-5 2.7 1-5.7L4 10.4l5.7-.8L12 4.5l2.3 5.1 5.7.8-4 3.9 1 5.7Z"></path></svg></span> Saved</div>
              <div style="flex:1;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);border-radius:6px;padding:6px;text-align:center;font-size:.48rem;color:rgba(255,255,255,.4)"><span class="and-action-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-3.5-3.5"></path></svg></span> Search</div>
            </div>
          </div>
          <div class="and-fab">+</div>
          <div class="and-nav"><div class="and-nav-ico active"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 10.5 12 3l9 7.5"></path><path d="M5 9.5V21h14V9.5"></path></svg></div><div class="and-nav-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-6-4.5-6-10a6 6 0 1 1 12 0c0 5.5-6 10-6 10Z"></path><circle cx="12" cy="11" r="2.5"></circle></svg></div><div class="and-nav-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9a6 6 0 1 1 12 0c0 7 3 7 3 9H3c0-2 3-2 3-9"></path><path d="M10 21h4"></path></svg></div><div class="and-nav-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg></div></div>
        </div>
        <div class="phone-home-bar"><div class="phone-home-bar-line"></div></div>
      </div>
    </div>
  </div>
</header>

<div class="stats-band">
  <div class="stats-grid">
    <div class="stat-item reveal"><div class="stat-num"><span class="counter" data-target="15">0</span><span>+</span></div><div class="stat-lbl">Apps Shipped to Stores</div></div>
    <div class="stat-item reveal"><div class="stat-num">iOS<span> + </span>And</div><div class="stat-lbl">Both Platforms Covered</div></div>
    <div class="stat-item reveal"><div class="stat-num">from <span>₦1.2M</span></div><div class="stat-lbl">Starting Price</div></div>
    <div class="stat-item reveal"><div class="stat-num">8–<span>18</span>wks</div><div class="stat-lbl">MVP to App Store</div></div>
  </div>
</div>

<section class="build-section" aria-labelledby="build-heading">
  <div class="two-col-intro">
    <div><span class="s-label">What We Build</span><h2 class="s-head" id="build-heading">Mobile applications for<br>every <em>industry & model</em></h2></div>
    <p>A mobile app is not just a smaller website. It is a different product with its own interaction patterns, performance expectations, and store-distribution requirements. We have built mobile apps across a wide range of categories, each requiring its own approach to UX, performance, and backend architecture.</p>
  </div>
  <div class="build-grid">
    <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1"></circle><circle cx="18" cy="20" r="1"></circle><path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6H18a2 2 0 0 0 2-1.6L21 8H7"></path></svg></div><h3 class="build-title">E-Commerce & Marketplace Apps</h3><p class="build-desc">Buyer and seller mobile apps for product marketplaces, service platforms, and local commerce, with product browsing, cart flows, in-app payments, order tracking, and review systems. Backed by a Laravel API handling inventory and transactions.</p><div class="build-tags"><span class="build-tag">React Native</span><span class="build-tag">Paystack</span><span class="build-tag">Real-time</span><span class="build-tag">Push Notifications</span></div></div>
    <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-6-4.5-6-10a6 6 0 1 1 12 0c0 5.5-6 10-6 10Z"></path><circle cx="12" cy="11" r="2.5"></circle></svg></div><h3 class="build-title">Location & Directory Apps</h3><p class="build-desc">Apps built around location, including business directories, service finders, food delivery, property listings, and hyperlocal commerce, with native map integration, geolocation search, and proximity-based filtering.</p><div class="build-tags"><span class="build-tag">Geolocation</span><span class="build-tag">Maps API</span><span class="build-tag">Real-time</span><span class="build-tag">Background Location</span></div></div>
    <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M8 21h8"></path><path d="M12 19v2"></path></svg></div><h3 class="build-title">Business & Operations Apps</h3><p class="build-desc">Internal field operations apps, staff management tools, inspection and reporting apps, and B2B portals with offline data capability for low-connectivity environments, background sync, and role-based screens.</p><div class="build-tags"><span class="build-tag">Offline Sync</span><span class="build-tag">Role-Based</span><span class="build-tag">PDF Reports</span><span class="build-tag">Camera/Scan</span></div></div>
    <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M7 15h4"></path></svg></div><h3 class="build-title">Fintech & Wallet Apps</h3><p class="build-desc">Digital wallets, savings platforms, payment apps, loan management systems, and invoice tools with biometric authentication, transaction history, spending analytics, and PCI-aware payment flows.</p><div class="build-tags"><span class="build-tag">Biometrics</span><span class="build-tag">Wallet System</span><span class="build-tag">Paystack</span><span class="build-tag">Stripe</span></div></div>
    <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 17A2.5 2.5 0 0 0 4 19.5V5a2 2 0 0 1 2-2h14v14"></path></svg></div><h3 class="build-title">EdTech & Learning Apps</h3><p class="build-desc">Mobile learning platforms, quiz apps, course delivery tools, and student portals with video streaming, progress tracking, certificate generation, and scheduled push notifications.</p><div class="build-tags"><span class="build-tag">Video Streaming</span><span class="build-tag">Offline Download</span><span class="build-tag">Progress Tracking</span><span class="build-tag">Certificates</span></div></div>
    <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-7-4.5-7-11a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 6.5-7 11-7 11Z"></path><path d="M12 8v5"></path><path d="M10 11h4"></path></svg></div><h3 class="build-title">Health & Wellness Apps</h3><p class="build-desc">Patient booking and appointment apps, telemedicine platforms, medication reminders, and fitness tracking tools with secure health data handling and caregiver portals.</p><div class="build-tags"><span class="build-tag">Booking Flows</span><span class="build-tag">Telemedicine</span><span class="build-tag">HealthKit</span><span class="build-tag">Reminders</span></div></div>
  </div>
</section>

<section class="platform-section" aria-labelledby="platform-heading">
  <div class="two-col-intro">
    <div><span class="s-label">Choosing Your Platform</span><h2 class="s-head" id="platform-heading">React Native, Native iOS,<br>or Native Android, <em>which?</em></h2></div>
    <p>The platform decision is one of the most important early choices in any mobile app project. Get it wrong and you pay for it in performance, maintenance cost, and developer availability for years. Here is our honest breakdown and the option we recommend for most projects.</p>
  </div>
  <div class="platform-grid">
    <div class="plat-card reveal"><div class="plat-head"><div class="plat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 5c-.9 1.1-1.3 2.2-1.2 3.3 1.3.1 2.4-.4 3.3-1.3.8-1 .9-2 .9-2.6-1.2-.1-2.2.2-3 .6Z"></path><path d="M16.8 12.2c0-2.2 1.8-3.3 1.9-3.4-1-1.5-2.7-1.7-3.2-1.7-1.4-.1-2.6.8-3.3.8-.7 0-1.7-.8-2.9-.8-1.5 0-2.8.9-3.6 2.2-1.6 2.7-.4 6.7 1.2 9 0 .1 1.5 2.2 3.1 2.1 1.4-.1 1.9-.9 3.5-.9s2.1.9 3.5.9c1.5 0 2.5-1.3 3-2.1.7-1 1-2 1.1-2.1-.1 0-4.3-1.7-4.3-5Z"></path></svg></div><div class="plat-name">Native iOS</div><div class="plat-sub">Swift · Xcode · Apple only</div></div><div class="plat-body"><ul class="plat-pros"><li class="plat-pro">Maximum iOS performance and platform depth</li><li class="plat-pro">Full access to every Apple hardware API</li><li class="plat-pro">Best-in-class SwiftUI animations and transitions</li><li class="plat-pro">Optimal for Apple Watch, iPad, and macOS extensions</li></ul><div class="plat-con">Requires a separate Android build if you need both platforms, doubling development cost and timelines.</div><div class="plat-use"><strong>Best for</strong> Apps where the target audience is exclusively iOS users, or where deep Apple platform integration is a primary feature requirement.</div></div></div>
    <div class="plat-card recommended reveal"><div class="plat-head"><div class="plat-recommend-badge">Our Recommendation</div><div class="plat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="2.5"></circle><path d="M12 2v4"></path><path d="M12 18v4"></path><path d="m4.9 4.9 2.8 2.8"></path><path d="m16.3 16.3 2.8 2.8"></path><path d="M2 12h4"></path><path d="M18 12h4"></path><path d="m4.9 19.1 2.8-2.8"></path><path d="m16.3 7.7 2.8-2.8"></path></svg></div><div class="plat-name">React Native</div><div class="plat-sub">JavaScript · One codebase · iOS + Android</div></div><div class="plat-body"><ul class="plat-pros"><li class="plat-pro">Single codebase ships to both iOS and Android</li><li class="plat-pro">Renders to genuinely native UI components</li><li class="plat-pro">Significantly lower build cost vs two native apps</li><li class="plat-pro">Largest mobile JS ecosystem</li><li class="plat-pro">Integrates naturally with our Laravel API backends</li><li class="plat-pro">Hot reload during development</li></ul><div class="plat-use"><strong>Best for</strong> Most business apps, marketplaces, portals, and consumer apps that need both iOS and Android without doubling the investment.</div></div></div>
    <div class="plat-card reveal"><div class="plat-head"><div class="plat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17.5 5.5 20"></path><path d="M17 17.5 18.5 20"></path><path d="M7 7.5 5 4.5"></path><path d="M17 7.5 19 4.5"></path><rect x="4" y="8" width="16" height="8" rx="3"></rect><path d="M8 12h.01"></path><path d="M16 12h.01"></path></svg></div><div class="plat-name">Native Android</div><div class="plat-sub">Kotlin · Android Studio · Android only</div></div><div class="plat-body"><ul class="plat-pros"><li class="plat-pro">Maximum Android performance and platform depth</li><li class="plat-pro">Full access to Android hardware APIs</li><li class="plat-pro">Best choice for high-Android markets like Nigeria</li><li class="plat-pro">Deeper Google Play services integration</li></ul><div class="plat-con">Requires a separate iOS build for cross-platform reach, with the same cost implication as native iOS.</div><div class="plat-use"><strong>Best for</strong> Apps targeting Nigerian or African markets where Android dominates, or where Android hardware features are core.</div></div></div>
  </div>
</section>

<section class="arch-section" aria-labelledby="arch-heading">
  <div class="arch-header reveal">
    <div><span class="s-label" style="color:var(--gold)">System Architecture</span><h2 class="s-head" style="color:var(--white)" id="arch-heading">How a complete mobile<br>product is <em>structured</em></h2></div>
    <p>A mobile app is a two-layer product, the client app on the user's device and the API backend on the server. Both layers must be designed with equal care. We architect and deliver both, ensuring they work together as a coherent, scalable system from day one.</p>
  </div>
  <div class="arch-flow reveal">
    <div class="arch-col"><div class="arch-col-head"><span class="arch-layer-badge mobile">Mobile App Layer</span><span class="arch-col-title">React Native Client</span></div><div class="arch-col-body"><span class="arch-chip">React Native 0.74+</span><span class="arch-chip">Expo SDK</span><span class="arch-chip">React Navigation v6</span><span class="arch-chip">Zustand / Redux Toolkit</span><span class="arch-chip">React Query</span><span class="arch-chip">NativeWind</span><span class="arch-chip">Reanimated 3</span><span class="arch-chip">Async Storage</span><span class="arch-chip">Biometric auth</span><span class="arch-chip">Camera & image picker</span><span class="arch-chip">FCM</span><span class="arch-chip">Deep linking</span></div></div>
    <div class="arch-arrow-col" aria-hidden="true">⟷</div>
    <div class="arch-col"><div class="arch-col-head"><span class="arch-layer-badge api">API Layer</span><span class="arch-col-title">Laravel REST Backend</span></div><div class="arch-col-body"><span class="arch-chip">Laravel 11 REST API</span><span class="arch-chip">Sanctum auth</span><span class="arch-chip">JSON resources</span><span class="arch-chip">API versioning</span><span class="arch-chip">Rate limiting</span><span class="arch-chip">Webhook processing</span><span class="arch-chip">Redis queues</span><span class="arch-chip">S3 / R2 storage</span><span class="arch-chip">Push via FCM & APNs</span><span class="arch-chip">Paystack & Stripe</span><span class="arch-chip">Filament admin</span><span class="arch-chip">Automated tests</span></div></div>
    <div class="arch-arrow-col" aria-hidden="true">⟷</div>
    <div class="arch-col"><div class="arch-col-head"><span class="arch-layer-badge infra">Infrastructure Layer</span><span class="arch-col-title">Cloud & DevOps</span></div><div class="arch-col-body"><span class="arch-chip">DigitalOcean / AWS</span><span class="arch-chip">Cloudflare</span><span class="arch-chip">MySQL / PostgreSQL</span><span class="arch-chip">Redis</span><span class="arch-chip">R2 / S3 storage</span><span class="arch-chip">Laravel Forge</span><span class="arch-chip">GitHub Actions</span><span class="arch-chip">Sentry</span><span class="arch-chip">EAS Build</span><span class="arch-chip">App Store Connect</span><span class="arch-chip">Google Play Console</span><span class="arch-chip">OTA updates</span></div></div>
  </div>
</section>

<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div><span class="s-label">How We Work</span><h2 class="s-head" id="process-heading">From idea to <em>App Store</em>,<br>our delivery process</h2></div>
    <p>Building a mobile app involves more moving parts than a website: device APIs, App Store review, push infrastructure, offline data, and cross-platform testing. Our process is designed to manage that complexity without slowing you down.</p>
  </div>
  <div class="process-timeline">
    <div class="pt-item reveal"><div class="pt-num gold">01</div><div class="pt-body"><div class="pt-title">Discovery & Product Scoping</div><div class="pt-duration">Week 1</div><p class="pt-desc">We map core user journeys, define the MVP feature set, identify third-party integrations, and make the critical platform decision based on your audience, budget, and feature requirements.</p><div class="pt-dels"><span class="pt-del">User Journey Map</span><span class="pt-del">Feature Priority Matrix</span><span class="pt-del">Platform Decision</span><span class="pt-del">Technical Spec</span><span class="pt-del">Signed Scope</span></div></div></div>
    <div class="pt-item reveal"><div class="pt-num">02</div><div class="pt-body"><div class="pt-title">UI/UX Design</div><div class="pt-duration">Week 2–3</div><p class="pt-desc">We design every screen in Figma, including loading states, error states, empty states, and edge cases, before any code is written.</p><div class="pt-dels"><span class="pt-del">All App Screens</span><span class="pt-del">Onboarding Flow</span><span class="pt-del">Empty & Error States</span><span class="pt-del">HIG Compliance</span><span class="pt-del">Figma Prototype</span></div></div></div>
    <div class="pt-item reveal"><div class="pt-num">03</div><div class="pt-body"><div class="pt-title">API Backend Development</div><div class="pt-duration">Week 2–6</div><p class="pt-desc">The Laravel API backend is developed in parallel with design, handling authentication, data models, queues, notifications, and payments before frontend integration begins.</p><div class="pt-dels"><span class="pt-del">Laravel REST API</span><span class="pt-del">Sanctum Auth</span><span class="pt-del">Push Infra</span><span class="pt-del">Payment Integration</span><span class="pt-del">Postman Docs</span></div></div></div>
    <div class="pt-item reveal"><div class="pt-num">04</div><div class="pt-body"><div class="pt-title">Mobile App Development</div><div class="pt-duration">Week 4–12</div><p class="pt-desc">React Native development proceeds screen by screen against the live staging API, including navigation, state, device interactions, notifications, and staging builds for real-device testing.</p><div class="pt-dels"><span class="pt-del">Sprint Builds</span><span class="pt-del">Native Device APIs</span><span class="pt-del">Offline Capability</span><span class="pt-del">Deep Linking</span><span class="pt-del">Animations</span></div></div></div>
    <div class="pt-item reveal"><div class="pt-num">05</div><div class="pt-body"><div class="pt-title">QA Across Devices</div><div class="pt-duration">Week 12–13</div><p class="pt-desc">We test across common iPhone and Android devices, multiple OS versions, poor network conditions, crashes, memory pressure, and accessibility requirements.</p><div class="pt-dels"><span class="pt-del">Device Matrix</span><span class="pt-del">OS Coverage</span><span class="pt-del">Network Tests</span><span class="pt-del">Accessibility</span><span class="pt-del">Performance Profiling</span></div></div></div>
    <div class="pt-item reveal"><div class="pt-num">06</div><div class="pt-body"><div class="pt-title">App Store Submission & Launch</div><div class="pt-duration">Week 13–14</div><p class="pt-desc">We handle the full submission for both App Store and Google Play, including app signing, screenshots, metadata, privacy compliance, and reviewer feedback until approval.</p><div class="pt-dels"><span class="pt-del">Apple Submission</span><span class="pt-del">Google Submission</span><span class="pt-del">App Signing</span><span class="pt-del">Store Metadata</span><span class="pt-del">90-Day Support</span></div></div></div>
  </div>
</section>

<section class="tech-section" aria-labelledby="tech-heading">
  <div class="two-col-intro">
    <div><span class="s-label">Technology Stack</span><h2 class="s-head" id="tech-heading">The tools that power<br>our <em>mobile builds</em></h2></div>
    <p>Every tool in our mobile stack is selected for stability, community support, and long-term maintainability. We do not use experimental packages on production apps.</p>
  </div>
  <div class="tech-grid-outer reveal">
    <div class="tech-group"><div class="tech-group-head"><div class="tech-group-title">Mobile Framework</div><div class="tech-group-sub">Core app technology</div></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="2.5"></circle><path d="M12 2v4"></path><path d="M12 18v4"></path><path d="m4.9 4.9 2.8 2.8"></path><path d="m16.3 16.3 2.8 2.8"></path><path d="M2 12h4"></path><path d="M18 12h4"></path><path d="m4.9 19.1 2.8-2.8"></path><path d="m16.3 7.7 2.8-2.8"></path></svg></div><div class="tech-info"><div class="tech-name">React Native 0.74+</div><div class="tech-sub">Cross-platform mobile framework</div></div><span class="tech-badge tb-core">Core</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Z"></path><path d="M4 7.5V16.5L12 21"></path><path d="M20 7.5V16.5L12 21"></path><path d="M12 12v9"></path></svg></div><div class="tech-info"><div class="tech-name">Expo SDK</div><div class="tech-sub">Managed workflow, OTA updates, EAS Build</div></div><span class="tech-badge tb-core">Core</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18"></path><path d="m5 10 7-7 7 7"></path><path d="m5 14 7 7 7-7"></path></svg></div><div class="tech-info"><div class="tech-name">React Navigation v6</div><div class="tech-sub">Stack, tab, drawer navigation</div></div><span class="tech-badge tb-tool">Navigation</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m3 17 5-5 4 4 8-8"></path><path d="M14 8h6v6"></path></svg></div><div class="tech-info"><div class="tech-name">Reanimated 3</div><div class="tech-sub">60fps native-thread animations</div></div><span class="tech-badge tb-tool">Animations</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h4a4 4 0 0 0 0-8Z"></path><circle cx="7.5" cy="10.5" r="1"></circle><circle cx="9.5" cy="7.5" r="1"></circle><circle cx="13.5" cy="7.5" r="1"></circle></svg></div><div class="tech-info"><div class="tech-name">NativeWind</div><div class="tech-sub">TailwindCSS for React Native</div></div><span class="tech-badge tb-tool">Styling</span></div></div>
    <div class="tech-group"><div class="tech-group-head"><div class="tech-group-title">State & Data</div><div class="tech-group-sub">Managing app and server state</div></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h10"></path><path d="m10 6 6 6-6 6"></path></svg></div><div class="tech-info"><div class="tech-name">React Query</div><div class="tech-sub">Server state, caching, sync</div></div><span class="tech-badge tb-core">State</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 10a5 5 0 0 1 10 0c0 1.7-.9 3.2-2.2 4.1 2.7.5 4.7 2.3 5.2 4.9H4c.5-2.6 2.5-4.4 5.2-4.9A5 5 0 0 1 7 10Z"></path></svg></div><div class="tech-info"><div class="tech-name">Zustand</div><div class="tech-sub">Lightweight global state management</div></div><span class="tech-badge tb-tool">State</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="3" width="14" height="18" rx="2"></rect><path d="M9 7h6"></path><path d="M10 17h4"></path></svg></div><div class="tech-info"><div class="tech-name">Async Storage / MMKV</div><div class="tech-sub">Persistent local storage</div></div><span class="tech-badge tb-tool">Storage</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><ellipse cx="12" cy="6" rx="7" ry="3"></ellipse><path d="M5 6v12c0 1.7 3.1 3 7 3s7-1.3 7-3V6"></path><path d="M5 12c0 1.7 3.1 3 7 3s7-1.3 7-3"></path></svg></div><div class="tech-info"><div class="tech-name">SQLite / WatermelonDB</div><div class="tech-sub">Offline-first local DB</div></div><span class="tech-badge tb-tool">Offline</span></div></div>
    <div class="tech-group"><div class="tech-group-head"><div class="tech-group-title">Platform Features</div><div class="tech-group-sub">Native device integrations</div></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9a6 6 0 1 1 12 0c0 7 3 7 3 9H3c0-2 3-2 3-9"></path><path d="M10 21h4"></path></svg></div><div class="tech-info"><div class="tech-name">Firebase Cloud Messaging</div><div class="tech-sub">Push notifications</div></div><span class="tech-badge tb-notif">Notifications</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="6" width="18" height="14" rx="2"></rect><circle cx="12" cy="13" r="3"></circle><path d="M8 6V4"></path><path d="M16 6V4"></path></svg></div><div class="tech-info"><div class="tech-name">Expo Camera / Image Picker</div><div class="tech-sub">Camera and media library access</div></div><span class="tech-badge tb-ios">Native</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a4 4 0 0 0-4 4v2H7a2 2 0 0 0-2 2v7h14v-7a2 2 0 0 0-2-2h-1V7a4 4 0 0 0-4-4Z"></path><path d="M12 13v2"></path></svg></div><div class="tech-info"><div class="tech-name">Face ID / Fingerprint</div><div class="tech-sub">Biometric authentication</div></div><span class="tech-badge tb-ios">Native</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-6-4.5-6-10a6 6 0 1 1 12 0c0 5.5-6 10-6 10Z"></path><circle cx="12" cy="11" r="2.5"></circle></svg></div><div class="tech-info"><div class="tech-name">Expo Location / Maps</div><div class="tech-sub">GPS and background location</div></div><span class="tech-badge tb-and">Native</span></div></div>
    <div class="tech-group"><div class="tech-group-head"><div class="tech-group-title">API & Payments</div><div class="tech-group-sub">Backend connectivity & transactions</div></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18"></path><path d="M3 12h18"></path><circle cx="12" cy="12" r="9"></circle></svg></div><div class="tech-info"><div class="tech-name">Laravel 11 REST API</div><div class="tech-sub">Versioned, documented, tested</div></div><span class="tech-badge tb-api">API</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="6" width="18" height="12" rx="2"></rect><path d="M3 10h18"></path><path d="M8 15h4"></path></svg></div><div class="tech-info"><div class="tech-name">Paystack</div><div class="tech-sub">Nigerian naira in-app payments</div></div><span class="tech-badge tb-notif">Payment</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="6" width="18" height="12" rx="2"></rect><path d="M3 10h18"></path><path d="M8 15h4"></path></svg></div><div class="tech-info"><div class="tech-name">Stripe</div><div class="tech-sub">International payments & subscriptions</div></div><span class="tech-badge tb-notif">Payment</span></div><div class="tech-row"><div class="tech-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 19a4 4 0 1 1 .6-7.9A6 6 0 0 1 18 9.5 4.5 4.5 0 1 1 18.5 19Z"></path></svg></div><div class="tech-info"><div class="tech-name">Cloudflare R2 / AWS S3</div><div class="tech-sub">Media and file storage</div></div><span class="tech-badge tb-tool">Storage</span></div></div>
  </div>
</section>

<section aria-labelledby="deliv-heading">
  <div class="two-col-intro">
    <div><span class="s-label">What You Get</span><h2 class="s-head" id="deliv-heading">Everything included in<br>every <em>mobile app build</em></h2></div>
    <p>These are not optional add-ons. They are standard deliverables on every mobile project, from push infrastructure to App Store submission.</p>
  </div>
  <div class="features-grid reveal">
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="6" y="2" width="12" height="20" rx="3"></rect><path d="M10 5h4"></path><path d="M12 18h.01"></path></svg></div><div class="feat-body"><h4>iOS + Android (one codebase)</h4><p>A single React Native codebase that ships to both App Store and Google Play without paying for two separate builds.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a4 4 0 0 0-4 4v2H7a2 2 0 0 0-2 2v7h14v-7a2 2 0 0 0-2-2h-1V7a4 4 0 0 0-4-4Z"></path><path d="M12 13v2"></path></svg></div><div class="feat-body"><h4>Authentication & User Management</h4><p>Secure login and registration with email/password, OTP, biometric authentication, and silent token refresh in the background.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 9a6 6 0 1 1 12 0c0 7 3 7 3 9H3c0-2 3-2 3-9"></path><path d="M10 21h4"></path></svg></div><div class="feat-body"><h4>Push Notification Infrastructure</h4><p>Full push notification system via Firebase Cloud Messaging and APNs, supporting transactional, scheduled, and segmented campaigns.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18"></path><path d="M3 12h18"></path><circle cx="12" cy="12" r="9"></circle></svg></div><div class="feat-body"><h4>Full Laravel API Backend</h4><p>A production-grade REST API powering authentication, data, payments, file uploads, and business logic, versioned and documented.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="6" width="18" height="12" rx="2"></rect><path d="M3 10h18"></path><path d="M8 15h4"></path></svg></div><div class="feat-body"><h4>In-App Payment Integration</h4><p>Paystack for Nigerian naira transactions and Stripe for international payments with webhook listeners and a full audit trail.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7a2 2 0 0 1 2-2h8l2 2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2Z"></path><path d="M9 12h6"></path></svg></div><div class="feat-body"><h4>Offline Capability</h4><p>Critical data cached locally for use without a network connection, with background sync replaying actions when connectivity returns.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17.5 5.5 20"></path><path d="M17 17.5 18.5 20"></path><path d="M7 7.5 5 4.5"></path><path d="M17 7.5 19 4.5"></path><rect x="4" y="8" width="16" height="8" rx="3"></rect><path d="M8 12h.01"></path><path d="M16 12h.01"></path></svg></div><div class="feat-body"><h4>App Store & Google Play Submission</h4><p>Full submission to both stores including app signing, metadata, screenshots, privacy policy, age ratings, and reviewer feedback.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="12" rx="2"></rect><path d="M8 20h8"></path><path d="M12 16v4"></path></svg></div><div class="feat-body"><h4>Filament Admin Dashboard</h4><p>A full-featured web admin panel for managing users, content, push campaigns, payments, and application data.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h10"></path><path d="m10 6 6 6-6 6"></path></svg></div><div class="feat-body"><h4>OTA Updates</h4><p>Expo OTA update infrastructure for pushing JavaScript fixes and content updates instantly without waiting for store review cycles.</p></div></div>
    <div class="feat-item"><div class="feat-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 8 4.5-8 4.5-8-4.5L12 3Z"></path><path d="M4 7.5V16.5L12 21"></path><path d="M20 7.5V16.5L12 21"></path><path d="M12 12v9"></path></svg></div><div class="feat-body"><h4>Full Source Code & Credentials</h4><p>Complete source code, store credentials, server access, and API keys transferred in full on handover. You own everything.</p></div></div>
  </div>
</section>

<section class="pkg-section" aria-labelledby="pkg-heading">
  <div class="two-col-intro">
    <div><span class="s-label">Pricing</span><h2 class="s-head" id="pkg-heading">Mobile app packages<br>by <em>product scale</em></h2></div>
    <p>All mobile projects are scoped and quoted after a free consultation. The ranges below reflect typical project categories and your exact quote will be itemised before any commitment is made.</p>
  </div>
  <div class="pkg-grid">
    <div class="pkg-card reveal"><div class="pkg-head"><div class="pkg-badge">Idea Validation</div><div class="pkg-name">MVP App</div><p class="pkg-tagline">A focused mobile MVP to validate your product idea and get real users before the full build.</p><div class="pkg-price">₦1.2M <sub>starting from</sub></div></div><div class="pkg-body"><div class="pkg-feat">iOS + Android (React Native)</div><div class="pkg-feat">Up to 8 core screens</div><div class="pkg-feat">Auth (email/password)</div><div class="pkg-feat">Basic Laravel API backend</div><div class="pkg-feat">Push notifications</div><div class="pkg-feat">Single payment gateway</div><div class="pkg-feat">App Store + Google Play submission</div><div class="pkg-feat">30-day post-launch support</div><div class="pkg-feat no">Offline capability</div><div class="pkg-feat no">Biometric auth</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn outline">Get a Quote →</a></div></div>
    <div class="pkg-card featured reveal"><div class="pkg-head"><div class="pkg-badge">Most Common</div><div class="pkg-name">Full-Featured App</div><p class="pkg-tagline">A complete, polished app ready for real users with all the platform features your business needs.</p><div class="pkg-price">₦2.5M–6M <sub>based on scope</sub></div></div><div class="pkg-body"><div class="pkg-feat">iOS + Android (React Native)</div><div class="pkg-feat">Unlimited screens in scope</div><div class="pkg-feat">Biometric authentication</div><div class="pkg-feat">Full Laravel API + Filament admin</div><div class="pkg-feat">Paystack + Stripe payments</div><div class="pkg-feat">Push notifications (segmented)</div><div class="pkg-feat">Offline capability & background sync</div><div class="pkg-feat">Location & maps integration</div><div class="pkg-feat">App Store + Play Store submission</div><div class="pkg-feat">60-day post-launch support</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn gold">Request a Proposal →</a></div></div>
    <div class="pkg-card reveal"><div class="pkg-head"><div class="pkg-badge">Enterprise & Scale</div><div class="pkg-name">Enterprise App</div><p class="pkg-tagline">Complex apps with real-time features, multi-role systems, heavy integrations, or high-traffic demands.</p><div class="pkg-price">Custom <sub>quoted on scope</sub></div></div><div class="pkg-body"><div class="pkg-feat">React Native or fully native</div><div class="pkg-feat">Real-time features</div><div class="pkg-feat">Multi-tenant or multi-app system</div><div class="pkg-feat">Custom hardware integrations</div><div class="pkg-feat">Advanced analytics dashboard</div><div class="pkg-feat">HealthKit / Google Fit / NFC</div><div class="pkg-feat">Encrypted messaging</div><div class="pkg-feat">Load testing & optimisation</div><div class="pkg-feat">90-day SLA support</div><div class="pkg-feat">Ongoing retainer available</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn solid">Discuss Requirements →</a></div></div>
  </div>
</section>

<section class="store-section" aria-labelledby="store-heading">
  <div class="store-header reveal">
    <div><span class="s-label" style="color:var(--gold)">App Store Readiness</span><h2 class="s-head" style="color:var(--white)" id="store-heading">We handle every step of<br>the <em>store submission</em></h2></div>
    <p>App Store submission is not a formality. We know both review processes inside out and handle every requirement so your app ships on time without unexpected delays.</p>
  </div>
  <div class="store-cols reveal">
    <div class="store-col"><div class="store-col-head ios"><span class="store-col-head-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M15 5c-.9 1.1-1.3 2.2-1.2 3.3 1.3.1 2.4-.4 3.3-1.3.8-1 .9-2 .9-2.6-1.2-.1-2.2.2-3 .6Z"></path><path d="M16.8 12.2c0-2.2 1.8-3.3 1.9-3.4-1-1.5-2.7-1.7-3.2-1.7-1.4-.1-2.6.8-3.3.8-.7 0-1.7-.8-2.9-.8-1.5 0-2.8.9-3.6 2.2-1.6 2.7-.4 6.7 1.2 9 0 .1 1.5 2.2 3.1 2.1 1.4-.1 1.9-.9 3.5-.9s2.1.9 3.5.9c1.5 0 2.5-1.3 3-2.1.7-1 1-2 1.1-2.1-.1 0-4.3-1.7-4.3-5Z"></path></svg></span><div><div class="store-col-head-title">Apple App Store</div><div class="store-col-head-sub">App Store Connect · TestFlight · Certificates</div></div></div><div class="store-col-body"><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>App signing & provisioning</strong> configured correctly for every device target.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Metadata</strong> for title, description, keywords, age rating, and localisation.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Screenshots & previews</strong> at required resolutions.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Privacy declarations</strong> and permission usage strings completed.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>TestFlight beta testing</strong> during development.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Review guideline compliance</strong> to minimise rejection risk.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Rejection handling</strong> until approval, at no extra cost.</div></div></div></div>
    <div class="store-col"><div class="store-col-head and"><span class="store-col-head-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 17.5 5.5 20"></path><path d="M17 17.5 18.5 20"></path><path d="M7 7.5 5 4.5"></path><path d="M17 7.5 19 4.5"></path><rect x="4" y="8" width="16" height="8" rx="3"></rect><path d="M8 12h.01"></path><path d="M16 12h.01"></path></svg></span><div><div class="store-col-head-title">Google Play Store</div><div class="store-col-head-sub">Play Console · Internal Testing · APK Signing</div></div></div><div class="store-col-body"><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>APK signing & Play App Signing</strong> with secure keystore setup.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Play Console listing</strong> with title, descriptions, screenshots, and feature graphic.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Content rating questionnaire</strong> for all target territories.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Data safety form</strong> declaring what data the app collects and how it is used.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Internal and closed testing tracks</strong> for real-device Android testing.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Target API compliance</strong> to stay aligned with Google Play policies.</div></div><div class="store-check"><span class="store-check-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span><div><strong>Rejection handling</strong> until the app is live.</div></div></div></div>
  </div>
</section>

<section class="results-section" aria-labelledby="results-heading">
  <div class="two-col-intro">
    <div><span class="s-label">Proven Outcomes</span><h2 class="s-head" id="results-heading">What our mobile apps<br><em>achieve in the wild</em></h2></div>
    <p>Real numbers from mobile applications and mobile-backed platforms we have shipped. A great mobile product is measurable in user retention, transaction volume, and time saved.</p>
  </div>
  <div class="results-grid">
    <div class="result-card reveal"><div class="result-num"><span class="counter" data-target="74">0</span><span>%</span></div><div class="result-label">Of platform traffic comes from mobile devices across our Nigerian-market builds</div><p class="result-project">Across all i2Medier Nigerian platforms, reinforcing why a dedicated mobile experience is not optional for this market.</p></div>
    <div class="result-card reveal"><div class="result-num"><span class="counter" data-target="62">0</span><span>%</span></div><div class="result-label">Of total transactions processed via mobile app vs desktop on launch month</div><p class="result-project">YBLocal mobile companion showed users immediately preferred the native app experience over the responsive web version.</p></div>
    <div class="result-card reveal"><div class="result-num"><span class="counter" data-target="48">0</span><span>hrs</span></div><div class="result-label">Average Google Play review time on our recent submissions</div><p class="result-project">Our compliance checklist and pre-submission review process has delivered a 100% first-pass approval rate on recent submissions.</p></div>
  </div>
</section>

<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What clients say about<br>our <em>mobile work</em></h2>
  <div class="test-grid">
    <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"We had the app on TestFlight within 6 weeks and in users' hands within 10. The attention to offline performance was exactly what we needed. Our field agents work in areas with poor connectivity and the app handles it seamlessly."</p><div class="test-author"><div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div><div class="test-name">Co-founder</div><div class="test-role">YBLocal Platform</div></div></div></div>
    <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"The biometric login and push notification system work flawlessly. Our users actually use the notifications. The UX work they did in the design phase paid for itself ten times over."</p><div class="test-author"><div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div><div class="test-name">Product Lead</div><div class="test-role">Fintech Client, Lagos</div></div></div></div>
    <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"i2Medier handled the entire App Store and Google Play submission process. Both apps were approved first time with no rejections. The admin panel they built alongside the app means our team can run push campaigns and monitor activity without calling a developer."</p><div class="test-author"><div class="test-avatar"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21a8 8 0 0 0-16 0"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div><div class="test-name">Founder</div><div class="test-role">EdTech Startup, Abuja</div></div></div></div>
  </div>
</section>

<section aria-labelledby="faq-heading">
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">Mobile app questions,<br><em>answered honestly</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal"><h3>Still unsure?</h3><p>Mobile app questions are rarely simple. Every project is different. Email us and we'll give you a straight, honest answer tailored to your specific situation.</p><a href="mailto:hello@i2medier.com" class="faq-clink">Email Us →</a></div>
    <div class="faq-list reveal">
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f1">Do you build for iOS, Android, or both?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="f1">We build for both. Our primary approach is React Native, which produces a single codebase that runs natively on both iOS and Android, reducing cost and timeline without compromising native quality. For projects requiring deep platform integration, we also build fully native iOS or native Android applications.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f2">What is the difference between React Native and Flutter?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="f2">React Native renders to native platform UI components using JavaScript. Flutter uses Dart and renders its own UI layer. We work in React Native because it integrates naturally with our Laravel API backends, has a broader ecosystem, and aligns well with platform guidelines.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f3">How long does it take to build a mobile app?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="f3">A focused MVP typically takes 8 to 12 weeks from design sign-off to App Store submission. Mid-complexity apps range from 12 to 18 weeks. Enterprise applications with complex integrations or real-time features can take 20+ weeks.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f4">Do you build the backend API as well?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="f4">Yes. We build the Laravel API backend as part of every app project, handling endpoints, authentication, data models, push infrastructure, payment processing, and business logic. If you already have a working API, we can integrate against it provided it is well documented.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f5">How much does a mobile app cost in Nigeria?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="f5">Mobile app development starts from ₦1.2M for a focused MVP. Mid-complexity apps with payment integration, user accounts, push notifications, and offline capability typically range from ₦2.5M to ₦6M. Enterprise apps are quoted individually after discovery.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f6">Do you handle App Store and Google Play submission?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="f6">Yes. It is included in every project. We handle app signing certificates, metadata, screenshots, privacy declarations, age ratings, data safety forms, and reviewer feedback for both Apple and Google.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f7">Can you add push notifications to my app?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="f7">Push notifications are a standard feature in most apps we build. We implement them using Firebase Cloud Messaging for Android and APNs for iOS, managed via a unified service in the Laravel backend with segmented and scheduled support.</div></div>
      <div class="faq-item"><button class="faq-q" aria-expanded="false" aria-controls="f8">Can you update the app after launch without going through the App Store?<span class="faq-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="f8">Yes, for JavaScript changes. We configure Expo OTA updates in every React Native project so bug fixes and content changes can be pushed instantly without waiting for store review cycles. Native code changes still require a store release.</div></div>
    </div>
  </div>
</section>

<section class="related-section" aria-labelledby="related-heading">
  <span class="s-label">Related Services</span>
  <h2 class="s-head" id="related-heading">Often paired <em>with mobile development</em></h2>
  <div class="related-grid">
    <a href="{{ route('site.services.laravel-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v18"></path><path d="M3 12h18"></path><circle cx="12" cy="12" r="9"></circle></svg></div><div class="ri-name">Laravel API Development</div><p class="ri-desc">The backend that powers your mobile app: REST APIs, auth, payments, queues, and admin panels.</p></a>
    <a href="{{ route('site.services.ui-ux-design') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h4a4 4 0 0 0 0-8Z"></path><circle cx="7.5" cy="10.5" r="1"></circle><circle cx="9.5" cy="7.5" r="1"></circle><circle cx="13.5" cy="7.5" r="1"></circle></svg></div><div class="ri-name">UI/UX Design</div><p class="ri-desc">Every app screen designed in Figma before code is written, with interactive prototypes for both iOS and Android.</p></a>
    <a href="{{ route('site.services.wordpress-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 7 7-7 11-7-11 7-7Z"></path></svg></div><div class="ri-name">WordPress Web Platform</div><p class="ri-desc">Build the web-facing side of your product in WordPress while the mobile app handles the native experience.</p></a>
    <a href="{{ route('site.services.website-maintenance') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Z"></path><path d="m9.5 12 1.8 1.8 3.7-3.8"></path></svg></div><div class="ri-name">App Maintenance & Support</div><p class="ri-desc">Post-launch retainer covering OS updates, API changes, bug fixes, and ongoing feature development.</p></a>
  </div>
</section>

<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build your<br>mobile app?</h2>
  <p>Tell us about your idea and we will send a clear, detailed proposal within 24 hours, no commitment required.</p>
  <a href="mailto:hello@i2medier.com" class="btn-dark">Start Your Mobile App →</a>
</section>
@endsection
