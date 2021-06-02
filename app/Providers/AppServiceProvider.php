<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();
        $menu = ['tin tuc','the thao'];
        $priorities = [
            'Bình Thường' => 0,
            'Quan trọng' => 1,
            'Khẩn cấp' => 2
        ];
        View::share([
            'menu'=>$menu,
            'priorities' => $priorities
            ]);
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
