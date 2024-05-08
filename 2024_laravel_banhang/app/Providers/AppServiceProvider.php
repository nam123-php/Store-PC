<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $categories = [];
        $settingGlobal = [];
        $menuGlobal = [];
        try {
            Paginator::useBootstrap();
            $categories = Category::orderByDesc('id')->get();
            $settingGlobal = Setting::first();
            $menuGlobal = Menu::all();

        } catch ( \Exception $exception ) {

        }

        \View::share('categoriesGlobal', $categories);
        \View::share('menuGlobal', $menuGlobal);
        \View::share('settingGlobal', $settingGlobal);
    }
}
