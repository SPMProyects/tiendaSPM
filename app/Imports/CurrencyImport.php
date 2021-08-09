<?php

namespace App\Imports;

use App\Currency;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CurrencyImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($currency = Currency::find($row['id'])){
            $row['name'] ? $currency->name = $row['name'] : $currency->name = $currency->name;
            $row['value'] ? $currency->value = $row['value'] : $currency->value = $currency->value;
        
            $currency->save();
            
            return;
        }else{
            
            $currency = Currency::create([
                'name' => $row['name'],
                'value' => $row['value'],
            ]);

            return;
        }
    }
}
