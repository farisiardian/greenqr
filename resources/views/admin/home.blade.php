@extends('layouts.admin')
@if(Auth::user()->role == 'admin')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex row align-items-center">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h4 class="card-title text-primary"><p  style="color:#274439">Welcome to your dashboard</p></h4>
                                </div>
                            </div>
                            <div class="col-sm-5 text-end text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="{{asset('admin/assets/img/illustrations/man-with-laptop-light.png')}}" height="140" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-12 col-md-4 col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="bi bi-person-badge bg-label-primary rounded p-sm-3 "></i>
                                        </div>
                                        <div class="dropdown">
                                            <button
                                                class="btn p-0"
                                                type="button"
                                                id="cardOpt4"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                <!--i class="bx bx-dots-vertical-rounded"></i-->
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                                <a class="dropdown-item" href="{{route('allstaff.index')}}">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="d-block mb-1">Staff</span>
                                    <h3 class="card-title text-nowrap mb-2">{{$staff->count('staff_id')}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="bi bi-star bg-label-success rounded p-sm-3"></i>
                                        </div>
                                        <div class="dropdown">
                                            <button
                                                class="btn p-0"
                                                type="button"
                                                id="cardOpt1"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                <!--i class="bx bx-dots-vertical-rounded"></i-->
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                <a class="dropdown-item" href="{{route('merchant.index')}}">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="d-block mb-1">Merchant</span>
                                    <h3 class="card-title mb-2">{{$merchant->count('id')}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="bi bi-person bg-label-info rounded p-sm-3"></i>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <!--i class="bx bx-dots-vertical-rounded"></i-->
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="{{route('user.index')}}">View More</a>

                                            </div>
                                        </div>
                                    </div>
                                    <span class="d-block mb-1">User</span>
                                    <h3 class="card-title mb-2">{{$user->count('id')}}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <i class="bi bi-graph-up-arrow bg-label-warning rounded p-sm-3"></i>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <!--i class="bx bx-dots-vertical-rounded"></i-->
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                <a class="dropdown-item" href="{{route('sales.index')}}">View More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="d-block mb-1">Sales</span>
                                    <h3 class="card-title text-nowrap mb-1">RM {{$totalSales->sum('cart_total')}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="card">
                        <div class="row row-bordered g-0">
                            <div class="col-md-8">
                                <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                                <div id="totalRevenueChart1" class="px-2"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="text-center">
                                        <!--div class="dropdown">
                                            <!--button
                                                class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                type="button"
                                                id="growthReportId"
                                                data-bs-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                            >
                                                2022
                                            </button>
                                            <!--div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                                <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                                <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                                <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                            </div>
                                        </div-->
                                    </div>
                                </div>
                                <div id="growthChartNew"></div>
                                <div class="text-center fw-semibold pt-3 mb-2">{{$growthRate}}% Shop Growth</div>

                                <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                        </div>
                                       <div class="d-flex flex-column">
                                            <small>Total Sales</small>
                                            <h6 class="mb-0">RM {{$currentYearSalesAd}} </h6>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <small>Total Order</small>
                                            <h6 class="mb-0">{{isset($data1[0]) ? $data1[0]['totalOrder'] : ''}} </h6>
                                        </div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Merchant Sales</h5>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @foreach($merchantSales as $merchants)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3 ">
                                        <img  class="img-fluid" src="{{asset('storage/'.$merchants->profile_image)}}" alt="">
{{--                                        <img src="../assets/img/vendor/lunavieLogo.png" class="rounded-circle border"/>--}}
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="d-flex align-self-center">
                                            <h6 class="mb-0">{{$merchants->name}}</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0">{{$merchants->count('id')}}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
{{--                                <li class="d-flex mb-4 pb-1">--}}
{{--                                    <div class="avatar flex-shrink-0 me-3 ">--}}
{{--                                        <img src="../assets/img/vendor/posturealign.png" class="rounded-circle border"/>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
{{--                                        <div class="me-2">--}}

{{--                                            <h6 class="mb-0">Posture Align</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="user-progress d-flex align-items-center gap-1">--}}
{{--                                            <h6 class="mb-0">12</h6>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="d-flex mb-4 pb-1">--}}
{{--                                    <div class="avatar flex-shrink-0 me-3 ">--}}
{{--                                        <img src="../assets/img/vendor/LIGHTHEAL.png" class="rounded-circle border"/>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">--}}
{{--                                        <div class="me-2">--}}

{{--                                            <h6 class="mb-0">LightHeal</h6>--}}
{{--                                        </div>--}}
{{--                                        <div class="user-progress d-flex align-items-center gap-1">--}}
{{--                                            <h6 class="mb-0">5</h6>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/ Transactions -->
            </div>
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
@endif

@if(Auth::user()->role == 'vendor')
@section('content')
    <!-- Admin Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary"><p  style="color:#274439">Welcome to your dashboard 🎉</p></h5>
                                <p class="mb-4"> Thank you for registered.</p>

                            </div>
                        </div>
                        <div class="col-sm-5 text-end text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{asset('admin/assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-4 col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bi bi-graph-up-arrow bg-label-primary rounded p-sm-3 "></i>
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt4"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <!--i class="bx bx-dots-vertical-rounded"></i-->
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Total Sales</span>
                                <h3 class="card-title text-nowrap mb-2">RM {{ number_format($order->sum('cart_total') - $order->sum('voucher_total'), 2) }}
</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bi bi-receipt bg-label-success rounded p-sm-3"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button
                                            class="btn p-0"
                                            type="button"
                                            id="cardOpt1"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            <!--i class="bx bx-dots-vertical-rounded"></i-->
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Orders</span>
                                <h3 class="card-title mb-2">{{count($order)}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bi bi-box-seam bg-label-info rounded p-sm-3"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <!--i class="bx bx-dots-vertical-rounded"></i-->
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                            <a class="dropdown-item" href="v-myorders.html">View More</a>

                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Products Sold</span>
                                <h3 class="card-title mb-2">{{$order->sum('carts_sum_quantity')}}</h3>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bi bi-star bg-label-warning rounded p-sm-3"></i>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <!--i class="bx bx-dots-vertical-rounded"></i-->
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="myincome.html">View More</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Review</span>
                                <h3 class="card-title text-nowrap mb-1">{{$order->sum('ratings_count')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-6">
                <div class="card ">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-4">
                            <h5 class="m-0 me-2">Order Statistics test</h5>
                            <small class="text-muted">RM{{$order->sum('cart_total') - $order->sum('voucher_total') }} Total Sales</small>
                        </div>
                        <div class="dropdown">
                            <button
                                class="btn p-0"
                                type="button"
                                id="orderStatistics"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <!--i class="bx bx-dots-vertical-rounded"></i-->
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            @foreach($order->groupBy('product_id')->take(4) as $key => $orders)

                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        @if(isset($orders[0]) && $orders[0]->productImages()->first())
                                            <img
                                                src="{{asset('storage/'.$orders[0]->productImages()->first()->image)}}"
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
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">{{isset($orders[0]) && $orders[0]->products()->first() ? $orders[0]->products()->first()->name :''}}</h6>
                                        </div>
                                        <div class="user-progress">
                                            <small class="fw-semibold">{{$orders->sum('carts_sum_quantity')}}</small>
											<!--small class="fw-semibold">{{count($orders)}}</small-->
                                        </div>
                                    </div>
                                </li>
                            @endforeach             
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                            <div id="totalRevenueChart2" class="px-2"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <div class="text-center">
                                    <!--div class="dropdown">
                                        <button
                                            class="btn btn-sm btn-outline-primary dropdown-toggle"
                                            type="button"
                                            id="growthReportId"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            2022
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                            <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                        </div>
                                    </div-->
                                </div>
                            </div>
                            <div id="growthChartNew2"></div>
                            <div class="text-center fw-semibold pt-3 mb-2">{{$growthRate}}% Shop Growth</div>

                            <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                <div class="d-flex">
                                    <div class="me-2">
                                        <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                                    </div>
                                    <div class="d-flex flex-column">
                                            <small>Total Sales</small>
                                            <h6 class="mb-0">RM {{$currentYearSales}} </h6>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <small>Total Order</small>
                                            <h6 class="mb-0">{{isset($data2[0]) ? $data2[0]['totalOrder'] : ''}} </h6>
                                        </div>
									</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Transactions -->
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">To Do List</h5>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <i class="bi bi-bell bg-label-success rounded p-sm-3"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="d-flex align-self-center">
                                        <h6 class="mb-0">Incoming Order</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{$order->count()}}</h6>

                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <i class="bi bi-truck bg-label-primary rounded p-sm-3"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">

                                        <h6 class="mb-0">To Ship</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{$order->where('status','To Ship')->count()}}</h6>

                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <i class="bi bi-exclamation-square bg-label-info rounded p-sm-3"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">

                                        <h6 class="mb-0">To Receive</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{$order->where('status','To Receive')->count()}}</h6>

                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <i class="bi bi-cart-x bg-label-warning rounded p-sm-3"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">

                                        <h6 class="mb-0">Cancel</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">{{$order->where('status','Cancel')->count()}}</h6>

                                    </div>
                                </div>
                            </li>
                                                        <li class="d-flex">
                                                            <div class="avatar flex-shrink-0 me-3">
                                                                <i class="bi bi-repeat bg-label-danger rounded p-sm-3"></i>
                                                            </div>
                                                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                                <div class="me-2">

                                                                    <h6 class="mb-0">Completed</h6>
                                                                </div>
                                                                <div class="user-progress d-flex align-items-center gap-1">
                                                                    <h6 class="mb-0">{{$order->where('status','Completed')->count()}}</h6>

                                                                </div>
                                                            </div>
                                                        </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Transactions -->
        </div>
    </div>
    <!-- / Content -->
@endsection
@endif


@section('script')
    <!--div id="totalRevenueChart1"></div-->
    <script>
        var options = {
            chart: {
                type: 'bar',
                height: 300,
                stacked: true,
            },
            colors: ['#008FFB', '#FF4560'],
            series: [
                {
                    name: '<?php echo $currentYear; ?>',
						   <?php if (!empty($data1) && isset($data1[0])): ?>
                    data: [
						   <?php echo $data1[0]['totalPayment']; ?>,
						   <?php echo $data1[0]['totalOrder']; ?>
                    ],
                    <?php endif; ?>
                },
            ],
            xaxis: {
                categories: ['Total Sales', 'Total Orders'],
            },
            yaxis: {
                title: {
                    text: 'Amount',
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40,
                offsetY: -20,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    dataLabels: false,
                    columnWidth: '33%',
                    borderRadius: 12,
                    startingShape: 'rounded',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false,
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (val) {
                        return 'Total Sales: RM ' + val.toFixed(2);

                    },
                },
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0,
                    },
                },
            }],
        };

        var chart = new ApexCharts(document.querySelector("#totalRevenueChart1"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [<?php echo $growthRate; ?>],
            chart: {
                height: 240,
                type: 'radialBar',
                offsetY: -10
            },
            plotOptions: {
                radialBar: {
                    size: 150,
                    startAngle: -150,
                    endAngle: 150,
                    dataLabels: {
                        name: {
                            fontSize: '16px',
                            color: undefined,
                            fontWeight: '600',
                            offsetY: 10
                        },
                        value: {
                            offsetY: 15,
                            fontSize: '22px',
                            fontWeight: '500',
                            color: undefined,
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    }
                }
            },
            colors: [config.colors.primary],
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    shadeIntensity: 0.5,
                    gradientToColors: [config.colors.primary],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 0.6,
                    stops: [30, 70, 100]
                }
            },
            stroke: {
                dashArray: 5
            },
            grid: {
                padding: {
                    top: -35,
                    bottom: -10
                }
            },
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            },
            labels: ['Growth'],
        };

        var chart = new ApexCharts(document.querySelector("#growthChartNew"), options);
        chart.render();

    </script>

    <!--div id="totalRevenueChart2"></div-->
    <script>
        var options = {
            chart: {
                type: 'bar',
                height: 300,
                stacked: true,
            },
            colors: ['#008FFB', '#FF4560'],
            series: [
                {
                    name: '<?php echo $currentYear; ?>',
                    <?php if (!empty($data2) && isset($data2[0])): ?>
                    data: [
                            <?php echo $data2[0]['totalPayment']; ?>,
                            <?php echo $data2[0]['totalOrder']; ?>
                    ],
                    <?php endif; ?>
                },
            ],
            xaxis: {
                categories: ['Total Sales', 'Total Orders'],
            },
            yaxis: {
                title: {
                    text: 'Amount',
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40,
                offsetY: -20,
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    dataLabels: false,
                    columnWidth: '33%',
                    borderRadius: 12,
                    startingShape: 'rounded',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false,
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (val) {
                        return 'Total Sales: RM ' + val.toFixed(2);

                    },
                },
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0,
                    },
                },
            }],
        };

        var chart = new ApexCharts(document.querySelector("#totalRevenueChart2"), options);
        chart.render();
    </script>
    <script>
        var options = {
            series: [<?php echo $growthRate2; ?>],
            chart: {
                height: 240,
                type: 'radialBar',
                offsetY: -10
            },
            plotOptions: {
                radialBar: {
                    size: 150,
                    startAngle: -150,
                    endAngle: 150,
                    dataLabels: {
                        name: {
                            fontSize: '16px',
                            color: undefined,
                            fontWeight: '600',
                            offsetY: 10
                        },
                        value: {
                            offsetY: 15,
                            fontSize: '22px',
                            fontWeight: '500',
                            color: undefined,
                            formatter: function (val) {
                                return val + "%";
                            }
                        }
                    }
                }
            },
            colors: [config.colors.primary],
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    shadeIntensity: 0.5,
                    gradientToColors: [config.colors.primary],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 0.6,
                    stops: [30, 70, 100]
                }
            },
            stroke: {
                dashArray: 5
            },
            grid: {
                padding: {
                    top: -35,
                    bottom: -10
                }
            },
            states: {
                hover: {
                    filter: {
                        type: 'none'
                    }
                },
                active: {
                    filter: {
                        type: 'none'
                    }
                }
            },
            labels: ['Growth'],
        };

        var chart = new ApexCharts(document.querySelector("#growthChartNew2"), options);
        chart.render();

    </script>
@endsection
