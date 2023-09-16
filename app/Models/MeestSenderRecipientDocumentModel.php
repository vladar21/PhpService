<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model class for managing meest user's docs data.
 */
class MeestSenderRecipientDocumentModel extends Model
{
    // Database configuration
    protected $table = 'meest_sender_recipient_documents';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    // Allowed fields in the database
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

    // Dates configuration
    protected $useTimestamps = true;

    /**
     * Get documents based on the provided sender or recipient ID, or retrieve all documents if ID is false.
     *
     * @param int|false $id The sender or recipient ID to retrieve documents for, or false to retrieve all documents.
     *
     * @return array|null An array of documents or null if not found.
     */
    public function getDocs($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['sender_recipient_id' => $id])->first();
    }

    /**
     * Get all documents associated with a specific sender or recipient based on the provided ID.
     *
     * @param int $id The sender or recipient ID to retrieve documents for.
     *
     * @return array An array of documents associated with the sender or recipient.
     */
    public function getAllClinetDocs($id)
    {
        return $this->asArray()->where(['sender_recipient_id' => $id])->findAll();
    }
}
