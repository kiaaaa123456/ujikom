<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    public function headingRow()
    {
        return 3;
    }
    public function model(array $row)
    {
        Absensi::create([
            'nama_karyawan' => $row['nama_karyawan'],
            'tanggal_masuk' => $row['tanggal_masuk'],
            'waktu_masuk' => $row['waktu_masuk'],
            'status' => $row['status'],
            'waktu_keluar' => $row['waktu_keluar'],
        ]);
    }
}
