<div class="footer-newsletter">
    <div class="fn-glow" aria-hidden="true"></div>
    <div class="fn-grid" aria-hidden="true"></div>
    <div class="fn-inner">
        <div class="fn-left">
            <span class="fn-eyebrow">Stay in the loop</span>
            <h2 class="fn-title">Get digital insights that<br>actually <em>matter</em></h2>
            <p class="fn-desc">Monthly: one email with practical web design, development, and SEO tips written for Nigerian business owners — no fluff, no spam, unsubscribe anytime.</p>
            <div class="fn-count">
                <div class="fn-avatars">
                    <div class="fn-avatar" style="background:#c8a96e">C</div>
                    <div class="fn-avatar" style="background:#2563eb">A</div>
                    <div class="fn-avatar" style="background:#16a34a">T</div>
                    <div class="fn-avatar" style="background:#7c3aed">F</div>
                </div>
                <span class="fn-count-text">Join <strong>1,200+</strong> subscribers already reading</span>
            </div>
        </div>
        <div class="fn-right">
            <div class="fn-form">
                <div class="fn-input-row">
                    <input class="fn-input" type="email" placeholder="your@email.com" aria-label="Email address">
                    <button class="fn-submit" type="button" data-footer-subscribe>Subscribe →</button>
                </div>
                <p class="fn-note"><span class="fn-note-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 11V8a5 5 0 0 1 10 0v3"></path><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M12 15v2"></path></svg></span> No spam. No sharing. Just one useful email per month. Unsubscribe in one click.</p>
            </div>
        </div>
    </div>
</div>

