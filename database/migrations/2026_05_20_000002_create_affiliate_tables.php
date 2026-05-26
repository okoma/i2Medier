<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('affiliate_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('referral_code')->unique();
            $table->string('status')->default('active');
            $table->decimal('commission_rate', 5, 2)->default(20);
            $table->string('payout_email')->nullable();
            $table->string('payout_bank_name')->nullable();
            $table->string('payout_account_name')->nullable();
            $table->string('payout_account_number')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('affiliate_referrals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('affiliate_profile_id')->constrained()->cascadeOnDelete();
            $table->string('referral_id')->unique();
            $table->string('referred_domain');
            $table->string('product_name');
            $table->decimal('order_amount', 12, 2)->default(0);
            $table->decimal('commission_amount', 12, 2)->default(0);
            $table->string('status')->default('pending');
            $table->date('referred_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('affiliate_referrals');
        Schema::dropIfExists('affiliate_profiles');
    }
};
