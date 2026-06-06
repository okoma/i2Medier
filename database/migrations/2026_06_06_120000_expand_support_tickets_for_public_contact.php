<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->foreignId('client_id')->nullable()->change();
            $table->string('requester_name')->nullable()->after('assigned_to');
            $table->string('requester_email')->nullable()->after('requester_name');
            $table->string('requester_phone')->nullable()->after('requester_email');
            $table->string('requester_company')->nullable()->after('requester_phone');
            $table->string('department')->nullable()->after('category');
            $table->string('department_email')->nullable()->after('department');
            $table->string('source')->default('portal')->after('department_email');
            $table->string('channel')->default('portal')->after('source');
            $table->string('source_page')->nullable()->after('channel');

            $table->index(['source', 'status']);
            $table->index('department');
        });
    }

    public function down(): void
    {
        Schema::table('support_tickets', function (Blueprint $table) {
            $table->dropIndex(['source', 'status']);
            $table->dropIndex(['department']);

            $table->dropColumn([
                'requester_name',
                'requester_email',
                'requester_phone',
                'requester_company',
                'department',
                'department_email',
                'source',
                'channel',
                'source_page',
            ]);

            $table->foreignId('client_id')->nullable(false)->change();
        });
    }
};
