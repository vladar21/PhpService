<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MeestItemDescriptionModel;
use App\Models\MeestItemModel;

class MeestItems extends BaseController
{
    public function index()
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[
            'per_page' => 10
        ];
        return view('meest_items/index', $data);
    }

    public function get_parcel_items_ajax()
    {
        $request = service('request');
        $jsonData = $request->getJSON();
        $getData = json_decode(json_encode($jsonData), true);

        // Get the request parameters from DataTables AJAX
        $draw = $getData['draw'];
        $start = $getData['start'];
        $length = $getData['length'];
        $search = $getData['search']['value'];
        $orders = $getData['order'];

        // Create an instance of your model
        $model = new MeestItemModel();

        $query = $model->select('*');
        $totalRecords = $query->countAllResults();
        // Conditions
        if (isset($getData['parcel_id'])){
            $parcel_id = $getData['parcel_id'];
            if ($parcel_id){
                $query->where('meest_parcels_id', $parcel_id);
            }
        }

        if ($search) {
            $query->where('id', $search)
                ->orWhere('barcode', 'LIKE', "%$search%")
                ->orWhere('brand', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->orWhere('hsCode', 'LIKE', "%$search%")
                ->orWhere('manufacturer', 'LIKE', "%$search%")
                ->orWhere('originCountry', 'LIKE', "%$search%")
                ->orWhere('productCategory', 'LIKE', "%$search%")
                ->orWhere('productEAN', 'LIKE', "%$search%")
                ->orWhere('productURL', 'LIKE', "%$search%")
                ->orWhere('quantity', 'LIKE', "%$search%")
                ->orWhere('skuCode', 'LIKE', "%$search%")
                ->orWhere('value', $search)
                ->orWhere('weight', $search);
        }

        // total records
        $filteredCount = $query->countAllResults();

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
            $query->orderBy($order_column, $order_dir);
        }

        // Limit and offset
        $query->limit($length, $start);

        try {
            // Execute the query and store the result in $results
            $results = $query->get()->getResultArray();
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        if (isset($results)) {
            $responseData['draw'] = $draw;
            $responseData['recordsTotal'] = $totalRecords;
            $responseData['recordsFiltered'] = $filteredCount;
            $p2p = $start;
            foreach ($results as $key => $value) {
                $responseData['data'][$key]['p2p'] = ++$p2p;
                $responseData['data'][$key]['product_id'] = $value['id'];
                $responseData['data'][$key]['barcode'] = $value['barcode'];
                $responseData['data'][$key]['brand'] = $value['brand'];
                $responseData['data'][$key]['description'] = $value['description'];
                $responseData['data'][$key]['hsCode'] = $value['hsCode'];
                $responseData['data'][$key]['manufacturer'] = $value['manufacturer'];
                $responseData['data'][$key]['originCountry'] = $value['originCountry'];
                $responseData['data'][$key]['productCategory'] = $value['productCategory'];
                $responseData['data'][$key]['productEAN'] = $value['productEAN'];
                $responseData['data'][$key]['productURL'] = $value['productURL'];
                $responseData['data'][$key]['quantity'] = $value['quantity'];
                $responseData['data'][$key]['skuCode'] = $value['skuCode'];
                $responseData['data'][$key]['value'] = $value['value'];
                $responseData['data'][$key]['weight'] = $value['weight'];
                $responseData['data'][$key]['meest_parcels_id'] = $value['meest_parcels_id'];
                $responseData['data'][$key]['created_at'] = $value['created_at'];
                $responseData['data'][$key]['updated_at'] = $value['updated_at'];
            }
        } else {
            $responseData['draw'] = $draw;
            $responseData['recordsTotal'] = 0;
            $responseData['recordsFiltered'] = 0;
            $responseData['data'] = [];
        }
        echo json_encode($responseData); die();
    }

    public function item($id = NULL)
    {
        $model = new MeestItemModel();

        $items = $model->getMeestItems($id);

        if ($items)
        {
            $data = $items;
        }
        else
        {
            $data['code'] = '404';
            $data['message'] = 'Page Not Found';
            return view('errors/message', $data);
        }

        return view('meest_items/view', $data);
    }

    public function get_meest_item_desc_ajax(){

        $request = service('request');
        $getData = $request->getGet();
        $item_id = $getData['item_id'] ?? null;

        $searchKey = !empty($getData['search']['value']) ? $getData['search']['value'] : '';
        $limit = !empty($getData['length']) ? $getData['length'] : 10;

//        $paginationLimit = ($getData['start'] == 0)
//            ? 1 : ($getData['start'] / $limit) + 1;

        $queryStr = [
            'search' => $searchKey,
            'limit' => $limit,
//            'page' => $paginationLimit
        ];

        $model = new MeestItemDescriptionModel();

        if ($item_id){
            $results = $model->getItemDescription($item_id);

            if (isset($results) && ($count = count($results)) > 0) {
//            $responseData['draw'] = $getData['draw'];
                $responseData['recordsTotal'] = $count;
//            $responseData['recordsFiltered'] = $response['data']['total_count'];

                foreach ($results as $key => $value) {

                    $responseData['data'][$key]['id'] = $value['id'];
                    $responseData['data'][$key]['description'] = $value['description'];
                    $responseData['data'][$key]['lang'] = $value['lang'];
                    $responseData['data'][$key]['created_at'] = $value['created_at'];
                    $responseData['data'][$key]['updated_at'] = $value['updated_at'];
                }
            } else {
//            $responseData['draw'] = $getData['draw'];
                $responseData['recordsTotal'] = 0;
                $responseData['recordsFiltered'] = 0;
                $responseData['data'] = [];
            }
            echo json_encode($responseData); die();
        }

    }


}

