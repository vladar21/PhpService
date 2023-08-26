<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMeestItemDescriptionsTable extends Migration
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
            'item_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'lang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('item_id', 'meest_items', 'id');
        $this->forge->createTable('meest_item_descriptions');
    }

    public function down()
    {
        $this->forge->dropTable('meest_item_descriptions');
    }
}
