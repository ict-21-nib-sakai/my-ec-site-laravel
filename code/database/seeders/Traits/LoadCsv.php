<?php

namespace Database\Seeders\Traits;

use SplFileObject;

trait LoadCsv
{
    private function loadCsv(string $file_abs_path): SplFileObject
    {
        $file = new SplFileObject($file_abs_path);

        $file->setFlags(
            SplFileObject::READ_CSV |
            SplFileObject::READ_AHEAD |
            SplFileObject::SKIP_EMPTY |
            SplFileObject::DROP_NEW_LINE
        );

        return $file;
    }
}
