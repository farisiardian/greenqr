@extends('layouts.app')
@section('addstyle')
    <style>
        .card{
            border: 0px;
        }
        .card-product-price{
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            color: #384AEB !important;
            text-transform: uppercase;
            font-weight: 400;
            margin-top: 10px;
        }
        .card-body-price{
            padding: 5px 17px 5px 17px;
        }
        .card-product-name{
            font-family: 'Roboto', sans-serif;
            font-size: 13px;
            text-transform: capitalize;
            font-weight: 400;
        }

        .rectangle {
            background: #FFFFFF;
            /*position: absolute;*/
            /*width: 390px;*/
            /*height: 50px;*/
            left: 0px;
            padding: 10px 17px 10px 17px;
            /*top: 597px;*/
        }
        .card-product-delivery{
            font-size: 10px;
            color:#cdcdcd
        }
        .card-product-border{
            border: 1px solid rgba(0,0,0,.125);
        }
        .card-title-product-cate{
            color: #384AEB !important;
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
	.search-cart__circle {
    font-size: 9px;
    display: inline-block;
    /* background: #384aeb; */
    color: #384aeb;
    padding: 0px 5px;
    border-radius: 50%;
    position: absolute;
    top: 4px;
    /* right: -12px */
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
			bottom: 120px;
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
    <!--================Single Product Area =================-->
	
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

    {{-- Mobile View --}}
    <section class="d-block d-sm-none">
        <div class="container p-3 pl-4">
            <div class="d-flex align-items-center">
                <a href="javascript:history.back()" class="mr-3" style="font-size: 20px">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </a>
                <h5 class="mb-0" style="font-family: 'Nunito', sans-serif;color:#293A8B">Ratings</h5>
            </div>

        </div>
        <div class="rectangle mt-2 pb-3">
		@forelse($ratings as $rates)
            <div class="d-flex justify-content-between">
                <div>
                    <div class="d-flex">
                        <div class=" card-product-delivery">
                            <span class="d-block" style="color:#000000">aliamaisara</span>
                            @php
							$averageRating = $rates->avg('rating');
							$fullStars = floor($averageRating);
							$halfStars = ceil($averageRating - $fullStars);
							@endphp
							@for($i = 0; $i < $fullStars; $i++)
								<i class="fa fa-star"></i>
							@endfor
							@for($i = 0; $i < $halfStars; $i++)
								<i class="fa fa-star-half-o"></i>
							@endfor
							@for($i = 0; $i < 5 - $fullStars - $halfStars; $i++)
								<i class="fa fa-star-o"></i>
							@endfor

                        </div>

                    </div>
{{--                    <div><small><span class="card-product-name" style="color:#cdcdcd">Size : Large</span></small></div>--}}
                </div>
                <div>
                    <small><span class="card-product-delivery">01-09-2022</span></small>
                </div>

            </div>
            <div class="my-3">
                <span class="card-product-name mt-0 text-dark">{{$rates->comments}}</span>
            </div>
            <div>
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="100px" width="100px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="100px" width="100px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="100px" width="100px">
            </div>
			@empty
			<div class="d-flex align-items-center mt-3">
				<p>No ratings found</p>
			</div>
			@endforelse
        </div>
        <!--div class="rectangle mt-2 pb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="d-flex">
                        <div class=" card-product-delivery">
                            <span class="d-block" style="color:#000000">aliamaisara</span>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star-half-alt btn-star"></small>
                            <small class="far fa-star btn-star"></small>

                        </div>

                    </div>
{{--                    <div><small><span class="card-product-name" style="color:#cdcdcd">Size : Large</span></small></div>--}}
                </div>
                <div>
                    <small><span class="card-product-delivery">23-4-2022</span></small>
                </div>

            </div>
            <div class="my-3">
                <span class="card-product-name mt-0 text-dark">So good, make my night better.</span>
            </div>
            <div>
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="100px" width="100px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="100px" width="100px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="100px" width="100px">
            </div>

        </div>
        <div class="rectangle mt-2 pb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="d-flex">
                        <div class=" card-product-delivery">
                            <span class="d-block" style="color:#000000">aliamaisara</span>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star-half-alt btn-star"></small>
                            <small class="far fa-star btn-star"></small>

                        </div>

                    </div>
{{--                    <div><small><span class="card-product-name" style="color:#cdcdcd">Size : Large</span></small></div>--}}
                </div>
                <div>
                    <small><span class="card-product-delivery">20-2-2022</span></small>
                </div>

            </div>
            <div class="my-3">
                <span class="card-product-name mt-0 text-dark">So good, make my night better.</span>
            </div>
            <div>
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="100px" width="100px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="100px" width="100px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="100px" width="100px">
            </div>

        </div-->

    </section>


    <div class="d-block d-sm-none"><div style="display: block; height: 60px;"></div></div>
    
@endsection

@section('script')

    <script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    <script>
        function buynow(id){



            var optionValue = document.getElementById('option-value');
            optionValue.value = 'buynow';
            document.getElementById('cart-form-' + id).submit();
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
