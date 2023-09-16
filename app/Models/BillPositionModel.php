<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model class for managing bill positions data.
 */
class BillPositionModel extends Model
{
    // Database configuration
    protected $DBGroup          = 'default';
    protected $table            = 'bill_positions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Allowed fields in the database
    protected $allowedFields = ['id', 'invoice_id', 'name', 'description', 'price_net', 'quantity', 'total_price_gross', 'total_price_net', 'account_id', 'created_at', 'updated_at', 'additional_info', 'quantity_unit', 'tax', 'price_gross', 'price_tax', 'total_price_tax', 'kind', 'invoice_position_id', 'product_id', 'deleted', 'discount', 'discount_percent', 'tax2', 'exchange_rate', 'accounting_tax_kind', 'code', 'discount_net', 'lump_sum_tax', 'corrected_pos_kind', 'gtu_code'];

    // Dates configuration
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules and messages (if any)
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks configuration
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Get positions for a specific invoice.
     *
     * @param int|false $invoice_id The invoice's ID to retrieve positions for, or false to retrieve all positions.
     *
     * @return array|null The positions data.
     */
    public function getPositionsInvoice($invoice_id = false)
    {
        if ($invoice_id)
            return $this->asArray()->where(['invoice_id' => $invoice_id])->findAll();
    }

    /**
     * Get a list of positions from the database.
     *
     * @param int|false $id The position's ID to retrieve, or false to retrieve all positions.
     *
     * @return array|object The position data.
     */
    public function getPositions($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }
}
