<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as BaseUserModel;

/**
 * Model class for managing user's data.
 */
class UserModel extends BaseUserModel
{
    /**
     * Instance of MyBaseModel.
     */
    private MyBaseModel $baseModel;

    public function __construct()
    {
        parent::__construct();
        $this->baseModel = new MyBaseModel();
        $this->baseModel->table = $this->table;
        $this->baseModel->protectFields = $this->protectFields;
        $this->baseModel->allowedFields = $this->allowedFields;
        $this->baseModel->searchableFields = $this->searchableFields;
        $this->baseModel->sortableFields = $this->searchableFields;
    }

// Database configuration
    protected $table            = 'users';

    protected $protectFields    = true;

    // Allowed fields in the database
    protected $allowedFields = [
        "id", "username", "status", "status_message", "active", "last_active", "created_at", "updated_at", "deleted_at"
    ];

    // Поля, по которым можно искать и сортировать (указаны в дочерних моделях)
    protected $searchableFields = [
        "id", "username", "status", "status_message", "active", "last_active", "created_at", "updated_at", "deleted_at"
    ];
    protected $sortableFields = [
        "id", "username", "status", "status_message", "active", "last_active", "created_at", "updated_at", "deleted_at"
    ];

    public function getDataForDataTable($params): array
    {
        return $this->baseModel->getDataForDataTable($params);
    }

}
