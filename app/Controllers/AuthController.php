<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login'); // Представление для формы логина
    }

    public function register()
    {
        return view('auth/register'); // Представление для формы регистрации
    }

    public function processRegister()
    {
        // Проверка и валидация данных
        $validationRules = [
            'username' => 'required|alpha_numeric|min_length[3]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
        ];

        if (!$this->validate($validationRules)) {
            // Возвращаем ошибку в случае недопустимых данных
            return $this->response->setJSON(['error' => $this->validator->getErrors()]);
        }

        // Получение данных из POST-запроса
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Хэширование пароля
        $passwordHash = service('passwordhash');
        $hashedPassword = $passwordHash->hash($password);

        // Сохранение пользователя
        $userModel = new UserModel();
        $userModel->save([
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
        ]);

        // Возвращаем успешный ответ
        return $this->response->setJSON(['message' => 'Registration successful']);
    }

    public function processLogin()
    {
        // Получение данных из POST-запроса
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Поиск пользователя по email
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            // Пользователь не найден
            return $this->response->setJSON(['error' => 'User not found']);
        }

        // Проверка пароля
        $passwordHash = service('passwordhash');
        if (!$passwordHash->check($password, $user['password'])) {
            // Неправильный пароль
            return $this->response->setJSON(['error' => 'Invalid password']);
        }

        // Вход выполнен успешно
        // В этом месте вы можете создать сессию пользователя или выпустить токен авторизации.

        return $this->response->setJSON(['message' => 'Login successful']);
    }


    public function logout()
    {
        // Обработка выхода пользователя
    }
}
