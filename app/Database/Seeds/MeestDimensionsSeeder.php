<?php

namespace App\Database\Seeds;

use App\Models\MeestDimensionModel;
use CodeIgniter\Database\Seeder;

class MeestDimensionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'meest_parcels_id' => 1,
            'height' => 20,
            'length' => 25,
            'width' => 10,
        ];

        $model = new MeestDimensionModel();
        $model->insert($data);
//        $this->db->table('meest_dimensions')->insert($data);
    }
}



