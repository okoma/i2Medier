@extends('public.layouts.app')

@section('title', 'Web Design for Fashion Brands | Fashion Website Design Nigeria | i2Medier')

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => url('/')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => route('site.services')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Web Design', 'item' => route('site.services.web-design')],
        ['@type' => 'ListItem', 'position' => 4, 'name' => 'Fashion Brand Web Design', 'item' => route('site.services.web-design.industry', ['industry' => 'fashion-brand-website-design'])],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
        ['@type' => 'Question', 'name' => 'Can you build a lookbook section that I can update myself when I launch a new collection?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — and this is one of the core features of every fashion website we build. We build the lookbook section using a custom CMS (WordPress with ACF Pro or Shopify\'s native content system) that allows you to create a new lookbook chapter for each season, upload editorial images, add collection narrative text, and link to product pages — all without touching code. The editorial layout and brand aesthetic are locked in by design; you simply add the content for each new season. Training on how to do this is included in every handover session.']],
        ['@type' => 'Question', 'name' => 'Should I use Shopify or WooCommerce for my fashion brand store?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Both platforms are excellent for fashion e-commerce and we build on both. Shopify is generally better if your primary market is international (UK, US, EU) and you need multi-currency selling, rapid inventory management, and integrated logistics. WooCommerce (on WordPress) is generally better if you want full control over the design, need deep integration with editorial content and a lookbook CMS, and your primary market is Nigeria (Paystack integration is seamless on both). We will recommend the right platform for your specific brand after the discovery session.']],
        ['@type' => 'Question', 'name' => 'Do I need professional photography before we can build the website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Ideally yes — fashion websites live and die on the quality of their photography, and we design with real brand imagery from the start wherever possible. However, if your next shoot is planned but not yet completed, we can design and build the website structure first with placeholder imagery and then populate it with the real photography on completion of the shoot. We can also advise on the photography brief — the shot types, aspect ratios, and lighting styles that will work best within the editorial design we are creating for the brand.']],
        ['@type' => 'Question', 'name' => 'How do you handle size guides and fitting information for a fashion store?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'We build size guide functionality as a standard feature of every fashion e-commerce project. This includes a dedicated size guide page with measurement tables (in centimetres and inches), per-garment fit notes, model measurement references where relevant, and a pop-up size guide accessible from any product page. We also build the CMS so that fit notes (true to size, runs small, etc.) and fabric composition details can be added per-product and updated at any time. Reducing purchase hesitation around fit is one of the highest-impact conversion improvements available to a fashion e-commerce brand.']],
        ['@type' => 'Question', 'name' => 'Can you build a press room with downloadable media kits and lookbooks?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes. The press room is a standard inclusion in our Growth and Enterprise packages. It includes a CMS-managed space for uploading downloadable media kits (PDF), hi-resolution image packs, brand biography text, press contact details, and a log of editorial credits (magazine features, celebrity placements, etc.). Press journalists can self-serve all the information they need, which significantly increases the likelihood of a feature being published. We build the press room so you can add new features, update the media kit for each new season, and manage credits without any developer involvement.']],
        ['@type' => 'Question', 'name' => 'Can you add a wholesale portal for buyers and stockist applications?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'Yes — wholesale portals are available as part of our Enterprise package or as an add-on to the Growth package. A basic wholesale portal includes a stockist application form, a password-protected wholesale catalogue with trade pricing, and a wholesale order form with minimum order quantity enforcement. A full wholesale portal can include buyer account management, order tracking, seasonal line sheets, and integration with your inventory management system. We scope the wholesale functionality in detail during discovery and quote accordingly.']],
        ['@type' => 'Question', 'name' => 'How long does it take to build a fashion brand website?', 'acceptedAnswer' => ['@type' => 'Answer', 'text' => 'A standard fashion brand website with lookbook, store, press room, and blog typically takes 3–5 weeks from design approval to launch. Larger projects with wholesale portals, multi-region store configuration, or complex editorial CMS requirements may take 5–8 weeks. The timeline is always confirmed in writing at the start of the project with a milestone schedule — so you know exactly when each deliverable is due and when the site will be live. The photography turnaround is usually the main variable; if your editorial imagery is ready at the start of the project, we can move at maximum pace.']],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
</script>
@endpush

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/fashion-brand-web-design.css')
@endpush

@section('content')
<!-- ═══ HERO ═══ -->
<header class="hero">
  <div class="hero-glow" aria-hidden="true"></div>
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-left">
    <div class="hero-breadcrumb" aria-label="Breadcrumb" role="navigation">
      <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services') }}">Services</a><span class="breadcrumb-sep">›</span>
      <a href="{{ route('site.services.web-design') }}">Web Design</a><span class="breadcrumb-sep">›</span>
      <span aria-current="page">Web Design for Fashion Brands</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Fashion Brand Website Design</span>
    <h1>Fashion websites as bold as your<br><em>brand identity</em></h1>
    <p class="hero-sub">We build premium fashion brand websites that translate your visual identity into an editorial digital experience — full-screen lookbooks, first-party stores, brand storytelling, and fashion SEO that positions your label at the top of the market. For brands in Lagos, Abuja, London, and beyond.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Fashion Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Editorial-first design — never template-driven</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></span> Lookbook &amp; store integration</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria &amp; UK specialists</span>
    </div>
  </div>

  <!-- Fashion website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
        <div>
          <div class="float-notif-text">New order · The Harmattan Dress · Size M</div>
          <div class="float-notif-sub">London · just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">noirlgos.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">NOIR <span>Lagos</span></div>
            <div class="msn-links">
              <span class="msn-link">Collections</span>
              <span class="msn-link">Lookbook</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Stockists</span>
              <span class="msn-link">Press</span>
              <span class="msn-cta">Shop</span>
            </div>
          </div>
          <!-- Site hero — full-screen editorial -->
          <div class="mock-site-hero">
            <div class="msh-label">New Collection — 2026</div>
            <div class="msh-h1">The Harmattan<br><span>Collection 2026</span></div>
            <div class="msh-sub">Sculpted silhouettes for the Lagos woman who moves between worlds — Lekki to London — without compromise.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Shop the Collection</span>
              <span class="msh-btn-s">View Lookbook →</span>
            </div>
          </div>
          <!-- Collection grid -->
          <div class="mock-site-services">
            <div class="mss-label">The Collection</div>
            <div class="mss-grid">
              <div class="mss-card">
                <div class="mss-ico fashion-swatch" style="background:var(--fashion-dk)"></div>
                <div class="mss-name">Harmattan Dress<br><span class="mss-price">₦85,000</span></div>
              </div>
              <div class="mss-card">
                <div class="mss-ico fashion-swatch" style="background:#2a2a2a"></div>
                <div class="mss-name">Agbada Blazer<br><span class="mss-price">₦120,000</span></div>
              </div>
              <div class="mss-card">
                <div class="mss-ico fashion-swatch" style="background:#1c1c1c"></div>
                <div class="mss-name">Lagos Trench<br><span class="mss-price">₦95,000</span></div>
              </div>
              <div class="mss-card">
                <div class="mss-ico fashion-swatch" style="background:#111111"></div>
                <div class="mss-name">Eko Wrap Skirt<br><span class="mss-price">₦62,000</span></div>
              </div>
              <div class="mss-card">
                <div class="mss-ico fashion-swatch" style="background:#0d0d0d"></div>
                <div class="mss-name">VI Coord Set<br><span class="mss-price">₦145,000</span></div>
              </div>
              <div class="mss-card">
                <div class="mss-ico fashion-swatch" style="background:#222222"></div>
                <div class="mss-name">Island Coat<br><span class="mss-price">₦175,000</span></div>
              </div>
            </div>
          </div>
          <!-- Brand story + trust bar -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num" style="font-size:.52rem;letter-spacing:.04em;font-family:var(--sans);color:rgba(255,255,255,.55)">Crafted in Lagos.</div><div class="mst-lbl" style="color:var(--gold)">Worn Worldwide.</div></div>
            <div class="mst-item"><div class="mst-num">Vogue<span style="font-size:.45rem;font-family:var(--sans)"> NGA</span></div><div class="mst-lbl">Featured In</div></div>
            <div class="mst-item"><div class="mst-num">15<span>+</span></div><div class="mst-lbl">Countries</div></div>
            <div class="mst-item"><div class="mst-num">Est.<span style="font-size:.45rem"> 2018</span></div><div class="mst-lbl">Handcrafted</div></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "fashion brand Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Ready-to-Wear Fashion Labels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Luxury &amp; Couture Designers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Streetwear &amp; Urban Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> African &amp; Ankara Fashion Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Accessories &amp; Jewellery Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Swimwear &amp; Activewear Labels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bridal &amp; Occasion Wear</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Menswear Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Children's Fashion Labels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Sustainable Fashion Brands</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Ready-to-Wear Fashion Labels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Luxury &amp; Couture Designers</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Streetwear &amp; Urban Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> African &amp; Ankara Fashion Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Accessories &amp; Jewellery Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Swimwear &amp; Activewear Labels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Bridal &amp; Occasion Wear</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Menswear Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Children's Fashion Labels</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Sustainable Fashion Brands</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most fashion brand<br>websites <em>cost you sales</em></h2>
    </div>
    <p>A fashion brand's website is its most powerful brand asset — or its biggest liability. Buyers, press, and stockists will visit your website before they ever call or DM. If the experience does not match the calibre of your creative work, you lose them before you have a chance to sell. These are the six problems costing Nigerian fashion brands real money every day — and what we do about each one.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M2 13.5V19a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-5.5"/><path d="M2 10.5V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5.5"/><path d="M12 12v2"/><path d="M8 12h8"/></svg></span>
      <h3 class="prob-title">Brand identity is stunning on Instagram but the website looks generic</h3>
      <p class="prob-desc">Your visual world — the fonts, colours, photography style, editorial aesthetic — is fully realised on social media but the website is a generic theme that could belong to any brand. Buyers and press sense the disconnect immediately and it undermines confidence in the brand's premium positioning.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Custom design that extends the brand's visual identity from social media into a full editorial web experience — with the same fonts, colours, photographic style, and mood that define your label everywhere else.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></span>
      <h3 class="prob-title">No lookbook — editorial shoots exist but have no permanent home online</h3>
      <p class="prob-desc">You invest in expensive editorial photography and styled shoots, but they live in Instagram stories and disappear in 24 hours, or get buried in a feed. There is no lasting editorial presentation that press, buyers, and potential stockists can reference — and Google has nothing to index from your creative output.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A full-screen, scroll-driven lookbook section that makes every collection feel like a magazine spread and gives Google substantial, indexable content for fashion discovery searches relevant to your brand's positioning.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></span>
      <h3 class="prob-title">Shop is on a third-party platform — losing brand equity with every sale</h3>
      <p class="prob-desc">Every time a customer buys through Jumia, Etsy, or an Instagram DM, you hand the brand relationship to another platform. You lose the customer data, the brand experience, and the trust that comes from owning the transaction. Third-party platforms also take a cut of every sale and can delist you without notice.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A first-party WooCommerce or Shopify store under the brand's own domain with Paystack integration, full inventory management, customer accounts, and a checkout experience designed to match the premium aesthetic of the brand.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">Not showing on Google when fashion buyers search for the brand's aesthetic</h3>
      <p class="prob-desc">When a buyer in Lagos searches "contemporary African fashion brand" or "luxury ready-to-wear Lagos", your brand does not appear — because there are no indexed collection pages, no lookbook articles, no editorial content for Google to rank. The brand's Instagram visibility does not translate into search visibility.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Collection pages, lookbook articles, and editorial blog content that rank for fashion discovery searches — structured to capture buyers at the moment they are searching for exactly what your brand offers, across Lagos, Abuja, and the UK diaspora market.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4 4h16v16H4z"/><path d="M8 4v16"/><path d="M16 4v16"/><path d="M4 8h16"/><path d="M4 16h16"/></svg></span>
      <h3 class="prob-title">No press or stockist page — editorial credibility exists but is not leveraged</h3>
      <p class="prob-desc">The brand has been featured in Vogue Nigeria, stocked in select boutiques, and worn by notable figures — but none of this is visible on the website. Press mentions are not displayed. Stockist locations are not listed. This editorial credibility, which cost significant time and relationship-building to earn, is doing no commercial work.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A dedicated press and media room with downloadable lookbooks, media kits, and editorial credits — plus a stockist directory that builds credibility with potential wholesale partners and supports serious B2B conversations.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M20 7H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></span>
      <h3 class="prob-title">Poor product page conversion — beautiful photography undermined by weak UX</h3>
      <p class="prob-desc">Customers arrive on a product page drawn in by the editorial imagery and then encounter no size guide, no fabric information, no care instructions, no styling context, and no customer reviews. The purchase hesitation that all online fashion buyers feel is not being addressed, and conversion rates suffer as a result.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Product pages built around the complete fashion buying experience — with size guides, detailed fabric and care information, styling tips, customer reviews, related pieces, and photography presentation that reduces hesitation at every stage of the decision.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your fashion<br>brand's website <em>needs</em></h2>
      <p>A high-performing fashion brand website is not a homepage and a shop. It is a complete editorial and commercial platform — a curated sequence of pages that tells the brand story, presents the collections, converts browsers into buyers, and gives press and wholesale buyers everything they need to make a decision.</p>
      <p>We map your collections, brand narrative, press credentials, stockist relationships, and e-commerce requirements into a comprehensive page architecture that works for Google, buyers, press, and end customers simultaneously.</p>
      <ul class="bullets">
        <li>Homepage with hero collection feature and brand statement</li>
        <li>Collections (per season, range, or aesthetic direction)</li>
        <li>Individual product pages with editorial imagery and full purchase context</li>
        <li>Lookbook section — full-screen, scroll-driven editorial experience</li>
        <li>Brand story &amp; Atelier page — the people, process, and vision behind the label</li>
        <li>Press &amp; media room — editorial credits, downloadable assets, media kits</li>
        <li>Stockist directory — where to find the brand in store, globally</li>
        <li>Shop — WooCommerce or Shopify with Paystack and inventory management</li>
        <li>Blog — style guides, behind-the-scenes, trend notes, and editorial content</li>
        <li>Contact &amp; wholesale enquiries — for buyers, press, and collaborations</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Fashion Website →</a>
    </div>

    <!-- Pages wireframe visual -->
    <div class="pages-visual reveal" aria-hidden="true">
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Homepage</span><span class="pch-badge key">Brand First</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Lookbook</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Collections</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Press Room</span><span class="pch-badge std">Trust Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Shop / Store</span><span class="pch-badge key">Revenue Engine</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Brand Blog</span><span class="pch-badge key">SEO Engine</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SERVICES WE INCLUDE ═══ -->
<section class="services-section" aria-labelledby="svc-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">What's Included</span>
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>fashion brands</em></h2>
    </div>
    <p>Every fashion brand website we build is designed around the specific presentation requirements, brand equity considerations, and conversion patterns of fashion labels — from Lagos Island boutiques to UK diaspora designer brands. These are not generic e-commerce features. They are fashion-specific elements built to support both brand building and commercial performance simultaneously.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></div>
      <h3 class="svc-title">Editorial Lookbook Design</h3>
      <p class="svc-desc">Full-screen, scroll-driven lookbook sections that present each collection as a magazine spread — immersive, on-brand, and fully optimised for Google indexing. Your editorial photography investments are given a permanent, premium home online that works for press, buyers, and SEO simultaneously. Every new season gets a dedicated lookbook chapter.</p>
      <div class="svc-tags"><span class="svc-tag">Full-Screen Scroll</span><span class="svc-tag">Editorial Layout</span><span class="svc-tag">CMS Managed</span><span class="svc-tag">SEO Indexed</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
      <h3 class="svc-title">Fashion E-Commerce Store</h3>
      <p class="svc-desc">A first-party WooCommerce or Shopify store under the brand's own domain — with Paystack integration for Nigerian buyers, full inventory and variant management, size guides, care information, customer accounts, and order tracking. The checkout experience is designed to match the brand's premium aesthetic, not a generic template. Your sales stay under your brand, not a marketplace.</p>
      <div class="svc-tags"><span class="svc-tag">WooCommerce</span><span class="svc-tag">Shopify</span><span class="svc-tag">Paystack</span><span class="svc-tag">Inventory CMS</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg></div>
      <h3 class="svc-title">Collection &amp; Product Pages</h3>
      <p class="svc-desc">Individual product pages built around the full fashion buying experience — with editorial-quality image galleries, detailed sizing and measurement guides, fabric composition and care instructions, styling suggestions, customer reviews, and related piece recommendations. Every element is designed to reduce purchase hesitation and increase average order value for fashion customers across Lagos, Abuja, and international markets.</p>
      <div class="svc-tags"><span class="svc-tag">Size Guides</span><span class="svc-tag">Fabric Details</span><span class="svc-tag">Photo Galleries</span><span class="svc-tag">Reviews</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 4h16v16H4z"/><path d="M8 4v16"/><path d="M4 8h16"/></svg></div>
      <h3 class="svc-title">Press Room &amp; Stockist Pages</h3>
      <p class="svc-desc">A dedicated press and media room with downloadable lookbooks, hi-resolution editorial images, brand biography, media kits, and a full history of editorial credits — formatted and ready for journalists and buyers. A global stockist directory listing every boutique, retailer, and multi-brand store where the label is available. These pages signal premium positioning to anyone evaluating the brand professionally.</p>
      <div class="svc-tags"><span class="svc-tag">Media Kit</span><span class="svc-tag">Press Credits</span><span class="svc-tag">Stockist Directory</span><span class="svc-tag">Downloads</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 0 6.5 22H20"/><path d="M5 2h13a2 2 0 0 1 2 2v18"/><path d="M8 7h8"/><path d="M8 11h8"/><path d="M8 15h5"/></svg></div>
      <h3 class="svc-title">Fashion Blog &amp; SEO Content</h3>
      <p class="svc-desc">A fully managed blog for publishing collection stories, styling guides, behind-the-scenes content, trend notes, and fashion editorial articles. Each post is an additional SEO entry point — building topical authority for fashion discovery searches and driving organic traffic from potential customers who find the brand through content before they find it through a product search. Designed for both domestic Nigerian and UK diaspora markets.</p>
      <div class="svc-tags"><span class="svc-tag">Collection Stories</span><span class="svc-tag">Style Guides</span><span class="svc-tag">Behind-the-Scenes</span><span class="svc-tag">Fashion SEO</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 1v4"/><path d="M12 19v4"/><path d="m4.22 4.22 2.83 2.83"/><path d="m16.95 16.95 2.83 2.83"/><path d="M1 12h4"/><path d="M19 12h4"/><path d="m4.22 19.78 2.83-2.83"/><path d="m16.95 7.05 2.83-2.83"/></svg></div>
      <h3 class="svc-title">Brand-Led Visual Identity in Web Design</h3>
      <p class="svc-desc">The typography, motion, colour, and spatial rhythm of the website are pulled directly from the brand's existing visual identity — or developed as an extension of it. No generic templates, no compromise. Bespoke CSS animations, editorial hover states, and scroll-based reveals that feel like the brand, not like a website. For fashion labels where the aesthetic IS the product, the website must be equally considered.</p>
      <div class="svc-tags"><span class="svc-tag">Custom Typography</span><span class="svc-tag">Brand Motion</span><span class="svc-tag">Editorial Colour</span><span class="svc-tag">Brand System</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">Fashion SEO</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when buyers are<br>searching for <em>your aesthetic</em></h2>
      <p>The most powerful moment in fashion brand discovery is when a buyer opens Google and searches for an aesthetic, a style, or a category. "Contemporary African fashion", "luxury ready-to-wear Lagos", "ankara fashion brand Nigeria" — these are high-intent searches from buyers who are ready to spend. If your brand is not on page one, those buyers will find your competitor instead.</p>
      <p>We build fashion websites that Google can read, index, and rank. Collection pages, lookbook articles, product pages with structured data, and an editorial blog create a search presence that compounds over time. Every shoot you do, every collection you release, and every style story you publish becomes an additional search entry point for new customers to discover the brand.</p>
      <ul class="bullets">
        <li>Collection pages individually optimised for fashion discovery searches</li>
        <li>Product schema markup (name, price, availability, brand) on every product page</li>
        <li>Lookbook articles that rank for editorial and aesthetic-based fashion searches</li>
        <li>Location pages targeting Lagos Island, Victoria Island, Lekki, Abuja, and UK markets</li>
        <li>Fashion blog content strategy targeting long-tail style discovery searches</li>
        <li>Google Shopping feed setup for WooCommerce and Shopify stores</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get a Fashion SEO Strategy →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Fashion Brand — Keyword Rankings (active SEO campaign)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">fashion brand lagos</span>
            <span class="kw-vol">6,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">clothing brand nigeria</span>
            <span class="kw-vol">4,800/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">african fashion designer</span>
            <span class="kw-vol">3,600/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">luxury fashion lagos</span>
            <span class="kw-vol">2,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">ankara fashion brand</span>
            <span class="kw-vol">3,200/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">streetwear brand nigeria</span>
            <span class="kw-vol">1,900/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">fashion designer abuja</span>
            <span class="kw-vol">2,100/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">bridal wear nigeria</span>
            <span class="kw-vol">2,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from an active fashion brand SEO campaign</div>
    </div>
  </div>
</section>

<!-- ═══ TRUST SIGNALS ═══ -->
<section class="trust-section" aria-labelledby="trust-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why i2Medier</span>
      <h2 class="s-head" id="trust-heading">Numbers that make<br>the <em>case for us</em></h2>
    </div>
    <p>We have built websites for fashion labels and product brands across Nigeria and the UK. These are the outcomes our clients consistently see when brand-led design meets technical execution.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="310">0</span><span>%</span></div>
      <div class="trust-label">Average increase in direct store sales (first-party) within 6 months of launching a brand-owned fashion e-commerce website</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="97">0</span></div>
      <div class="trust-label">Average Google PageSpeed score achieved on our custom-built fashion brand websites — no page builder bloat, no slow-loading galleries</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="6">0</span><span>×</span></div>
      <div class="trust-label">Increase in collection page engagement (time on page, scroll depth) compared to generic template-based fashion websites</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a fully launched fashion brand website — with a guaranteed, milestone-based delivery timeline</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Websites delivered for brands, agencies, and product businesses across Nigeria, the UK, the US, and Canada — all custom code</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery — every file, every database, every asset and credential transferred to the brand unconditionally at handover</div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Process</span>
      <h2 class="s-head" id="process-heading">From brand brief to live site<br>in <em>six structured steps</em></h2>
    </div>
    <p>Fashion brands have specific creative requirements that generic agency processes fail to account for. Our process is designed around editorial quality, brand fidelity, and the commercial realities of fashion e-commerce — refined across every fashion and product brand website we have delivered.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Brand Discovery &amp; Visual Audit</div>
      <p class="proc-desc">A structured brand discovery session covering your label's visual identity, creative direction, target customer, collections, press credentials, stockists, and commercial goals. We audit your existing brand assets — lookbooks, photography, social presence, and any existing website — and map a complete site architecture covering every page, every content type, and every keyword target. This document governs the entire project.</p>
      <div class="proc-tags"><span class="proc-tag">Brand Kickoff</span><span class="proc-tag">Visual Audit</span><span class="proc-tag">Sitemap</span><span class="proc-tag">Keyword Map</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Editorial Design — Brand-Led, Not Template-Driven</div>
      <p class="proc-desc">High-fidelity page designs in Figma — desktop and mobile — for all key pages. The design system is built from the brand's visual identity: typography, palette, spatial rhythm, motion language, and photography presentation are all dictated by the label's creative direction, not by a template. Two revision rounds are included. You approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build — Lookbook + Store + Blog</div>
      <p class="proc-desc">The website is built on a custom WordPress or Shopify foundation — no page builders. The lookbook section, product pages, and editorial blog are built as distinct, brand-specific systems. The e-commerce store (WooCommerce or Shopify) is configured with Paystack, inventory management, customer accounts, and size guides. A staging environment is accessible throughout so you can review and approve progress at any point.</p>
      <div class="proc-tags"><span class="proc-tag">Custom Build</span><span class="proc-tag">WooCommerce / Shopify</span><span class="proc-tag">Paystack</span><span class="proc-tag">Staging Access</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO &amp; Collection Content</div>
      <p class="proc-desc">All content is entered across every page, formatted correctly, and fully SEO-optimised — title tags, meta descriptions, heading hierarchy, product schema markup (name, price, availability, brand, image), canonical URLs, XML sitemap, and Google Search Console submission. Google Analytics 4 is installed with e-commerce tracking configured. Google Shopping feed is submitted if applicable.</p>
      <div class="proc-tags"><span class="proc-tag">Content Entry</span><span class="proc-tag">Product Schema</span><span class="proc-tag">GA4 + Ecommerce</span><span class="proc-tag">GSC Submission</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA &amp; Launch</div>
      <p class="proc-desc">Cross-browser and cross-device QA, PageSpeed audit (target 97+), form and checkout testing, editorial image optimisation, link verification, and a final review call before launch day. The domain is transferred to the new site, SSL is verified, and Cloudflare is configured for performance and security. You receive a CMS training session, a written admin guide, and a 30-day post-launch support window.</p>
      <div class="proc-tags"><span class="proc-tag">Full QA Pass</span><span class="proc-tag">Checkout Testing</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly Retainer — SEO, Content &amp; Store Growth</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps the brand growing online — publishing new collection stories and lookbook articles, building fashion SEO authority, monitoring Core Web Vitals, running daily backups, and delivering monthly keyword ranking and store performance reports. Fashion brands that invest in ongoing content see the strongest compound growth in organic search and direct sales between months 4 and 12.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Collection Content</span><span class="proc-tag">Store Optimisation</span><span class="proc-tag">Ranking Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Fashion websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each of these was designed from scratch — no templates, no page builders — built around the specific brand identity, collection structure, and commercial goals of each fashion label.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--fashion-dk) 0%,#1a1a1a 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem;letter-spacing:.08em">NOIR Lagos</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Contemporary Ready-to-Wear</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Lookbook</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Store</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Press Room</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Contemporary Ready-to-Wear</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Fashion Label · Lagos Island, Nigeria</div>
        <div class="port-title">NOIR Lagos</div>
        <p class="port-desc">Full editorial fashion website with seasonal lookbooks, a 60-piece WooCommerce store with Paystack, press room with Vogue Nigeria credits, and an SEO campaign that reached page one for "contemporary fashion brand Lagos" within 90 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a1a0e 0%,#152a1a 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem;letter-spacing:.04em">Afrique Couture</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Luxury African Fashion · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Couture</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Stockists</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Wholesale</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Luxury African Fashion</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Luxury Fashion Label · Abuja, Nigeria</div>
        <div class="port-title">Afrique Couture</div>
        <p class="port-desc">High-couture fashion website for an Abuja-based luxury label with a bridal and occasion wear focus — featuring a bespoke appointment booking system, stockist directory across 8 countries, and a wholesale enquiry portal for international buyers.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#1a1a2e 0%,#16213e 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem;letter-spacing:.06em">Street Canvas</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Streetwear &amp; Accessories · London + Lagos</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Streetwear</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Drops</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">UK + NG</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Streetwear · London + Lagos</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Streetwear Brand · London &amp; Lagos</div>
        <div class="port-title">Street Canvas</div>
        <p class="port-desc">Dual-market streetwear brand website for a Nigerian diaspora label operating in London and Lagos — with a limited-drop release system, UK and Nigerian Paystack/Stripe checkout, and a dual-currency store targeting both markets simultaneously.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