<footer class="footer-main" role="contentinfo">
    <div class="fm-noise" aria-hidden="true"></div>
    <div class="footer-grid">
        <div class="fg-brand">
            @include('public.partials.logo', ['mode' => 'light', 'class' => 'fg-logo', 'alt' => 'i2Medier'])
            <span class="fg-tagline">Digital Agency · Est. 2018</span>
            <p class="fg-about">A premium digital agency from Port Harcourt, Nigeria — designing, building, and maintaining world-class digital products for businesses across Africa, the UK, and worldwide.</p>

            <div
                class="availability-badge"
                data-business-timezone="{{ $businessTimezone }}"
                data-business-hours='@json($businessHours)'
                data-holiday-enabled="{{ $holidayOverrideEnabled ? 'true' : 'false' }}"
                data-holiday-status="{{ $holidayOverrideStatus }}"
                data-holiday-notice="{{ $holidayOverrideNotice }}"
            >
                <span class="ab-dot" id="avail-dot"></span>
                <span class="ab-text" id="avail-text">Checking availability…</span>
            </div>

            <div class="fg-location">
                <span class="fg-location-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 21s7-4.35 7-11a7 7 0 1 0-14 0c0 6.65 7 11 7 11Z"></path><circle cx="12" cy="10" r="2.5"></circle></svg></span>
                <span>Port Harcourt, Nigeria · <span class="fg-time" id="wat-time">--:-- {{ $timezoneLabel }}</span></span>
            </div>

            <div class="fg-socials" role="list" aria-label="Social media links">
                <a href="https://facebook.com/i2medier" class="fg-social" data-platform="facebook" title="Facebook" role="listitem" aria-label="Facebook" target="_blank" rel="noopener">f</a>
                <a href="https://twitter.com/i2medier" class="fg-social" data-platform="twitter" title="X / Twitter" role="listitem" aria-label="Twitter" target="_blank" rel="noopener">𝕏</a>
                <a href="https://www.instagram.com/i2medier" class="fg-social" data-platform="instagram" title="Instagram" role="listitem" aria-label="Instagram" target="_blank" rel="noopener">◎</a>
                <a href="https://www.linkedin.com/company/i2medier" class="fg-social" data-platform="linkedin" title="LinkedIn" role="listitem" aria-label="LinkedIn" target="_blank" rel="noopener">in</a>
                <a href="https://www.youtube.com/@i2TechStudio" class="fg-social" data-platform="youtube" title="YouTube" role="listitem" aria-label="YouTube" target="_blank" rel="noopener">▶</a>
                <a href="https://wa.me/2348052188396" class="fg-social" data-platform="whatsapp" title="WhatsApp" role="listitem" aria-label="WhatsApp" target="_blank" rel="noopener"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 11.5a8 8 0 0 1-11.8 7l-3.2.9.9-3.1A8 8 0 1 1 20 11.5Z"></path><path d="M9.2 8.8c.2-.4.4-.4.6-.4h.5c.1 0 .3 0 .4.3l.7 1.6c.1.2.1.4 0 .6l-.3.5c-.1.1-.2.3 0 .5.3.6.9 1.4 2 2 .3.2.5.1.6 0l.5-.6c.1-.1.3-.2.6-.1l1.5.7c.2.1.3.2.3.4v.5c0 .2 0 .4-.3.6-.4.2-1 .4-1.6.3-.7-.1-1.6-.4-2.8-1.4-1-.8-1.8-1.8-2.2-2.5-.4-.8-.5-1.5-.4-2.1.1-.4.3-.7.5-.9Z"></path></svg></a>
            </div>

            <div class="fg-badges">
                <span class="fg-badge"><span class="fg-badge-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="M3 10h18"></path><path d="M8 5v14"></path></svg></span> Made in Nigeria</span>
                <span class="fg-badge"><span class="fg-badge-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 3 2.6 5.3 5.9.8-4.2 4.1 1 5.8L12 16.8 6.7 19l1-5.8L3.5 9.1l5.9-.8Z"></path></svg></span> 100% In-house</span>
                <span class="fg-badge"><span class="fg-badge-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 11V8a5 5 0 0 1 10 0v3"></path><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M12 15v2"></path></svg></span> SSL Secured</span>
                <span class="fg-badge"><span class="fg-badge-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"></path></svg></span> GDPR Compliant</span>
            </div>
        </div>

        <div class="fg-col">
            <div class="fg-col-head">Services</div>
            <ul class="fg-links" role="list">
                <li class="fg-link-item"><a href="{{ route('site.services.web-design') }}" class="fg-link"><span>Web Design</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.mobile-app-development') }}" class="fg-link"><span>Mobile Apps</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.search-optimization') }}" class="fg-link"><span>Search Optimization</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.ui-ux-design') }}" class="fg-link"><span>UI / UX Design</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.wordpress-development') }}" class="fg-link"><span>WordPress Development</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.laravel-development') }}" class="fg-link"><span>Laravel Development</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.business-email-setup') }}" class="fg-link"><span>Business Email Setup</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.cloud-architecture') }}" class="fg-link"><span>Cloud Architecture</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.white-label') }}" class="fg-link"><span>White Label</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.website-maintenance') }}" class="fg-link"><span>Website Maintenance</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.services.wordpress-maintenance') }}" class="fg-link"><span>WordPress Maintenance</span><span class="fgl-arrow">→</span></a></li>
            </ul>
        </div>

        <div class="fg-col">
            <div class="fg-col-head">Company</div>
            <ul class="fg-links" role="list">
                <li class="fg-link-item"><a href="{{ route('site.about') }}" class="fg-link"><span>About i2Medier</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('portfolio.index') }}" class="fg-link"><span>Portfolio & Work</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('blog.index') }}" class="fg-link"><span>Blog & Insights</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item">
                    <a href="mailto:careers@i2medier.com" class="fg-link">
                        <span>Careers</span>
                        <span class="fg-link-tag tag-new">Hiring</span>
                    </a>
                </li>
                <li class="fg-link-item"><a href="{{ route('site.about') }}" class="fg-link"><span>Our Process</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('tools.cost-calculator') }}" class="fg-link"><span>Pricing Calculator</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.start') }}" class="fg-link"><span>Start a Project</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.contact') }}" class="fg-link"><span>Contact Us</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.privacy') }}" class="fg-link"><span>Privacy Policy</span><span class="fgl-arrow">→</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.terms') }}" class="fg-link"><span>Terms of Service</span><span class="fgl-arrow">→</span></a></li>
            </ul>
        </div>

        <div class="fg-col">
            <div class="fg-col-head">Free Tools <span class="fc-new-badge">New</span></div>
            <ul class="fg-links" role="list">
                <li class="fg-link-item"><a href="{{ route('tools.seo-audit') }}" class="fg-link"><span>SEO Audit Tool</span><span class="fg-link-tag tag-free">Free</span></a></li>
                <li class="fg-link-item"><a href="{{ route('tools.business-name-generator') }}" class="fg-link"><span>Business Name Generator</span><span class="fg-link-tag tag-free">Free</span></a></li>
                <li class="fg-link-item"><a href="{{ route('tools.domain-name-generator') }}" class="fg-link"><span>Domain Name Generator</span><span class="fg-link-tag tag-free">Free</span></a></li>
                <li class="fg-link-item"><a href="{{ route('tools.website-brief-generator') }}" class="fg-link"><span>Website Brief Generator</span><span class="fg-link-tag tag-free">Free</span></a></li>
                <li class="fg-link-item"><a href="{{ route('tools.cost-calculator') }}" class="fg-link"><span>Website Cost Calculator</span><span class="fg-link-tag tag-free">Free</span></a></li>
                <li class="fg-link-item"><a href="{{ route('tools.invoice-generator') }}" class="fg-link"><span>Invoice Generator</span><span class="fg-link-tag tag-free">Free</span></a></li>
                <li class="fg-link-item"><a href="{{ route('tools.whatsapp-link-generator') }}" class="fg-link"><span>WhatsApp Link Generator</span><span class="fg-link-tag tag-free">Free</span></a></li>
                <li class="fg-link-item"><a href="{{ route('site.start') }}" class="fg-link"><span>Project Onboarding</span><span class="fg-link-tag tag-free">Free</span></a></li>

            </ul>
        </div>

        <div class="fg-col">
            <div class="fg-col-head">Get in Touch</div>

            <div class="fg-contact-item">
                <div class="fci-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="6" width="18" height="12" rx="2"></rect><path d="m4 8 8 6 8-6"></path></svg></div>
                <div class="fci-body">
                    <div class="fci-label">General Enquiries</div>
                    <div class="fci-value"><a href="mailto:letstalk@i2medier.com">letstalk@i2medier.com</a></div>
                </div>
            </div>

            <div class="fg-contact-item">
                <div class="fci-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.3 19.3 0 0 1-6-6 19.8 19.8 0 0 1-3-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7l.4 2.6a2 2 0 0 1-.6 1.7l-1.5 1.5a16 16 0 0 0 7 7l1.5-1.5a2 2 0 0 1 1.7-.6l2.6.4a2 2 0 0 1 1.7 2Z"></path></svg></div>
                <div class="fci-body">
                    <div class="fci-label">Phone (Mon–Sat)</div>
                    <div class="fci-value mono"><a href="tel:+2348052188396">+234 805 218 8396</a></div>
                </div>
            </div>

            <div class="fg-contact-item">
                <div class="fci-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 21s7-4.35 7-11a7 7 0 1 0-14 0c0 6.65 7 11 7 11Z"></path><circle cx="12" cy="10" r="2.5"></circle></svg></div>
                <div class="fci-body">
                    <div class="fci-label">Office Address</div>
                    <div class="fci-value">18 Emmanuel Close, NTA Mgbuoba<br>Port Harcourt, Rivers State, Nigeria</div>
                </div>
            </div>

            <div class="fg-contact-item">
                <div class="fci-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"></circle><path d="M12 7v5l3 2"></path></svg></div>
                <div class="fci-body">
                    <div class="fci-label">Office Hours ({{ $timezoneLabel }})</div>
                    <div class="fci-value">
                        @foreach ($footerHoursLines as $line)
                            {{ $line }}@if (! $loop->last)<br>@endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="fg-contact-actions">
                <a href="https://wa.me/2348052188396?text=Hi!%20I%27d%20like%20to%20enquire%20about%20your%20services." target="_blank" rel="noopener" class="fca-btn wa">
                    <span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M20 11.5a8 8 0 0 1-11.8 7l-3.2.9.9-3.1A8 8 0 1 1 20 11.5Z"></path><path d="M9.2 8.8c.2-.4.4-.4.6-.4h.5c.1 0 .3 0 .4.3l.7 1.6c.1.2.1.4 0 .6l-.3.5c-.1.1-.2.3 0 .5.3.6.9 1.4 2 2 .3.2.5.1.6 0l.5-.6c.1-.1.3-.2.6-.1l1.5.7c.2.1.3.2.3.4v.5c0 .2 0 .4-.3.6-.4.2-1 .4-1.6.3-.7-.1-1.6-.4-2.8-1.4-1-.8-1.8-1.8-2.2-2.5-.4-.8-.5-1.5-.4-2.1.1-.4.3-.7.5-.9Z"></path></svg></span> Chat on WhatsApp
                </a>
                <a href="{{ route('site.contact') }}" class="fca-btn email">
                    <span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 6h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2Z"></path><path d="m22 8-10 6L2 8"></path></svg></span> Send a Message
                </a>
            </div>
        </div>
    </div>

    <div class="footer-trust">
        <div class="ft-inner">
            <div class="ft-stat">
                <div class="ft-stat-num"><span class="counter" data-target="200">0</span>+</div>
                <div class="ft-stat-label">Projects Delivered</div>
            </div>
            <div class="ft-stat">
                <div class="ft-stat-num"><span class="counter" data-target="8">0</span><span>+ yrs</span></div>
                <div class="ft-stat-label">In Business</div>
            </div>
            <div class="ft-stat">
                <div class="ft-stat-num"><span style="color:var(--gold)">99</span>%</div>
                <div class="ft-stat-label">Client Retention</div>
            </div>
            <div class="ft-stat">
                <div class="ft-stat-num"><span class="counter" data-target="4">0</span></div>
                <div class="ft-stat-label">Countries Served</div>
            </div>
            <div class="ft-badges">
                <div class="ft-badge"><span class="ftb-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 11V8a5 5 0 0 1 10 0v3"></path><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M12 15v2"></path></svg></span><span>SSL / TLS Secured</span></div>
                <div class="ft-badge"><span class="ftb-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 3 2.6 5.3 5.9.8-4.2 4.1 1 5.8L12 16.8 6.7 19l1-5.8L3.5 9.1l5.9-.8Z"></path></svg></span><span>100% In-house Team</span></div>
                <div class="ft-badge"><span class="ftb-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z"></path></svg></span><span>24hr Response SLA</span></div>
                <div class="ft-badge"><span class="ftb-icon" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"></path></svg></span><span>30-day Quality Guarantee</span></div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="fb-inner">
            <div class="fb-left">
                <span class="fb-copy">© 2018–2026 i2Medier Konceptz. All rights reserved.</span>
            </div>
            <div class="fb-right">
        
                <div class="fb-payments">
                    <span class="fb-pay-label">We accept</span>
                    <span class="fb-pay-badge">Paystack</span>
                    <span class="fb-pay-badge">Flutterwave</span>
                    <span class="fb-pay-badge">Bank Transfer</span>
                    <span class="fb-pay-badge">USD · GBP · NGN</span>
                </div>
                <div class="fb-security">
                    <span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M7 11V8a5 5 0 0 1 10 0v3"></path><rect x="5" y="11" width="14" height="10" rx="2"></rect><path d="M12 15v2"></path></svg></span>
                    <span>Secure · Encrypted · GDPR Compliant</span>
                </div>
            </div>
        </div>
    </div>
</footer>

<button class="back-to-top" id="back-to-top" type="button" aria-label="Back to top">↑</button>
