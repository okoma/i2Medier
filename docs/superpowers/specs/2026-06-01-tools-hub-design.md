# Tools Hub — Design Spec

**Date:** 2026-06-01
**Project:** i2Medier public site
**Status:** Approved

---

## Overview

A public tools hub at `/tools` listing 7 free interactive tools for Nigerian businesses. The hub drives lead capture (email storage) and positions i2Medier as a useful resource. All tools are publicly accessible — no login required.

---

## Routes

```
GET  /tools                          ToolController@hub
GET  /tools/free-seo-audit           ToolController@seoAudit
GET  /tools/website-cost-calculator  ToolController@costCalculator
GET  /tools/business-name-generator  ToolController@businessNameGenerator
GET  /tools/domain-name-generator    ToolController@domainNameGenerator
GET  /tools/website-brief-generator  ToolController@websiteBriefGenerator
GET  /tools/whatsapp-link-generator  ToolController@whatsappLinkGenerator
GET  /tools/invoice-generator        ToolController@invoiceGenerator
POST /tools/leads                    ToolController@storeLead
```

---

## Architecture

**Pattern:** `ToolController` serves Blade views at each route. Interactive logic lives in Livewire components (server-side tools) or Alpine.js (client-side tools) embedded in those views.

**Controller:** `app/Http/Controllers/ToolController.php` — one method per tool, each returning a Blade view.

**Livewire components** (in `app/Livewire/Tools/`):
- `SeoAudit.php` — server-side HTTP fetch + HTML analysis
- `BusinessNameGenerator.php` — PHP word-list combination
- `DomainNameGenerator.php` — PHP word-list combination with TLD variants
- `WebsiteBriefGenerator.php` — multi-step form → formatted brief

**Alpine.js tools** (no Livewire component — logic lives in the Blade view):
- Website Cost Calculator — client-side arithmetic
- WhatsApp Link Generator — client-side string formatting
- Invoice Generator — client-side line-item builder + `window.print()`

**Views:** `resources/views/tools/` — `hub.blade.php` + one view per tool.

**Shared CSS:** `resources/css/public/pages/tools.css` — registered in `vite.config.js`.

---

## Database

### `tool_leads` table

| Column | Type | Notes |
|---|---|---|
| `id` | bigint unsigned PK | auto-increment |
| `tool` | varchar(100) | slug of the tool, e.g. `free-seo-audit` |
| `email` | varchar(255) | validated before insert |
| `ip` | varchar(45) | request IP for deduplication awareness |
| `created_at` | timestamp | nullable |
| `updated_at` | timestamp | nullable |

Email validation: `filter_var($email, FILTER_VALIDATE_EMAIL)` in the Livewire component before storing. No uniqueness constraint — same email can use multiple tools. Duplicate tool+email combinations are allowed (user may reuse tool).

No admin panel view needed for MVP — leads visible via raw DB or future Filament resource.

---

## Hub Page (`/tools`)

**Layout:** Light/cream background (`--off-white`). Scannable vertical list of tools.

**Structure:**
1. Breadcrumb: `Home › Tools`
2. Label chip: `FREE TOOLS`
3. H1 headline + short description paragraph
4. Tool list — each row: dark icon square + tool name (linked) + one-line description + `→` arrow
5. Subtle CTA strip at bottom linking to `/start`

**Tool list order:**
1. Free SEO Audit
2. Website Cost Calculator
3. Business Name Generator
4. Domain Name Generator
5. Website Brief Generator
6. WhatsApp Link Generator
7. Invoice Generator

---

## Individual Tool Page Layout

**Layout:** Light background, two-column (above tablet breakpoint).

- **Left column (~40%):** breadcrumb, `FREE TOOL` label chip, H1, short description, bulleted feature list (what the tool checks/does)
- **Right column (~60%):** white card containing the Livewire/Alpine tool. Related tools listed inside the card below the tool form.
- **Below fold:** brief explanation section (how it works, 3 steps)

---

## Email Gate (Blur Gate)

Applied to: SEO Audit, Cost Calculator, Business Name Generator, Domain Name Generator, Website Brief Generator.

