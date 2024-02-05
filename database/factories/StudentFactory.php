<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'middlename' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->email(),
            'gender' => fake()->numberBetween(1, 2),
            'phone_number' => fake()->phoneNumber(),
            'created_by' => User::factory(),
            'updated_by' => User::factory(),
        ];
    }
}
