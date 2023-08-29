<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMeestParcelsTable extends Migration
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
            'parcelNumber' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'parcelNumberInternal' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'parcelNumberParent' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'partnerKey' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bagId' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'carrierLastMile' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'createReturnParcel' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'returnCarrier' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'cod' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'codCurrency' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'deliveryCost' => [
                'type' => 'DECIMAL(10, 2)',
                'null' => true,
            ],
            'serviceType' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'totalValue' => [
                'type' => 'DECIMAL(10, 2)',
                'null' => true,
            ],
            'currency' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'fulfillment' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'incoterms' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'iossVatIDenc' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'senderID' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'weight' => [
                'type' => 'DECIMAL(10, 2)',
                'null' => true,
            ],
            'meest_recipients_id' => [ // Поле для связи с meest_parcels
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'meest_senders_id' => [ // Поле для связи с meest_parcels
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
        $this->forge->addForeignKey('meest_recipients_id', 'meest_senders_recipients', 'id');
        $this->forge->addForeignKey('meest_senders_id', 'meest_senders_recipients', 'id');

        $this->forge->createTable('meest_parcels');
    }

    public function down()
    {
        $this->forge->dropTable('meest_parcels');
    }
}
