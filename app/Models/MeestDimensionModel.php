<?php

// app/Models/MeestDimensionModel.php

namespace App\Models;

use CodeIgniter\Model;

class MeestDimensionModel extends Model
{
    protected $table = 'meest_dimensions';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'height',
        'length',
        'width',
        'meest_parcels_id',
        'created_at',
        'updated_at',
    ];

    protected $useAutoIncrement = true;

    protected $useTimestamps = true;

    // Определите отношения к другим моделям, если это необходимо.
    public function parcel()
    {
        return $this->belongsTo(MeestParcelModel::class, 'meest_parcels_id');
    }
}

