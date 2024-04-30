<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelangganImport implements ToModel, WithHeadingRow
{
    public function headingRow()
    {
        return 3;
    }
    public function model(array $rows)
    {
        return new Pelanggan([
            'nama' => $rows['nama'],
            'alamat' => $rows['alamat'],
            'no_telp' => $rows['no_telp'],
            'email' => $rows['email'],
        ]);
    }
}
