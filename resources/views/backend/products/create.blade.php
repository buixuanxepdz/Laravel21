@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo sản phẩm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Tạo sản phẩm</li>
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
                        <h3 class="card-title">Tạo sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form runat="server" role="form" method="post" action="{{ route('backend.product.store') }}" enctype="multipart/form-data">
                        @csrf
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                 <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="" placeholder="Điền tên sản phẩm">
                                @error('name')
                                <span style="color: red">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số lượng</label>
                                <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" id="" placeholder="Số lượng">
                                @error('quantity')
                                <span style="color: red">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá gốc</label>
                                        <input type="text" name="origin_price" value="{{ old('origin_price') }}" class="form-control" placeholder="Điền giá gốc">
                                        @error('origin_price')
                                        <span style="color: red">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Giá bán</label>
                                        <input type="text" name="sale_price" value="{{ old('sale_price') }}" class="form-control" placeholder="Điền giá gốc">
                                        @error('sale_price')
                                        <span style="color: red">{{ $message }}</span> 
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                                <textarea class="textarea" name="content" placeholder="Place some text here"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                          @error('content')
                                                <span style="color: red">{{ $message }}</span> 
                                          @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image[]" id="imgInp" accept="image/*" multiple>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                   
                                </div>
                                <img style="width:70px;" id="blah" src="#" alt="your image" />
                                @error('image[]')
                                    <span style="color: red">{{ $message }}</span> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Trạng thái sản phẩm</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    @foreach (\App\Models\Product::$status_text as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    
                        <div class="card-footer">
                            <a href="{{ route('backend.product.index') }}" class="btn btn-default">Huỷ bỏ</a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
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
