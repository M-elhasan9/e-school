<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Courses tablosuna kolon ekleme
        Schema::table('courses', function (Blueprint $table) {
            if (!Schema::hasColumn('courses', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('courses', 'duration')) {
                $table->string('duration')->nullable();
            }
            if (!Schema::hasColumn('courses', 'status')) {
                $table->enum('status', ['active','inactive'])->default('active');
            }
        });

        // Lessons tablosuna kolon ekleme
        Schema::table('lessons', function (Blueprint $table) {
            if (!Schema::hasColumn('lessons', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('lessons', 'duration')) {
                $table->string('duration')->nullable();
            }
            if (!Schema::hasColumn('lessons', 'status')) {
                $table->enum('status', ['active','inactive'])->default('active');
            }
        });
    }

    public function down(): void
    {
        // Courses tablosundan kolon silme
        Schema::table('courses', function (Blueprint $table) {
            $columns = ['image', 'duration', 'status'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('courses', $column)) {
                    $table->dropColumn($column);
                }
            }
        });

        // Lessons tablosundan kolon silme
        Schema::table('lessons', function (Blueprint $table) {
            $columns = ['image', 'duration', 'status'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('lessons', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
