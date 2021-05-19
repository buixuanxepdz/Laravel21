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
 
    Route::get('/complete/{id}','Frontend\TaskController@complete')->name('task.complete');
 
    Route::get('/reset/{id}','Frontend\TaskController@reComplete')->name('task.reset');
 
    //Route::get('/create',  [TaskController::class, 'create'])->name('task.create');
    Route::delete('/create', 'Frontend\TaskController@create')->name('task.create');

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