@include('site.partials.industry-package')


<!-- ═══ COMPARISON TABLE ═══ -->
<section class="compare-section" aria-labelledby="compare-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why Choose i2Medier</span>
      <h2 class="s-head" id="compare-heading">How we compare to<br><em>your other options</em></h2>
    </div>
    <p>Not all web design options deliver the editorial quality and brand fidelity that fashion labels require. Here is how we compare on the features that matter most for fashion brands.</p>
  </div>
  <div class="compare-wrap"><table class="compare-table reveal" role="table" aria-label="Web design comparison for fashion brands">
    <thead>
      <tr>
        <th>Feature</th>
        <th>DIY (Wix / Squarespace)</th>
        <th class="hl">i2Medier Custom Build</th>
        <th>Generic Freelancer</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="feature">Editorial lookbook section (brand-specific)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic gallery only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full editorial lookbook</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Press room &amp; media kit downloads</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely built</span></td>
      </tr>
      <tr>
        <td class="feature">Stockist directory page</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> No</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Built as standard</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Sometimes</span></td>
      </tr>
      <tr>
        <td class="feature">Fashion blog &amp; editorial SEO content</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full editorial blog</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely SEO-optimised</span></td>
      </tr>
      <tr>
        <td class="feature">Product schema markup (Google Shopping)</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Partial only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Complete, verified</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Brand-consistent design (no generic templates)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Template-locked</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Fully bespoke</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often a theme</span></td>
      </tr>
      <tr>
        <td class="feature">First-party store with Paystack (brand-owned)</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform fees always</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Fully brand-owned</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Varies by skill</span></td>
      </tr>
      <tr>
        <td class="feature">Post-launch support &amp; CMS training</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> No</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> 30–90 days standard</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Usually paid extra</span></td>
      </tr>
    </tbody>
  </table></div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What fashion brand founders say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"For the first time our website actually feels like our brand — not a template some other fashion brand is also using. The lookbook section is exactly what I envisioned. Within the first month of launch we had a London boutique reach out through the stockist enquiry form. That alone covered the entire project cost."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Adaeze Obi</div><div class="test-role">Creative Director · NOIR Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"I was selling almost entirely through Instagram DMs and taking payments by transfer. Moving everything to a proper website with Paystack checkout felt like a big step but it has completely changed how buyers perceive the brand. We now get wholesale enquiries from buyers who found us on Google — something I never expected."</p>
      <div class="test-author">
        <div class="test-avatar">K</div>
        <div><div class="test-name">Kemi Fashola</div><div class="test-role">Founder · Afrique Couture, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Running a streetwear brand between London and Lagos means we need a site that works for both markets and converts in both currencies. i2Medier built a dual-market store with GBP and NGN checkout that handles our limited drops without crashing. The brand aesthetic — dark, urban, editorial — is exactly what we asked for."</p>
      <div class="test-author">
        <div class="test-avatar">C</div>
        <div><div class="test-name">Chidi Nwosu</div><div class="test-role">Brand Manager · Street Canvas, London &amp; Lagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free fashion brand<br>website audit</h2>
    <p>See exactly what your current website is costing your brand in lost sales, press credibility, and wholesale conversations. No commitment required — just an honest assessment of what needs to change.</p>
  </div>
  <div class="cta2-right">
    <a href="#contact" class="btn-white-solid">Book a Free Audit →</a>
  </div>
