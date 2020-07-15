<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsCreateArticleRequest;
use App\Http\Requests\NewsCreateCategoryRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $News = new News();
        $data = [
            'title' => title('Новости'),
            'page_title' => 'Новости',
            'news' => $News->getNewsList()
        ];

        return view('content/news/index', $data);
    }

    public function category($name = null)
    {
        if(is_null($name)) {
            $name = request()->segment(3);
        }

        $Categories = new Category();
        $category = $Categories->getCategoryInfo($name);
        $data = [
            'title' => title('Категория "' . $category->title . '"'),
            'page_title' => 'Новости по теме "' . $category->title . '"',
            'news' => $Categories->getCategoryNewsList($category->id)
        ];

        return view('content/news/category', $data);
    }

    public function showArticle(int $id = null)
    {
        if(is_null($id)) {
            $id = request()->segment(3);
        }

        $News = new News();
        $article = $News->getArticleContent($id);
        $data = [
            'title' => title($article->title, false),
            'page_title' => $article->title,
            'article' => $article,
            'categories' => $News->getArticleCategories($id)
        ];

        return view('content/news/article', $data);
    }

    public function postCreateArticle(NewsCreateArticleRequest $request)
    {
        $News = new News();
        $News->add($request->validated(), $request->input('categories'));
        return redirect()->route('news');
    }

    public function createArticle()
    {
        $Category = new Category();
        $data = [
            'title' => 'Форма добавления новости на сайт',
            'page_title' => 'Добавить новость',
            'categories' => $Category->getCategoriesList()

        ];
        return view('content/news/create', $data);
    }

    public function editArticle(News $news)
    {
        $category = new Category();
        $article = $news->getArticle($news->entid);
        $data = [
            'title' => "Редактирование новости \"{$article->title}\"",
            'page_title' => "Редактирование новости \"{$article->title}\"",
            'categories' => $category->getCategoriesList(),
            'article' => $article
        ];
        return view('content/news/edit', $data);
    }

    public function postEditArticle(NewsCreateArticleRequest $request, News $news)
    {
        $categories = $request->input('categories');
        $news->updateCategories($news->entid, $categories);
        $news->fill([
            'title' => $request->input('title'),
            'summary' => $request->input('summary'),
            'content' => $request->input('content')
        ]);
        $news->save();

        return redirect()->route('news/article', ['id' => $news->entid]);
    }

    public function deleteArticle(News $news)
    {
        $news->delete();
        return redirect()->route('news');
    }
}
