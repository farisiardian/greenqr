@extends('layouts.app')
@section('addstyle')
    <style>
        .noti-title{
            color: black;
            font-weight: 500;
        }
        .shipAddress{
            color: black;
            font-size: 10px;
        }
        .shipPhone{
            color: #9E9E9E;
            font-size: 10px;
        }
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
	
    <!--================Desktop Area =================-->
    <section class="setting-area d-none d-xl-block">
        <div class="container">
            <div class="row">

                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="comment-profile">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">Notifications</h4>
                        <hr>

                        @foreach($notification as $notifications)
                        <div class="mt-3">
                            <div class="media">
                                <div class="d-flex p-2" style="background-color: #384AEB;border-radius: 20px">
                                    <img src="{{asset('storage/'.$notifications->image)}}" alt=""  width="80px" height="80px">
                                </div>
                                <div class="media-body" style="padding:0 20px">
                                    <p class="noti-title">{{$notifications->title}}</p>
                                    <p>{!! $notifications->note !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </section>

    <!--================Mobile Area =================-->
    <section class="setting-area d-block d-sm-none ">
        <div class="container">
            <div class="row">

                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="comment-profile">
                        <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#293A8B;">Notifications</h4>
                        <hr>

                        @foreach($notification as $notifications)
                        <div class="mt-3">
                            <div class="media">
                                <div class="d-flex p-2" style="background-color: #384AEB;border-radius: 20px">
                                    <img src="{{asset('storage/'.$notifications->image)}}" alt=""  width="40px" height="40px">
                                </div>
                                <div class="media-body" style="padding:0 20px">
                                    <p class="noti-title">{{$notifications->title}}</p>
                                    <p>{!! $notifications->note !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>

                </div>
            </div>
        </div>
    </section>
	
    <!--================Blog Area =================-->
@endsection
