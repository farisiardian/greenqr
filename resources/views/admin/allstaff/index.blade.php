@extends('layouts.admin')
@section('content')
    <!-- Modal Edit Staff -->
    <div class="modal fade text-left" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="editStaff" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div id="editStaffs">
                    asdsadas
                </div>
            </div>
        </div>
    </div>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!--          <h4 class="fw-bold py-3 mb-4">-->
            <!--            <span class="text-muted fw-light"></span> All Staffs-->
            <!--          </h4>-->
            <div class="row">
                <div class="demo-inline-spacing mt-3">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-sample form-row" method="get" action="{{route('allstaff.index')}}">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="searchName" class="form-label">Staff Name</label>
                                        <input class="form-control" type="search" id="searchName" name="userName" value="{{isset($userName) ? $userName : ''}}"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="searchEmail" class="form-label">Email Address</label>
                                        <input class="form-control" type="email" id="searchEmail" name="userEmail" value="{{isset($userEmail) ? $userEmail : ''}}"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="searchDepartment" class="form-label">Department</label>
                                        <input class="form-control" type="text" id="searchDepartment" name="department" value="{{isset($department) ? $department : ''}}"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="searchPosition" class="form-label">Position</label>
                                        <input class="form-control" type="text" id="searchPosition" name="position" value="{{isset($position) ? $position : ''}}"/>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" name="status" >
                                            <option value="" @if(!isset($status)) selected @endif >All</option>
                                            <option value="Active" @if(isset($status) && $status == 'Active') selected @endif>Active</option>
                                            <option value="Inactive" @if(isset($status) && $status == 'Inactive') selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="col-form-label">Registered Date</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input class="form-control" type="date" value="{{isset($startDate) ? \Carbon\Carbon::parse($startDate)->isoFormat('YYYY-MM-DD') : ''}}" id="startDate" name="startDate"/>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="form-control" type="date" value="{{isset($endDate) ? \Carbon\Carbon::parse($endDate)->isoFormat('YYYY-MM-DD') : ''}}" id="endDate" name="endDate"/>
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
                        <div class="card pb-3">
                            <h4 class="card-header">All Staffs</h4>

                            <hr class="my-0" />
                            <div class="card-body ">
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
                                            <th>Staff ReffNo</th>
                                            <th>Staff ID</th>
                                            <th>Staff Name</th>
                                            <th>Department</th>
                                            <th>Position</th>
                                            <th>Staff Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->staff_id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->dept}}</td>
                                            <td>{{$user->position}}</td>
                                            <td>
                                                @if($user->status == 'Active')
                                                    <span class="badge bg-label-primary me-1">Active</span>
                                                @else
                                                    <span class="badge bg-label-danger me-1">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="#" data-toggle="modal" data-target="#editStaff" data-id="{{$user->id}}" class="editStaff-modals"><i class="bx bx-edit me-1"></i></a>
{{--                                                    <a href={{"delete/".$user->id}}><i class="bx bx-trash"></i></a>--}}
                                                    <form action="{{route('deleteStaff',['id'=>$user->id])}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to Delete?')">
                                                        @csrf
                                                        <button class="btn btn-sm" ><i class="bx bx-trash"></i></button>
                                                    </form>
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
        $(document).on("click",".editStaff-modals", function(e){
            // alert('ok');
            var eventId = $(this).data('id');
            var url = '{{route('/')}}' + '/viewStaff/' + eventId;
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
