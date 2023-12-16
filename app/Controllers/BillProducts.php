<?php

namespace App\Controllers;

use App\Models\BillProductModel;

/**
 * Class BillProducts Controller
 *
 * @package App\Controllers\Api
 */
class BillProducts extends BaseController
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
        return view('bill_products/index', $data);
    }

    /**
     * Displays the product page.
     *
     * @param int|null $id The ID of the product to display.
     *
     * @return mixed
     */
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

    /**
     * Saves product data to the database.
     *
     * @return mixed
     */
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

            } else {
                // Update an existing product in the database
                $data = [
                    'product_name' => $product_name,
                    'product_price' => $product_price,
                    'product_quantity' => $product_quantity,
                    'product_description' => $product_description,
                ];
                $model->update($product_id, $data);

            }
        }

        // Redirect the user back to the form page or any other page as needed
        return redirect()->to('/bill_products/form');
    }

    public function get_products_ajax(): \CodeIgniter\HTTP\ResponseInterface
    {

        $request = service('request');
        $json = $request->getGet();

        $model = new BillProductModel();
        $data = $model->getDataForDataTable($json);

        return $this->response->setJSON($data);

    }
}
