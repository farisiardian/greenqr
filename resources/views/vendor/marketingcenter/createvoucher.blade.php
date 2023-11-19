@extends('layouts.admin')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Voucher / </span> Create Voucher
            </h4>
            <!-- Add Content Here -->
            <div class="card mb-4">
                <h5 class="card-header">Basic Info</h5>
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
                    <form  action="{{route('storeVoucher')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="vouchName" class="form-label">Voucher Name
                                    <i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                       title="<span>Voucher name is not visible to buyers</span>"></i></label>
                                <input class="form-control" type="text" id="vouchName" name="vouchName" required/>
                            </div>
							<div class="mb-3 col-md-6">
									<label for="capped" class="form-label">Capped
									<i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                       title="<span>Maximum Discount Price</span>"></i></label>
                                <input class="form-control" type="text" id="capped" name="capped" required/>
							</div>
                            
							<div class="mb-3 col-md-6">
								<label for="vouchType" class="form-label">Discount Amount</label>
								<select name="vouchType" id="vouchType" class="select2 form-select" required>
									<option value="">Select</option>
									<option value="RM">Amount Off</option>
									<option value="%">Percentage Off</option>
								</select>
							</div>
							<div class="mb-3 col-md-6">
								<label for="amount" class="form-label">Amount</label>
								<div class="input-group">
									<span class="input-group-text" id="amountLabel">RM</span>
									<input type="number" name="amount" id="amount" class="form-control" aria-label="Amount" aria-describedby="amountLabel" required/>
								</div>
							</div>
                            <div class="mb-3 col-md-6">
                                <label for="minSpend" class="form-label">Min Spend (RM)</label>
                                <input class="form-control" type="text" name="minSpend" required id="minSpend"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="usageQty" class="form-label">Usage Quantity
                                    <i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                       title="<span>Total usable voucher for all buyers</span>"></i> </label>
                                <input class="form-control" type="number" name="usageQty" id="usageQty" required/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="maxBuy" class="form-label">Max. Distribution per User/Customer
                                    <i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                       title="<span>This is the maximum number of voucher you can distribute to one buyer.</span>"></i></label>
                                <input class="form-control" type="number" name="maxBuy" id="maxBuy" required/>
                            </div>
							
							<!--<div class="mb-3 col-md-6">
                                <label for="productId" class="form-label">Product Name
                                    <i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                       title="<span>Voucher name is not visible to buyers</span>"></i>
                                </label>
                                <select name="productId" id="productId" class="select2 form-select" required>
                                    <option required value="">Select</option>
                                    @foreach($products as $product)
                                        <option required value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>-->
							
							<div class="mb-3 col-md-6">
                                    <label for="productId" class="form-label">Product Name
                                        <i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                           title="<span>Voucher name is not visible to buyers</span>"></i>
                                    </label>
                                    <div id="productFields">
                                        <select name="productId[]" class="select2 form-select product-select">
                                            <option value="">Select</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->id}}-{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-secondary" id="addProductBtn">Add another product</button>
                                </div>
                            <div class="mb-3 col-md-6">
                                <label for="applyToAllProducts" class="form-label">Apply to all products under this vendor</label>
                                <input class="form-check-input" type="checkbox" name="applyToAllProducts" value="1" id="applyToAllProducts">
                            </div>
                            <hr class="my-4" />


                            <div class=" my-3">
                                <h5 class="mb-0">Voucher Usage Period</h5>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="start" class="form-label">Start Time</label>
                                <input class="form-control" type="datetime-local" value="" name="start" id="start"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="end" class="form-label">End Time</label>
                                <input class="form-control" type="datetime-local" value="" name="voucherEnd" id="end"/>
                            </div>

                            <hr class="my-4" />
                            <div class="mb-3 col-md-2">
                                <label for="vouchCode" class="form-label">Voucher Code</label>
                                <div class="input-group">
                                    <span class="input-group-text" name="vouchCode" id="vouchCode">{{$randoms}}</span><!--! random or 3 huruf pertama nama kedai -->
                                    <input disabled type="text" name="vouchCode" id="vouchCode" class="form-control" aria-label="Voucher Code" aria-describedby="vouchCode"/>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" href="{{ URL::previous() }}" class="btn btn-outline-secondary">Cancel</button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Back</a>
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
    const vouchTypeSelect = document.getElementById('vouchType');
    const amountLabel = document.getElementById('amountLabel');

    vouchTypeSelect.addEventListener('change', () => {
        const selectedValue = vouchTypeSelect.value;
        amountLabel.textContent = selectedValue;
    });
</script>
<script>
    $(document).ready(function() {
        // When the "Add another product" button is clicked
        $('#addProductBtn').click(function() {
            // Clone the last product select element
            var lastProductField = $('.product-select').last().clone();
            // Set the cloned select element's value to empty
            lastProductField.val('');
            // Append the cloned select element to the productFields div
            $('#productFields').append(lastProductField);
        });
    });
</script>
@endsection
