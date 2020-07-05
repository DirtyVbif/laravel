<?php

use App\Http\Controllers\AboutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\json_decode;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/feedbacks', function () {
    $file = storage_path(AboutController::FEEDBACK_FILE);
    if(!file_exists($file)) {
        return json_encode(['respone' => 'no data']);
    }
    return file_get_contents($file);
});