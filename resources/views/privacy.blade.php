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
	
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Privacy & Policy</h1>
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
                    <p>Important – please read these terms carefully. By using this website&nbsp; <strong>(“Website”)</strong>, you irrevocably agree and deemed that you have read, understood, accepted and agreed with the Privacy Policies. These Privacy Policies are prepared in accordance with the current Personal Data Protection Act, General Data Protection Regulation and other prevailing laws applicable. </p>
                    <p>The terms and conditions stated herein (collectively,&nbsp; <strong>“Privacy Policies”</strong>) constitute a legal agreement between you and E-Lifecare Sdn. Bhd.&nbsp; <strong>(“Company”)</strong>. In order to use the Website&nbsp; <strong>(“Website”)</strong>, you must agree to the Privacy Policies that are set out below. By using the Website, you hereby expressly acknowledge and agree to be bound by the Privacy Policies. </p>
                    <p>The Company reserves the right to modify, vary and change the Privacy Policies or its policies relating to the Website at any time as it deems fit without obtaining your prior consent. Such modifications, variations and or changes to the Privacy Policies or its policies relating to the use of Website shall be effective and shall bind all users. You agree that it shall be your responsibility to review the Privacy Policies regularly whereupon the continued use of the Website after any such changes, whether or not reviewed by you, shall constitute your consent and acceptance to such changes.</p>
                </div>
                <div class="col-lg-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        A. DATA COLLECTION
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <ol>
                                        <li>Personal Data means any information, whether recorded in a material form or not, from which the identity of an individual is apparent or can be reasonably and directly ascertained by the entity holding the information, or when put together with other information would directly and certainly identify an individual.</li>
                                        <li>We may collect the following personal data from you: <br>
                                            <ol type="i">
                                                <li>your demographic;&nbsp;</li>
                                                <li>contact data, such as billing address, delivery address, email address, and phone numbers;</li>
                                                <li>account data, such as bank account and payment details;</li>
                                                <li>health information, such as medical records and requests;</li>
                                                <li>transaction data, such as details about payments to and from you, and other details of products and services you have purchased;</li>
                                                <li>technical data, such as internet protocol (IP) address, your login data, browser type and version, time zone setting and location, browser plug-in types and versions, operating system and platform, and other technology on the devices you use to access the Website;</li>
                                                <li>profile data, such as your username and password, purchases or orders made by you, your interests, preferences, feedback and survey responses;</li>
                                                <li>usage data, such as information on how you use the Website; and</li>
                                                <li>marketing and communications data, such as your preferences in receiving marketing from us and our third parties and your communication preferences.</li>
                                            </ol>
                                        </li>
                                        <li>The Company may use information on the web-browseryou visit or the offers you view on the Website to select special offers that will be relevant to you. You also authorize the Company and hold the Company harmless if the Company shares that information with our web-browsers or other third parties. In addition, the Company may use the information for the following reasons: – <br>
                                            <ol type="i">
                                                <li>for administrative purpose including processing and completing your transactions with the Company;</li>
                                                <li>circumstances may arise where, whether for strategic or other business reasons, the Company decides to sell, buy, merge or otherwise reorganise its businesses. Such a transaction may involve the disclosure of your personal information to prospective or actual purchasers, or the receipt of it from sellers.</li>
                                            </ol>
                                        </li>
                                        <li>The Company collect data on the devices that access or attempt to access the Website. This device data is used in conjunction with a third-party security partner to identify and prevent fraudulent activity and does not include personally identifiable information.</li>
                                        <li>The Company may also use your information for marketing activities, as permitted by applicable laws, such as, the following: <br>
                                            <ol type="i">
                                                <li>the Company may use your contact information to send you news about similar products and services;</li>
                                                <li>when the Company believe that a particular offer may be of interest to you, the Company may decide to make contact with you by phone given at the time of registration of the Website.</li>
                                            </ol>
                                        </li>
                                        <li>The Company will only retain your personal data for as long as we are either required to by law or as is relevant for the purposes for which it was collected.</li>
                                        <li>You may decline to share your personal information with the Company, however this may also affect your access to some or all features of our website or services provided by the Company.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        B. WHO SEES YOUR PERSONAL INFORMATION
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <ol>
                                        <li>The Company will share your personal information with third parties only in the ways that are described in this Privacy Policies. The Company does not sell your personal information to third parties.</li>
                                        <li>The Company may use third‐party contractors or vendors to help the Company provide some of our services. If the Company need to disclose personal information for them to provide the services, it is with the requirement that the information will be kept confidential and used only to provide those services. In addition, the Company’s affiliates, subsidiaries, service providers, and other entities may collect personal information about your browsing habits over time when you are using the Website.</li>
                                        <li>The Company reserves the right to disclose your personal information as required by law and when the Company believes that disclosure is necessary to protect its rights and/or to comply with a judicial proceeding, court order, or legal process served on the Company or to protect the Company and our users from losses.</li>
                                        <li>While browsers allow you to disable the usage of cookies, the Company does not change our practices in response to a “Do Not Track” signal or any similar variant in the HTTP header from the Website.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        C. YOUR PRIVACY WITH THE COMPANY
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <p>The Company will never ask for your username, password or any other personal information in an unsolicited phone call, email or letter. Further, any contact with the Company’s customer service in which personal information is exchanged with a customer service representative will be used only for the purpose of satisfying your request. Any personal information you provide will not be recorded or used for any reason beyond that of the stated request.</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        D. LINKAGE

                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                <div class="panel-body">
                                    <ol>
                                        <li>The Company may allow users to access Facebook or other social media. In such circumstances, you are allowing the Company to access your information on your Facebook or other social media.</li>
                                        <li>The Company may contain links to various other sites. Each of these sites has a privacy policy that may differ from that of the Company’s. If you wish to receive special offers directly from a store, neither this privacy policy nor our opt-out policy applies to those communications. Instead, please refer to the relevant store’s privacy and opt-out policy.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfive">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        E. DATA SECURITY AND STORAGE
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                                <div class="panel-body">
                                    <ol>
                                        <li>In accordance with the applicable laws, we observe reasonable procedures to prevent unauthorized access and the misuse of your personal data.</li>
                                        <li>We use appropriate business systems and procedures to protect and safeguard your data given to us. Only authorized personnel are permitted to access your data in the course of their work.</li>
                                        <li>You always have the right to review your personal data that we keep about you. You can request an overview of your personal data by writing to us and deliver the request to us by hand.</li>
                                        <li>If the personal data we have for you is incorrect, we will update it at your request. You can also ask us to remove your personal data from our customer database by writing to us and deliver the request to us by hand. However, where you choose to remove your personal data, we may not be able to provide you with access to the Website.</li>
                                        <li>We may also need to retain certain information in accordance with applicable laws, for legal or administrative purposes, such as record keeping or to detect fraudulent activities.</li>
                                        <li>We are located in Malaysia. However, we may transfer and store your personal information across international borders (including outside the Asian regions or European Economic Area) as so required by our contract with you or third parties whenever applicable. Transfers may occur between the Company including its affiliates, business associates etc. Please do not send the Company your information if you do not want it to be transferred or stored in this way.</li>
                                        <li>The Company will retain your personal information as long as necessary to fulfill the purposes for which it is processed, including the Company’s requirement to comply with legal and regulatory obligations (e.g. audit, accounting and statutory retention terms), handling disputes, and for the establishment, exercise or defence of legal claims in the countries where the Company has business activities.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingsix">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        F. LIMITATION OF LIABILITY
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
                                <div class="panel-body">
                                    <p>The Company will not be liable for any damages of any kind, including without limitation direct, indirect, incidental, punitive, and consequential damages, arising out of or in connection with the privacy policy, the website and/or the Service.</p>
                                    <p>You acknowledge and agree that the Company has the right to disclose your personal data to any legal, regulatory, governmental, tax, law enforcement or other authorities or the relevant right owners, if the Company has reasonable grounds to believe that disclosure of your personal data is necessary for the purpose of meeting any obligations, requirements or arrangements, whether voluntary or mandatory, as a result of cooperating with an order, an investigation and/or a request of any nature by such parties. To the extent permissible by applicable law, you agree not to take any action and/or waive your rights to take any action against the Company for the disclosure.</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingseven">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        G. CONFIDENTILIATY
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseseven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingseven">
                                <div class="panel-body">
                                    <p>Unless our prior written consent is given, you irrevocably undertake to us that, at all times, you shall not: –</p>
                                    <ol type="a">
                                        <li>Copy, disclose, reproduce, sell, publish, distribute, display, retransmit any report, treatment plan, information, consultation that are generated or made available by us to you&nbsp; <strong>(“Confidential Information”)</strong>; </li>
                                        <li>Tender or adduce any Confidential Information in a court of law or to be used as legal evidence in any law of court or legal proceedings;</li>
                                        <li>Teproduce, duplicate, copy or otherwise exploit the Confidential Information for a commercial purpose or otherwise.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingeight">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                        <i class="fa fa-plus more-less" aria-hidden="true"></i>
                                        H. GENERAL
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseeight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeight">
                                <div class="panel-body">
                                    <ol>
                                        <li>This Agreement shall be governed by Malaysia law, without regard to the choice or conflicts of law provisions of any jurisdiction, and any disputes, actions, claims or causes of action arising out of or in connection with the Terms of Use or the Service shall be subject to the exclusive jurisdiction of the courts of Malaysia to which you hereby agree to submit to.</li>
                                        <li>No joint venture, partnership, employment, or agency relationship exists between you, the Company or any third-party provider as a result of the Terms of Use or use of the Service. If any provision of the Terms of Use is held to be invalid or unenforceable, such provision shall be struck and the remaining provisions shall be enforced to the fullest extent under law. This shall, without limitation, also apply to the applicable law and jurisdiction as stipulated above. The failure of the Company to enforce any right or provision in the Terms of Use shall not constitute a waiver of such right or provision unless acknowledged and agreed to by the Company in writing. The Terms of Use comprises the entire agreement between you and the Company and supersedes all prior or contemporaneous negotiations or discussions, whether written or oral, between the parties regarding the subject matter contained herein.</li>
                                        <li>Any dispute, controversy or claim arising out of or relating to this Terms of Use, or the breach, termination or invalidity thereof shall be settled by arbitration at the Asian International Arbitration Centre (“AIAC”) in accordance with the rules of AIAC, which rules are deemed to be incorporated by reference in this Clause. The language to be used in the arbitral proceedings shall be Chinese, Mandarin and the seat of the arbitration shall be Kuala Lumpur, Malaysia.</li>
                                        <li>By using our Website, you are assumed (unless otherwise refuted by you in writing or by action) that you have attained the age of majority and you are fit to proffer your consent to these privacy policies.</li>
                                    </ol>
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
 