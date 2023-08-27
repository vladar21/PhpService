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
        'meest_recipients_id',
        'meest_senders_id',
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;

}
