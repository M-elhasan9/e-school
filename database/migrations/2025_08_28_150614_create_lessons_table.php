use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->longText('content')->nullable();
            $table->string('video_url')->nullable();
            $table->unsignedSmallInteger('order')->default(1);
            $table->unsignedSmallInteger('duration_minutes')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();

            $table->index(['course_id', 'order']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('lessons');
    }
};
