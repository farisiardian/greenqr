<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1, user-scalable=no"">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - GreenQr</title>
    <link rel="icon" href="{{asset('img/greenqr-icon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('vendors/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
{{--    <link rel="stylesheet" href="{{asset('css/style1.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/style.css')}}">--}}

<!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jquery.raty.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vertical-menu.css')}}">
	<script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>

    <style>
	.main-container{
	overflow: scroll;
	overflow-x:hidden;
	-webkit-overflow-scrolling: touch;
	height:100%
	}
    body {
    /* color: #777; */
    background: #FFFFFF !important;
    /* background-repeat: no-repeat; */
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    font-size: 15px;
    font-weight: 400;
    line-height: 1.667;
    height: 100%;
    margin: 0;
    background-repeat: no-repeat;
    background-attachment: fixed;
	}
	@media (min-width: 1280px) {
		.site-main {
			width: 1280px;
			margin: 0 auto;
		}
	}

	.container-home{
        padding: 20px 30px;
        border-radius: 10px
    }
	
	
	.container-banner{
        padding: 20px 30px;
    }

        .username-text{
            max-width: 120px;
        }
        .panel-group .panel {
            border-radius: 0;
            box-shadow: none;
            border-color: #EEEEEE;
        }

        .panel-default > .panel-heading {
            padding: 0;
            border-radius: 0;
            color: #212121;
            background-color: #FAFAFA;
            border-color: #EEEEEE;
        }

        .panel-title {
            font-size: 14px;
        }

        .panel-title > a {
            display: block;
            padding: 15px;
            text-decoration: none;
        }

        .more-less {
            float: right;
            color: #212121;
        }

        .panel-default > .panel-heading + .panel-collapse > .panel-body {
            border-top-color: #EEEEEE;
        }
        .returning_customer p  a {
            color: #384aeb;
            text-decoration: underline;
        }

        .button-pay {
            border: 1px solid #384aeb !important;
            border-radius: 30;
            padding: 11px 26px;
        }


        .modal-backdrop {
            z-index: 100000 !important;
        }

        .modal {
            z-index: 100001 !important;
        }
        .comment-profile {
            background: #ffffff33;
          border-radius: 10px;
          box-shadow: 0 4px 30px #0000001a;
          backdrop-filter: blur(5px);
          -webkit-backdrop-filter: blur(5px);
          padding: 47px 30px 43px;
          margin-top: 0px !important;
          margin-bottom: 20px
        }


        .comment-profile .name {
            padding-left: 0px
        }

        @media (max-width: 767px) {
            .comment-profile .name {
                padding-right: 0px;
                margin-bottom: 1rem
            }
        }

        .comment-profile .email {
            padding-right: 0px
        }

        @media (max-width: 991px) {
            .comment-profile .email {
                padding-left: 0px
            }
        }

        .comment-profile .form-control {
            padding: 8px 20px;
            background: rgb(255, 255, 255);
            /* border: none; */
            border-radius: 0px;
            border: 1px solid #ccd6e6;
            width: 100%;
            font-size: 14px;
            color: #777777;
            /* border: 1px solid transparent */
        }


        .comment-profile .form-control:focus {
            box-shadow: none;
            border: 1px solid #384aeb
        }

        .comment-profile .form-control::placeholder {
            color: #777777
        }

        .comment-profile textarea.form-control {
            height: 140px;
            resize: none
        }

        .comment-profile ::-webkit-input-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-profile ::-moz-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-profile :-ms-input-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-profile :-moz-placeholder {
            font-size: 13px;
            color: #777
        }
        /* div {
          position: relative;
          overflow: hidden;
        } */
        .file input {
            position: absolute;
            font-size: 50px;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .img-profile{
            height: 6.25rem;
            width: 6.25rem;
            border-radius: 50%;
            background: #efefef;
            overflow: hidden;
            position: relative;
        }
        .img-file {
            margin-top: 0.75rem;
            display: block;
        }
        .img-file-desc {
            color: #999;
            font-size: .875rem;
            line-height: 1.25rem;
        }

        .img-button {
            padding: 0.75rem 1rem;
            font-size: 1rem;
            line-height: 1.25;
            border-radius: 0.25rem;
            position: relative;
            overflow: hidden;
        }
        .setting-area .col-lg-4 {
            margin-top: 10px
        }
        .setting-area {
            padding-top: 20px;
            padding-bottom: 20px
        }

        @media (min-width: 900px) {
            .setting-area {
                padding-top: 80px;
                padding-bottom: 80px
            }
        }

        @media (min-width: 1100px) {
            .setting-area {
                padding-top: 20px;
                padding-bottom: 20px
            }
        }
        .content-address {
            background: #ffffff33;
          border-radius: 10px;
          box-shadow: 0 4px 30px #0000001a;
          backdrop-filter: blur(5px);
          -webkit-backdrop-filter: blur(5px);
            padding: 30px 30px;
            margin-top: 0px !important;
            margin-bottom: 20px
        }


        .content-address .name {
            padding-left: 0px
        }

        @media (max-width: 767px) {
            .content-address .name {
                padding-right: 0px;
                margin-bottom: 1rem
            }
        }

        .content-address .email {
            padding-right: 0px
        }

        @media (max-width: 991px) {
            .content-address .email {
                padding-left: 0px
            }
        }

        .content-address .form-control {
            padding: 8px 20px;
            background: rgb(255, 255, 255);
            /* border: none; */
            border-radius: 0px;
            border: 1px solid #ccd6e6;
            width: 100%;
            font-size: 14px;
            color: #777777;
            /* border: 1px solid transparent */
        }

        .content-address .form-control:focus {
            box-shadow: none;
            border: 1px solid #384aeb
        }

        .content-address .form-control::placeholder {
            color: #777777
        }

        .content-address textarea.form-control {
            height: 140px;
            resize: none
        }

        .content-address ::-webkit-input-placeholder {
            font-size: 13px;
            color: #777
        }

        .content-address ::-moz-placeholder {
            font-size: 13px;
            color: #777
        }

        .content-address :-ms-input-placeholder {
            font-size: 13px;
            color: #777
        }

        .content-address :-moz-placeholder {
            font-size: 13px;
            color: #777
        }
        .comment-purchase {
          background: #ffffff33;
          border-radius: 10px;
          box-shadow: 0 4px 30px #0000001a;
          backdrop-filter: blur(5px);
          -webkit-backdrop-filter: blur(5px);
          padding: 30px 30px;
          margin-top: 0px !important;
          margin-bottom: 20px
   }

.comment-purchase .name {
	padding-left: 0px
}

@media (max-width: 767px) {
	.comment-purchase .name {
		padding-right: 0px;
		margin-bottom: 1rem
	}
}

.comment-purchase .email {
	padding-right: 0px
}

@media (max-width: 991px) {
	.comment-purchase .email {
		padding-left: 0px
	}
}

.comment-purchase .form-control {
	padding: 8px 20px;
	background: rgb(255, 255, 255);
	/* border: none; */
	border-radius: 0px;
  border: 1px solid #ccd6e6;
	width: 100%;
	font-size: 14px;
	color: #777777;
	/* border: 1px solid transparent */
}

.comment-purchase .form-control:focus {
	box-shadow: none;
	border: 1px solid #384aeb
}

.comment-purchase .form-control::placeholder {
	color: #777777
}

.comment-purchase textarea.form-control {
	height: 140px;
	resize: none
}

.comment-purchase ::-webkit-input-placeholder {
	font-size: 13px;
	color: #777
}

.comment-purchase ::-moz-placeholder {
	font-size: 13px;
	color: #777
}

.comment-purchase :-ms-input-placeholder {
	font-size: 13px;
	color: #777
}

.comment-purchase :-moz-placeholder {
	font-size: 13px;
	color: #777
}
        .comment-rating {
            background: #ffffff;
            /* text-align: center; */
            border: 1px solid #eee;
            padding: 30px 30px;
            margin-top: 0px !important;
            margin-bottom: 20px
        }


        .comment-rating .name {
            padding-left: 0px
        }

        @media (max-width: 767px) {
            .comment-rating .name {
                padding-right: 0px;
                margin-bottom: 1rem
            }
        }

        .comment-rating .email {
            padding-right: 0px
        }

        @media (max-width: 991px) {
            .comment-rating .email {
                padding-left: 0px
            }
        }

        .comment-rating .form-control {
            padding: 8px 20px;
            background: rgb(255, 255, 255);
            /* border: none; */
            border-radius: 0px;
            border: 1px solid #ccd6e6;
            width: 100%;
            font-size: 14px;
            color: #777777;
            /* border: 1px solid transparent */
        }

        .comment-rating .form-control:focus {
            box-shadow: none;
            border: 1px solid #384aeb
        }

        .comment-rating .form-control::placeholder {
            color: #777777
        }

        .comment-rating textarea.form-control {
            height: 140px;
            resize: none
        }

        .comment-rating ::-webkit-input-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-rating ::-moz-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-rating :-ms-input-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-rating :-moz-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-vourcher {
            background: #ffffff33;
            border-radius: 10px;
          box-shadow: 0 4px 30px #0000001a;
          backdrop-filter: blur(5px);
          -webkit-backdrop-filter: blur(5px);
          padding: 30px 30px 30px;
            padding: 30px 30px 30px;
            margin-top: 0px !important;
            margin-bottom: 20px
        }




        .comment-vourcher .name {
            padding-left: 0px
        }

        @media (max-width: 767px) {
            .comment-vourcher .name {
                padding-right: 0px;
                margin-bottom: 1rem
            }
        }

        .comment-vourcher .email {
            padding-right: 0px
        }

        @media (max-width: 991px) {
            .comment-vourcher .email {
                padding-left: 0px
            }
        }

        .comment-vourcher .form-control {
            padding: 8px 20px;
            background: rgb(255, 255, 255);
            /* border: none; */
            border-radius: 0px;
            border: 1px solid #ccd6e6;
            width: 100%;
            font-size: 14px;
            color: #777777;
            /* border: 1px solid transparent */
        }

        .comment-vourcher .form-control:focus {
            box-shadow: none;
            border: 1px solid #384aeb
        }

        .comment-vourcher .form-control::placeholder {
            color: #777777
        }

        .comment-vourcher textarea.form-control {
            height: 140px;
            resize: none
        }

        .comment-vourcher ::-webkit-input-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-vourcher ::-moz-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-vourcher :-ms-input-placeholder {
            font-size: 13px;
            color: #777
        }

        .comment-vourcher :-moz-placeholder {
            font-size: 13px;
            color: #777
        }

        .coupon {
            border-radius: 12px;
            box-shadow: 5px 8px 10px #d6d5d533;
            /* border-style: solid; */
        }

        .couponbody {
            background: #384aeb
        }
        .code {
            border:solid 1px #274439;
            color: rgb(255, 255, 255);

        }

        .code:hover {
            background: transparent;
            color: #384aeb;
            cursor: pointer
        }
        .btn-star {
            color: #1FA33D !important;
        }

        .card-product__title a{
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .product_text {
            color: #555;
            -webkit-text-fill-color: #555
        }
        .vourcher_area {
            /* Style */
            height: 40px;
            line-height: 40px;
            background: #f1f6f7;
            color: #222;
            font-family: "Roboto", sans-serif;
            font-size: 15px;
            font-weight: normal;
            padding: 10px 30px;
            box-sizing: border-box;
            margin-bottom: 0px;
            /* Actual logic */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vourcher_area div:last-child {
            text-align: right;
        }

        .vourcher_area div {
            flex: 1 1 auto;
        }

        .KqH1Px {
    padding-top: 15px;
    display: grid;
    grid-template-columns: 1fr -webkit-max-content -webkit-max-content;
    grid-template-columns: 1fr max-content max-content;
    grid-template-rows: auto;
    grid-column-gap: 10px;
}
        .lhwDvd {
            font-size: 14px;
            display: flex;
            align-items: center;
        }
        .c5Dezq {
            grid-row-start: 11;
            grid-row-end: 12;
        }
        @media (min-width: 991px) {
        .Exv9ow {
            grid-column-start: 1;
            grid-column-end: 4;
            /* -ms-grid-column-span: 1; */
        }
    }
        .Uu2y3K {
            padding: 0 10px;
            height: 40px;
            min-width: 100px;
            grid-column-start: 3;
            grid-column-end: 4;
			color:#000;
            /* -ms-grid-column-span: 1; */
            justify-content: flex-end;
        }
        .B6k-vE {
            grid-row-start: 12;
            grid-row-end: 13;
        }
        .D6k-vE {
            grid-row-start: 14;
            grid-row-end: 15;
        }
        .A4gPS6 {
            grid-row-start: 17;
            grid-row-end: 18;
        }
        .\+0tdvp {
            height: 50px;
            font-size: 28px;
            color: #384aeb;
        }
        .Ql2fz0 {
            grid-column-start: 1;
            grid-column-end: 4;
            -ms-grid-column-span: 3;
            grid-row-start: 32;
            grid-row-end: 33;
            -ms-grid-row-span: 1;
            min-height: 95px;
            padding: 0 30px;
            margin: 10px 0 0;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            border-top: 1px dashed rgba(0,0,0,.09);
        }
        .FXKjae {
            padding: 40px 25px 32px 0;
            flex: 1;
        }

        .cupon_area {
            margin-bottom: 10px
        }

        .cupon_area input {
            margin-left:0px;
			margin-right:0px;
            width: auto;
            display: block;
            height: 40px;
            border-radius: 30px;
            padding: 0px 10px 0 18px;
            border: 1px solid #eeeeee;
            outline: none;
            box-shadow: none;
            font-size: 14px;
            font-weight: normal;
        }

    /* .bodybackground{
    background: rgb(33,150,243);
    background: linear-gradient(117.64deg, rgba(33,150,243,1) 0%, rgba(244,67,54,1) 100%);
} */

	
	.card-shop-li {
        width: 20%;
        height: auto;

    }
    .align-left {
        float: left;
    }
	.card-shop-image-container {
		border-radius:50px;
		width: 60px;
		height:60px;

    }

	.card-shop-image-container:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		border-radius:50px;
    }
	card-shop-image-container.image{
		object-contain:cover
	}

    .card-categories-li-content {
        width: 100%;
        height: 100%;
        display: block;
        padding-top: 16px;
    }
	.card-shop-li-content {
        width: 100%;
        height: 100%;
        display: block;
        padding-top: 16px;
    }

    @media (max-width: 441px) {

		.card-categories-li {
			width:12.5%;
			height: auto;
		border-right: 1px solid #e2e2e2;
		border-bottom: 1px solid #e2e2e2;
		background-color: #fff;
		padding-top: 20px;
		padding-bottom: 10px;
		}
		.card-shop-li {
		width:12.5%;
		height: auto;
		border-right: 1px solid #e2e2e2;
		border-bottom: 1px solid #e2e2e2;
		background-color: #fff;
		padding-top: 20px;
		padding-bottom: 10px;
		}

		.card-categories-image-container {
			margin: 0 auto;
			width: 40px;
			height: 40px;
		}
		.card-shop-image-container {
			margin: 0 auto;
			width: 40px;
			height: 40px;

		}

		.card-blog__title {
			font-family: -apple-system, BlinkMacSystemFont, sans-serif;
			font-weight: 600;
			font-size: 16px;
			color: #1D1D1D;
		}

		.card-categories-li-content {
			width: 100%;
			height: 100%;
			display: block;
			padding-top: 10px;
		}
		.card-shop-li-content {
			width: 100%;
			height: 100%;
			display: block;
			padding-top: 10px;
		}

		.card-blog__link {
			font-size: 12px;

		}

		.cart_area {
		padding-top: 0px;
		padding-bottom: 0px
		}

    }

    .card-product {
		margin-bottom: 30px;
		width: 266px;
		height: 269px;
	}
	.card-product__img{
		width: 266px;
		height: 266px;
		border: 1px solid #DDDDDD;
		border-radius: 10px;
	}

	
	
	.card-cate{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		font-weight: 500;
		font-size: 12px;
		color: #696A6A;
		display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
	}
	.title{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		font-weight: 600;
		font-size: 16px;
		color: #1D1D1D;
		display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
	}
	.substitle{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		font-weight: 500;
		font-size: 14px;
		color: #161617;
	}
	.price{
		font-family: -apple-system, BlinkMacSystemFont, sans-serif;
		font-weight: 600;
		font-size: 12px;
		color: #242323;
	}
	.before{
		color:#777777 !important;
		font-weight:900;
		font-size:20px;
		text-decoration:line-through
	}

#popularpackageCarousel .owl-prev,
#popularpackageCarousel .owl-next {
	width: 40px;
	height: 40px;
	background: #f1f6f7
}

#popularpackageCarousel .owl-prev i,
#popularpackageCarousel .owl-prev span,
#popularpackageCarousel .owl-next i,
#popularpackageCarousel .owl-next span {
	font-size: 15px;
	color: #384aeb;
	line-height: 40px
}

