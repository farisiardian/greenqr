
<style>
    .card{
        background: #ffffff33;
          border-radius: 10px;
          box-shadow: 0 4px 30px #0000001a;
          backdrop-filter: blur(5px);
          -webkit-backdrop-filter: blur(5px);
          padding: 47px 30px 43px;
          margin-top: 0px !important;
          margin-bottom: 20px
    }
    .card-header{
        color:white
    }

     .card-title{
        color:white  
    }

    .card-text {
        color:white 
    }
	.cat-list-mobile {
		padding: 10px 15px;
		background-color: white;
		border-bottom: solid 1px #DADADA
	}
	.child-list-mobile {
		padding: 5px 30px;
		background-color: white;
	}
	.menu-title{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		color:#293A8B;
		font-weight: 500;
		font-size:16px
	}
	.menu-item{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		color:#293A8B
	}
		
</style>


<div class="col-lg-3 col-md-12  d-none d-xl-block">
    <div class="main-menu menu-light menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content ">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" nav-item"><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="menu-title" data-i18n="" style="color:#274439"> <b>My Account </b></span></a>
                    <ul class="menu-content">
                        <li class="@if(\Route::currentRouteName() == 'profile.index') active @endif"><a style="color:#274439" class="menu-item" href="{{route('profile.index')}}" data-i18n=""> Profile</a>
                        </li>
                        <li class="@if(\Route::currentRouteName() == 'address.index') active @endif"><a class="menu-item " href="{{route('address.index')}}" data-i18n=""> Addresses</a>
                        </li>
                        <li class="@if(\Route::currentRouteName() == 'changepw') active @endif"><a class="menu-item" href="{{route('changepw')}}" data-i18n=""> Change Password</a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item @if(\Route::currentRouteName() == 'mypurchase.index') active @endif"><a href="{{route('mypurchase.index')}}"><i style="color:#274439" class="fa fa-list-alt" aria-hidden="true"></i><span style="color:#274439" class="menu-title" data-i18n=""><b> Orders </b></span></a>
                </li>


                <li class=" nav-item @if(\Route::currentRouteName() == 'notification.index') active @endif"><a href="{{route('notification.index')}}"><i class="fa fa-bell" aria-hidden="true"></i><span style="color:#274439" class="menu-title" data-i18n=""><b> Notifications </b></span></a>
{{--                    <ul class="menu-content">--}}
{{--                        <li class="@if(\Route::currentRouteName() == 'order_update') active @endif"><a class="menu-item" href="{{route('order_update')}}" data-i18n=""> Order updates</a>--}}
{{--                        </li>--}}
{{--                        <li class="@if(\Route::currentRouteName() == 'rating') active @endif"><a class="menu-item" href="{{route('rating')}}" data-i18n=""> Ratings</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </li>

                <li class=" nav-item @if(\Route::currentRouteName() == 'voucher.index') active @endif"><a href="{{route('voucher.index')}}"><i class="fa fa-ticket" aria-hidden="true"></i><span style="color:#274439" class="menu-title" data-i18n=""><b> Vouchers </b></span></a>
                </li>
				
				<li class=" nav-item cat-list-mobile"><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-circle-x mr-3" style="color:#293A8B" aria-hidden="true"></i><span style="color:#274439" class="menu-title" data-i18n=""><b> Log Out </b></span></a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
                </li>

            </ul>
        </div>
    </div>
</div>

{{--Tab view --}}
<div class="col-lg-3 col-md-12 d-none d-sm-block d-xl-none">
    <div class="main-menu menu-light menu-shadow" data-scroll-to-active="true">
        <div >
            <ul>

                <li class="cat-list-mobile"><a href="#"><i class="fa fa-user" style="color:#274439" aria-hidden="true"></i><span class="menu-title" data-i18n="" style="color:#274439"> <b>My Account </b></span></a>
                    <ul>
                        <li class="cat-list-mobile @if(\Route::currentRouteName() == 'profile.index') active @endif"><a style="color:#274439" href="{{route('profile.index')}}" data-i18n=""> Profile</a>
                        </li>
                        <li class="cat-list-mobile @if(\Route::currentRouteName() == 'address.index') @endif"><a style="color:#274439" href="{{route('address.index')}}" data-i18n=""> Addresses</a>
                        </li>
                        <li class="cat-list-mobile @if(\Route::currentRouteName() == 'changepw') @endif"><a style="color:#274439" href="{{route('changepw')}}" data-i18n=""> Change Password</a>
                        </li>
                    </ul>
                </li>

                <li class=" cat-list-mobile @if(\Route::currentRouteName() == 'mypurchase.index') active @endif"><a href="{{route('mypurchase.index')}}"><i style="color:#274439" class="fa fa-list-alt" aria-hidden="true"></i><span style="color:#274439" class="menu-title" data-i18n=""><b> Orders </b></span></a>
                </li>


                <li class="cat-list-mobile  @if(\Route::currentRouteName() == 'notification.index') active @endif"><a href="{{route('notification.index')}}"><i style="color:#274439" class="fa fa-bell" aria-hidden="true"></i><span style="color:#274439" class="menu-title" data-i18n=""><b> Notifications </b></span></a>
{{--                    <ul class="menu-content">--}}
{{--                        <li class="@if(\Route::currentRouteName() == 'order_update') active @endif"><a class="menu-item" href="{{route('order_update')}}" data-i18n=""> Order updates</a>--}}
{{--                        </li>--}}
{{--                        <li class="@if(\Route::currentRouteName() == 'rating') active @endif"><a class="menu-item" href="{{route('rating')}}" data-i18n=""> Ratings</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </li>

                <li class=" cat-list-mobile @if(\Route::currentRouteName() == 'voucher.index') active @endif"><a href="{{route('voucher.index')}}"><i style="color:#274439" class="fa fa-ticket" aria-hidden="true"></i><span style="color:#274439" class="menu-title" data-i18n=""><b> Vouchers </b></span></a>
                </li>
				
				<li class=" cat-list-mobile"><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-circle-x mr-3" style="color:#293A8B" aria-hidden="true"></i><span style="color:#274439" class="menu-title" data-i18n=""><b> Log Out </b></span></a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
                </li>

            </ul>
        </div>
    </div>
</div>



<div class="col d-block d-sm-none">
    <h5 class="mt-4" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439">My Account</h5>
	<div class="main-menu-content mt-3" data-scroll-to-active="true">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item cat-list-mobile"><a href="#"><i class="fa fa-user mr-3" style="color:#274439" aria-hidden="true"></i><span class="menu-title" data-i18n="" style="color:#274439"> My Account</span></a>
                    <ul class="menu-content">
                        <li class="child-list-mobile @if(\Route::currentRouteName() == 'profile.index') active @endif"><a class="menu-item" href="{{route('profile.index')}}" data-i18n="" style="color:#274439"> Profile</a>
                        </li>
                        <li class="child-list-mobile @if(\Route::currentRouteName() == 'address.index') active @endif"><a class="menu-item " href="{{route('address.index')}}" data-i18n="" style="color:#274439"> Addresses</a>
                        </li>
                        <li class="child-list-mobile @if(\Route::currentRouteName() == 'changepw') active @endif"><a class="menu-item" href="{{route('changepw')}}" data-i18n="" style="color:#274439"> Change Password</a>
                        </li>

                    </ul>
                </li>

            <li class=" nav-item cat-list-mobile @if(\Route::currentRouteName() == 'mypurchase.index') active @endif"><a href="{{route('mypurchase.index')}}"><i class="fa fa-list-alt mr-3" aria-hidden="true" style="color:#274439"></i><span class="menu-title" data-i18n="" style="color:#274439"> My Purchase</span></a>
                </li>


                <li class=" nav-item cat-list-mobile @if(\Route::currentRouteName() == 'notification.index') active @endif"><a href="{{route('notification.index')}}"><i class="fa fa-bell mr-3" aria-hidden="true" style="color:#274439"></i><span class="menu-title" data-i18n="" style="color:#274439"> Notifications</span></a>
                </li>

                <li class=" nav-item cat-list-mobile @if(\Route::currentRouteName() == 'voucher.index') active @endif"><a href="{{route('voucher.index')}}"><i class="fa fa-ticket mr-3" aria-hidden="true" style="color:#274439"></i><span class="menu-title" data-i18n="" style="color:#274439"> My Vouchers</span></a>
                </li>

        </ul>
		
	</div>
	
	  
</div>



@section('vendor')
    <script src="{{asset('js/vendors.min.js')}}"></script>
@endsection


@section('script')
    <!-- BEGIN: Theme JS-->
    <script>
        $(document).on("click", ".editAddressModal", function (e) {


            var eventId = $(this).data('id');


            var url = `{{route('/')}}` + '/address/' + eventId + '/edit';



            $.ajax({
                type:'GET',
                url:url ,
                data: {
                    '_token' : '<?php echo csrf_token() ?>',

                },
                success:function(data){
                    $('#myModal2').modal('show');
                    $("#modal-edit-address").html(data);

                },
                error:function(data){
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
        })
    </script>
    <script src="{{asset('js/app-menu.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery.raty.js')}}"></script>
    <script>
        $(document).ready(function(){

            $(document).on("click", ".ratingModal", function (e) {

                var eventId = $(this).data('id');
                var eventVendor = $(this).data('vendor');

                var url = `{{route('getOrder')}}`;



                $.ajax({
                    type:'POST',
                    url:url ,
                    data: {
                        '_token' : '<?php echo csrf_token() ?>',
                        'order_id' : eventId,
                        'vendor_id' : eventVendor,

                    },
                    success:function(data){
                        $('#viewrating').modal('show');
                        $("#modal-viewrating").html(data);

                    },
                    error:function(data){
                        // alert('error');
                        alert(JSON.stringify(data));
                    }
                });
            });

            $.fn.raty.defaults.path = "raty/";

// No Rated Message
            $('#no-rated-msg').raty({

                click: function(score) {
                    document.getElementById("scorerating").value = score;
                }


            });



        });
    </script>
    <script>
        $(document).on("click",".editStaff-modals", function(e){
            //alert('ok');
            var eventId = $(this).data('id');
            //{{--var url = '{{url('/')}}' + 'editRefund/' + eventId;--}}

            var url = '{{route('/')}}' + '/editRefund/' + eventId;
            //alert(eventId);

            $.ajax({
                type:'GET',
                url:url ,
                data: {
                    '_token' : '<?php echo csrf_token() ?>',
                },
                success:function(data){

                    $('#editStaff').modal('show');
                    $("#editStaffs").html(data);
                },
                error:function(data){
                    //alert('error');
                    //alert(JSON.stringify(data));
                }
            });
        });
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