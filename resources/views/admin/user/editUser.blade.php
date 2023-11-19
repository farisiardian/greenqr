<!---------Modal----------->
<form action="{{route('updateUser')}}" method="POST">
    @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="editUser">Edit User</h5>
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
                        <label for="userName" class="form-label">User Name</label>
                        <input hidden class="form-control" type="text" id="id" name="id" value="{{isset($view) ? $view->id : ''}}"  />
                        <input class="form-control" type="text" id="userName" name="userName" value="{{isset($view) ? $view->name : ''}}"  />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="userEmail" class="form-label">Email Address</label>
                        <input disabled class="form-control" type="email" id="userEmail" name="userEmail" value="{{isset($view) ? $view->email : ''}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input class="form-control" type="number" name="phone" id="phone"  value="{{isset($view) ? $view->phone : ''}}"/>
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


