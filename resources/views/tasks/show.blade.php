@extends('layouts.master')
@section('content')
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chi tiết công việc
            </div>
            <div class="panel-body">
                <h4>Tên công việc: {{ $task->name }}</h4>

                <h4>Nội dung</h4>{{ $task->content }}
                <h4>Thời hạn</h4>{{ $task->deadline }}
            </div>
        </div>
    </div>
@endsection