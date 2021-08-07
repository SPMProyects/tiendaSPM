<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ProductsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
{

    public function headings(): array{
        return [
            'id',
            'name',
            'description',
            'category_id',
            'currency_id',
            'price',
            'sales_price',
            'featured',
            'active',
            'created_at',
            'updated_at',
        ];
    }

        public function styles(Worksheet $sheet)
    {
        return [
            'A1:K1' => ['font' => [
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
            'A:K' => ['alignment' => [
                                        'vertical' => 'center',
                                        'horizontal' => 'center',
                                        ]
                    ],
            'C' => [
                'alignment' => [
                    'wrapText' => 'true'
                ]
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'C' => 70,            
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('id','name', 'description', 'category_id', 'currency_id', 'price','sales_price', 'featured', 'active', 'created_at','updated_at')->get();
    }

}
