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
                    <h1>COMING SOON!</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Cheras South/Your One-Stop Health Hub</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Blog Categorie Area =================-->
    <section class="location_area pb-60px">
        <div class="container">
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <h5>Exciting  <span class="section-intro__style">Location</span></h5>
                        <div class="mt-5 text-md-left">
                            <p>LifeCare @ Cheras South is conveniently connected to Kuala Lumpur and the Klang Valley via a network of public transportations.</p>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <h5><span class="section-intro__style">Connectivity</span></h5>
                        <div class="mt-5 text-md-left">
                            <ul>
                                <li> MRT Stations in Balakong are both within 2km radius</li>
                                <li> Easy access to major highways</li>
                                <li> Dedicated shuttle service to the nearby MRT station, KTM station, AEON Mall and The Mines Shopping Centre</li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->
    <section class="related-product-area section-margin--small mt-0">
        <div class="container">
            <div class="section-intro pb-60px text-center">
                <h2><span class="section-intro__style ">Gallery</span></h2>
            </div>

            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="{{asset('img/gallery/c-1.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Net Lettable Area:</h5>
                        <p class="card-text">Approx. 125,905 sq ft.</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="{{asset('img/gallery/c2.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">No. of Carparks</h5>
                        <p class="card-text">780 Bays (Indoor)</p>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <!-- ================ enquiry section start ================= -->
    <section class="calc-60px pb-60px">
        <div class="container">
            <div class="section-intro pb-60px text-center">
                <h2><span class="section-intro__style">Floor Directory</span></h2>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="levelb1-tab" data-toggle="tab" href="#lavelb1" role="tab" aria-controls="lavelb1"
                       aria-selected="true">Level B1 / LG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level1-tab" data-toggle="tab" href="#level1" role="tab" aria-controls="level1"
                       aria-selected="false">Level 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level2-tab" data-toggle="tab" href="#level2" role="tab" aria-controls="level2"
                       aria-selected="false">Level 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level3-tab" data-toggle="tab" href="#level3" role="tab" aria-controls="level3"
                       aria-selected="false">Level 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level3a-tab" data-toggle="tab" href="#level3a" role="tab" aria-controls="level3a"
                       aria-selected="false">Level 3A</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level5-tab" data-toggle="tab" href="#level5" role="tab" aria-controls="level5"
                       aria-selected="false">Level 5</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level6-tab" data-toggle="tab" href="#level6" role="tab" aria-controls="level6"
                       aria-selected="false">Level 6</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level7-tab" data-toggle="tab" href="#level7" role="tab" aria-controls="level7"
                       aria-selected="false">Level 7</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="lavelb1" role="tabpanel" aria-labelledby="levelb1-tab">
                    <div class="floor-area">
                        <img src="{{asset('img/gallery/level1b.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade" id="level1" role="tabpanel" aria-labelledby="level1-tab">
                    <div class="floor-area">
                        <img src="{{asset('img/gallery/level1.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade" id="level2" role="tabpanel" aria-labelledby="level2-tab">
                    <div class="floor-area">
                        <h2>Opening Soon</h2>
                        <img src="{{asset('img/gallery/level2.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade " id="level3" role="tabpanel" aria-labelledby="level3-tab">

                    <div class="floor-area">
                        <h2>Opening Soon</h2>
                        <img src="{{asset('img/gallery/level2.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade " id="level3a" role="tabpanel" aria-labelledby="level3a-tab">
                    <div class="floor-area">
                        <img src="{{asset('img/gallery/level3a.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade " id="level5" role="tabpanel" aria-labelledby="level5-tab">
                    <div class="floor-area">
                        <img src="{{asset('img/gallery/level5.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade " id="level6" role="tabpanel" aria-labelledby="level6-tab">
                    <div class="floor-area">
                        <img src="{{asset('img/gallery/level-6.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade " id="level7" role="tabpanel" aria-labelledby="level7-tab">
                    <div class="floor-area">
                        <img src="{{asset('img/gallery/level-7.png')}}" alt="" class="img-fluid">

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



    <section class="calc-60px">
        <div class="container">
            <div class="section-intro pb-60px text-center">
                <h2><span class="section-intro__style">Nearby Essential Services & Attractions</span></h2>
            </div>
            <div class="card-deck mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="" src="{{asset('img/gallery/parking.png')}}" alt="" width="80px" height="80px">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Parking</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Kompleks Komersil Akasa </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="card-img-top" src="{{asset('img/gallery/Public-Transport-3.png')}}" alt="Card image cap" width="80px" height="80px">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Public Transport</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Susur U-Turn Cheras Jaya Bus Stop:
                                        400 m |  5 mins  </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Symphony Tower Bus Stop:
                                        400 m |  5 mins </li>

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-deck mt-3">
                <div class="card">

                    <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="card-img-top" src="{{asset('img/gallery/Aeroplane.png')}}" alt="Card image cap" width="80px" height="80px">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Airports</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Sultan Abdul Aziz Shah Airport (SZB):
                                        34 km |  36 mins </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Kuala Lumpur International Airport  (KUL):
                                        49 km |  42 mins </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>Kuala Lumpur International Airport 2 (KUL):
                                        52 km |  42 mins </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img class="card-img-top" src="{{asset('img/gallery/mall.png')}}" alt="Card image cap" width="80px" height="80px">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Shopping</h5>
                                <ul>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> AEON Mall Cheras Selatan:
                                        3.4 km | 7 mins  </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> Amerin Mall:
                                        4.4 km | 8 mins  </li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> The Mines Shopping Mall:
                                        5.0 km | 6 mins  </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="card-horizontal">
                        <div class="img-square-wrapper">
                            <img class="card-img-top" src="{{asset('img/gallery/hotel.png')}}" alt="Card image cap" width="80px" height="80px">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Hotels</h5>
                            <ul>
                                <li><i class="fa fa-car" aria-hidden="true"></i> One Avenue Hotel (Balakong):
                                    4.4 km | 8 mins </li>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>



    <!-- ================  Start Map Location section ================= -->
    <section class="section-margin--small">
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Find Us At</h3>
                            <p>Kompleks Komersil Akasa, Jalan Akasa, Akasa Cheras Selatan, 43300 Seri Kembangan, Selangor</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 col-lg-9">

                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=320&amp;hl=en&amp;q=Kompleks Komersil Akasa, Jalan Akasa, Akasa Cheras Selatan, 43300 Seri Kembangan, Selangor&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            <a href="https://mcpenation.com/">https://mcpenation.com</a>
                        </div>

                    </div>
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