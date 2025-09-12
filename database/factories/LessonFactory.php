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
            'course_id' => Course::inRandomOrder()->first()?->id ?? Course::factory(),
            'order' => $this->faker->numberBetween(1, 10),
            'video_url' => $this->faker->boolean(70)
                ? 'https://www.youtube.com/watch?v=' . $this->faker->regexify('[A-Za-z0-9]{11}')
                : null,
            'attachment' => $this->faker->boolean(50)
                ? 'attachments/file-' .rand(1, 2).'.pdf'
                : null,
            'image' => $this->faker->boolean(80)
                ? 'Lesson/work-' .rand(1, 9).'.jpg'
                : null,
            'duration' => $this->faker->numberBetween(5, 120), // dakika
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
