<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('color')->default('#C8A96E');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('portfolio_project_category', function (Blueprint $table) {
            $table->foreignId('portfolio_project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('portfolio_category_id')->constrained()->cascadeOnDelete();
            $table->primary(['portfolio_project_id', 'portfolio_category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_project_category');
        Schema::dropIfExists('portfolio_categories');
    }
};
