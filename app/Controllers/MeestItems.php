<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MeestItemDescriptionModel;
use App\Models\MeestItemModel;

class MeestItems extends BaseController
{
    public function index()
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[
            'per_page' => 10
        ];
        return view('meest_items/index', $data);
    }

    public function get_parcel_items_ajax()
    {
        $request = service('request');
        $jsonData = $request->getJSON();
        $getData = json_decode(json_encode($jsonData), true);
        $parcel_id = isset($getData['parcel_id']) ? $getData['parcel_id'] : null;

        // Get the request parameters from DataTables AJAX
        $draw = $getData['draw'];
        $start = $getData['start'];
        $length = $getData['length'];
        $search = $getData['search']['value'];
        $orders = $getData['order'];

        // Create an instance of your model
        $model = new MeestItemModel();

        try {
            // Execute the query and store the result in $results
            $results = $model->getDatatableData($start, $length, $search, $orders, $parcel_id);
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        if (isset($results)) {
            $responseData['draw'] = $draw;
            $responseData['recordsTotal'] = $results['totalRecords'];
            $responseData['recordsFiltered'] = $results['filteredRecords'];
            $p2p = $start;
            foreach ($results['data'] as $key => $value) {
                $responseData['data'][$key]['p2p'] = ++$p2p;
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

    public function item($id = NULL)
    {
        $model = new MeestItemModel();

        $items = $model->getMeestItems($id);

        if ($items)
        {
            $data = $items;
        }
        else
        {
            $data['code'] = '404';
            $data['message'] = 'Page Not Found';
            return view('errors/message', $data);
        }

        return view('meest_items/view', $data);
    }

    public function get_meest_item_desc_ajax(){

        $request = service('request');
        $getData = $request->getGet();
        $item_id = $getData['item_id'] ?? null;

        $searchKey = !empty($getData['search']['value']) ? $getData['search']['value'] : '';
        $limit = !empty($getData['length']) ? $getData['length'] : 10;

//        $paginationLimit = ($getData['start'] == 0)
//            ? 1 : ($getData['start'] / $limit) + 1;

        $queryStr = [
            'search' => $searchKey,
            'limit' => $limit,
//            'page' => $paginationLimit
        ];

        $model = new MeestItemDescriptionModel();

        if ($item_id){
            $results = $model->getItemDescription($item_id);

            if (isset($results) && ($count = count($results)) > 0) {
//            $responseData['draw'] = $getData['draw'];
                $responseData['recordsTotal'] = $count;
//            $responseData['recordsFiltered'] = $response['data']['total_count'];

                foreach ($results as $key => $value) {

                    $responseData['data'][$key]['id'] = $value['id'];
                    $responseData['data'][$key]['description'] = $value['description'];
                    $responseData['data'][$key]['lang'] = $value['lang'];
                    $responseData['data'][$key]['created_at'] = $value['created_at'];
                    $responseData['data'][$key]['updated_at'] = $value['updated_at'];
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
    public function save()
    {
        // Получаем экземпляр модели MeestParcelsModel
        $model = new MeestItemModel();

        // Получаем данные из формы
        $data = $this->request->getPost();

        // Проверяем, есть ли parcel_id в данных
        if (isset($data['product_id'])) {
            // Если есть, то это обновление существующей записи
            $data['id'] = $data['product_id'];
            unset($data['product_id']);
        } else {
            // Если нет, то это вставка новой записи
            $data['id'] = null;
        }

        // Задаем правила валидации для каждого поля
        $rules = [
            'description' => 'required',
//            'parcelNumber' => 'required|alpha_numeric',
//            'parcelNumberInternal' => 'alpha_numeric',
//            'parcelNumberParent' => 'alpha_numeric',
//            'partnerKey' => 'alpha_numeric',
//            'bagId' => 'required|alpha_numeric',
//            'carrierLastMile' => 'required|alpha_numeric',
//            'createReturnParcel' => 'required|in_list[yes,no]',
//            'returnCarrier' => 'required|alpha_numeric',
//            'cod' => 'required|decimal',
//            'codCurrency' => 'required|alpha'
        ];

        // Проверяем данные по правилам
        if ($this->validate($rules)) {
            // Если данные корректны, то сохраняем их в базу данных с помощью метода save модели
            $model->save($data);

            // Возвращаемся на страницу со списком посылок с сообщением об успехе
            return redirect()->back()->with('success', lang('app_lang.data_saved'));
        } else {
            // Если данные некорректны, то возвращаемся на страницу с формой с сообщением об ошибке и заполненными полями
            return redirect()->back()->withInput()->with('error', lang('app_lang.data_not_saved'));
        }
    }


}


