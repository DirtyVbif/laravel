<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsCreateArticleRequest;
use App\NewsModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $News = new NewsModel();
        $data = [
            'title' => title('Новости'),
            'page_title' => 'Новости',
            'categories' => $News->getCategoriesList(),
            'news' => $News->getNewsList()
        ];

        return view('content/news/index', $data);
    }

    public function category($name = null)
    {
        if(is_null($name)) {
            $name = request()->segment(3);
        }

        $News = new NewsModel();
        $category = $News->getCategoryInfo($name);
        $data = [
            'title' => title('Категория "' . $category->title . '"'),
            'page_title' => 'Новости по теме "' . $category->title . '"',
            'news' => $News->getCategoryNewsList($category->id)
        ];

        return view('content/news/category', $data);
    }

    public function article($id = null)
    {
        if(is_null($id)) {
            $id = request()->segment(3);
        }

        $News = new NewsModel();
        $article = $News->getArticleContent($id);
        $data = [
            'title' => title($article->title, false),
            'page_title' => $article->title,
            'article' => $article,
            'categories' => $News->getArticleCategories($id)
        ];

        return view('content/news/article', $data);
    }

    public function indexPostRequest(NewsCreateArticleRequest $request)
    {
        $News = new NewsModel();
        $News->createArticle($request->validated());
        return redirect()->route('news');
    }

    public function create()
    {
        $News = new NewsModel();
        $data = [
            'title' => 'Форма добавления новости на сайт',
            'page_title' => 'Добавить новость',
            'categories' => $News->getCategoriesList()

        ];
        return view('content/news/create', $data);
    }
}
