<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
// use \App\Http\Controllers\TaskController;
// use \App\Http\Controllers\Task\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::prefix('task')->group(function () {
//     // Route::get('/', function () {
//     //     return view('tasks.index');
//     // });

//     //Route::get('/index2',[TaskController::class, 'index2'])->name('task.index2');
//     Route::get('/', 'TaskController@index2')->name('task.index2');
 
//     //Route::get('/edit/{id}',[TaskController::class, 'edit'])->name('task.edit');
//     Route::get('/edit/{id}', 'TaskController@edit')->name('task.edit');
 
//     Route::get('/complete/{id}', function ($id) {
//         echo 'complete task id = '.$id;
//     })->name('task.complete');
 
//     Route::get('/reset/{id}', function ($id) {
//         echo 'reset task id = '.$id;
//     })->name('task.reset');
 
//     //Route::get('/create',  [TaskController::class, 'create'])->name('task.create');
//     Route::delete('/create/', 'TaskController@create')->name('task.create');

//     //Route::delete('/delete/{id}',[TaskController::class, 'destroy'])->name('task.delete');
//     Route::delete('/delete/{task}', 'TaskController@destroy')->name('task.destroy');
//  });
 
// Route::resource('task', 'Frontend\TaskController');
Route::prefix('task')->group(function () {
    // Route::get('/', function () {
    //     return view('tasks.index');
    // });

    //Route::get('/index2',[TaskController::class, 'index2'])->name('task.index2');
    Route::get('/', 'Frontend\TaskController@index')->name('task.index2');
 
    //Route::get('/edit/{id}',[TaskController::class, 'edit'])->name('task.edit');
    Route::get('/edit/{id}', 'Frontend\TaskController@edit')->name('task.edit');

    Route::match(['put','patch'], 'task/{id}', 'Frontend\TaskController@update')->name('task.update');
 
    Route::get('/complete/{id}','Frontend\TaskController@complete')->name('task.complete');
    Route::get('/recomplete/{id}','Frontend\TaskController@reComplete')->name('task.recomplete');
    Route::get('/show/{id}','Frontend\TaskController@show')->name('task.show');
 
    Route::get('/reset/{id}','Frontend\TaskController@reComplete')->name('task.reset');
 
    //Route::get('/create',  [TaskController::class, 'create'])->name('task.create');
    Route::get('/create', 'Frontend\TaskController@create')->name('task.create');

    //Route::delete('/delete/{id}',[TaskController::class, 'destroy'])->name('task.delete');
    Route::delete('/delete/{id}', 'Frontend\TaskController@destroy')->name('task.destroy');
    Route::post('/', 'Frontend\TaskController@store')->name('task.store');
 });
//  Route::get('/user/{id}/post/{post}', function($id, $idPost) {
//      return "This is post $idPost of user $id"; 
//  });
 
//  Route::get('user/{id?}', function($id = null) {
//      if ($id == null) {
//          return 'List users';
//      }
     
//      return "User $id";
//  });
 
//  Route::post('/create', function () {
//      echo 'create task';
//  });

//  Route::get('/hello1', function () {
//     return view('hello1');
// });

// Route::get('/hello2', function () {
//     // return view('hello2',[
//     //     'fullname' => 'Bui Xuan Xep',
//     //     'year' => 2001,
//     //     'school' => 'VNUA',
//     //     'object' => 'Hoc de di lam'
//     // ]);

//      return view('hello2')->with([
//         'fullname' => 'Bui Xuan Xep',
//         'year' => 2001,
//         'school' => 'VNUA',
//         'object' => 'Hoc de di lam',
//         'records' => 2
//     ]);
// });

// Route::get('/profile',function(){
//     return view('Unit3.profile')->with([
//         'fullname' => 'Bui Xuan Xep',
//         'year' => 2001,
//         'school' => 'VNUA',
//         'object' => 'Hoc de di lam',
//         'country' => 'Phu Xuyen'
//     ]);
// });

