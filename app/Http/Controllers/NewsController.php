<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = [
            'title' => title('News categories'),
            'page_title' => 'Новостные рубрики',
            'items' => getCategoriesList()
        ];

        return view('content/news/index', $data);
    }

    public function category()
    {
        $category = request()->segment(2);
        $news = getCategoriesList($category);
        foreach($news['container'] as &$item) {
            $summary = file_get_contents('https://loripsum.net/api/1/short');
            $summary = strlen($summary) > 200 ? substr($summary, 0, 197) . ' ...' : $summary;
            $item = [
                'title' => $item,
                'summary' => $summary
            ];
        }
        $data = [
            'title' => title('"' . $news['name'] . '" news'),
            'page_title' => 'Новости по теме "' . $news['name'] . '"',
            'items' => $news['container'],
            'category' => $category
        ];

        return view('content/news/category', $data);
    }

    public function article()
    {
        $category = request()->segment(2);
        $id = request()->segment(3);
        $article = getCategoriesList($category, $id);
        $content = file_get_contents('https://loripsum.net/api/3/medium');
        $data = [
            'title' => title('"' . $article . '" news'),
            'page_title' => $article,
            'content' => $content
        ];

        return view('content/news/article', $data);
    }

    public function indexPostRequest(Request $request)
    {
        dd($request->all());
    }

    public function create()
    {
        $data = [
            'title' => 'Add news',
            'page_title' => 'Добавить новость',
            'categories' => getCategoriesList()
        ];
        return view('content/news/create', $data);
    }
}
