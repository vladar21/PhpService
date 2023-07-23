<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BillInvoices extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT * FROM bill_invoices');
        $data['bill_invoices'] = $query->getResultArray();
        return view('bill_invoices/index', $data);
    }

    public function get_invoices_ajax(){

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

        $db = \Config\Database::connect();
        $query   = $db->query('SELECT * FROM bill_invoices');
        $results = $query->getResultArray();

        if (!empty($results)) {
//            $responseData['draw'] = $getData['draw'];
            $responseData['recordsTotal'] = count($results);
//            $responseData['recordsFiltered'] = $response['data']['total_count'];

            foreach ($results as $key => $value) {

                $responseData['data'][$key]['id'] = $value['id'];
                $responseData['data'][$key]['kind'] = $value['kind'];
                $responseData['data'][$key]['number'] = $value['number'];
                $responseData['data'][$key]['sell_date'] = $value['sell_date'];
                $responseData['data'][$key]['issue_date'] = $value['issue_date'];
                $responseData['data'][$key]['payment_to'] = $value['payment_to'];
                $responseData['data'][$key]['seller_name'] = $value['seller_name'];
                $responseData['data'][$key]['seller_tax_no'] = $value['seller_tax_no'];
                $responseData['data'][$key]['buyer_name'] = $value['buyer_name'];
                $responseData['data'][$key]['buyer_tax_no'] = $value['buyer_tax_no'];

            }
        } else {
            $responseData['draw'] = $getData['draw'];
            $responseData['recordsTotal'] = 0;
            $responseData['recordsFiltered'] = 0;
            $responseData['data'] = [];
        }
        echo json_encode($responseData); die();
    }
}
