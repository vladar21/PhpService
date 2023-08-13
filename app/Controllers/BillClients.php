<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BillClientModel;

class BillClients extends BaseController
{
    public function index()
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[];
        return view('bill_clients/index', $data);
    }

    public function client($id = NULL)
    {
        $model = new BillClientModel();

        $client = $model->getClients($id);

        if ($client)
        {
            $data = $client;
        }
        else
        {
            $data['code'] = '404';
            $data['message'] = 'Page Not Found';
            return view('errors/message', $data);
        }

        return view('bill_clients/view', $data);
    }

    public function get_clients_ajax(){

        $request = service('request');
        $getData = $request->getGet();

        $searchKey = !empty($getData['search']['value']) ? $getData['search']['value'] : '';
        $limit = !empty($getData['length']) ? $getData['length'] : 10;

//        $paginationLimit = ($getData['start'] == 0)
//            ? 1 : ($getData['start'] / $limit) + 1;

        $queryStr = [
            'search' => $searchKey,
            'limit' => $limit,
//            'page' => $paginationLimit
        ];

        $model = new BillClientModel();

        $results = $model->getClients();

        if (isset($results) && ($count = count($results)) > 0) {
//            $responseData['draw'] = $getData['draw'];
            $responseData['recordsTotal'] = $count;
//            $responseData['recordsFiltered'] = $response['data']['total_count'];

            foreach ($results as $key => $value) {
                foreach($value as $k => $v){
                    $responseData['data'][$key][$k] = $v[$k];
                }
//                $responseData['data'][$key]['id'] = $value['id'];
//                $responseData['data'][$key]['name'] = $value['name'];
//                $responseData['data'][$key]['description'] = $value['description'];
//                $responseData['data'][$key]['price_net'] = $value['price_net'];
//                $responseData['data'][$key]['quantity'] = $value['quantity'];
//                $responseData['data'][$key]['quantity_unit'] = $value['quantity_unit'];
//                $responseData['data'][$key]['additional_info'] = $value['additional_info'];
//                $responseData['data'][$key]['price_gross'] = $value['price_gross'];
//                $responseData['data'][$key]['form_name'] = $value['form_name'];
//                $responseData['data'][$key]['code'] = $value['code'];
//                $responseData['data'][$key]['currency'] = $value['currency'];
//                $responseData['data'][$key]['weight_unit'] = $value['weight_unit'];
//                $responseData['data'][$key]['supplier_code'] = $value['supplier_code'];
//                $responseData['data'][$key]['created_at'] = $value['created_at'];
//                $responseData['data'][$key]['updated_at'] = $value['updated_at'];
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
