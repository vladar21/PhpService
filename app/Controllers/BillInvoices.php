<?php

namespace App\Controllers;

use App\Models\BillInvoiceModel;
use App\Models\BillInvoicesModel;
use App\Controllers\BaseController;

class BillInvoices extends BaseController
{
    public function index()
    {
        helper('language');
        $lang = lang('app_lang');
//        $db = \Config\Database::connect();
//        $query   = $db->query('SELECT * FROM bill_invoices');
//        $data['bill_invoices'] = $query->getResultArray();
        $data=[];
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

        $model = new BillInvoiceModel();

        $results = $model->getInvoices();

        if (isset($results) && ($count = count($results)) > 0) {
//            $responseData['draw'] = $getData['draw'];
            $responseData['recordsTotal'] = $count;
//            $responseData['recordsFiltered'] = $response['data']['total_count'];

            foreach ($results as $key => $value) {

                $responseData['data'][$key]['id'] = $value['id'];
                $responseData['data'][$key]['user_id'] = $value['user_id'];
                $responseData['data'][$key]['number'] = $value['number'];
                $responseData['data'][$key]['place'] = $value['place'];
                $responseData['data'][$key]['sell_date'] = $value['sell_date'];
                $responseData['data'][$key]['price_net'] = $value['price_net'];
                $responseData['data'][$key]['price_gross'] = $value['price_gross'];
                $responseData['data'][$key]['currency'] = $value['currency'];
                $responseData['data'][$key]['description'] = $value['description'];
                $responseData['data'][$key]['seller_name'] = $value['seller_name'];
                $responseData['data'][$key]['seller_tax_no'] = $value['seller_tax_no'];
                $responseData['data'][$key]['seller_street'] = $value['seller_street'];
                $responseData['data'][$key]['seller_post_code'] = $value['seller_post_code'];
                $responseData['data'][$key]['seller_city'] = $value['seller_city'];
                $responseData['data'][$key]['seller_country'] = $value['seller_country'];
                $responseData['data'][$key]['seller_email'] = $value['seller_email'];
                $responseData['data'][$key]['seller_phone'] = $value['seller_phone'];
                $responseData['data'][$key]['seller_www'] = $value['seller_www'];
                $responseData['data'][$key]['seller_bank'] = $value['seller_bank'];
                $responseData['data'][$key]['seller_bank_account'] = $value['seller_bank_account'];
                $responseData['data'][$key]['buyer_name'] = $value['buyer_name'];
                $responseData['data'][$key]['buyer_post_code'] = $value['buyer_post_code'];
                $responseData['data'][$key]['buyer_city'] = $value['buyer_city'];
                $responseData['data'][$key]['buyer_street'] = $value['buyer_street'];
                $responseData['data'][$key]['buyer_first_name'] = $value['buyer_first_name'];
                $responseData['data'][$key]['buyer_country'] = $value['buyer_country'];
                $responseData['data'][$key]['created_at'] = $value['created_at'];
                $responseData['data'][$key]['updated_at'] = $value['updated_at'];
                $responseData['data'][$key]['token'] = $value['token'];
                $responseData['data'][$key]['buyer_email'] = $value['buyer_email'];
                $responseData['data'][$key]['client_id'] = $value['client_id'];
                $responseData['data'][$key]['lang'] = $value['lang'];
                $responseData['data'][$key]['product_cache'] = $value['product_cache'];
                $responseData['data'][$key]['buyer_last_name'] = $value['buyer_last_name'];
                $responseData['data'][$key]['delivery_date'] = $value['delivery_date'];
            }
        } else {
            $responseData['draw'] = $getData['draw'];
            $responseData['recordsTotal'] = 0;
            $responseData['recordsFiltered'] = 0;
            $responseData['data'] = [];
        }
        echo json_encode($responseData); die();
    }

    public function invoice($id = NULL)
    {
        $model = new BillInvoiceModel();

        $invoice = $model->getInvoices($id);

        if ($invoice)
        {
            $data = $invoice;
        }
        else
        {
            $data['code'] = '404';
            $data['message'] = 'Page Not Found';
            return view('errors/message', $data);
        }

        return view('bill_invoices/view', $data);
    }
}
