@extends('layouts.app')
@section('addstyle')
<style>
    @media (max-width: 441px) {
        .Ql2fz0 {
            grid-column-start: 1;
            grid-column-end: 4;
            -ms-grid-column-span: 3;
            grid-row-start: 32;
            grid-row-end: 33;
            -ms-grid-row-span: 1;
            min-height: 95px;
            padding: 0 10px;
            margin: 10px 0 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-top: 1px dashed rgba(0, 0, 0, .09);
        }

        .FXKjae {
            padding: 0px 0px 0px 0;
            flex: 1;
        }

        .KqH1Px {
            background: #ffffff33;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 30px #0000001a;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            padding-top: 15px;
            display: grid;
            /* grid-template-columns: 1fr -webkit-max-content -webkit-max-content; */
            grid-template-columns: 1fr 1fr 1fr;
            /* grid-template-columns: 1fr -webkit-max-content -webkit-max-content;
                grid-template-columns: 1fr max-content max-content; */
            grid-template-rows: auto;
            grid-column: span 2;
            grid-column-gap: 10px;
        }

        .Exv9ow {
            grid-column-start: 0;
            grid-column-end: 0;
            padding-left: 10px
                /* -ms-grid-column-span: 1; */
        }


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

    .shipName {
        color: black;
        font-weight: 500;
    }

    .shipAddress {
        color: black;
        font-size: 10px;
    }

    .shipPhone {
        color: #9E9E9E;
        font-size: 10px;
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

    .cart-product-name {
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        font-size: 16px;
        font-weight: 400;
        color: #030303;
    }

    .cart-product-qty {
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        font-size: 12px;
        font-weight: 400;
        color: #030303;
    }

    .cart-product-price {
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        font-size: 12px;
        font-weight: 500;
        color: #384AEB;
    }

    .cart-total {
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        font-size: 20px;
        font-weight: 600;
        color: #384AEB;
    }

    .address {
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        font-size: 14px;
        font-weight: 400;
        color: #030303;
    }

    .address_name {
        font-family: -apple-system, BlinkMacSystemFont, sans-serif;
        font-size: 16px;
        font-weight: 400;
        color: #030303;
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
        width: 30px;
        height: 30px
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
            width: 30px;
            height: 30px
        }
    }


    #myBtn:hover {
        background-color: #555;
    }
</style>
@endsection

@section('content')


