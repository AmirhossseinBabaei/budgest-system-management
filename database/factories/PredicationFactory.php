<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PredicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 100),
            'type' => fake()->randomElement(['cost', 'income', 'target', 'saving']),
            'name' => fake()->word(),
            'description' => fake()->text,
            'amount' => fake()->numberBetween(0, 10000000),
        ];
    }
}
