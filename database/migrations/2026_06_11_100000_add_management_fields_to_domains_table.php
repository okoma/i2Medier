<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->string('management_type')->default('i2_managed')->index()->after('notes');
            $table->decimal('price', 12, 2)->nullable()->after('management_type');
            $table->string('currency', 10)->default('NGN')->nullable()->after('price');
            $table->string('billing_cycle')->nullable()->after('currency');
            $table->string('access_registrar_url')->nullable()->after('billing_cycle');
            $table->string('access_username', 500)->nullable()->after('access_registrar_url');
            $table->string('access_password', 500)->nullable()->after('access_username');
            $table->text('access_notes')->nullable()->after('access_password');
            $table->date('whois_expires_at')->nullable()->after('access_notes');
            $table->string('whois_registrar')->nullable()->after('whois_expires_at');
            $table->string('whois_status_raw')->nullable()->after('whois_registrar');
            $table->dateTime('whois_last_checked_at')->nullable()->after('whois_status_raw');
            $table->longText('whois_raw')->nullable()->after('whois_last_checked_at');
            $table->boolean('alert_sent_30')->default(false)->after('whois_raw');
            $table->boolean('alert_sent_14')->default(false)->after('alert_sent_30');
            $table->boolean('alert_sent_7')->default(false)->after('alert_sent_14');
        });
    }

    public function down(): void
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->dropColumn([
                'management_type', 'price', 'currency', 'billing_cycle',
                'access_registrar_url', 'access_username', 'access_password', 'access_notes',
                'whois_expires_at', 'whois_registrar', 'whois_status_raw', 'whois_last_checked_at', 'whois_raw',
                'alert_sent_30', 'alert_sent_14', 'alert_sent_7',
            ]);
        });
    }
};
