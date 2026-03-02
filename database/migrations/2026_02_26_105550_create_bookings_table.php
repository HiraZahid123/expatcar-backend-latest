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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number', 20)->unique();
            $table->foreignId('variant_id')->nullable()->constrained('variants')->nullOnDelete();
            $table->string('make_name', 100);
            $table->string('model_name', 150);
            $table->string('variant_name', 200);
            $table->smallInteger('year');
            $table->integer('mileage');
            $table->string('name', 150);
            $table->string('phone', 20);
            $table->string('email', 200);
            $table->json('utm_data')->nullable();
            $table->string('status', 30)->default('pending');
            $table->string('zoho_lead_id', 50)->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();

            $table->index(['phone', 'created_at']);
            $table->index('status');
            $table->index('created_at');
            $table->index('zoho_lead_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
