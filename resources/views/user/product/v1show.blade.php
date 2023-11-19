@extends('layouts.app')
@section('addstyle')
    <style>
        .card{
            border: 0px;
        }
        .card-product-price{
            font-family: 'Roboto', sans-serif;
            font-size: 18px;
            color: #384AEB !important;
            text-transform: uppercase;
            font-weight: 400;
            margin-top: 10px;
        }
        .card-body-price{
            padding: 5px 17px 5px 17px;
        }
        .card-product-name{
            font-family: 'Roboto', sans-serif;
            font-size: 13px;
            text-transform: capitalize;
            font-weight: 400;
        }

        .rectangle {
            background: #FFFFFF;
            /*position: absolute;*/
            /*width: 390px;*/
            /*height: 50px;*/
            left: 0px;
            padding: 10px 17px 10px 17px;
            /*top: 597px;*/
        }
        .card-product-delivery{
            font-size: 10px;
        }
        .card-product-border{
            border: 1px solid rgba(0,0,0,.125);
        }
        .card-title-product-cate{
            color: #384AEB !important;
            display: -webkit-box;
            -webkit-line-clamp:1 ;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 9px;
        }
        .card-title-product-cate-name{
            color:#384AEB !important;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 9px;
            text-transform: uppercase;
            font-weight: lighter;

        }
        .card-title-product-cate-price{
            color:#384AEB !important;
            text-transform: uppercase;
            font-weight: bolder;
            font-size: 9px;
        }
        .card-title-product-cate-price-before{
            color:#777777 !important;
            font-weight: lighter;
            font-size:9px;
            text-decoration:line-through
        }
    </style>
