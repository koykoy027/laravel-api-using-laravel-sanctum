<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $id = 1;
    public function definition(): array
    {
        return [
            'id' => self::$id++,
            'firstname' => fake()->firstName(),
            'middlename' => fake()->lastName(),
            'lastname' => fake()->lastName(),
            'gender' => fake()->numberBetween(1, 2),
        ];
    }
}
