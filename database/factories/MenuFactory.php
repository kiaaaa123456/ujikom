<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Menu;
use App\Models\Jenis;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        // Ambil ID jenis secara acak
        $jenis_id = Jenis::pluck('id')->random();

        return [
            'jenis_id' => $jenis_id,
            'nama_menu' => $this->faker->randomElement('Nasi Goreng','Nasi Putih','Nasi Kuning','Ice Kopi','Hot Kopi','Jus Alpukat','Jus Mangga'),
            'harga' => $this->faker->numberBetween(10000, 50000),
            'image' => $this->faker->imageUrl(),
            'deskripsi' => $this->faker->paragraph(3),
        ];
    }
}