#popularpackageCarousel .owl-prev:hover,
#popularpackageCarousel .owl-next:hover {
	background: #384aeb
}

#popularpackageCarousel .owl-prev:hover i,
#popularpackageCarousel .owl-prev:hover span,
#popularpackageCarousel .owl-next:hover i,
#popularpackageCarousel .owl-next:hover span {
	color: #fff
}

#popularpackageCarousel .owl-prev {
	position: absolute;
	top: 30%;
	transform: translateY(-30%);
	left: -20px
}

@media (min-width: 1340px) {
	#popularpackageCarousel .owl-prev {
		left: -105px
	}
}

#popularpackageCarousel .owl-next {
	position: absolute;
	top: 30%;
	transform: translateY(-30%);
	right: -20px
}

@media (min-width: 1340px) {
	#popularpackageCarousel .owl-next {
		right: -105px
	}
}

.footer-area-home  {
	background-color: #274439;
	padding: 20px 0px 20px
}
    @media (min-width: 1000px) {
	.footer-area-home {
		padding: 100px 0px 100px
	}

}
	.blog-banner-home{
		width: 100%;
        height: 100%;
	}
	.blog-banner-home:hover{
		border-radius:10px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

	}
	.sidebar-cat:active{
		color:#384aeb

	}
	.sidebar-cat:hover{
		color:#384aeb

	}
