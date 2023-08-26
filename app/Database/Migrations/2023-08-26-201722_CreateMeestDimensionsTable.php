<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMeestDimensionsTable extends Migration
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
            'height' => [
                'type' => 'DECIMAL(10, 2)',
                'null' => true,
            ],
            'length' => [
                'type' => 'DECIMAL(10, 2)',
                'null' => true,
            ],
            'width' => [
                'type' => 'DECIMAL(10, 2)',
                'null' => true,
            ],
            'meest_parcels_id' => [ // Поле для связи с meest_parcels
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('meest_parcels_id', 'meest_parcels', 'id');

        $this->forge->createTable('meest_dimensions');
    }

    public function down()
    {
        $this->forge->dropTable('meest_dimensions');
    }
}