<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
<!-- The Modal Add Address -->
<div class="modal" id="addAddress" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">New Address</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" action="{{route('address.store')}}">
                @csrf

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="text" name="name" class="form-control" id="fullname" placeholder="Full Name">
                        </div>
                        <div class="form-group col-md-6">

                            <input type="text" name="phone" class="form-control" id="mobile" placeholder="Number Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State,Area'">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" id="housenumber" placeholder="House Number, Building, Street Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'House Number, Building, Street Name'">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="postal_code" id="postalcode" placeholder="Postal Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postal Code'">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="city" id="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control" name="state" id="state">
                                <option>Select State</option>
                                @foreach($state as $states)
                                <option value="{{$states->name}}">{{$states->name}}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" class="form-control" name="state" id="state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'">--}}
                        </div>
                    </div>
                    {{-- <div class="form-group">--}}
                    {{-- <input type="text" class="form-control" id="unitno" placeholder="Unit No (Optional)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Unit No (Optional)'">--}}
                    {{-- </div>--}}
                    {{-- <div class="form-group row">--}}
                    {{-- <label class="col-md-3">Label as :</label>--}}
                    {{-- <div class="col-md-9">--}}
                    {{-- <div class="input-group">--}}
                    {{-- <div class="d-inline-block custom-control custom-radio mr-1">--}}
                    {{-- <input type="radio" name="customer1" class="custom-control-input" checked id="yes">--}}
                    {{-- <label class="custom-control-label" for="yes">Home</label>--}}
                    {{-- </div>--}}
                    {{-- <div class="d-inline-block custom-control custom-radio">--}}
                    {{-- <input type="radio" name="customer1" class="custom-control-input" id="no">--}}
                    {{-- <label class="custom-control-label" for="no">Work</label>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    {{-- </div>--}}
                    <div class="form-check">
                        <input type="checkbox" name="default_address" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Set as Default Address</label>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>

                </div>
            </form>


        </div>
    </div>
</div>
<!-- End Modal Add Address -->

<!-- Modal -->
<div class="modal fade" id="changeshipping" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header modal-lg">
                <h5 class="modal-title" style="color:#274439;font-family: -apple-system, BlinkMacSystemFont, sans-serif" id="exampleModalLabel">Select Shipping Option</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal-courier-list">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="changeaddress" tabindex="-1" data-backdrop="static" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" style="color:#274439;">My Address</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="get" action="{{route('checkout.index')}}">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}" />
                                <input type="hidden" name="voucher" value="{{isset($voucher) ? $voucher->unique_code : null}}" />

                                @foreach($addresslist as $addresslists)
                                <tr>
                                    <td>
                                        <input type="radio" name="address" value="{{$addresslists->id}}" @if(isset($address) && $address->id == $addresslists->id) checked @endif/>
                                    </td>
                                    <td>
                                        <span class="address_name"><strong>{{$addresslists->name}}</strong></span>
                                        <div><span class="cart-product-price" style="color:#1FA33D">{{$addresslists->phone}}</span></div>
                                        <div><span class="address">{{$addresslists->address}} {{$addresslists->postalcode}} {{$addresslists->city}},
                                                {{$addresslists->state}} </span></div>
                                    </td>
                                    <td> <a data-toggle="modal" href="#" data-target="#myModal2" data-id="{{$addresslists->id}}" class="editAddressModal" style="color:#1FA33D">Edit</a></td>
                                </tr>
                                @endforeach
                                {{-- <tr>--}}
                                {{-- <td>--}}
                                {{-- <input type="radio" name="radios" id="radio2" />--}}
                                {{-- </td>--}}
                                {{-- <td><div class="media">--}}
                                {{-- <div class="d-flex">--}}
                                {{-- <p><strong>Aqilah Ahmad</strong></p>--}}
                                {{-- </div>--}}
                                {{-- <div class="">--}}
                                {{-- <p>(+60) 135123555</p>--}}
                                {{-- </div>--}}
                                {{-- </div>--}}
                                {{-- <p>159 Taman Mawar, Jalan Gangsa 05150 Alor Setar, Kedah</p></td>--}}
                                {{-- <td><a href="">Edit</a></td>--}}
                                {{-- </tr>--}}
                            </tbody>

                        </table>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="background-color:#274439">Confirm</button>

                </div>

            </form>

        </div>
    </div>
</div>
<!-- End Modal Add Address -->

<!-- Second Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" data-backdrop="static" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif">Edit Address</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container"></div>
            <div id="modal-edit-address">

            </div>
        </div>
    </div>
</div>
<!-- End Second Modal  -->

<!--================Checkout Area =================-->

<!--================Mobile=================-->
<section class="section-margin--small mb-5 d-block d-sm-none">
    <div class="">
        <section class="cart_area">
            <div class="cart_inner card-info px-4 py-2">
                <div class="d-flex justify-content-between align-items-center" style="border-radius:0px">
                    <span style="color:#274439"> <i class="ti-location-pin mr-2"></i> Delivery Address</span>
                    @if(isset($address))
                    <a href="#" style="color:#1FA33D;font-size: 15px;background: #f1f6f7;line-height: 40px !important;padding-right: 30px;margin-bottom: 0px" data-toggle="modal" data-target="#changeaddress">Change</a>
                    @else
                    <p> <a class="button button-login text-white" data-toggle="modal" data-target="#addAddress">Add Address</a></p>
                    @endif
                </div>
                <div>
                    <p> @include('error') </p>
                    @if(isset($address))
                    <p class="shipName">{{$address->name}} <span class="shipPhone ml-2">({{$address->phone}})</span></p>
                    <p class="shipAddress">{{$address->address}}, {{$address->postalcode}} {{$address->city}}, {{$address->state}}.</p>
                    @else

                    <p class="shipAddress"> Please add shipping address</p>
                    @endif
                </div>
            </div>
        </section>

        <section class="card_area">
            <div class="cart_inner card-info px-4 py-2">
                @php($total = 0)
                @php($mtotal = 0)
                @php($mtotal2 = 0)
                @php($stotal = 0)
                @php($vtotal = 0)
                @foreach($cart as $key => $cart2)
                <div class="mb-3" style=" border:solid 1px #ddd;border-radius:10px; padding:20px 10px">
                    @php($mtotal2 = 0)
                    @foreach($cart2 as $carts)
                    <div class="d-flex justify-content-between py-1 px-3 align-items-center mb-2" style="border: solid 1px #ced4da;border-radius: 20px">
                        <div>
                            @if($pickupAdd->serviceId == 'pickup')
                            <p>
                                @if(isset($selected_vendor_address))
                                @if($carts->vendor_id == $selected_vendor_address->user_id)
                                <small>{{$selected_vendor_address->address}}</small>
                                @endif
                                @endif
                            </p>
                            @endif
                            <p style="color:#000">{{$cart2->shipping != null ? $cart2->shipping->courierName:'No Shipping'}}
                                <br>
                                @if($cart2->shipping != null)
                                <small style="color:#888">{{$cart2->shipping != null ? $cart2->shipping->receiveBy : ''}}</small>
                                @endif
                            </p>
                        </div>
                        <div>
                            <a href="" data-toggle="modal" data-id="{{$key}}" data-courier="{{$cart2->shipping != null ? $cart2->shipping->id : null}}" style="color:#1FA33D" data-target="#changeshipping" class="changeAddress">CHANGE</a>
                        </div>

                    </div>
                    <div>
                        <div class="media d-flex align-items-center">
                            <div>
                                <button class="btn btn-sm btn-success" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-cart-form-{{$carts->id}}').submit()};">
                                    <i class="fa fa-trash"></i></button>
                                <form id="delete-cart-form-{{$carts->id}}" action="{{route('cart.destroy',['cart' => $carts->id])}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    @csrf
                                </form>
                            </div>

                            <div class="card-product__img text-center mx-1" style="width:80px;height:80px">
                                @if(isset($carts->variation))
                                <img src="{{asset('storage/'.$carts->variation->variationimage)}}" class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px">
                                @else
                                <img src="{{asset('admin/assets/img/avatars/default_product.png')}}" class="card-img" style="height:100%; width: 100%; object-fit: cover;border-radius:10px" />
                                @endif
                            </div>
                            <div class="media-body">
                                <p class="cart-product-name" style="font-size:14px;color:#274439">{{isset($carts->product) ? $carts->product->name : ''}} - {{isset($carts->variation) ? $carts->variation->name :''}}</p>
                                <div class="d-flex justify-content-between">
                                    <p class="cart-product-price" style="color:#274439">RM {{isset($carts->product) ? $carts->product->list_price_on_store : ''}}</p>
                                    <span class="cart-product-qty" style="color:#274439">Qty: {{$carts->quantity}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="justify-content-end d-flex align-items-center">
                            <p class="shipAddress mr-2" style="color:#274439"><b>Order Subtotal:</b></p>
                            <p class="shipName" style="color:#274439">RM {{isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : ''}}</p>
                            @php($mtotal2 += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
                            @php($mtotal += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
                            @if(isset($voucher) && isset($carts->product) && $voucher->product_id == $carts->product->id && $voucher->unit_value == 'RM')
                            @php($vtotal = $voucher->capped > 0 && $voucher->capped < $voucher->value ? $voucher->capped : $voucher->value)
                                @elseif(isset($voucher) && isset($carts->product) && $voucher->product_id == $carts->product->id && $voucher->unit_value == '%')
                                @php($value = $carts->product->list_price_on_store*$carts->quantity*$voucher->value/100)
                                @php($vtotal = $voucher->capped > 0 && $voucher->capped < $value ? $voucher->capped : $value)
                                    @endif
                        </div>
                    </div>
                    @endforeach
                    <hr style="border-color:#1FA33D">
                    <div class="d-flex justify-content-end align-items-center">
                        <p class="shipAddress" style="color:#274439">Shipping Fee: RM{{$cart2->shipping != null && $cart2->shipping->price > 0 ? $cart2->shipping->price:'0.00'}}</p>
                    </div>
                    @php($stotal += $cart2->shipping != null ? $cart2->shipping->price : 0.00)
                    <div class="d-flex justify-content-end align-items-center">
                        <p class="shipAddress" style="color:#274439">Order Total ({{count($cart2)}} Item):</p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center">
                        <h5 class="cart-total" style="color:#274439">RM {{$mtotal2 + ($cart2->shipping != null ? $cart2->shipping->price : 0.00)}}</h5>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <section class="cart_area">
            <div class="cart_inner card-info p-4">
                <div>
                    <span> <i class="ti-wallet"></i> Payment Method</span>
                    <div class="mt-2" style="border:solid 1px #1FA33D;padding:10px;border-radius:10px">
                        <div class="radion_btn">
                            <input type="radio" id="f-option6" checked>
                            <label for="f-option6">Online Banking </label>
                            <img src="{{asset('img/product/card.jpg')}}" alt="">
                            <div class="check"></div>
                        </div>
                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                    </div>
                </div>
                <!--div class="mt-5">
                        <span>Have a Voucher?</span>
                        @if(isset($voucher))
                            <div class="d-flex align-items-center check-address">
                                <div class="row no-gutters ">
                                    <div class="col-md-4 border-right">
                                        <div class="d-flex flex-column align-items-center " style="margin-top:20px;">
                                            <h1>@if($voucher->unit_value == 'RM') RM @endif {{number_format($voucher->value,'0','.',',')}} @if($voucher->unit_value == '%') % @endif</h1>
                                            <span>Discount</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div>
                                            <div class="p-2">
                                                @if($voucher->product)<span>{{$voucher->product->name}}</span><br/> @endif
                                                <span>@if($voucher->unit_value == 'RM') RM @endif {{number_format($voucher->value,'0','.',',')}} @if($voucher->unit_value == '%') % @endif discount</span><br/>
                                                @if($voucher->capped > 0)<span>Capped at RM{{$voucher->capped}}</span><br/>@endif
                                                <span>Valid till : {{\Carbon\Carbon::parse($voucher->end_at)->isoFormat('DD-MM-YYYY hh:mm:ss A')}}</span><br/>
                                                <span><a href="#">{{$voucher->unique_code}}</a></span><br/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row d-flex align-items-center justify-content-between mt-2 px-3 ">
                            <div>
                                <input type="text" class="form-control" name="name" placeholder="Enter Voucher Code">
                            </div>
                            <div>
                                <button class=" button btn-sm primary-btn" style="border-radius:2px;width:90px;padding:10px 20px" href="#">Apply</button>
                            </div>
                        </div>
                        @if(isset($voucher) && $voucher->product_id == null && $voucher->unit_value == 'RM')
                            @php($vtotal = $voucher->capped > 0 && $voucher->capped < $voucher->value ? $voucher->capped  : $voucher->value)
                        @elseif(isset($voucher) && $voucher->product_id == null && $voucher->unit_value == '%')
                            @php($value =  $mtotal*$voucher->value/100)
                            @php($vtotal = $voucher->capped > 0 && $voucher->capped < $value ? $voucher->capped  : $value)
                        @endif
                        <!-- <div class="KqH1Px">
									<div class="lhwDvd Exv9ow c5Dezq">Merchandise Subtotal:</div>
									<div class="lhwDvd Uu2y3K c5Dezq">RM99.80</div>
									</div>  -->
                <!--/div!-->
                <div class="cupon_area  bg-white py-4 px-3 mt-3" style="border-radius:5px">
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <strong>Success !</strong> {{ session('success') }}
                    </div>
                    @endif

                    @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <strong>Error !</strong> {{ session('error') }}
                    </div>
                    @endif
                    <div>
                        <h5 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;">Have a Voucher?</h2>
                    </div>


                    @if(isset($voucher))
                    <div class="d-flex align-items-center check-address">
                        <div class="row no-gutters ">
                            <div class="col-md-4 border-right">
                                <div class="d-flex flex-column align-items-center " style="margin-top:20px;">
                                    <h3>@if($voucher->unit_value == 'RM') RM @endif {{number_format($voucher->value,'0','.',',')}} @if($voucher->unit_value == '%') % @endif</h3>
                                    <span>Discount</span>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div>
                                    <div class="p-2">
                                        @if($voucher->product)<span>{{$voucher->product->name}}</span><br /> @endif
                                        <span>@if($voucher->unit_value == 'RM') RM @endif {{number_format($voucher->value,'0','.',',')}} @if($voucher->unit_value == '%') % @endif discount</span><br />
                                        @if($voucher->capped > 0)<span>Capped at RM{{$voucher->capped}}</span><br />@endif
                                        <span>Valid till : {{\Carbon\Carbon::parse($voucher->end_at)->isoFormat('DD-MM-YYYY hh:mm:ss A')}}</span><br />
                                        <span><a href="#">{{$voucher->unique_code}}</a></span><br />
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <form method="get" action="{{route('checkout.index')}}">
                        <div class="row">
                            <!--<div class="col d-flex align-items-center">
											<input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}"/>
											<input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}" />
                                    
									</div>-->
                            <div class="col d-flex justify-content-center align-items-center">
                                <input type="text" class="mr-2" name="voucher" placeholder="Enter vourcher code">
                                <button value="submit" class="button button-login text-white" style="background-color:#274439;padding:7px 40px">Apply</button>
                            </div>
                        </div>
                    </form>
                    @if(isset($voucher) && $voucher->product_id == null && $voucher->unit_value == 'RM')
                    @php($vtotal = $voucher->capped > 0 && $voucher->capped < $voucher->value ? $voucher->capped : $voucher->value)

                        @elseif(isset($voucher) && $voucher->product_id == null && $voucher->unit_value == '%')
                        @php($value = $mtotal*$voucher->value/100)
                        @php($vtotal = $voucher->capped > 0 && $voucher->capped < $value ? $voucher->capped : $value)

                            @endif
                            <!-- <div class="KqH1Px">
                          <div class="lhwDvd Exv9ow c5Dezq">Merchandise Subtotal:</div>
                          <div class="lhwDvd Uu2y3K c5Dezq">RM99.80</div>
                        </div>  -->
                </div>
                <form method="POST" action="{{route('payment')}}">
                    @csrf
                    <!--div class="KqH1Px mt-4">
                            <div class="lhwDvd Exv9ow c5Dezq">Subtotal:</div>
                            <div class="lhwDvd Uu2y3K c5Dezq">RM{{$mtotal}}</div>
                            <div class="lhwDvd Exv9ow B6k-vE">Shipping Total:</div>
                            <div class="lhwDvd Uu2y3K B6k-vE">RM{{$stotal}}</div>
                            <div class="lhwDvd Exv9ow D6k-vE ">Voucher Total:</div>
                            <div class="lhwDvd Uu2y3K D6k-vE">- RM {{$vtotal}}</div>
                            <div class="lhwDvd Exv9ow A4gPS6">Total Payment:</div>
                            <div class="lhwDvd +0tdvp Uu2y3K A4gPS6" style="font-size: 20px">RM{{$total + $mtotal + $stotal - $vtotal}}</div>
                            <div class="Ql2fz0">
                                <div class="FXKjae px-3">
                                    <div class="creat_account">
                                        <input type="checkbox" name="term" class="mr-2" required>
                                        <label for="f-option4" >I’ve Read and Accept The </label>
                                        <a href="#">terms & conditions*</a>
                                    </div>
                                </div>
                                <input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}" />
                                <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}"/>
                                <input type="hidden" name="voucher" value="{{isset($voucher) ? $voucher->unique_code : null}}"/>
                                <input type="hidden" name="total_payment" value="{{($total + $mtotal + $stotal) - $vtotal}}"/>
                                <input type="hidden" name="cart_total" value="{{$mtotal}}"/>
                                <input type="hidden" name="shipping_total" value="{{$stotal}}"/>
                                <input type="hidden" name="voucher_total" value="{{$vtotal}}"/>
                                <input type="hidden" name="payment" value="fpx"/>

                            </div>

                        </div-->
                    <div class="KqH1Px">

                        @php($stotal = 0)
                        @php($vtotal = 0)
                        @php($shipping_fees = [])

                        <!-- Group the cart items by vendor -->
                        @php($vendor_groups = $cart->groupBy('vendor_id'))

                        @foreach($vendor_groups as $vendor_id => $vendor_items)
                        @php($mtotal2 = 0)

                        @foreach($vendor_items as $item)
                        <!-- Render product details -->

                        <!-- Calculate the merchandise subtotal for the current item -->
                        @php($subtotal = isset($item->product) ? $item->product->list_price_on_store * $item->quantity : 0)
                        @php($mtotal2 += $subtotal)

                        <!-- Get the shipping fee for the current item -->
                        @php($shipping_fee = $item->shipping != null ? $item->shipping->price : 0)

                        <!-- Add the shipping fee to the shipping_fees array for the current vendor -->
                        @if(!isset($shipping_fees[$vendor_id]))
                        @php($shipping_fees[$vendor_id] = $shipping_fee)
                        @else
                        @php($shipping_fees[$vendor_id] += $shipping_fee)
                        @endif

                        <!-- Display the product details, quantity, and subtotal -->

                        @endforeach

                        <!-- Display the merchandise subtotal for the current vendor group -->
                        <div class="lhwDvd Exv9ow c5Dezq" style="color:#274439">Merchandise Subtotal (Vendor {{$vendor_id}}):</div>
                        <div class="lhwDvd Uu2y3K c5Dezq" style="color:#274439">RM {{$mtotal2}}</div>

                        <!-- Accumulate the merchandise subtotal for all vendor groups -->
                        @php($mtotal += $mtotal2)
                        @endforeach

                        <!-- Calculate the total shipping charges for all vendors -->
                        @foreach($shipping_fees as $vendor_shipping_fee)
                        @php($stotal += $vendor_shipping_fee)
                        @endforeach

                        <div class="lhwDvd Exv9ow B6k-vE" style="color:#274439">Shipping Total:</div>
                        <div class="lhwDvd Uu2y3K B6k-vE" style="color:#274439">RM {{$stotal}}</div>

                        <div class="lhwDvd Exv9ow D6k-vE" style="color:#274439">Voucher Total:</div>
                        <div class="lhwDvd Uu2y3K D6k-vE" style="color:#274439">- RM{{$vtotal}}</div>

                        <div style="color:#1FA33D" class="lhwDvd Exv9ow A4gPS6"><b>Total Payment :</b></div>
                        <div class="lhwDvd +0tdvp Uu2y3K A4gPS6" style="color:#274439">RM{{$mtotal + $stotal - $vtotal}}</div>

                        <div class="Ql2fz0">
                            <div class="FXKjae">
                                <div class="creat_account">
                                    <input type="checkbox" name="term" required>
                                    <label for="f-option4">I’ve Read and Accept the </label>
                                    <a href="#">Terms & Conditions*</a>
                                </div>
                            </div>
                            <input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}" />
                            <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}" />
                            <input type="hidden" name="voucher" value="{{isset($voucher) ? $voucher->unique_code : null}}" />
                            <input type="hidden" name="total_payment" value="{{($total + $mtotal + $stotal) - $vtotal}}" />
                            <input type="hidden" name="cart_total" value="{{$mtotal}}" />
                            <input type="hidden" name="shipping_total" value="{{$stotal}}" />
                            <input type="hidden" name="voucher_total" value="{{$vtotal}}" />
                            <input type="hidden" name="payment" value="fpx" />

                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="button button--active button-pay" style="background-color:#274439">Place Order</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</section>





