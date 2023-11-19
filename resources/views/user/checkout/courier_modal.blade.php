<form method="get" action="{{route('checkout.index')}}">
<div class="modal-body">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Delivery</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <input type="hidden" name="address" value="{{$address_id}}"/>
            <input type="hidden" name="vendor" value="{{$vendor_id}}"/>
            <input type="hidden" name="voucher" value="{{$voucher_id}}"/>
            <input type="hidden" name="courier" value="{{isset($courierList) ? $courierList : null}}" />
            <input type="hidden" name="receiveBy" id="receive-by" value="" />
            <input type="hidden" name="price" id="courier-price" value="" />

            @foreach($courier as $couriers)

            <tr @if($couriers->receiveBy == null && $couriers->serviceId != 'pickup') style="opacity: 0.5" @endif>
                <td>
                    <!--input type="radio" name="couriers" onclick="showHideSelfPickupAddress('{{$couriers->receiveBy}}','{{$couriers->price}}')" value="{{$couriers->id}}"  @if(isset($courier_id) && $courier_id == $couriers->id) checked @endif @if($couriers->receiveBy == null && $couriers->serviceId != 'pickup') disabled @endif /-->
					<input type="radio" name="couriers" onclick="putValue('{{$couriers->receiveBy}}','{{$couriers->price}}')" value="{{$couriers->id}}"  @if(isset($courier_id) && $courier_id == $couriers->id) checked @endif @if($couriers->receiveBy == null && $couriers->serviceId != 'pickup') disabled @endif />

					<!--input type="radio" name="couriers" onclick="showHideSelfPickupAddress({{$couriers->id}})" value="{{$couriers->id}}" @if(isset($courier_id) && $courier_id == $couriers->id) checked @endif /-->
				</td>
                <td>
                    <strong>{{$couriers->courierName}}</strong>
                    <br><small style="color:#888" >@if($couriers->receiveBy == null && $couriers->serviceId != 'pickup') Offline @else  {{$couriers->receiveBy}}  @endif</small>
                </td>
                <td>
                    @if($couriers->receiveBy == null && $couriers->serviceId != 'pickup') @else RM {{$couriers->price}} @endif
                </td>
            </tr>
			 @if ($couriers->serviceId == 'pickup')
                <tr>
                    <td></td>
                    <td>
                        <select class="form-control" name="address_select">
                            @foreach ($selfpickup as $selfpickups)
                                <option value=""></option>
                                <option value="{{$selfpickups->id}}">{{$selfpickups->id}}{{$selfpickups->address}} {{$selfpickups->postalcode}} {{$selfpickups->city}}{{$selfpickups->state}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
            @endif
            @endforeach

            </tbody>
        </table>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" style="background-color:#274439">Submit</button>
</div>
</form>
<script>
    function putValue(receive, price){

        document.getElementById('receive-by').value = receive;
        document.getElementById('courier-price').value = price;
    }
</script>
<script>
    function updateDeliveryAddress() {
        var addressSelect = document.getElementsByName('address_select')[0];
        var selectedAddress = addressSelect.options[addressSelect.selectedIndex].text;
        var pickupAddressInput = document.getElementById('pickup_address');
        var shippingAddress = document.getElementById('shipping-address');

        pickupAddressInput.value = selectedAddress;
        shippingAddress.innerText = selectedAddress;
    }
</script>
