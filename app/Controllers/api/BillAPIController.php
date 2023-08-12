<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\BillInvoiceModel;
use App\Models\BillProductModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Log\Logger;

class BillAPIController extends BaseController
{
    use ResponseTrait;

    protected $apiToken;

    public function __construct()
    {
        // Load the API token from .env file or any other appropriate method
        $this->apiToken = env('API_TOKEN'); // Make sure you have the API_TOKEN defined in your .env file
    }

    public function fetchInvoices()
    {
        $perPage = 25;
        $page = 1;
        $errorMessage = null;

        // Get the logger instance
        $logger = service('logger');

        while (true) {
            // Logging the message
            $logger->info(service('router')->controllerName()."::".service('router')->methodName().": Fetching page {$page}...");
            // Make a GET request to the external API
            $url = "https://elista.fakturownia.pl/invoices.json?page={$page}&per_page={$perPage}&api_token={$this->apiToken}";
            $response = $this->sendGetRequest($url);

            // Check if the response is successful
            if ($response['status'] === 200) {
                $responseData = json_decode($response['body'], true);

                // Check if the response has data
                if (!empty($responseData)) {
                    // Process and save the products from the current page
                    $this->saveInvoicesToDatabase($responseData);

                    // Check if there are more pages to fetch
                    if (count($responseData) < $perPage) {
                        // The response data count is less than the per_page value,
                        // indicating that it's the last page, stop the loop
                        break;
                    }

                    // Move to the next page for the next iteration
                    $page++;
                } else {
                    // No data in the response, stop the loop
                    break;
                }
            } else {
                // Request failed, set an error message and stop the loop
                $errorMessage = "Error: Failed to fetch invoices from the API. HTTP Status Code: {$response['status']}";
                // Request failed, stop the loop
                break;
            }
        }

        if ($errorMessage) {
            return json_encode([
                'success' => false,
                'message' => $errorMessage,
            ]);
        } else {
            return json_encode([
                'success' => true,
                'message' => 'Invoices fetching completed successfully!',
            ]);
        }
    }

    public function fetchProducts()
    {
        $perPage = 25;
        $page = 1;
        $errorMessage = null;

        // Get the logger instance
        $logger = service('logger');

        while (true) {
            // Logging the message
            $logger->info(service('router')->controllerName()."::".service('router')->methodName().": Fetching page {$page}...");
            // Make a GET request to the external API
            $url = "https://elista.fakturownia.pl/products.json?page={$page}&per_page={$perPage}&api_token={$this->apiToken}";
            $response = $this->sendGetRequest($url);

            // Check if the response is successful
            if ($response['status'] === 200) {
                $responseData = json_decode($response['body'], true);

                // Check if the response has data
                if (!empty($responseData)) {
                    // Process and save the products from the current page
                    $this->saveProductsToDatabase($responseData);

                    // Check if there are more pages to fetch
                    if (count($responseData) < $perPage) {
                        // The response data count is less than the per_page value,
                        // indicating that it's the last page, stop the loop
                        break;
                    }

                    // Move to the next page for the next iteration
                    $page++;
                } else {
                    // No data in the response, stop the loop
                    break;
                }
            } else {
                // Request failed, set an error message and stop the loop
                $errorMessage = "Error: Failed to fetch products from the API. HTTP Status Code: {$response['status']}";
                // Request failed, stop the loop
                break;
            }
        }

        if ($errorMessage) {
            return json_encode([
                'success' => false,
                'message' => $errorMessage,
            ]);
        } else {
            return json_encode([
                'success' => true,
                'message' => 'Products fetching completed successfully!',
            ]);
        }
    }

    private function sendGetRequest($url)
    {
        // Use any appropriate method to send a GET request, like using cURL or HTTP client
        // For demonstration purposes, I'll use cURL here

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseBody = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ['status' => $responseCode, 'body' => $responseBody];
    }

    private function saveInvoicesToDatabase($invoices)
    {
        // Assuming you have a model called ProductModel to interact with the database
        $model = new BillInvoiceModel();

        foreach ($invoices as $invoice) {
            // Find the product by 'id' in our database
            $existingInvoice = $model->find($invoice['id']);

            if ($existingInvoice) {
                // If the product already exists, check for field-by-field differences
                $updatedData = [];

                // Compare each field of the existing product with the new data
                foreach ($invoice as $field => $value) {
                    if ($existingInvoice[$field] !== $value) {
                        $updatedData[$field] = $value;
                    }
                }

                // If there are differences, update the existing product with the new data
                if (!empty($updatedData)) {
                    $model->update($invoice['id'], $updatedData);
                }
            } else {
                // If the product does not exist, insert it into the database
                $model->insert($invoice);
            }
        }
    }

    private function saveProductsToDatabase($products)
    {
        // Assuming you have a model called ProductModel to interact with the database
        $model = new BillProductModel();

        foreach ($products as $product) {
            // Find the product by 'id' in our database
            $existingProduct = $model->find($product['id']);

            if ($existingProduct) {
                // If the product already exists, check for field-by-field differences
                $updatedData = [];

                // Compare each field of the existing product with the new data
                foreach ($product as $field => $value) {
                    if ($existingProduct[$field] !== $value) {
                        $updatedData[$field] = $value;
                    }
                }

                // If there are differences, update the existing product with the new data
                if (!empty($updatedData)) {
                    $model->update($product['id'], $updatedData);
                }
            } else {
                // If the product does not exist, insert it into the database
                $model->insert($product);
            }
        }
    }
}
