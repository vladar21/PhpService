<?php

namespace App\Controllers;

use App\Controllers\Api\MeestAPIController;
use App\Controllers\BaseController;
use App\Models\BillInvoiceModel;
use App\Models\MeestItemModel;
use App\Models\MeestParcelModel;
use App\Models\MeestSenderRecipientModel;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Class MeestParcels Controller
 *
 * @package App\Controllers\Api
 */
class MeestParcels extends BaseController
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
        return view('meest_parcels/index', $data);
    }

    /**
     * Fetches parcels data from the database and returns it in JSON format.
     *
     * @return ResponseInterface
     */
    public function get_parcels_ajax(): ResponseInterface
    {
        $request = service('request');
        $getData = $request->getJson(true);

        $model = new MeestParcelModel();
        $data = $model->getDataForDataTable($getData);

        return $this->response->setJSON($data);

    }

    /**
     * Displays the parcel page.
     *
     * @param int|null $id The ID of the parcel to display.
     *
     * @return mixed
     */
    public function parcel($id = NULL)
    {
        if ($id){
            $model = new MeestParcelModel();
            $parcel = $model->getParcels($id);

            if ($parcel)
            {
                $data = $parcel;
            }
            else
            {
                $data['code'] = '404';
                $data['message'] = 'Page Not Found';
                return view('errors/message', $data);
            }
        }

        return view('meest_parcels/view', $data);
    }

    /**
     * Adds a new parcel to the database.
     *
     * @param int|null $invoice_id The ID of the invoice to add the parcel to.
     *
     * @return mixed
     */
    public function add($invoice_id = NULL){
        if ($invoice_id){

            $invoiceModel = new BillInvoiceModel();

            try{
                $invoice = $invoiceModel->getInvoiceWithPositionsAndRecipient($invoice_id);
            }catch(\Throwable $ex){
                $data['code'] = '500';
                $data['message'] = $ex->getMessage();
                return $data;
            }

            if ($invoice)
            {
                $meestSenderRecipientModel = new MeestSenderRecipientModel();
                $sender = $meestSenderRecipientModel->getClients(1);
                $meest_senders_id = $sender['id'];

                $bill_client = [
                    'bill_client_id' => $invoice['recipient']['id'],
                    'buildingNumber' => $invoice['recipient']['street_no'],
                    'city' => $invoice['buyer_city'],
                    'companyName' => $invoice['buyer_name'],
                    'country' => $invoice['buyer_country'],
                    'email' => $invoice['buyer_email'],
                    'flatNumber' => '',
                    'name' => $invoice['buyer_first_name'].' '.$invoice['buyer_last_name'],
                    'phone' => $invoice['recipient']['mobile_phone'] ?? $invoice['recipient']['phone'],
                    'region1' => '',
                    'street' => $invoice['recipient']['street'],
                    'zipCode' => $invoice['buyer_post_code'],
                ];

                $meestSenderRecipient = $meestSenderRecipientModel->getClientByBillClientId($bill_client['bill_client_id']);
                if (!$meestSenderRecipient){
                    $recipient = null;
                }

                $parcelModel = new MeestParcelModel();
                $newParcel = [
                    'bill_invoice_id' => $invoice['id'],
                    'parcelNumber' => $parcelModel->createParcelNumber(),
                    'parcelNumberInternal' => null,
                    'parcelNumberParent' => $parcelModel->getParcelNumberParent(),
                    'partnerKey' => 'KEY_TEST01',
                    'bagId' => 'TestBagId',
                    'carrierLastMile' => 'MEEST',
                    'createReturnParcel' => false,
                    'returnCarrier' => 'VENIPAK',
                    'cod' => 820,
                    'codCurrency' => 'UAH',
                    'deliveryCost' => null,
                    'serviceType' => 'Home Delivery',
                    'totalValue' => $invoice['price_gross'] ?? null,
                    'currency' => 'EUR',
                    'fulfillment' => 'FULL',
                    'incoterms' => 'DDP',
                    'iossVatIDenc' => 'EuLyAWjprs9+SqY9n1vIjl7CvqoWoKcDFSDaQE+mmE4=',
                    'senderID' => '5FD924625F6AB16A',
                    'weight' => 0,
                    'meest_senders_id' => $meest_senders_id,
                    'meest_recipients_id' => $meestSenderRecipient['id'] ?? null,
                ];

                $new_parcel_id = null;
                $meestParcel = $parcelModel->getMeesParcelByBillInvoiceId($invoice['id']);
                if (!$meestParcel){
                    try{
                        $new_parcel_id = $parcelModel->insert($newParcel);
                        $data = $parcelModel->getParcels($new_parcel_id);
                    }catch(\Throwable $ex){
                        $data['code'] = '500';
                        $data['message'] = $ex->getMessage();
                        return $this->response->setStatusCode(500)->setJSON($data);
                    }
                }else{
                    $data = $meestParcel;
                }

                if ($new_parcel_id) {
                    if (count($invoice['positions']) > 0){

                        $itemData = $invoice['positions'];

                        // Create a new instance of the MeestItems model
                        $meestItemModel = new MeestItemModel();

                        foreach ($itemData as $item) {
                            $newItem = [
                                'barcode' => '',
                                'brand' => '',
                                'description' => (explode(" ", $item['name']))[0] ?? '',
                                'hsCode' => '851830000080',
                                'manufacturer' => '',
                                'originCountry' => '',
                                'productCategory' => '',
                                'productEAN' => '',
                                'productURL' => '',
                                'quantity' => $item['quantity'],
                                'skuCode' => '',
                                'value' => $item['total_price_gross'],
                                'weight' => '',
                                'meest_parcels_id' => $new_parcel_id,
                            ];

                            // Insert the item data into the meest_items table
                            $meestItemModel->insert($newItem);
                        }
                    }

                }

            }else{
                $data['code'] = '404';
                $data['message'] = 'Page Not Found';
                return view('errors/message', $data);
            }

        }

        return view('meest_parcels/view', $data);
    }

    /**
     * Saves parcel data to the database.
     *
     * @return mixed
     */
    public function save()
    {
        $model = new MeestParcelModel();

        $data = $this->request->getPost();

        if (isset($data['parcel_id'])) {
            $data['id'] = $data['parcel_id'];
            unset($data['parcel_id']);
        } else {
            $data['id'] = null;
        }

//        $rules = [
//            'bill_invoice_id' => 'numeric',
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
//        ];

//        if ($this->validate($rules)) {
            // Если данные корректны, то сохраняем их в базу данных с помощью метода save модели
            $model->save($data);

            return redirect()->to('/meest_parcels/'.$data['id'])->with('success', lang('app_lang.data_saved'));
//        }
//        else {
//            // Если данные некорректны, то возвращаемся на страницу с формой с сообщением об ошибке и заполненными полями
//            return redirect()->back()->withInput()->with('error', lang('app_lang.data_not_saved'));
//        }
    }

    /**
     * Deletes a parcel from the database.
     *
     * @param int $id The ID of the parcel to delete.
     *
     * @return mixed
     */
    public function delete($id){

        $model = new MeestParcelModel();

        try{
            $model->deleteParcel($id);
        }catch(\Throwable $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }

        return redirect()->to('/meest_parcels')->with('success', lang('app_lang.data_delete'));
    }

    /**
     * Sends a parcel to the recipient.
     *
     * @param int $id The ID of the parcel to send.
     *
     * @return mixed
     */
    public function sent($id){
        $request = service('request');

        $model = new MeestParcelModel();
        $parcelData = $model->getParcelData($id);

        $meestAPIController = new api\MeestAPIController();

        $response = $meestAPIController->createParcel($parcelData);

        // Check if the response is successful
        if ($response['status'] !== 200) {

            $responseArray = [];
            $responseArray['idObject'] = $response['body']->idObject;
            $responseArray['message'] = lang('app_lang.parcel_sent_error');
            $responseArray['details'] = $response['body']->details;

            $responseJson = json_encode($responseArray, JSON_PRETTY_PRINT);

            return redirect()->to('/meest_parcels/'.$id)->with('error', $responseJson);
        }
        return redirect()->to('/meest_parcels')->with('success', lang('app_lang.parcel_sent_success'));
    }

}
