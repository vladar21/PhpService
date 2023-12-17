<?php

namespace App\Models;

/**
 * Model class for managing meest item of parcels data.
 */
class MeestItemModel extends MyBaseModel
{
    // Database configuration
    protected $DBGroup = 'default';
    protected $table = 'meest_items';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    // Allowed fields in the database
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
        'created_at',
        'updated_at'
    ];

    // Dates configuration
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $searchableFields = [
        'id', 'barcode', 'brand', 'description', 'hsCode', 'manufacturer', 'originCountry', 'productCategory', 'productEAN', 'productURL', 'quantity', 'skuCode', 'value', 'weight', 'meest_parcels_id', 'created_at', 'updated_at'
    ];
    protected $sortableFields = [
        'id', 'barcode', 'brand', 'description', 'hsCode', 'manufacturer', 'originCountry', 'productCategory', 'productEAN', 'productURL', 'quantity', 'skuCode', 'value', 'weight', 'meest_parcels_id', 'created_at', 'updated_at'
    ];

    /**
     * Get Meest items based on the provided ID.
     *
     * @param int|false $id The ID of the item to retrieve, or false to retrieve all items.
     *
     * @return array|null An array of Meest items or null if not found.
     */
    public function getMeestItems($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }

    /**
     * Get Meest items belonging to a specific parcel based on the provided parcel number.
     *
     * @param string|false $parcelNumber The parcel number to retrieve items for, or false to retrieve all items.
     *
     * @return array|null An array of Meest items or null if not found.
     */
    public function getParcelItems($parcelNumber = false)
    {
        if ($parcelNumber !== false)
            return $this->asArray()->where(['parcelNumber' => $parcelNumber])->findAll();
    }

    /**
     * Get Meest items belonging to a specific Meest parcel based on the provided Meest parcel ID.
     *
     * @param int|false $meest_parcels_id The Meest parcel ID to retrieve items for, or false to retrieve all items.
     *
     * @return array|null An array of Meest items or null if not found.
     */
    public function getParcelItemsByMeesParcelId($meest_parcels_id)
    {
        if ($meest_parcels_id !== false)
            return $this->asArray()->where(['meest_parcels_id' => $meest_parcels_id])->findAll();
    }

    /**
     * Get DataTables-compatible data for Meest items with optional filtering by Meest parcel ID.
     *
     * @param int      $start    The starting record for pagination.
     * @param int      $length   The number of records to retrieve for pagination.
     * @param string   $search   The search term for filtering records.
     * @param array    $orders   The sorting order for columns.
     * @param int|null $id       The Meest parcel ID to filter items by, or null for no filtering.
     *
     * @return array An array containing DataTables-compatible data.
     */
//    public function getDatatableData($start, $length, $search, $orders, $id = null)
//    {
//
//        $builder = $this->db->table('meest_items');
//
//        // Получите общее количество записей (без фильтрации)
//        $builderTotal = clone $builder;
//        $totalRecords = $builderTotal->countAll();
//        if ($id){
//            $builder->where('meest_parcels_id', $id);
//        }
//        if ($search) {
//            $builder->groupStart()
//                ->like('id', $search)
//                ->orLike('barcode', $search)
//                ->orLike('brand', $search)
//                ->orLike('description', $search)
//                ->orLike('hsCode', $search)
//                ->orLike('manufacturer', $search)
//                ->orLike('originCountry', $search)
//                ->orLike('productCategory', $search)
//                ->orLike('productEAN', $search)
//                ->orLike('productURL', $search)
//                ->orLike('quantity', $search)
//                ->orLike('skuCode', $search)
//                ->orLike('value', $search)
//                ->orLike('weight', $search)
//                ->groupEnd();
//        }
//
//        $builderFiltered = clone $builder;
//        $filteredRecords = $builderFiltered->countAllResults();
//
//        // Iterate through each order element
//        $columns = [
//            'id',
//            'barcode',
//            'brand',
//            'description',
//            'hsCode',
//            'manufacturer',
//            'originCountry',
//            'productCategory',
//            'productEAN',
//            'productURL',
//            'quantity',
//            'skuCode',
//            'value',
//            'weight',
//            'meest_parcels_id',
//            'created_at',
//            'updated_at'
//        ];
//
//        foreach ($orders as $order) {
//            $order_column_index = $order['column'];
//            $order_column = $columns[$order_column_index]; // Map to your database column
//            $order_dir = $order['dir'];
//
//            // Add ordering for each column
//            $builder->orderBy($order_column, $order_dir);
//        }
//
//        // Выполните фильтрацию и пагинацию
//        $builder->limit($length, $start);
//
//        // Execute the query and store the result in $results
//        $results = $builder->get()->getResultArray();
//
//        return [
//            'data' => $results,
//            'totalRecords' => $totalRecords,
//            'filteredRecords' => $filteredRecords,
//        ];
//    }


}
