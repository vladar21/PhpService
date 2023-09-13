<?php

namespace App\Models;

use CodeIgniter\Model;

class MeestItemModel extends Model
{
    protected $table = 'meest_items';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'barcode',
        'brand',
        'description',
        'hsCode',
        'manufacturer',
        'originCountry',
        'productCategory',
        'productEAN',
        'productURL',
        'quantity',
        'skuCode',
        'value',
        'weight',
        'meest_parcels_id',
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;

    public function getMeestItems($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }

    public function getParcelItems($parcelNumber = false)
    {
        if ($parcelNumber !== false)
            return $this->asArray()->where(['parcelNumber' => $parcelNumber])->findAll();
    }

    public function getDatatableData($start, $length, $search, $orders, $id = null)
    {

        $builder = $this->db->table('meest_items');

        // Получите общее количество записей (без фильтрации)
        $builderTotal = clone $builder;
        $totalRecords = $builderTotal->countAll();
        if ($id){
            $builder->where('meest_parcels_id', $id);
        }
        if ($search) {
            $builder->groupStart()
                ->like('id', $search)
                ->orLike('barcode', $search)
                ->orLike('brand', $search)
                ->orLike('description', $search)
                ->orLike('hsCode', $search)
                ->orLike('manufacturer', $search)
                ->orLike('originCountry', $search)
                ->orLike('productCategory', $search)
                ->orLike('productEAN', $search)
                ->orLike('productURL', $search)
                ->orLike('quantity', $search)
                ->orLike('skuCode', $search)
                ->orLike('value', $search)
                ->orLike('weight', $search)
                ->groupEnd();
        }

        $builderFiltered = clone $builder;
        $filteredRecords = $builderFiltered->countAllResults();

        // Iterate through each order element
        $columns = [
            'id',
            'barcode',
            'brand',
            'description',
            'hsCode',
            'manufacturer',
            'originCountry',
            'productCategory',
            'productEAN',
            'productURL',
            'quantity',
            'skuCode',
            'value',
            'weight',
            'meest_parcels_id',
            'created_at',
            'updated_at'
        ];

        foreach ($orders as $order) {
            $order_column_index = $order['column'];
            $order_column = $columns[$order_column_index]; // Map to your database column
            $order_dir = $order['dir'];

            // Add ordering for each column
            $builder->orderBy($order_column, $order_dir);
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
