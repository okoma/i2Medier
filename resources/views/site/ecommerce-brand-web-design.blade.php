@extends('public.layouts.app')

@section('title', 'Web Design for Ecommerce Brands | Online Store Design Nigeria | i2Medier')

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush

@push('page_css')
    @vite('resources/css/public/pages/ecommerce-brand-web-design.css')
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
      <span aria-current="page">Web Design for Ecommerce Brands</span>
    </div>
    <span class="hero-tag"><span class="hero-dot"></span> Ecommerce Website Design</span>
    <h1>Online stores built to<br><em>convert browsers into buyers</em></h1>
    <p class="hero-sub">We build ecommerce websites that turn website visitors into customers — through better product presentation, trust signals, streamlined checkout flow, and SEO that brings consistent organic traffic to your store. Built specifically for Nigerian and UK product brands who need more than a catalogue — they need revenue.</p>
    <div class="hero-btns">
      <a href="#contact" class="btn-gold">Get Your Free Quote →</a>
      <a href="#portfolio" class="btn-ghost">See Ecommerce Websites</a>
    </div>
    <div class="hero-trust">
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span> Conversion-focused design — not just aesthetics</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 9.5c0-1.1 1.1-2 2.5-2h2c1.4 0 2.5.9 2.5 2s-1.1 2-2.5 2h-2c-1.4 0-2.5.9-2.5 2s1.1 2 2.5 2h2c1.4 0 2.5-.9 2.5-2"/><path d="M12 6v12"/></svg></span> Paystack & Stripe integration</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span> Live in 3–5 weeks</span>
      <span class="hero-trust-item"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span> Nigeria & UK specialists</span>
    </div>
  </div>

  <!-- Ecommerce website preview mock -->
  <div class="hero-right" aria-hidden="true">
    <div class="site-mock-wrap">
      <div class="float-notif">
        <div class="float-notif-ico"><svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg></div>
        <div>
          <div class="float-notif-text">New order placed · 2 items · ₦42,500</div>
          <div class="float-notif-sub">Lekki · just now</div>
        </div>
      </div>
      <div class="site-mock">
        <div class="mock-bar">
          <div class="mock-dot" style="background:#ff5f57"></div>
          <div class="mock-dot" style="background:#febc2e"></div>
          <div class="mock-dot" style="background:#28c840"></div>
          <div class="mock-url">
            <span class="mock-url-lock"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
            <span class="mock-url-text">kemiscloset.com.ng</span>
          </div>
        </div>
        <div class="mock-site">
          <!-- Site nav -->
          <div class="mock-site-nav">
            <div class="msn-logo">Kemi's <span>Closet</span></div>
            <div class="msn-links">
              <span class="msn-link">Shop</span>
              <span class="msn-link">Collections</span>
              <span class="msn-link">About</span>
              <span class="msn-link">Sale</span>
              <span class="msn-link">Track Order</span>
              <span class="msn-cta">Cart (2)</span>
            </div>
          </div>
          <!-- Site hero -->
          <div class="mock-site-hero">
            <div class="msh-label">Fashion & Accessories · Lagos</div>
            <div class="msh-h1">New Arrivals — <span>Summer Collection</span></div>
            <div class="msh-sub">Discover curated fashion for the modern Nigerian woman — delivered to your door in Lagos, Abuja, and across Nigeria.</div>
            <div class="msh-btns">
              <span class="msh-btn-p">Shop Now</span>
              <span class="msh-btn-s">View Lookbook →</span>
            </div>
          </div>
          <!-- Products grid -->
          <div class="mock-site-products">
            <div class="msp-label">Featured Products</div>
            <div class="msp-grid">
              <div class="msp-card">
                <div class="msp-img"><svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="1.5"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.57a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.57a2 2 0 0 0-1.34-2.23z"/></svg></div>
                <div class="msp-sale">SALE</div>
                <div class="msp-body">
                  <div class="msp-name">Ankara Wrap Dress</div>
                  <div class="msp-price">₦18,500</div>
                  <button class="msp-atc">Add to Cart</button>
                </div>
              </div>
              <div class="msp-card">
                <div class="msp-img"><svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="1.5"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.57a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.57a2 2 0 0 0-1.34-2.23z"/></svg></div>
                <div class="msp-body">
                  <div class="msp-name">Linen Coord Set</div>
                  <div class="msp-price">₦24,000</div>
                  <button class="msp-atc">Add to Cart</button>
                </div>
              </div>
              <div class="msp-card">
                <div class="msp-img"><svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="1.5"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.57a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.57a2 2 0 0 0-1.34-2.23z"/></svg></div>
                <div class="msp-sale">SALE</div>
                <div class="msp-body">
                  <div class="msp-name">Boho Maxi Skirt</div>
                  <div class="msp-price">₦14,200</div>
                  <button class="msp-atc">Add to Cart</button>
                </div>
              </div>
              <div class="msp-card">
                <div class="msp-img"><svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" fill="none" stroke-width="1.5"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.57a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.57a2 2 0 0 0-1.34-2.23z"/></svg></div>
                <div class="msp-body">
                  <div class="msp-name">Print Blazer</div>
                  <div class="msp-price">₦32,000</div>
                  <button class="msp-atc">Add to Cart</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Trust strip -->
          <div class="mock-site-trust">
            <div class="mst-item"><div class="mst-num">Free</div><div class="mst-lbl">Delivery Lagos</div></div>
            <div class="mst-item"><div class="mst-num">Secure</div><div class="mst-lbl">Payment</div></div>
            <div class="mst-item"><div class="mst-num">Easy</div><div class="mst-lbl">Returns</div></div>
            <div class="mst-item"><div class="mst-num">4.8<span class="rating-star"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></span></div><div class="mst-lbl">Rating</div></div>
          </div>
          <!-- Cart preview -->
          <div class="mock-site-cart">
            <div class="msc-label">Your Cart</div>
            <div class="msc-row"><span>Ankara Wrap Dress × 1</span><span>₦18,500</span></div>
            <div class="msc-row"><span>Linen Coord Set × 1</span><span>₦24,000</span></div>
            <div class="msc-total"><span>Total</span><span>₦42,500</span></div>
          </div>
        </div>
      </div>
      <div class="float-badge2"><span class="hero-trust-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span> Ranking #1 · "fashion store Lagos"</div>
    </div>
  </div>
</header>

