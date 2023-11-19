@extends('layouts.admin')
@section('content')
    <!-- Modal Edit User -->
    <div class="modal fade text-left" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div id="editUsers">
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
            <!--            <span class="text-muted fw-light"></span> My Orders-->
            <!--          </h4>-->

            <div class="row">
                <div class="demo-inline-spacing mt-3">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-sample form-row" method="get" action="{{route('user.index')}}">
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
                                            <option value="0" @if(isset($status) && $status == 0) selected @endif>Inactive</option>
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
                                    <div class="mb-3 col-md-6">
                                        <label class=" col-form-label">Last Login Date</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-control" type="date" value="" id="startLoginDate" />
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="date" value="" id="endLoginDate" />
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
                <!--                <div class="col d-flex justify-content-end">-->
                <!--                  <button type="button" class="btn btn-primary m-1">-->
                <!--                    <span class="tf-icons bx bx-download"></span> Export-->
                <!--                  </button>-->
                <!--                </div>-->
                <div class="col-lg-12">
                    <div class="demo-inline-spacing mt-3">
                        <div class="card">
                            <h4 class="card-header">User List</h4>
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
                                            <th>User Name</th>
                                            <th>Email Address</th>
                                            <th>Phone</th>
                                            <th>Registered Date</th>
                                            <th>Last Login Date</th>
                                            <th>User Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td><strong>{{$user->name}}</strong></td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>N/A</td>
                                            <td>
                                                @if($user->status == 1)
                                                    <span class="badge bg-label-primary me-1">Active</span>
                                                @elseif($user->status == 0)
                                                    <span class="badge bg-label-danger me-1">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <a data-toggle="modal" href="#" data-id="{{$user->id}}" data-target="#editUser" class="editUser-modals"><i class="bx bx-edit me-1"></i></a>
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
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
@section('script')
    <script>
        $(document).on("click",".editUser-modals", function(e){
            // alert('ok');
            var eventId = $(this).data('id');
            var url = '{{route('/')}}' + '/viewUser/' + eventId;
            //alert(eventId);

            $.ajax({
                type:'GET',
                url:url ,
                data: {
                    '_token' : '<?php echo csrf_token() ?>',
                },
                success:function(data){
                    $('#editUser').modal('show');
                    $("#editUsers").html(data);
                },
                error:function(data){
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
        });
    </script>
@endsection
