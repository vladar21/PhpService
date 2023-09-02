<?php

namespace App\Models;

use CodeIgniter\Model;

class MeestSenderRecipientDocumentModel extends Model
{
    protected $table = 'meest_sender_recipient_documents';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'sender_recipient_id',
        'date',
        'id_number',
        'issuer',
        'name',
        'number',
        'series',
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;

    public function getDocs($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['sender_recipient_id' => $id])->first();
    }

    public function getAllClinetDocs($id)
    {
        return $this->asArray()->where(['sender_recipient_id' => $id])->findAll();
    }
}
