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
            'categories' => Category::all()
        ];

        return view('content/categories/index', $data);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = [
            'title' => title('Категория "' . $category->human_name . '"'),
            'page_title' => 'Новости по теме "' . $category->human_name . '"',
            'category' => $category
        ];

        return view('content/news/category', $data);
    }
}
