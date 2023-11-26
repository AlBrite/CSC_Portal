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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code', 25)->unique();
            $table->unsignedTinyInteger('mandatory')->default(1);
            $table->enum('semester', ['rain', 'harmattan']);
            $table->string('level', 3);
            $table->integer('unit');
            $table->tinyInteger('exam')->default(0);
            $table->tinyInteger('practical')->default(0);
            $table->tinyInteger('test')->default(0);
            $table->tinyInteger('prerequisite')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
