@extends('layouts.master') 
@section('content')
<div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm công việc mới
            </div>
            <div class="panel-body">
                <!-- New Task Form -->
                <form
                        action="{{ route('task.store')  }}"
                        method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Tên công việc</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Mô tả</label>

                        <div class="col-sm-6">
                            <textarea name="content" id="editor" class="form-control">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Thời hạn hoàn thành</label>

                        <div class="col-sm-6">
                            <input type="datetime-local" name="deadline" id="task-deadline" class="form-control" value="{{ old('deadline') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1"  class="col-sm-3 control-label">Example select</label>
                        <div class="col-sm-6">
                        <select name="priority" class="form-control" id="exampleFormControlSelect1">
                            <!-- <option value="0">Bình thường</option>
                            <option value="1">Quan trọng</option>
                            <option value="2">Khẩn cấp</option> -->
                            @foreach($priorities as $key => $pri)
                                <option value="{{ $pri }}">
                                    {{ $key }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Thêm công việc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection