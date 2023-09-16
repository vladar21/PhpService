<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model class for managing meest user's data.
 */
class MeestSenderRecipientModel extends Model
{
    // Database configuration
    protected $table = 'meest_senders_recipients';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'id',
        'bill_client_id',
        'buildingNumber',
        'city',
        'companyName',
        'country',
        'email',
        'flatNumber',
        'name',
        'phone',
        'pickupPoint',
        'region1',
        'region2',
        'street',
        'zipCode',
    ];

    // Dates configuration
    protected $useTimestamps = true;

    /**
     * Get sender or recipient clients based on the provided ID, or retrieve all clients if ID is false.
     *
     * @param int|false $id The client ID to retrieve or false to retrieve all clients.
     *
     * @return array|null An array of client data or null if not found.
     */
    public function getClients($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }

    /**
     * Get a client by their Bill Client ID.
     *
     * @param int $bill_client_id The Bill Client ID to retrieve the client.
     *
     * @return array|null An array of client data or null if not found.
     */
    public function getClientByBillClientId($bill_client_id){
        return $this->asArray()->where(['bill_client_id' => $bill_client_id])->first();
    }

}
