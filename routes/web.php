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
 
     Route::get('/edit/{id}', function ($id) {
     echo 'edit task id = '.$id;
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

