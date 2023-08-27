<?php

namespace App\Database\Seeds;

use App\Models\MeestItemDescriptionModel;
use CodeIgniter\Database\Seeder;

class MeestItemDescriptionsSeeder extends Seeder
{
    public function run()
    {
        $datas = [
            [
                "item_id" => 1,
                "description" => "Słuchawki bezprzewodowe Sony WH-CH510L Blue",
                "lang" => "pl"
            ],
            [
                "item_id" => 1,
                "description" => "Навушники безпровідні Sony WH-CH510L Блакитні",
                "lang" => "uk"
            ],
            [
                "item_id" => 1,
                "description" => "Sony WH-CH510L Blue wireless headphones",
                "lang" => "en"
            ]

        ];

        foreach($datas as $data){
            $model = new MeestItemDescriptionModel();
            $model->insert($data);
//            $this->db->table('meest_item_descriptions')->insert($data);
        }

    }
}
