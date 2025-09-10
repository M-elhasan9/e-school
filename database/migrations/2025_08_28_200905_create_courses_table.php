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
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->string('image')->nullable();
            $table->integer('duration')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('status')->nullable(); // ör: active, draft
            $table->boolean('is_featured')->default(false);
             $table->integer('enrolled_students')->default(0); // varsayılan 0

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
