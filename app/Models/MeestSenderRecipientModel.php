<?php

namespace App\Models;

/**
 * Model class for managing meest user's data.
 */
class MeestSenderRecipientModel extends MyBaseModel
{
    // Database configuration
    protected $DBGroup          = 'default';
    protected $table = 'meest_senders_recipients';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

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
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $searchableFields = [
        'id', 'bill_client_id', 'companyName', 'name', 'phone', 'email', 'zipCode', 'country', 'city', 'street', 'buildingNumber', 'flatNumber', 'pickupPoint', 'region1', 'region2', 'created_at', 'updated_at'
    ];
    protected $sortableFields = [
        'id', 'bill_client_id', 'companyName', 'name', 'phone', 'email', 'zipCode', 'country', 'city', 'street', 'buildingNumber', 'flatNumber', 'pickupPoint', 'region1', 'region2', 'created_at', 'updated_at'
    ];

    /**
     * Get sender or recipient clients based on the provided ID, or retrieve all clients if ID is false.
     *
     * @param int|false $id The client ID to retrieve or false to retrieve all clients.
     *
     * @return array|null An array of client data or null if not found.
     */
    public function getClients($id = false): ?array
    {
        if ($id === false)
            return $this->asArray()->findAll();
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
    public function getClientByBillClientId(int $bill_client_id): ?array
    {
        return $this->asArray()->where(['bill_client_id' => $bill_client_id])->first();
    }

}
