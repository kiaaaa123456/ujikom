<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    public function headingRow()
    {
        return 3;
    }
    public function model(array $rows)
    {
        return new Category([
            'name' => $rows['name'],
        ]);
    }
}