<!-- TICKER BAND -->
<div class="ticker" aria-hidden="true">
  <div class="ticker-track">
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fashion & Clothing Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Electronics & Gadgets Stores</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Beauty & Cosmetics E-commerce</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Food & Grocery Online Stores</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Home Decor & Furniture Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Health & Wellness Products</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Books & Educational Materials</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Handmade & Artisan Products</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Baby & Kids Products</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Sporting Goods Stores</span>
    <!-- duplicate for seamless loop -->
    <span class="ticker-item"><span class="ticker-item-dot"></span> Fashion & Clothing Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Electronics & Gadgets Stores</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Beauty & Cosmetics E-commerce</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Food & Grocery Online Stores</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Home Decor & Furniture Brands</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Health & Wellness Products</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Books & Educational Materials</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Handmade & Artisan Products</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Baby & Kids Products</span>
    <span class="ticker-item"><span class="ticker-item-dot"></span> Sporting Goods Stores</span>
  </div>
</div>

<!-- ═══ THE PROBLEM ═══ -->
<section class="problem-section" aria-labelledby="problem-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">The Problem</span>
      <h2 class="s-head" id="problem-heading">Why most ecommerce websites<br><em>lose 95% of visitors</em></h2>
    </div>
    <p>Your website gets traffic — people find your products, browse your pages, and then leave without buying. This is not a marketing problem. It is a design and conversion problem. The average Nigerian ecommerce store converts fewer than 2% of its visitors into buyers. Here is what is going wrong — and what we do about it.</p>
  </div>
  <div class="problem-grid">

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M3 3h2l.4 2"/><path d="M7 13h10l4-8H5.4M7 13 5.4 5M7 13l-2.3 5H19"/><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/></svg></span>
      <h3 class="prob-title">Low conversion rate — visitors browse but leave without buying</h3>
      <p class="prob-desc">Your traffic numbers look reasonable on Analytics but actual sales do not reflect it. Products are visible but nothing is compelling enough to make a visitor take action. There are no urgency signals, no social proof near the buy button, no clear reason to choose you over another store.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Conversion architecture on every product page — urgency indicators, stock levels, review counts, trust badges, and CTA placement all engineered to push hesitant browsers toward checkout.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></span>
      <h3 class="prob-title">Product pages that don't build enough trust or desire to purchase</h3>
      <p class="prob-desc">Single low-resolution images, no size guide, no material description, no reviews, no "frequently bought together" — your product pages look like placeholders rather than experiences designed to sell. Visitors cannot see enough detail to feel confident spending their money.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Product pages built for desire and trust — multiple image slots, zoom functionality, product video placeholders, review sections, size guides, material info, and related product modules all laid out to maximise purchase confidence.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9.5 12 11 13.5l4-4"/></svg></span>
      <h3 class="prob-title">Checkout friction — customers abandon carts because the process is confusing or slow</h3>
      <p class="prob-desc">Too many steps, forced account creation, unclear delivery costs appearing late, payment methods that fail on Nigerian cards, no visible security signals — the average Nigerian ecommerce checkout loses more than 70% of customers who actually add items to their cart before they complete a purchase.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Streamlined checkout with guest checkout option, Paystack integration (cards, bank transfer, USSD), clear delivery fee shown early, and trust signals (SSL badge, money-back assurance) displayed at every step.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></span>
      <h3 class="prob-title">No organic traffic — the store depends entirely on paid ads to get visitors</h3>
      <p class="prob-desc">Every naira of revenue requires a corresponding naira of ad spend. When the ads stop, so do the sales. Your product and category pages are not indexed properly on Google, which means you are invisible to thousands of people who are actively searching for exactly what you sell.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Full ecommerce SEO from launch — Product and Category schema markup, keyword-optimised product titles and descriptions, collection pages built around search intent, and a blog engine for product guides and buying content.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></span>
      <h3 class="prob-title">Poor mobile shopping experience — most Nigerian buyers shop on phones</h3>
      <p class="prob-desc">Over 80% of Nigerian ecommerce traffic arrives on a mobile device. If your product images do not scale properly, if the add-to-cart button is hard to tap, if the checkout form is a nightmare on a small screen — you are losing the majority of your potential sales before they even start.</p>
      <div class="prob-solution"><strong>Our Fix</strong> Every store we build is designed mobile-first — tap-friendly product cards, swipeable image galleries, large CTAs, mobile-optimised checkout form with autofill support, and performance tuned to load fast on Nigerian mobile networks.</div>
    </div>

    <div class="prob-card pain reveal">
      <span class="prob-ico"><svg viewBox="0 0 24 24"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" y1="2" x2="12" y2="15"/></svg></span>
      <h3 class="prob-title">No post-purchase experience — no order tracking, no reviews, no repeat purchase triggers</h3>
      <p class="prob-desc">A sale is not the end of the customer relationship — it is the beginning. But most Nigerian ecommerce stores offer no order tracking page, no automated review request, no loyalty reward for returning customers, and no mechanism for turning a one-time buyer into a repeat customer who spends 5× more over time.</p>
      <div class="prob-solution"><strong>Our Fix</strong> A complete post-purchase system — order tracking page, automated review prompts, loyalty points module, and re-engagement email triggers. We build the full customer lifecycle, not just the storefront.</div>
    </div>

  </div>
</section>

