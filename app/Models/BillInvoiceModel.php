<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model class for managing bill invoices data.
 */
class BillInvoiceModel extends MyBaseModel
{
    // Database configuration
    protected $DBGroup          = 'default';
    protected $table            = 'bill_invoices';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Allowed fields in the database
    protected $allowedFields    = ['id', 'user_id', 'number', 'place', 'sell_date', 'price_net', 'price_gross', 'currency', 'description', 'seller_name', 'seller_tax_no', 'seller_street', 'seller_post_code', 'seller_city', 'seller_country', 'seller_email', 'seller_phone', 'seller_www', 'seller_bank', 'seller_bank_account', 'buyer_name', 'buyer_post_code', 'buyer_city', 'buyer_street', 'buyer_first_name', 'buyer_country', 'created_at', 'updated_at', 'token', 'buyer_email', 'client_id', 'lang', 'product_cache', 'buyer_last_name', 'delivery_date'];

    // Hidden fields
    protected $hidden = [];

    // Dates configuration
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $searchableFields = [
        'id', 'user_id', 'number', 'place', 'sell_date', 'price_net', 'price_gross', 'currency', 'description', 'seller_name', 'seller_tax_no', 'seller_street', 'seller_post_code', 'seller_city', 'seller_country', 'seller_email', 'seller_phone', 'seller_www', 'seller_bank', 'seller_bank_account', 'buyer_name', 'buyer_post_code', 'buyer_city', 'buyer_street', 'buyer_first_name', 'buyer_country', 'created_at', 'updated_at', 'token', 'buyer_email', 'client_id', 'lang', 'product_cache', 'buyer_last_name', 'delivery_date'
    ];
    protected $sortableFields = [
        'id', 'user_id', 'number', 'place', 'sell_date', 'price_net', 'price_gross', 'currency', 'description', 'seller_name', 'seller_tax_no', 'seller_street', 'seller_post_code', 'seller_city', 'seller_country', 'seller_email', 'seller_phone', 'seller_www', 'seller_bank', 'seller_bank_account', 'buyer_name', 'buyer_post_code', 'buyer_city', 'buyer_street', 'buyer_first_name', 'buyer_country', 'created_at', 'updated_at', 'token', 'buyer_email', 'client_id', 'lang', 'product_cache', 'buyer_last_name', 'delivery_date'
    ];

    /**
     * Get a list of invoices from the database.
     *
     * @param int|bool $id The invoice's ID to retrieve, or false to retrieve all invoices.
     *
     * @return array|object The invoice data.
     */
    public function getInvoices($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }

    /**
     * Get an invoice with its positions and recipient information.
     *
     * @param int|null $invoice_id The invoice's ID.
     *
     * @return array|null The invoice data with positions and recipient information.
     */
    public function getInvoiceWithPositionsAndRecipient($invoice_id = null){
        if ($invoice_id){
            $invoice = $this->getInvoices($invoice_id);

            $invoice['recipient'] = null;
            if ($client_id = $invoice['client_id']){
                $recipientModel = new BillClientModel();
                $recipient = $recipientModel->getClients($client_id);
                $invoice['recipient'] = $recipient;
            }

            $positionModel = new BillPositionModel();
            $positions = $positionModel->getPositionsInvoice($invoice_id);
            $invoice['positions'] = $positions;

            return $invoice;
        }
    }
}
