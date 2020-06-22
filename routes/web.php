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

Route::get('/news', 'Controller@indexNews')
    ->name('news');

Route::get('/about', 'Controller@indexAbout')
    ->name('about');
