<?php

namespace App\Imports;

use App\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderProductSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $order = Order::find($row['order_id']);
        
        if($order != null && $order->id > 0){
  
            $order->products()->attach($row['product_id'], [
                'price' => $row['price'],
                'quantity' => $row['quantity'],
            ]);
            
        }
        return;
    }
}
