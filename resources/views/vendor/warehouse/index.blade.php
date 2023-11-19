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
    <!---------Modal----------->
    <div class="modal fade" id="addBank" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Create Warehouse</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('addWarehouse')}}" id="addWarehouse" method="POST">
                        @csrf
                        <div class="row">
                            <div hidden class="mb-3 col-md-6">
                                <label for="bankName" class="form-label">Warehouse Code</label>
                                <input readonly class="form-control" type="text" id="wcode" name="wcode" required value="{{$wcode}}" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="fullName" class="form-label">Location</label>
                                <input class="form-control" type="text" id="location" name="location"   required  autofocus />
                            </div>
							<div class="mb-3 col-md-6">
								<label for="address" class="form-label">Address</label>
								<input class="form-control" type="text" id="address" name="address" required autofocus />
							</div>
							<div class="mb-3 col-md-6">
								<label for="city" class="form-label">City</label>
								<input class="form-control" type="text" id="city" name="city" required autofocus />
							</div>
							<div class="mb-3 col-md-6">
								<label for="postcode" class="form-label">Postcode</label>
								<input class="form-control" type="text" id="postcode" name="postcode" required autofocus />
							</div>
                            <div class="mb-3 col-md-12">
                                <label for="accountNo" class="form-label">Warehouse Name</label>
                                <input class="form-control" rows="3" type="text" name="warehouse_name" required  id="warehouse_name" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="fullName" class="form-label">Warehouse Owner</label>
                                <input class="form-control" type="text" id="fullName" name="fullName"  required   autofocus />
                            </div>
							<div class="mb-3 col-md-6">
                            <label for="pickup" class="form-label">Allow Pickup</label>
                            <select name="pickup" id="pickup" class="select2 form-select">
                                <option value="">Select</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                            <div class="mb-3 col-md-6">
                                <label for="fullName" class="form-label">Contact Number</label>
                                <input class="form-control" type="text" id="contact_number" name="contact_number"   required  autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" required  class="select2 form-select">
                                    <option value="">Select</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">InActive</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!---------Modal----------->
{{--    <div class="modal fade" id="editWarehousePre" tabindex="-1" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="modalCenterTitle">Edit Warehouse test</h5>--}}
{{--                    <button--}}
{{--                        type="button"--}}
{{--                        class="btn-close"--}}
{{--                        data-bs-dismiss="modal"--}}
{{--                        aria-label="Close"--}}
{{--                    ></button>--}}
{{--                </div>--}}
{{--update here--}}
{{--                <div class="modal-body">--}}
{{--                  --}}{{--  <form action="{{route('updateWarehouse',['id'=>$warehouse[0]->id])}}" id="edit-form{{$warehouse[0]->id}}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" name="warehouse" value="{{$warehouse[0]->id}}">--}}
{{--                        <div class="row">--}}
{{--                            <div hidden class="mb-3 col-md-6">--}}
{{--                                <label for="bankName" class="form-label">Warehouse Code</label>--}}
{{--                                <input readonly class="form-control" type="text" id="wcode" name="wcode" required value="{{$wcode}}" />--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 col-md-12">--}}
{{--                                <label for="fullName" class="form-label">Location</label>--}}
{{--                                <input class="form-control" type="text" id="location" name="location"   required  autofocus />--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 col-md-12">--}}
{{--                                <label for="accountNo" class="form-label">Warehouse Name</label>--}}
{{--                                <input class="form-control" rows="3" type="text" name="warehouse_name" required id="warehouse_name" />--}}
{{--                            </div>--}}

{{--                            <div class="mb-3 col-md-12">--}}
{{--                                <label for="fullName" class="form-label">Warehouse Owner</label>--}}
{{--                                <input class="form-control" type="text" id="fullName" name="fullName"  required   autofocus />--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 col-md-6">--}}
{{--                                <label for="fullName" class="form-label">Contact Number</label>--}}
{{--                                <input class="form-control" type="text" id="contact_number" name="contact_number"   required  autofocus />--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 col-md-6">--}}
{{--                                <label for="status" class="form-label">Status</label>--}}
{{--                                <select name="status" id="status" required  class="select2 form-select">--}}
{{--                                    <option value="">Select</option>--}}
{{--                                    <option value="Active">Active</option>--}}
{{--                                    <option value="Inactive">InActive</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">--}}
{{--                        Close--}}
{{--                    </button>--}}
{{--                    <button type="submit" class="btn btn-primary">Save Changes</button>--}}
{{--                </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!--          <h4 class="fw-bold py-3 mb-4">-->
            <!--            Sales-->
            <!--          </h4>-->

            <div class="row">
                <div class="col d-flex justify-content-end">
                    {{--                    <button type="button" class="btn btn-primary m-1">--}}
                    {{--                        <span class="tf-icons bx bx-download"></span> Export--}}
                    {{--                    </button>--}}
                    <a hidden class="btn btn-primary" href="{{route('export-sales') }}">Export Users</a>
                </div>
                <div class="col-lg-12 mb-4">
                    <div class="demo-inline-spacing mt-3">
                        <div class="card pb-3">
                            <div class="col-sm-4">
                                <div class="card-body">
                                    <button id="addBankCard" class="btn btn-primary d-flex align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#addBank"><i class="bx bx-plus me-1"></i>Create Warehouse</button>
                                </div>
                            </div>
                            <h4 class="card-header">Warehouse</h4>
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
                                <div class="table-responsive" style="padding-bottom:100px">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th style="color:blue">Warehouse Name</th>
                                            <th style="color:blue">Contact Number</th>
                                            <th style="color:blue">Warehouse Code</th>
                                            <th style="color:blue">Warehouse Location</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($warehouse as $key => $view)
                                            <tr>
                                                <th>{{$key+1}}</th>
                                                <td>{{$view->warehouse_name}}</td>
                                                <td>{{$view->contact_number}}</td>
                                                <td>{{$view->warehouse_code}}</td>
                                                <td>{{$view->location}}</td>
                                                <td>{{$view->status}}</td>
												<td>
													<div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">

                                                            <a href="#" data-toggle="modal" data-target="#editStaff" data-id="{{$view->id}}" class="dropdown-item editStaff-modals"><i class="bx bx-edit me-1"></i>Edit</a>

{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editWarehouse" href="#editWarehouse" data-id="{{$view->id}}" class="editWarehouse-modals"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}

                                                            <a class="dropdown-item" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-form-{{$view->id}}').submit()}"><i class="bx bx-trash me-1"></i>Delete</a>
                                                            <form id="delete-form-{{$view->id}}" action="{{route('warehouse.destroy',['warehouse' => $view->id])}}" method="post">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                @csrf
                                                            </form>


                                                        </div>
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
            </div>



        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
        @section('script')
            <script>
                $(document).on("click",".editStaff-modals", function(e){
                    // alert('ok');
                    var eventId = $(this).data('id');
                    var url = '{{route('/')}}' + '/editWarehouse/' + eventId;
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
