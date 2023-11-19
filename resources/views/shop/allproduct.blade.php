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
                border-radius: 100px;
                width: 200px;
                height:200px
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

        .store-name{
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 500;
            color:#384AEB;

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
	#myBtn {
		display: none;
		position: fixed;
		bottom: 20px;
		right: 30px;
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
	.main-title{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 600;
			font-size: 24px;
			line-height: 68px;
			display: flex;
			align-items: center;
			color: #1B294E;
		}


    </style>
@endsection
@section('content')

	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
	
    <!--================Dekstop Area =================-->
    <section class="d-none d-xl-block">
        <section class="section-margin">
            <div class="container">
                <div class="section-intro pb-60px">
                    {{-- <p>Popular Item in the market</p> --}}
                    <h2 class="main-title">All Products</h2>
                </div>
                <div class="row" id="product-data">
                @include('layouts.single-product')
                </div>

            </div>
            <div class="ajax-load text-center" style="display:none">
                <img src="{{asset('img/loader2.gif')}}" style="width:10%;">
            </div>
        </section>
    </section>



    <!--================Mobile Area =================-->

    <!--<section class="section-margin--small mb-5 d-block d-sm-none">
        <div class="card">
            <div class="card-body">
                <div class="owl-carousel owl-theme" id="popularshop">
                    <div class="card card-product-mb">
                        <div class="card-content text-center">
                            <img class="card-img-top img-fluid" src="{{asset('img/vendor/lunavieLogo.png')}}" style="width: 99px; height: 90px;"/>
                        </div>
                        <div class="text-center">
                            <a href="" class="card-title-product-cate">Lunavie</a>
                        </div>


                    </div>
                    <div class="card card-product-mb">
                        <div class="card-content text-center">
                            <img class="card-img-top img-fluid" src="{{asset('img/product/LIGHTHEAL.png')}}" style="width: 99px; height: 90px;"/>
                        </div>
                        <div class="text-center">
                            <a href="" class="card-title-product-cate">LightHeal</a>
                        </div>
                    </div>
                    <div class="card card-product-mb">
                        <div class="card-content text-center">
                            <img class="card-img-top img-fluid" src="{{asset('img/product/posturealign.png')}}" style="width: 99px; height: 90px;"/>
                        </div>
                        <div class="text-center">
                            <a href="" class="card-title-product-cate">Posture Align</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>-->

    <section class="section-margin--small mb-5 d-block d-sm-none">
        <div class="container">
       
            <!-- Start Best Seller -->
           
            <!-- End Best Seller -->
        </div>
		<div class="ajax-load text-center" style="display:none">
            <img src="{{asset('img/loader2.gif')}}" style="width:10%;">
        </div>
    </section>
    <!--================End Product Description Area =================-->
    <div class="d-block d-sm-none"><div style="display: block; height: 60px;"></div></div>
    <nav class="footer-mobile fixed-bottom d-block d-sm-none">
        <div class="d-flex justify-content-around">
            <a class="text-center" href="{{route('/')}}"><img class="tabbar-item-icon" src="{{asset('img/lifecarelogo.png')}}" alt=""><span class="d-block" style="font-size: 10px">Home</span></a>
            <a class="text-center" href="{{route('shop')}}"><img class="tabbar-item-icon" src="{{asset('img/categories.png')}}" alt=""><span class="d-block" style="font-size: 10px">Categories</span></a>
            <a class="text-center" href="{{route('cart.index')}}"><img class="tabbar-item-icon" src="{{asset('img/cart.png')}}" alt="">
			@guest @else @if(Auth::user()->cart()->select('user_id','product_id')->where('sold',0)->count() > 0)
			<span class="search-cart__circle">{{Auth::user()->cart()->select('user_id','product_id')->where('sold',0)->count()}}</span> @endif @endguest 
			<span class="d-block" style="font-size: 10px">Cart</span></a>
            <a class="text-center" href="{{route('profile.index')}}"><img class="tabbar-item-icon" src="{{asset('img/user.png')}}" alt=""><span class="d-block" style="font-size: 10px">Account</span></a>

        </div>
    </nav>
@endsection

@section('script')
    <script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    <script>
        if($('.owl-carousel').length > 0){
            $('#popularshop').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-control-backward'></i>","<i class='ti-control-forward'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:3,
                        center:true,
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
        function loadmoreData(page){
            $.ajax({
                url:'?page='+page,
                type:'get',
                beforeSend:function(){
                    $('.ajax-load').show();
                },
            })
            .done(function(data){
                if(data.product_view==''){
                    $('.ajax-load').html('No More Product');
                    return;
                }
                $('.ajax-load').hide();
                $('#product-data').append(data.product_view);
            })
            .fail(function(){
                alert('Something went wrong! Please try again');
             });
        }

        var page=1;
        $(window).scroll(function () {
            if($(window).scrollTop()+$(window).height()+120>=$(document).height()){
                page ++;
                loadmoreData(page);
            }
        })
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
