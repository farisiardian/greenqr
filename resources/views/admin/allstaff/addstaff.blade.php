@extends('layouts.admin')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!--                    <h4 class="fw-bold py-3 mb-4">-->
            <!--                        <span class="text-muted fw-light">Staff Management/ </span> Add Staff-->
            <!--                    </h4>-->
            <!-- Add Content Here -->
            <div class="card mb-4">
                <h4 class="card-header">Add New Staff</h4>
                <!-- Account -->
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
                    <form action="{{route('addnewstaff')}}" method="POST" onsubmit="return true">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="staffName" class="form-label">Staff Name</label>
                                <input class="form-control" type="text" id="staffName" name="staffName" required />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="staffID" class="form-label">Staff ID</label>
                                <input class="form-control" type="text" id="staffID" name="staffID" readonly value="{{$staffId}}"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="department" class="form-label">Department</label>
                                <input class="form-control" type="text" name="department" id="department" required/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="position" class="form-label">Position</label>
                                <input class="form-control" type="text" name="position" id="position" required/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input class="form-control" type="number" name="phone" id="phone" required/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input class="form-control" type="text" name="email" id="email" required/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" id="password" value="{{$password}}"/>
								<div class="d-flex align-items-center mt-2">
									<input class="me-2" type="checkbox" onclick="myFunction()">Show Password
								</div>
{{--                                <a href="" id="generate" class="btn btn-sm btn-outline-primary mt-2 text-primary">Generate</a>--}}
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
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
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
