<?php

namespace App\Database\Seeds;

use App\Models\MeestSenderRecipientModel;
use CodeIgniter\Database\Seeder;

class MeestSendersRecipientsSeeder extends Seeder
{
    public function run()
    {
        $datas = [];
        $datas[0] =[ // sender
            'buildingNumber' => '5A',
            'city' => 'CITY_TEST01',
            'companyName' => 'COMPANY_TEST01',
            'country' => 'PL',
            'email' => 'support@com.com',
            'flatNumber' => '2F',
            'name' => 'John Doe',
            'phone' => '+380999999999',
            'region1' => 'REGION_TEST01',
            'street' => 'STREET_TEST01',
            'zipCode' => 'ZIP_TEST01',
        ];
        $datas[1] = [
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
        $datas[2] = [
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

        $model = new MeestSenderRecipientModel();
        foreach($datas as $data){
            $model->insert($data);
//            $this->db->table('meest_senders_recipients')->insert($data);
        }
        
    }
}