Not applied to: WhatsApp Link Generator, Invoice Generator (low lead value, friction not warranted).

**UX flow:**

1. User fills in tool inputs and submits.
2. Livewire/Alpine processes the result immediately and renders it.
3. Result panel renders with CSS `filter: blur(8px)` and `pointer-events: none`.
4. A semi-transparent overlay sits on top of the result panel with:
   - "Your [result] is ready"
   - Email input field
   - "Unlock Results →" button
5. User submits email → validated → stored in `tool_leads` → blur removed → results visible.
6. On validation error (bad email format): inline error message below the email field, no storage.

**Email submission mechanism — two paths:**

- **Livewire tools** (SEO Audit, Name Generator, Domain Generator, Brief Generator): email collected via a Livewire action (`submitEmail()`). `filter_var` validates server-side, inserts into `tool_leads`, sets `$emailSubmitted = true`.
- **Alpine.js tools** (Cost Calculator): Alpine POSTs to `POST /tools/leads` via `fetch()` with `{tool, email}`. The `storeLead` controller method validates and inserts, returns `{success: true}` or `{error: '...'}`. Alpine then removes the blur class on success.

**Livewire state:** `$emailSubmitted` boolean property. When `true`, Blade removes the blur wrapper and overlay.

---

## Per-Tool Logic

### 1. Free SEO Audit (`SeoAudit.php`)

Uses Laravel's `Http::get($url)` with a 10-second timeout. Parses HTML with PHP's `DOMDocument`.

Checks (each returns `pass` / `warn` / `fail` + message):

| Check | Pass | Warn | Fail |
|---|---|---|---|
| Title tag | 50–60 chars | <50 or >60 chars | Missing |
| Meta description | 120–160 chars | <120 or >160 chars | Missing |
| H1 tag | Exactly 1 | >1 | Missing |
| H2 tags | ≥1 present | — | Missing |
| Canonical tag | Present | — | Missing |
| Robots meta | Not noindex | — | noindex found |
| Images without alt | 0 missing | 1–3 missing | >3 missing |
| Response time | <1000ms | 1000–2500ms | >2500ms |
| robots.txt | Fetchable (200) | — | 404/error |
| sitemap.xml | Fetchable (200) | — | 404/error |

**Score:** Equal weighting — 10 checks × 10 points each = 100 max. Pass = 10 pts, warn = 5 pts, fail = 0 pts.

**Error handling:** If the URL is unreachable or returns a non-2xx response, show an error state with "We couldn't reach that URL. Check it's publicly accessible and try again."

### 2. Website Cost Calculator (Alpine.js)

Inputs → price range mapping (₦):

| Option | Min add | Max add |
|---|---|---|
| Basic brochure site (1–5 pages) | 150,000 | 400,000 |
| Business site (6–15 pages) | 400,000 | 900,000 |
| E-commerce | 600,000 | 1,500,000 |
| Custom web app | 1,200,000 | 4,000,000 |
| Blog/CMS | +100,000 | +250,000 |
| Booking system | +150,000 | +400,000 |
| Payment integration | +100,000 | +300,000 |
| Animations/motion | +80,000 | +200,000 |
| Urgent timeline (<2 weeks) | +20% | +20% |
| Monthly maintenance | shown separately as ₦30k–₦80k/mo |

Output: "Estimated range: ₦X – ₦Y" updating live as checkboxes change.

### 3. Business Name Generator (`BusinessNameGenerator.php`)

Inputs: keyword(s) (text), industry (dropdown with 15 options).

Logic: Combine keyword with curated word arrays:
- **Suffixes:** Hub, Labs, Pro, HQ, Co, Group, Digital, Media, Works, Agency, Studio, Solutions, Global, Connect, Africa, Ng, Plus, Edge, 360, Partners
- **Prefixes:** Smart, Prime, Swift, Bold, Peak, Apex, Nova, Nexus, Elite, Pure
- **Industry-specific terms:** e.g. for Tech → Tech, Soft, Dev, Byte; for Finance → Fin, Pay, Vest, Cap

Returns 20–30 unique combinations, deduplicated, displayed as copyable chips. Shuffle order on each generation.