<!-- ═══ WHAT WE BUILD ═══ -->
<section aria-labelledby="pages-heading">
  <div class="build-layout">
    <div class="build-copy reveal">
      <span class="s-label">What We Build</span>
      <h2 class="s-head" id="pages-heading">Every page your ecommerce<br>store <em>needs to convert</em></h2>
      <p>A high-converting ecommerce website is not a homepage and a product list. It is a complete, strategically structured platform — from the first landing page a customer sees on Google, all the way through product discovery, trust-building, checkout, and the post-purchase experience that brings them back.</p>
      <p>We map your catalogue, brand story, and customer journey to a comprehensive page and feature architecture that works for both Google rankings and real buying behaviour.</p>
      <ul class="bullets">
        <li>Homepage with best-sellers, promotions, and category navigation</li>
        <li>Full product catalogue with filters, search, and sorting</li>
        <li>Individual product pages — multiple images, reviews, size guides, related products</li>
        <li>Collection and category pages optimised for search intent</li>
        <li>Checkout and payment integration — Paystack, Stripe, bank transfer</li>
        <li>Order confirmation and tracking page</li>
        <li>About page and brand story — the people and mission behind the products</li>
        <li>Blog — product guides, style tips, comparison articles, buying guides</li>
        <li>Gift vouchers and loyalty rewards programme</li>
        <li>Contact page and returns policy</li>
      </ul>
      <a href="#contact" class="build-cta">Plan My Store Architecture →</a>
    </div>

    <!-- Pages wireframe visual -->
    <div class="pages-visual reveal" aria-hidden="true">
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Homepage</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Product Page</span><span class="pch-badge key">Conversion</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Category Page</span><span class="pch-badge key">SEO Priority</span></div>
        <div class="page-card-body">
          <div class="pcb-line dark"></div>
          <div class="pcb-line accent"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line sm"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Checkout</span><span class="pch-badge std">Revenue Page</span></div>
        <div class="page-card-body">
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
          <div class="pcb-line accent"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Order Tracking</span><span class="pch-badge std">Post-Purchase</span></div>
        <div class="page-card-body">
          <div class="pcb-line accent"></div>
          <div class="pcb-line sm"></div>
          <div class="pcb-line dark"></div>
          <div class="pcb-line"></div>
        </div>
      </div>
      <div class="page-card">
        <div class="page-card-head"><span class="pch-name">Blog / Guides</span><span class="pch-badge key">SEO Engine</span></div>
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
      <h2 class="s-head" id="svc-heading">Built specifically for<br><em>ecommerce brands</em></h2>
    </div>
    <p>Every ecommerce website we build is designed around the specific conversion patterns, trust signals, and purchasing psychology of online shoppers. These are not generic website features — they are ecommerce-specific elements that have a direct impact on how many browsers become buyers.</p>
  </div>
  <div class="services-grid">

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg></div>
      <h3 class="svc-title">Conversion-Optimised Product Pages</h3>
      <p class="svc-desc">Each product page is architected to convert — with multiple high-resolution image slots, product video support, detailed descriptions, size or specification guides, customer review sections, stock urgency signals, and strategically placed add-to-cart CTAs. Every element earns its place by moving the visitor closer to a purchase decision.</p>
      <div class="svc-tags"><span class="svc-tag">Multi-image Galleries</span><span class="svc-tag">Reviews Integration</span><span class="svc-tag">Size Guides</span><span class="svc-tag">Stock Signals</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M8.5 9.5c0-1.1 1.1-2 2.5-2h2c1.4 0 2.5.9 2.5 2s-1.1 2-2.5 2h-2c-1.4 0-2.5.9-2.5 2s1.1 2 2.5 2h2c1.4 0 2.5-.9 2.5-2"/><path d="M12 6v12"/></svg></div>
      <h3 class="svc-title">Seamless Checkout & Payment Integration</h3>
      <p class="svc-desc">A streamlined checkout that removes every unnecessary step — guest checkout option, address autofill, Paystack integration for Nigerian cards and bank transfer, Stripe for international buyers, and USSD payment support. Security badges, money-back guarantees, and order summary displayed throughout the process to reduce abandonment at the critical moment.</p>
      <div class="svc-tags"><span class="svc-tag">Paystack</span><span class="svc-tag">Stripe</span><span class="svc-tag">USSD Support</span><span class="svc-tag">Guest Checkout</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg></div>
      <h3 class="svc-title">SEO for Product & Category Keywords</h3>
      <p class="svc-desc">Product and category page titles, meta descriptions, URLs, and content are all optimised for the search terms your customers use — "buy ankara fabric Lagos", "skin care products Nigeria", "men's shoes Abuja". We implement Product and ItemList schema markup so Google displays your products directly in search results with price, availability, and review stars.</p>
      <div class="svc-tags"><span class="svc-tag">Product Schema</span><span class="svc-tag">Category SEO</span><span class="svc-tag">Keyword Research</span><span class="svc-tag">GSC Setup</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M3 3h2l.4 2"/><path d="M7 13h10l4-8H5.4M7 13 5.4 5M7 13l-2.3 5H19"/><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/></svg></div>
      <h3 class="svc-title">Abandoned Cart Recovery System</h3>
      <p class="svc-desc">Customers who add items to their cart and leave are not lost — they are your warmest audience. We integrate abandoned cart recovery sequences that trigger reminder emails with personalised product images, the customer's cart contents, and a time-limited incentive to return. Nigerian ecommerce stores using our abandoned cart system recover 15–25% of otherwise lost revenue.</p>
      <div class="svc-tags"><span class="svc-tag">Email Triggers</span><span class="svc-tag">Cart Recovery</span><span class="svc-tag">Personalisation</span><span class="svc-tag">Revenue Recovery</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg></div>
      <h3 class="svc-title">Mobile-First Shopping Experience</h3>
      <p class="svc-desc">Every product image, filter panel, cart icon, and checkout button is designed first for the 80%+ of Nigerian shoppers who browse on their phone. Swipeable galleries, bottom-pinned add-to-cart bars on mobile, one-tap payment options, and network-optimised image loading for fast rendering on MTN, Airtel, and Glo connections.</p>
      <div class="svc-tags"><span class="svc-tag">Mobile-First Design</span><span class="svc-tag">Image Optimisation</span><span class="svc-tag">Touch UI</span><span class="svc-tag">Network Performance</span></div>
    </div>

    <div class="svc-card reveal">
      <div class="svc-ico"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg></div>
      <h3 class="svc-title">Post-Purchase: Reviews, Tracking & Repeat Purchase Flows</h3>
      <p class="svc-desc">A sale is the start of a relationship. We build the full post-purchase layer — a branded order tracking page, automated review request emails, loyalty reward points that accumulate across purchases, and a returning customer flow with personalised product recommendations. Repeat buyers cost five times less to acquire and spend three times more per year.</p>
      <div class="svc-tags"><span class="svc-tag">Order Tracking</span><span class="svc-tag">Review Requests</span><span class="svc-tag">Loyalty Points</span><span class="svc-tag">Re-engagement</span></div>
    </div>

  </div>
</section>

