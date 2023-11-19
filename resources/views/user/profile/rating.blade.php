@extends('layouts.app')

@section('content')
    <!--================Blog Area =================-->
    <section class="setting-area">
        <div class="container">
            <div class="row">

                @include('user.profile.tabbar')

                <div class="col-lg-9 posts-list">
                    <div class="comment-rating">
                        <h4>Ratings</h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        <hr>
                        <div class="mt-3">
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/p1.jpg" alt="" width="80px" height="80px">
                                    </div>
                                    <div class="media-body">
                                        <h4>Iberet Folic 500 (30’s)</h4>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fas fa-star-half-alt btn-star"></i>
                                        <i class="far fa-star btn-star"></i>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo</p>
                            </div>
                            <hr>
                            <div class="review_item">
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="img/product/p2.jpg" alt="" width="80px" height="80px">
                                    </div>
                                    <div class="media-body">
                                        <h4>Iberet Folic 500 (30’s)</h4>
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

                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
@endsection
