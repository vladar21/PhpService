<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Logic for the dashboard
        // Fetch user data, perform calculations, etc.
        // Load necessary views and pass data to them
        
        // Example: Load a view called dashboard_view.php
//        phpinfo();
        ;
        $data['users'][] = [
            'id' => 1,
            'name' => 'John',
            'email' => 'example1@example.ir',
            'role' => 3 // users
        ];
        return view('dashboard_view', $data);
    }
}