<!-- ═══ SEO SECTION ═══ -->
<section class="seo-section" aria-labelledby="seo-heading">
  <div class="seo-header">
    <div class="seo-copy reveal">
      <span class="s-label">SEO for Ecommerce</span>
      <h2 class="s-head" style="color:var(--white)" id="seo-heading">Rank when shoppers are<br>searching for <em>your products</em></h2>
      <p>The most valuable moment in your customer acquisition journey is when someone opens Google and searches "buy skincare products Nigeria" or "electronics store Lagos". If your store is not on page one for those searches, every one of those clicks goes to a competitor. Every ecommerce website we build is engineered to rank for the exact product and category terms your customers search.</p>
      <p>We do not just build stores — we build search visibility. Your homepage, category pages, product pages, and blog articles are all individually optimised for specific keyword targets. Product and ItemList schema markup ensures Google understands your full catalogue and surfaces it directly in search results with pricing and availability information.</p>
      <ul class="bullets">
        <li>Individual SEO-optimised pages for every product category you sell</li>
        <li>Product schema markup for rich results — price, availability, review stars in Google</li>
        <li>Location pages targeting Lagos, Abuja, Port Harcourt, and delivery regions</li>
        <li>Keyword-optimised product titles, descriptions, and image alt text across the catalogue</li>
        <li>Google Merchant Center feed setup for Shopping tab visibility</li>
        <li>Long-form buying guide content targeting high-intent search terms</li>
        <li>Google Search Console and Analytics 4 configured and verified on launch day</li>
      </ul>
      <a href="#contact" class="seo-cta">Get an Ecommerce SEO Session →</a>
    </div>

    <!-- Keyword ranking panel -->
    <div class="reveal">
      <div class="kw-panel">
        <div class="kw-panel-head">Ecommerce Store — Keyword Rankings (before & after)</div>
        <div class="kw-panel-body">
          <div class="kw-row">
            <span class="kw-term">online store nigeria</span>
            <span class="kw-vol">14,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">fashion store lagos</span>
            <span class="kw-vol">8,600/mo</span>
            <span class="kw-pos top3">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">buy online nigeria</span>
            <span class="kw-vol">18,400/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">ecommerce website design nigeria</span>
            <span class="kw-vol">2,800/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">woocommerce store nigeria</span>
            <span class="kw-vol">1,600/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">shopify store nigeria</span>
            <span class="kw-vol">2,100/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">beauty products online nigeria</span>
            <span class="kw-vol">4,400/mo</span>
            <span class="kw-pos top10">▲ #2</span>
          </div>
          <div class="kw-row">
            <span class="kw-term">home decor online nigeria</span>
            <span class="kw-vol">3,200/mo</span>
            <span class="kw-pos top3">▲ #1</span>
          </div>
        </div>
      </div>
      <div style="margin-top:.75rem;font-size:.7rem;color:rgba(255,255,255,.3);font-style:italic;text-align:center">Representative keyword rankings from active ecommerce SEO campaigns</div>
    </div>
  </div>
</section>

<!-- ═══ TRUST SIGNALS ═══ -->
<section class="trust-section" aria-labelledby="trust-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why i2Medier</span>
      <h2 class="s-head" id="trust-heading">Numbers that prove<br>the <em>conversion difference</em></h2>
    </div>
    <p>We have built ecommerce stores for product brands across Nigeria and the UK. These are the outcomes our clients consistently see when they switch from a generic online store to a conversion-engineered ecommerce website.</p>
  </div>
  <div class="trust-grid">
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.5-1.5 3.5-1.5 3.5s2 0 3.5-1.5c.8-.8 1.1-1.8 1.2-2.5l-1-.9c-.7.1-1.7.4-2.2 1.4Z"/><path d="m14 10 4 4"/><path d="M15 2c3.5 0 6 2.5 7 6-1.5 2.5-3.5 4.5-6 6l-6-6c1.5-2.5 3.5-4.5 5-6Z"/><path d="M9 9 5 5"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="340">0</span><span>%</span></div>
      <div class="trust-label">Average increase in product page conversions within 90 days of launching a redesigned ecommerce store</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M13 2 4 14h6l-1 8 9-12h-6z"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="96">0</span></div>
      <div class="trust-label">Average Google PageSpeed score (mobile) on our custom-built ecommerce stores — optimised for Nigerian network speeds</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 3h2l.4 2"/><path d="M7 13h10l4-8H5.4M7 13 5.4 5M7 13l-2.3 5H19"/><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="5">0</span><span>×</span></div>
      <div class="trust-label">Increase in completed checkouts reported by ecommerce clients within 6 months of launch, compared to their previous store</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l2 2"/><path d="M9 2h6"/><path d="M12 5V3"/></svg></span>
      <div class="trust-num">3–5</div>
      <div class="trust-label">Weeks from design approval to a live, fully-launched ecommerce store — with products loaded and payments tested</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><path d="M3 12h18"/><path d="M12 3a15.3 15.3 0 0 1 0 18"/><path d="M12 3a15.3 15.3 0 0 0 0 18"/><path d="M4.5 7h15"/><path d="M4.5 17h15"/></svg></span>
      <div class="trust-num"><span class="counter" data-target="120">0</span><span>+</span></div>
      <div class="trust-label">Websites delivered across Nigeria, the UK, the US, and Canada — including product businesses at every scale</div>
    </div>
    <div class="trust-card reveal">
      <span class="trust-ico"><svg viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><path d="M8 11V8a4 4 0 1 1 8 0v3"/></svg></span>
      <div class="trust-num">100<span>%</span></div>
      <div class="trust-label">Client code ownership on delivery — every file, every database, every credential transferred to you unconditionally at handover</div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="process-section" aria-labelledby="process-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Process</span>
      <h2 class="s-head" id="process-heading">From brief to live store<br>in <em>six structured steps</em></h2>
    </div>
    <p>We have refined this process across every ecommerce project we have delivered. It eliminates the surprises and delays that most agency relationships produce — and ensures your store launches with the right structure, products, and performance from day one.</p>
  </div>
  <div class="process-steps">

    <div class="proc-card reveal">
      <div class="proc-num">Step 01 — Week 1</div>
      <div class="proc-title">Discovery & Catalogue Audit</div>
      <p class="proc-desc">A structured discovery session covering your product range, target customers, pricing structure, delivery logistics, competitors, and conversion goals. We audit your existing catalogue (or plan it from scratch), map your category architecture, identify your highest-opportunity SEO keywords, and agree on the full site structure in writing before any design work begins.</p>
      <div class="proc-tags"><span class="proc-tag">Kickoff Call</span><span class="proc-tag">Catalogue Audit</span><span class="proc-tag">Keyword Map</span><span class="proc-tag">Signed Brief</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 02 — Week 1–2</div>
      <div class="proc-title">Visual Design — Product-First, Conversion-Focused</div>
      <p class="proc-desc">High-fidelity page designs in Figma — mobile and desktop — for homepage, product listing, product detail, cart, and checkout pages. Every design decision is evaluated against conversion performance: image size, CTA placement, trust signal positioning, colour contrast for action elements. Two revision rounds are included and you approve every screen before development begins.</p>
      <div class="proc-tags"><span class="proc-tag">Figma Designs</span><span class="proc-tag">Mobile + Desktop</span><span class="proc-tag">2 Revision Rounds</span><span class="proc-tag">Design Sign-off</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 03 — Week 2–4</div>
      <div class="proc-title">Build — Store, Payment & Tracking</div>
      <p class="proc-desc">Your store is built on a custom WooCommerce theme — no generic templates, no slow page builders. Product catalogue loaded and structured. Paystack and Stripe payment gateways integrated and tested. Order tracking page configured. Abandoned cart recovery wired up. Loyalty reward plugin installed. A staging environment is available throughout so you can review progress daily.</p>
      <div class="proc-tags"><span class="proc-tag">Custom WooCommerce</span><span class="proc-tag">Paystack Setup</span><span class="proc-tag">Stripe Setup</span><span class="proc-tag">Order Tracking</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 04 — Week 4</div>
      <div class="proc-title">SEO & Product Content</div>
      <p class="proc-desc">Every product title, description, category page, and meta tag is written or reviewed for SEO performance. Product and Category schema markup is implemented across the catalogue. Google Merchant Center feed is configured for Shopping tab visibility. Google Analytics 4 ecommerce tracking (add to cart, checkout steps, purchase events) is installed and verified before launch.</p>
      <div class="proc-tags"><span class="proc-tag">Product SEO</span><span class="proc-tag">Schema Markup</span><span class="proc-tag">GA4 Ecommerce</span><span class="proc-tag">Merchant Center</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Step 05 — Week 5</div>
      <div class="proc-title">QA & Launch</div>
      <p class="proc-desc">End-to-end purchase flow tested on real Nigerian payment cards. Cross-device and cross-browser QA for mobile, tablet, and desktop. PageSpeed audit targeting 90+ on mobile. All product images compressed and formatted. Delivery logic verified. Domain migrated, SSL confirmed, and Cloudflare configured for CDN performance. You receive a 45-minute CMS training session and written admin guide.</p>
      <div class="proc-tags"><span class="proc-tag">Payment Testing</span><span class="proc-tag">Cross-Device QA</span><span class="proc-tag">Go-Live</span><span class="proc-tag">CMS Training</span></div>
    </div>

    <div class="proc-card reveal">
      <div class="proc-num">Ongoing — Optional</div>
      <div class="proc-title">Monthly Retainer — SEO, Content & Store Management</div>
      <p class="proc-desc">After launch, an optional monthly retainer keeps your store growing — publishing product guides and buying content for SEO, adding new products and promotions, monitoring Core Web Vitals, running security updates and backups, and delivering monthly performance reports covering traffic, conversion rate, revenue, and keyword rankings. Most ecommerce clients see their strongest ROI in months 4–9.</p>
      <div class="proc-tags"><span class="proc-tag">Monthly SEO</span><span class="proc-tag">Product Updates</span><span class="proc-tag">Security Backups</span><span class="proc-tag">Performance Reports</span></div>
    </div>

  </div>
