@extends('layouts.app')

@section('content')
    <!-- The Modal Add Address -->
    <div class="modal" id="addAddress" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Address</h4>
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
                                {{--                                <input type="text" class="form-control" name="state" id="state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'">--}}
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <input type="text" class="form-control" id="unitno" placeholder="Unit No (Optional)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Unit No (Optional)'">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group row">--}}
                        {{--                            <label class="col-md-3">Label as :</label>--}}
                        {{--                            <div class="col-md-9">--}}
                        {{--                                <div class="input-group">--}}
                        {{--                                    <div class="d-inline-block custom-control custom-radio mr-1">--}}
                        {{--                                        <input type="radio" name="customer1" class="custom-control-input" checked id="yes">--}}
                        {{--                                        <label class="custom-control-label" for="yes">Home</label>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="d-inline-block custom-control custom-radio">--}}
                        {{--                                        <input type="radio" name="customer1" class="custom-control-input" id="no">--}}
                        {{--                                        <label class="custom-control-label" for="no">Work</label>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Shipping Option</h5>
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
                    <h4 class="modal-title">My Address</h4>
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
                                <input type="hidden" name="voucher" value="{{isset($voucher) ? $voucher->unique_code : null}}"/>

                                @foreach($addresslist as $addresslists)
                                    <tr>
                                        <td>
                                            <input type="radio" name="address" value="{{$addresslists->id}}" @if(isset($address) && $address->id == $addresslists->id) checked @endif/>
                                        </td>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <p><strong>{{$addresslists->name}}</strong></p>
                                                </div>
                                                <div class="">
                                                    <p>{{$addresslists->phone}}</p>
                                                </div>
                                            </div>
                                            <p>{{$addresslists->address}} {{$addresslists->postalcode}} {{$addresslists->city}},
                                                {{$addresslists->state}} </p>
                                        </td>
                                        <td> <a data-toggle="modal" href="#"  data-target="#myModal2" data-id="{{$addresslists->id}}" class="editAddressModal">Edit</a></td>
                                    </tr>
                                @endforeach
                                {{--                            <tr>--}}
                                {{--                                <td>--}}
                                {{--                                    <input type="radio" name="radios" id="radio2" />--}}
                                {{--                                </td>--}}
                                {{--                                <td><div class="media">--}}
                                {{--                                        <div class="d-flex">--}}
                                {{--                                            <p><strong>Aqilah Ahmad</strong></p>--}}
                                {{--                                        </div>--}}
                                {{--                                        <div class="">--}}
                                {{--                                            <p>(+60) 135123555</p>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                    <p>159 Taman Mawar, Jalan Gangsa 05150 Alor Setar, Kedah</p></td>--}}
                                {{--                                <td><a href="">Edit</a></td>--}}
                                {{--                            </tr>--}}
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>

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
                    <h4 class="modal-title">Edit Address</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div><div class="container"></div>
                <div id="modal-edit-address">

                </div>
            </div>
        </div>
    </div>
    <!-- End Second Modal  -->
    <!--================Checkout Area =================-->
    <section class="checkout_area section-margin--small">
        <div class="container">
            <div class="returning_customer">
                <div class="check_title">
                    <h2> <i class="ti-location-pin"></i> Delivery Address</h2>
                </div>
                <p>  @include('error') </p>
                @if(isset($address))
                    <p>{{$address->name}}  ({{$address->phone}})</p>
                    <p>{{$address->address}}, {{$address->postalcode}} {{$address->city}}, {{$address->state}}. <a href="#" data-toggle="modal" data-target="#changeaddress">Change</a></p>
                @else

                    <p> <a class="btn btn-outline-primary" data-toggle="modal" data-target="#addAddress">Add Address</a></p>
                @endif
            </div>
            <div class="cupon_area">
                <div class="check_title">
                    <h2>Your Order</h2>
                </div>
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" >Products Ordered</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Item Subtotal</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($total = 0)
                            @php($mtotal = 0)
                            @php($mtotal2 = 0)
                            @php($stotal = 0)
                            @php($vtotal = 0)
                            @foreach($cart as $key => $cart2)
                                @php($mtotal2 = 0)
                                @foreach($cart2 as $carts)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    @if(isset($carts->productImage[0]))
                                                        <img src="{{asset('storage/'.$carts->productImage[0]->image)}}" class="img-fluid" alt="" width="80px" height="80px">
                                                    @endif
                                                </div>
                                                <div class="media-body">
                                                    <p>{{isset($carts->product) ? $carts->product->name : ''}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>RM {{isset($carts->product) ? $carts->product->list_price_on_store : ''}}</h5>
                                        </td>
                                        <td>
                                            {{$carts->quantity}}
                                        </td>
                                        <td>
                                            <h5>RM {{isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : ''}}</h5>
                                            @php($mtotal2 += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)
                                            @php($mtotal += isset($carts->product) ? $carts->product->list_price_on_store*$carts->quantity : 0)

                                            @if(isset($voucher) && isset($carts->product) && $voucher->product_id == $carts->product->id && $voucher->unit_value == 'RM')
                                                @php($vtotal = $voucher->capped > 0 && $voucher->capped < $voucher->value ? $voucher->capped  : $voucher->value)

                                            @elseif(isset($voucher) && isset($carts->product) && $voucher->product_id == $carts->product->id && $voucher->unit_value == '%')
                                                @php($value =  $carts->product->list_price_on_store*$carts->quantity*$voucher->value/100)
                                                @php($vtotal = $voucher->capped > 0 && $voucher->capped < $value ? $voucher->capped  : $value)

                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between"><span style="color:#384aeb" class="col-lg">Shipping Option:</span>
                                            <span style="color:#000000" class="col-lg"><strong>{{$cart2->shipping != null ? $cart2->shipping->courierName:'No Shipping'}}</strong><br
                                                @if($cart2->shipping != null)<small style="color:#888" >{{$cart2->shipping != null ? $cart2->shipping->receiveBy : ''}}</small> @endif </span></div>

                                    </td>
                                    <td><a href="" data-toggle="modal" data-id="{{$key}}" data-courier="{{$cart2->shipping != null ? $cart2->shipping->id : null}}" data-target="#changeshipping" class="changeAddress">CHANGE</a></td>
                                    <td>RM{{$cart2->shipping != null && $cart2->shipping->price > 0 ? $cart2->shipping->price:'0.00'}}</td>
                                    @php($stotal += $cart2->shipping != null ? $cart2->shipping->price : 0.00)
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Order Total ({{count($cart2)}} Item):</td>
                                    <td><h5>RM {{$mtotal2 + ($cart2->shipping != null ? $cart2->shipping->price : 0.00)}}</h5></td>
                                </tr>
                            @endforeach
                            {{--                            <tr>--}}
                            {{--                                <td>--}}
                            {{--                                    <div class="media">--}}
                            {{--                                        <div class="d-flex">--}}
                            {{--                                            <img src="{{asset('img/product/p2.jpg')}}" alt="" width="80px" height="80px">--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="media-body">--}}
                            {{--                                            <p>Legalon 140mg (100’s)</p>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </td>--}}
                            {{--                                <td>--}}
                            {{--                                    <h5>RM 150.00</h5>--}}
                            {{--                                </td>--}}
                            {{--                                <td>--}}
                            {{--                                    1--}}
                            {{--                                </td>--}}
                            {{--                                <td>--}}
                            {{--                                    <h5>RM150.00</h5>--}}
                            {{--                                </td>--}}

                            {{--                            </tr>--}}
                            {{--                            <tr>--}}
                            {{--                                <td>--}}
                            {{--                                    <div class="media">--}}
                            {{--                                        <div class="d-flex">--}}
                            {{--                                            <img src="{{asset('img/product/p3.jpg')}}" alt="" width="80px" height="80px">--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="media-body">--}}
                            {{--                                            <p>Minimalistic shop for multipurpose use</p>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </td>--}}
                            {{--                                <td>--}}
                            {{--                                    <h5>RM 150.00</h5>--}}
                            {{--                                </td>--}}
                            {{--                                <td>--}}
                            {{--                                    1--}}
                            {{--                                </td>--}}
                            {{--                                <td>--}}
                            {{--                                    <h5>RM150.00</h5>--}}
                            {{--                                </td>--}}

                            {{--                            </tr>--}}



                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cupon_area">

                            <div class="check_title">
                                <h2>Have a Vourcher?</h2>
                            </div>

                            @if(isset($voucher))
                                <div class="row no-gutters">
                                    <div class="col-md-4 border-right">
                                        <div class="d-flex flex-column align-items-center" style="margin-top:20px;">
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
                            @endif
                            <form method="get" action="{{route('checkout.index')}}">
                                <div class="d-flex align-items-center">
                                    <input type="hidden" name="address" value="{{isset($address) ? $address->id : null}}"/>
                                    <input type="hidden" name="courier" value="{{isset($courier) ? $courier : null}}" />
                                    <input type="text" class="mr-2" name="voucher" placeholder="Enter vourcher code">
                                    <button type="submit" value="submit" class="button button-login">Apply</button>
                                </div>
                            </form>
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
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="returning_customer">
                            <div class="check_title">
                                <h2> <i class="ti-wallet"></i> Payment Method</h2>
                            </div>

                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" checked >
                                    <label for="f-option6">Online Banking </label>
                                    <img src="{{asset('img/product/card.jpg')}}" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                    account.</p>
                            </div>

                        </div>

                    </div>
                </div>
            <form method="POST" action="{{route('payment')}}">
                @csrf
                <div class="KqH1Px">
                    <div class="lhwDvd Exv9ow c5Dezq">Merchandise Subtotal:</div>
                    <div class="lhwDvd Uu2y3K c5Dezq">RM{{$mtotal}}</div>
                    <div class="lhwDvd Exv9ow B6k-vE">Shipping Total:</div>
                    <div class="lhwDvd Uu2y3K B6k-vE">RM{{$stotal}}</div>
                    <div class="lhwDvd Exv9ow D6k-vE ">Vourcher Total:</div>
                    <div class="lhwDvd Uu2y3K D6k-vE">-RM {{$vtotal}}</div>
                    <div class="lhwDvd Exv9ow A4gPS6">Total Payment:</div>
                    <div class="lhwDvd +0tdvp Uu2y3K A4gPS6">RM{{$total + $mtotal + $stotal - $vtotal}}</div>
                    <div class="Ql2fz0">
                        <div class="FXKjae">
                            <div class="creat_account">
                                <input type="checkbox" name="term"  required>
                                <label for="f-option4">I’ve read and accept the </label>
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
                        <button type="submit" class="button button--active button-pay">Place Order</button>

                    </div>
                </div>

            </form>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection
@section('script')
    <script>
        $('.table tbody tr').click(function(event) {
            if (event.target.type !== 'radio') {
                $(':radio', this).trigger('click');
            }
        });


        $(document).on("click", ".editAddressModal", function (e) {

            var eventId = $(this).data('id');

            var url = `{{route('/')}}` + '/address/' + eventId + '/edit';



            $.ajax({
                type:'GET',
                url:url ,
                data: {
                    '_token' : '<?php echo csrf_token() ?>',

                },
                success:function(data){
                    $('#myModal2').modal('show');
                    $("#modal-edit-address").html(data);

                },
                error:function(data){
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
        });



        $(document).on("click", ".changeAddress", function (e) {

            var eventId = $(this).data('id');
            var courierId = $(this).data('courier');

            var url = `{{route('courier')}}`;

            $.ajax({
                type:'POST',
                url:url ,
                data: {
                    '_token' : '<?php echo csrf_token() ?>',
                    'vendor_id' : eventId,
                    'courier_id' : courierId,
                    'address_id' : `{{isset($address) ? $address->id : null}}`,
                    'voucher_id' : `{{isset($voucher) ? $voucher->unique_code : null}}`,
                    'courier' : `{{isset($courier) ? $courier : null}}`,

                },
                success:function(data){

                    // console.log(data)
                    $('#changeshipping').modal('show');
                    $("#modal-courier-list").html(data);

                },
                error:function(data){
                    // console.log(data)
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
        });



    </script>
@endsection
