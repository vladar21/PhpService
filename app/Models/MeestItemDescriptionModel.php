<?php

namespace App\Models;

use CodeIgniter\Model;

class MeestItemDescriptionModel extends Model
{
    protected $table = 'meest_item_descriptions';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'item_id',
        'description',
        'lang',
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;

    public function item()
    {
        return $this->belongsTo('App\Models\MeestItem', 'item_id');
    }
}
