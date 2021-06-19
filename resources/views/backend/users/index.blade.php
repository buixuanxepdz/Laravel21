@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
<div class="container-fluid">
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách người dùng</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Tên</th>
                                <th>Quyền</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)   
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->author_user }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    {{-- <td>abc</td> --}}
                                    <td>
                                        {{-- @if(\Illuminate\Support\Facades\Gate::allows('update-product', $product)) --}}
                                        @can('update',$user)
                                             <a href="{{ route('backend.user.edit',$user->id) }}"><button class="btn btn-success"><i class="fas fa-edit" style="margin-right: 3px"></i>Sửa</button></a>
                                        @endcan
                                        {{-- @endif --}}
                                        {{-- @if(\Illuminate\Support\Facades\Gate::allows('delete-product', $product)) --}}
                                        @can('delete',$user)
                                             <form style="display: inline" action="{{ route('backend.user.destroy',$user->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
            
                                            <button onclick="return confirm('Bạn có muốn xóa ?')" type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash" style="margin-right: 3px"></i>Xoá
                                            </button>
                                        </form>
                                        @endcan
                                       
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 float-right mr-5">
                            {!! $users->links() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection
