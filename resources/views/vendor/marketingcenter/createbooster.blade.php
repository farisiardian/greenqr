@extends('layouts.admin')
@section('content')
    <!---------Modal----------->
    <div class="modal fade" id="orderDetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Choose Product</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="checkbox" id="prodCheck1" value="option1" />
                                </div>
                            </th>
                            <th>Product Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Sales</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($booster as $boosters)
                        <tr>
                            <td>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="checkbox" id="prodCheck2" value="option1" />
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    @if($boosters->image()->first())
                                    <img
                                        src="{{asset('storage/'.$boosters->image()->first()->image)}}"
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
                                    <strong>{{$boosters->name}}</strong></div>
                            </td>
                            <td>{{$boosters->sku_code}}</td>
                            <td>RM {{$boosters->list_price_on_store}}</td>
                            <td>100 {{$boosters->stocks()->sum('total_stock')}}</td>
                            <td>0</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="form-check form-check-inline mt-3">--}}
{{--                                    <input class="form-check-input" type="checkbox" id="prodCheck3" value="option1" />--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                    <img--}}
{{--                                        src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                        class="d-block rounded"--}}
{{--                                        height="100"--}}
{{--                                        width="100"/>--}}
{{--                                    <strong>SURBEX ZINC 750MG (30’S)</strong></div>--}}
{{--                            </td>--}}
{{--                            <td>002</td>--}}
{{--                            <td>RM31.00</td>--}}
{{--                            <td>100</td>--}}
{{--                            <td>0</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="form-check form-check-inline mt-3">--}}
{{--                                    <input class="form-check-input" type="checkbox" id="prodCheck4" value="option1" />--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                    <img--}}
{{--                                        src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                        class="d-block rounded"--}}
{{--                                        height="100"--}}
{{--                                        width="100"/>--}}
{{--                                    <strong>BIO D3 80’S</strong></div>--}}
{{--                            </td>--}}
{{--                            <td>003</td>--}}
{{--                            <td>RM60.00</td>--}}
{{--                            <td>50</td>--}}
{{--                            <td>40</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="form-check form-check-inline mt-3">--}}
{{--                                    <input class="form-check-input" type="checkbox" id="prodCheck5" value="option1" />--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                    <img--}}
{{--                                        src="../assets/img/products/Thycurm1.jpg"--}}
{{--                                        class="d-block rounded"--}}
{{--                                        height="100"--}}
{{--                                        width="100"/>--}}
{{--                                    <strong>THYCURM (30’S)</strong></div>--}}
{{--                            </td>--}}
{{--                            <td>004</td>--}}
{{--                            <td>RM65.00</td>--}}
{{--                            <td>30</td>--}}
{{--                            <td>20</td>--}}
{{--                            <td>--}}
{{--                                <div class="dropdown">--}}
{{--                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                    <div class="dropdown-menu">--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>
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
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Boost / </span> Boost Product
        </h4>
        <!-- Add Content Here -->
        <div class="card mb-4">
            <h5 class="card-header">Basic Info</h5>
            <!-- Account -->
            <hr class="my-0" />
            <div class="card-body">
                <form action="{{route('storeBooster')}}" id="formAccountSettings" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <div class="row">
                                <label for="addProd" class="form-label">Choose Product</label>
                                <div class="col-md-6">
                                    <button id="addProd" class="btn btn-primary d-flex align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#orderDetail"><i class="bx bx-plus me-1"></i>Add</button>
                                </div>
                            </div>
                        </div>

                        <div class=" my-3">
                            <h5 class="mb-0">Voucher Usage Period</h5>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="start" class="form-label">Start Time</label>
                            <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" name="start" id="start"/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="end" class="form-label">End Time</label>
                            <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00" name="end" id="end"/>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
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
