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
    .form-one{
        width: 100%;
    }
    .form-one >form > input{
        width: 100%;
    }
    .form-one >form > textarea{
        width: 100%;
        height: 200px;
        overflow-x:auto;
    }
</style>
<section id="cart_items">
    <div class="container">
        

        <div class="shopper-informations" style="margin: 20px 0">
            <div class="row">
                <div class="col-sm-4 clearfix">
                    <div class="bill-to">
                        <div class="form-one">
                            <form method="POST" action="{{ route('frontend.cart.pay') }}"  autocomplete="off">
                                @csrf
                                <input name="name" value="{{ $user->name }}" type="text" placeholder="Họ và tên">
                                <input name="email" value="{{ $user->email }}" type="text" placeholder="Email">
                                <input name="phone" value="{{ $user->userinfo->phone }}" type="text" placeholder="Số điện thoại">
                                <input name="address" value="{{ $user->userinfo->address }}" type="text" placeholder="Địa chỉ">
                                <p>Ghi chú cho người bán hàng</p>
                                <textarea name="note" name="message"  placeholder="Ghi chú" rows="16"></textarea>
                                <button type="submit" class="btn btn-success" style="margin-top: 5px">Thanh toán</button>
                            
                        </div>
                    </div>
                </div>
                <div class="table-responsive cart_info col-sm-8">
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Ảnh</td>
                                    <td class="description">Tên</td>
                                    <td class="price">Giá</td>
                                    <td class="quantity">Số lượng</td>
                                    <td class="total">Tổng</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td class="cart_product">
                                        <a href=""><img src="{{ url(\Illuminate\Support\Facades\Storage::url($item->options->image)) }}" style="width: 40px;" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <span>{{ $item->name }}</span>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ number_format($item->price).''.'đ' }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2">
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{ number_format($item->price*$item->qty).''.'đ'  }}</p>
                                    </td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                    <td colspan="2">
                                        <table class="table table-condensed total-result">
                                            <tr>
                                                <td>Thuế</td>
                                                <td>{{ number_format(\Gloudemans\Shoppingcart\Facades\Cart::tax()) }}đ</td>
                                            </tr>
                                            <tr class="shipping-cost">
                                                <td>Vận chuyển</td>
                                                <td>Free</td>										
                                            </tr>
                                            <tr>
                                                <td>Thành tiền</td>
                                                <input type="hidden" value="{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}" name="total">
                                                <td><span>{{ number_format(\Gloudemans\Shoppingcart\Facades\Cart::total()) }} ₫</span></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
        </div>
    </div>				
            </div>
        </div>

        
</section> <!--/#cart_items-->

@endsection

