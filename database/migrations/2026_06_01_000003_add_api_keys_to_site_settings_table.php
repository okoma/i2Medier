<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('pagespeed_api_key')->nullable()->after('cookie_banner_message');
            $table->string('anthropic_api_key')->nullable()->after('pagespeed_api_key');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['pagespeed_api_key', 'anthropic_api_key']);
        });
    }
};
