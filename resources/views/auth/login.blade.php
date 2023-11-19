@extends('layouts.auth')


@section('content')

	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	{{-- Tab view --}}
	<section class="login_box_area mt-4 d-none d-sm-block d-xl-none">
	<div class="container">
	<div class="row">
	<div class="col-lg-6">
	<div class="login_box_img" style="padding: 50px;height:auto">
	<div class=" transparent-login-box d-flex justify-content-center" style="padding:100px;margin:0 30px">
		<div>
			<div class="d-flex justify-content-center">
				<img src="{{asset('img/Screenshot_2023-02-27_140655-removebg-preview.png')}}" style="width:70%" class="img-responsive mb-2" alt="logo">
			</div>
			<h4 class="text-center mb-4" style="color:#FFFFFF">Love Earth, Use GreenQR</h4>
			<div class="d-flex justify-content-center">
				<a class="button button-account" href="{{route('register') }}">Create an Account</a>
			</div>
		</div>
	</div>
	</div>
	</div>
	
	<div class="col-lg-6">
	 <div class="login_form_inner">

                        <h3 style="color:#1FA33D">Welcome Back</h3>
                        <!--Error Credential Invalid-->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="row login_form" method="POST" action="{{ route('login') }}" id="contactForm" >
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button style="background-color:#274439" type="submit" value="submit" class="btn btn-success btn-block">Log In</button>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="hover-black">Forgot Password?</a>
                                @endif
                            </div>
                        </form>
                    </div>
	</div>
	
	</div>
	</div>
	</section>
    <!--================Login Box Area =================-->
	{{-- Desktop view --}}
    <section class="login_box_area mt-4 d-none d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover transparent-login-box" style="width:auto;padding:150px;margin:0 30px">
                            <img src="{{asset('img/Screenshot_2023-02-27_140655-removebg-preview.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                            <h4 style="color:#FFFFFF">Love Earth, Use GreenQR</h4>
                            <a class="button button-account" href="{{ route('register') }}">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">

                        <h3 style="color:#1FA33D">Welcome Back</h3>
                        <!--Error Credential Invalid-->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="row login_form" method="POST" action="{{ route('login') }}" id="contactForm" >
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button style="background-color:#274439" type="submit" value="submit" class="btn btn-success btn-block">Log In</button>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="hover-black">Forgot Password?</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<!--================Mobile=================-->
	<section class="login_box_area my-4 d-block d-sm-none">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6">
                    <div class="login_form_inner">

                        <h3 style="color:#1FA33D">Welcome to login</h3>
                        <!--Error Credential Invalid-->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="row login_form" method="POST" action="{{ route('login') }}" id="contactForm" >
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="selector">
                                    <label for="f-option2">Keep me logged in</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="btn btn-success btn-block" style="background-color:#274439">Log In</button>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="hover-black">Forgot Password?</a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-6">
                    <div class="login_box_img ">
                        <!--div class="hover">
                            <img src="{{asset('img/Screenshot_2023-02-27_140655-removebg-preview.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                            <h4>First time here? </h4>
                            <p>One-stop Health and Wellness Online Marketplace​</p>
                            <a class="button button-account" href="{{ route('register') }}">Create an Account</a>
                        </div-->
						<div class="hover transparent-login-box" style="width:auto;padding:30px;margin:0 30px">
                            <img src="{{asset('img/Screenshot_2023-02-27_140655-removebg-preview.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                            <h4 style="color:#FFFFFF">Love Earth, Use GreenQR</h4>
                            <a class="button button-account" href="{{ route('register') }}">Create an Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->
	
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