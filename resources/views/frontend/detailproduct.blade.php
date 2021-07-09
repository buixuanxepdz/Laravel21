
@extends('frontend.layouts.master')
@section('title')
	Bui Xuan Xep
@endsection
<!--/Footer-->
@section('content')
<style>
    .cart>a{
        text-decoration: none;
        color: white;
    }
</style>
<section>
    <div class="container">
        {{-- @dd($products) --}}
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
                                    <a href="{{ route('frontend.productcategory',$value->slug) }}">{{ $value->name }}</a>
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
                                        <a href="{{ route('frontend.productcategory',$children->slug) }}" style="color: #696763">
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
                    
                    {{-- <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range--> --}}
                    
                    <div class="shipping text-center"><!--shipping-->
                        <img src="/frontend/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->
                
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                @if($products)
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        {{-- <div class="view-product">
                            <img style="width: 100% !important;height:400px" src="{{ $products->images[0]->image_url }}" alt="" />
                            <h3>ZOOM</h3>
                        </div> --}}
                       
                            <ul id="imageGallery">
                            @if (!empty($products->images) && count($products->images)>0)
                                @foreach ($products->images as $image)
                                <li data-thumb="{{ $image->image_url }}" data-src="{{ $image->image_url }}">
                                <img style="width: 100%" src="{{ $image->image_url }}" />
                                </li>
                                @endforeach
                                @foreach ($products->images as $image)
                                <li data-thumb="{{ $image->image_url }}" data-src="{{ $image->image_url }}">
                                <img style="width:100%" src="{{ $image->image_url }}" />
                                </li>
                                @endforeach   
                                @endif
                          </ul>
                        
                        
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="/frontend/images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2>{{ $products->name }}</h2>
                            <p>Web ID: 1089772</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
                                <span>{{ number_format($products->sale_price).''.'đ' }}</span>
                                <label>Số lượng:</label>
                                <input type="number" value="1" min="1" max="999" />

                                <button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    <a href="{{ route('frontend.cart.add', ['id' => $products->id]) }}">Thêm vào giỏ hàng</a>
                                </button>
                            </span>
                            @if($products->quantity == 0)
                            <p><b>Kho:</b>Hết hàng</p>
                            @else
                             <p><b>Kho:</b>{{ $products->quantity }}</p>
                            @endif
                            @if ($products->category == NULL)
                                <p><b>Danh mục:</b>không có</p>
                            @else
                                <p><b>Danh mục:</b>{{ $products->category->name }}</p>
                            @endif
                            @if ($products->brand == NULL)
                                <p><b>Thương hiệu: </b>không có</p>
                            @else
                                <p><b>Thương hiệu:</b>{{ $products->brand->name }}</p>
                            @endif
                            
                            
                            <a href=""><img src="/frontend/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                @endif
                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            
                            <li><a href="#tag" data-toggle="tab">Mô tả</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                            <li class=""><a href="#comment" data-toggle="tab">Bình luận</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="tag" >
                            <div class="col-sm-12">{!! $products->content !!}</div>
                        </div>
                        
                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p><b>Write Your Review</b></p>
                                
                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name"/>
                                        <input type="email" placeholder="Email Address"/>
                                    </span>
                                    <textarea name="" ></textarea>
                                    <b>Rating: </b> <img src="/frontend/images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="comment" >
                            <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="6BpkYskA"></script>
                            <div class="fb-comments" data-href="http://127.0.0.1:8000/detailproduct/{{ $products->slug }}" data-width="" data-numposts="5"></div>
                        </div>
                        
                    </div>
                </div><!--/category-tab-->
                
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Sản phẩm liên quan</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          
                                <div class="item active">	
                                    @foreach ($relateds as $related)  
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        @if (count($related->images) > 0)
                                                            <img src="{{ $related->images[0]->image_url }}" alt="" />
                                                        @endif
                                                        
                                                        <h2>{{ number_format($related->sale_price).'đ' }}</h2>
                                                        <p>{{ $related->name }}</p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                           
                            
                            <div class="item">	
                                @foreach ($relateds as $related)  
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                @if (count($related->images) > 0)
                                                    <img src="{{ $related->images[0]->image_url }}" alt="" />
                                                @endif
                                                
                                                <h2>{{ number_format($related->sale_price).'đ' }}</h2>
                                                <p>{{ $related->name }}</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>			
                    </div>
                </div><!--/recommended_items-->
                
            </div>
        </div>
    </div>
</section>
@endsection