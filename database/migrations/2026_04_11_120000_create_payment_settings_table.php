<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('paystack_enabled')->nullable();
            $table->string('paystack_public_key')->nullable();
            $table->text('paystack_secret_key')->nullable();
            $table->boolean('bank_transfer_enabled')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_sort_code')->nullable();
            $table->text('bank_instructions')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_settings');
    }
};
