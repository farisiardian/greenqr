@extends('layouts.admin')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!--          <h4 class="fw-bold py-3 mb-4">-->
            <!--            Sales-->
            <!--          </h4>-->

            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button type="button" class="btn btn-primary m-1">
                        <span class="tf-icons bx bx-download"></span> Export
                    </button>
                </div>
                <div class="col-lg-12 mb-4">
                    <div class="demo-inline-spacing mt-3">
                        <div class="card pb-3">
                            <h4 class="card-header">Sales</h4>
                            <hr class="my-0" />
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Date & Time</th>
                                            <th>Merchant Name</th>
                                            <th style="color:blue">User Name</th>
                                            <th style="color:blue">User Email</th>
                                            <th style="color:blue">User Phone</th>
                                            <th>Order ID</th>
                                            <th>Order Status</th>
                                            <th>Payment Type</th>
                                            <th>Product</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th>Shipping Fee</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($views as $view)
                                        <tr>
                                            <td>{{$view->updated_at}}</td>
                                            <td>{{$view->merchantName}}</td>
                                            <td>{{$view->userName}}</td>
                                            <td>{{$view->userEmail}}</td>
                                            <td>{{$view->userPhone}}</td>
                                            <td>#{{$view->orderID}}</td>
                                            <td><span class="badge bg-label-primary me-1">{{$view->status}}</span></td>
                                            <td>Online Banking</td>
                                            <td>{{$view->productName}}</td>
                                            <td>RM{{$view->unitPrice}}</td>
                                            <td>{{$view->quantity}}</td>
                                            <td>RM{{$view->unitPrice}}</td>
                                            <td>RM{{$view->feeShip}}</td>
                                            <td>RM{{$view->feeShip + $view->unitPrice}}</td>
                                        </tr>
                                        @endforeach
{{--                                        <tr>--}}
{{--                                            <td>13/12/2022 02:30PM</td>--}}
{{--                                            <td>Posture Align</td>--}}
{{--                                            <td>afiq12</td>--}}
{{--                                            <td>afiq12@gmail.com</td>--}}
{{--                                            <td>0102345678</td>--}}
{{--                                            <td>#BYDUE12</td>--}}
{{--                                            <td><span class="badge bg-label-primary me-1">Active</span></td>--}}
{{--                                            <td>Online Banking</td>--}}
{{--                                            <td>ICB Dual Density Orthotics</td>--}}
{{--                                            <td>RM400.00</td>--}}
{{--                                            <td>1</td>--}}
{{--                                            <td>RM400.00</td>--}}
{{--                                            <td>RM4.90</td>--}}
{{--                                            <td>RM404.90</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>13/12/2022 02:30PM</td>--}}
{{--                                            <td>Posture Align</td>--}}
{{--                                            <td>afiq12</td>--}}
{{--                                            <td>afiq12@gmail.com</td>--}}
{{--                                            <td>0102345678</td>--}}
{{--                                            <td>#BYDUE12</td>--}}
{{--                                            <td><span class="badge bg-label-primary me-1">Active</span></td>--}}
{{--                                            <td>Online Banking</td>--}}
{{--                                            <td>ICB Dual Density Orthotics</td>--}}
{{--                                            <td>RM400.00</td>--}}
{{--                                            <td>1</td>--}}
{{--                                            <td>RM400.00</td>--}}
{{--                                            <td>RM4.90</td>--}}
{{--                                            <td>RM404.90</td>--}}
{{--                                        </tr>--}}
                                        </tbody>
                                    </table>
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
