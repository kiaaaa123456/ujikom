<?php

namespace App\Exports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class JenisExport implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        return Jenis::all();
    }

    public function headings(): array
    {
        return [
            'No.',
            'Nama Jenis',
            'Created_at',
            'Update_at',
        ];
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class => function (AfterSheet $event) {
    //             $sheet = $event->sheet;

    //             // Set auto size for columns A-D
    //             $sheet->getColumnDimension('A')->setAutoSize(true);
    //             $sheet->getColumnDimension('B')->setAutoSize(true);
    //             $sheet->getColumnDimension('C')->setAutoSize(true);
    //             $sheet->getColumnDimension('D')->setAutoSize(true);

    //             // Insert new rows and merge cells
    //             $sheet->insertNewRowBefore(1, 2);
    //             $sheet->mergeCells('A1:D1');
    //             $sheet->setCellValue('A1', 'DATA JENIS');
    //             $sheet->getStyle('A1')->getFont()->setBold(true);
    //             $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    //             // Apply borders to the range A3:D{highestRow}
    //             $sheet->getStyle('A3:D' . $sheet->getHighestRow())->applyFromArray([
    //                 'borders' => [
    //                     'allBorders' => [
    //                         'borderStyle' => Border::BORDER_THIN,
    //                         'color' => ['argb' => '000000']
    //                     ]
    //                 ]
    //             ]);

    //             // Apply styles to the headings
    //             $sheet->getStyle('A1:D2')->applyFromArray([
    //                 'font' => [
    //                     'bold' => true,
    //                     'size' => 14,
    //                 ],
    //                 'alignment' => [
    //                     'horizontal' => Alignment::HORIZONTAL_CENTER,
    //                     'vertical' => Alignment::VERTICAL_CENTER,
    //                 ],
    //                 'fill' => [
    //                     'fillType' => Fill::FILL_SOLID,
    //                     'startColor' => ['rgb' => 'e6e6e6'],
    //                 ],
    //             ]);
    //         },
    //     ];
    // }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1, 2);
                $event->sheet->mergeCells('A1:D1');
                $event->sheet->setCellValue('A1', 'DATA JENIS');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A3:D' . $event->sheet->getHighestRow())->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000']
                        ]
                    ]
                ]);
            }
        ];
    }
}
