<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBillProductsTable extends Migration
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
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'price_net' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'tax' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'automatic_sales' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'limited' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'warehouse_quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'available_from' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'available_to' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'payment_callback' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'payment_url_ok' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'payment_url_error' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'quantity' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'quantity_unit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'additional_info' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'disabled' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'price_gross' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'price_tax' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'form_fields_horizontal' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'form_fields' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'form_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'form_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'quantity_sold_outside' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'form_kind' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'form_template' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'elastic_price' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'next_product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'quantity_sold_in_invoices' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'deleted' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'currency' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ecommerce' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'period' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'show_elastic_price' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'elastic_price_details' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'elastic_price_date_trigger' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'iid' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
                'null' => true,
            ],
            'purchase_price_net' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'purchase_price_gross' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'use_formula' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'formula' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'formula_test_field' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'stock_level' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'sync' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'kind' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'package' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'package_product_ids' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'department_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'use_product_warehouses' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'purchase_price_tax' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'purchase_tax' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'service' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'use_quantity_discount' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'quantity_discount_details' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'price_net_on_payment' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'warehouse_numbers_updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'ean_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'weight' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'weight_unit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'size_height' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'size_width' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'size' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'size_unit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'auto_payment_department_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'attachments_count' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
            'image_url' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tax2' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'purchase_tax2' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'supplier_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'package_products_details' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'siteor_disabled' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'use_moss' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'subscription_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'accounting_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'restricted_to_warehouses' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'gtu_codes_id' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tag_list_id' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'electronic_service' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'is_delivery' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('bill_products');
    }

    public function down()
    {
        $this->forge->dropTable('bill_products');
    }
}