Route::get('/list',function(){
    $list = [
            [
                'name' => 'Học View trong Laravel',
                'status' => 0
            ],
            [
                'name' => 'Học Route trong Laravel',
                'status' => 1
            ],
            [
                'name' => 'Làm bài tập View trong Laravel',
                'status' => -1
            ],
        ];
    return view('Unit3.list',compact(['list']));
});

// Route::get('/home',function(){
//     return view('Unit3.home');
// });

//login
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login.form');
Route::post('admin/login', 'Auth\LoginController@login')->name('login.store');
Route::get('admin/logout', 'Auth\LogoutController@logout')->name('logout')->middleware('auth');
Route::get('admin/register', 'Auth\RegisterController@showForm')->name('register.form');
Route::post('admin/register', 'Auth\RegisterController@register')->name('register.post');

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
    'middleware' => ['auth','checkadmin']
], function (){
    // Trang dashboard - trang chủ admin
    Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
    //Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'ProductController@index')->name('backend.product.index');
        Route::get('/create', 'ProductController@create')->name('backend.product.create');
        Route::post('/store', 'ProductController@store')->name('backend.product.store');
        Route::get('/edit/{product}', 'ProductController@edit')->name('backend.product.edit');
        Route::post('/update/{id}', 'ProductController@update')->name('backend.product.update');
        Route::get('/show/{id}', 'ProductController@showImages')->name('backend.product.showImage');
        Route::get('/showOrder/{order_id}', 'OrderController@showProducts')->name('backend.product.showOrder');
        Route::delete('/delete/{product}', 'ProductController@destroy')->name('backend.product.destroy');
        Route::get('/search','ProductController@search')->name('backend.product.search');
        Route::get('/filter','ProductController@filterProduct')->name('backend.product.filter');
        Route::post('/autocomplete-ajax','Product@autocomplete_ajax')->name('backend.product.searchauto');
     });

    //Quản lý người dùng
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
        Route::post('/store', 'UserController@store')->name('backend.user.store');
        Route::get('/edit/{user_id}', 'UserController@edit')->name('backend.user.edit');
        Route::get('/show/{user_id}', 'UserController@showProducts')->name('backend.user.showProduct');
        Route::post('/update/{id}', 'UserController@update')->name('backend.user.update');
        Route::delete('/delete/{user}', 'UserController@destroy')->name('backend.user.destroy');
        Route::get('/editprofile/{id}', 'UserController@editprofile')->name('backend.user.editprofile');
        Route::post('/editprofile/{id}', 'UserController@updateprofile')->name('backend.user.updateprofile');
    });
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'CategoryController@index')->name('backend.category.index');
        Route::get('/create', 'CategoryController@create')->name('backend.category.create');
        Route::post('/store', 'CategoryController@store')->name('backend.category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('backend.category.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('backend.category.update');
        Route::get('/show/{category_id}', 'CategoryController@showProducts')->name('backend.category.showProduct');
        Route::delete('/delete/{category}', 'CategoryController@destroy')->name('backend.category.destroy');
    });
    Route::group(['prefix' => 'brands'], function(){
        Route::get('/', 'BrandController@index')->name('backend.brand.index');
        Route::get('/create', 'BrandController@create')->name('backend.brand.create');
        Route::post('/store', 'BrandController@store')->name('backend.brand.store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('backend.brand.edit');
        Route::post('/update/{id}', 'BrandController@update')->name('backend.brand.update');
        Route::get('/show/{id}', 'BrandController@showProducts')->name('backend.brand.showProduct');
        Route::delete('/delete/{brand}', 'BrandController@destroy')->name('backend.brand.destroy');
    });
});

Route::group([
    'namespace' => 'Frontend'
],function(){
    Route::get('/','HomeController@index')->name('frontend.home');
    Route::get('/detailproduct/{slug}','HomeController@show')->name('frontend.detailproduct');
    Route::get('/productcategory/{slug}','HomeController@productcategory')->name('frontend.productcategory');
    Route::get('/productbrand/{slug}','HomeController@productbrand')->name('frontend.productbrand');
    Route::get('/search','HomeController@search')->name('frontend.search');
    Route::post('/autocomplete-ajax','HomeController@autocomplete_ajax')->name('frontend.searchauto');
});