<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBillClientsTable extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tax_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'post_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'street' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'country' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'www' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'fax' => [
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
            'street_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'kind' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bank' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bank_account' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'bank_account_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'shortcut' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'note' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'referrer' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'fuid' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'fname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'femail' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'department_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'import' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'discount' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'payment_to_kind' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'use_delivery_address' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'delivery_address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'person' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'panel_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'use_mass_payment' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'mass_payment_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'external_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'company' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'mobile_phone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'register_number' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tax_no_check' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'attachments_count' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
                'null' => true,
            ],
            'default_payment_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'tax_no_kind' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'accounting_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'disable_auto_reminders' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => true,
            ],
            'buyer_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'price_list_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'panel_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('bill_clients');
    }

    public function down()
    {
        $this->forge->dropTable('bill_clients');
    }
}
