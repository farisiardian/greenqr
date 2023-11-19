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
                            <li class="breadcrumb-item"><a href="#">LifeCare DK Mall, SS2</a></li>
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
                            <p>LifeCare DK Mall is strategically located in Petaling Jaya SS2 district, Selangor. It is less than 10km away from the city of Kuala Lumpur.</p>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <h5><span class="section-intro__style">Mall Concept</span></h5>
                        <div class="mt-5 text-md-left">
                            <p>LifeCare DK Mall houses Urology-Nephrology Specialist Boutique Hospital, provides holistic healthcare solutions from birth to aged-care and everything in between.</p>
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
                        <p class="card-text">Approx. 350,000 sq ft.</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="{{asset('img/gallery/1.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">No. of TENANT Lots:</h5>
                        <p class="card-text">15 Units</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="{{asset('img/gallery/s1.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">No. of Specialist Lots:</h5>
                        <p class="card-text">40 Units.</p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="{{asset('img/gallery/c2.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">No. of Carparks</h5>
                        <p class="card-text">1200 Bays (Indoor)</p>
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
                       aria-selected="true">Level LG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level1-tab" data-toggle="tab" href="#level1" role="tab" aria-controls="level1"
                       aria-selected="false">Level G</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level2-tab" data-toggle="tab" href="#level2" role="tab" aria-controls="level2"
                       aria-selected="false">Level 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="level3-tab" data-toggle="tab" href="#level3" role="tab" aria-controls="level3"
                       aria-selected="false">Level 2</a>
                </li>


            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="lavelb1" role="tabpanel" aria-labelledby="levelb1-tab">
                    <div class="floor-area">
                        <img src="{{asset('img/gallery/lg.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade" id="level1" role="tabpanel" aria-labelledby="level1-tab">
                    <div class="floor-area">
                        <img src="{{asset('img/gallery/g.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade" id="level2" role="tabpanel" aria-labelledby="level2-tab">
                    <div class="floor-area">
                        <img src="{{asset('img/gallery/sl1.png')}}" alt="" class="img-fluid">

                    </div>
                </div>
                <div class="tab-pane fade " id="level3" role="tabpanel" aria-labelledby="level3-tab">

                    <div class="floor-area">
                        <img src="{{asset('img/gallery/sl2.png')}}" alt="" class="img-fluid">

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

    <!-- ================  Start Map Location section ================= -->
    <section class="section-margin--small">
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Find Us At</h3>
                            <p>Jalan SS 2/72, SS 2, 46300 Petaling Jaya, Selangor.</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-8 col-lg-9">

                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=320&amp;hl=en&amp;q=Jalan SS 2/72, SS 2, 46300 Petaling Jaya, Selangor.&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            <a href="https://mcpenation.com/">https://mcpenation.com</a>
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