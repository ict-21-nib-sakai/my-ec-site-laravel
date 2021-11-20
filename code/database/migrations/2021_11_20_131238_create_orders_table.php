<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table
                ->unsignedBigInteger('user_id')
                ->nullable();

            $table
                ->string('payment_method', 16)
                ->nullable(false)
                ->comment('お支払い方法');

            $table
                ->string('shipping_address_type', 16)
                ->nullable(false)
                ->comment('配送先の種類');

            $table
                ->string('shipping_address', 255)
                ->nullable(false)
                ->comment('配送先住所');

            $table
                ->string('user_name', 255)
                ->nullable(false)
                ->comment('配送先の氏名 (注文を請けた当時の名前を記録)');

            $table->timestamps();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->index('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
