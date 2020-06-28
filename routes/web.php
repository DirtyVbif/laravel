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

Route::get('/home', 'Controller@index')
    ->name('home');

/*
 *  news pages
 */
Route::group(
    ['prefix' => 'news'],
    function() {
        Route::get('/', 'NewsController@index')
            ->name('news');
        
        Route::post('/', 'NewsController@indexPostRequest');

        Route::get('/create', 'NewsController@create')
            ->name('news/create');

        Route::get('/{category}', 'NewsController@category')
            ->name('news/category');

        Route::get('/{category}/{id}', 'NewsController@article')
            ->name('news/article');
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
        })
        ->name('user');
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
Route::get('/about', 'Controller@indexAbout')
    ->name('about');