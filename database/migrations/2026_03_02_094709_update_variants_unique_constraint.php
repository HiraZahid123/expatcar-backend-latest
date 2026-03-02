<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('variants', function (Blueprint $table) {
            $table->dropUnique('variants_model_id_year_name_unique');
            $table->unique(['model_id', 'year', 'name', 'body_type', 'engine', 'transmission'], 'variants_full_unique');
        });
    }

    public function down(): void
    {
        Schema::table('variants', function (Blueprint $table) {
            $table->dropUnique('variants_full_unique');
            $table->unique(['model_id', 'year', 'name']);
        });
    }
};
