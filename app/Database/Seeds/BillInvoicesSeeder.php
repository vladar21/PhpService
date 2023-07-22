<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BillInvoicesSeeder extends Seeder
{
    public function run()
    {
        // Get the database instance
        $db = \Config\Database::connect();

        // Get the invoices model
        $invoicesModel = new \App\Models\BillInvoices();

        // Create some sample data
        $data = [
            [
                'kind' => 'vat',
                'number' => 'INV-001',
                'sell_date' => '2023-07-23',
                'issue_date' => '2023-07-23',
                'payment_to' => '2023-07-30',
                'seller_name' => 'Seller SA',
                'seller_tax_no' => '5252445767',
                'buyer_name' => 'Client1 SA',
                'buyer_tax_no' => '5252445767',
            ],
            [
                'kind' => 'vat',
                'number' => 'INV-002',
                'sell_date' => '2023-07-24',
                'issue_date' => '2023-07-24',
                'payment_to' => '2023-07-31',
                'seller_name' => 'Seller SA',
                'seller_tax_no' => '5252445767',
                'buyer_name' => 'Client2 SA',
                'buyer_tax_no' => '5252445768',
            ],
            [
                'kind' => 'vat',
                'number'=> 'INV-003',
                'sell_date'=> '2023-07-25',
                'issue_date'=> '2023-07-25',
                'payment_to'=> '2023-08-01',
                'seller_name'=> 'Seller SA',
                'seller_tax_no'=> '5252445767',
                'buyer_name'=> 'Client3 SA',
                'buyer_tax_no'=> '5252445769',
            ]
        ];

        // Insert the data into the invoices table
        foreach ($data as $row) {
            $invoicesModel->insert($row);
        }

        // Close the database connection
        $db->close();
    }
}
