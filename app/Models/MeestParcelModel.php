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

    public function getParcels($id = false)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('meest_parcels');
        $builder->select('*, meest_parcels.id as parcel_id, s.name as name_sender, r.name as name_recipient');
        $builder->join('meest_senders_recipients as s', 's.id = meest_parcels.meest_senders_id');
        $builder->join('meest_senders_recipients as r', 'r.id = meest_parcels.meest_recipients_id');

        if ($id === false)
            return $builder->get()->getResultArray();
        else
            return $builder->where(['meest_parcels.id' => $id])->get()->getRowArray();
    }
}