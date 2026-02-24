<!-- 「layouts/app.blade.phpを親として使います」という宣言 -->
<!-- 必ず1行目に書く -->
@extends('layouts.app')

<!-- 「親のyield('title')に『会社概要』を入れます」 -->
<!-- 短い内容は1行で書ける -->
@section('title', '会社概要')   

<!-- 「親のyield('content')にこの内容を入れます」 -->
<!-- 複数行の内容はendsectionで閉じる -->
@section('content')
    <h2>会社概要</h2>
    <p>会社名: 株式会社サンプル</p>
    <p>設立: 2020年1月1日</p>
@endsection