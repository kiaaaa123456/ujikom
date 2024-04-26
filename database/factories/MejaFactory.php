<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meja>
 */
class MejaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_meja' => fake()->numberBetween(1, 50),
            'kapasitas' => fake()->numberBetween(1, 20),
            'status' => fake()->randomElement(['Resservasi', 'Kosong']),
        ];
    }
}
