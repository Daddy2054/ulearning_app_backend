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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('course_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('thumbnail');
            $table->string('video')->nullable();
            $table->timestamps();
        });
    }
    // php artisan make:migration create_lessons_table
    // php artisan migrate
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
