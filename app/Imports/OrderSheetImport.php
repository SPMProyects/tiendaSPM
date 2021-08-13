<?php

namespace App\Imports;

use App\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($order = Order::find($row['id'])){
            $row['user_id'] ? $order->user_id = $row['user_id'] : $order->user_id = $order->user_id;
            $row['total'] ? $order->total = $row['total'] : $order->total = $order->total;
        
            $order->save();
            
            return;
        }else{
            
            $order = Order::create([
                'user_id' => $row['user_id'],
                'total' => $row['total'],
            ]);

            return;
        }

    }
}
