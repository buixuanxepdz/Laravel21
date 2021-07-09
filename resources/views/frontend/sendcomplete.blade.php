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
        <div>
            <h3><font color="#FF9600">Quý khách đã đặt hàng thành công</font></h3>
            <a class="btn btn-primary" href="{{ route('frontend.home') }}" class="btn btn-success">Tiếp tục mua hàng</a>
        </div>
    </div>				
</section> <!--/#cart_items-->

@endsection

