<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop website_id FK columns from dependent tables
        Schema::table('service_subscriptions', function (Blueprint $table) {
            $table->dropConstrainedForeignId('website_id');
        });

        Schema::table('onboarding_tasks', function (Blueprint $table) {
            $table->dropConstrainedForeignId('website_id');
        });

        Schema::table('support_tickets', function (Blueprint $table) {
            $table->dropConstrainedForeignId('website_id');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->dropConstrainedForeignId('website_id');
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropConstrainedForeignId('website_id');
        });

        Schema::dropIfExists('client_member_websites');
        Schema::dropIfExists('websites');
    }

    public function down(): void
    {
        // Intentionally not restoring — this is a deliberate removal
    }
};
