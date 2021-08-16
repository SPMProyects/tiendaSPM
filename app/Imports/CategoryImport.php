<?php

namespace App\Imports;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($category = Category::find($row['id'])){
            $row['name'] ? $category->name = $row['name'] : $category->name = $category->name;
            $row['description'] ? $category->description = $row['description'] : $category->description = $category->description;
            $row['parent_id'] ? $category->parent_id = $row['parent_id'] : $category->parent_id = $category->parent_id;
        
            $category->save();
            
            return;
        }else{
            
            $category = Category::create([
                'name' => $row['name'],
                'value' => $row['value'],
                'parent_id' => $row['parent_id'],
            ]);

            return;
        }
    }
}
