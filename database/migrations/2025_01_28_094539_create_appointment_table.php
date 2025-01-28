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
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pid'); 
            $table->unsignedBigInteger('tid'); 
            $table->unsignedBigInteger('did'); 
            $table->date('date'); 
            $table->time('time'); 
            $table->string('patient_email');
            $table->string('patient_phone');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('pid')->references('id')->on('patient')->onDelete('cascade');
            $table->foreign('tid')->references('id')->on('treatment')->onDelete('cascade');
            $table->foreign('did')->references('id')->on('userr')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment');
    }
};
