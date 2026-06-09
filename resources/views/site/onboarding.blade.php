@extends('public.layouts.onboarding')

@section('title', 'Start a Project — i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/onboarding.css')
@endpush

@section('content')
    <svg width="0" height="0" style="position:absolute;visibility:hidden" aria-hidden="true" focusable="false">
        <symbol id="icon-home"       viewBox="0 0 24 24"><path d="M4 10.5 12 4l8 6.5"></path><path d="M6.5 9.5V20h11V9.5"></path></symbol>
        <symbol id="icon-user"       viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.5"></circle><path d="M5 20a7 7 0 0 1 14 0"></path></symbol>
        <symbol id="icon-cog"        viewBox="0 0 24 24"><circle cx="12" cy="12" r="3.2"></circle><path d="M19.4 15a1 1 0 0 0 .2 1.1l.1.1a2 2 0 0 1-2.8 2.8l-.1-.1a1 1 0 0 0-1.1-.2 1 1 0 0 0-.6.9V20a2 2 0 0 1-4 0v-.2a1 1 0 0 0-.6-.9 1 1 0 0 0-1.1.2l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1 1 0 0 0 .2-1.1 1 1 0 0 0-.9-.6H4a2 2 0 0 1 0-4h.2a1 1 0 0 0 .9-.6 1 1 0 0 0-.2-1.1l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1a1 1 0 0 0 1.1.2h.1a1 1 0 0 0 .6-.9V4a2 2 0 0 1 4 0v.2a1 1 0 0 0 .6.9 1 1 0 0 0 1.1-.2l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1a1 1 0 0 0-.2 1.1v.1a1 1 0 0 0 .9.6H20a2 2 0 0 1 0 4h-.2a1 1 0 0 0-.9.6z"></path></symbol>
        <symbol id="icon-mail"       viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></symbol>
        <symbol id="icon-pen"        viewBox="0 0 24 24"><path d="m4 20 4.5-1 9-9-3.5-3.5-9 9z"></path><path d="m13.5 6.5 3.5 3.5"></path></symbol>
        <symbol id="icon-image"      viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"></rect><circle cx="9" cy="10" r="1.5"></circle><path d="m21 16-5.5-5.5L7 19"></path></symbol>
        <symbol id="icon-users"      viewBox="0 0 24 24"><path d="M16 20a4 4 0 0 0-8 0"></path><circle cx="12" cy="9" r="3"></circle><path d="M22 20a4 4 0 0 0-3-3.87"></path><path d="M2 20a4 4 0 0 1 3-3.87"></path></symbol>
        <symbol id="icon-star"       viewBox="0 0 24 24"><path d="m12 4 2.5 5 5.5.8-4 3.9.9 5.5-4.9-2.6-4.9 2.6.9-5.5-4-3.9 5.5-.8z"></path></symbol>
        <symbol id="icon-help"       viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M9.5 9a2.5 2.5 0 1 1 4.2 1.8c-.9.7-1.7 1.3-1.7 2.7"></path><path d="M12 17h.01"></path></symbol>
        <symbol id="icon-cash"       viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"></rect><circle cx="12" cy="12" r="3"></circle><path d="M7 9h.01M17 15h.01"></path></symbol>
        <symbol id="icon-camera"     viewBox="0 0 24 24"><path d="M5 8h3l1.5-2h5L16 8h3a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2z"></path><circle cx="12" cy="13" r="3.5"></circle></symbol>
        <symbol id="icon-calendar"   viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"></rect><path d="M16 3v4M8 3v4M3 10h18"></path></symbol>
        <symbol id="icon-briefcase"  viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="12" rx="2"></rect><path d="M9 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path><path d="M3 12h18"></path></symbol>
        <symbol id="icon-lock"       viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M8 11V8a4 4 0 0 1 8 0v3"></path></symbol>
        <symbol id="icon-key"        viewBox="0 0 24 24"><circle cx="8" cy="15" r="4"></circle><path d="M12 15h9"></path><path d="M18 12v6"></path></symbol>
        <symbol id="icon-doc"        viewBox="0 0 24 24"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-5Z"></path><path d="M14 3v5h5M9 13h6M9 17h4"></path></symbol>
        <symbol id="icon-pin"        viewBox="0 0 24 24"><path d="M12 2a7 7 0 0 0-7 7c0 5.3 7 13 7 13s7-7.7 7-13a7 7 0 0 0-7-7Z"></path><circle cx="12" cy="9" r="2.5"></circle></symbol>
        <symbol id="icon-video"      viewBox="0 0 24 24"><rect x="2" y="7" width="14" height="10" rx="2"></rect><path d="m16 10 6-3v10l-6-3V10Z"></path></symbol>
        <symbol id="icon-heart"      viewBox="0 0 24 24"><path d="M12 21C12 21 4 13.5 4 8.5a4.5 4.5 0 0 1 8-2.8A4.5 4.5 0 0 1 20 8.5C20 13.5 12 21 12 21Z"></path></symbol>
    </svg>
    <nav class="is-dark">
        @include('public.partials.logo', ['mode' => 'light', 'class' => 'logo'])
        @include('public.partials.menu')
        <div class="nav-right">
            <a href="{{ route('site.home') }}" class="nav-back" onclick="return goBackToPrevious(event)">← Back to site</a>
        </div>
        <button class="public-nav-toggle" type="button" aria-expanded="false" aria-controls="public-side-nav" aria-label="Open navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>
    @include('public.partials.mobile-menu')

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
            <div class="brief-import-notice" id="brief-import-notice" style="display:none">
                <div class="bin-body">
                    <svg class="bin-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-5Z"/><path d="M14 3v5h5M8 13h8M8 17h5"/></svg>
                    <div class="bin-text">
                        <strong>Brief imported</strong> — your selections and generated text have been pre-filled. Review each step and adjust as needed.
                        <span class="bin-pdf-hint">To attach the PDF version, <button type="button" class="bin-pdf-link" id="brief-pdf-open-print">download it here</button> then upload it in the Brief step.</span>
                    </div>
                    <button type="button" class="bin-close" onclick="this.closest('.brief-import-notice').style.display='none'" aria-label="Dismiss">×</button>
                </div>
            </div>
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
                            <input type="tel" id="f-phone" placeholder="+234 805 218 8396" autocomplete="tel"/>
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
                    @include('public.partials.honeypot')
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
                            <div class="svc-preset-notice" id="svc-preset-notice"></div>
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
                            <div id="domain-hosting-section">
                            <div class="field" style="margin-bottom:1.25rem">
                                <label>Domain Preference</label>
                                <div class="source-grid" id="domain-grid">
                                    <div class="source-btn" data-val="own-domain" onclick="selectDomainOption(this)">I already have a domain</div>
                                    <div class="source-btn" data-val="manage-domain" onclick="selectDomainOption(this)">I want i2Medier to procure and manage it</div>
                                    <div class="source-btn" data-val="unsure-domain" onclick="selectDomainOption(this)">I’m not sure yet</div>
                                </div>
                                <span class="field-error" id="err-domain">Please select a domain preference</span>
                                <span class="field-hint">We can work with your existing domain or handle procurement and renewal management on your behalf.</span>
                            </div>
                            <div class="field" style="margin-bottom:1.25rem">
                                <label>Hosting Preference</label>
                                <div class="source-grid" id="hosting-grid">
                                    <div class="source-btn" data-val="own-hosting" onclick="selectHostingOption(this)">I already have hosting</div>
                                    <div class="source-btn" data-val="managed-hosting" onclick="selectHostingOption(this)">I want i2Medier Managed Hosting</div>
                                    <div class="source-btn" data-val="unsure-hosting" onclick="selectHostingOption(this)">I’m not sure yet</div>
                                </div>
                                <span class="field-error" id="err-hosting">Please select a hosting preference</span>
                                <span class="field-hint">Managed Hosting means infrastructure provisioned or arranged by i2Medier and actively maintained by our team.</span>
                            </div>
                            </div>{{-- #domain-hosting-section --}}
                            <div class="field" style="margin-bottom:1.25rem">
                                <label>Project Brief <span style="font-weight:400;opacity:.6;font-size:.8rem">(optional PDF)</span></label>
                                <div class="brief-upload-area" id="brief-upload-area" onclick="document.getElementById('brief-pdf-input').click()" role="button" tabindex="0" aria-label="Upload a PDF brief">
                                    <input type="file" id="brief-pdf-input" accept=".pdf" style="display:none" onchange="handleBriefUpload(this)">
                                    <div id="brief-upload-placeholder" style="display:flex;align-items:center;gap:.75rem">
                                        <svg class="brief-upload-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-5Z"/><path d="M14 3v5h5M8 13h8M8 17h5"/></svg>
                                        <span class="brief-upload-text">Click to upload a PDF brief</span>
                                    </div>
                                    <div id="brief-upload-chosen" style="display:none;align-items:center;gap:.75rem;width:100%">
                                        <svg class="brief-upload-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 3H6a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-5Z"/><path d="M14 3v5h5M8 13h8M8 17h5"/></svg>
                                        <span class="brief-chosen-name" id="brief-pdf-name"></span>
                                        <button type="button" class="brief-clear-btn" onclick="clearBriefUpload(event)" aria-label="Remove file">×</button>
                                    </div>
                                </div>
                                <span class="field-error" id="err-brief-pdf"></span>
                                <span class="field-hint">PDF only, up to 10 MB. Don't have one yet? <a href="{{ route('tools.website-brief-generator') }}" target="_blank" rel="noopener noreferrer">Generate your brief here →</a></span>
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
                            <div class="submit-error" id="err-submit"></div>
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
                                <h4>Your enquiry is logged</h4>
                                <p>Your project brief, selected services, and add-ons have been saved internally with the reference above.</p>
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
                        <a href="{{ $contact['whatsapp_href'] ?? 'https://wa.me/2348052188396?text=Hi!%20I%27d%20like%20to%20enquire%20about%20your%20services.' }}" target="_blank" rel="noopener" class="qs-cta-btn"><span class="btn-icon" aria-hidden="true">@include('site.partials.onboarding-icon', ['name' => 'chat'])</span> Chat on WhatsApp</a>
                        <p class="qs-cta-note">Prefer to talk first? We're on WhatsApp.</p>
                    </div>

                    <div class="qs-guarantee">
                        <span class="qs-guar-ico">@include('site.partials.onboarding-icon', ['name' => 'lock'])</span>
                        <span class="qs-guar-text"><strong>No commitment required.</strong> This is a free enquiry. You'll receive a proposal before any payment is discussed.</span>
                    </div>
        </aside>
    </div>
@endsection
