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
        $data=[
            'per_page' => 10
        ];
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
        $jsonData = $request->getJSON();
        $getData = json_decode(json_encode($jsonData), true);

        // Get the request parameters from DataTables AJAX
        $draw = $getData['draw'];
        $start = $getData['start'];
        $length = $getData['length'];
        $search = $getData['search']['value'];
        $orders = $getData['order'];

        $model = new BillClientModel();

//        $query = $model->select('*');
//        $queryTotalRecords = clone $query;
//        $totalRecords = $queryTotalRecords->countAllResults();
//        // Conditions
//        if ($search) {
//            $query->groupStart()
//                ->like('id', $search)
//                ->orLike('name', $search)
//                ->orLike('tax_no', $search)
//                ->orLike('post_code', $search)
//                ->orLike('city', $search)
//                ->orLike('street', $search)
//                ->orLike('country', $search)
//                ->orLike('email', $search)
//                ->orLike('phone', $search)
//                ->orLike('www', $search)
//                ->orLike('fax', $search)
//                ->orLike('street_no', $search)
//                ->orLike('kind', $search)
//                ->orLike('bank', $search)
//                ->orLike('bank_account', $search)
//                ->orLike('bank_account_id', $search)
//                ->orLike('note', $search)
//                ->orLike('last_name', $search)
//                ->orLike('referrer', $search)
//                ->orLike('token', $search)
//                ->orLike('fuid', $search)
//                ->orLike('fname', $search)
//                ->orLike('femail', $search)
//                ->orLike('department_id', $search)
//                ->orLike('discount', $search)
//                ->orLike('payment_to_kind', $search)
//                ->orLike('category_id', $search)
//                ->orLike('use_delivery_address', $search)
//                ->orLike('delivery_address', $search)
//                ->orLike('person', $search)
//                ->orLike('panel_user_id', $search)
//                ->orLike('use_mass_payment', $search)
//                ->orLike('mass_payment_code', $search)
//                ->orLike('external_id', $search)
//                ->orLike('company', $search)
//                ->orLike('title', $search)
//                ->orLike('mobile_phone', $search)
//                ->orLike('register_number', $search)
//                ->orLike('tax_no_check', $search)
//                ->orLike('attachments_count', $search)
//                ->orLike('default_payment_type', $search)
//                ->orLike('tax_no_kind', $search)
//                ->orLike('accounting_id', $search)
//                ->orLike('disable_auto_reminders', $search)
//                ->orLike('buyer_id', $search)
//                ->orLike('price_list_id', $search)
//                ->orLike('panel_url', $search)
//                ->groupEnd();
//        }
//
//        $queryFiltered = clone $query;
//        $filteredCount = $queryFiltered->countAllResults();
//
//        // Iterate through each order element
//        $columns = [
//            'id', 'name', 'tax_no', 'post_code', 'city', 'street', 'first_name', 'country', 'email', 'phone', 'www', 'fax', 'created_at', 'updated_at', 'street_no', 'kind', 'bank', 'bank_account', 'bank_account_id', 'shortcut', 'note', 'last_name', 'referrer', 'token', 'fuid', 'fname', 'femail', 'department_id', 'import', 'discount', 'payment_to_kind', 'category_id', 'use_delivery_address', 'delivery_address', 'person', 'panel_user_id', 'use_mass_payment', 'mass_payment_code', 'external_id', 'company', 'title', 'mobile_phone', 'register_number', 'tax_no_check', 'attachments_count', 'default_payment_type', 'tax_no_kind', 'accounting_id', 'disable_auto_reminders', 'buyer_id', 'price_list_id', 'panel_url',
//        ];
//
//        foreach ($orders as $order) {
//            $order_column_index = $order['column'];
//            $order_column = $columns[$order_column_index]; // Map to your database column
//            $order_dir = $order['dir'];
//
//            // Add ordering for each column
//            $query->orderBy($order_column, $order_dir);
//        }
//
//        // Limit and offset
//        $query->limit($length, $start);

        try {
            // Execute the query and store the result in $results
//            $results = $query->get()->getResultArray();
            $results = $model->getDatatableData($start, $length, $search, $orders);
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        if (isset($results)) {
            $responseData['draw'] = $draw;
            $responseData['recordsTotal'] = $results['totalRecords'];
            $responseData['recordsFiltered'] = $results['filteredRecords'];

            foreach ($results['data'] as $key => $value) {
                foreach($value as $k => $v){
                    $responseData['data'][$key][$k] = $v;
                }
            }
        } else {
            $responseData['draw'] = $draw;
            $responseData['recordsTotal'] = 0;
            $responseData['recordsFiltered'] = 0;
            $responseData['data'] = [];
        }
        echo json_encode($responseData); die();

    }

}
