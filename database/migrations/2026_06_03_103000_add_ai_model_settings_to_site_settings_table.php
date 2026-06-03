<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('anthropic_model')->nullable()->after('ai_primary_provider');
            $table->string('openai_model')->nullable()->after('anthropic_model');
            $table->string('gemini_model')->nullable()->after('openai_model');
            $table->string('mistral_model')->nullable()->after('gemini_model');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'anthropic_model',
                'openai_model',
                'gemini_model',
                'mistral_model',
            ]);
        });
    }
};
