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
}
