@extends('layouts.admin')
@section('content')
    <!-- Modal Edit Vendor -->
    <div class="modal fade text-left" id="editMerchant" tabindex="-1" role="dialog" aria-labelledby="editMerchant" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div id="editMerchants">
                    Edit User Display
                </div>
            </div>
        </div>
    </div>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!--          <h4 class="fw-bold py-3 mb-4">-->
            <!--            <span class="text-muted fw-light"></span> Return/Refund-->
            <!--          </h4>-->

            <div class="row">
                <div class="demo-inline-spacing mt-3">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-sample form-row" method="get" action="{{route('merchant.index')}}">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="userName" class="form-label">User Name</label>
                                        <input class="form-control" type="text" id="searchName" name="userName" value="{{isset($userName) ? $userName : ''}}" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="userEmail" class="form-label">Email Address</label>
                                        <input class="form-control" type="email" id="searchEmail" name="userEmail" value="{{isset($userEmail) ? $userEmail : ''}}" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" name="status" >
                                            <option value="" @if(!isset($status)) selected @endif >All</option>
                                            <option value="1" @if(isset($status) && $status == 1) selected @endif>Active</option>
                                            <option value="0" @if(isset($status) && $status == 0) selected @endif>Suspended</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="col-form-label">Registered Date</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-control" type="date" value="{{isset($startDate) ? \Carbon\Carbon::parse($startDate)->isoFormat('YYYY-MM-DD') : ''}}" name="startDate" id="startDate" />
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="date" value="{{isset($endDate) ? \Carbon\Carbon::parse($endDate)->isoFormat('YYYY-MM-DD') : ''}}" name="endDate" id="endDate" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-2">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Custom content with heading -->
                <!--            <div class="col d-flex justify-content-end">-->
                <!--              <button type="button" class="btn btn-primary m-1">-->
                <!--                <span class="tf-icons bx bx-download"></span> Export-->
                <!--              </button>-->
                <!--            </div>-->
                <div class="col-lg-12">
                    <div class="demo-inline-spacing mt-3">

                        <div class="card">
                            <h4 class="card-header">Merchant List</h4>
                            <hr class="my-0" />
                            <div class="card-body">
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            {{--                                <i class='bx bx-minus'></i>--}}
                                        </button>
                                        <strong>Success !</strong> {{ session('success') }}
                                    </div>
                                @endif

                                @if (Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            {{--                                <i class='bx bx-minus'></i>--}}
                                        </button>
                                        <strong>Error !</strong> {{ session('error') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Merchant Name</th>
                                            <th>Email Address</th>
                                            <th>Phone</th>
                                            <th>Registered Date</th>
                                            <th>Last Login Date</th>
                                            <th>Merchant Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>
                                                <img src="{{asset('storage/'.$user->profile_image)}}" width="30px" class="me-2 rounded-circle border"/>
                                                <strong>{{$user->name}}</strong>
                                            </td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>N/A</td>
                                            <td>
                                                @if($user->status == 1)
                                                    <span class="badge bg-label-primary me-1">Active</span>
                                                @else
                                                    <span class="badge bg-label-danger me-1">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <a data-toggle="modal" href="#" data-target="#editMerchant" class="editMerchant-modals" data-id="{{$user->id}}"><i class="bx bx-edit me-1"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--/ Custom content with heading -->
            </div>

        </div>
        <!-- Add Content Here -->
    </div>
    <!-- / Content -->
@endsection

@section('script')
    <script>
        $(document).on("click",".editMerchant-modals", function(e){
            // alert('ok');
            var eventId = $(this).data('id');
            var url = '{{route('/')}}' + '/viewMerchant/' + eventId;
            //alert(eventId);

            $.ajax({
                type:'GET',
                url:url ,
                data: {
                    '_token' : '<?php echo csrf_token() ?>',
                },
                success:function(data){
                    $('#editMerchant').modal('show');
                    $("#editMerchants").html(data);
                },
                error:function(data){
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
        });
    </script>
@endsection
