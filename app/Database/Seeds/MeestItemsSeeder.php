<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MeestItemsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            "meest_parcels_id" => 1,
            "barcode" => "0255851158",
            "brand" => "Sony",
            "description" => "Słuchawki bezprzewodowe Sony WH-CH510L Blue",
            "hsCode" => "851830000080",
            "manufacturer" => "Sony Corporation",
            "originCountry" => "JP",
            "productCategory" => "Household appliances",
            "productEAN" => "4525330005583",
            "productURL" => "https://test.com/item1",
            "quantity" => 1,
            "skuCode" => "SKU1451885",
            "value" => 30,
            "weight" => 0.5
        ];

        $this->db->table('meest_items')->insert($data);
    }
}

