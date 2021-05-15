<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('task')->group(function () {
    Route::get('/', function () {
        return view('tasks.index');
    });

    Route::get('/index2', function () {
        return view('tasks.index2');
    }); 
 
    Route::get('/edit/{id}', function ($id) {
        return view('tasks.edit');
    });
 
    Route::get('/complete/{id}', function ($id) {
        echo 'complete task id = '.$id;
    })->name('task.complete');
 
    Route::get('/reset/{id}', function ($id) {
        echo 'reset task id = '.$id;
    })->name('task.reset');
 
    Route::delete('/delete/{id}', function ($id) {
        echo 'delete task id = '.$id;
    })->name('task.delete');
 });
 
 
 Route::get('/user/{id}/post/{post}', function($id, $idPost) {
     return "This is post $idPost of user $id"; 
 });
 
 Route::get('user/{id?}', function($id = null) {
     if ($id == null) {
         return 'List users';
     }
     
     return "User $id";
 });
 
 Route::post('/create', function () {
     echo 'create task';
 });

 Route::get('/hello1', function () {
    return view('hello1');
});

Route::get('/hello2', function () {
    // return view('hello2',[
    //     'fullname' => 'Bui Xuan Xep',
    //     'year' => 2001,
    //     'school' => 'VNUA',
    //     'object' => 'Hoc de di lam'
    // ]);

     return view('hello2')->with([
        'fullname' => 'Bui Xuan Xep',
        'year' => 2001,
        'school' => 'VNUA',
        'object' => 'Hoc de di lam',
        'records' => 2
    ]);
});

Route::get('/profile',function(){
    return view('Unit3.profile')->with([
        'fullname' => 'Bui Xuan Xep',
        'year' => 2001,
        'school' => 'VNUA',
        'object' => 'Hoc de di lam',
        'country' => 'Phu Xuyen'
    ]);
});

Route::get('/list',function(){
    return view('Unit3.list');
});

Route::get('/home',function(){
    return view('Unit3.home');
});
