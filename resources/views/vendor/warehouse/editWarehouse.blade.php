<!---------Modal----------->
<form action="{{route('updateWarehouse',$warehouse->id)}}" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Edit Warehouse</h5>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
        ></button>
    </div>
    <div class="modal-body">
        <div class="row mx-3">
            <div hidden class="mb-3 col-md-6">
                <label for="bankName" class="form-label">Warehouse Code</label>
                <input readonly class="form-control" type="text" id="wcode" name="wcode" required value="{{isset($warehouse) ? $warehouse->warehouse_code : ''}}" />
            </div>
            <div class="mb-3 col-md-12">
                <label for="fullName" class="form-label">Location</label>
                <input class="form-control" type="text" id="location" name="location"   required  autofocus value="{{isset($warehouse) ? $warehouse->location : ''}}" />
            </div>
            <div class="mb-3 col-md-12">
                <label for="accountNo" class="form-label">Warehouse Name</label>
                <input class="form-control" rows="3" type="text" name="warehouse_name" required id="warehouse_name" value="{{isset($warehouse) ? $warehouse->warehouse_name : ''}}"/>
            </div>

            <div class="mb-3 col-md-12">
                <label for="fullName" class="form-label">Warehouse Owner</label>
                <input class="form-control" type="text" id="warehouse_owner" name="warehouse_owner"  required   autofocus value="{{isset($warehouse) ? $warehouse->warehouse_owner : ''}}" />
            </div>
            <div class="mb-3 col-md-6">
                <label for="fullName" class="form-label">Contact Number</label>
                <input class="form-control" type="text" id="contact_number" name="contact_number"   required  autofocus value="{{isset($warehouse) ? $warehouse->contact_number : ''}}" />
            </div>
            <div class="mb-3 col-md-6">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" required  class="select2 form-select">
                    <option value="">Select</option>
                    <option value="Active" @if(isset($warehouse->status) && $warehouse->status == 'Active') selected @endif>Active</option>
                    <option value="Inactive" @if(isset($warehouse->status) && $warehouse->status == 'Active') selected @endif>InActive</option>
                </select>
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



