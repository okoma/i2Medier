@extends('public.layouts.onboarding')

@section('title', 'Start a Project — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/onboarding.css')
@endpush

@section('content')
    <nav>
        <a href="{{ route('site.home') }}" class="logo">i2Medi<span>er</span></a>
        <span class="nav-step-label" id="nav-step-label">Step 1 of 5</span>
        <a href="{{ route('site.home') }}" class="nav-back" onclick="return goBackToPrevious(event)">← Back to site</a>
    </nav>

    <div class="progress-track" aria-hidden="true">
        <div class="progress-fill" id="progress-fill" style="width:20%"></div>
    </div>

    <div class="step-indicator" role="navigation" aria-label="Form progress">
        <div class="step-indicator-inner">
            <div class="si-item active" data-step="1">
                <div class="si-num" id="si-num-1">1</div>
                <span class="si-label">Contact</span>
                <span class="si-chevron">›</span>
            </div>
            <div class="si-item" data-step="2">
                <div class="si-num" id="si-num-2">2</div>
                <span class="si-label">Services</span>
                <span class="si-chevron">›</span>
            </div>
            <div class="si-item" data-step="3">
                <div class="si-num" id="si-num-3">3</div>
                <span class="si-label">Add-ons</span>
                <span class="si-chevron">›</span>
            </div>
            <div class="si-item" data-step="4">
                <div class="si-num" id="si-num-4">4</div>
                <span class="si-label">Brief</span>
                <span class="si-chevron">›</span>
            </div>
            <div class="si-item" data-step="5">
                <div class="si-num" id="si-num-5">5</div>
                <span class="si-label">Review</span>
            </div>
        </div>
    </div>

    <div class="page-wrap">
        <div class="form-panel" id="form-panel">
            <div class="step active" id="step-1">
                <div class="form-panel-header">
                    <div class="fph-step">Step 1 of 5</div>
                    <h1 class="fph-title">Let's start with you</h1>
                    <p class="fph-desc">Tell us a little about yourself and your business. This helps us personalise your quote and route your enquiry to the right person on our team.</p>
                </div>
                <div class="form-panel-body">
                    <div class="field-row">
                        <div class="field">
                            <label>Full Name <span class="req">*</span></label>
                            <input type="text" id="f-name" placeholder="e.g. Chidi Emmanuel" autocomplete="name"/>
                            <span class="field-error" id="err-name">Please enter your full name</span>
                        </div>
                        <div class="field">
                            <label>Business / Organisation <span class="req">*</span></label>
                            <input type="text" id="f-business" placeholder="e.g. Apex Solutions Ltd" autocomplete="organization"/>
                            <span class="field-error" id="err-business">Please enter your business name</span>
                        </div>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label>Email Address <span class="req">*</span></label>
                            <input type="email" id="f-email" placeholder="you@yourbusiness.com" autocomplete="email"/>
                            <span class="field-error" id="err-email">Please enter a valid email address</span>
                        </div>
                        <div class="field">
                            <label>WhatsApp / Phone <span class="req">*</span></label>
                            <input type="tel" id="f-phone" placeholder="+234 800 000 0000" autocomplete="tel"/>
                            <span class="field-error" id="err-phone">Please enter a phone or WhatsApp number</span>
                        </div>
                    </div>
                    <div class="field-row single">
                        <div class="field">
                            <label>Country <span class="req">*</span></label>
                            <select id="f-country" autocomplete="country-name">
                                <option value="">Select your country</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="Canada">Canada</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Kenya">Kenya</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="field-error" id="err-country">Please select your country</span>
                        </div>
                    </div>
                    <div class="step-nav">
                        <span></span>
                        <button class="btn-next" id="btn-next-1" onclick="goNext(1)">
                            <span class="btn-text">Choose Services →</span>
                            <div class="spinner"></div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="step" id="step-2">
                        <div class="form-panel-header">
                            <div class="fph-step">Step 2 of 5</div>
                            <h2 class="fph-title">What do you need?</h2>
                            <p class="fph-desc">Select one or more services. You can choose multiple — we will build a single, coordinated proposal covering everything. Prices shown are starting points; your final quote will be specific to your scope.</p>
                        </div>
                        <div class="form-panel-body">
                            <div class="service-grid" id="service-grid"></div>
                            <div class="svc-hint" id="svc-hint">Please select at least one service to continue.</div>
                            <div class="step-nav">
                                <button class="btn-back" onclick="goBack(2)">← Back</button>
                                <button class="btn-next" id="btn-next-2" onclick="goNext(2)">
                                    <span class="btn-text">Choose Add-ons →</span>
                                    <div class="spinner"></div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="step" id="step-3">
                        <div class="form-panel-header">
                            <div class="fph-step">Step 3 of 5</div>
                            <h2 class="fph-title">Enhance with add-ons</h2>
                            <p class="fph-desc">Optional extras for the services you selected. Each add-on has a fixed price and is added to your quote immediately. You can skip this step if you only need the core service.</p>
                        </div>
                        <div class="form-panel-body">
                            <div id="addons-container"></div>
                            <div class="step-nav">
                                <button class="btn-back" onclick="goBack(3)">← Back</button>
                                <button class="btn-next" id="btn-next-3" onclick="goNext(3)">
                                    <span class="btn-text">Project Brief →</span>
                                    <div class="spinner"></div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="step" id="step-4">
                        <div class="form-panel-header">
                            <div class="fph-step">Step 4 of 5</div>
                            <h2 class="fph-title">Tell us about your project</h2>
                            <p class="fph-desc">A few quick questions to help us understand your timeline, expectations, and what you are trying to achieve. The more context you share, the more useful your proposal will be.</p>
                        </div>
                        <div class="form-panel-body">
                            <div class="field" style="margin-bottom:1.25rem">
                                <label>When do you need this delivered? <span class="req">*</span></label>
                                <div class="timeline-grid" id="timeline-grid">
                                    <div class="timeline-card" data-val="asap" onclick="selectTimeline(this)">
                                        <div class="tc-label"><span class="label-icon" aria-hidden="true">@include('site.partials.onboarding-icon', ['name' => 'rocket'])</span> As soon as possible</div>
                                        <div class="tc-sub">We'll prioritise and fast-track your project</div>
                                    </div>
                                    <div class="timeline-card" data-val="2-4weeks" onclick="selectTimeline(this)">
                                        <div class="tc-label"><span class="label-icon" aria-hidden="true">@include('site.partials.onboarding-icon', ['name' => 'calendar-short'])</span> 2–4 weeks</div>
                                        <div class="tc-sub">Standard pace with room for thorough work</div>
                                    </div>
                                    <div class="timeline-card" data-val="1-3months" onclick="selectTimeline(this)">
                                        <div class="tc-label"><span class="label-icon" aria-hidden="true">@include('site.partials.onboarding-icon', ['name' => 'calendar-long'])</span> 1–3 months</div>
                                        <div class="tc-sub">Larger scope, milestone-based delivery</div>
                                    </div>
                                    <div class="timeline-card" data-val="flexible" onclick="selectTimeline(this)">
                                        <div class="tc-label"><span class="label-icon" aria-hidden="true">@include('site.partials.onboarding-icon', ['name' => 'wave'])</span> Flexible / Not urgent</div>
                                        <div class="tc-sub">We can plan this around capacity and your schedule</div>
                                    </div>
                                </div>
                                <span class="field-error" id="err-timeline">Please select a timeline option</span>
                            </div>
                            <div class="field" style="margin-bottom:1.25rem">
                                <label>Investment Range</label>
                                <select id="f-budget">
                                    <option value="">Not sure yet — recommend a scope</option>
                                    <option value="best-solution">I want the most effective solution</option>
                                    <option value="250-500k">₦250,000 – ₦500,000</option>
                                    <option value="500k-1m">₦500,000 – ₦1,000,000</option>
                                    <option value="1m-3m">₦1,000,000 – ₦3,000,000</option>
                                    <option value="above3m">₦3,000,000+</option>
                                    <option value="monthly">Monthly retainer / ongoing support</option>
                                </select>
                                <span class="field-hint">This helps us recommend the right scope, timeline, and delivery approach for your project.</span>
                            </div>
                            <div class="field" style="margin-bottom:1.25rem">
                                <label>How did you find us?</label>
                                <div class="source-grid" id="source-grid">
                                    <div class="source-btn" data-val="google" onclick="selectSource(this)">Google Search</div>
                                    <div class="source-btn" data-val="referral" onclick="selectSource(this)">Referral / Word of mouth</div>
                                    <div class="source-btn" data-val="social" onclick="selectSource(this)">Social Media</div>
                                    <div class="source-btn" data-val="returning" onclick="selectSource(this)">Returning client</div>
                                    <div class="source-btn" data-val="linkedin" onclick="selectSource(this)">LinkedIn</div>
                                    <div class="source-btn" data-val="other" onclick="selectSource(this)">Other</div>
                                </div>
                            </div>
                            <div class="field" style="margin-bottom:1.25rem">
                                <label>Domain Preference</label>
                                <div class="source-grid" id="domain-grid">
                                    <div class="source-btn" data-val="own-domain" onclick="selectDomainOption(this)">I already have a domain</div>
                                    <div class="source-btn" data-val="manage-domain" onclick="selectDomainOption(this)">I want i2Medier to procure and manage it</div>
                                    <div class="source-btn" data-val="unsure-domain" onclick="selectDomainOption(this)">I’m not sure yet</div>
                                </div>
                                <span class="field-hint">We can work with your existing domain or handle procurement and renewal management on your behalf.</span>
                            </div>
                            <div class="field" style="margin-bottom:1.25rem">
                                <label>Hosting Preference</label>
                                <div class="source-grid" id="hosting-grid">
                                    <div class="source-btn" data-val="own-hosting" onclick="selectHostingOption(this)">I already have hosting</div>
                                    <div class="source-btn" data-val="managed-hosting" onclick="selectHostingOption(this)">I want i2Medier Managed Hosting</div>
                                    <div class="source-btn" data-val="unsure-hosting" onclick="selectHostingOption(this)">I’m not sure yet</div>
                                </div>
                                <span class="field-hint">Managed Hosting means infrastructure provisioned or arranged by i2Medier and actively maintained by our team.</span>
                            </div>
                            <div class="field" style="margin-bottom:0">
                                <label>Project brief / Message</label>
                                <textarea id="f-message" placeholder="Tell us anything else that would help us understand your project — what you have now, what you want to achieve, any specific requirements, examples of work you like, or questions you have for us..."></textarea>
                                <span class="field-hint">No brief is too long or too short. Even a sentence helps.</span>
                            </div>
                            <div class="step-nav">
                                <button class="btn-back" onclick="goBack(4)">← Back</button>
                                <button class="btn-next" id="btn-next-4" onclick="goNext(4)">
                                    <span class="btn-text">Review My Quote →</span>
                                    <div class="spinner"></div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="step" id="step-5">
                        <div class="form-panel-header">
                            <div class="fph-step">Step 5 of 5</div>
                            <h2 class="fph-title">Review & confirm</h2>
                            <p class="fph-desc">Take a moment to check everything looks right before we send your enquiry. Our team will review this and send you a detailed, itemised proposal within 24 hours.</p>
                        </div>
                        <div class="form-panel-body">
                            <div class="review-section" id="review-contact">
                                <div class="review-section-head">
                                    <span class="rsh-title">Your Details</span>
                                    <button class="rsh-edit" onclick="goToStep(1)">Edit</button>
                                </div>
                                <div class="review-row" id="review-contact-data"></div>
                            </div>
                            <div class="review-section" id="review-services-block">
                                <div class="review-section-head">
                                    <span class="rsh-title">Selected Services & Add-ons</span>
                                    <button class="rsh-edit" onclick="goToStep(2)">Edit</button>
                                </div>
                                <div id="review-services-data"></div>
                            </div>
                            <div class="review-section" id="review-brief-block">
                                <div class="review-section-head">
                                    <span class="rsh-title">Project Brief</span>
                                    <button class="rsh-edit" onclick="goToStep(4)">Edit</button>
                                </div>
                                <div class="review-row" id="review-brief-data"></div>
                            </div>
                            <div class="review-total" id="review-total-block"></div>
                            <div class="terms-row">
                                <div class="terms-check" id="terms-check" onclick="toggleTerms()"></div>
                                <div class="terms-text" onclick="toggleTerms()">I confirm the above information is correct and I agree to i2Medier's <a target="_blank" href="{{ route('site.terms') }}" onclick="event.stopPropagation()">Terms of Service</a> and <a target="_blank" href="{{ route('site.privacy') }}" onclick="event.stopPropagation()">Privacy Policy</a>. I understand this is an enquiry — not a binding order — and that a formal proposal will be provided before any payment is required.</div>
                            </div>
                            <span class="field-error" id="err-terms">Please accept the terms to continue</span>
                            <div class="step-nav">
                                <button class="btn-back" onclick="goBack(5)">← Back</button>
                                <button class="btn-next submit" id="btn-submit" onclick="submitForm()">
                                    <span class="btn-text"><span class="btn-icon" aria-hidden="true">@include('site.partials.onboarding-icon', ['name' => 'rocket'])</span> Send My Enquiry</span>
                                    <div class="spinner"></div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="step-success" id="step-success">
                        <div class="success-icon">@include('site.partials.onboarding-icon', ['name' => 'check-circle'])</div>
                        <div class="success-ref" id="success-ref">REF: i2M-000000</div>
                        <h2 class="success-title">Enquiry received!</h2>
                        <p class="success-desc">Thank you for reaching out. We have received your project brief and our team will review it carefully. Expect a detailed, personalised proposal in your inbox within <strong>24 hours</strong>.</p>
                        <div class="success-steps">
                            <div class="success-step">
                                <div class="ss-num">1</div>
                                <div class="ss-body">
                                    <h4>Check your email</h4>
                                    <p>A confirmation email is on its way to your inbox right now with your reference number and a summary of your enquiry.</p>
                                </div>
                            </div>
                            <div class="success-step">
                                <div class="ss-num">2</div>
                                <div class="ss-body">
                                    <h4>We review your brief</h4>
                                    <p>Our team will go through every detail of your project brief and prepare a tailored, itemised proposal — not a template.</p>
                                </div>
                            </div>
                            <div class="success-step">
                                <div class="ss-num">3</div>
                                <div class="ss-body">
                                    <h4>Proposal & discovery call</h4>
                                    <p>We'll send your proposal within 24 hours and invite you to a free 30-minute discovery call to walk through it together.</p>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('site.home') }}" class="btn-new-project" onclick="return goBackToPrevious(event)">← Back to i2Medier</a>
                    </div>
                </div>

                <aside class="quote-sidebar" id="quote-sidebar" aria-label="Your quote summary">
                    <button class="mobile-quote-toggle" id="mq-toggle" onclick="toggleMobileQuote()">
                        <span>Your Quote Estimate</span>
                        <span class="mqt-price" id="mq-total-preview">₦0</span>
                    </button>

                    <div class="qs-header">
                        <span class="qs-title">Your Quote</span>
                        <span class="qs-badge">Estimate</span>
                    </div>

                    <div id="qs-services-list">
                        <div class="qs-empty" id="qs-empty-state">
                            <span class="qs-empty-ico">@include('site.partials.onboarding-icon', ['name' => 'cart'])</span>
                            Select services in Step 2 to see your quote build here in real time.
                        </div>
                    </div>

                    <div id="qs-addons-list"></div>

                    <div class="qs-divider"></div>

                    <div class="qs-breakdown" id="qs-breakdown">
                        <div class="qsb-row">
                            <span class="qsb-label">One-time total</span>
                            <span class="qsb-val" id="qs-onetime">₦0</span>
                        </div>
                        <div class="qsb-row" id="qs-monthly-row" style="display:none">
                            <span class="qsb-label">Monthly (recurring)</span>
                            <span class="qsb-val" id="qs-monthly">₦0/mo</span>
                        </div>
                        <div class="qsb-row total">
                            <span class="qsb-label">Estimate starts from</span>
                            <span class="qsb-val" id="qs-total">₦0</span>
                        </div>
                    </div>

                    <p class="qs-note">Prices shown are base starting points. Final quote confirmed within 24 hours of submission — always itemised, never with hidden fees.</p>

                    <div class="qs-cta">
                        <a href="mailto:hello@i2medier.com" class="qs-cta-btn"><span class="btn-icon" aria-hidden="true">@include('site.partials.onboarding-icon', ['name' => 'chat'])</span> Chat on WhatsApp</a>
                        <p class="qs-cta-note">Prefer to talk first? We're on WhatsApp.</p>
                    </div>

                    <div class="qs-guarantee">
                        <span class="qs-guar-ico">@include('site.partials.onboarding-icon', ['name' => 'lock'])</span>
                        <span class="qs-guar-text"><strong>No commitment required.</strong> This is a free enquiry. You'll receive a proposal before any payment is discussed.</span>
                    </div>
        </aside>
    </div>
