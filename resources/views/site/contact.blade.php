@extends('public.layouts.app')

@section('title', 'Contact Us — i2Medier Digital Agency')

@push('meta')
<meta name="description" content="Get in touch with i2Medier. We're a digital agency in Port Harcourt, Nigeria. Reach us by email, phone, WhatsApp, or visit our office. We reply within 24 hours."/>
<link rel="canonical" href="{{ url('/contact') }}"/>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
@endpush

@push('page_css')
    @vite('resources/css/public/fonts.css')
    @vite('resources/css/public/pages/contact.css')
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @vite('resources/js/public/pages/contact.js')
@endpush

@section('content')
<!-- ══ HERO ══ -->
<header class="hero">
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-content">
    <div class="hero-eyebrow"><span class="hero-dot"></span> Get in Touch</div>
    <h1>Let's build something<br><em>extraordinary</em> together</h1>
    <p class="hero-sub">Whether you have a detailed brief or just an idea, we want to hear from you. Tell us what you're building and we'll tell you how we can help.</p>
    <div class="hero-stats">
      <div class="hs-item"><span class="hs-dot"></span><span class="hs-text"><strong>Available now</strong> — typically replies within 4 hours</span></div>
      <div class="hs-item"><span class="hs-dot gold"></span><span class="hs-text"><strong>Free discovery call</strong> — 30 minutes, no commitment</span></div>
    </div>
  </div>
</header>

