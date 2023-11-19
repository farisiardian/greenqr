<form method="POST" action="{{route('updateAddress',['id'=>$address->id])}}">
    @csrf

    {{method_field('put')}}

    <!-- Modal body -->
    <div class="modal-body">
        <div class="row mx-3">
            <div class="mb-3 col-md-6">
                <label for="staffID" class="form-label">Name</label>
                <input type="text" name="name" value="{{$address->name}}" class="form-control" id="fullname" placeholder="Full Name">
            </div>
            <div class="mb-3 col-md-6">
                <label for="staffID" class="form-label">Phone Number</label>
                <input type="number" name="phone" value="{{$address->phone}}" class="form-control" id="mobile" placeholder="Number Phone">
            </div>
        <div class="mb-3 col-md-6">
            <label for="staffID" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$address->email}}" id="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State,Area'">
        </div>
        <div class="mb-3 col-md-6">
            <label for="staffID" class="form-label">House Number</label>
            <input type="text" class="form-control" name="address" value="{{$address->address}}" id="housenumber" placeholder="House Number, Building, Street Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'House Number, Building, Street Name'">
        </div>
        <div class="mb-3 col-md-6">
            <label for="staffID" class="form-label">Post Code</label>
            <input type="text" class="form-control" name="postal_code" value="{{$address->postalcode}}" id="postalcode" placeholder="Postal Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postal Code'">
        </div>
        <div class="mb-3 col-md-6">
            <label for="staffID" class="form-label">City</label>
                <input type="text" class="form-control" name="city" value="{{$address->city}}" id="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
            </div>
        <div class="mb-3 col-md-6">
            <label for="staffID" class="form-label">State</label>
                <select class="form-control" name="state" id="state">
                    <option>Select State</option>
                    @foreach($state as $states)
                        <option value="{{$states->name}}" @if($states->name == $address->state) selected @endif>{{$states->name}}</option>
                    @endforeach
                </select>
                {{--                <input type="text" class="form-control" name="state" value="{{$address->state}}" id="state" placeholder="State" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State'">--}}
            </div>
        </div>
        <div class="form-check">
            <input type="checkbox" name="default_address" class="form-check-input" id="exampleCheck1" @if($address->default_address == 1) checked @endif>
            <label class="form-check-label" for="exampleCheck1">Set as Default Address</label>
        </div>
        </div>
    <!-- Modal footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>

    </div>
</form>
