@extends('layouts.admin')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Account Settings /</span> Change Password
        </h4>
        <div class="row">
            <div class="col-md-12">
                @include('vendor.profile.tabbar')
                <p>@include('error')</p>
                <div class="row">
                    <div class="col-md-6 col-12 mb-md-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Change Password</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('changepw')}}">
                                    @csrf
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Current Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="c_password" class="form-control" name="oldpw" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer">
                              <i class="bx bx-hide"></i>
                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">New Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="n_password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer">
                              <i class="bx bx-hide"></i>
                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Confirm  Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="con_password" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                            <span class="input-group-text cursor-pointer">
                              <i class="bx bx-hide"></i>
                            </span>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
