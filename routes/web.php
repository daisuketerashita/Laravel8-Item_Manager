<?php

use App\Http\Controllers\ItemController;
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

Route::get('/', function () {
    return view('welcome');
});

// 商品一覧の表示
Route::get('item',[ItemController::class,'index']);

// 商品登録ページ
Route::get("item/create",[ItemController::class,'create']);

// 商品登録の実行
Route::post("item/create",[ItemController::class,'store']);

// 商品編集ページ
Route::get("item/edit/{id}",[ItemController::class,'edit']);

// 商品編集の実行
Route::post("item/edit/{id}",[ItemController::class,'update']);

// 商品削除の実行
Route::post("item/delete/{id}",[ItemController::class,'delete']);