<!-- ══ CONTACT SECTION ══ -->
<div class="contact-section">
  <div class="contact-grid" id="contact-form">

    <!-- ─ FORM ─ -->
    <div class="form-panel reveal">
      <div class="fp-header">
        <span class="fp-eyebrow">Send a Message</span>
        <h2 class="fp-title">Start a conversation</h2>
        <p class="fp-desc">Choose a department, fill in your details, and describe your project. We'll get back to you with a thoughtful, specific response — not a template.</p>
      </div>

      <!-- Department Selector -->
      <div style="margin-bottom:1.75rem">
        <div style="font-size:.68rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--g700);margin-bottom:.75rem">Who do you want to reach?</div>
        <div class="dept-grid" id="dept-grid">
          <div class="dept-card selected" data-val="letstalk@i2medier.com" onclick="selectDept(this)">
            <span class="dc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="7" width="18" height="13" rx="2"></rect><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><path d="M3 12h18"></path></svg></span>
            <div class="dc-label">Sales</div>
            <div class="dc-email">letstalk@i2medier.com</div>
          </div>
          <div class="dept-card" data-val="design@i2medier.com" onclick="selectDept(this)">
            <span class="dc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1.1a2.4 2.4 0 0 0 0-4.8H12a1.8 1.8 0 0 1 0-3.6h3A4.5 4.5 0 0 0 15 3h-3Z"></path><circle cx="7.5" cy="10" r="1"></circle><circle cx="9.5" cy="7.5" r="1"></circle><circle cx="13" cy="7" r="1"></circle></svg></span>
            <div class="dc-label">Design</div>
            <div class="dc-email">design@i2medier.com</div>
          </div>
          <div class="dept-card" data-val="dev@i2medier.com" onclick="selectDept(this)">
            <span class="dc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.6 1.6 0 0 0 .3 1.8l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.6 1.6 0 0 0-1.8-.3 1.6 1.6 0 0 0-1 1.5V21a2 2 0 1 1-4 0v-.1a1.6 1.6 0 0 0-1-1.5 1.6 1.6 0 0 0-1.8.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.6 1.6 0 0 0 .3-1.8 1.6 1.6 0 0 0-1.5-1H3a2 2 0 1 1 0-4h.1a1.6 1.6 0 0 0 1.5-1 1.6 1.6 0 0 0-.3-1.8l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1.6 1.6 0 0 0 1.8.3h.1a1.6 1.6 0 0 0 1-1.5V3a2 2 0 1 1 4 0v.1a1.6 1.6 0 0 0 1 1.5h.1a1.6 1.6 0 0 0 1.8-.3l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1.6 1.6 0 0 0-.3 1.8v.1a1.6 1.6 0 0 0 1.5 1H21a2 2 0 1 1 0 4h-.1a1.6 1.6 0 0 0-1.5 1Z"></path></svg></span>
            <div class="dc-label">Development</div>
            <div class="dc-email">dev@i2medier.com</div>
          </div>
          <div class="dept-card" data-val="support@i2medier.com" onclick="selectDept(this)">
            <span class="dc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 4.5 2.9 7.6 7 9 4.1-1.4 7-4.5 7-9V6l-7-3Z"></path><path d="m9.5 12 1.8 1.8 3.2-3.3"></path></svg></span>
            <div class="dc-label">Support</div>
            <div class="dc-email">support@i2medier.com</div>
          </div>
          <div class="dept-card" data-val="careers@i2medier.com" onclick="selectDept(this)">
            <span class="dc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="6" y="4" width="12" height="16" rx="2"></rect><path d="M9 4.5h6v3H9z"></path><path d="M9 11h6"></path><path d="M9 15h6"></path></svg></span>
            <div class="dc-label">Careers</div>
            <div class="dc-email">careers@i2medier.com</div>
          </div>
          <div class="dept-card" data-val="letstalk@i2medier.com" onclick="selectDept(this)">
            <span class="dc-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m8 12 2.5 2.5a2 2 0 0 0 2.8 0L16 12"></path><path d="M3 10.5 7.5 6a2 2 0 0 1 2.8 0L12 7.7 13.7 6a2 2 0 0 1 2.8 0l4.5 4.5"></path><path d="M5 12v4a2 2 0 0 0 2 2h2"></path><path d="M19 12v4a2 2 0 0 1-2 2h-2"></path></svg></span>
            <div class="dc-label">Partnership</div>
            <div class="dc-email">letstalk@i2medier.com</div>
          </div>
        </div>
      </div>

      <!-- The form -->
      <form id="contact-form-el" data-endpoint="{{ route('site.contact.store') }}" onsubmit="submitForm(event)" novalidate>
        @include('public.partials.honeypot')
        <div class="form-row">
          <div class="form-field">
            <label class="field-label">Full Name <span class="field-req">*</span></label>
            <input class="field-input" type="text" id="f-name" placeholder="Your full name" autocomplete="name"/>
            <div class="field-error" id="f-name-error"></div>
          </div>
          <div class="form-field">
            <label class="field-label">Business / Company</label>
            <input class="field-input" type="text" id="f-company" placeholder="Your company name" autocomplete="organization"/>
            <div class="field-error" id="f-company-error"></div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-field">
            <label class="field-label">Email Address <span class="field-req">*</span></label>
            <input class="field-input" type="email" id="f-email" placeholder="you@company.com" autocomplete="email"/>
            <div class="field-error" id="f-email-error"></div>
          </div>
          <div class="form-field">
            <label class="field-label">WhatsApp / Phone</label>
            <input class="field-input" type="tel" id="f-phone" placeholder="+234 805 218 8396" autocomplete="tel"/>
            <div class="field-error" id="f-phone-error"></div>
          </div>
        </div>

        <div class="form-row single">
          <div class="form-field">
            <label class="field-label">Subject</label>
            <input class="field-input" type="text" id="f-subject" placeholder="What are you contacting us about?"/>
            <div class="field-error" id="f-subject-error"></div>
          </div>
        </div>

        <div class="form-row single">
          <div class="form-field">
            <label class="field-label">Your Message <span class="field-req">*</span></label>
            <textarea class="field-input field-textarea" id="f-message" placeholder="Tell us about your project — what you're building, what problem it solves, who it's for, what you currently have, and anything else that would help us give you a useful response. The more detail, the better." rows="5"></textarea>
            <div class="field-error" id="f-message-error"></div>
          </div>
        </div>

        <div class="form-submit-row">
          <button type="submit" class="submit-btn" id="submit-btn">
            <span class="btn-text">Send Message →</span>
            <div class="btn-spinner"></div>
          </button>
          <p class="submit-note">We reply within 24 hours · No spam, no unsolicited calls · Your data is never shared</p>
        </div>
      </form>

      <div style="margin-top:1.25rem;background:var(--off);border:1.5px solid var(--g200);border-radius:10px;padding:1rem 1.1rem">
        <div class="field-label" style="margin-bottom:.45rem">Starting a new project?</div>
        <p style="font-size:.82rem;color:var(--g700);line-height:1.7;margin-bottom:.85rem">For full project onboarding, service selection, pricing, and a structured brief, use our dedicated start page.</p>
        <a href="{{ route('site.start') }}" style="display:inline-flex;align-items:center;gap:.35rem;background:var(--black);color:var(--white);text-decoration:none;padding:.72rem 1rem;border-radius:6px;font-size:.82rem;font-weight:700;letter-spacing:.02em">Go to Start Project →</a>
      </div>

      <!-- Success state -->
      <div class="form-success" id="form-success">
        <span class="fs-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="m8.5 12 2.2 2.2 4.8-5"></path></svg></span>
        <h3 class="fs-title">Message sent!</h3>
        <p class="fs-desc">Thank you for reaching out. We've received your message and will reply to your email within 24 hours — usually much sooner.</p>
        <div class="fs-ref" id="fs-ref">REF: i2M-000000</div>
        <p style="font-size:.78rem;color:var(--g400);margin-top:1.25rem">While you wait, you can also reach us directly on <strong>WhatsApp</strong> for a faster response.</p>
        <button style="margin-top:1rem;background:var(--wa);color:var(--white);border:none;padding:.75rem 1.5rem;border-radius:6px;font-family:var(--sans);font-size:.875rem;font-weight:700;cursor:pointer;display:inline-flex;align-items:center;gap:.5rem" onclick="window.open('https://wa.me/2348052188396','_blank')"><svg viewBox="0 0 24 24" aria-hidden="true" style="width:1rem;height:1rem;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round"><path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 21l2.1-5.4A8.5 8.5 0 1 1 21 11.5Z"></path><path d="M9.5 8.8c.2-.4.4-.4.7-.4h.6c.2 0 .4.1.5.4l.7 1.7c.1.2 0 .5-.1.7l-.5.6c-.1.1-.1.3 0 .5.3.6 1.1 1.8 2.6 2.5.2.1.4.1.5 0l.6-.6c.2-.2.4-.2.7-.1l1.6.7c.3.1.4.3.4.5v.6c0 .3-.1.5-.4.7-.5.3-1.2.4-1.8.2-1-.3-2.4-.9-3.9-2.4-1.5-1.5-2.1-2.9-2.4-3.9-.2-.6-.1-1.3.2-1.8Z"></path></svg> Chat on WhatsApp</button>
      </div>
    </div>

    <!-- ─ DETAILS PANEL ─ -->
    <div class="details-panel reveal">

      <!-- Online status -->
      <div class="status-card">
        <div class="sc-top">
          <div class="sc-status"><span class="sc-status-dot"></span> We're online</div>
          <span class="sc-hours" id="local-time"></span>
        </div>
        <div class="sc-title">Talk to a real person</div>
        <p class="sc-sub">No bots, no ticket queues. Every message is read and replied to by a real member of our team — typically within a few hours during business days.</p>
        <div class="sc-response"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13 2 4 13h6l-1 9 9-11h-6l1-9Z"></path></svg> Average first response: <strong style="margin-left:.3rem">under 4 hours</strong></div>
      </div>

      <!-- Phone -->
      <div class="contact-method">
        <div class="cm-top">
          <span class="cm-type"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.4 2.7a2 2 0 0 1-.6 1.8L7.2 9.9a16 16 0 0 0 6.9 6.9l1.7-1.7a2 2 0 0 1 1.8-.6l2.7.4A2 2 0 0 1 22 16.9Z"></path></svg> Phone & WhatsApp</span>
          <button class="cm-copy" onclick="copyText('+234 805 218 8396',this)">Copy</button>
        </div>
        <div class="cm-value">+234 805 218 8396</div>
        <div class="cm-desc">Mon–Fri, 9am–6pm WAT · Sat 10am–2pm WAT</div>
        <a href="tel:+2348052188396" class="cm-action">Call Now →</a>
      </div>

      <!-- WhatsApp CTA -->
      <button class="wa-btn" onclick="window.open('https://wa.me/2348052188396?text=Hi!%20I%27d%20like%20to%20enquire%20about%20your%20services.','_blank')">
        <div class="wa-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 21l2.1-5.4A8.5 8.5 0 1 1 21 11.5Z"></path><path d="M9.5 8.8c.2-.4.4-.4.7-.4h.6c.2 0 .4.1.5.4l.7 1.7c.1.2 0 .5-.1.7l-.5.6c-.1.1-.1.3 0 .5.3.6 1.1 1.8 2.6 2.5.2.1.4.1.5 0l.6-.6c.2-.2.4-.2.7-.1l1.6.7c.3.1.4.3.4.5v.6c0 .3-.1.5-.4.7-.5.3-1.2.4-1.8.2-1-.3-2.4-.9-3.9-2.4-1.5-1.5-2.1-2.9-2.4-3.9-.2-.6-.1-1.3.2-1.8Z"></path></svg></div>
        <div class="wa-text">
          <div class="wa-title">Chat on WhatsApp</div>
          <div class="wa-sub">Fastest way to reach us · Typically replies within minutes</div>
        </div>
        <span class="wa-arrow">→</span>
      </button>

      <!-- Address & Hours -->
      <div class="address-card">
        <div class="addr-row">
          <div class="addr-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-6-5.3-6-11a6 6 0 1 1 12 0c0 5.7-6 11-6 11Z"></path><circle cx="12" cy="10" r="2.3"></circle></svg></div>
          <div class="addr-body">
            <div class="addr-label">Owerri Address</div>
            <div class="addr-text">no 15, egbu road opposite 3 sons fuel station reservuar<br/>owerri, imo state</div>
          </div>
        </div>
          <div class="addr-row">
          <div class="addr-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-6-5.3-6-11a6 6 0 1 1 12 0c0 5.7-6 11-6 11Z"></path><circle cx="12" cy="10" r="2.3"></circle></svg></div>
          <div class="addr-body">
            <div class="addr-label">Port Harcourt Address</div>
            <div class="addr-text">18 Emmanuel Close, NTA Mgbuoba<br/>Port Harcourt, Rivers State<br/>Nigeria</div>
          </div>
        </div>
        <div class="addr-row">
          <div class="addr-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a15 15 0 0 1 0 18 15 15 0 0 1 0-18Z"></path></svg></div>
          <div class="addr-body">
            <div class="addr-label">Website</div>
            <div class="addr-text mono">i2medier.com</div>
          </div>
        </div>
        <div class="addr-row">
          <div class="addr-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 21V7l8-4 8 4v14"></path><path d="M9 21v-4h6v4"></path><path d="M8 10h.01"></path><path d="M12 10h.01"></path><path d="M16 10h.01"></path><path d="M8 14h.01"></path><path d="M12 14h.01"></path><path d="M16 14h.01"></path></svg></div>
          <div class="addr-body">
            <div class="addr-label">Registered Name</div>
            <div class="addr-text">i2Medier Konceptz</div>
          </div>
        </div>
      </div>

      <!-- Office Hours -->
      <div class="hours-card">
        <div class="hours-title">Office Hours (WAT — GMT+1)</div>
        <div class="hours-row" id="hr-mon"><span class="hr-day">Monday</span><span class="hr-time">9:00 AM – 6:00 PM</span></div>
        <div class="hours-row" id="hr-tue"><span class="hr-day">Tuesday</span><span class="hr-time">9:00 AM – 6:00 PM</span></div>
        <div class="hours-row" id="hr-wed"><span class="hr-day">Wednesday</span><span class="hr-time">9:00 AM – 6:00 PM</span></div>
        <div class="hours-row" id="hr-thu"><span class="hr-day">Thursday</span><span class="hr-time">9:00 AM – 6:00 PM</span></div>
        <div class="hours-row" id="hr-fri"><span class="hr-day">Friday</span><span class="hr-time">9:00 AM – 6:00 PM</span></div>
        <div class="hours-row" id="hr-sat"><span class="hr-day">Saturday</span><span class="hr-time">10:00 AM – 2:00 PM</span></div>
        <div class="hours-row" id="hr-sun"><span class="hr-day">Sunday</span><span class="hr-closed">Closed</span></div>
      </div>

    </div>
  </div>
