@extends('layouts.app')

@section('addstyle')
    <style>
        .shipName{
            color: black;
            font-weight: 500;
        }
        .shipAddress{
            color: black;
            font-size: 12px;
        }
        .shipPhone{
            color: #9E9E9E;
            font-size: 12px;
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
	@media (max-width: 767px){
		.button{
			padding:8px 10px !important
		}
	}
	.button {
    display: inline-block;
    border: 1px solid #1FA33D;
    border-radius: 30px;
    color: #222;
    font-weight: 500;
    padding: 12px 50px;
    background: #274439;
    color: #fff;
    transition: all .4s ease
}

    </style>
@endsection

@section('content')

	
	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
    <!-- The Modal Add Address -->
    <div class="modal" id="addAddress" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#293A8B;">New Address</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form method="POST" action="{{route('address.store')}}">
                    @csrf

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">

                                <input type="text" name="name" class="form-control" id="fullname" placeholder="Full Name">
                            </div>
                            <div class="form-group col-md-6">

                                <input type="text" name="phone" class="form-control" id="mobile" placeholder="Number Phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State,Area'">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" id="housenumber" placeholder="House Number, Building, Street Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'House Number, Building, Street Name'">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="postal_code" id="postalcode" placeholder="Postal Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postal Code'">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="city" id="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="state" id="state">
                                    <option>Select State</option>
                                    @foreach($state as $states)
                                        <option value="{{$states->name}}">{{$states->name}}</option>
                                    @endforeach
                                </select>
                                {{--                                <input type="text" class="form-control" name="state" id="state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'">--}}
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <input type="text" class="form-control" id="unitno" placeholder="Unit No (Optional)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Unit No (Optional)'">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group row">--}}
                        {{--                            <label class="col-md-3">Label as :</label>--}}
                        {{--                            <div class="col-md-9">--}}
                        {{--                                <div class="input-group">--}}
                        {{--                                    <div class="d-inline-block custom-control custom-radio mr-1">--}}
                        {{--                                        <input type="radio" name="customer1" class="custom-control-input" checked id="yes">--}}
                        {{--                                        <label class="custom-control-label" for="yes">Home</label>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="d-inline-block custom-control custom-radio">--}}
                        {{--                                        <input type="radio" name="customer1" class="custom-control-input" id="no">--}}
                        {{--                                        <label class="custom-control-label" for="no">Work</label>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="form-check">
                            <input type="checkbox" name="default_address" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Set as Default Address</label>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End Modal Add Address -->
    <!--================ End Modal =================-->
    <!-- Second Modal -->
    <div class="modal fade" id="myModal2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#274439;">Edit Address</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div><div class="container"></div>
                <div id="modal-edit-address">

                </div>
            </div>
        </div>
    </div>
    <!-- End Second Modal  -->

    <!--================Desktop Area =================-->
    <section class="setting-area d-none d-xl-block">
        <div class="container">
            <div class="row">


                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="content-address">
                        <div class="cart_inner">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#274439;">Addresses</th>
                                        <th scope="col">
                                            <button type="button" style="background-color:#274439;font-family: -apple-system, BlinkMacSystemFont, sans-serif;" class="button img-button" data-toggle="modal" data-target="#addAddress">
                                                <i class="fa fa-plus-square-o mr-2" aria-hidden="true" ></i>  Add New Addresses
                                            </button>
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($address as $addresses)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <p>{{$addresses->name}}</p>
                                                    </div>
                                                    <div class="">
                                                        <p>{{$addresses->phone}}</p>
                                                    </div>
                                                </div>
                                                <p>{{$addresses->address}} {{$addresses->postalcode}} {{$addresses->city}},
                                                    {{$addresses->state}} </p>
                                            </td>
                                            <td>

                                                <div class="media">
                                                    <div class="d-flex">
                                                        <a data-toggle="modal" href="#" data-target="#myModal2" data-id="{{$addresses->id}}"  class=" editAddressModal"><i class="fa fa-lg fa-edit" style="color:#1FA33D"></i></a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="#" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-form-{{$addresses->id}}').submit()};" class=""><i class="fa fa-lg fa-trash" style="color:#dc3545"></i></a>
                                                        <form id="delete-form-{{$addresses->id}}" action="{{route('address.destroy',['address' => $addresses->id])}}" method="post">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                                @if($addresses->default_address == 0)
                                                    <a href="{{route('setDefault',['id'=>$addresses->id])}}" class="badge-primary p-2 rounded">Set as Default</a>
                                                @endif


                                            </td>

                                        </tr>
                                    @endforeach
                                    {{--                                    <tr>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <div class="media">--}}
                                    {{--                                                <div class="d-flex">--}}
                                    {{--                                                    <p>Noor Aqilah Ahmad</p>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="">--}}
                                    {{--                                                    <p>(+60) 135123555</p>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <p>159 Taman Mawar, Jalan Gangsa 05150 Alor Setar, Kedah</p>--}}
                                    {{--                                        </td>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <div class="media">--}}
                                    {{--                                                <div class="d-flex">--}}
                                    {{--                                                    <a href="#" class="badge badge-warning">Edit</a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="d-flex">--}}
                                    {{--                                                    <a href="#" class="badge badge-danger">Delete</a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <a href="#" >Set as Default</a>--}}
                                    {{--                                        </td>--}}

                                    {{--                                    </tr>--}}


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<!--================Tab Area =================-->
    <section class="setting-area d-none d-sm-block d-xl-none">
        <div class="container">
            <div class="row">


                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="content-address">
                        <div class="cart_inner">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight:600;color:#274439;">Addresses</th>
                                        <th scope="col">
                                            <button type="button" style="background-color:#274439;font-family: -apple-system, BlinkMacSystemFont, sans-serif;" class="button img-button" data-toggle="modal" data-target="#addAddress">
                                                <i class="fa fa-plus-square-o mr-2" aria-hidden="true" ></i>  Add New Addresses
                                            </button>
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($address as $addresses)
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <p>{{$addresses->name}}</p>
                                                    </div>
                                                    <div class="">
                                                        <p>{{$addresses->phone}}</p>
                                                    </div>
                                                </div>
                                                <p>{{$addresses->address}} {{$addresses->postalcode}} {{$addresses->city}},
                                                    {{$addresses->state}} </p>
                                            </td>
                                            <td>

                                                <div class="media">
                                                    <div class="d-flex">
                                                        <a data-toggle="modal" href="#" data-target="#myModal2" data-id="{{$addresses->id}}"  class=" editAddressModal"><i class="fa fa-lg fa-edit" style="color:#1FA33D"></i></a>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="#" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-form-{{$addresses->id}}').submit()};" class=""><i class="fa fa-lg fa-trash" style="color:#dc3545"></i></a>
                                                        <form id="delete-form-{{$addresses->id}}" action="{{route('address.destroy',['address' => $addresses->id])}}" method="post">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                                @if($addresses->default_address == 0)
                                                    <a href="{{route('setDefault',['id'=>$addresses->id])}}" class="badge-primary p-2 rounded">Set as Default</a>
                                                @endif


                                            </td>

                                        </tr>
                                    @endforeach
                                    {{--                                    <tr>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <div class="media">--}}
                                    {{--                                                <div class="d-flex">--}}
                                    {{--                                                    <p>Noor Aqilah Ahmad</p>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="">--}}
                                    {{--                                                    <p>(+60) 135123555</p>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <p>159 Taman Mawar, Jalan Gangsa 05150 Alor Setar, Kedah</p>--}}
                                    {{--                                        </td>--}}
                                    {{--                                        <td>--}}
                                    {{--                                            <div class="media">--}}
                                    {{--                                                <div class="d-flex">--}}
                                    {{--                                                    <a href="#" class="badge badge-warning">Edit</a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div class="d-flex">--}}
                                    {{--                                                    <a href="#" class="badge badge-danger">Delete</a>--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <a href="#" >Set as Default</a>--}}
                                    {{--                                        </td>--}}

                                    {{--                                    </tr>--}}


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
    <!--================Mobile Area =================-->
    <section class="setting-area d-block d-sm-none">
        <div class="container">
            <div class="row">


                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="content-address">
                        <div class="cart_inner">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#274439;">My Addresses</h4>
                                    <button type="button" class="button img-button" data-toggle="modal" data-target="#addAddress">
                                        <i class="fa fa-plus-square-o mr-2" aria-hidden="true"></i>  Add Address
                                    </button>

                            </div>
                            <div style="border-bottom:solid 1px #384AEB;padding: 10px 0">
                                @foreach($address as $addresses)
                                    <div>
                                        <div class="d-flex">
                                            <p class="shipName">{{$addresses->name}} <span class="shipPhone ml-2">({{$addresses->phone}})</span></p>
                                        </div>
                                        <p class="shipAddress">{{$addresses->address}} {{$addresses->postalcode}} {{$addresses->city}},
                                            {{$addresses->state}} </p>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="media d-flex align-items-center">
                                            <div class="d-flex px-2">
                                                <a data-toggle="modal" href="#" data-target="#myModal2" data-id="{{$addresses->id}}"  class="editAddressModal"><i class="fa fa-lg fa-edit" style="color:#1FA33D"></i></a>
                                            </div>
                                            <div class="d-flex px-2">
                                                <a href="#" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-form-{{$addresses->id}}').submit()};" class=""><i class="fa fa-lg fa-trash" style="color:#dc3545"></i></a>
                                                <form id="delete-form-{{$addresses->id}}" action="{{route('address.destroy',['address' => $addresses->id])}}" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                        @if($addresses->default_address == 0)
                                            <a href="{{route('setDefault',['id'=>$addresses->id])}}" class="badge-primary p-2 rounded">Set as Default</a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    {{--    <script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>--}}
    <script>
        // (function (window, document, $) {
        //     'use strict';
        //     $('#edit-modal').click(function(e) {
        //         e.preventDefault();
        //         alert(1)
        //     })
        // })(window, document, jQuery);

        // $('#edit-modal').on('click', function (){
        //     alert(1);
        // })
        {{--(function(window, document, $) {--}}

        {{--    $('.editAddressModal').on("click", function (e) {--}}

        {{--        alert('eventId');--}}

        {{--        var eventId = $(this).data('id');--}}


        {{--        var url = `{{route('/')}}` + '/address/' + eventId + '/edit';--}}



        {{--        $.ajax({--}}
        {{--            type:'GET',--}}
        {{--            url:url ,--}}
        {{--            data: {--}}
        {{--                '_token' : '<?php echo csrf_token() ?>',--}}

        {{--            },--}}
        {{--            success:function(data){--}}
        {{--                $('#myModal2').modal('show');--}}
        {{--                $("#modal-edit-address").html(data);--}}

        {{--            },--}}
        {{--            error:function(data){--}}
        {{--                // alert('error');--}}
        {{--                // alert(JSON.stringify(data));--}}
        {{--            }--}}
        {{--        });--}}
        {{--    })--}}
        {{--})(window, document, jQuery);--}}

        {{--$(document).on("click", ".editAddressModal", function (e) {--}}

        {{--    alert('eventId');--}}

        {{--    var eventId = $(this).data('id');--}}


        {{--    var url = `{{route('/')}}` + '/address/' + eventId + '/edit';--}}



        {{--    $.ajax({--}}
        {{--        type:'GET',--}}
        {{--        url:url ,--}}
        {{--        data: {--}}
        {{--            '_token' : '<?php echo csrf_token() ?>',--}}

        {{--        },--}}
        {{--        success:function(data){--}}
        {{--            $('#myModal2').modal('show');--}}
        {{--            $("#modal-edit-address").html(data);--}}

        {{--        },--}}
        {{--        error:function(data){--}}
        {{--            // alert('error');--}}
        {{--            // alert(JSON.stringify(data));--}}
        {{--        }--}}
        {{--    });--}}
        {{--})--}}

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
