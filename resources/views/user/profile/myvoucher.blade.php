@extends('layouts.app')

@section('addstyle')
    <style>
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
    </style>
@endsection

@section('content')

	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
    <!--================Desktop Area =================-->
    <section class="setting-area d-none d-xl-block">
        <div class="container">
            <div class="row">

                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="comment-vourcher">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;"><b>My Vouchers</b></h4>
                        <hr>
                        <div class="mt-3">
                            <div class="row">
                                @foreach($voucher as $vouchers)
                                    <div class="col-md-6">
                                        <div class="coupon p-2 bg-white border">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 border-right d-flex justify-content-center align-items-center">
                                                    <div class="text-center">
                                                        <h2 style="color:#274439"> @if($vouchers->unit_value == 'RM') RM @endif {{number_format($vouchers->value,'0','.',',')}} @if($vouchers->unit_value == '%') % @endif </h2>
                                                        <span style="color:#1FA33D">DISCOUNT</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div>
                                                        <div class="d-flex flex-row justify-content-end off">
															 <span class="px-2 rounded code" style="color:#274439"><a href="#" onclick="copyVoucherCode(this)" class="voucher-code" style="color:#1FA33D">{{$vouchers->unique_code}}</a></span>
                                                        </div>
                                                        <div class="p-2">
                                                            <span style="color:#274439">@if($vouchers->unit_value == 'RM') RM @endif {{number_format($vouchers->value,'0','.',',')}} @if($vouchers->unit_value == '%') % @endif discount</span>
                                                            @if($vouchers->capped > 0) 
																<span style="color:#274439">Capped at RM{{$vouchers->capped}}</span> @endif
                                                            {{--<span>Min. Spend RM0 Capped at 5,000 Coins</span>--}}
                                                            <p><small style="color:#274439">Valid till : {{\Carbon\Carbon::parse($vouchers->end_at)->isoFormat('DD-MM-YYYY hh:mm:ss A')}}</small></p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-end off">
                                                            {{--                                                        <span><a href="#">T&C</a></span>--}}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>


                    </div>

                    <div class="comment-vourcher">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;"><b>Recommended Voucher</b></h4>

                        <hr>
                        <div class="mt-3">
                            <div class="row">
                                @foreach($pVoucher as $pVouchers)
                                    <div class="col-md-6 mt-3">
                                        <div class="coupon px-2 py-2 bg-white border">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 border-right d-flex align-items-center justify-content-center">
                                                    @if($pVouchers->productImage)
                                                        <img src="{{asset('storage/'.$pVouchers->productImage->image)}}" class="img-fluid" alt=""  width="90px" height="90px">
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row no-gutters">

                                                        <div class="col-md-8 p-2 border-right">
                                                            <span style="color:#274439">{{$pVouchers->name}}</span>
                                                            <p style="color:#274439"><strong>RM {{ $pVouchers->list_price_on_store }}</strong> </p>
                                                            <small><span class="px-3 py-2 rounded code"><a href="#" onclick="copyVoucherCode(this)" class="voucher-code" style="color:#1FA33D">{{$pVouchers->unique_code}}</a></span></small>
                                                        </div>
                                                        <div class="col-md-4 p-2 align-items-center text-center">
                                                            <span style="color:#274439">@if($pVouchers->unit_value == 'RM') RM @endif {{number_format($pVouchers->value,'0','.',',')}} @if($pVouchers->unit_value == '%') % @endif off</span>
                                                            <small style="color:#274439"> @if($pVouchers->capped > 0) <span>Capped at RM{{$pVouchers->capped}}</span> @endif</small>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>

	<!--================Tab Area =================-->
    <section class="setting-area d-none d-sm-block d-xl-none">
        <div class="container">
            <div class="row">

                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="comment-vourcher">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;"><b>My Vouchers</b></h4>
                        <hr>
                        <div class="mt-3">
                            <div class="row">
                                @foreach($voucher as $vouchers)
                                    <div class="col-md-6">
                                        <div class="coupon p-2 bg-white border">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 border-right d-flex justify-content-center align-items-center">
                                                    <div class="text-center">
                                                        <h2 style="color:#274439"> @if($vouchers->unit_value == 'RM') RM @endif {{number_format($vouchers->value,'0','.',',')}} @if($vouchers->unit_value == '%') % @endif </h2>
                                                        <span style="color:#1FA33D">DISCOUNT</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div>
                                                        <div class="d-flex flex-row justify-content-end off">
															 <span class="px-2 rounded code" style="color:#274439"><a href="#" onclick="copyVoucherCode(this)" class="voucher-code" style="color:#1FA33D">{{$vouchers->unique_code}}</a></span>
                                                        </div>
                                                        <div class="p-2">
                                                            <span style="color:#274439">@if($vouchers->unit_value == 'RM') RM @endif {{number_format($vouchers->value,'0','.',',')}} @if($vouchers->unit_value == '%') % @endif discount</span>
                                                            @if($vouchers->capped > 0) 
																<span style="color:#274439">Capped at RM{{$vouchers->capped}}</span> @endif
                                                            {{--<span>Min. Spend RM0 Capped at 5,000 Coins</span>--}}
                                                            <p><small style="color:#274439">Valid till : {{\Carbon\Carbon::parse($vouchers->end_at)->isoFormat('DD-MM-YYYY hh:mm:ss A')}}</small></p>
                                                        </div>
                                                        <div class="d-flex flex-row justify-content-end off">
                                                            {{--                                                        <span><a href="#">T&C</a></span>--}}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>


                    </div>

                    <div class="comment-vourcher">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;"><b>Recommended Voucher</b></h4>

                        <hr>
                        <div class="mt-3">
                            <div class="row">
                                @foreach($pVoucher as $pVouchers)
                                    <div class="col-md-6 mt-3">
                                        <div class="coupon px-2 py-2 bg-white border">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 border-right d-flex align-items-center justify-content-center">
                                                    @if($pVouchers->productImage)
                                                        <img src="{{asset('storage/'.$pVouchers->productImage->image)}}" class="img-fluid" alt=""  width="90px" height="90px">
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row no-gutters">

                                                        <div class="col-md-8 p-2 border-right">
                                                            <span style="color:#274439">{{$pVouchers->name}}</span>
                                                            <p style="color:#274439"><strong>RM {{ $pVouchers->list_price_on_store }}</strong> </p>
                                                            <small><span class="px-3 py-2 rounded code"><a href="#" onclick="copyVoucherCode(this)" class="voucher-code" style="color:#1FA33D">{{$pVouchers->unique_code}}</a></span></small>
                                                        </div>
                                                        <div class="col-md-4 p-2 align-items-center text-center">
                                                            <span style="color:#274439">@if($pVouchers->unit_value == 'RM') RM @endif {{number_format($pVouchers->value,'0','.',',')}} @if($pVouchers->unit_value == '%') % @endif off</span>
                                                            <small style="color:#274439"> @if($pVouchers->capped > 0) <span>Capped at RM{{$pVouchers->capped}}</span> @endif</small>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>


    <!--================Mobile Area =================-->
    <section class="setting-area d-block d-sm-none">
        <div class="container">
            <div class="row">

                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="comment-vourcher">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;">My Vouchers</h4>
                        <hr>
                        <div class="mt-3">
                            <div class="row d-flex justify-content-center">
                                @foreach($voucher as $vouchers)
                                    <div class="mb-3">
                                        <div class="coupon p-3 bg-white border" style="width: 315px">
                                            <div class="row border-bottom d-flex justify-content-between px-3 pb-2">
                                                <div class="col text-center">
                                                    <div>
                                                        <h2 style="color:#274439"> @if($vouchers->unit_value == 'RM') RM @endif {{number_format($vouchers->value,'0','.',',')}} @if($vouchers->unit_value == '%') % @endif </h2>
                                                    </div>
                                                    <div>
                                                        <span>DISCOUNT</span>
                                                    </div>

                                                </div>
                                                <div class="col d-flex justify-content-end align-items-center" style="color:#1FA33D">
                                                    <small><span class="px-3 py-2 rounded code" style="color:#1FA33D"><a  href="#" onclick="copyVoucherCode(this)" style="color:#1FA33D">{{$vouchers->unique_code}}</a></span></small>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="p-2 text-center">
                                                    <div>
                                                        <span>@if($vouchers->unit_value == 'RM') RM @endif {{number_format($vouchers->value,'0','.',',')}} @if($vouchers->unit_value == '%') % @endif discount</span>
                                                        @if($vouchers->capped > 0) <span>Capped at RM{{$vouchers->capped}}</span> @endif
                                                    </div>
                                                    {{--                                                        <span>Min. Spend RM0 Capped at 5,000 Coins</span>--}}
                                                    <div>
                                                        <span class="small">Valid till : {{\Carbon\Carbon::parse($vouchers->end_at)->isoFormat('DD-MM-YYYY hh:mm:ss A')}}</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{--                                <div class="col-md-6">--}}
                                {{--                                    <div class="coupon p-3 bg-white border">--}}
                                {{--                                        <div class="row no-gutters">--}}
                                {{--                                            <div class="col-md-4 border-right">--}}
                                {{--                                                <div class="d-flex flex-column align-items-center" style="margin-top:20px;">--}}
                                {{--                                                    <h1>50%</h1>--}}
                                {{--                                                    <span>CASHBACK</span>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="col-md-8">--}}
                                {{--                                                <div>--}}
                                {{--                                                    <div class="d-flex flex-row justify-content-end off">--}}
                                {{--                                                        <span><a href="#">CLAIM</a></span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="p-2">--}}
                                {{--                                                        <span>10% coins cashback</span>--}}
                                {{--                                                        <span>Min. Spend RM0 Capped at 5,000 Coins</span>--}}
                                {{--                                                        <span>Valid till : 30.10.2022</span>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="d-flex flex-row justify-content-end off">--}}
                                {{--                                                        <span><a href="#">T&C</a></span>--}}
                                {{--                                                    </div>--}}

                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>

                        </div>


                    </div>

                    <div class="comment-vourcher">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">Recommended Voucher</h4>

                        <hr>
                        <div class="mt-3">
                            <div class="row">
                                @foreach($pVoucher as $pVouchers)
                                    <div class="mb-3">
                                        <div class="coupon p-3 bg-white border">
                                            <div class="row border-bottom d-flex justify-content-between align-items-center py-3">
                                                <div class="col">
                                                    <div class="d-flex flex-column align-items-center">
                                                        @if($pVouchers->productImage)
                                                            <img src="{{asset('storage/'.$pVouchers->productImage->image)}}" class="img-fluid" alt="" >
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div>
                                                        <span style="color:#274439">{{$pVouchers->name}}</span>
                                                        <p style="color:#274439"><strong>RM {{ $pVouchers->list_price_on_store }}</strong> </p>
                                                        <small><span class="px-3 py-2 rounded code"><a href="#" onclick="copyVoucherCode(this)" class="voucher-code" style="color:#1FA33D">{{$pVouchers->unique_code}}</a></span></small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="p-2 align-items-center d-flex justify-content-between text-center">
                                                    <span style="color:#274439">@if($pVouchers->unit_value == 'RM') RM @endif {{number_format($pVouchers->value,'0','.',',')}} @if($pVouchers->unit_value == '%') % @endif off</span>
                                                    <small style="color:#274439"> @if($pVouchers->capped > 0) <span>Capped at RM{{$pVouchers->capped}}</span> @endif</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{--                                <div class="col-md-6">--}}
                                {{--                                    <div class="coupon p-3 bg-white border">--}}
                                {{--                                        <div class="row no-gutters">--}}
                                {{--                                            <div class="col-md-4 border-right">--}}
                                {{--                                                <div class="d-flex flex-column align-items-center" style="margin-top:20px;">--}}
                                {{--                                                    <img src="img/product/p1.jpg" alt=""  width="80px" height="80px">--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                            <div class="col-md-8">--}}
                                {{--                                                <div class="row no-gutters">--}}

                                {{--                                                    <div class="col-md-8 p-2 border-right">--}}
                                {{--                                                        <span>Iberet Folic 500 (30’s)</span>--}}
                                {{--                                                        <p><strong>RM 100.00</strong> </p>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="col-md-4 p-2 align-items-center text-center">--}}
                                {{--                                                        <span>20% off</span>--}}
                                {{--                                                        <small><span>Min. Spend RM2.5</span></small>--}}
                                {{--                                                        <span class="border px-3 rounded code">Claim</span>--}}
                                {{--                                                    </div>--}}

                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>
	
    <!--================Blog Area =================-->
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('vendors/nice-select/jquery.nice-select.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<!-- any other scripts you may have -->
<script>
function copyVoucherCode(element) {
    // Get the voucher code text from the clicked element
    var voucherCodeText = element.textContent.trim();

    // Create a temporary input element
    var input = document.createElement('input');
    input.setAttribute('type', 'text');
    input.setAttribute('value', voucherCodeText);
    input.style.position = 'absolute';
    input.style.left = '-9999px';

    // Add the temporary input element to the document
    document.body.appendChild(input);

    // Select the text inside the temporary input element
    input.select();

    // Copy the selected text to the clipboard
    document.execCommand('copy');

    // Remove the temporary input element from the document
    document.body.removeChild(input);

    // Show a notification to the user
    alert('Voucher code copied to clipboard: ' + voucherCodeText);
}

// Select all voucher links with class "voucher-code"
var voucherLinks = document.querySelectorAll('.voucher-code');

// Add a click event listener to each voucher link
for (var i = 0; i < voucherLinks.length; i++) {
    voucherLinks[i].addEventListener('click', function(event) {
        event.preventDefault(); // prevent the link from navigating
        copyVoucherCode(this); // pass the clicked element to the copyVoucherCode function
    });
}

</script>
<script>
    function PreviouscopyVoucherCode() {
        // Get the voucher code element
        var voucherCodeElement = document.getElementById('voucher-code');
		 console.log(voucherCodeElement);

        // Get the voucher code text
        var voucherCodeText = voucherCodeElement.textContent.trim();

        // Create a temporary input element
        var input = document.createElement('input');
        input.setAttribute('type', 'text');
        input.setAttribute('value', voucherCodeText);
        input.style.position = 'absolute';
        input.style.left = '-9999px';

        // Add the temporary input element to the document
        document.body.appendChild(input);

        // Select the text inside the temporary input element
        input.select();

        // Copy the selected text to the clipboard
        document.execCommand('copy');

        // Remove the temporary input element from the documentsfssadsads
        document.body.removeChild(input);

        // Show a notification to the user
        alert('Voucher code copied to clipboard: ' + voucherCodeText);
    }
</script>