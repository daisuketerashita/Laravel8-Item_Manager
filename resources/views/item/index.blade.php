<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <!-- View ごとに利用ページの項目を記述 -->
    <title>商品一覧表示ページ</title>
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <h1 class="header">商品管理システム</h1>
    <div class="main">
        <nav class="side-menu">
            <ul class="menu-list">
                <a href="/item">
                    <li>商品一覧</li>
                </a>
                <a href="/item/create">
                    <li>商品新規登録</li>
                </a>
            </ul>
        </nav>
        <div class="contents">
            <h1>商品一覧表示ページ</h1>
            <table class="tbl">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>カテゴリー</th>
                        <th class="tbl-stock"></th>
                        <th></th>
                        <th></th>
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
                                    <input type="number" name="stock" class="tbl-form">
                                    <input type="submit" value="入荷" name="in" class="tbl-stock-btn">
                                    <input type="submit" value="出荷" name="out" class="tbl-stock-btn">
                                </form>
                            </td>
                            <td>
                                <form action="/item/edit/<?php echo $item->id; ?>" method="get">
                                    <input type="submit" value="編集" class="tbl-btn">
                                </form>
                            </td>
                            <td>
                                <form action="/item/delete/<?php echo $item->id; ?>" method="post">
                                    {{ csrf_field() }}
                                    <input type="submit" value="削除" class="tbl-btn">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>