.blog-banner-area::after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("img/home/appointment.png")center no-repeat !important;
            background-size: cover !important;
            z-index: -1
        }
		
        .product_description_area .tab-content {
            padding: 30px 30px 15px 30px !important;
	margin-top: 20px !important;
	background: #ffffff33 !important;
	border-radius: 10px !important;
	box-shadow: 0 4px 30px #0000001a !important;
	backdrop-filter: blur(5px) !important;
	-webkit-backdrop-filter: blur(5px) !important
}
.product_description_area .tab-content .total_rate .box_total h5 {
	color: #ffffff !important;
	margin-bottom: 0px;
	font-size: 24px
}

.card-info {
	background: #ffffff33 !important;
	border-radius: 10px !important;
	box-shadow: 0 4px 30px #0000001a !important;
	backdrop-filter: blur(5px) !important;
	-webkit-backdrop-filter: blur(5px) !important;
}
.c-title{
    border-radius: 10px 10px 0 0;
}
.check-address{
    background: #ffffff33;
    border-radius: 0 0 10px 10px;
    box-shadow: 0 4px 30px #0000001a;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    padding-top: 20px;
padding-bottom:20px
}

.sidebar-categories .main-categories {
	
	font-family: -apple-system, BlinkMacSystemFont, sans-serif;
	padding: 10px 10px;
	margin-right: 7px;
	background: #f1f6f7;
}

.comment-purchase .nav.nav-tabs li:last-child {
	margin-right: 0px
}

@media (max-width: 441px) {
	.comment-purchase .nav.nav-tabs li:last-child {
		margin-top: 15px
	}
}

	background-color:transparent
}
.comment-purchase .nav.nav-tabs {
	background: transparent;
	text-align: center;
	display: block;
	border: none;
	padding: 10px 0px
}

