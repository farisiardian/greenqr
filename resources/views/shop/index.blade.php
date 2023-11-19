@extends('layouts.app')

@section('addstyle')
    <style>

        /* 1st card */

        ul {
            list-style: none;
            padding-inline-start: 0;
        }

        .ccontent{
            background: #ffffff33;
            box-shadow: 0 4px 30px #0000001a;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);

        }

        .ccontent li .wrapp {
            padding: 0.3rem 1rem 0.001rem 1rem;
        }
        .ccontent li .wrapp a {
            color: white;
        }

        .ccontent li .wrapp div {
            font-weight: 500;
            font-size: 13px;|

        }

        .ccontent li .wrapp p {
            font-weight: 100;
            font-size:10px;
            color: white;
        }

        .ccontent li:hover {
            background-color: #384aeb;
            color: white;
        }
        .cat-list-mobile{
            padding: 25px 15px;
            background-color: white;
            border-bottom: solid 1px #DADADA;
        }
		.sidebar-categories .head {
			line-height: 50px;
			background: #384aeb;
			padding: 0 15px;
			font-weight: 400;
			color: #fff
		}
		.sidebar-categories .head a{
			color: #fff !important
		}

		.sidebar-categories .head a:hover{
			color: #dddddd !important
		}

.sidebar-categories .main-categories {
	padding: 20px 30px;
	width:100%;
	background: #fff
}

.sidebar-categories .main-categories .pixel-radio {
	background: transparent !important
}

.sidebar-categories .main-nav-list a {
	font-size: 14px;
	display: block;
	line-height: 50px;
	padding-left: 10px;
	border-bottom: 1px solid #eee
}

.sidebar-categories .main-nav-list a:hover {
	color: #384aeb
}

.sidebar-categories .main-nav-list a .number {
	color: #cccccc;
	margin-left: 10px
}

.sidebar-categories .main-nav-list a .lnr {
	margin-right: 10px;
	display: none
}

.sidebar-categories .main-nav-list.child a {
	padding-left: 32px
}

.sidebar-filter {
	margin-top: 30px
}

.sidebar-filter .top-filter-head {
	font-family: 'Oswald', sans-serif;
	line-height: 50px;
	background: #384aeb;
	padding: 0 30px;
	font-size: 18px;
	font-weight: 400;
	color: #fff
}

.sidebar-filter .head {
	line-height: 60px;
	padding: 0 30px;
	font-size: 15px;
	font-weight: 400;
	color: #222;
	text-transform: capitalize
}

.sidebar-filter .common-filter {
	background: #f1f6f7;
	border-bottom: 1px solid #eee;
	padding-bottom: 25px
}

.sidebar-filter .common-filter .filter-list {
	position: relative;
	padding-left: 28px
}

.sidebar-filter .common-filter:last-child {
	border-bottom: 0
}

.filter-list {
	line-height: 30px;
	
}

.filter-list i {
	margin-right: 10px;
	cursor: pointer
}

.filter-list .number {
	color: #ccc
}

.filter-list label {
	margin-bottom: 3px;
	cursor: pointer
}

    .footer-mobile {
        background-color: #ffffff;
        padding: 10px;

    }
    .h2-tabbar {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background-color: #fff;
        padding: 20px;
    }
    .tabbar-item {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -ms-flex-preferred-size: 1px;
        flex-basis: 1px;
    }
    .tabbar-item-icon {
        height: 6.4vw;
        vertical-align: middle;
        overflow: hidden;
    }
	
	.sidebar-categories .selected a {
    color: #0074D9; /* Blue */
  }
  
  
	.subcat{
		border: solid 1px #1FA33D;
		display:flex;
		justify-content:center;
		align-items:center;
		align-self:center
	}
	.card-title-cat a{
            color: #274439 !important;
			font-size:12px;
			display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
			
	}
	#myBtn {
		display: none;
		position: fixed;
		bottom: 20px;
		right: 30px;
		z-index: 99;
		font-size: 12px;
		border: none;
		outline: none;
		background-color: #274439;
		color: white;
		cursor: pointer;
		border-radius: 50px;
		width:30px;
		height:30px
	}

	#myBtn:hover {
		background-color: #555;
	}
	@media (max-width: 441px) {
		#myBtn {
			display: none;
			position: fixed;
			bottom: 80px;
			right: 10px;
			z-index: 99;
			font-size: 12px;
			border: none;
			outline: none;
			background-color: #274439;
			color: white;
			cursor: pointer;
			border-radius: 50px;
			width:30px;
			height:30px
		}
	}
	.main-title{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 600;
			font-size: 24px;
			line-height: 68px;
			display: flex;
			align-items: center;
			color: #1B294E;
		}
	
	.card-product__title {
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    white-space: nowrap !important;
}

