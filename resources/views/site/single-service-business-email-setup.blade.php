@extends('public.layouts.app')

@section('title', 'Business Email Setup Services | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/business-email-setup.css')
@endpush

@section('content')
<div class="email-page">
  <header class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-left">
      <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
        <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
        <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
        <span aria-current="page">Business Email Setup</span>
      </div>
      <span class="hero-tag"><span class="hero-dot"></span> Business Email Setup</span>
      <h1>Stop emailing clients<br>from Gmail.com,<br><em>look like a business</em></h1>
      <p class="hero-sub">We set up your professional @yourbusiness.com email on Google Workspace, Microsoft 365, or Zoho, with SPF, DKIM, and DMARC configured so your emails actually land in inboxes, not spam folders.</p>
      <div class="hero-btns">
        <a href="#contact" class="btn-white">Get Set Up Today</a>
        <a href="#platforms" class="btn-ghost">Compare Platforms</a>
      </div>
      <div class="hero-tags-row">
        <span class="hero-badge"><span class="hero-badge-dot"></span> Live in 24 to 48 Hours</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> SPF · DKIM · DMARC</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Full Email Migration</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Team Onboarding</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> 30-Day Support</span>
      </div>
    </div>

    <div class="hero-right">
      <div class="inbox-mock-wrap">
        <div class="floating-badge"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg> Inbox, Not Spam</div>
        <div class="inbox-mock">
          <div class="inbox-titlebar">
            <div class="im-dot" style="background:#ff5f57"></div>
            <div class="im-dot" style="background:#febc2e"></div>
            <div class="im-dot" style="background:#28c840"></div>
            <div class="im-search"><span class="im-search-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path></svg></span><span class="im-search-text">mail.google.com</span></div>
            <div class="im-avatar">CE</div>
          </div>
          <div class="inbox-body">
            <div class="inbox-sidebar">
              <div class="inbox-compose"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h9"></path><path d="M16.5 3.5a2.1 2.1 0 1 1 3 3L7 19l-4 1 1-4Z"></path></svg> Compose</div>
              <div class="inbox-nav-item active"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 12h16"></path><path d="M4 7h16"></path><path d="M4 17h16"></path></svg> Inbox <span class="inbox-nav-count">4</span></div>
              <div class="inbox-nav-item"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 2.6 5.3 5.9.9-4.2 4.1 1 5.8-5.3-2.8-5.3 2.8 1-5.8L3.5 9.2l5.9-.9Z"></path></svg> Starred</div>
              <div class="inbox-nav-item"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 12H8"></path><path d="m15 5 7 7-7 7"></path><path d="M8 5H4v14h4"></path></svg> Sent</div>
              <div class="inbox-nav-item"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 19V5h10l6 6v8Z"></path><path d="M14 5v6h6"></path></svg> Drafts</div>
              <div class="inbox-nav-item"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"></path><path d="M8 6V4h8v2"></path><path d="M6 6l1 14h10l1-14"></path></svg> Trash</div>
            </div>
            <div class="inbox-list">
              <div class="inbox-list-head"><span>Primary</span><span style="color:var(--em)">+ Add label</span></div>
              <div class="inbox-email unread"><div class="ie-avatar" style="background:#0f9d58">NK</div><div class="ie-body"><div class="ie-sender">Ngozi K. (nk@greenpath.ng)</div><div class="ie-subject">Re: Q3 Proposal, Looks Great</div><div class="ie-preview">Thank you for sending this across, the team loves…</div></div><div class="ie-time">10:34</div></div>
              <div class="inbox-email unread"><div class="ie-avatar" style="background:#5c2d91">JS</div><div class="ie-body"><div class="ie-sender">James S. (james@stratford.co.uk)</div><div class="ie-subject">Invoice #0047, Payment Received</div><div class="ie-preview">Your invoice has been settled. Attached is the…</div></div><div class="ie-time">09:11</div></div>
              <div class="inbox-email"><div class="ie-avatar" style="background:#e65100">AT</div><div class="ie-body"><div class="ie-sender">Amaka T. (amaka@boltlogistics.com)</div><div class="ie-subject">Partnership Enquiry, Introduction</div><div class="ie-preview">Hi, I came across your work and would love to…</div></div><div class="ie-time">Tue</div></div>
              <div class="inbox-email"><div class="ie-avatar" style="background:#1a73e8">GW</div><div class="ie-body"><div class="ie-sender">Google Workspace (noreply@google.com)</div><div class="ie-subject">Your domain is verified <span class="verify-inline"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span></div><div class="ie-preview">ceo@yourbusiness.com is now active and ready…</div></div><div class="ie-time">Mon</div></div>
            </div>
            <div class="inbox-preview">
              <div class="ip-head">Re: Q3 Proposal</div>
              <div class="ip-from">from: <span>nk@greenpath.ng</span></div>
              <div class="ip-line med"></div>
              <div class="ip-line"></div>
              <div class="ip-line short"></div>
              <div class="ip-line med"></div>
              <div class="ip-line vs"></div>
              <div class="ip-line"></div>
              <div class="ip-line short"></div>
              <div class="ip-sig">
                <div class="ip-sig-name">Chidi Emmanuel</div>
                <div class="ip-sig-role">CEO, Apex Solutions</div>
                <div class="ip-sig-domain">ceo@apexsolutions.com</div>
              </div>
            </div>
          </div>
        </div>
        <div class="floating-speed"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg> 100% inbox delivery · SPF ✓ DKIM ✓ DMARC ✓</div>
      </div>
    </div>
  </header>

  <div class="intro-band" role="complementary">
    <div class="intro-grid">
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="300">0</span><span>+</span></div><div class="intro-label">Business Emails Configured</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="24">0</span><span style="color:var(--gold)">hrs</span></div><div class="intro-label">Typical Setup Time</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span>from </span><span style="color:var(--gold)">₦45k</span></div><div class="intro-label">One-Time Setup Fee</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span style="color:var(--gold)">4</span></div><div class="intro-label">Platforms We Support</div></div>
    </div>
  </div>

  <section class="build-section" aria-labelledby="build-heading">
    <div class="build-intro">
      <div><span class="s-label">What We Set Up</span><h2 class="s-head" id="build-heading">Email solutions for every<br><em>size of business</em></h2></div>
      <p class="s-sub">Whether you are a solo founder who needs one professional address or an enterprise team migrating 200 users to a new platform, we handle the full setup from domain verification to the last DNS record so your team can focus on work, not configuration.</p>
    </div>
    <div class="build-grid">
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></svg></div><h3 class="build-title">Google Workspace Setup</h3><p class="build-desc">The gold standard for businesses that run on Google. We handle domain verification, MX record setup, user creation, admin console hardening, and full email authentication.</p><div class="build-tags"><span class="build-tag">Gmail for Business</span><span class="build-tag">Google Meet</span><span class="build-tag">Google Drive</span><span class="build-tag">Admin Console</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v10l8 4 8-4V7Z"></path><path d="m12 3 8 4-8 4-8-4 8-4Z"></path></svg></div><h3 class="build-title">Microsoft 365 Setup</h3><p class="build-desc">For teams that depend on Outlook, Word, Excel, PowerPoint, and Teams. We set up your Microsoft 365 tenant from scratch with secure policies and full Exchange Online configuration.</p><div class="build-tags"><span class="build-tag">Outlook</span><span class="build-tag">Exchange Online</span><span class="build-tag">Teams</span><span class="build-tag">SharePoint</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4l3 2"></path></svg></div><h3 class="build-title">Zoho Mail Setup</h3><p class="build-desc">A cost-effective professional email option for smaller businesses that still want a clean admin panel, custom domain email, and proper DNS/security setup.</p><div class="build-tags"><span class="build-tag">Zoho Mail</span><span class="build-tag">Zoho Workplace</span><span class="build-tag">Free Tier Available</span><span class="build-tag">IMAP/POP3</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="12" rx="2"></rect><path d="M8 20h8"></path><path d="M12 16v4"></path></svg></div><h3 class="build-title">cPanel / Web Hosting Email</h3><p class="build-desc">Already have hosting with cPanel? We configure professional email directly through your hosting panel, including accounts, forwarders, spam filters, and client connection.</p><div class="build-tags"><span class="build-tag">cPanel Mail</span><span class="build-tag">Forwarders</span><span class="build-tag">Webmail</span><span class="build-tag">Spam Filters</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 8v8a2 2 0 0 1-2 2H8"></path><path d="M16 3h3a2 2 0 0 1 2 2v3"></path><rect x="3" y="8" width="13" height="13" rx="2"></rect></svg></div><h3 class="build-title">Email Migration</h3><p class="build-desc">We move your historical emails, contacts, and calendar events from old providers to the new platform with minimal disruption and zero data loss.</p><div class="build-tags"><span class="build-tag">IMAP Migration</span><span class="build-tag">Zero Data Loss</span><span class="build-tag">Contact Import</span><span class="build-tag">Calendar Transfer</span></div></div>
      <div class="build-card reveal"><div class="build-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="m9 12 2 2 4-4"></path></svg></div><h3 class="build-title">Email Security & Anti-Spam</h3><p class="build-desc">We configure the full email authentication stack and tune filtering policies so legitimate mail gets through and impersonation gets blocked.</p><div class="build-tags"><span class="build-tag">SPF</span><span class="build-tag">DKIM</span><span class="build-tag">DMARC</span><span class="build-tag">Anti-Phishing</span><span class="build-tag">2FA Enforced</span></div></div>
    </div>
  </section>

  <section class="approach-section" aria-labelledby="approach-heading" id="platforms">
    <div class="approach-layout">
      <div class="approach-copy">
        <span class="s-label">Why It Matters</span>
        <h2 class="s-head" id="approach-heading">Email configuration done wrong<br>costs you <em>clients and credibility</em></h2>
        <p>A free @gmail.com or @yahoo.com email address on your business card tells prospective clients one thing: this is not an established business. In competitive markets, first impressions are formed before you even speak, and your email address is often the first thing they see.</p>
        <p>But the stakes are higher than appearances. Email set up without proper DNS authentication means your emails are more likely to land in spam folders, and every proposal unread in junk is a sale you never knew you lost.</p>
        <div class="highlight-box"><h4>The three records that <span class="hb-gold">protect your domain</span></h4><p>SPF tells receiving servers who is allowed to send for your domain. DKIM signs your mail. DMARC tells receiving servers what to do when a message fails validation. Together, they are the difference between landing in inboxes and being flagged as spam or phishing.</p></div>
        <p>We configure all three on every setup and test delivery to Gmail, Outlook, and Yahoo inboxes before handover, so you do not go live until the fundamentals are verified.</p>
      </div>
      <div>
        <div class="dns-block" style="margin-bottom:1.25rem">
          <div class="dns-block-head">DNS Records — yourbusiness.com <span class="ok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg> All Verified</span></div>
          <div class="dns-block-body">
            <div><span class="dns-type">TXT</span><span class="dns-sep">|</span><span class="dns-host">@</span><span class="dns-sep">→</span><span class="dns-val">v=spf1 include:_spf.google.com ~all</span> <span class="dns-ok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span></div>
            <div><span class="dns-type">TXT</span><span class="dns-sep">|</span><span class="dns-host">google._domainkey</span><span class="dns-sep">→</span><span class="dns-val">v=DKIM1; k=rsa; p=MIIBIj...</span> <span class="dns-ok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span></div>
            <div><span class="dns-type">TXT</span><span class="dns-sep">|</span><span class="dns-host">_dmarc</span><span class="dns-sep">→</span><span class="dns-val">v=DMARC1; p=reject; rua=mailto:dmarc@...</span> <span class="dns-ok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span></div>
            <div><span class="dns-type">MX</span><span class="dns-sep">|</span><span class="dns-host">@</span><span class="dns-sep">→</span><span class="dns-val">aspmx.l.google.com (Priority 1)</span> <span class="dns-ok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></span></div>
          </div>
        </div>
        <div class="s-label" style="font-size:.68rem;color:var(--g400);margin-bottom:.85rem">Choose Your Platform</div>
        <div class="platform-grid">
          <div class="platform-card"><div class="pc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></svg></div><div class="pc-name">Google Workspace</div><div class="pc-best">Best for teams who use Google Docs, Sheets, Drive, and Meet daily.</div><span class="pc-pill google">From $6/user/month</span></div>
          <div class="platform-card"><div class="pc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v10l8 4 8-4V7Z"></path><path d="m12 3 8 4-8 4-8-4 8-4Z"></path></svg></div><div class="pc-name">Microsoft 365</div><div class="pc-best">Best for teams who rely on desktop Office apps and Teams for communication.</div><span class="pc-pill ms">From $6/user/month</span></div>
          <div class="platform-card"><div class="pc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4l3 2"></path></svg></div><div class="pc-name">Zoho Mail</div><div class="pc-best">Best for budget-conscious teams who need clean, reliable email without extras.</div><span class="pc-pill zoho">Free for up to 5 users</span></div>
          <div class="platform-card"><div class="pc-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="12" rx="2"></rect><path d="M8 20h8"></path><path d="M12 16v4"></path></svg></div><div class="pc-name">cPanel Hosting</div><div class="pc-best">Best for small sites already hosted on cPanel who want email on the same account.</div><span class="pc-pill cpanel">Included in hosting</span></div>
        </div>
      </div>
    </div>
  </section>

  <section class="process-section" aria-labelledby="process-heading">
    <div class="process-header">
      <div><span class="s-label" style="color:var(--gold)">Our Setup Process</span><h2 class="s-head" id="process-heading" style="color:var(--white)">From domain to a working<br>inbox in <em>24 to 48 hours</em></h2></div>
      <p>No drawn-out projects. No waiting for tickets. We follow a streamlined process that gets your professional email live quickly and correctly.</p>
    </div>
    <div class="process-steps">
      <div class="ps-item reveal"><div class="ps-num">01</div><div class="ps-body"><h3 class="ps-title">Discovery & Platform Recommendation</h3><p class="ps-desc">We understand your team size, current setup, tools, and budget, then recommend the right platform and give you a clear cost breakdown.</p><div class="ps-deliverables"><span class="ps-del">Platform Recommendation</span><span class="ps-del">Full Cost Breakdown</span><span class="ps-del">User Count & Plan</span><span class="ps-del">Timeline Confirmation</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">02</div><div class="ps-body"><h3 class="ps-title">Domain Verification & DNS Configuration</h3><p class="ps-desc">We add verification records, MX records, and all authentication records in one session to minimise propagation delays.</p><div class="ps-deliverables"><span class="ps-del">Domain Verification TXT</span><span class="ps-del">MX Records</span><span class="ps-del">SPF Record</span><span class="ps-del">DKIM Record</span><span class="ps-del">DMARC Policy</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">03</div><div class="ps-body"><h3 class="ps-title">Account & User Creation</h3><p class="ps-desc">We create user accounts, aliases, groups, and shared inboxes with secure credentials and sensible role permissions.</p><div class="ps-deliverables"><span class="ps-del">User Accounts Created</span><span class="ps-del">Email Groups / Aliases</span><span class="ps-del">Shared Inboxes</span><span class="ps-del">Role Permissions</span><span class="ps-del">Secure Credentials</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">04</div><div class="ps-body"><h3 class="ps-title">Security Hardening & Spam Configuration</h3><p class="ps-desc">We enforce 2FA, configure spam and phishing protection, and apply platform-specific security baselines.</p><div class="ps-deliverables"><span class="ps-del">2FA Enforced</span><span class="ps-del">Spam Filter Rules</span><span class="ps-del">Phishing Protection</span><span class="ps-del">Activity Alerts</span><span class="ps-del">Login Security Policy</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">05</div><div class="ps-body"><h3 class="ps-title">Delivery Testing & Team Handover</h3><p class="ps-desc">We test delivery to major inbox providers and hand over credentials, guides, and onboarding support once the setup is verified.</p><div class="ps-deliverables"><span class="ps-del">Inbox Delivery Test</span><span class="ps-del">Authentication Report</span><span class="ps-del">User Credentials</span><span class="ps-del">Admin Guide</span><span class="ps-del">Onboarding Session</span></div></div></div>
    </div>
  </section>

  <section class="tech-section" aria-labelledby="tech-heading">
    <div class="tech-intro">
      <div><span class="s-label">Platforms & Tools</span><h2 class="s-head" id="tech-heading">Every platform we work with,<br><em>configured to its full potential</em></h2></div>
      <p>We do not just create accounts. We configure each platform correctly from the admin level up, applying security baselines, spam policies, and DNS settings that most self-service setups miss.</p>
    </div>
    <div class="tech-table">
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></svg></div><div><div class="tech-name">Google Workspace</div><div class="tech-sub">Gmail, Drive, Meet, Docs</div></div></div><div class="tech-desc">Configured for admin security, collaboration, archiving, and reliable delivery.</div><span class="tech-badge core">Primary</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v10l8 4 8-4V7Z"></path><path d="m12 3 8 4-8 4-8-4 8-4Z"></path></svg></div><div><div class="tech-name">Microsoft 365</div><div class="tech-sub">Outlook, Exchange, Teams</div></div></div><div class="tech-desc">Configured for Exchange Online, Outlook profiles, Defender rules, and full organisation setup.</div><span class="tech-badge core">Primary</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4l3 2"></path></svg></div><div><div class="tech-name">Zoho Mail</div><div class="tech-sub">Ad-free, budget-friendly</div></div></div><div class="tech-desc">Configured for smaller teams who need low-cost professional email with reliable core features.</div><span class="tech-badge ext">Supported</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="12" rx="2"></rect><path d="M8 20h8"></path><path d="M12 16v4"></path></svg></div><div><div class="tech-name">cPanel Email Hosting</div><div class="tech-sub">Web hosting-based email</div></div></div><div class="tech-desc">Configured for smaller businesses already running on cPanel hosting and webmail.</div><span class="tech-badge ext">Supported</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="m9 12 2 2 4-4"></path></svg></div><div><div class="tech-name">SPF · DKIM · DMARC</div><div class="tech-sub">Email authentication stack</div></div></div><div class="tech-desc">Published and verified on every setup so your domain is protected and deliverability is stronger.</div><span class="tech-badge perf">Standard</span></div>
      <div class="tech-row reveal"><div class="tech-row-label"><div class="tech-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="2.5" width="10" height="19" rx="2"></rect><path d="M11 18.5h2"></path></svg></div><div><div class="tech-name">Outlook · Apple Mail · Thunderbird</div><div class="tech-sub">Desktop & mobile clients</div></div></div><div class="tech-desc">Configured for users who prefer dedicated mail apps rather than browser-based webmail.</div><span class="tech-badge tool">Client Setup</span></div>
    </div>
  </section>

  <section class="deliv-section" aria-labelledby="deliv-heading">
    <div class="deliv-intro">
      <div><span class="s-label">What You Receive</span><h2 class="s-head" id="deliv-heading">A complete, secure setup.<br><em>Not just a login link.</em></h2></div>
      <p>Too many email setup services create accounts and disappear. We deliver a complete package: users configured, DNS verified, security policies applied, and a guide your team can actually use.</p>
    </div>
    <div class="deliv-grid">
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m3 7 9 6 9-6"></path></svg></div><div class="deliv-body"><h4>Fully Configured Email Accounts</h4><p>All user accounts created with your preferred naming convention, including aliases, groups, and shared inboxes where needed.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="m9 12 2 2 4-4"></path></svg></div><div class="deliv-body"><h4>Complete DNS Authentication Records</h4><p>SPF, DKIM, and DMARC records published and verified on your domain with a post-setup verification report.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg></div><div class="deliv-body"><h4>Security Baseline Applied</h4><p>2FA, suspicious login alerts, anti-spam rules, and provider-specific security settings applied from the start.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></div><div class="deliv-body"><h4>Inbox Delivery Test Report</h4><p>We test delivery to Gmail, Outlook, and Yahoo and confirm authentication passes before handover.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 4h8l4 4v12H7Z"></path><path d="M15 4v4h4"></path><path d="M9 13h6"></path><path d="M9 17h4"></path></svg></div><div class="deliv-body"><h4>Admin & User Quick-Start Guide</h4><p>A written guide covering basic admin tasks, password resets, and how your team should access the new environment.</p></div></div>
      <div class="deliv-item reveal"><div class="deliv-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4 3 9l9 5 9-5-9-5Z"></path><path d="M7 11.5v4.5c0 .8 2.2 2 5 2s5-1.2 5-2v-4.5"></path></svg></div><div class="deliv-body"><h4>30-Day Post-Setup Support</h4><p>Email and WhatsApp support for 30 days post-setup, plus onboarding help for larger teams.</p></div></div>
    </div>
  </section>

  <section class="packages-section" aria-labelledby="packages-heading">
    <div class="packages-intro">
      <div><span class="s-label">Setup Packages</span><h2 class="s-head" id="packages-heading">Transparent, one-time pricing<br>for <em>every team size</em></h2></div>
      <p>These are our setup fees. Platform subscription costs are separate and billed directly by the provider, and we explain the full recurring cost before anything begins.</p>
    </div>
    <div class="pkg-grid">
      <div class="pkg-card reveal"><div class="pkg-head"><span class="pkg-badge">Solo / Small Team</span><div class="pkg-name">Starter Setup</div><div class="pkg-tagline">For founders and micro-businesses who need professional email for up to 5 users.</div><div class="pkg-price">₦45,000 <sub>one-time fee</sub></div></div><div class="pkg-body"><div class="pkg-feat">Up to 5 user accounts</div><div class="pkg-feat">Platform of your choice</div><div class="pkg-feat">Full DNS configuration</div><div class="pkg-feat">SPF, DKIM & DMARC setup</div><div class="pkg-feat">2FA enforced</div><div class="pkg-feat">Inbox delivery test</div><div class="pkg-feat">Admin quick-start guide</div><div class="pkg-feat">30-day support</div><div class="pkg-feat no">Email migration</div><div class="pkg-feat no">Desktop client setup</div></div><div class="pkg-foot"><a href="{{ route('site.start') }}" class="pkg-btn outline">Get Started</a></div></div>
      <div class="pkg-card featured reveal"><div class="pkg-head"><span class="pkg-badge">Most Popular</span><div class="pkg-name">Business Setup</div><div class="pkg-tagline">For established businesses needing a complete setup with migration and desktop client configuration.</div><div class="pkg-price">₦120,000 <sub>one-time fee</sub></div></div><div class="pkg-body" style="background:#1a1a1a"><div class="pkg-feat" style="color:rgba(255,255,255,.6)">Up to 20 user accounts</div><div class="pkg-feat" style="color:rgba(255,255,255,.6)">Platform of your choice</div><div class="pkg-feat" style="color:rgba(255,255,255,.6)">Full DNS configuration</div><div class="pkg-feat" style="color:rgba(255,255,255,.6)">SPF, DKIM & DMARC setup</div><div class="pkg-feat" style="color:rgba(255,255,255,.6)">2FA enforced org-wide</div><div class="pkg-feat" style="color:rgba(255,255,255,.6)">Email migration</div><div class="pkg-feat" style="color:rgba(255,255,255,.6)">Desktop client setup</div><div class="pkg-feat" style="color:rgba(255,255,255,.6)">Shared inboxes & groups</div><div class="pkg-feat" style="color:rgba(255,255,255,.6)">Delivery test report</div><div class="pkg-feat" style="color:rgba(255,255,255,.6)">30-day priority support</div></div><div class="pkg-foot" style="background:#1a1a1a;padding-bottom:1.6rem"><a href="#contact" class="pkg-btn gold">Get a Quote for This →</a></div></div>
      <div class="pkg-card reveal"><div class="pkg-head"><span class="pkg-badge">Enterprise</span><div class="pkg-name">Enterprise Migration</div><div class="pkg-tagline">For organisations with large teams, multi-domain migrations, or stricter compliance requirements.</div><div class="pkg-price">Custom <sub>scoped per project</sub></div></div><div class="pkg-body"><div class="pkg-feat">Unlimited users in scope</div><div class="pkg-feat">Multi-domain configuration</div><div class="pkg-feat">Large-scale migration</div><div class="pkg-feat">Advanced security hardening</div><div class="pkg-feat">Mobile device management</div><div class="pkg-feat">Compliance archiving</div><div class="pkg-feat">DLP policies</div><div class="pkg-feat">IT team handover</div><div class="pkg-feat">Staff onboarding sessions</div><div class="pkg-feat">Ongoing admin retainer option</div></div><div class="pkg-foot"><a href="#contact" class="pkg-btn solid">Discuss Your Project</a></div></div>
    </div>
  </section>

  <section class="results-section" aria-labelledby="results-heading">
    <div class="results-intro">
      <div><span class="s-label" style="color:var(--gold)">Real Outcomes</span><h2 class="s-head" id="results-heading" style="color:var(--white)">What changes when your<br><em>email is set up correctly</em></h2></div>
      <p>Professional email is not glamorous, but the business impact of getting it right is very real. These are the kinds of outcomes that follow clean setup and better deliverability.</p>
    </div>
    <div class="results-grid">
      <div class="result-card reveal"><div class="result-num"><span>0</span>%</div><div class="result-label">Emails Flagged as Spam After Setup</div><p class="result-project">Proper SPF, DKIM, and DMARC configuration can turn unreliable outreach into verified inbox placement across the major providers.</p></div>
      <div class="result-card reveal"><div class="result-num"><span>48</span>hrs</div><div class="result-label">Migration of 85 Users, Zero Data Loss</div><p class="result-project">Large team migrations can be completed over a short window when the old system, new system, and cutover are planned correctly.</p></div>
      <div class="result-card reveal"><div class="result-num">+<span>40</span>%</div><div class="result-label">Email Response Rate Improvement</div><p class="result-project">A stronger sender identity and better inbox placement often produce better reply rates from new contacts and prospects.</p></div>
    </div>
  </section>

  <section class="compare-section" aria-labelledby="compare-heading">
    <div class="compare-intro">
      <div><span class="s-label">Platform Comparison</span><h2 class="s-head" id="compare-heading">Google Workspace vs Microsoft 365<br><em>vs Zoho Mail</em></h2></div>
      <p>Not sure which platform is right for your business? Here is a direct comparison of the three platforms we set up most frequently.</p>
    </div>
    <table class="compare-table" role="table" aria-label="Email platform comparison">
      <thead><tr><th>Feature</th><th class="highlight">Google Workspace</th><th>Microsoft 365</th><th>Zoho Mail</th></tr></thead>
      <tbody>
        <tr><td class="feature">Email Interface</td><td class="highlight"><span class="yes">Gmail (browser-first)</span></td><td>Outlook (desktop + web)</td><td>Zoho Mail (browser-first)</td></tr>
        <tr><td class="feature">Collaboration Suite</td><td class="highlight"><span class="yes">Docs, Sheets, Slides, Drive</span></td><td><span class="yes">Word, Excel, PowerPoint, Teams</span></td><td><span class="partial">Zoho Docs (limited)</span></td></tr>
        <tr><td class="feature">Video Meetings</td><td class="highlight"><span class="yes">Google Meet</span></td><td><span class="yes">Microsoft Teams</span></td><td><span class="no">Not included</span></td></tr>
        <tr><td class="feature">Starting Price</td><td class="highlight">$6 / user / month</td><td>$6 / user / month</td><td><span class="yes">Free (up to 5 users)</span></td></tr>
        <tr><td class="feature">Storage per User</td><td class="highlight">30 GB</td><td>50 GB email + 1 TB OneDrive</td><td>5 GB free / 50 GB paid</td></tr>
        <tr><td class="feature">Best For</td><td class="highlight">Teams who live in the browser & Google apps</td><td>Teams who rely on desktop Office apps</td><td>Small teams on a tight budget</td></tr>
        <tr><td class="feature">Mobile App Quality</td><td class="highlight"><span class="yes">Excellent (Gmail app)</span></td><td><span class="yes">Excellent (Outlook app)</span></td><td><span class="partial">Good</span></td></tr>
        <tr><td class="feature">Admin Control</td><td class="highlight"><span class="yes">Comprehensive Google Admin Console</span></td><td><span class="yes">Microsoft Admin Centre + Defender</span></td><td><span class="partial">Basic admin panel</span></td></tr>
      </tbody>
    </table>
  </section>

  <section class="test-section" aria-labelledby="test-heading">
    <div class="test-intro"><span class="s-label">Client Testimonials</span><h2 class="s-head" id="test-heading">What our clients say about<br>the <em>email setup experience</em></h2></div>
    <div class="test-grid">
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"We had been sending proposals from a Yahoo address for two years without realising how much it was costing us. The difference after the new setup was immediate."</p><div class="test-author"><div class="test-avatar">OA</div><div><div class="test-name">Olumide Adeyemi</div><div class="test-role">MD, Pinnacle Advisory · Lagos</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"I had tried to set up Google Workspace myself three times and kept ending up in spam. Once the records were configured properly, everything changed."</p><div class="test-author"><div class="test-avatar">FK</div><div><div class="test-name">Fatimah Kamara</div><div class="test-role">Founder, KasaGrow Agency · Abuja</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"We needed to migrate a large team without losing archives or disrupting operations. The cutover was clean and the history came across perfectly."</p><div class="test-author"><div class="test-avatar">BI</div><div><div class="test-name">Blessing Igwe</div><div class="test-role">IT Manager, Riverstone Group · PH</div></div></div></div>
    </div>
  </section>

  <section class="faq-section" aria-labelledby="faq-heading">
    <span class="s-label">Frequently Asked Questions</span>
    <h2 class="s-head" id="faq-heading">Questions about our<br><em>business email setup service</em></h2>
    <div class="faq-layout">
      <div class="faq-sidebar"><h3>Still have a question?</h3><p>We are happy to talk through your exact setup situation, what platform makes sense, how the migration would work, or what it will cost.</p><a href="mailto:hello@i2medier.com" class="faq-clink">Email Us Directly →</a></div>
      <div class="faq-list" role="list">
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faq1">What is the difference between Google Workspace and a free Gmail account?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faq1" role="region">A free Gmail account gives you a @gmail.com address. Google Workspace gives you a @yourbusiness.com address, more admin control, better team management, and a stronger professional signal to clients.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faq2">Will my emails land in spam after the setup?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faq2" role="region">Not if the setup is done correctly. We configure SPF, DKIM, and DMARC and test delivery before handover so your domain starts from a stronger technical baseline.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faq3">Can you migrate our existing emails to the new platform?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faq3" role="region">Yes. We handle email migration from cPanel hosting, Google Workspace, Outlook/Exchange, Yahoo, and other IMAP-compatible services with minimal disruption.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faq4">How long does business email setup take?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faq4" role="region">A standard setup usually takes 4–24 hours, with DNS propagation sometimes extending the visible cutover window to 24–48 hours depending on the registrar.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faq5">Which platform should I choose, Google Workspace or Microsoft 365?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faq5" role="region">Google Workspace is a better fit for browser-based teams using Drive and Docs. Microsoft 365 is usually the better fit for teams already committed to desktop Office apps and Teams.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faq6">How much does business email setup cost in Nigeria?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faq6" role="region">Our setup fee starts from ₦45,000 for a single-platform configuration with up to 5 user accounts. Larger teams and migrations are quoted based on user count and complexity.</div></div>
      </div>
    </div>
  </section>

  <section class="related-section" aria-labelledby="related-heading">
    <span class="s-label">Related Services</span>
    <h2 class="s-head" id="related-heading">Often paired <em>with this service</em></h2>
    <div class="related-grid">
      <a href="{{ route('site.services.wordpress-development') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 9 9"></path><path d="M8.5 8.5c1 3 2 6 3.5 9"></path><path d="M15.5 8.5c-1 3-2 6-3.5 9"></path><path d="M6.5 8.5h11"></path></svg></div><div class="ri-name">WordPress Development</div><p class="ri-desc">Custom WordPress website work to match the professional identity your new email setup creates.</p></a>
      <a href="{{ route('site.services.ui-ux-design') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="7" height="7" rx="1.5"></rect><rect x="13" y="4" width="7" height="7" rx="1.5"></rect><rect x="4" y="13" width="7" height="7" rx="1.5"></rect><rect x="13" y="13" width="7" height="7" rx="1.5"></rect></svg></div><div class="ri-name">UI/UX Design</div><p class="ri-desc">A stronger product and brand experience online to back up the professional email address your business sends from.</p></a>
      <a href="{{ route('site.services.search-optimization') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path></svg></div><div class="ri-name">SEO Services</div><p class="ri-desc">On-page SEO and search visibility work that complements your wider digital presence and client acquisition flow.</p></a>
      <a href="{{ route('site.services.website-maintenance') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg></div><div class="ri-name">Website Maintenance</div><p class="ri-desc">Ongoing stability, monitoring, and support for the broader web infrastructure your business depends on.</p></a>
    </div>
  </section>

  <section class="cta-band" id="contact" aria-labelledby="cta-h">
    <h2 id="cta-h">Ready to send emails that<br>land and impress?</h2>
    <p>Tell us how many users you need, and we'll send you a detailed setup plan and cost breakdown within 24 hours.</p>
    <a href="mailto:hello@i2medier.com" class="btn-dark">Set Up My Business Email →</a>
  </section>
</div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/service-business-email-setup.js')
@endpush