<!--================Desktop =================-->
<section class="checkout_area section-margin--small d-none d-xl-block">
    <div class="card-image" style="width:100%">
        <div class="row">
            <div class="col-xl-9 col-lg-7 col-md-9">
                <section hidden class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <div class="d-flex justify-content-between align-items-center" style="border-radius:0px">
                            <span> <i class="ti-location-pin"></i> Delivery Address</span>
                            @if(isset($address))
                            <a href="#" style="font-size: 15px;line-height: 40px !important;padding:0 30px;margin-bottom: 0px" data-toggle="modal" data-target="#changeaddress"> Change</a>
                            @else
                            <p> <a class="button button-login text-white" data-toggle="modal" data-target="#addAddress">Add Address</a></p>
                            @endif
                        </div>
                        <div>
                            <p> @include('error') </p>
                            @if(isset($address))
                            <p>{{$address->name}} ({{$address->phone}})</p>
                            <p>{{$address->address}}, {{$address->postalcode}} {{$address->city}}, {{$address->state}}.</p>
                            @else

                            <p> Please add shipping address</p>
                            @endif
                        </div>
                    </div>
                </section>
                <section class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <h3 style="color:#274439">Review Item</h3>
                        <div class="table-responsive mt-5">
                            @php($total = 0)
                            @php($mtotal = 0)
                            @php($mtotal2 = 0)
                            @php($stotal = 0)
                            @php($vtotal = 0)
                            @foreach($cart as $key => $cart2)
                            <div class="mb-3" style=" border:solid 1px #ddd;border-radius:10px; padding:20px 10px">
                                @php($mtotal2 = 0)
                                @foreach($cart2 as $carts)
                                <table class="table">
                                    {{--<thead>
                                                    <tr>
                                                        <th scope="col" >Products Ordered</th>
                                                        <th scope="col">Unit Price</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Item Subtotal</th>

                                                    </tr>
                                            </thead>--}}
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="pr-2">
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
                                                        <p style="color:#000000;width:200px;display: -webkit-box;-webkit-line-clamp: 2; -webkit-box-orient: vertical;overflow: hidden;"><b>{{isset($carts->product) ? $carts->product->name : ''}}</b> - {{isset($carts->variation) ? $carts->variation->name : ''}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                RM {{isset($carts->product) ? $carts->product->list_price_on_store : ''}}
                                            </td>
                                            <td>
                                                Qty: {{$carts->quantity}}
                                            </td>
                                            <td>
                                                <h5>RM {{isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : ''}}</h5>
                                                @php($mtotal2 += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
                                                @php($mtotal += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
                                                @if(isset($voucher) && isset($carts->product) && $voucher->product_id == $carts->product->id && $voucher->unit_value == 'RM')
                                                @php($vtotal = $voucher->capped > 0 && $voucher->capped < $voucher->value ? $voucher->capped : $voucher->value)
                                                    @elseif(isset($voucher) && isset($carts->product) && $voucher->product_id == $carts->product->id && $voucher->unit_value == '%')
                                                    @php($value = $carts->product->list_price_on_store*$carts->quantity*$voucher->value/100)
                                                    @php($vtotal = $voucher->capped > 0 && $voucher->capped < $value ? $voucher->capped : $value)
                                                        @endif

                                            </td>

                                            <td>
                                                <div class="justify-content-center d-flex mt-2">
                                                    <button class="btn btn-xs btn-success" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-cart-form-{{$carts->id}}').submit()};">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <form id="delete-cart-form-{{$carts->id}}" action="{{route('cart.destroy',['cart' => $carts->id])}}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach
                                <table class="table">
                                    <tbody style="border-bottom:solid 1px #1FA33D">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="d-flex justify-content-end">Order Total ({{count($cart2)}} Item):</td>
                                            <td>
                                                <h5>RM {{$mtotal2 + ($cart2->shipping != null ? $cart2->shipping->price : 0.00)}}</h5>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <section class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <div class="d-flex justify-content-between align-items-center" style="border-radius:0px">
                            <h3 style="color:#274439"> <i class="ti-location-pin"></i> Delivery Information</h3>
                            <!--@if(isset($address))
                                    <a href="#" style="font-size: 15px;line-height: 40px !important;padding:0 30px;margin-bottom: 0px" data-toggle="modal" data-target="#changeaddress">	Change</a>
                                @else
                                    <p> <a class="button button-login text-white" data-toggle="modal" data-target="#addAddress">Add Address</a></p>
                                @endif-->
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <div class="col-md-3">
                                <span style="color:#274439" class="col-md-3"><b>Delivery Option:</b></span>
                            </div>

                            <div class="col-md-3 ">
                                @if($pickupAdd->serviceId == 'pickup')
                                <p>
                                    @if(isset($selected_vendor_address))
                                    @if($carts->vendor_id == $selected_vendor_address->user_id)
                                    <small>{{$selected_vendor_address->address}}</small>
                                    @endif
                                    @endif
                                </p>
                                @endif
                                <p style="color:#274439"><b>
                                        {{$cart2->shipping != null ? $cart2->shipping->courierName:'No Shipping'}}
                                        <br>
                                        @if($cart2->shipping != null)
                                        <small style="color:#274439">
                                            {{$cart2->shipping != null ? $cart2->shipping->receiveBy : ''}}
                                        </small>
                                        @endif
                                    </b></p>

                            </div>
                            <div class="col-md-3">
                                <a href="" data-toggle="modal" data-id="{{$key}}" data-courier="{{$cart2->shipping != null ? $cart2->shipping->id : null}}" data-target="#changeshipping" style="color:#1FA33D" class="changeAddress"><b>CHANGE</b></a>
                            </div>
                            <div style="color:#274439" class="col-md-3"><b>RM{{$cart2->shipping != null && $cart2->shipping->price > 0 ? $cart2->shipping->price:'0.00'}}</div>
                            @php($stotal += $cart2->shipping != null ? $cart2->shipping->price : 0.00)</b>
                        </div>
                        <div>
                            <p> @include('error') </p>
                            @if(isset($address))
                            <p>{{$address->name}} ({{$address->phone}})</p>
                            <p>{{$address->address}}, {{$address->postalcode}} {{$address->city}}, {{$address->state}}.</p>
                            @else

                            <p> Please add shipping address</p>
                            @endif
                        </div>
                    </div>
                </section>



            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 m-0 p-0">
                <section class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <div>
                            <h5 style="color:#274439"> <i class="ti-wallet"></i><b> Order Summary</b></h5>
                            <div class="mt-2 rounded" style="border:solid 1px #274439;padding:10px">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" checked>
                                    <label for="f-option6">Online Banking </label>
                                    <img src="{{asset('img/product/card.jpg')}}" alt="">
                                    <div class="check"></div>
                                </div>
                                {{--<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>--}}
                            </div>
                        </div>
                        <div class="mt-5 mb-3">
                            <div class="cupon_area">
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong></strong> {{ session('success') }}
                                </div>
                                @endif

                                @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong></strong> {{ session('error') }}
                                </div>
                                @endif
                                <div class="check_title">
                                    <h2 hidden class="c-title">Have a Voucher?</h2>
                                </div>
                                <div class="check_title" style="border:solid 1px #274439;padding:10px">
                                    <h2 class="c-title">Have a Voucher?</h2>
                                </div>
                                @if(isset($voucher))
                                <div class="d-flex align-items-center check-address">
                                    <div class="row no-gutters ">
                                        <div class="col-md-4 border-right">
                                            <div class="d-flex flex-column align-items-center " style="margin-top:20px;">
                                                <h3>@if($voucher->unit_value == 'RM') RM @endif {{number_format($voucher->value,'0','.',',')}} @if($voucher->unit_value == '%') % @endif</h3>
                                                <span>Discount</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div>
                                                <div class="p-2">
                                                    @if($voucher->product)<span>{{$voucher->product->name}}</span><br /> @endif
                                                    <span>@if($voucher->unit_value == 'RM') RM @endif {{number_format($voucher->value,'0','.',',')}} @if($voucher->unit_value == '%') % @endif discount</span><br />
                                                    @if($voucher->capped > 0)<span>Capped at RM{{$voucher->capped}}</span><br />@endif
                                                    <span>Valid till : {{\Carbon\Carbon::parse($voucher->end_at)->isoFormat('DD-MM-YYYY hh:mm:ss A')}}</span><br />
                                                    <span><a href="#">{{$voucher->unique_code}}</a></span><br />
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="border py-3 alert-success " style="border-radius: 0 0 0.25rem 0.25rem;">
                                    <form method="get" action="{{route('checkout.index')}}">
                                        <div class=" d-flex align-items-center">
                                            <input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}" />
                                            <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}" />
                                        </div>

                                        <div class="alert-success">
                                            <div class="alert-success d-flex justify-content-center">
                                                <input type="text" class="mr-2" name="voucher" placeholder="Enter code">
                                            </div>
                                            <div class="alert-success d-flex justify-content-center">
                                                <button style="background-color:#274439" value="submit" class="button button-login text-white" style="padding:7px 80px">Apply</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                @if(isset($voucher) && $voucher->product_id == null && $voucher->unit_value == 'RM')
                                @php($vtotal = $voucher->capped > 0 && $voucher->capped < $voucher->value ? $voucher->capped : $voucher->value)

                                    @elseif(isset($voucher) && $voucher->product_id == null && $voucher->unit_value == '%')
                                    @php($value = $mtotal*$voucher->value/100)
                                    @php($vtotal = $voucher->capped > 0 && $voucher->capped < $value ? $voucher->capped : $value)

                                        @endif
                            </div>
                        </div>
                        <form method="POST" action="{{route('payment')}}">
                            @csrf
                            <!--div class="KqH1Px">
                                    <div class="lhwDvd Exv9ow c5Dezq">Merchandise Subtotal:</div>
                                    <div class="lhwDvd Uu2y3K c5Dezq">RM{{$mtotal}}</div>
                                    <div class="lhwDvd Exv9ow B6k-vE">Shipping Total:</div>
                                    <div class="lhwDvd Uu2y3K B6k-vE">RM{{$stotal}}</div>
                                    <div class="lhwDvd Exv9ow D6k-vE ">Voucher Total:</div>
                                    <div class="lhwDvd Uu2y3K D6k-vE">- RM{{$vtotal}}</div>
                                    <div class="lhwDvd Exv9ow A4gPS6">Total Payment:</div>
                                    <div class="lhwDvd +0tdvp Uu2y3K A4gPS6">RM{{$total + $mtotal + $stotal - $vtotal}}</div>
                                    <div class="Ql2fz0">
                                        <div class="FXKjae">
                                            <div class="creat_account">
                                                <input type="checkbox" name="term"  required>
                                                <label for="f-option4" >I’ve Read and Accept the </label>
                                                <a href="#">Terms & Conditions*</a>
                                            </div>
                                        </div>
                                        <input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}" />
                                        <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}"/>
                                        <input type="hidden" name="voucher" value="{{isset($voucher) ? $voucher->unique_code : null}}"/>
                                        <input type="hidden" name="total_payment" value="{{($total + $mtotal + $stotal) - $vtotal}}"/>
                                        <input type="hidden" name="cart_total" value="{{$mtotal}}"/>
                                        <input type="hidden" name="shipping_total" value="{{$stotal}}"/>
                                        <input type="hidden" name="voucher_total" value="{{$vtotal}}"/>
                                        <input type="hidden" name="payment" value="fpx"/>

                                    </div>

                                </div-->
                            <!--I see. It seems like you need to group the cart items by vendor and then apply the shipping fee only once for each vendor group. You can try something like this:-->

                            <div class="KqH1Px">

                                @php($stotal = 0)
                                @php($vtotal = 0)
                                @php($shipping_fees = [])

                                <!-- Group the cart items by vendor -->
                                @php($vendor_groups = $cart->groupBy('vendor_id'))

                                @foreach($vendor_groups as $vendor_id => $vendor_items)
                                @php($mtotal2 = 0)

                                @foreach($vendor_items as $item)
                                <!-- Render product details -->

                                <!-- Calculate the merchandise subtotal for the current item -->
                                @php($subtotal = isset($item->product) ? $item->product->list_price_on_store * $item->quantity : 0)
                                @php($mtotal2 += $subtotal)

                                <!-- Get the shipping fee for the current item -->
                                @php($shipping_fee = $item->shipping != null ? $item->shipping->price : 0)

                                <!-- Add the shipping fee to the shipping_fees array for the current vendor -->
                                @if(!isset($shipping_fees[$vendor_id]))
                                @php($shipping_fees[$vendor_id] = $shipping_fee)
                                @else
                                @php($shipping_fees[$vendor_id] += $shipping_fee)
                                @endif

                                <!-- Display the product details, quantity, and subtotal -->

                                @endforeach

                                <!-- Display the merchandise subtotal for the current vendor group -->
                                <div class="lhwDvd Exv9ow c5Dezq">Merchandise Subtotal :</div>
                                <div class="lhwDvd Uu2y3K c5Dezq">RM {{$mtotal2}}</div>

                                <!-- Accumulate the merchandise subtotal for all vendor groups -->
                                @php($mtotal += $mtotal2)
                                @endforeach

                                <!-- Calculate the total shipping charges for all vendors -->
                                @foreach($shipping_fees as $vendor_shipping_fee)
                                @php($stotal += $vendor_shipping_fee)
                                @endforeach

                                <div class="lhwDvd Exv9ow B6k-vE">Shipping Total:</div>
                                <div class="lhwDvd Uu2y3K B6k-vE">RM {{$stotal}}</div>

                                <div class="lhwDvd Exv9ow D6k-vE">Voucher Total:</div>
                                <div class="lhwDvd Uu2y3K D6k-vE">- RM{{$vtotal}}</div>

                                <div style="color:#1FA33D" class="lhwDvd Exv9ow A4gPS6">Total Payment:</div>
                                <div style="color:#1FA33D" class="lhwDvd +0tdvp Uu2y3K A4gPS6">RM{{$mtotal + $stotal - $vtotal}}</div>

                                <div class="Ql2fz0">
                                    <div class="FXKjae">
                                        <div class="creat_account">
                                            <input type="checkbox" name="term" required>
                                            <label for="f-option4">I’ve Read and Accept the </label>
                                            <a style="color:#274439" href="#">Terms & Conditions*</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}" />
                                    <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}" />
                                    <input type="hidden" name="voucher" value="{{isset($voucher) ? $voucher->unique_code : null}}" />
                                    <input type="hidden" name="total_payment" value="{{($total + $mtotal + $stotal) - $vtotal}}" />
                                    <input type="hidden" name="cart_total" value="{{$mtotal}}" />
                                    <input type="hidden" name="shipping_total" value="{{$stotal}}" />
                                    <input type="hidden" name="voucher_total" value="{{$vtotal}}" />
                                    <input type="hidden" name="payment" value="fpx" />

                                </div>
                            </div>


                            <!--I hope this helps. Please note that this is not a tested code and you may need to adjust it according to your data structure and logic. 😊-->

                            <div class="d-flex justify-content-center">
                                <button style="background-color:#274439" type="submit" class="button button--active button-pay">Pay Now</button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>



        </div>
    </div>
