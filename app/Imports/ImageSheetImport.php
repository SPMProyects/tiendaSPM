<?php

namespace App\Imports;

use App\Image;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImageSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $folderZip = str_replace('.zip','',request()->file('excel-file')->getClientOriginalName());
        
        $name_path_full = 'import/' . $folderZip . '/' . $row['path'];
        $name_path = str_replace('import/' . $folderZip . '/', '', $name_path_full);

        if(Image::where('path', $name_path)->count() == 0){
            
            if(!Storage::disk('public')->exists($name_path)){
                Storage::disk('public')->move($name_path_full, $name_path);
                Storage::disk('public')->delete($name_path_full);
                Image::create([
                    'path' =>  $name_path
                ]);
            }else{
                Storage::disk('public')->delete($name_path_full);
                return;
            }
        }else{
            return;
        }
        
    }
}
