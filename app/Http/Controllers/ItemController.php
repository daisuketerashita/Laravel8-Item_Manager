<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    // 商品一覧の表示
    public function index()
    {
        echo "<h1>ここに処理を追加します</h1>";
    }

    // 商品登録ページ表示用
    public function torokuPage()
    {
        // 処理を追加
    }

    // 商品登録の実行
    public function toroku(Request $request)
    {
        // 処理を追加
    }

    // 商品編集ページ
    public function henshuPage($id)
    {
        // 処理を追加
    }

    // 商品編集の実行
    public function henshu($id, Request $request)
    {
        // 処理を追加
    }

    // 商品削除の実行
    public function sakujo($id)
    {
        // 処理を追加
    }
}
