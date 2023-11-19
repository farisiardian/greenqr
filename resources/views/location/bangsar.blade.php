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
			bottom: 80px;
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


	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="blog">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center ">
                    <h1>Wisma LifeCare</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Your One-Stop Health Hub</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Blog Categorie Area =================-->
    <section class="p-5">
        <div class="container">
            <div class="card-deck">
                <div class="card ">
                    <div class="card-body location-blog">

                        <div class="blog_details">
                            <a href="#">
                                <h2>Exciting Location</h2>
                            </a>
                            <p>Our healthcare hub is homed at the highly strategic Bangsar South Business District – sitting between the bustling Kuala Lumpur City Center and the slightly more affluent neighborhood of Bangsar. We are encircled by an array of businesses, professional services as well as abundance of dining choices and needless say, multiple access via main highways and public transports.</p>
                        </div>

                    </div>
                </div>
                <div class="card">
                    <div class="card-body location-blog">


                        <div class="blog_details">
                            <a href="#">
                                <h2>Multi-Disciplinary Specialists</h2>
                            </a>
                            <p>Wisma LifeCare has more than 20 specialists clinics – each providing professional preventive, specific treatment, curative or even rehabilitative healthcare services.</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!-- ================ enquiry section start ================= -->
    <section class="pb-60px">
        <div class="container">
            <div class="section-intro pb-60px text-center">
                <h2><span class="section-intro__style">Directory</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/directory/arthro.jpg')}}" alt="">

                    </div>
                    <div class="card-body">
                        <p>Orthopaedic</p>
                        <h4 class="card-product__title"><a href="#">Arthro Associates</a></h4>
                        <p class="card-product__price">Level G</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/directory/bone-n-joint.jpg')}}" alt="">

                    </div>
                    <div class="card-body">
                        <p>Orthopedic Osteocare of TCM	</p>
                        <h4 class="card-product__title"><a href="#">Bone & Joint TCM Clinic</a></h4>
                        <p class="card-product__price">Level G</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/directory/eden-clinic.jpg')}}" alt="">

                    </div>
                    <div class="card-body">
                        <p>Aesthetic</p>
                        <h4 class="card-product__title"><a href="">Eden Clinic</a></h4>
                        <p class="card-product__price">Level G</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/directory/guguanjie-sdn-bhd.jpg')}}" alt="">

                    </div>
                    <div class="card-body">
                        <p>Physiotherapy</p>
                        <h4 class="card-product__title"><a href="#">Guguanjie Sdn Bhd</a></h4>
                        <p class="card-product__price">Level G</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/directory/lifecare-logo-300x226-1.png')}}" alt="">

                    </div>
                    <div class="card-body">
                        <p>Services</p>
                        <h4 class="card-product__title"><a href="#">Parking Office</a></h4>
                        <p class="card-product__price">Level B1</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/directory/relive-ecp-centre.jpg')}}" alt="">

                    </div>
                    <div class="card-body">
                        <p>Blood Circulation Therapy</p>
                        <h4 class="card-product__title"><a href="#">ReLive ECP Centre</a></h4>
                        <p class="card-product__price">Level G</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/directory/vista-eye.jpg')}}" alt="">
                    </div>
                    <div class="card-body">
                        <p>Eye Care</p>
                        <h4 class="card-product__title"><a href="#">VISTA Eye Specialist (VISTA)</a></h4>
                        <p class="card-product__price">$150.00</p>
                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/directory/subway.jpg')}}" alt="">
                        <ul class="card-product__imgOverlay">
                            <li><button><i class="ti-search"></i></button></li>
                            <li><button><i class="ti-shopping-cart"></i></button></li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <p>Food & Beverages</p>
                        <h4 class="card-product__title"><a href="#">Subway Lifecare Sunshine Subs</a></h4>
                        <p class="card-product__price">Level G</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ enquiry section end ================= -->
    <section class="enquiry pb-60px" >
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <img class="img-fluid" src="{{asset('img/bangsar.png')}}" alt="">
                </div>
                <div class="col-xl-5">
                    <div class="enquiry-content">
                        <h3>Leasing Enquiry</h3>
                        <ul>
                            <li>
                                <p><span class="fa fa-map-pin"></span> LifeCare, Bangsar South</p>
                            </li>
                            <li>
                                <p> <span class="fa fa-map-pin"></span> LifeCare, Cheras South</p>
                            </li>
                            <li>
                                <p> <span class="fa fa-map-pin"></span> LifeCare DK Mall, SS2</p>
                            </li>
                        </ul>
                        <a class="button button--active mt-3 mt-xl-4" href="#">ENQUIRE NOW</a>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section class="pb-60px">
        <div class="container">
            <div class="section-intro pb-60px text-center">
                <h2><span class="section-intro__style">Nearby Essential Services & Attractions</span></h2>
            </div>

            <div class="card-deck">
{{--                <div class="col-lg-6 mt-3">--}}
                    <div class="card">
                        <div class="card-body">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper">
                                    <img class="" src="{{asset('img/gallery/parking.png')}}" alt="" width="80px" height="80px">
                                </div>
                                <div class="ml-5">
                                    <h5 class="card-title">Parking</h5>
                                    <ul>
                                        <li><i class="fa fa-car" aria-hidden="true"></i> Wisma LifeCare </li>
                                        <li><i class="fa fa-car" aria-hidden="true"></i> Invito Hotel – 1 min </li>
                                        <li><i class="fa fa-car" aria-hidden="true"></i> Nexus Bangsar South – 2 min </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                </div>--}}
{{--                <div class="col-lg-6 mt-3">--}}
                    <div class="card">
                        <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="card-img-top" src="{{asset('img/gallery/Public-Transport-3.png')}}" alt="Card image cap" width="80px" height="80px">
                            </div>
                            <div class="ml-5">
                                <h5 class="card-title">Public Transport</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Universiti-KL Gateway LRT Station:
                                        550 m |  5 mins </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Kerinchi LRT Station:
                                        1.3 KM | 6 min </li>

                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <div class="card-deck mt-3">
{{--                <div class="col-lg-6 mt-3">--}}
                    <div class="card">
                        <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="card-img-top" src="{{asset('img/gallery/Aeroplane.png')}}" alt="Card image cap" width="80px" height="80px">
                            </div>
                            <div class="ml-5">
                                <h5 class="card-title">Airports</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Sultan Abdul Aziz Shah Airport (SZB) :
                                        17.0 km |  25 mins </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Kuala Lumpur International Airport  (KUL):
                                        54.8 km | 49 mins  </li>

                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
{{--                </div>--}}
{{--                <div class="col-lg-6 mt-3">--}}
                    <div class="card">
                        <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="card-img-top" src="{{asset('img/gallery/mall.png')}}" alt="Card image cap" width="80px" height="80px">
                            </div>
                            <div class="ml-5">
                                <h5 class="card-title">Shopping</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> KL Gateway Mall:
                                        400 m | 6 min </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> MidValley Megamall/ The Gardens:
                                        3.2 KM | 7 min </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Bangsar Village:
                                        5 KM | 14 min </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Bangsar Shopping Centre:
                                        5.5 KM | 15 min </li>

                                </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            <div class="card-deck mt-3">
{{--                <div class="col-lg-6 mt-3">--}}
                    <div class="card">
                        <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="card-img-top" src="{{asset('img/gallery/hotel.png')}}" alt="Card image cap" width="80px" height="80px">
                            </div>
                            <div class="ml-5">
                                <h5 class="card-title">Hotels</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> VE Hotel
                                        200 m |  5 min </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Pullman Hotel
                                        1.7 km |  6 min </li>

                                </ul>
                            </div>

                        </div>
                        </div>
                    </div>
{{--                </div>--}}
{{--                <div class="col-lg-6 mt-3">--}}
                    <div class="card">
                        <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="card-img-top" src="{{asset('img/gallery/atm.png')}}" alt="Card image cap" width="80px" height="80px">
                            </div>
                            <div class="ml-5">
                                <h5 class="card-title">Cash Withdrawal</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> CIMB Bank
                                        950 m |  11min </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> RHB Bank
                                        200 m |  5min</li>

                                </ul>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-lg-12 mt-3">--}}
                    <div class="card mt-3">
                        <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="card-img-top" src="{{asset('img/gallery/Food-and-Dining-.png')}}" alt="Card image cap" width="80px" height="80px">
                            </div>
                            <div class="ml-5">
                                <h5 class="card-title">Food & Dining</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> SUBWAY – GF, Wisma Life Care </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Secret Recipe – 150 m</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Paparich – 150 m</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Portafino Italian Restaurant– 500 m</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> STREAT Thai – 150 m</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>Espresso – 150 m</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>Agrain – 500 m</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>Ali,Muthu & Ah Hock – 500 m</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>The Farm Foodcraft – 500 m</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>Tenmaya Japanese Cuisine– 500m</li>
                                </ul>
                            </div>

                        </div>
                        </div>
                    </div>
{{--                </div>--}}

            </div>

        </div>
    </section>

    <!-- ================  Start Gallery section ================= -->
    <section>
        <div class="container">
            <div class="section-intro text-center">

                <h2><span class="section-intro__style">Gallery</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="gallerypackageCarousel">
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/gallery/1.jpg')}}" alt="">

                    </div>

                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/gallery/b2.jpg')}}" alt="">

                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/gallery/b3.jpg')}}" alt="">

                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/gallery/b4.jpg')}}" alt="">

                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/gallery/b5.jpg')}}" alt="">

                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/gallery/b6.jpg')}}" alt="">

                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/gallery/b7.jpg')}}" alt="">

                    </div>
                </div>

                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('img/gallery/b8.jpg')}}" alt="">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================  End Gallery section ================= -->

    <!-- ================  Start Map Location section ================= -->
    <section class="section-margin--small">
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Find Us At</h3>
                            <p>5, Jalan Kerinchi,Bangsar South,59200, Wilayah Pesekutuan,Kuala Lumpur.</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=2007&amp;height=320&amp;hl=en&amp;q=LifeCare Diagnostic Medical Centre, Bangsar South&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://mcpenation.com/">https://mcpenation.com</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:320px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:320px;}.gmap_iframe {height:320px!important;}</style></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================  End Map Location section ================= -->
@endsection


@section('script')
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