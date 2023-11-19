@extends('layouts.app')

@section('content')

    <!--================Checkout Area =================-->
    <section class="checkout_area section-margin--small">
        <div class="container">

            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Make Apppointment</h3>
                        <form class="contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-12 form-group p_star">
                                    <label>Search by Specialty</label>
                                    <select name="specialities" class="country_select" id="specialities" aria-invalid="false">
                                        <option value="" disabled selected>Search by Specialty</option>
                                        <option value="All Specialists">All Specialists</option>
                                        <option value="Consultant Physician">Consultant Physician</option>
                                        <option value="Primary Care Doctor">Primary Care Doctor</option>
                                        <option value="Dietitian">Dietitian</option>
                                        <option value="Internal Medicine/ Cardiologist">Internal Medicine/ Cardiologist</option>
                                        <option value="Consultant Orthopaedic Surgeon">Consultant Orthopaedic Surgeon</option>
                                        <option value="Consultant Obstetrics &amp; Gynaecologist">Consultant Obstetrics &amp; Gynaecologist</option>
                                        <option value="Radiologist">Radiologist</option>
                                        <option value="Neuropsychiatrist">Neuropsychiatrist</option>
                                        <option value="Plastic Surgeon">Plastic Surgeon</option>
                                        <option value="Gastroenterologist">Gastroenterologist</option>
                                        <option value="Urologist">Urologist</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group p_star" id="find_doctor">
                                    <label>Find Doctor</label>
                                    <select name="doctor-pri-care" class="country_select" aria-invalid="false">
                                        <option value="Find Doctor">Find Doctor</option>
                                        <option value="Dr. Alex Leong Vui Beng">Dr. Alex Leong Vui Beng</option>
                                        <option value="Dr. Anthony Chiew Han Yang">Dr. Anthony Chiew Han Yang</option>
                                        <option value="Dr. Chin Shi Yei">Dr. Chin Shi Yei</option>
                                        <option value="Dr. Khoo Su-Khing">Dr. Khoo Su-Khing</option>
                                        <option value="Dr. Norain Ishak">Dr. Norain Ishak</option>
                                        <option value="Dr. Quah Say Chuan">Dr. Quah Say Chuan</option>
                                        <option value="Dr. Theresa Ho">Dr. Theresa Ho</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label>Search by Name</label>
                                    <select name="doctors" class="country_select" aria-invalid="false">
                                        <option value="All Doctors &amp; Specialists" disabled selected>All Doctors &amp; Specialists</option>
                                        <option value="Dr. Ong Kee Liang">Dr. Ong Kee Liang</option>
                                        <option value="Dr. Alex Leong Vui Beng">Dr. Alex Leong Vui Beng</option>
                                        <option value="Dr. Anthony Chiew Han Yang">Dr. Anthony Chiew Han Yang</option>
                                        <option value="Dr. Wong Kok Choon">Dr. Wong Kok Choon</option>
                                        <option value="Dr. Khoo Su-Khing">Dr. Khoo Su-Khing</option>
                                        <option value="Dr. Quah Say Chuan">Dr. Quah Say Chuan</option>
                                        <option value="Dr. Theresa Ho">Dr. Theresa Ho</option>
                                        <option value="Ms. Au Pui Yee">Ms. Au Pui Yee</option>
                                        <option value="Ms. Olivia O Pau Hui">Ms. Olivia O Pau Hui</option>
                                        <option value="Dr. Prem Nathan A/L Arumuganathan">Dr. Prem Nathan A/L Arumuganathan</option>
                                        <option value="Dr. Ramadas A/L Rajagovallu">Dr. Ramadas A/L Rajagovallu</option>
                                        <option value="Dr. David Choon Siew Kit">Dr. David Choon Siew Kit</option>
                                        <option value="Dr. Eugene Wong">Dr. Eugene Wong</option>
                                        <option value="Dr. Goh Keat Ying">Dr. Goh Keat Ying</option>
                                        <option value="Dr. Chin Loi Chung">Dr. Chin Loi Chung</option>
                                        <option value="Dr. Chee Kok Yoon">Dr. Chee Kok Yoon</option>
                                        <option value="Dato Dr. Tan Hui Meng">Dato Dr. Tan Hui Meng</option>
                                        <option value="Dato' Dr.Kuladeva A/L Retnam">Dato' Dr.Kuladeva A/L Retnam</option>
                                        <option value="Dr. Loong Yik Yee">Dr. Loong Yik Yee</option>
                                        <option value="Dr. Sivaprakasam A/L Sivalingam">Dr. Sivaprakasam A/L Sivalingam</option>
                                        <option value="Ms. Amrita Tan Rui Shan">Ms. Amrita Tan Rui Shan</option>
                                        <option value="Dr. Norain Ishak">Dr. Norain Ishak</option>
                                        <option value="Dr. Laila Mastura">Dr. Laila Mastura</option>
                                        <option value="Dr. Chin Shi Yei">Dr. Chin Shi Yei</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Appointment Date</label>
                                    <input type="date" class="form-control" id="company" name="company" placeholder="Company name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Appointment Time</label>
                                    <input type="time" class="form-control" id="company" name="company" placeholder="Company name">
                                </div>

                            </div>

                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="button button--active button-review">Make Appointment</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog_right_sidebar">

                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Next Appointment</h3>
                                <div class="media post_item">
                                    <img src="{{asset('img/blog/team-1.jpg')}}" alt="post" width="80px" height="80px">
                                    <div class="media-body">
                                        <a href="#">
                                            <h3>Dr. Ong Kee Liang / 王琪量 医生</h3>
                                        </a>
                                        <ul class="card-blog__info">
                                            <li><a href="#" class="hover-black"><i class="ti-calendar"></i>12 Oct 2022</a></li>
                                            <li><a href="#" class="hover-black"><i class="ti-time"></i> 10:00 - 10:30 am</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="{{asset('img/blog/team-2.jpg')}}" alt="post" width="80px" height="80px">
                                    <div class="media-body">
                                        <a href="#">
                                            <h3>Dr. Ong Kee Liang / 王琪量 医生</h3>
                                        </a>
                                        <ul class="card-blog__info">
                                            <li><a href="#" class="hover-black"><i class="ti-calendar"></i>12 Oct 2022</a></li>
                                            <li><a href="#" class="hover-black"><i class="ti-time"></i> 10:00 - 10:30 am</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="media post_item">
                                    <img src="{{asset('img/blog/team-3.jpg')}}" alt="post" width="80px" height="80px">
                                    <div class="media-body">
                                        <a href="#">
                                            <h3>ADr. Ong Kee Liang / 王琪量 医生</h3>
                                        </a>
                                        <ul class="card-blog__info">
                                            <li><a href="#" class="hover-black"><i class="ti-calendar"></i>12 Oct 2022</a></li>
                                            <li><a href="#" class="hover-black"><i class="ti-time"></i> 10:00 - 10:30 am</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="br"></div>
                            </aside>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection
