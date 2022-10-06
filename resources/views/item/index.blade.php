<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <!-- View ごとに利用ページの項目を記述 -->
    <title>商品一覧表示ページ</title>
</head>

<body>
    <h1>商品一覧表示ページ</h1>
    <div>
        <a href="/item/create">新規登録</a>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>カテゴリー</th>
                    <th>
                        <!-- 入出荷ボタン -->
                    </th>
                    <th>
                        <!-- 編集ボタン -->
                    </th>
                    <th>
                        <!-- 削除ボタン -->
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price) }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>
                            <form action="/item/stock/{{ $item->id }}" method="post">
                                {{ csrf_field() }}
                                <input type="number" name="stock">
                                <input type="submit" value="入荷" name="in">
                                <input type="submit" value="出荷" name="out">
                            </form>
                        </td>
                        <td>
                            <form action="/item/edit/<?php echo $item->id; ?>" method="get">
                                <input type="submit" value="編集">
                            </form>
                        </td>
                        <td>
                            <form action="/item/delete/<?php echo $item->id; ?>" method="post">
                                <!-- POST通信のため、csrf_field()用意しておきましょう -->
                                {{ csrf_field() }}
                                <input type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>