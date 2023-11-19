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
</style>
<div class="col d-block d-sm-none">
    <div class="card">
        <h5 class="card-header">My Profile</h5>
        <div class="card-body text-center">
          <h5 class="card-title">Download LifeCare App Now</h5>
          <p class="card-text">Switch to App to view details of your profile</p>
          <a href="#" class="button">Get the App </a>
        </div>
      </div>
</div>
<div class="col-lg-3 d-none d-xl-block">
    <div class="main-menu menu-light menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content ">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                <li class=" nav-item"><a href="#"><i class="fa fa-user" aria-hidden="true"></i><span class="menu-title" data-i18n=""> My Account</span></a>
                    <ul class="menu-content">
                        <li class="@if(\Route::currentRouteName() == 'profile.index') active @endif"><a class="menu-item" href="{{route('profile.index')}}" data-i18n=""> Profile</a>
                        </li>
                        <li class="@if(\Route::currentRouteName() == 'address.index') active @endif"><a class="menu-item " href="{{route('address.index')}}" data-i18n=""> Addresses</a>
                        </li>
                        <li class="@if(\Route::currentRouteName() == 'changepw') active @endif"><a class="menu-item" href="{{route('changepw')}}" data-i18n=""> Change Password</a>
                        </li>

                    </ul>
                </li>

                <li class=" nav-item @if(\Route::currentRouteName() == 'mypurchase.index') active @endif"><a href="{{route('mypurchase.index')}}"><i class="fa fa-list-alt" aria-hidden="true"></i><span class="menu-title" data-i18n=""> My Purchase</span></a>
                </li>


                <li class=" nav-item @if(\Route::currentRouteName() == 'notification.index') active @endif"><a href="{{route('notification.index')}}"><i class="fa fa-bell" aria-hidden="true"></i><span class="menu-title" data-i18n=""> Notifications</span></a>
{{--                    <ul class="menu-content">--}}
{{--                        <li class="@if(\Route::currentRouteName() == 'order_update') active @endif"><a class="menu-item" href="{{route('order_update')}}" data-i18n=""> Order updates</a>--}}
{{--                        </li>--}}
{{--                        <li class="@if(\Route::currentRouteName() == 'rating') active @endif"><a class="menu-item" href="{{route('rating')}}" data-i18n=""> Ratings</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </li>

                <li class=" nav-item @if(\Route::currentRouteName() == 'voucher.index') active @endif"><a href="{{route('voucher.index')}}"><i class="fa fa-ticket" aria-hidden="true"></i><span class="menu-title" data-i18n=""> My Vouchers</span></a>
                </li>

            </ul>
        </div>
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
            {{--var url = '{{url('/')}}' + 'editRefund/' + eventId;--}}

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
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
        });
    </script>
@endsection
