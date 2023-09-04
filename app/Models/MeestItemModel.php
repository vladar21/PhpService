<?php

namespace App\Models;

use CodeIgniter\Model;

class MeestItemModel extends Model
{
    protected $table = 'meest_items';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'barcode',
        'brand',
        'description',
        'hsCode',
        'manufacturer',
        'originCountry',
        'productCategory',
        'productEAN',
        'productURL',
        'quantity',
        'skuCode',
        'value',
        'weight',
        'meest_parcels_id',
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;

    public function getMeestItems($id = false)
    {
        if ($id === false)
            return $this->findAll();
        else
            return $this->asArray()->where(['id' => $id])->first();
    }

    public function getParcelItems($parcelNumber = false)
    {
        if ($parcelNumber !== false)
            return $this->asArray()->where(['parcelNumber' => $parcelNumber])->findAll();
    }


}
