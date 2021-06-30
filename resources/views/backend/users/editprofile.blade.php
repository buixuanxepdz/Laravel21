@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Cập nhật thông tin cá nhân</h1>
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
                    <form  runat="server" role="form" action="{{ route('backend.user.updateprofile',$users->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container rounded bg-white mt-5">
                            <div class="row">
                                <div class="col-md-4 border-right">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                        <img style="width:150px;height:150px" class="rounded-circle mt-5" id="blah" width="90" src="{{ $users->userInfo->image_url }}" alt="your image">
                                        
                                        <span class="font-weight-bold">{{ $users->name }}</span>
                                        <span class="text-black-50">{{ $users->email }}</span>
                                        <span>{{ $users->address }}</span>
                                        <input style="width:81.5px" type="file" name="image[]" id="imgInp"  accept="image/*" multiple>
                                        @error('image[]')
                                        <span style="color: red">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="text-right">Cập nhật thông tin</h6>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label for="">Họ và tên</label>
                                                <input type="text" class="form-control" name="name" placeholder="first name" value="{{ $users->name }}">
                                            </div>
                                            @error('name')
                                            <span style="color: red">{{ $message }}</span> 
                                            @enderror
                                            <div class="col-md-6">
                                                <label for="">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $users->email }}">
                                            </div>
                                            @error('email')
                                            <span style="color: red">{{ $message }}</span> 
                                            @enderror
                                            <div class="col-md-6">
                                                <label for="">Mật khẩu</label>
                                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" >
                                            </div>
                                            @error('password')
                                            <span style="color: red">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" class="form-control" name="address" placeholder="Địa chỉ" value="{{ $users->userInfo->address }}">
                                            </div>
                                            @error('address')
                                            <span style="color: red">{{ $message }}</span> 
                                            @enderror
                                            <div class="col-md-6">
                                                <label for="">Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone" value="{{ $users->userInfo->phone }}" placeholder="Số điện thoại">
                                            </div>
                                            @error('phone')
                                            <span style="color: red">{{ $message }}</span> 
                                            @enderror
                                        </div>
                                        <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Cập nhật</button></div>
                                    </div>
                                </div>
                            </div>
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
