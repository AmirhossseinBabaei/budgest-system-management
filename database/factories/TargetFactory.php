<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Target>
 */
class TargetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 99),
            'status' => fake()->randomElement(['pending', 'confirmed', 'error', 'expired']),
            'target_date' => fake()->date(),
            'amount' => fake()->numberBetween(500000, 20000000),
            'name' => fake()->name,
            'description' => fake()->optional()->text(150),
        ];
    }
}
