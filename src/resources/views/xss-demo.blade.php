<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XSS攻撃デモ</title>
    <style>
        .danger { border: 3px solid red; padding: 20px; margin: 20px; background: #ffe0e0 }
        .safe { border: 3px solid green; padding: 20px; margin: 20px; background: #ffe0e0 }
    </style>
</head>
<body>
    <h1>XSS攻撃デモ</h1>

    <div class="danger">
        <!-- アラートが表示される（JavaScriptが実行された） -->
        <h2>エスケープしない場合</h2>
        <p>コメント: {!! $comment !!}</p>
    </div>

    <div class="safe">
        <!-- 「こんにちは<script>alert("XSS攻撃成功！")</script>」と文字列として表示される -->
        <h2>エスケープする場合</h2>
        <p>コメント: {{ $comment }}</p>
    </div>
</body>
</html>