<?php

namespace App\Libraries;

class PasswordHash
{
    /**
     * Создать хэш пароля.
     *
     * @param string $password Пароль для хэширования.
     * @return string
     */
    public function hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Проверить, соответствует ли пароль хэшу.
     *
     * @param string $password Пароль для проверки.
     * @param string $hash Хэш пароля для сравнения.
     * @return bool
     */
    public function check($password, $hash)
    {
        return password_verify($password, $hash);
    }
}
