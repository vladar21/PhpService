<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BillPositions extends Migration
{
    public function up()
    {
        // Create positions table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'invoice_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tax' => [
                'type' => 'INT',
                'constraint' => 2,
            ],
            'total_price_gross' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
            ]
        ]);

        // Add primary key
        $this->forge->addKey('id', true);

        // Create table
        $this->forge->createTable('bill_positions');
    }

    public function down()
    {
        // Drop table
        $this->forge->dropTable('bill_positions');
    }
}

