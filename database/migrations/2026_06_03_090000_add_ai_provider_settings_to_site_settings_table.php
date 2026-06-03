<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('openai_api_key')->nullable()->after('anthropic_api_key');
            $table->string('gemini_api_key')->nullable()->after('openai_api_key');
            $table->string('mistral_api_key')->nullable()->after('gemini_api_key');
            $table->string('ai_primary_provider')->default('auto')->after('mistral_api_key');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'openai_api_key',
                'gemini_api_key',
                'mistral_api_key',
                'ai_primary_provider',
            ]);
        });
    }
};
