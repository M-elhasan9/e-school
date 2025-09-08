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
    Schema::table('courses', function (Blueprint $table) {
        $table->decimal('price', 8, 2)->default(0); // 8 basamak, 2 ondalık
        $table->integer('enrolled_students')->default(0); // varsayılan 0
    });
}

public function down(): void
{
    Schema::table('courses', function (Blueprint $table) {
        $table->dropColumn('price');
        $table->dropColumn('enrolled_students');
    });
}

};
