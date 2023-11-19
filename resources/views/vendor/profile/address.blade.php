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
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Account Settings /</span> Shop Address
        </h4>
        <div class="row">
            <div class="col-md-12">
                @include('vendor.profile.tabbar')
                <!-- Custom content with heading -->
                    <div class="col-lg-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Address</th>
                                            <th>Address Type</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($address as $addresses)
                                        <tr>
                                            <td>
                                                <strong>{{$addresses->address.', '.$addresses->postalcode.', '.$addresses->city.', '.$addresses->state}}</strong><br>
                                                <p>{{ $addresses->name.', '.$addresses->email.', '.$addresses->phone }}</p>
                                            </td>
                                            <td>@if($addresses->default_address == 1)<span class="badge bg-label-primary me-1">Default Address</span> @endif</td>
                                            <td>
                                                <div>
                                                    <a href="#" data-toggle="modal" data-target="#editStaff" data-id="{{$addresses->id}}" class="editStaff-modals"><i class="bx bx-edit me-1"></i></a>
                                                    {{--                                                    <a href={{"delete/".$user->id}}><i class="bx bx-trash"></i></a>--}}
{{--                                                    <form action="{{route('deleteStaff',['id'=>$addresses->id])}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to Delete?')">--}}
{{--                                                        @csrf--}}
{{--                                                        <button class="btn btn-sm" ><i class="bx bx-trash"></i></button>--}}
{{--                                                    </form>--}}
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
                    <!--/ Custom content with heading -->

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Add Shop Address</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('address.store')}}">
                                    @csrf
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label">Address</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="address" class="form-control" name="address" placeholder="Address" aria-describedby="address" />
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label for="state" class="form-label">State</label>
                                        <select name="state" id="state" class="select2 form-select">
                                            <option value="Select">Select</option>
                                            @foreach($state as $states)
                                                <option value="{{$states->name}}" >{{$states->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label">City</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="city" class="form-control" name="city" placeholder="Enter City" aria-describedby="city" />
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label">Postcode</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="postcode" class="form-control" name="postal_code" placeholder="Enter Postcode" aria-describedby="postcode" />
                                        </div>
                                    </div>
                                    <label class="mb-3 form-label">Set As</label>
                                    <div class=" mb-3 form-check form-switch">
                                        <input class="form-check-input" name="default_address" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Default Address</label>
                                    </div>
{{--                                    <div class="form-check form-switch mb-4">--}}
{{--                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>--}}
{{--                                        <label class="form-check-label" for="flexSwitchCheckChecked">Pickup Address</label>--}}
{{--                                    </div>--}}
                                    <hr class="my-0" />

                                    <div class=" my-4">
                                        <h5 class="mb-0">Contact Detail</h5>
                                    </div>

                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label">Name</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Enter Name" aria-describedby="name" />
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label">Email Address</label>
                                        <div class="input-group input-group-merge">
                                            <input type="email" id="email" class="form-control" name="email" placeholder="Enter Email" aria-describedby="email" />
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label">Phone Number</label>
                                        <div class="input-group input-group-merge">
                                            <input type="number" id="phone" class="form-control" name="phone" placeholder="Enter Phone Number" aria-describedby="phone" />
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>




            </div>
        </div>


    </div>

    <!-- / Content -->
@endsection
@section('script')
    <script>
        $(document).on("click",".editStaff-modals", function(e){
            // alert('ok');
            var userId = $(this).data('id');
            var url = '{{route('/')}}' + '/editAddress2/' + userId;
            //alert(userId);

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
