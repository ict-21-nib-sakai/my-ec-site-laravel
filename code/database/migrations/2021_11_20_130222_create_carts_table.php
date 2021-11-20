<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table
                ->unsignedBigInteger('user_id')
                ->nullable();

            $table
                ->unsignedBigInteger('item_id')
                ->nullable();

            $table
                ->integer('quantity')
                ->nullable(false)
                ->comment('数量');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table
                ->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->timestamps();

            $table->unique(['user_id', 'item_id']);
            $table->index(['user_id', 'created_at']);
            $table->index(['user_id', 'updated_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
