<?php

namespace App\Models;

use CodeIgniter\Model;

class MeestSenderRecipientModel extends Model
{
    protected $table = 'meest_senders_recipients';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
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

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;

    public function getClients($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }
}
