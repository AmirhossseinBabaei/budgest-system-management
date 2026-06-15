<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
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
            'status' => fake()->randomElement(['pending', 'paid', 'rejected', 'expired']),
            'name' => fake()->word() . ' Bill',
            'description' => fake()->text,
            'amount' => fake()->numberBetween(50000, 500000),
        ];
    }
}
