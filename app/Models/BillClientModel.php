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
            return $this->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }

    /**
     * Get data for DataTables, including filtering and sorting.
     *
     * @param int    $start   The start index for pagination.
     * @param int    $length  The number of records per page.
     * @param string $search  The search term.
     * @param array  $orders  An array of column orders for sorting.
     *
     * @return array The DataTables data.
     */
    public function getDatatableData($start, $length, $search, $orders)
    {

        $builder = $this->db->table('bill_clients');

        // Получите общее количество записей (без фильтрации)
        $builderTotal = clone $builder;
        $totalRecords = $builderTotal->countAll();

        if ($search) {
            $builder->groupStart()
                ->like('id', $search)
                ->orLike('name', $search)
                ->orLike('tax_no', $search)
                ->orLike('post_code', $search)
                ->orLike('city', $search)
                ->orLike('street', $search)
                ->orLike('country', $search)
                ->orLike('email', $search)
                ->orLike('phone', $search)
                ->orLike('www', $search)
                ->orLike('fax', $search)
                ->orLike('street_no', $search)
                ->orLike('kind', $search)
                ->orLike('bank', $search)
                ->orLike('bank_account', $search)
                ->orLike('bank_account_id', $search)
                ->orLike('note', $search)
                ->orLike('last_name', $search)
                ->orLike('referrer', $search)
                ->orLike('token', $search)
                ->orLike('fuid', $search)
                ->orLike('fname', $search)
                ->orLike('femail', $search)
                ->orLike('department_id', $search)
                ->orLike('discount', $search)
                ->orLike('payment_to_kind', $search)
                ->orLike('category_id', $search)
                ->orLike('use_delivery_address', $search)
                ->orLike('delivery_address', $search)
                ->orLike('person', $search)
                ->orLike('panel_user_id', $search)
                ->orLike('use_mass_payment', $search)
                ->orLike('mass_payment_code', $search)
                ->orLike('external_id', $search)
                ->orLike('company', $search)
                ->orLike('title', $search)
                ->orLike('mobile_phone', $search)
                ->orLike('register_number', $search)
                ->orLike('tax_no_check', $search)
                ->orLike('attachments_count', $search)
                ->orLike('default_payment_type', $search)
                ->orLike('tax_no_kind', $search)
                ->orLike('accounting_id', $search)
                ->orLike('disable_auto_reminders', $search)
                ->orLike('buyer_id', $search)
                ->orLike('price_list_id', $search)
                ->orLike('panel_url', $search)
                ->groupEnd();
        }

        $builderFiltered = clone $builder;
        $filteredRecords = $builderFiltered->countAllResults();

        // Iterate through each order element
        $columns = [
            'id', 'name', 'tax_no', 'post_code', 'city', 'street', 'first_name', 'country', 'email', 'phone', 'www', 'fax', 'created_at', 'updated_at', 'street_no', 'kind', 'bank', 'bank_account', 'bank_account_id', 'shortcut', 'note', 'last_name', 'referrer', 'token', 'fuid', 'fname', 'femail', 'department_id', 'import', 'discount', 'payment_to_kind', 'category_id', 'use_delivery_address', 'delivery_address', 'person', 'panel_user_id', 'use_mass_payment', 'mass_payment_code', 'external_id', 'company', 'title', 'mobile_phone', 'register_number', 'tax_no_check', 'attachments_count', 'default_payment_type', 'tax_no_kind', 'accounting_id', 'disable_auto_reminders', 'buyer_id', 'price_list_id', 'panel_url',
        ];

        foreach ($orders as $order) {
            $order_column_index = $order['column'];
            $order_column = $columns[$order_column_index]; // Map to your database column
            $order_dir = $order['dir'];

            // Проверьте направление сортировки (ASC или DESC)
            if (strtolower($order_dir) === 'asc') {
                $builder->orderBy($order_column, 'asc');
            } else {
                $builder->orderBy($order_column, 'desc');
            }
        }

        // Выполните фильтрацию и пагинацию
        $builder->limit($length, $start);

        // Execute the query and store the result in $results
        $results = $builder->get()->getResultArray();

        return [
            'data' => $results,
            'totalRecords' => $totalRecords,
            'filteredRecords' => $filteredRecords,
        ];
    }

}
