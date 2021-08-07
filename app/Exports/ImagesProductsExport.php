<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ImagesProductsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{

    public function headings(): array{
        return [
            'id',
            'product_id',
            'image_id',
        ];
    }

        public function styles(Worksheet $sheet)
    {
        return [
            'A1:C1' => ['font' => [
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
            'A:C' => ['alignment' => [
                                        'vertical' => 'center',
                                        'horizontal' => 'center',
                                        ]
                    ],
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('image_product')->select('id','product_id','image_id')->get();
    }
}
