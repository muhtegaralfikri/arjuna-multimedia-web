<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('speed'); // e.g., "10 Mbps"
            $table->unsignedInteger('speed_value')->default(0); // for sorting
            $table->decimal('price_monthly', 10, 2);
            $table->decimal('installation_fee', 10, 2)->default(0);
            $table->string('quota')->nullable(); // e.g., "Unlimited", "100 GB FUP"
            $table->text('description')->nullable();
            $table->json('features')->nullable(); // array of strings
            $table->string('category')->default('home'); // home, business
            $table->boolean('is_popular')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('slug');
            $table->index('is_active');
            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
