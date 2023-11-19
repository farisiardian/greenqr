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
                        >Completed<span class="badge bg-label-primary ms-2 rounded-circle">{{$completed->count('product_id')}}</span></a
                        >
                    </div>
                    <div class="tab-content px-0 mt-0">
                        <div class="tab-pane fade show active" id="horizontal-all">
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
                                                        @if($all->image()->first())
                                                            <img
                                                                src="{{asset('storage/'.$all->image()->first()->image)}}"
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
                                                    {{$all->name}}</div></td>
                                                <td>RM{{$all->cart_total}}</td>
                                                <td>
                                                    @if($all->status_r == 'Refund Pending')
                                                        <span class="badge bg-label-primary me-1">REFUND PENDING</span>
                                                        <div><small>Offer a full refund or partial refund if you do not require the buyer to return the item(s)</small></div>
                                                    @elseif($all->status_r == 'Accept')
                                                        <span class="badge bg-label-success me-1">LIFECARE REVIEWING</span>
                                                        <div><small>Need further Lifecare Action's</small></div>
                                                    @elseif($all->status_r == 'Dispute')
                                                        <span class="badge bg-label-danger me-1">Disputed</span>
                                                        <div><small>Vendor not accepting this refund</small></div>
                                                    @elseif($all->status_r == 'Partial Refund')
                                                        <span class="badge bg-label-success me-1">LIFECARE REVIEWING</span>
                                                        <div><small>Need further Lifecare Action's</small></div>
                                                    @elseif($all->status_r == 'Approved')
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
                                                <td>
                                                    <div><span class="badge bg-label-primary me-1">Refund Pending</span></div>
                                                    <div><small>Respond to Lifecare's decision by 18-09-2022</small></div>
                                                </td>
                                                <td>Receive product(s) with physical damage</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">
                                                                @if(Auth::user()->role == 'vendor')
                                                                    <a class="dropdown-item" href="{{route('DisputeRefund',['id'=>$toResponds->id])}}">Dispute</a>
                                                                    <a class="dropdown-item" href="{{route('fullRefund',['id'=>$toResponds->id])}}">Full Refund</a>
                                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#" data-id="{{$toResponds->id}}" data-bs-target="#orderRefund{{$toResponds->id}}">Offer Partial Refund</a>
                                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#">Wait for Return</a>
                                                                    <a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$toResponds->id}}" class="viewDetail-modals dropdown-item">View</a>
                                                                @elseif(Auth::user()->role == 'admin')
                                                                    <a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$toResponds->id}}" class="viewDetail-modals dropdown-item">View</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                <td>RM{{$toRespondeds->cart_total}}</td>
                                                <td>
                                                    <span class="badge bg-label-warning me-1">Case under Review</span>
                                                    <div><small>Review by Lifecare Admin</small></div>
                                                </td>

                                                <td>Receive product(s) with physical damage</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                        @if(Auth::user()->role == 'admin')
                                                            <a class="dropdown-item" href="{{route('ApprovalByLifecare',['id'=>$toRespondeds->id])}}">Approved</a>
                                                            <a class="dropdown-item" href="{{route('DisapprovalByLifecare',['id'=>$toRespondeds->id])}}">Dispute</a>
                                                            <a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$toRespondeds->id}}" class="viewDetail-modals dropdown-item">View</a>
                                                        @elseif(Auth::user()->role == 'vendor')
                                                            <a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$toRespondeds->id}}" class="viewDetail-modals dropdown-item">View</a>
                                                        @endif
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
                                            @foreach($completed as $completes)
                                            <tr>
                                                <td><div class="d-flex align-items-start align-items-sm-center gap-4">
                                                        <img
                                                            src="../assets/img/products/Iberet-Folic-500.jpg"
                                                            class="d-block rounded"
                                                            height="90"
                                                            width="90"/>
                                                    {{$completes->name}}</div></td>
                                                <td>RM{{$completes->cart_total}}</td>
                                                <td>
                                                    @if($completes->status_r == 'Dispute')
                                                        <span class="badge bg-label-secondary me-1">Dispute Accepted</span>
                                                    @elseif($completes->status_r == 'Approved')
                                                        <span class="badge bg-label-secondary me-1">Approved Accepted</span>
                                                    @endif
                                                </td>
                                                <td>Receive product(s) with physical damage</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a href="#" data-toggle="modal" data-target="#viewDetail" data-id="{{$toResponds->id}}" class="viewDetail-modals dropdown-item">View</a>
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
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
        });

        $(document).ready( function () {
            $('#horizontal-all').DataTable();
            alert('datatable');
        });
    </script>
@endsection

