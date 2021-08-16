<?php

namespace App\Exports;

use App\Cupon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CuponsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function headings(): array{
        return [
            'id',
            'name',
            'active',
            'conditions',
            'maximum_uses',
            'time_alive',
            'value',
            'type',
            'created_at',
            'updated_at',
        ];
    }

        public function styles(Worksheet $sheet)
    {
        return [
            'A1:J1' => ['font' => [
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
            'A:J' => ['alignment' => [
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
        return Cupon::select('id','name','active','conditions','maximum_uses','time_alive','value','type','created_at','updated_at')->get();
    }
}
