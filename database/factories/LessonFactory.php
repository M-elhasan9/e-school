<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lesson;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'content' => $this->faker->paragraph(5),
            // Eğer course_id verilmemişse rastgele bir kurs ile bağla
            'course_id' => Course::inRandomOrder()->first()?->id ?? Course::factory(),
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
