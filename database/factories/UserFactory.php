<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'lastname' => fake()->lastName(),
            'email' => fake()->email(),
            'category' => fake()->randomElement(['visitor', 'owner']),
            'image' => "https://i.pravatar.cc/350?img=" . fake()->numberBetween(1, 70),
            'password' => Hash::make('asdf1234'),
        ];
    }
}
