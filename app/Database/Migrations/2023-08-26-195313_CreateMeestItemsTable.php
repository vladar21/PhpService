<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMeestItemsTable extends Migration
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
            'barcode' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'brand' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'hsCode' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'manufacturer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'originCountry' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'productCategory' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'productEAN' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'productURL' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 5,
                'null' => true,
            ],
            'skuCode' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'value' => [
                'type' => 'DECIMAL(10, 2)',
                'null' => true,
            ],
            'weight' => [
                'type' => 'DECIMAL(10, 2)',
                'null' => true,
            ],
            'meest_parcels_id' => [ // Поле для связи с meest_parcels
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('meest_parcels_id', 'meest_parcels', 'id');

        $this->forge->createTable('meest_items');
    }

    public function down()
    {
        $this->forge->dropTable('meest_items');
    }
}