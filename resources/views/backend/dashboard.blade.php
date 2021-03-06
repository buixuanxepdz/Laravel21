@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Tổng quan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Tổng quan</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
@endsection
@section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($orders) }}</h3>

                                <p>Đơn hàng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ count($countproducts) }}</h3>

                                <p>Sản phẩm</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ count($countusers) }}</h3>

                                <p>Người dùng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>
                                    @php
                                        $tong =0;
                                       foreach ($statis as $key => $value) {
                                           $tong +=$value->profit;
                                           
                                       }
                                       echo number_format($tong).'đ';
                                    @endphp
                                </h3>

                                <p>Doanh thu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sản phẩm mới nhập</h3>

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
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                       
                                        <th>Danh mục</th>
                                        <th>Người tạo</th>
                                        <th>Trạng Thái</th>
                                        <th>Mô tả</th>
                                        <th>Thời gian</th>
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
                                            <td><a href="{{ route('frontend.detailproduct',$product->slug) }}" target="_blank" style="font-weight: bold">{{ $product->name }}</a></td>
                                            @if ($product->category == NULL)
                                                <td>Không có danh mục</td>
                                            @else
                                                <td><a href="{{ route('backend.category.showProduct',$product->category->id) }}" style="font-weight: bold">{{ $product->category->name }}</a></td>
                                            @endif
                                            
                                            <td><a href="{{ route('backend.user.showProduct',$product->user->id) }}" style="font-weight: bold"> {{ $product->user->name }}</a></td>
                                            <td>
                                                @if ($product->status == 0)
                                                    <span class="tag tag-success" style="padding: 5px 10px;background-color: yellow;border-radius: 10px;color:#4f5962;font-weight: bold">
                                                        <i class="fas fa-cart-arrow-down" style="margin-right: 5px"></i>Đang nhập
                                                    </span>
                                                @elseif($product->status == 1)
                                                    <span class="tag tag-success" style="padding: 5px 10px;background-color: green;border-radius: 10px;color:white;font-weight: bold">
                                                        <i class="fas fa-shopping-cart" style="margin-right: 5px"></i>Đang bán
                                                    </span>
                                                @else
                                                    <span class="tag tag-success" style="padding: 5px 10px;background-color: red;border-radius: 10px;color:white;font-weight: bold">
                                                        <i class="fas fa-times-circle" style="margin-right: 5px"></i>Ngừng bán
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{!! $product->content !!}</td>
                                            <td>{{ $product->updated_at->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                   
                                </table>
                                <div class="mt-3 float-right mr-5">
                                    {!! $products->links() !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @if(Session::has('updatesuccess'))
        <script>
            toastr.success("{!! Session::get('updatesuccess') !!}");
        </script>    
        @elseif(Session::has('updateerror'))    
        <script>
            toastr.error("{!! Session::get('updateerror') !!}");
        </script>
        @endif
@endsection
