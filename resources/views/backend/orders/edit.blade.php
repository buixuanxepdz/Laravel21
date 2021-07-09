@extends('backend.layouts.master')
@section('title')
    Project bán hàng
@endsection
@section('content-header')
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Chi tiết đơn hàng</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Đơn hàng</a></li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
@section('content')
<div class="container-fluid">
        <!-- Main row -->
        <div class="container">
            <div class="main-body">
            
                  <!-- Breadcrumb -->
                  <!-- /Breadcrumb -->
            
                  <div class="row gutters-sm">
                    <div class="col-md-4">
                      <div class="card mb-3">
                        <div class="card-body">
                            <button href="#" class="btn btn-primary" style="margin-bottom: 20px" type="button" disabled >Thông tin khách hàng</button>
                          <div class="row">
                            <div class="col-sm-3">
                                
                              <h6 class="mb-0">Họ và tên</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{ $orderstt->name }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                             {{ $orderstt->user->email }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{ $orderstt->phone }}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Địa chỉ</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              {{ $orderstt->address }}
                            </div>
                          </div>
                          <hr>
                        </div>
                      </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><button disabled class="btn btn-primary">Chi tiết đơn hàng</button></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="product">
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr class="bg-primary">
                                                    <th>Tên sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Đơn giá</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orderstt->products as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->pivot->quantity }}</td>
                                                        <td>{{ number_format($item->pivot->price) }} đ</td>
                                                        <td>
                                                            {{ number_format($item->pivot->price * $item->pivot->quantity) }}đ
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <form action="{{ route('backend.order.update', $orderstt->id) }}" method="POST">
                                           @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <p>
                                                        <b class="text-primary">Tổng tiền:</b> <b>{{ number_format($orderstt->total) }} đ<span style="color: red;font-weight: bold">(Thuế 10%)</span></b>
                                                    </p>
                                                </div>
        
                                                @if($orderstt->status !== 3)
                                                    <div class="col-3">
                                                        <select name="status">
                                                            @foreach(\App\Models\Order::$status_text as $key => $value)
                                                                <option value="{{ $key }}" {{ ($key == $orderstt->status) ? 'selected' : '' }}>{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-3">
                                                        <button class="btn btn-success">Cập nhật trạng thái</button>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <button class="btn btn-success" disabled>Đã giao hàng</button>
                                                    </div>
                                                @endif
                                            </div>
                                        </form>
                                        {{--                                    <div class="d-flex justify-content-center">{!! $products->appends(request()->input())->links() !!}</div>--}}
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div>
                        </div>
        
                </div>
            </div>
            </div>
        </div>
</div>

    </div>
@endsection
