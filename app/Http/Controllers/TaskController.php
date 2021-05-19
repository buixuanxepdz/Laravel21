<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index2(){
        return view('tasks.index2'); 
    }

    public function edit($id) {
        return view('tasks.edit');
    }

    public function destroy($id){
        echo 'delete task id = ' . $id;
    }

    public function create(){
        
    }
}
