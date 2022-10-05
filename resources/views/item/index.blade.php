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
                    <th>カテゴリー</th>
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
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->name; ?></td>
                        <td><?php echo number_format($item->price); ?></td>
                        <td><?php echo $item->category->name; ?></td>
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