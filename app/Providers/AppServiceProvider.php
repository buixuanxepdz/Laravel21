<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        $menu = ['tin tuc','the thao'];
        View::share('menu',$menu);
        // $list = [
        //     [
        //         'name' => 'Học View trong Laravel',
        //         'status' => 0
        //     ],
        //     [
        //         'name' => 'Học Route trong Laravel',
        //         'status' => 1
        //     ],
        //     [
        //         'name' => 'Làm bài tập View trong Laravel',
        //         'status' => -1
        //     ],
        // ];
        // View::share('list',$list);
    }
}
