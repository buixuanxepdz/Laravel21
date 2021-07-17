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
    <style>
        #searchajax a{
            text-decoration: none !important;
            font-size: 17px;
            color: black;
        }
        #searchajax li{
            text-align: center;
        }
        #searchajax li:hover{
            background-color: rgb(208, 212, 216);
        }
        .sortby{
            height: 33px;
            border-radius: 5px;
        }
    .card-tools{
        width: 60% !important;
        display: flex !important;
        justify-content: space-between !important;
    }

    </style>
        <!-- Main row -->
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sản phẩm mới nhập</h3>
                        
                        <div class="card-tools" style="">
                            
                            <div>
                                
                                <form action="{{ route('backend.product.filter') }}" method="get" id="form_filter">
                                    <span style="margin-right: 5px">Sắp xếp theo</span>
                                    {{-- <select name="sortby" class="sortby" style="border:1px solid #ced4da;">
                                        <option {{ Request::get('sortby') == 'default' || !Request::get('sortby') ? "'selected = selected '" : "" }} value="default" selected="selected">Mặc định</option>
                                        <option {{ Request::get('sortby') == 'moi-nhat' ? "selected = 'selected '" : "" }} value="moi-nhat">Sản phẩm mới</option>
                                        <option {{ Request::get('sortby') == 'sp-cu' ? "selected = 'selected '" : "" }} value="sp-cu">Sản phẩm cũ</option>
                                    </select> --}}
                                    <select name="status" class="sortby" style="border:1px solid #ced4da;">
                                        <option value="-1" >-Chọn trạng thái-</option>
                                        @foreach (\App\Models\Product::$status_text as $key => $value)
                                            <option  value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <select name="category" class="sortby" style="border:1px solid #ced4da;">
                                        <option {{ Request::get('category') == -1 || !Request::get('category') ? "'selected = selected '" : "" }} value="-1">-Chọn danh mục-</option>
                                        <option  value="0">Không có danh mục</option>
                                        @foreach ($categories as $category)
                                            <option {{ Request::get('category') ==  $category->id ? "selected = 'selected '" : "" }}  value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <select name="brand" class="sortby" style="border:1px solid #ced4da;">
                                        <option {{ Request::get('brand') == -1 || !Request::get('brand') ? "'selected = selected '" : "" }} value="-1">-Chọn thương hiệu-</option>
                                        <option  value="0">Không có thương hiệu</option>
                                        @foreach ($brands as $brand)
                                            <option {{ Request::get('brand') ==  $brand->id ? "selected = 'selected '" : "" }}  value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-primary" type="submit">Lọc</button>
                                </form>
                            </div>
                            <div class="input-group input-group-sm" style="width: 250px;position:relative">
                                <form style="display: flex" autocomplete="off" action="{{ route('backend.product.search') }}" method="GET">
                                    @csrf
                                <input style="margin-top: 5px" type="text" name="keyword" id="keywords" class="form-control float-right" placeholder="Tìm kiếm">
                                <div id="searchajax" style="position: absolute;top:40px;"></div>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('dlsuccess'))
                        <span class="alert alert-success">{{ session()->get('dlsuccess') }}</span>
                    @elseif(session()->has('dlerror'))
                    <span class="alert alert-danger">{{ session()->get('dlerror') }}</span>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Tên danh mục</th>
                                <th>Tên thương hiệu</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Người tạo</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                 <td>
                                    @if (count($product->images) > 0)
                                        <img src="{{ $product->images[0]->image_url }}" width="60px" alt="">
                                    @endif
                                </td>
                                @if ($product->status == 1)
                                    <td><a href="{{ route('frontend.detailproduct',$product->slug) }}" target="_blank" style="font-weight: bold">{{ $product->name }}</a></td>
                                @else
                                <td>{{ $product->name }}</a>
                                @endif
                                
                                @if ($product->category == NULL)
                                    <td>Không có danh mục</td>
                                @else
                                     <td>{{ $product->category->name }}</td>
                                @endif
                                @if ($product->brand == NULL)
                                    <td>Không có thương hiệu</td>
                                @else
                                     <td>{{ $product->brand->name }}</td>
                                @endif
                                <td>{{ $product->updated_at->format('Y-m-d') }}</td>
                                <td>
                                    @if ($product->status == 0)
                                        <span class="tag tag-success" style="display: inline-block;margin-top: 10px;padding: 5px 10px;background-color: yellow;border-radius: 10px;color:#4f5962;font-weight: bold">
                                            <i class="fas fa-cart-arrow-down" style="margin-right: 5px"></i>Đang nhập
                                        </span>
                                    @elseif($product->status == 1)
                                        <span class="tag tag-success" style="display: inline-block;margin-top: 10px;padding: 5px 10px;background-color: green;border-radius: 10px;color:white;font-weight: bold">
                                            <i class="fas fa-shopping-cart" style="margin-right: 5px"></i>Đang bán
                                        </span>
                                    @else
                                        <span class="tag tag-success" style="display: inline-block;margin-top: 10px;padding: 5px 10px;background-color: red;border-radius: 10px;color:white;font-weight: bold">
                                            <i class="fas fa-times-circle" style="margin-right: 5px"></i>Ngừng bán
                                        </span>
                                    @endif
                                </td>
                                @if ($product->user == NULL)
                                    <td>Người dùng bị vô hiệu hóa</td>
                                @else
                                    <td><span class="tag tag-success">{{ $product->user->name }}</span></td>
                                @endif
                                
                                <td>
                                    {{-- @if(\Illuminate\Support\Facades\Gate::allows('update-product', $product)) --}}
                                    @can('update',$product)
                                         <a href="{{ route('backend.product.edit',$product->id) }}"><button class="btn btn-success"><i class="fas fa-edit" style="margin-right: 3px"></i>Sửa</button></a>
                                    @endcan
                                    {{-- @endif --}}
                                    {{-- @if(\Illuminate\Support\Facades\Gate::allows('delete-product', $product)) --}}
                                    @can('delete',$product)
                                         <form style="display: inline" action="{{ route('backend.product.destroy',$product->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
        
                                        <button  type="submit" class="btn btn-danger delete-confirm" data-name="{{ $product->name }}">
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
                            {!! $products->appends(request()->input())->links() !!}
                            {{-- ->appends(request()->input()) --}}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    @if(Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}");
    </script>    
    @elseif(Session::has('error'))    
    <script>
        toastr.error("{!! Session::get('error') !!}");
    </script>
    @endif

    @if(Session::has('updatesuccess'))
    <script>
        toastr.success("{!! Session::get('updatesuccess') !!}");
    </script>    
    @elseif(Session::has('updateerror'))    
    <script>
        toastr.error("{!! Session::get('updateerror') !!}");
    </script>
    @endif

    @if(Session::has('deletesuccess'))
    <script>
        toastr.success("{!! Session::get('deletesuccess') !!}");
    </script>    
    @elseif(Session::has('deleteerror'))    
    <script>
        toastr.error("{!! Session::get('deleteerror') !!}");
    </script>
    @endif
    <script>
        $('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Bạn có muốn xóa ${name}?`,
          text: "Nếu bạn xóa nó, bạn sẽ không thể khôi phục lại được",
          icon: "error",
          buttons: ["Không", "Xóa"],
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
    </script>
<script>
    $('#keywords').keyup(function(){
			var query = $(this).val();
      // alert(query);
			if( query != ''){
				var _token = $('input[name = "_token"]').val();
				$.ajax({
					url: "{{ url('/autocomplete-ajax') }}",
					method:"POST",
					data:{query:query,_token:_token},
					success:function(data){
						$('#searchajax').fadeIn();
						$('#searchajax').html(data);
					}
				});
			}else{
				$('#searchajax').fadeOut();
			}
		});
		$(document).on('click','.lisearch',function(){
			$('#keywords').val($(this).text());
			$('#searchajax').fadeOut();
		});
</script>
{{-- <script>
    $(function(){
        $('.sortby').change(function(){
            $('#form_filter').submit();
        });
    })
</script> --}}

@endsection
