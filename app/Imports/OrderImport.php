<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class OrderImport implements WithMultipleSheets 
{
   
    public function sheets(): array
    {
        return [
           0 => new OrderSheetImport(),
           1 => new OrderProductSheetImport(),
        ];
    }
}