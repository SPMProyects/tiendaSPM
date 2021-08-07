<?php

namespace App\Exports;

use App\Currency;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CurrenciesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{

    public function headings(): array{
        return [
            'id',
            'name',
            'value',
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
        return Currency::select('id','name','value','created_at','updated_at')->get();
    }
}
