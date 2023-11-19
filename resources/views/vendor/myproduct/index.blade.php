@extends('layouts.admin')

@section('content')

    <!-- Modal Edit Products -->
    <div class="modal fade text-left" id="editStaff" tabindex="-1" role="dialog" aria-labelledby="editStaff" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div id="editStaffs">
                    Model Edit
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Add Content Here -->
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">My Products / </span> All Products
        </h4>

        <div class="card mb-4">
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
            <div class="card-body">
                <div class="row">
                    <!-- Custom content with heading -->
                    <div class="col d-flex justify-content-end">
                        <a href="{{route('my_product.create')}}" class="btn btn-primary m-1">
                            <span class="tf-icons bx bx-plus"></span> Add New Products
                        </a>
                        <button type="button" class="btn btn-primary m-1">
                            <span class="tf-icons bx bx-upload"></span> Import
                        </button>
                        <button type="button" class="btn btn-primary m-1">
                            <span class="tf-icons bx bx-download"></span> Export
                        </button>
                    </div>
                    <div class="col-lg-12">
                        <div class="demo-inline-spacing mt-3">
                            <div class="list-group list-group-horizontal-md text-md-center">
                                <a
                                    class="list-group-item list-group-item-action active"
                                    id="home-list-item"
                                    data-bs-toggle="list"
                                    href="#horizontal-all"
                                >All</a
                                >
{{--                                <a--}}
{{--                                    class="list-group-item list-group-item-action"--}}
{{--                                    id="profile-list-item"--}}
{{--                                    data-bs-toggle="list"--}}
{{--                                    href="#horizontal-live"--}}
{{--                                >Live</a--}}
{{--                                >--}}
                                <a
                                    class="list-group-item list-group-item-action"
                                    id="messages-list-item"
                                    data-bs-toggle="list"
                                    href="#horizontal-soldout"
                                >Sold Out</a
                                >
{{--                                <a--}}
{{--                                    class="list-group-item list-group-item-action"--}}
{{--                                    id="settings-list-item"--}}
{{--                                    data-bs-toggle="list"--}}
{{--                                    href="#horizontal-settings"--}}
{{--                                >Settings</a--}}
{{--                                >--}}
                            </div>
                            {{--All Product --}}
                            <div class="tab-content px-0 mt-0">
                                <div class="tab-pane fade show active" id="horizontal-all">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>SKU</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Sales</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
											
                                            @foreach($product as $products)
											<?php $products = isset($products) ? $products : null; ?>

                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                        @if($products->image()->first())
                                                            <img
                                                                src="{{asset('../storage/'.$products->image()->first()->image)}}"
                                                                class="d-block rounded"
                                                                height="100"
                                                                width="100"/>
                                                        @else
                                                        <img
                                                            src="{{asset('admin/assets/img/avatars/default_product.png')}}"
                                                            class="d-block rounded"
                                                            height="100"
                                                            width="100"/>
                                                        @endif
                                                        <strong>{{$products->name}}</strong></div>
                                                </td>
                                                <td>{{$products->sku_code}}</td>
                                                <td>RM {{$products->list_price_on_store}}

                                                </td>
                                                <td>{{$products->stocks()->sum('total_stock')}}</td>
                                                <td>{{$products->stocks()->where('total_stock','<','0')->sum('total_stock')*-1}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                        <div class="dropdown-menu">

                                                            {{--<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}

                                                            <a href="#" data-toggle="modal" data-target="#editStaff" data-id="{{$products->id}}" class="dropdown-item editStaff-modals"><i class="bx bx-edit me-1"></i>Edit</a>

                                                            {{--<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}

                                                            <a class="dropdown-item" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-form-{{$products->id}}').submit()}"><i class="bx bx-trash me-1"></i>Delete</a>
                                                            <form id="delete-form-{{$products->id}}" action="{{route('my_product.destroy',$products->id)}}" method="post">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                @csrf
                                                            </form>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
{{--                                <div class="tab-pane fade" id="horizontal-live">--}}
{{--                                    <div class="table-responsive">--}}
{{--                                        <table class="table table-hover">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th>Product Name</th>--}}
{{--                                                <th>SKU</th>--}}
{{--                                                <th>Price</th>--}}
{{--                                                <th>Stock</th>--}}
{{--                                                <th>Sales</th>--}}
{{--                                                <th>Actions</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        <strong>IBERET FOLIC 500 (30'S)</strong></div>--}}
{{--                                                </td>--}}
{{--                                                <td>001</td>--}}
{{--                                                <td>RM 27.00--}}

{{--                                                </td>--}}
{{--                                                <td>100</td>--}}
{{--                                                <td>0</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="{{asset('admin/assets/img/products/Surbex-Zinc-750.jpg')}}"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        <strong>SURBEX ZINC 750MG (30’S)</strong></div>--}}
{{--                                                </td>--}}
{{--                                                <td>002</td>--}}
{{--                                                <td>RM31.00</td>--}}
{{--                                                <td>100</td>--}}
{{--                                                <td>0</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="{{asset('admin/assets/img/products/Bio-D3.jpg')}}"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        <strong>BIO D3 80’S</strong></div>--}}
{{--                                                </td>--}}
{{--                                                <td>003</td>--}}
{{--                                                <td>RM60.00</td>--}}
{{--                                                <td>50</td>--}}
{{--                                                <td>40</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="{{asset('admin/assets/img/products/Thycurm1.jpg')}}"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        <strong>THYCURM (30’S)</strong></div>--}}
{{--                                                </td>--}}
{{--                                                <td>004</td>--}}
{{--                                                <td>RM65.00</td>--}}
{{--                                                <td>30</td>--}}
{{--                                                <td>20</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                {{--Sold Out--}}
                                <div class="tab-pane fade" id="horizontal-soldout">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>SKU</th>
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Sales</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product as $products)
                                                @if($products->stocks()->sum('total_stock') == 0)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                            @if($products->image()->first())
                                                                <img
                                                                    src="{{asset('storage/'.$products->image()->first()->image)}}"
                                                                    class="d-block rounded"
                                                                    height="100"
                                                                    width="100"/>
                                                            @else
                                                                <img
                                                                    src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                                                    class="d-block rounded"
                                                                    height="100"
                                                                    width="100"/>
                                                            @endif
                                                            <strong>{{$products->name}}</strong></div>
                                                    </td>
                                                    <td>{{$products->sku_code}}</td>
                                                    <td>RM {{$products->list_price_on_store}}

                                                    </td>
                                                    <td>{{$products->stocks()->sum('total_stock')}}</td>
                                                    <td>{{$products->stocks()->where('total_stock','<','0')->sum('total_stock')*-1}}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                            <div class="dropdown-menu">

                                                                {{--}}<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}

                                                                <a href="#" data-toggle="modal" data-target="#editStaff" data-id="{{$products->id}}" class="dropdown-item editStaff-modals"><i class="bx bx-edit me-1"></i>Edit</a>

                                                               {{--<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}

                                                                <a class="dropdown-item" onclick="if(confirm(`{{'Sure'}}`)){event.preventDefault();document.getElementById('delete-form-{{$products->id}}').submit()}"><i class="bx bx-trash me-1"></i>Delete</a>
                                                                <form id="delete-form-{{$products->id}}" action="{{route('my_product.destroy',$products->id)}}" method="post">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    @csrf
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
{{--                                <div class="tab-pane fade" id="horizontal-settings">--}}
{{--                                    <div class="table-responsive">--}}
{{--                                        <table class="table table-hover">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th>Product Name</th>--}}
{{--                                                <th>SKU</th>--}}
{{--                                                <th>Price</th>--}}
{{--                                                <th>Stock</th>--}}
{{--                                                <th>Sales</th>--}}
{{--                                                <th>Actions</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        <strong>IBERET FOLIC 500 (30'S)</strong></div>--}}
{{--                                                </td>--}}
{{--                                                <td>001</td>--}}
{{--                                                <td>RM 27.00--}}

{{--                                                </td>--}}
{{--                                                <td>100</td>--}}
{{--                                                <td>0</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="{{asset('admin/assets/img/products/Surbex-Zinc-750.jpg')}}"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        <strong>SURBEX ZINC 750MG (30’S)</strong></div>--}}
{{--                                                </td>--}}
{{--                                                <td>002</td>--}}
{{--                                                <td>RM31.00</td>--}}
{{--                                                <td>100</td>--}}
{{--                                                <td>0</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="{{asset('admin/assets/img/products/Bio-D3.jpg')}}"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        <strong>BIO D3 80’S</strong></div>--}}
{{--                                                </td>--}}
{{--                                                <td>003</td>--}}
{{--                                                <td>RM60.00</td>--}}
{{--                                                <td>50</td>--}}
{{--                                                <td>40</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="d-flex align-items-start align-items-sm-center gap-4">--}}
{{--                                                        <img--}}
{{--                                                            src="{{asset('admin/assets/img/products/Thycurm1.jpg')}}"--}}
{{--                                                            class="d-block rounded"--}}
{{--                                                            height="100"--}}
{{--                                                            width="100"/>--}}
{{--                                                        <strong>THYCURM (30’S)</strong></div>--}}
{{--                                                </td>--}}
{{--                                                <td>004</td>--}}
{{--                                                <td>RM65.00</td>--}}
{{--                                                <td>30</td>--}}
{{--                                                <td>20</td>--}}
{{--                                                <td>--}}
{{--                                                    <div class="dropdown">--}}
{{--                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>--}}
{{--                                                        <div class="dropdown-menu">--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>Edit</a>--}}
{{--                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <!--/ Custom content with heading -->
                </div>
            </div>
        </div>



    </div>
    <!-- / Content -->
@endsection
{{--JavaScript for edit product--}}
@section('script')
    <script>
	@if (isset($products))
        $(document).on("click",".editStaff-modals", function(e){
            // alert('ok');
            var eventId = $(this).data('id');
            //var url = '{{route('my_product.edit',$products->id)}}';
			
			
				var url = '{{ route('my_product.edit', 'id') }}';
				url = url.replace('id', eventId);
				//var url = '{{url('/')}}' + 'my_product.edit/' + eventId;
				//alert(eventId);

            $.ajax({
                type:'GET',
                url:url ,
                data: {
                    '_token' : '<?php echo csrf_token() ?>',
                },
                success:function(data){

                    $('#editStaff').modal('show');
                    $("#editStaffs").html(data);
                },
                error:function(data){
                    // alert('error');
                    // alert(JSON.stringify(data));
                }
            });
			
            
        });
			@else
				<div class="alert alert-danger">Error: Product not found.</div>
			@endif

    </script>
@endsection
