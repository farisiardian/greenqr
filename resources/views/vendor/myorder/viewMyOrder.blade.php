<!---------Modal Detail----------->
		<form action="{{route('prepareToShip')}}" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="orderReturnTitle">Order #{{isset($transactionId) ? $transactionId->transaction_id : ''}}</h5>
                <input hidden type="text" id="trans_id" name="trans_id" value="{{isset($transactionId) ?  $transactionId->id : ''}}">

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <strong>Shipping Detail</strong>
                        <p>{{isset($useraddress) ?  $useraddress->name : ''}}<br>{{isset($useraddress) ?  $useraddress->phone : ''}}<br>
                            {{isset($useraddress) ?  $useraddress->address : ''}}</p>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <strong>Products</strong>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
								@foreach($orders as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
											
                                              @if($product->image()->first())
                                                    <img
                                                        src="{{asset('storage/'.$product->image()->first()->image)}}"
                                                        class="d-block rounded"
                                                        height="100"
                                                        width="100"/>
                                                @else
                                                    <img
                                                        src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                                        class="d-block rounded"
                                                        height="100"
                                                        width="100"/>
                                                @endif
                                                <b>{{ isset($product) ? $product->name : '' }} - {{ isset($product) && isset($product->variation) ? $product->variation->name : '' }}
</b>
											</div>
                                        </td>
                                        <td>{{isset($quantities) ? $quantities : ''}}</td>
                                        <td>RM {{isset($product) ? $product->cart_total : ''}}</td>
                                    </tr>
								@endforeach
                                </tbody>
                                <tfoot class="table-border-bottom-0">
                                <tr>
                                    <th></th>
                                    <th>Shipping Fee</th>
                                    <th>RM {{$transactionId->shipping_total}}</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Total</th>
                                    <th>RM {{$transactionId->shipping_total + $transactionId->cart_total}}</th>
                                </tr>
								
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row mx-3 my-4">
                    <div class="col mb-3 d-flex justify-content-between">
					@if(isset($consignments))
					<div class="col-12 mb-3">
						<label for="tracking" class="form-label">Tracking Number</label>
						<input type="text" id="tracking" name="tracking" readonly value="{{isset($consignments) ? $consignments->consignment_number : ''}}" class="form-control"
						/>
					</div>
					<strong>Payment Method</strong><span class="text-primary">FPX</span>
					@else
						<b><p>*This user choose self pickup at </p>
						Pickup Address :{{isset($vendoraddress) ? $vendoraddress->address : ''}}
																	{{isset($vendoraddress) ? $vendoraddress->postalcode : ''}}
																	{{isset($vendoraddress) ? $vendoraddress->city : ''}}
																	{{isset($vendoraddress) ? $vendoraddress->state : ''}}</b>
																	
					@endif
                        
                    </div>
                </div>
				
				</div>
				<div hidden class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-primary">Ready to Ship</button>
				</div>
		</form>

