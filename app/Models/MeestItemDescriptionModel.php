<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Model class for managing meest item description data.
 */
class MeestItemDescriptionModel extends Model
{
    // Database configuration
    protected $table = 'meest_item_descriptions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    // Allowed fields in the database
    protected $allowedFields = [
        'id',
        'item_id',
        'description',
        'lang',
    ];

    // Dates configuration
    protected $useTimestamps = true;

    /**
     * Define a many-to-one relationship with the MeestItem model.
     *
     * @return \CodeIgniter\Database\BaseBuilder
     */
    public function item()
    {
        return $this->belongsTo('App\Models\MeestItem', 'item_id');
    }

    /**
     * Get item descriptions based on the provided item_id.
     *
     * @param int|null $item_id The ID of the item to retrieve descriptions for.
     *
     * @return array|null An array of item descriptions or null if not found.
     */
    public function getItemDescription($item_id = null){
        if ($item_id){
            return $this->asArray()->where(['item_id' => $item_id])->findAll();
        }
    }
}
