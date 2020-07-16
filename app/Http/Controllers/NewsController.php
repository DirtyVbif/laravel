<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = [
            'title' => title('Новости'),
            'page_title' => 'Новости',
            'news' => News::all()
        ];

        return view('content/news/index', $data);
    }

    public function showArticle(News $news)
    {
        $data = [
            'title' => title($news->title, false),
            'page_title' => $news->title,
            'article' => $news,
            'categories' => $news->categories
        ];
        
        return view('content/news/article', $data);
    }
}