</section>

<!-- ═══ PORTFOLIO ═══ -->
<section class="portfolio-section" id="portfolio" aria-labelledby="port-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Our Work</span>
      <h2 class="s-head" id="port-heading">Ecommerce websites<br>we've <em>built and launched</em></h2>
    </div>
    <p>Each store was designed from scratch — no off-the-shelf templates — built around the brand's products, customers, and conversion goals.</p>
  </div>
  <div class="portfolio-grid">

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,var(--ecom-dk) 0%,#5b21b6 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Kemi's Closet</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Fashion & Accessories</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Ankara</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Ready-to-Wear</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Accessories</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Fashion & Accessories</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Fashion & Accessories Online Store · Lagos, Nigeria</div>
        <div class="port-title">Kemi's Closet</div>
        <p class="port-desc">Full ecommerce store with 200+ products, collection pages, Paystack checkout, abandoned cart recovery, and an SEO strategy that reached page one for "fashion store Lagos" within 60 days of launch.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#0a2218 0%,#0e3828 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">TechMart Nigeria</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Electronics & Gadgets · Abuja</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Phones</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Laptops</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Accessories</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Electronics & Gadgets</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Electronics & Gadgets Store · Abuja, Nigeria</div>
        <div class="port-title">TechMart Nigeria</div>
        <p class="port-desc">Electronics ecommerce store with advanced product filtering by specification, comparison tables, warranty information, Paystack and bank transfer checkout, and product category pages ranking for competitive gadget keywords.</p>
      </div>
    </div>

    <div class="port-card reveal">
      <div class="port-thumb" style="background:linear-gradient(135deg,#2d0a1f 0%,#5d1a3a 100%)">
        <div class="port-thumb-inner">
          <div style="text-align:center;color:white;padding:1.5rem">
            <div style="font-family:var(--serif);font-size:1.2rem;font-weight:700;margin-bottom:.2rem">Glow Beauty Shop</div>
            <div style="font-size:.55rem;letter-spacing:.14em;text-transform:uppercase;color:var(--gold);margin-bottom:.8rem">Skincare & Cosmetics · UK+Nigeria</div>
            <div style="display:flex;gap:.35rem;justify-content:center;flex-wrap:wrap">
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Skincare</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Hair Care</span>
              <span style="background:rgba(255,255,255,.08);color:rgba(255,255,255,.5);font-size:.48rem;padding:.15rem .4rem;border-radius:2px">Natural Beauty</span>
            </div>
          </div>
        </div>
        <div class="port-overlay">
          <span class="port-badge">Skincare & Cosmetics</span>
        </div>
      </div>
      <div class="port-body">
        <div class="port-type">Skincare & Cosmetics · UK + Nigeria</div>
        <div class="port-title">Glow Beauty Shop</div>
        <p class="port-desc">Dual-market beauty ecommerce store serving UK and Nigerian customers — with Stripe for UK buyers, Paystack for Nigeria, separate shipping zones, ingredient-led product descriptions, and a blog that drives organic traffic from "best skincare for dark skin" and similar searches.</p>
      </div>
    </div>

  </div>
</section>

