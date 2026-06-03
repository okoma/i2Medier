<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('status')->default('enquiry');

            // Brief
            $table->string('timeline')->nullable();
            $table->string('budget')->nullable();
            $table->string('source')->nullable();
            $table->string('domain_preference')->nullable();
            $table->string('hosting_preference')->nullable();
            $table->text('message')->nullable();

            // Attribution
            $table->string('source_page')->nullable();
            $table->string('source_label')->nullable();

            // Full snapshot of what the client selected at submission time
            $table->json('services');

            $table->timestamp('terms_accepted_at')->nullable();
            $table->timestamp('converted_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
