# Mega Menu Design Spec
Date: 2026-06-02

## Overview

Add hover-triggered mega menu dropdowns to three nav items on the desktop navigation: **Services**, **Who We Help**, and **Tools**. Each panel shows a flat grid of links with a stroke SVG icon, bold title, and one-line description. Desktop only (≥960px). Mobile side nav gets simple accordion-style expand.

---

## Behaviour

- **Trigger**: CSS hover on `<li class="has-mega">` plus a 150ms JS hover-intent delay to prevent flicker when the mouse briefly passes over
- **Animation**: opacity 0→1 + translateY(8px→0), 200ms ease
- **Close**: mouse leaves the `<li>` (with the same 150ms grace period), Escape key, or clicking a link inside the panel
- **Desktop only**: all mega panel CSS lives inside `@media (min-width: 961px)` — no change to mobile behaviour
- **ARIA**: nav trigger gets `aria-haspopup="true"` and `aria-expanded` toggled by JS
- **Active state**: if the current route is within a mega group, the parent nav link gets `is-active`

---

## HTML Structure

Each dropdown nav item becomes:

```html
<li class="has-mega">
  <a href="/services" aria-haspopup="true" aria-expanded="false">
    Services
    <svg class="nav-chevron">…</svg>  <!-- small down arrow -->
  </a>
  <div class="mega-panel" role="region">
    <div class="mega-grid mega-grid--2col">  <!-- or --3col -->
      <a href="/services/web-design" class="mega-item">
        <span class="mega-icon"><svg>…</svg></span>
        <span class="mega-text">
          <span class="mega-title">Web Design</span>
          <span class="mega-desc">Custom websites built to convert visitors</span>
        </span>
      </a>
      …
    </div>
    <div class="mega-footer">
      <a href="/services">View all services →</a>
    </div>
  </div>
</li>
```

---

## Panel Content

### Services (2-column grid, 12 items)

| Icon | Title | Description |
|------|-------|-------------|
| monitor | Web Design | Custom websites built to convert visitors |
| code | WordPress Development | WordPress sites built to your exact spec |
| server | Laravel Development | Scalable PHP apps with Laravel |
| smartphone | Mobile App Development | iOS & Android apps that users love |
| search | Search Optimisation | Rank higher and get found on Google |
| layers | UI/UX Design | Interfaces that feel intuitive and premium |
| mail | Business Email Setup | Professional email on your own domain |
| tool | Website Maintenance | Keep your site fast, secure, and up to date |
| shield | WordPress Maintenance | Dedicated WordPress care and updates |
| cloud | Cloud Architecture | Scalable cloud infrastructure on AWS/GCP |
| box | SaaS Application | Build and launch your SaaS product |
| shopping-cart | eCommerce Website | Online stores that drive real revenue |

Footer link: "View all services →" → `/services`

---

### Who We Help (3-column grid, ~21 industries)

| Icon | Title | Description |
|------|-------|-------------|
| scale | Law Firm | Authoritative websites for legal practices |
| plus-circle | Clinic & Medical | Patient-first websites for healthcare providers |
| bar-chart-2 | Accounting Firm | Professional sites for accountants and auditors |
| home | Real Estate | Property websites that generate leads |
| briefcase | Consulting Firm | Credibility-first websites for consultants |
| hard-hat | Construction Company | Bold sites for builders and contractors |
| settings | Engineering Firm | Technical yet approachable engineering websites |
| compass | Architecture Firm | Portfolio-driven sites for architects |
| book | School & Education | Informative sites for schools and learning centres |
| heart | Church & Non-profit | Community-focused websites for churches |
| key | Hotel & Hospitality | Booking-ready hotel and resort websites |
| utensils | Restaurant & Food | Menu-led sites that fill tables |
| sparkles | Beauty & Wellness | Elegant sites for salons and wellness studios |
| activity | Fitness & Gym | High-energy sites for gyms and trainers |
| droplet | Cleaning Company | Clean, trustworthy sites for cleaning businesses |
| truck | Logistics Company | Operational sites for transport businesses |
| plane | Travel Agency | Inspiring travel websites that drive bookings |
| shopping-bag | eCommerce Brand | Conversion-focused stores for product brands |
| tag | Fashion Brand | Stylish sites for clothing and accessory brands |
| calendar | Event Planner | Visual sites for event and wedding planners |
| camera | Photography | Portfolio sites for photographers |
| user | Personal Brand | Sites that establish your personal authority |

Footer link: "View all industries →" → `/who-we-help`

---

### Tools (2-column grid, 7 tools)

| Icon | Title | Description |
|------|-------|-------------|
| search | Free SEO Audit | Analyse your site's SEO health instantly |
| calculator | Website Cost Calculator | Estimate your website project budget |
| zap | Business Name Generator | Generate brandable business name ideas |
| globe | Domain Name Generator | Find the perfect domain for your brand |
| file-text | Website Brief Generator | Create a clear brief for your project |
| message-circle | WhatsApp Link Generator | Build a click-to-chat WhatsApp link |
| file | Invoice Generator | Create and download professional invoices |

Footer: "Products" section — placeholder heading with "Coming soon" pill. Footer link: "View all tools →" → `/tools`

---

## CSS

New file: `resources/css/public/nav-mega.css` (imported in `public.css`)

Key rules (desktop-only inside `@media (min-width: 961px)`):

```
.has-mega            — position: relative
.mega-panel          — position: absolute, top: calc(100% + 8px), white bg, border, shadow, min-width per panel
.mega-panel          — opacity: 0, pointer-events: none, transform: translateY(8px), transition 200ms
.has-mega.is-open .mega-panel — opacity: 1, pointer-events: auto, transform: none
.mega-grid--2col     — display: grid, grid-template-columns: 1fr 1fr, gap: 0.25rem
.mega-grid--3col     — grid-template-columns: 1fr 1fr 1fr
.mega-item           — display: flex, gap: 0.75rem, padding: 0.65rem 0.75rem, border-radius: 8px
.mega-item:hover     — background: var(--g100)
.mega-icon           — 32px square flex container, colour var(--g400) → var(--gold) on hover
.mega-title          — font-size: 0.85rem, font-weight: 600, color: var(--black)
.mega-desc           — font-size: 0.75rem, color: var(--text-muted)
.nav-chevron         — 12px, rotate 0deg → 180deg when .is-open
.mega-footer         — border-top, padding-top, small "View all" link in gold
```

Dark nav variants (`is-dark`) get matching overrides (dark bg panel, cream titles, etc.).

---

## JS (extends header.js)

- Query all `.has-mega` items
- On `mouseenter`: set a 150ms timeout, then add `.is-open` + set `aria-expanded="true"`
- On `mouseleave`: clear timeout, remove `.is-open` + set `aria-expanded="false"`
- On `keydown Escape`: close all open panels
- On link click inside panel: close the panel

---

## Mobile Side Nav

The three mega items in `.public-side-nav-links` stay as plain links (to `/services`, `/who-we-help`, `/tools`). No accordion needed — keeping mobile nav simple. This is unchanged from current behaviour.

---

## Files Changed

| File | Change |
|------|--------|
| `resources/views/public/partials/header.blade.php` | Wrap 3 nav items in `.has-mega` structure with full panel HTML |
| `resources/css/public/nav-mega.css` | New file — all mega menu styles |
| `resources/css/public.css` | Import `nav-mega.css` |
| `resources/js/public/header.js` | Add hover-intent logic for `.has-mega` items |
