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
                width: 80px;
                height:80px
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
            border-bottom: 2px solid #384aeb;
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
            color: rgba(222,222,222,0.84) ;
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
            color: white;
        }

        .ccontent li .wrapp div {
            font-weight: 500;
            font-size: 13px;
        }

        .ccontent li .wrapp p {
            font-weight: 100;
            font-size:10px;
        }

        .ccontent li:hover {
            background-color: #384aeb;
            color: white;
        }

        /* 2nd card */

        .addinfo {
            padding: 0 1rem;
        }
		.vendor{
			background-image: url("img/vendor/cover.png")center no-repeat !important;
            background-size: cover !important;
		}




    </style>
@endsection
@section('content')

    <!--================Single Product Area for desktop =================-->
    <div class="product_image_area d-none d-xl-block " style="padding-top: 20px">
        <div class="container container-home bg-white rounded-0">
            <div class="row s_product_inner">
                <div class="col-lg-12 d-flex ml-2 col-sm-4">
                    <div class="col-sm-12 col-lg-2 ">
                        <img class="img-fluid imgVendor mr-3" src="{{asset('storage/'.$vendor->profile_image)}}" alt="">
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <h4>{{$vendor->name}}</h4>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star btn-star"></small>
                                <small class="fas fa-star btn-star"></small>
                                <small class="fas fa-star btn-star"></small>
                                <small class="fas fa-star-half-alt btn-star"></small>
                                <small class="far fa-star btn-star"></small>
                            </div>
                        </div>
                        <small class="pt-1" style="#dddddd">(99 Reviews)</small>
                    </div>
					
                <div class="col-lg-5">
                    <div class="d-flex">
                        <div>
                            <i class="fa fa-map-pin mr-3"></i>
                        </div>
                        <div>
                            <p>Wisma Caely, Lot 2661, 3rd Mile, Jalan Maharaja Lela. 36000 Teluk Intan. Perak Darul Ridzuan. Malaysia</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div>
                            <i class="fa fa-phone mr-3"></i>
                        </div>
                        <div>
                            <p>{{$vendor->phone}}</p>
                        </div>
                    </div>
                </div>

                </div>
            </div>
			<div class="bg-white p-1 mt-4" style="border-top:solid 1px #d9d9d9">
				<ul class="nav nav-pills mt-0 d-flex" id="pills-tab" role="tablist">
					<li class="nav-item">
						<a class="nav-link nav-link-style  active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Shop</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-style " id="pills-product-tab" data-toggle="pill" href="#pills-product" role="tab" aria-controls="pills-product" aria-selected="false">Products</a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-style " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
					</li>
				</ul>
			</div>
        </div>
    </div>
	
    <!--================End Single Product Area =================-->

    <!--================Single Product Area for Mobile =================-->
    <div class="product_image_area d-block d-sm-none" style="margin-top: -80px;">
        <div class="container" style="background: #ffffff33;box-shadow: 0 4px 30px #0000001a;backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);padding: 40px 30px 10px">
            <div class="row ">
                <div class="col-9">
                    <div class="media pt-2">

                        <img class="align-self-center mr-3 img-fluid rounded-circle z-depth-2" src="{{asset('storage/'.$vendor->profile_image)}}" alt="" style="width: 58px;height: 58px">
                        <div class="media-body">
                            <span class="vendorname">{{$vendor->name}}</span>
                            <div class="text-primary mr-2">
                                <small class="fas fa-star btn-star fa-xs"></small>
                                <small class="fas fa-star btn-star fa-xs"></small>
                                <small class="fas fa-star btn-star fa-xs"></small>
                                <small class="fas fa-star-half-alt btn-star fa-xs"></small>
                                <small class="far fa-star btn-star fa-xs"></small>
                                <small class="pt-1" style="color: rgba(222,222,222,0.84)">(99 Reviews)</small>
                            </div>
                            <p class="mt-n3 vendorproduct"><i class="fas fa-box fa-xs mr-3 "></i>{{count($product)}} Products</p>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="" style="padding-top:30px">
                        <button type="button" class="btn btn-follow btn-sm">+ Follow</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--================Single Product Area for Mobile =================-->

    <div class="card-vourcher  justify-content-center d-block d-sm-none mb-3" >
        <!-- nav options -->
        <div class="bg-white p-1">
            <ul class="nav nav-pills mt-0 d-flex justify-content-between" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link nav-link-style  active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-style " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-style " id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Categories</a>
                </li>
            </ul>
        </div>


        <!-- content -->
        <div class="tab-vendor">
            <div class="tab-content" id="pills-tabContent">
                <!-- 1st card -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                    <div class="p-3">
                        <div class="text-right">
                            <span class="see-more">View More ></span>
                        </div>

                        <div class="owl-carousel owl-theme " id="s_Vourcher_carousel">
                            @foreach($voucher as $vouchers)
                                <div class="voucher d-flex align-items-center ">
                                    <div class="mr-2">
                                        @if(isset($vouchers->productImage[0]))
                                            <img src="{{asset('storage/'.$vouchers->productImage[0]->image)}}" style="width: 40px;height: 40px"/>
                                        @else
                                            <img src="{{asset('img/coupon.png')}}" style="width: 40px;height: 40px"/>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="discount mb-0">95% Off</p>
                                        <p class="expired">Min. Spend RM1 Capped at RM5</p>
                                        <div class="d-flex justify-content-between">
                                            <small class="expired">Expiring: 8 days left</small>
                                            <button class=" button button-login">Claim</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>




                    </div>
                    <div class="p-3">
                        <div class="row">
                            <div class="col">
                                <h5 class=" text-white">For You</h5>
                            </div>
                            <div class="col">
                                <div class="text-right">
                                    <span class="see-more">View More ></span>
                                </div>
                            </div>

                        </div>

                        <div class="owl-carousel owl-theme " id="s_Product_carousel">

                            @foreach($product as $products)
                            <div class="card text-center card-product">
                                <div class="card-product__img">
                                    @if(isset($products->image[0]))
                                        <img class="card-img p-3 p-3 " style="border-radius: 10px 10px 0 0" src="{{asset('storage/'.$products->image[0]->image)}}" alt="">
                                    @else
                                    <img class="card-img p-3 p-3 " style="border-radius: 10px 10px 0 0" src="{{asset('img/vendor/L1005-BLA.jpg')}}" alt="">
                                    @endif
                                    <ul class="card-product__imgOverlay">
                                        <li><button><i class="ti-shopping-cart"></i></button></li>
                                        <li><button><i class="ti-heart"></i></button></li>
                                    </ul>
                                </div>
                                <div class="card-body p-1">
                                    <p class="category-name">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                    <span class="card-product__title"><a href="#" class="hover-black text-white text-truncate">{{$products->name}}</a></span>
                                    <p class="">RM {{$products->list_price_on_store}}</p>
                                </div>
                            </div>
                            @endforeach


                        </div>

                    </div>


                </div>
                <!-- 2nd card -->
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="p-3">


                        <div class="row">
                            @foreach($product as $products)
                            <div class="col-sm-3 col-6 m-auto">
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        @if(isset($products->image[0]))
                                            <img class="card-img p-3" style="border-radius: 10px 10px 0 0" src="{{asset('storage/'.$products->image[0]->image)}}" alt="">
                                        @else
                                        <img class="card-img p-3" style="border-radius: 10px 10px 0 0" src="{{asset('img/vendor/L1005-BLA.jpg')}}" alt="">
                                        @endif
                                            <ul class="card-product__imgOverlay">
                                            <li><button><i class="ti-shopping-cart"></i></button></li>
                                            <li><button><i class="ti-heart"></i></button></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p class="category-name">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
                                        <span class="card-product__title"><a href="#" class="hover-black text-white text-truncate">{{$products->name}}</a></span>
                                        <p class="">RM {{$products->list_price_on_store}}</p>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <!-- 3nd card -->
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <ul class="ccontent">
                        <li>
                            {{-- <a href=""> --}}
                            <div class="wrapp border-bottom">

                                <div class="row">
                                    <div class="col align-self-center ">
                                        <div class="media">
                                            <img class=" align-self-center img-lg  mr-3 rounded-0" src="{{asset('img/vendor/L1079.jpg')}}" alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <div class="pt-2">Kids</div>
                                                <p>70 Products</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center  text-right">
                                        <a href="{{route('viewvendorcategory')}}"><i class="ti-angle-right"></i></a>
                                    </div>
                                </div>

                            </div>
                            {{-- </a> --}}
                        </li>
                        <li>
                            <div class="wrapp border-bottom">
                                <div class="row">
                                    <div class="col align-self-center ">

                                        <div class="media">
                                            <img class=" align-self-center img-lg  mr-3 rounded-0" src="{{asset('img/vendor/L1079.jpg')}}" alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <div class="pt-2">For Women</div>
                                                <p>70 Products</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center  text-right">
                                        <a href=""><i class="ti-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="wrapp border-bottom">
                                <div class="row">
                                    <div class="col align-self-center ">

                                        <div class="media">
                                             <img class=" align-self-center img-lg  mr-3 rounded-0" src="{{asset('img/vendor/L1079.jpg')}}" alt="Generic placeholder image">
                                            <div class="media-body align-self-center">
                                                <div class="pt-2">All</div>
                                                <p>140 Products</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col align-self-center  text-right">
                                        <a href=""><i class="ti-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
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
	
	<div class="tab-vendor">
        <div class="tab-content" id="pills-tabContent">
            <!-- 1st card -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<div class="product_image_area d-none d-xl-block" style="padding-top: 20px">
					<div class="container" style="background: #ffffff33;border-radius: 10px;box-shadow: 0 4px 30px #0000001a;backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);padding: 50px 20px">
						<div class="owl-carousel owl-theme" id="vourcherCarousel">
							{{-- For  --}}
							@foreach($voucher as $vouchers)
							<div class="voucher d-flex align-items-center ">
								<div class="mr-2">
									@if(isset($vouchers->productImage[0]))
										<img src="{{asset('storage/'.$vouchers->productImage[0]->image)}}" style="width: 50px;height: 50px"/>
									@else
										<img src="{{asset('img/coupon.png')}}" style="width: 50px;height: 50px"/>
									@endif
								</div>
								<div>
									<p class="discount mb-0">95% Off</p>
									<p >Min. Spend RM1 Capped at RM5</p>
									<div class="d-flex justify-content-between">
										<small class="expired">Expiring: 8 days left</small>
										<button class=" button button-login">Claim</button>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<section class="section-margin">
					<div class="container container-home p-0">
						<div class="blog-banner-area">
							<img class="carousel-caption-img" style="border-radius:10px " src="{{asset('img/carousel-1.jpg')}}" alt="" >
						</div>
					</div>
				</section>
				<section class="section-margin">
					<div class="container">
						<div class="section-intro pb-60px">
							{{-- <p>Popular Item in the market</p> --}}
							<h2>New Products</h2>
						</div>
						<div class="row"> 
							<div class="col-sm-2 col-4">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

										{{--@if($packages->image()->first())--}}
										{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="" >--}}
										{{--@else--}}
										<img class="card-img " src="{{asset('img/product/Orthopedic.png')}}" alt="" >
										{{--@endif--}}
									</div>
									<div class="card-body p-3 ">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/26" class="title" style="font-size:16px">Posture Align Orthopedic Lumbar Support</a></h4>
										<div class="d-flex justify-content-between">
											<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM200.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

										{{--@if($packages->image()->first())--}}
										{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="" >--}}
										{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Pillow1.png')}}" alt="" >
										{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/25" class="title" style="font-size:16px">Posture Align Therapeutic Pillow - Premium Soft</a></h4>
										<div class="d-flex justify-content-between">
											<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM240.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

										{{--@if($packages->image()->first())--}}
										{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
										{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Slides1.png')}}" alt="">
											{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/28" class="title" style="font-size:16px">ICB Orthotic Slides</a></h4>
										<div class="d-flex justify-content-between">
											<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM350.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4 ">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

									{{--@if($packages->image()->first())--}}
										{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
									{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Orthotic1.png')}}" alt="" >
									{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/29" class="title" style="font-size:16px">ICB Dual Density Orthotics</a></h4>
										<div class="d-flex justify-content-between">
										<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM400.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4 ">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

									{{--@if($packages->image()->first())--}}
										{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
									{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Orthotic1.png')}}" alt="" >
									{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/29" class="title" style="font-size:16px">ICB Dual Density Orthotics</a></h4>
										<div class="d-flex justify-content-between">
										<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM400.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4 ">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

									{{--@if($packages->image()->first())--}}
										{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
									{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Orthotic1.png')}}" alt="" >
									{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/29" class="title" style="font-size:16px">ICB Dual Density Orthotics</a></h4>
										<div class="d-flex justify-content-between">
										<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM400.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</section>
				<section class="section-margin">
					<div class="container">
						<div class="section-intro pb-60px">
							{{-- <p>Popular Item in the market</p> --}}
							<h2>Medical Supplies</h2>
						</div>
						<div class="row"> 
							<div class="col-sm-2 col-4">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

										{{--@if($packages->image()->first())--}}
										{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="" >--}}
										{{--@else--}}
										<img class="card-img " src="{{asset('img/product/Orthopedic.png')}}" alt="" >
										{{--@endif--}}
									</div>
									<div class="card-body p-3 ">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/26" class="title" style="font-size:16px">Posture Align Orthopedic Lumbar Support</a></h4>
										<div class="d-flex justify-content-between">
											<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM200.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

										{{--@if($packages->image()->first())--}}
										{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="" >--}}
										{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Pillow1.png')}}" alt="" >
										{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/25" class="title" style="font-size:16px">Posture Align Therapeutic Pillow - Premium Soft</a></h4>
										<div class="d-flex justify-content-between">
											<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM240.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

										{{--@if($packages->image()->first())--}}
										{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
										{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Slides1.png')}}" alt="">
											{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/28" class="title" style="font-size:16px">ICB Orthotic Slides</a></h4>
										<div class="d-flex justify-content-between">
											<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM350.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4 ">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

									{{--@if($packages->image()->first())--}}
										{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
									{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Orthotic1.png')}}" alt="" >
									{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/29" class="title" style="font-size:16px">ICB Dual Density Orthotics</a></h4>
										<div class="d-flex justify-content-between">
										<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM400.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4 ">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

									{{--@if($packages->image()->first())--}}
										{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
									{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Orthotic1.png')}}" alt="" >
									{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/29" class="title" style="font-size:16px">ICB Dual Density Orthotics</a></h4>
										<div class="d-flex justify-content-between">
										<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM400.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-2 col-4 ">
								<div class="card card-product" style="height:350px">
									<div class="card-product__img text-center">

									{{--@if($packages->image()->first())--}}
										{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
									{{--@else--}}
										<img class="card-img" src="{{asset('img/product/Orthotic1.png')}}" alt="" >
									{{--@endif--}}
									</div>
									<div class="card-body p-3">
										<p class="title text-truncate mb-2" style="margin-top: 0; margin-bottom: 1rem; font-size:10px">Medical Supplies</p>
										<h4 class="card-blog__title"><a href="http://127.0.0.1:8000/product/29" class="title" style="font-size:16px">ICB Dual Density Orthotics</a></h4>
										<div class="d-flex justify-content-between">
										<!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM400.00</h5>
										</div>
										<div class="d-flex align-items-center mb-1">
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small class="fa fa-star btn-star mr-1"></small>
											<small>(99)</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</section>
			</div>
			
			<div class="tab-pane fade" id="pills-product" role="tabpanel" aria-labelledby="pills-product-tab">">
				<section class="section-margin--small mb-5 d-none d-xl-block">
					<div class="container">
						<div class="row">
							<div class="col-xl-3 col-lg-2 col-md-3">
								<div class="sidebar-categories" style="border-radius: 10px">
									<div class="head" style="border-radius: 10px">Category</div>
										<ul class="main-categories">
											<li class="common-filter">

											<ul>
												<li class="filter-list"><a href="#" >All products</a></li>
												<li class="filter-list"><a href="#" >For Mommy</a></li>
												<li class="filter-list"><a href="#" >For Kids</a></li>
											</ul>

											</li>
										</ul>
									</div>
								</div>
								<div class="col-xl-9 col-lg-10 col-md-9">
								<!-- Start Filter Bar -->
									<div class="filter-bar d-flex flex-wrap align-items-center" style="border-radius: 10px;">
										<div class="sorting">
											<select>
												<option value="1">Latest</option>
												<option value="1">Popularity</option>
												<option value="1">Best Rating</option>
											</select>
										</div>
										<div class="sorting mr-auto">
											<select>
												<option value="1">Show 10</option>
												<option value="1">Show 20</option>
												<option value="1">Show 30</option>
											</select>
										</div>
									<div>
										<div class="input-group filter-bar-search">
											<input type="text" placeholder="Search">
											<div class="input-group-append">
												<button type="button"><i class="ti-search"></i></button>
											</div>
										</div>
									</div>
								</div>
								<!-- End Filter Bar -->
								<!-- Start Best Seller -->
								<section class="lattest-product-area pb-40 category-list">
									<div class="row">
										@foreach($product as $products)
										<div class="col-md-6 col-lg-3">
											<div class="card card-product">
												<div class="card-product__img d-flex align-items-center bg-white" style="height:190px">
													@if(isset($products->image[0]))
													<img class="card-img" src="{{asset('storage/'.$products->image[0]->image)}}" alt="">
													@else
													<img class="card-img" src="{{asset('img/vendor/L1005-BLA.jpg')}}" alt="">
													@endif
												</div>
												<div class="card-body p-3">
													<p class="title text-truncate mb-2" style="font-size:10px">{{$products->mainCategory()->first() ? $products->mainCategory()->first()->name :''}}</p>
													<h4 class="card-product__title"><a href="#" class="title" style="font-size:16px">{{$products->name}}</a></h4>
													<p class="card-product__price price">RM {{$products->list_price_on_store}}</p>
													<div class="d-flex align-items-center mb-1">
														<small class="fa fa-star btn-star mr-1"></small>
														<small class="fa fa-star btn-star mr-1"></small>
														<small class="fa fa-star btn-star mr-1"></small>
														<small class="fa fa-star btn-star mr-1"></small>
														<small class="fa fa-star btn-star mr-1"></small>
														<small>(99)</small>
													</div>
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
			</div>
			
			
			<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">">
				<div class="product_image_area d-none d-xl-block" style="padding-top: 20px">
					<div class="container" style="background: #ffffff33;border-radius: 10px;box-shadow: 0 4px 30px #0000001a;backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);padding: 50px 20px">
						<div class="d-flex">
                        <div>
                            <i class="fa fa-map-pin mr-3"></i>
                        </div>
                        <div>
                            <p>Wisma Caely, Lot 2661, 3rd Mile, Jalan Maharaja Lela. 36000 Teluk Intan. Perak Darul Ridzuan. Malaysia</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div>
                            <i class="fa fa-phone mr-3"></i>
                        </div>
                        <div>
                            <p>{{$vendor->phone}}</p>
                        </div>
                    </div>
					</div>
				</div>
			</div>
			
		</div>
			
			
			
	</div>
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
@endsection
