<?php

namespace App\Controllers;

use App\Models\UserModel;

/**
 * Class Dashboard Controller
 *
 * @package App\Controllers\Api
 */
class Dashboard extends BaseController
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
        return view('dashboard/index', $data);
    }

    /**
     * Fetches users data from the database and returns it in JSON format.
     *
     * @return void
     */
    public function get_users_ajax(){

        $request = service('request');
        $getData = $request->getGet();

        // Get the request parameters from DataTables AJAX
        $draw = $getData['draw'];
        $start = $getData['start'];
        $length = $getData['length'];
        $search = $getData['search']['value'];
        $orders = $getData['order'];

        $model = new UserModel();

        $query = $model->select('*');
        $totalRecords = $query->countAllResults();
        // Conditions
        if ($search) {
            $query->where('id', $search)
                ->orWhere('username', 'LIKE', "%$search%")
                ->orWhere('status', 'LIKE', "%$search%")
                ->orWhere('status_message', 'LIKE', "%$search%")
                ->orWhere('active', $search);
        }

        $filteredCount = $query->countAllResults();

        // Iterate through each order element
        $columns = [
            'id', // 0
            'username',
            'status',
            'status_message',
            'active',
            'last_active',
            'created_at',
            'updated_at',
            'deleted_at',
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