.blog-banner-area-shop::after {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("../img/shipping.jpg") center no-repeat !important;
    background-size: cover !important;
    z-index: -1
	
}


    </style>
	
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-sJPmzyoLjWlG8Y0lLoWS75C0p5O5JSwma8WXFXk0e0Q2i3q3Drjtd8Ov9X67i6KYGNVz0Ew6/eKhU6DlvhZG7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
    <!-- ================ start banner area for dekstop ================= -->
    <section class="blog-banner-area-shop d-none d-xl-block" id="category">
        <div class="container">
            <div class="blog-banner">
            </div>
        </div>
    </section>
    <!-- ================ end banner area dekstop ================= -->
	
	<!-- ================ start banner area for tab ================= -->
    <section class="blog-banner-area-shop d-none d-sm-block d-xl-none" id="category">
        <div class="container">
            <div class="blog-banner">
            </div>
        </div>
    </section>
    <!-- ================ end banner area dekstop ================= -->
    <section class="section-categories d-block d-sm-none">
		<div class="container my-4">
            <div class="row">
                <div class="col">
                    <h5 style="font-family: 'Nunito', sans-serif;color:#274439">{{isset($maincat2) ? $maincat2->name : ''}}</h5>
                </div>
            </div>
		</div>
            <div class="card px-3 mx-2">
                <div class="card-body px-0">
                    <div class="owl-carousel owl-theme d-flex align-items-center" id="categories">
                             @foreach($maincat1 as $key => $maincats)
							<div class="item ">
                                <div class="card subcat d-flex align-items-center" style="height:60px;color:#274439">
									<div class="mx-2">
										<div class="card-title-cat text-center py-2">
											   <a href="{{route('shop',['id'=>$mainId->main_category_id])}}?subcategory={{$maincats->id}}" class="text-center" style="color:#274439">{{$maincats->name}}</a>
										</div>
									</div>
                                </div>
                            </div>
							@endforeach
							<!--<div class="item ">
                                <div class="card subcat" style="height:60px">
									<div>
										<div class="card-title-cat text-center py-2">
											<a href="#" class="text-center">Glucose Test Accessories</a>
										</div>
									</div>
                                </div>
								<div class="card subcat mt-2" style="height:60px">
									<div>
										<div class="card-title-cat text-center py-2">
											<a href="#" class="text-center">Orthotic Support</a>
										</div>
									</div>
                                </div>
                            </div>
							<div class="item ">
                                <div class="card subcat" style="height:60px">
									<div>
										<div class="card-title-cat text-center py-2">
											<a href="#" class="text-center">Glucose Test Meter</a>
										</div>
									</div>
                                </div>
								<div class="card subcat mt-2" style="height:60px">
									<div>
										<div class="card-title-cat text-center py-2">
											<a href="#" class="text-center">Pain Management</a>
										</div>
									</div>
                                </div>
                            </div>-->
                    </div>
                </div>
            </div>

    </section>
 <!-- ================ end banner area tab ================= -->
    <!--section class="section-categories d-none d-sm-block d-xl-none">
		<div class="container my-4">
            <div class="row">
                <div class="col">
                    <h5 style="font-family: 'Nunito', sans-serif;color:#274439">{{isset($maincat2) ? $maincat2->name : ''}}</h5>
                </div>
            </div>
		</div>
            <div class="card px-3 mx-2">
                <div class="card-body px-0">
                    <div class="owl-carousel owl-theme d-flex align-items-center" id="categories2">
                             @foreach($maincat1 as $key => $maincats)
							<div class="item ">
                                <div class="card subcat d-flex align-items-center" style="height:60px;color:#274439">
									<div class="mx-2">
										<div class="card-title-cat text-center py-2">
											   <a href="{{route('shop',['id'=>$mainId->main_category_id])}}?subcategory={{$maincats->id}}" class="text-center" style="color:#274439">{{$maincats->name}}</a>
										</div>
									</div>
                                </div>
                            </div>
							@endforeach
							<!--<div class="item ">
                                <div class="card subcat" style="height:60px">
									<div>
										<div class="card-title-cat text-center py-2">
											<a href="#" class="text-center">Glucose Test Accessories</a>
										</div>
									</div>
                                </div>
								<div class="card subcat mt-2" style="height:60px">
									<div>
										<div class="card-title-cat text-center py-2">
											<a href="#" class="text-center">Orthotic Support</a>
										</div>
									</div>
                                </div>
                            </div>
							<div class="item ">
                                <div class="card subcat" style="height:60px">
									<div>
										<div class="card-title-cat text-center py-2">
											<a href="#" class="text-center">Glucose Test Meter</a>
										</div>
									</div>
                                </div>
								<div class="card subcat mt-2" style="height:60px">
									<div>
										<div class="card-title-cat text-center py-2">
											<a href="#" class="text-center">Pain Management</a>
										</div>
									</div>
                                </div>
                            </div>-->
                    <!--/div>
                </div>
            </div>

    </section-->


    <!-- ================ Start Categories area Mobile ================= -->
    <section class="mt-3 mb-3  d-block d-sm-none">
	{{--<div class="container">
           @foreach($maincat as $key => $maincats)
					@if($maincats->subcat()->count() > 0)
					  <div class="sidebar-categories @if($key != 0) mt-4 @endif" style="border-radius: 10px; background-color:#ffffff">
						<div class="head main-category" data-toggle="collapse" href="#main-cat-{{$maincats->id}}" role="button" aria-expanded="false" aria-controls="main-cat-{{$maincats->id}}">
						  <i class="fa fa-plus-circle mr-2" ></i> {{$maincats->name}}
						</div>
						<ul id="main-cat-{{$maincats->id}}" class="main-categories collapse @if(request()->has('subcategory') && $maincats->subcat()->where('id', request()->input('subcategory'))->exists()) show @endif">
						  @foreach($maincats->subcat()->get() as $subcat)
							<li class="filter-list @if(request()->input('subcategory') == $subcat->id) selected @endif">
							  <!--<a href="{{route('shop')}}?subcategory={{$subcat->id}}" onclick="scrollToProducts(event)">{{$subcat->name}}</a>-->
							  <a href="{{route('shop')}}?subcategory={{$subcat->id}}" onclick="scrollToProducts(event, this.href)">{{$subcat->name}}</a>

							</li>
						  @endforeach
						</ul>
					  </div>
					@endif
				  @endforeach
	</div>--}}
	
	
		<section id="productsScroll" class="section-margin--small mb-5 d-block d-sm-none">
            <div class="container">
			{{--<div class="row">
                    <div class="mb-1 col">
                        <h5>Products</h5>
                    </div>
				</div>--}}
				<div class="row">
					@foreach($product as $products)
					<div class="col-sm-3 col-6">
						<div class="card card-product" style="width:150px;height:auto">
							<div class="card-product__img text-center"  style="width:150px;height:150px">
								@if($products->image()->first())
								<img class="card-img" src="{{asset('storage/'.$products->image()->first()->image)}}" alt="" style="height:100%;width: 100%; object-fit: cover;border-radius:10px">
								@else
									<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
								@endif
							</div>
							<div class="p-2">
								<p class="card-cate" style="font-size:10px;color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
								<p><a href="{{route('showProduct',['id'=>$products->id])}}" class="title text-truncate" style="font-size:14px;color:#274439">{{$products->name}}</a></p>
								<div class="d-flex align-items-center mb-1">
									@php
									$rating = $products->ratings()->avg('rating');
									$full_stars = floor($rating);
									$half_stars = ceil($rating - $full_stars);
									$empty_stars = 5 - $full_stars - $half_stars;
									@endphp
									@for($i=0; $i<$full_stars; $i++)
										<small class="fa fa-star btn-star mr-1"></small>
									@endfor
									@for($i=0; $i<$half_stars; $i++)
										<small class="fa fa-star-half-o btn-star mr-1"></small>
									@endfor
									@for($i=0; $i<$empty_stars; $i++)
										<small class="fa fa-star-o btn-star mr-1"></small>
									@endfor
										<small>({{$products->ratings()->count()}})</small>
									</div>
								<p class="price" style="font-size:10px;color:#274439">RM {{$products->list_price_on_store}}</p>
							</div>
						</div>
					</div>
				@endforeach
				</div>
			</div>
		</section>
    </section>


    <!-- ================ category section start desktop ================= -->
    <section class="section-margin--small mb-5 d-none d-xl-block">
        <div class="container">
            <div class="row">
                <!--div class="col-xl-3 col-lg-4 col-md-5 	">
                    <div class="head mb-3"  style="font-family: 'Nunito'; sans-serif;color:#293A8B;font-size:18px;font-weight:700">Category</div>
                    @foreach($maincat as $key => $maincats)
                        <div class="sidebar-categories  @if($key != 0) mt-4 @endif" style="border-radius: 10px'background-color:#ffffff">
                            <div class="head"><a href="{{route('shop').'?id='.$maincats->id}}">{{$maincats->name}}</a></div>

                            @if($maincats->subcat()->count() > 0)
                                <ul class="main-categories">
                                    <li class="common-filter">
                                        <ul>
                                            @foreach($maincats->subcat()->get() as $subcat)
                                                <li class="filter-list"><a href="{{route('shop').'?id='.$maincats->id}}" >{{$subcat->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div-->
				<div class="col-xl-3 col-lg-4 col-md-5">
				  <div class="mb-3 main-title" style="color:#274439">Category test</div>
				  @foreach($maincat as $key => $maincats)
					@if($maincats->subcat()->count() > 0)
					  <div class="sidebar-categories @if($key != 0) mt-4 @endif" style="border-radius: 10px; background-color:#274439">
						<div class="head main-category" data-toggle="collapse" style="background-color:#274439;font-family: 'Nunito'; sans-serif;font-size:14px" href="#main-cat-{{$maincats->id}}" role="button" aria-expanded="false" aria-controls="main-cat-{{$maincats->id}}">
						  <i class="fa fa-plus-circle mr-2"></i> {{$maincats->name}}
						</div>
						<ul id="main-cat-{{$maincats->id}}" class="main-categories collapse @if(request()->has('subcategory') && $maincats->subcat()->where('id', request()->input('subcategory'))->exists()) show @endif">
						  @foreach($maincats->subcat()->get() as $subcat)
							<li class="filter-list @if(request()->input('subcategory') == $subcat->id) selected @endif">
							  <a style="color:#274439;font-family: -apple-system, BlinkMacSystemFont, sans-serif;"  href="{{route('shop')}}?subcategory={{$subcat->id}}" >{{$subcat->name}}</a>
							</li>
						  @endforeach
						</ul>
					  </div>
					@endif
				  @endforeach
				</div>



                <div class="col-xl-9 col-lg-8 col-md-7">

                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            @foreach($product as $products)
                                <div class="col-md-6 col-lg-4" style="padding-bottom:100px">
                                    <div class="card card-product">
                                        <a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}">
											<div class="card-product__img">
                                            @if($products->image()->first())
												
                                                <img style="height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('storage/'.$products->image()->first()->image)}}" alt="">
											@else
												<img src="{{asset('admin/assets/img/avatars/default_product.png')}}"
													style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
                                            @endif
											</div>
                                        </a>
                                        <div class="py-2">
                                            <p class="card-cate" style="color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name  :''}}</p>
                                            <p><a class="title prodName" href="{{route('showProduct',['id'=>$products->id])}}" style="color:#274439">{{$products->name}}</a></p>

                                            <div class="d-flex align-items-center mb-1">
											@php
												$rating = $products->ratings()->avg('rating');
												$full_stars = floor($rating);
												$half_stars = ceil($rating - $full_stars);
												$empty_stars = 5 - $full_stars - $half_stars;
											@endphp
											@for($i=0; $i<$full_stars; $i++)
												<small class="fa fa-star btn-star mr-1"></small>
											@endfor
											@for($i=0; $i<$half_stars; $i++)
												<small class="fa fa-star-half-o btn-star mr-1"></small>
											@endfor
											@for($i=0; $i<$empty_stars; $i++)
												<small class="fa fa-star-o btn-star mr-1"></small>
											@endfor
											<small>({{$products->ratings()->count()}})</small>
											</div>
											<p class="price">{{$products->list_price_on_store}}</p>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                {{$product->onEachSide(1)->links()}}
                            </ul>
                        </nav>

                    </section>
                    <!-- End Best Seller -->
                </div>
            </div>
        </div>
    </section>
    <!-- ================ category section end ================= -->
	
	<!-- ================ category section start tab ================= -->
    <section class="section-margin--small mb-5 d-none d-sm-block d-xl-none">
        <div class="container">
            <div class="row">
                <!--div class="col-xl-3 col-lg-4 col-md-5 	">
                    <div class="head mb-3"  style="font-family: 'Nunito'; sans-serif;color:#293A8B;font-size:18px;font-weight:700">Category</div>
                    @foreach($maincat as $key => $maincats)
                        <div class="sidebar-categories  @if($key != 0) mt-4 @endif" style="border-radius: 10px'background-color:#ffffff">
                            <div class="head"><a href="{{route('shop').'?id='.$maincats->id}}">{{$maincats->name}}</a></div>

                            @if($maincats->subcat()->count() > 0)
                                <ul class="main-categories">
                                    <li class="common-filter">
                                        <ul>
                                            @foreach($maincats->subcat()->get() as $subcat)
                                                <li class="filter-list"><a href="{{route('shop').'?id='.$maincats->id}}" >{{$subcat->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    @endforeach
                </div-->
				<div class="col-xl-3 col-lg-4 col-md-3">
				  <div class="mb-3 main-title" style="color:#274439">Category</div>
				  @foreach($maincat as $key => $maincats)
					@if($maincats->subcat()->count() > 0)
					  <div class="sidebar-categories @if($key != 0) mt-4 @endif" style="border-radius: 10px; background-color:#274439">
						<div class="head main-category" data-toggle="collapse" style="background-color:#274439;font-family: 'Nunito'; sans-serif;font-size:14px" href="#main-cat-{{$maincats->id}}" role="button" aria-expanded="false" aria-controls="main-cat-{{$maincats->id}}">
						  <i class="fa fa-plus-circle mr-2"></i> {{$maincats->name}}
						</div>
						<ul id="main-cat-{{$maincats->id}}" class="main-categories collapse @if(request()->has('subcategory') && $maincats->subcat()->where('id', request()->input('subcategory'))->exists()) show @endif">
						  @foreach($maincats->subcat()->get() as $subcat)
							<li class="filter-list @if(request()->input('subcategory') == $subcat->id) selected @endif">
							  <a style="color:#274439;font-family: -apple-system, BlinkMacSystemFont, sans-serif;"  href="{{route('shop')}}?subcategory={{$subcat->id}}" >{{$subcat->name}}</a>
							</li>
						  @endforeach
						</ul>
					  </div>
					@endif
				  @endforeach
				</div>

                <div class="col-xl-9 col-lg-8 col-md-9">

                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            @foreach($product as $products)
                                <div class="col-md-6 col-lg-4" style="padding-bottom:100px">
                                    <div class="card card-product">
                                        <a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}">
											<div class="card-product__img">
                                            @if($products->image()->first())
												
                                                <img style="height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('storage/'.$products->image()->first()->image)}}" alt="">
											@else
												<img src="{{asset('admin/assets/img/avatars/default_product.png')}}"
													style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
                                            @endif
											</div>
                                        </a>
                                        <div class="py-2">
                                            <p class="card-cate" style="color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name  :''}}</p>
                                            <p><a class="title prodName" href="{{route('showProduct',['id'=>$products->id])}}" style="color:#274439">{{$products->name}}</a></p>

                                            <div class="d-flex align-items-center mb-1">
											@php
												$rating = $products->ratings()->avg('rating');
												$full_stars = floor($rating);
												$half_stars = ceil($rating - $full_stars);
												$empty_stars = 5 - $full_stars - $half_stars;
											@endphp
											@for($i=0; $i<$full_stars; $i++)
												<small class="fa fa-star btn-star mr-1"></small>
											@endfor
											@for($i=0; $i<$half_stars; $i++)
												<small class="fa fa-star-half-o btn-star mr-1"></small>
											@endfor
											@for($i=0; $i<$empty_stars; $i++)
												<small class="fa fa-star-o btn-star mr-1"></small>
											@endfor
											<small>({{$products->ratings()->count()}})</small>
											</div>
											<p class="price">{{$products->list_price_on_store}}</p>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                {{$product->onEachSide(1)->links()}}
                            </ul>
                        </nav>

                    </section>
                    <!-- End Best Seller -->
                </div>
            </div>
        </div>
    </section>
    <!-- ================ category section end ================= -->
	

    
@endsection

@section('script')
<script>

function scrollToProducts(event) {
   function scrollToProducts(event, href) {
  event.preventDefault();
  const target = $(href);
  $('html, body').animate({
    scrollTop: target.offset().top
  }, 1000);
  window.location.href = href;
}

}
</script>

    <script>
        var owl = $('#bannerslide');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true
        });
    </script>
	<script>
  $(document).ready(function() {
    // Check if a subcategory is currently selected
    if($('.sidebar-categories .selected').length > 0) {
      // Expand the main category menus for the currently selected subcategory
      $('.sidebar-categories .selected').parents('.main-categories').addClass('show');
    }
  });
  
  if($('.owl-carousel').length > 0){
            $('#categories').owlCarousel({
                loop:false,
                nav:false,
                navText: false,
                dots: false,
				margin:8,
                responsive:{
                    0:{
                        items:4,
                        loop:false

                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3
                    },
                    1130:{
                        items:4
                    }
                }
            })
        }
		if($('.owl-carousel').length > 0){
            $('#categories2').owlCarousel({
                loop:false,
                nav:false,
                navText: false,
                dots: false,
				margin:8,
                responsive:{
                    0:{
                        items:4,
                        loop:false

                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3
                    },
                    1130:{
                        items:4
                    }
                }
            })
        }
</script>

	<script>
		// Get the button
		let mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
			mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>




@endsection

