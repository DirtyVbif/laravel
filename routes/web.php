<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
 *  home page
 */
Route::get('/', function() {
    return redirect()->route('home');
});

Route::get('/home', 'HomeController@index')
    ->name('home');

/*
 *  news pages
 */
Route::group(
    ['prefix' => 'news'],
    function() {
        Route::get('/', 'NewsController@index')
            ->name('news');

        Route::get('/category', 'CategoryController@index')
            ->name('news/categories');

        Route::get('/article/create', 'NewsController@createArticle')
            ->name('news/article/create');
        Route::post('/article/create', 'NewsController@postCreateArticle');

        Route::get('/category/create', 'Admin\CategoryController@create')
            ->name('news/category/create');
        Route::post('/category/create', 'Admin\CategoryController@store');

        Route::get('/category/{name}', 'NewsController@category')
            ->name('news/category');
            
        Route::get('/category/{category}/delete', 'Admin\CategoryController@destroy')
            ->name('news/category/delete');

        Route::get('/article/{id}', 'NewsController@showArticle')
            ->name('news/article');

        Route::get('/article/{news}/edit', 'NewsController@editArticle')
            ->name('news/article/edit');
        Route::post('/article/{news}/edit', 'NewsController@postEditArticle');

        Route::get('/article/{news}/delete', 'NewsController@deleteArticle')
            ->name('news/article/delete');
    }
);

/*
 *  user pages
 */
Route::group(
    ['prefix' => 'user'],
    function ()
    {
        Route::get('/', function() {
            return redirect()->route('user/login');
        })->name('user');

        Route::post('/', 'UserController@indexPostRequest');

        Route::get('/login', 'UserController@login')
            ->name('user/login');

        Route::get('/register', 'UserController@register')
            ->name('user/register');
    }
);

/*
 *  other pages
 */
Route::group(
    ['prefix' => 'about'],
    function () {
        Route::get('/', 'AboutController@index')
            ->name('about');

        Route::post('/', 'AboutController@indexPostRequest');
    }
);