@php
    use Illuminate\Support\Facades\Log;
@endphp
@extends('layouts.app')
@section('addstyle')
    <style>
        .cart-rectangle {
            background: #FFFFFF;
            /*position: absolute;*/
            /*width: 390px;*/
            /*height: 50px;*/
            left: 0px;
            padding: 25px 17px 10px 17px;
            /*top: 597px;*/
        }
        @media (max-width: 441px) {
            /* nav */
            .card {
                padding: 0!important;
                border: none;
                border-radius: 0 !important;
                background: #FFFFFF !important;
                margin-bottom: 0px!important;

            }
            .mypurchaserectangle {
                background: #FFFFFF;
                left: 0px;
                padding: 15px;
                margin-bottom: 20px;
				border-radius:10px;
				
            }

            a.active {
                border-bottom: 2px solid #1FA33D;
            }

            .nav-pills{
                overflow-x: auto;
                overflow-y:hidden;
                flex-wrap: nowrap;
            }

            .nav-link {
                color: rgb(110, 110, 110);
                font-weight: 500;
                white-space: nowrap;

            }
            .nav-link:hover {
                color: #384AEB;
            }

            .nav-pills .nav-link.active {
                color: black;
                background-color: white;
                border-radius: 0.5rem 0.5rem 0 0;
                font-weight: 600;
            }

            .tab-content {
                padding: 20px 0px 20px 0px !important;
            }

            .form-control {
                background-color: rgb(241, 243, 247);
                border: none;
            }

            .cart_product-vendor{
                font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                font-size: 14px;
                font-weight: 500;
                color: #000000;
            }
            .cart_product_toship{
                font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                font-size: 14px;
                font-weight: 400;
                color: #384AEB;
            }

            .cart_product-name{
                font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                font-size: 12px;
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

            .third {
                padding: 0 1.5rem 0 1.5rem;
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

            .element {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .ccontent li .wrapp {
                padding: 0.3rem 1rem 0.001rem 1rem;
            }

            .ccontent li .wrapp div {
                font-weight: 600;
            }

            .ccontent li .wrapp p {
                font-weight: 360;
            }

            .ccontent li:hover {
                background-color: rgb(117, 93, 255);
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

    }
	.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  right: 0;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
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
	.card-images{
		width: 80px;
		height: 80px;
		border: 1px solid #DDDDDD;
		border-radius: 10px;
	}
	
	.nav.nav-tabs li a.active {
		color: #fff;
		background: #9CF4A0;
		border-color: #274439
	}	
				
    </style>
@endsection
@section('content')

		<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
		
{{--JS modal ada kat user.profile.tabbar--}}
        <!-- Modal -->
    <div class="modal fade" id="viewrating" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#293A8B;">Shop Rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal-viewrating">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
	<!-- Modal -->
<div class="modal fade" id="bookingAppointment" tabindex="-1"  role="dialog" aria-labelledby="bookingAppointment" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingAppointment"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-7">
              <img src="https://s38924.pcdn.co/wp-content/uploads/2021/07/Online-Payments.png" alt="Advertisement" class="img-fluid">
            </div>
            <div class="col-md-5">
              <h2 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#293A8B;">Coming Soon!</h2>
              <p>Our new appointment booking system will be launching soon. Stay tuned for more details!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- Second Modal -->
    <div class="modal fade" role="dialog" id="editviewrating" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#293A8B;">Rate Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div><div class="container"></div>

                <div id="modal-editviewrating">


                </div>
            </div>
        </div>
    </div>
    <!-- End Second Modal  -->

    <!-- Third Modal, Refund view  -->
        <div class="modal fade text-left" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="editStaff" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#293A8B;">Return Refund product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
					</div>
					<div class="container"></div>
					
					<div class="modal-body">
						<div id="editStaffs">

						</div>
					</div>
                </div>
            </div>
        </div>
    <!-- End Third Modal  -->

    <!--================Blog Area =================-->
    {{--    Desktop View--}}
    <section class="setting-area d-none d-xl-block">
        <div class="container">
            <div class="row">

                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="comment-purchase">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#274439;">My Purchase</h4>
                        <hr>
                        <div class="mt-3">
                            <ul class="nav nav-tabs bg-white" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active border-success"  id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success" id="topay-tab" data-toggle="tab" href="#topay" role="tab" aria-controls="topay" aria-selected="false">To Pay</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success"  id="toship-tab" data-toggle="tab" href="#toship" role="tab" aria-controls="toship" aria-selected="false">To Ship</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success"  id="toreceive-tab" data-toggle="tab" href="#toreceive" role="tab" aria-controls="toreceive" aria-selected="false">To Receive</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success"  id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false" >Completed</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success"  id="cancelled-tab" data-toggle="tab" href="#cancelled" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</a>
                                </li>
                            </ul>

                            <div class="tab-content border-0" id="myTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    @foreach($order as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} x {{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class=" mt-2 card-cate" >
																@if($orders->courier_id == 7)
																	Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																@else
																	Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																	 <br>
																	Tracking Number : {{$order->consignment()->first()->consigment_number}}
																@endif
																</div>
                                                            </div>
															
                                                        </div>
                                                        <div class="price ml-auto" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
													
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
                                                   <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach


                                </div>
                                <div class="tab-pane fade" id="topay" role="tabpanel" aria-labelledby="topay-tab">
                                    @foreach($toPay as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="mt-2 card-cate">
																@if($orders->courier_id == 7)
																	Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																@else
																	Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																	 <br>
																	Tracking Number : {{$order->consignment()->first()->consigment_number}}
																@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
													
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="color:#293A8B;font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
													<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="toship" role="tabpanel" aria-labelledby="toship-tab">
                                    @foreach($toShip as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="mt-2 card-cate">
																@if($orders->courier_id == 7)
																	Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																@else
																	Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																	 <br>
																Tracking Number : {{$order->consignment()->first()->consigment_number}}
																@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="color:#293A8B;font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
													<!-- Button trigger modal -->
													<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>


                                                    <a href="#" class="btn btn-primary ratingModal" data-toggle="modal" @if(isset($order2[0]) && isset($order2[0]->vendors)) data-id="{{$order2[0]->transaction_id}}"  data-vendor="{{$order2[0]->vendor_id}}"  @else data-id="0" data-vendor="0" @endif data-target="#viewrating">View Rating</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="toreceive" role="tabpanel" aria-labelledby="toreceive-tab">
                                    @foreach($toReceive as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="mt-2 card-cate">
																	@if($orders->courier_id == 7)
																		Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																	@else
																		Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																		 <br>
																		Tracking Number : {{$order->consignment()->first()->consigment_number}}
																	@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="color:#293A8B;font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" >
													<a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
													
													<a href="#" data-toggle="modal" data-target="#editStaff" data-id="{{$orders->id}}" class=" btn btn-primary editStaff-modals"><i class="bx bx-edit me-1"></i>Refund</a>
													<a href="#" class="btn btn-success" onclick="if(confirm(`{{'Confirm the purchase and receive the product?'}}`)){event.preventDefault();document.getElementById('receive-form-{{$orders->id}}').submit()}">Receive Product</a>
													<form id="receive-form-{{$orders->id}}" action="{{route('mypurchase.update',$orders->id)}}" method="post">
                                                        <input type="hidden" name="_method" value="PUT">
                                                            @csrf
                                                    </form>
													
													
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                    @foreach($completed as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="mt-2 card-cate">
																@if($orders->courier_id == 7)
																	Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																@else
																	Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																	 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
																@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%; color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="color:#293A8B;font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
                                                    <a href="#" class="btn btn-primary ratingModal" data-toggle="modal" @if(isset($order2[0]) && isset($order2[0]->vendors)) data-id="{{$order2[0]->transaction_id}}"  data-vendor="{{$order2[0]->vendor_id}}"  @else data-id="0" data-vendor="0" @endif data-target="#viewrating">Give Rating</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                                    @foreach($cancel as $order2)
                                        <div class="card mt-3 p-0 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}"style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="card-cate mt-2">
																	@if($orders->courier_id == 7)
																		Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																	@else
																		Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																		 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
																	@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
													
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total :<span style="color:#293A8B;font-size:20px"> RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>


	{{--    Tab View--}}
    <section class="setting-area d-none d-sm-block d-xl-none">
        <div class="container">
            <div class="row">

                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list ">
                    <div class="comment-purchase">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#274439;">My Purchase</h4>
                        <hr>
                        <div class="mt-3">
                            <ul class="nav nav-tabs bg-white" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active border-success"  id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success" id="topay-tab" data-toggle="tab" href="#topay" role="tab" aria-controls="topay" aria-selected="false">To Pay</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success"  id="toship-tab" data-toggle="tab" href="#toship" role="tab" aria-controls="toship" aria-selected="false">To Ship</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success"  id="toreceive-tab" data-toggle="tab" href="#toreceive" role="tab" aria-controls="toreceive" aria-selected="false">To Receive</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success"  id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false" >Completed</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link border-success"  id="cancelled-tab" data-toggle="tab" href="#cancelled" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</a>
                                </li>
                            </ul>

                            <div class="tab-content border-0" id="myTabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    @foreach($order as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} x {{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class=" mt-2 card-cate" >
																@if($orders->courier_id == 7)
																	Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																@else
																	Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																	 <br>
																	Tracking Number : {{$order->consignment()->first()->consigment_number}}
																@endif
																</div>
                                                            </div>
															
                                                        </div>
                                                        <div class="price ml-auto" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
													
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
                                                   <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach


                                </div>
                                <div class="tab-pane fade" id="topay" role="tabpanel" aria-labelledby="topay-tab">
                                    @foreach($toPay as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="mt-2 card-cate">
																@if($orders->courier_id == 7)
																	Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																@else
																	Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																	 <br>
																	Tracking Number : {{$order->consignment()->first()->consigment_number}}
																@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
													
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="color:#293A8B;font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
													<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="toship" role="tabpanel" aria-labelledby="toship-tab">
                                    @foreach($toShip as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="mt-2 card-cate">
																@if($orders->courier_id == 7)
																	Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																@else
																	Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																	 <br>
																Tracking Number : {{$order->consignment()->first()->consigment_number}}
																@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="color:#293A8B;font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
													<!-- Button trigger modal -->
													<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>


                                                    <a href="#" class="btn btn-primary ratingModal" data-toggle="modal" @if(isset($order2[0]) && isset($order2[0]->vendors)) data-id="{{$order2[0]->transaction_id}}"  data-vendor="{{$order2[0]->vendor_id}}"  @else data-id="0" data-vendor="0" @endif data-target="#viewrating">View Rating</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="toreceive" role="tabpanel" aria-labelledby="toreceive-tab">
                                    @foreach($toReceive as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="mt-2 card-cate">
																	@if($orders->courier_id == 7)
																		Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																	@else
																		Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																		 <br>
																		Tracking Number : {{$order->consignment()->first()->consigment_number}}
																	@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="color:#293A8B;font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" >
													<a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
													
													<a href="#" data-toggle="modal" data-target="#editStaff" data-id="{{$orders->id}}" class=" btn btn-primary editStaff-modals"><i class="bx bx-edit me-1"></i>Refund</a>
													<a href="#" class="btn btn-success" onclick="if(confirm(`{{'Confirm the purchase and receive the product?'}}`)){event.preventDefault();document.getElementById('receive-form-{{$orders->id}}').submit()}">Receive Product</a>
													<form id="receive-form-{{$orders->id}}" action="{{route('mypurchase.update',$orders->id)}}" method="post">
                                                        <input type="hidden" name="_method" value="PUT">
                                                            @csrf
                                                    </form>
													
													
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                    @foreach($completed as $order2)
                                        <div class="card p-0 mt-3 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="mt-2 card-cate">
																@if($orders->courier_id == 7)
																	Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																	{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																@else
																	Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																	{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																	 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
																@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%; color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total : <span style="color:#293A8B;font-size:20px">RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
                                                    <a href="#" class="btn btn-primary ratingModal" data-toggle="modal" @if(isset($order2[0]) && isset($order2[0]->vendors)) data-id="{{$order2[0]->transaction_id}}"  data-vendor="{{$order2[0]->vendor_id}}"  @else data-id="0" data-vendor="0" @endif data-target="#viewrating">Give Rating</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                                    @foreach($cancel as $order2)
                                        <div class="card mt-3 p-0 cardPurchase">
                                            <h5 class="card-header" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</h5>
                                            @php($total = 0)
                                            @foreach($order2 as $orders)
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <div class="media" style="width:100%">
                                                            <div class="card-images">
                                                                <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}"style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                                            </div>
                                                            <div class="media-body pl-3">
                                                                <p class="title">{{$orders->products ? $orders->products->name :''}}</p>
                                                                <p class="card-cate">RM{{$orders->products ? $orders->products->list_price_on_store :''}} X{{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</p>
																<div class="card-cate mt-2">
																	@if($orders->courier_id == 7)
																		Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
																		{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
																	@else
																		Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
																		{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
																		 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
																	@endif
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="ml-auto p-2" style="text-align:right;width:20%;color:#293A8B;font-size:16px">RM {{$orders->cart_total}}</div>
                                                        @php($total += $orders->cart_total)
                                                    </div>
													
                                                </div>
                                            @endforeach
                                            <div class="card-footer" style="text-align: right;">
                                                <div>
                                                    <p style="color:#293A8B;font-size:14px">Order Total :<span style="color:#293A8B;font-size:20px"> RM {{$total}}</span></p>
                                                </div>
                                                <small class="text-muted" ><a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
                                                    <a href="#" class="btn btn-primary">Contact Seller</a>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
                                                </small>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
    {{--    Mobile View--}}
    <section class="d-block d-sm-none">
	@include('user.profile.tabbar')


        <div class="container card shadow d-flex justify-content-center mt-5">
            <!-- nav options -->
            <ul class="nav nav-pills mb-3 shadow-sm mx-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-topay-tab" data-toggle="pill" href="#pills-topay" role="tab" aria-controls="pills-topay" aria-selected="false">To Pay</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-toship-tab" data-toggle="pill" href="#pills-toship" role="tab" aria-controls="pills-toship" aria-selected="false">To Ship</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-toreceive-tab" data-toggle="pill" href="#pills-toreceive" role="tab" aria-controls="pills-toreceive" aria-selected="false">To Receive</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-complete-tab" data-toggle="pill" href="#pills-complete" role="tab" aria-controls="pills-complete" aria-selected="false">Completed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-cancelled-tab" data-toggle="pill" href="#pills-cancelled" role="tab" aria-controls="pills-cancelled" aria-selected="false">Cancelled</a>
                </li>
            </ul>

        </div>
        <!-- content -->
        <div class=" container">
            <div class="tab-content border-0" id="pills-tabContent">
                <!-- 1st card -->
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    @foreach($order as $order2)
					<div class="card mypurchaserectangle mt-3">
                        <div class="card-header d-flex justify-content-between pb-3 px-2" style="border-bottom:solid 1px #384AEB;">
                            <div>
                                <span style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600" class="cart_product-vendor">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</span>
                            </div>
                            <div>
                                <span style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B; " class="cart_product_toship">{{$orders->status}}</span>
                            </div>
                        </div>
						@php($total = 0)
						@foreach($order2 as $orders)
						<div class="card-body">
                        <div class="row mt-3 py-3">
                            <div class="col-3 py-2">
                                <div class="card-images">
									<img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                </div>
                            </div>
                            <div class="col-9 py-2">
                                <div>
                                    <span class="title" style="font-size:15px">{{$orders->products ? $orders->products->name :''}}</span>
                                    <!--<span class="cart-product-variation d-block">Size : Large</span>-->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="cart-product-price">RM {{$orders->products ? $orders->products->list_price_on_store :''}}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="cart-product-price text-dark" style="margin-left: 55px!important;">Qty : {{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</span>
                                        </div>@php($total += $orders->cart_total)
                                    </div>
									
                                </div>
                            </div>
                        </div>
						<div class="row my-3 px-3">
							<small>
							@if($orders->courier_id == 7)
								Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
							@else
								Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
								 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
							@endif
							</small>
						</div>
						</div>
						@endforeach
						<div class="card-footer mb-3" style="text-align:right">
							<div>
								<p style="color:#293A8B;font-size:12px">Order Total : <span style="font-size:16px">RM {{$total}}</span></p>
							</div>
							<small class="text-muted" >
							<div class="dropdown">
								<button class="btn btn-primary dropdown-toggle"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									View More
								</button>
								<div class="dropdown-content" aria-labelledby="dropdownMenu2">
									<a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="mt-2 dropdown-item">Buy Again</a>
									<a href="#" class=" mt-2 dropdown-item">Contact Seller</a>
									<a href="#" class="mt-2 dropdown-item" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
								</div>
							</div>
							</small>

						</div>

                    </div>
                    @endforeach

                </div>
                <!-- 2nd card -->
                <div class="tab-pane fade" id="pills-topay" role="tabpanel" aria-labelledby="pills-topay-tab">
				  @foreach($toPay as $order2)
                    <div class="card mypurchaserectanglemt-3">
                        <div class="card-header d-flex justify-content-between pb-3 px-2" style="border-bottom:solid 1px #384AEB;">
                            <div>
                                <span style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600" class="cart_product-vendor">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</span>
                            </div>
                            <div>
                                <span class="cart_product_toship" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">{{$orders->status}}</span>
                            </div>
                        </div>
						@php($total = 0)
						@foreach($order2 as $orders)
						<div class="card-body">
                        <div class="row mt-3 py-3">
                            <div class="col-3 py-2">
                                <div class="card-images">
                                    <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                </div>
                            </div>
                            <div class="col-9 py-2">
                                <div>
                                    <span class="title" style="font-size:15px">{{$orders->products ? $orders->products->name :''}}</span>
                                    <!--<span class="cart-product-variation d-block">Size : Large</span>-->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="cart-product-price">RM {{$orders->products ? $orders->products->list_price_on_store :''}}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="cart-product-price text-dark" style="margin-left: 55px!important;">Qty : {{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</span>
                                        </div>@php($total += $orders->cart_total)
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row my-3 px-3">
							<small>
							@if($orders->courier_id == 7)
								Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
							@else
								Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
								 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
							@endif
							</small>
						</div>
						</div>
						@endforeach
						<div class="card-footer" style="text-align: right;">
							<div>
								<p style="color:#293A8B;font-size:12px">Order Total : <span style="font-size:16px">RM {{$total}}</span></p>
							</div>
							<small class="text-muted" >
							<div class="dropdown">
								<button class="btn btn-primary dropdown-toggle">
									View More
								</button>
								<div class="dropdown-content" >
									<a href="#" class=" mt-2">Contact Seller</a>
									<a href="#" class="mt-2" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
								</div>
							</div>
							</small>

						</div>

                    </div>
					@endforeach
                </div>
                <!-- 3nd card -->
                <div class="tab-pane fade" id="pills-toship" role="tabpanel" aria-labelledby="pills-toship-tab">
				 @foreach($toShip as $order2)
                    <div class="card mypurchaserectangle mt-3">
                        <div class="card-header d-flex justify-content-between pb-3 px-2" style="border-bottom:solid 1px #384AEB;">
                            <div>
                                <span class="cart_product-vendor" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</span>
                            </div>
                            <div>
                                <span class="cart_product_toship" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">{{$orders->status}}</span>
                            </div>
                        </div>
						@php($total = 0)
						@foreach($order2 as $orders)
						<div class="card-body">
                        <div class="row mt-3 py-3">
                            <div class="col-3 py-2">
                                <div class="card-images">
                                    <img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                </div>
                            </div>
                            <div class="col-9 py-2">
                                <div>
                                    <span class="title" style="font-size:15px">{{$orders->products ? $orders->products->name :''}}</span>
                                    <!--<span class="cart-product-variation d-block">Size : Large</span>-->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="cart-product-price">RM {{$orders->products ? $orders->products->list_price_on_store :''}}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="cart-product-price text-dark " style="margin-left: 55px!important;">Qty : {{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</span>
                                        </div>@php($total += $orders->cart_total)
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row my-3 px-3">
							<small>
							@if($orders->courier_id == 7)
								Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
							@else
								Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
								 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
							@endif
							</small>
						</div>
						</div>
						@endforeach
						<div class="card-footer" style="text-align: right;">
							<div>
								<p style="color:#293A8B;font-size:12px">Order Total : <span style="font-size:16px"> RM {{$total}}</span></p>
							</div>
							<small class="text-muted" >
							<div class="dropdown">
								<button class="btn btn-primary dropdown-toggle">
									View More
								</button>
								<div class="dropdown-content" >
									<a href="#" class=" mt-2">Contact Seller</a>
									<a href="#" class="mt-2" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
								</div>
							</div>
							</small>

						</div>


                    </div>
					@endforeach
                </div>
                <!-- 4nd card -->
                <div class="tab-pane fade" id="pills-toreceive" role="tabpanel" aria-labelledby="pills-toreceive-tab">
                    @foreach($toReceive as $order2)
					<div class="card mt-3 mypurchaserectangle">
                        <div class="card-header d-flex justify-content-between pb-3 px-2" style="border-bottom:solid 1px #384AEB;">
                            <div>
                                <span class="cart_product-vendor" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</span>
                            </div>
                            <div>
                                <span class="cart_product_toship" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">{{$orders->status}}</span>
                            </div>
                        </div>
						@php($total = 0)
						@foreach($order2 as $orders)
						<div class="card-body">
                        <div class="row mt-3 py-3">
                            <div class="col-3 py-2">
                                <div class="card-images">
									<img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                </div>
                            </div>
                            <div class="col-9 py-2">
                                <div>
                                    <span class="title" style="font-size:15px">{{$orders->products ? $orders->products->name :''}}</span>
                                    <!--<span class="cart-product-variation d-block">Size : Large</span>-->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="cart-product-price">RM {{$orders->products ? $orders->products->list_price_on_store :''}}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="cart-product-price text-dark " style="margin-left: 55px!important;">Qty : {{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</span>
                                        </div>@php($total += $orders->cart_total)
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row my-3 px-3">
							<small>
							@if($orders->courier_id == 7)
								Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
							@else
								Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
								 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
							@endif
							</small>
						</div>
						</div>
						@endforeach
						<div class="card-footer" style="text-align: right;">
							<div>
								<p style="color:#293A8B;font-size:12px">Order Total : <span style="font-size:16px">  RM {{$total}}</span></p>
							</div>
							<small class="text-muted" >
								<form id="receive-form-{{$orders->id}}" action="{{route('mypurchase.update',$orders->id)}}" method="post">
                                        <input type="hidden" name="_method" value="PUT">
                                        @csrf
                                </form>
								<a href="#" class="btn btn-primary" onclick="if(confirm(`{{'Confirm the purchase and receive the product?'}}`)){event.preventDefault();document.getElementById('receive-form-{{$orders->id}}').submit()}">Receive Product</a>
									
								<div class="dropdown">
									<button class="btn btn-primary dropdown-toggle">
										View More
									</button>
									<div class="dropdown-content" >
										<a href="{{route('shop.show',['id'=>$orders->vendor_id])}}">Buy Again</a>
										<a href="#">Contact Seller</a>
										<a href="#" data-toggle="modal" data-target="#bookingAppointment">Booking Appointment</a>
										
										<a href="#" data-toggle="modal" data-target="#editStaff" data-id="{{$orders->id}}" class="editStaff-modals"><i class="bx bx-edit me-1"></i>Refund</a>
									</div>
								</div>
							</small>

						</div>

                    </div>
					@endforeach
                </div>
                <!-- 5nd card -->
                <div class="tab-pane fade" id="pills-complete" role="tabpanel" aria-labelledby="pills-complete-tab">
                    @foreach($completed as $order2)
					<div class="card mt-3 mypurchaserectangle">
                        <div class="card-header d-flex justify-content-between pb-3 px-2" style="border-bottom:solid 1px #384AEB;">
                            <div>
                                <span class="cart_product-vendor" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</span>
                            </div>
                            <div>
                                <span class="cart_product_toship" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">{{$orders->status}}</span>
                            </div>
                        </div>
						@php($total = 0)
						@foreach($order2 as $orders)
						<div class="card-body">
                        <div class="row mt-3py-3">
                            <div class="col-3 py-2">
                                <div class="card-images">
									<img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                </div>
                            </div>
                            <div class="col-9 py-2">
                                <div>
                                    <span class="title" style="font-size:15px">{{$orders->products ? $orders->products->name :''}}</span>
                                    <!--<span class="cart-product-variation d-block">Size : Large</span>-->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="cart-product-price">RM {{$orders->products ? $orders->products->list_price_on_store :''}}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="cart-product-price text-dark " style="margin-left: 55px!important;">Qty : {{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</span>
                                        </div>@php($total += $orders->cart_total)
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row my-3 px-3">
							<small>
							@if($orders->courier_id == 7)
								Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
							@else
								Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
								 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
							@endif
							</small>
						</div>
						</div>
						@endforeach
						<div class="card-footer" style="text-align: right;">
							<div>
								<p style="color:#293A8B;font-size:12px">Order Total : <span style="font-size:16px"> RM {{$total}}</span></p>
							</div>
							<small class="text-muted" >
								<a href="{{route('shop.show',['id'=>$orders->vendor_id])}}" class="btn btn-primary">Buy Again</a>
								<!--a href="#" class="btn btn-primary">Contact Seller</a>
								<a href="#" class="btn btn-primary">Booking Appointment</a-->
							</small>

						</div>
						@endforeach
                    </div>
                </div>
                <!-- 6nd card -->
                <div class="tab-pane fade" id="pills-cancelled" role="tabpanel" aria-labelledby="pills-cancelled-tab">
                    @foreach($cancel as $order2)
					<div class="card mt-3 mypurchaserectangle">
                        <div class="card-header d-flex justify-content-between pb-3 px-2" style="border-bottom:solid 1px #384AEB;" >
                            <div>
                                <span class="cart_product-vendor" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600">@if(isset($order2[0]) && isset($order2[0]->vendors)) {{$order2[0]->vendors->name}} @else Shop Name @endif</span>
                            </div>
                            <div>
                                <span class="cart_product_toship" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">{{$orders->status}}</span>
                            </div>
                        </div>
						@php($total = 0)
						@foreach($order2 as $orders)
						<div class="card-body">
                        <div class="row mt-3 py-3">
                            <div class="col-3 py-2">
                                <div class="card-images">
									<img src="{{$orders->productImages ? asset('storage/'.$orders->productImages->image) : asset('img/product/p1.jpg')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                </div>
                            </div>
                            <div class="col-9 py-2">
                                <div>
                                    <span class="title" style="font-size:15px">{{$orders->products ? $orders->products->name :''}}</span>
                                    <!--<span class="cart-product-variation d-block">Size : Large</span>-->
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="cart-product-price">RM {{$orders->products ? $orders->products->list_price_on_store :''}}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="cart-product-price text-dark " style="margin-left: 55px!important;">Qty : {{$orders->carts()->first() ? $orders->carts()->first()->quantity : '1'}}</span>
                                        </div>@php($total += $orders->cart_total)
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row my-3 px-3">
							<small>
							@if($orders->courier_id == 7)
								Pickup Address :{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->address : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->postalcode : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->city : ''}}
								{{$orders->vendor_address()->first() ? $orders->vendor_address()->first()->state : ''}}
							@else
								Delivery Address : {{$orders->user_address()->first() ? $orders->user_address()->first()->address : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->postalcode : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->city : ''}}
								{{$orders->user_address()->first() ? $orders->user_address()->first()->state : ''}}
								 <br>
                                                            Tracking Number : {{$order->consignment()->first()->consigment_number}}
							@endif
							</small>
						</div>
						</div>
						@endforeach
						<div class="card-footer" style="text-align: right;">
							<div>
								<p  style="color:#293A8B;font-size:12px">Order Total : <span style="font-size:16px"> RM {{$total}}</span></p>
							</div>
							<!--small class="text-muted" ><a href="#" class="btn btn-primary">Buy Again</a>
								<a href="#" class="btn btn-primary">Contact Seller</a>
								<a href="#" class="btn btn-primary">Booking Appointment</a>
							</small-->

						</div>
						@endforeach
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection



