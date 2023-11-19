@extends('layouts.app')
@section('addstyle')
    <style>
        @media (max-width: 441px) {
            .gray_btn {
                line-height: 38px;
                background: #f1f6f7;
                border:0px;
                border-radius: 30px;
                padding: 0px 30px;
                display: inline-block;
                color: #222;
                text-transform: capitalize;
                font-weight: 500
            }
            .cart_area {
                padding-top: 10px;
                padding-bottom: 55px
            }
            .container-cart {
                padding-left: 0px;
                padding-right: 0px
            }

            .card-info {
                background: #ffffff33 !important;
                border-radius: 0px !important;
                box-shadow: 0 4px 30px #0000001a !important;
                backdrop-filter: blur(5px) !important;
                -webkit-backdrop-filter: blur(5px) !important;
            }

            .button{
                padding: 3px 10px !important;
                border-radius: 0px;
            }

            .btn-group-sm>.btn, .btn-sm {
                padding: 0.2rem 0.3rem;
                font-size: .875rem;
                line-height: 1;
                border-radius: 0.2rem;
            }
        }
        .cart_product-name{
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 16px;
            font-weight: 400;
            color: #030303;
        }
        .cart-product-variation{
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 12px;
            font-weight: 400;
            color: #9E9E9E;
        }
        .cart-product-price{
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 12px;
            font-weight: 500;
            color: #384AEB;
        }
		.cart-total{
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: #384AEB;
        }

        .cart-rectangle {
            background: #FFFFFF;
            /*position: absolute;*/
            /*width: 390px;*/
            /*height: 50px;*/
            left: 0px;
            padding: 25px 17px 10px 17px;
            /*top: 597px;*/
        }
		
        .button-style{
            color: #384aeb !important;
            background: #fff !important;
        }
		
        .card-product-name{
            font-size: 13px;
            text-transform: capitalize;
            font-weight: 400;


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
        .cart-vendor-name{
            color:#000000;
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 14px;
            font-weight: 500;
        }
        .element {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .containerc {
            display: block;
            position: relative;
            padding-left: 20px;
            /*margin-bottom: 12px;*/
            color:#000000;
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

        }

        /* Hide the browser's default checkbox */
        .containerc input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 15px;
            width: 15px;
            background-color: #ffffff;
            border-radius: 15px;
            border: 1px solid #9E9E9E !important;

        }

        /* On mouse-over, add a grey background color */
        .containerc:hover input ~ .checkmark {
            background-color: #ffffff;
        }

        /* When the checkbox is checked, add a blue background */
        .containerc input:checked ~ .checkmark {
            background-color: #384AEB;
        }
        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .containerc input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .containerc .checkmark:after {
            left: 4px;
            top:1px;
            width: 4px;
            height: 9px;
            border: solid white;
            border-width: 0 2px 2px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .card-header{
            background-color: #ffffff;
        }

        .shipping-fee{
            font-size: 8px;
            font-weight: 400;


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
	.cart_inner .table thead tr th{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		font-weight: 600;
		color: #1B294E;
		text-align:center
	}
	.price{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		font-weight: 600;
		font-size: 20px;
		color: #242323;
	}
	.button-outline {
			display: inline-block;
			border: 1px solid #384aeb;
			border-radius: 30px;
			color: #384aeb;
			font-weight: 500;
			padding: 12px 30px;
			background: transparent;
			transition: all .4s ease;
		}
		.button-outline:hover {
			border-color: #384aeb;
			background: #384aeb;
			color: #fff;
		}
		a {
			color: white;
			text-decoration: none;
			background-color: transparent;
			-webkit-text-decoration-skip: objects;
		}
    </style>

@endsection

@section('content')


	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
	
    <!--================Cart Area =================-->
    {{--Desktop View	--}}
    <div class="card-image d-none d-xl-block" style="width:100%;padding-left:100px;padding-right:100px">
        <div class="row">
            <div class="col-xl-9 col-lg-7 col-md-9">
                <section class="cart_area">
                    <div class="container container-cart ">
					@if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    {{--                                <i class='bx bx-minus'></i>--}}
                                </button>
                                <strong>Success !</strong> {{ session('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    {{--                                <i class='bx bx-minus'></i>--}}
                                </button>
                                <strong>Error !</strong> {{ session('error') }}
                            </div>
                        @endif
                        <div class="cart_inner card-info ">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="color:#274439" class="cart-t">Item(s)</th>
                                        <th scope="col" style="color:#274439" class="cart-t">Price (RM)</th>
                                        <th scope="col" style="color:#274439" class="cart-t">Quantity</th>
                                        <th scope="col" style="color:#274439" class="cart-t">Total (RM)</th>
                                        <th scope="col" style="color:#274439" class="cart-t"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($total = 0)
                                    @foreach($cart as $carts)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
													@if(isset($carts->productImage[0]->product_variation_value_id) && ($carts->productImage[0]->product_variation_value_id == '1' || $carts->productImage[0]->product_variation_value_id === null))
														 @if(isset($carts->productImage))
                                                            <img src="{{asset('storage/'.$carts->productImage[0]->image)}}" alt="" width="80px" height="80px">
														@else
															<img width="80px" height="80px" src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="">
                                                        @endif
													@else
                                                        @if(isset($carts->variation))
                                                            <img src="{{asset('storage/'.$carts->variation->variationimage)}}" alt="" width="80px" height="80px">
														@else
															<img width="80px" height="80px" src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="">
                                                        @endif
													@endif
                                                    </div>
                                                    <div class="media-body">
                                                        <p style="color:#274439"><b>{{isset($carts->product) ? $carts->product->name : ''}}</b> - {{isset($carts->variation) ? $carts->variation->name : ''}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 style="color:#274439"><b>{{isset($carts->product) ? $carts->product->list_price_on_store : ''}}</b></h5>
                                            </td>
                                            <td>
                                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-sm primary-btn btn-minus" onclick="event.preventDefault();
													document.getElementById('cart-minus-form-{{$carts->id}}').submit();" style="background-color: #EBFFF2" {{ $carts->quantity<1 ? 'disabled' : '' }}>
                                                            <i style="color: #274439" class="fa fa-minus"></i>
                                                        </button>
                                                        <form id="cart-minus-form-{{$carts->id}}" action="{{ route('cart.update',['cart'=>$carts->id]) }}" method="POST" >
                                                            @csrf
                                                            {{method_field('PUT')}}
                                                            <input type="hidden" value="{{$carts->quantity-1}}" name="quantity">

                                                        </form>
                                                    </div>
                                                    <input type="text" style="color:#274439" class="form-control form-control-sm  border-0 text-center px-2 mx-1 rounded" value="{{$carts->quantity}}">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-sm primary-btn btn-plus" onclick="event.preventDefault();
													document.getElementById('cart-add-form-{{$carts->id}}').submit();" style="background-color: #EBFFF2">
                                                            <i style="color: #274439" class="fa fa-plus"></i>
                                                        </button>
                                                        <form id="cart-add-form-{{$carts->id}}" action="{{ route('cart.update',['cart'=>$carts->id]) }}" method="POST" >
                                                            @csrf
                                                            {{method_field('PUT')}}
                                                            {{--                                                <input type="hidden" value="{{$carts->product_id}}" name="id">--}}
                                                            <input type="hidden" value="{{$carts->quantity+1}}" name="quantity">

                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 style="color:#274439"><b>RM {{isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : ''}}</b></h5>
                                                @php($total += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
                                            </td>
                                            <td class="text-center">
                                                <button class="btn" style="background-color: #EBFFF2" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-cart-form-{{$carts->id}}').submit()};">
                                                    <i style="color: #FE0202"  class="fa fa-trash-o"></i></button>
                                                <form id="delete-cart-form-{{$carts->id}}" action="{{route('cart.destroy',['cart' => $carts->id])}}" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 m-0 p-0">
                <section class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <div hidden >
                            <span> Delivery Address</span>
                            <div class="row d-flex justify-content-between mt-3">

                                <div class="col-1">
                                    <i class="fa fa-map-pin" style="color:#000"></i>
                                </div>
                                <div class="col">
								
								
                                    <p style="color:#000">{{isset($addresslists) ? $addresslists->address : ''}} {{isset($addresslists) ? $addresslists->postalcode : ''}} {{isset($addresslists) ? $addresslists->city : ''}},
                                                {{isset($addresslists) ? $addresslists->state : ''}} </p>
                                </div>
                            </div>


                        </div>
                        <div class="mt-5">
                            <h4 hidden style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;"> Order Summary</h4>
                            <div class="row d-flex justify-content-between mt-3">
                                <div class="col-6">
                                    <b><p style="color:#274439" >Subtotal</p></b>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <p style="color:#274439"><b>RM {{$total}}</b></p>
                                </div>
								<div class="col-6 d-flex justify-content-end" style="overflow: hidden;">
								  <small><em><p style="color: #274439;">* Shipping calculated at checkout</p></em></small>
								</div>


                            </div>
                        </div>
                        <div class="mt-5 mb-4">
                            <div class="row d-flex justify-content-between mt-0 align-items-center">
                                <div class="col-6">
                                    <p style="color:#274439"><b>Total</b></p>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <p style="color:#274439" class="price">RM {{$total}}</p>
                                </div>
                            </div>
                        </div>
                        <div hidden >
                            <div class="checkout_btn_inner d-flex justify-content-center">
                                <a class="button-outline"  href="{{route('shop')}}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class=" d-flex justify-content-center">
								@if($total > 0)
								  <a class="button text-center" style="padding:12px 30px;background-color: #274439" href="{{route('checkout.index')}}">Proceed to checkout</a>
								@else
								  <a style="background-color: #274439"  class="button disabled" href="#">Proceed to checkout</a>
								@endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
	
	{{--Tab View--}}
    <div class="card-image d-none d-sm-block d-xl-none" style="width:100%;padding-left:100px;padding-right:100px">
        <div class="row">
            <div class="col-xl-9 col-lg-7 col-md-9">
                <section class="cart_area">
                    <div class="container container-cart ">
					@if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    {{--                                <i class='bx bx-minus'></i>--}}
                                </button>
                                <strong>Success !</strong> {{ session('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    {{--                                <i class='bx bx-minus'></i>--}}
                                </button>
                                <strong>Error !</strong> {{ session('error') }}
                            </div>
                        @endif
                        <div class="cart_inner card-info ">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="color:#274439" class="cart-t">Item(s)</th>
                                        <th scope="col" style="color:#274439" class="cart-t">Price (RM)</th>
                                        <th scope="col" style="color:#274439" class="cart-t">Quantity</th>
                                        <th scope="col" style="color:#274439" class="cart-t">Total (RM)</th>
                                        <th scope="col" style="color:#274439" class="cart-t"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($total = 0)
                                    @foreach($cart as $carts)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
													@if(isset($carts->productImage[0]->product_variation_value_id) && ($carts->productImage[0]->product_variation_value_id == '1' || $carts->productImage[0]->product_variation_value_id === null))
														 @if(isset($carts->productImage))
                                                            <img src="{{asset('storage/'.$carts->productImage[0]->image)}}" alt="" width="80px" height="80px">
														@else
															<img width="80px" height="80px" src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="">
                                                        @endif
													@else
                                                        @if(isset($carts->variation))
                                                            <img src="{{asset('storage/'.$carts->variation->variationimage)}}" alt="" width="80px" height="80px">
														@else
															<img width="80px" height="80px" src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="">
                                                        @endif
													@endif
                                                    </div>
                                                    <div class="media-body">
                                                        <p style="color:#274439"><b>{{isset($carts->product) ? $carts->product->name : ''}}</b> - {{isset($carts->variation) ? $carts->variation->name : ''}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 style="color:#274439"><b>{{isset($carts->product) ? $carts->product->list_price_on_store : ''}}</b></h5>
                                            </td>
                                            <td>
                                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-sm primary-btn btn-minus" onclick="event.preventDefault();
													document.getElementById('cart-minus-form-{{$carts->id}}').submit();" style="background-color: #EBFFF2" {{ $carts->quantity<1 ? 'disabled' : '' }}>
                                                            <i style="color: #274439" class="fa fa-minus"></i>
                                                        </button>
                                                        <form id="cart-minus-form-{{$carts->id}}" action="{{ route('cart.update',['cart'=>$carts->id]) }}" method="POST" >
                                                            @csrf
                                                            {{method_field('PUT')}}
                                                            <input type="hidden" value="{{$carts->quantity-1}}" name="quantity">

                                                        </form>
                                                    </div>
                                                    <input type="text" style="color:#274439" class="form-control form-control-sm  border-0 text-center px-2 mx-1 rounded" value="{{$carts->quantity}}">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-sm primary-btn btn-plus" onclick="event.preventDefault();
													document.getElementById('cart-add-form-{{$carts->id}}').submit();" style="background-color: #EBFFF2">
                                                            <i style="color: #274439" class="fa fa-plus"></i>
                                                        </button>
                                                        <form id="cart-add-form-{{$carts->id}}" action="{{ route('cart.update',['cart'=>$carts->id]) }}" method="POST" >
                                                            @csrf
                                                            {{method_field('PUT')}}
                                                            {{--                                                <input type="hidden" value="{{$carts->product_id}}" name="id">--}}
                                                            <input type="hidden" value="{{$carts->quantity+1}}" name="quantity">

                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5 style="color:#274439"><b>RM {{isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : ''}}</b></h5>
                                                @php($total += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
                                            </td>
                                            <td class="text-center">
                                                <button class="btn" style="background-color: #EBFFF2" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-cart-form-{{$carts->id}}').submit()};">
                                                    <i style="color: #FE0202"  class="fa fa-trash-o"></i></button>
                                                <form id="delete-cart-form-{{$carts->id}}" action="{{route('cart.destroy',['cart' => $carts->id])}}" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 m-0 p-0">
                <section class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <div hidden >
                            <span> Delivery Address</span>
                            <div class="row d-flex justify-content-between mt-3">

                                <div class="col-1">
                                    <i class="fa fa-map-pin" style="color:#000"></i>
                                </div>
                                <div class="col">
								
								
                                    <p style="color:#000">{{isset($addresslists) ? $addresslists->address : ''}} {{isset($addresslists) ? $addresslists->postalcode : ''}} {{isset($addresslists) ? $addresslists->city : ''}},
                                                {{isset($addresslists) ? $addresslists->state : ''}} </p>
                                </div>
                            </div>


                        </div>
                        <div class="mt-5">
                            <h4 hidden style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;"> Order Summary</h4>
                            <div class="row d-flex justify-content-between mt-3">
                                <div class="col-6">
                                    <b><p style="color:#274439" >Subtotal</p></b>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <p style="color:#274439"><b>RM {{$total}}</b></p>
                                </div>
								<div class="col-6 d-flex justify-content-end" style="overflow: hidden;">
								  <small><em><p style="color: #274439;">* Shipping calculated at checkout</p></em></small>
								</div>


                            </div>
                        </div>
                        <div class="mt-5 mb-4">
                            <div class="row d-flex justify-content-between mt-0 align-items-center">
                                <div class="col-6">
                                    <p style="color:#274439"><b>Total</b></p>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <p style="color:#274439" class="price">RM {{$total}}</p>
                                </div>
                            </div>
                        </div>
                        <div hidden >
                            <div class="checkout_btn_inner d-flex justify-content-center">
                                <a class="button-outline"  href="{{route('shop')}}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class=" d-flex justify-content-center">
								@if($total > 0)
								  <a class="button text-center" style="padding:12px 30px;background-color: #274439" href="{{route('checkout.index')}}">Proceed to checkout</a>
								@else
								  <a style="background-color: #274439"  class="button disabled" href="#">Proceed to checkout</a>
								@endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
	
	
    {{-- Mobile View   --}}
    <section class="d-block d-sm-none">
        {{--Vendor first--}}
		@php($total = 0)
        @foreach($cart as $carts)
        <div class="card mb-3 mt-4" >
            
            <div class="card-body ">
                <div class="row  my-2">
					<div class="col-1 d-flex align-items-center">
						<div class="input-group-btn">
							<button class="btn btn-sm" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-cart-form-{{$carts->id}}').submit()};">
							<i class="fa fa-times" style="color:#1FA33D"></i></button>
							<form id="delete-cart-form-{{$carts->id}}" action="{{route('cart.destroy',['cart' => $carts->id])}}" method="post">
								<input type="hidden" name="_method" value="DELETE">
								@csrf
							</form>
						</div>
					</div>
                    <div class="col-3 py-2 d-flex align-items-center"  >
						<div class="card-product__img text-center" style="width:80px;height:80px">
								@if(isset($carts->variation))
                                <img  class="card-img rounded" style="box-shadow: 0 4px 30px #0000001a;height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('storage/'.$carts->variation->variationimage)}}" alt="">
								@else
                                <img class="card-img rounded" style="box-shadow: 0 4px 30px #0000001a;height:100%; width: 100%; object-fit: cover;border-radius:10px" src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="">
								@endif
						</div>

                    </div>
                    <div class="col-8 py-2">
                        <span class="cart_product-name  element" style="color:#274439">{{isset($carts->product) ? $carts->product->name : ''}} - {{isset($carts->variation) ? $carts->variation->name : ''}}</span>
                        <!--<span class="cart-product-variation d-block">Size : Large</span>-->
						<span class="cart-product-price " style="color:#274439">RM {{isset($carts->product) ? $carts->product->list_price_on_store : ''}}</span>
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-6">
                                <div class="input-group quantity d-flex justify-content-between">
									<div class="input-group-btn">
										<button class="btn btn-sm btn-minus" onclick="event.preventDefault();
										document.getElementById('cart-minus-form-{{$carts->id}}').submit();" style="background-color: #274439" {{ $carts->quantity<1 ? 'disabled' : '' }}>
											<i class="fa fa-minus text-white"></i>
										</button>
										<form id="cart-minus-form-{{$carts->id}}" action="{{ route('cart.update',['cart'=>$carts->id]) }}" method="POST" >
											@csrf
											{{method_field('PUT')}}
											{{--                                                <input type="hidden" value="{{$carts->product_id}}" name="id">--}}
											<input type="hidden" value="{{$carts->quantity-1}}" name="quantity">

										</form>
									</div>
									<input type="text" class="form-control form-control-sm  border-0 text-center px-2 mx-1 rounded"value="{{$carts->quantity}}">
									<div class="input-group-btn">
										<button class="btn btn-sm btn-plus" onclick="event.preventDefault();
										document.getElementById('cart-add-form-{{$carts->id}}').submit();" style="background-color: #274439">
												<i class="fa fa-plus text-white"></i>
										</button>
										<form id="cart-add-form-{{$carts->id}}" action="{{ route('cart.update',['cart'=>$carts->id]) }}" method="POST" >
											@csrf
											{{method_field('PUT')}}
											{{--                                                <input type="hidden" value="{{$carts->product_id}}" name="id">--}}
											<input type="hidden" value="{{$carts->quantity+1}}" name="quantity">
										</form>
									</div>
                                </div>
                            </div>
							<div class="col-6">
								<div class="mr-2 mt-2" style="text-align:right">
									<p class="cart-total" style="color:#274439">RM {{isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : ''}}</p>
									@php($total += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
								</div>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
		@endforeach
		
        <div class="cart-rectangle mt-4 mb-3" >
            <div class="d-flex justify-content-between align-self-center py-3 px-2">
				<div>
                    <span class="cart_product-name d-block" style="color:#274439">Total :RM {{$total}}</span>
                </div>
				<div>
					<a class="button text-white rounded"  style="background-color:#274439" href="{{route('checkout.index')}}">Check Out</a>
				</div>
        </div>

        </div>
		
		
		
		
		
		
    </section>

	
	
    
    


    <!--================End Cart Area =================-->
@endsection
@section('script')

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
    <script>
        $(document).ready(function() {
            $("#checkedAll").change(function(){
                if(this.checked){
                    $(".checkSingle").each(function(){
                        this.checked=true;
                    })
                }else{
                    $(".checkSingle").each(function(){
                        this.checked=false;
                    })
                }
            });

            $(".checkSingle").click(function () {
                if ($(this).is(":checked")){
                    var isAllChecked = 0;
                    $(".checkSingle").each(function(){
                        if(!this.checked)
                            isAllChecked = 1;
                    })
                    if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }
                }else {
                    $("#checkedAll").prop("checked", false);
                }
            });
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

