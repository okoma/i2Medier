<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hosting_accounts', function (Blueprint $table) {
            $table->string('management_type')->default('i2_managed')->index()->after('notes');
            $table->string('access_panel_url')->nullable()->after('management_type');
            $table->string('access_username', 500)->nullable()->after('access_panel_url');
            $table->string('access_password', 500)->nullable()->after('access_username');
            $table->text('access_notes')->nullable()->after('access_password');
            $table->boolean('alert_sent_30')->default(false)->after('access_notes');
            $table->boolean('alert_sent_14')->default(false)->after('alert_sent_30');
        });
    }

    public function down(): void
    {
        Schema::table('hosting_accounts', function (Blueprint $table) {
            $table->dropColumn([
                'management_type',
                'access_panel_url', 'access_username', 'access_password', 'access_notes',
                'alert_sent_30', 'alert_sent_14',
            ]);
        });
    }
};
