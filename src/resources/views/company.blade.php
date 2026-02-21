<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>カンパニーページです。</h2>
    <a href="/profile">プロフィール</a>
    <a href="{{ route('profile') }}">プロフィールルート</a>

    <h2>ユーザーID</h2>
    <a href="{{ route('user.show', ['id'=>1]) }}">ユーザー1</a>
    <a href="{{ route('user.show', ['id'=>100]) }}">ユーザー100</a>

    <h2>ルートグループ</h2>
    <a href="{{ route('admin.dashboard') }}">ダッシュボード</a>
    <a href="{{ route('admin.users') }}">ユーザー管理</a>
</body>
</html>