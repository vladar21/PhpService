<?php

namespace App\Models;

use CodeIgniter\Model;

class BillInvoiceModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bill_invoices';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'user_id', 'number', 'place', 'sell_date', 'price_net', 'price_gross', 'currency', 'description', 'seller_name', 'seller_tax_no', 'seller_street', 'seller_post_code', 'seller_city', 'seller_country', 'seller_email', 'seller_phone', 'seller_www', 'seller_bank', 'seller_bank_account', 'buyer_name', 'buyer_post_code', 'buyer_city', 'buyer_street', 'buyer_first_name', 'buyer_country', 'created_at', 'updated_at', 'token', 'buyer_email', 'client_id', 'lang', 'product_cache', 'buyer_last_name', 'delivery_date'];

    protected $hidden = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getInvoices($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }

    public function getInvoiceWithPositions($invoice_id = null){
        if ($invoice_id){
            $invoice = $this->getInvoices($invoice_id);

            $positionModel = new BillPositionModel();
            $positions = $positionModel->getPositionsInvoice($invoice_id);
            $invoice['positions'] = $positions;

            return $invoice;
        }
    }
}
