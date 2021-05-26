<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Carbon\Carbon;
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
        $tasks = Task::all();
        $tasks = Task::orderBy('created_at', 'desc')->get();
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
       return view('tasks.create');
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

        // $data = $request->all();
        // $data['status'] = Task::STATUS['display'];
        // $data['deadline'] = Carbon::now();
        // $data['created_at'] = Carbon::now();
        // $data['updated_at'] = Carbon::now();

        // $success = Task::create($data);

        // if($success){
        //     return redirect()->route('task.index2');
        // }
        // dd($data);

        //lay du lieu tu Form
        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $priority = $request->get('priority');


        // dd($priority);
        //tao du lieu moi
        $task = new Task();
        $task->name = $name;
        $task->status = 1;
        $task->priority = $priority;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->save();
        
        //hanh dong ket thuc
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
        // dd($task);
        return view('tasks.show')->with([
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->with([
            'task' => $task
        ]);
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
        // $task = Task::find($id);
        
        // $data = $request->all();
        // $data['status'] = Task::STATUS['display'];
        // $data['deadline'] = Carbon::now();
        // $data['created_at'] = Carbon::now();
        // $data['updated_at'] = Carbon::now();

        // $success = $task::update($data);

        // if($success){
        //     return redirect()->route('task.index2');
        // }


        $name = $request->get('name');
        $deadline = $request->get('deadline');
        $content = $request->get('content');
        $priority = $request->get('priority');
        // Cập nhật
        $task = Task::find($id);
        $task->name = $name;
        $task->status = 1;
        $task->priority = $priority;
        $task->content = $content;
        $task->deadline = $deadline;
        $task->save();

        return redirect()->route('task.index2');
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
        $task = Task::find($id);
        $task = Task::where('id',$id)->update(['status'=>2]);
        return redirect()->route('task.index2');
    }
    public function reComplete($id)
    {    
        $task = Task::find($id);
        $task = Task::where('id',$id)->update(['status'=>1]);
        return redirect()->route('task.index2');
    }
}
