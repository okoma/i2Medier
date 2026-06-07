<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('business_hours_timezone')->default('Africa/Lagos')->after('cookie_banner_message');
            $table->json('business_hours')->nullable()->after('business_hours_timezone');
            $table->boolean('holiday_override_enabled')->default(false)->after('business_hours');
            $table->string('holiday_override_status')->nullable()->after('holiday_override_enabled');
            $table->text('holiday_override_notice')->nullable()->after('holiday_override_status');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'business_hours_timezone',
                'business_hours',
                'holiday_override_enabled',
                'holiday_override_status',
                'holiday_override_notice',
            ]);
        });
    }
};
