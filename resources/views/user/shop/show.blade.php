@extends('layouts.app')
@section('addstyle')
    <style>
        .btn-star {
            color: #fbd600 !important;
        }

        .card-product__title a{
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product_text {
            color: rgba(222,222,222,0.84);
            -webkit-text-fill-color: #555
        }
        @media (min-width: 1000px) {
            .imgVendor{
                border-radius: 5px;
                border:solid 1px #D9D9D9;
                width: 150px;
                height:150px
            }
        }
        @media (max-width: 400px) {
            .imgVendor{
                border-radius: 60px;
                width: 100px;
                height:100px
            }
        }
        .vendor-banner-area {
            height: 280px;
            position: relative;
            z-index: 1
        }

        @media (min-width: 1000px) {
            .vendor-banner-area {
                height: 410px
            }
        }

        .vendor-banner-area .blog-banner {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            transform: translate(-50%, -50%)
        }
        .vendor-banner-area::after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("img/vendor/shopBanner.png")center no-repeat !important;
            background-size: contain !important;
            z-index: -1;
            margin-top: 50px;
        }
        .voucher{
            background-color: #e9edff;
            padding: 20px;
            border-radius: 10px;
        }

        @media (max-width: 441px) {
            .vouchercontainer{
                background-color: #e9edff;
                padding: 10px;
                border-radius: 10px;
            }

            .voucher{
                background-color: #e9edff;
                padding: 20px;
                border-radius: 10px;
            }
        }


        .discount{
            color: #384aeb;
            font-weight: bold;
            font-size: 16px;
        }
        .expired{
            color: #384aeb;
        }
        .button-login{
            padding:.25rem .5rem;font-size:.875rem;line-height:1.5;border-radius:.2rem
        }
        .disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        #vourcherCarousel .owl-prev,
        #vourcherCarousel .owl-next {
            width: 40px;
            height: 40px;
            background: #f1f6f7
        }

        #vourcherCarousel .owl-prev i,
        #vourcherCarousel .owl-prev span,
        #vourcherCarousel .owl-next i,
        #vourcherCarousel .owl-next span {
            font-size: 15px;
            color: #384aeb;
            line-height: 40px
        }

        #vourcherCarousel .owl-prev:hover,
        #vourcherCarousel .owl-next:hover {
            background: #384aeb
        }

        #vourcherCarousel .owl-prev:hover i,
        #vourcherCarousel .owl-prev:hover span,
        #vourcherCarousel .owl-next:hover i,
        #vourcherCarousel .owl-next:hover span {
            color: #fff
        }

        #vourcherCarousel .owl-prev {
            position: absolute;
            top: 30%;
            transform: translateY(-30%);
            left: -20px
        }

        @media (min-width: 1340px) {
            #vourcherCarousel .owl-prev {
                left: -105px
            }
        }

        #vourcherCarousel .owl-next {
            position: absolute;
            top: 30%;
            transform: translateY(-30%);
            right: -20px
        }

        @media (min-width: 1340px) {
            #vourcherCarousel .owl-next {
                right: -105px
            }
        }

        .vendorname{
            font-size: 16px;
            color :white;
        }

        .vendorproduct{
            font-size: 12px;
            color :white;
        }
        .btn-follow{
            color: #fff;
            background-color: #384aeb;
            border-color: #384aeb;

        }


        .card-vourcher  {
            /* max-width: 25rem; */
            /* padding: 0; */
            border: none;
            border-radius: 0;
            color: white;

            /* border-radius: 0.5rem; */

        }

        a.active {
            border-bottom: 2px solid #9CF4A0;
        }

        .nav-link {
            color: rgb(110, 110, 110);
            font-weight: 500;
        }
        .nav-link-style {
            font-weight: 400;
            font-size: 14px;
            color: rgba(0,0,0,.87);
        }
        .nav-link:hover {
            color: #384aeb;
        }

        .nav-pills .nav-link.active {
            color: #384aeb;
            background-color: white;
            border-radius: 0.5rem 0.5rem 0 0;
            font-weight: 600;
        }

        @media (max-width: 411px) {
            .tab-content {
                border-left: none;
                border-right: none;
                border-bottom: none;
                padding: 0px 0px 0px 0px
            }

            .small-title {
                font-size: 16px;
                font-weight: 100
            }
        }

        .category-name{
            color:#384AEB ;
            font-size: 12px;
            font-weight: 100px
        }

        .card-product {
            height:350px
        }
        /* .form-control {
          background-color: rgb(241, 243, 247);
          border: none;
        } */

        /* 3nd card */
        /* span {
          margin-left: 0.5rem;
          padding: 1px 10px;
          color: white;
          background-color: rgb(143, 143, 143);
          border-radius: 4px;
          font-weight: 600;
        } */

        /* .third {
          padding: 0 1.5rem 0 1.5rem;
        } */

        label {
            font-weight: 500;
            color: rgb(104, 104, 104);
        }

        .btn-success {
            float: right;
        }

        .form-control:focus {
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 7px rgba(0, 0, 0, 0.2);
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            text-indent: 1px;
            text-overflow: "";
        }

        /* 1st card */

        ul {
            list-style: none;
            margin-top: 1rem;
            padding-inline-start: 0;
        }

        .search {
            padding: 0 1rem 0 1rem;
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
            color: #384aeb;
        }
        .ccontent li .wrapp div {
            font-weight: 500;
            font-size: 13px;
            color: #384aeb;
        }

        .ccontent li .wrapp p {
            font-weight: 100;
            font-size:10px;
            color: #384aeb;
        }

        /* 2nd card */

        .addinfo {
            padding: 0 1rem;
        }
        .vendor{
            background-image: url("img/vendor/cover.png")center no-repeat !important;
            background-size: cover !important;
        }
        .container_vendor{
            padding: 40px 30px 10px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            z-index: -1;
            height: 150px;
            background-image: url({{asset('/img/vendor/cover.jpg')}});
        }
        .shop-name{
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 400;
            color: #030303;
        }
        .shop-detail{
            font-size: 12px;
        }
        .rectangle {
            background: #FFFFFF;
            left: 0px;
            padding: 10px 17px 10px 17px;
        }
        .store-name{
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 500;
            color:#384AEB;
        ;
        }
        .card{
            border: 0px;
        }
        .border-1{
            border: 1px solid rgba(0,0,0,.125);
            border-radius: 10px;
        }
        .text-small{
            font-family: 'Roboto', sans-serif;
            font-size: 10px;
        }
        .real-price{
            color: #9E9E9E;
            text-decoration:line-through;
            font-weight: 400;
        }
        .diskaun{
            color:#384AEB;
        }
        .img-fluid_edit{
            max-width: 100%;
            height: 100px;
        }
		.rating{
			color:#777777
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
		
	.sidebar-categories {
	  margin-bottom: 20px;
	}
	.sidebar-categories .head {
	  display: flex;
	  justify-content: space-between;
	  align-items: center;
	  padding: 10px;
	  background-color: #fff;
	  border:solid 1px #1FA33D;
	  border-radius: 10px;
	}
	.sidebar-categories .head a {
	  text-decoration: none;
	  font-size: 18px;
	  font-weight: 600;
	  color: #274439;
	}
	.sidebar-categories .head a:hover {
	  color: #274439;
	}
	.sidebar-categories .main-categories {
	  padding-left: 20px;
	}
	.sidebar-categories .filter-list {
	  margin-bottom: 10px;
	}
	.sidebar-categories .filter-list a {
	  font-size: 16px;
	  color: #274439;
	}
	.sidebar-categories .filter-list a:hover {
	  color: #274439;
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
			background-color: #384AEB;
			color: white;
			cursor: pointer;
			border-radius: 50px;
			width:30px;
			height:30px
		}
	}
	
	.operating-hours-summary {
		display: inline-block;
		width: 100%; /* adjust as needed */
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
		.box{
			background: #ffffff33;
			border-radius: 10px;
			box-shadow: 0 4px 30px #0000001a;
			backdrop-filter: blur(5px);
			-webkit-backdrop-filter: blur(5px);
			padding:20px 30px;
			width:100%
		}
		.image {
			height: 100%;
			width: 100%;
			object-fit: cover;
		}
    </style>
@endsection
@section('content')

	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

    <!--================Single Product Area for desktop =================-->
    {{--    Dekstop View--}}
    <div class="product_image_area d-none d-xl-block py-2 my-3">
        <div class="card-image" style="padding:0 100px">
            <div class="row s_product_inner box">
                <div class="col-lg-12 d-flex ml-2 col-sm-4 d-flex align-items-center">
                    <div class="col-sm-12 col-lg-2 ">
                        <img class="img-fluid imgVendor mr-3" src="{{asset('storage/'.$vendor->profile_image)}}" alt="">
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <h4 style="font-family: 'Nunito', sans-serif;color:#274439;">{{$vendor->name}}</h4>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
							@php
								$rating = $vendor->ratings()->avg('rating');
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
							
                            </div>
                        </div>
                        <small class="pt-1" style="color:#274439">({{$vendor->ratings()->count()}} Reviews)</small>
                    </div>

                    <div class="col-lg-5">
                        <div class="d-flex">
                            <div>
                                <i style="color:#1FA33D;" class="fa fa-map-pin mr-3"></i>
                            </div>
                            <div>
                                <p>{{$vendor->user_address->first() ? $vendor->user_address->first()->address : ''}} {{$vendor->user_address->first() ? $vendor->user_address->first()->city : ''}} {{$vendor->user_address->first() ? $vendor->user_address->first()->postalcode : ''}} {{$vendor->user_address->first() ? $vendor->user_address->first()->state : ''}}</p>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div>
                                <i style="color:#1FA33D;" class="fa fa-phone mr-3"></i>
                            </div>
                            <div>
                                <p>{{$vendor->phone}}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
		</div>
		<section class="section mt-5">
            <div class="card-image" style="padding:0 100px">				
				<div class="row box">
					<div class="col d-flex align-items-center">
						<div style="width:100%">
							<img class="image" src="{{asset('img/shop-banner.jpg')}}" width="100" alt="" >
						</div>
					</div>
					<div class="col">
						<h2 class="main-title">About Shop</h2>
						<p>{{ isset($operatingHours) ? $operatingHours->tagline : '' }}</p>
						<p class="operating-hours-summary">{!! nl2br(preg_replace("/\r|\n/", " ", isset($operatingHours) ? $operatingHours->summary : '')) !!}</p>
					{{--<div class="section-intro">
							<h2 class="main-title">Operating Hours</h2>
						</div>
						<table>
						@if(!empty($operatingHours))
						<tr>
							<td class="pr-3">Monday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->monday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->monday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Tuesday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->tuesday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->tuesday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Wednesday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->wednesday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->wednesday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Thursday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->thursday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->thursday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Friday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->friday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->friday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Saturday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->saturday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->saturday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Sunday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->sunday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->sunday_to ?? '')->format('h:i A') }}</td>
						</tr>
						@else
						<tr>
							<td colspan="2">Operating hours not available</td>
						</tr>
						@endif
					</table>--}}
					</div>

				
				</div>
			</div>
		</section>
		
		
		
		@foreach($voucher as $vouchers)
		<div class="product_image_area d-none d-xl-block">
			<div class="card-image" style="padding:0 100px">
				<div class="box">	
					<div class="owl-carousel owl-theme" id="vourcherCarousel">
                            
                                <div class="voucher d-flex align-items-center ">
                                    <div class="mr-2">
                                        @if(isset($vouchers->productImage[0]))
                                            <img src="{{asset('storage/'.$vouchers->productImage[0]->image)}}" style="width: 50px;height: 50px"/>
                                        @else
                                            <img src="{{asset('img/coupon.png')}}" style="width: 50px;height: 50px"/>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="discount mb-0">{{$vouchers->value}} {{$vouchers->unit_value}} Off</p>
                                        <p >Min. Spend RM1 Capped at RM5</p>
                                        @php
											$start_date = new DateTime($vouchers->start_at);
											$end_date = new DateTime($vouchers->end_at);
											$interval = $start_date->diff($end_date);
											$days_left = $interval->days;
										@endphp
										<div class="d-flex justify-content-between">
											<small class="expired">Expiring: {{ $days_left }} days left</small>
											<button class="button button-login">Claim</button>
										</div>

                                    </div>
                                </div>
                            
                        </div>
				</div>
			</div>
        </div>
		@endforeach
		
        
		
                <section class="section mt-5">
                    <div class="card-image" style="padding-left:100px;padding-right:100px">
                        <div class="section-intro pt-3 pb-3">
                            {{-- <p>Popular Item in the market</p> --}}
                            <h2 class="main-title" style="color:#274439">New Products</h2>
                        </div>
                        <div class="row">
                            @forelse($newproduct as $products)
                            <div class="col-sm-3 col-4" style="padding-bottom:10px">
                                <div class="card card-product">
                                    <a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}">
										<div class="card-product__img">
                                        @if(isset($products->image[0]))
                                            <img class="card-img" src="{{asset('storage/'.$products->image[0]->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                        @else
										
                                            <img class="card-img" src="{{asset('admin/assets/img/avatars/default_product.png')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                        @endif
										</div>
									</a>
                                    <div class="py-2 ">
                                        <p class="card-cate" style="color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                        <p><a href="{{route('showProduct',['id'=>$products->id])}}" class="title" style="color:#274439">{{$products->name}}</a></p>
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
											<small>({{ $products->ratings->count() }})</small>
                                        </div>
										<p class="price" style="color:#274439">RM{{$products->list_price_on_store}}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-sm-2 col-4"><p>No New Product Found</p></div>
                            @endforelse
                        </div>
                    </div>

                </section>
				
				<section class="section-margin--small d-none d-xl-block mb-0" id="target-section">
                    <div class="container container-home bg-white">
                        <div class="row py-4">
                            <div class="col-xl-3 col-lg-2 col-md-3">
							<div class="head main-title pl-3 mb-3 d-flex align-items-center" style="color:#274439"><i class="fa fa-list mr-3" style="color:#274439"></i>Category</div>
							
                                <div class="sidebar-categories" style="border-radius: 10px;color:#274439" >
									@foreach($mainCategories as $key => $mainCategory) <!--The $key variable in a foreach loop represents the current iteration number of the loop.-->
									@if($mainCategory->subcat && $mainCategory->subcat->count() > 0)
										<div class="sidebar-categories @if($key != 0) mt-4 @endif" style="border-radius: 10px; background-color: #ffffff">
											<div class="head main-category"  role="button">
										      
												<a href="javascript:void(0);" style="font-family: 'Nunito', sans-serif;color:#274439;" class="category-toggle">
													{{ $mainCategory->name }}
												</a>
											</div>
											<ul class="main-categories">
												<li class="common-filter">
													<!--ul>
														@foreach($mainCategory->subcat as $subCategory)
															@php
																$productCount = $subCategory->products()->where('vendor_id', $id)->count();
															@endphp
															@if($productCount > 0)
																<li class="filter-list">
																	<a href="{{ route('shop.show', ['id' => $id,'subcategory' => $subCategory->id]) }}">
																		{{ $subCategory->name }}
																	</a>
																</li>
															@endif
														@endforeach
													</ul-->
													
													<ul>
														@foreach($mainCategory->subcat as $subCategory)
															@php
																$productCount = $subCategory->products()->where('vendor_id', $id)->count();
																$selected = ($subCategory->id == $selectedSubCategoryId) ? 'font-weight-bold' : '';
															@endphp
															@if($productCount > 0)
																<li class="filter-list {{ $selected }}">
																	<a href="{{ route('shop.show', ['id' => $id,'subcategory' => $subCategory->id]) }}#target-section" style="color:#1FA33D">
																		{{ $subCategory->name }}
																	</a>
																</li>
															@endif
														@endforeach
													</ul>




												</li>
											</ul>
										</div>
									@endif
								@endforeach




                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-10 col-md-9">
                                <section class="lattest-product-area category-list">
                                    <div class="row pb-5">
                                        @foreach($product as $products)
                                            <div class="col-md-6 col-lg-4" style="padding-bottom:10px">
                                                <div class="card card-product">
													<a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}">
														<div class="card-product__img">
                                                        @if(isset($products->image[0]))
															
                                                            <img src="{{asset('storage/'.$products->image[0]->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                        @else
                                                            <img src="{{asset('admin/assets/img/avatars/default_product.png')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                        @endif
														</div>
													</a>
                                                    <div class="py-2">
                                                        <p class="card-cate" style="color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                                        <p><a href="{{route('showProduct',['id'=>$products->id])}}" class="title" style="color:#274439">{{$products->name}}</a></p>
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
															<small>({{ $products->ratings->count() }})</small>
                                                        </div>
														<p class="price" style="color:#274439">RM {{$products->list_price_on_store}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                <nav class="blog-pagination justify-content-center d-flex pb-0">
									<ul class="pagination">
									  {{$product->appends(['tab' => request()->get('tab'), 'page' => $product->currentPage(), 'sort' => $sort])->links()}}

									</ul>
								</nav>


                                </section>
                                <!-- End Best Seller -->
                            </div>
                        </div>
                    </div>
                </section>
				
                <section class="section mt-5">
                    <div class="card-image" style="padding-left:100px;padding-right:100px">
                        <div class="section-intro pt-3 pb-3">
                            {{-- <p>Popular Item in the market</p> --}}
                            <h2 class="main-title" style="color:#274439">{{$vendor ? $vendor->name : ''}}</h2>
                        </div>
                        <div class="row">
                            @forelse($product as $products)
                            <div class="col-sm-3 col-4" style="padding-bottom:10px">
                                <div class="card card-product">
									<a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}">
										<div class="card-product__img">
                                        @if(isset($products->image[0]))
											
                                            <img class="card-img" src="{{asset('storage/'.$products->image[0]->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                        @else
                                            <img class="card-img" src="{{asset('admin/assets/img/avatars/default_product.png')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                        @endif
										</div>
									</a>
                                    <div class="py-2">
                                        <p class="card-cate" style="color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                        <p><a href="{{route('showProduct',['id'=>$products->id])}}" class="title" style="color:#274439">{{$products->name}}</a></p>
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
											<small>({{ $products->ratings->count() }})</small>
                                        </div>
										<p class=" price" style="color:#274439">RM{{$products->list_price_on_store}}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-sm-2 col-4"><p>No Product Found</p></div>
                            @endforelse
						</div>
					</div>
                </section>
				
				
                
                {{--<div class="product_image_area d-none d-xl-block" style="padding-top: 20px">
                    <div class="container" style="background: #ffffff33;border-radius: 10px;box-shadow: 0 4px 30px #0000001a;backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);padding: 50px 20px">
                        <div class="d-flex">
                            <div>
                                <i class="fa fa-map-pin mr-3"></i>
                            </div>
                            <div>
                                <p>{{$address->user_address->first() ? $address->user_address->first()->address : ''}} {{$address->user_address->first() ? $address->user_address->first()->city : ''}} {{$address->user_address->first() ? $address->user_address->first()->postalcode : ''}} {{$address->user_address->first() ? $address->user_address->first()->state : ''}}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div>
                                <i class="fa fa-phone mr-3"></i>
                            </div>
                            <div>
                                <p>{{$address->user_address->first() ? $address->user_address->first()->phone : ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>--}}
	</div>
	
	{{--    Tab View--}}
    <div class="product_image_area d-none d-sm-block d-xl-none py-2 my-3">
        <div class="card-image" style="padding:0 100px">
            <div class="row s_product_inner box">
                <div class="col-lg-12 d-flex ml-2 col-sm-4 d-flex align-items-center">
                    <div class="col-sm-12 col-lg-2 ">
                        <img class="img-fluid imgVendor mr-3" src="{{asset('storage/'.$vendor->profile_image)}}" alt="">
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <h4 style="font-family: 'Nunito', sans-serif;color:#274439;">{{$vendor->name}}</h4>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
							@php
								$rating = $vendor->ratings()->avg('rating');
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
							
                            </div>
                        </div>
                        <small class="pt-1" style="color:#274439">({{$vendor->ratings()->count()}} Reviews)</small>
                    </div>

                    <div class="col-lg-5">
                        <div class="d-flex">
                            <div>
                                <i style="color:#1FA33D;" class="fa fa-map-pin mr-3"></i>
                            </div>
                            <div>
                                <p>{{$vendor->user_address->first() ? $vendor->user_address->first()->address : ''}} {{$vendor->user_address->first() ? $vendor->user_address->first()->city : ''}} {{$vendor->user_address->first() ? $vendor->user_address->first()->postalcode : ''}} {{$vendor->user_address->first() ? $vendor->user_address->first()->state : ''}}</p>
                            </div>
                        </div>
                        <div class="d-flex mt-3">
                            <div>
                                <i style="color:#1FA33D;" class="fa fa-phone mr-3"></i>
                            </div>
                            <div>
                                <p>{{$vendor->phone}}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
		</div>
		<section class="section mt-5">
            <div class="card-image" style="padding:0 100px">				
				<div class="row box">
					<div class="col d-flex align-items-center">
						<div style="width:100%">
							<img class="image" src="{{asset('img/shop-banner.jpg')}}" width="100" alt="" >
						</div>
					</div>
					<div class="col">
						<h2 class="main-title">About Shop</h2>
						<p>{{ isset($operatingHours) ? $operatingHours->tagline : '' }}</p>
						<p class="operating-hours-summary">{!! nl2br(preg_replace("/\r|\n/", " ", isset($operatingHours) ? $operatingHours->summary : '')) !!}</p>
					{{--<div class="section-intro">
							<h2 class="main-title">Operating Hours</h2>
						</div>
						<table>
						@if(!empty($operatingHours))
						<tr>
							<td class="pr-3">Monday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->monday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->monday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Tuesday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->tuesday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->tuesday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Wednesday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->wednesday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->wednesday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Thursday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->thursday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->thursday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Friday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->friday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->friday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Saturday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->saturday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->saturday_to ?? '')->format('h:i A') }}</td>
						</tr>
						<tr>
							<td class="pr-3">Sunday:</td>
							<td>{{ \Carbon\Carbon::parse($operatingHours->sunday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->sunday_to ?? '')->format('h:i A') }}</td>
						</tr>
						@else
						<tr>
							<td colspan="2">Operating hours not available</td>
						</tr>
						@endif
					</table>--}}
					</div>

				
				</div>
			</div>
		</section>
		
		
		
		@foreach($voucher as $vouchers)
		<div class="product_image_area d-none d-xl-block">
			<div class="card-image" style="padding:0 100px">
				<div class="box">	
					<div class="owl-carousel owl-theme" id="vourcherCarousel">
                            
                                <div class="voucher d-flex align-items-center ">
                                    <div class="mr-2">
                                        @if(isset($vouchers->productImage[0]))
                                            <img src="{{asset('storage/'.$vouchers->productImage[0]->image)}}" style="width: 50px;height: 50px"/>
                                        @else
                                            <img src="{{asset('img/coupon.png')}}" style="width: 50px;height: 50px"/>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="discount mb-0">{{$vouchers->value}} {{$vouchers->unit_value}} Off</p>
                                        <p >Min. Spend RM1 Capped at RM5</p>
                                        @php
											$start_date = new DateTime($vouchers->start_at);
											$end_date = new DateTime($vouchers->end_at);
											$interval = $start_date->diff($end_date);
											$days_left = $interval->days;
										@endphp
										<div class="d-flex justify-content-between">
											<small class="expired">Expiring: {{ $days_left }} days left</small>
											<button class="button button-login">Claim</button>
										</div>

                                    </div>
                                </div>
                            
                        </div>
				</div>
			</div>
        </div>
		@endforeach
		
        
		
                <section class="section mt-5">
                    <div class="card-image" style="padding-left:100px;padding-right:100px">
                        <div class="section-intro pt-3 pb-3">
                            {{-- <p>Popular Item in the market</p> --}}
                            <h2 class="main-title" style="color:#274439">New Products</h2>
                        </div>
                        <div class="row">
                            @forelse($newproduct as $products)
                            <div  class="col-lg-4 col-md-6 col-sm-6" style="padding-bottom:10px">
                                <div class="card card-product">
                                    <a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}">
										<div class="card-product__img">
                                        @if(isset($products->image[0]))
                                            <img class="card-img" src="{{asset('storage/'.$products->image[0]->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                        @else
										
                                            <img class="card-img" src="{{asset('admin/assets/img/avatars/default_product.png')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                        @endif
										</div>
									</a>
                                    <div class="py-2 ">
                                        <p class="card-cate" style="color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                        <p><a href="{{route('showProduct',['id'=>$products->id])}}" class="title" style="color:#274439">{{$products->name}}</a></p>
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
											<small>({{ $products->ratings->count() }})</small>
                                        </div>
										<p class="price" style="color:#274439">RM{{$products->list_price_on_store}}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-sm-2 col-4"><p>No New Product Found</p></div>
                            @endforelse
                        </div>
                    </div>

                </section>
				
				<section class="section-margin--small d-none d-xl-block mb-0" id="target-section">
                    <div class="container container-home bg-white">
                        <div class="row py-4">
                            <div class="col-xl-3 col-lg-2 col-md-3">
							<div class="head main-title pl-3 mb-3 d-flex align-items-center" style="color:#274439"><i class="fa fa-list mr-3" style="color:#274439"></i>Category</div>
							
                                <div class="sidebar-categories" style="border-radius: 10px;color:#274439" >
									@foreach($mainCategories as $key => $mainCategory) <!--The $key variable in a foreach loop represents the current iteration number of the loop.-->
									@if($mainCategory->subcat && $mainCategory->subcat->count() > 0)
										<div class="sidebar-categories @if($key != 0) mt-4 @endif" style="border-radius: 10px; background-color: #ffffff">
											<div class="head main-category"  role="button">
										      
												<a href="javascript:void(0);" style="font-family: 'Nunito', sans-serif;color:#274439;" class="category-toggle">
													{{ $mainCategory->name }}
												</a>
											</div>
											<ul class="main-categories">
												<li class="common-filter">
													<!--ul>
														@foreach($mainCategory->subcat as $subCategory)
															@php
																$productCount = $subCategory->products()->where('vendor_id', $id)->count();
															@endphp
															@if($productCount > 0)
																<li class="filter-list">
																	<a href="{{ route('shop.show', ['id' => $id,'subcategory' => $subCategory->id]) }}">
																		{{ $subCategory->name }}
																	</a>
																</li>
															@endif
														@endforeach
													</ul-->
													
													<ul>
														@foreach($mainCategory->subcat as $subCategory)
															@php
																$productCount = $subCategory->products()->where('vendor_id', $id)->count();
																$selected = ($subCategory->id == $selectedSubCategoryId) ? 'font-weight-bold' : '';
															@endphp
															@if($productCount > 0)
																<li class="filter-list {{ $selected }}">
																	<a href="{{ route('shop.show', ['id' => $id,'subcategory' => $subCategory->id]) }}#target-section" style="color:#1FA33D">
																		{{ $subCategory->name }}
																	</a>
																</li>
															@endif
														@endforeach
													</ul>




												</li>
											</ul>
										</div>
									@endif
								@endforeach




                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-10 col-md-9">
                                <section class="lattest-product-area category-list">
                                    <div class="row pb-5">
                                        @foreach($product as $products)
                                            <div class="col-md-6 col-lg-4" style="padding-bottom:10px">
                                                <div class="card card-product">
													<a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}">
														<div class="card-product__img">
                                                        @if(isset($products->image[0]))
															
                                                            <img src="{{asset('storage/'.$products->image[0]->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                        @else
                                                            <img src="{{asset('admin/assets/img/avatars/default_product.png')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                        @endif
														</div>
													</a>
                                                    <div class="py-2">
                                                        <p class="card-cate" style="color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                                        <p><a href="{{route('showProduct',['id'=>$products->id])}}" class="title" style="color:#274439">{{$products->name}}</a></p>
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
															<small>({{ $products->ratings->count() }})</small>
                                                        </div>
														<p class="price" style="color:#274439">RM {{$products->list_price_on_store}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                <nav class="blog-pagination justify-content-center d-flex pb-0">
									<ul class="pagination">
									  {{$product->appends(['tab' => request()->get('tab'), 'page' => $product->currentPage(), 'sort' => $sort])->links()}}

									</ul>
								</nav>


                                </section>
                                <!-- End Best Seller -->
                            </div>
                        </div>
                    </div>
                </section>
				
                <section class="section mt-5">
                    <div class="card-image" style="padding-left:100px;padding-right:100px">
                        <div class="section-intro pt-3 pb-3">
                            {{-- <p>Popular Item in the market</p> --}}
                            <h2 class="main-title" style="color:#274439">{{$vendor ? $vendor->name : ''}}</h2>
                        </div>
                        <div class="row">
                            @forelse($product as $products)
                            <div class="col-lg-4 col-md-6 col-sm-6" style="padding-bottom:10px">
                                <div class="card card-product">
									<a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}">
										<div class="card-product__img">
                                        @if(isset($products->image[0]))
											
                                            <img class="card-img" src="{{asset('storage/'.$products->image[0]->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                        @else
                                            <img class="card-img" src="{{asset('admin/assets/img/avatars/default_product.png')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                        @endif
										</div>
									</a>
                                    <div class="py-2">
                                        <p class="card-cate" style="color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                        <p><a href="{{route('showProduct',['id'=>$products->id])}}" class="title" style="color:#274439">{{$products->name}}</a></p>
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
											<small>({{ $products->ratings->count() }})</small>
                                        </div>
										<p class=" price" style="color:#274439">RM{{$products->list_price_on_store}}</p>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-sm-2 col-4"><p>No Product Found</p></div>
                            @endforelse
						</div>
					</div>
                </section>
				
				
                
                {{--<div class="product_image_area d-none d-xl-block" style="padding-top: 20px">
                    <div class="container" style="background: #ffffff33;border-radius: 10px;box-shadow: 0 4px 30px #0000001a;backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);padding: 50px 20px">
                        <div class="d-flex">
                            <div>
                                <i class="fa fa-map-pin mr-3"></i>
                            </div>
                            <div>
                                <p>{{$address->user_address->first() ? $address->user_address->first()->address : ''}} {{$address->user_address->first() ? $address->user_address->first()->city : ''}} {{$address->user_address->first() ? $address->user_address->first()->postalcode : ''}} {{$address->user_address->first() ? $address->user_address->first()->state : ''}}</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div>
                                <i class="fa fa-phone mr-3"></i>
                            </div>
                            <div>
                                <p>{{$address->user_address->first() ? $address->user_address->first()->phone : ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>--}}
	</div>
    <!--================End Single Product Area =================-->

    <!--================Single Product Area for Mobile =================-->
    {{--    Mobile View--}}
    <section class="d-block d-sm-none ">
        <div class="container container_vendor">
            <div class="d-flex justify-content-between">
                <div class="">
                    <img class="img-fluid" src="{{asset('storage/'.$vendor->profile_image)}}" alt="" style="width: 60px;height: 60px">
                </div>
                <div>
                    <span class="shop-name d-block" style="color:#274439">{{$vendor->name}}</span>
                    <span class="shop-detail text-dark" style="color:#274439">96% Positive Seller Rating</span>
                </div>
                <div class="align-self-center">
                    <button type="button " class="btn btn-follow btn-sm" style="background-color:#274439">+ Follow</button>
                </div>
            </div>
        </div>
    </section>
    <!--================Single Product Area for Mobile =================-->


    <div class="card-vourcher  justify-content-center d-block d-sm-none mb-3" >
        <!-- nav options -->
        <div class="bg-white p-1">
            <ul class="nav nav-pills mt-0 d-flex justify-content-between" id="pills-tab" role="tablist" style="color:#274439"> 
                <li class="nav-item">
                    <a class="nav-link nav-link-style" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="color:#274439">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-style active" id="pills-store-tab" data-toggle="pill" href="#pills-store" role="tab" aria-controls="pills-store" aria-selected="false" style="color:#274439">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-style " id="pills-product-tab" data-toggle="pill" href="#pills-product" role="tab" aria-controls="pills-product" aria-selected="false" style="color:#274439">Products</a>
                </li> <li class="nav-item">
                    <a class="nav-link nav-link-style " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="color:#274439">Profile</a>
            </ul>
        </div>


        <!-- content -->
        <div class="tab-vendor">
            <div class="tab-content" id="pills-tabContent">
                <!-- 1st card -->
                <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <ul class="ccontent">
                        <li>
                            <div class="wrapp border-bottom">
                                <div class="row">
                                    <div class="col align-self-center ">
                                        <div class="media">
                                            <div class="media-body align-self-center">
                                                <div class="pt-2" style="color:#274439">All</div>
                                                <p style="color:#274439">{{$product->count('id')}} Products</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center  text-right">
                                        <a href="{{route('viewvendorcategory',['id'=>$productMobile->id])}}"><i class="ti-angle-right" style="color:#1FA33D"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
						@forelse($mainCategory->subcat ?? [] as $subCategory)
    <li>
        <div class="wrapp border-bottom">
            <div class="row">
                <div class="col align-self-center">
                    <div class="media">
                        <div class="media-body align-self-center">
                            <div class="pt-2" style="color:#274439">{{$subCategory->name}}</div>
                            <p style="color:#274439">{{ $subCategory->products()->count() }} Products</p>
                        </div>
                    </div>
                </div>
                <div class="col align-self-center text-right">
                    <a href="{{route('viewvendorcategory',['id'=>$productMobile->id,'subcategory' => $subCategory->id])}}"><i class="ti-angle-right" style="color:#1FA33D"></i></a>
                </div>
            </div>
        </div>
    </li>
@empty
    <li>No subcategories found.</li>
@endforelse


                    </ul>
                </div>
                <!-- 2nd card -->
                <div class="tab-pane fade show active" id="pills-store" role="tabpanel" aria-labelledby="pills-store-tab">
                    <div>
                        <div class="rectangle mt-3 mb-3 rounded">
                            <div class="d-flex">
                                <span class="store-name text-dark" style="color:#274439">Selection For You :</span>
                            </div>
                            <div class="row pl-1 pr-1">
                                @foreach($product as $products)
                                    <div class="col-4 p-2">
                                        <div class="card">
                                            <div class="card card-product" style="width:100px;height:auto">
                                                <a href="{{route('showProduct',['id'=>$products->id])}}" class="card-product__img" style="width:100px;height:100px">
												<div class="card-product__img text-center" style="width:100px;height:100px">
												@if(isset($products->image[0]))
													
                                                    <img class="card-img" src="{{asset('storage/'.$products->image[0]->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                @else
                                                    <img class="card-img" src="{{asset('admin/assets/img/avatars/default_product.png')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
                                                @endif
												</div>
												</a>

                                            </div>
                                            <div class="text-center">
                                                <span class="store-name "><a href="{{route('showProduct',['id'=>$products->id])}}" style="color:#274439">RM {{$products->list_price_on_store}}</span></a>

                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
					<section class="section mt-4">
                        <div class="container-fluid">
							<div class="owl-carousel owl-theme" id="banner-carousel">
								<div class="item">
									<img class="carousel-caption-img" style="border-radius:10px " src="{{asset('img/shop-banner.jpg')}}" alt="" >
								</div>
							</div>
						</div>
                    </section>

                    @foreach($voucher as $vouchers)
                        <section class="section mt-4">
                            <div class="text-right">
                                <a hidden href="" style="color:#1FA33D">View More</a>
                            </div>

                            <div class="owl-carousel owl-theme " id="s_Vourcher_carousel">

                                <div class="voucher d-flex align-items-center ">
                                    <div class="mr-2">
                                        @if(isset($vouchers->productImage[0]))
                                            <img src="{{asset('storage/'.$vouchers->productImage[0]->image)}}" style="width: 40px;height: 40px;color:#274439"/>
                                        @else
                                            <img src="{{asset('img/coupon.png')}}" style="width: 40px;height: 40px;color:#274439"/>
                                        @endif
                                    </div>
									 <div>
                                        <p class="discount mb-0" style="color:#274439">{{$vouchers->value}} {{$vouchers->unit_value}} Off</p>
                                        <p>Min. Spend RM1 Capped at RM5</p>
                                        @php
											$start_date = new DateTime($vouchers->start_at);
											$end_date = new DateTime($vouchers->end_at);
											$interval = $start_date->diff($end_date);
											$days_left = $interval->days;
										@endphp
										<div class="d-flex justify-content-between">
											<small class="expired" style="color:#1FA33D">Expiring: {{ $days_left }} days left</small>
											<button class="button button-login" style="background-color:#274439">Claim</button>
										</div>

                                    </div>
                                </div>

                            </div>

                        </section>
                    @endforeach
					
                    <section class="section mt-4 p-3">
                        <div class="card-image" style="width:100%;padding:0 10px">
							<div class="d-flex justify-content-between align-items-center">
								<h4 class="title mb-0" style="font-size:18px;color:#274439">For You</h4>
								<a href="{{route('viewvendorcategory',['id'=>$productMobile->id])}}" style="color:#1FA33D">View More</a>
							</div>
							<div class="row mt-4">
                            @foreach($productforyou as $products)
                                <div class="col-6 m-auto">
                                    <div class="card card-product" style="width:150px;height:auto">
										<a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}" style="width:150px;height:150px">
                                        <div class="card-product__img" style="width:150px;height:150px">
                                            @if(isset($products->image[0]))
                                                <img class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('storage/'.$products->image[0]->image)}}" alt="">
                                            @else
                                                <img class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="">
                                            @endif
                                        </div>
										</a>
                                        <div class="p-2">
                                            <p class="card-cate" style="font-size:10px;color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                            <p><a href="{{route('showProduct',['id'=>$products->id])}}" class="title" style="font-size:14px;color:#274439" >{{$products->name}}</a></p>
											<div class="d-flex align-items-center mb-1">
											  <small class="fa fa-star btn-star mr-1"></small>
											  <small class="rating">{{ number_format($products->average_rating / 5, 1) }}</small><small class="rating">({{ $products->ratings()->count() }})</small>
											</div>
											<p class="price" style="font-size:10px;color:#274439">RM {{$products->list_price_on_store}} </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
							</div>
						</div>
                    </section>
                </div>
                <!-- 3nd card -->
                <div class="tab-pane fade" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab">
                    <section class="section mt-4 p-3">
						 <div class="card-image" style="width:100%;padding:0 10px">
							<div class="d-flex justify-content-between align-items-center">
								<h4 class="title mb-0" style="font-size:18px;color:#274439">For You</h4>
								<a href="{{route('viewvendorcategory',['id'=>$productMobile->id])}}" style="color:#9CF4A0">View More</a>
							</div>
							<div class="row mt-4">
                            @foreach($product as $products)
                                <div class="col-6 m-auto">
                                    <div class="card card-product" style="width:150px;height:auto">
                                        <a class="card-product__img" href="{{route('showProduct',['id'=>$products->id])}}" style="width:150px;height:150px">
											<div class="card-product__img" style="width:150px;height:150px">
                                            @if(isset($products->image[0]))
                                                <img class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('storage/'.$products->image[0]->image)}}" alt="">
                                            @else
                                                <img class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="">
                                            @endif
											</div>
										</a>
                                        <div class="p-2">
                                            <p class="card-cate" style="font-size:10px;color:#1FA33D">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                            <p><a href="{{route('showProduct',['id'=>$products->id])}}" class="title" style="font-size:14px;color:#274439">{{$products->name}}</a></p>
											<div class="d-flex align-items-center mb-1">
											  <small class="fa fa-star btn-star mr-1"></small>
											  <small class="rating">{{ number_format($products->average_rating / 5, 1) }}</small><small class="rating">({{ $products->ratings()->count() }})</small>
											</div>
											<p class="price" style="font-size:10px:color:#274439" >RM {{$products->list_price_on_store}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
							</div>
						</div>
                    </section>
                </div>
				<!-- 4th card -->
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <section class="section mt-4">
						<div class="card p-3" style="border-radius:5px">
							<div class="d-flex">
								<div class="store-name">
									<i class="fa fa-map-pin mr-3" style="color:#1FA33D"></i>
								</div>
								<div>
									<p class="store-name" style="color:#274439">{{$address->user_address->first() ? $address->user_address->first()->address : ''}} {{$address->user_address->first() ? $address->user_address->first()->city : ''}} {{$address->user_address->first() ? $address->user_address->first()->postalcode : ''}} {{$address->user_address->first() ? $address->user_address->first()->state : ''}}</p>
								</div>
							</div>
							<div class="d-flex mt-4">
								<div class="store-name">
									<i class="fa fa-phone mr-3" style="color:#1FA33D"></i>
								</div>
								<div>
									@if ($address != null && $address->user_address->first() != null && $address->user_address->first()->phone != null)
										<p class="store-name" style="color:#274439">{{ $address->user_address->first()->phone }}</p>
									@endif
								</div>
							</div>
						</div>
                    </section>
					<section class="section mt-5">
						<div class="card p-3" style="border-radius:5px">
							<div class="section-intro pt-3 pb-3">
								<h5 style="font-family: 'Nunito', sans-serif;color:#274439">About Shop</h5>
							</div>
						
							
							<p class="store-name" style="color:#274439">{{ isset($operatingHours) ? $operatingHours->tagline : '' }}</p>
						<p class="store-name operating-hours-summary" style="color:#274439">{!! nl2br(preg_replace("/\r|\n/", " ", isset($operatingHours) ? $operatingHours->summary : '')) !!}</p>
						</div>
					</section>
                </div>
            </div>
        </div>
    </div>

    <!---===============Voucher Desktop=============-->


    <!---===============Carousel============-->
    {{--    <section class="d-none d-xl-block" id="">--}}
    {{--        <div class="container">--}}
    {{--            <div class="vendor-banner-area">--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

    <!--================Product Description Area =================-->

    
	<div class="d-block d-sm-none"><div style="display: block; height: 60px;"></div></div>
    <nav class="footer-mobile fixed-bottom d-block d-sm-none">
        <div class="d-flex justify-content-around">
            <a class="text-center" href="http://206.189.144.207"><img class="tabbar-item-icon" src="{{asset('img/lifecarelogo.png')}}" alt=""><span class="d-block" style="font-size: 10px">Home</span></a>
            <a class="text-center" href="http://http://206.189.144.207/shop?id=7"><img class="tabbar-item-icon" src="{{asset('img/categories.png')}}" alt=""><span class="d-block" style="font-size: 10px">Categories</span></a>
            <a class="text-center" href="{{route('cart.index')}}"><img class="tabbar-item-icon" src="{{asset('img/cart.png')}}" alt="">
			@guest @else @if(Auth::user()->cart()->select('user_id','product_id')->where('sold',0)->count() > 0)
			<span class="search-cart__circle">{{Auth::user()->cart()->select('user_id','product_id')->where('sold',0)->count()}}</span> @endif @endguest
			<span class="d-block" style="font-size: 10px">Cart</span></a>
            <a class="text-center" href="{{route('profile.index')}}"><img class="tabbar-item-icon" src="{{asset('img/user.png')}}" alt=""><span class="d-block" style="font-size: 10px">Account</span></a>

        </div>
    </nav>
    <!--================End Product Description Area =================-->
@endsection

@section('script')
    <script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>

    <script>
        if($('.owl-carousel').length > 0){
            $('#vourcherCarousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-arrow-left'></i>","<i class='ti-arrow-right'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:1,
                        nav:false,
                        stagePadding: 10,
                        center: true,
                        loop:false,
                        // dots:true
                    },
                    600:{
                        items: 2
                    },
                    900:{
                        items:2
                    },
                    1130:{
                        items:3
                    }
                }
            })
        }
		if($('.owl-carousel').length > 0){
            $('#banner-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-angle-left'></i>","<i class='ti-angle-right'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:1,
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

        $("#s_Product_carousel").owlCarousel({
            items:2,
            autoplay:false,
            autoplayTimeout: 5000,
            margin:10,
            loop:true,
            nav:false,
            dots:false
        });
        $("#s_Vourcher_carousel").owlCarousel({
            items:1,
            autoplay:false,
            margin:10,
            loop:false,
            nav:false,
            dots:false
        });
    </script>
	<script>
		$(document).ready(function() {
			$('.category-toggle').click(function() {
				$(this).parent().next('.main-categories').slideToggle();
			});
		});
	</script>
	
		<!--script>
		$(document).ready(function() {
			$('.category-toggle').click(function(e) {
				e.preventDefault();
				$(this).toggleClass('active').parent().next('.main-categories').slideToggle();
			});
		});
		</script>-->
	
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
