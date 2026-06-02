<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            // Branding
            $table->string('logo_dark')->nullable();   // Logo for light backgrounds
            $table->string('logo_light')->nullable();  // Logo for dark backgrounds (white version)

            // Analytics
            $table->boolean('analytics_enabled')->default(false);
            $table->string('analytics_measurement_id')->nullable();

            // Cookie Consent
            $table->boolean('cookie_consent_enabled')->default(true);
            $table->text('cookie_banner_message')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