<!-- ═══ PRICING ═══ -->
<section class="pricing-section" id="pricing" aria-labelledby="pricing-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Pricing</span>
      <h2 class="s-head" id="pricing-heading">Transparent pricing for<br>every size of <em>ecommerce brand</em></h2>
    </div>
    <p>Every project is quoted individually after a free 30-minute consultation. These ranges are based on typical project scope — your exact quote will be detailed and itemised before any commitment is required.</p>
  </div>
  <div class="pricing-grid">

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">New & Growing Brands</div>
        <div class="price-name">Essential Store</div>
        <p class="price-tagline">A clean, fast, and credible online store for a brand launching or upgrading its ecommerce presence.</p>
        <div class="price-amount">₦500k <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Up to 50 products</div>
        <div class="price-feat">Homepage, category & product pages</div>
        <div class="price-feat">Paystack integration</div>
        <div class="price-feat">Mobile-responsive design</div>
        <div class="price-feat">Basic SEO foundation</div>
        <div class="price-feat">Google Analytics 4</div>
        <div class="price-feat">Order confirmation emails</div>
        <div class="price-feat">30-day post-launch support</div>
        <div class="price-feat no">Abandoned cart recovery</div>
        <div class="price-feat no">Blog / buying guides</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn outline">Get a Quote →</a></div>
    </div>

    <div class="price-card featured reveal">
      <div class="price-head">
        <div class="price-badge">Most Popular</div>
        <div class="price-name">Growth Store</div>
        <p class="price-tagline">A full-featured ecommerce store built to rank on Google, convert visitors, and scale with your brand.</p>
        <div class="price-amount">₦1M <sub>starting from</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Unlimited products</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Advanced filtering & search</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Abandoned cart recovery</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Customer reviews system</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Blog & buying guides CMS</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Loyalty points programme</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">Full SEO + schema markup</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">GA4 ecommerce tracking</div>
        <div class="price-feat" style="color:rgba(255,255,255,.7)">60-day post-launch support</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn gold">Start This Project →</a></div>
    </div>

    <div class="price-card reveal">
      <div class="price-head">
        <div class="price-badge">Established & Enterprise Brands</div>
        <div class="price-name">Enterprise Store</div>
        <p class="price-tagline">A comprehensive commerce platform for brands with complex inventory, multiple vendors, or subscription products.</p>
        <div class="price-amount">Custom <sub>quoted on scope</sub></div>
      </div>
      <div class="price-body">
        <div class="price-feat">Custom inventory management</div>
        <div class="price-feat">Multi-vendor marketplace</div>
        <div class="price-feat">ERP & warehouse integration</div>
        <div class="price-feat">Subscription products</div>
        <div class="price-feat">Advanced analytics dashboard</div>
        <div class="price-feat">Custom fulfilment logic</div>
        <div class="price-feat">Full SEO retainer available</div>
        <div class="price-feat">90-day support & SLA</div>
      </div>
      <div class="price-foot"><a href="#contact" class="price-btn solid">Request a Proposal →</a></div>
    </div>

  </div>
</section>

<!-- ═══ COMPARISON TABLE ═══ -->
<section class="compare-section" aria-labelledby="compare-heading">
  <div class="two-col-intro">
    <div>
      <span class="s-label">Why Choose i2Medier</span>
      <h2 class="s-head" id="compare-heading">How we compare to<br><em>your other options</em></h2>
    </div>
    <p>Not all ecommerce development options deliver the same results — especially for product brands where conversion rate is the difference between profit and loss.</p>
  </div>
  <table class="compare-table reveal" role="table" aria-label="Web design comparison for ecommerce brands">
    <thead>
      <tr>
        <th>Feature</th>
        <th>DIY (Shopify Basic / Wix)</th>
        <th class="hl">i2Medier Custom Build</th>
        <th>Generic Freelancer</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="feature">Conversion-optimised product pages</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Generic templates</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Ecommerce-specific design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Depends on experience</span></td>
      </tr>
      <tr>
        <td class="feature">Paystack & Stripe integration</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Paystack plugin only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Both fully integrated</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often Paystack only</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile PageSpeed score 90+</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Typically 40–65</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Guaranteed target</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely achieved</span></td>
      </tr>
      <tr>
        <td class="feature">Abandoned cart recovery system</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Paid app required</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Rarely built</span></td>
      </tr>
      <tr>
        <td class="feature">Customer reviews & ratings</td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Basic only</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Full reviews system</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Rarely complete</span></td>
      </tr>
      <tr>
        <td class="feature">Mobile shopping experience</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Template mobile layout</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Mobile-first design</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Varies widely</span></td>
      </tr>
      <tr>
        <td class="feature">Product schema markup for Google</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not available</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Included standard</span></td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Not typically done</span></td>
      </tr>
      <tr>
        <td class="feature">Full code ownership on delivery</td>
        <td><span class="compare-status no"><svg viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg> Platform-locked forever</span></td>
        <td class="hl"><span class="compare-status yes"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg> Unconditional ownership</span></td>
        <td><span class="compare-status maybe"><svg viewBox="0 0 24 24"><path d="M12 9v4"/><path d="M12 17h.01"/><path d="M10.3 3.9 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg> Often withheld</span></td>
      </tr>
    </tbody>
  </table>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class="test-section" aria-labelledby="test-heading">
  <span class="s-label">Client Reviews</span>
  <h2 class="s-head" id="test-heading">What ecommerce founders say<br>about <em>working with us</em></h2>
  <div class="test-grid">
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"Before i2Medier rebuilt our store, we were spending ₦300,000 a month on ads just to drive sales. Within four months of launch, we were getting consistent orders directly from Google searches. Our conversion rate went from 0.8% to 3.4% — that is a completely different business."</p>
      <div class="test-author">
        <div class="test-avatar">K</div>
        <div><div class="test-name">Kemi Adeyemi</div><div class="test-role">Founder · Kemi's Closet, Lagos</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"The abandoned cart recovery system alone paid for the website within the first two months. We were losing so much revenue to people who added items and left. The checkout redesign also helped — our cart abandonment rate dropped from 78% to below 45%. Genuinely remarkable results."</p>
      <div class="test-author">
        <div class="test-avatar">T</div>
        <div><div class="test-name">Tunde Okafor</div><div class="test-role">CEO · TechMart Nigeria, Abuja</div></div>
      </div>
    </div>
    <div class="test-card reveal">
      <div class="test-stars"><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg><svg viewBox="0 0 24 24"><path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9z"/></svg></div>
      <p class="test-quote">"We operate across both UK and Nigeria so we needed Stripe for UK customers and Paystack for Nigeria, all from one store. They built it perfectly. UK customers see GBP pricing, Nigerian customers see Naira — and both sides convert at rates we have never seen before. The product pages finally feel premium."</p>
      <div class="test-author">
        <div class="test-avatar">A</div>
        <div><div class="test-name">Amaka Eze</div><div class="test-role">Brand Manager · Glow Beauty Shop, UK + Nigeria</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ SECONDARY CTA ═══ -->
