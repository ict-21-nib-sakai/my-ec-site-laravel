<?php

namespace Database\Seeders;

use App\Models;
use Database\Seeders\Traits;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    use Traits\LoadCsv;

    private const CSV_FILE_NAME = 'category.csv';

    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        /** アプリケーションの実行環境 */
        $app_env = config('app.env');

        if (!in_array($app_env, ['testing', 'local', 'staging', 'production'])) {
            throw new Exception('アプリケーションの実行環境が不明です。');
        }

        // レコードをすべて消去
        Schema::disableForeignKeyConstraints();
        Models\Category::truncate();
        Schema::enableForeignKeyConstraints();

        // CSV ファイルを読み込み
        $file = $this->loadCsv(
            database_path(
                sprintf('%s/%s/%s', 'seeders', $app_env, self::CSV_FILE_NAME)
            )
        );

        /* @var string[] DBテーブルのカラム名 */
        $columns = [];

        foreach ($file as $row_num => $line_values) {
            /* @var string[] $line_values */

            // CSVファイルの1行目はDBテーブルのカラム名
            if (0 === $row_num) {
                $columns = $line_values;
                continue;
            }

            // 空の文字列 '' を null に置換する
            $line_values = array_map(
                fn($v) => ($v === '' ? null : $v),
                $line_values
            );

            Models\Category::create(
                array_combine($columns, $line_values)
            );
        }
    }
}
