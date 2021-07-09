<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 3123131</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>buixuanxep@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ route('frontend.home') }}" style="font-size: 2rem;color: orange"><img style="width: 50px" src="/frontend/images/logohome.png" alt="" />LARAVEL SHOP</a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="#"><i class="fa fa-star"></i>Yêu thích</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
								<li><a href="{{  route('frontend.cart.index') }}"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
								@if(Auth::check())
								<li><a href="#"><i class="fa fa-user"></i>{{ Auth::user()->name }}</a></li>
								@endif
								@if(!Auth::check())
								<li><a href="{{ route('login.form') }}"><i class="fa fa-lock"></i>Đăng nhập</a></li>
								@endif
								<li><a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{ route('frontend.home') }}" class="active">Trang chủ</a></li>				
								<li class="dropdown"><a href="#">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Sản phẩm</a></li>
										<li><a href="product-details.html">Chi tiết sản phẩm</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Giỏ hàng</a></li> 
										<li><a href="login.html">Đăng nhập</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								{{-- <li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li> --}}
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{ route('frontend.search') }}" autocomplete="off" method="GET">
							@csrf
							<div class="search_box pull-right" style="display: flex;justify-content:space-between;width:80%">
								<div class="timkiem" style="position: relative;width:70%">
									<input style="width:90%;;" type="text" name="keyword" value="{{ Request()->get('keyword') }}" id="keywords" placeholder="Tìm kiếm"/>
									{{-- <i class="fa fa-times-circle" onclick="change()" id="x" style="position: absolute;right:30px;top: 10px" aria-hidden="true"></i> --}}
								<div id="searchajax" style="position: absolute"></div>
								</div>
								<input style="margin: 0 !important;color:white;font-size:18px;font-weight:bold;" type="submit" name="search" value="Tìm kiếm" class="btn btn-primary"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header>
	