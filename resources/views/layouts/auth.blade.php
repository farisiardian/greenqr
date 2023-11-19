<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GreenQr - Login</title>
    <link rel="icon" href="{{asset('img/greenqr-icon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/nouislider/nouislider.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <style>
	.main-container1{
	overflow: scroll;
	overflow-x:hidden;
	-webkit-overflow-scrolling: touch;
	height:100%
	}
		
        @media (min-width: 991px) {
            .headersign {
                padding: 32px 0px;
            }

            .section-margin-login {
                margin: 35px 0
            }

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
.login_box_area .login_box_img:before {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    content: "";
    background: url('../img/login_background.png') !important;
    background-size: cover !important;
    background-repeat: no-repeat  !important;
    background-position: center center  !important;
    opacity:none !important;
}

.transparent-login-box{
 background: radial-gradient(100% 359.18% at 0% 0%,
 rgba(255, 255, 255, 0.6) 0%, 
 rgba(255, 255, 255, 0.2) 100%) /* warning: gradient uses a rotation that is not supported by CSS and may not behave as expected */;
 box-shadow: 0px 20px 40px rgba(0, 0, 0, 0.1);
 backdrop-filter: blur(15px);
 /* Note: backdrop-filter has minimal browser support */
 border-radius: 20px;
}

.button-account{
    padding:7px 42px;
    background:transparent;
    border-color:#1FA33D;
    color: #fff!important;
}
.button-account::hover{
    border-color:#1FA33D !important
}
.login_box_area .login_box_img .button:hover {
	background: #274439 !important;
	color: #fff !important;
	border-color: #c5322d !important
}
.footer-bottom {
    background: #ffffff;
    padding: 32px;
}
.footer-bottom {
	background: #ffffff !important;
	padding: 32px
}

    </style>
</head>
<body>

<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h hover-black" href="{{route('/')}}"><img src="{{asset('img/greenQR_brand.png')}}" alt=""  height="80px"> </a>

                <a class="hover-black headersign" href="" style="color:#1FA33D">Need help?</a>
            </div>
        </nav>

    </div>
</header>
@yield('content')

<!--================ Start footer Area  =================-->
<footer class="footer">
    <div class="footer-area" style="background-color:#274439">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-4 col-md-6 col-sm-6 ">
                    <div class="single-footer-widget tp_widgets">
						<div class="col-lg-2 col-md-2 col-sm-8">
							<a class="navbar-brand logo_h " href="{{route('/')}}"><img src="../../img/footer.png" alt=""  height="40px"></a>
						</div>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-map-pin" style="background-color:#1FA33D"></span>
                                The Vertical Corporate Office, Bangsar South
                            </p>
                        </div>

                    </div>
                </div>
                <!--div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
					<h4 class="footer_title">Company</h4>
                        <ul class="list">
                            <li><a href="https://lifecarediagnostic.com/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class=	"text-white">Medical Centre</a></li>
                            <li><a href="https://lifecare.com.my/coming-soon/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Boutique Specialist Hospital</a></li>
                                <li><a href="https://lifecare.com.my/wellness/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Wellness</a></li>
                                <li><a href="https://lifecare.com.my/well-being/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Well-Being</a></li>
                                <li><a href="https://lifecare.com.my/special-care/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Special Care</a></li>
                                <li><a href="#" class="text-white">LifeCare Hub</a>
							</li>

                        </ul>
                    </div>
                </div-->
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
					<h4 class="footer_title">Company</h4>
                        <ul class="list">
							<li><a class="text-white" href="https://greenqr.co/">About Us</a></li>
								<li><a class="text-white" href="https://greenqr.co/contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
				<div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
					<h4 class="footer_title">Support</h4>
                        <ul class="list">
                                <li><a class="text-white" href="{{route('faq')}}">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                {{--<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">FAQ</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-clock"></span>
                                Opening Hours
                            </p>
                            <p>
                                Monday – Friday: 08.00 – 17.00 <br>
                                Saturday: 08.00 – 13.00 <br>
                                Sunday & Public Holidays: Closed </p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Phone Number
                            </p>
                            <p>
                                03-2241 3610
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                info@lifecare.com.my
                            </p>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row d-flex">
                <p class="col-lg-12 footer-text text-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    &copy;<script>document.write(new Date().getFullYear());</script> 2023 Copyright GreenQr. All Rights Reserved </p>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->


<script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendors/skrollr.min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('vendors/mail-script.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

@yield('script')
</body>
</html>
