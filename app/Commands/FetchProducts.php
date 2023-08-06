<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Controllers\api\BillAPIController;

class FetchProducts extends BaseCommand
{
    protected $group       = 'custom';
    protected $name        = 'fetch:products';
    protected $description = 'Fetch and save products from the external API to the database.';

    public function run(array $params)
    {
        // Create an instance of the BillAPIController
        $apiController = new BillAPIController();

        // Call the fetchAndSaveProducts method
        $apiController->fetchProducts();

        CLI::write('Products fetched and saved successfully.', 'green');
    }
}
