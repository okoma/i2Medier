<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('onboarding_services', function (Blueprint $table): void {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->string('icon', 50);
            $table->text('description');
            $table->string('billing_type', 20)->default('one_time');
            $table->string('billing_cycle', 20)->nullable();
            $table->decimal('base_price', 12, 2);
            $table->string('price_label');
            $table->string('currency', 3)->default('NGN');
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(1);
            $table->json('settings')->nullable();
            $table->timestamps();
        });

        Schema::create('onboarding_service_variants', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('onboarding_service_id')->constrained()->cascadeOnDelete();
            $table->string('key');
            $table->string('name');
            $table->text('description');
            $table->string('billing_type', 20)->default('one_time');
            $table->string('billing_cycle', 20)->nullable();
            $table->decimal('base_price', 12, 2);
            $table->string('price_label');
            $table->string('currency', 3)->default('NGN');
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(1);
            $table->json('settings')->nullable();
            $table->timestamps();

            $table->unique(['onboarding_service_id', 'key']);
        });

        Schema::create('onboarding_addons', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('onboarding_service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('onboarding_service_variant_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('key');
            $table->string('name');
            $table->text('description');
            $table->string('billing_type', 20)->default('one_time');
            $table->string('billing_cycle', 20)->nullable();
            $table->decimal('price', 12, 2);
            $table->string('price_label')->nullable();
            $table->string('currency', 3)->default('NGN');
            $table->boolean('is_quantity_based')->default(false);
            $table->string('quantity_label', 50)->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(1);
            $table->json('settings')->nullable();
            $table->timestamps();

            $table->unique(['onboarding_service_variant_id', 'key']);
            $table->unique(['onboarding_service_id', 'key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('onboarding_addons');
        Schema::dropIfExists('onboarding_service_variants');
        Schema::dropIfExists('onboarding_services');
    }
};
