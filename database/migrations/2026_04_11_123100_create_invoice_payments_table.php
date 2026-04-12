<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->cascadeOnDelete();
            $table->string('method');
            $table->string('provider')->nullable();
            $table->string('status')->default('pending');
            $table->decimal('amount', 12, 2)->default(0);
            $table->string('currency', 3)->default('NGN');
            $table->string('reference')->index();
            $table->string('gateway_reference')->nullable()->index();
            $table->json('gateway_payload')->nullable();
            $table->timestamp('initiated_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_payments');
    }
};
