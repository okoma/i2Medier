<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->json('domain_onboarding')->nullable()->after('hosting_preference');
            $table->json('hosting_onboarding')->nullable()->after('domain_onboarding');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['domain_onboarding', 'hosting_onboarding']);
        });
    }
};
