<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBillInvoiceIdToMeestParcels extends Migration
{
    public function up()
    {
        // Add the 'bill_client_id' field to the table
        $this->forge->addColumn('meest_parcels', [
            'bill_invoice_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true, // Set to true if the field can be NULL
                'after' => 'id', // Specify the position of the column if needed
            ],
        ]);
    }

    public function down()
    {
        // Remove the 'bill_client_id' field if needed
        $this->forge->dropColumn('meest_parcels', 'bill_invoice_id');
    }
}
