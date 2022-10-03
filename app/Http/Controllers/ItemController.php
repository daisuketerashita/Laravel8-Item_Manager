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
    public function create()
    {
        // 処理を追加
    }

    // 商品登録の実行
    public function store(Request $request)
    {
        // 処理を追加
    }

    // 商品編集ページ
    public function edit($id)
    {
        // 処理を追加
    }

    // 商品編集の実行
    public function update($id, Request $request)
    {
        // 処理を追加
    }

    // 商品削除の実行
    public function delete($id)
    {
        // 処理を追加
    }
}
