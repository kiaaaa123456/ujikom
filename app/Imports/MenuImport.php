<?php

namespace App\Imports;

use App\Models\Menu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Menu::create([
                'jenis_id' => $row['jenis_id'],
                'nama_menu' => $row['nama_menu'],
                'jenis_id' => $row['jenis_id'],
                'jenis_id' => $row['jenis_id'],
                'jenis_id' => $row['jenis_id'],
                'jenis_id' => $row['jenis_id'],
            ]);
        }
    }
}
