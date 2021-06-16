@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Danh sách sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
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
                        <h3 class="card-title">Sản phẩm mới nhập</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <form style="display: flex" action="{{ route('backend.product.search') }}" method="POST">
                                    @csrf
                                <input type="text" name="keyword" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Người tạo</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($searchs as $search)
                            <tr>
                                <td>{{ $search->id }}</td>
                                 <td>
                                    @if (count($search->images) > 0)
                                        <img src="{{ $search->images[0]->image_url }}" width="60px" alt="">
                                    @endif
                                </td>
                                <td>{{ $search->name }}</td>
                               
                                <td>{{ $search->updated_at }}</td>
                                <td><span class="tag tag-success">{{ $search->status_product }}</span></td>
                                <td><span class="tag tag-success">{{ $search->user->name }}</span></td>
                                <td>
                                    <a href="{{ route('backend.product.edit',$search->id) }}"><button class="btn btn-success"><i class="fas fa-edit" style="margin-right: 3px"></i>Sửa</button></a>
                                    <form style="display: inline" action="{{ route('backend.product.destroy',$search->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
        
                                        <button onclick="return confirm('Bạn có muốn xóa ?')" type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash" style="margin-right: 3px"></i>Xoá
                                        </button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 float-right mr-5">
                            {!! $searchs->links() !!}
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
