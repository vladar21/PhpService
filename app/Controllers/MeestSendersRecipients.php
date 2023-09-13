<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MeestSenderRecipientDocumentModel;
use App\Models\MeestSenderRecipientModel;

class MeestSendersRecipients extends BaseController
{
    public function index()
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[
            'per_page' => 10
        ];
        return view('meest_clients/index', $data);
    }

    public function get_meest_clients_ajax(){
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
        $db = \Config\Database::connect();
        $builder = $db->table('meest_senders_recipients');
        $builder->select('*');

        $builderAllRecords = clone $builder;
        $totalRecords = $builderAllRecords->countAllResults();

        // Conditions
        if ($search) {
            $builder->where('id', $search)
                ->where('bill_client_id', $search)
                ->orWhere('buildingNumber', 'LIKE', "%$search%")
                ->orWhere('city', 'LIKE', "%$search%")
                ->orWhere('companyName', 'LIKE', "%$search%")
                ->orWhere('country', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orWhere('flatNumber', 'LIKE', "%$search%")
                ->orWhere('name', 'LIKE', "%$search%")
                ->orWhere('phone', 'LIKE', "%$search%")
                ->orWhere('pickupPoint', 'LIKE', "%$search%")
                ->orWhere('region1', 'LIKE', "%$search%")
                ->orWhere('region2', 'LIKE', "%$search%")
                ->orWhere('street', $search)
                ->orWhere('zipCode', 'LIKE', "%$search%");
        }

        // total records
        $builderFilteredResults = clone $builderAllRecords;
        $filteredCount = $builderFilteredResults->countAllResults();

        // Iterate through each order element
        $columns = [
            'id',
            'bill_client_id',
            'companyName',
            'name',
            'phone',
            'email',
            'zipCode',
            'country',
            'city',
            'street',
            'buildingNumber',
            'flatNumber',
            'pickupPoint',
            'region1',
            'region2',
            'created_at',
            'updated_at',
        ];

        foreach ($orders as $order) {
            $order_column_index = $order['column'];
            $order_column = $columns[$order_column_index]; // Map to your database column
            $order_dir = $order['dir'];

            // Add ordering for each column
            $builder->orderBy($order_column, $order_dir);
        }

        // Limit and offset
        $builder->limit($length, $start);

        try {
            // Execute the query and store the result in $results
            $results = $builder->get()->getResultArray();
//            $sql = $query->getCompiledSelect();
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        if (isset($results)) {
            $responseData['draw'] = $draw;
            $responseData['recordsTotal'] = $totalRecords;
            $responseData['recordsFiltered'] = $filteredCount;

            foreach ($results as $key => $value) {

                $responseData['data'][$key]['id'] = $value['id'];
                $responseData['data'][$key]['bill_client_id'] = $value['bill_client_id'];
                $responseData['data'][$key]['buildingNumber'] = $value['buildingNumber'];
                $responseData['data'][$key]['city'] = $value['city'];
                $responseData['data'][$key]['companyName'] = $value['companyName'];
                $responseData['data'][$key]['country'] = $value['country'];
                $responseData['data'][$key]['email'] = $value['email'];
                $responseData['data'][$key]['flatNumber'] = $value['flatNumber'];
                $responseData['data'][$key]['name'] = $value['name'];
                $responseData['data'][$key]['phone'] = $value['phone'];
                $responseData['data'][$key]['pickupPoint'] = $value['pickupPoint'];
                $responseData['data'][$key]['region1'] = $value['region1'];
                $responseData['data'][$key]['region2'] = $value['region2'];
                $responseData['data'][$key]['street'] = $value['street'];
                $responseData['data'][$key]['zipCode'] = $value['zipCode'];
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

    public function clients($id = NULL)
    {
        $model = new MeestSenderRecipientModel();

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

        return view('meest_clients/view', $data);
    }

    public function get_meest_client_docs(){
        $request = service('request');
        $getData = $request->getGet();
        $client_id = $getData['client_id'] ?? null;

        $searchKey = !empty($getData['search']['value']) ? $getData['search']['value'] : '';
        $limit = !empty($getData['length']) ? $getData['length'] : 10;

//        $paginationLimit = ($getData['start'] == 0)
//            ? 1 : ($getData['start'] / $limit) + 1;

        $queryStr = [
            'search' => $searchKey,
            'limit' => $limit,
//            'page' => $paginationLimit
        ];

        $model = new MeestSenderRecipientDocumentModel();

        if ($client_id){
            $results = $model->getAllClinetDocs($client_id);

            if (isset($results) && ($count = count($results)) > 0) {
//            $responseData['draw'] = $getData['draw'];
                $responseData['recordsTotal'] = $count;
//            $responseData['recordsFiltered'] = $response['data']['total_count'];

                foreach ($results as $key => $value) {
                    $responseData['data'][$key]['id_number'] = $value['id_number'];
                    $responseData['data'][$key]['date'] = $value['date'];
                    $responseData['data'][$key]['issuer'] = $value['issuer'];
                    $responseData['data'][$key]['name'] = $value['name'];
                    $responseData['data'][$key]['number'] = $value['number'];
                    $responseData['data'][$key]['series'] = $value['series'];
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

    public function select2list(){
        // Получаем данные из запроса
        $request = $this->request;
        $getData = $request->getGet();
        $search = $getData['search'] ?? ''; // Термин для поиска
        $page = $getData['page'];
//        $search = $request->getGet('search') || ''; // Термин для поиска
//        $page = $request->getGet('page'); // Номер страницы для пагинации
        $limit = 10; // Количество записей на страницу

        // Создаем экземпляр модели RecipientModel
        $model = new MeestSenderRecipientModel();

        // Выполняем поиск по термину с пагинацией и получаем результаты в виде массива

        $results = $model->like('name', $search)->asArray()->paginate($limit, 'default', $page);

        // Формируем массив данных для ответа
        $data = [];
        foreach ($results as $row) {
            $data[] = [
                'id' => $row['id'], // Идентификатор получателя
                'text' => $row['name'] // Имя получателя
            ];
        }

        // Формируем массив метаданных для ответа
        $meta = [
            'pagination' => [
                'more' => $model->pager->hasMore() // Есть ли еще страницы
            ]
        ];

        // Устанавливаем тип контента ответа в формате JSON и отправляем ответ
        return $this->response->setContentType('application/json')->setBody(json_encode(['results' => $data, 'meta' => $meta]));
    }

}
