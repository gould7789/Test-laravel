<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, World!!';
});

// HTMLを返す
Route::get('/about', function () {
    return '<h1>会社概要</h1><p>私たちは素晴らしい会社です。</p>';
});

// ビューを返す
Route::get('/company', function () {
    return view('company');
});

// パラメーターを返す
Route::get('/user/{id}', function ($id) {
    return 'ユーザーID: ' . $id;
});

// 複数のパラメータを返す
Route::get('/post/{category}/{id}', function ($category, $id) {
    return "カテゴリ: {$category}, 記事ID: {$id}";
});

// オプションパラメータ
// パラメータが存在しない場合デフォルト値が入る
Route::get('/greeting/{name?}', function ($name = 'ゲスト') {
    return "こんにちは、{$name}さん";
});

// ルート名の定義
Route::get('/profile/user', function () {
    return 'プロフィールページ';
})->name('profile');

// パラメータ付きルート名
// ルートパラメータがある場合も、ルート名を使うことができる
Route::get('/user/{id}', function ($id) {
    return "ユーザーID: {$id}";
})->name('user.show');
