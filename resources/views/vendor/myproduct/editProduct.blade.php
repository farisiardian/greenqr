
<div class="container-xxl flex-grow-1 container-p-y">

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

            <form action="{{route('my_product.update',$product->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        {{--Pending test in live server--}}
                        @if(isset($productImage->image) && $productImage->product_id == $product->id)
                            <img
                                src="{{asset('storage/'.$productImage->image)}}"
                                class="d-block rounded"
                                height="100"
                                width="100"/>
                        @else
                            <img src="{{asset('admin/assets/img/avatars/default_product.png')}}"
                                 alt="user-avatar"
                                 class="d-block rounded"
                                 style="height: 252px;
                                 width: 252px;
                                 object-fit: cover"
                                 id="uploadedAvatar" />
                        @endif
					<div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Change banner</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" name="image" id="image" class="account-file-input" accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                    </div>
				
                        <!--div class="button-wrapper">
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
                        </div-->
                    </div>
                </div>
                <div class="row">
                    <div class="mb-12 col-md-12">
                        <label for="prodName" class="form-label">Product Name</label>
                        <input class="form-control" type="text" id="prodName" name="prodName" required value="{{isset($product) ? $product->name : ''}}" />
                    </div>
					<div class="mb-12 col-md-12">
                        <label for="prodName" class="form-label">Tagging</label>
                        <input class="form-control" type="text" id="tagging" name="tagging" required value="{{isset($product) ? $product->tagging : ''}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="prodDescr" class="form-label">Product Description</label>
                        <textarea class="form-control" rows="3" type="text" name="prodDescr" id="prodDescr" required >{{str_replace('<br />', '', nl2br(e(isset($product) ? $product->description : '')))}}</textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="recommend" class="form-label">Recommendation</label>
                        <textarea class="form-control" rows="3" type="text" name="recommend" id="recommend" >{{str_replace('<br />', '', nl2br(e(isset($product) ? $product->recommended : '')))}}</textarea>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="sku" class="form-label">SKU Code</label>
                        <input class="form-control" type="text" name="sku" id="sku" required value="{{isset($product) ? $product->sku_code : ''}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="prodCode" class="form-label">Product Code</label>
                        <input class="form-control" type="text" name="prodCode" id="prodCode" value="{{isset($product) ? $product->product_code : ''}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="category" class="form-label">Main Category</label>
                        <select name="category" id="category" class="select2 form-select">
                            <option selected disabled>Select Categories</option>
                            @foreach($categories as $category)
                                <option value="{{$category->sort_id}}" @if(isset($product->main_category_id) && $product->main_category_id == $category->sort_id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="subcategories" class="form-label">Main Sub Category</label>
                        <select class="form-select form-select" name="subcategories" id="subcategories">
                            <option selected disabled>Select Main Sub Categories</option>
                            @foreach($subcategories as $category)
                                <option value="{{$category->id}}" @if(isset($product->main_sub_category_id) && $product->main_sub_category_id == $category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="my-4" />


                    <div class=" my-3">
                        <h5 class="mb-0">Product Price</h5>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="supplier" class="form-label">Supplier Cost Price (RM)</label>
                        <input class="form-control" type="text" id="supplier" name="price" value="{{isset($product) ? $product->supplier_cost_price : ''}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="supermarket" class="form-label">Supermarket Selling Price (RM)</label>
                        <input class="form-control" type="text" id="supermarket" name="supermarketPrice" value="{{isset($product) ? $product->supermarket_selling_price : ''}}" />
                    </div>
                    <div class="mb-12 col-md-6">
                        <label for="listPrice" class="form-label">List Price on Store (RM)</label>
                        <input class="form-control" type="text" id="listPrice" name="listPrice" value="{{isset($product) ? $product->list_price_on_store : ''}}" />
                    </div>

                    <hr class="my-4" />

                    <div class=" my-3">
                        <h5 class="mb-0 ">Product Details</h5>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="stock" class="form-label">Warehouse</label>
                        <select class="form-control select2" name="warehouse_id" id="warehouse_id" data-placeholder="Select Warehouse">
                            <option selected disabled>Select Warehouse</option>
                            @foreach($warehouse as $listings)
                                <option value="{{$listings->id}}" @if($product->warehouse_id == $listings->id) selected @endif>{{$listings->warehouse_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="brand" class="form-label">Brand</label>
                        <select name="brand" id="brand" class="select2 form-select">
                            <option selected disabled>Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}" @if(isset($product->brand_id) && $product->brand_id == $brand->id) selected @endif>{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{isset($productStock) ? $productStock->total_stock : ''}}" /> {{--total stock from product stock--}}
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="minOrder" class="form-label">Minimum Order Quantity</label>
                        <input class="form-control" type="number" name="minOrder" id="minOrder" value="{{isset($product) ? $product->minimum_order_quantity : ''}}" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="weight" class="form-label">Weight (kg)</label>
                        <input class="form-control" type="text" name="weight" id="weight" value="{{isset($productStock) ? $productStock->weight : ''}}" /> {{--total stock from product stock--}}
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="pickup" class="form-label">Allow Pickup</label>
                        <select name="pickup" id="pickup" class="select2 form-select">
                            <option value="">Select</option>
                            <option value="0" @if(isset($product->allow_self_pickup) && $product->allow_self_pickup == 0) selected @endif>No</option>
                            <option value="1" @if(isset($product->allow_self_pickup) && $product->allow_self_pickup == 1) selected @endif>Yes</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="volumetric" class="form-label">Volumetric</label>
                        <select name="volumetric" id="volumetric" class="select2 form-select">
                            <option value="">Select</option>
                            @foreach($volumes as $volume)
                                <option value="{{$volume->id}}" @if(isset($product->volumetric_id) && $product->volumetric_id == $volume->id) selected @endif>{{$volume->name}}</option>
                            @endforeach
                        </select>
                    </div>
					<div class="my-3">
						<h5 class="mb-0">Product Variations</h5>
					</div>
					@foreach($productVariation as $listing)
						<div class="mb-3 col-md-4">
							<label for="weight" class="form-label">Name</label>
							<input class="form-control" type="text" name="variationname[{{$listing->id}}]" value="{{$listing->name}}"/>
						</div>
						<div class="mb-3 col-md-4">
							<label for="weight" class="form-label">Color</label>
							<input class="form-control" type="text" name="variationcolor[{{$listing->id}}]" value="{{$listing->color}}"/>
						</div>
						<div class="mb-3 col-md-4">
							<label for="weight" class="form-label">Size</label>
							<input class="form-control" type="text" name="variationsize[{{$listing->id}}]" value="{{$listing->size}}"/>
						</div>
					@endforeach

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
                    {{--link balik the view n refresh kalau x model stay there with id--}}
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal" href="{{route('my_product.index')}}">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
