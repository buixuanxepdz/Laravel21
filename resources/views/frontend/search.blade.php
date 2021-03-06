@extends('frontend.layouts.master')
@section('title')
	Bui Xuan Xep
@endsection
<!--/Footer-->
@section('content')
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-12">
									<img style="width: 90%;margin: 0 auto;height: 500px;" src="/frontend/images/slide4.jpg" alt="">
								</div>
							</div>
							<div class="item">
								<div class="col-12">
									<img style="width: 90%;margin: 0 auto;height: 500px;" src="/frontend/images/slide1.jpg" alt="">
								</div>
							</div>
							
							<div class="item">
								<div class="col-12">
									<img style="width: 90%;margin: 0 auto;height: 500px;" src="/frontend/images/slide3.jpg" alt="">
								</div>
							</div>
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							@if($menus)
								@foreach($menus as $value)
								<div class="panel panel-default">
									<div class="panel-heading menucha" id="cha">
										<h4 class="panel-title">
											<a href="#">{{ $value->name }}</a>
											<a data-toggle="collapse" data-parent="#accordian" href="#{{ $value->id }}">
												@if ($value->children)
													<span class="badge pull-right"><i class="fa fa-plus"></i></span>
												@endif
												
											</a>
										</h4>
									@if ($value->children)   
									<div id="{{ $value->id }}" class="panel-collapse collapse">
										<div class="panel-body">
											<ul>
												@foreach ($value->children as $children)
												<a href="#" style="color: #696763">
													<li>
														{{ $children->name }}
													</li>
												</a>
												@endforeach
											</ul>
										</div>
									</div>
									@endif
									</div>
									
								</div>
								@endforeach
							@endif
							{{-- @dd($menus) --}}
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach ($brands as $brand)
                                    <li><a href="{{ route('frontend.productbrand',$brand->slug) }}"> <span class="pull-right"></span>{{ $brand->name }}</a></li>
                                    @endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						
						<div class="shipping text-center"><!--shipping-->
							<img style="width: 100%" src="/frontend/images/unnamed.png" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach ($searchs as $pro)
							<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="{{ route('frontend.detailproduct',$pro->slug) }}">
												@if (count($pro->images) > 0)
													<img style="width: 100% !important;height:300px" src="{{ $pro->images[0]->image_url }}" alt="" />
												@endif
													
											</a> 
											<h2>{{  number_format($pro->sale_price).''.'đ' }}</h2>
											<p>{!!$pro->name !!}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										@if ($pro->category == NULL)
										<li><a href="#"><i class="fa fa-plus-square"></i>Không có danh mục</a></li>
										@else
											<li><a href="#"><i class="fa fa-plus-square"></i>{{ $pro->category->name }}</a></li>
										@endif
										@if ($pro->brand == NULL)
											<li><a href="#"><i class="fa fa-plus-square"></i>Không có thương hiệu</a></li>
										@else
											<li><a href="#"><i class="fa fa-plus-square"></i>{{ $pro->brand->name }}</a></li>
										@endif
									</ul>
								</div>
							</div>
						</div>
						@endforeach
                    </div>   
						{!! $searchs->links() !!}
						<!--features_items-->
					
					
					
					
					
				</div>
			</div>
		</div>
	</section>
	{{-- @dd($menus) --}}
@endsection

