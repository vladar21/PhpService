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
     * @return string
     */
    public function index(): string
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[
            'per_page' => 10
        ];
        return view('dashboard/index', $data);
    }

    public function get_users_ajax(): \CodeIgniter\HTTP\ResponseInterface
    {
        $model = new UserModel();
        // Получение данных из запроса и преобразование их в массив
        $request = service('request');
        $params = $request->getGet(); // Второй параметр true обеспечивает возвращение данных в виде ассоциативного массива

        $data = $model->getDataForDataTable($params);

        return $this->response->setJSON($data);

    }
}
