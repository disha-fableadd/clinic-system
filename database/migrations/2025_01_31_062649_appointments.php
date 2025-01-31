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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('treatment_id');
            $table->enum('appoint_type', ['virtual', 'in-person']);
            $table->enum('status', ['scheduled', 'confirmed', 'completed', 'cancelled', 'no-show']);
            $table->time('time');
            $table->string('duration');
            $table->string('clinic_location');
            $table->boolean('followup_required')->default(false);
            $table->text('followup_update')->nullable();
            $table->timestamps();
  });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
