<?php

namespace App\Controllers;

use App\Models\BillProductModel;

class BillProducts extends BaseController
{
    public function index()
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[];
        return view('bill_products/index', $data);
    }

    public function product($id = NULL)
    {
        $model = new BillProductModel();

        $product = $model->getProducts($id);

        if ($product)
        {
            $data = $product;
        }
        else
        {
            $data['code'] = '404';
            $data['message'] = 'Page Not Found';
            return view('errors/message', $data);
        }

        return view('bill_products/view', $data);
    }

    public function save()
    {
        // Check if the request is a POST request
        if ($this->request->getMethod() === 'post') {
            // Get the form data
            $product_id = $this->request->getPost('product_id');
            $product_name = $this->request->getPost('product_name');
            $product_price = $this->request->getPost('product_price');
            $product_quantity = $this->request->getPost('product_quantity');
            $product_description = $this->request->getPost('product_description');

            // Load the BillProductsModel
            $model = new BillProductModel();

            // Check if the product_id is empty to determine if it's a new product
            if (empty($product_id)) {
                // Insert a new product into the database
                $data = [
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_quantity' => $product_quantity,
                    'product_description' => $product_description,
                ];
                $model->insert($data);

                // Optionally, you can add a success message or redirect the user to a success page.
            } else {
                // Update an existing product in the database
                $data = [
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_quantity' => $product_quantity,
                    'product_description' => $product_description,
                ];
                $model->update($product_id, $data);

                // Optionally, you can add a success message or redirect the user to a success page.
            }
        }

        // Redirect the user back to the form page or any other page as needed
        return redirect()->to('/bill_products/form');
    }

    public function get_products_ajax(){

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

        $model = new BillProductModel();

        $results = $model->getProducts();

        if (isset($results) && ($count = count($results)) > 0) {
//            $responseData['draw'] = $getData['draw'];
            $responseData['recordsTotal'] = $count;
//            $responseData['recordsFiltered'] = $response['data']['total_count'];

            foreach ($results as $key => $value) {

                $responseData['data'][$key]['id'] = $value['id'];
                $responseData['data'][$key]['name'] = $value['name'];
                $responseData['data'][$key]['description'] = $value['description'];
                $responseData['data'][$key]['price_net'] = $value['price_net'];
                $responseData['data'][$key]['quantity'] = $value['quantity'];
                $responseData['data'][$key]['quantity_unit'] = $value['quantity_unit'];
                $responseData['data'][$key]['additional_info'] = $value['additional_info'];
                $responseData['data'][$key]['price_gross'] = $value['price_gross'];
                $responseData['data'][$key]['form_name'] = $value['form_name'];
                $responseData['data'][$key]['code'] = $value['code'];
                $responseData['data'][$key]['currency'] = $value['currency'];
                $responseData['data'][$key]['weight_unit'] = $value['weight_unit'];
                $responseData['data'][$key]['supplier_code'] = $value['supplier_code'];
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