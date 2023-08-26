<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MeestSenderRecipientDocumentsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            "sender_recipient_id" => 1,
            "date" => "2020-03-13",
            "id" => "25451115544",
            "issuer" => "1402",
            "name" => "Foreign Passport",
            "number" => "461222",
            "series" => "FE",
        ];

        $this->db->table('meest_sender_recipient_documents')->insert($data);
    }
}
