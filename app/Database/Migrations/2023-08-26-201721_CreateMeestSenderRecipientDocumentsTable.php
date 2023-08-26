<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMeestRecipientDocumentsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'sender_recipient_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'id_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'issuer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'series' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('sender_recipient_id', 'meest_senders_recipients', 'id');
        $this->forge->createTable('meest_sender_recipient_documents');
    }

    public function down()
    {
        $this->forge->dropTable('meest_sender_recipient_documents');
    }
}
