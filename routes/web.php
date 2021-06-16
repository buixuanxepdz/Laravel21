<?php

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
Route::get('admin/logout', 'Auth\LogoutController@logout')->name('logout');
Route::get('admin/register', 'Auth\RegisterController@showForm')->name('register.form');
Route::post('admin/register', 'Auth\RegisterController@register')->name('register.post');

Route::group([
    'namespace' => 'Backend',
    'prefix' => 'admin',
    'middleware' => 'auth'
], function (){
    // Trang dashboard - trang chủ admin
    Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
    //Quản lý sản phẩm
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'ProductController@index')->name('backend.product.index');
        Route::get('/create', 'ProductController@create')->name('backend.product.create');
        Route::post('/store', 'ProductController@store')->name('backend.product.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('backend.product.edit');
        Route::post('/update/{id}', 'ProductController@update')->name('backend.product.update');
        Route::get('/show/{id}', 'ProductController@showImages')->name('backend.product.showImage');
        Route::get('/showOrder/{order_id}', 'OrderController@showProducts')->name('backend.product.showOrder');
        Route::delete('/delete/{id}', 'ProductController@destroy')->name('backend.product.destroy');
        Route::post('/search','ProductController@search')->name('backend.product.search');

     });

    //Quản lý người dùng
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
        Route::get('/show/{user_id}', 'UserController@showProducts')->name('backend.user.showProduct');
    });
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', 'CategoryController@index')->name('backend.category.index');
        Route::get('/create', 'CategoryController@create')->name('backend.category.create');
        Route::post('/store', 'CategoryController@store')->name('backend.category.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('backend.category.edit');
        Route::post('/update/{id}', 'CategoryController@update')->name('backend.category.update');
        Route::get('/show/{category_id}', 'CategoryController@showProducts')->name('backend.category.showProduct');
        Route::delete('/delete/{id}', 'CategoryController@destroy')->name('backend.category.destroy');
    });
});

Route::group([
    'namespace' => 'Frontend'
],function(){
    Route::get('/','HomeController@index')->name('frontend.home');
    Route::get('/detailproduct/{slug}','HomeController@show')->name('frontend.detailproduct');
    Route::get('/productcategory/{slug}','HomeController@ProductCategory')->name('frontend.productcategory');
    Route::post('/search','HomeController@search')->name('frontend.search');
});