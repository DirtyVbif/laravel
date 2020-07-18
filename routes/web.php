<?php

use Illuminate\Support\Facades\Auth;
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

        Route::get('/category/{category}', 'CategoryController@show')
            ->name('news/category');

        Route::get('/article/{news}', 'NewsController@showArticle')
            ->name('news/article');
    }
);

Route::group(['prefix' => 'admin'], function () {
    Route::resource('/category', Admin\CategoryController::class);
    Route::resource('/news', Admin\NewsController::class);
});

/*
 *  user pages
 */
// Route::group(
//     ['prefix' => 'user'],
//     function ()
//     {
//         Route::get('/', function() {
//             return redirect()->route('user/login');
//         })->name('user');

//         Route::post('/', 'UserController@indexPostRequest');

//         Route::get('/login', 'UserController@login')
//             ->name('user/login');

//         Route::get('/register', 'UserController@register')
//             ->name('user/register');
//     }
// );

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

Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
