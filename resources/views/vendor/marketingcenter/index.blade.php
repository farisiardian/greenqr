@extends('layouts.admin')

@section('content')
    <!-- Content -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                Marketing Centre
            </h4>
            <div class="col-lg-12 mb-4 order-0">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active @if(\Request::path() == 'marketing_center') @endif" href="javascript:void(0);">
                            <i class="bx bxs-offer me-1"></i> Voucher </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('vendor.boostproduct')}}" class="nav-link @if(\Request::path() == 'v_boostproduct') @endif">
                            <i class="bx bx-rocket me-1"></i> Boost Product </a>
                    </li>
                </ul>
                <div class="row mt-3">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">Voucher</h5>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('vendor.createvoucher')}}" type="button" class="btn btn-primary m-1 d-flex align-items-center">
                                    <span class="tf-icons bx bx-plus me-2"></span> Create Voucher
                                </a>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="demo-inline-spacing mt-3">
                                <div class="list-group list-group-horizontal-md text-md-center">
                                    <a
                                        class="list-group-item list-group-item-action active"
                                        id="all-list-item"
                                        data-bs-toggle="list"
                                        href="#horizontal-all"
                                    >All</a
                                    >
                                    <a
                                        class="list-group-item list-group-item-action"
                                        id="incoming-list-item"
                                        data-bs-toggle="list"
                                        href="#horizontal-ongoing"
                                    >Ongoing</a
                                    >
                                    <a
                                        class="list-group-item list-group-item-action"
                                        id="ship-list-item"
                                        data-bs-toggle="list"
                                        href="#horizontal-upcoming"
                                    >Upcoming</a
                                    >
                                    <a
                                        class="list-group-item list-group-item-action"
                                        id="complete-list-item"
                                        data-bs-toggle="list"
                                        href="#horizontal-expired"
                                    >Expired</a
                                    >
                                </div>
                                <div class="tab-content px-0 mt-0">
                                    <div class="tab-pane fade show active" id="horizontal-all">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Voucher Name | Code</th>
                                                    <th>Discount Amount</th>
                                                    <th>Usage Quantity</th>
                                                    <th>Usage</th>
                                                    <th>Status | Claiming Period</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($allvoucher as $vouchers)
                                                <tr>
                                                    <td><strong>11.11 | {{$vouchers->unique_code}}</strong></td>
                                                    <td>RM{{$vouchers->capped}}</td>
                                                    <td>{{$vouchers->uniqueId}}</td>
                                                    <td>{{$vouchers->uniqueId}}</td>
                                                    <td>
                                                        @if($vouchers->start_at <= (\Carbon\Carbon::now()) && $vouchers->end_at >= (\Carbon\Carbon::now()))
                                                             <span class="badge bg-label-success me-1">Ongoing</span><br>
                                                        @elseif($vouchers->start_at >= (\Carbon\Carbon::now()) )
                                                            <span class="badge bg-label-primary me-1">Upcoming</span><br>
                                                        @elseif($vouchers->end_at <= (\Carbon\Carbon::now()) )
                                                            <span class="badge bg-label-secondary me-1">Expired</span><br>
                                                        @endif
                                                        <small>{{\Carbon\Carbon::parse($vouchers->start_at)->isoFormat('DD/MM/YYYY hh:mm')}} - {{\Carbon\Carbon::parse($vouchers->end_at)->isoFormat('DD/MM/YYYY hh:mm')}}</small>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
{{--                                                <tr>--}}
{{--                                                    <td><strong>Annual Discount | VEN9201</strong></td>--}}
{{--                                                    <td>RM1.00</td>--}}
{{--                                                    <td>100</td>--}}
{{--                                                    <td>10</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-secondary me-1">Expired</span><br>--}}
{{--                                                        <small>10/10/2022 09:00 - 17/10/2022 10:00</small>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="dropdown">--}}
{{--                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                            <div class="dropdown-menu">--}}
{{--                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="horizontal-ongoing">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Voucher Name | Code</th>
                                                    <th>Discount Amount</th>
                                                    <th>Usage Quantity</th>
                                                    <th>Usage</th>
                                                    <th>Status | Claiming Period</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($ongoingvoucher as $vouchers)
                                                <tr>
                                                    <td><strong>11.11 | {{$vouchers->unique_code}}</strong></td>
                                                    <td>RM{{$vouchers->capped}}</td>
                                                    <td>{{$vouchers->uniqueId}}</td>
                                                    <td>{{$vouchers->uniqueId}}</td>
                                                    <td>
                                                        <span class="badge bg-label-success me-1">Ongoing</span><br>
                                                        <small>{{$vouchers->start_at}} - {{$vouchers->end_at}}</small>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
{{--                                                <tr>--}}
{{--                                                    <td><strong>#124589 | VEN100</strong></td>--}}
{{--                                                    <td>RM1.00</td>--}}
{{--                                                    <td>100</td>--}}
{{--                                                    <td>10</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-success me-1">Ongoing</span><br>--}}
{{--                                                        <small>10/10/2022 09:00 - 17/10/2022 10:00</small>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="dropdown">--}}
{{--                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                            <div class="dropdown-menu">--}}
{{--                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td><strong>#124589 |VEN9201</strong></td>--}}
{{--                                                    <td>RM1.00</td>--}}
{{--                                                    <td>100</td>--}}
{{--                                                    <td>10</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-success me-1">Ongoing</span><br>--}}
{{--                                                        <small>10/10/2022 09:00 - 17/10/2022 10:00</small>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="dropdown">--}}
{{--                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                            <div class="dropdown-menu">--}}
{{--                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="horizontal-upcoming">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Voucher Name | Code</th>
                                                    <th>Discount Amount</th>
                                                    <th>Usage Quantity</th>
                                                    <th>Usage</th>
                                                    <th>Status | Claiming Period</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($upcomingvoucher as $vouchers)
                                                <tr>
                                                    <td><strong>11.11 | {{$vouchers->unique_code}}</strong></td>
                                                    <td>RM{{$vouchers->capped}}</td>
                                                    <td>{{$vouchers->uniqueId}}</td>
                                                    <td>{{$vouchers->uniqueId}}</td>
                                                    <td>
                                                        <span class="badge bg-label-primary me-1">Upcoming</span><br>
                                                        <small>{{$vouchers->start_at}} - {{$vouchers->end_at}}</small>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
{{--                                                <tr>--}}
{{--                                                    <td><strong>#124589 | VEN12K2</strong></td>--}}
{{--                                                    <td>RM1.00</td>--}}
{{--                                                    <td>100</td>--}}
{{--                                                    <td>10</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-primary me-1">Upcoming</span><br>--}}
{{--                                                        <small>10/10/2022 09:00 - 17/10/2022 10:00</small>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="dropdown">--}}
{{--                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                            <div class="dropdown-menu">--}}
{{--                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="horizontal-expired">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Voucher Name | Code</th>
                                                    <th>Discount Amount</th>
                                                    <th>Usage Quantity</th>
                                                    <th>Usage</th>
                                                    <th>Status | Claiming Period</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($expiredvoucher as $vouchers)
                                                    <tr>
                                                        <td><strong>11.11 | {{$vouchers->unique_code}}</strong></td>
                                                        <td>RM{{$vouchers->capped}}</td>
                                                        <td>{{$vouchers->uniqueId}}</td>
                                                        <td>{{$vouchers->uniqueId}}</td>
                                                    <td>
                                                        <span class="badge bg-label-secondary me-1">Expired</span><br>
                                                        <small>{{\Carbon\Carbon::parse($vouchers->start_at)->isoFormat('DD/MM/YYYY hh:mm')}} - {{\Carbon\Carbon::parse($vouchers->end_at)->isoFormat('DD/MM/YYYY hh:mm')}}</small>

                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
{{--                                                <tr>--}}
{{--                                                    <td><strong>#124589 | VEN9012J</strong></td>--}}
{{--                                                    <td>RM1.00</td>--}}
{{--                                                    <td>100</td>--}}
{{--                                                    <td>10</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-secondary me-1">Expired</span><br>--}}
{{--                                                        <small>10/10/2022 09:00 - 17/10/2022 10:00</small>--}}
{{--                                                    </td>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="dropdown">--}}
{{--                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                            <div class="dropdown-menu">--}}
{{--                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
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
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
