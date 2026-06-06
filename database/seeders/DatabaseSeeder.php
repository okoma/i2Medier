<?php

namespace Database\Seeders;

use App\Models\AffiliateProfile;
use App\Models\AffiliateReferral;
use App\Models\Client;
use App\Models\PaymentSetting;
use App\Models\PortfolioProject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        foreach (['super_admin', 'staff', 'client_owner', 'client_member'] as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        $this->call(OnboardingCatalogSeeder::class);
        $this->call(TeamMembersSeeder::class);

        $admin = $this->seedAdmin();
        $this->seedStaff();
        [$client, $clientOwner] = $this->seedClientUsers($admin);
        $this->seedPaymentSettings();
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
}
