<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// 普通のルート
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!!';
});

// 1. HTMLを返す
Route::get('/about', function () {
    return '<h1>会社概要</h1><p>私たちは素晴らしい会社です。</p>';
});

// 2. ビューを返す
Route::get('/company', function () {
    return view('company');
});

// 3. パラメーターを返す
Route::get('/user/{id}', function ($id) {
    return 'ユーザーID: ' . $id;
});

// 4. 複数のパラメータを返す
Route::get('/post/{category}/{id}', function ($category, $id) {
    return "カテゴリ: {$category}, 記事ID: {$id}";
});

// 5. オプションパラメータ
// パラメータが存在しない場合デフォルト値が入る
Route::get('/greeting/{name?}', function ($name = 'ゲスト') {
    return "こんにちは、{$name}さん";
});

// 6. ルート名の定義
Route::get('/profile/user', function () {
    return 'プロフィールページ';
})->name('profile');

// 7. パラメータ付きルート名
// ルートパラメータがある場合も、ルート名を使うことができる
Route::get('/user/{id}', function ($id) {
    return "ユーザーID: {$id}";
})->name('user.show');

// 8. ルートグループ
// 複数のルートに共通の設定を適用したい場合、ルートグループを使うと便利

// プレフィックス（prefix）でURLをまとめる
// /admin を何度も書く必要がなく、後から変更も容易
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return '管理画面ダッシュボード';
    });
    Route::get('/users', function () {
        return 'ユーザー管理';
    });
    Route::get('/posts', function () {
        return "記事管理";
    });
});

// ルート名にプレフィックスを付ける
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return '管理画面ダッシュボード';
    })->name('dashboard');

    Route::get('/users', function () {
        return 'ユーザー管理';
    })->name('users');
});

// ------------------------------

// 1. ルートからビューを返す
Route::get('/hello', function () {
    return view('hello');
});

// 2. ビューにデータを渡す
// ビューに変数を渡して、動的な内容を表示することができる

// 2-1. 第2引数に配列で渡す
Route::get('/greeting', function () {
    return view('greeting', ['name' => '太郎']);
});

// 2-2. with()メソッドを使う
Route::get('/greeting', function () {
    return view('greeting')->with('name', '佐藤');
});

// 2-3. compact()を使う
// 複数の変数を渡す場合は、compact() が便利
Route::get('/greeting', function () {
    $name = '鈴木';
    $age = 25;

    return view('greeting', compact('name', 'age'));
});

// XSS攻撃の実例 - 実際に試してみよう
// {!! !!} がなぜ危険なのか？
Route::get('/xss-demo', function () {
    // 攻撃者が入力したコメント(本来はフォームから受け取る)
    $comment = 'こんにちは<script>alert("XSS攻撃成功")</script>';

    // 例1: 画像タグで攻撃
    // $comment = '<img src=x onerror="alert(\'画像でも攻撃できる\')">';

    // 例2: ページを改ざん
    // $comment = '<script>document.body.innerHTML = "<h1>乗っ取られました</h1>"</script>';

    // 例3: 普通のHTML（安全な使い方）
    // $comment = '<strong>太字</strong>のテキスト';

    return view('xss-demo', compact('comment'));
});

// 繰り返し処理
// Route::get('/users', function () {
//     $users = ['太郎', '花子', '次郎'];

//     return view('users', compact('users'));
// });

// レイアウトの共通化
Route::get('/layout/app', function () {
    return view('layouts.app');
});

Route::get('/layout/home', function () {
    return view('pages.home');
});

Route::get('/layout/about', function () {
    return view('pages.about');
});

Route::get('/layout/contact', function () {
    return view('pages.contact');
});

// コンポーネントの利用
Route::get('/component-demo', function () {
    return view('component-demo');
});

// -------------------------

// ルートからコントローラを呼び出す
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
