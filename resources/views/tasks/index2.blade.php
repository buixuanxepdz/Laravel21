@extends('layouts.master') 
@section('content')

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ route('task.create') }}">Thêm công việc mới</a> 
            </div>

            
        </div>

        <!-- Current Tasks -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh sách công việc hiện tại
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Tên công việc</th>
                    <th>Mức độ</th>
                    <th>Trạng thái</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td class="table-text"><div><a href="{{ route('task.show',['id' => $task->id]) }}" target="_blank">{{ $task->name }}</a></div></td>
                        <!-- Task Complete Button -->
                        <td>{{ $task->priority_name }}</td>
                        <td>{{ $task->status_text }}</td>
                        <td><?php
                            if($task->status == 2){
                            ?>

                                <a href="{{ route('task.recomplete',$task->id) }}" type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-check"></i>Làm lại
                                </a>
                            <?php
                            }
                            else{
                            ?>
                                <a href="{{ route('task.complete',$task->id) }}" type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-check"></i>Hoàn Thành
                                </a>
                            <?php
                            }
                            ?>
                        </td>
                        <!-- Task Delete Button -->
                        <td>
                            <form action="{{ route('task.destroy',$task->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('task.edit',$task->id) }}"><button class="btn btn-danger">Chinh sua</button></a>
                        </td>
                    </tr>
                    @endforeach
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection