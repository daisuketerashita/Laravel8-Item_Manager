<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品新規登録ページ</title>
</head>

<body>
    <h1>商品新規登録ページ</h1>
    <form action="/item/create" method="post">
        <div>
            <label>商品名</label>
        </div>
        <div>
            <input type="text" name="name" placeholder="商品名を入力してください">
        </div>
        <div>
            <label>価格</label>
        </div>
        <div>
            <!-- 価格はnumberに -->
            <input type="number" name="price" placeholder="価格を入力してください">
        </div>
        <div>
            <!-- POST通信なのでcsrf_field()を用意 -->
            {{ csrf_field() }}
            <input type="submit" name="send" value="登録する">
        </div>
        <div>
            <!-- 一覧に戻る -->
            <a href="/item">戻る</a>
        </div>
    </form>
</body>

</html>