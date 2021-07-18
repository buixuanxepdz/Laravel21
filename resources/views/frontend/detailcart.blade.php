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
   .container {
    margin-bottom: 50px
}

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #FE980F
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #FE980F;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #FE980F;
    border-color: #FE980F;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
}
</style>
<section id="cart_items">
    <div class="container">
        <article class="card">
            <header class="card-header">Chi tiết đơn hàng/Theo dõi</header>
            @foreach ($order->products as $item)
                <div class="card-body">
                <div style="margin-left: 10px;display: flex;width: 60%;justify-content: space-between">
                    <h4>{{ $item->name }}</h4>
                    <img style="width: 50px;margin-top: 10px;height: 60px;" src="{{ $item->images[0]->image_url }}" alt="">
                    @if ($order->status == 0 || $order->status == 1 )
                        <a href="{{ route('frontend.order.cancel',$order->id) }}" class="btn btn-primary" style="display: flex;align-items: center">Yêu cầu hủy đơn</a>
                    @elseif($order->status == 4)
                       <button class="btn btn-primary">Đang chờ hủy đơn...</button>
                    @endif
                    
                </div>
                    <div class="track">
                        @if ($order->status == 0)
                            <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Chờ xác nhận</span> </div>
                            <div class="step"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Đã xác nhận</span> </div>
                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Đang giao </span> </div>
                            <div class="step"> <span class="icon"><i class="fa fa-archive"></i> </span> <span class="text">Đã giao</span> </div>
                        @elseif($order->status == 1)
                            <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Chờ xác nhận</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Đã xác nhận</span> </div>
                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Đang giao </span> </div>
                            <div class="step"> <span class="icon"><i class="fa fa-archive"></i> </span> <span class="text">Đã giao</span> </div>
                        @elseif($order->status == 2)
                            <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Chờ xác nhận</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Đã xác nhận</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Đang giao </span> </div>
                            <div class="step"> <span class="icon"><i class="fa fa-archive"></i> </span> <span class="text">Đã giao</span> </div>
                        @elseif($order->status == 3)
                            <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Chờ xác nhận</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Đã xác nhận</span> </div>
                            <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Đang giao </span> </div>
                            <div class="step active"> <span class="icon"><i class="fa fa-archive"></i> </span> <span class="text">Đã giao</span> </div>
                        @else
                            <div class="step"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Chờ xác nhận</span> </div>
                            <div class="step"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Đã xác nhận</span> </div>
                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Đang giao </span> </div>
                            <div class="step"> <span class="icon"><i class="fa fa-archive"></i> </span> <span class="text">Đã giao</span> </div>
                        @endif
                    </div>
                    <hr>
            </div>
            @endforeach
            
               
        </article>
        </div>
</section> <!--/#cart_items-->

@endsection

