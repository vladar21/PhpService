<?php

namespace App\Controllers;

use App\Models\BillInvoiceModel;
use App\Controllers\BaseController;

/**
 * Class BillInvoices Controller
 *
 * @package App\Controllers\Api
 */
class BillInvoices extends BaseController
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
        return view('bill_invoices/index', $data);
    }

    /**
     * Fetches invoice data from the database and returns it in JSON format.
     *
     * @return void
     */
    public function get_invoices_ajax(){

        $request = service('request');
        $getData = $request->getGet();

        // Get the request parameters from DataTables AJAX
        $draw = $getData['draw'];
        $start = $getData['start'];
        $length = $getData['length'];
        $search = $getData['search']['value'];
        $orders = $getData['order'];

        // Create an instance of your model
        $model = new BillInvoiceModel();

        $query = $model->select('*');
        $totalRecords = $query->countAllResults();
        // Conditions
        if ($search) {
            $query->where('id', $search)
                ->orWhere('user_id', $search)
                ->orWhere('number', 'LIKE', "%$search%")
                ->orWhere('place', 'LIKE', "%$search%")
                ->orWhere('price_net', $search)
                ->orWhere('price_gross', $search)
                ->orWhere('currency', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->orWhere('seller_name', 'LIKE', "%$search%")
                ->orWhere('seller_tax_no', 'LIKE', "%$search%")
                ->orWhere('seller_street', 'LIKE', "%$search%")
                ->orWhere('seller_post_code', 'LIKE', "%$search%")
                ->orWhere('seller_city', 'LIKE', "%$search%")
                ->orWhere('seller_country', 'LIKE', "%$search%")
                ->orWhere('seller_email', 'LIKE', "%$search%")
                ->orWhere('seller_phone', 'LIKE', "%$search%")
                ->orWhere('seller_www', 'LIKE', "%$search%")
                ->orWhere('seller_bank', 'LIKE', "%$search%")
                ->orWhere('seller_bank_account', 'LIKE', "%$search%")
                ->orWhere('buyer_name', 'LIKE', "%$search%")
                ->orWhere('buyer_post_code', 'LIKE', "%$search%")
                ->orWhere('buyer_city', 'LIKE', "%$search%")
                ->orWhere('buyer_street', 'LIKE', "%$search%")
                ->orWhere('buyer_first_name', 'LIKE', "%$search%")
                ->orWhere('buyer_country', 'LIKE', "%$search%")
                ->orWhere('token', 'LIKE', "%$search%")
                ->orWhere('buyer_email', 'LIKE', "%$search%")
                ->orWhere('client_id', $search)
                ->orWhere('lang', 'LIKE', "%$search%")
                ->orWhere('product_cache', 'LIKE', "%$search%")
                ->orWhere('buyer_last_name', 'LIKE', "%$search%");
        }

        // total records
        $filteredCount = $query->countAllResults();

        // Iterate through each order element
        $columns = [
            'id',
            'user_id',
            'number',
            'place',
            'sell_date',
            'price_net',
            'price_gross',
            'currency',
            'description',
            'seller_name',
            'seller_tax_no',
            'seller_street',
            'seller_post_code',
            'seller_city',
            'seller_country',
            'seller_email',
            'seller_phone',
            'seller_www',
            'seller_bank',
            'seller_bank_account',
            'buyer_name',
            'buyer_post_code',
            'buyer_city',
            'buyer_street',
            'buyer_first_name',
            'buyer_country',
            'created_at',
            'updated_at',
            'token',
            'buyer_email',
            'client_id',
            'lang',
            'product_cache',
            'buyer_last_name',
            'delivery_date',
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

                $responseData['data'][$key]['id'] = $value['id'];
                $responseData['data'][$key]['user_id'] = $value['user_id'];
                $responseData['data'][$key]['number'] = $value['number'];
                $responseData['data'][$key]['place'] = $value['place'];
                $responseData['data'][$key]['sell_date'] = $value['sell_date'];
                $responseData['data'][$key]['price_net'] = $value['price_net'];
                $responseData['data'][$key]['price_gross'] = $value['price_gross'];
                $responseData['data'][$key]['currency'] = $value['currency'];
                $responseData['data'][$key]['description'] = $value['description'];
                $responseData['data'][$key]['seller_name'] = $value['seller_name'];
                $responseData['data'][$key]['seller_tax_no'] = $value['seller_tax_no'];
                $responseData['data'][$key]['seller_street'] = $value['seller_street'];
                $responseData['data'][$key]['seller_post_code'] = $value['seller_post_code'];
                $responseData['data'][$key]['seller_city'] = $value['seller_city'];
                $responseData['data'][$key]['seller_country'] = $value['seller_country'];
                $responseData['data'][$key]['seller_email'] = $value['seller_email'];
                $responseData['data'][$key]['seller_phone'] = $value['seller_phone'];
                $responseData['data'][$key]['seller_www'] = $value['seller_www'];
                $responseData['data'][$key]['seller_bank'] = $value['seller_bank'];
                $responseData['data'][$key]['seller_bank_account'] = $value['seller_bank_account'];
                $responseData['data'][$key]['buyer_name'] = $value['buyer_name'];
                $responseData['data'][$key]['buyer_post_code'] = $value['buyer_post_code'];
                $responseData['data'][$key]['buyer_city'] = $value['buyer_city'];
                $responseData['data'][$key]['buyer_street'] = $value['buyer_street'];
                $responseData['data'][$key]['buyer_first_name'] = $value['buyer_first_name'];
                $responseData['data'][$key]['buyer_country'] = $value['buyer_country'];
                $responseData['data'][$key]['created_at'] = $value['created_at'];
                $responseData['data'][$key]['updated_at'] = $value['updated_at'];
                $responseData['data'][$key]['token'] = $value['token'];
                $responseData['data'][$key]['buyer_email'] = $value['buyer_email'];
                $responseData['data'][$key]['client_id'] = $value['client_id'];
                $responseData['data'][$key]['lang'] = $value['lang'];
                $responseData['data'][$key]['product_cache'] = $value['product_cache'];
                $responseData['data'][$key]['buyer_last_name'] = $value['buyer_last_name'];
                $responseData['data'][$key]['delivery_date'] = $value['delivery_date'];
            }
        } else {
            $responseData['draw'] = $draw;
            $responseData['recordsTotal'] = 0;
            $responseData['recordsFiltered'] = 0;
            $responseData['data'] = [];
        }
        echo json_encode($responseData); die();
    }

    /**
     * Displays the invoice page.
     *
     * @param int|null $id The ID of the invoice to display.
     *
     * @return mixed
     */
    public function invoice($id = NULL)
    {
        $model = new BillInvoiceModel();

        $invoice = $model->getInvoices($id);

        if ($invoice)
        {
            $data = $invoice;
        }
        else
        {
            $data['code'] = '404';
            $data['message'] = 'Page Not Found';
            return view('errors/message', $data);
        }

        return view('bill_invoices/view', $data);
    }
}
