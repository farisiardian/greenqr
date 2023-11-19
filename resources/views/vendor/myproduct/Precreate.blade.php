@extends('layouts.admin')
{{--    dependent dropdown--}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">My Products / </span> Add New Products
        </h4>
        <!-- Add Content Here -->
        <div class="card mb-4">
            <h5 class="card-header">Product Info</h5>
            <!-- Account -->
            <hr class="my-0" />
            <div class="card-body">
                <form action="{{route('add_product')}}" id="formAccountSettings" enctype="multipart/form-data" method="POST" onsubmit="return true">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="image" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-12 col-md-12">
                            <label for="prodName" class="form-label">Product Name</label>
                            <input class="form-control" type="text" id="prodName" name="prodName"   autofocus />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prodDescr" class="form-label">Product Description</label>
                            <textarea class="form-control" rows="3" type="text" name="prodDescr" id="prodDescr" ></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="recommend" class="form-label">Recommendation</label>
                            <textarea class="form-control" rows="3" type="text" name="recommend" id="recommend" ></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="sku" class="form-label">SKU Code</label>
                            <input class="form-control" type="text" name="sku" id="sku" ></input>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prodCode" class="form-label">Product Code</label>
                            <input class="form-control" type="text" name="prodCode" id="prodCode" ></input>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="category" class="form-label">Main Category</label>
                            <select name="category" id="category" class="select2 form-select">
                                <option selected disabled>Select Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->sort_id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="subcategories" class="form-label">Main Sub Category</label>
                            <select class="form-select form-select" name="subcategories" id="subcategories"></select>
                        </div>

                        <hr class="my-4" />


                        <div class=" my-3">
                            <h5 class="mb-0">Product Price</h5>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="supplier" class="form-label">Supplier Cost Price (RM)</label>
                            <input class="form-control" type="number" id="supplier" name="price" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="supermarket" class="form-label">Supermarket Selling Price (RM)</label>
                            <input class="form-control" type="number" id="supermarket" name="supermarketPrice" />
                        </div>
                        <div class="mb-12 col-md-6">
                            <label for="listPrice" class="form-label">List Price on Store (RM)</label>
                            <input class="form-control" type="number" id="listPrice" name="listPrice" />
                        </div>

                        <hr class="my-4" />

                        <div class=" my-3">
                            <h5 class="mb-0 ">Product Details</h5>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="brand" class="form-label">Brand</label>
                            <select name="brand" id="brand" class="select2 form-select">
                                <option selected disabled>Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="minOrder" class="form-label">Minimum Order Quantity</label>
                            <input class="form-control" type="number" name="minOrder" id="minOrder" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="weight" class="form-label">Weight (kg)</label>
                            <input class="form-control" type="number" name="weight" id="weight" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="pickup" class="form-label">Allow Pickup</label>
                            <select name="pickup" id="pickup" class="select2 form-select">
                                <option value="">Select</option>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="volumetric" class="form-label">Volumetric</label>
                            <select name="volumetric" id="volumetric" class="select2 form-select">
                                <option value="">Select</option>
                                @foreach($volumes as $volume)
                                    <option value="{{$volume->id}}">{{$volume->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <hr class="my-4" />

{{--                        <div class=" my-3">--}}
{{--                            <h5 class="mb-0">Product Categories</h5>--}}
{{--                        </div>--}}

{{--                        <div class="mb-3 col-md-6">--}}
{{--                            <label for="cat-1" class="form-label">Category Level 1</label>--}}
{{--                            <select name="cat-1" id="cat-1" class="select2 form-select">--}}
{{--                                <option value="">Select</option>--}}
{{--                                <option value="Posture Care">Posture Care</option>--}}
{{--                                <option value="Orthopedic Support">Orthopedic Support</option>--}}
{{--                                <option value="Personal Protective Equipment">Personal Protective Equipment</option>--}}
{{--                                <option value="Personal Healthcare">Personal Healthcare</option>--}}
{{--                                <option value="Bathroom Aids">Bathroom Aids</option>--}}
{{--                                <option value="Beauty Care">Beauty Care</option>--}}
{{--                                <option value="Medical Disposable">Medical Disposable</option>--}}
{{--                                <option value="Mobility">Mobility</option>--}}
{{--                                <option value="Mobility Aids">Mobility Aids</option>--}}
{{--                                <option value="Pain Management">Pain Management</option>--}}
{{--                                <option value="Wheelchair">Wheelchair</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3 col-md-6">--}}
{{--                            <label for="cat-2" class="form-label">Category Level 2</label>--}}
{{--                            <select name="cat-2" id="cat-2" class="select2 form-select">--}}
{{--                                <option value="">Select</option>--}}
{{--                                <option value="Home & Nursing Care">Home & Nursing Care</option>--}}
{{--                                <option value="Pain Management">Pain Management</option>--}}
{{--                                <option value="Sport & Injuries">Sport & Injuries</option>--}}
{{--                                <option value="Personal Healthcare">Personal Healthcare</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3 col-md-6">--}}
{{--                            <label for="cat-3" class="form-label">Category Level 3</label>--}}
{{--                            <select name="cat-3" id="cat-3" class="select2 form-select">--}}
{{--                                <option value="">Select</option>--}}
{{--                                <option value="Home & Nursing Care">Home & Nursing Care</option>--}}
{{--                                <option value="Pain Management">Pain Management</option>--}}
{{--                                <option value="Sport & Injuries">Sport & Injuries</option>--}}
{{--                                <option value="Personal Healthcare">Personal Healthcare</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3 col-md-6">--}}
{{--                            <label for="cat-4" class="form-label">Category Level 4</label>--}}
{{--                            <select name="cat-4" id="cat-4" class="select2 form-select">--}}
{{--                                <option value="">Select</option>--}}
{{--                                <option value="Home & Nursing Care">Home & Nursing Care</option>--}}
{{--                                <option value="Pain Management">Pain Management</option>--}}
{{--                                <option value="Sport & Injuries">Sport & Injuries</option>--}}
{{--                                <option value="Personal Healthcare">Personal Healthcare</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
<script type="text/javascript">
    $(document).ready(function () {
        $('#category').on('change', function () {
            var subCategoryId = this.value;
            $('#subcategories').html('');
            $.ajax({
                url: '{{ route('add_product') }}?main_category_id='+subCategoryId,
                type: 'get',
                success: function (res) {
                    $('#state').html('<option value="">Select Sub Categories</option>');
                    $.each(res, function (key, value) {
                        $('#subcategories').append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>