</div>

<!-- ══ MAP SECTION ══ -->
<div class="map-section">
  <div class="map-wrapper">
    <div id="contact-map"></div>
      <div class="map-overlay-card">
      <div class="moc-label">Our Office</div>
      <div class="moc-name">i2Medier Konceptz</div>
      <div class="moc-addr">18 Emmanuel Close, NTA Mgbuoba<br/>Port Harcourt, Rivers State</div>
      <a href="https://maps.google.com/?q=Port+Harcourt+Nigeria" target="_blank" rel="noopener" class="moc-btn">Get Directions →</a>
    </div>
  </div>
</div>

<!-- ══ SOCIAL SECTION ══ -->
<section class="social-section" aria-labelledby="social-heading">
  <div class="social-header reveal">
    <div>
      <span style="font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:.65rem">Follow Us</span>
      <h2 id="social-heading" style="font-family:var(--serif);font-size:clamp(1.8rem,3vw,2.5rem);font-weight:700;letter-spacing:-.04em;line-height:1.1">Stay connected<br>with <em style="font-style:italic;color:var(--gold)">i2Medier</em></h2>
    </div>
    <p>Follow us for design inspiration, development tips, behind-the-scenes project content, and updates on our latest work. We're active on all the platforms that matter.</p>
  </div>
  <div class="social-grid">
    <a href="https://facebook.com/i2medier" target="_blank" rel="noopener" class="social-card plat-facebook reveal">
      <div class="sc-platform-row">
        <div class="sc-platform-icon">f</div>
        <span class="sc-follow-btn">Follow</span>
      </div>
      <div class="sc-platform-name">Facebook</div>
      <div class="sc-handle">@i2Medier</div>
      <div class="sc-desc">Project updates, service announcements, and digital marketing insights for Nigerian businesses.</div>
    </a>
    <a href="https://twitter.com/i2medier" target="_blank" rel="noopener" class="social-card plat-twitter reveal">
      <div class="sc-platform-row">
        <div class="sc-platform-icon">𝕏</div>
        <span class="sc-follow-btn">Follow</span>
      </div>
      <div class="sc-platform-name">X / Twitter</div>
      <div class="sc-handle">@i2Medier</div>
      <div class="sc-desc">Real-time thoughts on web development, design trends, and the Nigerian tech ecosystem.</div>
    </a>
    <a href="https://www.instagram.com/i2medier" target="_blank" rel="noopener" class="social-card plat-instagram reveal">
      <div class="sc-platform-row">
        <div class="sc-platform-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 18a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3l1.5-2h5L16 6h3a2 2 0 0 1 2 2Z"></path><circle cx="12" cy="13" r="3.5"></circle></svg></div>
        <span class="sc-follow-btn">Follow</span>
      </div>
      <div class="sc-platform-name">Instagram</div>
      <div class="sc-handle">@i2medier</div>
      <div class="sc-desc">Visual portfolio of our latest designs, UI work, branding projects, and team culture.</div>
    </a>
    <a href="https://www.linkedin.com/company/i2medier" target="_blank" rel="noopener" class="social-card plat-linkedin reveal">
      <div class="sc-platform-row">
        <div class="sc-platform-icon">in</div>
        <span class="sc-follow-btn">Connect</span>
      </div>
      <div class="sc-platform-name">LinkedIn</div>
      <div class="sc-handle">i2Medier Konceptz</div>
      <div class="sc-desc">Professional updates, case studies, team growth, and B2B partnerships and opportunities.</div>
    </a>
    <a href="https://www.youtube.com/@i2TechStudio" target="_blank" rel="noopener" class="social-card plat-youtube reveal">
      <div class="sc-platform-row">
        <div class="sc-platform-icon">▶</div>
        <span class="sc-follow-btn">Subscribe</span>
      </div>
      <div class="sc-platform-name">YouTube</div>
      <div class="sc-handle">i2Medier</div>
      <div class="sc-desc">Tutorial videos, project walkthroughs, and practical web development content for Nigerian developers.</div>
    </a>
    <a href="https://wa.me/2348052188396" target="_blank" rel="noopener" class="social-card plat-whatsapp reveal">
      <div class="sc-platform-row">
        <div class="sc-platform-icon"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 11.5a8.4 8.4 0 0 1-12.4 7.4L3 21l2.1-5.4A8.5 8.5 0 1 1 21 11.5Z"></path><path d="M9.5 8.8c.2-.4.4-.4.7-.4h.6c.2 0 .4.1.5.4l.7 1.7c.1.2 0 .5-.1.7l-.5.6c-.1.1-.1.3 0 .5.3.6 1.1 1.8 2.6 2.5.2.1.4.1.5 0l.6-.6c.2-.2.4-.2.7-.1l1.6.7c.3.1.4.3.4.5v.6c0 .3-.1.5-.4.7-.5.3-1.2.4-1.8.2-1-.3-2.4-.9-3.9-2.4-1.5-1.5-2.1-2.9-2.4-3.9-.2-.6-.1-1.3.2-1.8Z"></path></svg></div>
        <span class="sc-follow-btn">Chat</span>
      </div>
      <div class="sc-platform-name">WhatsApp</div>
      <div class="sc-handle">+234 805 218 8396</div>
      <div class="sc-desc">The fastest way to reach our team for project enquiries, quick questions, and support requests.</div>
    </a>
  </div>
