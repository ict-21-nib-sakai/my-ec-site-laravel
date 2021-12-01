<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

/**
 * すべてのビューに「カテゴリ一覧」を渡す
 */
class EnumerateCategoryViewComposer
{
    public function compose(View $view)
    {
        $categories = Category::query()
            ->orderBy('sequence')
            ->get();

        $view->with('categories', $categories);
    }
}
