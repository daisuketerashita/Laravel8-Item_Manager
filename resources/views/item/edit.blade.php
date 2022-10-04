<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品編集ページ</title>
</head>
<body>
    <h1>商品編集ページ</h1>
    <form action="/item/edit/{{ $item->id }}" method="post">
        <div>
            <label>商品名</label>
        </div>
        <div>
            <input type="text" name="name" value="{{ $item->name }}" placeholder="商品名を入力">
        </div>
        <div>
            <label>価格</label>
        </div>
        <div>
            <input type="number" name="price" value="{{ $item->price }}" placeholder="価格を入力">
        </div>
        <div>
            {{ csrf_field() }}
            <input type="submit" name="send" value="編集する">
        </div>
        <div>
            <a href="/item">戻る</a>
        </div>
    </form>
</body>
</html>