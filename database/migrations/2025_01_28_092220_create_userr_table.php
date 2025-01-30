<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('userr', function (Blueprint $table) {
            // $table->id(); 
            // $table->unsignedBigInteger('role_id'); 
            // $table->string('fname');
            // $table->string('lname');
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->enum('gender', ['Male', 'Female', 'Other']);
            // $table->string('address');
            // $table->string('city');
            // $table->string('state');
            // $table->string('phone');
            // $table->string('image');
            // $table->date('joining_date');
            // $table->timestamps();

            // Foreign Key Constraint
            // $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
            // });
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('phone');
            $table->string('image');
            $table->date('joining_date');
            $table->json('education'); 
            $table->json('experience'); 
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userr');
    }
};
