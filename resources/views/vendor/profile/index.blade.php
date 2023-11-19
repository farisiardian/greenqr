@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Account Settings /</span> My Profile
        </h4>
        <div class="row">
            <div class="col-md-12">
                @include('vendor.profile.tabbar')
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->

                    <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="{{route('v_profile.update',['v_profile'=>Auth::user()->id])}}">
                        @csrf
                        {{method_field('put')}}
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                @if(Auth::user()->profile_image != null)
                                    <img src="{{asset('storage/'.Auth::user()->profile_image)}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                @else
                                    <img src="{{asset('admin/assets/img/avatars/3.png')}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                @endif

                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" name="image" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>
                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                </div>
								{{QrCode::size(250)->generate('http://206.189.87.244/shop.show/'.Auth::user()->id)}}
                            </div>
                        </div>
						
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">Name</label>
                                    <input class="form-control" type="text" id="firstName" name="name" placeholder="Name" value="{{Auth::user()->name}}"   autofocus />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email" value="{{Auth::user()->email}}"  placeholder="E-mail" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="icpassword" class="form-label">Ic</label>
                                    <input type="text" class="form-control" id="icpassword" name="icpassword" value="{{Auth::user()->ic}}" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">(+60)</span>
                                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="202 555 0111" value="{{Auth::user()->phone}}" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="country" class="form-label">Nationality</label>
                                    <select name="country" class="select2 form-select">
                                        <option value="">---</option>
                                        <option value="Malaysia" @if(Auth::user()->nationality == 'Malaysia') selected @endif>Malaysia</option>
                                        <option value="United States" @if(Auth::user()->nationality == 'United States') selected @endif>United States</option>
                                        <option value="Canada" @if(Auth::user()->nationality == 'Canada') selected @endif>Canada</option>
                                        <option value="Mexico" @if(Auth::user()->nationality == 'Mexico') selected @endif>Mexico</option>
                                        <option value="United Kingdom" @if(Auth::user()->nationality == 'United Kingdom') selected @endif>United Kingdom</option>
                                        <option value="Afghanistan" @if(Auth::user()->nationality == 'Afghanistan') selected @endif>Afghanistan</option>
                                        <option value="Albania" @if(Auth::user()->nationality == 'Albania') selected @endif>Albania</option>
                                        <option value="Algeria" @if(Auth::user()->nationality == 'Algeria') selected @endif>Algeria</option>
                                        <option value="American Samoa" @if(Auth::user()->nationality == 'American Samoa') selected @endif>American Samoa</option>
                                        <option value="Andorra" @if(Auth::user()->nationality == 'Andorra') selected @endif>Andorra</option>
                                        <option value="Angola" @if(Auth::user()->nationality == 'Angola') selected @endif>Angola</option>
                                        <option value="Anguilla" @if(Auth::user()->nationality == 'Anguilla') selected @endif>Anguilla</option>
                                        <option value="Antigua and Barbuda" @if(Auth::user()->nationality == 'Antigua and Barbuda') selected @endif>Antigua and Barbuda</option>
                                        <option value="Argentina" @if(Auth::user()->nationality == 'Argentina') selected @endif>Argentina</option>
                                        <option value="Armenia" @if(Auth::user()->nationality == 'Armenia') selected @endif>Armenia</option>
                                        <option value="Aruba" @if(Auth::user()->nationality == 'Aruba') selected @endif>Aruba</option>
                                        <option value="Australia" @if(Auth::user()->nationality == 'Australia') selected @endif>Australia</option>
                                        <option value="Austria" @if(Auth::user()->nationality == 'Austria') selected @endif>Austria</option>
                                        <option value="Azerbaijan" @if(Auth::user()->nationality == 'Azerbaijan') selected @endif>Azerbaijan</option>
                                        <option value="Bahamas" @if(Auth::user()->nationality == 'Bahamas') selected @endif>Bahamas</option>
                                        <option value="Bahrain" @if(Auth::user()->nationality == 'Bahrain') selected @endif>Bahrain</option>
                                        <option value="Bangladesh" @if(Auth::user()->nationality == 'Bangladesh') selected @endif>Bangladesh</option>
                                        <option value="Barbados" @if(Auth::user()->nationality == 'Barbados') selected @endif>Barbados</option>
                                        <option value="Belarus" @if(Auth::user()->nationality == 'Belarus') selected @endif>Belarus</option>
                                        <option value="Belgium" @if(Auth::user()->nationality == 'Belgium') selected @endif>Belgium</option>
                                        <option value="Belize" @if(Auth::user()->nationality == 'Belize') selected @endif>Belize</option>
                                        <option value="Benin" @if(Auth::user()->nationality == 'Benin') selected @endif>Benin</option>
                                        <option value="Bermuda" @if(Auth::user()->nationality == 'Bermuda') selected @endif>Bermuda</option>
                                        <option value="Bhutan" @if(Auth::user()->nationality == 'Bhutan') selected @endif>Bhutan</option>
                                        <option value="Bolivia" @if(Auth::user()->nationality == 'Bolivia') selected @endif>Bolivia</option>
                                        <option value="Bonaire" @if(Auth::user()->nationality == 'Bonaire') selected @endif>Bonaire</option>
                                        <option value="Bosnia and Herzegovina" @if(Auth::user()->nationality == 'Bosnia and Herzegovina') selected @endif>Bosnia and Herzegovina</option>
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
                                <div class="mb-3 col-md-6">
                                    <label for="dob" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob" value="{{Auth::user()->dob}}" placeholder="Date of Birth" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label d-block">Gender</label>
                                    <div class="form-check form-check-inline mt-3">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" @if(Auth::user()->gender == 'Male') checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female"  @if(Auth::user()->gender == 'Female') checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>

                        </div>
                    </form>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