.comment-purchase .nav.nav-tabs li {
	display: inline-block;
.comment-purchase .nav.nav-tabs li a {
	padding: 0px;
	line-height: 38px;
	background: #fff;
	border: 1px solid #eeeeee;
	border-radius: 30px;
	padding: 0px 30px;
	color: #222;
	font-size: 14px;
	font-weight: normal
}

@media (max-width: 570px) {
	.comment-purchase .nav.nav-tabs li a {
		padding: 0 15px
	}
}

.comment-purchase .nav.nav-tabs li a.active {
	color: #fff;
	background: #384aeb;
	border-color: #384aeb
}
.tab-content-purchase {
    /* border-left: 1px solid #eee;
    border-right: 1px solid #eee;
    border-bottom: 1px solid #eee; */
    padding: 30px 30px 15px 30px !important
}
.cardPurchase{
    background: rgba(255, 255, 255, 0.79);
    border-radius: 10px;
    box-shadow: 0 4px 30px #0000001a;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
}
/* banner css */
.carousel {
        position: relative;
      }

      .carousel.pointer-event {
        touch-action: pan-y;
      }

      .carousel-inner {
        position: relative;
        width: 100%;
        overflow: hidden;
      }

      .carousel-inner::after {
        display: block;
        clear: both;
        content: "";
      }

      .carousel-item {
        position: relative;
        display: none;
        float: left;
        width: 100%;
        margin-right: -100%;
        backface-visibility: hidden;
        transition: transform 0.6s ease-in-out;
      }


      @media (prefers-reduced-motion: reduce) {
        .carousel-item {
          transition: none;
        }
      }

      .carousel-item.active,
      .carousel-item-next,
      .carousel-item-prev {
        display: block;
      }

      .carousel-item-next:not(.carousel-item-left),
      .active.carousel-item-right {
        transform: translateX(100%);
      }

      .carousel-item-prev:not(.carousel-item-right),
      .active.carousel-item-left {
        transform: translateX(-100%);
      }

      .carousel-fade .carousel-item {
        opacity: 0;
        transition-property: opacity;
        transform: none;
      }

      .carousel-fade .carousel-item.active,
      .carousel-fade .carousel-item-next.carousel-item-left,
      .carousel-fade .carousel-item-prev.carousel-item-right {
        z-index: 1;
        opacity: 1;
      }

      .carousel-fade .active.carousel-item-left,
      .carousel-fade .active.carousel-item-right {
        z-index: 0;
        opacity: 0;
        transition: opacity 0s 0.6s;
      }

      @media (prefers-reduced-motion: reduce) {
        .carousel-fade .active.carousel-item-left,
        .carousel-fade .active.carousel-item-right {
          transition: none;
        }
      }

      .carousel-control-prev,
      .carousel-control-next {
        position: absolute;
        top: 0;
        bottom: 0;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 15%;
        color: #fff;
        text-align: center;
        opacity: 0.5;
        transition: opacity 0.15s ease;
      }

      @media (prefers-reduced-motion: reduce) {
        .carousel-control-prev,
        .carousel-control-next {
          transition: none;
        }
      }

      .carousel-control-prev:hover, .carousel-control-prev:focus,
      .carousel-control-next:hover,
      .carousel-control-next:focus {
        color: #fff;
        text-decoration: none;
        outline: 0;
        opacity: 0.9;
      }

      .carousel-control-prev {
        left: 0;
      }

      .carousel-control-next {
        right: 0;
      }

      .carousel-control-prev-icon,
      .carousel-control-next-icon {
        display: inline-block;
        width: 20px;
        height: 20px;
        background: no-repeat 50% / 100% 100%;
      }

      .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3e%3c/svg%3e");
      }

      .carousel-control-next-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3e%3c/svg%3e");
      }

      .carousel-indicators {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 15;
        display: flex;
        justify-content: center;
        padding-left: 0;
        margin-right: 15%;
        margin-left: 15%;
        list-style: none;
      }

      .carousel-indicators li {
        box-sizing: content-box;
        flex: 0 1 auto;
        width: 30px;
        height: 3px;
        margin-right: 3px;
        margin-left: 3px;
        text-indent: -999px;
        cursor: pointer;
        background-color: #fff;
        background-clip: padding-box;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        opacity: .5;
        transition: opacity 0.6s ease;
      }

      @media (prefers-reduced-motion: reduce) {
        .carousel-indicators li {
          transition: none;
        }
      }

      .carousel-indicators .active {
        opacity: 1;
      }

      .carousel-caption {
        position: absolute;
        bottom: 170px;
        left: 97%;
        z-index: 10;
        padding-top: 20px;
        padding-bottom: 20px;
        color: #fff;
        text-align: center;
      }

      .carousel-caption-img{
        width: 100%;
        height: 100%;
      }

      .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    /* height: 0px; */
    background-color: #ffffff;
    /* border-radius: 30px; */
    /* padding: 0px; */
    border:1px solid #384aeb

    }

    .search_input{
    border: 0;
    outline: 0;
    background: none;
    line-height: 29px;
    padding: 0 10px;
    /* width: 200px; */
    caret-color:red;
    transition: width 0.4s linear;
    }

    .search_icon{
    color: white;
    background: #384aeb;
    height: 30px;
    width: 30px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    /* border-radius: 50%; */
    /* color:white; */
    text-decoration:none;
    }

    .search-cart{
    line-height: 29px;
    padding: 10px;
    /* color: white;
    background: #384aeb;
    border-radius: 50%; */
    }

    .search-cart i, .search-cart span {
    font-size: 18px;
    color: #384aeb
}
   .search-cart__circle {
    font-size: 9px;
    display: inline-block;
    /* background: #384aeb; */
    color: #384aeb;
    padding: 0px 5px;
    border-radius: 50%;
    position: absolute;
    top: 13px;
    /* right: -12px */
}

.site-main{
    padding-bottom: 0px !important;

}


@media (max-width: 441px) {
    .site-main{
    padding-top: 0px ;
    padding-bottom: 10px;

   }
   .section-categories{
    margin:20px 0px 20px 0px;
   }
   .title-product{
    font-size: 18px;
    font-weight: 100px !important;
    /* text-align: center!important; */
    color: white;

   }
   .see-more{
    font-size: 10px;
    color: white;

   }
   .card-blog__title {
    /* font-size: 10px; */
    margin-bottom: 1px
    }


    }

      .card-categories {
        /* width: 16.5%; */
        /* height: auto; */
        /* border-right: 1px solid #e2e2e2; */
        /* border-bottom: 1px solid #e2e2e2; */
        background-color: #fff;
        padding: 10px;
        border-radius: 10%;
        /* padding-bottom: 10px; */

    }
    @media (min-width: 1000px){
        .section-intro  {
    padding-bottom: 60px;
    }

}
    .container-home{
        padding: 20px;
        border-radius: 10px
    }
	
	.container-banner{
        padding-top: 20px;
        border-radius: 10px
    }
	
	.filter-bar-search{
		background-color:#EFF0F5;
	}
	.filter-bar-search button i{
		font-size:20px
	}

    .footer-mobile {
        background-color: #ffffff;
        padding: 10px;

    }
    .h2-tabbar {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background-color: #fff;
        padding: 20px;
    }
    .tabbar-item {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -ms-flex-preferred-size: 1px;
        flex-basis: 1px;
    }
    .tabbar-item-icon {
        height: 6.4vw;
        vertical-align: middle;
        overflow: hidden;
    }
	
	#button {
  display: inline-block;
  background-color: #FF9800;
  width: 50px;
  height: 50px;
  text-align: center;
  border-radius: 4px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: background-color .3s, 
    opacity .5s, visibility .5s;
  opacity: 0;
  visibility: hidden;
  z-index: 1000;
}
#button::after {
  content: "\f077";
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  font-size: 2em;
  line-height: 50px;
  color: #fff;
}
#button:hover {
  cursor: pointer;
  background-color: #333;
}
#button:active {
  background-color: #555;
}
#button.show {
  opacity: 1;
  visibility: visible;
}
/* Styles for the content section */

