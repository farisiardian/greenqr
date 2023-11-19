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
		.card-product-mob {
            height:350px
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
	  .image { 
		height: 100%;
		width: 100%;
		object-fit: cover
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
	.nav.nav-tabs {
            background: #ffffff;
        }
        .nav.nav-tabs li a {
            padding: 5px 10px;
            line-height: 38px;
            background: transparent;
            color: #222;
            font-size: 14px;
            font-weight: normal;
            border:none;
        }
        .nav.nav-tabs li a.active {
            color: #384aeb;
            background: transparent;
            border: none;
        }
        .tab-content {
            border: none;
            padding: 30px 30px 15px 30px;
        }
		
		.card-image{
			position:relative
		}
		
	.text-block {
		position: absolute;
		top: 90px;
		width:800px;
		padding-left: 100px;
		padding-right: 20px;
	}
	.text-blockm {
		position: absolute;
		top: 120px;
		width:390px;
		padding-left: 20px;
		padding-right: 20px;
	}
	.text-block1 {
		position: absolute;
		top: 75px;
		width:530px;
		margin-left: 100px;
		padding: 20px;
		background-color:#12867C
	}
	.text-block1-m {
		position: absolute;
		top: 85px;
		width:328px;
		height:349px;
		margin-left: 20px;
		padding: 60px 30px;
		background-color:#12867C;
	}
	.text-block2 {
		position: absolute;
		top: 3850px;
		margin-left: 30px;
		padding: 20px;
	}
	.text-block2-m {
		position: absolute;
		top: 10px;
		padding: 20px;
	}
		.main{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 800;
			font-size: 54px;
			line-height: 64px;
			display: flex;
			align-items: center;
			color: #1B294E;
		}
		.main-m{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 800;
			font-size: 38px;
			line-height: 45.35px;
			display: flex;
			align-items: center;
			color: #1B294E;
		}
		.contents{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-style: normal;
			font-weight: 500;
			font-size: 18px;
			line-height: 146.34%;
			display: flex;
			align-items: center;
			color: #292C43;
		}
		.contents-m{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-style: normal;
			font-weight: 500;
			font-size: 15px;
			line-height: 20.49px;
			display: flex;
			align-items: center;
			color: #292C43;
		}
		.card-categories-image-container{
			height:180px;
			width:172px;
			border-radius:10px;
		}
		.card-categories-image-container:hover{
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border-radius:10px
		}
		.image-cate{
			object-fit: contain;
			min-width: 100%;
			min-height: 100%;
			border-radius:10px
		}
		.card-categories-name{
			position: absolute;
			top: 30px;
			width:172px;
			padding-left: 10px;
			padding-right: 10px;
			text-align:center
		}
		.categories-name{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 600;
			font-size: 20px;
			line-height: 24px;
			display: flex;
			align-items: center;
			text-align: center;
			color: #FFFFFF;
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
		#carousel1 {
			display: flex;
			overflow-y: hidden;
			overflow-x: auto;
			height:450px;
			scrollbar-width: thin; 
			}
		#carousel1::-webkit-scrollbar {
			-webkit-overflow-scrolling: touch;
			width: 12px;
			background-color: #F5F5F5;
			}
		#carousel1::-webkit-scrollbar-track{
			border-radius: 10px;
			background-color: #F5F5F5;
		}
		#carousel1::-webkit-scrollbar-thumb{
			border-radius: 10px;
			background-color: #555;
		}
		#carousel {
			display: flex;
			overflow-y: hidden;
			overflow-x: auto;
			height:400px;
			scrollbar-width: thin; 
			}
		#carousel::-webkit-scrollbar {
			-webkit-overflow-scrolling: touch;
			width: 12px;
			background-color: #F5F5F5;
			}
		#carousel::-webkit-scrollbar-track{
			border-radius: 10px;
			background-color: #F5F5F5;
		}
		#carousel::-webkit-scrollbar-thumb{
			border-radius: 10px;
			background-color: #555;
		}
		.shop-menu{
			background-color:#F8F8F7;
			border-radius:10px;
			margin-right:10px
			
		}
		.service-card{
			background-color:#F8F6FA;
			border-radius:10px;
			margin-right:10px
			
		}
		.banner-main{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 800;
			font-size: 48px;
			line-height: 57px;
			color: #FFFFFF;
		}
		.banner-main-m{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 800;
			font-size: 30px;
			line-height: 35.8px;
			color: #FFFFFF;
		}
		.banner-main2-m{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 800;
			font-size: 30px;
			line-height: 35.8px;
			color: #FFFFFF;
		}
		.banner-main2{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 800;
			font-size: 36px;
			line-height: 42.96px;
			color: #FFFFFF;
		}
		.banner-sub{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 500;
			font-size: 18px;
			line-height:26.34px;
			color: #FFFFFF;
			width:350px
		}
		.banner-sub-m{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 500;
			font-size: 14px;
			line-height: 20.49px;
			color: #FFFFFF;
			margin:20px 0
		}
		.button-outline {
			display: inline-block;
			border: 1px solid #ffffff;
			border-radius: 30px;
			color: #ffffff;
			font-weight: 500;
			padding: 12px 50px;
			background: transparent;
			color: #fff;
			transition: all .4s ease;
		}
		.button-outline:hover {
			border-color: #384aeb;
			background: #384aeb;
			color: #fff;
		}
		
		.button-cart {
			display: inline-block;
			border: 1px solid #384aeb;
			border-radius: 30px;
			color: #ffffff;
			font-weight: 500;
			padding: 7px 20px;
			background: transparent;
			color: #384aeb;
			transition: all .4s ease;
		}
		.button-cart:hover {
			border-color: #384aeb;
			background: #384aeb;
			color: #fff;
		}
		
		.nav.nav-tabs {
			text-align: center;
			display: block;
			border: none;
			padding: 10px 0px;
		}
		.nav.nav-tabs li a {
			padding: 0px;
			border: none;
			line-height: 38px;
			background: #fff;
			border: 1px solid #D4D5D4;
			border-radius: 30px;
			padding: 0px 30px;
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 600;
			font-size: 12px;
			color: #1C1D1C;
		}
		.nav.nav-tabs li a.active {
			color: #fff;
			background: #384aeb;
			border-color: #384aeb;
		}
		.service-name{
			padding-left:20px;
			padding-top:20px;
			padding-bottom:20px
		}
		.button-shop{
			    display: inline-block;
				border: 1px solid #384aeb;
				border-radius: 30px;
				color: #222;
				font-weight: 500;
				padding: 5px 30px;
				background: #384aeb;
				color: #fff;
				transition: all .4s ease;
		}
		.button-shop:hover {
			border-color: #384aeb;
			background: transparent;
			color: #222;
		}
		.service-image-container {
			border-radius:10px 10px 0px 0px;
			width: 100%;
			height:100%;
		}
		.wrapper
        {   
            position: relative;   
			clear: both;
			margin: 0;
			width: 350px;
			white-space: nowrap;
			overflow-x: auto;
			overflow-y: hidden;
        }
		
		#my-ul-id li {
  margin-bottom: 10px;
}




		
</style>
@endsection

