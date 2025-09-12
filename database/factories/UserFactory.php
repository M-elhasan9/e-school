<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'), // varsayılan şifre
            'phone' => $this->faker->boolean(80)
                ? $this->faker->unique()->phoneNumber()
                : null,
            'image' => $this->faker->boolean(70)
                ? 'User/person_' .rand(1, 2). '.jpg'
                : null,
            'is_teacher' => false, // default: öğrenci
            'last_login_at' => $this->faker->boolean(60)
                ? $this->faker->dateTimeBetween('-1 month', 'now')
                : null,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function teacher(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_teacher' => true,
        ]);
    }

   public function student(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_teacher' => false,
        ]);
    }
}
