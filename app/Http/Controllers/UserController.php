<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $date1 = new \DateTime($user->created_at);
        $date2 = new \DateTime(date('Y-m-d H:i:s'));
        $user->lifetime = $date1->diff($date2)->format('%a days');
        $data = [
            'title' => title(t('Profile page')),
            'page_title' => sprintf(t('Hello, %s'), $user->name),
            'user' => $user
        ];

        return view('content/auth/account', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('home')
            ->with('status', t('You have been logged out.'));
    }
}
