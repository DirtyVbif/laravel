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
            'categories' => getCategoriesList(),
            'news' => getNewsList()
        ];

        return view('content/news/index', $data);
    }

    public function category($category = null)
    {
        if(is_null($category)) {
            $category = request()->segment(2);
        }
        $news = getCategoriesList($category);
        foreach($news['container'] as $id => &$item) {
            $item = [
                'title' => $item,
                'summary' => getArticleContent($category, $id),
                'id' => $id,
                'category' => $category
            ];
        }
        $data = [
            'title' => title('"' . $news['name'] . '" news'),
            'page_title' => 'Новости по теме "' . $news['name'] . '"',
            'news' => $news['container'],
            'category' => $category
        ];

        return view('content/news/category', $data);
    }

    public function article($category = null, $id = null)
    {
        if(is_null($category)) {
            $category = request()->segment(2);
        }
        if(is_null($id)) {
            $id = request()->segment(3);
        }
        $article = getCategoriesList($category, $id);
        $n = rand(2, 5);
        $size = $n < 4 ? 'long' : 'medium';
        $content = file_get_contents("https://loripsum.net/api/$n/$size");
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
