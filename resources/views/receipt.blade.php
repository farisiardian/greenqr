<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LifeCare - Order Confirmation</title>

    <link rel="icon" href="{{asset('img/Icon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>

@if($order->auth_code == '00')
<!--================Order Details Area =================-->
<section class="order_details section-margin--small">
    <div class="container">
        <h2 class="text-center billing-alert" style="font-family: 'Nunito', sans-serif;color:#293A8B;">Thank you. Your order has been received.</h2>
        <div class="row mb-5 d-flex justify-content-center">
            <div class="col-md-6 col-xl-6 mb-6 mb-xl-0">
                <div class="confirmation-card ">
                    <h3 class="billing-title">Order Info</h3>
                    <table class="order-rable">
                        <tr>
                            <td style="color: black">Order number</td>
                            <td  style="color: black">: {{$order->txn_id}}</td>
                        </tr>
                        <tr>
                            <td style="color: black">Total</td>
                            <td  style="color: black">: RM{{number_format($order->amount,2)}}</td>
                        </tr>
                        <tr>
                            <td style="color: black">Payment method</td>
                            <td  style="color: black">: FPX Online Banking</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mb-5 d-flex justify-content-center">
            <a href="{{route('/')}}" class="button button--active button-pay">Back to Home</a>

        </div>
    </div>
</section>
<!--================End Order Details Area =================-->
@else
    <section class="order_details section-margin--small">
        <div class="container" >
            <h2 class="text-center mb-3" style="font-family: 'Nunito', sans-serif;color:#293A8B;">Payment Failed</h2>
            <p class="text-center mb-5" style="font-family: 'Nunito', sans-serif">Your transaction has failed due to some technical error. Please try again.</p>
            <div class="row mb-5 d-flex justify-content-center">
                <a href="{{route('/')}}" class="button button--active button-pay">Home</a>

            </div>
        </div>
    </section>
@endif






<script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendors/skrollr.min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('vendors/mail-script.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>




