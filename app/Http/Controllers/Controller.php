<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const TITLE_MASK = 'Laravel | %s';

    public function index()
    {
        $data = [
            'title' => title('Home Page'),
            'page_title' => 'Welcome, %username%',
            'news' => getNewsList(4)
        ];
        
        return view('content/welcome', $data);
    }

    public function indexAbout()
    {
        $data = [
            'title' => title('About Project'),
            'page_title' => 'About'
        ];
        
        return view('content/about', $data);
    }
}