</section>
<!--================End Checkout Area =================-->

<!--================Tab =================-->
<section class="checkout_area section-margin--small d-none d-sm-block d-xl-none">
    <div class="card-image" style="width:100%">
        <div class="row">
            <div class="col-xl-9 col-lg-7 col-md-9">
                <section hidden class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <div class="d-flex justify-content-between align-items-center" style="border-radius:0px">
                            <span> <i class="ti-location-pin"></i> Delivery Address</span>
                            @if(isset($address))
                            <a href="#" style="font-size: 15px;line-height: 40px !important;padding:0 30px;margin-bottom: 0px" data-toggle="modal" data-target="#changeaddress"> Change</a>
                            @else
                            <p> <a class="button button-login text-white" data-toggle="modal" data-target="#addAddress">Add Address</a></p>
                            @endif
                        </div>
                        <div>
                            <p> @include('error') </p>
                            @if(isset($address))
                            <p>{{$address->name}} ({{$address->phone}})</p>
                            <p>{{$address->address}}, {{$address->postalcode}} {{$address->city}}, {{$address->state}}.</p>
                            @else

                            <p> Please add shipping address</p>
                            @endif
                        </div>
                    </div>
                </section>
                <section class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <h3 style="color:#274439">Review Item</h3>
                        <div class="table-responsive mt-5">
                            @php($total = 0)
                            @php($mtotal = 0)
                            @php($mtotal2 = 0)
                            @php($stotal = 0)
                            @php($vtotal = 0)
                            @foreach($cart as $key => $cart2)
                            <div class="mb-3" style=" border:solid 1px #ddd;border-radius:10px; padding:20px 10px">
                                @php($mtotal2 = 0)
                                @foreach($cart2 as $carts)
                                <table class="table">
                                    {{--<thead>
                                                    <tr>
                                                        <th scope="col" >Products Ordered</th>
                                                        <th scope="col">Unit Price</th>
                                                        <th scope="col">Amount</th>
                                                        <th scope="col">Item Subtotal</th>

                                                    </tr>
                                            </thead>--}}
                                    <tbody>

                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="pr-2">
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
                                                        <p style="color:#000000;width:200px;display: -webkit-box;-webkit-line-clamp: 2; -webkit-box-orient: vertical;overflow: hidden;"><b>{{isset($carts->product) ? $carts->product->name : ''}}</b> - {{isset($carts->variation) ? $carts->variation->name : ''}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                RM {{isset($carts->product) ? $carts->product->list_price_on_store : ''}}
                                            </td>
                                            <td>
                                                Qty: {{$carts->quantity}}
                                            </td>
                                            <td>
                                                <h5>RM {{isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : ''}}</h5>
                                                @php($mtotal2 += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
                                                @php($mtotal += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
                                                @if(isset($voucher) && isset($carts->product) && $voucher->product_id == $carts->product->id && $voucher->unit_value == 'RM')
                                                @php($vtotal = $voucher->capped > 0 && $voucher->capped < $voucher->value ? $voucher->capped : $voucher->value)
                                                    @elseif(isset($voucher) && isset($carts->product) && $voucher->product_id == $carts->product->id && $voucher->unit_value == '%')
                                                    @php($value = $carts->product->list_price_on_store*$carts->quantity*$voucher->value/100)
                                                    @php($vtotal = $voucher->capped > 0 && $voucher->capped < $value ? $voucher->capped : $value)
                                                        @endif

                                            </td>

                                            <td>
                                                <div class="justify-content-center d-flex mt-2">
                                                    <button class="btn btn-xs btn-success" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-cart-form-{{$carts->id}}').submit()};">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <form id="delete-cart-form-{{$carts->id}}" action="{{route('cart.destroy',['cart' => $carts->id])}}" method="post">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach
                                <table class="table">
                                    <tbody style="border-bottom:solid 1px #1FA33D">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="d-flex justify-content-end">Order Total ({{count($cart2)}} Item):</td>
                                            <td>
                                                <h5>RM {{$mtotal2 + ($cart2->shipping != null ? $cart2->shipping->price : 0.00)}}</h5>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <section class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <div class="d-flex justify-content-between align-items-center" style="border-radius:0px">
                            <h3 style="color:#274439"> <i class="ti-location-pin"></i> Delivery Information</h3>
                            <!--@if(isset($address))
                                    <a href="#" style="font-size: 15px;line-height: 40px !important;padding:0 30px;margin-bottom: 0px" data-toggle="modal" data-target="#changeaddress">	Change</a>
                                @else
                                    <p> <a class="button button-login text-white" data-toggle="modal" data-target="#addAddress">Add Address</a></p>
                                @endif-->
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <div class="col-md-3">
                                <span style="color:#274439" class="col-md-3"><b>Delivery Option:</b></span>
                            </div>

                            <div class="col-md-3 ">
                                @if($pickupAdd->serviceId == 'pickup')
                                <p>
                                    @if(isset($selected_vendor_address))
                                    @if($carts->vendor_id == $selected_vendor_address->user_id)
                                    <small>{{$selected_vendor_address->address}}</small>
                                    @endif
                                    @endif
                                </p>
                                @endif
                                <p style="color:#274439"><b>
                                        {{$cart2->shipping != null ? $cart2->shipping->courierName:'No Shipping'}}
                                        <br>
                                        @if($cart2->shipping != null)
                                        <small style="color:#274439">
                                            {{$cart2->shipping != null ? $cart2->shipping->receiveBy : ''}}
                                        </small>
                                        @endif
                                    </b></p>

                            </div>
                            <div class="col-md-3">
                                <a href="" data-toggle="modal" data-id="{{$key}}" data-courier="{{$cart2->shipping != null ? $cart2->shipping->id : null}}" data-target="#changeshipping" style="color:#1FA33D" class="changeAddress"><b>CHANGE</b></a>
                            </div>
                            <div style="color:#274439" class="col-md-3"><b>RM{{$cart2->shipping != null && $cart2->shipping->price > 0 ? $cart2->shipping->price:'0.00'}}</div>
                            @php($stotal += $cart2->shipping != null ? $cart2->shipping->price : 0.00)</b>
                        </div>
                        <div>
                            <p> @include('error') </p>
                            @if(isset($address))
                            <p>{{$address->name}} ({{$address->phone}})</p>
                            <p>{{$address->address}}, {{$address->postalcode}} {{$address->city}}, {{$address->state}}.</p>
                            @else

                            <p> Please add shipping address</p>
                            @endif
                        </div>
                    </div>
                </section>



            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 m-0 p-0">
                <section class="cart_area">
                    <div class="cart_inner card-info p-4">
                        <div>
                            <h5 style="color:#274439"> <i class="ti-wallet"></i><b> Order Summary</b></h5>
                            <div class="mt-2 rounded" style="border:solid 1px #274439;padding:10px">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" checked>
                                    <label for="f-option6">Online Banking </label>
                                    <img src="{{asset('img/product/card.jpg')}}" alt="">
                                    <div class="check"></div>
                                </div>
                                {{--<p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>--}}
                            </div>
                        </div>
                        <div class="mt-5 mb-3">
                            <div class="cupon_area">
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong></strong> {{ session('success') }}
                                </div>
                                @endif

                                @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong></strong> {{ session('error') }}
                                </div>
                                @endif
                                <div class="check_title">
                                    <h2 hidden class="c-title">Have a Voucher?</h2>
                                </div>
                                <div class="check_title" style="border:solid 1px #274439;padding:10px">
                                    <h2 class="c-title">Have a Voucher?</h2>
                                </div>
                                @if(isset($voucher))
                                <div class="d-flex align-items-center check-address">
                                    <div class="row no-gutters ">
                                        <div class="col-md-4 border-right">
                                            <div class="d-flex flex-column align-items-center " style="margin-top:20px;">
                                                <h3>@if($voucher->unit_value == 'RM') RM @endif {{number_format($voucher->value,'0','.',',')}} @if($voucher->unit_value == '%') % @endif</h3>
                                                <span>Discount</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div>
                                                <div class="p-2">
                                                    @if($voucher->product)<span>{{$voucher->product->name}}</span><br /> @endif
                                                    <span>@if($voucher->unit_value == 'RM') RM @endif {{number_format($voucher->value,'0','.',',')}} @if($voucher->unit_value == '%') % @endif discount</span><br />
                                                    @if($voucher->capped > 0)<span>Capped at RM{{$voucher->capped}}</span><br />@endif
                                                    <span>Valid till : {{\Carbon\Carbon::parse($voucher->end_at)->isoFormat('DD-MM-YYYY hh:mm:ss A')}}</span><br />
                                                    <span><a href="#">{{$voucher->unique_code}}</a></span><br />
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="border py-3 alert-success " style="border-radius: 0 0 0.25rem 0.25rem;">
                                    <form method="get" action="{{route('checkout.index')}}">
                                        <div class=" d-flex align-items-center">
                                            <input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}" />
                                            <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}" />
                                        </div>

                                        <div class="alert-success">
                                            <div class="alert-success d-flex justify-content-center">
                                                <input type="text" class="mr-2" name="voucher" placeholder="Enter code">
                                            </div>
                                            <div class="alert-success d-flex justify-content-center">
                                                <button style="background-color:#274439" value="submit" class="button button-login text-white" style="padding:7px 80px">Apply</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                @if(isset($voucher) && $voucher->product_id == null && $voucher->unit_value == 'RM')
                                @php($vtotal = $voucher->capped > 0 && $voucher->capped < $voucher->value ? $voucher->capped : $voucher->value)

                                    @elseif(isset($voucher) && $voucher->product_id == null && $voucher->unit_value == '%')
                                    @php($value = $mtotal*$voucher->value/100)
                                    @php($vtotal = $voucher->capped > 0 && $voucher->capped < $value ? $voucher->capped : $value)

                                        @endif
                            </div>
                        </div>
                        <form method="POST" action="{{route('payment')}}">
                            @csrf
                            <!--div class="KqH1Px">
                                    <div class="lhwDvd Exv9ow c5Dezq">Merchandise Subtotal:</div>
                                    <div class="lhwDvd Uu2y3K c5Dezq">RM{{$mtotal}}</div>
                                    <div class="lhwDvd Exv9ow B6k-vE">Shipping Total:</div>
                                    <div class="lhwDvd Uu2y3K B6k-vE">RM{{$stotal}}</div>
                                    <div class="lhwDvd Exv9ow D6k-vE ">Voucher Total:</div>
                                    <div class="lhwDvd Uu2y3K D6k-vE">- RM{{$vtotal}}</div>
                                    <div class="lhwDvd Exv9ow A4gPS6">Total Payment:</div>
                                    <div class="lhwDvd +0tdvp Uu2y3K A4gPS6">RM{{$total + $mtotal + $stotal - $vtotal}}</div>
                                    <div class="Ql2fz0">
                                        <div class="FXKjae">
                                            <div class="creat_account">
                                                <input type="checkbox" name="term"  required>
                                                <label for="f-option4" >I’ve Read and Accept the </label>
                                                <a href="#">Terms & Conditions*</a>
                                            </div>
                                        </div>
                                        <input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}" />
                                        <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}"/>
                                        <input type="hidden" name="voucher" value="{{isset($voucher) ? $voucher->unique_code : null}}"/>
                                        <input type="hidden" name="total_payment" value="{{($total + $mtotal + $stotal) - $vtotal}}"/>
                                        <input type="hidden" name="cart_total" value="{{$mtotal}}"/>
                                        <input type="hidden" name="shipping_total" value="{{$stotal}}"/>
                                        <input type="hidden" name="voucher_total" value="{{$vtotal}}"/>
                                        <input type="hidden" name="payment" value="fpx"/>

                                    </div>

                                </div-->
                            <!--I see. It seems like you need to group the cart items by vendor and then apply the shipping fee only once for each vendor group. You can try something like this:-->

                            <div class="KqH1Px">

                                @php($stotal = 0)
                                @php($vtotal = 0)
                                @php($shipping_fees = [])

                                <!-- Group the cart items by vendor -->
                                @php($vendor_groups = $cart->groupBy('vendor_id'))

                                @foreach($vendor_groups as $vendor_id => $vendor_items)
                                @php($mtotal2 = 0)

                                @foreach($vendor_items as $item)
                                <!-- Render product details -->

                                <!-- Calculate the merchandise subtotal for the current item -->
                                @php($subtotal = isset($item->product) ? $item->product->list_price_on_store * $item->quantity : 0)
                                @php($mtotal2 += $subtotal)

                                <!-- Get the shipping fee for the current item -->
                                @php($shipping_fee = $item->shipping != null ? $item->shipping->price : 0)

                                <!-- Add the shipping fee to the shipping_fees array for the current vendor -->
                                @if(!isset($shipping_fees[$vendor_id]))
                                @php($shipping_fees[$vendor_id] = $shipping_fee)
                                @else
                                @php($shipping_fees[$vendor_id] += $shipping_fee)
                                @endif

                                <!-- Display the product details, quantity, and subtotal -->

                                @endforeach

                                <!-- Display the merchandise subtotal for the current vendor group -->
                                <div class="lhwDvd Exv9ow c5Dezq">Merchandise Subtotal :</div>
                                <div class="lhwDvd Uu2y3K c5Dezq">RM {{$mtotal2}}</div>

                                <!-- Accumulate the merchandise subtotal for all vendor groups -->
                                @php($mtotal += $mtotal2)
                                @endforeach

                                <!-- Calculate the total shipping charges for all vendors -->
                                @foreach($shipping_fees as $vendor_shipping_fee)
                                @php($stotal += $vendor_shipping_fee)
                                @endforeach

                                <div class="lhwDvd Exv9ow B6k-vE">Shipping Total:</div>
                                <div class="lhwDvd Uu2y3K B6k-vE">RM {{$stotal}}</div>

                                <div class="lhwDvd Exv9ow D6k-vE">Voucher Total:</div>
                                <div class="lhwDvd Uu2y3K D6k-vE">- RM{{$vtotal}}</div>

                                <div style="color:#1FA33D" class="lhwDvd Exv9ow A4gPS6">Total Payment:</div>
                                <div style="color:#1FA33D" class="lhwDvd +0tdvp Uu2y3K A4gPS6">RM{{$mtotal + $stotal - $vtotal}}</div>

                                <div class="Ql2fz0">
                                    <div class="FXKjae">
                                        <div class="creat_account">
                                            <input type="checkbox" name="term" required>
                                            <label for="f-option4">I’ve Read and Accept the </label>
                                            <a style="color:#274439" href="#">Terms & Conditions*</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}" />
                                    <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}" />
                                    <input type="hidden" name="voucher" value="{{isset($voucher) ? $voucher->unique_code : null}}" />
                                    <input type="hidden" name="total_payment" value="{{($total + $mtotal + $stotal) - $vtotal}}" />
                                    <input type="hidden" name="cart_total" value="{{$mtotal}}" />
                                    <input type="hidden" name="shipping_total" value="{{$stotal}}" />
                                    <input type="hidden" name="voucher_total" value="{{$vtotal}}" />
                                    <input type="hidden" name="payment" value="fpx" />

                                </div>
                            </div>


                            <!--I hope this helps. Please note that this is not a tested code and you may need to adjust it according to your data structure and logic. 😊-->

                            <div class="d-flex justify-content-center">
                                <button style="background-color:#274439" type="submit" class="button button--active button-pay">Pay Now</button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>



        </div>
    </div>
