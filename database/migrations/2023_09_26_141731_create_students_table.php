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
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('set_id')->nullable();
            $table->string('reg_no');
            $table->string('phone', 12)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->integer('level');
            $table->string('image')->nullable();
            $table->timestamps();

            // Establish relationships
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
