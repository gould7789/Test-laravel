<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // fillalbe: Product::create([...]) で一括代入できるカラムを指定するもの
    // セキュリティ対策として、明示的に許可したカラムだけ代入可能にする
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'is_published',
        'category_id'
    ];

    public function detail()
    {
        // hasOne(): 外部キーを持たない側が使う
        return $this->hasOne(ProductDetail::class);
    }

    // この商品に紐づくタグ（複数）
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // 定数
    const TAX_RATE_STANDARD = 0.1;   // 標準税率10%
    const TAX_RATE_REDUCED = 0.08;   // 軽減税率8%

    // カスタムメソッド
    public function isExpensive()
    {
        return $this->price >= 100000;
    }

    public function isInStock()
    {
        return $this->stock > 0;
    }

    public function getFormattedPrice()
    {
        return '¥' . number_format($this->price);
    }

    public function getPriceWithTax($taxRate = null)
    {
        $rate = $taxRate ?? self::TAX_RATE_STANDARD;
        $priceWithTax = $this->price * (1 + $rate);
        return '¥' . number_format($priceWithTax);
    }
}
