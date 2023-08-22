<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Проверьте, авторизован ли пользователь как администратор.
        // Если нет, перенаправьте его на страницу входа или другую страницу по вашему выбору.
        if (!isLoggedInAsAdmin()) {
            return redirect()->to('/login'); // Здесь предполагается, что у вас есть страница входа.
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // После выполнения действия в контроллере (если это необходимо).
    }
}