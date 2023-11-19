@extends('layouts.app')
@section('addstyle')
<style>
    .btn-star {
        color: #fbd600 !important;
    }

    .card-title{
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
		font-family: 'Nunito', sans-serif; 
		font-size: 16px; 
		color: #293A8B 
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
            font-family: 'Nunito', sans-serif; 
			font-size: 10px; 
			color: #293A8B !important
            font-weight: 100px;
			display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden
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




</style>
@endsection
@section('content')
	
	
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
<!--================Product Description Area =================-->
<section class="section-margin--small mb-5">
    <div class="card-image" style="width:100%;padding:0 20px">
		<div class="d-flex justify-content-between align-items-center">
            <h4 class="title mb-0" style="font-size:18px">All Products</h4>
        </div>
            <!-- Start Best Seller -->         
                <div class="row mt-4">
				@foreach($product as $prod)
                    <div class="col-sm-3 col-6 m-auto">
                        <div class="card card-product" style="width:150px;height:auto">
							<a href="{{route('showProduct',['id'=>$prod->id])}}" class="card-product__img" style="width:150px;height:150px">
								<div class="card-product__img text-center" style="width:150px;height:150px">
								@if(isset($prod->image[0]))
									<img class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('storage/'.$prod->image[0]->image)}}" alt="">
								@else
									<img class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="">
								@endif
								</div>
							</a>
							
                            <div class="p-2">
                                <p class="card-cate" style="font-size:10px">{{$prod->mainCategory()->first() ? $prod->mainCategory()->first()->name :''}}</p>
                                <p><a href="{{route('showProduct',['id'=>$prod->id])}}" class="title text-truncate" style="font-size:14px">{{$prod->name}}</a></p>
								<div class="d-flex align-items-center mb-1">
								  <small class="fa fa-star btn-star mr-1"></small>
								  <small class="rating">{{ number_format($prod->average_rating / 5, 1) }}</small><small class="rating">({{ $prod->ratings()->count() }})</small>
								</div>
                                <p class="price" style="font-size:10px">RM {{$prod->list_price_on_store}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>       
            <!-- End Best Seller -->
</div>
</section>
<!--================End Product Description Area =================-->


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