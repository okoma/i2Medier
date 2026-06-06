<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('about_team_eyebrow')->nullable()->after('apple_touch_icon');
            $table->string('about_team_heading')->nullable()->after('about_team_eyebrow');
            $table->text('about_team_intro')->nullable()->after('about_team_heading');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'about_team_eyebrow',
                'about_team_heading',
                'about_team_intro',
            ]);
        });
    }
};
