@extends('layouts.admin')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Add Content Here -->
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Finance / </span> My Bank Account
            </h4>
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
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="row">
                        <div class="card">
                            <div class="col-sm-4">
                                <div class="card-body">
                                    <button id="addBankCard" class="btn btn-primary d-flex align-items-center" type="button" data-bs-toggle="modal" data-bs-target="#addBank"><i class="bx bx-plus me-1"></i>Add Bank Card</button>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <div class="card-body border border-primary rounded mb-3">
                                        <div class="col-sm-12 mb-3">
                                            <img
                                                src="../assets/img/products/Iberet-Folic-500.jpg"
                                                class="img-fluid border rounded" height="50" width="50"/>
                                            <span class="text-primary ms-2">{{isset($defaultbankInformation) ? $defaultbankInformation->holder : ''}}</span>
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-sm-12">
                                                <span>{{isset($defaultbankInformation) ? $defaultbankInformation->acc_num : ''}}</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <span>{{isset($defaultbankInformation) ? $defaultbankInformation->name : ''}}</span>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <span class="badge bg-label-success me-1">DEFAULT</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card-body border border-primary rounded mb-3">
                                        <div class="col-sm-12 mb-3">
                                            <img
                                                src="../assets/img/products/Iberet-Folic-500.jpg"
                                                class="img-fluid border rounded" height="50" width="50"/>
                                            <span class="text-primary ms-2">{{isset($secondarybankInformation)  ? $secondarybankInformation->holder : ''}}</span>
                                        </div>
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-sm-12">
                                                <span>{{isset($secondarybankInformation) ? $secondarybankInformation->acc_num : ''}}</span>
                                            </div>
                                            <div class="col-sm-6">
                                                <span>{{isset($secondarybankInformation) ?  $secondarybankInformation->name : ''}}</span>
                                            </div>
                                            <div class="col-sm-6 text-end">
                                                <span class="badge bg-label-success me-1">SECONDARY</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
