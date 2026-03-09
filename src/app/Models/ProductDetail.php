<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'long_description',
        'manufacturer',
        'warranty_period'
    ];

    // この詳細情報が属する商品（1つ）
    public function product()
    {
        // belongsTo(): 外部キー（product_id）を持つ側が使う
        return $this->belongsTo(Product::class);
    }
}
