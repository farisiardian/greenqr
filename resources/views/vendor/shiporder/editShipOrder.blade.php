<form action="{{route('saveshiporder')}}" id="" method="POST" onsubmit="return true">
    @csrf
    <div class="modal-header">
        <h4 class="modal-title">ORDER ID#{{isset($orders) ? $orders->transaction_id : ''}}</h4>
        <input hidden type="text" id="trans_id" name="trans_id" value="{{isset($orders) ?     $orders->transaction_id : ''}}">
    </div>
    <div class="modal-body">
        <div class="row mx-3">
            <div class="col-12 mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{isset($useraddress) ?  $useraddress->name : ''}}"
                    class="form-control"
                />
            </div>
            <div class="col-12 mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input
                    type="number"
                    id="contact"
                    value="{{isset($useraddress) ? $useraddress->phone : ''}}"
                    class="form-control"
                />
            </div>
            <div class="col-12 mb-3">
                <label for="address" class="form-label">Address</label>
                <input
                    type="text"
                    id="address"
                    value="{{isset($useraddress) ? $useraddress->address : ''}}"
                    class="form-control"
                />
            </div>
            @if(isset($consignments))
            <div class="col-12 mb-3">
                <label for="tracking" class="form-label">Tracking Number</label>
                <input type="text" id="tracking" name="tracking" readonly value="{{isset($consignments) ? $consignments->consignment_number : ''}}" class="form-control"
                />
            </div>
            @else
                <p>*This user choose self pickup at </p>
                Pickup Address :{{isset($vendoraddress) ? $vendoraddress->address : ''}}
                                                            {{isset($vendoraddress) ? $vendoraddress->postalcode : ''}}
                                                            {{isset($vendoraddress) ? $vendoraddress->city : ''}}
                                                            {{isset($vendoraddress) ? $vendoraddress->state : ''}}
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
        </button>
        <button type="submit" class="btn btn-primary">Ship</button>
    </div>
</form>
