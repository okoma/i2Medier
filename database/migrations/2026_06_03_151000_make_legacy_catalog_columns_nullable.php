<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_subscriptions', function (Blueprint $table): void {
            $table->foreignId('service_id')->nullable()->change();
        });

        Schema::table('addon_subscriptions', function (Blueprint $table): void {
            $table->foreignId('addon_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('addon_subscriptions', function (Blueprint $table): void {
            $table->foreignId('addon_id')->nullable(false)->change();
        });

        Schema::table('service_subscriptions', function (Blueprint $table): void {
            $table->foreignId('service_id')->nullable(false)->change();
        });
    }
};
