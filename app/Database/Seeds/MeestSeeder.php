<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MeestSeeder extends Seeder
{
    public function run()
    {
        $this->call('MeestSendersRecipientsSeeder');
        $this->call('MeestSenderRecipientDocumentsSeeder');
        $this->call('MeestParcelsSeeder');
        $this->call('MeestDimensionsSeeder');
        $this->call('MeestItemsSeeder');
        $this->call('MeestItemDescriptionsSeeder');
    }
}
