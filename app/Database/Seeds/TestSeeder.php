<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        $this->call('BillInvoicesSeeder');
        $this->call('BillPositionsSeeder');
    }
}