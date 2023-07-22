<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BillInvoices extends Migration
{
    public function up()
    {
        // Create invoices table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kind' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'sell_date' => [
                'type' => 'DATE',
            ],
            'issue_date' => [
                'type' => 'DATE',
            ],
            'payment_to' => [
                'type' => 'DATE',
            ],
            'seller_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'seller_tax_no' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'buyer_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'buyer_tax_no' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ]
        ]);

        // Add primary key
        $this->forge->addKey('id', true);

        // Add foreign key
//        $this->forge->addForeignKey('invoice_id', 'positions', 'id', 'CASCADE', 'CASCADE');

        // Create table
        $this->forge->createTable('bill_invoices');
    }

    public function down()
    {
        // Drop table
        $this->forge->dropTable('bill_invoices');
    }
}

