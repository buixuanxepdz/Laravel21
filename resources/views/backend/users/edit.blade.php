@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cập nhật thông tin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Cập nhật</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
<div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form  runat="server" role="form" action="{{ route('backend.user.update',$users->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" name="name" class="form-control" id="" value="{{ $users->name }}" placeholder="Tên người dùng">
                            </div>
                            @error('name')
                            <span style="color: red">{{ $message }}</span> 
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" value="{{ $users->email }}" class="form-control" id="" placeholder="Email">
                            </div>
                            @error('email')
                            <span style="color: red">{{ $message }}</span> 
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" id="" value="{{ $users->userInfo->address }}" placeholder="Địa chỉ">
                            </div>
                            @error('address')
                            <span style="color: red">{{ $message }}</span> 
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control" id="" value="{{ $users->userInfo->phone }}" placeholder="Số điện thoại">
                            </div>
                            @error('phone')
                            <span style="color: red">{{ $message }}</span> 
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" name="password"  class="form-control" id="">
                            </div>
                            @error('password')
                            <span style="color: red">{{ $message }}</span> 
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image[]" class="custom-file-input" id="imgInp" accept="image/*" multiple>
                                        
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                    @error('image[]')
                                    <span style="color: red">{{ $message }}</span> 
                                    @enderror
                                </div>
                                <img style="width:70px;" id="blah" src="#" alt="your image" />
                            </div>    
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-default">Huỷ bỏ</button>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <script>
        imgInp.onchange = evt => {
const [file] = imgInp.files
if (file) {
    blah.src = URL.createObjectURL(file)
}
}
</script>
@endsection