### 4. Domain Name Generator (`DomainNameGenerator.php`)

Same word-list logic as Business Name Generator. Additionally:
- Appends TLDs: `.com`, `.ng`, `.co`, `.io`, `.africa`, `.com.ng`
- Strips spaces, lowercases, removes special characters
- Flags names >15 characters as "long — may be hard to remember"
- Does not do live WHOIS — shows "Check availability" link to `domainr.com/?q={domain}`

### 5. Website Brief Generator (`WebsiteBriefGenerator.php`)

3-step Livewire wizard using `$step` property (1, 2, 3):

**Step 1 — Business Info:**
- Business name (text)
- Industry (dropdown)
- Target audience (text)
- Location / market (text)

**Step 2 — Website Goals:**
- Primary goal (radio: generate leads / sell products / share information / build credibility)
- Pages needed (checkboxes: Home, About, Services, Blog, Portfolio, Contact, Shop)
- Design style (radio: clean & minimal / bold & modern / classic & elegant / playful & vibrant)

**Step 3 — Budget & Timeline:**
- Estimated budget (select: Under ₦200k / ₦200k–₦500k / ₦500k–₦1.5m / ₦1.5m+)
- Timeline (select: ASAP / 2–4 weeks / 1–3 months / Flexible)
- Additional notes (textarea, optional)

**Output:** Rendered Blade partial formatted as a professional brief — can be printed via `window.print()`. Print CSS hides nav/footer.

### 6. WhatsApp Link Generator (Alpine.js)

Inputs:
- Country code (select, defaults to +234 Nigeria)
- Phone number (text, numeric only)
- Pre-filled message (textarea, optional)

Output: `https://wa.me/{countrycode}{number}?text={urlEncodedMessage}`

Features:
- Live link preview below inputs
- Copy-to-clipboard button
- QR code generated client-side using `qrcode.js` (CDN, loaded on this page only via `@push('scripts')`)
- No email gate

### 7. Invoice Generator (Alpine.js)

Fields:
- From: business name, email, address (textarea)
- To: client name, email, address (textarea)
- Invoice number (text, auto-suggested as INV-001)
- Invoice date, due date (date inputs)
- Line items: description, qty, unit price (₦) — add/remove rows
- Tax % toggle (0%, 7.5% VAT, custom %)
- Notes / payment terms (textarea)

Calculated live: subtotal, tax amount, total.

**PDF:** `window.print()` triggered by "Download PDF" button. Print-specific CSS hides everything except the invoice preview panel. No external PDF library.

No email gate.

---

## CSS & Assets

- Add `resources/css/public/pages/tools.css` to `vite.config.js` inputs.
- `qrcode.js` loaded via `@push('scripts')` on the WhatsApp tool page only (CDN).
- No other new JS dependencies.

---

## Files Checklist

```
app/Http/Controllers/ToolController.php
app/Livewire/Tools/SeoAudit.php
app/Livewire/Tools/BusinessNameGenerator.php
app/Livewire/Tools/DomainNameGenerator.php
app/Livewire/Tools/WebsiteBriefGenerator.php
resources/views/livewire/tools/seo-audit.blade.php
resources/views/livewire/tools/business-name-generator.blade.php
resources/views/livewire/tools/domain-name-generator.blade.php
resources/views/livewire/tools/website-brief-generator.blade.php
resources/views/tools/hub.blade.php
resources/views/tools/seo-audit.blade.php
resources/views/tools/cost-calculator.blade.php
resources/views/tools/business-name-generator.blade.php
resources/views/tools/domain-name-generator.blade.php
resources/views/tools/website-brief-generator.blade.php
resources/views/tools/whatsapp-link-generator.blade.php
resources/views/tools/invoice-generator.blade.php
resources/css/public/pages/tools.css
database/migrations/2026_06_01_000002_create_tool_leads_table.php
app/Models/ToolLead.php
routes/web.php  (updated)
vite.config.js  (updated)
```

---

## Out of Scope (MVP)

- Filament admin resource for viewing leads
- Email sent to user with their results
- Saving/sharing results via URL
- Live WHOIS domain availability checking
- Rate limiting on tool usage
