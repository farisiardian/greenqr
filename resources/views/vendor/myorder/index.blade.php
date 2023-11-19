@extends('layouts.admin')

@section('content')
	 <!-- Modal View Order-->
    <div class="modal fade text-left" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="viewDetail" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div id="viewDetails">

                    </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"></span> My Orders
        </h4>

        <div class="row">
            <!-- Custom content with heading -->
            <div class="col d-flex justify-content-end">
                <!--button type="button" class="btn btn-primary m-1">
                    <span class="tf-icons bx bx-download"></span> Export
                </button-->
				 <a class="btn btn-primary" href="{{route('export-myorder') }}">Export</a>
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
                        <a hidden
                            class="list-group-item list-group-item-action"
                            id="incoming-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-incoming"
                        >Incoming Order</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            id="ship-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-toShip"
                        >To Ship</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            id="complete-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-completed"
                        >Completed</a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            id="cancel-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-cancel"
                        >Cancelled</a
                        >
                        <a hidden
                            class="list-group-item list-group-item-action"
                            id="return-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-return"
                        >Return</a
                        >
                    </div>
                    <div class="tab-content px-0 mt-0">
                        <div class="tab-pane fade show active" id="horizontal-all">
                            <div class="card">
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
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Total Order</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($order as $key => $orders)
                                            <tr>
                                                <td><strong>{{$orders[0]->transaction_id}}</strong></td>
                                                <td>{{$orders->count('cart_total')}}</td>
                                                <td>{{$orders->sum('cart_total')}}</td>
                                                <td>
													<span class="badge bg-label-primary me-1">{{$orders[0]->status}}</span>
												</td>
                                                <td>
													<div>
													@if($orders[0]->courier_id == 7)
                                                        @else
													    <button class="btn btn-sm btn-warning" onclick="window.open('{{ $orders[0]->consignment()->first()->awb_url }}', '_blank')">URL</button>
														@endif
														<a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$orders[0]->transaction_id}}" class="viewDetail-modals btn btn-sm btn-primary">View</a>
														<a href="{{route('receipt_order',['id' => $orders[0]->transaction_id])}}" class="btn btn-sm btn-info">Receipt</a>
														<!--a href="{{route('cancelOrder',['id'=>$orders[0]->transaction_id])}}" class="btn btn-sm btn-danger">Cancel</a-->
														<form action="{{route('cancelOrder',['id'=>$orders[0]->transaction_id])}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to Cancel This Order?')">
															@csrf
															@if($orders[0]->status == 'To Ship')
																<button class="btn btn-sm btn-danger" ><i class="bx bx-close"></i>Cancel Order</button>
															@elseif($orders[0]->status == 'Cancel')
																<button disabled class="btn btn-sm btn-danger" ><i class="bx bx-close"></i>Cancel Order</button>
															@endif
														</form>
													</div>
													<!--a href="#" data-toggle="modal" data-target="#editSolicitor" data-id="{{$orders[0]->transaction_id}}" class="btn btn-primary editSolicitor-modals">Prepare Delivery</a-->
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="horizontal-incoming">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Total Order</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><strong>#124589</strong></td>
                                                <td>12-09-2022</td>
                                                <td>1</td>
                                                <td>RM 27.00</td>
                                                <td><span class="badge bg-label-warning me-1">Incoming</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-check2-square me-1"></i>Accept</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-x-square me-1"></i>Reject</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>#120987</strong></td>
                                                <td>30-08-2022</td>
                                                <td>3</td>
                                                <td>RM31.00</td>
                                                <td><span class="badge bg-label-warning me-1">Incoming</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-check2-square me-1"></i>Accept</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-x-square me-1"></i>Reject</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>#312938</strong></td>
                                                <td>11-06-2022</td>
                                                <td>1</td>
                                                <td>RM60.00</td>
                                                <td><span class="badge bg-label-warning me-1">Incoming</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-check2-square me-1"></i>Accept</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-x-square me-1"></i>Reject</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>#891211</strong></td>
                                                <td>22-02-2022</td>
                                                <td>1</td>
                                                <td>RM65.00</td>
                                                <td><span class="badge bg-label-warning me-1">Incoming</span></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bi bi-eye me-1"></i>View</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-check2-square me-1"></i>Accept</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-x-square me-1"></i>Reject</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="horizontal-toShip">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Total Order</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($ship as $key => $orders)
                                            <tr>
                                                <td><strong>{{$orders[0]->transaction_id}}</strong></td>
                                                <td>{{\Carbon\Carbon::parse($orders[0]->created_at)->isoFormat('DD-MM-YYYY')}}</td>
                                                <td>{{$orders->count('cart_total')}}</td>
                                                <td>{{$orders->sum('cart_total')}}</td>
                                                <td><span class="badge bg-label-primary me-1">{{$orders[0]->status}}</span></td>
                                                <td>
                                                    <div>
														<a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$orders[0]->transaction_id}}" class="viewDetail-modals btn btn-sm btn-primary">View</a>
													</div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="horizontal-completed">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date Completed</th>
                                                <th>Total Order</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($completed as $key => $orders)
                                            <tr>
                                                <td><strong>{{$orders[0]->transaction_id}}</strong></td>
                                                <td>{{\Carbon\Carbon::parse($orders[0]->updated_at)->isoFormat('DD-MM-YYYY')}}</td>
                                                <td>{{$orders->count('transaction_id')}}</td>
                                                <td>{{$orders->sum('cart_total')}}</td>
                                                <td><span class="badge bg-label-success me-1">{{$orders[0]->status}}</span></td>
                                                <td>
                                                    <div>
														<a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$orders[0]->transaction_id}}" class="viewDetail-modals btn btn-sm btn-primary">View</a>
													</div>
                                                </td>
                                                @empty
                                                <td></td>
                                                <td></td>
                                                <td>No Data Found</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @endforelse
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="horizontal-cancel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Total Order</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($cancel as $key => $orders)
                                            <tr>
                                                <td><strong>{{$orders[0]->transaction_id}}</strong></td>
                                                <td>{{\Carbon\Carbon::parse($orders[0]->updated_at)->isoFormat('DD-MM-YYYY')}}</td>
                                                <td>{{$orders[0]->quantity}}</td>
                                                <td>{{$orders->sum('cart_total')}}</td>
                                                <td><span class="badge bg-label-secondary me-1">{{$orders[0]->status}}</span></td>
                                                <td>
                                                   <div>
														<a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$orders[0]->transaction_id}}" class="viewDetail-modals btn btn-sm btn-primary">View</a>
													</div>
                                                </td>
                                                @empty
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>No Data Found</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="horizontal-return">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Total Order</th>
                                                <th>Total Amount</th>
                                                <th>Reason</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><strong>#124589</strong></td>
                                                <td>12-09-2022</td>
                                                <td>1</td>
                                                <td>RM 27.00</td>
                                                <td>Parcel not delivered</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderReturn"><i class="bi bi-eye me-1"></i>View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>#120987</strong></td>
                                                <td>30-08-2022</td>
                                                <td>3</td>
                                                <td>RM31.00</td>
                                                <td>Parcel not delivered</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderReturn"><i class="bi bi-eye me-1"></i>View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>#312938</strong></td>
                                                <td>11-06-2022</td>
                                                <td>1</td>
                                                <td>RM60.00</td>
                                                <td>Wrong item</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderReturn"><i class="bi bi-eye me-1"></i>View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>#891211</strong></td>
                                                <td>22-02-2022</td>
                                                <td>1</td>
                                                <td>RM65.00</td>
                                                <td>Parcel not delivered</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#orderReturn"><i class="bi bi-eye me-1"></i>View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Custom content with heading -->
        </div>

        <!---------Modal----------->
        <div class="modal fade" id="orderDetail" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Order #124589</h5>
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
                                <p>Nur Alia Maisara<br>010-2345678<br>No. 12, Jalan Bahagia 1, Taman Bahagia
                                    06550 Alor Setar, Kedah</p>
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
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img
                                                        src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                                        class="d-block rounded"
                                                        height="50"
                                                        width="50"/>
                                                    IBERET FOLIC 500 (30'S)</div>
                                            </td>
                                            <td>1</td>
                                            <td>RM 27.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img
                                                        src="{{asset('admin/assets/img/products/Surbex-Zinc-750.jpg')}}"
                                                        class="d-block rounded"
                                                        height="50"
                                                        width="50"/>
                                                    SURBEX ZINC 750MG (30’S)</div>
                                            </td>
                                            <td>1</td>
                                            <td>RM 31.00</td>
                                        </tr>
                                        </tbody>
                                        <tfoot class="table-border-bottom-0">
                                        <tr>
                                            <th></th>
                                            <th>Shipping Fee</th>
                                            <th>RM 10.00</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <th>RM 68.00</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-3 my-4">
                            <div class="col mb-3 d-flex justify-content-between">
                                <strong>Payment Method</strong><span class="text-primary">FPX</span>
                            </div>
                        </div>
                        <div class="row mx-3">
                            <div class="col mb-3">
                                <div class="card border border-primary">
                                    <div class="card-body">
                                        <label for="trackNum" class="form-label">Tracking Number</label>
                                        <input
                                            type="text"
                                            id="trackNum"
                                            class="form-control"
                                            placeholder="Enter Tracking Number"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Ready to Ship</button>
                    </div>
                </div>
            </div>
        </div>

        <!---------Modal Return----------->
        <div class="modal fade" id="orderReturn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderReturnTitle">Order #124589</h5>
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
                                <p>Nur Alia Maisara<br>010-2345678<br>No. 12, Jalan Bahagia 1, Taman Bahagia
                                    06550 Alor Setar, Kedah</p>
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
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img
                                                        src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                                        class="d-block rounded"
                                                        height="50"
                                                        width="50"/>
                                                    IBERET FOLIC 500 (30'S)</div>
                                            </td>
                                            <td>1</td>
                                            <td>RM 27.00</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img
                                                        src="{{asset('admin/assets/img/products/Surbex-Zinc-750.jpg')}}"
                                                        class="d-block rounded"
                                                        height="50"
                                                        width="50"/>
                                                    SURBEX ZINC 750MG (30’S)</div>
                                            </td>
                                            <td>1</td>
                                            <td>RM 31.00</td>
                                        </tr>
                                        </tbody>
                                        <tfoot class="table-border-bottom-0">
                                        <tr>
                                            <th></th>
                                            <th>Shipping Fee</th>
                                            <th>RM 10.00</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <th>RM 68.00</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mx-3 my-4">
                            <div class="col mb-3 d-flex justify-content-between">
                                <strong>Payment Method</strong><span class="text-primary">FPX</span>
                            </div>
                        </div>
                        <div class="row mx-3">
                            <div class="col mb-3">
                                <div class="card border border-primary">
                                    <div class="card-body">
                                        <strong  class="form-label mb-3">Reason</strong>
                                        <h6>Parcel not delivered</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-outline-danger">Reject</button>
                        <button type="button" class="btn btn-primary">Accept</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- / Content -->
@endsection

@section('script')
<script>
        $(document).on("click",".viewDetail-modals", function(e){
            // alert('ok');
            var eventId = $(this).data('id');
            var url = '{{route('/')}}' + '/view/' + eventId;
            //alert(eventId);
			
            $.ajax({
                type:'GET',
                url:url ,
                data: {
                    '_token' : '<?php echo csrf_token() ?>',

                },
                success:function(data){
                    $('#viewDetail').modal('show');
                    $("#viewDetails").html(data);
                },
                error:function(data){
                    alert('error');
                    alert(JSON.stringify(data));
                }
            });
        });
</script>
@endsection

