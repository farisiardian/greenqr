@extends('layouts.app')

@section('content')
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="blog">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center ">
                    <h1>Leasing Enquiry</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">LifeCare, Bangsar South</a></li>
                            <li class="breadcrumb-item"><a href="#">LifeCare, Cheras South</a></li>
                            <li class="breadcrumb-item"><a href="#">LifeCare DK Mall, SS2</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ================ end banner area ================= -->


    <!--================Blog Categorie Area =================-->
    <section class="location_area pb-60px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align: center;">Besides our core interests in healthcare and renovation, LifeCare offers leasing opportunities for healthcare and wellness space. Our properties are readily located in strategic locations with good accessibility to cater to a variety of businesses.&nbsp;</p>
                    <p style="text-align: center;">Kindly fill up below form or email us at <a href="mailto:leasing@lifecare.com.my">leasing@lifecare.com.my</a> for leasing enquiries. </p>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->




    <!-- ================ enquiry section start ================= -->
    <section class="pb-60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form">
                                    <div class="form-row">
{{--                                        <div class="row">--}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="salutation">Salutation*</label>
                                                    <select name="salutation" id="salutation" class="form-control">
                                                        <option value="">---</option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Ms">Ms</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Madam">Madam</option>
                                                        <option value="Dr">Dr</option>
                                                        <option value="Prof">Prof</option>
                                                        <option value="Dato">Dato</option>
                                                        <option value="Datuk">Datuk</option>
                                                        <option value="Datin">Datin</option>
                                                        <option value="Tan Sri">Tan Sri</option>
                                                        <option value="Puan Sri">Puan Sri</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Full Name*</label>
                                                    <input type="text" id="fname" class="form-control" placeholder="Fullname" name="fname" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Contact Number (Mobile/Office)*</label>
                                                    <input type="text" id="mobile" class="form-control" name="mobile" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="issueinput4">Designation*</label>
                                                    <select name="designation" class="form-control">
                                                        <option value="">---</option>
                                                        <option value="CEO/MD/VP/GM">CEO/MD/VP/GM</option>
                                                        <option value="Manager/Senior Manager">Manager/Senior Manager</option>
                                                        <option value="Senior Executive">Senior Executive</option>
                                                        <option value="Executive">Executive</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email*</label>
                                                    <input type="email" id="email" class="form-control" placeholder="Email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Company*</label>
                                                    <input type="text" id="company" class="form-control" placeholder="Company" name="company" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Trade/Brand Name</label>
                                                    <input type="text" id="tbrandname" class="form-control" placeholder="Trade/Brand Name" name="tbrandname">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nature of Business*</label>
                                                    <input type="text" id="natureofb" class="form-control" placeholder="Nature of Business" name="natureofb" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" id="address" class="form-control" placeholder="Address" name="address">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Postcode*</label>
                                                    <input type="text" id="postcode" class="form-control" placeholder="Postcode" name="postcode" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" id="city" class="form-control" placeholder="City" name="openedby">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State*</label>
                                                    <select name="state" class="form-control">
                                                        <option value="">---</option>
                                                        <option value="Johor">Johor</option>
                                                        <option value="Kedah">Kedah</option>
                                                        <option value="Kelantan">Kelantan</option>
                                                        <option value="Labuan">Labuan</option>
                                                        <option value="Melaka">Melaka</option>
                                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                        <option value="Pahang">Pahang</option>
                                                        <option value="Perak">Perak</option>
                                                        <option value="Perlis">Perlis</option>
                                                        <option value="Pulau Pinang">Pulau Pinang</option>
                                                        <option value="Sabah">Sabah</option>
                                                        <option value="Sarawak">Sarawak</option>
                                                        <option value="Selangor">Selangor</option>
                                                        <option value="Terengganu">Terengganu</option>
                                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                        <option value="Putrajaya">Putrajaya</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country*</label>
                                                    <select name="country" class="form-control">
                                                        <option value="">---</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="United States">United States</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="-----">-----</option>
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bonaire">Bonaire</option>
                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island (Bouvetoya)">Bouvet Island (Bouvetoya)</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory (Chagos Archipelago)">British Indian Ocean Territory (Chagos Archipelago)</option>
                                                        <option value="British Virgin Islands">British Virgin Islands</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Curaçao">Curaçao</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernsey">Guernsey</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran">Iran</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea">Korea</option>
                                                        <option value="Korea">Korea</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyz Republic">Kyrgyz Republic</option>
                                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macao">Macao</option>
                                                        <option value="Macedonia">Macedonia</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Micronesia">Micronesia</option>
                                                        <option value="Moldova">Moldova</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montenegro">Montenegro</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco">Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestinian Territory">Palestinian Territory</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn Islands">Pitcairn Islands</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russian Federation">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Barthelemy">Saint Barthelemy</option>
                                                        <option value="Saint Helena">Saint Helena</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Martin">Saint Martin</option>
                                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Serbia">Serbia</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Sint Maarten (Netherlands)">Sint Maarten (Netherlands)</option>
                                                        <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia &amp; S. Sandwich Islands">South Georgia &amp; S. Sandwich Islands</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard &amp; Jan Mayen Islands">Svalbard &amp; Jan Mayen Islands</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option value="Taiwan">Taiwan</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania">Tanzania</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Timor-Leste">Timor-Leste</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                                        <option value="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Vietnam">Vietnam</option>
                                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>Interested Location(tick where applicable)*</p>
                                                    <p>Choose</p>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value=""> Healthcare/Wellness
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value=""> Retail
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <p>Interested Location(tick where applicable)*</p>
                                                    <p>Choose</p>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value=""> LifeCare, Bangsar South
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value=""> LifeCare, Cheras South
                                                    </label>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" value=""> LifeCare DK Mall, SS2
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Space Requirements (SQFT)*</label>
                                                    <select name="spacerequirement" class="form-control">
                                                        <option value="">---</option>
                                                        <option value="<1000 sqft">&lt;1000 sqft </option>
                                                        <option value="1,001 - 3,000 sqft">1,001 - 3,000 sqft</option>
                                                        <option value="3.001 - 5,000 sqft">3.001 - 5,000 sqft</option>
                                                        <option value=">5,001 sqft">&gt;5,001 sqft</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rental Budget (RM/SF)*</label>
                                                    <select name="rental-budget" class="form-control" aria-required="true" aria-invalid="false">
                                                        <option value="">---</option>
                                                        <option value="<RM8 PSF">&lt;RM8 PSF </option>
                                                        <option value=">RM8 PSF">&gt;RM8 PSF</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Other Requirements/Enquiries</label>
                                                    <textarea id="otherrequirement" rows="5" class="form-control" name="otherrequirement" placeholder="Other Requirements/Enquiries..."></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">By providing my personal information in this form, I consent to the processing of my personal data by Life Care Diagnostic Medical Centre Sdn. Bhd.,in accordance to its <a href="privacy.html">privacy policy.</a>
                                                    </label>
                                                </div>
                                            </div>
{{--                                        </div>--}}

                                    </div>

                                    <div class="form-actions text-right">
                                        <button type="submit" class="button btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================ enquiry section end ================= -->
@endsection