</div>

<!-- ═══ LONG-FORM SEO CONTENT ═══ -->
<section class="content-section" aria-labelledby="content-heading">
  <div class="two-col-intro" style="margin-bottom:2rem">
    <div>
      <span class="s-label">The Full Picture</span>
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>fashion brand web design</em></h2>
    </div>
    <p>A comprehensive guide to building a fashion brand website that converts buyers, attracts press, supports wholesale relationships, and ranks on Google — written for Nigerian and UK fashion labels in 2026.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for fashion brands">

      <h2>Why Nigerian fashion brands need a brand-owned website in 2026</h2>
      <p>The Nigerian fashion industry has emerged as one of the most creatively significant on the continent. Brands from Lagos Island, Victoria Island, Lekki, and increasingly from Abuja are receiving international press coverage, stocking in boutiques across Europe and North America, and dressing talent that travels globally. But the infrastructure behind many of these brands — particularly the digital infrastructure — has not kept pace with the creative ambition.</p>
      <p>The single most significant gap is the absence of a brand-owned website. A first-party website is not a marketing tool. It is the commercial and reputational foundation on which everything else in the brand's digital life depends. It is where press come to evaluate credibility, where wholesale buyers confirm positioning, where customers make purchasing decisions, and where Google indexes the brand's work so that new audiences can discover it.</p>
      <p>Without it, every Instagram follower, every editorial feature, and every word-of-mouth recommendation leads to a digital dead end — or worse, to a generic third-party marketplace that strips the brand of the premium positioning it has worked to build. In 2026, for a fashion brand operating at any meaningful level of the market, a brand-owned website is not optional. It is the business.</p>

      <h2>The Instagram dependency problem for fashion businesses</h2>
      <p>Instagram has been extraordinarily powerful for Nigerian fashion brands. It provided a platform for editorial imagery, enabled direct sales through DMs, and gave emerging designers access to audiences that would previously have required a physical store or a magazine feature to reach. But dependence on Instagram as a primary business infrastructure has created a set of structural vulnerabilities that are becoming increasingly visible.</p>

      <h3>Algorithm dependency</h3>
      <p>Instagram's algorithm determines which content reaches an audience. Changes to that algorithm — which happen frequently and without notice — can cut the organic reach of a brand's content by 60 to 80 percent overnight. A business whose primary sales channel depends on algorithm-controlled reach is not a stable business. A brand-owned website provides a direct, algorithm-independent relationship with its audience.</p>

      <h3>No Google indexing from Instagram content</h3>
      <p>Instagram content is largely not indexed by Google. The editorial photographs, the collection launches, the styling content — none of it builds search presence. While a fashion label is investing in expensive shoots and creative production, none of that investment is creating discoverable, rankable assets online. A website with properly structured collection pages, lookbook articles, and editorial blog content turns every creative investment into a search asset.</p>

      <h3>No customer data ownership</h3>
      <p>When a customer buys through an Instagram DM or a third-party marketplace, the brand does not own the customer relationship. There is no email address, no purchase history, no ability to market directly to that person again. A first-party website with customer accounts and email capture gives the brand a list of verified buyers it can reach at zero additional cost — which is the most valuable marketing asset any consumer brand can own.</p>

      <h2>Lookbooks and editorial content as SEO and brand equity</h2>
      <p>The lookbook is fashion's most powerful content format — a curated, editorial presentation of a collection that communicates the brand's aesthetic, the season's narrative, and the products simultaneously. For most Nigerian fashion brands, lookbooks exist only on Instagram or as PDF files sent to press. This represents a significant missed opportunity on two fronts: brand equity and SEO.</p>
      <p>A dedicated, full-screen lookbook section on a brand's website does several things simultaneously. It gives editorial photography a permanent, premium home that can be shared with press, buyers, and potential stockists without sending an Instagram link. It provides substantial, structured content for Google to index — collection stories, campaign imagery, seasonal narratives — all of which can rank for fashion discovery searches that new customers use. And it allows the brand to archive multiple seasons of creative work in a way that builds the brand's editorial history online, which in turn builds credibility with press and buyers evaluating the label for the first time.</p>
      <p>A well-structured lookbook article — with seasonal narrative, editorial photography, and linked product pages — can rank for terms like "contemporary Nigerian fashion 2026", "African ready-to-wear designer", or "luxury fashion Lagos" and drive qualified organic traffic to the store. This is brand building and commercial investment simultaneously.</p>

      <h2>Fashion e-commerce: building a first-party store under your domain</h2>
      <p>The difference between selling through a third-party marketplace and owning a first-party store is not primarily financial — although the economics are dramatically different. The difference is strategic. Every sale made through Jumia, Etsy, or Instagram DMs is a sale made inside someone else's brand. The customer's relationship is with the platform, not with the label. The brand receives money, but not the customer.</p>
      <p>A first-party WooCommerce or Shopify store under the brand's own domain changes this entirely. Every transaction builds the brand's customer database. Every customer who creates an account becomes a direct marketing asset. Every order provides data about what sells, what sizes are most popular, what price points convert, and which campaigns drive the highest-value purchases. This data compounds over time into a strategic advantage that is impossible to build through third-party platforms.</p>
      <p>For Nigerian fashion brands, the practical setup involves Paystack integration for NGN transactions, with the option to add Stripe for UK and international GBP and USD sales. Inventory management, variant handling (size, colour, fabric), size guides, care information, and customer reviews are all configured as standard. The checkout experience is designed to match the brand's premium aesthetic — because for a fashion brand, the purchase experience is part of the brand experience, and it cannot be compromised by a generic marketplace checkout.</p>

      <h2>Press rooms and stockist pages: signalling premium positioning</h2>
      <p>One of the most consistent gaps in Nigerian fashion brand websites is the absence of infrastructure for professional B2B relationships. Press journalists evaluating a brand for a feature need downloadable hi-resolution images, a brand biography, a media kit, and a list of editorial credits. Wholesale buyers evaluating a label for stocking need to understand positioning, price points, minimum order quantities, and current stockist locations. Boutique owners deciding whether to carry a brand need evidence of press momentum and existing distribution quality.</p>
      <p>None of this can be communicated through an Instagram grid. A dedicated press room with downloadable media kits, a history of editorial credits, and a clear press contact pathway is the infrastructure that converts press interest into editorial features. A stockist directory with current stockist locations — including boutiques in Lagos, Abuja, London, Paris, and New York — signals that the brand is being stocked at a level that validates its premium positioning for any buyer evaluating it for the first time.</p>
      <p>These pages are not vanity additions. For a fashion brand operating at the level where press and wholesale relationships are part of the business model, they are operational infrastructure — and they belong on the website.</p>

      <h2>Pricing guide for fashion brand websites in Nigeria</h2>
      <p>Fashion brand website costs in Nigeria vary significantly based on the complexity of the store, the number of collections, and the range of features required. As a general guide for the Lagos and Abuja markets in 2026:</p>
      <ul>
        <li><strong>Essential brand site</strong> (homepage, up to 3 collections, shop of 30 products, basic lookbook, SEO): ₦500,000–₦750,000</li>
        <li><strong>Growth platform</strong> (full collections, unlimited products, lookbook CMS, press room, stockist directory, blog, newsletter): ₦1,000,000–₦1,800,000</li>
        <li><strong>Enterprise fashion platform</strong> (wholesale portal, multi-region store, AR integration, print-on-demand, custom editorial CMS): ₦2,000,000+</li>
      </ul>
      <p>The most important factor affecting return on investment is not the upfront cost — it is the quality of the brand execution and the strength of the SEO foundation. A ₦400,000 generic template site that fails to communicate brand positioning and ranks nowhere has a negative return. A ₦1,000,000 brand-led website that attracts wholesale buyers, converts editorial shoots into SEO traffic, and processes direct sales at full margin pays for itself inside a single season.</p>
      <p>For established Nigerian fashion labels with international ambitions, the website is among the most important single investments the brand will make in 2026. The brands that build this infrastructure now will be significantly ahead of those who continue to rely on third-party platforms and Instagram DMs as their primary commercial channels.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to get started?</h4>
        <p>Get a free fashion brand website audit and proposal for your label.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why most fashion websites lose sales</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your website needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">Fashion SEO</a></li>
          <li><a href="#process-heading" class="toc-link">Our process (6 steps)</a></li>
          <li><a href="#pricing" class="toc-link">Pricing</a></li>
          <li><a href="#faq-heading" class="toc-link">FAQ</a></li>
          <li><a href="#contact" class="toc-link">Get a free quote</a></li>
        </ul>
      </nav>
    </aside>

  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section aria-labelledby="faq-heading">
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">Questions about fashion brand<br><em>web design</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every fashion brand has different needs — from a solo designer to a multi-line label. Email us and we'll give you a direct, honest answer specific to your brand and budget.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">Can you build a lookbook section that I can update myself when I launch a new collection?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Yes — and this is one of the core features of every fashion website we build. We build the lookbook section using a custom CMS (WordPress with ACF Pro or Shopify's native content system) that allows you to create a new lookbook chapter for each season, upload editorial images, add collection narrative text, and link to product pages — all without touching code. The editorial layout and brand aesthetic are locked in by design; you simply add the content for each new season. Training on how to do this is included in every handover session.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Should I use Shopify or WooCommerce for my fashion brand store?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Both platforms are excellent for fashion e-commerce and we build on both. Shopify is generally better if your primary market is international (UK, US, EU) and you need multi-currency selling, rapid inventory management, and integrated logistics. WooCommerce (on WordPress) is generally better if you want full control over the design, need deep integration with editorial content and a lookbook CMS, and your primary market is Nigeria (Paystack integration is seamless on both). We will recommend the right platform for your specific brand after the discovery session — there is no one-size answer.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Do I need professional photography before we can build the website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Ideally yes — fashion websites live and die on the quality of their photography, and we design with real brand imagery from the start wherever possible. However, if your next shoot is planned but not yet completed, we can design and build the website structure first with placeholder imagery and then populate it with the real photography on completion of the shoot. We can also advise on the photography brief — the shot types, aspect ratios, and lighting styles that will work best within the editorial design we are creating for the brand.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do you handle size guides and fitting information for a fashion store?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">We build size guide functionality as a standard feature of every fashion e-commerce project. This includes a dedicated size guide page with measurement tables (in centimetres and inches), per-garment fit notes, model measurement references where relevant, and a pop-up size guide accessible from any product page. We also build the CMS so that fit notes (true to size, runs small, etc.) and fabric composition details can be added per-product and updated at any time. Reducing purchase hesitation around fit is one of the highest-impact conversions improvements available to a fashion e-commerce brand.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Can you build a press room with downloadable media kits and lookbooks?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes. The press room is a standard inclusion in our Growth and Enterprise packages. It includes a CMS-managed space for uploading downloadable media kits (PDF), hi-resolution image packs, brand biography text, press contact details, and a log of editorial credits (magazine features, celebrity placements, etc.). Press journalists can self-serve all the information they need, which significantly increases the likelihood of a feature being published without the additional back-and-forth that most fashion PR involves. We build the press room so you can add new features, update the media kit for each new season, and manage credits without any developer involvement.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Can you add a wholesale portal for buyers and stockist applications?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes — wholesale portals are available as part of our Enterprise package or as an add-on to the Growth package. A basic wholesale portal includes a stockist application form, a password-protected wholesale catalogue with trade pricing, and a wholesale order form with minimum order quantity enforcement. A full wholesale portal can include buyer account management, order tracking, seasonal line sheets, and integration with your inventory management system. We scope the wholesale functionality in detail during discovery and quote accordingly. This is particularly relevant for brands with established or growing international distribution.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">How long does it take to build a fashion brand website?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">A standard fashion brand website with lookbook, store, press room, and blog typically takes 3–5 weeks from design approval to launch. Larger projects with wholesale portals, multi-region store configuration, or complex editorial CMS requirements may take 5–8 weeks. The timeline is always confirmed in writing at the start of the project with a milestone schedule — so you know exactly when each deliverable is due and when the site will be live. The photography turnaround is usually the main variable; if your editorial imagery is ready at the start of the project, we can move at maximum pace.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build a fashion brand<br>website as bold as your work?</h2>
  <p>Get a free, no-obligation consultation and website proposal. We will audit your current digital presence, map your collection and SEO opportunities, and show you exactly what we would build — and why it would work for your brand.</p>
  <a href="{{ $startUrl }}" class="btn-dark">Get Your Free Proposal →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
