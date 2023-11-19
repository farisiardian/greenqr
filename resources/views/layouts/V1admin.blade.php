<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard | Life Care </title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon/Icon.png')}}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{asset('admin/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('admin/assets/js/config.js')}}"></script>
</head>
<body>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{route('/')}}" class="app-brand-link">


                    <img src="{{asset('admin/assets/img/favicon/Logo1.png')}}" alt class="w-px-150 h-auto " />

                </a>
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>
            <div class="menu-inner-shadow"></div>
            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item active">
                    <a href="{{route('/')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>
                <!-- Account Setting -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-dock-top"></i>
                        <div>Account Settings</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{route('profile.index')}}" class="menu-link">
                                <div >My Profile</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('profile.create')}}" class="menu-link">
                                <div >Change Password</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('vendor.address')}}" class="menu-link">
                                <div >My Address</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('vendor.shop')}}" class="menu-link">
                                <div >Shop Details</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Order -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Order</span>
                </li>
                <!-- Cards -->
                <li class="menu-item">
                    <a href="{{route('my_order')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-receipt"></i>
                        <div>My Orders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('ship_order')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-package"></i>
                        <div>Ship Orders</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('return')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-receipt"></i>
                        <div>Return / Refund</div>
                    </a>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Product</span>
                </li>
                <!-- Product -->
                <li class="menu-item">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
                        <div>My Products</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{route('my_product.index')}}" class="menu-link">
                                <div>All Products</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{route('my_product.create')}}" class="menu-link">
                                <div>Add New Products</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="{{route('banned_product')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
                        <div>Banned Product</div>
                    </a>
                </li>
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Marketing Centre</span>
                </li>
                <!-- Product -->
                <li class="menu-item">
                    <a href="{{route('marketing_center.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                        <div>Marketing Centre</div>
                    </a>
                </li>
                <!-- Forms & Tables -->
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Finance</span>
                </li>
                <li class="menu-item">
                    <a href="{{route('my_income')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-wallet"></i>
                        <div >My Income</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('settlement')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-wallet"></i>
                        <div>Settlement</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('my_balance')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-wallet"></i>
                        <div >My Balance</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('bank_account.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-wallet"></i>
                        <div>Bank Account</div>
                    </a>
                </li>

            </ul>
        </aside>
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>
                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    @if(Auth::user()->profile_image != null)
                                        <img src="{{asset('storage/'.Auth::user()->profile_image)}}" alt class="w-px-40 h-auto rounded-circle" />
                                    @else
                                        <img src="{{asset('admin/assets/img/avatars/3.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                    @endif
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{asset('admin/assets/img/avatars/3.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">John Doe</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{route('profile.index')}}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>
            <!-- / Navbar -->

            <main class="content-wrapper">

            @yield('content')

            <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0"> © <script>
                                document.write(new Date().getFullYear());
                            </script> LifeCare Diagnostic Medical Centre | All rights reserved </div>
                        <div>
                            <a href="" class="footer-link me-4" target="_blank">Terms & Condition</a>
                            <a href="" target="_blank" class="footer-link me-4">Privacy Policy</a>
                            <a href="" target="_blank" class="footer-link me-4">Contact Us</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </main>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('admin/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('admin/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('admin/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="{{asset('admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('admin/assets/js/main.js')}}"></script>
<!-- Page JS -->
<script src="{{asset('admin/assets/js/dashboards-analytics.js')}}"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
@yield('script')
</body>
</html>
