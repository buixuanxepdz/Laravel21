<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;


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
        $min_price = Product::min('sale_price');
        $max_price = Product::max('sale_price');
        View::share([
            'menu'=>$menu,
            'priorities' => $priorities,
            'min_price' => $min_price,
            'max_price' => $max_price,
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

        // Validator::extend('phone', function($attribute, $value, $parameters)
        // {
        //     return substr($value, 0, 2) == '01';
        // });
    }
    
}
