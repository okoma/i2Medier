<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Models\Client;
use App\Models\OnboardingAddon;
use App\Models\OnboardingTask;
use App\Models\OnboardingServiceVariant;
use App\Models\OnboardingService;
use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use App\Models\Project;
use App\Models\SupportTicket;
use App\Models\TeamMember;
use App\Models\User;
use App\Support\Honeypot;
use App\Support\SiteSettings as SiteSettingsManager;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('welcome', [
            'inHouseProducts' => PortfolioProject::query()
                ->published()
                ->inhouse()
                ->orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->latest('published_at')
                ->limit(3)
                ->get(),
            'seo' => $this->seo(
                'Digital Agency in Nigeria | i2Medier',
                'i2Medier is a premium digital agency in Nigeria delivering web design, WordPress development, UI/UX design, Laravel applications, business email setup, and website maintenance for businesses across Nigeria, the UK, and worldwide.',
                [
                    'path' => '/',
                    'keywords' => 'digital agency Nigeria, web design Nigeria, web design Port Harcourt, WordPress development Nigeria, UI UX design Nigeria, website maintenance Nigeria, Laravel development Nigeria, web agency Lagos, business email setup Nigeria, SEO services Nigeria, digital agency Port Harcourt',
                    'schema_type' => 'WebSite',
                ],
            ),
        ]);
    }

    public function services(): View
    {
        return view('site.services', [
            'seo' => $this->seo(
                'Digital Services — Web, Apps & More | i2Medier',
                'Explore i2Medier services including web design, WordPress development, Laravel applications, mobile app development, SEO, UI/UX design, business email setup, and cloud architecture.',
                [
                    'path' => '/services',
                    'keywords' => 'web design services, WordPress development, Laravel development, mobile app development, SEO services, UI UX design, cloud architecture, business email setup',
                    'schema_type' => 'CollectionPage',
                ],
            ),
        ]);
    }

    public function webDesign(): View
    {
        return view('site.single-service-web-design', [
            'seo' => $this->seo(
                'Web Design Company in Nigeria | i2Medier',
                'Custom web design and development by i2Medier. We build fast, high-converting business websites, landing pages, and bespoke digital experiences for ambitious brands worldwide.',
                [
                    'path' => '/services/web-design',
                    'keywords' => 'web design services, website development Nigeria, business website design, landing page design, custom website development, web design agency Nigeria',
                    'schema_type' => 'Service',
                    'service_type' => 'Web Design & Development',
                ],
            ),
        ]);
    }

    public function wordpressDevelopment(): View
    {
        return view('site.single-service-wordpress-development', [
            'seo' => $this->seo(
                'WordPress Development Company in Nigeria | i2Medier',
                'Custom WordPress website design and development by i2Medier. We build fast, secure, SEO-optimised WordPress websites and WooCommerce stores for businesses worldwide.',
                [
                    'path' => '/services/wordpress-development',
                    'keywords' => 'WordPress development Nigeria, WordPress web design, custom WordPress theme, WordPress developer, WordPress website Nigeria, WordPress maintenance',
                    'schema_type' => 'Service',
                    'service_type' => 'WordPress Development',
                ],
            ),
        ]);
    }

    public function laravelDevelopment(): View
    {
        return view('site.single-service-laravel-development', [
            'seo' => $this->seo(
                'Laravel Development Company in Nigeria | i2Medier',
                'Expert Laravel web application development by i2Medier. We build custom SaaS platforms, business portals, REST APIs, and complex web applications for clients worldwide.',
                [
                    'path' => '/services/laravel-development',
                    'keywords' => 'Laravel development Nigeria, Laravel developer, custom web application development, Laravel SaaS, Laravel REST API, Laravel Filament, custom PHP application',
                    'schema_type' => 'Service',
                    'service_type' => 'Laravel Development',
                ],
            ),
        ]);
    }

    public function mobileAppDevelopment(): View
    {
        return view('site.single-service-mobile-app-development', [
            'seo' => $this->seo(
                'Mobile App Development Company in Nigeria | i2Medier',
                'Professional mobile app development by i2Medier. We build native iOS, Android, and cross-platform apps for startups and businesses of all sizes worldwide.',
                [
                    'path' => '/services/mobile-app-development',
                    'keywords' => 'mobile app development Nigeria, iOS app developer Nigeria, Android app development, React Native developer Nigeria, cross-platform app development',
                    'schema_type' => 'Service',
                    'service_type' => 'Mobile App Development',
                ],
            ),
        ]);
    }

    public function searchOptimization(): View
    {
        return view('site.single-service-search-optimization', [
            'seo' => $this->seo(
                'SEO Services Company in Nigeria | i2Medier',
                'Professional SEO services by i2Medier. We help businesses rank higher on Google through technical SEO, on-page optimisation, content strategy, local SEO, and measurable reporting.',
                [
                    'path' => '/services/search-optimization',
                    'keywords' => 'SEO services Nigeria, search engine optimisation Nigeria, technical SEO, local SEO Nigeria, on-page SEO, Google ranking Nigeria, SEO agency Lagos',
                    'schema_type' => 'Service',
                    'service_type' => 'Search Optimization',
                ],
            ),
        ]);
    }

    public function uiUxDesign(): View
    {
        return view('site.single-service-ui-ux-design', [
            'seo' => $this->seo(
                'UI/UX Design Company in Nigeria | i2Medier',
                'Professional UI/UX design services by i2Medier. We create user-centred Figma designs, interactive prototypes, and scalable design systems for web and mobile products.',
                [
                    'path' => '/services/ui-ux-design',
                    'keywords' => 'UI UX design Nigeria, UX design agency, Figma design services, product design agency, web app design, mobile app UI design, design system',
                    'schema_type' => 'Service',
                    'service_type' => 'UI/UX Design',
                ],
            ),
        ]);
    }

    public function businessEmailSetup(): View
    {
        return view('site.single-service-business-email-setup', [
            'seo' => $this->seo(
                'Business Email Setup Company in Nigeria | i2Medier',
                'Professional business email setup by i2Medier. We configure custom domain email on Google Workspace, Microsoft 365, Zoho Mail, and cPanel for businesses worldwide.',
                [
                    'path' => '/services/business-email-setup',
                    'keywords' => 'business email setup Nigeria, Google Workspace setup Nigeria, Microsoft 365 setup Nigeria, custom domain email Nigeria, business email hosting',
                    'schema_type' => 'Service',
                    'service_type' => 'Business Email Setup',
                ],
            ),
        ]);
    }

    public function whiteLabel(): View
    {
        return view('site.single-service-white-label', [
            'seo' => $this->seo(
                'White Label Web Design Company in Nigeria | i2Medier',
                'White label web design, development, SEO, and digital services for agencies. We deliver under your brand, sign NDAs, and remain completely invisible to your clients.',
                [
                    'path' => '/services/white-label',
                    'keywords' => 'white label web design Nigeria, white label development agency Nigeria, white label digital services, agency outsourcing Nigeria, white label WordPress development, white label Laravel development',
                    'schema_type' => 'Service',
                    'service_type' => 'White Label Services',
                ],
            ),
        ]);
    }

    public function emailDeliverability(): View
    {
        return view('site.single-service-email-deliverability', [
            'seo' => $this->seo(
                'Email Deliverability Services in Nigeria | i2Medier',
                'Email deliverability services by i2Medier. We fix SPF, DKIM and DMARC, remove domain blacklistings, set up cold email infrastructure, and repair sender reputation so your emails land in inboxes, not spam.',
                [
                    'path' => '/services/email-deliverability',
                    'keywords' => 'email deliverability Nigeria, fix emails going to spam Nigeria, SPF DKIM DMARC setup Nigeria, blacklist removal Nigeria, cold email setup Nigeria, email reputation repair',
                    'schema_type' => 'Service',
                    'service_type' => 'Email Deliverability',
                ],
            ),
        ]);
    }

    public function websiteMaintenance(): View
    {
        return view('site.single-service-website-maintenance', [
            'seo' => $this->seo(
                'Website Maintenance Company in Nigeria | i2Medier',
                'Professional website maintenance services by i2Medier for WordPress, Laravel, custom PHP, React, Next.js, e-commerce stores, and business websites. We handle updates, backups, uptime monitoring, security scans, and emergency support.',
                [
                    'path' => '/services/website-maintenance',
                    'keywords' => 'website maintenance Nigeria, WordPress maintenance Nigeria, Laravel maintenance Nigeria, website support Nigeria, website care plan, website backup service, uptime monitoring Nigeria, hacked website recovery, monthly website maintenance',
                    'schema_type' => 'Service',
                    'service_type' => 'Website Maintenance',
                ],
            ),
        ]);
    }

    public function wordpressMaintenance(): View
    {
        return view('site.single-service-wordpress-maintenance', [
            'seo' => $this->seo(
                'WordPress Maintenance Company in Nigeria | i2Medier',
                'Professional WordPress maintenance services by i2Medier. We keep WordPress websites and WooCommerce stores secure, updated, backed up, monitored, and performing properly with monthly reports and emergency support.',
                [
                    'path' => '/services/wordpress-maintenance',
                    'keywords' => 'WordPress maintenance Nigeria, WooCommerce maintenance, WordPress support Nigeria, WordPress care plan, WordPress backup service, WordPress malware cleanup, WordPress updates service',
                    'schema_type' => 'Service',
                    'service_type' => 'WordPress Maintenance',
                ],
            ),
        ]);
    }

    public function cloudArchitecture(): View
    {
        return view('site.single-service-cloud-architecture', [
            'seo' => $this->seo(
                'Cloud Architecture Services in Nigeria | i2Medier',
                'Expert cloud architecture and infrastructure services by i2Medier. We design, deploy, and manage scalable cloud infrastructure on AWS, DigitalOcean, and Cloudflare for businesses worldwide.',
                [
                    'path' => '/services/cloud-architecture',
                    'keywords' => 'cloud architecture Nigeria, cloud infrastructure services, AWS deployment Nigeria, DigitalOcean setup, cloud migration, DevOps Nigeria, CI CD pipeline setup',
                    'schema_type' => 'Service',
                    'service_type' => 'Cloud Architecture',
                ],
            ),
        ]);
    }

    public function saasApplication(): View
    {
        return view('site.single-service-saas-application', [
            'seo' => $this->seo(
                'SaaS Application Development Company in Nigeria | i2Medier',
                'Expert SaaS application development by i2Medier. We build subscription-ready software products with strong foundations for onboarding, user accounts, admin workflows, and recurring growth.',
                [
                    'path' => '/services/saas-application',
                    'keywords' => 'SaaS development Nigeria, SaaS application development, subscription software development, SaaS platform Nigeria, multi-tenant SaaS, Laravel SaaS developer',
                    'schema_type' => 'Service',
                    'service_type' => 'SaaS Application Development',
                ],
            ),
        ]);
    }

    public function ecommerceWebsite(): View
    {
        return view('site.single-service-ecommerce-website', [
            'seo' => $this->seo(
                'Ecommerce Website Development Company in Nigeria | i2Medier',
                'Premium e-commerce website development by i2Medier. We build online stores with WooCommerce, Shopify, and custom Laravel — platform fit, smooth checkout, and the operational systems needed for serious selling.',
                [
                    'path' => '/services/ecommerce-website',
                    'keywords' => 'ecommerce website development Nigeria, online store development, WooCommerce developer Nigeria, Shopify developer Nigeria, custom ecommerce platform, ecommerce website Nigeria',
                    'schema_type' => 'Service',
                    'service_type' => 'E-Commerce Website Development',
                ],
            ),
        ]);
    }

    public function whoWeHelp(): View
    {
        return view('site.who-we-help', [
            'seo' => $this->seo(
                'Industry Website Design Services | i2Medier',
                'Explore the industries i2Medier serves with dedicated web design, development, and digital growth solutions for firms, agencies, schools, clinics, and service brands.',
                [
                    'path' => '/who-we-help',
                    'keywords' => 'industry web design, law firm website design, accounting firm website design, clinic website design, school website design, real estate website design',
                    'schema_type' => 'CollectionPage',
                ],
            ),
        ]);
    }

    public function contact(): View
    {
        return view('site.contact', [
            'contact' => $this->contactDetails(),
            'seo' => $this->seo(
                'Contact Us - i2Medier',
                'Contact i2Medier for web design, Laravel development, WordPress development, SEO, mobile apps, cloud architecture, and digital growth projects. Reach us by phone, email, social links, map, or our YB Local profile.',
                [
                    'path' => '/contact',
                    'keywords' => 'contact i2Medier, web design agency contact Nigeria, Laravel agency Lagos, SEO agency contact, digital agency contact page',
                    'schema_type' => 'ContactPage',
                ],
            ),
        ]);
    }

    public function storeContact(Request $request): JsonResponse
    {
        Honeypot::ensureValid($request);

        $validated = $request->validate([
            'department_email' => ['required', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
            'source_page' => ['nullable', 'string', 'max:255'],
        ]);

        $department = $this->contactDepartmentFor($validated['department_email']);
        $linkedUser = User::query()
            ->whereRaw('LOWER(email) = ?', [Str::lower($validated['email'])])
            ->first();

        $ticket = SupportTicket::query()->create([
            'ticket_number' => 'TKT-' . now()->format('Y') . '-' . Str::upper(Str::random(6)),
            'client_id' => $linkedUser?->client_id,
            'submitted_by' => $linkedUser?->id,
            'requester_name' => $validated['name'],
            'requester_email' => $validated['email'],
            'requester_phone' => $validated['phone'] ?: null,
            'requester_company' => $validated['company'] ?: null,
            'subject' => $validated['subject'] ?: ('New ' . $department['label'] . ' enquiry'),
            'description' => $validated['message'],
            'status' => 'open',
            'priority' => 'medium',
            'category' => $department['category'],
            'department' => $department['key'],
            'department_email' => $department['email'],
            'source' => 'public_contact',
            'channel' => 'web',
            'source_page' => $validated['source_page'] ?: '/contact',
        ]);

        try {
            Notification::route('mail', $department['email'])
                ->notify(new \App\Notifications\SupportTicketSubmittedNotification($ticket, $department['label']));
        } catch (Throwable $exception) {
            report($exception);
        }

        return response()->json([
            'success' => true,
            'ticket_number' => $ticket->ticket_number,
        ]);
    }

    public function start(Request $request): View
    {
        $onboardingCatalog = $this->publicOnboardingCatalog();
        $portalPrefill = $this->portalOnboardingPrefill($request);

        return view('site.onboarding', [
            'onboardingCatalog' => $onboardingCatalog,
            'onboardingPreset' => $this->onboardingPreset($request, $onboardingCatalog, $portalPrefill),
            'contact' => $this->contactDetails(),
            'seo' => $this->seo(
                'Start a Project - i2Medier',
                'Tell i2Medier about your project, select the services you need, choose useful add-ons, and receive a tailored, itemised proposal within 24 hours.',
                [
                    'path' => '/start',
                    'keywords' => 'start a project, digital project onboarding, website quote form, web design quote Nigeria, Laravel project enquiry, WordPress quote request, i2Medier onboarding',
                    'schema_type' => 'WebPage',
                ],
            ),
        ]);
    }

    public function storeStart(Request $request): JsonResponse
    {
        Honeypot::ensureValid($request);

        // Support both JSON and multipart/form-data (the latter carries a PDF brief file).
        $raw = $request->isJson()
            ? $request->all()
            : json_decode($request->input('payload', '{}'), true);

        abort_if(! is_array($raw), 422, 'Invalid request payload.');

        $validated = Validator::make($raw, [
            'contact.name' => ['required', 'string', 'max:255'],
            'contact.business' => ['required', 'string', 'max:255'],
            'contact.email' => ['required', 'email:rfc,dns', 'max:255'],
            'contact.phone' => ['required', 'string', 'max:255'],
            'contact.country' => ['required', 'string', 'max:255'],
            'services' => ['required', 'array', 'min:1'],
            'services.*.id' => ['required', 'string', 'max:255'],
            'services.*.platform' => ['nullable', 'string', 'max:255'],
            'services.*.pages' => ['nullable', 'array'],
            'services.*.pages.*' => ['string', 'max:100'],
            'services.*.addons' => ['array'],
            'services.*.addons.*.id' => ['required', 'string', 'max:255'],
            'services.*.addons.*.quantity' => ['nullable', 'integer', 'min:1'],
            'brief.timeline' => ['required', 'string', 'max:255'],
            'brief.budget' => ['nullable', 'string', 'max:255'],
            'brief.source' => ['nullable', 'string', 'max:255'],
            'brief.domain_preference' => ['nullable', 'string', 'max:255'],
            'brief.hosting_preference' => ['nullable', 'string', 'max:255'],
            'brief.message' => ['nullable', 'string', 'max:5000'],
            'terms_accepted' => ['accepted'],
            'source_page' => ['nullable', 'string', 'max:255'],
            'source_label' => ['nullable', 'string', 'max:255'],
        ])->validate();

        $briefPdfPath = null;
        if ($request->hasFile('brief_pdf')) {
            $request->validate(['brief_pdf' => ['file', 'mimes:pdf', 'max:10240']]);
            $briefPdfPath = $request->file('brief_pdf')->store('briefs', 'public');
        }

        $isPortalSubmission = $request->routeIs('portal.start-project.store');
        $portalUser = $isPortalSubmission ? $request->user() : null;
        $portalClient = $portalUser?->client;

        $catalog = OnboardingService::query()
            ->where('is_active', true)
            ->with([
                'addons' => fn ($query) => $query->where('is_active', true)->orderBy('sort_order'),
                'variants' => fn ($query) => $query->where('is_active', true)->orderBy('sort_order')->with([
                    'addons' => fn ($addonQuery) => $addonQuery->where('is_active', true)->orderBy('sort_order'),
                ]),
            ]);

        if (! $isPortalSubmission) {
            $catalog->where('show_on_public_onboarding', true);
        }

        $catalog = $catalog
            ->get()
            ->keyBy('key');

        $resolvedSelections = collect($validated['services'])->map(function (array $servicePayload) use ($catalog): array {
            /** @var OnboardingService|null $service */
            $service = $catalog->get($servicePayload['id']);

            abort_unless($service !== null, 422, 'One of the selected services is no longer available.');

            /** @var OnboardingServiceVariant|null $variant */
            $variant = null;
            if (filled($servicePayload['platform'] ?? null)) {
                $variant = $service->variants->firstWhere('key', $servicePayload['platform']);
                abort_unless($variant !== null, 422, "The selected direction for {$service->name} is invalid.");
            }

            if ($service->variants->isNotEmpty() && $variant === null) {
                abort(422, "Please choose a direction for {$service->name}.");
            }

            $availableAddons = ($variant?->addons ?? $service->addons)->keyBy('key');

            $addons = collect($servicePayload['addons'] ?? [])->map(function (array $addonPayload) use ($availableAddons, $service, $variant): array {
                /** @var OnboardingAddon|null $addon */
                $addon = $availableAddons->get($addonPayload['id']);

                $contextName = $variant?->name ?? $service->name;
                abort_unless($addon !== null, 422, "The add-on selection for {$contextName} is invalid.");

                $quantity = $addon->is_quantity_based ? max(1, (int) ($addonPayload['quantity'] ?? 1)) : 1;

                return [
                    'addon' => $addon,
                    'quantity' => $quantity,
                ];
            })->values();

            return [
                'service' => $service,
                'variant' => $variant,
                'addons' => $addons,
                'pages' => array_values(array_filter(
                    array_map('strval', $servicePayload['pages'] ?? [])
                )),
            ];
        })->values();

        $owner = $this->primaryAgencyUser();
        $contact = $validated['contact'];
        $brief = $validated['brief'] ?? [];
        $domainOnboarding = $this->buildDomainOnboarding($brief);
        $hostingOnboarding = $this->buildHostingOnboarding($brief);

        $servicesSnapshot = $resolvedSelections->map(function (array $selection): array {
            /** @var OnboardingService $service */
            $service = $selection['service'];
            /** @var OnboardingServiceVariant|null $variant */
            $variant = $selection['variant'];
            $billable = $variant ?? $service;

            return [
                'service_id' => $service->id,
                'service_key' => $service->key,
                'service_name' => $service->name,
                'variant_id' => $variant?->id,
                'variant_key' => $variant?->key,
                'variant_name' => $variant?->name,
                'price' => (float) $billable->base_price,
                'currency' => $billable->currency,
                'billing_type' => $billable->billing_type,
                'billing_cycle' => $billable->billing_cycle,
                'addons' => collect($selection['addons'])->map(function (array $addonSelection): array {
                    /** @var OnboardingAddon $addon */
                    $addon = $addonSelection['addon'];
                    $quantity = $addonSelection['quantity'];

                    return [
                        'addon_id' => $addon->id,
                        'addon_key' => $addon->key,
                        'addon_name' => $addon->name,
                        'quantity' => $quantity,
                        'unit_price' => (float) $addon->price,
                        'total_price' => (float) ($addon->price * $quantity),
                        'currency' => $addon->currency,
                        'billing_type' => $addon->billing_type,
                        'billing_cycle' => $addon->billing_cycle,
                    ];
                })->values()->all(),
                'pages' => $selection['pages'],
            ];
        })->values()->all();

        $result = DB::transaction(function () use ($validated, $servicesSnapshot, $owner, $contact, $brief, $briefPdfPath, $domainOnboarding, $hostingOnboarding, $portalClient, $portalUser): array {
            if ($portalClient) {
                $portalClient->forceFill([
                    'company_name' => $contact['business'],
                    'contact_name' => $contact['name'],
                    'email' => $contact['email'],
                    'phone' => $contact['phone'],
                    'whatsapp_number' => $contact['phone'],
                    'country' => $contact['country'],
                ])->save();

                $client = $portalClient;
            } else {
                $client = Client::query()->create([
                    'company_name' => $contact['business'],
                    'contact_name' => $contact['name'],
                    'email' => $contact['email'],
                    'phone' => $contact['phone'],
                    'whatsapp_number' => $contact['phone'],
                    'country' => $contact['country'],
                    'status' => 'lead',
                    'created_by' => $owner?->id,
                ]);
            }

            $project = Project::query()->create([
                'client_id' => $client->id,
                'created_by' => $portalUser?->id ?? $owner?->id,
                'status' => ProjectStatus::Enquiry,
                'timeline' => $brief['timeline'] ?? null,
                'budget' => $brief['budget'] ?? null,
                'source' => $brief['source'] ?? null,
                'domain_preference' => $brief['domain_preference'] ?? null,
                'hosting_preference' => $brief['hosting_preference'] ?? null,
                'domain_onboarding' => $domainOnboarding,
                'hosting_onboarding' => $hostingOnboarding,
                'message' => $brief['message'] ?? null,
                'brief_pdf' => $briefPdfPath,
                'source_page' => $validated['source_page'] ?? null,
                'source_label' => $validated['source_label'] ?? null,
                'services' => $servicesSnapshot,
                'terms_accepted_at' => now(),
                'reference' => $this->generateProjectReference(),
            ]);

            $this->seedOnboardingTasks($project, $domainOnboarding, $hostingOnboarding, $servicesSnapshot);

            return [
                'client' => $client,
                'project' => $project,
            ];
        });

        try {
            Notification::route('mail', $result['client']->email)
                ->notify(new \App\Notifications\ProjectSubmittedClientNotification(
                    $result['project'],
                    $result['client']->contact_name,
                ));
        } catch (Throwable $exception) {
            report($exception);
        }

        if ($owner?->email) {
            try {
                Notification::route('mail', $owner->email)
                    ->notify(new \App\Notifications\ProjectSubmittedTeamNotification(
                        $result['project'],
                        $result['client'],
                    ));
            } catch (Throwable $exception) {
                report($exception);
            }
        }

        return response()->json([
            'message' => 'Your enquiry has been logged successfully.',
            'reference' => $result['project']->reference,
            'project_id' => $result['project']->id,
            'client_id' => $result['client']->id,
        ], 201);
    }

    private function onboardingPreset(Request $request, array $catalog, array $contactPrefill = []): array
    {
        $services = collect(explode(',', (string) $request->query('services', '')))
            ->map(fn (string $value): string => trim($value))
            ->filter()
            ->values();

        $serviceMap = collect($catalog)->keyBy('id');
        $validServices = $services->filter(fn (string $serviceId): bool => $serviceMap->has($serviceId))->values();

        $platform = trim((string) $request->query('platform', ''));
        $addons = collect(explode(',', (string) $request->query('addons', '')))
            ->map(fn (string $value): string => trim($value))
            ->filter()
            ->values();

        $validPlatform = '';
        if ($platform !== '' && $validServices->count() === 1) {
            $service = $serviceMap->get($validServices->first());
            $platforms = collect($service['platforms'] ?? [])->pluck('id');
            if ($platforms->contains($platform)) {
                $validPlatform = $platform;
            }
        }

        $validAddons = $addons->filter(function (string $addonId) use ($validServices, $serviceMap, $validPlatform): bool {
            foreach ($validServices as $serviceId) {
                $service = $serviceMap->get($serviceId);
                $serviceAddons = collect($service['addons'] ?? [])->pluck('id');

                if ($serviceAddons->contains($addonId)) {
                    return true;
                }

                foreach ($service['platforms'] ?? [] as $platform) {
                    if ($validPlatform !== '' && $platform['id'] !== $validPlatform) {
                        continue;
                    }

                    if (collect($platform['addons'] ?? [])->pluck('id')->contains($addonId)) {
                        return true;
                    }
                }
            }

            return false;
        })->values();

        $locked = $request->boolean('locked') && $validServices->count() > 0;

        return [
            'services'     => $validServices->all(),
            'platform'     => $validPlatform,
            'addons'       => $validAddons->all(),
            'contact'      => $contactPrefill,
            'source_page'  => trim((string) $request->query('source_page', '')),
            'source_label' => trim((string) $request->query('source_label', '')),
            'locked'       => $locked,
        ];
    }

    private function portalOnboardingPrefill(Request $request): array
    {
        $prefill = $request->session()->pull('portal_onboarding_prefill', []);

        if (! is_array($prefill)) {
            return [];
        }

        return [
            'name' => trim((string) ($prefill['name'] ?? '')),
            'business' => trim((string) ($prefill['business'] ?? '')),
            'email' => trim((string) ($prefill['email'] ?? '')),
            'phone' => trim((string) ($prefill['phone'] ?? '')),
            'country' => trim((string) ($prefill['country'] ?? '')),
        ];
    }

    private function onboardingCatalog(): array
    {
        return OnboardingService::query()
            ->where('is_active', true)
            ->with([
                'addons' => fn ($query) => $query->where('is_active', true)->orderBy('sort_order'),
                'variants' => fn ($query) => $query->where('is_active', true)->orderBy('sort_order')->with([
                    'addons' => fn ($addonQuery) => $addonQuery->where('is_active', true)->orderBy('sort_order'),
                ]),
            ])
            ->orderBy('sort_order')
            ->get()
            ->map(function (OnboardingService $service): array {
                return [
                    'id' => $service->key,
                    'name' => $service->name,
                    'desc' => $service->description,
                    'icon' => $service->icon,
                    'price' => (float) $service->base_price,
                    'priceLabel' => $service->price_label,
                    'type' => $service->billing_type === 'recurring' ? 'monthly' : 'one-time',
                    'showOnPublicOnboarding' => (bool) $service->show_on_public_onboarding,
                    'addons' => $service->addons->map(fn ($addon): array => $this->mapOnboardingAddon($addon))->values()->all(),
                    'platforms' => $service->variants->map(function ($variant): array {
                        return [
                            'id' => $variant->key,
                            'name' => $variant->name,
                            'desc' => $variant->description,
                            'price' => (float) $variant->base_price,
                            'priceLabel' => $variant->price_label,
                            'addons' => $variant->addons->map(fn ($addon): array => $this->mapOnboardingAddon($addon))->values()->all(),
                        ];
                    })->values()->all(),
                ];
            })
            ->values()
            ->all();
    }

    private function publicOnboardingCatalog(): array
    {
        return array_values(array_filter(
            $this->onboardingCatalog(),
            fn (array $service): bool => (bool) ($service['showOnPublicOnboarding'] ?? true),
        ));
    }

    private function mapOnboardingAddon($addon): array
    {
        return [
            'id' => $addon->key,
            'name' => $addon->name,
            'price' => (float) $addon->price,
            'desc' => $addon->description,
            'monthly' => $addon->billing_type === 'recurring' || $addon->billing_cycle === 'monthly',
            'quantity' => (bool) $addon->is_quantity_based,
            'quantityLabel' => $addon->quantity_label,
        ];
    }

    private function primaryAgencyUser(): ?User
    {
        return User::query()
            ->whereNull('client_id')
            ->where('is_active', true)
            ->orderBy('id')
            ->first();
    }

    private function generateProjectReference(): string
    {
        $next = (Project::query()->withTrashed()->max('id') ?? 0) + 1;

        return 'i2M-' . str_pad((string) $next, 6, '0', STR_PAD_LEFT);
    }

    private function buildDomainOnboarding(array $brief): ?array
    {
        $preference = trim((string) ($brief['domain_preference'] ?? ''));

        if ($preference === '') {
            return null;
        }

        return match ($preference) {
            'own-domain' => [
                'has_domain' => true,
                'domain_name' => null,
                'management_preference' => 'self_managed',
                'source' => 'existing_domain',
            ],
            'manage-domain' => [
                'has_domain' => true,
                'domain_name' => null,
                'management_preference' => 'i2_managed',
                'source' => 'agency_procurement',
            ],
            'unsure-domain' => [
                'has_domain' => false,
                'domain_name' => null,
                'management_preference' => null,
                'source' => 'undecided',
            ],
            default => null,
        };
    }

    private function buildHostingOnboarding(array $brief): ?array
    {
        $preference = trim((string) ($brief['hosting_preference'] ?? ''));

        if ($preference === '') {
            return null;
        }

        return match ($preference) {
            'own-hosting' => [
                'has_hosting' => true,
                'provider' => null,
                'management_preference' => 'self_managed',
                'source' => 'existing_hosting',
            ],
            'managed-hosting' => [
                'has_hosting' => true,
                'provider' => 'i2Medier Managed Hosting',
                'management_preference' => 'i2_managed',
                'source' => 'agency_hosting',
            ],
            'unsure-hosting' => [
                'has_hosting' => false,
                'provider' => null,
                'management_preference' => null,
                'source' => 'undecided',
            ],
            default => null,
        };
    }

    private function seedOnboardingTasks(Project $project, ?array $domainOnboarding, ?array $hostingOnboarding, array $servicesSnapshot): void
    {
        $tasks = [];
        $needsDomainAccess = ($domainOnboarding['has_domain'] ?? false)
            && (($domainOnboarding['management_preference'] ?? null) === 'self_managed');
        $needsHostingAccess = ($hostingOnboarding['has_hosting'] ?? false)
            && (($hostingOnboarding['management_preference'] ?? null) === 'self_managed');

        if ($needsDomainAccess || $needsHostingAccess) {
            $scope = match (true) {
                $needsDomainAccess && $needsHostingAccess => 'domain and hosting',
                $needsDomainAccess => 'domain',
                default => 'hosting',
            };

            $tasks[] = [
                'title' => 'Submit ' . $scope . ' access',
                'description' => 'Provide the login details we need to take over your ' . $scope . ' setup and continue onboarding.',
                'type' => 'domain_hosting_setup',
                'status' => 'pending',
                'sort_order' => 10,
            ];
        }

        foreach ($this->buildServiceOnboardingTasks($servicesSnapshot) as $task) {
            $tasks[] = $task;
        }

        foreach ($tasks as $task) {
            OnboardingTask::query()->create([
                'project_id' => $project->id,
                ...$task,
            ]);
        }
    }

    private function buildServiceOnboardingTasks(array $servicesSnapshot): array
    {
        $serviceKeys = collect($servicesSnapshot)
            ->pluck('service_key')
            ->filter()
            ->unique()
            ->values();

        $tasks = [];
        $sortOrder = 20;

        if ($serviceKeys->intersect(['webdesign', 'wordpress', 'ecommerce'])->isNotEmpty()) {
            $tasks[] = [
                'title' => 'Upload brand assets and content',
                'description' => 'Share your logo files, brand colours, page copy, images, and any references we should use while building your site.',
                'type' => 'content_upload',
                'status' => 'pending',
                'sort_order' => $sortOrder,
            ];
            $sortOrder += 10;
        }

        if ($serviceKeys->intersect(['uiux', 'mobileapps', 'saas', 'laravel', 'whitelabel'])->isNotEmpty()) {
            $tasks[] = [
                'title' => 'Confirm project goals and workflow',
                'description' => 'Review the delivery goals, user flows, feature priorities, and any technical constraints so we can lock the right implementation path.',
                'type' => 'kickoff_alignment',
                'status' => 'pending',
                'sort_order' => $sortOrder,
            ];
            $sortOrder += 10;
        }

        if ($serviceKeys->intersect(['seo', 'email', 'emaildeliverability', 'cloud', 'performance'])->isNotEmpty()) {
            $tasks[] = [
                'title' => 'Share technical access and operating context',
                'description' => 'Send any existing analytics, DNS, email, cloud, or platform access we need, plus context on your current setup and business priorities.',
                'type' => 'technical_intake',
                'status' => 'pending',
                'sort_order' => $sortOrder,
            ];
        }

        return $tasks;
    }

    public function portfolio(): View
    {
        $projects = PortfolioProject::query()
            ->published()
            ->with('categories')
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->latest('published_at')
            ->get();

        $categories = PortfolioCategory::query()
            ->withCount(['projects' => fn ($q) => $q->published()])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('portfolio.index', [
            'projects'   => $projects,
            'categories' => $categories,
            'seo' => $this->seo(
                'Portfolio — i2Medier',
                'See selected i2Medier work across web design, development, branding, and digital product delivery for businesses, nonprofits, and service brands.',
                [
                    'path' => '/portfolio',
                    'keywords' => 'web design portfolio, Laravel portfolio, WordPress portfolio, UI UX portfolio, agency work examples, i2Medier portfolio',
                    'schema_type' => 'CollectionPage',
                ],
            ),
        ]);
    }

    public function lawyerLanding(): View
    {
        return view('site.lawyer', [
            'seo' => $this->seo(
                'Law Firm Website Design Company in Nigeria | i2Medier',
                'Premium law firm website design by i2Medier. We build high-converting legal websites that help attorneys and law firms generate enquiries, establish authority, and win more clients.',
                [
                    'path' => '/services/web-design/law-firm-website-design',
                    'keywords' => 'law firm website design, lawyer website design Nigeria, attorney web design, legal website development, law firm SEO, lawyer landing page',
                    'schema_type' => 'Service',
                    'service_type' => 'Law Firm Website Design',
                ],
            ),
            'startUrl'      => $this->industryStartUrl('law-firm-website-design', 'Law Firm Industry Page'),
            'presetPackage' => $this->buildPresetPackage('law-firm-website-design'),
        ]);
    }

    public function webDesignIndustry(string $slug): View
    {
        $seoPages = $this->webDesignIndustrySeoPages();

        if (array_key_exists($slug, $seoPages)) {
            return $this->renderIndustrySeoPage($slug, $seoPages[$slug]);
        }

        $industries = $this->webDesignIndustries();

        if (! array_key_exists($slug, $industries)) {
            throw new NotFoundHttpException();
        }

        return view('site.web-design-industry', [
            'slug' => $slug,
            'industry' => $industries[$slug],
            'seo' => $this->seo(
                $industries[$slug]['title'] . ' | i2Medier',
                $industries[$slug]['summary'],
                [
                    'path' => '/services/web-design/' . $slug,
                    'keywords' => strtolower($industries[$slug]['title']) . ', web design services, business website design, custom website development, i2Medier',
                    'schema_type' => 'Service',
                    'service_type' => $industries[$slug]['title'],
                ],
            ),
        ]);
    }

    public function about(): View
    {
        $settings = app(SiteSettingsManager::class);

        return view('site.about', [
            'teamMembers' => TeamMember::query()->active()->ordered()->get(),
            'teamContent' => [
                'eyebrow' => $settings->aboutTeamEyebrow(),
                'heading' => $settings->aboutTeamHeading(),
                'intro' => $settings->aboutTeamIntro(),
            ],
            'seo' => $this->seo(
                'About Us — i2Medier',
                'Learn about i2Medier, our approach to premium web design and development, and how we help businesses grow with thoughtful digital systems and strategy.',
                [
                    'path' => '/about',
                    'keywords' => 'about i2Medier, web design agency Nigeria, Laravel agency, digital solutions company, premium website development',
                    'schema_type' => 'AboutPage',
                ],
            ),
        ]);
    }

    public function terms(): View
    {
        return view('site.terms', [
            'seo' => $this->seo(
                'Terms of Service — i2Medier',
                'Read the i2Medier terms of service governing our website, digital projects, maintenance retainers, and client engagements.',
                [
                    'path' => '/terms',
                    'keywords' => 'i2Medier terms of service, website terms and conditions, web design contract terms Nigeria, agency service terms',
                    'schema_type' => 'WebPage',
                ],
            ),
        ]);
    }

    public function privacy(): View
    {
        return view('site.privacy', [
            'seo' => $this->seo(
                'Privacy Policy — i2Medier',
                'Read the i2Medier privacy policy and learn how we collect, use, protect, and store website visitor and client data.',
                [
                    'path' => '/privacy',
                    'keywords' => 'i2Medier privacy policy, website privacy policy Nigeria, agency privacy policy, client data protection',
                    'schema_type' => 'WebPage',
                ],
            ),
        ]);
    }

    /**
     * @return array<string, array{view: string, title: string, description: string, keywords: string, service_type: string}>
     */
    private function webDesignIndustrySeoPages(): array
    {
        return [
            'accounting-firm-website-design' => [
                'view' => 'site.accounting-firm-web-design',
                'title' => 'Accounting Firm Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for accounting firms, tax consultants, and chartered accountants. We build credible, SEO-focused websites that rank for service searches and convert enquiries into clients.',
                'keywords' => 'accounting firm website design Nigeria, accountant website design, CPA website Nigeria, tax consultant website, chartered accountant web design, accounting firm SEO',
                'service_type' => 'Accounting Firm Website Design',
            ],
            'clinic-website-design' => [
                'view' => 'site.clinic-web-design',
                'title' => 'Clinic & Healthcare Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for clinics, hospitals, and healthcare practices. We build fast, trustworthy websites that help patients find you, book appointments, and take action online.',
                'keywords' => 'clinic website design Nigeria, hospital website design, medical website design Nigeria, doctor website design, healthcare website agency, clinic SEO Nigeria',
                'service_type' => 'Clinic Website Design',
            ],
            'real-estate-website-design' => [
                'view' => 'site.real-estate-web-design',
                'title' => 'Real Estate Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for real estate agencies and property developers. We build property websites that showcase listings clearly, attract qualified leads, and support long-term SEO growth.',
                'keywords' => 'real estate website design Nigeria, property developer website, realtor website Nigeria, estate agency web design, property listing website Nigeria',
                'service_type' => 'Real Estate Website Design',
            ],
            'marketing-agency-website-design' => [
                'view' => 'site.marketing-agency-web-design',
                'title' => 'Marketing Agency Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for marketing agencies and digital studios. We build fast, results-led agency websites that rank on Google, showcase case studies, and convert prospects into clients.',
                'keywords' => 'marketing agency website design Nigeria, digital marketing agency website, creative agency web design, social media agency website Nigeria, agency website design',
                'service_type' => 'Marketing Agency Website Design',
            ],
            'consulting-firm-website-design' => [
                'view' => 'site.consulting-firm-web-design',
                'title' => 'Consulting Firm Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for consulting firms and advisory brands. We help consultants present authority, clarify services, and generate higher-quality client enquiries online.',
                'keywords' => 'consulting firm website design Nigeria, consultant website design, advisory firm website, management consultant web design, consulting firm SEO',
                'service_type' => 'Consulting Firm Website Design',
            ],
            'construction-company-website-design' => [
                'view' => 'site.construction-company-web-design',
                'title' => 'Construction Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for construction companies, contractors, and builders. We create project-driven sites that build trust, demonstrate capability, and convert serious enquiries into clients.',
                'keywords' => 'construction company website design Nigeria, contractor website design, builder website Nigeria, construction firm web design, contractor SEO Nigeria',
                'service_type' => 'Construction Company Website Design',
            ],
            'engineering-firm-website-design' => [
                'view' => 'site.engineering-firm-web-design',
                'title' => 'Engineering Firm Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for engineering firms across civil, mechanical, electrical, and multidisciplinary disciplines. We build credible websites that strengthen positioning and improve lead flow.',
                'keywords' => 'engineering firm website design Nigeria, engineer website design, civil engineering website Nigeria, engineering company web design, engineering SEO Nigeria',
                'service_type' => 'Engineering Firm Website Design',
            ],
            'architecture-firm-website-design' => [
                'view' => 'site.architecture-firm-web-design',
                'title' => 'Architecture Firm Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for architecture firms and studios. We craft refined portfolio websites that showcase projects beautifully, support your reputation, and attract premium clients.',
                'keywords' => 'architecture firm website design Nigeria, architect website design, architecture portfolio website, architect web designer Nigeria, architecture studio website',
                'service_type' => 'Architecture Firm Website Design',
            ],
            'school-website-design' => [
                'view' => 'site.school-web-design',
                'title' => 'School & College Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for schools, academies, and colleges. We build structured, parent-friendly websites that improve admissions visibility, communicate values, and build institutional trust.',
                'keywords' => 'school website design Nigeria, education website design, private school website, college website design Nigeria, school admissions website',
                'service_type' => 'School Website Design',
            ],
            'church-website-design' => [
                'view' => 'site.church-web-design',
                'title' => 'Church & Ministry Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for churches and ministries. We build welcoming websites that help visitors discover your services, events, giving pages, and community all in one place.',
                'keywords' => 'church website design Nigeria, ministry website design, church web design, worship centre website Nigeria, church SEO Nigeria',
                'service_type' => 'Church Website Design',
            ],
            'hotel-website-design' => [
                'view' => 'site.hotel-web-design',
                'title' => 'Hotel & Resort Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for hotels, resorts, and hospitality brands. We build booking-ready websites that showcase rooms and amenities while driving more direct reservation enquiries.',
                'keywords' => 'hotel website design Nigeria, hospitality website design, resort website Nigeria, hotel booking website, hotel SEO Nigeria',
                'service_type' => 'Hotel Website Design',
            ],
            'restaurant-website-design' => [
                'view' => 'site.restaurant-web-design',
                'title' => 'Restaurant Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for restaurants, lounges, and food businesses. We build fast, appetising websites with menus, reservations, and local visibility pages that fill more tables.',
                'keywords' => 'restaurant website design Nigeria, food business website Nigeria, menu website design, restaurant SEO Nigeria, hospitality web design',
                'service_type' => 'Restaurant Website Design',
            ],
            'beauty-wellness-website-design' => [
                'view' => 'site.beauty-wellness-web-design',
                'title' => 'Beauty & Wellness Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for beauty salons, spas, skincare clinics, and wellness brands. We create elegant, polished websites that help clients discover your services and book with confidence.',
                'keywords' => 'salon website design Nigeria, spa website design, beauty brand website Nigeria, wellness website design, salon SEO Nigeria',
                'service_type' => 'Beauty and Wellness Website Design',
            ],
            'fitness-website-design' => [
                'view' => 'site.fitness-web-design',
                'title' => 'Gym & Fitness Studio Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for gyms, trainers, and fitness studios. We build high-energy websites that promote memberships, classes, and schedules while improving search visibility and enquiries.',
                'keywords' => 'gym website design Nigeria, fitness website design, trainer website Nigeria, gym SEO Nigeria, fitness studio web design',
                'service_type' => 'Fitness Website Design',
            ],
            'cleaning-company-website-design' => [
                'view' => 'site.cleaning-company-web-design',
                'title' => 'Cleaning Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for cleaning companies and facility service businesses. We create conversion-focused websites that clearly communicate services and generate more commercial enquiries.',
                'keywords' => 'cleaning company website design Nigeria, cleaning service website, janitorial website Nigeria, facility management website design, cleaning SEO Nigeria',
                'service_type' => 'Cleaning Company Website Design',
            ],
            'logistics-company-website-design' => [
                'view' => 'site.logistics-company-web-design',
                'title' => 'Logistics Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for logistics, freight, and transport companies. We build reliable, professional websites that communicate capabilities clearly and attract serious B2B enquiries.',
                'keywords' => 'logistics company website design Nigeria, transport website design, freight company website, delivery service website Nigeria, logistics SEO Nigeria',
                'service_type' => 'Logistics Company Website Design',
            ],
            'travel-agency-website-design' => [
                'view' => 'site.travel-agency-web-design',
                'title' => 'Travel Agency Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for travel agencies, tour operators, and visa consultants. We create trust-building websites that showcase packages and destinations to drive more online bookings.',
                'keywords' => 'travel agency website design Nigeria, travel website design, tourism web design Nigeria, visa agency website, travel SEO Nigeria',
                'service_type' => 'Travel Agency Website Design',
            ],
            'ecommerce-website-design' => [
                'view' => 'site.ecommerce-brand-web-design',
                'title' => 'Ecommerce Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for ecommerce and retail brands. We build fast, premium-looking online stores that showcase products effectively and convert visitors into buyers.',
                'keywords' => 'ecommerce website design Nigeria, online store design Nigeria, Shopify alternative Nigeria, retail website design, ecommerce SEO Nigeria',
                'service_type' => 'Ecommerce Website Design',
            ],
            'fashion-brand-website-design' => [
                'view' => 'site.fashion-brand-web-design',
                'title' => 'Fashion Brand Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for fashion labels, clothing brands, and style businesses. We create visually sharp brand and ecommerce websites that support storytelling, present collections, and drive sales.',
                'keywords' => 'fashion website design Nigeria, clothing brand website, designer website Nigeria, fashion ecommerce design, fashion brand SEO Nigeria',
                'service_type' => 'Fashion Brand Website Design',
            ],
            'event-planner-website-design' => [
                'view' => 'site.event-planner-web-design',
                'title' => 'Event Planner Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for event planners and event companies. We build elegant websites that showcase past events and convert enquiries for weddings, corporate, and private celebrations.',
                'keywords' => 'event planner website design Nigeria, event company website, wedding planner website Nigeria, events web design, event SEO Nigeria',
                'service_type' => 'Event Planner Website Design',
            ],
            'photography-website-design' => [
                'view' => 'site.photography-web-design',
                'title' => 'Photography Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for photographers and creative studios. We build visually led portfolio websites that let your images stand out while supporting bookings and search visibility.',
                'keywords' => 'photography website design Nigeria, photographer portfolio website, studio website Nigeria, creative portfolio web design, photographer SEO Nigeria',
                'service_type' => 'Photography Website Design',
            ],
            'personal-brand-website-design' => [
                'view' => 'site.personal-brand-web-design',
                'title' => 'Personal Brand Website Design Company in Nigeria | i2Medier',
                'description' => 'Web design for coaches, consultants, speakers, and founders. We build authority websites that package expertise, present your offers clearly, and drive long-term online visibility.',
                'keywords' => 'personal brand website design Nigeria, coach website design, speaker website Nigeria, consultant personal brand website, expert website design',
                'service_type' => 'Personal Brand Website Design',
            ],
        ];
    }

    /**
     * @param  array{view: string, title: string, description: string, keywords: string, service_type: string}  $page
     */
    private function renderIndustrySeoPage(string $slug, array $page): View
    {
        return view($page['view'], [
            'seo' => $this->seo(
                $page['title'],
                $page['description'],
                [
                    'path' => '/services/web-design/' . $slug,
                    'keywords' => $page['keywords'],
                    'schema_type' => 'Service',
                    'service_type' => $page['service_type'],
                ],
            ),
            'startUrl'      => $this->industryStartUrl($slug, $page['service_type']),
            'presetPackage' => $this->buildPresetPackage($slug),
        ]);
    }

    private function buildPresetPackage(string $slug): array
    {
        $preset  = $this->industryPresets()[$slug] ?? null;
        if (! $preset) {
            return [];
        }

        $catalog    = $this->onboardingCatalog();
        $serviceMap = collect($catalog)->keyBy('id');

        $services   = [];
        $addons     = [];
        $total      = 0;
        $hasMonthly = false;

        foreach ($preset['services'] as $serviceId) {
            $service = $serviceMap->get($serviceId);
            if (! $service) {
                continue;
            }

            $price = (float) $service['price'];

            if (! empty($preset['platform'])) {
                $platform = collect($service['platforms'] ?? [])->firstWhere('id', $preset['platform']);
                if ($platform) {
                    $price = (float) $platform['price'];
                }
            }

            $isMonthly = $service['type'] === 'monthly';
            $services[] = [
                'name'    => $service['name'],
                'price'   => $price,
                'monthly' => $isMonthly,
            ];

            if ($isMonthly) {
                $hasMonthly = true;
            } else {
                $total += $price;
            }
        }

        foreach ($preset['addons'] as $addonId) {
            foreach ($preset['services'] as $serviceId) {
                $service = $serviceMap->get($serviceId);
                if (! $service) {
                    continue;
                }

                $addon = collect($service['addons'] ?? [])->firstWhere('id', $addonId);

                if (! $addon && ! empty($preset['platform'])) {
                    $platform = collect($service['platforms'] ?? [])->firstWhere('id', $preset['platform']);
                    if ($platform) {
                        $addon = collect($platform['addons'] ?? [])->firstWhere('id', $addonId);
                    }
                }

                if ($addon) {
                    $isMonthly = $addon['monthly'] ?? false;
                    $addons[] = [
                        'name'    => $addon['name'],
                        'price'   => (float) $addon['price'],
                        'monthly' => $isMonthly,
                    ];
                    if ($isMonthly) {
                        $hasMonthly = true;
                    } else {
                        $total += (float) $addon['price'];
                    }
                    break;
                }
            }
        }

        return [
            'services'    => $services,
            'addons'      => $addons,
            'total'       => $total,
            'has_monthly' => $hasMonthly,
        ];
    }

    private function industryStartUrl(string $slug, string $sourceLabel): string
    {
        $preset = $this->industryPresets()[$slug] ?? ['services' => ['webdesign'], 'addons' => []];

        $params = [
            'services'     => implode(',', $preset['services']),
            'source_page'  => 'industry-' . $slug,
            'source_label' => $sourceLabel,
            'locked'       => '1',
        ];

        if (! empty($preset['platform'])) {
            $params['platform'] = $preset['platform'];
        }

        if (! empty($preset['addons'])) {
            $params['addons'] = implode(',', $preset['addons']);
        }

        return route('site.start', $params);
    }

    private function industryPresets(): array
    {
        return [
            'clinic-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-live-chat', 'wd-whatsapp', 'seo-local'],
            ],
            'restaurant-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-live-chat', 'wd-whatsapp', 'wd-social-feed', 'seo-local'],
            ],
            'beauty-wellness-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-gallery', 'wd-social-feed', 'wd-whatsapp', 'seo-local'],
            ],
            'hotel-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-gallery', 'wd-animation', 'wd-whatsapp', 'seo-local'],
            ],
            'fitness-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-gallery', 'wd-whatsapp', 'seo-local'],
            ],
            'real-estate-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-gallery', 'wd-whatsapp', 'seo-local'],
            ],
            'accounting-firm-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-live-chat', 'seo-local'],
            ],
            'cleaning-company-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-live-chat', 'wd-whatsapp', 'seo-local'],
            ],
            'logistics-company-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-whatsapp', 'seo-local'],
            ],
            'construction-company-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-gallery', 'seo-local'],
            ],
            'engineering-firm-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-gallery', 'seo-local'],
            ],
            'school-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-blog', 'wd-gallery', 'seo-local'],
            ],
            'church-website-design' => [
                'services' => ['webdesign'],
                'addons'   => ['wd-forms', 'wd-blog', 'wd-social-feed'],
            ],
            'consulting-firm-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-blog', 'wd-live-chat', 'seo-content'],
            ],
            'marketing-agency-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-blog', 'wd-animation', 'wd-social-feed', 'seo-content'],
            ],
            'architecture-firm-website-design' => [
                'services' => ['webdesign'],
                'addons'   => ['wd-forms', 'wd-gallery', 'wd-animation'],
            ],
            'photography-website-design' => [
                'services' => ['webdesign'],
                'addons'   => ['wd-gallery', 'wd-animation', 'wd-forms'],
            ],
            'personal-brand-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-blog', 'wd-newsletter', 'seo-content'],
            ],
            'event-planner-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-gallery', 'wd-whatsapp', 'seo-local'],
            ],
            'travel-agency-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-gallery', 'wd-blog', 'wd-whatsapp'],
            ],
            'ecommerce-website-design' => [
                'services' => ['ecommerce'],
                'platform' => 'woocommerce',
                'addons'   => ['ec-woo-abandoned-cart', 'ec-woo-loyalty'],
            ],
            'fashion-brand-website-design' => [
                'services' => ['webdesign'],
                'addons'   => ['wd-animation', 'wd-gallery', 'wd-social-feed', 'wd-newsletter'],
            ],
            'law-firm-website-design' => [
                'services' => ['webdesign', 'seo'],
                'addons'   => ['wd-forms', 'wd-live-chat', 'wd-whatsapp', 'seo-local'],
            ],
        ];
    }

    /**
     * @param  array{path?: string, keywords?: string, robots?: string, author?: string, og_type?: string, schema_type?: string, service_type?: string}  $options
     * @return array<string, string>
     */
    private function seo(string $title, string $description, array $options = []): array
    {
        return [
            'title' => $title,
            'description' => $description,
            'keywords' => $options['keywords'] ?? '',
            'url' => url($options['path'] ?? '/'),
            'robots' => $options['robots'] ?? 'index, follow',
            'author' => $options['author'] ?? 'i2Medier Konceptz',
            'og_type' => $options['og_type'] ?? 'website',
            'schema_type' => $options['schema_type'] ?? 'WebPage',
            'service_type' => $options['service_type'] ?? '',
        ];
    }

    /**
     * @return array{
     *     studio: string,
     *     email: string,
     *     phone_display: string,
     *     phone_href: string,
     *     whatsapp_href: string,
     *     address_title: string,
     *     address_lines: array<int, string>,
     *     hours: string,
     *     map_embed: string,
     *     yb_local_url: string,
     *     yb_local_label: string,
     *     socials: array<int, array{label: string, handle: string, url: string}>
     * }
     */
    private function contactDetails(): array
    {
        return [
            'studio' => 'i2Medier Konceptz Ltd.',
            'email' => 'letstalk@i2medier.com',
            'phone_display' => '+234 805 218 8396',
            'phone_href' => 'tel:+2348052188396',
            'whatsapp_href' => 'https://wa.me/2348052188396?text=Hi!%20I%27d%20like%20to%20enquire%20about%20your%20services.',
            'address_title' => 'Port Harcourt, Rivers State, Nigeria',
            'address_lines' => [
                '18 Emmanuel Close, NTA Mgbuoba',
                'Port Harcourt, Rivers State',
                'Nigeria',
            ],
            'hours' => 'Monday to Friday · 9:00 AM to 6:00 PM WAT · Saturday 10:00 AM to 2:00 PM',
            'map_embed' => 'https://www.google.com/maps?q=Port+Harcourt%2C+Nigeria&z=13&output=embed',
            'yb_local_url' => 'https://yblocal.com/your-business-profile',
            'yb_local_label' => 'View i2Medier on YB Local',
            'socials' => [
                ['label' => 'Facebook', 'handle' => 'facebook.com/i2medier', 'url' => 'https://facebook.com/i2medier'],
                ['label' => 'Instagram', 'handle' => 'instagram.com/i2medier', 'url' => 'https://www.instagram.com/i2medier'],
                ['label' => 'LinkedIn', 'handle' => 'linkedin.com/company/i2medier', 'url' => 'https://www.linkedin.com/company/i2medier'],
                ['label' => 'X', 'handle' => 'x.com/i2medier', 'url' => 'https://twitter.com/i2medier'],
                ['label' => 'YouTube', 'handle' => 'youtube.com/@i2TechStudio', 'url' => 'https://www.youtube.com/@i2TechStudio'],
            ],
        ];
    }

    /**
     * @return array{key: string, label: string, email: string, category: string}
     */
    private function contactDepartmentFor(string $email): array
    {
        $departments = collect([
            'letstalk@i2medier.com' => ['key' => 'sales', 'label' => 'Sales', 'email' => 'letstalk@i2medier.com', 'category' => 'general'],
            'design@i2medier.com' => ['key' => 'design', 'label' => 'Design', 'email' => 'design@i2medier.com', 'category' => 'general'],
            'dev@i2medier.com' => ['key' => 'development', 'label' => 'Development', 'email' => 'dev@i2medier.com', 'category' => 'technical'],
            'support@i2medier.com' => ['key' => 'support', 'label' => 'Support', 'email' => 'support@i2medier.com', 'category' => 'technical'],
            'careers@i2medier.com' => ['key' => 'careers', 'label' => 'Careers', 'email' => 'careers@i2medier.com', 'category' => 'general'],
        ]);

        return $departments->get(Str::lower($email), $departments['letstalk@i2medier.com']);
    }

    /**
     * @return array<string, array{title: string, heading: string, summary: string, audience: string, offer: string, features: array<int, string>, cta: string}>
     */
    private function webDesignIndustries(): array
    {
        return [
            'accounting-firm-website-design' => [
                'title' => 'Accounting Firm Website Design',
                'heading' => 'Web design for accounting firms that need trust, clarity, and better enquiries.',
                'summary' => 'We design accounting firm websites that communicate credibility fast, explain services clearly, and help prospects move from uncertainty to consultation.',
                'audience' => 'Built for accounting practices, tax consultants, audit firms, advisory teams, and finance-focused service brands.',
                'offer' => 'Your page structure, messaging, authority signals, and calls to action are shaped around how accounting clients evaluate providers.',
                'features' => ['Service pages for tax, audit, and advisory offers', 'Partner and team profile layouts', 'Trust-first design and clean enquiry paths', 'Lead capture forms built for serious prospects'],
                'cta' => 'Start Your Accounting Firm Website',
            ],
            'clinic-website-design' => [
                'title' => 'Clinic Website Design',
                'heading' => 'Web design for clinics that need trust, accessibility, and patient action.',
                'summary' => 'We design clinic websites that feel professional, reassuring, and easy to use for patients booking appointments or learning about care options.',
                'audience' => 'Built for medical clinics, specialist practices, dental clinics, wellness centres, and healthcare providers.',
                'offer' => 'The experience is structured around patient trust, service clarity, and low-friction booking or enquiry flows.',
                'features' => ['Appointment and enquiry conversion sections', 'Service pages for treatments and care areas', 'Trust-building layouts for doctors and teams', 'Mobile-first structure for real patient behaviour'],
                'cta' => 'Start Your Clinic Website',
            ],
            'real-estate-website-design' => [
                'title' => 'Real Estate Website Design',
                'heading' => 'Web design for real estate brands that need qualified enquiries, not empty traffic.',
                'summary' => 'We design real estate websites that help agencies, developers, and property consultants present listings, projects, and credibility with more structure and more urgency.',
                'audience' => 'Built for real estate agencies, property developers, brokers, investment firms, and property marketing teams.',
                'offer' => 'The page flow is designed to turn browsing interest into property enquiries, viewings, and investor conversations.',
                'features' => ['Listing-ready layouts and project showcase sections', 'Inquiry paths for buyers, renters, and investors', 'Trust signals for developments and track record', 'Location and property-type landing page structure'],
                'cta' => 'Start Your Real Estate Website',
            ],
            'consulting-firm-website-design' => [
                'title' => 'Consulting Firm Website Design',
                'heading' => 'Web design for consulting firms that sell expertise, trust, and transformation.',
                'summary' => 'We design consulting websites that sharpen positioning, simplify complex offers, and help serious prospects understand why your firm is worth the conversation.',
                'audience' => 'Built for strategy consultants, management firms, business advisors, transformation teams, and specialist consulting practices.',
                'offer' => 'The design focuses on authority, clarity, and premium positioning so the site supports business development instead of just existing online.',
                'features' => ['Offer pages structured around business outcomes', 'Case-study and thought-leadership sections', 'Partner and advisory profile design', 'Clear consultation and proposal CTAs'],
                'cta' => 'Start Your Consulting Website',
            ],
            'construction-company-website-design' => [
                'title' => 'Construction Company Website Design',
                'heading' => 'Web design for construction companies that need credibility, proof, and project leads.',
                'summary' => 'We design construction websites that showcase capability, communicate professionalism, and make it easier for clients to trust your team with bigger jobs.',
                'audience' => 'Built for contractors, builders, engineering contractors, infrastructure firms, and project delivery companies.',
                'offer' => 'Your website is structured around project proof, service clarity, and the authority needed to win higher-value enquiries.',
                'features' => ['Project showcase and portfolio sections', 'Service pages for construction capabilities', 'Safety, process, and trust-building content areas', 'Lead capture for tenders and project enquiries'],
                'cta' => 'Start Your Construction Website',
            ],
            'engineering-firm-website-design' => [
                'title' => 'Engineering Firm Website Design',
                'heading' => 'Web design for engineering firms that need authority, clarity, and serious business leads.',
                'summary' => 'We design engineering firm websites that help technical teams present expertise clearly and convert that expertise into real project conversations.',
                'audience' => 'Built for civil, mechanical, electrical, industrial, and specialist engineering firms.',
                'offer' => 'The design balances technical credibility with clear communication so complex capability becomes easier for clients to understand and trust.',
                'features' => ['Capability pages for engineering disciplines', 'Project and case-study storytelling', 'Team profile and certification sections', 'Lead paths for project and partnership enquiries'],
                'cta' => 'Start Your Engineering Website',
            ],
            'architecture-firm-website-design' => [
                'title' => 'Architecture Firm Website Design',
                'heading' => 'Web design for architecture firms that need elegance, clarity, and stronger project enquiries.',
                'summary' => 'We design architecture websites that feel refined, portfolio-led, and structured to make your work and process easier to understand.',
                'audience' => 'Built for architecture studios, design-led practices, interior architecture teams, and planning-focused firms.',
                'offer' => 'The experience is crafted around visual presentation, studio credibility, and enquiry paths for clients evaluating design partners.',
                'features' => ['Portfolio-first project presentation', 'Studio and principal profile layouts', 'Service pages for architecture offerings', 'Elegant enquiry and consultation flows'],
                'cta' => 'Start Your Architecture Website',
            ],
            'school-website-design' => [
                'title' => 'School Website Design',
                'heading' => 'Web design for schools that need trust, clarity, and stronger parent engagement.',
                'summary' => 'We design school websites that help parents understand your school quickly, trust your values, and take the next step toward enquiry or application.',
                'audience' => 'Built for schools, colleges, academies, training institutions, and education brands.',
                'offer' => 'The design supports enrolment, communication, and credibility while keeping the site easy to update for ongoing school operations.',
                'features' => ['Admissions and enquiry conversion sections', 'Programme and curriculum page structure', 'Parent-focused communication layouts', 'News, events, and school-life content areas'],
                'cta' => 'Start Your School Website',
            ],
            'church-website-design' => [
                'title' => 'Church Website Design',
                'heading' => 'Web design for churches that need warmth, clarity, and stronger community connection.',
                'summary' => 'We design church websites that make ministries, events, service times, and giving paths easier to find while still feeling intentional and welcoming.',
                'audience' => 'Built for churches, ministries, faith communities, and nonprofit spiritual organisations.',
                'offer' => 'The structure supports outreach, membership communication, and first-time visitor confidence.',
                'features' => ['Service times and ministry navigation', 'Giving and event-focused calls to action', 'Pastor, leadership, and community sections', 'Sermon, news, and announcement areas'],
                'cta' => 'Start Your Church Website',
            ],
            'hotel-website-design' => [
                'title' => 'Hotel Website Design',
                'heading' => 'Web design for hotels that need stronger bookings and a more premium first impression.',
                'summary' => 'We design hotel websites that present rooms, amenities, and brand experience in a way that supports direct booking and higher trust.',
                'audience' => 'Built for hotels, resorts, boutique stays, serviced apartments, and hospitality brands.',
                'offer' => 'The user experience is designed around booking confidence, room presentation, and mobile-first guest behaviour.',
                'features' => ['Room and amenity showcase layouts', 'Booking-focused user journeys', 'Gallery and experience sections', 'Trust-building content for direct reservations'],
                'cta' => 'Start Your Hotel Website',
            ],
            'restaurant-website-design' => [
                'title' => 'Restaurant Website Design',
                'heading' => 'Web design for restaurants that need more bookings, more orders, and better brand feel.',
                'summary' => 'We design restaurant websites that make menus, reservations, and brand atmosphere easier to experience before the guest ever arrives.',
                'audience' => 'Built for restaurants, cafes, lounges, food brands, and hospitality concepts.',
                'offer' => 'The site is structured to guide visitors toward booking, ordering, or visiting, while keeping the brand experience front and centre.',
                'features' => ['Menu and reservation-focused layouts', 'Location and opening-hour visibility', 'Brand-led visual storytelling', 'Event and private dining enquiry sections'],
                'cta' => 'Start Your Restaurant Website',
            ],
            'beauty-wellness-website-design' => [
                'title' => 'Beauty & Wellness Website Design',
                'heading' => 'Web design for beauty and wellness brands that need trust, bookings, and a polished brand experience.',
                'summary' => 'We design beauty and wellness websites that feel elevated, easy to navigate, and built to convert interest into appointments or product enquiries.',
                'audience' => 'Built for salons, spas, skincare brands, wellness studios, and aesthetic service providers.',
                'offer' => 'The experience is shaped around premium presentation, service clarity, and low-friction booking.',
                'features' => ['Service and treatment page structure', 'Appointment and contact conversion paths', 'Visual brand-led presentation', 'Product, team, and review sections'],
                'cta' => 'Start Your Beauty & Wellness Website',
            ],
            'fitness-website-design' => [
                'title' => 'Fitness Website Design',
                'heading' => 'Web design for fitness brands that need stronger sign-ups and clearer offers.',
                'summary' => 'We design fitness websites that help visitors quickly understand your programmes, classes, or coaching offers and take action with confidence.',
                'audience' => 'Built for gyms, coaches, studios, trainers, and fitness communities.',
                'offer' => 'The site flow is designed around membership conversion, programme visibility, and stronger local credibility.',
                'features' => ['Programme and membership page layouts', 'Trainer and class showcase sections', 'Lead capture for sign-ups and trials', 'Location, timetable, and contact visibility'],
                'cta' => 'Start Your Fitness Website',
            ],
            'cleaning-company-website-design' => [
                'title' => 'Cleaning Company Website Design',
                'heading' => 'Web design for cleaning companies that need trust, visibility, and more service enquiries.',
                'summary' => 'We design cleaning company websites that present services clearly, reduce doubt, and help commercial or residential prospects request quotes faster.',
                'audience' => 'Built for cleaning companies, janitorial services, facility cleaning providers, and specialised cleaning teams.',
                'offer' => 'The structure is built around service clarity, proof, and easy quote-request paths.',
                'features' => ['Service and coverage-area pages', 'Quote request and contact sections', 'Trust and proof elements', 'Commercial and residential offer separation'],
                'cta' => 'Start Your Cleaning Company Website',
            ],
            'logistics-company-website-design' => [
                'title' => 'Logistics Company Website Design',
                'heading' => 'Web design for logistics companies that need operational clarity and better lead generation.',
                'summary' => 'We design logistics websites that make complex service offerings easier to understand while projecting scale, reliability, and speed.',
                'audience' => 'Built for logistics companies, delivery networks, freight teams, transport brands, and supply-chain providers.',
                'offer' => 'Your website is shaped around trust, service clarity, and the operational credibility buyers look for before reaching out.',
                'features' => ['Service pages for delivery and logistics capabilities', 'Fleet, coverage, and operations storytelling', 'Quote-request conversion paths', 'Trust-building layouts for B2B buyers'],
                'cta' => 'Start Your Logistics Website',
            ],
            'travel-agency-website-design' => [
                'title' => 'Travel Agency Website Design',
                'heading' => 'Web design for travel agencies that need inspiration, trust, and booking-ready pages.',
                'summary' => 'We design travel websites that make packages, destinations, and travel support feel easier to explore and easier to trust.',
                'audience' => 'Built for travel agencies, tour operators, destination brands, and travel planning businesses.',
                'offer' => 'The site combines visual appeal with conversion structure so exploration leads naturally into enquiry or booking conversations.',
                'features' => ['Package and destination page structure', 'Booking and enquiry conversion sections', 'Travel support and trust content', 'Visually led storytelling layouts'],
                'cta' => 'Start Your Travel Agency Website',
            ],
            'ecommerce-website-design' => [
                'title' => 'Ecommerce Website Design',
                'heading' => 'Web design for ecommerce brands that need stronger product clarity and more conversion.',
                'summary' => 'We design ecommerce websites that make products easier to browse, compare, trust, and buy without unnecessary friction.',
                'audience' => 'Built for online stores, product brands, retail businesses, and ecommerce-first companies.',
                'offer' => 'The design is shaped around product discovery, trust signals, and conversion flow from landing to checkout.',
                'features' => ['Homepage and category conversion structure', 'Product page trust and clarity systems', 'Checkout-focused UX thinking', 'Brand-led ecommerce presentation'],
                'cta' => 'Start Your Ecommerce Website',
            ],
            'fashion-brand-website-design' => [
                'title' => 'Fashion Brand Website Design',
                'heading' => 'Web design for fashion brands that need stronger identity and more product engagement.',
                'summary' => 'We design fashion websites that make the brand feel elevated while helping collections, products, and campaigns drive action.',
                'audience' => 'Built for fashion labels, apparel brands, designers, and style-led product businesses.',
                'offer' => 'The experience balances visual storytelling with the structure needed for product exploration, brand trust, and conversion.',
                'features' => ['Collection and campaign-led layouts', 'Product storytelling and merchandising sections', 'Brand-first visual direction', 'Conversion-aware ecommerce structure'],
                'cta' => 'Start Your Fashion Brand Website',
            ],
            'event-planner-website-design' => [
                'title' => 'Event Planner Website Design',
                'heading' => 'Web design for event planners that need stronger presentation and premium enquiries.',
                'summary' => 'We design event planner websites that showcase style, process, and trust while making high-value clients more confident about reaching out.',
                'audience' => 'Built for event planners, coordinators, wedding brands, and experience-led service providers.',
                'offer' => 'The page flow supports premium positioning, portfolio storytelling, and consultation-focused conversion.',
                'features' => ['Portfolio and gallery-led layouts', 'Service and package presentation', 'Trust-building process sections', 'Consultation and booking enquiry paths'],
                'cta' => 'Start Your Event Planner Website',
            ],
            'photography-website-design' => [
                'title' => 'Photography Website Design',
                'heading' => 'Web design for photographers that need portfolio impact and better client enquiries.',
                'summary' => 'We design photography websites that let the work breathe while guiding visitors toward enquiry, booking, and brand confidence.',
                'audience' => 'Built for photographers, studios, visual storytellers, and creative service brands.',
                'offer' => 'The site is structured around image presentation, service clarity, and a premium enquiry experience.',
                'features' => ['Portfolio-first layout systems', 'Service and package structure', 'Booking and enquiry-focused flow', 'Brand-led presentation without clutter'],
                'cta' => 'Start Your Photography Website',
            ],
            'personal-brand-website-design' => [
                'title' => 'Personal Brand Website Design',
                'heading' => 'Web design for personal brands that need stronger positioning, authority, and conversion.',
                'summary' => 'We design personal brand websites that help founders, experts, and creators present themselves with more structure, trust, and clarity.',
                'audience' => 'Built for consultants, speakers, coaches, creators, executives, and expert-led businesses.',
                'offer' => 'The page is designed to sharpen positioning, organise offers, and make the next step obvious for the right audience.',
                'features' => ['Positioning-led homepage structure', 'Offer and credibility sections', 'Personal story and authority content', 'Lead capture for speaking, coaching, or services'],
                'cta' => 'Start Your Personal Brand Website',
            ],
        ];
    }
}
