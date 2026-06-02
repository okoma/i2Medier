@extends('public.layouts.app')

@section('title', 'Privacy Policy — i2Medier')

@push('meta')
<meta name="description" content="i2Medier's Privacy Policy. Learn how we collect, use, protect, and handle your personal data when you use our website or engage our digital services."/>
<meta name="robots" content="index, follow"/>
<link rel="canonical" href="{{ url('/privacy') }}"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="{{ url('/privacy') }}"/>
<meta property="og:title" content="Privacy Policy — i2Medier"/>
<meta property="og:description" content="How i2Medier collects, uses, and protects your personal data."/>
<meta property="og:site_name" content="i2Medier"/>
@endpush

@push('page_css')
    <link rel="stylesheet" href="{{ asset('legal.css') }}">
@endpush

@section('content')
<div class="legal-page">

  <!-- HERO -->
  <header class="legal-hero">
    <div class="legal-hero-glow" aria-hidden="true"></div>
    <div class="legal-hero-grid" aria-hidden="true"></div>
    <div class="legal-hero-inner">
      <nav class="legal-breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('site.home') }}">Home</a><span class="sep">›</span>
        <span aria-current="page">Privacy Policy</span>
      </nav>
      <span class="legal-label">Legal</span>
      <h1>Privacy <em>Policy</em></h1>
      <div class="legal-meta">
        <span class="legal-meta-item"><strong>Last Updated:</strong> 1 June 2026</span>
        <span class="legal-meta-item"><strong>Effective:</strong> 1 June 2026</span>
        <span class="legal-meta-item"><strong>Jurisdiction:</strong> Federal Republic of Nigeria</span>
      </div>
    </div>
  </header>

  <!-- BODY -->
  <div class="legal-body">

    <!-- TOC -->
    <aside class="legal-toc" aria-label="Table of contents">
      <div class="legal-toc-title">Contents</div>
      <ul class="legal-toc-list">
        <li><a href="#overview" class="legal-toc-link">1. Overview</a></li>
        <li><a href="#data-collected" class="legal-toc-link">2. Data We Collect</a></li>
        <li><a href="#how-we-use" class="legal-toc-link">3. How We Use Data</a></li>
        <li><a href="#legal-basis" class="legal-toc-link">4. Legal Basis</a></li>
        <li><a href="#data-sharing" class="legal-toc-link">5. Data Sharing</a></li>
        <li><a href="#cookies" class="legal-toc-link">6. Cookies</a></li>
        <li><a href="#retention" class="legal-toc-link">7. Data Retention</a></li>
        <li><a href="#your-rights" class="legal-toc-link">8. Your Rights</a></li>
        <li><a href="#security" class="legal-toc-link">9. Security</a></li>
        <li><a href="#third-parties" class="legal-toc-link">10. Third-Party Links</a></li>
        <li><a href="#children" class="legal-toc-link">11. Children's Privacy</a></li>
        <li><a href="#changes" class="legal-toc-link">12. Changes to This Policy</a></li>
        <li><a href="#contact" class="legal-toc-link">13. Contact Us</a></li>
      </ul>
      <div class="legal-contact-box">
        <p>Questions about how we handle your data? Email us directly.</p>
        <a href="mailto:hello@i2medier.com" class="legal-contact-btn">hello@i2medier.com</a>
      </div>
    </aside>

    <!-- CONTENT -->
    <main class="legal-content">

      <p class="legal-intro">
        i2Medier Konceptz ("i2Medier", "we", "our", or "us") is committed to protecting your personal information. This Privacy Policy explains what data we collect, why we collect it, how we use it, and the rights you have over your information when you visit our website at <a href="{{ url('/') }}">i2medier.com</a> or engage us to deliver digital services. Please read this policy carefully. By using our website or services, you agree to the practices described herein.
      </p>

      <section class="legal-section" id="overview">
        <h2>1. Overview</h2>
        <p>i2Medier Konceptz is a digital agency providing web design, web application development, mobile app development, SEO, UI/UX design, cloud architecture, and managed website services to businesses in Nigeria, the United Kingdom, and worldwide. This policy governs personal data we process both through our public website and in the course of delivering client engagements.</p>
        <p>We comply with the <strong>Nigeria Data Protection Act 2023 (NDPA)</strong> and, where applicable to data subjects in the European Economic Area, the <strong>General Data Protection Regulation (GDPR)</strong>. Where we act as a data processor on behalf of a client, we do so under the terms of a data processing agreement and the client's own privacy obligations apply to their end users.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="data-collected">
        <h2>2. Data We Collect</h2>
        <p>We collect information in the following ways:</p>

        <h3>Information you provide directly</h3>
        <ul>
          <li><strong>Enquiry and contact forms</strong> — name, email address, phone number, company name, project description, and any other details you voluntarily submit when contacting us or starting a project.</li>
          <li><strong>Client onboarding</strong> — business information, billing details, domain credentials, hosting access, and other technical data necessary to deliver the agreed scope of work.</li>
          <li><strong>Email correspondence</strong> — any personal information included in emails you send to us.</li>
          <li><strong>Client portal</strong> — account credentials, uploaded files, support tickets, and communication history within the client management platform.</li>
        </ul>

        <h3>Information collected automatically</h3>
        <ul>
          <li><strong>Analytics data</strong> — pages visited, time on site, referring URL, browser type, operating system, and approximate geographic region. We use Google Analytics 4 for this purpose.</li>
          <li><strong>Log data</strong> — IP address, request timestamps, server response codes, and error logs collected by our web infrastructure.</li>
          <li><strong>Cookies and similar technologies</strong> — see Section 6 for details.</li>
        </ul>

        <h3>Information from third parties</h3>
        <ul>
          <li><strong>Payment processors</strong> — when payments are made via Paystack or Stripe, we receive confirmation of payment status, transaction reference, and billing name. We do not store full card numbers.</li>
          <li><strong>Referrals</strong> — if a colleague or partner refers you to us, we may receive your name and contact details from that party.</li>
        </ul>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="how-we-use">
        <h2>3. How We Use Your Data</h2>
        <p>We use the personal data we collect for the following purposes:</p>
        <ul>
          <li><strong>Service delivery</strong> — to scope, design, build, launch, and maintain websites, applications, and digital systems on behalf of clients.</li>
          <li><strong>Communication</strong> — to respond to enquiries, provide project updates, send invoices, and manage ongoing client relationships.</li>
          <li><strong>Billing and financial administration</strong> — to issue invoices, process payments, and manage accounts receivable in accordance with Nigerian financial regulations.</li>
          <li><strong>Technical operations</strong> — to manage hosting environments, domain configurations, SSL certificates, server access, and deployment pipelines for client projects.</li>
          <li><strong>Security and fraud prevention</strong> — to monitor for unauthorised access, protect client data, and investigate security incidents.</li>
          <li><strong>Legal compliance</strong> — to meet obligations under Nigerian law, including tax requirements, record-keeping, and responding to lawful government requests.</li>
          <li><strong>Service improvement</strong> — to understand how our website and services are used and to improve the quality and relevance of what we offer.</li>
          <li><strong>Marketing (where consent is given)</strong> — to send newsletters, portfolio updates, or service announcements to subscribers who have explicitly opted in.</li>
        </ul>
        <div class="legal-highlight">
          <strong>We do not sell your personal data.</strong> We do not sell, rent, or trade your personal information to third parties for their marketing purposes under any circumstances.
        </div>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="legal-basis">
        <h2>4. Legal Basis for Processing</h2>
        <p>Under the Nigeria Data Protection Act 2023 and GDPR (where applicable), we process personal data on the following lawful bases:</p>
        <ul>
          <li><strong>Contract performance</strong> — processing necessary to enter into or fulfil a service agreement with you, including scoping work, delivering projects, and managing billing.</li>
          <li><strong>Legitimate interests</strong> — processing necessary for our legitimate business interests, including improving our services, preventing fraud, managing our systems, and communicating with prospective clients — provided these interests are not overridden by your rights.</li>
          <li><strong>Consent</strong> — for marketing communications and non-essential cookies, we rely on your freely given, specific, and informed consent, which you may withdraw at any time.</li>
          <li><strong>Legal obligation</strong> — where processing is required to comply with a legal or regulatory requirement applicable to i2Medier under Nigerian law.</li>
        </ul>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="data-sharing">
        <h2>5. Data Sharing and Disclosure</h2>
        <p>We share personal data only to the extent necessary to deliver our services or meet legal obligations. Specifically, we may share your data with:</p>
        <ul>
          <li><strong>Hosting and infrastructure providers</strong> — servers, CDN, and cloud services (e.g. DigitalOcean, AWS, Cloudflare) used to host and secure client websites and our own systems.</li>
          <li><strong>Payment processors</strong> — Paystack and Stripe process billing transactions. Each operates under their own privacy policy and applicable financial regulations.</li>
          <li><strong>Project subcontractors</strong> — on specific projects where specialist contributors are engaged, they receive only the minimum data necessary to complete their portion of the work, under confidentiality obligations.</li>
          <li><strong>Professional advisors</strong> — solicitors, accountants, and auditors, subject to professional confidentiality duties.</li>
          <li><strong>Regulatory or government authorities</strong> — where required by law, court order, or the lawful request of a Nigerian regulatory body.</li>
        </ul>
        <p>We do not share your personal data with any third party for their own marketing or commercial purposes.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="cookies">
        <h2>6. Cookies and Tracking Technologies</h2>
        <p>Our website uses cookies — small text files stored in your browser — to make the site function correctly and to help us understand how visitors use it.</p>

        <h3>Essential cookies</h3>
        <p>These are required for the website to function and cannot be disabled. They include session management, security tokens, and form submission state.</p>

        <h3>Analytics cookies</h3>
        <p>We use Google Analytics 4 to understand how visitors interact with our website — which pages they visit, how long they stay, and where they come from. This data is aggregated and anonymised. You can opt out by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener noreferrer">Google Analytics Opt-out Browser Add-on</a>.</p>

        <h3>Marketing cookies</h3>
        <p>We do not currently use advertising or retargeting cookies on this website.</p>

        <h3>Managing cookies</h3>
        <p>You can control cookies through your browser settings. Most browsers allow you to refuse new cookies, delete existing cookies, or be notified when a new cookie is set. Disabling essential cookies may affect site functionality.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="retention">
        <h2>7. Data Retention</h2>
        <p>We retain personal data only for as long as necessary to fulfil the purposes for which it was collected, or as required by applicable law:</p>
        <ul>
          <li><strong>Active client data</strong> — retained for the duration of the client relationship plus a period of five (5) years following the last engagement, in accordance with Nigerian tax and accounting regulations.</li>
          <li><strong>Project files and credentials</strong> — retained for the duration of the project and for the managed service term. On termination, credentials are returned or deleted as specified in the service agreement.</li>
          <li><strong>Enquiry and contact data</strong> — retained for up to two (2) years from the date of last contact if no engagement results, or until you request deletion.</li>
          <li><strong>Financial records</strong> — invoices, payment confirmations, and transaction records are retained for seven (7) years as required under Nigerian financial legislation.</li>
          <li><strong>Marketing contacts</strong> — retained until you unsubscribe or request deletion.</li>
        </ul>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="your-rights">
        <h2>8. Your Data Rights</h2>
        <p>Under the Nigeria Data Protection Act 2023 and, where applicable, the GDPR, you have the following rights regarding your personal data:</p>
        <ul>
          <li><strong>Right of access</strong> — you may request a copy of the personal data we hold about you.</li>
          <li><strong>Right to rectification</strong> — you may request that inaccurate or incomplete data be corrected.</li>
          <li><strong>Right to erasure</strong> — you may request deletion of your personal data where we have no lawful basis to continue processing it.</li>
          <li><strong>Right to restrict processing</strong> — you may request that we limit how we use your data in certain circumstances.</li>
          <li><strong>Right to data portability</strong> — you may request your data in a structured, machine-readable format where technically feasible.</li>
          <li><strong>Right to object</strong> — you may object to processing based on legitimate interests or for direct marketing purposes.</li>
          <li><strong>Right to withdraw consent</strong> — where processing is based on consent, you may withdraw it at any time without affecting the lawfulness of processing before withdrawal.</li>
        </ul>
        <p>To exercise any of these rights, email us at <a href="mailto:hello@i2medier.com">hello@i2medier.com</a> with your name and a description of your request. We will respond within 30 days. We may need to verify your identity before processing a request.</p>
        <p>If you are unsatisfied with our response, you have the right to lodge a complaint with the <strong>Nigeria Data Protection Commission (NDPC)</strong> at <a href="https://ndpc.gov.ng" target="_blank" rel="noopener noreferrer">ndpc.gov.ng</a>.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="security">
        <h2>9. Security</h2>
        <p>We implement appropriate technical and organisational measures to protect personal data against unauthorised access, accidental loss, destruction, or disclosure. These measures include:</p>
        <ul>
          <li>HTTPS encryption across all web properties</li>
          <li>Role-based access controls limiting data access to authorised personnel only</li>
          <li>Encrypted credential storage and secure vault practices for client access details</li>
          <li>Regular security updates to servers, software, and dependencies</li>
          <li>Strict confidentiality obligations for all team members and subcontractors</li>
        </ul>
        <p>While we take every reasonable precaution, no method of data transmission over the internet or electronic storage is completely secure. We cannot guarantee absolute security but commit to notifying affected parties promptly in the event of a confirmed data breach that poses a risk to individuals' rights.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="third-parties">
        <h2>10. Third-Party Links</h2>
        <p>Our website may contain links to third-party websites, tools, and resources. This Privacy Policy applies only to i2Medier's own website and services. We are not responsible for the privacy practices of any third-party sites and encourage you to review their privacy policies before submitting any personal information.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="children">
        <h2>11. Children's Privacy</h2>
        <p>Our website and services are directed at businesses and professionals. We do not knowingly collect or solicit personal data from individuals under the age of 18. If we become aware that we have inadvertently collected personal data from a minor, we will delete it promptly. If you believe we have collected data from a child, please contact us at <a href="mailto:hello@i2medier.com">hello@i2medier.com</a>.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="changes">
        <h2>12. Changes to This Policy</h2>
        <p>We may update this Privacy Policy from time to time to reflect changes in our practices, legal requirements, or service offerings. When we make material changes, we will update the "Last Updated" date at the top of this page. We encourage you to review this policy periodically. Continued use of our website or services after changes are posted constitutes your acceptance of the updated policy.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="contact">
        <h2>13. Contact Us</h2>
        <p>If you have questions, concerns, or requests relating to this Privacy Policy or the handling of your personal data, please contact us:</p>
        <div class="legal-highlight">
          <strong>i2Medier Konceptz</strong><br>
          Email: <a href="mailto:hello@i2medier.com">hello@i2medier.com</a><br>
          Website: <a href="{{ url('/') }}">i2medier.com</a><br>
          Country of operation: Federal Republic of Nigeria
        </div>
        <p>We aim to respond to all privacy-related enquiries within 10 business days.</p>
      </section>

    </main>
  </div>

  <!-- CTA -->
  <section class="legal-cta">
    <h2>Have questions about your data?</h2>
    <p>Reach out directly and we will respond clearly and promptly — no legal jargon, no runaround.</p>
    <div class="legal-cta-btns">
      <a href="mailto:hello@i2medier.com" class="btn-black">Email Us →</a>
      <a href="{{ route('site.terms') }}" class="btn-outline-dark">Read Our Terms of Service</a>
    </div>
  </section>

</div>
@endsection
