@extends('layouts.admin')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Finance / </span> My Income
        </h4>
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-3">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">To Release</h5>
                                    <p class="mb-4">Total</p>
                                    <h4 class="text-primary">RM {{number_format(($totall->sum('cart_total') - $totall->sum('voucher_total')), 2)}}</h4>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="card-body ">
                                    <h5 class="card-title text-primary">Released</h5>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <p class="mb-4">This Week</p>
                                            <h4 class="text-primary">RM {{number_format(($totcurrweek->sum('cart_total') - $totcurrweek->sum('voucher_total')), 2)}}</h4>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="mb-4">This Month</p>
                                            <h4 class="text-primary">RM {{number_format(($totcurrmonth->sum('cart_total') - $totcurrmonth->sum('voucher_total')), 2)}}</h4>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="mb-4">Total</p>
                                            <h4 class="text-primary">RM {{number_format(($totallmonth->sum('cart_total') - $totallmonth->sum('voucher_total')), 2)}}</h4>
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
                        <h5 class="card-title m-0 me-2 text-primary">Income Statements</h5>
                    </div>
                    <div class="card-body">
                            <div class="me-2">
                                <h6 class="mb-4 text-black">Export Income Statement</h6>
                            </div>
							<form method="post" action="{{ route('exportPDFIncome') }}">
                                @csrf
								<div class="row d-flex align-items-center">		
									<input type="hidden" name="vendor_id" value="{{$vendor->id}}">
									<div class="col-md-5">
                                        <select class="select2 form-select" name="month" id="month">
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
										<select class="select2 form-select" name="year" id="year">
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
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">Income Details</h5>
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
                                            href="#horizontal-toRelease"
                                        >To Release</a
                                        >
                                        <a
                                            class="list-group-item list-group-item-action"
                                            id="profile-list-item"
                                            data-bs-toggle="list"
                                            href="#horizontal-released"
                                        >Released</a
                                        >
                                    </div>
                                    <div class="tab-content px-0 mt-0">
                                        <div class="tab-pane fade show active" id="horizontal-toRelease">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Estimated Release Date</th>
                                                        <th>Status</th>
                                                        <th>Payment Method</th>
                                                        <th>Payout Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($torelease as $key => $toRelease)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                                <img
                                                                    src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                                                    class="d-block rounded"
                                                                    height="100"
                                                                    width="100"/>
                                                                {{$toRelease->transaction_id}}</div>
                                                        </td>
                                                        <td>{{\Carbon\Carbon::parse($toRelease->created_at)->isoFormat('DD-MM-YYYY')}}</td>
                                                        <td><span class="badge bg-label-primary me-1">{{$toRelease->status}}</span></td>
                                                        <td>FPX</td>
                                                        <td>{{number_format(($toRelease->total_payment), 2)}}</td>
                                                    </tr>
                                                    @empty
                                                        <center><b>No Data Found</b></center>
                                                    @endforelse
{{--                                                    <tr>--}}
{{--                                                        <td>--}}
{{--                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                                <img--}}
{{--                                                                    src="{{asset('admin/assets/img/products/Surbex-Zinc-750.jpg')}}"--}}
{{--                                                                    class="d-block rounded"--}}
{{--                                                                    height="100"--}}
{{--                                                                    width="100"/>--}}
{{--                                                                SURBEX ZINC 750MG (30’S)</div>--}}
{{--                                                        </td>--}}
{{--                                                        <td>12-05-2022</td>--}}
{{--                                                        <td><span class="badge bg-label-warning me-1">Waiting</span></td>--}}
{{--                                                        <td>Credit Card</td>--}}
{{--                                                        <td>RM31.00</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>--}}
{{--                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                                <img--}}
{{--                                                                    src="{{asset('admin/assets/img/products/Bio-D3.jpg')}}"--}}
{{--                                                                    class="d-block rounded"--}}
{{--                                                                    height="100"--}}
{{--                                                                    width="100"/>--}}
{{--                                                                BIO D3 80’S</div>--}}
{{--                                                        </td>--}}
{{--                                                        <td>12-06-2022</td>--}}
{{--                                                        <td><span class="badge bg-label-danger me-1">Pending</span></td>--}}
{{--                                                        <td>FPX</td>--}}
{{--                                                        <td>RM60.00</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>--}}
{{--                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                                <img--}}
{{--                                                                    src="{{asset('admin/assets/img/products/Thycurm1.jpg')}}"--}}
{{--                                                                    class="d-block rounded"--}}
{{--                                                                    height="100"--}}
{{--                                                                    width="100"/>--}}
{{--                                                                THYCURM (30’S)</div>--}}
{{--                                                        </td>--}}
{{--                                                        <td>13-05-2022</td>--}}
{{--                                                        <td><span class="badge bg-label-danger me-1">Pending</span></td>--}}
{{--                                                        <td>Debit Card</td>--}}
{{--                                                        <td>RM65.00</td>--}}
{{--                                                    </tr>--}}
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="horizontal-released">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Payout Released On</th>
                                                        <th>Status</th>
                                                        <th>Payment Method</th>
                                                        <th>Payout Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($release as $key => $Released)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                                <img
                                                                    src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                                                    class="d-block rounded"
                                                                    height="100"
                                                                    width="100"/>
                                                                {{$Released->transaction_id}}</div>
                                                        </td>
                                                        <td>{{\Carbon\Carbon::parse($Released->updated_at)->isoFormat('DD-MM-YYYY')}}</td>
                                                        <td><span class="badge bg-label-info me-1">{{$Released->status}}</span></td>
                                                        <td>FPX</td>
                                                        <td>{{number_format(($Released->total_payment), 2)}}</td>

                                                        @empty
                                                            <td></td>
                                                            <td></td>
                                                            <td style="height:50px;width:150px">No Data Found</td>
                                                            <td></td>
                                                            <td></td>
                                                    </tr>

                                                    @endforelse
{{--                                                    <tr>--}}
{{--                                                        <td>--}}
{{--                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                                <img--}}
{{--                                                                    src="{{asset('admin/assets/img/products/Surbex-Zinc-750.jpg')}}"--}}
{{--                                                                    class="d-block rounded"--}}
{{--                                                                    height="100"--}}
{{--                                                                    width="100"/>--}}
{{--                                                                SURBEX ZINC 750MG (30’S)</div>--}}
{{--                                                        </td>--}}
{{--                                                        <td>18-09-2022</td>--}}
{{--                                                        <td><span class="badge bg-label-success me-1">Success</span></td>--}}
{{--                                                        <td>FPX</td>--}}
{{--                                                        <td>212</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>--}}
{{--                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                                <img--}}
{{--                                                                    src="{{asset('admin/assets/img/products/Bio-D3.jpg')}}"--}}
{{--                                                                    class="d-block rounded"--}}
{{--                                                                    height="100"--}}
{{--                                                                    width="100"/>--}}
{{--                                                                BIO D3 80’S</div>--}}
{{--                                                        </td>--}}
{{--                                                        <td>22-10-2012</td>--}}
{{--                                                        <td><span class="badge bg-label-success me-1">Success</span></td>--}}
{{--                                                        <td>FPX</td>--}}
{{--                                                        <td>RM60.00</td>--}}
{{--                                                    </tr>--}}
{{--                                                    <tr>--}}
{{--                                                        <td>--}}
{{--                                                            <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                                <img--}}
{{--                                                                    src="{{asset('admin/assets/img/products/Thycurm1.jpg')}}"--}}
{{--                                                                    class="d-block rounded"--}}
{{--                                                                    height="100"--}}
{{--                                                                    width="100"/>--}}
{{--                                                                THYCURM (30’S)</div>--}}
{{--                                                        </td>--}}
{{--                                                        <td>03-04-2022</td>--}}
{{--                                                        <td><span class="badge bg-label-success me-1">Success</span></td>--}}
{{--                                                        <td>FPX</td>--}}
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
