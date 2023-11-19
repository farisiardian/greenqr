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
    <section class="blog-banner-area-about" id="blog">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1 class="text-white">About Us</h1>
                    <!-- <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop Single</li>
            </ol>
          </nav> -->
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Blog Area =================-->
    <section class="blog_area single-post-area py-80px section-margin--small">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="single-post row">

                        <div class="col-lg-12 mb-4">
                            <!-- <h2>Astronomy Binoculars A Great Alternative</h2> -->
                            <p class="excert">
                                LifeCare is a private medical care provider that offers a wide range of medical consultation services. We are managed by a group of committed and well-trained professionals who offer high quality health care services. LifeCare is strategically located in Bangsar South Business District, off the Federal Highway. It is less than 10km away from the city of Kuala Lumpur.
                            </p>

                        </div>
                        <div class="col-lg-4">
                            <h6>EXCITING LOCATION</h6>
                            <p>Our healthcare hub is homed at the highly strategic Bangsar South Business District – sitting between the bustling Kuala Lumpur City Center and the slightly more affluent neighborhood of Bangsar. We are encircled by an array of businesses, professional services as well as abundance of dining choices and needless say, multiple access via main highways and public transports.
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <h6>WORLD CLASS FACILITIES</h6>
                            <p>At LifeCare, we are a regional centre of excellence for the provision of high-quality healthcare using cutting-edge technologies with a compassionate and personalized approach.
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <h6>PROFESSIONAL SERVICES</h6>
                            <p>Our dedicated team of fully proficient and experienced health care professionals are committed to providing the most efficient and effective health care for our clients.
                            </p>
                        </div>
                        <div class="col-lg-12">
                            <div class="quotes text-center">
                                Our mission is “Early Detection, Prevention & Treatment of Diseases”
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <img class="img-fluid" src="img/about2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

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
