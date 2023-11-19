@extends('layouts.app')

@section('addstyle')

<style>

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
	#myBtn {
		display: none;
		position: fixed;
		bottom: 20px;
		right: 30px;
		z-index: 99;
		font-size: 12px;
		border: none;
		outline: none;
		background-color: #384AEB;
		color: white;
		cursor: pointer;
		border-radius: 50px;
		width:30px;
		height:30px
	}

	#myBtn:hover {
		background-color: #555;
	}
	@media (max-width: 441px) {
		#myBtn {
			display: none;
			position: fixed;
			bottom: 80px;
			right: 10px;
			z-index: 99;
			font-size: 12px;
			border: none;
			outline: none;
			background-color: #384AEB;
			color: white;
			cursor: pointer;
			border-radius: 50px;
			width:30px;
			height:30px
		}
	}
</style>
@endsection

@section('content')


	<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
	
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="contact">
        <div class="container h-25">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>FAQ</h1>
                    <!-- <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
          </nav> -->
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<h3>For Buyer</h3>
                    <div class="panel-group mt-4" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        I have questions regarding your service. Who should I contact to?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body p-4">
                                    <p>For questions regarding membership, customer service, and general inquiries, please drop us an email at <a href="mailto:emir@greenqr.co"> emir@greenqr.co</a> to our GreenQr Hub Support. We will get back to you within 48 hours during our operation hours from Monday to Friday (9am to 5pm).
									</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How can I sign up as a Member (Buyer) with GreenQr Hub?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body p-4">
                                    To become a Buyer, please click on the “Create an account” button. You will be required to submit your basic information and contact details. Upon completion, you can begin browsing through the catalog and making a purchase.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        Can I sign up as a Member without an e-mail?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body p-4">
									You need a valid email address to become a Member of GreenQr Hub.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        What should I do if I forgot my password?

                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                <div class="panel-body p-4">
                                    You can go to the GreenQr Hub homepage, click on “Sign In” button and proceed to click on the “Forgot My Password”. You will be asked to enter your email address where a reset link will be sent to you.

                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfive">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How do I change the information in my profile?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                                <div class="panel-body p-4">
                                    <ul>
										<li>Step 1: Click on your account.</li>
										<li>Step 2: Under the Information section, fill in your updated information accordingly.</li>
										<li>Step 3: Click "Save" to apply the changes.</li>
									</ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingsix">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How can I update my phone number in GreenQr Hub?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
                                <div class="panel-body p-4">
                                    <ul>
										<li>Step 1: Click on your account.</li>
										<li>Step 2: Under the Addresses section, click on the "Update" button.</li>
										<li>Step 3:  Update your phone number and click "Save" to apply the change.</li>
									</ul>
                                </div>

                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingseven">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How do I update my address?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseseven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingseven">
                                <div class="panel-body p-4">
                                    <ul>
										<li>Step 1: Click on your account.</li>
										<li>Step 2: Under the Addresses section, click on the "Update" button.</li>
										<li>Step 3:  Update your address and click "Save" to apply the changes.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingeight">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How do I add new address?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseeight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeight">
                                <div class="panel-body p-4">
                                    <ul>
										<li>Step 1: Click on your account.</li>
										<li>Step 2: Under Address Book, click "Create new address".</li>
										<li>Step 3: Fill in all the necessary information and save the changes accordingly.</li>
									</ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingnine">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How can I place an order on GreenQr Hub?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsenine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnine">
                                <div class="panel-body p-4">
                                    You will only need to have an account in GreenQr Hub, add item to cart and proceed to checkout.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingten">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseten" aria-expanded="false" aria-controls="collapseten">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How do I track my orders?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseten" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingten">
                                <div class="panel-body p-4">
                                    You can check your orders by accessing your account in the platform in “Order History & Details” page. In addition, you will receive an email notification where the Merchant (Seller) updates the details of your order.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingeleven">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How do I apply a promotional code to my order?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseeleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeleven">
                                <div class="panel-body p-4">
                                    Promotional code(s) is redeemable upon checkout.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwelve">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwelve" aria-expanded="false" aria-controls="collapsetwelve">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                       How long will it take for my order to arrive after I had made the payment?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwelve">
                                <div class="panel-body p-4">
                                    <p>After your order is verified; you can expect to receive your order within the following time frame:</p>
									
									<ul class="pl-3">
										<li class="mb-2">
											<span style="font-weight: bold;">Ready Stock </span>
											<span>- 7-14 working days throughout Malaysia (except Saturday, Sunday, and Public Holidays)<span>
										</li>
										<li>
											<span style="font-weight: bold;">Oversea Items </span>
											<span>- within 30 working days throughout Malaysia (except Saturday, Sunday, and Public Holidays)</span>
										</li>
									</ul>
									<p class="mt-3">If you experienced delays in receiving your order, please contact our GreenQr Hub Support team (please drop us an email at <a href="mailto:emir@greenqr.co">emir@greenqr.co</a>) immediately and we will help you to confirm your order status</p>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingthirteen">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsethirteen" aria-expanded="false" aria-controls="collapsethirteen">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										Can I cancel my order?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsethirteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingthirteen">
                                <div class="panel-body p-4">
                                    <p>Unfortunately, you cannot cancel any orders which has been confirmed and paid.</p>
									
									<p class="mt-3">In the event the order is canceled by you prior to the delivery of the goods and products, we may charge you a cancellation fee at 3% of the refund amount and thereafter remit the balance of the refund amount to you.</p>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingforteen">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseforteen" aria-expanded="false" aria-controls="collapseforteen">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										I have received the wrong items. What do I do?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseforteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingforteen">
                                <div class="panel-body p-4">
                                    You may return the product following the refund procedure.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfifteen">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefifteen" aria-expanded="false" aria-controls="collapsefifteen">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                      What are the possible reasons where I can return the items and ask for a refund?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefifteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfifteen">
                                <div class="panel-body p-4">
                                    <p>You may request for a return and refund due to any of the following reasons:</p>
									
									<ul class="pl-4">
										<li class="mb-2">
											<span style="font-weight: bold;">Damaged Item </span>
											<span>- The product SKU arrived with damaged exterior packaging. The item should remain unopened.<span>
										</li>
										<li class="mb-2">
											<span style="font-weight: bold;">Defective Items </span>
											<span>- The product SKU arrived with damaged interiors, only noticeable after packaging has been opened.</span>
										</li >
										<li class="mb-2">
											<span style="font-weight: bold;">Wrong Products </span>
											<span>- The product SKU does not match the quotation / invoice / receipt. Product should remain unopened and unused. </span>
										</li>
										<li class="mb-2">
											<span style="font-weight: bold;">Late Delivery </span>
											<span>- The products were sent late after 15 working days (upon order placement) without any confirmation and communication from the Seller or GreenQr Hub. </span>
										</li>
										<li>
											<span style="font-weight: bold;">Expired or Nearly Expired Product </span>
											<span>- The products delivered by the suppliers are near the expiry date [less than three (3) months] without informing the Buyers (or listed on the product description) beforehand. </span>
										</li>
									</ul>
									<p class="mt-3">
										<span>Within 24 hours after delivery, take <span style="font-weight: bold;">3 clear photographs</span> of the product to demonstrate its i) damages and/or ii) defectiveness. Please also complete the same step if you have received the wrong order as proof.</span>
									</p>
									<p class="mt-3">Any claims made after the above stipulated time shall not be entertained. Product to be returned must be in its original packaging, original condition with all necessary documents in the parcel. In the case of defectiveness in product, in which the packaging has been opened, the product should be packed properly to allow for handling by the seller (e.g., no loose pieces, spillages).</p> 
									
									<p class="mt-3">You will be asked to select one of the following reasons for your dispute:</p>
									<ul class="pl-4">
										<li class="mb-2">
											<span style="font-weight: bold;">Damage Good </span>
											<span>(Goods with damaged exterior packaging)<span>
										</li>
										<li class="mb-2">
											<span style="font-weight: bold;">Excess Drop Off Item </span>
											<span>(Product quantity does not match the invoice/quotation/receipt)</span>
										</li >
										<li class="mb-2">
											<span style="font-weight: bold;">Expired Goods </span>
											<span>(Goods that have gone past the expiry date) </span>
										</li>
										<li class="mb-2">
											<span style="font-weight: bold;">Shortage Items </span>
											<span>(Missing items) </span>
										</li>
										<li>
											<span style="font-weight: bold;">Wrong Items </span>
											<span>(Product received does not match the invoice/quotation/receipt </span>
										</li>
									</ul>
									<p class="mt-3">Any refund will be processed and credited to the respective credit card account or any other payment mode in accordance with the Bank's and Financial Institution's policy and timeframe. The delivery and other incidental costs will not be reimbursed.</p>
                                </div>
                            </div>
							
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingsixteen">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesixteen" aria-expanded="false" aria-controls="collapsesixteen">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How long does it take to deliver the replacement product to me?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsesixteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsixteen">
                                <div class="panel-body p-4">
                                    Provided that the product is in its original packaging and original condition upon inspection, we will deliver the replacement product within the next 14 days.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingseventeen">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseventeen" aria-expanded="false" aria-controls="collapseseventeen">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										Can I exchange the product that I've purchased?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseseventeen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingseventeen">
                                <div class="panel-body p-4">
                                    All products sold are not allowed for exchange.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingeighteen">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeighteen" aria-expanded="false" aria-controls="collapseeighteen">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										I did not receive the full order.
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseeighteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeighteen">
                                <div class="panel-body p-4">
                                    In this case, the Merchant (Seller) will be held accountable. Please contact our GreenQr Hub Support team at <a href="mailto:emir@greenqr.co">emir@greenqr.co</a> with your order details and proof of the incomplete order received. We will then proceed with the necessary arrangements with the Merchant (Seller).
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingnineteen">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsenineteen" aria-expanded="false" aria-controls="collapsenineteen">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How do I know if my order has been confirmed?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsenineteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingnineteen">
                                <div class="panel-body p-4">
                                    <p>Here are a few ways to know whether your order has been confirmed.</p>
									<ul class="pl-4">
										<li class="mb-2">Email: You will receive an email notification for your confirmed order; or.</li>
										<li>Profile: You can click on your profile and check on the “Order Details” tab to view your order placed.</li>
									<ul>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty" aria-expanded="false" aria-controls="collapsetwenty">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										What product information is available to me?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty">
                                <div class="panel-body p-4">
                                    <p>There is several information for each product sold on GreenQr Hub, please refer below listing: -</p>
									<ol class="pl-4">
										<li class="mb-2">Product Name.</li>
										<li class="mb-2">Product Category.</li>
										<li class="mb-2">Product Description.</li>
										<li class="mb-2">Manufacturer Name.</li>
										<li class="mb-2">Indication / Usage.</li>
										<li class="mb-2">Active Ingredients.</li>
										<li class="mb-2">Price.</li>
										<li>Quantity.</li>

									</ol>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty1">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty1" aria-expanded="false" aria-controls="collapsetwenty1">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How do I know if product is still available or in stock?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty1">
                                <div class="panel-body p-4">
                                    If the “Add to Cart” button is visible on the product, then the product is still available. There will also be an "Out of Stock" banner on the product if there are no more stocks remaining.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty2" aria-expanded="false" aria-controls="collapsetwenty2">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										What are the payment methods available?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty2">
                                <div class="panel-body p-4">
                                    We accept several payment methods including FPX Online Banking and Debit/Credit Card. The payment options are automatically displayed upon checkout.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty3">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty3" aria-expanded="false" aria-controls="collapsetwenty3">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										What currency will I have to pay with?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty3">
                                <div class="panel-body p-4">
                                    All transactions on GreenQr Hub are to be payable in Ringgit Malaysia (MYR) only.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty4">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty4" aria-expanded="false" aria-controls="collapsetwenty4">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										My credit card transaction has been declined, what should I do?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty4">
                                <div class="panel-body p-4">
                                    Please contact your credit card issuer Banks for clarification of declined transaction.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty5">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty5" aria-expanded="false" aria-controls="collapsetwenty5">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How will the products be delivered to me?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty5">
                                <div class="panel-body p-4">
                                    <p>Currently GreenQr Hub is using below third-party logistics (3PL):</p>
									<ol class="pl-4">
										<li class="mb-2">GDEX</li>
										<li class="mb-2">Lalamove</li>
										<li class="mb-2">MrSpeedy</li>
										<li class="mb-2">Ninja Van</li>
										<li class="mb-2">Pos Laju</li>
										<li>Pgeon Delivery (and many more)</li>
									</ol>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty6">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty6" aria-expanded="false" aria-controls="collapsetwenty6">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										Can orders be delivered to anywhere within Malaysia?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty6">
                                <div class="panel-body p-4">
                                    Yes, orders could be delivered to all addresses within Malaysia except for P.O. Box addresses.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty7">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty7" aria-expanded="false" aria-controls="collapsetwenty7">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How can I change my shipping address?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty7">
                                <div class="panel-body p-4">
                                    You can change your shipping address by updating/adding it in your account page in the platform.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty8">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty8" aria-expanded="false" aria-controls="collapsetwenty8">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										My parcel has been returned to your business premise, can please arrange resend to me?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty8">
                                <div class="panel-body p-4">
                                    Please drop us an email at <a href="mailto:emir@greenqr.co">emir@greenqr.co</a> to our GreenQr Hub Support on the resend arrangement request. Kindly take noted that resend charge is imposed.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingtwenty9">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty9" aria-expanded="false" aria-controls="collapsetwenty9">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										I bought digital voucher from your platform, where can I get the voucher code?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsetwenty9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingtwenty9">
                                <div class="panel-body p-4">
                                    Please check your registration email address account with us, voucher code will be sent to your email within 24 hours upon purchase. With the voucher code, you may book an appointment with the Seller following the instructions provided in the description on the website or app.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingthirty">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsethirty" aria-expanded="false" aria-controls="collapsethirty">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										I'm facing issue to redeem my digital voucher code given by your platform, what shall I do next?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsethirty" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingthirty">
                                <div class="panel-body p-4">
                                    Please an email to our GreenQr Hub Support at emir@greenqr.co for further assistance.
                                </div>
                            </div>
                        </div>

                    </div><!-- panel-group -->
                </div>

            </div>
        </div>
    </section>
	<section class="section-margin--small">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<h3>Seller FAQ</h3>
                    <div class="panel-group mt-4" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading1">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How do I sign-up to become a Merchant (Seller) on GreenQr Hub?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                                <div class="panel-body p-4">You can register your interest through the ‘Contact Us’ form located in our homepage.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How to set up my e-shop in GreenQr Hub?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                                <div class="panel-body p-4">
                                    After login, you can update your profile through the “Edit Profile” tab. You can update your information such as your e-shop’s name, addresses, online branding/ image and many more.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading3">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        I have questions regarding your service. Who should I contact to?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                                <div class="panel-body p-4">
									Please drop us an email at <a href="mailto:emir@greenqr.co">emir@greenqr.co</a> to our GreenQr Hub Support or Click the WhatsApp icon at the bottom right of the page.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading4">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                       Can I access GreenQr Hub using multiple devices?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                                <div class="panel-body p-4">
                                    Yes, you can access to GreenQr Hub with your credentials in any devices.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading5">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        Can I change/reset my password?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                                <div class="panel-body p-4">
                                   You can change your password by clicking the “Forget Password” during login or you can email directly to request to change your password at <a href="mailto:emir@greenqr.co">emir@greenqr.co</a> to our GreenQr Hub Support.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading6">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How do I change my phone number?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                                <div class="panel-body p-4">
                                    You can change your phone number by editing it in “Edit Your Profile” section after you logged in.
                                </div>

                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading7">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        Why did my login attempt fail?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                                <div class="panel-body p-4">
                                    Your failed login attempt could be due to wrong email or password entered. Please reset your password and try again. Another reason could be due to your account has been deactivated by the admin. Please contact <a href="mailto:emir@greenqr.co">emir@greenqr.co</a> (GreenQr Hub Support) for further assistance.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading8">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        Can I re-register after deleted my account?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                                <div class="panel-body p-4">
                                    If you have requested for your account deletion, you will be able to register using the same email address or phone number. However, this is subject to GreenQr Hub's approval.
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading9">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        Why is my account deletion request rejected?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                                <div class="panel-body p-4">
                                    <p>Kindly ensure you complete and fulfil all your orders, including those under in delivery process or dispute, before you request for account deletion.</p>
									<p class="mt-3">If you have no pending item under process or dispute, kindly contact GreenQr Hub Support at <a href="mailto:emir@greenqr.co">emir@greenqr.co</a> for further assistance.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading10">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How do I add/edit my addresses?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                                <div class="panel-body p-4">
                                    You can add/edit your addresses by editing it in “Edit Your Profile” section after you logged in.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading11">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        How do I add/edit my emails?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                                <div class="panel-body p-4">
                                    You can add/edit your emails by editing it in “Edit Your Profile” section after you logged in.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading12">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                       How to add product?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                                <div class="panel-body p-4">
                                    You will be given a product-listing template to fill in for your first upload. You will also be provided with a training guide on how to add and upload products after your registration as a Merchant (Seller) is approved by GreenQr Hub Admin.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading13">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How can I report a user or an inappropriate product?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
                                <div class="panel-body p-4">
                                    <p>If you come across a counterfeit product, please proceed to report by submitting an email to <a href="mailto:emir@greenqr.co">emir@greenqr.co</a> with your Merchant (User) account name.</p>
									
									<p class="mt-3">You may be required to send additional supporting documents for us to act against the reported product and/or Merchant (Seller).</p>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading14">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										Why is my product listing deleted/rejected?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
                                <div class="panel-body p-4">
                                    <p>If your submitted product was deleted or rejected, it was likely due to violation of our rules. Common violations included:</p>
									<ol>
										<li>Misleading pricing.</li>
										<li>Listed products under the wrong category or misrepresentation of products.</li>
										<li>Banned drugs in Malaysia.</li>
										<li>Hazardous and dangerous items including but not limited to radioactive, flammable, explosive, corrosive, oxidizing, asphyxiating, biohazardous, toxic, pathogenic, or allergenic.</li>
									</ol>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading15">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                      How many products can I list on GreenQr Hub?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
                                <div class="panel-body p-4">
                                    You can list as many products as you which in GreenQr Hub. There is no restriction for number of products enlisted.
                                </div>
                            </div>
							
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading16">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="false" aria-controls="collapse16">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How can I check my orders?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading16">
                                <div class="panel-body p-4">
                                    You can check your orders by login to GreenQr Hub website and click on “Order” tab to check the status and details of your most recent orders.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading17">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="false" aria-controls="collapse17">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How can I update the status of my orders?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headings17">
                                <div class="panel-body p-4">
                                    You can click on the order in the “Order Details” page, and you can select the status to update each order. All updated statuses will be visible instantly to the Buyers as well.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading18">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse18" aria-expanded="false" aria-controls="collapse18">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										What are the available shipping services I can use for delivery?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading18">
                                <div class="panel-body p-4">
                                    <p>Currently GreenQr Hub is using below third-party logistics (3PL):</p>
									<ol class="pl-4">
										<li class="mb-2">GDEX</li>
										<li class="mb-2">Lalamove</li>
										<li class="mb-2">MrSpeedy</li>
										<li class="mb-2">Ninja Van</li>
										<li class="mb-2">Pos Laju</li>
										<li>Pgeon Delivery (and many more)</li>
									</ol>
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading19">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse19" aria-expanded="false" aria-controls="collapse19">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How can a Buyer change delivery address after placing an order?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading19">
                                <div class="panel-body p-4">
                                    Buyer is not allowed to change their delivery address after an order is placed. However, they can contact GreenQr Hub Support (<a href="mailto:emir@greenqr.co">emir@greenqr.co</a>) with their order ID to request for change of address.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headin20">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse20" aria-expanded="false" aria-controls="collapse20">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										How will I be paid?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse20" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading20">
                                <div class="panel-body p-4">
                                    You will be paid once your orders’ status has changed to “Delivered” upon order confirmed received by Buyer. GreenQr Hub Finance team will make payment to Merchant (Seller) on weekly basis on every Friday and the payment will be made directly to your bank account within 15 working days.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading21">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse21" aria-expanded="false" aria-controls="collapse21">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										Will I receive a proof of payment?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading21">
                                <div class="panel-body p-4">
                                    GreenQr Hub Finance team will send a payment advice for all successful transactions to your bank account on weekly basis.
                                </div>
                            </div>
                        </div>
						<div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading22">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse22" aria-expanded="false" aria-controls="collapse22">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
										I am lost. Who do I contact for support?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading22">
                                <div class="panel-body p-4">
                                    <p>Please email to <a href="mailto:emir@greenqr.co">emir@greenqr.co</a> to our GreenQr Hub Support for further assistance.</p>
									<p>We will get back to you within 48 hours during our operation hours from Monday to Friday (9am to 5pm).</p>

                                </div>
                            </div>
                        </div>
                    </div><!-- panel-group -->
                </div>

            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

@section('script')
	<script>
		// Get the button
		let mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
			mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>

@endsection