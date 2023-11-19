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

                <div class="col-lg-9 posts-list">
                    <div class="comment-profile">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;">Change Password</h4>
                        <p>For your account's security, do not share your password with anyone else</p>
                        <p>@include('error')</p>
                        <hr>
                        <form method="post" action="{{route('changepw')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Current Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="oldpw"  class="form-control" id="" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control" id="" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password_confirmation" class="form-control" id="" >
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" style="background-color:#274439" class="button button-postComment button--active">Confirm</button>
                                    </div>

                                </div>


                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
