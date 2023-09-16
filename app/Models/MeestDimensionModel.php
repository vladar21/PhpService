<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model class for dimension meest parcel data.
 */
class MeestDimensionModel extends Model
{
    // Database configuration
    protected $table = 'meest_dimensions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    // Allowed fields in the database
    protected $allowedFields = [
        'height',
        'length',
        'width',
        'meest_parcels_id',
        'created_at',
        'updated_at',
    ];

    // Dates configuration
    protected $useTimestamps = true;

    /**
     * Defines a one-to-one relationship with the MeestParcelModel class.
     * @return \CodeIgniter\Database\BaseBuilder A query builder object that can be used to fetch the related record.
     */
    public function parcel()
    {
        return $this->belongsTo(MeestParcelModel::class, 'meest_parcels_id');
    }
}

