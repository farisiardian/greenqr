@extends('layouts.admin')
@section('content')
    <!-- Modal -->
    <div class="modal fade text-left" id="editSolicitor" tabindex="-1" role="dialog" aria-labelledby="modalEditSolicitor" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalEditSolicitor">Edit Solicitor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="editSolicitors">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light"></span> My Orders
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
                            >All</a
                            >
                            <a
                                class="list-group-item list-group-item-action"
                                id="incoming-list-item"
                                data-bs-toggle="list"
                                href="#horizontal-toProcess"
                            >To Process</a
                            >
                            <a
                                class="list-group-item list-group-item-action"
                                id="ship-list-item"
                                data-bs-toggle="list"
                                href="#horizontal-processed"
                            >Processed</a
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
                                                    <th>Order</th>
                                                    <th>Total Price</th>
                                                    <th>Status</th>
                                                    <th>Channels</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orderall->groupBy('transaction_id') as $key => $orders)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            <img
                                                                src="../assets/img/products/Iberet-Folic-500.jpg"
                                                                class="d-block rounded"
                                                                height="100"
                                                                width="100"/>
                                                            {{$orders[0]->name}}<span>x{{$orders->count('transaction_id')}}</span></div>
{{--                                                            <div class="d-flex align-items-start align-items-sm-center gap-4 mt-2">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            {{$orders[0]->name}}<span>x{{$orders->count('transaction_id')}}</span></div>--}}
                                                    </td>
                                                    <td><div>RM{{$orders->sum('total_payment')}}</div><div><span>Online Banking - Maybank</span></div></td>
                                                    <td>
                                                        @if($orders[0]->status == 'Completed')
                                                            <span class="badge bg-label-success me-1">Delivered</span>
                                                        @elseif($orders[0]->status == 'To Ship')
                                                            <span class="badge bg-label-primary me-1">To Ship</span>
                                                        @else
                                                            <span class="badge bg-label-primary me-1">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>Shopee Express</td>
                                                    <td><a data-bs-toggle="modal" href="#pickup">Prepare Delivery</a></td>
                                                </tr>
                                                @endforeach
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            SURBEX ZINC 750MG (30’S)<span>x1</span></div>--}}
{{--                                                    </td>--}}
{{--                                                    <td><div>RM20.00</div><div><span>Online Banking - Maybank</span></div></td>--}}
{{--                                                    <td><span class="badge bg-label-primary me-1">To Ship</span></td>--}}
{{--                                                    <td>Shopee Express</td>--}}
{{--                                                    <td><a data-bs-toggle="modal" href="#pickup">Prepare Delivery</a></td>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            BIO D3 80’S<span>x2</span></div>--}}
{{--                                                    </td>--}}
{{--                                                    <td><div>RM20.00</div><div><span>Online Banking - CIMB Bank</span></div></td>--}}
{{--                                                    <td><span class="badge bg-label-primary me-1">To Ship</span></td>--}}
{{--                                                    <td>Shopee Express</td>--}}
{{--                                                    <td><a data-bs-toggle="modal" href="#pickup">Prepare Delivery</a></td>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Thycurm1.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            THYCURM (30’S) <span>x1</span></div>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4 mt-2">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            SURBEX ZINC 750MG (30’S)<span>x1</span></div>--}}
{{--                                                    </td>--}}
{{--                                                    <td><div>RM20.00</div><div><span>Credit/Debit Card</span></div></td>--}}
{{--                                                    <td><span class="badge bg-label-success me-1">Delivered</span></td>--}}
{{--                                                    <td>JNT Ekspress</td>--}}
{{--                                                    <td><a data-bs-toggle="modal" href="#pickup">Prepare Delivery</a></td>--}}
{{--                                                </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="horizontal-toProcess">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Total Price</th>
                                                    <th>Status</th>
                                                    <th>Channels</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($toship->groupBy('transaction_id') as $key=>$orders)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            <img
                                                                src="../assets/img/products/Iberet-Folic-500.jpg"
                                                                class="d-block rounded"
                                                                height="100"
                                                                width="100"/>
                                                            {{$orders[0]->name}}<span>x{{$orders->count('transaction_id')}}</span></div>
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4 mt-2">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            SURBEX ZINC 750MG (30’S)<span>x1</span></div>--}}
                                                    </td>
                                                    <td><div>RM{{$orders->sum('total_payment')}}</div><div><span>Online Banking - Maybank</span></div></td>
                                                    <td><span class="badge bg-label-primary me-1">{{$orders[0]->status}}</span></td>
                                                    <td>Shopee Express</td>
                                                    <td><a href="#" data-toggle="modal" data-target="#editSolicitor" data-id="{{$orders[0]->transaction_id}}" class="btn btn-primary editSolicitor-modals">Prepare Delivery</a></td>
{{--                                                    <td>--}}
{{--                                                        <a data-bs-toggle="modal" href="#" data-bs-target="#myModal{{$orders[0]->transaction_id}}" data-id="{{$orders[0]->transaction_id}}"  class="editAddressModal"><i class="fa fa-lg fa-edit text-white"></i>Prepare Delivery</a>--}}

{{--                                                        <form action="{{route('saveshiporder')}}" id="" method="POST" onsubmit="return true">--}}
{{--                                                            @csrf--}}
{{--                                                        <div class="modal fade" id="myModal{{$orders[0]->transaction_id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--                                                            <div class="modal-dialog ">--}}
{{--                                                                <div class="modal-content">--}}
{{--                                                                    <div class="modal-header">--}}
{{--                                                                        <h4 class="modal-title">#{{$orders[0]->transaction_id}}</h4>--}}

{{--                                                                        <input hidden type="text" id="trans_id" name="trans_id" value="{{$orders[0]->transaction_id}}">--}}

{{--                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="modal-body">--}}
{{--                                                                        <div class="row mx-3">--}}
{{--                                                                            <div class="col-12 mb-3">--}}
{{--                                                                                <label for="name" class="form-label">Name</label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    id="name"--}}
{{--                                                                                    name="name"--}}
{{--                                                                                    value="{{$orders[0]->name}}"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="col-12 mb-3">--}}
{{--                                                                                <label for="contact" class="form-label">Contact Number</label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="number"--}}
{{--                                                                                    id="contact"--}}
{{--                                                                                    value="{{$orders[0]->phone}}"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="col-12 mb-3">--}}
{{--                                                                                <label for="address" class="form-label">Address</label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    id="address"--}}
{{--                                                                                    value="{{$orders[0]->address}}"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="col-12 mb-3">--}}
{{--                                                                                <label for="tracking" class="form-label">Tracking Number</label>--}}
{{--                                                                                <input--}}
{{--                                                                                    type="text"--}}
{{--                                                                                    id="tracking"--}}
{{--                                                                                    name="tracking"--}}
{{--                                                                                    class="form-control"--}}
{{--                                                                                />--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="modal-footer">--}}
{{--                                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">--}}
{{--                                                                            Close--}}
{{--                                                                        </button>--}}
{{--                                                                        <button type="submit" class="btn btn-primary">Ship</button>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="container">--}}
{{--                                                                        --}}
{{--                                                                    </div>--}}
{{--                                                                    <div id="modal-edit-address">--}}

{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        </form>--}}
{{--                                                    </td>--}}
                                                </tr>
                                                @endforeach
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            SURBEX ZINC 750MG (30’S)<span>x1</span></div>--}}
{{--                                                    </td>--}}
{{--                                                    <td><div>RM20.00</div><div><span>Online Banking - Maybank</span></div></td>--}}
{{--                                                    <td><span class="badge bg-label-primary me-1">To Ship</span></td>--}}
{{--                                                    <td>Shopee Express</td>--}}
{{--                                                    <td><a data-bs-toggle="modal" href="#pickup">Prepare Delivery</a></td>--}}
{{--                                                </tr>--}}
{{--                                                <tr>--}}
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            BIO D3 80’S<span>x2</span></div>--}}
{{--                                                    </td>--}}
{{--                                                    <td><div>RM20.00</div><div><span>Online Banking - CIMB Bank</span></div></td>--}}
{{--                                                    <td><span class="badge bg-label-primary me-1">To Ship</span></td>--}}
{{--                                                    <td>Shopee Express</td>--}}
{{--                                                    <td><a data-bs-toggle="modal" href="#pickup">Prepare Delivery</a></td>--}}
{{--                                                </tr>--}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="horizontal-processed">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Total Price</th>
                                                    <th>Status</th>
                                                    <th>Channels</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($completed->groupBy('transaction_id') as $key=>$orders)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            <img
                                                                src="../assets/img/products/Thycurm1.jpg"
                                                                class="d-block rounded"
                                                                height="100"
                                                                width="100"/>
                                                            {{$orders[0]->name}} <span>x{{$orders->count('transaction_id')}}</span></div>
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4 mt-2">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            SURBEX ZINC 750MG (30’S)<span>x1</span></div>--}}
                                                    </td>
                                                    <td><div>RM{{$orders->sum('total_payment')}}</div><div><span>Credit/Debit Card</span></div></td>
                                                    <td><span class="badge bg-label-success me-1">Delivered</span></td>
                                                    <td>JNT Ekspress</td>
                                                    <td><a data-bs-toggle="modal" href="#pickup">Prepare Delivery</a></td>
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
            <div class="modal fade" id="myModal2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Address</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">×</button>
                        </div><div class="container"></div>
                        <div id="modal-edit-address">

                        </div>
                    </div>
                </div>
            </div>
            <!---------Modal Return----------->
            <div class="modal fade" id="dropOff" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="orderReturnTitle">Drop Off</h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col mb-3">
                                    <p class="text-center">You can drop off your parcel at any Shopee Express branch</p>
                                </div>
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
        <!-- Add Content Here -->
    </div>
@endsection
@section('script')
<script>
    $(document).on("click", ".editSolicitor-modals", function (e) {

        var eventId = $(this).data('id');

        var url = `{{route('/')}}` + '/ship_order/' + eventId;


        $.ajax({
            type:'GET',
            url:url ,
            data: {
                '_token' : '<?php echo csrf_token() ?>',

            },
            success:function(data){
                $('#editSolicitor').modal('show');
                $("#editSolicitors").html(data);

            },
            error:function(data){
                // alert('error');
                // alert(JSON.stringify(data));
            }
        });
    })
</script>
@endsection
