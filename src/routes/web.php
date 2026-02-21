<?php

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
