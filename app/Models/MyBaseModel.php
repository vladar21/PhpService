<?php

namespace App\Models;

use CodeIgniter\Model;

class MyBaseModel extends Model
{
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

    // Общие настройки и методы для всех моделей

    /**
     * Обобщенный метод для получения данных для DataTables.
     *
     * @param array  $params  Массив параметров из запроса DataTables.
     * @return array Отформатированные данные для DataTables.
     */
    public function getDataForDataTable(array $params)
    {
        $builder = $this->db->table($this->table);

        // Получение общего количества записей
        $totalRecords = $builder->countAllResults(false);

        // Фильтрация и поиск
        $this->applyFiltering($builder, $params['search']);

        $filteredRecords = $builder->countAllResults(false);

        // Сортировка
        $this->applySorting($builder, $params['order']);

        // Пагинация
        $builder->limit($params['length'], $params['start']);

        // Получение результатов
        $data = $builder->get()->getResultArray();

        return [
            'recordsFiltered' => $filteredRecords,
            'recordsTotal' => $totalRecords,
            'data' => $data
        ];
    }

    protected function applyFiltering(&$builder, $search)
    {
        if (!empty($search)) {
            $builder->groupStart();
            foreach ($this->searchableFields as $field) {
                $builder->orLike($field, $search);
            }
            $builder->groupEnd();
        }
    }

    protected function applySorting(&$builder, $orders)
    {
        foreach ($orders as $order) {
            $column = $this->sortableFields[$order['column']];
            $dir = $order['dir'];
            $builder->orderBy($column, $dir);
        }
    }
}
