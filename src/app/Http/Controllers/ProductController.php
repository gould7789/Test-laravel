<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 商品一覧表示
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'ノートパソコン', 'price' => 120000],
            ['id' => 2, 'name' => 'マウス', 'price' => 3000],
            ['id' => 3, 'name' => 'キーボード', 'price' => 8000],
        ];

        return view('products.index', compact('products'));
    }

    // 商品詳細を表示
    public function show($id)
    {
        $products = [
            1 => ['id' => 1, 'name' => 'ノートPC', 'price' => 120000, 'description' => '高性能なノートパソコンです'],
            2 => ['id' => 2, 'name' => 'マウス', 'price' => 3000, 'description' => 'ワイヤレスマウスです'],
            3 => ['id' => 3, 'name' => 'キーボード', 'price' => 8000, 'description' => 'メカニカルキーボードです'],
        ];

        // 指定されたIDの商品を取得（存在しない場合はnull）
        $products = $products[$id] ?? null;

        // 商品が見つからない場合は404エラー
        if (!$products) {
            abort(404, '商品が見つかりません');
        }

        return view('products.show', compact('products'));
    }

    // 商品同録フォームを表示
    public function create()
    {
        return view('products.create');
    }

    // フォームから送信されたデータを処理
    public function store(Request $request)
    {
        // 送信されたデータを取得
        // $name = $request->input('name');
        // $price = $request->input('price');
        // $description = $request->input('description');

        // // 今回は画面に表示するだけ
        // return "商品「{$name}」 (価格: " . number_format($price) . "円) を受け取りました！説明: {$description}";

        // フォームデータを確認
        //  dd($request->all()) を追加してフォーム送信すると、
        // どんなデータが送られてきたか確認できます。デバッグに便利！
        // dd($request->all());

        // 出力例:
        // [
        //   "name" => "ノートPC"
        //   "price" => "80000"
        //   "description" => "高性能なノートパソコン"
        // ]

        // バリデーション（入力チェック）
        // 第2引数のカスタムメッセージは、Laravel-langパッケージを使えば省略できます
        $validated = $request->validate([
            'name' => 'required|max:100',
            'price' => 'required|integer|min:0|max:10000000',
            'description' => 'required|max:500',
        ], [
            // カスタムメッセージ（学習用に明示的に記述）
            // Laravel-langを使う場合は、この配列を省略して自動翻訳されたメッセージを使えます
            'name.required' => '商品名は必須です',
            'name.max' => '商品名は100文字以内で入力してください',
            'price.required' => '価格は必須です',
            'price.integer' => '価格は整数で入力してください',
            'price.min' => '価格は0円以上で入力してください',
            'price.max' => '価格は1000万円以下で入力してください',
            'description.required' => '説明は必須です',
            'description.max' => '説明は500文字以内で入力してください',
        ]);

        // ここでは実際の保存処理は行わない

        // 商品一覧ページにリダイレクトし、成功メッセージを表示
        return redirect('/products')
            // with: 次のページに一時的なメッセージを送る（セッションに保存、1回のみ表示）
            ->with('success', "商品「{$validated['name']}」を登録しました！");

        // よくあるリダイレクト

        // // URLでリダイレクト
        // return redirect('/products');

        // // ルート名でリダイレクト（推奨）
        // return redirect()->route('products.index');

        // // 一つ前のページに戻る
        // return back();

        // // 複数のメッセージを送る
        // return redirect('/products')
        //     ->with('success', '登録しました')
        //     ->with('info', '確認メールを送信しました');

        // // エラーメッセージを送る
        // return redirect('/products')
        //     ->with('error', '処理に失敗しました');
    }
}
