<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as BaseUserModel;

/**
 * Model class for managing user's data.
 */
class UserModel extends BaseUserModel
{
    // Your custom methods and properties here...

    /**
     * Get users.
     *
     * @return array
     */
    public function getUsers($id = null)
    {
        if ($id === null) {
            return $this->asArray()->findAll();
        } else {
            return $this->asArray()->where(['id' => $id])->first();
        }
    }
}