@endsection

@push('scripts')
    <script>
        const SERVICES = [
          {
            id:'webdesign', name:'Website Design', desc:'Visually compelling, conversion-focused single-page website design for any platform or stack.',
            icon:'globe', price:250000, priceLabel:'from ₦250,000', type:'one-time',
            addons:[
              {id:'wd-extra-pages', name:'Additional Inner Pages', price:20000, desc:'Add standard supporting pages like About, Services, Contact, or FAQ using the approved design system.', quantity:true, quantityLabel:'page'},
              {id:'wd-animation', name:'Animated Hero / Scroll Effects', price:120000, desc:'CSS/JS scroll-triggered animations and an interactive hero section'},
              {id:'wd-forms', name:'Advanced Forms & Booking', price:120000, desc:'Multi-step contact forms, appointment booking, or enquiry workflows'},
              {id:'wd-blog', name:'Blog / News Section', price:75000, desc:'Structured blog with categories, tags, search, and author profiles'},
              {id:'wd-live-chat', name:'Live Chat Integration', price:25000, desc:'Tawk.to, Tidio, or Crisp live chat configured and styled to your brand'},
              {id:'wd-gdpr', name:'Cookie & Privacy Banner', price:25000, desc:'GDPR-compliant cookie consent banner with policy pages'},
              {id:'wd-404', name:'Custom 404 & Error Pages', price:20000, desc:'Branded error pages that guide visitors back to the right content'},
              {id:'wd-maintenance', name:'3-Month Care Plan', price:180000, desc:'Weekly updates, daily backups, uptime monitoring & monthly reports'},
            ]
          },
          {
            id:'mobileapps', name:'Mobile Apps', desc:'Native-feel iOS and Android apps built in React Native or Flutter.',
            icon:'mobile', price:1500000, priceLabel:'from ₦1,500,000', type:'one-time',
            addons:[
              {id:'ma-both', name:'Both iOS & Android Builds', price:350000, desc:'Deploy to both the App Store and Google Play from a single codebase'},
              {id:'ma-push', name:'Push Notifications', price:150000, desc:'In-app and background push notifications via Firebase (FCM/APNs)'},
              {id:'ma-payments', name:'In-App Payments', price:220000, desc:'Paystack, Stripe, or Google/Apple Pay in-app purchase integration'},
              {id:'ma-offline', name:'Offline Mode', price:180000, desc:'Local data sync and offline-first architecture using SQLite/Hive'},
              {id:'ma-store', name:'Full Dual-Store Launch Handling', price:220000, desc:'End-to-end App Store and Google Play submission support, compliance preparation, release assets, and launch handling'},
              {id:'ma-backend', name:'Backend API Development', price:400000, desc:'Laravel/Node.js REST API built and deployed to power your app'},
              {id:'ma-admin', name:'Admin Dashboard', price:250000, desc:'Web-based admin panel for managing users, content & app data'},
              {id:'ma-analytics', name:'Advanced Product Analytics Stack', price:220000, desc:'Expanded event tracking, funnel analysis, attribution setup, and advanced product reporting'},
            ]
          },
          {
            id:'seo', name:'Search Optimization', desc:'On-page SEO, technical audits, Core Web Vitals & long-term search visibility.',
            icon:'search', price:180000, priceLabel:'from ₦180,000', type:'one-time',
            addons:[
              {id:'seo-retainer', name:'Monthly SEO Retainer', price:400000, desc:'Ongoing keyword tracking, optimisation & detailed monthly reporting', monthly:true},
              {id:'seo-audit', name:'Technical SEO Audit', price:120000, desc:'Deep dive into crawlability, indexing, site structure & Core Web Vitals'},
              {id:'seo-content', name:'Content Package (10 Articles)', price:250000, desc:'10 keyword-researched, SEO-optimised articles written and published'},
              {id:'seo-local', name:'Local SEO Setup', price:100000, desc:'Google Business Profile optimisation, local citations & local schema'},
              {id:'seo-backlinks', name:'Link Building (monthly)', price:300000, desc:'High-authority backlink acquisition and digital PR outreach', monthly:true},
              {id:'seo-ads', name:'Google Ads Management', price:350000, desc:'Search and display campaign setup, management & monthly reporting', monthly:true},
            ]
          },
          {
            id:'uiux', name:'UI/UX Design', desc:'Research-led Figma design — wireframes, high-fidelity screens & design systems.',
            icon:'palette', price:500000, priceLabel:'from ₦500,000', type:'one-time',
            addons:[
              {id:'ux-screens', name:'10 Extra Screens', price:180000, desc:'Extend your scope with 10 additional high-fidelity designed screens'},
              {id:'ux-testing', name:'Usability Testing (5 users)', price:150000, desc:'Remote usability testing on your Figma prototype with a full report'},
              {id:'ux-darkmode', name:'Dark Mode Variant', price:120000, desc:'Complete dark theme version of your entire UI design'},
              {id:'ux-motion', name:'Motion & Animation Guide', price:100000, desc:'Micro-interaction specs and animation timing documentation for devs'},
              {id:'ux-tokens', name:'Design Token Export (JSON)', price:85000, desc:'Figma Variables exported as structured JSON for your dev pipeline'},
              {id:'ux-brand', name:'Brand Identity Package', price:180000, desc:'Logo, colour palette, typography scale, and full brand guidelines'},
            ]
          },
          {
            id:'wordpress', name:'WordPress Development', desc:'Custom WordPress sites and WooCommerce stores — no page builders, no bloat.',
            icon:'wordpress', price:450000, priceLabel:'from ₦450,000', type:'one-time',
            addons:[
              {id:'wp-ecommerce', name:'WooCommerce / E-Commerce', price:350000, desc:'Full shopping cart, checkout & Paystack/Flutterwave payment integration'},
              {id:'wp-multilang', name:'Multi-language Support', price:120000, desc:'WPML or Polylang integration for bilingual or multilingual sites'},
              {id:'wp-speed', name:'Advanced Performance Engineering', price:180000, desc:'Higher-end performance work including deeper caching strategy, server tuning, CDN optimization, and aggressive Core Web Vitals targeting'},
              {id:'wp-migration', name:'Content Migration (50 pages)', price:120000, desc:'Migrate all existing content from your old site with zero data loss'},
              {id:'wp-seo', name:'Advanced SEO Growth Setup', price:150000, desc:'Expanded schema strategy, technical refinement, search presentation control, and growth-focused SEO implementation beyond the standard baseline'},
              {id:'wp-admin', name:'Advanced Editorial Workspace', price:220000, desc:'Expanded admin UX with richer editorial workflows, role-specific content management, and deeper operational controls'},
              {id:'wp-membership', name:'Membership / Login System', price:300000, desc:'Member registration, gated content, user profiles & subscription tiers'},
            ]
          },
          {
            id:'ecommerce', name:'E-Commerce Website', desc:'Premium online store design and development with the right commerce platform for your goals.',
            icon:'cart', price:800000, priceLabel:'from ₦800,000', type:'one-time',
            platforms:[
              {
                id:'woocommerce',
                name:'WordPress / WooCommerce',
                desc:'Best for content-led brands that want WordPress flexibility, editorial control, and a premium storefront without going fully custom.',
                price:800000,
                priceLabel:'from ₦800,000',
                addons:[
                  {id:'ec-woo-subscriptions', name:'Advanced Subscriptions & Recurring Billing', price:350000, desc:'Recurring product billing, renewals, dunning flows, and more advanced customer subscription management'},
                  {id:'ec-woo-booking', name:'Bookings / Appointments', price:300000, desc:'Integrated appointment, reservation, or bookable-product workflows inside your store'},
                  {id:'ec-woo-marketplace', name:'Multi-vendor Marketplace', price:800000, desc:'Vendor onboarding, commissions, payouts, dashboards, and marketplace operations'},
                  {id:'ec-woo-erp', name:'Inventory / ERP Sync', price:650000, desc:'Structured inventory and order sync with ERP, POS, or warehouse systems'},
                ],
              },
              {
                id:'shopify',
                name:'Shopify',
                desc:'Best for product brands that want a polished, conversion-focused store with strong hosting, platform stability, and operational simplicity.',
                price:1800000,
                priceLabel:'from ₦1,800,000',
                addons:[
                  {id:'ec-sh-theme', name:'Custom Theme Customization', price:450000, desc:'Premium storefront customization beyond standard theme setup, aligned to your brand and conversion goals'},
                  {id:'ec-sh-apps', name:'Advanced App Stack Setup', price:300000, desc:'App strategy, integration, testing, and workflow setup across the full store experience'},
                  {id:'ec-sh-migration', name:'Catalog Migration', price:350000, desc:'Structured migration of products, collections, customers, content, and historical store data'},
                  {id:'ec-sh-b2b', name:'B2B / Wholesale Setup', price:700000, desc:'Wholesale pricing, trade customer flows, account-level ordering, and B2B storefront logic'},
                ],
              },
              {
                id:'laravel',
                name:'Custom Laravel Build',
                desc:'Best for ambitious commerce businesses that need custom checkout logic, advanced operations, deep integrations, or product architecture beyond off-the-shelf platforms.',
                price:3500000,
                priceLabel:'from ₦3,500,000',
                addons:[
                  {id:'ec-lv-marketplace', name:'Marketplace Architecture', price:1200000, desc:'Vendor management, commissions, payouts, dashboards, and marketplace operating logic'},
                  {id:'ec-lv-erp', name:'ERP / Inventory Integration', price:900000, desc:'Deep integration with inventory, warehouse, fulfillment, procurement, or ERP systems'},
                  {id:'ec-lv-subscriptions', name:'Subscriptions & Billing Engine', price:800000, desc:'Recurring billing logic, retries, dunning, account management, and subscription lifecycle tooling'},
                  {id:'ec-lv-b2b', name:'B2B Pricing & Account Workflows', price:750000, desc:'Account-based pricing, quote requests, approvals, credit logic, and trade ordering workflows'},
                ],
              },
            ],
          },
          {
            id:'saas', name:'SaaS Application', desc:'Subscription-based web platforms for startups and growing companies, including core SaaS architecture, user accounts, onboarding foundations, and recurring-revenue readiness.',
            icon:'saas', price:2500000, priceLabel:'from ₦2,500,000', type:'one-time',
            addons:[
              {id:'saas-tenant', name:'Advanced Multi-tenant Architecture', price:850000, desc:'Expanded tenant isolation, subdomains, workspace segmentation, and scalable multi-tenant data architecture for more complex SaaS products'},
              {id:'saas-billing', name:'Advanced Subscription & Billing Logic', price:650000, desc:'Trials, proration, upgrades, downgrades, invoices, failed payment recovery, and more advanced account lifecycle logic'},
              {id:'saas-onboarding', name:'Advanced User Onboarding Flows', price:350000, desc:'Product tours, setup checklists, invite flows, activation sequences, and guided onboarding designed to improve adoption'},
              {id:'saas-roles', name:'Enterprise Roles & Permissions', price:400000, desc:'Granular access policies, advanced team permissions, approval flows, and enterprise account controls'},
              {id:'saas-admin', name:'Customer Support / Operations Console', price:450000, desc:'Expanded internal console for support operations, account intervention, moderation, reporting, and customer success workflows'},
              {id:'saas-analytics', name:'Advanced Product Analytics & Event Tracking', price:300000, desc:'Structured product event tracking, funnel measurement, user behavior analysis, and SaaS KPI instrumentation'},
            ]
          },
          {
            id:'laravel', name:'Laravel Development', desc:'Custom web applications, REST APIs and robust backend systems.',
            icon:'layers', price:900000, priceLabel:'from ₦900,000', type:'one-time',
            addons:[
              {id:'lv-payment', name:'Payment Gateway Integration', price:220000, desc:'Paystack, Flutterwave, or Stripe with webhooks & reconciliation logic'},
              {id:'lv-api', name:'RESTful API (documented)', price:450000, desc:'Full documented REST API with Passport/Sanctum authentication'},
              {id:'lv-admin', name:'Advanced Operations Dashboard', price:450000, desc:'Expanded operations dashboard with deeper workflows, reporting, moderation tools, and more advanced control surfaces'},
              {id:'lv-notifications', name:'Advanced Notifications & Messaging', price:220000, desc:'Multi-channel transactional messaging with richer workflows, escalation logic, and template orchestration'},
              {id:'lv-realtime', name:'Real-time Features (WebSockets)', price:220000, desc:'Live notifications and data updates via Laravel Reverb'},
              {id:'lv-mobile', name:'Mobile App API Layer', price:400000, desc:'Mobile-optimised API endpoints for React Native or Flutter'},
              {id:'lv-multitenant', name:'Multi-tenant Architecture', price:700000, desc:'Per-tenant data isolation and subdomain routing for SaaS platforms'},
            ]
          },
          {
            id:'email', name:'Business Email Setup', desc:'Google Workspace, Microsoft 365, Zoho or cPanel — configured and secured.',
            icon:'mail', price:120000, priceLabel:'₦120,000 one-time', type:'one-time',
            addons:[
              {id:'em-migration', name:'Full Email Migration', price:85000, desc:'Migrate all emails, contacts & calendars from your old provider'},
              {id:'em-users', name:'Extra Users (5-pack)', price:30000, desc:'Set up 5 additional user accounts beyond the 5 included in setup'},
              {id:'em-desktop', name:'Full Team Device Rollout', price:60000, desc:'Broader team-wide client setup across desktop and device environments with handover support'},
              {id:'em-signature', name:'HTML Email Signature Design', price:50000, desc:'Professionally designed HTML email signature for all users'},
              {id:'em-template', name:'Email Newsletter Template', price:85000, desc:'Branded HTML email template compatible with Mailchimp / Brevo'},
            ]
          },
          {
            id:'cloud', name:'Cloud Architecture', desc:'Scalable AWS, GCP or DigitalOcean infrastructure — designed, deployed & documented.',
            icon:'cloud', price:750000, priceLabel:'from ₦750,000', type:'one-time',
            addons:[
              {id:'cl-autoscale', name:'Auto-scaling Setup', price:300000, desc:'Load balancer, auto-scaling groups & health check configuration'},
              {id:'cl-cicd', name:'Advanced CI/CD Workflow', price:320000, desc:'Expanded multi-environment build, test, deploy, rollback, and release orchestration beyond the core delivery pipeline'},
              {id:'cl-db', name:'Advanced Database Resilience', price:350000, desc:'Read replicas, backup strategy refinement, recovery planning, and higher-resilience database architecture'},
              {id:'cl-cdn', name:'CDN & Edge Configuration', price:180000, desc:'Cloudflare or AWS CloudFront CDN setup for global asset delivery'},
              {id:'cl-iac', name:'Infrastructure as Code (Terraform)', price:300000, desc:'Entire infrastructure codified in Terraform for reproducible deploys'},
              {id:'cl-audit', name:'Cloud Cost Optimisation Audit', price:180000, desc:'Full audit of your current cloud spend with actionable savings recommendations'},
              {id:'cl-manage', name:'Monthly Cloud Management', price:500000, desc:'Ongoing cloud monitoring, patching, scaling & cost management', monthly:true},
            ]
          },
          {
            id:'webmaintenance', name:'Website Maintenance', desc:'Monthly care for all platforms — WordPress, Laravel, React, custom PHP & more.',
            icon:'shield', price:120000, priceLabel:'from ₦120,000/mo', type:'monthly',
            addons:[
              {id:'wm-extra', name:'Additional Website', price:60000, desc:'Add a second website to your care plan', monthly:true},
              {id:'wm-priority', name:'30-min Priority Response', price:50000, desc:'Upgrade emergency response SLA to 30 minutes', monthly:true},
              {id:'wm-server', name:'VPS Server Management', price:90000, desc:'Full server-level VPS/cPanel maintenance included in plan', monthly:true},
              {id:'wm-audit', name:'Quarterly Security Audit', price:180000, desc:'In-depth security audit every 3 months with full written report'},
              {id:'wm-cwv', name:'Core Web Vitals Monitoring', price:40000, desc:'Monthly Lighthouse & CWV tracking with performance recommendations', monthly:true},
            ]
          },
          {
            id:'wpmaintenance', name:'WordPress Maintenance', desc:'Specialised monthly care exclusively for WordPress and WooCommerce sites.',
            icon:'repeat', price:80000, priceLabel:'from ₦80,000/mo', type:'monthly',
            addons:[
              {id:'wpm-extra', name:'Additional WP Site', price:50000, desc:'Add a second WordPress site to the same care plan', monthly:true},
              {id:'wpm-woo', name:'WooCommerce Monitoring', price:40000, desc:'Order integrity checks, payment gateway health & product audit', monthly:true},
              {id:'wpm-report', name:'Enhanced Monthly Report', price:30000, desc:'Expanded report with SEO snapshot, uptime graphs & plugin changelog', monthly:true},
              {id:'wpm-licenses', name:'Plugin License Management', price:50000, desc:'We purchase, renew & manage all premium plugin licences on your behalf', monthly:true},
              {id:'wpm-malware', name:'Priority Malware Removal', price:350000, desc:'Emergency malware removal and post-hack hardening on demand'},
            ]
          }
        ];

        let currentStep = 1;
        const totalSteps = 5;
        const selectedServices = new Set();
        const selectedAddons = {};
        const addonQuantities = {};
        const selectedPlatforms = {};
        let termsAccepted = false;
        let timeline = '';
        let source = '';
        let domainPreference = '';
        let hostingPreference = '';

        const ICONS = {
          wordpress: `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M8.5 8.5c1 4.5 3 7.5 3.5 7.5s2.5-3 3.5-7.5"></path><path d="M7.5 10h9"></path></svg>`,
          globe: `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18"></path><path d="M12 3a14 14 0 0 1 0 18"></path><path d="M12 3a14 14 0 0 0 0 18"></path></svg>`,
          mobile: `<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="7" y="3" width="10" height="18" rx="2"></rect><path d="M11 17h2"></path></svg>`,
          palette: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a9 9 0 1 0 0 18h1a2 2 0 0 0 0-4h-1a2 2 0 0 1 0-4h4a4 4 0 0 0 0-8Z"></path><circle cx="7.5" cy="10.5" r="1"></circle><circle cx="9.5" cy="7.5" r="1"></circle><circle cx="13.5" cy="7.5" r="1"></circle></svg>`,
          layers: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 4 7 4-7 4-7-4 7-4Z"></path><path d="m5 12 7 4 7-4"></path><path d="m5 16 7 4 7-4"></path></svg>`,
          shield: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v6c0 5 3.4 7.9 7 9 3.6-1.1 7-4 7-9V6l-7-3Z"></path><path d="m9.5 12 1.8 1.8 3.7-3.8"></path></svg>`,
          mail: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16v10H4z"></path><path d="m4 8 8 6 8-6"></path></svg>`,
          search: `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6"></circle><path d="m20 20-4.2-4.2"></path></svg>`,
          cloud: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 18a4 4 0 1 1 .8-7.9A5.5 5.5 0 0 1 18 12a3 3 0 0 1-.5 6H7Z"></path></svg>`,
          saas: `<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M8 15h3M13 15h3"></path><circle cx="7" cy="7.5" r=".8" fill="currentColor" stroke="none"></circle><circle cx="10" cy="7.5" r=".8" fill="currentColor" stroke="none"></circle></svg>`,
          rocket: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3c3 1.2 5.3 3.5 6.5 6.5L13 15l-4 1 1-4-5.5-5.5C5.7 3.5 8 1.2 11 0z"></path><path d="M13 15l2 2"></path><path d="M8 16l-2 5 5-2"></path></svg>`,
          'calendar-short': `<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M8 3v4M16 3v4M3 10h18"></path></svg>`,
          'calendar-long': `<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M8 3v4M16 3v4M3 10h18"></path><path d="M8 14h3M13 14h3M8 17h8"></path></svg>`,
          wave: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 14c2.5 0 2.5-4 5-4s2.5 4 5 4 2.5-4 5-4 2.5 4 5 4"></path><path d="M2 18c2.5 0 2.5-4 5-4s2.5 4 5 4 2.5-4 5-4 2.5 4 5 4"></path></svg>`,
          'check-circle': `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"></circle><path d="m8.5 12 2.3 2.3 4.7-4.8"></path></svg>`,
          cart: `<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="9" cy="20" r="1.5"></circle><circle cx="17" cy="20" r="1.5"></circle><path d="M3 4h2l2.2 10.2a1 1 0 0 0 1 .8H18a1 1 0 0 0 1-.8L21 7H7"></path></svg>`,
          chat: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 18h9l5 3V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"></path><path d="M8 10h8M8 14h5"></path></svg>`,
          lock: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 10V7a4 4 0 1 1 8 0v3"></path><rect x="5" y="10" width="14" height="11" rx="2"></rect><path d="M12 14v3"></path></svg>`,
          spark: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3v6M12 15v6M3 12h6M15 12h6"></path><path d="m6 6 2 2M16 16l2 2M18 6l-2 2M8 16l-2 2"></path></svg>`,
          repeat: `<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M17 2l4 4-4 4"></path><path d="M3 11V9a3 3 0 0 1 3-3h15"></path><path d="M7 22l-4-4 4-4"></path><path d="M21 13v2a3 3 0 0 1-3 3H3"></path></svg>`
        };

        function iconSvg(name) {
          return ICONS[name] || ICONS.spark;
        }

        document.addEventListener('DOMContentLoaded', () => {
          renderServiceGrid();
          updateQuoteSidebar();

          ['f-name','f-business','f-email','f-phone','f-country'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
              el.addEventListener('blur', () => {
                el.classList.remove('error');
                const errId = 'err-' + id.replace('f-', '');
                const err = document.getElementById(errId);
                if (err) {
                  err.classList.remove('visible');
                }
              });
            }
          });

          if (window.innerWidth <= 900) {
            document.getElementById('quote-sidebar').classList.add('collapsed');
          }
        });

        function renderServiceGrid() {
          const grid = document.getElementById('service-grid');
          grid.innerHTML = SERVICES.map(s => `
            <div class="svc-card" id="svc-${s.id}" onclick="toggleService('${s.id}')">
              <div class="svc-card-check" id="chk-${s.id}"></div>
              <div class="svc-card-ico">${iconSvg(s.icon)}</div>
              <div class="svc-card-name">${s.name}</div>
              <p class="svc-card-desc">${s.desc}</p>
              <div class="svc-card-price">${s.priceLabel}</div>
              <div class="svc-card-type"><span class="type-icon" aria-hidden="true">${iconSvg(s.type === 'monthly' ? 'repeat' : 'spark')}</span>${s.type === 'monthly' ? 'Monthly' : 'One-time'}</div>
            </div>
          `).join('');
        }

        function toggleService(id) {
          const card = document.getElementById('svc-' + id);
          const chk = document.getElementById('chk-' + id);

          if (selectedServices.has(id)) {
            selectedServices.delete(id);
            card.classList.remove('selected');
            chk.textContent = '';
            delete selectedAddons[id];
            delete addonQuantities[id];
            delete selectedPlatforms[id];
          } else {
            selectedServices.add(id);
            card.classList.add('selected');
            chk.textContent = '✓';
            selectedAddons[id] = new Set();
            addonQuantities[id] = {};
            if (id === 'ecommerce') {
              selectedPlatforms[id] = '';
            }
          }

          updateQuoteSidebar();
        }

        function renderAddons() {
          const container = document.getElementById('addons-container');

          if (selectedServices.size === 0) {
            container.innerHTML = `
              <div class="no-services-msg">
                <div class="nsm-ico">${iconSvg('spark')}</div>
                <p>You haven't selected any services yet.<br><button onclick="goToStep(2)" style="background:none;border:none;cursor:pointer;color:var(--gold);font-weight:600;font-size:.875rem;font-family:var(--sans)">← Go back and select a service</button></p>
              </div>`;
            return;
          }

          container.innerHTML = [...selectedServices].map(sid => {
            const svc = SERVICES.find(s => s.id === sid);
            if (!svc) return '';
            const platformMarkup = svc.platforms ? `
              <div class="platform-section">
                <div class="platform-heading">
                  <div class="platform-title">Choose your platform direction</div>
                  <div class="platform-subtitle">Pricing and add-ons below will follow the selected platform.</div>
                </div>
                <div class="platform-grid">
                  ${svc.platforms.map(platform => `
                    <button type="button" class="platform-card ${selectedPlatforms[sid] === platform.id ? 'selected' : ''}" onclick="selectPlatform('${sid}','${platform.id}', event)">
                      <span class="platform-card-name">${platform.name}</span>
                      <span class="platform-card-desc">${platform.desc}</span>
                      <span class="platform-card-price">${platform.priceLabel}</span>
                    </button>
                  `).join('')}
                </div>
                ${selectedPlatforms[sid] ? '' : '<div class="platform-hint visible">Please choose a platform for your e-commerce website.</div>'}
              </div>
            ` : '';
            const addons = getServiceAddons(sid).filter(addon => !(sid === 'wordpress' && addon.id === 'wp-ecommerce' && selectedServices.has('ecommerce')));

            return `
              <div class="addons-section">
                <div class="addon-section-head">
                  <div class="ash-ico">${iconSvg(svc.icon)}</div>
                  <div>
                    <div class="ash-name">${svc.name}</div>
                    <div class="ash-base">Base: ${getServicePriceLabel(sid)}</div>
                  </div>
                </div>
                ${platformMarkup}
                <div class="addon-grid">
                  ${addons.map(a => `
                    <div class="addon-card ${isAddonSelected(sid, a.id) ? 'selected' : ''}" id="addon-${a.id}" onclick="toggleAddon('${sid}','${a.id}')">
                      <div class="addon-checkbox" id="addonchk-${a.id}">${isAddonSelected(sid, a.id) ? '✓' : ''}</div>
                      <div class="addon-body">
                        <div class="addon-name">${a.name}</div>
                        <div class="addon-desc">${a.desc}</div>
                        <div class="addon-price">${renderAddonPrice(sid, a)}</div>
                        ${a.quantity ? `
                          <div class="addon-quantity-wrap" onclick="event.stopPropagation()">
                            <span class="addon-quantity-label">How many extra pages?</span>
                            <div class="addon-quantity-controls">
                              <button class="addon-qty-btn" type="button" onclick="adjustAddonQuantity('${sid}','${a.id}',-1,event)">−</button>
                              <input class="addon-qty-input" type="number" min="0" step="1" inputmode="numeric" value="${getAddonQuantity(sid, a.id)}" oninput="setAddonQuantity('${sid}','${a.id}', this.value, event)" onclick="event.stopPropagation()">
                              <button class="addon-qty-btn" type="button" onclick="adjustAddonQuantity('${sid}','${a.id}',1,event)">+</button>
                            </div>
                          </div>
                        ` : ''}
                      </div>
                    </div>
                  `).join('')}
                </div>
              </div>
            `;
          }).join('');
        }

        function toggleAddon(serviceId, addonId) {
          const addon = getAddon(serviceId, addonId);
          if (!addon) return;

          if (addon.quantity) {
            if (selectedAddons[serviceId]?.has(addonId)) {
              selectedAddons[serviceId].delete(addonId);
              if (addonQuantities[serviceId]) {
                delete addonQuantities[serviceId][addonId];
              }
            } else {
              if (!selectedAddons[serviceId]) selectedAddons[serviceId] = new Set();
              if (!addonQuantities[serviceId]) addonQuantities[serviceId] = {};
              selectedAddons[serviceId].add(addonId);
              addonQuantities[serviceId][addonId] = Math.max(1, getAddonQuantity(serviceId, addonId) || 1);
            }

            renderAddons();
            updateQuoteSidebar();
            return;
          }

          if (!selectedAddons[serviceId]) selectedAddons[serviceId] = new Set();

          const card = document.getElementById('addon-' + addonId);
          const chk = document.getElementById('addonchk-' + addonId);

          if (selectedAddons[serviceId].has(addonId)) {
            selectedAddons[serviceId].delete(addonId);
            card.classList.remove('selected');
            chk.textContent = '';
          } else {
            selectedAddons[serviceId].add(addonId);
            card.classList.add('selected');
            chk.textContent = '✓';
          }

          updateQuoteSidebar();
        }

        function isAddonSelected(serviceId, addonId) {
          return selectedAddons[serviceId]?.has(addonId) ?? false;
        }

        function getAddon(serviceId, addonId) {
          return getServiceAddons(serviceId).find(x => x.id === addonId) ?? null;
        }

        function getAddonQuantity(serviceId, addonId) {
          return addonQuantities[serviceId]?.[addonId] ?? 0;
        }

        function getAddonTotal(addon, serviceId) {
          if (addon.quantity) {
            return addon.price * getAddonQuantity(serviceId, addon.id);
          }

          return addon.price;
        }

        function getServiceConfig(serviceId) {
          return SERVICES.find(x => x.id === serviceId) ?? null;
        }

        function getSelectedPlatform(serviceId) {
          return selectedPlatforms[serviceId] || '';
        }

        function getPlatformConfig(serviceId) {
          const service = getServiceConfig(serviceId);
          if (!service?.platforms) return null;
          return service.platforms.find(platform => platform.id === getSelectedPlatform(serviceId)) ?? null;
        }

        function getServiceAddons(serviceId) {
          const service = getServiceConfig(serviceId);
          if (!service) return [];
          const platform = getPlatformConfig(serviceId);
          if (platform) return platform.addons || [];
          return service.addons || [];
        }

        function getServiceBasePrice(serviceId) {
          const platform = getPlatformConfig(serviceId);
          if (platform) return platform.price;
          return getServiceConfig(serviceId)?.price ?? 0;
        }

        function getServicePriceLabel(serviceId) {
          const platform = getPlatformConfig(serviceId);
          if (platform) return platform.priceLabel;
          return getServiceConfig(serviceId)?.priceLabel ?? '';
        }

        function getServiceDisplayName(serviceId) {
          const service = getServiceConfig(serviceId);
          if (!service) return '';
          const platform = getPlatformConfig(serviceId);
          return platform ? `${service.name} (${platform.name})` : service.name;
        }

        function selectPlatform(serviceId, platformId, event) {
          event.stopPropagation();
          selectedPlatforms[serviceId] = platformId;
          selectedAddons[serviceId] = new Set();
          addonQuantities[serviceId] = {};
          renderAddons();
          updateQuoteSidebar();
        }

        function renderAddonPrice(serviceId, addon) {
          if (addon.quantity) {
            const quantity = getAddonQuantity(serviceId, addon.id);
            const total = quantity > 0 ? fmt(getAddonTotal(addon, serviceId)) : fmt(addon.price);
            const quantityText = quantity > 0 ? ` • ${quantity} ${quantity === 1 ? addon.quantityLabel : addon.quantityLabel + 's'}` : '';
            return `+${fmt(addon.price)} / ${addon.quantityLabel}${quantityText ? `<span class="addon-quantity-summary">${quantityText} = ${total}</span>` : ''}`;
          }

          return `+${fmt(addon.price)}${addon.monthly ? '<span class="addon-monthly-badge">/mo</span>' : ''}`;
        }

        function adjustAddonQuantity(serviceId, addonId, delta, event) {
          event.stopPropagation();
          setAddonQuantity(serviceId, addonId, getAddonQuantity(serviceId, addonId) + delta);
        }

        function setAddonQuantity(serviceId, addonId, value, event = null) {
          if (event) {
            event.stopPropagation();
          }

          const addon = getAddon(serviceId, addonId);
          if (!addon || !addon.quantity) return;

          const parsed = Number.parseInt(value, 10);
          const quantity = Number.isNaN(parsed) ? 0 : Math.max(0, parsed);

          if (!selectedAddons[serviceId]) selectedAddons[serviceId] = new Set();
          if (!addonQuantities[serviceId]) addonQuantities[serviceId] = {};

          if (quantity <= 0) {
            selectedAddons[serviceId].delete(addonId);
            delete addonQuantities[serviceId][addonId];
          } else {
            selectedAddons[serviceId].add(addonId);
            addonQuantities[serviceId][addonId] = quantity;
          }

          renderAddons();
          updateQuoteSidebar();
        }

        function updateQuoteSidebar() {
          const svcsEl = document.getElementById('qs-services-list');
          const addonsEl = document.getElementById('qs-addons-list');
          const onetimeEl = document.getElementById('qs-onetime');
          const monthlyEl = document.getElementById('qs-monthly');
          const monthlyRowEl = document.getElementById('qs-monthly-row');
          const totalEl = document.getElementById('qs-total');
          const mqEl = document.getElementById('mq-total-preview');

          let onetimeTotal = 0;
          let monthlyTotal = 0;

          if (selectedServices.size === 0) {
            svcsEl.innerHTML = `<div class="qs-empty" id="qs-empty-state"><span class="qs-empty-ico">${iconSvg('cart')}</span>Select services in Step 2 to see your quote build here in real time.</div>`;
            addonsEl.innerHTML = '';
          } else {
            let servicesHtml = '';

            [...selectedServices].forEach(sid => {
              const service = SERVICES.find(x => x.id === sid);
              if (!service) return;

              const basePrice = getServiceBasePrice(sid);
              const priceLabel = getServicePriceLabel(sid);
              const displayName = getServiceDisplayName(sid);

              if (service.type === 'monthly') monthlyTotal += basePrice;
              else onetimeTotal += basePrice;

              servicesHtml += `
                <div class="qs-svc-item">
                  <div class="qs-svc-left"><span class="qs-svc-ico">${iconSvg(service.icon)}</span><span class="qs-svc-name">${displayName}</span></div>
                  <span class="qs-svc-price">${priceLabel}</span>
                </div>`;
            });

            svcsEl.innerHTML = servicesHtml;

            let addonsHtml = '';
            let hasAddons = false;

            Object.entries(selectedAddons).forEach(([sid, addonSet]) => {
              const service = SERVICES.find(x => x.id === sid);
              if (!service) return;

              addonSet.forEach(aid => {
                const addon = getAddon(sid, aid);
                if (!addon) return;

                hasAddons = true;
                const addonTotal = getAddonTotal(addon, sid);
                if (addon.monthly) monthlyTotal += addonTotal;
                else onetimeTotal += addonTotal;

                addonsHtml += `
                  <div class="qs-addon-item">
                    <span class="qs-addon-name">+ ${addon.name}${addon.quantity ? ` x ${getAddonQuantity(sid, aid)}` : ''}</span>
                    <span class="qs-addon-price">+${fmt(addonTotal)}${addon.monthly ? '/mo' : ''}</span>
                  </div>`;
              });
            });

            addonsEl.innerHTML = hasAddons ? addonsHtml : '';
          }

          onetimeEl.textContent = fmt(onetimeTotal);
          monthlyEl.textContent = fmt(monthlyTotal) + '/mo';
          monthlyRowEl.style.display = monthlyTotal > 0 ? 'flex' : 'none';

          const displayTotal = onetimeTotal + monthlyTotal;
          totalEl.textContent = fmt(displayTotal) + (monthlyTotal > 0 ? '+/mo' : '');
          if (mqEl) mqEl.textContent = fmt(displayTotal);
        }

        function fmt(n) {
          return '₦' + n.toLocaleString('en-NG');
        }

        function selectTimeline(el) {
          document.querySelectorAll('.timeline-card').forEach(c => c.classList.remove('selected'));
          el.classList.add('selected');
          timeline = el.dataset.val;
          document.getElementById('err-timeline').classList.remove('visible');
        }

        function selectSource(el) {
          document.querySelectorAll('#source-grid .source-btn').forEach(c => c.classList.remove('selected'));
          el.classList.add('selected');
          source = el.dataset.val;
        }

        function selectDomainOption(el) {
          document.querySelectorAll('#domain-grid .source-btn').forEach(c => c.classList.remove('selected'));
          el.classList.add('selected');
          domainPreference = el.dataset.val;
        }

        function selectHostingOption(el) {
          document.querySelectorAll('#hosting-grid .source-btn').forEach(c => c.classList.remove('selected'));
          el.classList.add('selected');
          hostingPreference = el.dataset.val;
        }

        function toggleTerms() {
          termsAccepted = !termsAccepted;
          const chk = document.getElementById('terms-check');
          chk.textContent = termsAccepted ? '✓' : '';
          chk.classList.toggle('checked', termsAccepted);
          if (termsAccepted) {
            document.getElementById('err-terms').classList.remove('visible');
          }
        }

        function goNext(fromStep) {
          if (!validateStep(fromStep)) return;
          if (fromStep === 2) renderAddons();
          if (fromStep === 4) buildReview();
          goToStep(fromStep + 1);
        }

        function goBack(fromStep) {
          goToStep(fromStep - 1);
        }

        function goToStep(n) {
          const current = document.getElementById('step-' + currentStep);
          if (current) current.classList.remove('active');

          currentStep = n;

          const next = document.getElementById('step-' + n);
          if (next) next.classList.add('active');

          updateStepIndicator();
          document.getElementById('form-panel').scrollIntoView({ behavior:'smooth', block:'start' });
        }

        function updateStepIndicator() {
          const pct = (currentStep / totalSteps) * 100;
          document.getElementById('progress-fill').style.width = pct + '%';
          document.getElementById('nav-step-label').textContent = `Step ${currentStep} of ${totalSteps}`;

          for (let i = 1; i <= totalSteps; i++) {
            const item = document.querySelector(`.si-item[data-step="${i}"]`);
            const num = document.getElementById('si-num-' + i);
            if (!item || !num) continue;

            item.classList.remove('active', 'done');
            if (i < currentStep) {
              item.classList.add('done');
              num.textContent = '✓';
            } else if (i === currentStep) {
              item.classList.add('active');
              num.textContent = i;
            } else {
              num.textContent = i;
            }
          }
        }

        function validateStep(step) {
          let ok = true;

          if (step === 1) {
            ok = validateField('f-name', 'err-name', v => v.trim().length > 1) && ok;
            ok = validateField('f-business', 'err-business', v => v.trim().length > 1) && ok;
            ok = validateField('f-email', 'err-email', v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) && ok;
            ok = validateField('f-phone', 'err-phone', v => v.trim().length > 6) && ok;
            ok = validateField('f-country', 'err-country', v => v !== '') && ok;
          }

          if (step === 2) {
            if (selectedServices.size === 0) {
              document.getElementById('svc-hint').classList.add('visible');
              ok = false;
            } else {
              document.getElementById('svc-hint').classList.remove('visible');
            }
          }

          if (step === 4) {
            if (!timeline) {
              document.getElementById('err-timeline').classList.add('visible');
              ok = false;
            }
          }

          if (step === 3 && selectedServices.has('ecommerce') && !getSelectedPlatform('ecommerce')) {
            ok = false;
          }

          return ok;
        }

        function validateField(fieldId, errId, test) {
          const el = document.getElementById(fieldId);
          const err = document.getElementById(errId);
          const val = el.value;

          if (!test(val)) {
            el.classList.add('error');
            err.classList.add('visible');
            el.focus();
            return false;
          }

          el.classList.remove('error');
          err.classList.remove('visible');
          return true;
        }

        function buildReview() {
          const contactData = document.getElementById('review-contact-data');
          contactData.innerHTML = `
            <div class="rr-item"><span class="rr-label">Name</span><span class="rr-val">${esc(document.getElementById('f-name').value)}</span></div>
            <div class="rr-item"><span class="rr-label">Business</span><span class="rr-val">${esc(document.getElementById('f-business').value)}</span></div>
            <div class="rr-item"><span class="rr-label">Email</span><span class="rr-val">${esc(document.getElementById('f-email').value)}</span></div>
            <div class="rr-item"><span class="rr-label">Phone</span><span class="rr-val">${esc(document.getElementById('f-phone').value)}</span></div>
            <div class="rr-item"><span class="rr-label">Country</span><span class="rr-val">${esc(document.getElementById('f-country').value)}</span></div>
          `;

          const svcsData = document.getElementById('review-services-data');
          let servicesHtml = '<div class="review-services">';
          let onetimeTotal = 0;
          let monthlyTotal = 0;

          [...selectedServices].forEach(sid => {
            const service = SERVICES.find(x => x.id === sid);
            if (!service) return;

            const basePrice = getServiceBasePrice(sid);
            const priceLabel = getServicePriceLabel(sid);
            const displayName = getServiceDisplayName(sid);

            if (service.type === 'monthly') monthlyTotal += basePrice;
            else onetimeTotal += basePrice;

            servicesHtml += `<div class="rs-item"><div class="rsi-left"><span class="rsi-ico">${iconSvg(service.icon)}</span><span class="rsi-name">${displayName}</span></div><span class="rsi-price">${priceLabel}</span></div>`;
          });

          servicesHtml += '</div>';

          let hasAddons = false;
          let addonsHtml = '<div class="review-addons">';

          Object.entries(selectedAddons).forEach(([sid, addonSet]) => {
            const service = SERVICES.find(x => x.id === sid);
            if (!service || addonSet.size === 0) return;

            addonSet.forEach(aid => {
              const addon = getAddon(sid, aid);
              if (!addon) return;

              hasAddons = true;
              const addonTotal = getAddonTotal(addon, sid);
              if (addon.monthly) monthlyTotal += addonTotal;
              else onetimeTotal += addonTotal;

              addonsHtml += `<div class="ra-item"><span class="ra-name">+ ${addon.name}${addon.quantity ? ` x ${getAddonQuantity(sid, aid)}` : ''}</span><span class="ra-price">+${fmt(addonTotal)}${addon.monthly ? '/mo' : ''}</span></div>`;
            });
          });

          addonsHtml += '</div>';

          svcsData.innerHTML = servicesHtml + (hasAddons ? '<div style="margin-top:.5rem;font-size:.7rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--g400);margin-bottom:.35rem">Add-ons</div>' + addonsHtml : '');

          const briefData = document.getElementById('review-brief-data');
          const timelineLabels = {'asap':'As soon as possible','2-4weeks':'2–4 weeks','1-3months':'1–3 months','flexible':'Flexible'};
          const sourceLabels = {'google':'Google Search','referral':'Referral','social':'Social Media','returning':'Returning client','linkedin':'LinkedIn','other':'Other'};
          const domainLabels = {
            'own-domain':'I already have a domain',
            'manage-domain':'I want i2Medier to procure and manage it',
            'unsure-domain':'I’m not sure yet',
          };
          const hostingLabels = {
            'own-hosting':'I already have hosting',
            'managed-hosting':'I want i2Medier Managed Hosting',
            'unsure-hosting':'I’m not sure yet',
          };
          const msg = document.getElementById('f-message').value;

          briefData.innerHTML = `
            <div class="rr-item"><span class="rr-label">Timeline</span><span class="rr-val">${timelineLabels[timeline] || timeline}</span></div>
            <div class="rr-item"><span class="rr-label">Budget</span><span class="rr-val">${document.getElementById('f-budget').options[document.getElementById('f-budget').selectedIndex].text}</span></div>
            ${source ? `<div class="rr-item"><span class="rr-label">Found us via</span><span class="rr-val">${sourceLabels[source] || source}</span></div>` : ''}
            ${domainPreference ? `<div class="rr-item"><span class="rr-label">Domain</span><span class="rr-val">${domainLabels[domainPreference] || domainPreference}</span></div>` : ''}
            ${hostingPreference ? `<div class="rr-item"><span class="rr-label">Hosting</span><span class="rr-val">${hostingLabels[hostingPreference] || hostingPreference}</span></div>` : ''}
            ${msg ? `<div class="rr-item"><span class="rr-label">Message</span><span class="rr-val" style="max-width:300px;word-break:break-word;white-space:pre-wrap">${esc(msg.substring(0, 200))}${msg.length > 200 ? '…' : ''}</span></div>` : ''}
          `;

          const totalBlock = document.getElementById('review-total-block');
          totalBlock.innerHTML = `
            <div class="rt-row"><span class="rt-label">One-time total</span><span class="rt-val">${fmt(onetimeTotal)}</span></div>
            ${monthlyTotal > 0 ? `<div class="rt-row"><span class="rt-label">Monthly recurring</span><span class="rt-val">${fmt(monthlyTotal)}/mo</span></div>` : ''}
            <div class="rt-row rt-total-row"><span class="rt-label">Your estimate starts from</span><span class="rt-val">${fmt(onetimeTotal + monthlyTotal)}${monthlyTotal > 0 ? '+/mo' : ''}</span></div>
            <p class="rt-disclaimer">This is a starting estimate based on your selections. Your final, itemised quote will be confirmed within 24 hours of submission and may vary based on detailed scope discussion.</p>
          `;
        }

        function submitForm() {
          if (!termsAccepted) {
            document.getElementById('err-terms').classList.add('visible');
            return;
          }

          const btn = document.getElementById('btn-submit');
          btn.classList.add('loading');
          btn.disabled = true;

          setTimeout(() => {
            btn.classList.remove('loading');
            btn.disabled = false;
            showSuccess();
          }, 2000);
        }

        function showSuccess() {
          document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
          document.getElementById('progress-fill').style.width = '100%';
          document.getElementById('nav-step-label').textContent = 'Enquiry Sent!';

          const success = document.getElementById('step-success');
          success.style.display = 'block';

          const ref = 'i2M-' + Date.now().toString().slice(-6);
          document.getElementById('success-ref').textContent = 'REF: ' + ref;
          document.getElementById('form-panel').scrollIntoView({ behavior:'smooth', block:'start' });
        }

        function toggleMobileQuote() {
          const sidebar = document.getElementById('quote-sidebar');
          sidebar.classList.toggle('collapsed');
        }

        function esc(str) {
          return String(str).replace(/[&<>"']/g, m => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]));
        }

        function goBackToPrevious(event) {
          const fallbackUrl = "{{ route('site.home') }}";
          const referrer = document.referrer;

          if (referrer) {
            try {
              const previousUrl = new URL(referrer);
              if (previousUrl.origin === window.location.origin && previousUrl.pathname !== window.location.pathname) {
                event.preventDefault();
                window.location.href = previousUrl.href;
                return false;
              }
            } catch (error) {
              // Ignore invalid referrer URLs and fall back below.
            }
          }

          if (window.history.length > 1) {
            event.preventDefault();
            window.history.back();
            return false;
          }

          window.location.href = fallbackUrl;
          return false;
        }
    </script>
@endpush
