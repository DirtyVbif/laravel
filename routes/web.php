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

Route::group(['middleware' => 'auth'], function () {
    // add logout method with GET request
    Route::get('/logout', 'UserController@logout')->name('logout');
    // administrative section fom moderators and admins
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'moderator'
        ], function () {
            Route::geT('/', 'Admin\AdminController')->name('structure');
            Route::resource('/category', Admin\CategoryController::class);
            Route::resource('/news', Admin\NewsController::class);
            Route::resource('/user', Admin\UserController::class);
    });    
    // user pages
    Route::group(
        ['prefix' => 'user'],
        function ()
        {
            Route::get('/', 'UserController@index')
                ->name('account');
        }
    );
});

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