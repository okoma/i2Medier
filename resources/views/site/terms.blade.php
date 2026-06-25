@extends('public.layouts.app')

@section('title', 'Terms of Service — i2Medier')
@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Terms of Service', 'item' => route('site.terms')],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
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
        <span aria-current="page">Terms of Service</span>
      </nav>
      <span class="legal-label">Legal</span>
      <h1>Terms of <em>Service</em></h1>
      <div class="legal-meta">
        <span class="legal-meta-item"><strong>Last Updated:</strong> 1 June 2026</span>
        <span class="legal-meta-item"><strong>Effective:</strong> 1 June 2026</span>
        <span class="legal-meta-item"><strong>Governing Law:</strong> Federal Republic of Nigeria</span>
      </div>
    </div>
  </header>

  <!-- BODY -->
  <div class="legal-body">

    <!-- TOC -->
    <aside class="legal-toc" aria-label="Table of contents">
      <div class="legal-toc-title">Contents</div>
      <ul class="legal-toc-list">
        <li><a href="#agreement" class="legal-toc-link">1. The Agreement</a></li>
        <li><a href="#services" class="legal-toc-link">2. Services</a></li>
        <li><a href="#proposals" class="legal-toc-link">3. Proposals & Scope</a></li>
        <li><a href="#client-duties" class="legal-toc-link">4. Client Responsibilities</a></li>
        <li><a href="#payment" class="legal-toc-link">5. Fees & Payment</a></li>
        <li><a href="#timeline" class="legal-toc-link">6. Timelines & Delivery</a></li>
        <li><a href="#revisions" class="legal-toc-link">7. Revisions & Changes</a></li>
        <li><a href="#ip" class="legal-toc-link">8. Intellectual Property</a></li>
        <li><a href="#confidentiality" class="legal-toc-link">9. Confidentiality</a></li>
        <li><a href="#hosting" class="legal-toc-link">10. Hosting & Managed Services</a></li>
        <li><a href="#warranties" class="legal-toc-link">11. Warranties</a></li>
        <li><a href="#liability" class="legal-toc-link">12. Limitation of Liability</a></li>
        <li><a href="#termination" class="legal-toc-link">13. Termination</a></li>
        <li><a href="#governing-law" class="legal-toc-link">14. Governing Law</a></li>
        <li><a href="#contact" class="legal-toc-link">15. Contact</a></li>
      </ul>
      <div class="legal-contact-box">
        <p>Questions about these terms before signing? Email us first.</p>
        <a href="mailto:letstalk@i2medier.com" class="legal-contact-btn">letstalk@i2medier.com</a>
      </div>
    </aside>

    <!-- CONTENT -->
    <main class="legal-content">

      <p class="legal-intro">
        These Terms of Service ("Terms") govern the relationship between <strong>i2Medier Konceptz</strong> ("i2Medier", "we", "our", or "us") and any individual or organisation ("Client", "you") that engages our services or uses our website. By requesting a quote, signing a proposal, making a payment, or using any service we provide, you agree to be bound by these Terms. Please read them carefully before proceeding.
      </p>

      <section class="legal-section" id="agreement">
        <h2>1. The Agreement</h2>
        <p>These Terms, together with any signed proposal, project brief, statement of work, or service agreement, constitute the entire agreement between you and i2Medier for the delivery of digital services. In the event of a conflict between these Terms and a specific project agreement, the project agreement takes precedence for the matters it addresses.</p>
        <p>These Terms apply to all services offered by i2Medier including, but not limited to, website design and development, WordPress development, Laravel application development, mobile app development, UI/UX design, SEO, business email setup, cloud architecture, and managed website maintenance.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="services">
        <h2>2. Services</h2>
        <p>i2Medier provides digital design, development, and managed services to businesses and organisations. The specific services, deliverables, timelines, and pricing for each engagement are defined in a written proposal or statement of work, which forms part of the agreement between the parties once accepted by the Client.</p>
        <p>We reserve the right to decline any project that conflicts with our values, capacity, or professional judgement. Acceptance of a payment or signing of a proposal does not obligate us to continue a project if material misrepresentation about the project scope or business purpose is discovered after engagement begins.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="proposals">
        <h2>3. Proposals, Scope, and Changes</h2>
        <p>All project proposals are valid for <strong>14 days</strong> from the date of issue unless otherwise stated. A proposal becomes a binding agreement when accepted in writing (by email or electronic signature) and the agreed deposit is received.</p>

        <h3>Scope of work</h3>
        <p>The scope of work is defined in the accepted proposal or statement of work. Any features, pages, integrations, or deliverables not explicitly listed in the proposal are out of scope and will be quoted separately if requested.</p>

        <h3>Scope changes</h3>
        <p>Any change to the agreed scope — including additions, removals, or material modifications to requirements — must be requested in writing and will be assessed for impact on cost and timeline. i2Medier will issue a change order outlining the revised scope, additional fees (if any), and updated timeline. Work on the change will not begin until the change order is approved in writing by the Client.</p>

        <div class="legal-highlight">
          <strong>Important:</strong> Verbal agreements, messages in informal channels, or informal requests made directly to a designer or developer do not constitute scope changes. All scope changes must be formally agreed in writing.
        </div>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="client-duties">
        <h2>4. Client Responsibilities</h2>
        <p>The successful delivery of any project depends on the Client's active participation. The Client agrees to:</p>
        <ul>
          <li><strong>Provide accurate information</strong> — supply complete, accurate, and timely information, content, assets, and access required for the project, including brand guidelines, copy, images, domain access, and third-party credentials.</li>
          <li><strong>Review and approve promptly</strong> — respond to design reviews, content reviews, and approval requests within the agreed timeframe (typically 5 business days unless otherwise specified). Delays caused by late approvals may affect delivery timelines and are not the responsibility of i2Medier.</li>
          <li><strong>Designate a point of contact</strong> — assign a single authorised representative with the authority to make project decisions and approvals on behalf of the Client's organisation.</li>
          <li><strong>Content legality</strong> — ensure that all content, images, logos, trademarks, and business claims provided to i2Medier are lawfully owned or licensed, accurate, and not in violation of any third-party rights. The Client indemnifies i2Medier against any claim arising from content provided by the Client.</li>
          <li><strong>Maintain access credentials</strong> — safeguard any login credentials, API keys, or access tokens provided during or after the project. Notify i2Medier immediately of any suspected unauthorised access.</li>
          <li><strong>Payment obligations</strong> — make all payments on time as specified in Section 5.</li>
        </ul>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="payment">
        <h2>5. Fees and Payment</h2>

        <h3>Payment structure</h3>
        <p>Unless otherwise specified in the project agreement, all projects are invoiced on the following schedule:</p>
        <ul>
          <li><strong>50% deposit</strong> — due before project work commences. No work will begin until the deposit is received and cleared.</li>
          <li><strong>50% balance</strong> — due before the final deliverable, website launch, or handover of project files, whichever occurs first.</li>
        </ul>
        <p>For larger projects, milestone-based payment schedules may be agreed in the proposal.</p>

        <h3>Payment methods</h3>
        <p>Payments are accepted via bank transfer, Paystack (card and bank), or Stripe for international clients. Invoice details and payment links are provided with each invoice. i2Medier does not accept cash payments.</p>

        <h3>Late payment</h3>
        <p>Invoices are due within <strong>7 calendar days</strong> of issue unless otherwise agreed. Invoices unpaid after 14 days may attract a late payment charge of 2% per month on the outstanding balance. i2Medier reserves the right to suspend work on the project until outstanding invoices are settled.</p>

        <h3>Recurring services</h3>
        <p>For ongoing managed services (hosting, maintenance retainers, SEO retainers), invoices are issued monthly or annually as agreed. Failure to pay within 14 days of the due date may result in temporary suspension of the managed service. Persistent non-payment may result in termination of the service as described in Section 13.</p>

        <h3>Refunds</h3>
        <p>Deposits are non-refundable once project work has commenced. Where a project is cancelled before commencement, the deposit may be refunded at i2Medier's discretion, minus any administrative or preparatory costs already incurred. Completed milestones are non-refundable. Disputes must be raised in writing within 14 days of the relevant invoice or deliverable.</p>

        <h3>Currency</h3>
        <p>Invoices to Nigerian clients are issued in Nigerian Naira (NGN). International clients are invoiced in United States Dollars (USD) or British Pounds Sterling (GBP) as agreed. Foreign exchange risk is borne by the Client in all cases.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="timeline">
        <h2>6. Timelines and Delivery</h2>
        <p>Project timelines are estimated in the proposal and begin from the date the deposit is received and all required project information is supplied by the Client. Timelines are subject to the following conditions:</p>
        <ul>
          <li>The Client provides content, assets, and approvals within agreed timeframes.</li>
          <li>No material scope changes are introduced after the project begins.</li>
          <li>Third-party services (domain registrars, hosting providers, payment gateways, APIs) perform within normal operating parameters.</li>
        </ul>
        <p>i2Medier will notify the Client promptly if a delay is anticipated and will provide a revised timeline. We are not liable for delays directly caused by Client inaction, late content delivery, or third-party service outages beyond our control.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="revisions">
        <h2>7. Revisions and Design Amendments</h2>
        <p>Each project phase includes a specified number of revision rounds as stated in the proposal (typically two rounds per major design phase). A revision round covers reasonable adjustments to approved designs — it does not constitute a redesign or a change in creative direction.</p>
        <p>Revisions beyond the included rounds, or revisions that constitute a change in scope or concept, will be assessed and quoted as additional work. Clients are encouraged to consolidate all feedback into a single revision request per round rather than submitting feedback incrementally.</p>
        <p>Once a design or deliverable has been approved in writing, work proceeds on the basis of that approval. Requests to revise approved work may incur additional charges if they require significant rework.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="ip">
        <h2>8. Intellectual Property</h2>

        <h3>Client-owned assets</h3>
        <p>All content, logos, trademarks, photographs, and other intellectual property supplied by the Client remain the property of the Client. The Client grants i2Medier a non-exclusive licence to use these assets solely for the purposes of the project.</p>

        <h3>Deliverables</h3>
        <p>Upon receipt of full and final payment, i2Medier assigns to the Client all intellectual property rights in the custom deliverables created specifically for that project — including custom code, design files, and content created by i2Medier. This assignment is conditional upon full payment being received.</p>

        <h3>Third-party components</h3>
        <p>Where deliverables incorporate third-party software, plugins, libraries, fonts, stock imagery, or other licensed components, those components remain subject to their respective licences. i2Medier will identify material third-party components in the project handover documentation. The Client is responsible for maintaining any required licences after handover.</p>

        <h3>i2Medier IP and portfolio rights</h3>
        <p>i2Medier retains ownership of all pre-existing intellectual property, frameworks, methodologies, and general-purpose code libraries used in or developed during the project that are not custom-created exclusively for the Client. i2Medier retains the right to display the completed project in our portfolio and marketing materials unless the Client requests otherwise in writing before project completion.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="confidentiality">
        <h2>9. Confidentiality</h2>
        <p>Both parties agree to treat as confidential any proprietary information, business plans, technical specifications, financial data, client lists, or other sensitive information disclosed during the course of the engagement that is identified as confidential or that a reasonable person would understand to be confidential.</p>
        <p>Confidential information shall not be disclosed to any third party without prior written consent, except to subcontractors who require the information to perform agreed services (subject to equivalent confidentiality obligations) or where disclosure is required by law or legal process.</p>
        <p>These confidentiality obligations survive the termination of the project or agreement for a period of <strong>three (3) years</strong>.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="hosting">
        <h2>10. Hosting, Managed Services, and Third-Party Platforms</h2>

        <h3>Hosting and infrastructure</h3>
        <p>Where i2Medier manages hosting on behalf of the Client, we use reputable infrastructure providers (such as DigitalOcean, AWS, or Cloudflare). Uptime is subject to the service level agreements of those providers. i2Medier is not liable for downtime caused by infrastructure providers, DDoS attacks, or force majeure events.</p>

        <h3>Managed service obligations</h3>
        <p>Under a managed service agreement, i2Medier will perform the maintenance, updates, backups, and monitoring tasks specified in the service schedule. Managed services do not include new feature development, redesign, or work outside the agreed scope without an additional order.</p>

        <h3>Client-managed hosting</h3>
        <p>Where the Client manages their own hosting, i2Medier is not responsible for server configuration, uptime, security, or performance issues originating from the hosting environment after project handover.</p>

        <h3>Third-party platforms</h3>
        <p>We are not responsible for changes, downtime, policy updates, or discontinuation of third-party platforms (including but not limited to WordPress, Shopify, Paystack, Stripe, Google services, or social media platforms) that may affect the functionality of a delivered project.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="warranties">
        <h2>11. Warranties and Representations</h2>
        <p>i2Medier warrants that:</p>
        <ul>
          <li>Services will be performed with reasonable skill, care, and professionalism.</li>
          <li>Deliverables will substantially conform to the agreed specification at the time of handover.</li>
          <li>We have the right to enter into this agreement and perform the services described.</li>
        </ul>
        <p>The Client warrants that:</p>
        <ul>
          <li>They have the authority to enter into this agreement on behalf of their organisation.</li>
          <li>All content and materials provided to i2Medier are lawfully owned or licensed.</li>
          <li>The business purpose described is accurate and lawful.</li>
        </ul>
        <p>Except as expressly stated above, all services are provided "as is" and i2Medier makes no representations or warranties, express or implied, including warranties of merchantability, fitness for a particular purpose, or uninterrupted operation. We do not warrant that websites will rank in specific positions on search engines, achieve particular conversion rates, or generate specific business outcomes.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="liability">
        <h2>12. Limitation of Liability</h2>
        <p>To the fullest extent permitted by applicable law, i2Medier's aggregate liability to the Client for any claim arising out of or in connection with these Terms or the services provided — whether in contract, tort (including negligence), or otherwise — shall not exceed the total fees paid by the Client to i2Medier in the three (3) months immediately preceding the event giving rise to the claim.</p>
        <p>In no event shall i2Medier be liable for:</p>
        <ul>
          <li>Loss of profits, revenue, business, contracts, or anticipated savings</li>
          <li>Loss or corruption of data</li>
          <li>Loss of goodwill or reputation</li>
          <li>Indirect, consequential, special, or incidental damages</li>
          <li>Business interruption or loss of opportunity</li>
        </ul>
        <p>even if i2Medier has been advised of the possibility of such losses.</p>
        <p>Nothing in these Terms limits liability for death or personal injury caused by negligence, fraud, or any other liability that cannot be excluded by law.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="termination">
        <h2>13. Termination</h2>

        <h3>Termination by the Client</h3>
        <p>The Client may terminate a project by providing written notice to i2Medier. In the event of Client-initiated termination, the Client is liable for all work completed to the date of termination. Deposits are non-refundable. Any completed milestone payments are non-refundable. i2Medier will issue a final invoice for work completed beyond the deposit that has not yet been invoiced.</p>

        <h3>Termination by i2Medier</h3>
        <p>i2Medier may terminate or suspend services with written notice if:</p>
        <ul>
          <li>An invoice remains unpaid for more than 30 days after the due date.</li>
          <li>The Client engages in abusive, threatening, or unlawful conduct toward i2Medier personnel.</li>
          <li>The Client requests work that violates applicable law or our professional standards.</li>
          <li>The project becomes materially undeliverable due to sustained Client non-engagement.</li>
        </ul>
        <p>In the event of i2Medier-initiated termination for the above reasons, any fees paid for incomplete work will not be refunded.</p>

        <h3>Effect of termination</h3>
        <p>Upon termination: (a) all access credentials and project files in i2Medier's possession related to the Client's project will be provided to the Client or deleted within 30 days, at the Client's election; (b) any licence granted to the Client for deliverables is contingent on full payment having been received; (c) confidentiality obligations survive termination as specified in Section 9.</p>

        <h3>Managed service termination</h3>
        <p>Managed service agreements may be cancelled with <strong>30 days' written notice</strong> by either party. Cancellation does not entitle the Client to a refund of fees already paid for the current billing period. i2Medier will assist with a reasonable transition period to an alternative provider.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="governing-law">
        <h2>14. Governing Law and Dispute Resolution</h2>
        <p>These Terms are governed by and construed in accordance with the laws of the <strong>Federal Republic of Nigeria</strong>. Both parties submit to the non-exclusive jurisdiction of the Nigerian courts.</p>
        <p>In the event of a dispute, both parties agree to first attempt resolution through good-faith negotiation. If a dispute cannot be resolved within 30 days of written notice, either party may refer the matter to mediation before initiating formal legal proceedings. Costs of mediation are shared equally unless otherwise agreed.</p>
        <p>Nothing in this clause prevents either party from seeking urgent injunctive or other equitable relief from a court of competent jurisdiction.</p>
      </section>

      <hr class="legal-divider">

      <section class="legal-section" id="contact">
        <h2>15. Contact and Notices</h2>
        <p>All formal notices under these Terms must be in writing and delivered by email to the addresses confirmed at the start of the engagement. Notices to i2Medier should be addressed to:</p>
        <div class="legal-highlight">
          <strong>i2Medier Konceptz</strong><br>
          Email: <a href="mailto:letstalk@i2medier.com">letstalk@i2medier.com</a><br>
          Website: <a href="{{ url('/') }}">i2medier.com</a><br>
          Country of operation: Federal Republic of Nigeria
        </div>
        <p>These Terms were last updated on 1 June 2026. We may update these Terms from time to time. Continued use of our services after updated Terms are published constitutes acceptance of the revised Terms.</p>
      </section>

    </main>
  </div>

  <!-- CTA -->
  <section class="legal-cta">
    <h2>Ready to start a project?</h2>
    <p>Our terms are written to be fair and transparent. If you have questions before signing, email us — we are happy to walk through anything that is unclear.</p>
    <div class="legal-cta-btns">
      <a href="{{ route('site.start') }}" class="btn-black">Start Your Project →</a>
      <a href="{{ route('site.privacy') }}" class="btn-outline-dark">Read Our Privacy Policy</a>
    </div>
  </section>

</div>
@endsection
