<?php

namespace App\Imports;

use App\Configuration;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ConfigurationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        if($config = Configuration::find($row['id'])){
            $row['general'] ? $config->general = $row['general'] : $config->general = $config->general;
            $row['home'] ? $config->home = $row['home'] : $config->home = $config->home;
            $row['company'] ? $config->company = $row['company'] : $config->company = $config->company;
            $row['chat_contact_social'] ? $config->chat_contact_social = $row['chat_contact_social'] : $config->chat_contact_social = $config->chat_contact_social;
            $row['email_server'] ? $config->email_server = $row['email_server'] : $config->email_server = $config->email_server;
            $row['popup'] ? $config->popup = $row['popup'] : $config->popup = $config->popup;
        
            $config->save();
            
            return;
        }else{
            
            $config = Configuration::create([
                'name' => $row['general'],
                'home' => $row['home'],
                'company' => $row['company'],
                'chat_contact_social' => $row['chat_contact_social'],
                'email_server' => $row['email_server'],
                'popup' => $row['popup'],
            ]);

            return;
        }

    }
}
