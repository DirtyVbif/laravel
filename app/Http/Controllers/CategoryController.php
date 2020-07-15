<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => title('Новостные категории'),
            'page_title' => 'Новостные категории',
            'categories' => Category::all(['entid as id', 'name', 'human_name as title'])
        ];

        return view('content/categories/index', $data);
    }
}
