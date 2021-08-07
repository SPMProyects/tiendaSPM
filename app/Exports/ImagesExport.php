<?php

namespace App\Exports;

use App\Image;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ImagesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
{

    public function headings(): array{
        return [
            'id',
            'path',
            'created_at',
            'updated_at',
        ];
    }

        public function styles(Worksheet $sheet)
    {
        return [
            'A1:D1' => ['font' => [
                                    'bold' => true,
                                    'size' => 14
                                ],
                        'borders' => [
                                    'bottom' => [
                                        'borderStyle' => 'thin',
                                        'color' => ['argb' => 'FF000000']
                                    ],
                                ],
                        ],
            'A:D' => ['alignment' => [
                                        'vertical' => 'center',
                                        'horizontal' => 'center',
                                        ]
                    ],
            'B' => [
                'alignment' => [
                    'wrapText' => 'true'
                ]
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'B' => 70,            
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Image::select('id','path', 'created_at','updated_at')->get();
    }
}
