@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh mục sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Danh Mục</a></li>
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
                        <h3 class="card-title">Danh Mục Mới</h3>

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
                                <th>Tên Danh Mục</th>
                                <th>Danh Mục Cha</th>
                                <th>Thời gian</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                @if($category->parent_id == 0)
                                    <td>Là danh mục cha</td>
                                @else    
                                @foreach ($categories_parent as $category_parent)
                                    @if ($category_parent->id == $category->parent_id)
                                        <td>{{ $category_parent->name }}</td>
                                    @endif
                                @endforeach
                               @endif
                                <td>{{ $category->updated_at }}</td>
                                <td>
                                    @can('update', $category)
                                        <a href="{{ route('backend.category.edit',$category->id) }}"><button class="btn btn-success"><i class="fas fa-edit" style="margin-right: 3px"></i>Sửa</button></a>
                                    @endcan
                                    @can('delete',$category)
                                    <form style="display: inline" action="{{ route('backend.category.destroy',$category->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
        
                                        <button onclick="return confirm('Bạn có muốn xóa ?')" type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash" style="margin-left:3px;"></i>Xoá
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                           @endforeach
                            </tbody>
                            {!! $categories->links() !!}
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
@endsection
