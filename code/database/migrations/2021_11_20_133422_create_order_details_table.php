<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table
                ->unsignedBigInteger('order_id')
                ->nullable();

            $table
                ->unsignedBigInteger('item_id')
                ->nullable();

            $table
                ->string('item_name', 255)
                ->nullable(false)
                ->comment('注文した当時の商品名');

            $table
                ->string('item_maker', 255)
                ->nullable(false)
                ->comment('注文した当時のメーカー名');

            $table
                ->integer('item_unit_price')
                ->nullable(false)
                ->comment('注文した当時の単価');

            $table
                ->string('item_color', 255)
                ->nullable()
                ->comment('注文した当時の商品の色');

            $table
                ->integer('quantity')
                ->nullable(false)
                ->comment('注文した数量');

            $table
                ->timestamp('canceled_at')
                ->nullable()
                ->comment('キャンセル日時');

            $table
                ->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table
                ->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
