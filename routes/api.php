<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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

//開発中...
// ユーザー登録
Route::post('/register', [RegisterController::class, 'register']);
// ログイン
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    //ログアウト
    Route::post('/logout', LogoutController::class)->middleware('auth:sanctum');

    //Event crud
    Route::post('event/event-get',[App\Http\Controllers\EventController::class,'eventGet']);
    Route::resource('event',App\Http\Controllers\EventController::class)->only(['store','show','update','destroy']);
});

