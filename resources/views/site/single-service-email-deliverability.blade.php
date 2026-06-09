@extends('public.layouts.app')

@section('title', 'Email Deliverability Services | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Email Deliverability', 'item' => route('site.services.email-deliverability')],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        [
            '@type' => 'Question',
            'name' => 'How do I know if I have a deliverability problem?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'The clearest signs are: lower-than-usual open rates, clients saying they didn\'t receive emails you sent, bounce rates above 2–3%, or a sudden drop in email engagement. If any of these apply, an audit will confirm whether deliverability is the cause.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'What is the difference between SPF, DKIM, and DMARC?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'SPF tells receiving servers which IPs are allowed to send email for your domain. DKIM adds a cryptographic signature to every message so the receiver can verify it was not tampered with. DMARC ties the two together and tells receiving servers what to do with messages that fail either check. All three are needed for strong inbox placement.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Can you get my domain removed from a blacklist?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. We submit removal requests to each blacklist provider your domain or IP is listed on. Most providers remove clean listings within 24–72 hours of a valid request. We verify clearance after each removal before closing the work.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Why should cold email not be sent from my main domain?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Cold email generates higher complaint and bounce rates than warm email to your own list. If that activity is associated with your primary domain, the damage carries over to all the legitimate email you send from that domain — proposals, invoices, client communication. Dedicated sending domains isolate the risk.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'How long does it take to fix email deliverability?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'DNS record fixes take effect within 1–24 hours (depending on TTL settings). Blacklist removals typically complete within 24–72 hours. Domain warm-up for cold email infrastructure takes 3–6 weeks. A full fix for a typical business domain is usually complete within 48–72 hours of us starting work.'],
        ],
        [
            '@type' => 'Question',
            'name' => 'Do I need access to my domain\'s DNS settings?',
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. DNS record changes require access to your domain registrar or DNS provider (Namecheap, GoDaddy, Cloudflare, etc.). You can either share access with us or we can provide you with the exact records to add yourself. We support both approaches.'],
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('page_css')
    @vite('resources/css/public/pages/email-deliverability.css')
@endpush

@section('content')
<div class="deliv-svc-page">
  <header class="hero">
    <div class="hero-glow" aria-hidden="true"></div>
    <div class="hero-grid" aria-hidden="true"></div>
    <div class="hero-left">
      <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
        <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
        <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
        <span aria-current="page">Email Deliverability</span>
      </div>
      <span class="hero-tag"><span class="hero-dot"></span> Email Deliverability</span>
      <h1>Your emails are<br>being sent. They're<br><em>not being read.</em></h1>
      <p class="hero-sub">If your emails land in spam, your domain is blacklisted, or your open rates have collapsed, the problem is deliverability. We find the root cause, fix the technical issues, and restore your sender reputation so your emails reach real inboxes.</p>
      <div class="hero-btns">
        <a href="#contact" class="btn-white">Fix My Deliverability</a>
        <a href="#what-we-fix" class="btn-ghost">See What We Fix</a>
      </div>
      <div class="hero-tags-row">
        <span class="hero-badge"><span class="hero-badge-dot"></span> SPF · DKIM · DMARC</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Blacklist Removal</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Domain Warm-Up</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Cold Email Infrastructure</span>
        <span class="hero-badge"><span class="hero-badge-dot"></span> Reputation Repair</span>
      </div>
    </div>

    <div class="hero-right">
      <div class="inbox-wrap">
        <div class="floating-badge"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg> Inbox Delivered</div>
        <div class="score-card">
          <div class="score-card-head">
            <div class="sc-domain">yourdomain.com</div>
            <div class="sc-status ok"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg> Healthy</div>
          </div>
          <div class="score-rows">
            <div class="score-row">
              <div class="sr-label">SPF Record</div>
              <div class="sr-bar"><div class="sr-fill" style="width:100%"></div></div>
              <div class="sr-val ok">Pass</div>
            </div>
            <div class="score-row">
              <div class="sr-label">DKIM Signature</div>
              <div class="sr-bar"><div class="sr-fill" style="width:100%"></div></div>
              <div class="sr-val ok">Pass</div>
            </div>
            <div class="score-row">
              <div class="sr-label">DMARC Policy</div>
              <div class="sr-bar"><div class="sr-fill" style="width:100%"></div></div>
              <div class="sr-val ok">Enforced</div>
            </div>
            <div class="score-row">
              <div class="sr-label">Blacklist Status</div>
              <div class="sr-bar"><div class="sr-fill" style="width:100%"></div></div>
              <div class="sr-val ok">Clean</div>
            </div>
            <div class="score-row">
              <div class="sr-label">Spam Score</div>
              <div class="sr-bar"><div class="sr-fill" style="width:96%"></div></div>
              <div class="sr-val ok">0.4 / 10</div>
            </div>
            <div class="score-row">
              <div class="sr-label">Inbox Placement</div>
              <div class="sr-bar"><div class="sr-fill" style="width:98%"></div></div>
              <div class="sr-val ok">98%</div>
            </div>
          </div>
          <div class="score-foot">
            <div class="sf-item"><div class="sf-dot gmail"></div> Gmail ✓</div>
            <div class="sf-item"><div class="sf-dot outlook"></div> Outlook ✓</div>
            <div class="sf-item"><div class="sf-dot yahoo"></div> Yahoo ✓</div>
          </div>
        </div>
        <div class="floating-speed"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg> All authentication passing · 0 blacklists</div>
      </div>
    </div>
  </header>

  <div class="intro-band" role="complementary">
    <div class="intro-grid">
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="500">0</span><span>+</span></div><div class="intro-label">Domains Audited & Fixed</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span class="counter" data-target="98">0</span><span style="color:var(--gold)">%</span></div><div class="intro-label">Average Inbox Placement After Fix</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span>from </span><span style="color:var(--gold)">₦35k</span></div><div class="intro-label">Deliverability Audit Fee</div></div>
      <div class="intro-item reveal"><div class="intro-num"><span style="color:var(--gold)">48</span><span style="font-size:1.1rem">hrs</span></div><div class="intro-label">Typical Fix Turnaround</div></div>
    </div>
  </div>

  <section class="fixes-section" id="what-we-fix" aria-labelledby="fixes-heading">
    <div class="fixes-intro">
      <div><span class="s-label">What We Fix</span><h2 class="s-head" id="fixes-heading">Every reason your emails<br>are <em>missing the inbox</em></h2></div>
      <p class="s-sub">Deliverability problems are rarely just one thing. We diagnose and fix the full stack: authentication records, domain reputation, IP standing, content signals, and infrastructure setup — so every fix holds.</p>
    </div>
    <div class="fixes-grid">
      <div class="fix-card reveal">
        <div class="fix-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="m9 12 2 2 4-4"></path></svg></div>
        <h3 class="fix-title">SPF, DKIM & DMARC Setup</h3>
        <p class="fix-desc">The three DNS records that tell receiving servers your email is legitimate. Missing or broken authentication is the single most common reason emails land in spam. We configure all three, test them, and verify enforcement.</p>
        <div class="fix-tags">
          <span class="fix-tag">SPF Record</span><span class="fix-tag">DKIM Keys</span><span class="fix-tag">DMARC Policy</span><span class="fix-tag">Alignment Check</span>
        </div>
      </div>
      <div class="fix-card reveal">
        <div class="fix-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"></path><path d="M8 6V4h8v2"></path><path d="M6 6l1 14h10l1-14"></path></svg></div>
        <h3 class="fix-title">Blacklist Removal</h3>
        <p class="fix-desc">If your domain or sending IP appears on a blacklist, your emails are blocked before they even reach the spam folder. We identify every active listing, submit removal requests, and monitor clearance across all major blacklist providers.</p>
        <div class="fix-tags">
          <span class="fix-tag">Spamhaus</span><span class="fix-tag">Barracuda</span><span class="fix-tag">SORBS</span><span class="fix-tag">MXToolbox</span><span class="fix-tag">DNSBL</span>
        </div>
      </div>
      <div class="fix-card reveal">
        <div class="fix-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></div>
        <h3 class="fix-title">Domain & IP Warm-Up</h3>
        <p class="fix-desc">New domains and fresh IP addresses have no sending history, which means receiving servers treat them with suspicion. We build that reputation progressively through structured warm-up plans that establish trust before any real volume goes out.</p>
        <div class="fix-tags">
          <span class="fix-tag">Warm-Up Plan</span><span class="fix-tag">Volume Ramp</span><span class="fix-tag">Reputation Seeding</span><span class="fix-tag">Engagement Signals</span>
        </div>
      </div>
      <div class="fix-card reveal">
        <div class="fix-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path><path d="M11 8v3l2 2"></path></svg></div>
        <h3 class="fix-title">Deliverability Audit</h3>
        <p class="fix-desc">A full technical inspection of your sending setup. We check DNS authentication, blacklist standing, spam score, inbox placement rate across Gmail, Outlook, and Yahoo, DMARC report data, and bounce/complaint patterns — with a written fix plan at the end.</p>
        <div class="fix-tags">
          <span class="fix-tag">DNS Audit</span><span class="fix-tag">Spam Score</span><span class="fix-tag">Inbox Placement Test</span><span class="fix-tag">Full Report</span>
        </div>
      </div>
      <div class="fix-card reveal">
        <div class="fix-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4h16v2H4z"></path><path d="M4 10h16"></path><path d="M4 16h10"></path><path d="M17 14l3 3-3 3"></path></svg></div>
        <h3 class="fix-title">Cold Email Infrastructure</h3>
        <p class="fix-desc">Sending cold outreach from your main business domain risks destroying its reputation permanently. We set up dedicated sending domains, configure their authentication, warm them up, and connect them to your outreach platform so your primary domain stays clean.</p>
        <div class="fix-tags">
          <span class="fix-tag">Sending Domains</span><span class="fix-tag">Instantly</span><span class="fix-tag">Smartlead</span><span class="fix-tag">Lemlist</span><span class="fix-tag">Domain Warm-Up</span>
        </div>
      </div>
      <div class="fix-card reveal">
        <div class="fix-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18"></path></svg></div>
        <h3 class="fix-title">DMARC Report Analysis</h3>
        <p class="fix-desc">DMARC aggregate reports reveal which sources are sending on behalf of your domain, whether authentication is passing, and if anyone is spoofing you. We analyse these reports, identify failures, tighten your policy, and stop impersonation at the DNS level.</p>
        <div class="fix-tags">
          <span class="fix-tag">Aggregate Reports</span><span class="fix-tag">Spoofing Detection</span><span class="fix-tag">Policy Tightening</span><span class="fix-tag">Alignment Fixes</span>
        </div>
      </div>
      <div class="fix-card reveal">
        <div class="fix-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m3 7 9 6 9-6"></path><path d="M3 17l5-5"></path><path d="M21 17l-5-5"></path></svg></div>
        <h3 class="fix-title">Email Content & Header Fixes</h3>
        <p class="fix-desc">Spam filters don't just check your domain — they score your email content, headers, link structure, and list hygiene. We audit outgoing mail for spam trigger patterns, fix header issues, and improve the content signals that affect inbox placement.</p>
        <div class="fix-tags">
          <span class="fix-tag">Spam Score Audit</span><span class="fix-tag">Header Review</span><span class="fix-tag">List Hygiene</span><span class="fix-tag">Unsubscribe Compliance</span>
        </div>
      </div>
      <div class="fix-card reveal">
        <div class="fix-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h.01"></path><path d="M8 16a6 6 0 0 1 8 0"></path><path d="M5 12a11 11 0 0 1 14 0"></path><path d="M2 8a16 16 0 0 1 20 0"></path></svg></div>
        <h3 class="fix-title">Ongoing Reputation Monitoring</h3>
        <p class="fix-desc">Deliverability is not a one-time fix. Blacklist listings appear without warning, authentication records break after DNS migrations, and DMARC policies drift. We provide ongoing monitoring with alerts when something changes and monthly health summaries.</p>
        <div class="fix-tags">
          <span class="fix-tag">Blacklist Alerts</span><span class="fix-tag">DNS Change Detection</span><span class="fix-tag">Monthly Reports</span><span class="fix-tag">DMARC Monitoring</span>
        </div>
      </div>
    </div>
  </section>

  <section class="why-section" aria-labelledby="why-heading">
    <div class="why-layout">
      <div class="why-copy">
        <span class="s-label">Why It Matters</span>
        <h2 class="s-head" id="why-heading">A deliverability problem<br>is a <em>revenue problem</em></h2>
        <p>Every email that lands in spam is a client who never saw your proposal, a follow-up that felt ignored, an invoice that was assumed missing, or a newsletter that never built the relationship you were counting on.</p>
        <p>The problem rarely announces itself. Open rates quietly drop. Response rates fall. Clients start asking if you emailed them when you did. By the time deliverability damage is obvious, the reputation harm has usually been accumulating for weeks.</p>
        <div class="highlight-box">
          <h4>The signals your domain sends <span class="hb-gold">before you even write a word</span></h4>
          <p>Receiving servers make inbox decisions in milliseconds. They check whether your domain is authenticated, whether your sending IP or domain is listed on any blacklists, whether your DMARC policy is enforced, and whether your sending patterns look like a legitimate business or a spam operation. If any of those signals fail, your message is filtered before it's ever read.</p>
        </div>
        <p>We fix the signals — authentication, reputation, infrastructure, content — so the decision receiving servers make about your email is the right one.</p>
      </div>
      <div class="why-visual">
        <div class="journey-block">
          <div class="journey-head">Email Journey — yourdomain.com</div>
          <div class="journey-steps">
            <div class="jstep ok">
              <div class="jstep-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></div>
              <div class="jstep-body">
                <div class="jstep-title">Sent from your server</div>
                <div class="jstep-sub">SMTP handshake successful</div>
              </div>
            </div>
            <div class="jstep-arrow"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12l7 7 7-7"></path></svg></div>
            <div class="jstep ok">
              <div class="jstep-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></div>
              <div class="jstep-body">
                <div class="jstep-title">SPF check passed</div>
                <div class="jstep-sub">Sending IP authorised</div>
              </div>
            </div>
            <div class="jstep-arrow"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12l7 7 7-7"></path></svg></div>
            <div class="jstep ok">
              <div class="jstep-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></div>
              <div class="jstep-body">
                <div class="jstep-title">DKIM signature verified</div>
                <div class="jstep-sub">Message integrity confirmed</div>
              </div>
            </div>
            <div class="jstep-arrow"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12l7 7 7-7"></path></svg></div>
            <div class="jstep ok">
              <div class="jstep-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></div>
              <div class="jstep-body">
                <div class="jstep-title">DMARC policy enforced</div>
                <div class="jstep-sub">p=reject, alignment pass</div>
              </div>
            </div>
            <div class="jstep-arrow"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12l7 7 7-7"></path></svg></div>
            <div class="jstep ok">
              <div class="jstep-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 4 4L19 6"></path></svg></div>
              <div class="jstep-body">
                <div class="jstep-title">Not blacklisted</div>
                <div class="jstep-sub">Domain & IP clean on all providers</div>
              </div>
            </div>
            <div class="jstep-arrow"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M5 12l7 7 7-7"></path></svg></div>
            <div class="jstep inbox">
              <div class="jstep-icon inbox-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m3 7 9 6 9-6"></path></svg></div>
              <div class="jstep-body">
                <div class="jstep-title">Delivered to Inbox</div>
                <div class="jstep-sub">Not spam. Not junk. Inbox.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="process-section" aria-labelledby="process-heading">
    <div class="process-header">
      <div><span class="s-label" style="color:var(--gold)">How We Work</span><h2 class="s-head" id="process-heading" style="color:var(--white)">From broken to fixed<br>in <em>a matter of days</em></h2></div>
      <p>Deliverability issues can feel mysterious, but fixing them is methodical. We follow a structured process that identifies every problem, applies the right fix in the right order, and verifies the outcome before we close the engagement.</p>
    </div>
    <div class="process-steps">
      <div class="ps-item reveal"><div class="ps-num">01</div><div class="ps-body"><h3 class="ps-title">Initial Discovery & Domain Intake</h3><p class="ps-desc">You share your sending domain(s), current email platform, approximate send volume, and the symptoms you are experiencing. We map the scope and set expectations on what the audit and fix will cover.</p><div class="ps-deliverables"><span class="ps-del">Domain Intake Form</span><span class="ps-del">Symptom Summary</span><span class="ps-del">Scope Confirmation</span><span class="ps-del">Timeline Set</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">02</div><div class="ps-body"><h3 class="ps-title">Full Technical Audit</h3><p class="ps-desc">We run a comprehensive check across DNS authentication records, blacklist databases, spam score, inbox placement tests to Gmail / Outlook / Yahoo, DMARC aggregate report data, and sending header analysis.</p><div class="ps-deliverables"><span class="ps-del">SPF / DKIM / DMARC Status</span><span class="ps-del">Blacklist Scan (100+ lists)</span><span class="ps-del">Spam Score Test</span><span class="ps-del">Inbox Placement Report</span><span class="ps-del">DMARC Report Review</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">03</div><div class="ps-body"><h3 class="ps-title">Fix Implementation</h3><p class="ps-desc">We implement the fixes in the right sequence: DNS records first (authentication before anything else), blacklist removal requests, content and header corrections, and infrastructure changes where needed.</p><div class="ps-deliverables"><span class="ps-del">DNS Records Updated</span><span class="ps-del">Blacklist Removals Filed</span><span class="ps-del">DMARC Policy Set</span><span class="ps-del">Header Corrections</span><span class="ps-del">Infrastructure Changes</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">04</div><div class="ps-body"><h3 class="ps-title">Verification & Testing</h3><p class="ps-desc">Once fixes are live and propagated, we re-run the full inbox placement test, verify authentication passes end-to-end, confirm blacklist clearance, and review DMARC pass rates before declaring the work complete.</p><div class="ps-deliverables"><span class="ps-del">Post-Fix Inbox Test</span><span class="ps-del">Authentication Verification</span><span class="ps-del">Blacklist Clearance Check</span><span class="ps-del">DMARC Pass Rate</span></div></div></div>
      <div class="ps-item reveal"><div class="ps-num">05</div><div class="ps-body"><h3 class="ps-title">Report, Handover & Guidance</h3><p class="ps-desc">We deliver a written deliverability report covering what was found, what was fixed, what you should monitor going forward, and recommendations for maintaining a healthy sender reputation long-term.</p><div class="ps-deliverables"><span class="ps-del">Full Audit Report</span><span class="ps-del">Fix Summary</span><span class="ps-del">Monitoring Recommendations</span><span class="ps-del">Ongoing Health Tips</span><span class="ps-del">30-Day Support</span></div></div></div>
    </div>
  </section>

  <section class="tools-section" aria-labelledby="tools-heading">
    <div class="tools-intro">
      <div><span class="s-label">Tools & Platforms</span><h2 class="s-head" id="tools-heading">Every tool involved in<br><em>diagnosing and fixing delivery</em></h2></div>
      <p>Deliverability spans DNS, blacklists, receiving infrastructure, and sending platforms. We work across all layers — from DNS records to outreach tools — applying fixes where the problems actually live.</p>
    </div>
    <div class="tools-table">
      <div class="tool-row reveal"><div class="tool-row-label"><div class="tool-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="m9 12 2 2 4-4"></path></svg></div><div><div class="tool-name">SPF · DKIM · DMARC</div><div class="tool-sub">Email authentication stack</div></div></div><div class="tool-desc">Configured, tested, and verified on every domain we work on. The foundation of every deliverability fix.</div><span class="tool-badge core">Foundation</span></div>
      <div class="tool-row reveal"><div class="tool-row-label"><div class="tool-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"></path><path d="M8 6V4h8v2"></path><path d="M6 6l1 14h10l1-14"></path></svg></div><div><div class="tool-name">Spamhaus · Barracuda · SORBS</div><div class="tool-sub">Blacklist databases</div></div></div><div class="tool-desc">We check over 100 blacklist databases and submit removal requests where listings are found.</div><span class="tool-badge ext">Blacklists</span></div>
      <div class="tool-row reveal"><div class="tool-row-label"><div class="tool-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path></svg></div><div><div class="tool-name">MXToolbox · Mail-Tester</div><div class="tool-sub">Deliverability testing tools</div></div></div><div class="tool-desc">Used for DNS record inspection, spam score analysis, and inbox placement testing during audits.</div><span class="tool-badge tool">Audit Tools</span></div>
      <div class="tool-row reveal"><div class="tool-row-label"><div class="tool-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="5" width="16" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></svg></div><div><div class="tool-name">Google Workspace · Microsoft 365</div><div class="tool-sub">Business email platforms</div></div></div><div class="tool-desc">We fix authentication and policy issues at the platform level, not just at the DNS level.</div><span class="tool-badge core">Platforms</span></div>
      <div class="tool-row reveal"><div class="tool-row-label"><div class="tool-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4h16v2H4z"></path><path d="M4 10h16"></path><path d="M4 16h10"></path><path d="M17 14l3 3-3 3"></path></svg></div><div><div class="tool-name">Instantly · Smartlead · Lemlist</div><div class="tool-sub">Cold email platforms</div></div></div><div class="tool-desc">We configure cold email infrastructure including sending domains, warm-up, and platform setup for outreach operations.</div><span class="tool-badge ext">Cold Email</span></div>
      <div class="tool-row reveal"><div class="tool-row-label"><div class="tool-ico-sm"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h.01"></path><path d="M8 16a6 6 0 0 1 8 0"></path><path d="M5 12a11 11 0 0 1 14 0"></path><path d="M2 8a16 16 0 0 1 20 0"></path></svg></div><div><div class="tool-name">DMARC Analyser · Postmark</div><div class="tool-sub">DMARC reporting & monitoring</div></div></div><div class="tool-desc">We analyse DMARC aggregate reports to identify authentication failures, spoofing attempts, and misaligned sending sources.</div><span class="tool-badge perf">Monitoring</span></div>
    </div>
  </section>

  <section class="packages-section" aria-labelledby="packages-heading">
    <div class="packages-intro">
      <div><span class="s-label">Service Packages</span><h2 class="s-head" id="packages-heading">Clear deliverability work<br>at <em>transparent pricing</em></h2></div>
      <p>Whether you need a one-time audit, a complete fix, an outreach infrastructure build, or ongoing monitoring, we have a structured engagement for each situation.</p>
    </div>
    <div class="pkg-grid">
      <div class="pkg-card reveal">
        <div class="pkg-head">
          <span class="pkg-badge">Diagnosis First</span>
          <div class="pkg-name">Deliverability Audit</div>
          <div class="pkg-tagline">A thorough technical inspection of your current sending setup with a written fix plan and prioritised recommendations.</div>
          <div class="pkg-price">₦35,000 <sub>one-time</sub></div>
        </div>
        <div class="pkg-body">
          <div class="pkg-feat">Full DNS authentication check</div>
          <div class="pkg-feat">Blacklist scan (100+ databases)</div>
          <div class="pkg-feat">Spam score analysis</div>
          <div class="pkg-feat">Inbox placement test (Gmail / Outlook / Yahoo)</div>
          <div class="pkg-feat">DMARC report review</div>
          <div class="pkg-feat">Header & content signal review</div>
          <div class="pkg-feat">Written fix plan & priority list</div>
          <div class="pkg-feat no">Fix implementation included</div>
          <div class="pkg-feat no">Ongoing monitoring</div>
        </div>
        <div class="pkg-foot"><a href="#contact" class="pkg-btn outline">Get an Audit</a></div>
      </div>
      <div class="pkg-card featured reveal">
        <div class="pkg-head">
          <span class="pkg-badge">Most Requested</span>
          <div class="pkg-name">Full Fix Package</div>
          <div class="pkg-tagline">Audit plus complete implementation — we find every issue and fix it, verified with a post-fix inbox placement report.</div>
          <div class="pkg-price">₦95,000 <sub>one-time</sub></div>
        </div>
        <div class="pkg-body" style="background:#1a1a1a">
          <div class="pkg-feat" style="color:rgba(255,255,255,.6)">Full audit (everything in Audit plan)</div>
          <div class="pkg-feat" style="color:rgba(255,255,255,.6)">SPF, DKIM & DMARC implementation</div>
          <div class="pkg-feat" style="color:rgba(255,255,255,.6)">Blacklist removal requests filed</div>
          <div class="pkg-feat" style="color:rgba(255,255,255,.6)">DMARC policy tightening</div>
          <div class="pkg-feat" style="color:rgba(255,255,255,.6)">Header & content corrections</div>
          <div class="pkg-feat" style="color:rgba(255,255,255,.6)">Post-fix inbox placement test</div>
          <div class="pkg-feat" style="color:rgba(255,255,255,.6)">Authentication verification report</div>
          <div class="pkg-feat" style="color:rgba(255,255,255,.6)">30-day post-fix support</div>
        </div>
        <div class="pkg-foot" style="background:#1a1a1a;padding-bottom:1.6rem"><a href="#contact" class="pkg-btn gold">Fix My Deliverability →</a></div>
      </div>
      <div class="pkg-card reveal">
        <div class="pkg-head">
          <span class="pkg-badge">Outreach Teams</span>
          <div class="pkg-name">Cold Email Infrastructure</div>
          <div class="pkg-tagline">Dedicated sending domains, warm-up, and outreach platform setup for teams running cold email campaigns at volume.</div>
          <div class="pkg-price">₦120,000 <sub>one-time setup</sub></div>
        </div>
        <div class="pkg-body">
          <div class="pkg-feat">Sending domain acquisition guidance</div>
          <div class="pkg-feat">Full DNS setup on all sending domains</div>
          <div class="pkg-feat">SPF, DKIM & DMARC on each domain</div>
          <div class="pkg-feat">Domain warm-up plan & execution</div>
          <div class="pkg-feat">Platform setup (Instantly / Smartlead / Lemlist)</div>
          <div class="pkg-feat">Inbox placement test before first send</div>
          <div class="pkg-feat">Main domain isolation strategy</div>
          <div class="pkg-feat">Campaign launch support</div>
        </div>
        <div class="pkg-foot"><a href="#contact" class="pkg-btn solid">Set Up Cold Infrastructure</a></div>
      </div>
    </div>
    <div class="monitoring-bar reveal">
      <div class="mon-text">
        <div class="mon-title">Ongoing Deliverability Monitoring</div>
        <div class="mon-sub">Monthly blacklist checks, DMARC report analysis, DNS change alerts, and a health summary delivered every month. Starting from ₦25,000/month.</div>
      </div>
      <a href="#contact" class="mon-btn">Ask About Monitoring →</a>
    </div>
  </section>

  <section class="results-section" aria-labelledby="results-heading">
    <div class="results-intro">
      <div><span class="s-label" style="color:var(--gold)">Real Outcomes</span><h2 class="s-head" id="results-heading" style="color:var(--white)">What changes when<br><em>deliverability is fixed</em></h2></div>
      <p>The downstream effects of fixing deliverability are usually larger than clients expect. Here is what consistently improves after a proper fix and clean setup.</p>
    </div>
    <div class="results-grid">
      <div class="result-card reveal"><div class="result-num"><span class="counter" data-target="98">0</span>%</div><div class="result-label">Inbox Placement After Fix</div><p class="result-project">After full authentication setup and blacklist removal, inbox placement consistently improves to 95–100% across Gmail, Outlook, and Yahoo.</p></div>
      <div class="result-card reveal"><div class="result-num">+<span class="counter" data-target="60">0</span>%</div><div class="result-label">Average Open Rate Improvement</div><p class="result-project">When emails that were filtering to spam start landing in the inbox, open rates climb significantly within the first two send cycles.</p></div>
      <div class="result-card reveal"><div class="result-num"><span class="counter" data-target="48">0</span>hrs</div><div class="result-label">Typical Time to First Improvement</div><p class="result-project">DNS records propagate within hours. Most clients see measurable inbox placement improvement within 24–48 hours of the fix going live.</p></div>
    </div>
  </section>

  <section class="test-section" aria-labelledby="test-heading">
    <div class="test-intro"><span class="s-label">Client Testimonials</span><h2 class="s-head" id="test-heading">What clients say about the<br><em>deliverability fix experience</em></h2></div>
    <div class="test-grid">
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"Our newsletter had been going to Gmail's promotions tab for months and we didn't know why. After the audit we found out our DMARC policy was broken. One fix later, open rates jumped from 14% to 38%."</p><div class="test-author"><div class="test-avatar">TF</div><div><div class="test-name">Tunde Fashola</div><div class="test-role">Head of Growth, RetailPro · Lagos</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"We were running cold outreach from our main domain and getting terrible reply rates. After they set up dedicated sending domains and warmed them up, our reply rate went from 1.2% to over 6%."</p><div class="test-author"><div class="test-avatar">AM</div><div><div class="test-name">Adaeze Mba</div><div class="test-role">Founder, ClearPath Consulting · Abuja</div></div></div></div>
      <div class="test-card reveal"><div class="test-stars">★★★★★</div><p class="test-quote">"Clients were telling us they never received our invoices and follow-ups. The domain was on two blacklists and we had no idea. Everything was cleared and fixed within 48 hours."</p><div class="test-author"><div class="test-avatar">CB</div><div><div class="test-name">Chukwudi Bright</div><div class="test-role">Director, BrightScale Agency · PH</div></div></div></div>
    </div>
  </section>

  <section class="faq-section" aria-labelledby="faq-heading">
    <span class="s-label">Frequently Asked Questions</span>
    <h2 class="s-head" id="faq-heading">Questions about<br><em>email deliverability fixes</em></h2>
    <div class="faq-layout">
      <div class="faq-sidebar">
        <h3>Not sure what the problem is?</h3>
        <p>Most deliverability issues are not visible until the audit. If you suspect your emails aren't landing or your open rates have dropped, an audit will tell you exactly what is wrong and how to fix it.</p>
        <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us Directly →</a>
      </div>
      <div class="faq-list" role="list">
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqd1">How do I know if I have a deliverability problem?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqd1" role="region">The clearest signs are: lower-than-usual open rates, clients saying they didn't receive emails you sent, bounce rates above 2–3%, or a sudden drop in email engagement. If any of these apply, an audit will confirm whether deliverability is the cause.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqd2">What is the difference between SPF, DKIM, and DMARC?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqd2" role="region">SPF tells receiving servers which IPs are allowed to send email for your domain. DKIM adds a cryptographic signature to every message so the receiver can verify it was not tampered with. DMARC ties the two together and tells receiving servers what to do with messages that fail either check. All three are needed for strong inbox placement.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqd3">Can you get my domain removed from a blacklist?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqd3" role="region">Yes. We submit removal requests to each blacklist provider your domain or IP is listed on. Most providers remove clean listings within 24–72 hours of a valid request. We verify clearance after each removal before closing the work.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqd4">Why should cold email not be sent from my main domain?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqd4" role="region">Cold email generates higher complaint and bounce rates than warm email to your own list. If that activity is associated with your primary domain, the damage carries over to all the legitimate email you send from that domain — proposals, invoices, client communication. Dedicated sending domains isolate the risk.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqd5">How long does it take to fix email deliverability?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqd5" role="region">DNS record fixes take effect within 1–24 hours (depending on TTL settings). Blacklist removals typically complete within 24–72 hours. Domain warm-up for cold email infrastructure takes 3–6 weeks. A full fix for a typical business domain is usually complete within 48–72 hours of us starting work.</div></div>
        <div class="faq-item" role="listitem"><button class="faq-q" aria-expanded="false" aria-controls="faqd6">Do I need access to my domain's DNS settings?<span class="faq-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 5v14"></path><path d="M5 12h14"></path></svg></span></button><div class="faq-a" id="faqd6" role="region">Yes. DNS record changes require access to your domain registrar or DNS provider (Namecheap, GoDaddy, Cloudflare, etc.). You can either share access with us or we can provide you with the exact records to add yourself. We support both approaches.</div></div>
      </div>
    </div>
  </section>

  <section class="related-section" aria-labelledby="related-heading">
    <span class="s-label">Related Services</span>
    <h2 class="s-head" id="related-heading">Often paired <em>with this service</em></h2>
    <div class="related-grid">
      <a href="{{ route('site.services.business-email-setup') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m3 7 9 6 9-6"></path></svg></div><div class="ri-name">Business Email Setup</div><p class="ri-desc">Setting up a professional @yourdomain.com email on Google Workspace, Microsoft 365, or Zoho from the ground up.</p></a>
      <a href="{{ route('site.services.web-design') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div><div class="ri-name">Website Design</div><p class="ri-desc">A professional website that matches the credibility your fixed email setup is now projecting to clients.</p></a>
      <a href="{{ route('site.services.search-optimization') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path></svg></div><div class="ri-name">SEO Services</div><p class="ri-desc">Search visibility work that complements your outreach and email channels as part of a broader acquisition strategy.</p></a>
      <a href="{{ route('site.services.website-maintenance') }}" class="related-item"><div class="ri-ico"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 4 7v5c0 5 3.4 7.9 8 9 4.6-1.1 8-4 8-9V7Z"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg></div><div class="ri-name">Website Maintenance</div><p class="ri-desc">Ongoing site health, security, and performance monitoring — the web equivalent of keeping your email infrastructure clean.</p></a>
    </div>
  </section>

  <section class="cta-band" id="contact" aria-labelledby="cta-h">
    <h2 id="cta-h">Ready to land in inboxes<br>every time?</h2>
    <p>Tell us your domain and what symptoms you're seeing. We'll get back to you with an honest assessment within 24 hours.</p>
    <a href="{{ route('site.start', ['services' => 'email-deliverability', 'source_page' => 'service-email-deliverability', 'source_label' => 'Email Deliverability Service Page']) }}" class="btn-dark">Fix My Email Deliverability →</a>
  </section>
</div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/service-email-deliverability.js')
@endpush
