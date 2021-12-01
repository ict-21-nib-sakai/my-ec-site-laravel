<?php

namespace App\Providers;

use App\Http\ViewComposers\EnumerateCategoryViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class EnumerateCategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        View::composer('*', EnumerateCategoryViewComposer::class);
    }
}
