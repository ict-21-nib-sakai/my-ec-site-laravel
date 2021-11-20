<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table
                ->string('home_address', 255)
                ->nullable(false)
                ->default('')
                ->comment('自宅の住所')
                ->after('remember_token');

            $table
                ->boolean('suspended')
                ->nullable(false)
                ->default(false)
                ->comment('アカウントの一時停止')
                ->after('home_address');

            $table
                ->timestamp('deleted_at')
                ->nullable()
                ->comment('退会日時');

            $table->index('deleted_at');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('home_address');
            $table->dropColumn('suspended');
            $table->dropColumn('deleted_at');
        });
    }
};
