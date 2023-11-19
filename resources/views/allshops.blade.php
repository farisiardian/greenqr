
@extends('layouts.app')
@section('addstyle')
    <style>
        .card{
            border: 0px;
        }
        .card-title {
            font-size: 9px;

        }
        .card-title a{
            color: #384AEB !important;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
		.card-title-cat a{
            color: #384AEB !important;
        }
        .card-header {
            background-color: white;
            border-bottom: none !important;
        }

        .card-header h4{
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            color: #384AEB !important;
            text-transform: uppercase;
            margin-top: 10px;
        }

        /*#categories .owl-prev,
        #categories .owl-next {
            width: 20px;
            height: 20px;
            background: #384aeb;
            border-radius: 50%;
            /* background: #f1f6f7 */
        }

        #categories .owl-prev i,
        #categories .owl-prev span,
        #categories .owl-next i,
        #categories .owl-next span {
            font-size: 10px;
            color: #f1f6f7;
            /* line-height: 1px */
            display: flex;
            align-items: center;
            text-align: center;
            padding: 5px 5px 5px 5px;
        }

        #categories .owl-prev:hover,
        #categories .owl-next:hover {
            background: #384aeb
        }*/

        /*#categories .owl-prev:hover i,
        #categories .owl-prev:hover span,
        #categories .owl-next:hover i,
        #categories .owl-next:hover span {
            color: #fff
        }*/

        /*#categories .owl-prev {
            position: absolute;
            top: 30%;
            transform: translateY(-30%);
            left: -20px
        }*/

        /* @media (min-width: 1340px) {
            #categories .owl-prev {
                left: -105px
            }
        } */

        #categories .owl-next {
            position: absolute;
            top: 30%;
            transform: translateY(-30%);
            right: -20px
        }

        /* @media (min-width: 1340px) {
            #categories .owl-next {
                right: -105px
            }
        } */
        .card-product-mb{
            border: solid 1px #DADADA;
            margin: 0px 0px 10px 0px;
        }
        .card-title-product-cate{
            display: -webkit-box;
            -webkit-line-clamp:1 ;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 9px;
        }
        .card-title-product-cate-name{
            color:#384AEB !important;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 9px;
            text-transform: uppercase;
            font-weight: lighter;

        }
        .card-title-product-cate-price{
            color:#384AEB !important;
            text-transform: uppercase;
            font-weight: bolder;
            font-size: 9px;
        }
        .card-title-product-cate-price-before{
            color:#777777 !important;
            font-weight: lighter;
            font-size:9px;
            text-decoration:line-through
        }
        .ribbon {
            position: absolute;
            right: -5px;
            top: -5px;
            z-index: 1;
            overflow: hidden;
            width: 50px;
            height: 50px;
            text-align: right;
        }
        .ribbon span {
            font-size: 0.8rem;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
            line-height: 32px;
            transform: rotate(45deg);
            width: 125px;
            display: block;
            background: #79a70a;
            background: linear-gradient(#9bc90d 0%, #79a70a 100%);
            box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
            position: absolute;
            top: 17px; // change this, if no border
        right: -29px; // change this, if no border
        }

        .ribbon span::before {
            content: '';
            position: absolute;
            left: 0px; top: 100%;
            z-index: -1;
            border-left: 3px solid #79A70A;
            border-right: 3px solid transparent;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #79A70A;
        }
        .ribbon span::after {
            content: '';
            position: absolute;
            right: 0%; top: 100%;
            z-index: -1;
            border-right: 3px solid #79A70A;
            border-left: 3px solid transparent;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #79A70A;
        }

        .red span {
            background: linear-gradient(#f70505 0%, #8f0808 100%);
        }
        .red span::before {
            border-left-color: #8f0808;
            border-top-color: #8f0808;
        }
        .red span::after {
            border-right-color: #8f0808;
            border-top-color: #8f0808;
        }

        .blue span {
            background: linear-gradient(#2989d8 0%, #1e5799 100%);
        }
        .blue span::before {
            border-left-color: #1e5799;
            border-top-color: #1e5799;
        }
        .blue span::after {
            border-right-color: #1e5799;
            border-top-color: #1e5799;
        }

        .foo {
            clear: both;
        }

        .bar {
            content: "";
            left: 0px;
            top: 100%;
            z-index: -1;
            border-left: 3px solid #79a70a;
            border-right: 3px solid transparent;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #79a70a;
        }

        .baz {
            font-size: 1rem;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
            line-height: 2em;
            transform: rotate(45deg);
            width: 100px;
            display: block;
            background: #79a70a;
            background: linear-gradient(#9bc90d 0%, #79a70a 100%);
            box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
            position: absolute;
            top: 100px;
            left: 1000px;
        }
		
		.category-name{
            color:#384AEB ;
            font-size: 12px;
            font-weight: 100px
        }
		
        .store-name{
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            font-weight: 500;
            color:#384AEB;
        ;
        }
		.container-home{
        padding: 20px;
        border-radius: 10px
    }
	
	.container-banner{
        padding-top: 20px;
        border-radius: 10px
    }
	
	.filter-bar-search{
		background-color:#EFF0F5;
		border-radius:10px
	}
	.filter-bar-search button i{
		font-size:20px
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
	.carousel {
        position: relative;
      }

      .carousel.pointer-event {
        touch-action: pan-y;
      }

      .carousel-inner {
        position: relative;
        width: 100%;
        overflow: hidden;
      }

      .carousel-inner::after {
        display: block;
        clear: both;
        content: "";
      }

      .carousel-item {
        position: relative;
        display: none;
        float: left;
        width: 100%;
        margin-right: -100%;
        backface-visibility: hidden;
        transition: transform 0.6s ease-in-out;
      }


      @media (prefers-reduced-motion: reduce) {
        .carousel-item {
          transition: none;
        }
      }

      .carousel-item.active,
      .carousel-item-next,
      .carousel-item-prev {
        display: block;
      }

      .carousel-item-next:not(.carousel-item-left),
      .active.carousel-item-right {
        transform: translateX(100%);
      }

      .carousel-item-prev:not(.carousel-item-right),
      .active.carousel-item-left {
        transform: translateX(-100%);
      }

      .carousel-fade .carousel-item {
        opacity: 0;
        transition-property: opacity;
        transform: none;
      }

      .carousel-fade .carousel-item.active,
      .carousel-fade .carousel-item-next.carousel-item-left,
      .carousel-fade .carousel-item-prev.carousel-item-right {
        z-index: 1;
        opacity: 1;
      }

      .carousel-fade .active.carousel-item-left,
      .carousel-fade .active.carousel-item-right {
        z-index: 0;
        opacity: 0;
        transition: opacity 0s 0.6s;
      }

      @media (prefers-reduced-motion: reduce) {
        .carousel-fade .active.carousel-item-left,
        .carousel-fade .active.carousel-item-right {
          transition: none;
        }
      }

      .carousel-control-prev,
      .carousel-control-next {
        position: absolute;
        top: 0;
        bottom: 0;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 15%;
        color: #fff;
        text-align: center;
        opacity: 0.5;
        transition: opacity 0.15s ease;
      }

      @media (prefers-reduced-motion: reduce) {
        .carousel-control-prev,
        .carousel-control-next {
          transition: none;
        }
      }

      .carousel-control-prev:hover, .carousel-control-prev:focus,
      .carousel-control-next:hover,
      .carousel-control-next:focus {
        color: #fff;
        text-decoration: none;
        outline: 0;
        opacity: 0.9;
      }

      .carousel-control-prev {
        left: 0;
      }

      .carousel-control-next {
        right: 0;
      }

      .carousel-control-prev-icon,
      .carousel-control-next-icon {
        display: inline-block;
        width: 20px;
        height: 20px;
        background: no-repeat 50% / 100% 100%;
      }

      .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
      }

      .carousel-control-next-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
      }

      .carousel-indicators {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 15;
        display: flex;
        justify-content: center;
        padding-left: 0;
        margin-right: 15%;
        margin-left: 15%;
        list-style: none;
      }

      .carousel-indicators li {
        box-sizing: content-box;
        flex: 0 1 auto;
        width: 30px;
        height: 3px;
        margin-right: 3px;
        margin-left: 3px;
        text-indent: -999px;
        cursor: pointer;
        background-color: #fff;
        background-clip: padding-box;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        opacity: .5;
        transition: opacity 0.6s ease;
      }

      @media (prefers-reduced-motion: reduce) {
        .carousel-indicators li {
          transition: none;
        }
      }

      .carousel-indicators .active {
        opacity: 1;
      }

      .carousel-caption {
        position: absolute;
        bottom: 170px;
        left: 97%;
        z-index: 10;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fff;
        text-align: center;
      }

      .carousel-caption-img{
        width: 100%;
        height: 100%;
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
	.shop-menu{
			background-color:#F8F8F7;
			border-radius:10px;
			margin-right:10px
			
		}
		.main-title{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 600;
			font-size: 30px;
			line-height: 68px;
			display: flex;
			align-items: center;
			color: #1B294E;
		}

    </style>
@endsection
@section('content')

	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>	
<!-- ================ Best Selling item  carousel ================= -->
{{--    Desktop View--}}
<section class="mt-3 d-none d-xl-block">
    <div style="width:100%;padding:60px 100px">
        <div class="d-flex justify-content-between align-items-center">
            <h2  class="d-none d-xl-block main-title" style="color:#724439">All Shops</h2>
          
        </div>
        <div class="row d-flex justify-content-center">
            @foreach($popularShops as $popularShop)
                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-3 mb-3">
                    <div class="row shop-menu d-flex align-items-center py-2">
						<div class="col-lg-4 d-flex align-items-center p-2">
							<a href="{{ route('shop.show', ['id' => $popularShop->id]) }}" class="card-shop-image-container">
								<img src="{{ asset('storage/' . $popularShop->profile_image) }}" style="width:100%; height:100%;border-radius:50px;">
							</a>

						</div>
						<div class="card-shop-name col-lg-8">
							<a href="{{route('shop.show',['id'=>$popularShop->id])}}" class="title">{{$popularShop->name}}</a>
						</div>
					</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{--    Tab View--}}
<section class="mt-3 d-none d-sm-block d-xl-none">
    <div style="width:100%;padding:60px 100px">
        <div class="d-flex justify-content-between align-items-center">
            <h2  class="d-none d-sm-block d-xl-none main-title" style="color:#274439">All Shops</h2>
          
        </div>
        <div class="row d-flex justify-content-center">
            @foreach($popularShops as $popularShop)
                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-3 mb-3">
                    <div class="row shop-menu d-flex align-items-center py-2">
						<div class="col-lg-4 d-flex align-items-center p-2">
							<a href="{{ route('shop.show', ['id' => $popularShop->id]) }}" class="card-shop-image-container">
								<img src="{{ asset('storage/' . $popularShop->profile_image) }}" style="width:100%; height:100%;border-radius:50px;">
							</a>

						</div>
						<div class="card-shop-name col-lg-8">
							<a href="{{route('shop.show',['id'=>$popularShop->id])}}" class="title">{{$popularShop->name}}</a>
						</div>
					</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{--    Mobile View--}}
<section class="section-categories d-block d-sm-none">
    <div class="card-image mt-4" style="width:100%;padding:0 30px">
            <div class="d-flex justify-content-between align-items-center">
                <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">All Shops</h4>
            </div>
			<div class="row d-flex justify-content-center mt-3">
                    @foreach($popularShops as $popularShop)
                        <div class="hp-mod-card-hover align-left col-sm-6 col-6 mb-3">
                            <div class="shop-menu text-center py-2" style="width:154px;height:154px">
                                <div class="p-2 text-center">  
								  <a href="{{route('shop.show',['id'=>$popularShop->id])}}" class="card-shop-image-container" style="width:68px;height:68px">
                                    <img style="width:100%;height:100%;border-radius:50px;" src="{{asset('storage/'.$popularShop->profile_image)}}"/></a>
                                </div>
                                <div class="card-shop-name text-center mt-1 px-2">
                                    <a href="{{route('shop.show',['id'=>$popularShop->id])}}" class="title" style="font-size:14px">{{$popularShop->name}}</a>
                                </div>


                            </div>
                        </div>
                    @endforeach
			</div>
    </div>

</section>
@endsection

@section('script')
<script>
	if($('.owl-carousel').length > 0){
            $('#popularshop').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
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