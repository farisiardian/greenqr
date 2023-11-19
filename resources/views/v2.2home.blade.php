@extends('layouts.app')
@section('addstyle')
    <style>
        .card{
            border: 0px;
        }
        .card-title {
            font-size: 9px;

        }
        .card-title a{
            color: #384AEB !important;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .card-header {
            background-color: white;
            border-bottom: none !important;
        }

        .card-header h4{
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            color: #384AEB !important;
            text-transform: uppercase;
            margin-top: 10px;
        }

        #categories .owl-prev,
        #categories .owl-next {
            width: 20px;
            height: 20px;
            background: #384aeb;
            border-radius: 50%;
            /* background: #f1f6f7 */
        }

        #categories .owl-prev i,
        #categories .owl-prev span,
        #categories .owl-next i,
        #categories .owl-next span {
            font-size: 10px;
            color: #f1f6f7;
            /* line-height: 1px */
            display: flex;
            align-items: center;
            text-align: center;
            padding: 5px 5px 5px 5px;
        }

        #categories .owl-prev:hover,
        #categories .owl-next:hover {
            background: #384aeb
        }

        #categories .owl-prev:hover i,
        #categories .owl-prev:hover span,
        #categories .owl-next:hover i,
        #categories .owl-next:hover span {
            color: #fff
        }

        #categories .owl-prev {
            position: absolute;
            top: 30%;
            transform: translateY(-30%);
            left: -20px
        }

        /* @media (min-width: 1340px) {
            #categories .owl-prev {
                left: -105px
            }
        } */

        #categories .owl-next {
            position: absolute;
            top: 30%;
            transform: translateY(-30%);
            right: -20px
        }

        /* @media (min-width: 1340px) {
            #categories .owl-next {
                right: -105px
            }
        } */
        .card-product-mb{
            border: solid 1px #DADADA;
            margin: 0px 0px 10px 0px;
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
        .ribbon {
            position: absolute;
            right: -5px;
            top: -5px;
            z-index: 1;
            overflow: hidden;
            width: 50px;
            height: 50px;
            text-align: right;
        }
        .ribbon span {
            font-size: 0.8rem;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
            line-height: 32px;
            transform: rotate(45deg);
            width: 125px;
            display: block;
            background: #79a70a;
            background: linear-gradient(#9bc90d 0%, #79a70a 100%);
            box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
            position: absolute;
            top: 17px; // change this, if no border
        right: -29px; // change this, if no border
        }

        .ribbon span::before {
            content: '';
            position: absolute;
            left: 0px; top: 100%;
            z-index: -1;
            border-left: 3px solid #79A70A;
            border-right: 3px solid transparent;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #79A70A;
        }
        .ribbon span::after {
            content: '';
            position: absolute;
            right: 0%; top: 100%;
            z-index: -1;
            border-right: 3px solid #79A70A;
            border-left: 3px solid transparent;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #79A70A;
        }

        .red span {
            background: linear-gradient(#f70505 0%, #8f0808 100%);
        }
        .red span::before {
            border-left-color: #8f0808;
            border-top-color: #8f0808;
        }
        .red span::after {
            border-right-color: #8f0808;
            border-top-color: #8f0808;
        }

        .blue span {
            background: linear-gradient(#2989d8 0%, #1e5799 100%);
        }
        .blue span::before {
            border-left-color: #1e5799;
            border-top-color: #1e5799;
        }
        .blue span::after {
            border-right-color: #1e5799;
            border-top-color: #1e5799;
        }

        .foo {
            clear: both;
        }

        .bar {
            content: "";
            left: 0px;
            top: 100%;
            z-index: -1;
            border-left: 3px solid #79a70a;
            border-right: 3px solid transparent;
            border-bottom: 3px solid transparent;
            border-top: 3px solid #79a70a;
        }

        .baz {
            font-size: 1rem;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
            line-height: 2em;
            transform: rotate(45deg);
            width: 100px;
            display: block;
            background: #79a70a;
            background: linear-gradient(#9bc90d 0%, #79a70a 100%);
            box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
            position: absolute;
            top: 100px;
            left: 1000px;
        }


    </style>
@endsection
@section('content')

    {{-- Desktop View --}}
    <section class="pb-60px d-none d-xl-block ">
        <div class="container-fluid mb-3 ">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($banner as $key => $banners)
                                <li data-target="#header-carousel" data-slide-to="{{$key}}" @if($key==0) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($banner as $key => $banners)
                                <div class="carousel-item @if($key==0) active @endif" >
                                    <img class="carousel-caption-img" src="{{asset('storage/'.$banners->image)}}" >
                                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
				<div class="col-lg-4">
                    <div class="product-offer mb-3">
                        <img class="img-fluid" src="{{asset('img/carousel-2.jpg')}}" alt="">
                    </div>
                    <div class="product-offer mb-3">
                        <img class="img-fluid" src="{{asset('img/carousel-5.jpg')}}" alt="">
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    {{-- <a href="{{route('viewvendor')}}" class="hover-black text-white">vendor view</a> --}}
    {{-- Mobile View --}}
    <section class="mt-3 d-block d-sm-none ">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-12">
                    <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0 " data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($banner as $key => $banners)
                                <li data-target="#header-carousel" data-slide-to="{{$key}}"@if($key==0) class="active" @endif></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($banner as $key => $banners)
                                <div class="carousel-item position-relative carousel-item-size @if($key==0) active @endif">
                                    <img class="carousel-caption-img rounded" src="{{asset('storage/'.$banners->image)}}">
                                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Desktop View --}}
    <section class="d-none d-xl-block">
        <div class="container container-home bg-white">
            <div class="section-intro pb-60px d-flex justify-content-between align-items-center ml-3 mr-3">
                <h2>Popular Categories</h2>
{{--                <a href="http://206.189.144.207/shop?id=7">View All</a>--}}
            </div>
            <div class="row px-2">
				<div class="owl-carousel owl-theme px-2" id="categories1">
                    @foreach($category as $categorys)
                        <div class="card-categories-li hp-mod-card-hover align-left">
                            <div class="card-categories-image-container">
                                <img  class="image" src="{{asset('storage/'.$categorys->image)}}" alt="">
                            </div>
                            <div class="card-categories-name">
                                <p class="title">
                                    <a href="{{route('shop').'?id='.$categorys->id}}">{!! $categorys->name !!}</a></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>
    {{-- Mobile View --}}
    <section class="section-categories d-block d-sm-none">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="">Popular Categories</h4>
                </div>
                <div class="card-body">
                    <div class="owl-carousel owl-theme" id="categories">
                        @foreach($category as $categorys)
                            <div class="item">
                                <div class="card">

                                    <div class="card-content rounded-circle" style="border: solid 1px #DADADA; height: 64px !important; width: 64px !important;">
                                        <img class="card-img-top img-fluid p-2" src="{{asset('storage/'.$categorys->image)}}"/>
                                    </div>
                                    <div class="card-title text-center">
                                        <a href="{{route('shop').'?id='.$categorys->id}}" class="hover-black">{!! $categorys->name !!}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center card-title">
                        <a href="http://206.189.144.207/shop?id=7">View All ></a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- Desktop View --}}
    <section class="section-margin d-none d-xl-block">
        <div class="container container-home p-0">
            <div class="blog-banner-area">
                <img class="carousel-caption-img" style="border-radius:10px " src="{{asset('img/carousel-1.jpg')}}" alt="" >
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="background-color:#384AEB;width:60px;height:60px;border-radius:100px">
                    <i class="fa fa-angle-right" style="font-size:60px"></i>
                </div>
            </div>
        </div>
    </section>

    {{-- Mobile View --}}
    <section class="section-margin d-block d-sm-none">
        <div class="container-fluid">
            <div class="owl-carousel owl-theme" id="banner-carousel">
                <div class="item">
                    <img class="carousel-caption-img" style="border-radius:10px " src="{{asset('img/carousel-1.jpg')}}" alt="" >
                </div>
            </div>
        </div>
    </section>


    <!--================ Popular Product =================-->
    {{--Dekstop View--}}
    <section class="section-margin d-none d-xl-block">
        <div class="container container-home bg-white">
            <div class="section-intro pb-60px d-flex justify-content-between align-items-center ml-3 mr-3">
                <h2 class="d-none d-xl-block">Popular Product</h2>
{{--                <a href="http://206.189.144.207/shop?id=7">View All</a>--}}
            </div>
            {{--@foreach($package as $packages)--}}
            <div class="row">
                @foreach($popularProducts as $popularProduct)
                <div class="col-sm-3 col-4">
                    <div class="card card-product" >
                        <div class="card-product__img text-center">
                            @if($popularProduct->image()->first())
                                <img
                                    src="{{asset('storage/'.$popularProduct->image()->first()->image)}}"
                                    class="card-img" style="height:210px;object-fit:contain"/>
                            @else
                                <img
                                    src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                    class="card-img" style="height:210px;object-fit:contain"/>
                            @endif
                        </div>
                        <div class="card-body p-3 ">
                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">{{$popularProduct->category_name}}</p>
                            <h4 class="card-blog__title">
                                <a href="{{route('showProduct',['id'=>$popularProduct->id])}}" class="title">{{$popularProduct->product_name}}</a>
                            </h4>
                            <div class="d-flex justify-content-between">
                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>-->
                                <h5 class="card-blog__price price">RM {{$popularProduct->product_price}}</h5>
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="" >--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/Pillow1.png')}}" alt="" >--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Medical Supplies</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/25" class="title">Posture Align Therapeutic Pillow - Premium Soft</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM240.00</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/Slides1.png')}}" alt="">--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Medical Supplies</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/28" class="title">ICB Orthotic Slides</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM350.00</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/Orthotic1.png')}}" alt="" >--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Medical Supplies</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/29" class="title">ICB Dual Density Orthotics</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM400.00</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/SAVE_20221006_163551.jpg')}}" alt="">--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Healthy Food</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/30" class="title">Sumo Pasta</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM17.50</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="" >--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/SAVE_20221006_163555.jpg')}}" alt="">--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Healthy Food</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/31" class="title">Thai Thai Tilapia</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM16.50</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/SAVE_20221006_163543.jpg')}}" alt="" >--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Healthy Food</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/32" class="title">Nasi tak Lemak</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM18.50</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/SAVE_20221006_163600.jpg')}}" alt="">--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Healthy Food</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/33" class="title">Atlantic Bowl</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>-->--}}
{{--                                <h5 class="card-blog__price price">RM20.50</h5>--}}
{{--                                <h5 class="card-blog__price before">RM15.00</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
{{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                <small>(99)</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
            {{--@endforeach--}}

        </div>
    </section>
    {{--Mobile View--}}
    <section class="section-categories d-block d-sm-none">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="">Popular Product</h4>
                </div>
                <div class="card-body pr-1">
                    <div class="owl-carousel owl-theme" id="productpopular">
                        <div class="item ">
                            @foreach($popularProducts as $popularProduct)
                            <div class="card card-product-mb">
                                <div class="card-content text-center">
                                    <div class="ribbon red"><span>Sale</span></div>
                                    <img class="card-img-top img-fluid " src="{{asset('img/product/Orthopedic.png')}}"/>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate">{{$popularProduct->category_name}}</a>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate-name">{{$popularProduct->product_name}}</a>
                                </div>

                                <div class="text-center">
                                    <span class="card-title-product-cate-price-before">RM{{$popularProduct->product_price}}</span>
                                    <span class="card-title-product-cate-price">RM15.00</span>
                                </div>
                            </div>
                            @endforeach
{{--                            <div class="card card-product-mb">--}}
{{--                                <div class="card-content text-center">--}}
{{--                                    <img class="card-img-top img-fluid " src="{{asset('img/product/Pillow1.png')}}"/>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <a href="" class="card-title-product-cate">Medical Supplies</a>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <a href="http://206.189.144.207/product/25" class="card-title-product-cate-name">Posture Align Therapeutic Pillow - Premium Soft</a>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <span class="card-title-product-cate-price-before">RM20.50</span>--}}
{{--                                    <span class="card-title-product-cate-price">RM15.00</span>--}}
{{--                                </div>--}}


{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="item ">--}}
{{--                            <div class="card card-product-mb">--}}
{{--                                <div class="card-content text-center">--}}
{{--                                    <div class="ribbon red"><span>Sale</span></div>--}}
{{--                                    <img class="card-img-top img-fluid " src="{{asset('img/product/Slides1.png')}}"/>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <a href="" class="card-title-product-cate">Medical Supplies</a>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <a href="http://206.189.144.207/product/26" class="card-title-product-cate-name">Posture Align Orthopedic Lumbar Support</a>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <span class="card-title-product-cate-price-before">RM20.50</span>--}}
{{--                                    <span class="card-title-product-cate-price">RM15.00</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card card-product-mb">--}}
{{--                                <div class="card-content text-center">--}}
{{--                                    <img class="card-img-top img-fluid " src="{{asset('img/product/SAVE_20221006_163543.jpg')}}"/>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <a href="" class="card-title-product-cate">Medical Supplies</a>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <a href="http://206.189.144.207/product/25" class="card-title-product-cate-name">Posture Align Therapeutic Pillow - Premium Soft</a>--}}
{{--                                </div>--}}
{{--                                <div class="text-center">--}}
{{--                                    <span class="card-title-product-cate-price-before">RM20.50</span>--}}
{{--                                    <span class="card-title-product-cate-price">RM15.00</span>--}}
{{--                                </div>--}}
                            </div>
                        </div>


                    </div>
                    <div class="text-center card-title">
                        <a href="#">View All ></a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--================ Hero Carousel end =================-->



    <!-- ================ Best Selling item  carousel ================= -->
    {{--    Desktop View--}}
    <section class="section-margin d-none d-xl-block">
        <div class="container container-home bg-white">
            <div class="section-intro pb-60px d-flex justify-content-between align-items-center ml-3 mr-3">
                {{-- <p>Shop Popular Supplement</p> --}}
                <h2  class="d-none d-xl-block">Popular Shop</h2>

                <a href="http://206.189.144.207/shop?id=7">View All</a>
            </div>
            <div class="row d-flex justify-content-center">
                @foreach($popularShops as $popularShop)
                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">
                    <div class="card-shop-image-container d-flex align-items-center">
                        <img  class="img-fluid" src=" src="{{asset('storage/'.$popularShop->profile_image)}}" alt="">
                    </div>
                    <div class="card-shop-name">
                        <h4 class="card-blog__title">
                            <a href="{{route('shop.show',['id'=>$popularShop->id])}}" class="hover-black">{{$popularShop->name}}</a></h4>
                    </div>
                </div>
                @endforeach
{{--                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">--}}
{{--                    <div class="card-shop-image-container d-flex align-items-center">--}}
{{--                        <img  class="img-fluid" src="{{asset('img/product/LIGHTHEAL.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="card-shop-name">--}}
{{--                        <h4 class="card-blog__title">--}}
{{--                            <a href="http://206.189.144.207/shop/14" class="hover-black">LightHeal</a></h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">--}}
{{--                    <div class="card-shop-image-container d-flex align-items-center">--}}
{{--                        <img  class="img-fluid" src="{{asset('img/vendor/lunavieLogo.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="card-shop-name">--}}
{{--                        <h4 class="card-blog__title">--}}
{{--                            <a href="http://206.189.144.207/shop/14" class="hover-black">Lunavie</a></h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">--}}
{{--                    <div class="card-shop-image-container d-flex align-items-center">--}}
{{--                        <img  class="img-fluid" src="{{asset('img/product/urban.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="card-shop-name">--}}
{{--                        <h4 class="card-blog__title">--}}
{{--                            <a href="http://206.189.144.207/shop/14" class="hover-black">Urban Retreat</a></h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">--}}
{{--                    <div class="card-shop-image-container d-flex align-items-center">--}}
{{--                        <img  class="img-fluid" src="{{asset('img/product/checkpoint.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="card-shop-name">--}}
{{--                        <h4 class="card-blog__title">--}}
{{--                            <a href="http://206.189.144.207/shop/14" class="hover-black">CheckPoint Restaurant</a></h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row d-flex justify-content-center">--}}
{{--                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">--}}
{{--                    <div class="card-shop-image-container d-flex align-items-center">--}}
{{--                        <img  class="img-fluid" src="{{asset('img/product/posturealign.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="card-shop-name">--}}
{{--                        <h4 class="card-blog__title">--}}
{{--                            <a href="http://206.189.144.207/shop/14" class="hover-black">Posture Align</a></h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">--}}
{{--                    <div class="card-shop-image-container d-flex align-items-center">--}}
{{--                        <img  class="img-fluid" src="{{asset('img/product/LIGHTHEAL.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="card-shop-name">--}}
{{--                        <h4 class="card-blog__title">--}}
{{--                            <a href="http://206.189.144.207/shop/14" class="hover-black">LightHeal</a></h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">--}}
{{--                    <div class="card-shop-image-container d-flex align-items-center">--}}
{{--                        <img  class="img-fluid" src="{{asset('img/vendor/lunavieLogo.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="card-shop-name">--}}
{{--                        <h4 class="card-blog__title">--}}
{{--                            <a href="http://206.189.144.207/shop/14" class="hover-black">Lunavie</a></h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">--}}
{{--                    <div class="card-shop-image-container d-flex align-items-center">--}}
{{--                        <img  class="img-fluid" src="{{asset('img/product/urban.png')}}" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="card-shop-name">--}}
{{--                        <h4 class="card-blog__title">--}}
{{--                            <a href="http://206.189.144.207/shop/14" class="hover-black">Urban Retreat</a></h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="card-shop-li hp-mod-card-hover align-left col-sm-2 col-4 col-lg-2">
                    <div class="card-shop-image-container d-flex align-items-center">
                        <img  class="img-fluid" src="{{asset('img/product/checkpoint.png')}}" alt="">
                    </div>
                    <div class="card-shop-name">
                        <h4 class="card-blog__title">
                            <a href="http://206.189.144.207/shop/14" class="hover-black">CheckPoint Restaurant</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--    Mobile View--}}
    <section class="section-categories d-block d-sm-none">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="">Popular Shop</h4>
                </div>
                <div class="card-body pr-1">
                    <div class="owl-carousel owl-theme" id="popularshop">

                        <div class="item ">
                            <div class="card card-product-mb">
                                <div class="card-content text-center">
                                    <img class="card-img-top img-fluid" src="{{asset('img/vendor/lunavieLogo.png')}}" style="width: 99px; height: 90px;"/>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate">Lunavie</a>
                                </div>


                            </div>
                            <div class="card card-product-mb">
                                <div class="card-content text-center">
                                    <img class="card-img-top img-fluid" src="{{asset('img/product/LIGHTHEAL.png')}}" style="width: 99px; height: 90px;"/>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate">LightHeal</a>
                                </div>


                            </div>
                        </div>
                        <div class="item ">
                            <div class="card card-product-mb">
                                <div class="card-content text-center">

                                    <img class="card-img-top img-fluid " src="{{asset('img/product/checkpoint.png')}}" style="width: 99px; height: 90px;"/>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate">CheckPoint Restaurant</a>
                                </div>

                            </div>
                            <div class="card card-product-mb">
                                <div class="card-content text-center">
                                    <img class="card-img-top img-fluid " src="{{asset('img/product/urban.png')}}" style="width: 99px; height: 90px;"/>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate">Urban Retreat</a>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="text-center card-title">
                        <a href="#">View All ></a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- ================ Best Selling item  carousel end ================= -->
{{--    Desktop View--}}
    <section class="section-margin d-none d-xl-block">
        <div class="container container-home p-0">
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-banner-home" style="height:200px">
                        <img class="carousel-caption-img" style="border-radius:10px; " src="{{asset('img/carousel-1.jpg')}}" alt="" >

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-banner-home" style="height:200px">
                        <img class="carousel-caption-img" style="border-radius:10px" src="{{asset('img/carousel-1.jpg')}}" alt="" >

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-banner-home" style="height:200px">
                        <img class="carousel-caption-img" style="border-radius:10px" src="{{asset('img/carousel-1.jpg')}}" alt="" >

                    </div>
                </div>
            </div>

        </div>
    </section>

{{-- Mobile View--}}
    <section class="section-margin d-block d-sm-none">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="blog-banner-home" style="height:100px">
                        <img class="carousel-caption-img" style="border-radius:20px; " src="{{asset('img/carousel-1.jpg')}}" alt="" >
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="blog-banner-home" style="height:100px">
                        <img class="carousel-caption-img" style="border-radius:20px; " src="{{asset('img/carousel-1.jpg')}}" alt="" >
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <div class="blog-banner-home" style="height:100px">
                        <img class="carousel-caption-img" style="border-radius:20px; " src="{{asset('img/carousel-1.jpg')}}" alt="" >
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================ Just For You  carousel Start ================= -->
{{--    Desktop View--}}
    <section class="section-margin d-none d-xl-block">
        <div class="container container-home bg-white">
            <div class="section-intro pb-60px ml-3 mr-3">

                <h2  class="d-none d-xl-block"> Just For You</h2>
            </div>
            <div class="row">
                @foreach($products as $product_list)
{{--                @foreach($products->limit('8') as $key=>$product_list)--}}
                    <div class="col-sm-3 col-4">
                    <div class="card card-product" >
                        <div class="card-product__img text-center">
                            @if($product_list->image()->first())
                                <img
                                    src="{{asset('storage/'.$product_list->image()->first()->image)}}"
                                    class="card-img" style="height:210px;object-fit:contain"/>
                            @else
                                <img
                                    src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"
                                    class="card-img" style="height:210px;object-fit:contain"/>
                            @endif
                        </div>
                        <div class="card-body p-3 ">
                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">{{$product_list->category_name}}</p>
                            <h4 class="card-blog__title">
                                <a href="{{route('showProduct',['id'=>$product_list->id])}}" class="title">{{$product_list->product_name}}</a>
                            </h4>
                            <div class="d-flex justify-content-between">
                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>-->
                                <h5 class="card-blog__price price">RM{{$product_list->product_price}}</h5>
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
{{--                @foreach($products1 as $product_list)--}}
{{--                        <div class="col-sm-3 col-4 m-auto">--}}
{{--                            <div class="card card-product" >--}}
{{--                                <div class="card-product__img text-center">--}}
{{--                                    @if($product_list->image()->first())--}}
{{--                                        <img--}}
{{--                                            src="{{asset('storage/'.$product_list->image()->first()->image)}}"--}}
{{--                                            class="d-block rounded"--}}
{{--                                            height="100"--}}
{{--                                            width="100"/>--}}
{{--                                    @else--}}
{{--                                        <img--}}
{{--                                            src="{{asset('admin/assets/img/products/Iberet-Folic-500.jpg')}}"--}}
{{--                                            class="d-block rounded"--}}
{{--                                            height="100"--}}
{{--                                            width="100"/>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="card-body p-3 ">--}}
{{--                                    <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">{{$product_list->category_name}}</p>--}}
{{--                                    <h4 class="card-blog__title"><a href="http://206.189.144.207/product/26" class="title">{{$product_list->product_name}}</a></h4>--}}
{{--                                    <div class="d-flex justify-content-between">--}}
{{--                                        <!--  <a class="card-blog__link hover-black" href="#">Read More</a>-->--}}
{{--                                        <h5 class="card-blog__price price">RM{{$product_list->product_price}}</h5>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex align-items-center mb-1">--}}
{{--                                        <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                        <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                        <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                        <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                        <small class="fa fa-star btn-star mr-1"></small>--}}
{{--                                        <small>(99)</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/Slides1.png')}}" alt="">--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Medical Supplies</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/28" class="title">ICB Orthotic Slides</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM350.00</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/Orthotic1.png')}}" alt="" >--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Medical Supplies</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/29" class="title">ICB Dual Density Orthotics</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM400.00</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/SAVE_20221006_163551.jpg')}}" alt="">--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Healthy Food</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/30" class="title">Sumo Pasta</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM17.50</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="" >--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/SAVE_20221006_163555.jpg')}}" alt="">--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Healthy Food</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/31" class="title">Thai Thai Tilapia</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM16.50</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img " src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/SAVE_20221006_163543.jpg')}}" alt="" >--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Healthy Food</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/32" class="title">Nasi tak Lemak</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>--><h5 class="card-blog__price price">RM18.50</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
{{--                <div class="col-sm-3 col-4 m-auto">--}}
{{--                    <div class="card card-product" >--}}
{{--                        <div class="card-product__img text-center">--}}

{{--                            --}}{{--@if($packages->image()->first())--}}
{{--                            --}}{{--<img class="card-img" src="{{asset('storage/'.$packages->image()->first()->image)}}" alt="">--}}
{{--                            --}}{{--@else--}}
{{--                            <img class="card-img" src="{{asset('img/product/SAVE_20221006_163600.jpg')}}" alt="">--}}
{{--                            --}}{{--@endif--}}
{{--                        </div>--}}
{{--                        <div class="card-body p-3">--}}
{{--                            <p class="title text-truncate" style="margin-top: 0; margin-bottom: 1rem;">Healthy Food</p>--}}
{{--                            <h4 class="card-blog__title"><a href="http://206.189.144.207/product/33" class="title">Atlantic Bowl</a></h4>--}}
{{--                            <div class="d-flex justify-content-between">--}}
{{--                                <!--  <a class="card-blog__link hover-black" href="#">Read More</a>-->--}}
{{--                                <h5 class="card-blog__price price">RM20.50</h5>--}}
{{--                                <h5 class="card-blog__price before">RM15.00</h5>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex align-items-center mb-1">--}}
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
            <div class=" card-load-more text-center">
                <a class="button hover-black" href="http://206.189.144.207/allproduct">Load More</a>
            </div>
        </div>
    </section>

{{--Mobile View--}}
    <section class="section-categories d-block d-sm-none">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="">Just For You</h4>
                </div>
                <div class="card-body pr-1">
                    <div class="owl-carousel owl-theme" id="justforyou">

                        <div class="item ">
                            <div class="card card-product-mb">
                                <div class="card-content text-center">
                                    <img class="card-img-top img-fluid " src="{{asset('img/product/Orthopedic.png')}}"/>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate">Medical Supplies</a>
                                </div>
                                <div class="text-center">
                                    <a href="http://127.0.0.1:8000/product/26" class="card-title-product-cate-name">Posture Align Orthopedic Lumbar Support</a>
                                </div>
                                <div class="text-center">
                                    <span class="card-title-product-cate-price-before">RM20.50</span>
                                    <span class="card-title-product-cate-price">RM15.00</span>
                                </div>

                            </div>
                            <div class="card card-product-mb">
                                <div class="card-content text-center">
                                    <img class="card-img-top img-fluid " src="{{asset('img/product/Pillow1.png')}}"/>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate">Medical Supplies</a>
                                </div>
                                <div class="text-center">
                                    <a href="http://127.0.0.1:8000/product/25" class="card-title-product-cate-name">Posture Align Therapeutic Pillow - Premium Soft</a>
                                </div>
                                <div class="text-center">
                                    <span class="card-title-product-cate-price-before">RM20.50</span>
                                    <span class="card-title-product-cate-price">RM15.00</span>
                                </div>


                            </div>
                        </div>
                        <div class="item ">
                            <div class="card card-product-mb">
                                <div class="card-content text-center">
                                    <img class="card-img-top img-fluid " src="{{asset('img/product/Slides1.png')}}"/>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate">Medical Supplies</a>
                                </div>
                                <div class="text-center">
                                    <a href="http://206.189.144.207/product/26" class="card-title-product-cate-name">Posture Align Orthopedic Lumbar Support</a>
                                </div>
                                <div class="text-center">
                                    <span class="card-title-product-cate-price-before">RM20.50</span>
                                    <span class="card-title-product-cate-price">RM15.00</span>
                                </div>
                            </div>
                            <div class="card card-product-mb">
                                <div class="card-content text-center">
                                    <img class="card-img-top img-fluid " src="{{asset('img/product/SAVE_20221006_163543.jpg')}}"/>
                                </div>
                                <div class="text-center">
                                    <a href="" class="card-title-product-cate">Medical Supplies</a>
                                </div>
                                <div class="text-center">
                                    <a href="http://206.189.144.207/product/25" class="card-title-product-cate-name">Posture Align Therapeutic Pillow - Premium Soft</a>
                                </div>
                                <div class="text-center">
                                    <span class="card-title-product-cate-price-before">RM20.50</span>
                                    <span class="card-title-product-cate-price">RM15.00</span>
                                </div>


                            </div>
                        </div>


                    </div>
                    <div class="text-center">
                        <a class="btn" href="">Load More</a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- ================ Just For You  carousel end ================= -->


    {{--@guest--}}

    <!-- ================ Subscribe section start ================= -->
    {{-- <section class="subscribe-position">
        <div class="container">
            <div class="subscribe text-center">
                <h3 class="subscribe__title">Make Appointment</h3>
                <p>Bearing Void gathering light light his eavening unto dont afraid</p>
                <div id="mc_embed_signup">

                    <a class="button button-subscribe mr-auto mb-1 hover-black" href="{{route('register')}}" type="submit">Register Now</a>



                </div>

            </div>
        </div>
    </section> --}}
    {{--<section class="blog-banner-area" id="appointment">
        <div class="container">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Make Appointment Now</h1>
                    <p class="text-primary">Schedule an appointment now with a doctor or specialist.</p>
                    <div class=" card-load-more text-center">
                        <a class="button hover-black" href="{{route('register')}}" type="submit">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!-- ================ Subscribe section end ================= -->


    {{--@else


    <!-- ================ Upcoming Event start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro">
                <!-- <p>Popular Item in the market</p> -->
                <h2  class="d-none d-xl-block"> Upcoming <span class="section-intro__style"> Appointment</span></h2>

                <h4 class="d-block d-sm-none text-white">Upcoming Appointment</h4>
                <div class="text-right">
                    <span class="see-more d-block d-sm-none">View More ></span>
                </div>

            </div>


            <div class="owl-carousel owl-theme" id="upcomingAppointment">
                <div class="card card-product">
                    <div class="card-product__img text-center">
                        <img class="card-img p-3" src="{{asset('img/blog/team-1.jpg')}}" alt=""style="border-radius: 10px 10px 0 0">
                    </div>
                    <div class="card-body p-3">
                        <ul class="card-blog__info">
                            <li><a href="#" class="hover-black text-white"><i class="ti-calendar"></i>12 Oct 2022</a></li>
                            <li><a href="#" class="hover-black text-white"><i class="ti-time"></i> 10:00 - 10:30 am</a></li>
                        </ul>
                        <h4 class="card-blog__title"><a href="#" class="hover-black text-white">Dr. Ong Kee Liang / 王琪量 医生 </a></h4>
                        <p class="text-white">Consultant Physician & Nephrologist.</p>
                    </div>
                </div>



                <div class="card card-product">
                    <div class="card-product__img text-center">
                        <img class="card-img p-3" src="{{asset('img/blog/team-2.jpg')}}" alt="" style="border-radius: 10px 10px 0 0">
                    </div>
                    <div class="card-body p-3">
                        <ul class="card-blog__info">
                            <li><a href="#" class="hover-black text-white "><i class="ti-calendar"></i>12 Oct 2022</a></li>
                            <li><a href="#" class="hover-black text-white"><i class="ti-time"></i> 10:00 - 10:30 am</a></li>
                        </ul>
                        <h4 class="card-blog__title"><a href="#" class="hover-black text-white">Dr. Ong Kee Liang / 王琪量 医生 </a></h4>
                        <p class="text-white">Consultant Physician & Nephrologist.</p>
                    </div>
                </div>



                <div class="card card-product">
                    <div class="card-product__img text-center">
                        <img class="card-img p-3" src="{{asset('img/blog/team-3.jpg')}}" alt="" style="border-radius: 10px 10px 0 0">
                    </div>
                    <div class="card-body p-3">
                        <ul class="card-blog__info">
                            <li><a href="#" class="hover-black text-white"><i class="ti-calendar"></i>12 Oct 2022</a></li>
                            <li><a href="#" class="hover-black text-white"><i class="ti-time"></i> 10:00 - 10:30 am</a></li>
                        </ul>
                        <h4 class="card-blog__title"><a href="#" class="hover-black text-white">Dr. Ong Kee Liang / 王琪量 医生 </a></h4>
                        <p class="text-white">Consultant Physician & Nephrologist.</p>
                    </div>
                </div>

                <div class="card card-product">
                    <div class="card-product__img text-center">
                        <img class="card-img p-3" src="{{asset('img/blog/team-3.jpg')}}" alt="" style="border-radius: 10px 10px 0 0">
                    </div>
                    <div class="card-body p-3">
                        <ul class="card-blog__info">
                            <li><a href="#" class="hover-black text-white"><i class="ti-calendar"></i>12 Oct 2022</a></li>
                            <li><a href="#" class="hover-black text-white"><i class="ti-time"></i> 10:00 - 10:30 am</a></li>
                        </ul>
                        <h4 class="card-blog__title"><a href="#" class="hover-black text-white">Dr. Ong Kee Liang / 王琪量 医生 </a></h4>
                        <p class="text-white">Consultant Physician & Nephrologist.</p>
                    </div>
                </div>


            </div>
            <div class="text-center">
                <a class="view-more hover-black text-white" href="{{route('appointment')}}">View All <i class="ti-angle-double-right"></i></a>
            </div>
        </div>
    </section>
    <!-- ================ Upcoming Event end ================= -->
@endguest--}}



@endsection

@section('script')

    <script src="{{asset('vendors/nice-select/jquery.nice-select.min.js')}}"></script>
    <script>

        if($('.owl-carousel').length > 0){
            $('#categories').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-control-backward'></i>","<i class='ti-control-forward'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:4,
                        loop:true,
                        margin:10

                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3
                    },
                    1130:{
                        items:4
                    }
                }
            })
        }
		if($('.owl-carousel').length > 0){
            $('#categories1').owlCarousel({
                loop:true,
                nav:true,
                navText: ["<i class='ti-control-backward'></i>","<i class='ti-control-forward'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:4,
                        loop:true,

                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3
                    },
                    1130:{
                        items:7
                    }
                }
            })
        }
        if($('.owl-carousel').length > 0){
            $('#banner-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-control-backward'></i>","<i class='ti-control-forward'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:1,
                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3
                    },
                    1130:{
                        items:4
                    }
                }
            })
        }
        if($('.owl-carousel').length > 0){
            $('#productpopular').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-control-backward'></i>","<i class='ti-control-forward'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:3,
                        center:true,
                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3
                    },
                    1130:{
                        items:4
                    }
                }
            })
        }
        if($('.owl-carousel').length > 0){
            $('#popularshop').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-control-backward'></i>","<i class='ti-control-forward'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:3,
                        center:true,
                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3
                    },
                    1130:{
                        items:4
                    }
                }
            })
        }
        if($('.owl-carousel').length > 0){
            $('#justforyou').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                navText: ["<i class='ti-control-backward'></i>","<i class='ti-control-forward'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:3,
                        center:true,
                    },
                    600:{
                        items: 3
                    },
                    900:{
                        items:3
                    },
                    1130:{
                        items:4
                    }
                }
            })
        }

        if($('.owl-carousel').length > 0){
            $('#popularpackageCarousel').owlCarousel({
                loop:true,
                margin:30,
                nav:true,
                navText: ["<i class='ti-arrow-left'></i>","<i class='ti-arrow-right'></i>"],
                dots: false,
                responsive:{
                    0:{
                        items:2,
                        nav:false,
                        // dots:true
                    },
                    600:{
                        items: 2
                    },
                    900:{
                        items:2
                    },
                    1130:{
                        items:3
                    }
                }
            })
        }
    </script>
@endsection
