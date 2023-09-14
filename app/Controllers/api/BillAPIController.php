<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\BillClientModel;
use App\Models\BillInvoiceModel;
use App\Models\BillPositionModel;
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

    public function fetchClients()
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
            $url = "https://elista.fakturownia.pl/clients.json?page={$page}&per_page={$perPage}&api_token={$this->apiToken}";
            $response = $this->sendGetRequest($url);

            // Check if the response is successful
            if ($response['status'] === 200) {
                $responseData = json_decode($response['body'], true);

                // Check if the response has data
                if (!empty($responseData)) {
                    // Process and save the products from the current page
                    $this->saveClientsToDatabase($responseData);

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
                $errorMessage = "Error: Failed to fetch clients from the API. HTTP Status Code: {$response['status']}";
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
            $url = "https://elista.fakturownia.pl/invoices.json?page={$page}&per_page={$perPage}&include_positions=true&api_token={$this->apiToken}";
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
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseBody = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ['status' => $responseCode, 'body' => $responseBody];
    }

        private function saveClientsToDatabase($clients)
    {
        // Assuming you have a model called ProductModel to interact with the database
        $model = new BillClientModel();

        foreach ($clients as $client) {
            // Find the product by 'id' in our database
            $existingClient = $model->find($client['id']);

            if ($existingClient) {
                // If the product already exists, check for field-by-field differences
                $updatedData = [];

                // Compare each field of the existing product with the new data
                foreach ($client as $field => $value) {
                    if ($existingClient[$field] !== $value) {
                        $updatedData[$field] = $value;
                    }
                }

                // If there are differences, update the existing product with the new data
                if (!empty($updatedData)) {
                    $model->update($client['id'], $updatedData);
                }
            } else {
                // If the product does not exist, insert it into the database
                $model->insert($client);
            }
        }
    }

    private function saveInvoicesToDatabase($invoices)
    {
        $exceptionFields = ['app', 'payment_type', 'status', 'seller_fax', 'seller_person', 'buyer_tax_no', 'buyer_www', 'buyer_fax', 'buyer_phone', 'kind', 'pattern', 'pattern_nr', 'pattern_nr_m', 'pattern_nr_d', 'payment_to', 'paid', 'seller_bank_account_id', 'issue_date', 'price_tax', 'department_id', 'correction', 'buyer_note', 'additional_info_desc', 'additional_info', 'from_invoice_id', 'oid', 'discount', 'show_discount', 'sent_time', 'print_time', 'recurring_id', 'tax2_visible', 'warehouse_id', 'paid_date', 'product_id', 'issue_year', 'internal_note', 'invoice_id', 'invoice_template_id', 'description_long', 'buyer_tax_no_kind', 'seller_tax_no_kind', 'description_footer', 'sell_date_kind', 'payment_to_kind', 'exchange_currency', 'discount_kind', 'income', 'from_api', 'category_id', 'warehouse_document_id', 'exchange_kind', 'exchange_rate', 'use_delivery_address', 'delivery_address', 'accounting_kind', 'buyer_person', 'buyer_bank_account', 'buyer_bank', 'buyer_mass_payment_code', 'exchange_note', 'buyer_company', 'show_attachments', 'exchange_currency_rate', 'has_attachments', 'exchange_date', 'attachments_count', 'fiscal_status', 'use_moss', 'calculating_strategy', 'transaction_date', 'email_status', 'exclude_from_stock_level', 'exclude_from_accounting', 'exchange_rate_den', 'exchange_currency_rate_den', 'accounting_scheme', 'exchange_difference', 'not_cost', 'reverse_charge', 'issuer', 'use_issuer', 'cancelled', 'recipient_id', 'recipient_name', 'test', 'discount_net', 'approval_status', 'accounting_vat_tax_date', 'accounting_income_tax_date', 'accounting_other_tax_date', 'accounting_status', 'normalized_number', 'na_tax_kind', 'issued_to_receipt', 'sales_code', 'additional_invoice_field', 'products_margin', 'payment_url', 'view_url', 'buyer_mobile_phone', 'kind_text', 'invoice_for_receipt_id', 'receipt_for_invoice_id', 'recipient_company', 'recipient_first_name', 'recipient_last_name', 'recipient_tax_no', 'recipient_street', 'recipient_post_code', 'recipient_city', 'recipient_country', 'recipient_email', 'recipient_phone', 'recipient_note', 'overdue?', 'get_tax_name', 'tax_visible?', 'tax_name_type', 'split_payment', 'gtu_codes', 'procedure_designations'];
        // Assuming you have a model called ProductModel to interact with the database
        $model = new BillInvoiceModel();

        try{

            foreach ($invoices as $invoice) {
                // add data to positions
                if (count($invoice['positions']) > 0){
    //                $positions[] = $invoice['positions'];
                    $this->savePositionsToDatabase($invoice['positions']);
                }
                unset($invoice['positions']);
                // Find the invoice by 'id' in our database
                $existingInvoice = $model->find($invoice['id']);

                if ($existingInvoice) {
                    // If the product already exists, check for field-by-field differences
                    $updatedData = [];

                    // Compare each field of the existing product with the new data
                    foreach ($invoice as $field => $value) {
                        if (in_array($field, $exceptionFields)) continue;
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
        }catch(\Throwable $ex){
            new \Exception($ex->getMessage());
        }
    }

    private function savePositionsToDatabase($positions)
    {
//        echo "Positions ".print_r($positions);
        // Assuming you have a model called ProductModel to interact with the database
        $model = new BillPositionModel();

        foreach ($positions as $position) {
//            echo "Position ".print_r($position);
            // Find the product by 'id' in our database
            $existingPosition = $model->find($position['id']);

            if ($existingPosition) {
                // If the product already exists, check for field-by-field differences
                $updatedData = [];

                // Compare each field of the existing product with the new data
                foreach ($position as $field => $value) {
                    if ($existingPosition[$field] !== $value) {
                        $updatedData[$field] = $value;
                    }
                }

                // If there are differences, update the existing product with the new data
                if (!empty($updatedData)) {
                    $model->update($position['id'], $updatedData);
                }
            } else {
                // If the product does not exist, insert it into the database
                $model->insert($position);
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
