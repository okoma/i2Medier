<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Addon;
use App\Models\PortfolioProject;
use App\Models\Service;
use App\Models\User;
use App\Models\Website;
use App\Models\WebsitePackage;
use App\Models\WebsitePackageItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (['super_admin', 'staff', 'client_owner', 'client_member'] as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        $admin = User::query()->firstOrCreate(
            ['email' => 'admin@i2medier.test'],
            [
                'name' => 'i2Medier Admin',
                'password' => Hash::make('password'),
                'is_active' => true,
                'notification_preferences' => [
                    'email' => true,
                    'whatsapp' => false,
                    'dashboard' => true,
                ],
            ],
        );

        $admin->assignRole('super_admin');

        $client = Client::query()->firstOrCreate(
            ['email' => 'client@i2medier.test'],
            [
                'company_name' => 'Acme Client Ltd',
                'contact_name' => 'Acme Client Owner',
                'phone' => '+2348000000001',
                'whatsapp_number' => '+2348000000001',
                'country' => 'Nigeria',
                'state' => 'Lagos',
                'city' => 'Lagos',
                'status' => 'active',
                'notes' => 'Seeded client account for portal testing.',
                'created_by' => $admin->id,
            ],
        );

        $clientUser = User::query()->firstOrCreate(
            ['email' => 'client@i2medier.test'],
            [
                'name' => 'Acme Client Owner',
                'password' => Hash::make('password'),
                'client_id' => $client->id,
                'is_active' => true,
                'notification_preferences' => [
                    'email' => true,
                    'whatsapp' => true,
                    'dashboard' => true,
                ],
            ],
        );

        if ($clientUser->client_id !== $client->id) {
            $clientUser->forceFill(['client_id' => $client->id])->save();
        }

        $clientUser->assignRole('client_owner');

        $maintenanceService = Service::query()->firstOrCreate(
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
        );

        $hostingService = Service::query()->firstOrCreate(
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
        );

        $domainService = Service::query()->firstOrCreate(
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
        );

        $seoAddon = Addon::query()->firstOrCreate(
            ['slug' => 'seo-setup'],
            [
                'service_id' => $maintenanceService->id,
                'name' => 'SEO Setup',
                'description' => 'On-page SEO configuration, sitemap, and analytics setup.',
                'billing_type' => 'one_time',
                'billing_cycle' => null,
                'price' => 50000,
                'currency' => 'NGN',
                'is_active' => true,
                'sort_order' => 1,
            ],
        );

        $careAddon = Addon::query()->firstOrCreate(
            ['slug' => 'priority-care'],
            [
                'service_id' => $maintenanceService->id,
                'name' => 'Priority Care',
                'description' => 'Faster turnaround for support and small website updates.',
                'billing_type' => 'recurring',
                'billing_cycle' => 'monthly',
                'price' => 20000,
                'currency' => 'NGN',
                'is_active' => true,
                'sort_order' => 2,
            ],
        );

        $starterPackage = WebsitePackage::query()->firstOrCreate(
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
        );

        foreach ([
            [Service::class, $maintenanceService->id, 1, false],
            [Service::class, $hostingService->id, 1, false],
            [Service::class, $domainService->id, 1, false],
            [Addon::class, $seoAddon->id, 1, true],
            [Addon::class, $careAddon->id, 1, true],
        ] as [$type, $id, $quantity, $optional]) {
            WebsitePackageItem::query()->firstOrCreate(
                [
                    'website_package_id' => $starterPackage->id,
                    'itemable_type' => $type,
                    'itemable_id' => $id,
                ],
                [
                    'quantity' => $quantity,
                    'is_optional' => $optional,
                ],
            );
        }

        Website::query()->firstOrCreate(
            ['primary_domain' => 'acme-client.test'],
            [
                'client_id' => $client->id,
                'package_id' => $starterPackage->id,
                'name' => 'Acme Client Website',
                'staging_url' => 'https://staging.acme-client.test',
                'niche' => 'Corporate',
                'cms' => 'wordpress',
                'health_state' => 'active',
                'health_state_changed_at' => now(),
                'hosting_provider' => 'i2Medier Managed Hosting',
                'hosting_status' => 'active',
                'domain_registrar' => 'Cloudflare',
                'domain_status' => 'active',
                'ssl_provider' => 'Let\'s Encrypt',
                'ssl_status' => 'active',
                'is_active' => true,
                'created_by' => $admin->id,
            ],
        );

        PortfolioProject::query()->firstOrCreate(
            ['slug' => 'i2medier-client-portal'],
            [
                'title' => 'i2Medier Client Portal',
                'type' => 'inhouse',
                'summary' => 'An in-house portal experience for managed website clients to track websites, subscriptions, invoices, and support.',
                'description' => 'Built as an internal product for the i2Medier managed website services platform. The portal separates client visibility from agency operations while still keeping the service model managed, not self-serve.',
                'project_url' => 'https://portal.i2medier.test',
                'tech_stack' => ['Laravel', 'Filament 5', 'Livewire', 'MySQL'],
                'status' => 'published',
                'published_at' => now(),
                'is_featured' => true,
                'sort_order' => 1,
            ],
        );

        PortfolioProject::query()->firstOrCreate(
            ['slug' => 'acme-corporate-website'],
            [
                'title' => 'Acme Corporate Website',
                'type' => 'client',
                'client_name' => 'Acme Client Ltd',
                'summary' => 'A managed corporate website delivery with hosting, maintenance, domain, and optional SEO setup.',
                'description' => 'This sample client case highlights the kind of delivery work the platform is designed to manage. It combines website operations, subscriptions, invoices, and client communication in one workflow.',
                'project_url' => 'https://acme-client.test',
                'tech_stack' => ['WordPress', 'Cloudflare', 'Managed Hosting'],
                'status' => 'published',
                'published_at' => now(),
                'is_featured' => true,
                'sort_order' => 2,
            ],
        );
    }
}
