<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Entity;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = [
      'title' => '',
      'page_header' => '',
      'categories' => Category::all()
    ];

    return view('admin/categories/list', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $data = [
      'title' => 'Форма добавления новости на сайт',
      'page_title' => 'Добавить новую категорию',
      'form' => (object)[
        'action' => 'create',
        'url' => "/admin/category",
        'method' => 'POST'
      ]

    ];

    return view('admin/categories/form', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CategoryRequest $request)
  {
    Category::new($request->validated());
    return redirect('/admin/category');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    $data = [
      'title' => "Форма редактирования категории \"{$category->human_name}\"",
      'page_title' => "Редактирование категории \"{$category->human_name}\"",
      'form' => (object)[
        'action' => 'edit',
        'url' => "/admin/category/{$category->name}",
        'method' => 'PUT'
      ],
      'category' => $category
    ];

    return view('admin/categories/form', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(CategoryRequest $request, Category $category)
  {
    $category->update($request->validated());
    return redirect('/admin/category');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    $entity = Entity::find($category->entid);
    $entity->delete();
    return redirect('/admin/category');
  }
}
