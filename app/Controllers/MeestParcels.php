<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MeestParcelModel;

class MeestParcels extends BaseController
{
    public function index()
    {
        helper('language');
        $lang = lang('app_lang');
        $data=[
            'per_page' => 10
        ];
        return view('meest_parcels/index', $data);
    }

    public function get_parcels_ajax(){
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
        $builder = $db->table('meest_parcels');
        $builder->select('*, s.name as name_sender, r.name as name_recipient');
        $builder->join('meest_senders_recipients as s', 's.id = meest_parcels.meest_senders_id');
        $builder->join('meest_senders_recipients as r', 'r.id = meest_parcels.meest_recipients_id');
        $builderAllRecords = clone $builder;

        $totalRecords = $builderAllRecords->countAllResults();

        // Conditions
        if ($search) {
            $builder->where('meest_parcels.id', $search)
                ->orWhere('name_sender', 'LIKE', "%$search%")
                ->orWhere('name_recipient', 'LIKE', "%$search%")
                ->orWhere('parcelNumber', 'LIKE', "%$search%")
                ->orWhere('parcelNumberInternal', 'LIKE', "%$search%")
                ->orWhere('parcelNumberParent', 'LIKE', "%$search%")
                ->orWhere('partnerKey', 'LIKE', "%$search%")
                ->orWhere('bagId', 'LIKE', "%$search%")
                ->orWhere('carrierLastMile', 'LIKE', "%$search%")
                ->orWhere('createReturnParcel', 'LIKE', "%$search%")
                ->orWhere('returnCarrier', 'LIKE', "%$search%")
                ->orWhere('cod', $search)
                ->orWhere('codCurrency', 'LIKE', "%$search%")
                ->orWhere('deliveryCost', $search)
                ->orWhere('serviceType', 'LIKE', "%$search%")
                ->orWhere('totalValue', $search)
                ->orWhere('currency', 'LIKE', "%$search%")
                ->orWhere('fulfillment', 'LIKE', "%$search%")
                ->orWhere('incoterms', 'LIKE', "%$search%")
                ->orWhere('iossVatIDenc', 'LIKE', "%$search%")
                ->orWhere('senderID', 'LIKE', "%$search%")
                ->orWhere('weight', $search);
        }

        // total records
        $builderFilteredResults = clone $builderAllRecords;
        $filteredCount = $builderFilteredResults->countAllResults();

        // Iterate through each order element
        $columns = [
            'meest_parcels.id',
            'parcelNumber',
            'parcelNumberInternal',
            'parcelNumberParent',
            'partnerKey',
            'bagId',
            'carrierLastMile',
            'createReturnParcel',
            'returnCarrier',
            'cod',
            'codCurrency',
            'deliveryCost',
            'serviceType',
            'totalValue',
            'currency',
            'fulfillment',
            'incoterms',
            'iossVatIDenc',
            'senderID',
            'weight',
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
                $responseData['data'][$key]['parcelNumber'] = $value['parcelNumber'];
                $responseData['data'][$key]['parcelNumberInternal'] = $value['parcelNumberInternal'];
                $responseData['data'][$key]['parcelNumberParent'] = $value['parcelNumberParent'];
                $responseData['data'][$key]['partnerKey'] = $value['partnerKey'];
                $responseData['data'][$key]['bagId'] = $value['bagId'];
                $responseData['data'][$key]['carrierLastMile'] = $value['carrierLastMile'];
                $responseData['data'][$key]['createReturnParcel'] = $value['createReturnParcel'];
                $responseData['data'][$key]['returnCarrier'] = $value['returnCarrier'];
                $responseData['data'][$key]['cod'] = $value['cod'];
                $responseData['data'][$key]['codCurrency'] = $value['codCurrency'];
                $responseData['data'][$key]['deliveryCost'] = $value['deliveryCost'];
                $responseData['data'][$key]['serviceType'] = $value['serviceType'];
                $responseData['data'][$key]['totalValue'] = $value['totalValue'];
                $responseData['data'][$key]['currency'] = $value['currency'];
                $responseData['data'][$key]['fulfillment'] = $value['fulfillment'];
                $responseData['data'][$key]['incoterms'] = $value['incoterms'];
                $responseData['data'][$key]['iossVatIDenc'] = $value['iossVatIDenc'];
                $responseData['data'][$key]['senderID'] = $value['senderID'];
                $responseData['data'][$key]['weight'] = $value['weight'];
                $responseData['data'][$key]['meest_recipients_id'] = $value['meest_recipients_id'];
                $responseData['data'][$key]['name_recipient'] = $value['name_recipient'];
                $responseData['data'][$key]['meest_senders_id'] = $value['meest_senders_id'];
                $responseData['data'][$key]['name_sender'] = $value['name_sender'];
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

    public function parcel($id = NULL)
    {
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

        return view('meest_parcels/view', $data);
    }

}
