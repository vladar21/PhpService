<?php

namespace App\Models;

use CodeIgniter\Model;
use IRCMaxell\Password\Password;
use IRCMaxell\Password\Implementation\PasswordHash;

class MyModel extends Model
{
    protected $passwordHasher;

    public function __construct()
    {
        parent::__construct();

        $this->passwordHasher = new PasswordHash(8, false);
    }

    public function hashPassword($password)
    {
        return $this->passwordHasher->hashPassword($password);
    }

    public function verifyPassword($password, $hashedPassword)
    {
        return $this->passwordHasher->verifyPassword($password, $hashedPassword);
    }
}
