<?php
namespace App\Models;

use CodeIgniter\Model;

class MyBaseModel extends Model
{

    // Поля, по которым можно искать
    public array $searchableFields = [];

    // Поля, по которым можно сортировать
    public array $sortableFields = [];

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
        if (!empty($search) && is_array($search) && isset($search['value'])) {
            $searchValue = $search['value'];

            $builder->groupStart();
            foreach ($this->searchableFields as $field) {
                $builder->orLike($field, $searchValue);
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
