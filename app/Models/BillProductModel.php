<?php

namespace App\Models;

/**
 * Model class for managing bill products data.
 */
class BillProductModel extends MyBaseModel
{
    // Database configuration
    protected $DBGroup          = 'default';
    protected $table            = 'bill_products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Allowed fields in the database
    protected $allowedFields    = [
        'id', 'name', 'description', 'price_net', 'tax', 'created_at', 'updated_at', 'automatic_sales', 'limited', 'warehouse_quantity', 'available_from', 'available_to', 'payment_callback', 'payment_url_ok', 'payment_url_error', 'token', 'quantity', 'quantity_unit', 'additional_info', 'disabled', 'price_gross', 'price_tax', 'form_fields_horizontal', 'form_fields', 'form_name', 'form_description', 'quantity_sold_outside', 'form_kind', 'form_template', 'elastic_price', 'next_product_id', 'quantity_sold_in_invoices', 'deleted', 'code', 'currency', 'ecommerce', 'period', 'show_elastic_price', 'elastic_price_details', 'elastic_price_date_trigger', 'iid', 'purchase_price_net', 'purchase_price_gross', 'use_formula', 'formula', 'formula_test_field', 'stock_level', 'sync', 'category_id', 'kind', 'package', 'package_product_ids', 'department_id', 'use_product_warehouses', 'purchase_price_tax', 'purchase_tax', 'service', 'use_quantity_discount', 'quantity_discount_details', 'price_net_on_payment', 'warehouse_numbers_updated_at', 'ean_code', 'weight', 'weight_unit', 'size_height', 'size_width', 'size', 'size_unit', 'auto_payment_department_id', 'attachments_count', 'image_url', 'tax2', 'purchase_tax2', 'supplier_code', 'package_products_details', 'siteor_disabled', 'use_moss', 'subscription_id', 'accounting_id', 'status', 'restricted_to_warehouses', 'electronic_service', 'is_delivery'
    ];

    // Hidden fields in the database
    protected $hidden = ['tag_list', 'gtu_codes', ];

    // Dates configuration
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $searchableFields = [
        "id", "name", "description", "price_net", "created_at", "updated_at", "quantity", "quantity_unit", "additional_info", "price_gross", "form_name", "code", "currency", "weight_unit", "supplier_code"
    ];
    protected $sortableFields = [
        "id", "name", "description", "price_net", "created_at", "updated_at", "quantity", "quantity_unit", "additional_info", "price_gross", "form_name", "code", "currency", "weight_unit", "supplier_code", "created_at", "updated_at"
    ];

    /**
     * Get a list of products from the database.
     *
     * @param int|false $id The product's ID to retrieve, or false to retrieve all products.
     *
     * @return array|object The product data.
     */
    public function getProducts($id = false)
    {
        if ($id === false)
            return $this->asArray()->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }
}
