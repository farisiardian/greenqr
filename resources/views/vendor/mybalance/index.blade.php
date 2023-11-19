@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add Content Here -->
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Finance / </span> My Balance
            </h4>
            <!---------Modal----------->
            <div class="modal fade" id="addBank" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">Add Bank Account</h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>

                        <div class="modal-body">
                            <form action="{{route('storeBankAccount')}}" id="formAddBank" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-12 col-md-12">
                                        <label for="fullName" class="form-label">Full Name in the Bank Account</label>
                                        <input class="form-control" type="text" id="fullName" name="fullName"   autofocus />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="bankName" class="form-label">Bank Name</label>
                                        <select name="bankName" id="bankName" class="select2 form-select">
                                            <option value="">Select</option>
                                            <option value="Maybank">Maybank</option>
                                            <option value="CIMB Berhad">CIMB Berhad</option>
                                            <option value="Bank Islam">Bank Islam</option>
                                            <option value="BSN">Bank Simpanan Nasional</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="accountNo" class="form-label">Account No.</label>
                                        <input class="form-control" rows="3" type="number" onKeyPress="if(this.value.length==14) return false;" name="accountNo" id="accountNo" />
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="row">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary">Seller Balance</h5>
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
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <h2 class="text-primary">RM {{$currentBalances->sum('total_payment')}}</h2>
                                            </div>
                                            <div class="col-md-8">
                                                <!--a href="{{route('withdrawMoney')}}" class="btn btn-primary"><i class="bx bx-plus"></i>Withdraw</a-->
												<form action="{{route('withdrawMoney')}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to Withdraw ?')">
													@csrf
													<button class="btn btn btn-primary" ><i class="bx bx-plus"></i>Withdraw</button>
												</form>
{{--                                                <button hidden type="button" class="btn btn-primary">Withdraw</button>--}}
{{--                                                <button id="addBankCard" class="btn btn-primary d-flex align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#addBank"><i class="bx bx-plus me-1"></i>Withdraw</button>--}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card-body ">
                                        <h5 class="card-title text-primary">Bank Account</h5>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img
                                                    src="../assets/img/products/Iberet-Folic-500.jpg"
                                                    class="img-fluid border rounded" height="90" width="90"/>
                                            </div>
                                            <div class="col-sm-6 ">
                                                <span class="text-primary">{{isset($defaultbankInformation) ? $defaultbankInformation->holder : ''}}</span>
                                                <p>{{isset($defaultbankInformation) ? $defaultbankInformation->name : ''}} <span> {{isset($defaultbankInformation) ? $defaultbankInformation->acc_num : ''}}</span></p>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="badge bg-label-success me-1">DEFAULT</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="card h-100">
                            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                <div class="card-title mb-0">
                                    <h5 class="m-0 me-2">Income Details</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="demo-inline-spacing mt-3">
                                        <div class="list-group list-group-horizontal-md text-md-center">
                                            <a
                                                class="list-group-item list-group-item-action active"
                                                id="withdrawal-list-item"
                                                data-bs-toggle="list"
                                                href="#horizontal-withdrawal"
                                            >Withdrawal</a>
                                            <a
                                                class="list-group-item list-group-item-action"
                                                id="transaction-list-item"
                                                data-bs-toggle="list"
                                                href="#horizontal-transaction"
                                            >Transaction</a>
                                        </div>
                                        <div class="tab-content px-0 mt-0">
                                            <div class="tab-pane fade show active" id="horizontal-withdrawal">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($withdrawalTabs as $withdrawal)
                                                        <tr>
                                                            <td>{{\Carbon\Carbon::parse($withdrawal->withdraw_date)->isoFormat('DD-MM-YYYY')}}</td>
                                                            <td>RM{{$withdrawal->totalPayment}}</td>
                                                            @if($withdrawal->status == 'Pending')
                                                                <td><span class="badge bg-label-primary me-1">Ongoing</span></td>
                                                            @elseif($withdrawal->status == 'Paid')
                                                                <td><span class="badge bg-label-success me-1">Completed</span></td>

                                                            @endif
                                                        </tr>
{{--                                                        <tr>--}}
{{--                                                            <td>16-08-202 </td>--}}
{{--                                                            <td>RM200.00</td>--}}
{{--                                                            <td><span class="badge bg-label-success me-1">Completed</span></td>--}}
{{--                                                        </tr>--}}
{{--                                                        <tr>--}}
{{--                                                            <td>16-08-202 </td>--}}
{{--                                                            <td>RM21.00</td>--}}
{{--                                                            <td><span class="badge bg-label-success me-1">Completed</span></td>--}}
{{--                                                        </tr>--}}
{{--                                                        <tr>--}}
{{--                                                            <td>16-08-202 </td>--}}
{{--                                                            <td>RM100.00</td>--}}
{{--                                                            <td><span class="badge bg-label-secondary me-1">Unsuccessful</span></td>--}}
{{--                                                        </tr>--}}
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="horizontal-transaction">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Payee</th>
                                                            <th>Amount</th>
                                                            <th>Description</th>
                                                            <th>Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>12.09.2022</td>
                                                            <td>Shopee</td>
                                                            <td>RM20.00</td>
                                                            <td>Refund From Order</td>
                                                            <td><span class="badge bg-label-info me-1">Processing</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12.09.2022</td>
                                                            <td>Shopee</td>
                                                            <td>RM20.00</td>
                                                            <td>Refund From Order</td>
                                                            <td><span class="badge bg-label-success me-1">Successful</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12.09.2022</td>
                                                            <td>Shopee</td>
                                                            <td>RM20.00</td>
                                                            <td>Refund From Order</td>
                                                            <td><span class="badge bg-label-success me-1">Successful</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12.09.2022</td>
                                                            <td>Shopee</td>
                                                            <td>RM20.00</td>
                                                            <td>Refund From Order</td>
                                                            <td><span class="badge bg-label-success me-1">Successful</span></td>
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
                    </div>
                </div>
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
@endsection
