<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jenis>
 */
class JenisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_jenis' => $this->faker->randomElement(['Coffee', 'Kopi Baper Espresso', 'Kopi Baper Coldbrew', 'Frappe', 'Milk Series', 'Tea Series', 'Milk Indonesia']),
        ];
    }

}
