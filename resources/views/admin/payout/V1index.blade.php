@extends('layouts.admin')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!--              <h4 class="fw-bold py-3 mb-4">-->
            <!--                <span class="text-muted fw-light">Finance / </span> My Income-->
            <!--              </h4>-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="demo-inline-spacing mt-3">
                        <div class="card pb-3">
                            <h4 class="card-header">Payout</h4>
                            <hr class="my-0" />
                            <div class="card-body ">
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
                                            <th>Date</th>
                                            <th>Order ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($views as $view)
                                        <tr>
{{--                                            {{\Carbon\Carbon::parse($orders[0]->updated_at)->isoFormat('DD-MM-YYYY')}}--}}
                                            <td>{{\Carbon\Carbon::parse($view->created_at)->isoFormat('DD-MM-YYYY')}}</td>
                                            <td>{{$view->transaction_id}}</td>
                                            <td>{{$view->vendors()->first() ? $view->vendors()->first()->name : ''}}</td>
                                            <td>{{$view->vendors()->first() ? $view->vendors()->first()->email : ''}}</td>
                                            <td>{{$view->products()->first() ? $view->products()->first()->name : ''}}</td>
                                            <td>{{$view->carts()->first() ? $view->carts()->first()->quantity : ''}}</td>
                                            <td>RM{{$view->totalCart}}</td>
                                            <td>
                                                <span class="badge bg-label-primary me-1">{{$view->payouts()->first() ? $view->payouts()->first()->status : ''}}</span>
                                            </td>
                                            <td>
                                                <div>
{{--                                                    <a href="{{"acceptPayout/".$view->transaction_id}}" class="btn btn-outline-success mb-2">Accept</a>--}}
                                                    <form action="{{route('acceptPayout',['id'=>$view->transaction_id])}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to Accept?')">
                                                        @csrf
                                                        @if($view->payouts()->first() ? $view->payouts()->first()->status : '' == 'Accept')
                                                            <button disabled class="btn btn-outline-success mb-2" ><i class="bx bx-approved"></i>Accept</button>
                                                        @else
                                                            <button class="btn btn-outline-success mb-2" ><i class="bx bx-approved"></i>Accept</button>
                                                        @endif
                                                    </form>
                                                    <form action="{{route('rejectPayout',['id'=>$view->transaction_id])}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to Reject?')">
                                                        @csrf
                                                        @if($view->payouts()->first() ? $view->payouts()->first()->status : '' == 'Reject')
                                                            <button disabled class="btn btn-outline-danger mb-2" ><i class="bx bx-ban"></i>Reject</button>
                                                        @else
                                                            <button class="btn btn-outline-danger mb-2" ><i class="bx bx-ban"></i>Reject</button>
                                                        @endif
                                                    </form>
{{--                                                    <a href="javascript:void(0);" class="btn btn-outline-danger">Reject</a>--}}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
{{--                                        <tr>--}}
{{--                                            <td>13/12/2022</td>--}}
{{--                                            <td>NJOWO190</td>--}}
{{--                                            <td>aliamaisara</td>--}}
{{--                                            <td>alia@gmail.com</td>--}}
{{--                                            <td></td>--}}
{{--                                            <td>1</td>--}}
{{--                                            <td>RM30.00</td>--}}
{{--                                            <td><span class="badge bg-label-primary me-1">Active</span></td>--}}
{{--                                            <td>--}}
{{--                                                <div>--}}
{{--                                                    <a href="javascript:void(0);" class="btn btn-outline-success mb-2">Accept</a>--}}
{{--                                                    <a href="javascript:void(0);" class="btn btn-outline-danger">Reject</a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td>13/12/2022</td>--}}
{{--                                            <td>NJIDOO129</td>--}}
{{--                                            <td>fiqa12</td>--}}
{{--                                            <td>fiqa12@gmail.com</td>--}}
{{--                                            <td></td>--}}
{{--                                            <td>1</td>--}}
{{--                                            <td>RM30.00</td>--}}
{{--                                            <td><span class="badge bg-label-primary me-1">Active</span></td>--}}
{{--                                            <td>--}}
{{--                                                <div>--}}
{{--                                                    <a href="javascript:void(0);" class="btn btn-outline-success mb-2">Accept</a>--}}
{{--                                                    <a href="javascript:void(0);" class="btn btn-outline-danger">Reject</a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
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
