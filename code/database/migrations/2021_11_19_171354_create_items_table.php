<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * items (商品) テーブル
 */
return new class extends Migration {
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table
                ->string('name', 255)
                ->nullable(false)
                ->comment('商品名');

            $table
                ->string('maker', 255)
                ->nullable(false)
                ->comment('メーカー名');

            $table
                ->unsignedBigInteger('category_id')
                ->nullable(true);

            $table
                ->string('color', 255)
                ->nullable()
                ->comment('商品の色');

            $table
                ->integer('unit_price')
                ->nullable(false)
                ->comment('単価');

            $table
                ->integer('stock')
                ->nullable(false)
                ->comment('残り在庫数');

            $table
                ->boolean('recommended')
                ->nullable(false)
                ->default(false)
                ->comment('おすすめ商品');

            $table
                ->boolean('suspended')
                ->nullable(false)
                ->default(false)
                ->comment('取り扱い停止中');

            $table->timestamps();
            $table->softDeletes();

            $table
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->index('unit_price');
            $table->index('recommended');
            $table->index('suspended');
            $table->index('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
};
