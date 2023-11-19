@extends('layouts.app')

@section('content')
    <!--================Single Product Area =================-->
    <div class="product_image_area">
		<div class="container" style="background: #ffffff33;border-radius: 10px;box-shadow: 0 4px 30px #0000001a;backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);padding: 50px 20px;">
			<div class="row s_product_inner">
				<div class="col-lg-6 d-flex justify-content-center">
					<div class="owl-carousel owl-theme s_Product_carousel">
						<div class="single-prd-item mx-2">
							{{-- <img class="img-fluid" style="border-radius: 10px" src="img/category/pkj-4.jpg" alt=""> --}}
                            @if($product->image()->first())
                            <img class="img-fluid" src="{{asset('storage/'.$product->image()->first()->image)}}" alt="" style="border-radius: 10px">
                          @endif
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="">
						<h3 class="text-white">{{$product->name}}</h3>
						<div class="d-flex mb-3">
							<div class="text-primary mr-2">
								<small class="fas fa-star btn-star"></small>
								<small class="fas fa-star btn-star"></small>
								<small class="fas fa-star btn-star"></small>
								<small class="fas fa-star-half-alt btn-star"></small>
								<small class="far fa-star btn-star"></small>
							</div>
							<small class="pt-1" style="color: rgba(222,222,222,0.84)">(99 Reviews)</small>
						</div>
						<div class="d-flex mb-3">
							<div class="text-white mr-2">
								<a href="{{route('shop.show',['id'=>$product->vendor_id])}}" class="button text-white">Visit Shop</a>
							</div>
						</div>
						<h2 style="color: #384aeb">{{$product->list_price_on_store}}</h2>
						<div class="prodDescr">
							<p class="text-white">{!! $product->recommended !!}</p>
                            <ul class="list text-white">
                                <li><a class="active hover-black text-white" href="#" ><span class=" text-white">Walk-in Price</span> : RM
                                        {{$product->supermarket_selling_price}}</a></li>
                                <li><a href="#" class="hover-black text-white"><span class=" text-white">Online Exclusive</span> : RM
                                        {{$product->list_price_on_store}}</a></li>
                            </ul>
							{{-- <ul>
								<li>Diabetes</li>
								<li>High Blood Pressure</li>
								<li>High Cholesterol</li>
							</ul> --}}
							{{-- <p>&nbsp;</p>
							<p>
								<strong>COMPLIMENTARY</strong> Individualized Exercise Prescription by Dr Ooi Mun Yooi, Sport Medicine Physician. Learn how to exercise based on your health conditions and limitation.
							</p>
							<p>
								Enjoy up to 5% off with our online exclusive promo by purchasing through our website and save more!
							</p>
							<ul class="list">
								<li><a class="active hover-black text-black-50" href="#" ><span class="product_text">Walk-in Price</span> : RM 4,780</a></li>
								<li><a href="#" class="hover-black text-black-50"><span class="product_text">Online Exclusive</span> : RM 4,589</a></li>
							</ul> --}}
						</div>


