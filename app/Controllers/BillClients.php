<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BillClientModel;

/**
 * Class BillClients
 *
 * @package App\Controllers\Api
 */
class BillClients extends BaseController
{
    /**
     * Displays the index view for Bill Clients.
     */
    public function index()
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[
            'per_page' => 10
        ];
        return view('bill_clients/index', $data);
    }

    /**
     * Retrieves and displays information about a specific client.
     *
     * @param int|null $id The ID of the client to retrieve.
     */
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

    /**
     * Fetches clients data from the database and returns it in JSON format.
     *
     * @return void
     */
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

        try {
            // Execute the query and store the result in $results
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
