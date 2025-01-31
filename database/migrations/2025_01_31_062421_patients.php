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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address');
            $table->integer('age');
            $table->string('state');
            $table->string('city');
            $table->text('profile')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('maritial_status')->nullable();
            $table->text('medical_history')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('treatment_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
