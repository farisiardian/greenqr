@extends('layouts.admin')
@section('content')
    <!-- Modal Edit Banner -->
    <div class="modal fade text-left" id="editBanner" tabindex="-1" role="dialog" aria-labelledby="editBanner" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div id="editBanners">
                    Edit User Display
                </div>
            </div>
        </div>
    </div>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!--          <h4 class="fw-bold py-3 mb-4">-->
            <!--            <span class="text-muted fw-light">My Products / </span> Add New Products-->
            <!--          </h4>-->
            <!-- Add Content Here -->
            <div class="row">
                <!-- Custom content with heading -->
                <div class="col d-flex justify-content-end">

                </div>
                <div class="col-lg-12">
                    <div class="demo-inline-spacing mt-3">
                        <div class="card">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-header">Banner</h4>
                                <div class="me-3">
                                    <a data-bs-toggle="modal" href="#addBanner" type="button" class="btn btn-primary m-1">
                                        <span class="tf-icons bx bx-plus"></span> Add New Banner
                                    </a>
                                </div>

                            </div>

                            <hr class="my-0" />
                            <div class="card-body">
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
                                            <th>Banner Image</th>
                                            <th>Banner Name</th>
                                            <th>Uploaded Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($banner as $banners)
                                        <tr>
                                            <td>
                                                <img src="{{asset('storage/'.$banners->image)}}" height="100"/>
                                            </td>
                                            <td>{{$banners->name}}</td>
                                            <td>{{$banners->created_at}}</td>
                                            <td>
                                                @if($banners->status == 1)
                                                    <span class="badge bg-label-primary me-1">Active</span>
                                                @else
                                                    <span class="badge bg-label-danger me-1">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div>
                                                    <a data-toggle="modal" href="#" data-target="#editBanner" data-id="{{$banners->id}}" class="editBanner-modals"><i class="bx bx-edit me-1"></i></a>
{{--                                                    <a href="javascript:void(0);"><i class="bx bx-trash"></i></a>--}}
                                                    <form action="{{route('deleteBanner',['id'=>$banners->id])}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure want to Delete?')">
                                                        @csrf
                                                        <button class="btn btn-sm" ><i class="bx bx-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--/ Custom content with heading -->
            </div>
            <!---------Modal add----------->
            <div class="modal fade" id="addBanner" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <form action="{{route('addBanners')}}" enctype="multipart/form-data" method="POST" onsubmit="return true">
                            @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitles">Add Banner</h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mx-3">

                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="../assets/img/avatars/default_product.png" alt="user-avatar" class="d-block rounded border" height="100"  id="uploadedAvatar" />
                                    <div class="button-wrapper">
										<span class="d-none d-sm-block">Upload Banner</span>
                                        <label for="upload" class="btn btn-primary me-2 my-2" tabindex="0">
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" name="image" id="image" class="account-file-input" accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                    </div>
                                </div>

                                <div class="my-3 col-md-12">
                                    <label for="cateName" class="form-label">Banner Name</label>
                                    <input class="form-control" type="text" id="bannerName" name="bannerName" />
{{--                                        <select class="form-select" name="cateName" id="cateName" aria-label="Category Name">--}}
{{--                                            <option selected>Select Category</option>--}}
{{--                                            @foreach($category as $categories)--}}
{{--                                                <option value="{{$categories->sort_id}}">{{$categories->sort_id}}-{{$categories->name}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    <select name="category" id="category" class="select2 form-select">--}}
{{--                                        <option selected disabled>Select Categories</option>--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option value="{{$category->sort_id}}">{{$category->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}

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

@section('script')
    <script>
        $(document).on("click",".editBanner-modals", function(e){
            // alert('ok');
            var eventId = $(this).data('id');
            var url = '{{route('/')}}' + '/viewBanner/' + eventId;
            alert(eventId);

            $.ajax({
                type:'GET',
                url:url ,
                data: {
                    '_token' : '<?php echo csrf_token() ?>',
                },
                success:function(data){
                    $('#editBanner').modal('show');
                    $("#editBanners").html(data);
                },
                error:function(data){
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
        });


    </script>
@endsection
