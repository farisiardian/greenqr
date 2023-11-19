<form method="POST" action="{{route('address.update',['address'=>$address->id])}}">
@csrf

    {{method_field('put')}}

<!-- Modal body -->
    <div class="modal-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" name="name" value="{{$address->name}}" class="form-control" id="fullname" placeholder="Full Name">
            </div>
            <div class="form-group col-md-6">

                <input type="number" name="phone" value="{{$address->phone}}" class="form-control" id="mobile" placeholder="Number Phone">
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" value="{{$address->email}}" id="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'State,Area'">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" value="{{$address->address}}" id="housenumber" placeholder="House Number, Building, Street Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'House Number, Building, Street Name'">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="postal_code" value="{{$address->postalcode}}" id="postalcode" placeholder="Postal Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Postal Code'">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="city" value="{{$address->city}}" id="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'">
            </div>
            <div class="form-group col-md-6">
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
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>

    </div>
</form>
