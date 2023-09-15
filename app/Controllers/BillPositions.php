<?php

namespace App\Controllers;

use App\Models\BillPositionModel;
use App\Controllers\BaseController;

/**
 * Class BillPositions Controller
 *
 * @package App\Controllers\Api
 */
class BillPositions extends BaseController
{
    /**
     * Displays the index page.
     *
     * @return mixed
     */
    public function index()
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[
            'per_page' => 10
        ];
        $data=[];
        return view('bill_positions/index', $data);
    }

    /**
     * Fetches positions (products) data from the database and returns it in JSON format.
     *
     * @return void
     */
    public function get_positions_ajax(){

        $request = service('request');
        $getData = $request->getGet();
        $invoice_id = $getData['invoice_id'] ?? null;

        $searchKey = !empty($getData['search']['value']) ? $getData['search']['value'] : '';
        $limit = !empty($getData['length']) ? $getData['length'] : 10;

//        $paginationLimit = ($getData['start'] == 0)
//            ? 1 : ($getData['start'] / $limit) + 1;

        $queryStr = [
            'search' => $searchKey,
            'limit' => $limit,
//            'page' => $paginationLimit
        ];

        $model = new BillPositionModel();

        if ($invoice_id){
            $results = $model->getPositionsInvoice($invoice_id);

            if (isset($results) && ($count = count($results)) > 0) {
//            $responseData['draw'] = $getData['draw'];
                $responseData['recordsTotal'] = $count;
//            $responseData['recordsFiltered'] = $response['data']['total_count'];

                foreach ($results as $key => $value) {

                    $responseData['data'][$key]['id'] = $value['id'];
                    $responseData['data'][$key]['invoice_id'] = $value['invoice_id'];
                    $responseData['data'][$key]['name'] = $value['name'];
                    $responseData['data'][$key]['tax'] = $value['tax'];
                    $responseData['data'][$key]['total_price_gross'] = $value['total_price_gross'];
                    $responseData['data'][$key]['quantity'] = $value['quantity'];
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
