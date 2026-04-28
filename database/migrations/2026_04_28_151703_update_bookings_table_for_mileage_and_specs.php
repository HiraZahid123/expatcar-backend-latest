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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('mileage', 100)->change();
            $table->string('specs', 50)->nullable()->after('mileage');
            $table->string('car_option', 50)->nullable()->after('specs');
            $table->string('paint_condition', 50)->nullable()->after('car_option');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('mileage')->change();
            $table->dropColumn(['specs', 'car_option', 'paint_condition']);
        });
    }
};
