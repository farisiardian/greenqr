@extends('layouts.admin')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Finance / </span> Settlement
        </h4>
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <div class="row">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-3">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Pending</h5>
                                    <p class="mb-4">Total</p>
                                    <h4 class="text-primary">RM {{number_format(($totall->sum('total_payment')), 2)}}</h4>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body ">
                                    <h5 class="card-title text-primary">Paid</h5>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="mb-4">This Week</p>
                                            <h4 class="text-primary">RM {{number_format(($totcurrweek->sum('total_payment')), 2)}}</h4>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="mb-4">This Month</p>
                                            <h4 class="text-primary">RM {{number_format(($totcurrmonth->sum('total_payment')), 2)}}</h4>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="mb-4">Total</p>
                                            <h4 class="text-primary">RM {{number_format(($totallmonth->sum('total_payment')), 2)}}</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2 text-primary">Settlement Invoice</h5>
                    </div>
                    <div class="card-body">
						<div class="me-2">
                            <h6 class="mb-4 text-black">Export Settlement Invoice</h6>
                        </div>
                        	
						<form method="post" action="{{ route('exportPDFSettlement') }}">
						@csrf
							<div class="row d-flex align-items-center">	
                                <input type="hidden" name="vendor_id" value="{{$vendor->id}}">
								<div class="col-md-5">
									<select name="month" id="month" class="select2 form-select">
										<option value="1">January</option>
										<option value="2">February</option>
										<option value="3">March</option>
										<option value="4">April</option>
										<option value="5">May</option>
										<option value="6">June</option>
										<option value="7">July</option>
										<option value="8">August</option>
										<option value="9">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>
									</select>
								</div>

								<div class="col-md-4">
									<select name="year" class="select2 form-select" id="year">
									@php
										$createdYear = date('Y', strtotime($vendor->created_at)); // extract year from created_at timestamp
										$years = range(date('Y'), $createdYear); // create an array of years from current year to created year
									@endphp
									@foreach ($years as $year)
										<option value="{{ $year }}">{{ $year }}</option>
									@endforeach
									</select>
								</div>
								<div class="col-md-1">
									<button class="btn btn-sm btn-primary" type="submit">Export</button>
								</div>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
		<div class="row mt-3">
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
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">Settlement Details</h5>
                            </div>

                            <div>
                                <a href="{{route('vendor.settlement')}}" wire:click.prevent="confirmationRequest()" class="btn btn-primary m-1">
                                    Request Settlement
                                </a>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="demo-inline-spacing mt-3">
                                    <div class="list-group list-group-horizontal-md text-md-center">
                                        <a
                                            class="list-group-item list-group-item-action active"
                                            id="home-list-item"
                                            data-bs-toggle="list"
                                            href="#horizontal-pending"
                                        >Pending</a
                                        >
                                        <a
                                            class="list-group-item list-group-item-action"
                                            id="profile-list-item"
                                            data-bs-toggle="list"
                                            href="#horizontal-paid"
                                        >Paid</a
                                        >
                                    </div>
                                    <div class="tab-content px-0 mt-0">
                                        <div class="tab-pane fade show active" id="horizontal-pending">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Settlement ID</th>
                                                        <th>Request Date</th>
                                                        <th>Payout Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($pending_tab as $key => $pendings)
                                                    <tr>
                                                        <td class="text-primary">{{$pendings->transaction_id}}</td>
                                                        <td>{{\Carbon\Carbon::parse($pendings->created_at)->isoFormat('DD-MM-YYYY')}}</td>
                                                        <td>{{$pendings->totalPayment}}</td>
                                                    </tr>
                                                    @empty
                                                        <td></td>
                                                        <td>No Data Found</td>
                                                        <td></td>
                                                    @endforelse
{{--                                                    <tr>--}}
{{--                                                        <td class="text-primary">TRDF021</td>--}}
{{--                                                        <td>12-05-2022</td>--}}
{{--                                                        <td>RM31.00</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td class="text-primary">QWEJO23</td>--}}
{{--                                                        <td>12-06-2022</td>--}}
{{--                                                        <td>RM60.00</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td class="text-primary">CVKIL34</td>--}}
{{--                                                        <td>13-05-2022</td>--}}
{{--                                                        <td>RM65.00</td>--}}
{{--                                                    </tr>--}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="horizontal-paid">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Settlement ID</th>
                                                        <th>Payout Released On</th>
                                                        <th>Payout Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($paid_tab as $key => $paids)
                                                    <tr>
                                                        <td class="text-primary">{{$paids->transaction_id}}</td>
                                                        <td>{{\Carbon\Carbon::Parse($paids->updated_at)->isoFormat('DD-MM-YYYY')}}</td>
                                                        <td>{{$paids->totalPayment}}</td>
                                                    </tr>
                                                    @empty
                                                        <td></td>
                                                        <td>No Data Found</td>
                                                        <td></td>
                                                    @endforelse
{{--                                                    <tr>--}}
{{--                                                        <td class="text-primary">QWEJO23</td>--}}
{{--                                                        <td>18-09-2022</td>--}}
{{--                                                        <td>RM31.00</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td class="text-primary">CVKIL34</td>--}}
{{--                                                        <td>22-10-2012</td>--}}
{{--                                                        <td>RM60.00</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td class="text-primary">TRDF021</td>--}}
{{--                                                        <td>03-04-2022</td>--}}
{{--                                                        <td>RM65.00</td>--}}
{{--                                                    </tr>--}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <!-- / Content -->
@endsection
<script type="text/javascript">
</script>
