<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('addon_subscriptions', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('addon_id');
        });

        Schema::table('service_subscriptions', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('service_id');
        });

        Schema::table('websites', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('package_id');
        });

        Schema::dropIfExists('website_package_items');
        Schema::dropIfExists('website_packages');
        Schema::dropIfExists('addons');
        Schema::dropIfExists('services');
    }

    public function down(): void
    {
        Schema::create('services', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('type')->default('general');
            $table->string('billing_type');
            $table->string('billing_cycle')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->string('currency', 3)->default('NGN');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_core')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('website_packages', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->string('currency', 3)->default('NGN');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->json('features')->nullable();
            $table->timestamps();
        });

        Schema::create('addons', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('billing_type');
            $table->string('billing_cycle')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->string('currency', 3)->default('NGN');
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('website_package_items', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('website_package_id')->constrained()->cascadeOnDelete();
            $table->morphs('itemable');
            $table->unsignedInteger('quantity')->default(1);
            $table->boolean('is_optional')->default(false);
            $table->timestamps();
        });

        Schema::table('websites', function (Blueprint $table): void {
            $table->foreignId('package_id')->nullable()->after('client_id')->constrained('website_packages')->nullOnDelete();
        });

        Schema::table('service_subscriptions', function (Blueprint $table): void {
            $table->foreignId('service_id')->nullable()->after('website_id')->constrained('services')->nullOnDelete();
        });

        Schema::table('addon_subscriptions', function (Blueprint $table): void {
            $table->foreignId('addon_id')->nullable()->after('service_subscription_id')->constrained('addons')->nullOnDelete();
        });
    }
};
