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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('car_models')->cascadeOnDelete();
            $table->smallInteger('year');
            $table->string('name', 200);
            $table->string('body_type', 80)->nullable();
            $table->string('engine', 100)->nullable();
            $table->string('transmission', 50)->nullable();
            $table->boolean('gcc_specs')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['model_id', 'year', 'name']);
            $table->index('year');
            $table->index(['model_id', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
