<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alert>
 */
class AlertFactory extends Factory
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
            'is_seen' => fake()->boolean(),
            'target_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'name' => fake()->name,
            'description' => fake()->text
        ];
    }
}