</section>
<!--================End Checkout Area =================-->

<div class="d-block d-sm-none">
    <div style="display: block; height: 60px;"></div>
</div>
<nav class="footer-mobile fixed-bottom d-block d-sm-none">
    <div class="d-flex justify-content-around">
        <a class="text-center" href="{{route('/')}}"><img class="tabbar-item-icon" src="{{asset('img/lifecarelogo.png')}}" alt=""><span class="d-block" style="font-size: 10px">Home</span></a>
        <a class="text-center" href="http://206.189.144.207/shop?id=7"><img class="tabbar-item-icon" src="{{asset('img/categories.png')}}" alt=""><span class="d-block" style="font-size: 10px">Categories</span></a>
        <a class="text-center" href="{{route('cart.index')}}"><img class="tabbar-item-icon" src="{{asset('img/cart.png')}}" alt="">
            @guest @else @if(Auth::user()->cart()->select('user_id','product_id')->where('sold',0)->count() > 0)
            <span class="search-cart__circle">{{Auth::user()->cart()->select('user_id','product_id')->where('sold',0)->count()}}</span> @endif @endguest
            <span class="d-block" style="font-size: 10px">Cart</span></a>
        <a class="text-center" href="{{route('profile.index')}}"><img class="tabbar-item-icon" src="{{asset('img/user.png')}}" alt=""><span class="d-block" style="font-size: 10px">Account</span></a>

    </div>
