<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $temp = 123;
        return view('welcome_message');
    }
}
