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
        Schema::create('course_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Optional pivot fields (uncomment if you want them)
            // $table->enum('role', ['student', 'teacher'])->nullable();
            // $table->timestamp('enrolled_at')->nullable();

            $table->timestamps();

            $table->unique(['course_id', 'user_id']); // prevent duplicates
            $table->index(['user_id', 'course_id']);  // helpful for lookups
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_user');
    }
};
