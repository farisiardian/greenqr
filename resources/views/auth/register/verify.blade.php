@extends('layouts.auth')

@section('content')


	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
    <!--================Login Box Area =================-->
    <section class="login_box_area mt-4 d-none d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <!--div class="hover transparent-login-box">
                            <img src="{{asset('img/Screenshot_2023-02-27_140655-removebg-preview.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                            <h4 style="color:white">Love Earth, Use GreenQR</h4>
                            <a class="button button-account" href="{{ route('login') }}">Login Now</a>
                        </div-->
						<div class="hover transparent-login-box" style="width:auto;padding:150px;margin:0 30px">
                            <img src="{{asset('img/Screenshot_2023-02-27_140655-removebg-preview.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                            <h4 style="color:white">Love Earth, Use GreenQR</h4>
                            <a class="button button-account" href="{{ route('login') }}">Login Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner register_form_inner">
                        <div class="box-center ">
                            <h3 style="color:#1FA33D">Verify Your Email</h3>
                            <div class="col-lg-8 mx-auto align-self-center text-center ">
                                <p >Enter the 6-digit code that we send to your email</p>

                            </div>
                            <form class="row login_form" method="POST" action="{{route('register.code')}}" id="contactForm" >
                                @csrf

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <span class="alert alert-danger col-md-12" role="alert">
                                                            <strong>{{ $error }}</strong>
                                                        </span>
                                    @endforeach
                                @endif
                                <input type="hidden" class="form-control" value="{{$email}}" name="email">
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code1" name="code1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code2" name="code2" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code3" name="code3" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code4" name="code4" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code5" name="code5" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code6" name="code6" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group" style="padding-bottom:70px">
                                    <button style="background-color:#274439" type="submit" class="button button-register w-100 text-white" >Continue</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
							<!--a class="button button-account" href="{{route('register') }}">Create an Account</a-->
							<a class="button button-account" href="{{ route('login') }}">Login Now</a>
						</div>
					</div>
				</div>
				</div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner register_form_inner">
                        <div class="box-center ">
                            <h3 style="color:#1FA33D">Verify Your Email</h3>
                            <div class="col-lg-8 mx-auto align-self-center text-center ">
                                <p >Enter the 6-digit code that we send to your email</p>

                            </div>
                            <form class="row login_form" method="POST" action="{{route('register.code')}}" id="contactForm" >
                                @csrf

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <span class="alert alert-danger col-md-12" role="alert">
                                                            <strong>{{ $error }}</strong>
                                                        </span>
                                    @endforeach
                                @endif
                                <input type="hidden" class="form-control" value="{{$email}}" name="email">
                                <div class="row mb-3">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code1" name="code1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code2" name="code2" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code3" name="code3" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code4" name="code4" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code5" name="code5" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control code-input" id="user-code6" name="code6" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group" style="padding-bottom:70px">
                                    <button style="background-color:#274439" type="submit" class="button button-register w-100 text-white" >Continue</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	
	<!--================Mobile=================-->
	<section class="login_box_area mt-5 d-block d-sm-none">
        <div class="container">
            <div class="row mx-2">
					<div class="col login_form_inner register_form_inner" style="padding:0 15px">
                            <h3>Verify Your Email</h3>
                            <div class="col-lg-8 mx-auto align-self-center text-center ">
                                <p >An email with verification code has been sent to {{$email}}</p>

                            </div>
                            <form class="row login_form" method="POST" action="{{route('register.code')}}" id="contactForm" >
                                @csrf

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <span class="alert alert-danger col-md-12" role="alert">
                                                            <strong>{{ $error }}</strong>
                                                        </span>
                                    @endforeach
                                @endif
                                <input type="hidden" class="form-control" value="{{$email}}" name="email">
                                <div class="row mb-3 text-center">
									<div class="col d-flex justify-content-between">
                                        <div class="form-group px-2">
                                            <input type="text" class="form-control code-input" id="user-code1" name="code1" required>
                                        </div>
                                        <div class="form-group px-2">
                                            <input type="text" class="form-control code-input" id="user-code2" name="code2" required>
                                        </div>
                                        <div class="form-group px-2">
                                            <input type="text" class="form-control code-input" id="user-code3" name="code3" required>
                                        </div>
                                        <div class="form-group px-2">
                                            <input type="text" class="form-control code-input" id="user-code4" name="code4" required>
                                        </div>
                                        <div class="form-group px-2">
                                            <input type="text" class="form-control code-input" id="user-code5" name="code5" required>
                                        </div>
                                        <div class="form-group px-2">
                                            <input type="text" class="form-control code-input" id="user-code6" name="code6" required>
                                        </div>
									</div>
                                </div>

                                <div class="col-md-12 form-group" style="padding-bottom:70px">
                                    <button type="submit" class="button button-register w-100 text-white" >Verify Code</button>
                                </div>

                            </form>
					</div>
				
            </div>
			<div class="row mx-2">
				<div class="col login_box_img" style="padding:0 15px">
                        <div class="hover">
                            <img src="{{asset('img/Logo2.png')}}" style="width: 150px;" class="img-responsive mb-2" alt="logo">
                            <h4>Already have an account?</h4>
                            <p>Top Private Health Screening Service Provider in Malaysia</p>
                            <a class="button button-account" href="{{ route('login') }}">Login Now</a>
                        </div>
                </div>
			</div>
        </div>
    </section>
    <!--================End Login Box Area =================-->
@endsection
@section('script')
    <script>
        (function(window, document, $) {
            'use strict';



            // code input
            const inputElements = [...document.querySelectorAll('input.code-input')]

            inputElements.forEach((ele,index)=>{
                ele.addEventListener('keydown',(e)=>{
                    // if the keycode is backspace & the current field is empty
                    // focus the input before the current. Then the event happens
                    // which will clear the "before" input box.
                    if(e.keyCode === 8 && e.target.value==='') inputElements[Math.max(0,index-1)].focus()
                })
                ele.addEventListener('input',(e)=>{
                    // take the first character of the input
                    // this actually breaks if you input an emoji like ðŸ‘¨â€ðŸ‘©â€ðŸ‘§â€ðŸ‘¦....
                    // but I'm willing to overlook insane security code practices.
                    const [first,...rest] = e.target.value
                    e.target.value = first ?? '' // first will be undefined when backspace was entered, so set the input to ""
                    const lastInputBox = index===inputElements.length-1
                    const insertedContent = first!==undefined
                    if(insertedContent && !lastInputBox) {
                        // continue to input the rest of the string
                        inputElements[index+1].focus()
                        inputElements[index+1].value = rest.join('')
                        inputElements[index+1].dispatchEvent(new Event('input'))
                    }
                })
            });
        })(window, document, jQuery);
    </script>
	
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

