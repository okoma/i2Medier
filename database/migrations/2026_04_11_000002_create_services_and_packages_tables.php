<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('type');
            $table->string('billing_type');
            $table->string('billing_cycle')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->string('currency', 3)->default('NGN');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_core')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('addons', function (Blueprint $table) {
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

        Schema::create('website_packages', function (Blueprint $table) {
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

        Schema::create('website_package_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('website_package_id')->constrained()->cascadeOnDelete();
            $table->morphs('itemable');
            $table->unsignedInteger('quantity')->default(1);
            $table->boolean('is_optional')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_package_items');
        Schema::dropIfExists('website_packages');
        Schema::dropIfExists('addons');
        Schema::dropIfExists('services');
    }
};
