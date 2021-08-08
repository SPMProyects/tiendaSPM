<?php

namespace App\Exports;

use App\Configuration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ConfigurationsExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithColumnWidths
{
    public function headings(): array{
        return [
            'id',
            'general',
            'home',
            'company',
            'chat_contact_social',
            'email_server',
            'popup'
        ];
    }

        public function styles(Worksheet $sheet)
    {
        return [
            'A1:G1' => ['font' => [
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
            'A:G' => ['alignment' => [
                                        'vertical' => 'center',
                                        'horizontal' => 'center',
                                        ]
                    ],
            'B:G' => [
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
            'C' => 70,            
            'D' => 70,            
            'E' => 70,            
            'F' => 70,            
            'G' => 70,            
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Configuration::select('id','general','home','company','chat_contact_social','email_server','popup')->get();
    }
}
