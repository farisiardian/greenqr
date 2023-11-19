@extends('layouts.admin')
<style>
    .yourdiv
    {
        display: inline;
    }
</style>
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                Marketing Centre
            </h4>
            <div class="col-lg-12 mb-4 order-0">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::path() == 'v_marketingcenter') active @endif" href="{{route('vendor.marketingcenter')}}">
                            <i class="bx bxs-offer me-1"></i> Voucher </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript:void(0);">
                            <i class="bx bx-rocket me-1"></i> Boost Product </a>
                    </li>

                </ul>
                <div class="row mt-3">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">Boost Product</h5>
                            </div>
{{--                            <div class="d-flex justify-content-end">--}}
{{--                                <a href="{{route('vendor.createbooster')}}" type="button" class="btn btn-primary m-1 d-flex align-items-center">--}}
{{--                                    <span class="tf-icons bx bx-plus me-2"></span> Create Booster--}}
{{--                                </a>--}}
{{--                            </div>--}}
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
                                                    <th>Product</th>
                                                    <th>Period</th>
                                                    <th>Status</th>
                                                    <th>Boost Now</th>
                                                    <th>End Time</th>
                                                    <th>Boost UpComing</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($boost as $products)
                                                <tr>
                                                    <td style="width:15px">
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            @if($products->image()->first())
                                                                <img
                                                                    src="{{asset('storage/'.$products->image()->first()->image)}}"
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
                                                            <strong>{{$products->name}}</strong>
                                                        </div>
                                                    </td>
                                                    <td>{{\Carbon\Carbon::parse($products->start_at)->isoFormat("DD-MM-YYYY hh:mm")}} - {{\Carbon\Carbon::parse($products->end_at)->isoFormat("DD-MM-YYYY hh:mm")}}</td>
                                                    <td style="width:5px">
                                                        @if($products->start_at <= (\Carbon\Carbon::now()) && $products->end_at >= (\Carbon\Carbon::now()))
                                                            <span class="badge bg-label-success me-1">Ongoing</span><br>
                                                        @elseif($products->start_at >= (\Carbon\Carbon::now()) )
                                                            <span class="badge bg-label-primary me-1">Upcoming</span><br>
                                                        @elseif($products->end_at >= (\Carbon\Carbon::now()->addHours(4)) )
                                                            <span class="badge bg-label-secondary me-1">Expired</span><br>
                                                            @else
                                                            <span class="badge bg-label-secondary me-1">Expired</span><br>
                                                        @endif
                                                    </td>
                                                    <td>
{{--                                                        @if(($products->start_at <= (\Carbon\Carbon::now()) && $products->end_at >= (\Carbon\Carbon::now())) >= 10)--}}
                                                        @if($products->start_at <= (\Carbon\Carbon::now()) && $products->end_at >= (\Carbon\Carbon::now()))
                                                            <a href="{{route('storeBoosterNow',['id'=>$products->id])}}" class="booster_btn btn disabled btn-danger m-1"><i class="bx bx-rocket"></i></a>
                                                        @elseif($products->start_at >= (\Carbon\Carbon::now()) )
                                                            <a disabled href="{{route('storeBoosterNow',['id'=>$products->id])}}" class="booster_btn btn disabled btn-danger m-1"><i class="bx bx-rocket"></i></a>
                                                        @elseif($products->end_at <= (\Carbon\Carbon::now()->addHours(4)))
                                                            <a href="{{route('storeBoosterNow',['id'=>$products->id])}}" class="booster_btn btn btn-danger m-1"><i class="bx bx-rocket"></i></a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="mb-3 col-md-9">
                                                            <input disabled class="form-control" type="text" value="{{$products->end_at}}" name="end_hours" id="end_hours"/>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    @if($products->start_at <= (\Carbon\Carbon::now()) && $products->end_at >= (\Carbon\Carbon::now()))
                                                        <a href="{{route('storeBoosterUpComing',['id'=>$products->id])}}" class="booster_btn btn disabled btn-info m-1"><i class="bx bx-rocket"></i></a>
                                                    @elseif($products->start_at >= (\Carbon\Carbon::now()) )
                                                        <a disabled href="{{route('storeBoosterUpComing',['id'=>$products->id])}}" class="booster_btn btn disabled btn-info m-1"><i class="bx bx-rocket"></i></a>
                                                    @elseif($products->end_at <= (\Carbon\Carbon::now()->addHours(4)))
                                                        <a href="{{route('storeBoosterUpComing',['id'=>$products->id])}}" class="booster_btn btn btn-info m-1"><i class="bx bx-rocket"></i></a>
                                                    @endif
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
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            <strong>SURBEX ZINC 750MG (30’S)</strong></div></td>--}}
{{--                                                    <td>10/10/2022 09:00 - 17/10/2022 10:00</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-primary me-1">Upcoming</span>--}}
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
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            <strong>BIO D3 80’S</strong></div>--}}
{{--                                                    </td>--}}
{{--                                                    <td>10/10/2022 09:00 - 17/10/2022 10:00</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-secondary me-1">Expired</span>--}}
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
                                                    <th>Product</th>
                                                    <th>Period</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($ongoingproduct as $products)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            @if($products->image()->first())
                                                                <img
                                                                    src="{{asset('storage/'.$products->image()->first()->image)}}"
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
                                                            <strong>{{$products->name}}</strong>
                                                        </div>
                                                    </td>
                                                    <td>{{\Carbon\Carbon::parse($products->start_at)->isoFormat("DD-MM-YYYY hh:mm")}} - {{\Carbon\Carbon::parse($products->end_at)->isoFormat("DD-MM-YYYY hh:mm")}}</td>
                                                    <td>
                                                        <span class="badge bg-label-success me-1">Ongoing</span>

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
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            <strong>SURBEX ZINC 750MG (30’S)</strong></div></td>--}}
{{--                                                    <td>10/10/2022 09:00 - 17/10/2022 10:00</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-success me-1">Ongoing</span>--}}
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
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            <strong>BIO D3 80’S</strong></div>--}}
{{--                                                    </td>--}}
{{--                                                    <td>10/10/2022 09:00 - 17/10/2022 10:00</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-success me-1">Ongoing</span>--}}
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
                                                    <th>Product</th>
                                                    <th>Period</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($upcomingproduct as $products)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            @if($products->image()->first())
                                                                <img
                                                                    src="{{asset('storage/'.$products->image()->first()->image)}}"
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
                                                            <strong>{{$products->name}}</strong>
                                                        </div>
                                                    </td>
                                                    <td>{{\Carbon\Carbon::parse($products->start_at)->isoFormat("DD-MM-YYYY hh:mm")}} - {{\Carbon\Carbon::parse($products->end_at)->isoFormat("DD-MM-YYYY hh:mm")}}</td>
                                                    <td>
                                                        <span class="badge bg-label-primary me-1">Upcoming</span>
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
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            <strong>SURBEX ZINC 750MG (30’S)</strong></div></td>--}}
{{--                                                    <td>10/10/2022 09:00 - 17/10/2022 10:00</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-primary me-1">Upcoming</span>--}}
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
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            <strong>BIO D3 80’S</strong></div>--}}
{{--                                                    </td>--}}
{{--                                                    <td>10/10/2022 09:00 - 17/10/2022 10:00</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-primary me-1">Upcoming</span>--}}
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
                                                    <th>Product</th>
                                                    <th>Period</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($expiredproduct as $products)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            @if($products->image()->first())
                                                                <img
                                                                    src="{{asset('storage/'.$products->image()->first()->image)}}"
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
                                                            <strong>{{$products->name}}</strong>
                                                        </div>
                                                    </td>
                                                    <td>{{\Carbon\Carbon::parse($products->start_at)->isoFormat("DD-MM-YYYY hh:mm")}} - {{\Carbon\Carbon::parse($products->end_at)->isoFormat("DD-MM-YYYY hh:mm")}}</td>
                                                    <td>
                                                        <span class="badge bg-label-secondary me-1">Expired</span>
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
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Surbex-Zinc-750.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            <strong>SURBEX ZINC 750MG (30’S)</strong></div></td>--}}
{{--                                                    <td>10/10/2022 09:00 - 17/10/2022 10:00</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-secondary me-1">Expired</span>--}}
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
{{--                                                    <td>--}}
{{--                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                            <img--}}
{{--                                                                src="../assets/img/products/Bio-D3.jpg"--}}
{{--                                                                class="d-block rounded"--}}
{{--                                                                height="100"--}}
{{--                                                                width="100"/>--}}
{{--                                                            <strong>BIO D3 80’S</strong></div>--}}
{{--                                                    </td>--}}
{{--                                                    <td>10/10/2022 09:00 - 17/10/2022 10:00</td>--}}
{{--                                                    <td>--}}
{{--                                                        <span class="badge bg-label-secondary me-1">Expired</span><br>--}}
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
<script type="text/javascript">
</script>