</section>

<!-- ══ FAQ ══ -->
<section class="faq-section" aria-labelledby="faq-heading">
  <div class="faq-inner">
    <div class="faq-header reveal">
      <span style="font-size:.68rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--gold);display:block;margin-bottom:.65rem">Before You Reach Out</span>
      <h2 id="faq-heading" style="font-family:var(--serif);font-size:clamp(1.8rem,3vw,2.4rem);font-weight:700;letter-spacing:-.04em;margin-bottom:.6rem">Quick answers</h2>
      <p style="font-size:.9rem;color:var(--g700);line-height:1.8;max-width:480px">Answers to the questions we get asked most often before someone sends their first message.</p>
    </div>
    <div class="faq-list">
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="faq1">How quickly will you respond to my enquiry?<span class="faq-icon">+</span></button>
        <div class="faq-a" id="faq1">We respond to every enquiry within 24 hours on business days — typically within 4 hours. If you need a faster response, WhatsApp is the quickest way to reach us. For urgent technical issues on an active maintenance plan, response times are governed by your plan SLA.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="faq2">Do you work with clients outside Nigeria?<span class="faq-icon">+</span></button>
        <div class="faq-a" id="faq2">Yes. We work with clients across Nigeria, the UK, the US, Canada, and other countries. Most of our engagements are fully remote — we use Figma, Notion, Google Meet, and WhatsApp to collaborate effectively regardless of timezone. We invoice in NGN, GBP, and USD.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="faq3">What happens after I send a message?<span class="faq-icon">+</span></button>
        <div class="faq-a" id="faq3">You'll receive a confirmation email with a reference number. A member of our team will then review your enquiry and send a personalised response — this is not a template. For project enquiries, we'll either ask a few clarifying questions or invite you to a free 30-minute discovery call, depending on what's most useful.</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="faq4">Can I visit your office in Port Harcourt?<span class="faq-icon">+</span></button>
        <div class="faq-a" id="faq4">Yes, by appointment. We're located at 18 Emmanuel Close, NTA Mgbuoba, Port Harcourt. If you'd like to meet in person, send us a message or WhatsApp to schedule a visit during office hours (Monday–Friday 9am–6pm, Saturday 10am–2pm WAT).</div>
      </div>
      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="faq5">Do you offer a free consultation?<span class="faq-icon">+</span></button>
        <div class="faq-a" id="faq5">Yes. Every new project begins with a free 30-minute discovery call where we discuss your goals, scope, and budget. There's no obligation to proceed — the call is simply to determine whether we're a good fit for each other and to give you honest advice about your project.</div>
      </div>
    </div>
  </div>
</section>

<!-- ══ CTA BAND ══ -->
<section class="cta-band" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to start your project?</h2>
  <p>Send us a message and receive a detailed, personalised proposal within 24 hours. No commitment, no hidden fees.</p>
  <a href="#contact-form" class="cta-btn">Send Us a Message →</a>
</section>

<div id="toast"></div>
@endsection
