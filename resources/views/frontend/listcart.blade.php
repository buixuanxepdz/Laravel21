@extends('frontend.layouts.master')
@section('title')
	Bui Xuan Xep
@endsection
@section('boostrap')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
@endsection
<!--/Footer-->
@section('content')
<style>
   .cart_menu  th{
       vertical-align: inherit !important;
   }
</style>
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ghi chú</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                        <th>Hành Động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $item)
                        <tr class="cartpage">
                            <td style="margin: 0" class="cart_product">
                               {{ $item->id }}
                            </td>
                            <td class="cart_description">
                                <p>{{ $item->name }}</p>
                            </td>
                            <td >
                                <p>{{ $item->address }}</p>
                            </td>
                            <td class="cart_quantity">
                               <p>{{ $item->phone }}</p>
                            </td>
                            <td class="cart_total">
                                <p>{{ $item->note }}</p>
                            </td>  
                           
                            <td class="cart_delete">
                               <p>{{ $item->created_at }}</p>
                            </td>
                            <td>
                               <p>
                                @if ($item->status == 0)
                                <span style="background-color: rgb(247, 65, 65);padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                    Chưa xử lý<i class="fa fa-spinner" style="margin-left: 5px;"></i>
                                </span>    
                            @elseif($item->status ==1)
                                <span style="background-color: rgb(28, 49, 243);padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                    Đã xác nhận<i class="fa fa-thumbs-up" style="margin-left: 5px;"></i>
                                </span>
                            @elseif($item->status ==2)
                                <span  style="background-color: yellow;padding: 5px 10px;color:rgb(19, 95, 209);font-weight: bold;border-radius: 10px">
                                    Đang giao hàng<i class="fa fa-motorcycle" style="margin-left: 5px;"></i>
                                </span>
                            @elseif($item->status ==3)
                                <span style="background-color:green;padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                    Đã hoàn thành <i class="fa fa-check-circle" style="margin-left: 5px;"></i>
                                </span>
                            @else
                                <span style="background-color:rgb(42, 147, 218);padding: 5px 10px;color:white;font-weight: bold;border-radius: 10px">
                                    Đang chờ hủy đơn ...
                                </span>
                            @endif
                               </p>
                            </td>
                            <td>
                                <a href="{{ route('frontend.cart.detail',$item->id) }}" class="btn btn-primary" style="margin: 0 !important" title="Chi tiết đơn hàng"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
</section> <!--/#cart_items-->

@endsection

