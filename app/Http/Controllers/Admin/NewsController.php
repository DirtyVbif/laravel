<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsArticleRequest;
use App\Models\Category;
use App\Models\Entity;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
          'title' => t('Articles list of type "News"'),
          'page_title' => t('Articles list of type "News"'),
          'news' => News::all()
        ];
    
        return view('admin/news/list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => t('Add news webform'),
            'page_title' => t('Add news'),
            'categories' => Category::all(),
            'form' => (object)[
                'action' => 'create',
                'url' => "/admin/news",
                'method' => 'POST'
            ]

        ];
        return view('admin/news/form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsArticleRequest $request)
    {
        News::new($request->validated());
        return redirect('/admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $data = [
            'title' => t('Edit news webform'),
            'page_title' => sprintf(t('Edit news "%s"'), $news->title),
            'categories' => Category::all(),
            'form' => (object)[
                'action' => 'edit',
                'url' => "/admin/news/{$news->entid}",
                'method' => 'PUT'
            ],
            'article' => $news->categoriesToString()
        ];
        
        return view('admin/news/form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsArticleRequest $request, News $news)
    {
        $news->updateCategories($news->entid, $request->input('categories'));
        $news->update($request->validated());
        return redirect()->route('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $entity = Entity::find($news->entid);
        $entity->delete();
        return redirect()->route('news');
    }
}
