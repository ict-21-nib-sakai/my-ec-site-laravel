<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * categories (カテゴリ) テーブル
 */
return new class extends Migration {
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table
                ->string('name', 255)
                ->nullable(false)
                ->comment('カテゴリ名');

            $table
                ->boolean('suspended')
                ->nullable(false)
                ->default(false)
                ->comment('一時停止中のカテゴリか否か');

            $table
                ->integer('sequence')
                ->nullable(false)
                ->default(0)
                ->comment('並び順');

            $table->timestamps();
            $table->softDeletes();

            $table->index('suspended');
            $table->index('sequence');
            $table->index('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
