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

    public function get_invoices_ajax(): \CodeIgniter\HTTP\ResponseInterface
    {

        $request = service('request');
        $getData = $request->getGet();

        $model = new BillInvoiceModel();
        $data = $model->getDataForDataTable($getData);

        return $this->response->setJSON($data);

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