.content {
  width: 77%;
  margin: 50px auto;
  font-family: 'Merriweather', serif;
  font-size: 17px;
  color: #6c767a;
  line-height: 1.9;
}
@media (min-width: 500px) {
  .content {
    width: 43%;
  }
  #button {
    margin: 30px;
  }
}
.content h1 {
  margin-bottom: -10px;
  color: #03a9f4;
  line-height: 1.5;
}
.content h3 {
  font-style: italic;
  color: #96a2a7;
}

  .bold {
    font-weight: bold !important;
  }

	.vertical-line {
  width: 1px;
  height: 18px;
  background-color: #008000;
  display: inline-block;
  margin: 0 8px;
}

    </style>
@yield('addstyle')
</head>
<body>
	
	

{{-- <div id="app" class="main-container"> --}}

    <div class="d-none d-xl-block">
		<nav class="navbar py-3 navbar-expand-lg border-bottom d-flex align-items-center" style="background-color:#274439">
			<div style="width: 1280px;
			margin: 0 auto;">
        
				<p style="margin-bottom:0;font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#ffffff">&nbsp&nbsp&nbsp&nbsp&nbsp;</p>
			</div>
		</nav>
	</div>
	
	<!--================ Mobile View  =================-->
	<nav class="navbar border-bottom justify-content-center d-flex align-items-center d-block d-sm-none" style="background-color:#274439">
		<div class="d-flex align-items-center justify-content-center" style="padding:13px 0">
			<p class="text-center m-0" style="font-size:10px;font-family: -apple-system, BlinkMacSystemFont, sans-serif;color:#ffffff">Free Standard Shipping on purchases RM200 or more. Terms apply.</p>
		</div>
    </nav>
    <header class="header_area">
        <div class="main_menu">
			<!--================ Mobile View  =================-->
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-lg-3 py-3 d-block d-sm-none"
                <div class="container">
					<form class="form col-lg-12 col-md-6 col-sm-8 " method="get" action="{{route('shop')}}">
                    <div class="d-flex justify-content-between ">
                        
						<div class="dropdown d-flex align-items-center m-0">
							<a role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-bars" style="color:#274439"></i>
							</a>
							<div class="dropdown-menu px-2" style="min-width:12rem">
								<ul class="nav navbar-nav menu_nav ml-auto mr-auto">
									<li class="nav-item"><a href="#" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #274439;" class="nav-link">Customer Care</a></li>
									<li class="nav-item"><a href="#" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #274439;" class="nav-link">Sell on LifeCare Hub</a></li>
								</ul>
							</div>
						</div>
						
						<div class="dropdown d-flex align-items-center m-0">
							<a role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-search" style="color:#274439"></i>
							</a>
						
							<div class="dropdown-menu p-0" >
								<div class="d-flex align-items-center" style="margin-bottom: auto;margin-top: auto;background-color: #ffffff;border:1px solid #274439">
									<input class="search_input" style="border: 0;outline: 0;background: none;line-height: 29px;padding: 0 10px; caret-color:red;transition: width 0.4s linear;" type="text" name="search" placeholder="Search...">
									<button type="submit" class="search_icon" style="color: white;background: #274439;height: 30px;width: 38px;float: right;display: flex;justify-content: center;align-items: center;text-decoration:none;"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</div>
						
						
						
						<a class="navbar-brand logo_h mr-0" href="{{route('/')}}"><img src="{{asset('img/greenQR_brand.png')}}" alt=""  height="30px"></a>
						
						<div class="d-flex justify-content-end" id="navbarToggler">
					<div  class="row ">
							@guest
								@if (Route::has('login'))
								<div class="nav-item d-flex align-items-center"><a href="{{ route('login') }}" class="nav-link" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 17px;color: #274439;"> <i class="fa fa-user"></i></a></div>
								<div class="nav-item d-flex align-items-center"><a href="{{ route('login') }}" class="nav-link " style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 17px;color: #274439;"><i class="fa fa-heart"></i></a></div>
								@endif
								@else
								{{--<li class="nav-item"><a href="{{route('mypurchase.index')}}" class="nav-link link-dark hover-black px-lg-3">TRACK MY ORDER</a></li>--}}
								<div class="nav-item"><a href="{{route('profile.index')}}" class="nav-link " style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 17px;color: #274439;"><i class="fa fa-user"></i></a></div>
								<div class="nav-item d-flex align-items-center"><a href="#" class="nav-link " style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 17px;color: #274439;"><i class="fa fa-heart "></i></a></div>
								@endif
								<div class="nav-item" >
									<a class="nav-link" href="{{route('cart.index')}}" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 17px;color: #274439;"><i class="fa fa-shopping-cart "></i> 
									@guest 
									@else 
									@if(Auth::user()->cart()->where('sold', 0)->sum('quantity')) 
									<small class="ml-1"><span style="color:#1FA33D" class="nav-shop__circle position-absolute">
											({{Auth::user()->cart()->where('sold', 0)->sum('quantity')}})
										</span></small>
									@endif @endguest
									</a>
							</div>
						</ul>
                    </div>
						
						
						{{--<div class="searchbar align-self-center" style="margin-bottom: auto;margin-top: auto;background-color: #ffffff;border:1px solid #384aeb">
                        <input class="search_input" style="border: 0;outline: 0;background: none;line-height: 29px;padding: 0 10px; caret-color:red;transition: width 0.4s linear;" type="text" name="search" placeholder="Search...">
                        <button type="submit" class="search_icon" style="color: white;background: #384aeb;height: 30px;width: 38px;float: right;display: flex;justify-content: center;align-items: center;text-decoration:none;"><i class="fas fa-search"></i></button>
						</div>--}}

                    </div>
					</form>



                </div>
                </nav>
			<!--================ Desktop View  =================-->
			<div class="d-none d-xl-block">
            <nav class="navbar navbar-expand-lg d-flex align-items-center justify-content-center bg-white navbar-light py-lg-3 d-none d-xl-block">
                <div class="row d-flex align-items-center justify-content-between" style="width: 1280px;margin: 0 auto;">
					<div class="col-lg-2 col-md-2 col-sm-8">
						<a class="navbar-brand logo_h " href="{{route('/')}}"><img src="../../img/greenQR_brand.png" alt=""  height="40px"></a>
					</div>
					 <div class="collapse navbar-collapse col-lg-3 col-md-4 col-sm-8">
							<!--ul class="navbar-nav mt-2 mt-lg-0">
								<li class="nav-item"><a href="#" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;" class="nav-link">Customer Care</a></li>
								<li class="nav-item"><a href="#" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;" class="nav-link">Sell on LifeCare Hub</a></li>
							</ul-->				
					</div>
                    <div class="collapse navbar-collapse col-lg-4 col-md-4 col-sm-8" id="search-toggler">
                        <div class="navbar-nav" style="width:100%">
                            <form class="form" style="width:100%" method="get" action="{{route('shop')}}">
                                <div class="input-group input-group-lg filter-bar-search mt-0">
								  <input type="text" class="form-control border-0 bg-transparent" style="border-radius: 20px;" name="search" placeholder="Search" aria-label="Search">
								  <div class="input-group-append">
									<button type="submit" class="bg-transparent d-flex align-items-center justify-content-center" style="border-radius: 0 20px 0; background-color: #274439 !important; border: none;">
									  <i class="fa fa-search" style="color: white !important;"></i>
									</button>
								  </div>
								</div>
                            </form>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse col-lg-3 col-md-4 col-sm-8 d-flex justify-content-end" id="navbarToggler">
						
						
						
						<ul class="navbar-nav mt-2 mt-lg-0 ">
							<li class="nav-item">
							  <a id="cart-link" class="nav-link" href="{{route('cart.index')}}" style="font-family:-apple-system,BlinkMacSystemFont,sans-serif;font-weight:{{ Auth::check() && Auth::user()->cart()->where('sold', 0)->sum('quantity') != null ? 'bold' : 'normal' }};font-size:14px;color:#274439;">
								<b>
								  <i class="fa fa-shopping-cart fa-lg mr-2"></i>
								</b>
								 <span class="vertical-line"></span>
								@guest 
								@else 
								@if(Auth::check() && Auth::user()->cart() && Auth::user()->cart()->where('sold', 0)->sum('quantity')) 
								<span style="color: {{ Auth::user()->cart()->where('sold', 0)->sum('quantity') > 0 ? '#1FA33D' : 'black' }}; margin-left: 5px;" class="nav-shop__circle">
								  ({{Auth::user()->cart()->where('sold', 0)->sum('quantity')}})
								</span> 
								@endif
								@endguest
							  </a>
							</li>

							@guest
								@if (Route::has('login'))
								<li class="nav-item d-flex align-items-center">
								  <a href="{{ route('login') }}" class="nav-link" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif; font-weight: 500; font-size: 14px;">
									<span class="rounded-box" style="background-color: #D0D0D0; display: inline-flex; align-items: center; padding: 8px; border-radius: 20px; margin-right: 8px;">
									  <i class="fa fa-user" style="color: #274439; margin-right: 4px;"></i>
									  <b style="color: #274439; line-height: 1;">Sign In</b>
									</span>
								  </a>
								</li>
								<li hidden class="nav-item d-flex align-items-center"><a hidden href="{{ route('login') }}" class="nav-link " style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;"><i hidden class="fa fa-heart mr-2"></i>Favorite</a></li>
								@endif
								@else
								{{--<li class="nav-item"><a href="{{route('mypurchase.index')}}" class="nav-link link-dark hover-black px-lg-3">TRACK MY ORDER</a></li>--}}
								<li class="nav-item"><a href="{{route('profile.index')}}" class="nav-link " style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;"><i class="fa fa-user mr-2"></i>Account</a></li>
								<li class="nav-item d-flex align-items-center"><a href="{{route('chatify')}}" class="nav-link " style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;"><i class="fa fa-chat mr-2"></i>Chat</a></li>
								@endif
								
						</ul>
                    </div>
                </div>
            </nav>
			</div>
			{{-- Tab View --}}
			<div class="d-none d-sm-block d-xl-none">
            <nav class="navbar navbar-expand-lg d-flex align-items-center justify-content-center bg-white navbar-light py-3 d-none d-xl-block">
                <div class="row d-flex align-items-center justify-content-between" style="width: 1280px;margin: 0 auto;">
					<div class="col-lg-2 col-md-2 col-sm-8">
						<a class="navbar-brand logo_h " href="{{route('/')}}"><img src="../../img/greenQR_brand.png" alt=""  height="40px"></a>
					</div>
					 <div class="collapse navbar-collapse col-lg-3 col-md-4 col-sm-8">
							<!--ul class="navbar-nav mt-2 mt-lg-0">
								<li class="nav-item"><a href="#" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;" class="nav-link">Customer Care</a></li>
								<li class="nav-item"><a href="#" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;" class="nav-link">Sell on LifeCare Hub</a></li>
							</ul-->				
					</div>
                    <div class=" col-lg-4 col-md-4 col-sm-8" id="search-toggler">
                        <div class="navbar-nav" style="width:100%">
                            <form class="form" style="width:100%" method="get" action="{{route('shop')}}">
                                <div class="input-group input-group-lg filter-bar-search mt-0">
								  <input type="text" class="form-control border-0 bg-transparent" style="border-radius: 20px;" name="search" placeholder="Search" aria-label="Search">
								  <div class="input-group-append">
									<button type="submit" class="bg-transparent d-flex align-items-center justify-content-center" style="border-radius: 0 20px 0; background-color: #274439 !important; border: none;">
									  <i class="fa fa-search" style="color: white !important;"></i>
									</button>
								  </div>
								</div>
                            </form>
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-4 col-sm-8 d-flex justify-content-end" id="navbarToggler">
						<div class="mt-2 mt-lg-0 d-flex justify-content-between" >
							<div >
							  <a id="cart-link" class="nav-link" href="{{route('cart.index')}}" style="font-family:-apple-system,BlinkMacSystemFont,sans-serif;font-weight:{{ Auth::check() && Auth::user()->cart()->where('sold', 0)->sum('quantity') != null ? 'bold' : 'normal' }};font-size:14px;color:#274439;">
								<b>
								  <i class="fa fa-shopping-cart fa-lg mr-2"></i>
								</b>
								 <span class="vertical-line"></span>
								@guest 
								@else 
								@if(Auth::check() && Auth::user()->cart() && Auth::user()->cart()->where('sold', 0)->sum('quantity')) 
								<span style="color: {{ Auth::user()->cart()->where('sold', 0)->sum('quantity') > 0 ? '#1FA33D' : 'black' }}; margin-left: 5px;" class="nav-shop__circle">
								  ({{Auth::user()->cart()->where('sold', 0)->sum('quantity')}})
								</span> 
								@endif
								@endguest
							  </a>
							</div>

							@guest
								@if (Route::has('login'))
								<div class="d-flex align-items-center">
								  <a href="{{ route('login') }}" class="nav-link" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif; font-weight: 500; font-size: 14px;">
									<span class="rounded-box" style="background-color: #D0D0D0; display: inline-flex; align-items: center; padding: 8px; border-radius: 20px; margin-right: 8px;">
									  <i class="fa fa-user" style="color: #274439; margin-right: 4px;"></i>
									  <b style="color: #274439; line-height: 1;">Sign In</b>
									</span>
								  </a>
								</div>
								<div hidden class="nav-item d-flex align-items-center"><a hidden href="{{ route('login') }}" class="nav-link " style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;">
									<i hidden class="fa fa-heart mr-2"></i>Favorite</a>
								</div>
								@endif
								@else
								{{--<li class="nav-item"><a href="{{route('mypurchase.index')}}" class="nav-link link-dark hover-black px-lg-3">TRACK MY ORDER</a></li>--}}
								<div><a href="{{route('profile.index')}}" class="nav-link " style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;">
									<i class="fa fa-user mr-2"></i>Account</a>
								</div>
								<div class="d-flex align-items-center"><a href="{{route('chatify')}}" class="nav-link " style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;">
									<i class="fa fa-chat mr-2"></i>Chat</a>
								</div>
								@endif
								
						</div>
                    </div>
                </div>
            </nav>
			</div>
			
			<hr style="margin: 0; border: 1px solid #ccc;">
			<!--div class="d-none d-xl-block">
				<nav class="navbar navbar-expand-lg d-flex align-items-center justify-content-center bg-white navbar-light py-lg-3 d-none d-xl-block">
					<div class="row d-flex align-items-center justify-content-between" style="width: 1280px;margin: 0 auto;">
						<div class="col-lg-2 col-md-2 col-sm-8">
							<select name="categories">
							  <option value="">Categories</option>
							  <option value="category1">Category 1</option>
							  <option value="category2">Category 2</option>
							  <option value="category3">Category 3</option>
							  <option value="category4">Category 4</option>
							</select>

						</div>
						<div class="collapse navbar-collapse col-lg-3 col-md-4 col-sm-8">
							<!-- Add your menus here -->
							<!--ul class="navbar-nav mt-2 mt-lg-0">
								<li class="nav-item"><a href="#" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;" class="nav-link">Top Popular</a></li>
								<li class="nav-item"><a href="#" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;" class="nav-link">Today's Deals</a></li>
								<li class="nav-item"><a href="#" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 500;font-size: 14px;color: #383838;" class="nav-link">Special Offer</a></li>
							</ul>
						</div>
						<div class="collapse navbar-collapse col-lg-4 col-md-4 col-sm-8" id="search-toggler">
							<div class="navbar-nav" style="width:100%">
								<!-- Add your search form here -->
							<!--/div>
						</div>
						<div class="collapse navbar-collapse col-lg-3 col-md-4 col-sm-8 d-flex justify-content-end" id="navbarToggler">
							<!-- Add your remaining menu items here -->
						<!--/div>
					</div>
				</nav>
			</div-->
			<br>
        </div>
    </header>


	
	
    <main class="site-main">
        @yield('content')
    </main>
    <!--================ Start footer Area  =================-->
    <footer class="footer">
	
		<div class="d-none d-sm-block d-xl-none">
        <div style="background-color:#274439" class="@if(\Route::currentRouteName() == '/' && !Auth::user()) footer-area-home @elseif(\Route::currentRouteName() == 'location.all') footer-area-home @else footer-area pt-2 pb-2 @endif">
            <div class="card-image" style="width:100%;padding:100px 100px">
                <div class="row section_gap d-flex justify-content-center">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
							<div class="col-lg-2 col-md-2 col-sm-8">
								<a class="navbar-brand logo_h " href="{{route('/')}}"><img src="../../img/greenqr-icon.png" alt=""  height="40px"></a>
								
							</div>
                            <div hidden>
                                <p class="sm-head" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
                                    The Vertical Corporate Office, Bangsar South
                                </p>
							</div>

                        </div>
                    </div>
                    <!--div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets" style="padding-left:100px">
							<h4 style="color:white">Shop</h4>
                            <ul class="list "  style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
                                <li><a href="https://lifecarediagnostic.com/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Categories</a></li>
                                <li><a href="https://lifecare.com.my/coming-soon/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Top Popular</a></li>
                                <li><a href="https://lifecare.com.my/wellness/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Todays's Deals</a></li>
                                <li><a href="https://lifecare.com.my/well-being/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Special Offer</a></li>
                                <li><a href="#" class="text-white">GreenQR</a></li>

                            </ul>
                        </div>
                    </div-->
					
                    <div class=" col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-widget tp_widgets" style="padding-left:100px">
                            <h4 style="color:white">Company</h4>
							<ul class="list" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
								<li><a class="text-white" href="https://greenqr.co/">About Us</a></li>
								<li><a class="text-white" href="https://greenqr.co/contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
					
					 <div class=" col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-widget tp_widgets" style="padding-left:100px">
                            <h4 style="color:white">Support</h4>
							<ul class="list" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
								
                                <li><a class="text-white" href="{{route('faq')}}">FAQ</a></li>
								<!--li><a class="text-white" href="https://lifecare.com.my/career-with-us/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302">Terms Of Use</a></li>
                                <li><a class="text-white" href="{{route('location.all')}}">Terms & Conditions</a></li-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
        <div class="footer-bottom" style="background-color:white">
            <div  class="card-image" style="width:100%;padding:0 50px">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-6 ">
						<p class="footer-text" style="color:#274439;font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        &copy; <script>document.write(new Date().getFullYear());</script> Copyright GreenQr. All Rights Reserved </p>
					</div>
					<div class="col-lg-6">
						<div class="row d-flex justify-content-end">
							<!--div class="mr-3 px-2"><a class="text-white" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;" href="{{route('privacy')}}">Privacy & Policy</a></div>
							<div class="mr-3 px-2"><a class="text-white" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;" href="{{route('term')}}">Terms and Conditions</a></div-->
							<div class="mr-3 px-2"><a class="text-white" href="#"><i class="fa fa-facebook"></i></a></div>
							<div class="px-2"><a class="text-white" href="#"><i class="fa fa-instagram"></i></a></div>
						</div>
						
					
					</div>
                </div>
            </div>
        </div>
		</div>
		<!--================ Mobile View  =================-->
		<div class="d-none d-xl-block">
        <div style="background-color:#274439" class="@if(\Route::currentRouteName() == '/' && !Auth::user()) footer-area-home @elseif(\Route::currentRouteName() == 'location.all') footer-area-home @else footer-area pt-2 pb-2 @endif">
            <div class="card-image" style="width:100%;padding:100px 100px">
                <div class="row section_gap d-flex justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
							<div class="col-lg-2 col-md-2 col-sm-8">
								<a class="navbar-brand logo_h " href="{{route('/')}}"><img src="../../img/greenqr-icon.png" alt=""  height="40px"></a>
								
							</div>
                            <div hidden>
                                <p class="sm-head" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
                                    The Vertical Corporate Office, Bangsar South
                                </p>
							</div>

                        </div>
                    </div>
                    <!--div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets" style="padding-left:100px">
							<h4 style="color:white">Shop</h4>
                            <ul class="list "  style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
                                <li><a href="https://lifecarediagnostic.com/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Categories</a></li>
                                <li><a href="https://lifecare.com.my/coming-soon/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Top Popular</a></li>
                                <li><a href="https://lifecare.com.my/wellness/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Todays's Deals</a></li>
                                <li><a href="https://lifecare.com.my/well-being/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Special Offer</a></li>
                                <li><a href="#" class="text-white">GreenQR</a></li>

                            </ul>
                        </div>
                    </div-->
					
                    <div class=" col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets" style="padding-left:100px">
                            <h4 style="color:white">Company</h4>
							<ul class="list" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
								<li><a class="text-white" href="https://greenqr.co/">About Us</a></li>
								<li><a class="text-white" href="https://greenqr.co/contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
					
					 <div class=" col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets" style="padding-left:100px">
                            <h4 style="color:white">Support</h4>
							<ul class="list" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
								
                                <li><a class="text-white" href="{{route('faq')}}">FAQ</a></li>
								<!--li><a class="text-white" href="https://lifecare.com.my/career-with-us/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302">Terms Of Use</a></li>
                                <li><a class="text-white" href="{{route('location.all')}}">Terms & Conditions</a></li-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
		
        <div class="footer-bottom" style="background-color:white">
            <div  class="card-image" style="width:100%;padding:0 50px">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-6 ">
						<p class="footer-text" style="color:#274439;font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        &copy; <script>document.write(new Date().getFullYear());</script> Copyright GreenQr. All Rights Reserved </p>
					</div>
					<div class="col-lg-6">
						<div class="row d-flex justify-content-end">
							<!--div class="mr-3 px-2"><a class="text-white" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;" href="{{route('privacy')}}">Privacy & Policy</a></div>
							<div class="mr-3 px-2"><a class="text-white" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 17px;" href="{{route('term')}}">Terms and Conditions</a></div-->
							<div class="mr-3 px-2"><a class="text-white" href="#"><i class="fa fa-facebook"></i></a></div>
							<div class="px-2"><a class="text-white" href="#"><i class="fa fa-instagram"></i></a></div>
						</div>
						
					
					</div>
                </div>
            </div>
        </div>
		</div>
		<!--================ Mobile View  =================-->
		<div class="d-block d-sm-none">
        <div style="background-color:#274439" class="@if(\Route::currentRouteName() == '/' && !Auth::user()) footer-area-home @elseif(\Route::currentRouteName() == 'location.all') footer-area-home @else footer-area pt-2 pb-2 @endif">
            <div class="card-image" style="width:100%;padding:20px 30px">
                <div class="row section_gap d-flex justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
							<!--h4 class="footer_title" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 12px;">GreenQr</h4-->
							<a class="navbar-brand logo_h " href="{{route('/')}}"><img src="../../img/greenqr-icon.png" alt=""  height="40px"></a>
                            <div>
                                <p class="sm-head" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 12px;">
                                    The Vertical Corporate Office, Bangsar South
                                </p>
							</div>

                        </div>
                    </div>
                    <!--div class="col-lg-4 col-md-6 col-sm-6 mt-5">
                        <div class="single-footer-widget tp_widgets">
						<h4 style="color:white">Shop</h4>
                            <ul class="list "  style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 12px;">
                                 <li><a href="https://lifecarediagnostic.com/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Categories</a></li>
                                <li><a href="https://lifecare.com.my/coming-soon/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Top Popular</a></li>
                                <li><a href="https://lifecare.com.my/wellness/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Todays's Deals</a></li>
                                <li><a href="https://lifecare.com.my/well-being/?utm_source=marketplace&utm_medium=organic&utm_campaign=hub-202302" class="text-white">Special Offer</a></li>
								 <li><a href="#" class="text-white">GreenQR</a></li>

                            </ul>
                        </div>
                    </div-->
					
                    <div class=" col-lg-4 col-md-6 col-sm-6 mt-5">
                        <div class="single-footer-widget tp_widgets">
						<h4 style="color:white">Support</h4>
                            <ul class="list" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 12px;">
								<li><a class="text-white" href="https://greenqr.co/">About Us</a></li>
								<li><a class="text-white" href="https://greenqr.co/contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom text-left" style="background-color:white">
            <div  class="card-image" style="width:100%;padding:0 10px">
                <div class="row d-flex">
                    <div class="col-lg-6 col-12 p-0">
						<p class="footer-text" style="color:#274439;font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 12px;">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        &copy; <script>document.write(new Date().getFullYear());</script> Copyright GreenQr. All Rights Reserved </p>
					</div>
					<div class="col-lg-6 col-12 mt-4">
						<div class="row d-flex">
							<div class="mr-3"><a class="text-white" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 12px;" href="{{route('privacy')}}">Privacy & Policy</a></div>
							<div class="mr-3"><a class="text-white" style="font-family: -apple-system, BlinkMacSystemFont, sans-serif;font-weight: 400;font-size: 12px;" href="{{route('term')}}">Terms and Conditions</a></div>
							<div class="mr-3 px-2"><a class="text-white" href="#"><i class="fa fa-facebook"></i></a></div>
							<div class="px-2"><a class="text-white" href="#"><i class="fa fa-instagram"></i></a></div>
						</div>
					</div>
                </div>
            </div>
        </div>
		</div>
        <div class="d-block d-sm-none"><div style="display: block; height: 60px;"></div></div>
        <nav class="footer-mobile fixed-bottom d-block d-sm-none">
            <div class="d-flex justify-content-around">
                <a class="text-center" href="http://206.189.87.244"><img class="tabbar-item-icon" src="{{asset('img/greenQR-transformed-transformed.png')}}" alt=""><span class="d-block" style="font-size: 10px;color:#274439">Home</span></a>
					<a class="text-center" href="{{route('viewproductmobilecategory')}}"><img class="tabbar-item-icon" src="{{asset('img/categories.png')}}" alt=""><span class="d-block" style="font-size: 10px;color:#274439">Categories</span></a>
                <a class="text-center" href="{{route('cart.index')}}">
				<img class="tabbar-item-icon" src="{{asset('img/cart.png')}}" alt="">
				@guest @else @if(Auth::user()->cart()->where('sold', 0)->sum('quantity'))
				<span style="color:#274439" class="search-cart__circle">
				{{Auth::user()->cart()->where('sold', 0)->sum('quantity')}}
				</span> @endif @endguest
				<span class="d-block" style="font-size: 10px;color:#274439">Cart</span></a>
                <a class="text-center" href="{{route('profile.index')}}"><img class="tabbar-item-icon" src="{{asset('img/user.png')}}" alt=""><span class="d-block" style="font-size: 10px;color:#274439">Account</span></a>

            </div>
        </nav>
	</footer>
    <!--================ End footer Area  =================-->

    @yield('vendor')
    <script src="{{asset('vendors/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendors/skrollr.min.js')}}"></script>
    <script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('vendors/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('vendors/mail-script.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

	<script>
  // Wait for the DOM to load
  document.addEventListener('DOMContentLoaded', function() {
    // Get the cart link element
    const cartLink = document.getElementById('cart-link');

    // Check if there are items in the cart
    const itemCount = parseInt(cartLink.querySelector('span').textContent);
    if (itemCount > 0) {
      // Add the bold class
      cartLink.classList.add('bold');
    } else {
      // Remove the bold class
      cartLink.classList.remove('bold');
    }
  });
</script>



    @yield('script')
	
	
{{-- </div> --}}


</body>
</html>
