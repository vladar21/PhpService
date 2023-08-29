<?php

// app/Models/MeestParcelsModel.php

namespace App\Models;

use CodeIgniter\Model;

class MeestParcelModel extends Model
{
    protected $table = 'meest_parcels';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'parcelNumber',
        'parcelNumberInternal',
        'parcelNumberParent',
        'partnerKey',
        'bagId',
        'carrierLastMile',
        'createReturnParcel',
        'returnCarrier',
        'cod',
        'codCurrency',
        'deliveryCost',
        'serviceType',
        'totalValue',
        'currency',
        'fulfillment',
        'incoterms',
        'iossVatIDenc',
        'senderID',
        'weight',
        'meest_senders_id',
        'meest_recipients_id',
        'name_sender',
        'name_recipient',
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;

    public function sender()
    {
        return $this->belongsTo(MeestSenderRecipientModel::class, 'meest_senders_id', 'id');
    }

    public function recipient()
    {
        return $this->belongsTo(MeestSenderRecipientModel::class, 'meest_recipients_id', 'id');
    }
}
