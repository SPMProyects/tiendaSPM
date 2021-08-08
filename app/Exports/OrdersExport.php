<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{

    public function headings(): array{
        return [
            'id',
            'user_id',
            'total',
            'created_at',
            'updated_at',
        ];
    }

        public function styles(Worksheet $sheet)
    {
        return [
            'A1:E1' => ['font' => [
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
            'A:E' => ['alignment' => [
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
        return Order::select('id','user_id','total','created_at','updated_at')->get();
    }
}