@section('content')
	
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

    {{-- Desktop View --}}
    <section class="mb-4 pb-5 d-none d-xl-block ">
		<div class="card-image" style="width:100%;height:450px">
			<img class="image" src="{{asset('img/12098.jpg')}}" width="100" alt="" >
			<div class="text-block">
				<h1  class="main">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</h4>
				<p  class="contents my-5">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</p>
				<div class="card-load-more">
					<!--a class="button" href="http://206.189.144.207/shop.show/59">Learn More</a-->
					<a hidden class="button" href="http://healthee.com.my/shop.show/59">Learn More</a>
				</div>
			</div>	
		</div>
		<!--Image by <a href="https://www.freepik.com/free-vector/hand-drawn-world-environment-day-template-design_41003101.htm#query=ecommerce%20banner%20green%20theme&position=27&from_view=search&track=ais">Freepik</a>-->
		
    </section>
	
	<!-- ================ Best Selling item  carousel ================= -->
    {{--    Desktop View     --}}
    <section class="d-none d-xl-block ">
        <div style="width:100%;padding:60px 100px">
            <div class="d-flex justify-content-between align-items-center">
                <h2  class="d-none d-xl-block main-title">Explore Popular Brands</h2>
				<a href="{{route('allshops')}}" style="color:#1FA33D">View All</a>
            </div>
			<div>
				<div class="row d-flex justify-content-center">
					@foreach($popularShops as $popularShop)
						<div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-3 mb-3 ">
							<div class="row shop-menu d-flex align-items-center py-2">
								<div class="col-lg-4 d-flex align-items-center p-2">
									<a href="{{ route('shop.show', ['id' => $popularShop->id]) }}" class="card-shop-image-container">
										<img style="width:100%;height:100%;border-radius:50px;" src="{{ asset('storage/' . $popularShop->profile_image) }}" alt="">
									</a>
								</div>
								<div class="col-lg-8 card-shop-name">
										<a href="{{ route('shop.show', ['id' => $popularShop->id, 'tab' => 'shop']) }}" class="title">{{$popularShop->name}}</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			
            
        </div>
		<div class="card-image mt-5" style="width:100%;padding-left:100px;padding-right:100px">
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="d-none d-xl-block main-title">Top Categories</h2>
{{--                <a href="http://206.189.144.207/shop?id=7">View All</a>--}}
					 
				</div> 
				
				<div class="owl-carousel owl-theme px-2" id="categories1">
                    @foreach($desktopcategory as $categorys)
                        <div class="card-categories-li hp-mod-card-hover mb-5">
						<a href="{{route('shop', ['id' => $categorys->id])}}">
                            <div class="card-categories-image-container">
                                <img  class="image-cate" src="{{asset('storage/'.$categorys->image)}}" alt="">
								<div class="card-categories-name">
                                    <a class="categories-name text-center" href="{{route('shop', ['id' => $categorys->id])}}">{!! $categorys->name !!}</a>
								</div>
                            </div>
						</a>
                            
                        </div>
                    @endforeach
                </div>
			</div>
    </section>
{{--    Tab View     --}}
    <section class="d-none d-sm-block d-xl-none">
        <div style="width:100%;padding:60px 100px">
            <div class="d-flex justify-content-between align-items-center">
                <h2  class="main-title">Explore Popular Brands</h2>
				<a href="{{route('allshops')}}" style="color:#1FA33D">View All</a>
            </div>
			<div>
				<div class="row d-flex justify-content-center">
					@foreach($popularShops as $popularShop)
						<div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-3 mb-3 ">
							<div class="row shop-menu d-flex align-items-center py-2">
								<div class="col-lg-4 d-flex align-items-center p-2">
									<a href="{{ route('shop.show', ['id' => $popularShop->id]) }}" class="card-shop-image-container">
										<img style="width:100%;height:100%;border-radius:50px;" src="{{ asset('storage/' . $popularShop->profile_image) }}" alt="">
									</a>
								</div>
								<div class="col-lg-8 card-shop-name">
										<a href="{{ route('shop.show', ['id' => $popularShop->id, 'tab' => 'shop']) }}" class="title">{{$popularShop->name}}</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			
            
        </div>
		<div class="card-image mt-5" style="width:100%;padding-left:100px;padding-right:100px">
				<div class="d-flex justify-content-between align-items-center">
					<h2 class="main-title">Top Categories</h2>
{{--                <a href="http://206.189.144.207/shop?id=7">View All</a>--}}
					 
				</div> 
				
				<div class="owl-carousel owl-theme px-2 " id="categories2">
                    @foreach($desktopcategory as $categorys)
                        <div class="card-categories-li hp-mod-card-hover mb-5">
						<a href="{{route('shop', ['id' => $categorys->id])}}">
                            <div class="card-categories-image-container">
                                <img  class="image-cate" src="{{asset('storage/'.$categorys->image)}}" alt="">
								<div class="card-categories-name">
                                    <a class="categories-name text-center" href="{{route('shop', ['id' => $categorys->id])}}">{!! $categorys->name !!}</a>
								</div>
                            </div>
						</a>
                            
                        </div>
                    @endforeach
                </div>
			</div>
    </section>
    {{--    Mobile View--}}
    <section class=" d-block d-sm-none mt-5">
        <div class="card-image" style="width:100%;padding:0 30px">
			<div class="d-flex justify-content-between align-items-center">
                <h4 class="title mb-0" style="font-size:18px">Explore Popular Brands</h4>
				<a href="{{route('allshops')}}" style="color:#1FA33D">View All</a>
			</div>
				{{--<div class="owl-carousel owl-theme" id="popularshop">

                        @foreach($popularShops as $popularShop)
						<div class="item">
                            <div class="card card-product-mb">
                                <div class="card-content text-center">
                                    <img class="card-img-top img-fluid" src="{{asset('storage/'.$popularShop->profile_image)}}" style="width: 99px; height: 90px;"/>
                                </div>
                                <div class="text-center">
                                    <a href="{{route('shop.show',['id'=>$popularShop->id])}}" class="card-title-product-cate">{{$popularShop->name}}</a>
                                </div>


                            </div>
                        </div>
						@endforeach
				</div>--}}
				
				<div class="row d-flex justify-content-center mt-3">
					@foreach($popularShops as $popularShop)
						<div class="hp-mod-card-hover align-left col-sm-6 col-6 mb-3 ">
							<div class="shop-menu text-center py-2" style="width:154px;height:154px">
								<div class="p-2 text-center">
									<a href="{{ route('shop.show', ['id' => $popularShop->id]) }}" class="card-shop-image-container" style="width:68px;height:68px">
										<img style="width:100%;height:100%;border-radius:50px;" src="{{ asset('storage/' . $popularShop->profile_image) }}" alt="">
									</a>
									<div class=" card-shop-name text-center mt-1 px-2">
										<a href="{{ route('shop.show', ['id' => $popularShop->id, 'tab' => 'shop']) }}" class="title" style="font-size:14px">{{$popularShop->name}}</a>
									</div>
								</div>
								
							</div>
						</div>
					@endforeach
				</div>
        </div>

    </section>

    {{-- Mobile View --}}
    <section class="d-block d-sm-none ">
		
        <div class="card-image" style="width:100%;height:150px">
				<img class="image" src="{{asset('img/12098.jpg')}}" width="100" alt="" >
				<div class="text-blockm">
					<div class="card-load-more">
						<a class="button" style="background-color:#274439" href="http://healthee.com.my/shop.show/59">Learn More</a>
					</div>
				</div>	
			</div>
    </section>
    

    </section>
    {{-- Mobile View --}}
    <section class="d-block d-sm-none mt-4">
        <div class="card-image" style="width:100%;padding:0 30px">
            
			<div class="d-flex justify-content-between align-items-center">
                    <h4 class="title" style="font-size:18px">Top Categories</h4>
			</div>
                    <div class="owl-carousel owl-theme mt-3" id="categories">
                        @foreach($category as $categorys)
							<div class="hp-mod-card-hover mb-5">
								<div class="card-categories-image-container" style="width:147.92px">
									<a href="{{route('shop', ['id' => $categorys->id])}}" class="text-center">
										<img  class="image-cate" src="{{asset('storage/'.$categorys->image)}}" alt="">
										<div class="card-categories-name" style="width:104.92px">
											<p class="categories-name" href="{{route('shop', ['id' => $categorys->id])}}">{!! 	$categorys->name !!}</p>
										</div>
									</a>
								</div>
							</div>
								
                        @endforeach
						
                    </div>
        </div>

    </section>



    <!--================ Popular Product =================-->
    {{--Dekstop View--}}
    <!--section class="pt-3 d-none d-xl-block py-5">
        <div class="card-image" style="width:100%;padding-left:100px;padding-right:100px" >
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="main-title d-none d-xl-block">Weekly Popular Product</h2>
{{--                <a href="http://206.189.144.207/shop?id=7">View All</a>--}}
            </div> 
			
            <div id="carousel1">xvdzvxdvxcvxcvxzvzxczx
			@foreach($popularProducts as $popularProduct)
                <div class="col-sm-3 col-4 mr-2">
                    <div class="card card-product">
					<a class="card-product__img" href="{{route('showProduct',['id'=>$popularProduct->id])}}">
                        <div class="card-product__img text-center">
                            @if($popularProduct->image()->first())
                                <img
                                    src="{{asset('storage/'.$popularProduct->image()->first()->image)}}"
                                    class="card-img" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px"/>
                            @else
                                <img
                                    src="{{asset('admin/assets/img/avatars/default_product.png')}}"
                                    class="card-img" style="height: 252px; width: 252px; object-fit: cover;border-radius:10px"/>
                            @endif
                        </div>
					</a>
                        <div class="py-2 ">
							
                            <p class="card-cate">{{$popularProduct->mainCategory()->first() ? $popularProduct->mainCategory()->first()->name :''}}</p>
                            <p><a href="{{route('showProduct',['id'=>$popularProduct->id])}}" class="title">{{$popularProduct->name}}</a></p>
							<div class="d-flex align-items-center mb-1">
                                @php
								$rating = $popularProduct->ratings()->avg('rating');
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
							<small>({{$popularProduct->ratings()->count()}})</small>
                            </div>
                            <p class="price">RM{{$popularProduct->list_price_on_store}}</p>
							 <form id="cart-form-{{$popularProduct->id}}" action="{{ route('cart.store') }}" method="POST" >
                                @csrf
                                <input type="hidden" value="{{$popularProduct->id}}" name="id">
                                <input type="hidden" id="option-value" value="cart" name="option">
							 </form>
							 <a onclick="event.preventDefault(); document.getElementById('cart-form-{{$popularProduct->id}}').submit();" class="button-cart mt-2" href="#">Add to Cart</a>
                        </div>
                    </div>
                </div>
				 @endforeach
            </div>
			 
                </div>
			
               

        </div>
    </section-->
    {{--Mobile View--}}
    <!--section class="section-categories d-block d-sm-none mt-4">
        <div class="card-image" style="width:100%;padding:0 30px">
			<div class="d-flex justify-content-between align-items-center">
                <h4 class="title mb-0" style="font-size:18px">Weekly Popular Products</h4>
				<a href="{{route('allproduct_mobile')}}">Shop All</a>
			</div>
                    <div class="owl-carousel owl-theme mt-4" id="productpopular">
					@foreach($popularProducts as $popularProduct)
						<div class="item">
                            <div class="card card-product" style="width:230px;height:auto">
                                <div class="card-product__img text-center" style="width:230px;height:230px">
                                @if($popularProduct->image()->first())
                                	<img src="{{asset('storage/'.$popularProduct->image()->first()->image)}}" class="card-img-top" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px"/>
                                @else
                                   	<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px"/>
                                @endif
                                </div>
                                <div class="p-2">
                                    <p class="card-cate" style="font-size:10px">{{$popularProduct->mainCategory()->first() ? $popularProduct->mainCategory()->first()->name :''}}</p>
                                
                                    <p><a href="{{route('showProduct',['id'=>$popularProduct->id])}}" class="title text-truncate" style="font-size:14px">{{$popularProduct->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
									@php
									$rating = $popularProduct->ratings()->avg('rating');
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
										<small>({{$popularProduct->ratings()->count()}})</small>
									</div>
                                
                                    <p class="price" style="font-size:10px">RM{{$popularProduct->list_price_on_store}}</p>
                                </div>
                            </div>
						</div>
						@endforeach
                    </div>
        </div>

    </section-->
    <!--================ Hero Carousel end =================-->



    

    <!-- ================ Best Selling item  carousel end ================= -->
{{--    Desktop View--}}
    <!--section class="mb-4 pb-5 d-none d-xl-block">
        <div class="card-image" style="width:100%;height:500px">
				<img class="image" src="{{asset('img/banner8.png')}}" width="100" alt="" >
				<div class="text-block1">
					<h1 class="banner-main">Healthy Food Menu For RM15</h1>
					<p class="banner-sub my-5">Now Available Online. Enjoy our healthy menu, made with the best ingredients.</p>
					<div class="card-load-more">
						<!--a class="button-outline" href="http://206.189.144.207/shop/2">Learn More</a-->
						<!--a class="button-outline" href="http://healthee.com.my/shop/2">Learn More</a>
					</div>
				</div>	
		</div>
    </section-->

{{-- Mobile View--}} 
	<!--section class="mt-3 d-block d-sm-none  mt-4">
        <div class="card-image" style="width:100%;height:519px">
				<img class="image" src="{{asset('img/banner8-m.png')}}" width="100" alt="" >
				<div class="text-block1-m">
					<h1 class="banner-main-m">Healthy Food Menu For RM15</h1>
					<p class="banner-sub-m">Now Available Online. Enjoy our healthy menu, made with the best ingredients.</p>
					<div class="card-load-more">
						<!--a class="button-outline" href="http://206.189.144.207/shop/2">Learn More</a-->
						<!--a class="button-outline" href="http://healthee.com.my/shop/2">Learn More</a>
					</div>
				</div>	
		</div>
    </section-->

    <!-- ================ Just For You  carousel Start ================= -->
{{--    Desktop View--}}
    <section class=" d-none d-xl-block" id="target-section">
        <div style="width:100%;padding:60px 100px">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="d-none d-xl-block main-title"> Shop Now</h2>
				<a href="{{route('allproduct')}}" style="color:#1FA33D">Shop All</a>
            </div>
			<ul hidden class="nav nav-tabs" id="myTab" role="tablist" **id="my-ul-id"**>
			  @foreach($desktopcategory as $category)
				<li class="nav-item mb-4">
				  <a class="nav-link category-link" href="{{ url('/getproductbasedoncategories/'.$category->id) }}#target-section" role="tab" aria-selected="true">{{$category->name}}</a>				
				</li>
			  @endforeach
			</ul>





			
			<div class="tab-content px-0" id="myTabContent">
				<div class="tab-pane fade show active" id="lists" role="tabpanel" aria-labelledby="lists">
				
					<div id="product-list-container" class="row pb-5">
					
					@foreach($listProductsBasedoncategory as $product_list)
{{--                	@foreach($products->limit('8') as $key=>$product_list)--}}
				
						<div class="col-sm-3 col-4" style="padding-bottom:100px">
					
							<div class="card card-product">
						
								<a class="card-product__img" href="{{route('showProduct',['id'=>$product_list->id])}}">
									<div class="card-product__img">
									@if($product_list->image()->first())								
										<img src="{{asset('storage/'.$product_list->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>								
									@else
										<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img"style="height:100%;width: 100%; object-fit: cover;border-radius:10px"/>
									@endif
									</div>
								</a>
								<div class="py-2">
									<p class="card-cate">{{$product_list->mainCategory()->first() ? $product_list->mainCategory()->first()->name :''}}</p>
									<p><a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title">{{$product_list->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
										@php
										$rating = $product_list->ratings()->avg('rating');
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
										<small>({{$product_list->ratings()->count()}})</small>
									</div>
									<p class="price">RM{{$product_list->list_price_on_store}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="healthy" role="tabpanel" aria-labelledby="healthy-tab">
					<div class="row pb-5">
					@foreach($products as $product_list)
{{--                	@foreach($products->limit('8') as $key=>$product_list)--}}
				
						<div class="col-sm-3 col-4" style="padding-bottom:100px">
							<div class="card card-product">
								<a class="card-product__img" href="{{route('showProduct',['id'=>$product_list->id])}}">
									<div class="card-product__img">
									@if($product_list->image()->first())
										<img src="{{asset('storage/'.$product_list->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
									@else
										<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img"style="height:100%;width: 100%; object-fit: cover;border-radius:10px"/>
									@endif
									</div>
								</a>
								<div class="py-2">
									<p class="card-cate">{{$product_list->mainCategory()->first() ? $product_list->mainCategory()->first()->name :''}}</p>
									<p><a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title text-truncate">{{$product_list->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
										@php
										$rating = $product_list->ratings()->avg('rating');
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
										<small>({{$product_list->ratings()->count()}})</small>
									</div>
									<p class="price">RM{{$product_list->list_price_on_store}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="mum" role="tabpanel" aria-labelledby="mum-tab">
					<div class="row pb-5">
					@foreach($products as $product_list)
{{--                	@foreach($products->limit('8') as $key=>$product_list)--}}
				
						<div class="col-sm-3 col-4" style="padding-bottom:100px">
					
							<div class="card card-product">
						
								<a class="card-product__img" href="{{route('showProduct',['id'=>$product_list->id])}}">
									<div class="card-product__img">
							
						
									@if($product_list->image()->first())
								
										<img src="{{asset('storage/'.$product_list->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
									 
								
									@else
										<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img"style="height:100%;width: 100%; object-fit: cover;border-radius:10px"/>
									@endif
							
							
									</div>
								</a>
								<div class="py-2">
									<p class="card-cate">{{$product_list->mainCategory()->first() ? $product_list->mainCategory()->first()->name :''}}</p>
									<p><a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title text-truncate">{{$product_list->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
										@php
										$rating = $product_list->ratings()->avg('rating');
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
										<small>({{$product_list->ratings()->count()}})</small>
									</div>
									<p class="price">RM{{$product_list->list_price_on_store}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="wellness" role="tabpanel" aria-labelledby="wellness-tab">
					<div class="row pb-5">
					@foreach($products as $product_list)
{{--                	@foreach($products->limit('8') as $key=>$product_list)--}}
				
						<div class="col-sm-3 col-4" style="padding-bottom:100px">
					
							<div class="card card-product">
						
								<a class="card-product__img" href="{{route('showProduct',['id'=>$product_list->id])}}">
									<div class="card-product__img">
							
						
									@if($product_list->image()->first())
								
										<img src="{{asset('storage/'.$product_list->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
									 
								
									@else
										<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img"style="height:100%;width: 100%; object-fit: cover;border-radius:10px"/>
									@endif
							
							
									</div>
								</a>
								<div class="py-2">
									<p class="card-cate">{{$product_list->mainCategory()->first() ? $product_list->mainCategory()->first()->name :''}}</p>
									<p><a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title text-truncate">{{$product_list->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
										@php
										$rating = $product_list->ratings()->avg('rating');
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
										<small>({{$product_list->ratings()->count()}})</small>
									</div>
									<p class="price">RM{{$product_list->list_price_on_store}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
        </div>
    </section>
	{{-- Tab View --}}
    <section class="d-none d-sm-block d-xl-none" id="target-section">
        <div style="width:100%;padding:60px 100px">dsfsdfsdfsd
            <div class="d-flex justify-content-between align-items-center">
                <h2  class="d-none d-sm-block d-xl-none main-title"> Shop Now</h2>
				<a href="{{route('allproduct_tab')}}" style="color:#1FA33D">Shop All</a>
            </div>
			<ul hidden class="nav nav-tabs" id="myTab" role="tablist" **id="my-ul-id"**>
			  @foreach($desktopcategory as $category)
				<li class="nav-item mb-4">
				  <a class="nav-link category-link" href="{{ url('/getproductbasedoncategories/'.$category->id) }}#target-section" role="tab" aria-selected="true">{{$category->name}}</a>				
				</li>
			  @endforeach
			</ul>





			
			<div class="tab-content px-0" id="myTabContent">
				<div class="tab-pane fade show active" id="lists" role="tabpanel" aria-labelledby="lists">
				
					<div id="product-list-container" class="row pb-5">
					
					@foreach($listProductsBasedoncategory as $product_list)
{{--                	@foreach($products->limit('8') as $key=>$product_list)--}}
				
						<div class="col-sm-3 col-md-6" style="padding-bottom:100px">
					
							<div class="card card-product">
						
								<a class="card-product__img" href="{{route('showProduct',['id'=>$product_list->id])}}">
									<div class="card-product__img">
									@if($product_list->image()->first())								
										<img src="{{asset('storage/'.$product_list->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>								
									@else
										<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img"style="height:100%;width: 100%; object-fit: cover;border-radius:10px"/>
									@endif
									</div>
								</a>
								<div class="py-2">
									<p class="card-cate">{{$product_list->mainCategory()->first() ? $product_list->mainCategory()->first()->name :''}}</p>
									<p><a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title">{{$product_list->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
										@php
										$rating = $product_list->ratings()->avg('rating');
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
										<small>({{$product_list->ratings()->count()}})</small>
									</div>
									<p class="price">RM{{$product_list->list_price_on_store}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="healthy" role="tabpanel" aria-labelledby="healthy-tab">
					<div class="row pb-5">
					@foreach($products as $product_list)
{{--                	@foreach($products->limit('8') as $key=>$product_list)--}}
				
						<div class="col-sm-3 col-4" style="padding-bottom:100px">
							<div class="card card-product">
								<a class="card-product__img" href="{{route('showProduct',['id'=>$product_list->id])}}">
									<div class="card-product__img">
									@if($product_list->image()->first())
										<img src="{{asset('storage/'.$product_list->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
									@else
										<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img"style="height:100%;width: 100%; object-fit: cover;border-radius:10px"/>
									@endif
									</div>
								</a>
								<div class="py-2">
									<p class="card-cate">{{$product_list->mainCategory()->first() ? $product_list->mainCategory()->first()->name :''}}</p>
									<p><a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title text-truncate">{{$product_list->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
										@php
										$rating = $product_list->ratings()->avg('rating');
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
										<small>({{$product_list->ratings()->count()}})</small>
									</div>
									<p class="price">RM{{$product_list->list_price_on_store}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="mum" role="tabpanel" aria-labelledby="mum-tab">
					<div class="row pb-5">
					@foreach($products as $product_list)
{{--                	@foreach($products->limit('8') as $key=>$product_list)--}}
				
						<div class="col-sm-3 col-4" style="padding-bottom:100px">
					
							<div class="card card-product">
						
								<a class="card-product__img" href="{{route('showProduct',['id'=>$product_list->id])}}">
									<div class="card-product__img">
							
						
									@if($product_list->image()->first())
								
										<img src="{{asset('storage/'.$product_list->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
									 
								
									@else
										<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img"style="height:100%;width: 100%; object-fit: cover;border-radius:10px"/>
									@endif
							
							
									</div>
								</a>
								<div class="py-2">
									<p class="card-cate">{{$product_list->mainCategory()->first() ? $product_list->mainCategory()->first()->name :''}}</p>
									<p><a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title text-truncate">{{$product_list->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
										@php
										$rating = $product_list->ratings()->avg('rating');
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
										<small>({{$product_list->ratings()->count()}})</small>
									</div>
									<p class="price">RM{{$product_list->list_price_on_store}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="tab-pane fade" id="wellness" role="tabpanel" aria-labelledby="wellness-tab">
					<div class="row pb-5">
					@foreach($products as $product_list)
{{--                	@foreach($products->limit('8') as $key=>$product_list)--}}
				
						<div class="col-sm-3 col-4" style="padding-bottom:100px">
					
							<div class="card card-product">
						
								<a class="card-product__img" href="{{route('showProduct',['id'=>$product_list->id])}}">
									<div class="card-product__img">
							
						
									@if($product_list->image()->first())
								
										<img src="{{asset('storage/'.$product_list->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
									 
								
									@else
										<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img"style="height:100%;width: 100%; object-fit: cover;border-radius:10px"/>
									@endif
							
							
									</div>
								</a>
								<div class="py-2">
									<p class="card-cate">{{$product_list->mainCategory()->first() ? $product_list->mainCategory()->first()->name :''}}</p>
									<p><a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title text-truncate">{{$product_list->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
										@php
										$rating = $product_list->ratings()->avg('rating');
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
										<small>({{$product_list->ratings()->count()}})</small>
									</div>
									<p class="price">RM{{$product_list->list_price_on_store}}</p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
        </div>
    </section>
{{--Mobile View--}}
    <section class="section-categories d-block d-sm-none mt-5">
        <div class="card-image" style="width:100%;padding:0 30px">
			<div class="d-flex justify-content-between align-items-center">
                <h4 class="title mb-0" style="font-size:18px">Shop Now</h4>
				<a href="{{route('allproduct_mobile')}}" style="color:#1FA33D">Shop All</a>
			</div>
			<div hidden class="wrapper">
				<!--ul class="nav nav-tabs" id="myTab" role="tablist" style="display: inline-block;vertical-align: top;">
				@foreach($desktopcategory as $category)
						<li class="nav-item">
						<a class="nav-link category-link" data-toggle="tab" href="#category-{{$category->id}}" role="tab" aria-controls="category-{{$category->id}}" aria-selected="true">{{$category->name}}</a>
				
					</li>
				@endforeach
				</ul-->
				<ul class="nav nav-tabs" id="myTab" role="tablist" style="display: inline-block;vertical-align: top;">
				@foreach($desktopcategory as $category)
				  <li class="nav-item">
					<a class="nav-link category-link" href="{{ url('/getproductbasedoncategories/'.$category->id) }}" role="tab" aria-selected="true">{{$category->name}}</a>				
				  </li>
				@endforeach
				</ul>
			</div>
			
				<!--div class="owl-carousel owl-theme mt-3" id="justforyou-TEST">
					@foreach($listProductsBasedoncategory as $product_list)
                        <div class="item" id="product-list-container">
                            <div class="card card-product" style="width:230px;height:auto">
								<a class="card-product__img" href="{{route('showProduct',['id'=>$product_list->id])}}" style="width:230px;height:230px">
                                <div class="card-product__img " style="width:230px;height:230px">  
									
										@if($product_list->image()->first())
										<img src="{{asset('storage/'.$product_list->image()->first()->image)}}" class="card-img" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px"/>
									
									@else
										<a href="{{route('showProduct',['id'=>$product_list->id])}}">
											<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px"/>
										</a>
									@endif
									

                                </div>
								</a>
								<div class=" p-2 ">
									<p class="card-cate" style="font-size:10px">{{$product_list->mainCategory()->first() ? $product_list->mainCategory()->first()->name :''}}</p>
									<p><a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title text-truncate" style="font-size:14px">{{$product_list->name}}</a></p>
									<div class="d-flex align-items-center mb-1">
									@php
									$rating = $product_list->ratings()->avg('rating');
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
										<small>({{$product_list->ratings()->count()}})</small>
									</div>
									<p class="price" style="font-size:10px">RM{{$product_list->list_price_on_store}}</p>
									{{--<div class="d-flex align-items-center mb-1">
									  <small class="fa fa-star btn-star mr-1"></small>
									  <small>{{ number_format($product_list->average_rating / 5, 1) }}</small><small>({{ $product_list->ratings()->count() }})</small>
									</div>--}}

								</div>

                            </div>
                        </div>
					@endforeach
					</div-->
					
					<div class="row">
					@foreach($listProductsBasedoncategory as $products)
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
	
	
	
	<!--================ Banner =================-->
	<!--section class=" d-none d-xl-block">
        <div style="width:100%;padding:0 100px;height:266px">
			<img class="image" src="{{asset('img/banner9.png')}}" width="100" alt="" >
				<div class="text-block2">
					<h1 class="banner-main2">In The Pink of Health</h1>
					<p class="banner-sub my-4">Get a Comprehensive Breast Cancer screening for RM180</p>
					<div class="card-load-more">
						<a class="button-outline" href="http://healthee.com.my/shop.show/59">Learn More</a>
					</div>
				</div>	
		</div>
	</section-->
	
	<!--================ Banner Mobile =================-->
	<!--section class=" section-categories d-block d-sm-none mt-5">
        <div class="card-image" style="width:329px;height:300px;margin:0 auto">
			<img class="image" src="{{asset('img/banner9-m.png')}}" width="100" alt="" >
				<div class="text-block2-m">
					<h1 class="banner-main2-m">In The Pink of Health</h1>
					<p class="banner-sub-m">Get a Comprehensive Breast Cancer screening for RM180</p>
					<div class="card-load-more">
						<a class="button-outline" href="http://healthee.com.my/shop.show/59">Learn More</a>
					</div>
				</div>	
		</div>
	</section-->
	
	<!--================ What's New =================-->
    {{--Dekstop View--}}
    <!--section class="pt-3 d-none d-xl-block py-5">
        <div class="card-image" style="width:100%;padding-left:100px;padding-right:100px" >
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="main-title d-none d-xl-block">What's New</h2>
				<a href="http://healthee.com.my/shop?id=7">Shop All</a>
            </div> 
			
            <div id="carousel">
			@foreach($popularProducts as $popularProduct)
                <div class="col-sm-3 col-4 mr-2">
                    <div class="card card-product">
						<a class="card-product__img" href="{{route('showProduct',['id'=>$popularProduct->id])}}">
                        <div class="card-product__img text-center">
                            @if($popularProduct->image()->first())
                                <img
                                    src="{{asset('storage/'.$popularProduct->image()->first()->image)}}"
                                    class="card-img" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px"/>
                            @else
                                <img
                                    src="{{asset('admin/assets/img/avatars/default_product.png')}}"
                                    class="card-img" style="height: 252px; width: 252px; object-fit: cover;border-radius:10px"/>
                            @endif
                        </div>
						</a>
                        <div class="py-2">
                            <p class="card-cate">{{$popularProduct->mainCategory()->first() ? $popularProduct->mainCategory()->first()->name :''}}</p>
                            <p><a href="{{route('showProduct',['id'=>$popularProduct->id])}}" class="title">{{$popularProduct->name}}</a></p>
							<div class="d-flex align-items-center mb-1">
                                @php
								$rating = $popularProduct->ratings()->avg('rating');
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
							<small>({{$popularProduct->ratings()->count()}})</small>
                            </div>
                            <p class="price">RM{{$popularProduct->list_price_on_store}}</p>
                            
                        </div>
                    </div>
                </div>
				 @endforeach
            </div>
			
               

        </div>
    </section-->
	
	{{--Mobile View--}}
    <!--section class="section-categories d-block d-sm-none mt-5">
        <div class="card-image" style="width:100%;padding:0 30px">
			<div class="d-flex justify-content-between align-items-center">
                <h4 class="title mb-0" style="font-size:18px">What's New</h4>
				<a href="{{route('allproduct_mobile')}}">Shop All</a>
			</div>
			
            <div class="owl-carousel owl-theme mt-3" id="bestdeals">
			@foreach($popularProducts as $popularProduct)
                <div class="item">
                    <div class="card card-product" style="width:230px;height:auto">
						<a class="card-product__img" href="{{route('showProduct',['id'=>$popularProduct->id])}}" style="width:230px;height:230px">
                        <div class="card-product__img text-center"style="width:230px;height:230px">
                            @if($popularProduct->image()->first())
                                <img
                                    src="{{asset('storage/'.$popularProduct->image()->first()->image)}}"
                                    class="card-img" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px"/>
                            @else
                                <img
                                    src="{{asset('admin/assets/img/avatars/default_product.png')}}"
                                    class="card-img" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px"/>
                            @endif
                        </div>
						</a>
                        <div class="py-2">
                            <p class="card-cate" style="font-size:10px">{{$popularProduct->mainCategory()->first() ? $popularProduct->mainCategory()->first()->name :''}}</p>
                            <p><a href="{{route('showProduct',['id'=>$popularProduct->id])}}" class="title text-truncate" style="font-size:14px">{{$popularProduct->name}}</a></p>
							<div class="d-flex align-items-center mb-1">
                                @php
								$rating = $popularProduct->ratings()->avg('rating');
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
							<small>({{$popularProduct->ratings()->count()}})</small>
                            </div>
                            <p class="price" style="font-size:10px">RM{{$popularProduct->list_price_on_store}}</p>
                            
                        </div>
                    </div>
                </div>
				 @endforeach
            </div>
			
               

        </div>
    </section-->
	
	{{--Dekstop View--}}
    <!--section class="pt-3 d-none d-xl-block py-5">
        <div class="card-image" style="width:100%;padding-left:100px;padding-right:100px" >
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="main-title d-none d-xl-block">Trending Services</h2>
				<a href="http://healthee.com.my/shop?id=7">Shop All</a>
            </div> 
			<div>
				<div class="row">
					<div class="card-shop-li col-sm-12 col-6 col-lg-6 mb-3 ">
							<div class="service-card">
									<div class="service-image-container">
										<img class="img-fluid" style="min-width:100%; min-height:100%; border-radius:10px 10px 0px 0px;" src="{{asset('img/banner6.png')}}" alt="">
									</div>
								<div class="service-name">
									<p class="title">Fitokio</p>
									<p class="substitle">Malaysia’s First Lava Fitness Studio</p>
									<div class="card-load-more">
										<a class="button-shop" href="http://healthee.com.my/shop.show/25?tab=shop">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-shop-li col-sm-12 col-6 col-lg-6 mb-3 ">
							<div class="service-card">
									<div class="service-image-container">
										<img class="img-fluid" style="min-width:100%; min-height:100%; border-radius:10px 10px 0px 0px;" src="{{asset('img/banner7.png')}}" alt="">
									</div>
								<div class="service-name">
									<p class="title">Gaia Health</p>
									<p class="substitle">Test your blood glucose level anytime, anywhere</p>
									<div class="card-load-more">
										<a class="button-shop" href="http://healthee.com.my/shop.show/24?tab=shop">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
			
		</div>
	</section-->
	
	{{--Mobile View--}}
    <!--section class="section-categories d-block d-sm-none mt-5">
        <div class="card-image" style="width:100%;padding:0 30px">
			<div class="d-flex justify-content-between align-items-center">
                <h4 class="title mb-0" style="font-size:18px">Trending Services</h4>
			</div>
				<div class="row mt-4">
					<div class="col-sm-12 col-12 mb-3 ">
							<div class="service-card">
									<div class="service-image-container">
										<img class="img-fluid" style="min-width:100%; min-height:100%; border-radius:10px 10px 0px 0px;" src="{{asset('img/banner6.png')}}" alt="">
									</div>
								<div class="service-name">
									<p class="title">Fitokio</p>
									<p class="substitle">Malaysia’s First Lava Fitness Studio</p>
									<div class="card-load-more">
										<a class="button-shop" href="http://healthee.com.my/shop.show/25?tab=shop">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-12 mb-3 ">
							<div class="service-card">
									<div class="service-image-container">
										<img class="img-fluid" style="min-width:100%; min-height:100%; border-radius:10px 10px 0px 0px;" src="{{asset('img/banner7.png')}}" alt="">
									</div>
								<div class="service-name">
									<p class="title">Gaia Health</p>
									<p class="substitle">Test your blood glucose level anytime, anywhere</p>
									<div class="card-load-more">
										<a class="button-shop" href="http://healthee.com.my/shop.show/24?tab=shop">Shop Now</a>
									</div>
								</div>
							</div>
						</div>
				</div>
			
		</div>
	</section-->
	<section class="mb-4 pb-5 d-none d-xl-block ">
		<div class="card-image" style="width:100%;height:450px">
			<img class="image" src="{{asset('img/anuj24feb_22.jpg')}}" width="100" alt="" >
			<div class="text-block">
				<h1  class="main">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</h4>
				<p  class="contents my-5">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</p>
				<div class="card-load-more">
					<!--a class="button" href="http://206.189.144.207/shop.show/59">Learn More</a-->
					<a hidden class="button" href="http://healthee.com.my/shop.show/59">Learn More</a>
				</div>
			</div>	
		</div>
		<!--Image by <a href="https://www.freepik.com/free-vector/hand-drawn-world-environment-day-template-design_41003101.htm#query=ecommerce%20banner%20green%20theme&position=27&from_view=search&track=ais">Freepik</a>-->
		
    </section>
	<section class="mb-4 pb-5 d-none d-sm-block d-xl-none">
		<div class="card-image" style="width:100%;height:450px">
			<img class="image" src="{{asset('img/anuj24feb_22.jpg')}}" width="100" alt="" >
			<div class="text-block">
				<h1  class="main">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</h4>
				<p  class="contents my-5">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</p>
				<div class="card-load-more">
					<!--a class="button" href="http://206.189.144.207/shop.show/59">Learn More</a-->
					<a hidden class="button" href="http://healthee.com.my/shop.show/59">Learn More</a>
				</div>
			</div>	
		</div>
		<!--Image by <a href="https://www.freepik.com/free-vector/hand-drawn-world-environment-day-template-design_41003101.htm#query=ecommerce%20banner%20green%20theme&position=27&from_view=search&track=ais">Freepik</a>-->
		
    </section>
	<div class="d-block d-sm-none"><div style="display: block; height: 60px;"></div></div>
    <nav class="footer-mobile fixed-bottom d-block d-sm-none bg-white">
        <div class="d-flex justify-content-around">
            <a class="text-center" href="{{route('/')}}"><img class="tabbar-item-icon" src="{{asset('img/lifecarelogo.png')}}" alt=""><span class="d-block" style="font-size: 10px">Home</span></a>
            <a class="text-center" href="http://healthee.com.my/shop?id=7"><img class="tabbar-item-icon" src="{{asset('img/categories.png')}}" alt=""><span class="d-block" style="font-size: 10px">Categories</span></a>
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
            $('#categories').owlCarousel({
                loop:false,
                nav:true,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:2

                    },
                    600:{
                        items: 2
                    },
                    900:{
                        items:2
                    },
                    1130:{
                        items:2
                    }
                }
            })
        }
		if($('.owl-carousel').length > 0){
            $('#categories2').owlCarousel({
                loop:true,
                nav:false,
                navText: false,
                dots: false,
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
            $('#categories1').owlCarousel({
                loop:false,
                nav:true,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:4,
                        loop:true,

                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3                 
                    },
                    1130:{
                        items:6
                    }
                }
            })
        }
		if($('.owl-carousel').length > 0){
            $('#categories2').owlCarousel({
                loop:false,
                nav:true,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:4,
                        loop:true,

                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3                 
                    },
                    1130:{
                        items:6
                    }
                }
            })
        }
        if($('.owl-carousel').length > 0){
            $('#banner-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
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
        if($('.owl-carousel').length > 0){
            $('#productpopular').owlCarousel({
                loop:false,
                margin:10,
                nav:true,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items: 2
                    },
                    900:{
                        items:2
                    },
                    1130:{
                        items:4
                    }
                }
            })
        }
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
        if($('.owl-carousel').length > 0){
            $('#bestdeals').owlCarousel({
                loop:false,
                margin:10,
                nav:false,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:1
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
            $('#justforyou').owlCarousel({
                loop:false,
                margin:10,
                nav:false,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:1
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
            $('#justforyou-tab').owlCarousel({
                loop:false,
                margin:10,
                nav:false,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:4
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
            $('#popularpackageCarousel').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                navText: ["<i class='ti-angle-left d-flex align-items-center rounded p-2'></i>","<i class='ti-angle-right rounded p-2 d-flex align-items-center'></i>"],
                dots: true,
                responsive:{
                    0:{
                        items:2,
                        nav:false,
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

<!--script>

// Add a click event listener to the category links
$('.category-link').on('click', function(e) {
  e.preventDefault(); // Prevent the link from navigating to a new page
  
  // Get the category ID from the link's href attribute
  var categoryId = $(this).attr('href').split('#')[1];
  
  // Send an AJAX request to get the shops for the selected category
  $.ajax({
    url: '/getproductbasedoncategories/' + categoryId,
    method: 'GET',
    success: function(response) {
      // Update the shop list container with the new shops
      $('#product-list-container').html(response);
      
      // Update the active tab to show the selected category
      $('.category-link').removeClass('active');
      $(this).addClass('active');
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
  });
});

</script-->
<script>
$('.category-link').on('click', function(e) {
  e.preventDefault(); // Prevent the link from navigating to a new page
  
  // Get the URL for the shops for the selected category
  var shopsUrl = $(this).attr('href');
  
  // Send an AJAX request to get the shops for the selected category
  $.ajax({
    url: shopsUrl,
    method: 'GET',
    success: function(response) {
		console.log(response);
      // Update the shop list container with the new shops
      $('#product-list-container').html(response);
      
      // Update the browser's URL to match the selected category
      history.pushState({}, '', shopsUrl);
    },
    error: function(xhr, status, error) {
      console.log(error);
    }
	location.reload();

  });
});


document.addEventListener('DOMContentLoaded', function() {
    var links = document.querySelectorAll('.category-link');
    for (var i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function(event) {
            event.preventDefault();
            var target = this.dataset.target;
            document.querySelector(target).scrollIntoView({
                behavior: 'smooth'
            });
        });
    }
});

</script>



@endsection
