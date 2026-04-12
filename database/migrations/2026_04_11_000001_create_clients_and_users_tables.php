<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_name')->nullable();
            $table->string('email')->nullable()->index();
            $table->string('phone')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->text('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('logo')->nullable();
            $table->string('status')->default('active');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('client_id')->nullable()->after('id')->constrained()->nullOnDelete();
            $table->string('phone')->nullable()->after('password');
            $table->string('whatsapp_number')->nullable()->after('phone');
            $table->string('avatar')->nullable()->after('whatsapp_number');
            $table->boolean('is_active')->default(true)->after('avatar');
            $table->timestamp('last_login_at')->nullable()->after('is_active');
            $table->json('notification_preferences')->nullable()->after('last_login_at');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('client_id');
            $table->dropColumn([
                'phone',
                'whatsapp_number',
                'avatar',
                'is_active',
                'last_login_at',
                'notification_preferences',
            ]);
        });

        Schema::dropIfExists('clients');
    }
};
