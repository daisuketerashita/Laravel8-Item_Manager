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

    // 在庫管理の処理
    public function stock($id,Request $request)
    {
        $item = Item::find($id);

        // $requestから入力された在庫数を取得
        $stock = $request->input('stock');
        // 入力が未入力 or 入力値が0以下の場合
        if (empty($stock) || $stock <= 0){
            // 処理を行わずにリダイレクト
            return redirect("/item");
        }

        // 入荷の場合
        if ($request->has("in")){
            $item->stock += $stock;
        // 出荷の場合    
        }elseif($request->has("out")){
            if ($item->stock >= $stock) {
                // 減算
                $item->stock -= $stock;
            }
        }

        $item->save();

        return redirect("/item");
    }
}
