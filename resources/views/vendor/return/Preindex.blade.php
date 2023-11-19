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

    <!-- Modal View Partial Refund-->
    <div class="modal fade text-left" id="partialRefund" tabindex="-1" role="dialog" aria-labelledby="partialRefund" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div id="partialRefunds">

                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"></span> Return/Refund
        </h4>

        <div class="row">
            <!-- Custom content with heading -->
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-primary m-1">
                    <span class="tf-icons bx bx-download"></span> Export
                </button>
            </div>
            <div class="col-lg-12">
                <div class="demo-inline-spacing mt-3">
                    <div class="list-group list-group-horizontal-md text-md-center">
                        <a
                            class="list-group-item list-group-item-action active"
                            id="all-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-all"
                        >All<span class="badge bg-label-primary ms-2 rounded-circle">{{$returnNrefund->count('product_id')}}</span></a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            id="request-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-request"
                        >New Request <span class="badge bg-label-primary ms-2 rounded-circle">{{$toRequest->count('product_id')}}</span></a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            id="toRespond-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-toRespond"
                        >To Respond <span class="badge bg-label-primary ms-2 rounded-circle">{{$toRespond->count('product_id')}}</span></a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            id="responded-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-responded"
                        >Responded <span class="badge bg-label-primary ms-2 rounded-circle">{{$toResponded->count('product_id')}}</span></a
                        >
                        <a
                            class="list-group-item list-group-item-action"
                            id="completed-list-item"
                            data-bs-toggle="list"
                            href="#horizontal-completed"
                        >Completed<span class="badge bg-label-primary ms-2 rounded-circle">3</span></a
                        >
                    </div>
                    <div class="tab-content px-0 mt-0">
                        <div class="tab-pane fade show active" id="horizontal-all">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Refund Amount</th>
                                                <th>Status</th>
                                                <th>Reason</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($returnNrefund as $all)
                                            <tr>
                                                <td><div class="d-flex align-items-start align-items-sm-center gap-4">
                                                        <img
                                                            src="../assets/img/products/Iberet-Folic-500.jpg"
                                                            class="d-block rounded"
                                                            height="90"
                                                            width="90"/>
                                                    {{$all->name}}</div></td>
                                                <td>RM{{$all->cart_total}}</td>
                                                <td>
                                                    @if($all->status_r == 'Return Pending')
                                                        <span class="badge bg-label-primary me-1">RETURN PENDING</span>
                                                        <div><small>Offer a partial refund if you do not require the buyer to return the item(s)</small></div>
                                                    @elseif($all->status_r == 'Refund Review')
                                                        <span class="badge bg-label-success me-1">LIFECARE REVIEWING</span>
                                                    @elseif($all->status_r == 'Accept')
                                                        <span class="badge bg-label-warning me-1">COMPLETED</span>
                                                    @elseif($all->status_r == 'Refund Pending')
                                                        <span class="badge bg-label-danger me-1">APPROVED BY LIFECARE</span>
                                                        <div><small>Respond to Lifecare's decision by 18-09-2022</small></div>
                                                    @endif
                                                </td>
                                                <td>{{$all->reason}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$all->id}}" class="viewDetail-modals dropdown-item">View</a>
                                                        </div>

                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        SURBEX ZINC 750MG (30’S)</div></td>--}}
{{--                                                <td>RM31.00</td>--}}
{{--                                                <td>--}}
{{--                                                    <div><span class="badge bg-label-danger me-1">Approved by LifeCare</span></div>--}}
{{--                                                    <div><small>Respond to Lifecare's decision by 18-09-2022</small></div>--}}
{{--                                                </td>--}}
{{--                                                <td>Receive product(s) with physical damage</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#">Accept</a>--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderDispute">Dispute</a>--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderDetail">View</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        BIO D3 80’S</div></td>--}}
{{--                                                <td>RM60.00</td>--}}
{{--                                                <td>--}}
{{--                                                    <div>--}}
{{--                                                        <span class="badge bg-label-primary me-1">Return Pending</span>--}}
{{--                                                        <div><small>Offer a partial refund if you do not require the buyer to return the item(s)</small></div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td>Receive product(s) with physical damage</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#">Full Refund</a>--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderRefund">Offer Partial Refund</a>--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#">Wait for Return</a>--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderDetail">View</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="horizontal-request">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Refund Amount</th>
                                                <th>Status</th>
                                                <th>Reason</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($toRequest as $newRequest)
                                            <tr>
                                                <td><div class="d-flex align-items-start align-items-sm-center gap-4">
                                                        <img
                                                            src="../assets/img/products/Iberet-Folic-500.jpg"
                                                            class="d-block rounded"
                                                            height="90"
                                                            width="90"/>
                                                    {{$newRequest->name}}</div></td>
                                                <td>RM{{$newRequest->cart_total}}</td>
                                                <td><span class="badge bg-label-success me-1">LifeCare Reviewing</span></td>
                                                <td>{{$newRequest->reason}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$newRequest->id}}" class="viewDetail-modals dropdown-item">View</a>
                                                        </div>

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
                        <div class="tab-pane fade" id="horizontal-toRespond">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Refund Amount</th>
                                                <th>Status</th>
                                                <th>Reason</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($toRespond as $toResponds)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                        <img
                                                            src="../assets/img/products/Surbex-Zinc-750.jpg"
                                                            class="d-block rounded"
                                                            height="100"
                                                            width="100"/>
                                                        {{$toResponds->name}}</div></td>
                                                <td>RM{{$toResponds->total_payment}}</td>
                                                @if($toResponds->status_r == 'Refund Pending')
                                                <td>
                                                    <div><span class="badge bg-label-danger me-1">Approved by LifeCare - Barang Rosak dan seller refund duit sepenuhnya</span></div>
                                                    <div><small>Respond to Lifecare's decision by 18-09-2022</small></div>
                                                </td>
                                                <td>Receive product(s) with physical damage</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{route('ApprovedRefund',['id'=>$toResponds->id])}}">Accept</a>
                                                            <a class="dropdown-item" href="{{route('DisapprovedRefund',['id'=>$toResponds->id])}}">Dispute</a>
                                                            <a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$toResponds->id}}" class="viewDetail-modals dropdown-item">View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                @elseif($toResponds->status_r == 'Return Pending')
                                                    <td>
                                                        <div>
                                                            <span class="badge bg-label-primary me-1">Return Pending - Return Barang yang rosak</span>
                                                            <div><small>Offer a partial refund if you do not require the buyer to return the item(s)</small></div>
                                                        </div>
                                                    </td>
                                                    <td>Receive product(s) with physical damage</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{route('fullRefund',['id'=>$toResponds->id])}}">Full Refund</a>
{{--                                                                <a href="#" data-toggle="modal" data-target="#orderRefund" data-id="{{$toResponds->id}}" class="partialRefund-modals dropdown-item">Offer Partial Refund</a>--}}
                                                                <a class="dropdown-item" data-bs-toggle="modal" href="#" data-id="{{$toResponds->id}}" data-bs-target="#orderRefund{{$toResponds->id}}">Offer Partial Refund</a>
                                                                <a class="dropdown-item" data-bs-toggle="modal" href="#">Wait for Return</a>
                                                                <a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$toResponds->id}}" class="viewDetail-modals dropdown-item">View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <form action="{{route('savepartialrefund',['id'=>$toResponds->id])}}" method="POST" onsubmit="return true">
                                                @csrf
                                            <div class="modal fade" id="orderRefund{{$toResponds->id}}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button
                                                                type="button"
                                                                class="btn-close"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"
                                                            ></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mx-3">
                                                                <label for="refund" class="form-label">Offer Partial Refund (RM)</label>

                                                                <input
                                                                    type="text"
                                                                    id="partial_refund"
                                                                    name="partial_refund"
                                                                    class="form-control"
                                                                    placeholder="Enter (RM)"
                                                                />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                            @endforeach
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        BIO D3 80’S</div></td>--}}
{{--                                                <td>RM60.00</td>--}}
{{--                                                <td>--}}
{{--                                                    <div>--}}
{{--                                                        <span class="badge bg-label-primary me-1">Return Pending</span>--}}
{{--                                                        <div><small>Offer a partial refund if you do not require the buyer to return the item(s)</small></div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td>Receive product(s) with physical damage</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#">Full Refund</a>--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderRefund">Offer Partial Refund</a>--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#">Wait for Return</a>--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderDetail">View</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="horizontal-responded">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Refund Amount</th>
                                                <th>Status</th>
                                                <th>Reason</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($toResponded as $toRespondeds)
                                            <tr>
                                                <td><div class="d-flex align-items-start align-items-sm-center gap-4">
                                                        <img
                                                            src="../assets/img/products/Iberet-Folic-500.jpg"
                                                            class="d-block rounded"
                                                            height="90"
                                                            width="90"/>
                                                        {{$toRespondeds->name}}</div></td>
                                                <td>RM{{$toRespondeds->total_payment}}</td>
                                                <td><span class="badge bg-label-warning me-1">Case under Review</span></td>
                                                <td>Receive product(s) with physical damage</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderDetail">View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        BIO D3 80’S</div></td>--}}
{{--                                                <td>RM60.00</td>--}}
{{--                                                <td><span class="badge bg-label-warning me-1">Case Under Review</span> </td>--}}
{{--                                                <td>Receive product(s) with physical damage</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderDetail">View</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
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
                                                <th>Product</th>
                                                <th>Refund Amount</th>
                                                <th>Status</th>
                                                <th>Reason</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><div class="d-flex align-items-start align-items-sm-center gap-4">
                                                        <img
                                                            src="../assets/img/products/Iberet-Folic-500.jpg"
                                                            class="d-block rounded"
                                                            height="90"
                                                            width="90"/>
                                                        IBERET FOLIC 500 (30'S)</div></td>
                                                <td>RM27.00</td>
                                                <td><span class="badge bg-label-secondary me-1">Dispute Accepted</span></td>
                                                <td>Receive product(s) with physical damage</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderDetail">View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                        <img
                                                            src="../assets/img/products/Surbex-Zinc-750.jpg"
                                                            class="d-block rounded"
                                                            height="100"
                                                            width="100"/>
                                                        SURBEX ZINC 750MG (30’S)</div></td>
                                                <td>RM31.00</td>
                                                <td><span class="badge bg-label-secondary me-1">Dispute Accepted</span></td>
                                                <td>Receive product(s) with physical damage</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderDetail">View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                        <img
                                                            src="../assets/img/products/Bio-D3.jpg"
                                                            class="d-block rounded"
                                                            height="100"
                                                            width="100"/>
                                                        BIO D3 80’S</div></td>
                                                <td>RM60.00</td>
                                                <td><span class="badge bg-label-secondary me-1">Dispute Rejected</span></td>
                                                <td>Receive product(s) with physical damage</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" data-bs-toggle="modal" href="#orderDetail">View</a>
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
        <div class="modal fade" id="orderRefund" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mx-3">
                            <label for="refund" class="form-label">Offer Partial Refund (RM)</label>
                            <input type="text" value="" class="">
                            <input
                                type="text"
                                id="refund"
                                class="form-control"
                                placeholder="Enter (RM)"
                            />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

    <!---------Modal Dispute----------->
        <div class="modal fade" id="orderDispute" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Dispute</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mx-3">
                            <label for="disputeReason" class="form-label">Dispute Reason</label>
                            <input
                                type="text"
                                id="disputeReason"
                                class="form-control"
                                placeholder="Enter Reason"
                            />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('script')
    <script>
        $(document).on("click",".viewDetail-modals", function(e){
            // alert('ok');
            var eventId = $(this).data('id');
            var url = '{{route('/')}}' + '/return/' + eventId;

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
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
        });
    </script>
@endsection