</nav>
@endsection


@section('script')
<script>
    $('.table tbody tr').click(function(event) {
        if (event.target.type !== 'radio') {
            $(':radio', this).trigger('click');
        }
    });


    $(document).on("click", ".editAddressModal", function(e) {

        var eventId = $(this).data('id');

        var url = `{{route('/')}}` + '/address/' + eventId + '/edit';



        $.ajax({
            type: 'GET',
            url: url,
            data: {
                '_token': '<?php echo csrf_token() ?>',

            },
            success: function(data) {
                $('#myModal2').modal('show');
                $("#modal-edit-address").html(data);

            },
            error: function(data) {
                // alert('error');
                // alert(JSON.stringify(data));
            }
        });
    });



    $(document).on("click", ".changeAddress", function(e) {

        var eventId = $(this).data('id');
        var courierId = $(this).data('courier');

        var url = `{{route('courier')}}`;

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'vendor_id': eventId,
                'courier_id': courierId,
                'address_id': `{{isset($address) ? $address->id : null}}`,
                'voucher_id': `{{isset($voucher) ? $voucher->unique_code : null}}`,
                'courier': `{{isset($courier) ? $courier : null}}`,

            },
            success: function(data) {

                // console.log(data)
                $('#changeshipping').modal('show');
                $("#modal-courier-list").html(data);

            },
            error: function(data) {
                // console.log(data)
                // alert('error');
                // alert(JSON.stringify(data));
            }
        });
    });
</script>

<script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

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