@endsection
@section('content')
    <!--================Single Product Area =================-->
    {{--Desktop View--}}
    <div class="product_image_area d-none d-xl-block">
        <div class="container" style="background: #ffffff;box-shadow: 0 4px 30px #0000001a;backdrop-filter: blur(5px);-webkit-backdrop-filter: blur(5px);padding: 50px 20px;">
            <div class="row s_product_inner">
                <div class="col-lg-4 d-flex justify-content-center">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item mx-2">
                            {{-- <img class="img-fluid" style="border-radius: 10px" src="img/category/pkj-4.jpg" alt=""> --}}
                            @if($product->image()->first())
                                <img class="img-fluid" src="{{asset('storage/'.$product->image()->first()->image)}}" alt="" style="border-radius: 10px">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
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
                            <small class="pt-1" style="color: #5d5d5d">(99 Reviews)</small>
                        </div>
                        <div class="row mb-3">
                            <div class="col-2"><span> Brand</span>
                            </div>
                            <div class="col">
                                <span style="color:#384aeb">Posture Align</span>
                            </div>
                        </div>
                        <h2 style="color: #384aeb">RM{{$product->list_price_on_store}}</h2>
                        <div class="prodDescr">
                            <p>{!! $product->recommended !!}</p>
                            <ul class="list">
                                <li><span >Walk-in Price</span> : RM{{$product->supermarket_selling_price}}</li>
                                <li><span>Online Exclusive</span> : RM{{$product->list_price_on_store}}</li>
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



                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4 pt-3 mt-4">
                            <div class="mr-3">
                                <button onclick="event.preventDefault();
                                    document.getElementById('cart-form-{{$product->id}}').submit();" class="button border-0 px-3" style="border-radius:2px;width:180px;background-color:#ED1C24"><i class="fa fa-shopping-cart mr-1"></i> Add To
                                    Cart</button>
                            </div>
                            <div>
                                <button onclick="buynow({{$product->id}})" class="button primary-btn px-3" style="border-radius:2px;width:180px"><i class="fa fa-shopping-cart mr-1"></i> Buy
                                    Now</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="">
                        <div>
                            <span> Delivery Options</span>
                            <div class="row d-flex justify-content-between">

                                <div class="col-1">
                                    <i class="fa fa-map-pin" style="color:#000"></i>
                                </div>
                                <div class="col">
                                    <p style="color:#000">WP Kuala Lumpur, Kuala Lumpur</p>
                                </div>
                                <div class="col-2 d-flex justify-content-end">
                                    <a href="#">CHANGE</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between">

                                <div class="col-1">
                                    <i class="fa fa-truck" style="color:#000"></i>
                                </div>
                                <div class="col">
                                    <p style="color:#000">Standard Delivery</p>
                                    <small class="m-0">Get  within 7 days</small>
                                </div>
                                <div class="col-2 d-flex justify-content-end">
                                    <p>RM4.90</p>
                                </div>
                            </div>

                        </div>
                        <div class="mt-5">
                            <span> Sold by</span>
                            <p style="color:#000"> Posture Align</p>
                            <div class="row d-flex justify-content-between" style="border-top:solid 1px #EFF0F5;border-bottom:solid 1px #EFF0F5; padding:10px 0">
                                <div class="col-4 text-center">
                                    <span>Seller Ratings</span>
                                    <p>96%</p>
                                </div>
                                <div class="col-4 text-center" style="border-right:solid 1px #EFF0F5;border-left:solid 1px #EFF0F5;">
                                    <span>Seller Ratings</span>
                                    <p>96%</p>
                                </div>
                                <div class="col-4 text-center">
                                    <span>Seller Ratings</span>
                                    <p>96%</p>
                                </div>
                            </div>
                            <div class=" mt-4 d-flex justify-content-center">
                                <a href="{{route('shop.show',['id'=>$product->vendor_id])}}">Visit Shop</a>
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
    {{-- Mobile View --}}
    <section class="d-block d-sm-none">
        <div class="card">
            <div class="card-content">
                @if($product->image()->first())
                    <img class="card-img-top img-fluid" src="{{asset('storage/'.$product->image()->first()->image)}}" alt="" >
                @endif
                <div class="card-body card-body-price">
                    <h4 class="card-product-price">
                        RM{{$product->list_price_on_store}}
                    </h4>
                    <h4 class="card-product-name mb-0">{{$product->name}}</h4>
                    <div class="d-flex mb-2">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star-half-alt btn-star"></small>
                            <small class="far fa-star btn-star"></small>
                        </div>
                        <small class="pt-1" style="color: #5d5d5d">(99 Reviews)</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between ">
                <span class="card-product-name">
                Vouchers :
            </span>
                <div class="card-product-name mr-2 text-primary">
                    <span class="border border-primary rounded p-1 mr-2">RM10.00 off</span>
                    <span class="border border-primary  rounded p-1">RM10.00 off</span>
                </div>
                <div>
                    <span class="text-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                </div>
            </div>

        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="card-product-name">Product Variations :</span>
                </div>

                <div class="">
                    <span class="text-dark card-product-name mr-1">Medium</span>
                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="card-product-name">Specification :</span>
                </div>

                <div class="">
                    <span class="text-dark card-product-name mr-1">Brand, Material</span>
                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                </div>
            </div>

        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="card-product-name">Delivery :</span>
                </div>

                <div class="">
                    <a href="#" class=""><span class="card-product-name">WP, Kuala Lumpur, Kuala Lumpur, 50450</span></a>
                    <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                </div>

            </div>
            <div class="text-right">
                <span class="card-product-delivery mr-1">Standard Delivery, Get withing 5 days </span>
                <span class="card-product-name text-dark bold">RM4.90</span>
            </div>
        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <span class="card-product-name">
                Rating & Reviews
            </span>
                </div>
                <div>
                    <a href="#" class=""><span class="card-product-delivery">View All</span></a>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <div class="d-flex">
                        <div class=" card-product-delivery">
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star btn-star"></small>
                            <small class="fas fa-star-half-alt btn-star"></small>
                            <small class="far fa-star btn-star"></small>
                            <small><span class="d-block">by aliamaisara</span></small></div>
                    </div>
                </div>
                <div>
                    <span class="card-product-delivery">20 August 2022</span>
                </div>

            </div>
            <div>
                <span class="card-product-name mt-0 text-dark">So good, make my night better.</span>
            </div>
            <div>
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="50px" width="50px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="50px" width="50px">
                <img class="img-fluid rounded" src="{{asset('img/default.png')}}" alt="" height="50px" width="50px">
            </div>
            <div><span class="card-product-name">Size : Large</span></div>
        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between">
                <div>
                    <img class="img-fluid rounded-circle mr-1" src="{{asset('img/product/LIGHTHEAL.png')}}" alt="" height="40px" width="40px">
                    <span class="card-product-name text-dark">Posture Align</span>
                </div>

                <div class="card-product-name mr-2 text-primary align-self-center">
                    <a class="border border-primary rounded p-1 mr-2" href="{{route('shop.show',['id'=>$product->vendor_id])}}">Visit Shop</a>
                </div>
            </div>

        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex justify-content-between ">
                <span class="card-product-name mb-1">Description :</span>

            </div>
            <div class="card-product-name text-dark">
                <p>Posture Align therapeutic pillows are designed and used by health professionals. Their ergonomic design ensures your body stays in optimal posture when you are sleeping.
                </p><p>Our Premium Soft Pillow has a softer density yet an uncompromising amount of support to maintain our spine in the correct postural position, which eases stress related tension in the neck, shoulders and upper back. To be able to achieve this, our premium soft pillow is made firmer than the average pillow you can find on the market, especially those made of feathers and down, or cotton pillows. They are suitable for all types of necks and all age groups from children to the elderly.
                </p>
            </div>


        </div>
        <div class="rectangle mt-3 mb-3">
            <div class="d-flex mb-2">
                <span class="card-product-name">You may also like :</span>
            </div>
            <div class="row pl-1 pr-1">
                <div class="col-6 p-2">
                    <div class="card card-product-border">
                        <div class="card-content p-1">
                            {{--                            <div class="ribbon red"><span>Sale</span></div>--}}
                            <img class="card-img-top img-fluid " src="{{asset('img/product/Slides1.png')}}" height="90px"/>
                        </div>
                        <div class="text-center">
                            <a href="" class="card-title-product-cate">Medical Supplies</a>
                        </div>
                        <div class="text-center">
                            <a href="#" class="card-title-product-cate-name">Posture Align Orthopedic Lumbar Support</a>
                        </div>
                        <div class="text-center">
                            <span class="card-title-product-cate-price-before">RM20.50</span>
                            <span class="card-title-product-cate-price">RM15.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 p-2">
                    <div class="card card-product-border">
                        <div class="card-content p-1">
                            {{--                            <div class="ribbon red"><span>Sale</span></div>--}}
                            <img class="card-img-top img-fluid " src="{{asset('img/product/Pillow1.png')}}" height="90px"/>
                        </div>
                        <div class="text-center">
                            <a href="" class="card-title-product-cate">Medical Supplies</a>
                        </div>
                        <div class="text-center">
                            <a href="#" class="card-title-product-cate-name">Posture Align Orthopedic Lumbar Support</a>
                        </div>
                        <div class="text-center">
                            <span class="card-title-product-cate-price-before">RM20.50</span>
                            <span class="card-title-product-cate-price">RM15.00</span>
                        </div>
                    </div>

                </div>
                <div class="col-6 p-2">
                    <div class="card card-product-border">
                        <div class="card-content p-1">
                            {{--                                                        <div class="ribbon red"><span>Sale</span></div>--}}
                            <img class="card-img-top img-fluid " src="{{asset('img/product/Pillow1.png')}}" height="90px"/>
                        </div>
                        <div class="text-center">
                            <a href="" class="card-title-product-cate">Medical Supplies</a>
                        </div>
                        <div class="text-center">
                            <a href="#" class="card-title-product-cate-name">Posture Align Orthopedic Lumbar Support</a>
                        </div>
                        <div class="text-center">
                            <span class="card-title-product-cate-price-before">RM20.50</span>
                            <span class="card-title-product-cate-price">RM15.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 p-2">
                    <div class="card card-product-border">
                        <div class="card-content p-1">
                            {{--                                                        <div class="ribbon red"><span>Sale</span></div>--}}
                            <img class="card-img-top img-fluid " src="{{asset('img/product/Pillow1.png')}}" height="90px"/>
                        </div>
                        <div class="text-center">
                            <a href="" class="card-title-product-cate">Medical Supplies</a>
                        </div>
                        <div class="text-center">
                            <a href="#" class="card-title-product-cate-name">Posture Align Orthopedic Lumbar Support</a>
                        </div>
                        <div class="text-center">
                            <span class="card-title-product-cate-price-before">RM20.50</span>
                            <span class="card-title-product-cate-price">RM15.00</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->

    <section class="product_description_area d-none d-xl-block">
        <div class="container container-home bg-white">
            <div>
                <h4> Product Details</h4>
                <div class="p-3">
                    {{--<span class="text-white">{!! $product->description !!}</span>--}}
                    <p>Posture Align therapeutic pillows are designed and used by health professionals. Their ergonomic design ensures your body stays in optimal posture when you are sleeping.</p>
                    <p>Our Premium Soft Pillow has a softer density yet an uncompromising amount of support to maintain our spine in the correct postural position, which eases stress related tension in the neck, shoulders and upper back. To be able to achieve this, our premium soft pillow is made firmer than the average pillow you can find on the market, especially those made of feathers and down, or cotton pillows. They are suitable for all types of necks and all age groups from children to the elderly.</p>
                </div>
                <div class="mt-4 p-3">
                    <div class="table-responsive ">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <span>Width</span>
                                </td>
                                <td>
                                    <p>NaN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Height</span>
                                </td>
                                <td>
                                    <p>NaN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Weight</span>
                                </td>
                                <td>
                                    <p>NaN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Quality checking</span>
                                </td>
                                <td>
                                    <p>NaN</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Each Box contains</span>
                                </td>
                                <td>
                                    <p>NaN</p>
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
            </div>
        </div>
    </section>
    <section class="product_description_area mt-2 d-none d-xl-block">
        <div class="container container-home bg-white">
            <div>
                <div class="row mt-3 ml-3">
                    <div class="col-lg-12">
                        <div class="row total_rate">
                            <div class="col-6">
                                <div class="box_total">
                                    <h4>Ratings & Reviews</h4>
                                    <div class="d-flex align-items-center"><h1>4.0</h1><h5>/5.0</h5></div>
                                    <div style="color:#FBD600;font-size:50px">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                    </div>
                                    <h6>(03 Reviews)</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <h4 class="mb-4">Based on 121 Reviews</h4>
                                <div class="d-flex align-items-center">
                                    <div style="color:#FBD600">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                    </div>
                                    <div class="col-4">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;background-color:#FBD600" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">60</div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" d-flex align-items-center" >
                                    <div style="color:#FBD600">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="col-4">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;background-color:#FBD600" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">30</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center" >
                                    <div style="color:#FBD600">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="col-4">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;background-color:#FBD600" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">20</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center" >
                                    <div style="color:#FBD600">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="col-4">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;background-color:#FBD600" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">10</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center" >
                                    <div style="color:#FBD600">
                                        <i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="col-4">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%;background-color:#FBD600" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">01</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review_list mt-4">
                            <h4 class="mb-4">Product Reviews</h4>
                            <div class="review_item pb-2" style="border-bottom:solid 1px #dddddd">
                                <div class="media">
                                    <div class="media-body">
                                        <span>Blake Ruiz</span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <pstyle="color:#000">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo</p>
                                <small>Size:Medium</small>
                            </div>
                            <div class="review_item pb-2" style="border-bottom:solid 1px #dddddd">
                                <div class="media">
                                    <div class="media-body">
                                        <span>Blake Ruiz</span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p style="color:#000">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                                <small>Size:Large</small>
                            </div>
                            <div class="review_item pb-2" style="border-bottom:solid 1px #dddddd">
                                <div class="media">
                                    <div class="media-body">
                                        <span>Blake Ruiz</span>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <p style="color:#000">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                                <small>Size:Medium</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Product Description Area =================-->

    <!--================ Start related Product area =================-->
    <section class="related-product-area section-margin--small mt-0 d-none d-xl-block">
        <div class="container">
            <div class="section-intro pb-60px">
                {{-- <p>Popular Item in the market</p> --}}
                <h2>From Same Seller</h2>
            </div>
            <div class="row">
                @foreach($related as $relateds)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card card-product">
                            <div class="card-product__img">
                                @if($relateds->image()->first())
                                    <img class="card-img" src="{{asset('storage/'.$relateds->image()->first()->image)}}" alt="">
                                @endif
                            </div>
                            <div class="card-body">

                                <!-- <p ><a href="#" class="text-primary"></a></p> -->
                                <h4 class="card-product__title"><a class="title" href="{{route('product.show',['product'=>$relateds->id])}}">{{$relateds->name}}</a></h4>
                                <p class="card-product__price price">RM {{$relateds->list_price_on_store}}</p>
                                <div class="d-flex align-items-center mb-1">
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
    <section class="related-product-area section-margin--small mt-0 d-none d-xl-block">
        <div class="container">
            <div class="section-intro pb-60px">
                {{-- <p>Popular Item in the market</p> --}}
                <h2>You May Also Like</h2>
            </div>
            <div class="row">
               @foreach($otherProduct as $otherProduct)
                <div class="col-sm-3 col-4 m-auto">
                    <div class="card card-product" >
                        <div class="card-product__img text-center">
                            @if($otherProduct->image()->first())
                                <img
                                    src="{{asset('storage/'.$otherProduct->image()->first()->image)}}"
                                    class="card-img" style="height:210px;object-fit:contain"/>
                            @else
                                <img
                                    src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                    class="card-img" style="height:210px;object-fit:contain"/>
                            @endif
                        </div>
                        <div class="card-body p-3 ">
                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">{{$otherProduct->mainCategory()->first() ? $otherProduct->mainCategory()->first()->name :''}}</p>
                            <h4 class="card-blog__title"><a href="{{route('showProduct',['id'=>$otherProduct->id])}}" class="title">{{$otherProduct->name}}</a></h4>
                            <div class="d-flex justify-content-between">
                                <!--  <a class="card-blog_link hover-black" href="#">Read More</a>--><h5 class="card-blog_price price">RM{{$otherProduct->list_price_on_store}}</h5>
                            </div>
                            <div class="d-flex align-items-center mb-1">
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
               
            </div>
        </div>
    </section>
	<div class="d-block d-sm-none"><div style="display: block; height: 60px;"></div></div>
    <nav class="footer-mobile fixed-bottom d-block d-sm-none">
        <div class="d-flex justify-content-around">
            <a class="text-center" href="http://206.189.144.207"><img class="tabbar-item-icon" src="{{asset('img/lifecarelogo.png')}}" alt=""><span class="d-block" style="font-size: 10px">Home</span></a>
            <a class="text-center" href="http://http://206.189.144.207/shop?id=7"><img class="tabbar-item-icon" src="{{asset('img/categories.png')}}" alt=""><span class="d-block" style="font-size: 10px">Categories</span></a>
            <a class="text-center" href="{{route('cart.index')}}"><img class="tabbar-item-icon" src="{{asset('img/cart.png')}}" alt=""><span class="d-block" style="font-size: 10px">Cart</span></a>
            <a class="text-center" href="{{route('profile.index')}}"><img class="tabbar-item-icon" src="{{asset('img/user.png')}}" alt=""><span class="d-block" style="font-size: 10px">Account</span></a>

        </div>
    </nav>
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
