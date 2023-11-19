@extends('layouts.admin')
{{--    dependent dropdown--}}
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>-->
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">My Products / </span> Add New Products
        </h4>
        <!---------Modal----------->
        <div class="modal fade" id="addSubCategories" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Add Sub Category</h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>

                    <div class="modal-body">
                        <form action="{{route('storeSubCategory')}}" id="formAddBank" method="POST">
                            @csrf
                            <div class="row">
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
                                <div class="mb-12 col-md-12">
                                    <label for="category" class="form-label">Main Category
                                    </label>
{{--                                    <select name="mainCategory" id="mainCategory" class="select2 form-select">--}}
{{--                                        <option value="" required selected disabled>Select Categories</option>--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <option required value="{{$category->sort_id}}">{{$category->name}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
                                    <select name="mainCategory" id="mainCategory" class="form-select" required aria-label="select example">
                                        <option value="">Open this select menu</option>
                                        @foreach($categories as $category)
                                            <option required value="{{$category->sort_id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-12 col-md-12">
                                    <label for="bankName" class="form-label">Sub Category</label>
                                    <input class="form-control" type="text" name="subCategory" id="subCategory" />
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
        <!-- Add Content Here -->
        <div class="card mb-4">
            <h5 class="card-header">Product Info</h5>
            <!-- Account -->
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
                <form action="{{route('add_product')}}" id="formAccountSettings" enctype="multipart/form-data" method="POST" onsubmit="return true">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{asset('admin/assets/img/avatars/default_product.png')}}" alt="user-avatar" class="d-block rounded"
                                 style="height: 252px; width: 252px; object-fit: cover" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="image" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" onchange="previewImage(event)" />
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
                        <div class="mb-12 col-md-6">
                            <label for="prodName" class="form-label">Product Name</label>
                            <input class="form-control" type="text" id="prodName" name="prodName" required value="" />
                        </div>
						<div class="mb-12 col-md-6">
							<label for="tagging" class="form-label">Tagging</label>
							<input class="form-control" type="text" id="tagging" name="tagging" required value=""/>
						</div>
                        <div class="mb-3 col-md-6">
                            <label for="prodDescr" class="form-label">Product Description</label>
                            <textarea class="form-control" rows="3" type="text" name="prodDescr" id="prodDescr" required></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="recommend" class="form-label">Recommendation</label>
                            <textarea class="form-control" rows="3" type="text" name="recommend" id="recommend" ></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="sku" class="form-label">SKU Code</label>
                            <input class="form-control" type="text" name="sku" id="sku" required/>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prodCode" class="form-label">Product Code</label>
                            <input class="form-control" type="text" name="prodCode" id="prodCode" ></input>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="category" class="form-label">Main Category
                            </label>
                            <select name="category" id="category" class="select2 form-select">
                                <option selected disabled>Select Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->sort_id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="subcategories" class="form-label">Main Sub Category
							@if(Auth::user()->role == 'admin')
                            <span>
                                <a type="button" data-bs-toggle="modal" data-bs-target="#addSubCategories" href="" class=""><i class="bx bx-plus-circle"></i></a>
                             </span>
							@endif
                            @if(Auth::user()->role == 'vendor')
{{--                                <span>--}}
{{--                                    <a type="button" href="#" data-bs-toggle="modal" data-bs-target="#addSubCategories" class="badge bg-primary text-white"><i class="bx bx-plus-circle"></i></a>--}}
{{--                                 </span>--}}
							@endif
                            </label>

                            <select class="form-select form-select" name="subcategories" id="subcategories"></select>
                        </div>

                        <hr class="my-4" />


                        <div class=" my-3">
                            <h5 class="mb-0">Product Price</h5>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="supplier" class="form-label">Supplier Cost Price (RM)</label>
                            <input class="form-control" type="text" id="supplier" name="price" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="supermarket" class="form-label">Supermarket Selling Price (RM)</label>
                            <input class="form-control" type="text" id="supermarket" name="supermarketPrice" />
                        </div>
                        <div class="mb-12 col-md-6">
                            <label for="listPrice" class="form-label">List Price on Store (RM)</label>
                            <input class="form-control" type="text" id="listPrice" name="listPrice" />
                        </div>

                        <hr class="my-4" />

                        <div class=" my-3">
                            <h5 class="mb-0 ">Product Details</h5>
                        </div>
						<div class="mb-3 col-md-6">
                            <label for="stock" class="form-label">Warehouse</label>
                            <select class="form-control select2" name="warehouse_id" id="warehouse_id" data-placeholder="Select Warehouse">
                                <option value="{{null}}">-- Select Warehouse --</option>
                                @foreach($warehouse as $listings)
                                    <option value="{{$listings->id}}">
                                        {{$listings->warehouse_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="brand" class="form-label">Brand</label>
							<!--input type="text" class="form-control" id="brand" name="brand" -->
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
                            <input class="form-control" type="text" name="weight" required id="weight" />
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
                        <div class=" my-3">
                            <h5 class="mb-0 ">Product Variations</h5>
                        </div>
							
						<table id="productTable" class="table">
						  <thead>
							<tr>
							  <th>Name</th>
							  <th>Color</th>
							  <th>Image</th>
							  <th>Size</th>
							  <th>Action</th>
							</tr>
						  </thead>
						 <tbody>
						  <tr>
							<td><input type="text" class="form-control" name="inputs[0][name]" placeholder="T-Shirt" ></td>
							<td>
							  <div style="display: flex;">
								<input type="text" class="form-control" name="inputs[0][colors]" placeholder="eg:RED/BLUE" size="20">
							  </div>
							</td>
							<td><input type="file" class="form-control" name="inputs[0][variationimage]">
								<img class="img-preview" src="#" alt="Image Preview" style="display: none; max-width: 100px;"></td>
							<td>
							  <input type="text" class="form-control" name="inputs[0][sizes]" placeholder="S/M" size="20">
							  <!--a href="#" id="add_more_options"><i class="bx bx-plus-circle"> </i> Add Option </a-->
							</td>
							<td colspan="5"><button type="button" class="btn btn-success btn-sm addRow" id="addProductBtn"><i class="fa fa-plus"></i> Add </button></td>
						  </tr>
						</tbody>
						</table>
						<!--table id="productTable" class="table">
						  <thead>
							<tr>
							  <th>Variation</th>
							  <th>Option</th>
							  <th>Action</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
							<tr>
							  <td><input type="text" class="form-control" name="variation[]" required></td>
							  <td>
								<input type="text" class="form-control" name="option[0][]" required>
							  </td>
							  <td> <button type="button" class="btn btn-success btn-sm mt-1 addOptionBtn"><i class="fa fa-plus"></i> Add Option</button></td>
							  
							</tr>
						  </tbody>
						  <tfoot>
							<tr>
							  <td colspan="5"><button type="button" class="btn btn-success btn-sm addRow" id="addProductBtn"><i class="fa fa-plus"></i> Add Variation</button></td>
							</tr>
						  </tfoot>
						</table-->

						<!--table id="productTable2" class="table">
						  <thead>
							<tr>
							  <th>Color</th>
							  <th>Options</th>
							  <th>Price</th>
							  <th>Stock</th>
							  <th></th>
							</tr>
						  </thead>
						  <tbody>
							<tr>
							  <td><input type="text" class="form-control" name="color[]" required></td>
							  <td><input type="text" class="form-control" name="options[]" required></td>
							  <td><input type="number" class="form-control" name="price[]" required></td>
							  <td><input type="number" class="form-control" name="stock[]" required></td>
							  <td><button type="button" class="btn btn-danger btn-sm removeRow"><i class="fa fa-times"></i></button></td>
							</tr>
						  </tbody>
						  <tfoot>
							<tr>
							  <td colspan="5"><button type="button" class="btn btn-success btn-sm addRow" id="addProductBtn2"><i class="fa fa-plus"></i> Add Variation</button></td>
							</tr>
						  </tfoot>
						</table-->
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
            //alert(subCategoryId);
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
<script>
    function previewImage(event) {
        var uploadedAvatar = document.getElementById('uploadedAvatar');
        uploadedAvatar.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

<script>
$(document).ready(function() {
    var bil = 0;

    // When the "Add another product" button is clicked
    $('#addProductBtn').click(function() {
        bil++;

        // Clone the last row in the table
        var lastProductRow = $('#productTable tbody tr').last().clone();

        // Find all the input fields within the cloned row
        var inputFields = lastProductRow.find('input');

        // Update the names of the input fields to ensure uniqueness
        inputFields.each(function() {
            var originalName = $(this).attr('name');
            var newName = originalName.replace(/\[(\d+)\]/, '[' + bil + ']');
            $(this).attr('name', newName);
            if ($(this).attr('type') === 'file') {
                $(this).val('');
                $(this).on('change', updateImagePreview);
            }
        });

        // Clear the values of the input fields in the cloned row
        inputFields.not('input[type=file]').val('');

        // Modify the "Add" button to a "Remove" button
        lastProductRow.find('button').removeClass('btn-success').addClass('btn-danger').html('<i class="fa fa-minus"></i> Remove');
		
        // Append the cloned row to the table
        $('#productTable tbody').append(lastProductRow);
    });
	lastProductRow.find('input[type=file]').on('change', updateImagePreview);

    // Update the image preview when a file is selected
    function updateImagePreview() {
        var preview = $(this).closest('td').find('.img-preview');
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.attr('src', e.target.result).show();
        };

        reader.readAsDataURL(file);
    }
});







function updateEventBindings(row,bil) {
	var i = 0;

  row.find('#add_more_options').click(function() {
	  ++i;
    var addOptionsCell = $(this).closest('td');
    var optionsTable = addOptionsCell.find('table');
    if (optionsTable.length == 0) {
      optionsTable = $('<table>').appendTo(addOptionsCell);
    }
    var optionsRow = $('<tr>').appendTo(optionsTable);

    var newOptionField = $('<input/>', {
      'type': 'text',
      'name': 'options[data'+bil+']['+i+']',
      'class': 'form-control add_options',
      'size': 20,
      'placeholder': 'eg:RED/BLUE,S/M,etc'
    });
    var optionCell = $('<td>').appendTo(optionsRow);
    optionCell.append(newOptionField);

    var newImageField = $('<input/>', {
      'type': 'file',
      'name': 'variationimage[data'+bil+']['+i+']',
      'class': 'form-control'
    });
    var imageCell = $('<td>').appendTo(optionsRow);
    imageCell.append(newImageField);

    var imgPreview = $('<img class="img-preview" src="#" alt="Image Preview" style="display: none; max-width: 100px;">');
    var previewCell = $('<td>').appendTo(optionsRow);
    previewCell.append(imgPreview);

    newImageField.on('change', function() {
      var input = $(this);
      var imgPreview = input.parent().siblings().find('img');
      if (input[0].files && input[0].files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          imgPreview.attr('src', e.target.result).show();
        };
        reader.readAsDataURL(input[0].files[0]);
      } else {
        imgPreview.hide();
      }
    });

    var removeOptionBtn = $('<a href="#" class="btn btn-danger btn-xs removeOption"><i class="bx bx-minus"></i> </a>');
    var removeCell = $('<td>').appendTo(optionsRow);
    removeCell.append(removeOptionBtn);

    removeOptionBtn.click(function() {
      optionsRow.remove();
    });
  });

  row.find('.removeVariation').click(function() {
    removeVariation(row);
  });
}




</script>











