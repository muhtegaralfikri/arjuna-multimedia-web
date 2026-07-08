<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('form_submissions');
        Schema::dropIfExists('service_areas');
        DB::table('pages')->where('slug', 'area')->delete();
    }

    public function down(): void
    {
        //
    }
};
