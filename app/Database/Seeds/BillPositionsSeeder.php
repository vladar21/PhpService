<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BillPositionsSeeder extends Seeder
{
    public function run()
    {
        // Get the database instance
        $db = \Config\Database::connect();

        // Get the positions model
        $positionsModel = new \App\Models\BillPositionModel();

        // Create some sample data
        $data = [
            [
                'invoice_id' => 1,
                'name' => 'Product A1',
                'tax' => 23,
                'total_price_gross' => 10.23,
                'quantity' => 1,
            ],
            [
                'invoice_id' => 1,
                'name' => 'Product A2',
                'tax' => 0,
                'total_price_gross' => 50,
                'quantity' => 2,
            ],
            [
                'invoice_id' => 2,
                'name' => 'Product B1',
                'tax' => 8,
                'total_price_gross' => 15.99,
                'quantity' => 3,
            ],
            [
                'invoice_id' => 2,
                'name' => 'Product B2',
                'tax' => 23,
                'total_price_gross' => 25.49,
                'quantity' => 1,
            ],
            [
                'invoice_id' => 3,
                'name' => 'Product C1',
                'tax' => 0,
                'total_price_gross' => 100,
                'quantity' => 1,
            ],
            [
                'invoice_id' => 3,
                'name'=> 'Product C2',
                'tax'=> 8,
                'total_price_gross'=> 12.5,
                'quantity'=> 4,
            ]
        ];

        // Insert the data into the positions table
        foreach ($data as $row) {
            $positionsModel->insert($row);
        }

        // Close the database connection
        $db->close();
    }
}
