<?php

namespace Database\Seeders;

use App\Models\Addon;
use App\Models\AffiliateProfile;
use App\Models\AffiliateReferral;
use App\Models\Client;
use App\Models\Document;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\InvoicePayment;
use App\Models\OnboardingTask;
use App\Models\PaymentSetting;
use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\ServiceSubscription;
use App\Models\SupportTicket;
use App\Models\TicketReply;
use App\Models\User;
use App\Models\Website;
use App\Models\WebsitePackage;
use App\Models\WebsitePackageItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        foreach (['super_admin', 'staff', 'client_owner', 'client_member'] as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        $admin = $this->seedAdmin();
        $staff = $this->seedStaff();
        [$client, $clientOwner, $clientMember] = $this->seedClientUsers($admin);
        [$services, $addons] = $this->seedCatalog();
        $packages = $this->seedPackages($services, $addons);
        $websites = $this->seedWebsites($client, $admin, $packages);

        $clientMember->assignedWebsites()->syncWithoutDetaching([
            $websites['corporate']->id,
            $websites['store']->id,
        ]);

        $subscriptions = $this->seedSubscriptions($client, $admin, $websites, $services, $addons);
        $this->seedOnboardingTasks($staff, $websites);
        $this->seedSupportTickets($client, $clientOwner, $clientMember, $staff, $websites);
        $this->seedPaymentSettings();
        $this->seedInvoices($client, $admin, $websites, $subscriptions);
        $this->seedDocuments($client, $clientOwner, $staff, $websites);
        $this->seedAffiliateData($client, $clientOwner);
        $this->seedPortfolio();
    }

    protected function seedAdmin(): User
    {
        $admin = User::query()->updateOrCreate(
            ['email' => 'admin@i2medier.test'],
            [
                'name' => 'i2Medier Admin',
                'password' => Hash::make('password'),
                'is_active' => true,
                'notification_preferences' => [
                    'email' => true,
                    'whatsapp' => false,
                    'dashboard' => true,
                    'login_alerts' => true,
                ],
            ],
        );

        $admin->assignRole('super_admin');

        return $admin;
    }

    protected function seedStaff(): User
    {
        $staff = User::query()->updateOrCreate(
            ['email' => 'operations@i2medier.test'],
            [
                'name' => 'Operations Manager',
                'password' => Hash::make('password'),
                'phone' => '+2348000000003',
                'is_active' => true,
                'notification_preferences' => [
                    'email' => true,
                    'whatsapp' => true,
                    'dashboard' => true,
                    'login_alerts' => true,
                ],
            ],
        );

        $staff->assignRole('staff');

        return $staff;
    }

    protected function seedClientUsers(User $admin): array
    {
        $client = Client::query()->updateOrCreate(
            ['email' => 'client@i2medier.test'],
            [
                'company_name' => 'Acme Client Ltd',
                'contact_name' => 'Acme Client Owner',
                'phone' => '+2348000000001',
                'whatsapp_number' => '+2348000000001',
                'address' => '12 Broad Street, Victoria Island',
                'country' => 'Nigeria',
                'state' => 'Lagos',
                'city' => 'Lagos',
                'status' => 'active',
                'notes' => 'Seeded client account for portal testing.',
                'created_by' => $admin->id,
            ],
        );

        $clientOwner = User::query()->updateOrCreate(
            ['email' => 'client@i2medier.test'],
            [
                'name' => 'Acme Client Owner',
                'password' => Hash::make('password'),
                'client_id' => $client->id,
                'phone' => '+2348000000001',
                'whatsapp_number' => '+2348000000001',
                'is_active' => true,
                'notification_preferences' => [
                    'email' => true,
                    'whatsapp' => true,
                    'dashboard' => true,
                    'login_alerts' => true,
                ],
            ],
        );

        $clientOwner->assignRole('client_owner');

        $clientMember = User::query()->updateOrCreate(
            ['email' => 'team@acme-client.test'],
            [
                'name' => 'Acme Marketing Lead',
                'password' => Hash::make('password'),
                'client_id' => $client->id,
                'phone' => '+2348000000002',
                'whatsapp_number' => '+2348000000002',
                'is_active' => true,
                'notification_preferences' => [
                    'email' => true,
                    'whatsapp' => false,
                    'dashboard' => true,
                    'login_alerts' => true,
                ],
            ],
        );

        $clientMember->assignRole('client_member');

        return [$client, $clientOwner, $clientMember];
    }

    protected function seedCatalog(): array
    {
        $services = [
            'maintenance' => Service::query()->updateOrCreate(
                ['slug' => 'website-maintenance'],
                [
                    'name' => 'Website Maintenance',
                    'description' => 'Ongoing updates, uptime checks, backups, and technical support.',
                    'type' => 'maintenance',
                    'billing_type' => 'recurring',
                    'billing_cycle' => 'monthly',
                    'price' => 45000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'is_core' => true,
                    'sort_order' => 1,
                ],
            ),
            'hosting' => Service::query()->updateOrCreate(
                ['slug' => 'managed-hosting'],
                [
                    'name' => 'Managed Hosting',
                    'description' => 'Managed hosting with monitoring, patching, and support.',
                    'type' => 'hosting',
                    'billing_type' => 'recurring',
                    'billing_cycle' => 'monthly',
                    'price' => 30000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'is_core' => true,
                    'sort_order' => 2,
                ],
            ),
            'domain' => Service::query()->updateOrCreate(
                ['slug' => 'domain-management'],
                [
                    'name' => 'Domain Management',
                    'description' => 'Domain registration, renewals, and DNS management.',
                    'type' => 'domain',
                    'billing_type' => 'recurring',
                    'billing_cycle' => 'yearly',
                    'price' => 25000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'is_core' => true,
                    'sort_order' => 3,
                ],
            ),
            'email' => Service::query()->updateOrCreate(
                ['slug' => 'business-email'],
                [
                    'name' => 'Business Email',
                    'description' => 'Professional mailbox setup and mail support.',
                    'type' => 'email',
                    'billing_type' => 'recurring',
                    'billing_cycle' => 'yearly',
                    'price' => 24000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'is_core' => false,
                    'sort_order' => 4,
                ],
            ),
            'seo' => Service::query()->updateOrCreate(
                ['slug' => 'seo-retainer'],
                [
                    'name' => 'SEO Retainer',
                    'description' => 'Monthly SEO reporting, optimization, and analytics review.',
                    'type' => 'marketing',
                    'billing_type' => 'recurring',
                    'billing_cycle' => 'monthly',
                    'price' => 60000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'is_core' => false,
                    'sort_order' => 5,
                ],
            ),
        ];

        $addons = [
            'seo_setup' => Addon::query()->updateOrCreate(
                ['slug' => 'seo-setup'],
                [
                    'service_id' => $services['maintenance']->id,
                    'name' => 'SEO Setup',
                    'description' => 'On-page SEO configuration, sitemap, and analytics setup.',
                    'billing_type' => 'one_time',
                    'billing_cycle' => null,
                    'price' => 50000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'sort_order' => 1,
                ],
            ),
            'priority_care' => Addon::query()->updateOrCreate(
                ['slug' => 'priority-care'],
                [
                    'service_id' => $services['maintenance']->id,
                    'name' => 'Priority Care',
                    'description' => 'Faster turnaround for support and small website updates.',
                    'billing_type' => 'recurring',
                    'billing_cycle' => 'monthly',
                    'price' => 20000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'sort_order' => 2,
                ],
            ),
            'content_upload' => Addon::query()->updateOrCreate(
                ['slug' => 'content-upload-sprint'],
                [
                    'service_id' => $services['maintenance']->id,
                    'name' => 'Content Upload Sprint',
                    'description' => 'Bulk content upload and publishing support.',
                    'billing_type' => 'one_time',
                    'billing_cycle' => null,
                    'price' => 35000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'sort_order' => 3,
                ],
            ),
        ];

        return [$services, $addons];
    }

    protected function seedPackages(array $services, array $addons): array
    {
        $packages = [
            'starter' => WebsitePackage::query()->updateOrCreate(
                ['slug' => 'growth-starter'],
                [
                    'name' => 'Growth Starter',
                    'description' => 'A starter managed website package for growing businesses.',
                    'price' => 120000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'is_featured' => true,
                    'sort_order' => 1,
                    'features' => ['design', 'maintenance', 'hosting', 'ssl', 'support'],
                ],
            ),
            'scale' => WebsitePackage::query()->updateOrCreate(
                ['slug' => 'business-scale'],
                [
                    'name' => 'Business Scale',
                    'description' => 'A broader package with hosting, support, email, and SEO coverage.',
                    'price' => 220000,
                    'currency' => 'NGN',
                    'is_active' => true,
                    'is_featured' => true,
                    'sort_order' => 2,
                    'features' => ['maintenance', 'hosting', 'domain', 'email', 'seo'],
                ],
            ),
        ];

        $this->syncPackageItems($packages['starter'], [
            [Service::class, $services['maintenance']->id, 1, false],
            [Service::class, $services['hosting']->id, 1, false],
            [Service::class, $services['domain']->id, 1, false],
            [Addon::class, $addons['seo_setup']->id, 1, true],
            [Addon::class, $addons['priority_care']->id, 1, true],
        ]);

        $this->syncPackageItems($packages['scale'], [
            [Service::class, $services['maintenance']->id, 1, false],
            [Service::class, $services['hosting']->id, 1, false],
            [Service::class, $services['domain']->id, 1, false],
            [Service::class, $services['email']->id, 1, false],
            [Service::class, $services['seo']->id, 1, true],
            [Addon::class, $addons['priority_care']->id, 1, false],
        ]);

        return $packages;
    }

    protected function seedWebsites(Client $client, User $admin, array $packages): array
    {
        return [
            'corporate' => Website::query()->updateOrCreate(
                ['primary_domain' => 'acme-client.test'],
                [
                    'client_id' => $client->id,
                    'package_id' => $packages['starter']->id,
                    'name' => 'Acme Client Website',
                    'staging_url' => 'https://staging.acme-client.test',
                    'niche' => 'Corporate',
                    'cms' => 'wordpress',
                    'health_state' => 'active',
                    'health_state_changed_at' => now()->subDays(10),
                    'hosting_type' => 'managed_shared',
                    'hosting_provider' => 'i2Medier Managed Hosting',
                    'hosting_server' => 'ng-lag-01',
                    'hosting_username' => 'acme_admin',
                    'hosting_password' => 'demo-password',
                    'hosting_expiry_date' => now()->addMonths(10),
                    'hosting_status' => 'active',
                    'domain_type' => 'primary',
                    'domain_registrar' => 'Cloudflare',
                    'domain_expiry_date' => now()->addMonths(11),
                    'domain_status' => 'active',
                    'ssl_provider' => 'Let\'s Encrypt',
                    'ssl_expiry_date' => now()->addMonths(2),
                    'ssl_status' => 'active',
                    'cms_admin_url' => 'https://acme-client.test/wp-admin',
                    'cms_admin_user' => 'acme-owner',
                    'cms_admin_password' => 'demo-password',
                    'notes' => 'Primary corporate website for Acme Client Ltd.',
                    'is_active' => true,
                    'created_by' => $admin->id,
                ],
            ),
            'store' => Website::query()->updateOrCreate(
                ['primary_domain' => 'store.acme-client.test'],
                [
                    'client_id' => $client->id,
                    'package_id' => $packages['scale']->id,
                    'name' => 'Acme Storefront',
                    'staging_url' => 'https://staging-store.acme-client.test',
                    'niche' => 'Ecommerce',
                    'cms' => 'wordpress',
                    'health_state' => 'pending_setup',
                    'health_state_changed_at' => now()->subDays(3),
                    'hosting_type' => 'cloud',
                    'hosting_provider' => 'i2Medier Cloud',
                    'hosting_server' => 'uk-lon-02',
                    'hosting_username' => 'store_admin',
                    'hosting_password' => 'demo-password',
                    'hosting_expiry_date' => now()->addYear(),
                    'hosting_status' => 'active',
                    'domain_type' => 'subdomain',
                    'domain_registrar' => 'Cloudflare',
                    'domain_expiry_date' => now()->addMonths(11),
                    'domain_status' => 'active',
                    'ssl_provider' => 'Cloudflare SSL',
                    'ssl_expiry_date' => now()->addMonths(3),
                    'ssl_status' => 'active',
                    'cms_admin_url' => 'https://store.acme-client.test/wp-admin',
                    'cms_admin_user' => 'store-owner',
                    'cms_admin_password' => 'demo-password',
                    'notes' => 'Commerce rollout in progress with content population still pending.',
                    'is_active' => true,
                    'created_by' => $admin->id,
                ],
            ),
            'campaign' => Website::query()->updateOrCreate(
                ['primary_domain' => 'campaign.acme-client.test'],
                [
                    'client_id' => $client->id,
                    'package_id' => $packages['starter']->id,
                    'name' => 'Acme Campaign Microsite',
                    'staging_url' => 'https://staging-campaign.acme-client.test',
                    'niche' => 'Marketing',
                    'cms' => 'laravel',
                    'health_state' => 'at_risk',
                    'health_state_changed_at' => now()->subDays(1),
                    'hosting_type' => 'managed_vps',
                    'hosting_provider' => 'i2Medier VPS',
                    'hosting_server' => 'us-ny-03',
                    'hosting_username' => 'campaign_admin',
                    'hosting_password' => 'demo-password',
                    'hosting_expiry_date' => now()->addDays(20),
                    'hosting_status' => 'expiring',
                    'domain_type' => 'campaign',
                    'domain_registrar' => 'Namecheap',
                    'domain_expiry_date' => now()->addDays(25),
                    'domain_status' => 'expiring',
                    'ssl_provider' => 'ZeroSSL',
                    'ssl_expiry_date' => now()->addDays(8),
                    'ssl_status' => 'expiring',
                    'cms_admin_url' => 'https://campaign.acme-client.test/admin',
                    'cms_admin_user' => 'campaign-owner',
                    'cms_admin_password' => 'demo-password',
                    'notes' => 'SSL and hosting renewal needed soon.',
                    'is_active' => true,
                    'created_by' => $admin->id,
                ],
            ),
        ];
    }

    protected function seedSubscriptions(Client $client, User $admin, array $websites, array $services, array $addons): array
    {
        $subscriptions = [
            'corp_maintenance' => $this->upsertSubscription($client, $admin, $websites['corporate'], $services['maintenance'], [
                'status' => 'active',
                'starts_at' => now()->subMonths(6)->toDateString(),
                'expires_at' => now()->addMonth()->toDateString(),
                'last_renewed_at' => now()->subDays(4),
                'auto_renew' => true,
                'notes' => 'Core maintenance plan for the corporate website.',
            ]),
            'corp_hosting' => $this->upsertSubscription($client, $admin, $websites['corporate'], $services['hosting'], [
                'status' => 'active',
                'starts_at' => now()->subMonths(6)->toDateString(),
                'expires_at' => now()->addMonth()->toDateString(),
                'last_renewed_at' => now()->subDays(4),
                'auto_renew' => true,
                'notes' => 'Managed hosting with routine monitoring.',
            ]),
            'corp_domain' => $this->upsertSubscription($client, $admin, $websites['corporate'], $services['domain'], [
                'status' => 'active',
                'starts_at' => now()->subYear()->toDateString(),
                'expires_at' => now()->addMonths(11)->toDateString(),
                'last_renewed_at' => now()->subMonth(),
                'auto_renew' => false,
                'notes' => 'Primary domain renewal handled annually.',
            ]),
            'store_maintenance' => $this->upsertSubscription($client, $admin, $websites['store'], $services['maintenance'], [
                'status' => 'active',
                'starts_at' => now()->subWeeks(2)->toDateString(),
                'expires_at' => now()->addMonth()->toDateString(),
                'last_renewed_at' => now()->subWeeks(2),
                'auto_renew' => true,
                'notes' => 'New ecommerce build under onboarding.',
            ]),
            'store_email' => $this->upsertSubscription($client, $admin, $websites['store'], $services['email'], [
                'status' => 'active',
                'starts_at' => now()->subWeeks(2)->toDateString(),
                'expires_at' => now()->addYear()->toDateString(),
                'last_renewed_at' => now()->subWeeks(2),
                'auto_renew' => true,
                'notes' => 'Mailbox service for sales and support teams.',
            ]),
            'campaign_hosting' => $this->upsertSubscription($client, $admin, $websites['campaign'], $services['hosting'], [
                'status' => 'active',
                'starts_at' => now()->subMonths(11)->toDateString(),
                'expires_at' => now()->addDays(20)->toDateString(),
                'last_renewed_at' => now()->subMonths(11),
                'auto_renew' => false,
                'notes' => 'Renewal window currently open.',
            ]),
            'campaign_seo' => $this->upsertSubscription($client, $admin, $websites['campaign'], $services['seo'], [
                'status' => 'active',
                'starts_at' => now()->subMonths(2)->toDateString(),
                'expires_at' => now()->addDays(12)->toDateString(),
                'last_renewed_at' => now()->subMonths(1),
                'auto_renew' => false,
                'notes' => 'Marketing retainer attached to campaign launch.',
            ]),
        ];

        $subscriptions['corp_maintenance']->addonSubscriptions()->updateOrCreate(
            ['addon_id' => $addons['priority_care']->id, 'client_id' => $client->id],
            [
                'status' => 'active',
                'price' => $addons['priority_care']->price,
                'currency' => $addons['priority_care']->currency,
                'billing_type' => $addons['priority_care']->billing_type,
                'billing_cycle' => $addons['priority_care']->billing_cycle,
                'starts_at' => now()->subMonths(3)->toDateString(),
                'expires_at' => now()->addMonth()->toDateString(),
                'auto_renew' => true,
            ],
        );

        $subscriptions['store_maintenance']->addonSubscriptions()->updateOrCreate(
            ['addon_id' => $addons['seo_setup']->id, 'client_id' => $client->id],
            [
                'status' => 'active',
                'price' => $addons['seo_setup']->price,
                'currency' => $addons['seo_setup']->currency,
                'billing_type' => $addons['seo_setup']->billing_type,
                'billing_cycle' => $addons['seo_setup']->billing_cycle,
                'starts_at' => now()->subWeeks(2)->toDateString(),
                'expires_at' => null,
                'auto_renew' => false,
            ],
        );

        return $subscriptions;
    }

    protected function seedOnboardingTasks(User $staff, array $websites): void
    {
        $tasks = [
            [$websites['store']->id, 'Upload store product content', 'content_upload', 'in_progress', now()->addDays(5), null, 'Awaiting final product spreadsheet.', 1],
            [$websites['store']->id, 'Configure payment gateway', 'cms_install', 'pending', now()->addDays(7), null, 'Requires merchant details from client.', 2],
            [$websites['store']->id, 'QA storefront before launch', 'qa', 'pending', now()->addDays(10), null, 'Cross-browser and mobile checks.', 3],
            [$websites['campaign']->id, 'Renew SSL certificate', 'launch', 'blocked', now()->addDays(3), null, 'Blocked until hosting invoice is cleared.', 1],
            [$websites['campaign']->id, 'Refresh campaign landing page content', 'content_upload', 'completed', now()->subDays(2), now()->subDays(1), 'Updated CTA copy and hero section.', 2],
        ];

        foreach ($tasks as [$websiteId, $title, $type, $status, $dueAt, $completedAt, $notes, $sortOrder]) {
            OnboardingTask::query()->updateOrCreate(
                ['website_id' => $websiteId, 'title' => $title],
                [
                    'description' => $title,
                    'type' => $type,
                    'status' => $status,
                    'assigned_to' => $staff->id,
                    'due_at' => $dueAt,
                    'completed_at' => $completedAt,
                    'notes' => $notes,
                    'sort_order' => $sortOrder,
                ],
            );
        }
    }

    protected function seedSupportTickets(Client $client, User $owner, User $member, User $staff, array $websites): void
    {
        $tickets = [
            [
                'ticket_number' => 'TKT-2026-ACME01',
                'website_id' => $websites['corporate']->id,
                'submitted_by' => $owner->id,
                'assigned_to' => $staff->id,
                'subject' => 'Homepage banner needs content update',
                'description' => 'Please replace the campaign banner copy before Friday.',
                'status' => 'in_progress',
                'priority' => 'medium',
                'category' => 'general',
                'first_response_at' => now()->subDays(2),
            ],
            [
                'ticket_number' => 'TKT-2026-ACME02',
                'website_id' => $websites['campaign']->id,
                'submitted_by' => $member->id,
                'assigned_to' => $staff->id,
                'subject' => 'Campaign site SSL warning',
                'description' => 'Visitors are seeing an SSL warning intermittently.',
                'status' => 'waiting_reply',
                'priority' => 'high',
                'category' => 'hosting',
                'first_response_at' => now()->subDay(),
            ],
            [
                'ticket_number' => 'TKT-2026-ACME03',
                'website_id' => $websites['store']->id,
                'submitted_by' => $owner->id,
                'assigned_to' => $staff->id,
                'subject' => 'Need billing clarification for launch invoice',
                'description' => 'Can you explain the setup fees on the latest invoice?',
                'status' => 'open',
                'priority' => 'low',
                'category' => 'billing',
                'first_response_at' => null,
            ],
        ];

        foreach ($tickets as $ticketData) {
            $ticket = SupportTicket::query()->updateOrCreate(
                ['ticket_number' => $ticketData['ticket_number']],
                array_merge($ticketData, ['client_id' => $client->id]),
            );

            $replies = match ($ticket->ticket_number) {
                'TKT-2026-ACME01' => [
                    [$owner->id, 'Thanks. Please use the updated promo text from the brief.', false],
                    [$staff->id, 'We have queued the content update and will publish today.', false],
                ],
                'TKT-2026-ACME02' => [
                    [$member->id, 'The issue seems worse on mobile Safari.', false],
                    [$staff->id, 'We are tracing the certificate chain and will confirm once the renewal is forced.', false],
                    [$staff->id, 'Internal note: monitor once invoice ACME-2026-1004 is settled.', true],
                ],
                default => [
                    [$owner->id, 'Happy to receive a breakdown before approving payment.', false],
                ],
            };

            foreach ($replies as [$userId, $body, $isInternal]) {
                TicketReply::query()->firstOrCreate(
                    [
                        'support_ticket_id' => $ticket->id,
                        'user_id' => $userId,
                        'body' => $body,
                    ],
                    ['is_internal' => $isInternal],
                );
            }
        }
    }

    protected function seedPaymentSettings(): void
    {
        PaymentSetting::query()->updateOrCreate(
            ['id' => PaymentSetting::query()->value('id') ?? 1],
            [
                'paystack_enabled' => true,
                'paystack_public_key' => 'pk_test_i2medier_demo_key',
                'paystack_secret_key' => 'sk_test_i2medier_demo_secret',
                'bank_transfer_enabled' => true,
                'bank_account_name' => 'i2Medier',
                'bank_name' => 'Sterling Bank',
                'bank_account_number' => '0012345678',
                'bank_sort_code' => '232150016',
                'bank_instructions' => 'Use the invoice number as your transfer reference and send proof of payment after transfer.',
            ],
        );
    }

    protected function seedInvoices(Client $client, User $admin, array $websites, array $subscriptions): void
    {
        $invoices = [
            'INV-2026-1001' => [
                'website' => $websites['corporate'],
                'status' => 'paid',
                'issued_at' => now()->subDays(25),
                'due_at' => now()->subDays(15),
                'payment_method' => Invoice::PAYMENT_METHOD_PAYSTACK,
                'paid_at' => now()->subDays(16),
                'payment_reference' => 'paystack_demo_1001',
                'items' => [
                    [$subscriptions['corp_maintenance'], 'Website Maintenance - April Cycle', 1, 45000],
                    [$subscriptions['corp_hosting'], 'Managed Hosting - April Cycle', 1, 30000],
                ],
                'payments' => [
                    ['paid', Invoice::PAYMENT_METHOD_PAYSTACK, 'paystack', 75000, 'paystack_demo_1001', now()->subDays(17), now()->subDays(16)],
                ],
            ],
            'INV-2026-1002' => [
                'website' => $websites['corporate'],
                'status' => 'sent',
                'issued_at' => now()->subDays(3),
                'due_at' => now()->addDays(5),
                'payment_method' => Invoice::PAYMENT_METHOD_BANK_TRANSFER,
                'paid_at' => null,
                'payment_reference' => null,
                'items' => [
                    [$subscriptions['corp_maintenance'], 'Website Maintenance - Current Cycle', 1, 45000],
                    [$subscriptions['corp_hosting'], 'Managed Hosting - Current Cycle', 1, 30000],
                ],
                'payments' => [],
            ],
            'INV-2026-1003' => [
                'website' => $websites['store'],
                'status' => 'draft',
                'issued_at' => now(),
                'due_at' => now()->addDays(10),
                'payment_method' => Invoice::PAYMENT_METHOD_BANK_TRANSFER,
                'paid_at' => null,
                'payment_reference' => null,
                'items' => [
                    [$subscriptions['store_maintenance'], 'Storefront Launch Support', 1, 45000],
                    [$subscriptions['store_email'], 'Business Email Annual Setup', 1, 24000],
                ],
                'payments' => [],
            ],
            'INV-2026-1004' => [
                'website' => $websites['campaign'],
                'status' => 'overdue',
                'issued_at' => now()->subDays(18),
                'due_at' => now()->subDays(4),
                'payment_method' => Invoice::PAYMENT_METHOD_BANK_TRANSFER,
                'paid_at' => null,
                'payment_reference' => null,
                'items' => [
                    [$subscriptions['campaign_hosting'], 'Campaign Hosting Renewal', 1, 30000],
                    [$subscriptions['campaign_seo'], 'SEO Retainer - Campaign Cycle', 1, 60000],
                ],
                'payments' => [
                    ['pending', Invoice::PAYMENT_METHOD_BANK_TRANSFER, 'manual', 90000, 'manual_review_1004', now()->subDays(3), null],
                ],
            ],
        ];

        foreach ($invoices as $number => $invoiceData) {
            $invoice = Invoice::query()->updateOrCreate(
                ['invoice_number' => $number],
                [
                    'client_id' => $client->id,
                    'website_id' => $invoiceData['website']->id,
                    'status' => $invoiceData['status'],
                    'subtotal' => 0,
                    'tax_rate' => 0,
                    'tax_amount' => 0,
                    'discount_amount' => 0,
                    'total' => 0,
                    'currency' => 'NGN',
                    'issued_at' => $invoiceData['issued_at'],
                    'due_at' => $invoiceData['due_at'],
                    'paid_at' => $invoiceData['paid_at'],
                    'payment_method' => $invoiceData['payment_method'],
                    'payment_reference' => $invoiceData['payment_reference'],
                    'notes' => 'Seeded invoice for portal finance testing.',
                    'internal_notes' => 'Generated by DatabaseSeeder.',
                    'created_by' => $admin->id,
                ],
            );

            $invoice->ensurePublicToken();

            foreach ($invoiceData['items'] as [$subscription, $description, $quantity, $amount]) {
                InvoiceItem::query()->updateOrCreate(
                    [
                        'invoice_id' => $invoice->id,
                        'description' => $description,
                    ],
                    [
                        'subscriptionable_type' => $subscription::class,
                        'subscriptionable_id' => $subscription->id,
                        'quantity' => $quantity,
                        'unit_price' => $amount,
                        'line_total' => $amount * $quantity,
                        'billing_period_start' => now()->startOfMonth(),
                        'billing_period_end' => now()->endOfMonth(),
                    ],
                );
            }

            $invoice->recalculate();

            foreach ($invoiceData['payments'] as [$status, $method, $provider, $amount, $reference, $initiatedAt, $paidAt]) {
                InvoicePayment::query()->updateOrCreate(
                    ['invoice_id' => $invoice->id, 'reference' => $reference],
                    [
                        'method' => $method,
                        'provider' => $provider,
                        'status' => $status,
                        'amount' => $amount,
                        'currency' => 'NGN',
                        'gateway_reference' => $reference,
                        'gateway_payload' => ['seeded' => true],
                        'initiated_at' => $initiatedAt,
                        'paid_at' => $paidAt,
                        'notes' => 'Seeded payment record.',
                    ],
                );
            }
        }
    }

    protected function seedDocuments(Client $client, User $owner, User $staff, array $websites): void
    {
        $disk = Storage::disk('public');

        $documents = [
            ['client-documents/project-brief.md', 'Acme Project Brief', 'Briefs', 'brief', $websites['corporate']->id, $staff->id, false, 'Initial website project brief.'],
            ['client-documents/hosting-report.csv', 'Hosting Usage Report', 'Reports', 'report', $websites['campaign']->id, $staff->id, false, 'Monthly uptime and resource export.'],
            ['client-documents/invoice-note.txt', 'Invoice Payment Instructions', 'Finance', 'invoice', null, $staff->id, false, 'Bank transfer instructions for finance team.'],
            ['client-documents/contract-summary.md', 'Support Retainer Summary', 'Contracts', 'contract', $websites['corporate']->id, $staff->id, false, 'Summary of signed support terms.'],
            ['client-documents/launch-checklist.txt', 'Launch Checklist Notes', 'Launch', 'general', $websites['store']->id, $owner->id, true, 'Client-uploaded notes before launch.'],
        ];

        foreach ($documents as [$path, $title, $folder, $category, $websiteId, $uploaderId, $isClientUpload, $notes]) {
            Document::query()->updateOrCreate(
                ['client_id' => $client->id, 'title' => $title],
                [
                    'website_id' => $websiteId,
                    'uploaded_by' => $uploaderId,
                    'folder' => $folder,
                    'category' => $category,
                    'disk' => 'public',
                    'path' => $path,
                    'original_name' => basename($path),
                    'mime_type' => $disk->exists($path) ? $disk->mimeType($path) : 'text/plain',
                    'extension' => pathinfo($path, PATHINFO_EXTENSION),
                    'size' => $disk->exists($path) ? $disk->size($path) : 0,
                    'visibility' => 'client',
                    'is_client_upload' => $isClientUpload,
                    'notes' => $notes,
                ],
            );
        }
    }

    protected function seedAffiliateData(Client $client, User $owner): void
    {
        $profile = AffiliateProfile::query()->updateOrCreate(
            ['user_id' => $owner->id],
            [
                'client_id' => $client->id,
                'referral_code' => 'ACMEPART',
                'status' => 'active',
                'commission_rate' => 20,
                'payout_email' => $owner->email,
                'payout_bank_name' => 'Sterling Bank',
                'payout_account_name' => 'Acme Client Ltd',
                'payout_account_number' => '0098765432',
                'notes' => 'Seeded affiliate profile for portal showcase.',
            ],
        );

        $referrals = [
            ['REF-0001', 'freshhub.ng', 'Managed Hosting', 90000, 18000, 'paid', now()->subDays(18), now()->subDays(12), 'Hosting referral converted successfully.'],
            ['REF-0002', 'greenmarket.africa', 'Business Email', 24000, 4800, 'approved', now()->subDays(11), null, 'Awaiting payout batch.'],
            ['REF-0003', 'urbanretail.store', 'SEO Retainer', 60000, 12000, 'pending', now()->subDays(4), null, 'Client onboarding still in progress.'],
            ['REF-0004', 'northlabs.io', 'Domain Management', 25000, 5000, 'paid', now()->subDays(30), now()->subDays(20), 'Annual domain service referral.'],
        ];

        foreach ($referrals as [$referralId, $domain, $productName, $orderAmount, $commissionAmount, $status, $referredAt, $paidAt, $notes]) {
            AffiliateReferral::query()->updateOrCreate(
                ['referral_id' => $referralId],
                [
                    'affiliate_profile_id' => $profile->id,
                    'referred_domain' => $domain,
                    'product_name' => $productName,
                    'order_amount' => $orderAmount,
                    'commission_amount' => $commissionAmount,
                    'status' => $status,
                    'referred_at' => $referredAt,
                    'paid_at' => $paidAt,
                    'notes' => $notes,
                ],
            );
        }
    }

    protected function seedPortfolio(): void
    {
        PortfolioProject::query()->updateOrCreate(
            ['slug' => 'i2medier-client-portal'],
            [
                'title' => 'i2Medier Client Portal',
                'type' => 'inhouse',
                'summary' => 'An in-house portal experience for managed website clients to track websites, subscriptions, invoices, documents, and support.',
                'description' => 'Built as an internal product for the i2Medier managed website services platform. The portal separates client visibility from agency operations while still keeping the service model managed, not self-serve.',
                'project_url' => 'https://portal.i2medier.test',
                'tech_stack' => ['Laravel', 'Filament 5', 'Livewire', 'MySQL'],
                'status' => 'published',
                'published_at' => now(),
                'is_featured' => true,
                'sort_order' => 1,
            ],
        );

        PortfolioProject::query()->updateOrCreate(
            ['slug' => 'acme-corporate-website'],
            [
                'title' => 'Acme Corporate Website',
                'type' => 'client',
                'client_name' => 'Acme Client Ltd',
                'summary' => 'A managed corporate website delivery with hosting, maintenance, domain, and optional SEO setup.',
                'description' => 'This sample client case highlights the kind of delivery work the platform is designed to manage. It combines website operations, subscriptions, invoices, client communication, documents, and affiliate visibility in one workflow.',
                'project_url' => 'https://acme-client.test',
                'tech_stack' => ['WordPress', 'Cloudflare', 'Managed Hosting'],
                'status' => 'published',
                'published_at' => now(),
                'is_featured' => true,
                'sort_order' => 2,
            ],
        );
    }

    protected function syncPackageItems(WebsitePackage $package, array $items): void
    {
        foreach ($items as [$type, $id, $quantity, $optional]) {
            WebsitePackageItem::query()->updateOrCreate(
                [
                    'website_package_id' => $package->id,
                    'itemable_type' => $type,
                    'itemable_id' => $id,
                ],
                [
                    'quantity' => $quantity,
                    'is_optional' => $optional,
                ],
            );
        }
    }

    protected function upsertSubscription(Client $client, User $admin, Website $website, Service $service, array $overrides): ServiceSubscription
    {
        return ServiceSubscription::query()->updateOrCreate(
            [
                'website_id' => $website->id,
                'service_id' => $service->id,
                'client_id' => $client->id,
            ],
            array_merge([
                'status' => 'active',
                'billing_type' => $service->billing_type,
                'billing_cycle' => $service->billing_cycle,
                'price' => $service->price,
                'currency' => $service->currency,
                'starts_at' => now()->toDateString(),
                'expires_at' => now()->addMonth()->toDateString(),
                'auto_renew' => false,
                'created_by' => $admin->id,
                'notes' => 'Seeded subscription',
            ], $overrides),
        );
    }
}
