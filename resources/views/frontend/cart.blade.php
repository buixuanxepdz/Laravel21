@extends('frontend.layouts.master')
@section('title')
	Bui Xuan Xep
@endsection
@section('boostrap')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
@endsection
<!--/Footer-->
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Ảnh</td>
                        <td>Tên</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr class="cartpage">
                            <td style="margin: 0" class="cart_product">
                               
                                     <a href=""><img style="width: 70px" src="{{ url(\Illuminate\Support\Facades\Storage::url($item->options->image)) }}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4 ><a style="font-size: 14px" href="">{{ $item->name }}</a></h4>
                            </td>
                            <td class="cart_price">
                                <p>{{ number_format($item->price).''.'đ' }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input class="cart_quantity_input" type="number" name="quantity" value="{{ $item->qty }}" onchange="updateCart(this.value,'{{ $item->rowId }}')" autocomplete="off">
                                </div>
                            </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ number_format($item->price*$item->qty).''.'đ'  }}</p>
                                </td>  
                           
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{ route('frontend.cart.remove',['id' => $item->rowId]) }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                    @endforeach
                    @if (count($items)>0)
                         <a style="margin: 10px 0 10px 10px"  class="btn btn-primary" href="{{ route('frontend.cart.destroy') }}">Xóa tất cả sản phẩm khỏi giỏ hàng</a>
                    @else
                        <p></p>
                    @endif
                   
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Tổng</td>
                                    @if (count($items)>0)
                                    <td>{{ number_format(\Gloudemans\Shoppingcart\Facades\Cart::subtotal())  }}đ</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Thuế</td>
                                    <td>{{ number_format(\Gloudemans\Shoppingcart\Facades\Cart::tax()) }}đ</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Phí vận chuyển</td>
                                    <td>Free</td>										
                                </tr>
                                <tr>
                                    <td>Thành tiền</td>
                                    <td><span> {{ number_format(\Gloudemans\Shoppingcart\Facades\Cart::total()) }}đ</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <div class="payment-options">
            @if (count($items) > 0 && Auth::check())
                <div  class="btn btn-primary" >
                    <a href="{{ route('frontend.cart.checkout') }}" style="color: white">Xác nhận mua hàng</a> 
                </div>
            @elseif(Auth::check())
                <p>Ko có đơn hàng</p>
            @else
                <a  class="btn btn-primary" href="{{ route('login.form') }}">Đăng nhập</a>
            @endif
            
        </div>
</section> <!--/#cart_items-->
<script>
    function updateCart(qty,rowId){
        $.get(
            '{{ asset('products/cart/update') }}',{qty:qty,rowId:rowId},
            function(){
                location.reload();
            }
        )
    }
</script>
@endsection