<div class="cta2-band">
  <div class="cta2-left">
    <h2>Free ecommerce audit — see<br>what's costing you sales every day</h2>
    <p>We will review your current store, calculate what your conversion rate is costing you in lost revenue, and show you exactly what a better website would fix. No commitment required.</p>
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
      <h2 class="s-head" id="content-heading">Everything you need to know about<br><em>ecommerce website design in Nigeria</em></h2>
    </div>
    <p>A comprehensive guide to building an ecommerce website that converts browsers into buyers, ranks on Google, and grows your product brand — written for Nigerian and UK online stores in 2026.</p>
  </div>
  <div class="content-layout">

    <article class="content-body" aria-label="Guide: Web design for ecommerce brands in Nigeria">

      <h2>Why Nigerian ecommerce brands need better websites in 2026</h2>
      <p>Nigeria's ecommerce market is growing at an exceptional rate. With over 220 million people, rapidly increasing smartphone penetration, and a generation of buyers who are entirely comfortable making financial transactions on their phones, the opportunity for product brands selling online in Nigeria has never been greater. But opportunity and results are not the same thing — and for most Nigerian ecommerce brands, the gap between the two is their website.</p>
      <p>The average Nigerian consumer is now highly discerning. They have bought from Jumia, Konga, and international brands like ASOS. They know what a good online shopping experience feels like. When they land on a store with blurry product images, a checkout that requires account creation before purchase, and a total delivery cost that appears only at the final step — they leave. Not because they did not want the product, but because the experience did not meet the standard they have been set by better-built stores.</p>
      <p>In 2026, having an ecommerce website is table stakes. Having a <strong>high-converting</strong> ecommerce website — one that is designed specifically to turn browsers into buyers — is the competitive differentiator. The brands that invest in this infrastructure now will dominate their categories for the next decade. Those that do not will continue to depend entirely on expensive paid advertising to generate sales they should be earning organically.</p>

      <h2>The conversion rate problem: why most online stores lose 95% of visitors</h2>
      <p>If your ecommerce store is converting at 1–2% of visitors, you are not underperforming — you are statistically average for a poorly optimised store. But average in ecommerce means losing 98 out of every 100 people who come to your website. High-performing ecommerce stores convert at 3–5%. That difference — between 1.5% and 4% — can mean triple the revenue from exactly the same traffic budget.</p>

      <h3>What drives conversion rate in ecommerce</h3>
      <p>Conversion rate is the aggregate result of dozens of small decisions made across your website. Product image quality. The speed at which the page loads on an Airtel 4G connection. Whether the size chart is present and easy to find. Whether there are customer reviews near the buy button. Whether the checkout asks for an account before accepting a purchase. Whether the delivery cost is visible before the final step. Each of these individually loses a small percentage of buyers. Together, they lose the vast majority.</p>
      <p>The stores that convert at 4% have systematically fixed every one of these friction points. They have A/B tested their product page layouts. They have made the checkout as simple as possible. They have displayed every trust signal — security badges, return policies, review counts — at the exact moment a buyer needs reassurance. This is not accidental. It is the result of deliberate, ecommerce-specific design.</p>

      <h2>Product pages that sell: photography, copywriting, and trust signals</h2>
      <p>Your product page is where a sale is won or lost. It is the closest digital equivalent to a physical interaction with the product — and it has to compensate for everything a buyer cannot do online: touch the fabric, check the weight, examine the build quality. This means every element of the product page must be doing the work of a sales conversation.</p>

      <h3>Product photography for Nigerian ecommerce</h3>
      <p>Multiple images from different angles, lifestyle shots that show the product in context, zoom functionality, and where relevant, a product video — these are not optional extras. They are the primary tools by which a buyer builds confidence in a product they cannot physically inspect. For fashion brands, this means model shots showing fit and drape. For electronics, it means close-up shots of ports, materials, and build details. For beauty products, it means before/after content and ingredient transparency.</p>

      <h3>Copywriting that converts</h3>
      <p>A product description that says "High-quality fabric, comfortable fit, available in multiple sizes" does not sell. A description that says "Cut from 100% double-weave Ankara fabric woven in Kano — our Wrap Dress drapes cleanly, holds its shape after washing, and runs true to size. Available in S–2XL. Size guide below." — that sells. Specificity, honest detail, and an answer to every question a buyer might have before they add to cart. This is the standard we write product copy to.</p>

      <h2>SEO for ecommerce: ranking product and category pages on Google</h2>
      <p>Paid advertising is the fastest route to ecommerce revenue. Organic search is the most sustainable. A product brand that ranks on page one of Google for its key category terms earns traffic that costs nothing per click — traffic that compounds over time as more pages rank, more reviews accumulate, and Google's trust in the domain grows.</p>
      <p>Ecommerce SEO in Nigeria operates on a different set of priorities to traditional SEO. The highest-value keywords are often category-level: "women's shoes Lagos", "men's skincare products Nigeria", "baby clothes online Nigeria". These searches have commercial intent — the person searching is actively looking to buy. Ranking for these terms requires category pages that are genuinely helpful and comprehensive, not just product grid pages.</p>
      <p>Individual product pages can also rank for long-tail terms: "ankara wrap dress size 12 Nigeria", "affordable laptop 16GB RAM Nigeria". These searches are extremely high-intent and convert at exceptional rates when the landing page is well-optimised. Product schema markup ensures that when Google does surface your products, it shows price, availability, and review stars directly in the search result — dramatically improving click-through rates before the visitor even reaches your store.</p>

      <h2>Checkout optimisation and reducing cart abandonment in Nigeria</h2>
      <p>Cart abandonment is the single largest revenue leak in Nigerian ecommerce. The average abandonment rate in Nigeria is above 70% — meaning more than seven in every ten people who add items to their cart never complete a purchase. This is not a marketing problem. It is a checkout problem, and it is almost entirely fixable through design.</p>
      <p>The most effective interventions for reducing Nigerian cart abandonment are:</p>
      <ul>
        <li><strong>Guest checkout:</strong> Removing the mandatory account creation requirement alone reduces abandonment by 15–25% in most stores. Nigerian buyers are particularly resistant to account creation friction.</li>
        <li><strong>Early delivery cost transparency:</strong> Hiding delivery costs until the final checkout step is one of the fastest ways to lose a sale. Showing delivery cost on the cart or product page prevents the "surprise cost" abandonment that accounts for a significant share of drop-off.</li>
        <li><strong>Multiple Nigerian payment methods:</strong> Paystack card payment, Paystack bank transfer, USSD, and bank USSD codes all serve different segments of the Nigerian payment landscape. A store that offers only card payment is invisible to buyers whose cards are not set up for online transactions.</li>
        <li><strong>Security signals at the payment step:</strong> SSL badge, Paystack's trusted logo, and a money-back guarantee displayed at the payment step reduce the anxiety that causes hesitation and abandonment at the final stage.</li>
        <li><strong>Abandoned cart recovery:</strong> For the buyers who abandon despite good UX, a recovery sequence — reminder email with product image, a 48-hour window offer, and a final reminder — recovers a meaningful percentage of revenue that would otherwise be permanently lost.</li>
      </ul>

      <h2>Pricing guide for ecommerce website design in Nigeria</h2>
      <p>Ecommerce website cost in Nigeria varies significantly based on the size of the catalogue, the complexity of the features required, and the quality of the build. As a general guide for 2026:</p>
      <ul>
        <li><strong>Essential store</strong> (up to 50 products, basic checkout, standard SEO): ₦500,000–₦750,000</li>
        <li><strong>Growth store</strong> (unlimited products, abandoned cart, reviews, blog, advanced SEO): ₦1M–₦1.8M</li>
        <li><strong>Enterprise platform</strong> (multi-vendor, ERP integration, subscription products, custom fulfilment): ₦2.5M+</li>
      </ul>
      <p>The most important thing to understand about ecommerce website investment is the ROI mathematics. A store converting at 1.5% and receiving 5,000 visitors a month makes 75 sales. The same store, redesigned to convert at 3.5%, makes 175 sales — from identical traffic. If the average order value is ₦25,000, that is ₦2.5M in additional annual revenue from the same marketing spend. The website cost is recovered in weeks, not months.</p>
      <p>The question is never "how much does a website cost?" The question is "how much revenue is a poorly converting store costing me every month?" Once you calculate that figure — which we will do for free in our audit — the investment decision becomes straightforward.</p>

    </article>

    <!-- Sticky sidebar -->
    <aside class="content-sticky">
      <div class="content-cta-box">
        <h4>Ready to grow your store?</h4>
        <p>Get a free ecommerce audit and website proposal for your brand.</p>
        <a href="#contact" class="btn-gold-sm">Book a Free Audit →</a>
      </div>

      <nav class="toc" aria-label="Table of contents">
        <div class="toc-title">On This Page</div>
        <ul class="toc-list">
          <li><a href="#problem-heading" class="toc-link">Why stores lose 95% of visitors</a></li>
          <li><a href="#pages-heading" class="toc-link">Pages your store needs</a></li>
          <li><a href="#svc-heading" class="toc-link">What's included</a></li>
          <li><a href="#seo-heading" class="toc-link">Ecommerce SEO</a></li>
          <li><a href="#process-heading" class="toc-link">Our process (6 steps)</a></li>
          <li><a href="#pricing" class="toc-link">Pricing</a></li>
          <li><a href="#faq-heading" class="toc-link">FAQ</a></li>
          <li><a href="#contact" class="toc-link">Get a free audit</a></li>
        </ul>
      </nav>
    </aside>

  </div>
