<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_subscriptions', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable()->after('client_id')->constrained()->nullOnDelete();
            $table->foreignId('website_id')->nullable()->change();
        });

        Schema::table('onboarding_tasks', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->foreignId('website_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('service_subscriptions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('project_id');
        });

        Schema::table('onboarding_tasks', function (Blueprint $table) {
            $table->dropConstrainedForeignId('project_id');
        });
    }
};
