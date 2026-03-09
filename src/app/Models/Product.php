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
}
