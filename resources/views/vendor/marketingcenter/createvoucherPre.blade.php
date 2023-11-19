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
                    <form  action="{{route('storeVoucher')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-12 col-md-12">
                                <label for="vouchName" class="form-label">Voucher Name
                                    <i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                       title="<span>Voucher name is not visible to buyers</span>"></i></label>
                                <input class="form-control" type="text" id="vouchName" name="vouchName"   autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="vouchType" class="form-label">Discount Amount</label>
                                <select name="vouchType" id="vouchType" class="select2 form-select">
                                    <option value="">Select</option>
                                    <option value="RM">Amount Off</option>
                                    <option value="%">Percentage Off</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="amount" class="form-label">Amount</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="amount">RM</span><!--! if choose "Percentage Off", label jadi "%" -->
                                    <input type="number" name="amount" id="amount" class="form-control" aria-label="Amount" aria-describedby="amount"/>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="minSpend" class="form-label">Min Spend (RM)</label>
                                <input class="form-control" type="number" name="minSpend" id="minSpend" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="usageQty" class="form-label">Usage Quantity
                                    <i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                       title="<span>Total usable voucher for all buyers</span>"></i> </label>
                                <input class="form-control" type="number" name="usageQty" id="usageQty" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="maxBuy" class="form-label">Max. Distribution per Buyer
                                    <i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                       title="<span>This is the maximum number of voucher you can distribute to one buyer.</span>"></i></label>
                                <input class="form-control" type="number" name="maxBuy" id="maxBuy" />
                            </div>
                            <div hidden class="mb-3 col-md-6">
                                <label for="vouchName" class="form-label">Product Name
                                    <i class='bx bxs-info-circle ms-2' data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                       title="<span>Voucher name is not visible to buyers</span>"></i></label>
                                <select name="category" id="category" class="select2 form-select">
                                    <option value="">Select</option>
                                    <option value="Johor">Health Screening</option>
                                    <option value="Kedah">COVID-19 Test</option>
                                    <option value="Kelantan">Supplements</option>
                                    <option value="Labuan">Vaccinations</option>
                                    <option value="Melaka">Imaging Test</option>
                                    <option value="Negeri Sembilan">Booking Consultations</option>
                                </select>
                            </div>

                            <hr class="my-4" />


                            <div class=" my-3">
                                <h5 class="mb-0">Voucher Usage Period</h5>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="start" class="form-label">Start Time</label>
                                <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="start"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="end" class="form-label">End Time</label>
                                <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" id="end"/>
                            </div>

                            <hr class="my-4" />
                            <div class="mb-3 col-md-2">
                                <label for="vouchCode" class="form-label">Voucher Code</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="vouchCode">VEN</span><!--! random or 3 huruf pertama nama kedai -->
                                    <input disabled type="text" class="form-control" aria-label="Voucher Code" aria-describedby="vouchCode"/>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" href="{{ URL::previous() }}" class="btn btn-outline-secondary">Cancel</button>
                            <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
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
