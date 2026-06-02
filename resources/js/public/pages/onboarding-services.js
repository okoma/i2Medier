export default         [
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

