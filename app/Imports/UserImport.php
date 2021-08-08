<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($user = User::find($row['id'])){
            if(request()->input('encrypted')){
                $row['name'] ? $user->name = $row['name'] : $user->name = $user->name;
                $row['email'] ? $user->email = $row['email'] : $user->email = $user->email;
                $row['address'] ? $user->address = $row['address'] : $user->address = $user->address;
                $row['admin'] ? $user->admin = $row['admin'] : $user->admin = $user->admin;
                $row['password'] ? $user->password = $row['password'] : $user->password = $user->password;

                $user->save();
                
                return;

            }else{
                $row['name'] ? $user->name = $row['name'] : $user->name = $user->name;
                $row['email'] ? $user->email = $row['email'] : $user->email = $user->email;
                $row['address'] ? $user->address = $row['address'] : $user->address = $user->address;
                $row['admin'] ? $user->admin = $row['admin'] : $user->admin = $user->admin;
                $row['password'] ? $user->password = bcrypt($row['password']) : $user->password = $user->password;

                $user->save();

                return;
            }
        }else{
            
            $user = User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'address' => $row['address'],
                'admin' => $row['admin'],
                'password' => bcrypt($row['password']),
            ]);

            return;
        }
    }
}
