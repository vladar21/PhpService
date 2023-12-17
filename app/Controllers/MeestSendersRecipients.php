<?php

namespace App\Controllers;

use App\Models\MeestSenderRecipientDocumentModel;
use App\Models\MeestSenderRecipientModel;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Class MeestSendersRecipients Controller
 *
 * @package App\Controllers\Api
 */
class MeestSendersRecipients extends BaseController
{
    /**
     * Displays the index page.
     *
     * @return string
     */
    public function index(): string
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[
            'per_page' => 10
        ];
        return view('meest_clients/index', $data);
    }

    /**
     * Fetches clients data from the database and returns it in JSON format.
     *
     * @return ResponseInterface
     */
    public function get_meest_clients_ajax(): ResponseInterface
    {

        $getData = $this->request->getJSON(true);

        $model = new MeestSenderRecipientModel();
        $data = $model->getDataForDataTable($getData);

        return $this->response->setJSON($data);

    }

    /**
     * Displays the client page.
     *
     * @param int|null $id The ID of the client to display.
     *
     * @return string
     */
    public function clients(int $id = NULL): string
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

    /**
     * Fetches docs of client from the database and returns it in JSON format.
     *
     * @return void
     */
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

    /**
     * Returns a list of recipients in JSON format for use with Select2.
     *
     * @return mixed
     */
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
