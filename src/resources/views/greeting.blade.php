<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Greeting</title>
</head>
<body>
    <h1>こんにちは、{{ $name }}さん！</h1>
    <p>あなたは{{ $age }}歳ですね。</p>

    <!-- laraverの if文-->
    @if ($age >= 20)
        <p>成人です</p>
    @elseif ($age >= 13)
        <p>未成年です</p>
    @else
        <p>子供です</p>
    @endif
</body>
</html>