<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('package_id')->nullable()->constrained('website_packages')->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->string('primary_domain')->nullable()->unique();
            $table->string('staging_url')->nullable();
            $table->string('niche')->nullable();
            $table->string('cms')->default('wordpress');
            $table->string('health_state')->default('pending_setup');
            $table->timestamp('health_state_changed_at')->nullable();
            $table->string('hosting_type')->nullable();
            $table->string('hosting_provider')->nullable();
            $table->string('hosting_server')->nullable();
            $table->text('hosting_username')->nullable();
            $table->text('hosting_password')->nullable();
            $table->date('hosting_expiry_date')->nullable();
            $table->string('hosting_status')->nullable();
            $table->string('domain_type')->nullable();
            $table->string('domain_registrar')->nullable();
            $table->date('domain_expiry_date')->nullable();
            $table->string('domain_status')->nullable();
            $table->string('ssl_provider')->nullable();
            $table->date('ssl_expiry_date')->nullable();
            $table->string('ssl_status')->nullable();
            $table->string('cms_admin_url')->nullable();
            $table->text('cms_admin_user')->nullable();
            $table->text('cms_admin_password')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('client_member_websites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('website_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['user_id', 'website_id']);
        });

        Schema::create('service_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('website_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained()->restrictOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status')->default('active');
            $table->string('billing_type');
            $table->string('billing_cycle')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->string('currency', 3)->default('NGN');
            $table->date('starts_at')->nullable();
            $table->date('expires_at')->nullable();
            $table->timestamp('suspended_at')->nullable();
            $table->timestamp('archived_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('last_renewed_at')->nullable();
            $table->boolean('auto_renew')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('addon_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_subscription_id')->constrained()->cascadeOnDelete();
            $table->foreignId('addon_id')->constrained()->restrictOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->string('status')->default('active');
            $table->decimal('price', 12, 2)->default(0);
            $table->string('currency', 3)->default('NGN');
            $table->string('billing_type');
            $table->string('billing_cycle')->nullable();
            $table->date('starts_at')->nullable();
            $table->date('expires_at')->nullable();
            $table->boolean('auto_renew')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addon_subscriptions');
        Schema::dropIfExists('service_subscriptions');
        Schema::dropIfExists('client_member_websites');
        Schema::dropIfExists('websites');
    }
};
