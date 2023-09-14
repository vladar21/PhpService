<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\BillClientModel;
use App\Models\BillInvoiceModel;
use App\Models\BillPositionModel;
use App\Models\BillProductModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Log\Logger;

class MeestAPIController extends BaseController
{
    use ResponseTrait;

    protected $authorizationHeader;

    public function __construct()
    {
        // Meest API credentials
        $partnerKey = 'ELSTMST_test';
        $secretKey = 'FptIJQ82M2';

        // Concatenate the Partner Key and Secret Key
        $combinedKey = $partnerKey . $secretKey;

        // Calculate the SHA256 hash of the combined key
        $authorization = hash('sha256', $combinedKey);

        // Format the Authorization header
        $this->authorizationHeader = $authorization;
    }

    private function sendGetRequest($url, $postData)
    {
        $data = [
            "parcelNumber" => "KEY0000000000002UA",
            "parcelNumberInternal" => "517024559",
            "parcelNumberParent" => null,
            "partnerKey" => "KEY_TEST01",
            "bagId" => "TestBagId",
            "carrierLastMile" => "MEEST",
            "createReturnParcel" => false,
            "returnCarrier" => "",
            "cod" => 820,
            "codCurrency" => "UAH",
            "deliveryCost" => null,
            "serviceType" => "Home Delivery",
            "totalValue" => 30,
            "currency" => "EUR",
            "fulfillment" => "FULL",
            "incoterms" => "DDP",
            "iossVatIDenc" => "EuLyAWjprs9+SqY9n1vIjl7CvqoWoKcDFSDaQE+mmE4=",
            "senderID" => "5FD924625F6AB16A",
            "weight" => 0.5,
            "recipient" => [
                "buildingNumber" => "54",
                "city" => "Лука-Мелешківська",
                "companyName" => "Shechenko&Co LLC",
                "country" => "UA",
                "email" => "recipient@gmail.com",
                "flatNumber" => "20",
                "name" => "Тарас Шевченко",
                "phone" => "+380937069158",
                "pickupPoint" => null,
                "region1" => "Вінницька",
                "region2" => "Вінницький",
                "street" => "Тиврівське",
                "zipCode" => "23234",
            ],
            "sender" => [
                "buildingNumber" => "45",
                "city" => "Warsaw",
                "companyName" => "CompanyName",
                "country" => "PL",
                "email" => "sender@gmail.com",
                "flatNumber" => "10",
                "name" => "Andrzej Sapkowski",
                "phone" => "+48668105534",
                "region1" => "Wojewodztwo mazowieckie",
                "street" => "Podskarbińska",
                "zipCode" => "03-833"
            ],
            "items" => [
                [
                    "barcode" => "0255851158",
                    "brand" => "Sony",
                    "description" => "Słuchawki bezprzewodowe Sony WH-CH510L Blue",
                    "hsCode" => "851830000080",
                    "manufacturer" => "Sony Corporation",
                    "originCountry" => "JP",
                    "productCategory" => "Household appliances",
                    "productEAN" => "4525330005583",
                    "productURL" => "https://test.com/item1",
                    "quantity" => 1,
                    "skuCode" => "SKU1451885",
                    "value" => 30,
                    "weight" => 0.5
                ],
            ]
        ];

        $jsonParcelData = json_encode($postData, JSON_NUMERIC_CHECK);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Устанавливаем опцию для POST-запроса
        curl_setopt($ch, CURLOPT_POST, true);

        // Добавляем данные для POST-запроса
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$jsonParcelData");

        // Добавляем аутентификационный заголовок и другие необходимые заголовки
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: '.$this->authorizationHeader,
        ]);

        $responseBody = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ['status' => $responseCode, 'body' => json_decode($responseBody)];

    }

    public function createParcel($parcelData)
    {
        $errorMessage = null;
        // Get the logger instance
        $logger = service('logger');

        $logger->info(service('router')->controllerName()."::".service('router')->methodName().": parcel_id {$parcelData['parcelNumber']}...");
        // Make a GET request to the external API
        $url = "https://mwl.meest.com/mwl/parcels";
        return $response = $this->sendGetRequest($url, $parcelData);
    }

    public function trackParcel($trackingNumber)
    {
        // TODO: to make parcel tracking
    }

}
