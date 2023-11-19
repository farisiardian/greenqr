@extends('layouts.admin')
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!--          <h4 class="fw-bold py-3 mb-4">-->
        <!--            <span class="text-muted fw-light"></span> All Staffs-->
        <!--          </h4>-->
        <div class="row">
            <div class="demo-inline-spacing mt-3">
                <div class="card">
                    <div class="card-body">
                        <form id="formSearch" method="POST" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="searchName" class="form-label">Staff Name</label>
                                    <input class="form-control" type="text" id="searchName" name="userName"   autofocus />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="searchEmail" class="form-label">Email Address</label>
                                    <input class="form-control" type="email" id="searchEmail" name="userEmail" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="searchDepartment" class="form-label">Department</label>
                                    <input class="form-control" type="email" id="searchDepartment" name="userEmail" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="searchPosition" class="form-label">Position</label>
                                    <input class="form-control" type="email" id="searchPosition" name="userEmail" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select id="status" class="form-select">
                                        <option>All</option>
                                        <option value="1">Active</option>
                                        <option value="2">Suspended</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label">Registered Date</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" value="2021-06-18" id="startDate" />
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" value="2021-06-18" id="endDate" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Custom content with heading -->
            <!--            <div class="col d-flex justify-content-end">-->
            <!--              <button type="button" class="btn btn-primary m-1">-->
            <!--                <span class="tf-icons bx bx-download"></span> Export-->
            <!--              </button>-->
            <!--            </div>-->
            <div class="col-lg-12">
                <div class="demo-inline-spacing mt-3">
                    <div class="card pb-3">
                        <h4 class="card-header">All Staffs</h4>
                        <hr class="my-0" />
                        <div class="card-body ">

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Staff ReffNo</th>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Staff Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>62</td>
                                        <td>0001</td>
                                        <td>Ahmad</td>
                                        <td>HR</td>
                                        <td>Head of HR</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                        <td>
                                            <div>
                                                <a data-bs-toggle="modal" href="#editStaff"><i class="bx bx-edit me-1"></i></a>
                                                <a href="javascript:void(0);"><i class="bx bx-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>64</td>
                                        <td>0002</td>
                                        <td>Amira</td>
                                        <td>HR</td>
                                        <td>Assistant</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                        <td>
                                            <div>
                                                <a data-bs-toggle="modal" href="#editStaff"><i class="bx bx-edit me-1"></i></a>
                                                <a href="javascript:void(0);"><i class="bx bx-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--/ Custom content with heading -->
        </div>

        <!---------Modal----------->
        <div class="modal fade" id="editStaff" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Edit Staff</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mx-3">
                            <div class="mb-3 col-md-6">
                                <label for="staffName" class="form-label">Staff Name</label>
                                <input class="form-control" type="text" id="staffName" name="staffName" value="Ahmad"   autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="staffID" class="form-label">Staff ID</label>
                                <input class="form-control" type="text" id="staffID" name="staffID" value="0001" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="department" class="form-label">Department</label>
                                <input class="form-control" type="text" name="department" id="department" value="HR" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="position" class="form-label">Position</label>
                                <input class="form-control" type="text" name="position" id="position" value="Head of HR" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input class="form-control" type="number" name="phone" id="phone"  value="0101234567"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input class="form-control" type="text" name="email" id="email" value="ahmad@gmail.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" id="password" value="ce212mkd1" />
                                <a id="generate" class="btn btn-sm btn-outline-primary mt-2 text-primary">Generate</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Add Content Here -->
</div>
<!-- / Content -->
@endsection
