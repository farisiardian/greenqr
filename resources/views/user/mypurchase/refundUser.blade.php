{{--modal editStaff kat mypurchase.index--}}
    <section class="d-none d-xl-block">
        <div class="container">
                <form action="{{route('refundUser',$orders->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                                <i class='bx bx-minus'></i>
                            </button>
                            <strong>Success !</strong> {{ session('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                                <i class='bx bx-minus'></i>
                            </button>
                            <strong>Error !</strong> {{ session('error') }}
                        </div>
                    @endif

                        <div class="row my-3">
                            <div class="col">
                                <h5 class="mb-3" style="font-family: 'Nunito', sans-serif;color:#293A8B;">Shipping Detail</h5>
                                <h5 class="modal-title" id="orderReturnTitle">Order #{{isset($orders) ? $orders->transaction_id : ''}}</h5>

                                <p>{{isset($userAddress) ?  $userAddress->name : ''}}<br>{{isset($userAddress) ?  $userAddress->phone : ''}}<br>
                                    {{isset($userAddress) ?  $userAddress->address : ''}}</p>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <h5 class="mb-3" style="font-family: 'Nunito', sans-serif;color:#293A8B;">Products</strong>
                                <div class="table-responsive mt-4">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    @if(isset($productImage->image) && $productImage->product_id == $products->id)
                                                        <img
                                                            src="{{asset('storage/'.$productImage->image)}}"
                                                            class="d-block rounded"
                                                            style="height: 80px;width:80px;object-fit: cover"/>
                                                    @else
                                                        <img src="{{asset('admin/assets/img/avatars/default_product.png')}}"
                                                             alt="user-avatar"
                                                             class="d-block rounded"
                                                             style="height: 80px;width:80px;object-fit: cover"
                                                             id="uploadedAvatar" />
                                                    @endif
                                                    <p class="ml-3">{{isset($products) ? $products->name : ''}}</p>
													</div>
                                            </td>
                                            <td>{{$shoppingCart->quantity}}</td>
                                            <td>RM{{$orders->cart_total}}</td>
                                        </tr>
                                        </tbody>
                                        <tfoot class="table-border-bottom-0">
                                        <tr>
                                            <th></th>
                                            <th>Shipping Fee</th>
                                            <th>RM {{$orders->shipping_total}}</th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <th>RM {{$orders->shipping_total + $orders->cart_total}}</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
						<div class="row m-3">
							<div class="col mb-3">
								<div class="card p-2">
									<div class="card-body d-flex justify-content-between">
										<strong style="font-family: 'Nunito', sans-serif;color:#293A8B;">Payment Method</strong><span class="text-primary">FPX</span>
									</div>
								</div>
							</div>								
                        </div>
                        <div class="row mx-3">
                            <div class="col mb-3">
                                <div class="card p-2">
                                    <div class="card-body px-2">
										<div>
											<p style="font-family: 'Nunito', sans-serif">State your reasons and upload an image to proof and support your reasons.</p>
										</div>
										<div class="form-group row">
											<div class="col-12">
												<label  class="form-label">Reason</label>
												<input class="form-control" type="text" id="reason" name="reason" required>
											</div>								
										</div>
										<div class="row">
											<div class="col-12 px-3">
												<div class="file button img-button mt-3">
													Upload an Image
													<input class="form-control file" type="file" name="image" id="image" accept=".jpg,.jpeg,.png" />
												</div>
												<div class="img-file">
												{{-- <div class="img-file-desc">File size: maximum 1 MB</div>--}}
													<div class="img-file-desc">File extension: .JPEG, .PNG</div>
												</div>
												
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
                </form>
        </div>
    </section>
	
	
	
	<!------------Mobile----------->
	<section class="d-block d-sm-none">
        <div class="container">
                <form action="{{route('refundUser',$orders->id)}}" method="POST">
                    @csrf

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                                <i class='bx bx-minus'></i>
                            </button>
                            <strong>Success !</strong> {{ session('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                                                <i class='bx bx-minus'></i>
                            </button>
                            <strong>Error !</strong> {{ session('error') }}
                        </div>
                    @endif

                        <div class="row my-3">
                            <div class="col">
                                <h5 class="mb-3" style="font-family: 'Nunito', sans-serif;color:#293A8B;">Shipping Detail</h5>
                                <h5 class="modal-title" id="orderReturnTitle">Order #{{isset($orders) ? $orders->transaction_id : ''}}</h5>

                                <p>{{isset($userAddress) ?  $userAddress->name : ''}}<br>{{isset($userAddress) ?  $userAddress->phone : ''}}<br>
                                    {{isset($userAddress) ?  $userAddress->address : ''}}</p>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <h5 class="mb-3" style="font-family: 'Nunito', sans-serif;color:#293A8B;">Products</strong>
                                <div class="table-responsive mt-4">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th style="font-size:16px">Product Name</th>
                                            <th style="font-size:16px">Quantity</th>
                                            <th style="font-size:16px">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    @if(isset($productImage->image) && $productImage->product_id == $products->id)
                                                        <img
                                                            src="{{asset('storage/'.$productImage->image)}}"
                                                            class="d-block rounded"
                                                            style="height: 30px;width:30px;object-fit: cover"/>
                                                    @else
                                                        <img src="{{asset('admin/assets/img/avatars/default_product.png')}}"
                                                             alt="user-avatar"
                                                             class="d-block rounded"
                                                             style="height: 30px;width:30px;object-fit: cover"
                                                             id="uploadedAvatar" />
                                                    @endif
                                                    <p class="ml-3" style="font-size:12px">{{isset($products) ? $products->name : ''}}</p>
													</div>
                                            </td>
                                            <td><p style="font-size:12px;text-align:center">{{$shoppingCart->quantity}}</p></td>
                                            <td><p style="font-size:12px">RM{{$orders->cart_total}}</p></td>
                                        </tr>
                                        </tbody>
                                        <tfoot class="table-border-bottom-0">
                                        <tr>
                                            <th></th>
                                            <th><p style="font-size:12px">Shipping Fee</p></th>
                                            <th><p style="font-size:12px">RM {{$orders->shipping_total}}</p></th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th><p style="font-size:16px">Total</p></th>
                                            <th><p style="font-size:16px">RM {{$orders->shipping_total + $orders->cart_total}}</p></th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col mb-3">
								<div class="card p-2">
									<div class="card-body d-flex justify-content-between">
										<strong style="font-family: 'Nunito', sans-serif;color:#293A8B;">Payment Method</strong><span class="text-primary">FPX</span>
									</div>
								</div>
							</div>								
                        </div>
                        <div class="row my-3">
                            <div class="col mb-3">
                                <div class="card p-3">
                                    <div class="card-body px-3">
										<div>
											<p style="font-family: 'Nunito', sans-serif">State your reasons and upload an image to proof and support your reasons.</p>
										</div>
										<div class="form-group row">
											<div class="col-12">
												<label  class="form-label">Reason</label>
												<input class="form-control" type="text" id="reason" name="reason" required>
											</div>								
										</div>
										<div class="row text-center">
											<div class="col-12 px-3">
												<div class="file button img-button mt-3">
													Upload an Image --Dont Work--
													<input class="form-control file" type="file" name="image" id="image" accept=".jpg,.jpeg,.png" />
												</div>
												<div class="img-file">
												{{-- <div class="img-file-desc">File size: maximum 1 MB</div>--}}
													<div class="img-file-desc">File extension: .JPEG, .PNG</div>
												</div>
												
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
                </form>
        </div>
    </section>


