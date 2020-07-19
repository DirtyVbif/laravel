<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __invoke()
    {
        $data = [
            'title' => t('Site structure'),
            'page_title' => t('Site structure')
        ];
        
        return view('admin/structure', $data);
    }
}
