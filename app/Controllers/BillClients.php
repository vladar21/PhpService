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

        $query = $model->select('*');
        $totalRecords = $query->countAllResults();
        // Conditions
        if ($search) {
            $query->where('id', $search)
                ->orWhere('name', 'LIKE', "%$search%")
                ->orWhere('tax_no', 'LIKE', "%$search%")
                ->orWhere('post_code', 'LIKE', "%$search%")
                ->orWhere('city', 'LIKE', "%$search%")
                ->orWhere('street', 'LIKE', "%$search%")
                ->orWhere('country', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%")
                ->orWhere('www', 'LIKE', "%$search%")
                ->orWhere('fax', 'LIKE', "%$search%")
                ->orWhere('street_no', 'LIKE', "%$search%")
                ->orWhere('kind', 'LIKE', "%$search%")
                ->orWhere('bank', 'LIKE', "%$search%")
                ->orWhere('bank_account', 'LIKE', "%$search%")
                ->orWhere('bank_account_id', $search)
                ->orWhere('note', 'LIKE', "%$search%")
                ->orWhere('last_name', 'LIKE', "%$search%")
                ->orWhere('referrer', 'LIKE', "%$search%")
                ->orWhere('token', 'LIKE', "%$search%")
                ->orWhere('fuid', 'LIKE', "%$search%")
                ->orWhere('fname', 'LIKE', "%$search%")
                ->orWhere('femail', 'LIKE', "%$search%")
                ->orWhere('department_id', $search)
                ->orWhere('discount', 'LIKE', "%$search%")
                ->orWhere('payment_to_kind', 'LIKE', "%$search%")
                ->orWhere('category_id', $search)
                ->orWhere('use_delivery_address', $search)
                ->orWhere('delivery_address', 'LIKE', "%$search%")
                ->orWhere('person', 'LIKE', "%$search%")
                ->orWhere('panel_user_id', $search)
                ->orWhere('use_mass_payment', $search)
                ->orWhere('mass_payment_code', 'LIKE', "%$search%")
                ->orWhere('external_id', $search)
                ->orWhere('company', $search)
                ->orWhere('title', 'LIKE', "%$search%")
                ->orWhere('mobile_phone', 'LIKE', "%$search%")
                ->orWhere('register_number', 'LIKE', "%$search%")
                ->orWhere('tax_no_check', 'LIKE', "%$search%")
                ->orWhere('attachments_count', $search)
                ->orWhere('default_payment_type', 'LIKE', "%$search%")
                ->orWhere('tax_no_kind', 'LIKE', "%$search%")
                ->orWhere('accounting_id', $search)
                ->orWhere('disable_auto_reminders', 'LIKE', "%$search%")
                ->orWhere('buyer_id', $search)
                ->orWhere('price_list_id', $search)
                ->orWhere('panel_url', 'LIKE', "%$search%")
                ->orWhere('active', $search);
        }

        $filteredCount = $query->countAllResults();

        // Iterate through each order element
        $columns = [
            'id', 'name', 'tax_no', 'post_code', 'city', 'street', 'first_name', 'country', 'email', 'phone', 'www', 'fax', 'created_at', 'updated_at', 'street_no', 'kind', 'bank', 'bank_account', 'bank_account_id', 'shortcut', 'note', 'last_name', 'referrer', 'token', 'fuid', 'fname', 'femail', 'department_id', 'import', 'discount', 'payment_to_kind', 'category_id', 'use_delivery_address', 'delivery_address', 'person', 'panel_user_id', 'use_mass_payment', 'mass_payment_code', 'external_id', 'company', 'title', 'mobile_phone', 'register_number', 'tax_no_check', 'attachments_count', 'default_payment_type', 'tax_no_kind', 'accounting_id', 'disable_auto_reminders', 'buyer_id', 'price_list_id', 'panel_url',
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

            foreach ($results as $key => $value) {
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
