<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_subscriptions', function (Blueprint $table): void {
            $table->foreignId('onboarding_service_id')
                ->nullable()
                ->after('service_id')
                ->constrained('onboarding_services')
                ->nullOnDelete();
            $table->foreignId('onboarding_service_variant_id')
                ->nullable()
                ->after('onboarding_service_id')
                ->constrained('onboarding_service_variants')
                ->nullOnDelete();
        });

        Schema::table('addon_subscriptions', function (Blueprint $table): void {
            $table->foreignId('onboarding_addon_id')
                ->nullable()
                ->after('addon_id')
                ->constrained('onboarding_addons')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('addon_subscriptions', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('onboarding_addon_id');
        });

        Schema::table('service_subscriptions', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('onboarding_service_variant_id');
            $table->dropConstrainedForeignId('onboarding_service_id');
        });
    }
};
