@extends('layouts.app')

@section ('addstyle')
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
	
    <!--================Blog Area =================-->
    <section class="setting-area">
        <div class="container">
            <div class="row">


                @include('user.profile.tabbar')

                <!--================Desktop Area =================-->
                <!--div class="col-lg-9 posts-list d-none d-xl-block"-->
                <div class="col-lg-9 posts-list d-none d-sm-block">
                    <div class="comment-profile">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#274439;">Profile</h4>
                        <p>Manage and protect your accounts</p>
                        <hr>
                        <form method="POST" enctype="multipart/form-data" action="{{route('profile.update',['profile'=>Auth::user()->id])}}">
                            @csrf
                            {{method_field('put')}}
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 label-control">Email</label>
                                        <div class="col-md-9">
                                            <input type="text" readonly class="form-control-plaintext"  value="{{Auth::user()->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 label-control">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                        </div>
                                    </div>
									<div class="form-group row">
                                        <label for="" class="col-md-3 label-control">Address</label>
                                        <div class="col-md-9">
                                            <input type="text" readonly class="form-control" name="address" value="{{isset($address) ? $address->address : ''}} {{isset($address) ? $address->postalcode : ''}}{{isset($address) ? $address->city : ''}} {{isset($address) ? $address->state : ''}}">
                                        </div>
                                    </div>
                                    {{--                                    <div class="form-group row">--}}
                                    {{--                                        <label for="" class="col-md-3 label-control">Email</label>--}}
                                    {{--                                        <div class="col-md-9">--}}
                                    {{--                                            <input type="email" class="form-control" id="" >--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 label-control">Phone No</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="phone"  value="{{Auth::user()->phone}}" >
                                        </div>
                                    </div>
                                    {{--                                    <div class="form-group row">--}}
                                    {{--                                        <label for="" class="col-md-3 label-control">Shop Name</label>--}}
                                    {{--                                        <div class="col-md-9">--}}
                                    {{--                                            <input type="text" class="form-control" id="">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 label-control">Gender</label>
                                        <div class="col-md-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Male" id="inlineRadio1" @if(Auth::user()->gender == 'Male') checked @endif>
                                                <label class="form-check-label" for="inlineRadio1">Men</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Female" id="inlineRadio2" @if(Auth::user()->gender == 'Female') checked @endif>
                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-md-3 label-control">Date of Birth</label>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control" name="dob" value="{{Auth::user()->dob}}">
                                            {{--                                            <input type="date" class="form-control" name="dob" value="{{\Carbon\Carbon::parse(Auth::user()->dob)->isoFormat('DD/MM/YYYY')}}">--}}
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" style="background-color:#274439" class="button button-postComment button--active">Save</button>
                                    </div>

                                </div>

                                <div class="col-lg-3" style="text-align:center;">

                                    <img class="author_img rounded-circle img-profile" src="{{asset('storage/'.Auth::user()->profile_image)}}" alt="">

                                    <div class="file button img-button mt-3" style="background-color:#274439">
                                        Select Image
                                        <input class="file" type="file" name="image" accept=".jpg,.jpeg,.png"/>
                                    </div>

                                    <div class="img-file">
                                        <div class="img-file-desc">File size: maximum 1 MB</div>
                                        <div class="img-file-desc">File extension: .JPEG, .PNG</div>
                                    </div>


                                </div>
                            </div>

                        </form>
                    </div>

                </div>

                <!--================Mobile Area =================-->
                <div class="col-lg-9 posts-list d-block d-sm-none">
                    <div class="comment-profile">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;">My Profile</h4>
                        <p>Manage and protect your accounts</p>
                        <hr>
                        <form method="POST" enctype="multipart/form-data" action="{{route('profile.update',['profile'=>Auth::user()->id])}}">
                            @csrf
                            {{method_field('put')}}

                            <div class="mb-5" style="border-radius: 20px;border:solid 1px #384AEB; padding: 20px">

                                <div class="d-flex justify-content-center">
                                    <img class="author_img rounded-circle img-profile" src="{{asset('storage/'.Auth::user()->profile_image)}}" alt="">
                                </div>
                                <div class="file button img-button text-center d-flex justify-content-center mt-3" style="background-color:#274439">
                                    Select Image
                                    <input class="file" type="file" name="image" accept=".jpg,.jpeg,.png"/>
                                </div>

                                <div class="img-file text-center">
                                    <div class="img-file-desc">File size: maximum 1 MB</div>
                                    <div class="img-file-desc">File extension: .JPEG, .PNG</div>
                                </div>


                            </div>

                            <div>
                                <div class="form-group row">
                                    <label for="" class="col-md-3 label-control">Email</label>
                                    <div class="col-md-9">
                                        <h5 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;font-size:16px">{{Auth::user()->email}}</h5>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-3 label-control">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                {{--                                    <div class="form-group row">--}}
                                {{--                                        <label for="" class="col-md-3 label-control">Email</label>--}}
                                {{--                                        <div class="col-md-9">--}}
                                {{--                                            <input type="email" class="form-control" id="" >--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                <div class="form-group row">
                                    <label for="" class="col-md-3 label-control">Phone No</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="phone"  value="{{Auth::user()->phone}}" >
                                    </div>
                                </div>
                                {{--                                    <div class="form-group row">--}}
                                {{--                                        <label for="" class="col-md-3 label-control">Shop Name</label>--}}
                                {{--                                        <div class="col-md-9">--}}
                                {{--                                            <input type="text" class="form-control" id="">--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                <div class="form-group row">
                                    <label for="" class="col-md-3 label-control">Gender</label>
                                    <div class="col-md-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="Male" id="inlineRadio1" @if(Auth::user()->gender == 'Male') checked @endif>
                                            <label class="form-check-label" for="inlineRadio1">Men</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="Female" id="inlineRadio2" @if(Auth::user()->gender == 'Female') checked @endif>
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-md-3 label-control">Date of Birth</label>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" name="dob" value="{{Auth::user()->dob}}">
                                        {{--                                            <input type="date" class="form-control" name="dob" value="{{\Carbon\Carbon::parse(Auth::user()->dob)->isoFormat('DD/MM/YYYY')}}">--}}
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="button button-postComment button--active" style="background-color:#274439">Save</button>
                                </div>

                            </div>

                        </form>
						<div class="d-flex justify-content-center mt-5">
							<button class="button" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="px-lg-3" style="background-color:#274439">LOG OUT
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</button>
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
