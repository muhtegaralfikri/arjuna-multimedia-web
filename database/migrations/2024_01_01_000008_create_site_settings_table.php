<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('site_name')->default('Arjuna Multimedia');
            $table->text('site_url')->nullable();
            $table->text('logo_url')->nullable();
            $table->text('favicon_url')->nullable();
            $table->string('brand_color_primary', 7)->default('#2563EB');
            $table->string('brand_color_secondary', 7)->default('#1E40AF');
            $table->string('google_analytics_id')->nullable();
            $table->string('gtm_id')->nullable();
            $table->text('google_business_profile_url')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
