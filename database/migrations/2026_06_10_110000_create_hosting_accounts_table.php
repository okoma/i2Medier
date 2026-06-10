<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hosting_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('name');
            $table->string('type')->default('cpanel');
            $table->string('primary_domain')->nullable();
            $table->string('status')->default('active');
            $table->decimal('price', 12, 2)->nullable();
            $table->string('currency', 10)->default('NGN');
            $table->string('billing_cycle')->nullable();
            $table->date('starts_at')->nullable();
            $table->date('expires_at')->nullable();
            $table->boolean('auto_renew')->default(true);
            $table->string('server_location')->nullable();
            $table->unsignedTinyInteger('disk_usage_percent')->default(0);
            $table->unsignedTinyInteger('bandwidth_usage_percent')->default(0);
            $table->unsignedTinyInteger('cpu_usage_percent')->default(0);
            $table->unsignedTinyInteger('ram_usage_percent')->default(0);
            $table->string('control_panel_url')->nullable();
            $table->timestamp('last_backup_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['client_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hosting_accounts');
    }
};
