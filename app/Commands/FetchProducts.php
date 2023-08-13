<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Controllers\api\BillAPIController;

class FetchProducts extends BaseCommand
{
    protected $group       = 'custom';
//    protected $name        = 'fetch:products';
//    protected $name        = 'fetch:invoices';
    protected $name        = 'fetch:clients';
//    protected $description = 'Fetch and save products from the external API to the database.';
//    protected $description = 'Fetch and save invoices from the external API to the database.';
    protected $description = 'Fetch and save clients from the external API to the database.';

    public function run(array $params)
    {
        // Create an instance of the BillAPIController
        $apiController = new BillAPIController();

        // Call the fetchAndSaveProducts method
//        $apiController->fetchProducts();
//        $apiController->fetchInvoices();
        $apiController->fetchClients();

//        CLI::write('Products fetched and saved successfully.', 'green');
//        CLI::write('Invoices fetched and saved successfully.', 'green');
        CLI::write('Clients fetched and saved successfully.', 'green');
    }
}
