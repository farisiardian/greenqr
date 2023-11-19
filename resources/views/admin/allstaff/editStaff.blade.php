<!---------Modal----------->
            <form action="{{route('updateStaff')}}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Staff</h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row mx-3">
                        <div class="mb-3 col-md-6">
                            <label for="staffID" class="form-label">Staff ID</label>
                            <input disabled class="form-control" type="text" id="staffID" name="staffID" value="{{isset($staff) ? $staff->staff_id : ''}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <input hidden class="form-control" type="text" id="id" name="id" value="{{isset($staff) ? $staff->id : ''}}"   />
                            <label for="staffName" class="form-label">Staff Name</label>
                            <input class="form-control" type="text" id="staffName" name="staffName" value="{{isset($staff) ? $staff->name : ''}}"   />
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <input class="form-control" type="text" name="department" id="department" value="{{isset($staff) ? $staff->dept : ''}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="position" class="form-label">Position</label>
                            <input class="form-control" type="text" name="position" id="position" value="{{isset($staff) ? $staff->position : ''}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input class="form-control" type="number" name="phone" id="phone"  value="{{isset($staff) ? $staff->phone : ''}}"/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{isset($staff) ? $staff->email : ''}}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" name="password" id="password" value="{{isset($staff) ? $staff->password : ''}}" />
                            <input type="checkbox" onclick="myFunction()">Show Password
{{--                            <a id="generate" class="btn btn-sm btn-outline-primary mt-2 text-primary">Generate</a>--}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>

            </form>

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


