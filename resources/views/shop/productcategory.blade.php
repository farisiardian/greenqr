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
		
		.card-title-cat a{
            color: #384AEB !important;
			font-size:12px;
			display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
			
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
	.subcat{
		border: solid 1px #384AEB;
		display:flex;
		justify-content:center;
		align-items:center;
		align-self:center
	}
	.card-categories-image-container{
			height:150px;
			width:132px;
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
			top: 10px;
			width:172px;
			padding-left: 10px;
			padding-right: 10px;
		}
		.categories-name{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 600;
			font-size: 17px;
			line-height: 24px;
			display: flex;
			align-items: center;
			color: #FFFFFF;
		}




    </style>
@endsection
@section('content')




    <!--================Mobile Area =================-->
	
	<section class="section-categories d-block d-sm-none mt-4">
		<div class="card-image" style="width:100%;padding:0 20px">
            
			<div class="d-flex justify-content-between align-items-center">
                <h4 class="title" style="font-size:18px">Shop by Category</h4>
			</div>
			
			<div class="row mt-3">
				@foreach($category as $categorys)
				<div class="col-sm-3 col-6">
					<div class="hp-mod-card-hover mb-3" style="width:150px">
							<a href="{{route('shop', ['id' => $categorys->id])}}" >
								<img src="{{asset('storage/'.$categorys->image)}}" style="height:170;width: 150px; object-fit: cover;border-radius:10px" alt="">
								<div class="card-categories-name" style="width:104.92px">
									<a class="categories-name" href="{{route('shop', ['id' => $categorys->id])}}">{!! $categorys->name !!}</a>
								</div>
							</a>
						
					</div>
				</div>
				@endforeach
				@foreach($categorySecond as $categorys)
				<div class="col-sm-3 col-6">
					<div class="hp-mod-card-hover mb-3" style="width:150px">
							<a href="{{route('shop', ['id' => $categorys->id])}}">
								<img src="{{asset('storage/'.$categorys->image)}}" style="height:170;width: 150px; object-fit: cover;border-radius:10px" alt="">
								<div class="card-categories-name" style="width:104.92px">
									<a class="categories-name" href="{{route('shop', ['id' => $categorys->id])}}">{!! $categorys->name !!}</a>
								</div>
							</a>					
					</div>
				</div>
				
				@endforeach
			</div>
			
			
        </div>
    </section>
    <!--================End Product Description Area =================-->
    
@endsection

@section('script')
    <script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    <script>

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
    </script>
@endsection
