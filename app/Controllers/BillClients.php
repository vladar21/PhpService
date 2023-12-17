<?php

namespace App\Controllers;

//use App\Controllers\BaseController;
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

    public function get_clients_ajax(): \CodeIgniter\HTTP\ResponseInterface
    {

        $getData = $this->request->getJSON(true);

        $model = new BillClientModel();
        $data = $model->getDataForDataTable($getData);

        return $this->response->setJSON($data);

    }

}
