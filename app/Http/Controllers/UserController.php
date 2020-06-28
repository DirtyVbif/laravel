<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        $data = [
            'title' => title('Login Page'),
            'page_title' => 'User Login Page'
        ];

        return view('content/user/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => title('Registration Page'),
            'page_title' => 'User Registration Page'
        ];

        return view('content/user/register', $data);
    }

    public function indexPostRequest(Request $request)
    {
        return dd($request->all());
    }
}
