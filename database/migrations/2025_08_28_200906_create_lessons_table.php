<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content')->nullable();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->integer('order')->default(1);
            $table->timestamps();
            $table->string('image')->nullable();
            $table->integer('duration')->nullable();
            $table->string('status')->default('active');
             $table->string('video_url')->nullable(); // YouTube veya mp4 linki
             $table->string('attachment')->nullable(); // ek dosya

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
