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
			bottom: 120px;
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
	.single-prd-item{
		width: 330px;
		height:320px;
		border: 1px solid #DDDDDD;
		border-radius: 10px;
	}
	.prodName{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		font-weight: 600;
		font-size: 32px;
		color: #384aeb;
	}
	.prodDescr{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
	}	
    </style>
@endsection
@section('content')

	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>

	<!-- The Modal Specification -->
    <div class="modal fade" role="dialog" id="spec" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#384aeb">Specification</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
				<div class="mt-4 p-3">
                    <div class="table-responsive ">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td>
                                    <span>Brand</span>
                                </td>
                                <td>
                                    <p>{{$product->brands()->first() ? $product->brands()->first()->name :''}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Stock</span>
                                </td>
                                <td>
                                    <p>{{$product->stocks()->first() ? $product->stocks()->first()->total_stock :''}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Weight</span>
                                </td>
                                <td>
                                    <p>{{$product->stocks()->first() ? $product->stocks()->first()->weight : ''}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Volumetric</span>
                                </td>
                                <td>
                                    <p>{{$product->volumetric_id}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>SKU code</span>
                                </td>
                                <td>
                                    <p>{{$product->sku_code}}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                

            </div>
        </div>
    </div>
    <!-- End Modal Specification -->
	
	
	<!-- The Modal Delivery -->
	<div class="modal fade" role="dialog" id="deli" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#384aeb">Delivery</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="mt-4 p-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <span class="card-product-name">Delivery :</span>
                        </div>
                        @if(Auth::check() && Auth::user()->role == 'normal')
                          <div class="address">
                            <a href="#" data-toggle="modal" data-target="#deli">
                            <span class="card-product-name">
                            <!--{{$address->user_address->first() ? $address->user_address->first()->address : ''}} -->
                            {{$address->user_address->first() ? $address->user_address->first()->city : ''}},
                            {{$address->user_address->first() ? $address->user_address->first()->postalcode : ''}},
                            {{$address->user_address->first() ? $address->user_address->first()->state : ''}}
                            </span>

                            <span>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </span>
                            </a>
                          </div>
                        @else
                          <div class="address">
                            <a href="#" class=""><span class="card-product-name">Kuala Lumpur</span></a>
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                          </div>
                        @endif
                    </div>
                    <div class="text-right">
                        <span class="card-product-delivery mr-1">Standard Delivery, Get within 5 days</span>
                        <span class="card-product-name text-dark bold">RM4.90</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <!-- End Modal Specification -->
	
	
    <!--================Single Product Area =================-->
    {{--Desktop View--}}
    <div class="product_image_area d-none d-sm-block">

        <div class="card-image" style="width:100%;padding-left:100px;padding-right:100px;background: #ffffff;box-shadow: 0 4px 30px #0000001a;backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);padding: 50px 20px;">
			
            <div class="row s_product_inner">
                <div class="col-lg-4 col-md-12 d-flex justify-content-center">
					<!--div class="">
						@foreach($product->image as $image)
							<div class="single-prd-item mx-2 color-{{$image->color}}">
								<!--img class="preview-image" src="{{asset('storage/'.$image->image)}}" alt="" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"-->
								<!--img class="preview-image" id="previewImage" src="{{asset('storage/'.$image->image)}}" alt="" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">

							</div>
						@endforeach
					</div-->
					<div class="">
                        <div class="single-prd-item mx-2">
                            @if($product->image()->first())
                                <img class="img-fluid preview-image" id="previewImage" src="{{asset('storage/'.$product->image()->first()->image)}}" alt="" style="border-radius: 10px">
							@else
												<img src="{{asset('admin/assets/img/avatars/default_product.png')}}"
													class="img-fluid" alt="" style="border-radius: 10px"/>
                            @endif
                        </div>
                    </div>
				</div>
					<div class="col-lg-4 col-md-12">
						<div class="">
							<h3 class="prodName" style="color:#274439">{{$product->name}}</h3>
							<h2 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439"><b>RM{{$product->list_price_on_store}}</b></h2>
							<div class="d-flex mb-3">
								<div class="text-primary mr-2">
									@php
										$ratings = $product->ratings;
										$averageRating = $ratings->avg('rating');
										$roundedRating = round($averageRating * 2) / 2;
										$filledStars = floor($roundedRating);
										$halfStars = ceil($roundedRating - $filledStars);
									@endphp
									@for ($i = 0; $i < $filledStars; $i++)
										<small style="color: #274439;" class="fas fa-star btn-star"></small>
									@endfor

									@for ($i = 0; $i < $halfStars; $i++)
										<small style="color: #274439;" class="fas fa-star-half-alt btn-star"></small>
									@endfor

									@for ($i = 0; $i < 5 - $filledStars - $halfStars; $i++)
										<small style="color: #274439;" class="far fa-star btn-star"></small>
									@endfor
								</div>
								<small class="pt-1" style="color: #5d5d5d">({{ $ratings->count() }})</small>

							</div>
							<div class="row mb-3">
								<div class="col-3"><span style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#000000"> <b>Description</b></span></div>
								<!--div class="col"><span style="color:#384aeb;font-family: -apple-system, BlinkMacSystemFont, sans-serif;">{{$product->mainCategory()->first() ? $product->mainCategory()->first()->name :''}}</span></div-->
							</div>
							<!-- Product Details -->
							<div class="row mb-3">
								<div class="col">
									<p>{{ $product->description }}</p>
								</div>
							</div>
							<div>
                            <span> Delivery Optionsssss</span>
                            <div class="row d-flex justify-content-between pt-3">

                                <div class="col-1">
                                    <i class="fa fa-map-pin" style="color:#1FA33D"></i>
                                </div>
                                <div class="col">
                                    <p style="color:#000">WP Kuala Lumpur, Kuala Lumpur</p>
                                </div>
                                <div class="col-2 d-flex justify-content-end">
                                    <a href="#" style="color:#1FA33D">CHANGE</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between">

                                <div class="col-1">
                                    <i class="fa fa-truck" style="color:#1FA33D"></i>
                                </div>
                                <div class="col">
                                    <p style="color:#000">Standard Delivery</p>
                                    <small class="m-0">Get  within 7 days</small>
                                </div>
                                <div class="col-2 d-flex justify-content-end">
                                    <p>RM4.90</p>
                                </div>
                            </div>

                        </div>
						<div class="prodDescr">
							<p>{!! $product->recommended !!}</p>
						</div>
					</div>
				</div>
                <div class="rounded col-lg-4 col-md-12" style="background-color:#E8E8E8">
    <div class="rounded">
        <div>
            <span style="color:#274439"><b>Choose Variations</b></span>
            <form id="cart-form-{{$product->id}}" action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" value="{{$product->id}}" name="id">
                <input type="hidden" id="option-value" value="cart" name="option">

                <div class="row mb-3">
                    <div class="col-3">
                        <span style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;">Size:</span>
                    </div>
                    <div class="col">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @foreach ($sizevariation as $size)
                                @if (in_array($size->sizes, $productSizes))
                                    <label class="btn btn-light rounded">
                                        <input type="radio" name="size" value="{{ $size->sizes }}" autocomplete="off">
                                        {{ $size->sizes }}
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-3">
                        <span style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;">Color:</span>
                    </div>
                    <div class="col">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            @foreach ($colorvariation as $colorOption)
                                <label class="btn btn-light rounded">
                                    <input type="radio" name="combination_id" value="{{ $colorOption->id }}" autocomplete="off" onchange="updatePreviewImage('{{ $colorOption->variationimage }}')">{{ $colorOption->color }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4 pt-3 mt-4">
                    <button onclick="event.preventDefault();
                            document.getElementById('cart-form-{{$product->id}}').submit();" class="button border-0 px-3 mr-2 rounded" style="border-radius:2px;width:180px;background-color:#FFFFFF;color:#274439">
                        <i class="fa fa-shopping-cart mr-2"></i> Add To Cart
                    </button>
                    <button onclick="buynow({{$product->id}})" class="button primary-btn px-3 rounded" style="border-radius:2px;width:180px;background-color:#274439;color:#FFFFFF">
                        <i class="fa fa-shopping-cart mr-2"></i> Buy Now
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-5 px-2 py-3 rounded" style="background-color:#f8f9fa">
            <span class="px-2">Sold by</span>
            <div class="d-flex justify-content-between align-items-center py-3 px-2 rounded" style="background-color:#FFFFFF;">
                <div class="px-2">
                    <p style="color:#1FA33D">{{$product->vendors()->first() ? $product->vendors()->first()->name :''}}</p>
                </div>
                <div class="d-flex justify-content-end align-items-center px-2 border border-success rounded">
                    <a href="{{route('shop.show',['id'=>$product->vendor_id])}}" style="color:#1FA33D">Visit Shop</a>
                </div>
            </div>
            <div class="d-flex justify-content-between py-3" style="border-top:solid 1px #d3d3d3;border-bottom:solid 1px #d3d3d3;">
                <div class="col-4 text-center">
                    <small><span>Seller Ratings</span></small>
                    <p style="color:#000;font-size:20px">96%</p>
                </div>
                <div class="col-4 text-center" style="border-right:solid 1px #EFF0F5;border-left:solid 1px #EFF0F5;">
                    <small><span>Ship on Time</span></small>
                    <p style="color:#000;font-size:20px">96%</p>
                </div>
                <div class="col-4 text-center">
                    <small><span>Chat Response</span></small>
                    <p style="color:#000;font-size:20px">96%</p>
                </div>
            </div>
        </div>
		</div>
		<br>
		</div>

            </div>
        </div>
    </div>
	
	
	
	

    {{-- Mobile View --}}
    <section class="d-block d-sm-none">
        <div class="card">
            <div class="card-content">
                @if($product->image()->first())
                    <img class="card-img-top img-fluid" src="{{asset('storage/'.$product->image()->first()->image)}}" alt="" >
				@else
					<img src="{{asset('admin/assets/img/avatars/default_product.png')}}"
					class="img-fluid card-img-top" alt="" />
                @endif
                <div class="card-body card-body-price">
                    <h4 class="card-product-price"><p style="color:#274439">RM{{$product->list_price_on_store}}</p></h4>
                    <h4 class="card-product-name mb-0" style="color:#274439">{{$product->name}}</h4>
                    <div class="d-flex mb-2">
                        <div class="text-primary mr-2">
                           @php
								$ratings = $product->ratings;
								$averageRating = $ratings->avg('rating');
								$roundedRating = round($averageRating * 2) / 2;
								$filledStars = floor($roundedRating);
								$halfStars = ceil($roundedRating - $filledStars);
							@endphp
							@for ($i = 0; $i < $filledStars; $i++)
								<small class="fas fa-star btn-star"></small>
							@endfor

							@for ($i = 0; $i < $halfStars; $i++)
								<small class="fas fa-star-half-alt btn-star"></small>
							@endfor

							@for ($i = 0; $i < 5 - $filledStars - $halfStars; $i++)
								<small class="far fa-star btn-star"></small>
							@endfor
						</div>
					   <small class="pt-1" style="color: #5d5d5d">({{ $ratings->count() }} Reviews)</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between ">
                <span class="card-product-name">
                Vouchers :
            </span>
                <div class="card-product-name mr-2 text-primary">
				@if(isset($voucher))
                    <span class="border border-primary rounded p-1 mr-2">{{isset($voucher) ? $voucher->unit_value : ''}} {{isset($voucher) ? $voucher->unique_code : ''}} off</span>
                    <!--span class="border border-primary  rounded p-1">RM10.00 off</span-->
                @endif
				</div>
				
                <div>
                    <span class="text-right"><i class="fa fa-angle-right" style="color:#1FA33D" aria-hidden="true"></i></span>
                </div>
            </div>

        </div>
        {{--<div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="card-product-name">Product Variations :</span>
                </div>

                <div class="">
                    <span class="text-dark card-product-name mr-1">Medium</span>
                    <span><i class="fa fa-angle-right" aria-hidden="true" style="color:#1FA33D"></i></span>
                </div>
            </div>
        </div>--}}
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="card-product-name">Specification :</span>
                </div>

                <div class="">
                    <a href="#" data-toggle="modal" data-target="#spec">
						<span class="text-dark card-product-name mr-1">Brand, Material</span>
						<span><i class="fa fa-angle-right" aria-hidden="true" style="color:#1FA33D"></i></span>
					</a>
                </div>
            </div>

        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="card-product-name">Delivery :</span>
                </div>
				@if(Auth::check() && Auth::user()->role == 'normal')
				  <div class="address">
					<a href="#" data-toggle="modal" data-target="#deli">
					<span class="card-product-name" style="color:#274439">
					<!--{{$address->user_address->first() ? $address->user_address->first()->address : ''}} -->
					{{$address->user_address->first() ? $address->user_address->first()->city : ''}}
					{{$address->user_address->first() ? $address->user_address->first()->postalcode : ''}}
					{{$address->user_address->first() ? $address->user_address->first()->state : ''}}
					</span>
				
					<span>
					<i class="fa fa-angle-right" style="color:#1FA33D" aria-hidden="true"></i>
					</span>
					</a>
				  </div>
				@else
				  <div class="address">
					<a href="#" class=""><span class="card-product-name">Kuala Lumpur</span></a>
					<span><i class="fa fa-angle-right" style="color:#1FA33D" aria-hidden="true"></i></span>
				  </div>
				@endif



            </div>
            <div class="text-right" style="color:#1FA33D">
                <span class="card-product-delivery mr-1">Standard Delivery, Get withing 5 days </span>
                <span class="card-product-name text-dark bold">RM4.90</span>
            </div>
        </div>
        
		
		<div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <span  class="card-product-name">
						Rating & Reviews test
					</span>
                </div>
                <div>
                    <a href="{{route('viewrating',['id'=>$product->id])}}" style="color:#1FA33D" class=""><span class="card-product-delivery">View All</span></a>
                </div>
            </div>
			@forelse($ratings as $rates)
            <div class="d-flex justify-content-between mt-3">
				<div>
                    <div class="d-flex">
                        <div class=" card-product-delivery">
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
							<small><span class="d-block">by {{$rates->users()->first() ? $rates->users()->first()->name :'nonames'}}</span></small>
						</div>
                    </div>
                </div>
            </div>
            <div>
                <p style="color:#000">{{$rates->comments}}</p>
            </div>
            {{--<div>
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="50px" width="50px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="50px" width="50px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="50px" width="50px">
            </div>--}}
            {{--<div><span class="card-product-name">Size : Large</span></div>--}}
			
			@empty
			<div class="d-flex align-items-center mt-3">
				<p>No ratings found</p>
			</div>
			@endforelse
        </div>
		<div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
				@if($popularShop)
                    <img class="img-fluid rounded-circle mr-1" src="{{ asset('storage/' . $popularShop->profile_image) }}" alt="" height="40px" width="40px">
                    <span class="card-product-name text-dark">{{$product->vendors()->first() ? $product->vendors()->first()->name :''}}</span>
                @endif
				</div>

                <div class="card-product-name mr-2 text-primary align-self-center">
                    <a class="border border-success rounded p-1 mr-2" style="color:#1FA33D" href="{{route('shop.show',['id'=>$product->vendor_id])}}">Visit Shop</a>
                </div>
            </div>

        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between ">
                <span class="card-product-name mb-1">Description :</span>

            </div>
            <div class="card-product-name text-dark">
               
				<p>{!! nl2br(e($product->description)) !!}</p>
            </div>


        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex mb-2">
                <h5 class="title mb-0" style="font-size:18px">You may also like:</h5>
            </div>
            <div class="row mt-4">
			 @foreach($otherProduct as $otherProducts)
                <div class="col-6 m-auto">
                    <div class="card card-product" style="width:150px;height:auto">
                        <div class="card-product__img text-center" style="width:150px;height:150px">
							@if($otherProducts->image()->first())
                                <img
                                    src="{{asset('storage/'.$otherProducts->image()->first()->image)}}"
                                    class="card-img" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px" alt=""/>
                            @else
                                <img
                                    src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                    class="card-img" style="min-height:100%; min-width: 100%; object-fit: cover;border-radius:10px" alt=""/>
                            @endif
                        </div>
						<div class=" p-2 ">
                            <p class="card-cate" style="font-size:10px">{{$otherProducts->mainCategory()->first() ? $otherProducts->mainCategory()->first()->name :''}}</p>
							<p><a href="{{route('showProduct',['id'=>$otherProducts->id])}}" class="title text-truncate" style="font-size:14px">{{$otherProducts->name}}</a></p>
							<div class="d-flex align-items-center mb-1">
							@php
								$rating = $otherProducts->ratings()->avg('rating');
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
							<small>({{$otherProducts->ratings()->count()}})</small>
							</div>
                            <p class="price" style="font-size:10px">RM {{$otherProducts->list_price_on_store}}</p>
						</div>
                    </div>
                </div>
				@endforeach
            </div>

        </div>
    </section>

    <!--================End Single Product Area =================-->

    <!--================ Product Description Area =================-->
	{{-- Desktop View --}}
    <section class=" d-none d-xl-block pt-5">
        <div class="card-image" style="width:100%;;padding-left:100px;padding-right:100px">
            <div>
                <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439"><b> Product Details</b></h4>
                <div class="p-3">
					<p style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;">{!! nl2br(html_entity_decode($product->description)) !!}</p>
				</div>


                <div class="mt-4 p-3">
                    <div class="table-responsive ">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <span style="color:#274439">Brand</span>
                                </td>
                                <td>
                                    <p>{{$product->brands()->first() ? $product->brands()->first()->name :''}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color:#274439">Stock</span>
                                </td>
                                <td>
                                    <p>{{$product->stocks()->first() ? $product->stocks()->first()->total_stock :''}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color:#274439">Weight</span>
                                </td>
                                <td>
                                    <p>{{$product->stocks()->first() ? $product->stocks()->first()->weight : ''}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color:#274439">Volumetric</span>
                                </td>
                                <td>
                                    <p>{{$product->volumetric_id}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color:#274439">SKU code</span>
                                </td>
                                <td>
                                    <p>{{$product->sku_code}}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
	
	{{-- Tab View --}}
    <section class="d-none d-sm-block d-xl-none pt-5">
        <div class="card-image" style="width:100%;;padding-left:100px;padding-right:100px">
            <div>
                <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439"><b> Product Details</b></h4>
                <div class="p-3">
					<p style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;">{!! nl2br(html_entity_decode($product->description)) !!}</p>
				</div>


                <div class="mt-4 p-3">
                    <div class="table-responsive ">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <span style="color:#274439">Brand</span>
                                </td>
                                <td>
                                    <p>{{$product->brands()->first() ? $product->brands()->first()->name :''}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color:#274439">Stock</span>
                                </td>
                                <td>
                                    <p>{{$product->stocks()->first() ? $product->stocks()->first()->total_stock :''}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color:#274439">Weight</span>
                                </td>
                                <td>
                                    <p>{{$product->stocks()->first() ? $product->stocks()->first()->weight : ''}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color:#274439">Volumetric</span>
                                </td>
                                <td>
                                    <p>{{$product->volumetric_id}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="color:#274439">SKU code</span>
                                </td>
                                <td>
                                    <p>{{$product->sku_code}}</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
	
	{{-- Desktop View--}}
    <section class="mb-4 pb-5 d-none d-xl-block ">
        <div class="card-image" style="width:100%;;padding-left:100px;padding-right:100px">
            <div>
                <div class="row mt-3 ml-3">
                    <div class="col-lg-12">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">Ratings & Reviews</h4>
									@if (isset($countRates) ? $countRates->rating : '')
									@php
										$averageRating = $countRates->avg('rating');
										$fullStars = floor($averageRating);
										$halfStars = ceil($averageRating - $fullStars);
									@endphp
                                     <div class="d-flex align-items-center">
										<h1>{{ number_format($averageRating, 1) }}</h1>
										<h5>/5.0</h5>
									</div>
									<div style="color:#FBD600;font-size:50px">
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
                                    <h6>({{isset($countRates) ? $countRates->count('id') : '0'}} Reviews)</h6>
                                @else
									<p>No ratings found</p>
								@endif
								</div>
                            </div>
                            <div class="col-6">
								
                                <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439" class="mb-4">Based on {{isset($countRates) ? $countRates->count('id') : '0'}} Reviews</h4>
								@forelse($ratings as $rates)
								@php
									$averageRating = $rates->avg('rating');
									$roundedRating = round($averageRating * 2) / 2;
									$percentage = $roundedRating / 5 * 100;
								@endphp
                                <div class="d-flex align-items-center">
                                    <div style="color:#FBD600">
										@for($i = 0; $i < 5; $i++)
											@if($i < $roundedRating)
												<i class="fa fa-star"></i>
											@elseif($i == ceil($roundedRating) - 1 && $roundedRating - floor($roundedRating) > 0)
												<i class="fa fa-star-half-o"></i>
											@else
												<i class="fa fa-star-o"></i>
											@endif
										@endfor
                                    </div>
                                    <div class="col-4">
                                        <div class="progress">
										<div class="progress-bar" role="progressbar" style="width: {{$percentage}}%; background-color: #FBD600;" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100">{{$roundedRating}}</div>
                                        </div>
                                    </div>
                                </div>
								@empty
									<p>No ratings found</p>
								@endforelse
                            </div>
                        </div>
                        <div class="review_list mt-4">
                            <h4 class="mb-4" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">Product Reviews</h4>
							@forelse($ratings as $rates)
							<div class="review_item pb-2" style="border-bottom:solid 1px #dddddd">
							
								<div class="media">
									<div class="media-body">
										<span>{{$rates->users()->first() ? $rates->users()->first()->name :'nonames'}}</span>
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
														
								<p style="color:#000">{{$rates->comments}}</p>
								<small>Size:Medium</small>
							</div>
							@empty
							<p>No ratings found</p>
							@endforelse                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	{{-- Tab view --}}
	<section class="mb-4 pb-5 d-none d-sm-block d-xl-none">
        <div class="card-image" style="width:100%;;padding-left:100px;padding-right:100px">
            <div>
                <div class="row mt-3 ml-3">
                    <div class="col-lg-12">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">Ratings & Reviews</h4>
									@if (isset($countRates) ? $countRates->rating : '')
									@php
										$averageRating = $countRates->avg('rating');
										$fullStars = floor($averageRating);
										$halfStars = ceil($averageRating - $fullStars);
									@endphp
                                     <div class="d-flex align-items-center">
										<h1>{{ number_format($averageRating, 1) }}</h1>
										<h5>/5.0</h5>
									</div>
									<div style="color:#FBD600;font-size:50px">
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
                                    <h6>({{isset($countRates) ? $countRates->count('id') : '0'}} Reviews)</h6>
                                @else
									<p>No ratings found</p>
								@endif
								</div>
                            </div>
                            <div class="col-6">
								
                                <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439" class="mb-4">Based on {{isset($countRates) ? $countRates->count('id') : '0'}} Reviews</h4>
								@forelse($ratings as $rates)
								@php
									$averageRating = $rates->avg('rating');
									$roundedRating = round($averageRating * 2) / 2;
									$percentage = $roundedRating / 5 * 100;
								@endphp
                                <div class="d-flex align-items-center">
                                    <div style="color:#FBD600">
										@for($i = 0; $i < 5; $i++)
											@if($i < $roundedRating)
												<i class="fa fa-star"></i>
											@elseif($i == ceil($roundedRating) - 1 && $roundedRating - floor($roundedRating) > 0)
												<i class="fa fa-star-half-o"></i>
											@else
												<i class="fa fa-star-o"></i>
											@endif
										@endfor
                                    </div>
                                    <div class="col-4">
                                        <div class="progress">
										<div class="progress-bar" role="progressbar" style="width: {{$percentage}}%; background-color: #FBD600;" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100">{{$roundedRating}}</div>
                                        </div>
                                    </div>
                                </div>
								@empty
									<p>No ratings found</p>
								@endforelse
                            </div>
                        </div>
                        <div class="review_list mt-4">
                            <h4 class="mb-4" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">Product Reviews</h4>
							@forelse($ratings as $rates)
							<div class="review_item pb-2" style="border-bottom:solid 1px #dddddd">
							
								<div class="media">
									<div class="media-body">
										<span>{{$rates->users()->first() ? $rates->users()->first()->name :'nonames'}}</span>
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
														
								<p style="color:#000">{{$rates->comments}}</p>
								<small>Size:Medium</small>
							</div>
							@empty
							<p>No ratings found</p>
							@endforelse                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

    <!--================ Start related Product area =================-->
	{{--Desktop view --}}
    <section class="pb-5 d-none d-xl-block">
        <div class="card-image" style="width:100%;;padding-left:100px;padding-right:100px">
            <div class="section-intro pb-60px">
                <h2 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">From Same Seller</h2>
            </div>
            <div class="row">
                @foreach($related as $relateds)
                    <div class="col-md-6 col-lg-4 col-xl-3" style="padding-bottom:100px">
                        <div class="card card-product">
                            <a class="card-product__img" href="{{route('showProduct',['id'=>$relateds->id])}}">
								<div class="card-product__img">
                                @if($relateds->image()->first())
                                    <img src="{{asset('storage/'.$relateds->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" alt="">
								@else
									<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
                                @endif
								</div>
                            </a>
                            <div class="py-2">

                                <!-- <p ><a href="#" class="text-primary"></a></p> -->
								<p class="card-cate">{{$relateds->mainCategory()->first() ? $relateds->mainCategory()->first()->name :''}}</p>
                                <p><a class="title" href="{{route('showProduct',['id'=>$relateds->id])}}">{{$relateds->name}}</a></p>
                                <div class="d-flex align-items-center mb-1">
								@php
									$ratings = $relateds->ratings;
									$averageRating = $ratings->avg('rating');
									$roundedRating = round($averageRating * 2) / 2;
									$filledStars = floor($roundedRating);
									$halfStars = ceil($roundedRating - $filledStars);
								@endphp
								@for ($i = 0; $i < $filledStars; $i++)
									<small class="fa fa-star btn-star mr-1"></small>
								@endfor

								@for ($i = 0; $i < $halfStars; $i++)
									<small class="fa fa-star-half-alt btn-star mr-1"></small>
								@endfor

								@for ($i = 0; $i < 5 - $filledStars - $halfStars; $i++)
									<small class="far fa-star btn-star mr-1"></small>
								@endfor
									
								<small>({{ $relateds->ratings->count() }})</small>
                                </div>
								<p class="price">RM {{$relateds->list_price_on_store}}</p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
	{{--Tab view --}}
	 <section class="pb-5 d-none d-sm-block d-xl-none">
        <div class="card-image" style="width:100%;;padding-left:100px;padding-right:100px">
            <div class="section-intro pb-60px">
                <h2 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">From Same Seller</h2>
            </div>
            <div class="row">
                @foreach($related as $relateds)
                    <div class="col-md-6 col-lg-4 col-xl-3" style="padding-bottom:100px">
                        <div class="card card-product">
                            <a class="card-product__img" href="{{route('showProduct',['id'=>$relateds->id])}}">
								<div class="card-product__img">
                                @if($relateds->image()->first())
                                    <img src="{{asset('storage/'.$relateds->image()->first()->image)}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" alt="">
								@else
									<img src="{{asset('admin/assets/img/avatars/default_product.png')}}" style="height:100%; width: 100%; object-fit: cover;border-radius:10px"/>
                                @endif
								</div>
                            </a>
                            <div class="py-2">

                                <!-- <p ><a href="#" class="text-primary"></a></p> -->
								<p class="card-cate">{{$relateds->mainCategory()->first() ? $relateds->mainCategory()->first()->name :''}}</p>
                                <p><a class="title" href="{{route('showProduct',['id'=>$relateds->id])}}">{{$relateds->name}}</a></p>
                                <div class="d-flex align-items-center mb-1">
								@php
									$ratings = $relateds->ratings;
									$averageRating = $ratings->avg('rating');
									$roundedRating = round($averageRating * 2) / 2;
									$filledStars = floor($roundedRating);
									$halfStars = ceil($roundedRating - $filledStars);
								@endphp
								@for ($i = 0; $i < $filledStars; $i++)
									<small class="fa fa-star btn-star mr-1"></small>
								@endfor

								@for ($i = 0; $i < $halfStars; $i++)
									<small class="fa fa-star-half-alt btn-star mr-1"></small>
								@endfor

								@for ($i = 0; $i < 5 - $filledStars - $halfStars; $i++)
									<small class="far fa-star btn-star mr-1"></small>
								@endfor
									
								<small>({{ $relateds->ratings->count() }})</small>
                                </div>
								<p class="price">RM {{$relateds->list_price_on_store}}</p>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
    <!--================ end related Product area =================-->
	{{--Desktop view --}}
    <section class="pb-5 d-none d-xl-block">
        <div class="card-image" style="width:100%;;padding-left:100px;padding-right:100px">
            <div class="section-intro pb-60px">
                {{-- <p>Popular Item in the market</p> --}}
                <h2 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">You May Also Like</h2>
            </div>
            <div class="row">
                @foreach($otherProduct as $otherProducts)
                <div class="col-sm-3 col-4" style="padding-bottom:100px">
                    <div class="card card-product">
                        <a class="card-product__img" href="{{route('showProduct',['id'=>$otherProducts->id])}}" >
							<div class="card-product__img">
                            @if($otherProducts->image()->first())
                                <img
                                    src="{{asset('storage/'.$otherProducts->image()->first()->image)}}"
                                    style="height:100%; width: 100%; object-fit: cover;border-radius:10px" />
                            @else
                                <img
                                    src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                    style="height:100%; width: 100%; object-fit: cover;border-radius:10px" />
                            @endif
							</div>
                        </a>
                        <div class="py-2">
                            <p class="card-cate">{{$otherProducts->mainCategory()->first() ? $otherProducts->mainCategory()->first()->name :''}}</p>
                            <p><a href="{{route('showProduct',['id'=>$otherProducts->id])}}" class="title text-truncate">{{$otherProducts->name}}</a></p>
                            <div class="d-flex align-items-center mb-1">
								@php
									$ratings = $otherProducts->ratings;
									$averageRating = $ratings->avg('rating');
									$roundedRating = round($averageRating * 2) / 2;
									$filledStars = floor($roundedRating);
									$halfStars = ceil($roundedRating - $filledStars);
								@endphp
								@for ($i = 0; $i < $filledStars; $i++)
									<small class="fa fa-star btn-star mr-1"></small>
								@endfor

								@for ($i = 0; $i < $halfStars; $i++)
									<small class="fa fa-star-half-alt btn-star mr-1"></small>
								@endfor

								@for ($i = 0; $i < 5 - $filledStars - $halfStars; $i++)
									<small class="far fa-star btn-star mr-1"></small>
								@endfor
									
								<small>({{ $otherProducts->ratings->count() }})</small>
                            </div>
							<p class=" price">RM{{$otherProducts->list_price_on_store}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
	{{--Tab view --}}
<section class="pb-5 d-none d-sm-block d-xl-none">
        <div class="card-image" style="width:100%;;padding-left:100px;padding-right:100px">
            <div class="section-intro pb-60px">
                {{-- <p>Popular Item in the market</p> --}}
                <h2 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">You May Also Like</h2>
            </div>
            <div class="row">
                @foreach($otherProduct as $otherProduct)
                <div  class="col-lg-4 col-md-6 col-sm-6" style="padding-bottom:100px">
                    <div class="card card-product">
                        <a class="card-product__img" href="{{route('showProduct',['id'=>$otherProduct->id])}}" >
							<div class="card-product__img">
                            @if($otherProduct->image()->first())
                                <img
                                    src="{{asset('storage/'.$otherProduct->image()->first()->image)}}"
                                    style="height:100%; width: 100%; object-fit: cover;border-radius:10px" />
                            @else
                                <img
                                    src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                    style="height:100%; width: 100%; object-fit: cover;border-radius:10px" />
                            @endif
							</div>
                        </a>
                        <div class="py-2">
                            <p class="card-cate">{{$otherProduct->mainCategory()->first() ? $otherProduct->mainCategory()->first()->name :''}}</p>
                            <p><a href="{{route('showProduct',['id'=>$otherProduct->id])}}" class="title text-truncate">{{$otherProduct->name}}</a></p>
                            <div class="d-flex align-items-center mb-1">
								@php
									$ratings = $otherProduct->ratings;
									$averageRating = $ratings->avg('rating');
									$roundedRating = round($averageRating * 2) / 2;
									$filledStars = floor($roundedRating);
									$halfStars = ceil($roundedRating - $filledStars);
								@endphp
								@for ($i = 0; $i < $filledStars; $i++)
									<small class="fa fa-star btn-star mr-1"></small>
								@endfor

								@for ($i = 0; $i < $halfStars; $i++)
									<small class="fa fa-star-half-alt btn-star mr-1"></small>
								@endfor

								@for ($i = 0; $i < 5 - $filledStars - $halfStars; $i++)
									<small class="far fa-star btn-star mr-1"></small>
								@endfor
									
								<small>({{ $otherProduct->ratings->count() }})</small>
                            </div>
							<p class=" price">RM{{$otherProduct->list_price_on_store}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
	{{-- Mobile view for add to cart--}}
	<div class="d-block d-sm-none"><div style="display: block; height: 100px;"></div></div>
    <nav class="footer-mobile fixed-bottom d-block d-sm-none">
        <div class="row d-flex justify-content-between px-2 pb-4" style="margin-bottom:40px;border-bottom:solid 1px;border-color:#384AEB">
				<div class="d-flex align-items-center justify-content-between">
					<form id="cart-form-{{$product->id}}" action="{{ route('cart.store') }}" method="POST" >
						@csrf
						
						<div class="input-group quantity d-flex align-items-center" style="width: 130px;">
							<div class="input-group-btn">
								<button class="btn btn-sm primary-btn btn-minus" style="background-color: #EBFFF2">
									<i class="fa fa-minus" style="color: #274439"></i>
								</button>
							</div>
							<input type="text" name="quantity" class="form-control border-0 text-center rounded" value="1" maxlength="12" >
							<div class="input-group-btn">
								<button class="btn btn-sm primary-btn btn-plus" style="background-color: #EBFFF2">
									<i class="fa fa-plus" style="color: #274439"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
				<div class="d-flex align-items-center justify-content-between">
					<div class="mr-2">
						<button onclick="event.preventDefault();document.getElementById('cart-form-{{$product->id}}').submit();" class="button border-0 btn-sm" style="border-radius:2px;background-color:#274439">Add To Cart</button>
					</div>
					<div>
						<button onclick="buynow({{$product->id}})" class="button primary-btn btn-sm" style="border-radius:2px;background-color:#ffffff;color:#274439">Buy Now</button>
					</div>
				</div>
		</div>
		
    </nav>
@endsection

@section('script')

	<script>
	 function updatePreviewImage(imageUrl) {
		
		var previewImage = document.getElementById("previewImage");
		console.log(previewImage);
		previewImage.src = "{{asset('storage/')}}" + "/" + imageUrl;
		
	}
	</script>
	
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
