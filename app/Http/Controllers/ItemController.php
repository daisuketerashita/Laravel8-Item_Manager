<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // 商品一覧の表示
    public function index()
    {
        $query = Item::query()->whereNull("deleted_at");
        $items = $query->get();
        
        return view('item.index',['items' => $items]);
    }

    // 商品登録ページ表示用
    public function create()
    {
        $categories = Category::all();

        return view('item.create', ["categories" => $categories]);
    }

    // 商品登録の実行
    public function store(Request $request)
    {
        $item = new Item();
        $item->fill($request->all());
        $item->save();

        return redirect("/item");
    }

    // 商品編集ページ
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();

        return view('item.edit',[
            'item' => $item,
            'categories' => $categories
        ]);
    }

    // 商品編集の実行
    public function update($id, Request $request)
    {
        $item = Item::find($id);

        $item->fill($request->all());
        $item->save();

        return redirect("/item");
    }

    // 商品削除の実行
    public function delete($id)
    {
        $item = Item::find($id);

        $date = date("Y-m-d H:i:s");
        $item->deleted_at = $date;
        $item->save();

        return redirect("/item");
    }
}
