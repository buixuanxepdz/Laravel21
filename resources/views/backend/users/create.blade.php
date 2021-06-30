@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo người dùng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Người dùng</a></li>
                    <li class="breadcrumb-item active">Tạo mới</li>
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
                        <h3 class="card-title">Tạo mới người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('backend.user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="" placeholder="Tên người dùng">
                            </div>
                                @error('name')
                                <span style="color: red">{{ $message }}</span> 
                                @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="" placeholder="Email">
                            </div>
                                @error('email')
                                <span style="color: red">{{ $message }}</span> 
                                @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input name="address" value="{{ old('address') }}" type="text" class="form-control" id="" placeholder="Đia chỉ">
                            </div>
                                @error('address')
                                <span style="color: red">{{ $message }}</span> 
                                @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số Điện thoại</label>
                                <input name="phone" value="{{ old('phone') }}" type="text" class="form-control" id="" placeholder="Số điện thoại">
                            </div>
                                @error('phone')
                                <span style="color: red">{{ $message }}</span> 
                                @enderror
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input name="password" value="{{ old('password') }}" type="password" class="form-control" id="">
                            </div>
                                @error('password')
                                <span style="color: red">{{ $message }}</span> 
                                @enderror
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="role" class="form-control select2" style="width: 100%;">
                                    @foreach (\App\Models\User::$author as $key => $value)
                                         <option value="{{ $key }}" >{{ $value }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image[]" class="custom-file-input" id="uploadFile" accept="image/*" multiple>
                                        
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                                {{-- <img style="width:70px;" id="blah" src="#" alt="your image" /> --}}
                                <div class="gallery" style="display: flex; flex-wrap: wrap;"></div>
                                @error('image[]')
                                <span style="color: red">{{ $message }}</span> 
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a href="{{ route('backend.user.index') }} "><button class="btn btn-default">Huỷ bỏ</button></a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <script>
        function previewImages()
{
    var preview = document.querySelector('.gallery');

    if(this.files)
    {
        [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file)
    {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name))
        {
            return alert(file.name + " is not an image");
        }

        var reader = new FileReader();

        reader.addEventListener("load", function() {
          var image = new Image();
          image.width = 150;
          image.height = 150;
          image.title  = file.name;
          image.src    = this.result;

          preview.appendChild(image);
        });

        reader.readAsDataURL(file);

    }
}

document.querySelector('#uploadFile').addEventListener("change", previewImages);
</script>
@endsection
