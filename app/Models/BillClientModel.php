<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model class for managing bill clients data.
 */
class BillClientModel extends MyBaseModel
{
    // Database configuration
    protected $DBGroup          = 'default';
    protected $table            = 'bill_clients';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Allowed fields in the database
    protected $allowedFields = [
        'id', 'name', 'tax_no', 'post_code', 'city', 'street', 'first_name', 'country', 'email', 'phone', 'www', 'fax', 'created_at', 'updated_at', 'street_no', 'kind', 'bank', 'bank_account', 'bank_account_id', 'shortcut', 'note', 'last_name', 'referrer', 'token', 'fuid', 'fname', 'femail', 'department_id', 'import', 'discount', 'payment_to_kind', 'category_id', 'use_delivery_address', 'delivery_address', 'person', 'panel_user_id', 'use_mass_payment', 'mass_payment_code', 'external_id', 'company', 'title', 'mobile_phone', 'register_number', 'tax_no_check', 'attachments_count', 'default_payment_type', 'tax_no_kind', 'accounting_id', 'disable_auto_reminders', 'buyer_id', 'price_list_id', 'panel_url',
    ];

    // Dates configuration
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Поля, по которым можно искать и сортировать (указаны в дочерних моделях)
    protected $searchableFields = [
        "id",
        "name",
        "tax_no",
        "post_code",
        "city",
        "street",
        "country",
        "email",
        "phone",
        "www",
        "fax",
        "street_no",
        "kind",
        "bank",
        "bank_account",
        "bank_account_id",
        "note",
        "last_name",
        "referrer",
        "token",
        "fuid",
        "fname",
        "femail",
        "department_id",
        "discount",
        "payment_to_kind",
        "category_id",
        "use_delivery_address",
        "delivery_address",
        "person",
        "panel_user_id",
        "use_mass_payment",
        "mass_payment_code",
        "external_id",
        "company",
        "title",
        "mobile_phone",
        "register_number",
        "tax_no_check",
        "attachments_count",
        "default_payment_type",
        "tax_no_kind",
        "accounting_id",
        "disable_auto_reminders",
        "buyer_id",
        "price_list_id",
        "panel_url",
    ];
    protected $sortableFields = [
        'id', 'name', 'tax_no', 'post_code', 'city', 'street', 'first_name', 'country', 'email', 'phone', 'www', 'fax', 'created_at', 'updated_at', 'street_no', 'kind', 'bank', 'bank_account', 'bank_account_id', 'shortcut', 'note', 'last_name', 'referrer', 'token', 'fuid', 'fname', 'femail', 'department_id', 'import', 'discount', 'payment_to_kind', 'category_id', 'use_delivery_address', 'delivery_address', 'person', 'panel_user_id', 'use_mass_payment', 'mass_payment_code', 'external_id', 'company', 'title', 'mobile_phone', 'register_number', 'tax_no_check', 'attachments_count', 'default_payment_type', 'tax_no_kind', 'accounting_id', 'disable_auto_reminders', 'buyer_id', 'price_list_id', 'panel_url',
    ];

    /**
     * Get a list of clients from the database.
     *
     * @param int|bool $id The client's ID to retrieve, or false to retrieve all clients.
     *
     * @return array|object The client data.
     */
    public function getClients($id = false)
    {
        if ($id === false)
            return $this->asArray()->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }

}
