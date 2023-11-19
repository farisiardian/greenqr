<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Income </title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon/Icon.png')}}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}" />
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{asset('admin/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('admin/assets/js/config.js')}}"></script>
</head>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="demo-inline-spacing mt-3">
                    <div class="card pb-3">
                        <h5 class="card-title ms-2 text-primary">Income Statement of {{$vendor->name}} At {{$selected_month->format('F')}} {{$selected_month->year}} </h5>
                        <hr class="my-0" />
                        <div class="card-body">
                            {{--main category loop--}}
                            @php $total = 0; @endphp
                            @foreach($orders as $category => $product)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                            <a>Category : {{$category}}</a>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Product Name</th>
                                                <th>Product Id</th>
                                                <th>Sold Quantity</th>
                                                <th>Stock Price</th>
                                                <th>Sold Price</th>
                                                <th>Total Sold Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        {{-- product list start here--}}
                                            @foreach($product as $key => $view)
                                                <tr>
                                                    <th>{{$key+1}}</th>
                                                    <td>{{$view->name}}</td>
                                                    <td>{{$view->id}}</td>
                                                    <td>{{$view->total_quantity}}</td>
                                                    <td>RM {{$view->supplier_cost_price}}</td>
                                                    <td>RM {{$view->list_price_on_store}}</td>
    {{--                                                //nanti tukar kpd minus--}}
                                                    @php $totalSold = ($view->list_price_on_store - $view->supplier_cost_price)*$view->total_quantity; @endphp
                                                    <td>RM {{$totalSold}}</td>
                                                    @php $total += $totalSold @endphp
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                            <a> Total Gross Profit RM {{$total}}</a>
{{--                            backup foreach without category-}}
                            {{--<div class="table-responsive" style="padding-bottom:100px">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product Name</th>
                                        <th>Product Id</th>
                                        <th>Sold Quantity</th>
                                        <th>Stock Price</th>
                                        <th>Sold Price</th>
                                        <th>Total Sold Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
--}}{{--                                    nanti add product value here--}}{{--
                                        @php $total = 0; @endphp
                                        @foreach($orders as $key => $view)

                                            <tr>
                                                <th>{{$key+1}}</th>
                                                <td>{{$view->name}}</td>
                                                <td>{{$view->id}}</td>
                                                <td>{{$view->total_quantity}}</td>
                                                <td>{{$view->supplier_cost_price}}</td>
                                                <td>{{$view->list_price_on_store}}</td>
--}}{{--                                                check make sure minus --}}{{--
                                                <td>{{$totalSold = ($view->list_price_on_store + $view->supplier_cost_price)*$view->total_quantity}}</td>
                                                @php $total += $totalSold @endphp

                                            </tr>
                                        @endforeach
                                                <tr>
                                                    <th>Total Gross Profit</th>
                                                    <td>{{$total}}</td>
                                                    <td>Category {{$view->category_name}}</td>
                                                </tr>
                                    </tbody>
                                </table>
                            </div>--}}
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

