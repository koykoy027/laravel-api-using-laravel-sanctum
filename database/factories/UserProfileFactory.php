<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserProfile;
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
            'civil_status' => fake()->numberBetween(3, 6),
            'religion' => fake()->numberBetween(7, 9),
        ];
    }
}
