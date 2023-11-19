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
    <section class="blog-banner-area-location" id="blog">
        <div class="container h-100">
            <div class="blog-banner-location">
                <div class="text-center ">
                    <h1>Location</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Experience Malaysia's Largest Health & Wellness Centre</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="section-intro pb-60px text-center">

                <h2>Our <span class="section-intro__style">Locations</span></h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="location-blog">
                        <div class="blog_post">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=LifeCare%20Diagnostic%20Medical%20Centre%2C%20Bangsar%20South&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" title="LifeCare Diagnostic Medical Centre, Bangsar South" aria-label="LifeCare Diagnostic Medical Centre, Bangsar South"></iframe>
                            <div class="blog_details">
                                <a href="{{route('location',['location'=> 'bangsar'])}}">
                                    <h2>Bangsar South</h2>
                                </a>
                                <p>5, Jalan Kerinchi,Bangsar South,59200, Wilayah Pesekutuan, Kuala Lumpur.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="location-blog">
                        <div class="blog_post">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=Lifecare%20Kompleks%20Komersil%20Akasa%2C%20Jalan%20Akasa%2C%20Akasa%20Cheras%20Selatan%2C%2043300%20Seri%20Kembangan%2C%20Selangor&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"></iframe>
                            <div class="blog_details">
                                <a href="{{route('location',['location'=> 'cheras'])}}">
                                    <h2>Cheras South</h2>
                                </a>
                                <p>Kompleks Komersil Akasa,Jalan Akasa, Akasa Cheras Selatan, 43300 Seri Kembangan, Selangor</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="location-blog">
                        <div class="blog_post">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=SS2%20mall&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" title="SS2 mall" aria-label="SS2 mall"></iframe>
                            <div class="blog_details">
                                <a href="{{route('location',['location'=> 'ss2'])}}">
                                    <h2>SS2</h2>
                                </a>
                                <p>Jalan SS 2/72,SS 2,46300 Petaling Jaya, Selangor.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!-- ================ enquiry section start ================= -->
    <section class="enquiry" >
        <div class="container">
            <div class="row">
                <div class="col-xl-7">
                    <img class="img-fluid" src="img/bangsar.png" alt="">
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
                        <a class="button button--active mt-3 mt-xl-4" href="leasing-enquiry.html">ENQUIRE NOW</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ================ enquiry section end ================= -->

    <section class="subscribe-position">
        <div class="container">
            <div class="subscribe text-center">
                <h3 class="subscribe__title">We Are Hiring</h3>
                <p>Bearing Void gathering light light his eavening unto dont afraid</p>
                <div id="mc_embed_signup">
                    <button class="button button-subscribe mr-auto mb-1" type="submit">Apply Now</button>
                </div>

            </div>
        </div>
    </section>

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