</section>

<!-- ═══ FAQ ═══ -->
<section aria-labelledby="faq-heading">
  <span class="s-label">FAQ</span>
  <h2 class="s-head" id="faq-heading">Questions about ecommerce<br>website <em>design in Nigeria</em></h2>
  <div class="faq-layout">
    <div class="faq-sidebar reveal">
      <h3>Not answered here?</h3>
      <p>Every ecommerce brand has different needs. Email us and we will give you a direct, honest answer specific to your products and market — no sales pressure.</p>
      <a href="mailto:letstalk@i2medier.com" class="faq-clink">Email Us →</a>
    </div>
    <div class="faq-list reveal">

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f1">Do you integrate Paystack and Stripe into ecommerce websites?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f1">Yes — both Paystack and Stripe are included as standard in our Growth Store and Enterprise packages, and Paystack is included in the Essential Store. Paystack covers Nigerian buyers paying by card, bank transfer, or USSD. Stripe handles international buyers and UK customers. We test every payment pathway on real Nigerian bank cards before launch. We also support Flutterwave if your business already uses it.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f2">Can you migrate my products from an existing store?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f2">Yes. We migrate product data — titles, descriptions, prices, images, categories, SKUs, and inventory levels — from your existing Shopify, WooCommerce, Jumia vendor dashboard, or spreadsheet into the new store. For catalogues of 50+ products, migration is handled as a structured data process to ensure accuracy. We also use the migration as an opportunity to audit and improve product titles and descriptions for SEO.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f3">Can customers track their orders after purchase?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f3">Yes — every store we build includes an order tracking page where customers enter their order number and email to see their current delivery status. For stores using logistics partners like GIG Logistics, Sendbox, or DHL, we integrate the tracking API so statuses update automatically. We also configure post-purchase confirmation emails with tracking links so customers always know where their order is.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f4">How do you handle inventory management?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f4">WooCommerce includes built-in inventory management — you set stock levels per product and variation (size, colour, etc.), and the store automatically marks items as out of stock when inventory reaches zero. You receive low-stock email alerts. For brands with more complex inventory needs — multiple warehouse locations, purchase orders, or ERP synchronisation — we build custom inventory modules or integrate with existing systems like Odoo or QuickBooks Commerce.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f5">Is the store optimised for mobile shopping?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f5">Yes — mobile is the primary design target for every ecommerce store we build. Over 80% of Nigerian ecommerce traffic comes from mobile devices, so every interaction — product image swipe, filter selection, size choice, add to cart, checkout form — is designed first for a phone screen. We also optimise image formats and sizes for fast loading on Nigerian mobile networks (MTN, Airtel, Glo) and test on real Android and iOS devices before launch.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f6">Can the website recover abandoned carts automatically?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f6">Yes — our Growth Store and Enterprise packages include an abandoned cart recovery system. When a customer adds products to their cart and leaves without purchasing (and has previously entered their email address), they receive an automatic recovery email sequence: a first reminder at 1 hour, a follow-up at 24 hours with a personalised incentive (optional), and a final reminder at 72 hours. Clients using our abandoned cart recovery typically see 15–25% of abandoned carts recovered as completed purchases.</div>
      </div>

      <div class="faq-item">
        <button class="faq-q" aria-expanded="false" aria-controls="f7">Can my products appear in Google Shopping results?<span class="faq-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14"/><path d="M5 12h14"/></svg></span></button>
        <div class="faq-a" id="f7">Yes — as part of our SEO setup, we configure a Google Merchant Center product feed that submits your catalogue to Google Shopping. This allows your products to appear in the Google Shopping tab with images, prices, and your store name. We also implement Product schema markup on every product page so Google can display rich product results — including price, availability, and review stars — directly in standard search results. Both channels can significantly increase organic traffic without additional ad spend.</div>
      </div>

    </div>
  </div>
</section>

<!-- ═══ MAIN CTA ═══ -->
<section class="cta-band" id="contact" aria-labelledby="cta-h">
  <h2 id="cta-h">Ready to build an ecommerce store<br>that actually converts?</h2>
  <p>Get a free, no-obligation store audit and website proposal. We will review your current ecommerce setup, calculate what your conversion rate is costing you monthly, and show you exactly what we would build — and why.</p>
  <a href="mailto:letstalk@i2medier.com" class="btn-dark">Get Your Free Audit →</a>
</section>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/industry-web-design.js')
@endpush
