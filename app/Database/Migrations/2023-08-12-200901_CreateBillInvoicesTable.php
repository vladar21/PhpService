<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBillInvoicesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'place' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'sell_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'price_net' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'price_gross' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'currency' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'seller_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_tax_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_street' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_post_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_city' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_country' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_phone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_www' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_bank' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seller_bank_account' => [
                'type' => 'VARCHAR',
                'null' => true,
                'constraint' => 255,
            ],
            'buyer_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'buyer_post_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'buyer_city' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'buyer_street' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'buyer_first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'buyer_country' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'buyer_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'client_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'lang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'product_cache' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'buyer_last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'delivery_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('bill_invoices');
    }

    public function down()
    {
        $this->forge->dropTable('bill_invoices');
    }
}
