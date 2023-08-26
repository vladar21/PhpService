<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MeestSendersRecipientsSeeder extends Seeder
{
    public function run()
    {
        $datas = [];
        $datas[0] = [            
            "buildingNumber" => "54",
            "city" => "Лука-Мелешківська",
            "companyName" => "Shechenko&Co LLC",
            "country" => "UA",
            "email" => "recipient@gmail.com",
            "flatNumber" => "20",
            "name" => "Тарас Шевченко",
            "phone" => "+380937069158",
            "pickupPoint" => null,
            "region1" => "Вінницька",
            "region2" => "Вінницький",
            "street" => "Тиврівське",
            "zipCode" => "23234",
        ];
        $datas[1] = [           
            "buildingNumber" => "45",
            "city" => "Warsaw",
            "companyName" => "CompanyName",
            "country" => "PL",
            "email" => "sender@gmail.com",
            "flatNumber" => "10",
            "name" => "Andrzej Sapkowski",
            "phone" => "+48668105534",
            "region1" => "Wojewodztwo mazowieckie",
            "street" => "Podskarbińska",
            "zipCode" => "03-833",       
        ];
        foreach($datas as $data){
            $this->db->table('meest_senders_recipients')->insert($data);
        }
        
    }
}
