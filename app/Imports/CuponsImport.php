<?php

namespace App\Imports;

use App\Cupon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CuponsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($cupon = Cupon::find($row['id'])){
            $row['name'] ? $cupon->name = $row['name'] : $cupon->name = $cupon->name;
            $row['active'] ? $cupon->active = $row['active'] : $cupon->active = $cupon->active;
            $row['conditions'] ? $cupon->conditions = $row['conditions'] : $cupon->conditions = $cupon->conditions;
            $row['maximum_uses'] ? $cupon->maximum_uses = $row['maximum_uses'] : $cupon->maximum_uses = $cupon->maximum_uses;
            $row['time_alive'] ? $cupon->time_alive = $row['time_alive'] : $cupon->time_alive = $cupon->time_alive;
            $row['value'] ? $cupon->value = $row['value'] : $cupon->value = $cupon->value;
            $row['type'] ? $cupon->type = $row['type'] : $cupon->type = $cupon->type;
           
            $cupon->save();
            
            return;
        }else{
            
            $cupon = Cupon::create([
                'name' => $row['name'],
                'active' => $row['active'],
                'conditions' => $row['conditions'],
                'maximum_uses' => $row['maximum_uses'],
                'time_alive' => $row['time_alive'],
                'value' => $row['value'],
                'type' => $row['type'],
            ]);

            return;
        }
    }
}
