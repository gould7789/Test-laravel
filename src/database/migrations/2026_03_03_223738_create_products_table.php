<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();                                                   // id (BIGINT, AUTO_INCREMENT, PRIMARY KEY)
            $table->string('name')->comment('商品名');                      // (VARCHAR 255)
            $table->text('description')->nullable()->comment('商品説明');   // (TEXT)
            $table->integer('price')->comment('価格');                      // (INT)
            $table->integer('stock')->default(0)->comment('在庫数');        //  (INT, デフォルト0)
            $table->boolean('is_published')->default(false)->comment('公開状態'); // (BOOLEAN)
            $table->timestamps();                                           // created_at, updated_at   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
