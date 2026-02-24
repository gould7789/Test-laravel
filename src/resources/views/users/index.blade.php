<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Greeting</title>
</head>
<body>
    <!-- foreach -->
    <ul>
        @foreach ($users as $user)
            <li>{{ $user }}</li>
        @endforeach
    </ul>

    <!-- 配列が空の場合の処理 -->
    <ul>
        @forelse ($users as $user)
            <li>{{ $user }}</li>
        @empty
            <p>ユーザーがいません</p>
        @endforelse
    </ul>
</body>
</html>