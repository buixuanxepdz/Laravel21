<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // $tasks = Task::all();
        $tasks = Task::where('status',1)->get();
        return view('tasks.index2',[
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo 'task create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // $name = $request->get('name');
        // echo $name;
        // $all = $request->all();

        // $all = $request->only(['name','deadline']); 

        // $all = $request->except(['_token']);
        // dd($all);
        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $task = new Task();
        $task->name = $name;
        $task->status = 1;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->save();
        
        return redirect()->route('task.index2');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        // $task = Task::where('id', $id)->first();
        dd($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.index2');
        // echo $id;
    }
    public function Complete($id)
    {
        dd($id);
    }
    public function reComplete($id)
    {    
        dd($id);
    }
}
