@extends('layouts.auth')

@section('content')


	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
    <section class="login_box_area mt-4 mb-4 d-none d-xl-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover transparent-login-box">
                            <img src="{{asset('img/Screenshot_2023-02-27_140655-removebg-preview.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                             <h4 style="color:#FFFFFF">Love Earth, Use GreenQR</h4>
                            <a class="button button-account" href="{{ route('login') }}">Login Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="login_form_inner register_form_inner">

                        <div class="box-center">

                            <h3>{{ __('Reset Password') }}</h3>
                            <form class="row login_form" method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

{{--                                <div class="row mb-3">--}}
{{--                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

                                    <div class="col-md-12 form-group ">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus readonly>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
{{--                                </div>--}}

{{--                                <div class="row mb-3">--}}
{{--                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

                                    <div class="col-md-12 form-group">
                                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
{{--                                </div>--}}

{{--                                <div class="row mb-3">--}}
{{--                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

                                    <div class="col-md-12 form-group">
                                        <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
{{--                                </div>--}}

{{--                                <div class="row mb-0">--}}
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
{{--                                </div>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
	
	<!--================Mobile=================-->
	<section class="login_box_area mt-4 d-block d-sm-none">
        <div class="container">
            <div class="row justify-content-center">
                
                <div class="col-md-6">
                    <div class="login_form_inner register_form_inner">

                        <div class="box-center">

                            <h3>{{ __('Reset Password') }}</h3>
                            <form class="row login_form" method="POST" action="{{ route('password.update') }}">
                                @csrf

                                <input type="hidden" name="token" value="{{ $token }}">

{{--                                <div class="row mb-3">--}}
{{--                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

                                    <div class="col-md-12 form-group ">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus readonly>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
{{--                                </div>--}}

{{--                                <div class="row mb-3">--}}
{{--                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

                                    <div class="col-md-12 form-group">
                                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
{{--                                </div>--}}

{{--                                <div class="row mb-3">--}}
{{--                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>--}}

                                    <div class="col-md-12 form-group">
                                        <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
{{--                                </div>--}}

{{--                                <div class="row mb-0">--}}
                                    <div class="col-md-12 form-group">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
{{--                                </div>--}}
                            </form>
                        </div>
                    </div>
                </div>
				<div class="col-lg-6">
                    <div class="login_box_img">
                        <div class="hover">
                            <img src="{{asset('img/Logo2.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                            <h4>Already have an account?</h4>
                            <p>Top Private Health Screening Service Provider in Malaysia</p>
                            <a class="button button-account" href="{{ route('login') }}">Login Now</a>
                        </div>
                    </div>
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