{{--
						 <div class="d-flex align-items-center justify-content-between mb-4 pt-3 mt-4">
							<div class="input-group quantity mr-3 d-flex align-items-center" style="width: 130px;">
								<div class="input-group-btn">
									<button class="btn primary-btn btn-minus" style="background-color: #384aeb">
										<i class="fa fa-minus text-white"></i>
									</button>
								</div>
								<input type="text" class="form-control border-0 text-center px-3 mx-1 rounded" value="1" maxlength="12" >
								<div class="input-group-btn">
									<button class="btn primary-btn btn-plus" style="background-color: #384aeb">
										<i class="fa fa-plus text-white"></i>
									</button>
								</div>
							</div>
							<div class="mr-1">
								<button onclick="event.preventDefault();
                                document.getElementById('cart-form-{{$product->id}}').submit();" class="button primary-btn px-5"><i class="fa fa-shopping-cart mr-1"></i> Add To
								Cart</button>
							</div>
							<div>
								<button onclick="buynow({{$product->id}}) class="button primary-btn px-5"><i class="fa fa-shopping-cart mr-1"></i> Buy
									Now</button>
							</div>

						</div> --}}

                        <div class="d-flex align-items-center justify-content-between mb-4 pt-3 mt-4">
                            <form id="cart-form-{{$product->id}}" action="{{ route('cart.store') }}" method="POST" >
                                @csrf
                                <input type="hidden" value="{{$product->id}}" name="id">
                                <input type="hidden" id="option-value" value="cart" name="option">

                                {{-- <div class="input-group quantity mr-3" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn primary-btn btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>


                                    <input type="text" name="quantity" class="form-control border-0 text-center" value="1" maxlength="12" >
                                    <div class="input-group-btn">
                                        <button type="button" class="btn primary-btn btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div> --}}

                                <div class="input-group quantity mr-3 d-flex align-items-center" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button class="btn primary-btn btn-minus" style="background-color: #384aeb">
                                            <i class="fa fa-minus text-white"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quantity" class="form-control border-0 text-center px-3 mx-1 rounded" value="1" maxlength="12" >
                                    <div class="input-group-btn">
                                        <button class="btn primary-btn btn-plus" style="background-color: #384aeb">
                                            <i class="fa fa-plus text-white"></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <div class="mr-3">
                                <button onclick="event.preventDefault();
                                    document.getElementById('cart-form-{{$product->id}}').submit();" class="button primary-btn px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                                    Cart</button>
                            </div>
                            <div>
                                <button onclick="buynow({{$product->id}})" class="button primary-btn px-3"><i class="fa fa-shopping-cart mr-1"></i> Buy
                                    Now</button>
                            </div>


                        </div>

					</div>
				</div>
			</div>
		</div>
	</div>
    {{-- <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            @if($product->image()->first())
                                <img class="img-fluid" src="{{asset('storage/'.$product->image()->first()->image)}}" alt="">
                            @endif
                        </div>

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="">
                        <h3>{{$product->name}}</h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star btn-star"></small>
                                <small class="fas fa-star btn-star"></small>
                                <small class="fas fa-star btn-star"></small>
                                <small class="fas fa-star-half-alt btn-star"></small>
                                <small class="far fa-star btn-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>
                        <h2>RM {{$product->list_price_on_store}}</h2>
                        <p>{!! $product->recommended !!}</p>

                        <ul class="list">
                            <li><a class="active hover-black" href="#" ><span class="product_text">Walk-in Price</span> : RM
                                    {{$product->supermarket_selling_price}}</a></li>
                            <li><a href="#" class="hover-black"><span class="product_text">Online Exclusive</span> : RM
                                    {{$product->list_price_on_store}}</a></li>
                        </ul>


                        <div class="d-flex align-items-center mb-4 pt-2">
                            <form id="cart-form-{{$product->id}}" action="{{ route('cart.store') }}" method="POST" >
                                @csrf
                                <input type="hidden" value="{{$product->id}}" name="id">
                                <input type="hidden" id="option-value" value="cart" name="option">

                                <div class="input-group quantity mr-3" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn primary-btn btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>


                                    <input type="text" name="quantity" class="form-control border-0 text-center" value="1" maxlength="12" >
                                    <div class="input-group-btn">
                                        <button type="button" class="btn primary-btn btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                            </form>
                            <div class="mr-3">
                                <button onclick="event.preventDefault();
                                    document.getElementById('cart-form-{{$product->id}}').submit();" class="button primary-btn px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                                    Cart</button>
                            </div>
                            <div>
                                <button onclick="buynow({{$product->id}})" class="button primary-btn px-3"><i class="fa fa-shopping-cart mr-1"></i> Buy
                                    Now</button>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->

    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: transparent">
                <li class="nav-item">
                    <a class="nav-link active hover-black" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hover-black" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                       aria-selected="false">Specification</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link hover-black" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                       aria-selected="false">Comments</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link  hover-black" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                       aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                   <span class="text-white">{!! $product->description !!}</span>


                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
								<tr>
									<td>
										<h5 class="text-white">Width</h5>
									</td>
									<td>
										<h5 class="text-white">NaN</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5 class="text-white">Height</h5>
									</td>
									<td>
										<h5 class="text-white">NaN</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5 class="text-white">Weight</h5>
									</td>
									<td>
										<h5 class="text-white">NaN</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5 class="text-white">Quality checking</h5>
									</td>
									<td>
										<h5 class="text-white">NaN</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5 class="text-white">Each Box contains</h5>
									</td>
									<td>
										<h5 class="text-white">NaN</h5>
									</td>
								</tr>
							</tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="comment_list">
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset('img/product/review-1.png')}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                                            <a class="reply_btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item reply">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset('img/product/review-2.png')}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                                            <a class="reply_btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset('img/product/review-3.png')}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <h5>12th Feb, 2018 at 05:56 pm</h5>
                                            <a class="reply_btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Post a comment</h4>
                                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="tab-pane fade " id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-12">
							<div class="row total_rate ">
								<div class="col-6">
									<div class="box_total">
										<h5>Overall</h5>
										<h4>4.0</h4>
										<h6>(03 Reviews)</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>Based on 3 Reviews</h3>
										<ul class="list">
											<li><a href="#" class="text-white">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#" class="text-white">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
													 class="fa fa-star"></i> 01</a></li>
											<li><a href="#" class="text-white">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>01</a></li>
											<li><a href="#" class="text-white">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
											<li><a href="#" class="text-white">1 Star <i class="fa fa-star"></i>01</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="review_list">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="{{asset('img/product/review-1.png')}}" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="{{asset('img/product/review-2.png')}}" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="{{asset('img/product/review-3.png')}}" alt="">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
							</div>
						</div>
					</div>
				</div>
                {{-- <div class="tab-pane fade " id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row total_rate">
                                <div class="col-6">
                                    <div class="box_total">
                                        <h5>Overall</h5>
                                        <h4>4.0</h4>
                                        <h6>(03 Reviews)</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="rating_list">
                                        <h3>Based on 3 Reviews</h3>
                                        <ul class="list">
                                            <li><a href="#">5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                            <li><a href="#">1 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                        class="fa fa-star"></i><i class="fa fa-star"></i> 01</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review_list">
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset('img/product/review-1.png')}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset('img/product/review-2.png')}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset('img/product/review-3.png')}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4>Blake Ruiz</h4>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Add a Review</h4>
                                <p>Your Rating:</p>
                                <ul class="list">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                                <p>Outstanding</p>
                                <form action="#/" class="form-contact form-review mt-3">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" placeholder="Enter your name" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="email" type="email" placeholder="Enter email address" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="subject" type="text" placeholder="Enter Subject">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control different-control w-100" name="textarea" id="textarea" cols="30" rows="5" placeholder="Enter Message"></textarea>
                                    </div>
                                    <div class="form-group text-center text-md-right mt-3">
                                        <button type="submit" class="button button--active button-review">Submit Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

    <!--================ Start related Product area =================-->
    <section class="related-product-area section-margin--small mt-0">
        <div class="container">
            <div class="section-intro pb-60px">
                {{-- <p>Popular Item in the market</p> --}}
                <h2>Usually <span class="section-intro__style">Bought Together</span></h2>
            </div>
            <div class="row">
                @foreach($related as $relateds)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                @if($relateds->image()->first())
                                    <img class="card-img" src="{{asset('storage/'.$relateds->image()->first()->image)}}" alt="">
                                @endif
                            </div>
                            <div class="card-body">

                                <!-- <p ><a href="#" class="text-primary"></a></p> -->
                                <h4 class="card-product__title"><a href="{{route('product.show',['product'=>$relateds->id])}}" class="text-white">{{$relateds->name}}</a></h4>
                                <p class="card-product__price text-white">RM {{$relateds->list_price_on_store}}</p>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star btn-star mr-1"></small>
                                    <small class="fa fa-star btn-star mr-1"></small>
                                    <small class="fa fa-star btn-star mr-1"></small>
                                    <small class="fa fa-star btn-star mr-1"></small>
                                    <small class="fa fa-star btn-star mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                {{--                <div class="col-md-6 col-lg-4 col-xl-3">--}}
                {{--                    <div class="card text-center card-product">--}}
                {{--                        <div class="card-product__img">--}}
                {{--                            <img class="card-img" src="{{asset('img/product/pop-2.jpg')}}" alt="">--}}
                {{--                        </div>--}}
                {{--                        <div class="card-body">--}}
                {{--                            <h4 class="card-product__title"><a href="#" class="text-primary">Gardasil-9 Vaccine (HPV vaccine) – Gardasil-9 Vaccine (3 doses)</a></h4>--}}
                {{--                            <p class="card-product__price"> RM 1580.00</p>--}}
                {{--                            <div class="d-flex align-items-center justify-content-center mb-1">--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small>(99)</small>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="col-md-6 col-lg-4 col-xl-3">--}}
                {{--                    <div class="card text-center card-product">--}}
                {{--                        <div class="card-product__img">--}}
                {{--                            <img class="card-img" src="{{asset('img/product/pop-3.jpg')}}" alt="">--}}
                {{--                        </div>--}}
                {{--                        <div class="card-body">--}}
                {{--                            <h4 class="card-product__title"><a href="#" class="text-primary">Sinovac 1 Dose (Locally Bottled) – RM77 (vaccine) + RM18 (Service & Consumable Charges)</a></h4>--}}
                {{--                            <p class="card-product__price">RM 95.00</p>--}}
                {{--                            <div class="d-flex align-items-center justify-content-center mb-1">--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
                {{--                                <small>(99)</small>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

            </div>
        </div>
    </section>
    <!--================ end related Product area =================-->
@endsection

@section('script')

    <script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    <script>
        function buynow(id){



            var optionValue = document.getElementById('option-value');
            optionValue.value = 'buynow';
            document.getElementById('cart-form-' + id).submit();
        }
    </script>
@endsection
