<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sero</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('cms/assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <!-- if language ar and en -->
    @if (  LaravelLocalization::getCurrentLocaleDirection()  == 'rtl')
    <link href="{{ asset('cms/css/styles.rtl.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cms/css/style2.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/bootstrap.rtl.min.css') }}">
    @else
    <link href="{{ asset('cms/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cms/css/style2.css') }}">
    @endif


    <link rel="stylesheet" href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        ::-webkit-scrollbar{
             width: 10px;

        }
        ::-webkit-scrollbar-track {
            background:white;

        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 50px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        ::-webkit-scrollbar-thumb:active {
            background: #212375;
        }

    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('cms/assets/img/551).svg') }}" alt="" style="width: 65px; height: 65px;"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

                    <i class="fas fa-bars"></i>
                </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto d-flex justify-content-center align-content-center align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i> {{ __("Home") }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url("cms/web/login") }}" ><i class="fas fa-sign-in-alt"></i> {{ __("sign in") }}</a></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            {{-- <a class="dropdown-toggle text-decoration-none text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('cms/assets/img/en-US.png')}}" alt="" style="width: 25px; height: 25px; border-radius: 50%;"> En - English</a> --}}
                            <a class="dropdown-toggle text-decoration-none text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">  {{ __('language') }}</a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach


                            </ul>
                          </div>
                  </li>
                  @if (Auth::guard('web')->id())
                  <div class="dropdown m-3">
                      {{-- <a class="dropdown-toggle text-decoration-none text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('cms/assets/img/en-US.png')}}" alt="" style="width: 25px; height: 25px; border-radius: 50%;"> En - English</a> --}}
                      <a class="dropdown-toggle text-decoration-none text-white" href="#" role="button"
                          id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          @if (auth('web')->user()->image != '')

                          <img src="{{ asset('storage/images/register/'.auth('web')->user()->image) }}" alt="Logo" style="width: 25px; height: 25px;">

                          @else

                          <img src="{{ asset('storage/images/userSolid.png') }}" alt="Logo" style="width: 25px; height: 25px; border-radius: 50%">

                          @endif
                           {{ auth('web')->user()->full_name }}
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li class="nav-item ">
                              <a href="{{ route('logout') }}" class="nav-link text-black">
                                  <i class="fas fa-sign-out-alt ml-2"></i>
                                       {{ __("Log Out") }}
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('profile_edit_user') }}" class="nav-link text-black">
                                  <i class="fas fa-user ml-2"></i>
                                      {{ __("Profile") }}
                              </a>
                          </li>
                      </ul>
                  </div>

                  @endif




            </div>
            </ul>
        </div>
        </div>
    </nav>


    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">{{ __("Welcome To") }} <span>{{ __('Sero') }}</span></h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">{{__("The journey of travel through three easy, easy and fast steps")}}</h2>
                </div>
            </div>
        </div>
        <div class="warpper">
            <input class="radio" id="one" name="group" type="radio" checked>
            <input class="radio" id="two" name="group" type="radio">
            <input class="radio" id="three" name="group" type="radio">
            <div class="tabs col-8 d-flex justify-content-center ">
                <label class="tab" id="one-tab" for="one"><i class="fab fa-cc-visa"></i> {{ __("Visa") }}</label>
                <label class="tab" id="two-tab" for="two"><i class="fas fa-plane-departure"></i>{{ __("Flights") }}</label>
            </div>
            <div class="panels col-10">

                <div class="panel" id="one-panel">
                    <div class="add1 d-flex flex-wrap justify-content-center align-content-center align-items-center">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <label for="Location" class="form-label">{{ __("Destination") }} <span>*</span></label>
                            <select id="Location" class="form-control col-4" name="Location">
                                <option value="Makkah">{{ __("Makkah") }}</option>
                                <option value="Madinah">{{ __("Madinah") }}</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <label for="date-in" class="form-label">{{ __("From") }} <span>*</span></label>
                            <input type="date" name="date-in" id="date-in" class="form-control col-4">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <label for="date-out" class="form-label">{{ __("To") }} <span>*</span></label>
                            <input type="date" name="date-out" id="date-out" class="form-control col-4">
                        </div>

                        <div class="dropdown col-12 col-sm-12 col-md-6 col-lg-4">
                            <label for="btnMenu" class="form-label">{{__("Details")}} <span>*</span></label>
                            <a class="btn btn-secondary dropdown-toggle-sp form-control w-100">
                                <span class="adults_num">0</span> Adults <span class="children_num">0</span> Children <span class="rooms_num">0</span> Rooms
                            </a>
                            <ul class="dropdown-menu-sp" id="btnMenu">
                                <div class="li_parent adults">
                                    <div class="minus_btn"><span> - </span></div>
                                    <div class="num_parent"><span class="num">0</span><span class="label"> adults </span></div>
                                    <div class="positive_btn"><span>+</span></div>
                                </div>
                                <div class="li_parent children">
                                    <div class="minus_btn"><span> - </span></div>
                                    <div class="num_parent"><span class="num">0</span><span class="label"> Children </span></div>
                                    <div class="positive_btn"><span>+</span></div>
                                </div>
                                <div class="li_parent rooms">
                                    <div class="minus_btn"><span> - </span></div>
                                    <div class="num_parent"><span class="num">0</span><span class="label"> Rooms </span></div>
                                    <div class="positive_btn"><span>+</span></div>
                                </div>
                            </ul>
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <label for="Route" class="form-label">{{ __("Route") }}<span>*</span></label>
                            <select class="form-control" id="Route" name="Route">
                                <option value="">{{__("Select Route")}}</option>
                                <option value="58">Jeddah - Makkah - Madinah - Madinah Airport</option>
                                <option value="59">Parking - Harams Station</option>
                                <option value="60">Jeddah - Makkah - Madinah - Madinah Airport with Institutional
                                    Isolation</option>
                                <option value="67">Yanbu - makkah - madinah - Yanbu</option>
                                <option value="69">jeddah-makkah-jeddah</option>
                            </select>
                        </div>

                        {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <label for="Nationality" class="form-label">Nationality <span>*</span></label>
                            <select id="Nationality" class="form-control col-3" name="Nationality">
                                <option value="">Select Nationality</option>
                                <option value="BH">Bahrain</option>
                                <option value="KW">Kuwait</option>
                                <option value="OM">Oman</option>
                                <option value="QA">Qatar</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="">----Other Nationalities----</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IT">Italy</option>
                                <option value="CI">Ivory Coast</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea(North Korea)</option>
                                <option value="KR">Korea(South Korea)</option>
                                <option value="XK">Kosovo</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao PDR</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macau</option>
                                <option value="MK">Macedonia</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldova</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="AN">Netherlands Antilles</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestine</option>
                                <option value="PS">Palestine</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="RE">Reunion Island</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian</option>
                                <option value="RW">Rwanda</option>
                                <option value="SH">Saint Helena</option>
                                <option value="SH">Saint Helena</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SN">Senegal</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syria</option>
                                <option value="TW">Taiwan</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TH">Thailand</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States of America</option>
                                <option value="UY">Uruguay</option>
                                <option value="UM">US Minor Outlying Islands</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VA">Vatican City</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="VI">Virgin Islands (U.S.)</option>
                                <option value="WF">Wallis and Futuna Islands</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </div> --}}

                        {{-- <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                            <label for="residence_nationality" class="form-label">residence_nationality
                                <span>*</span></label>
                            <select id="residence_nationality" class="form-control col-3"
                                name="residence_nationality">
                                <option value="">Select Residence Country</option>
                                <option value="AF">Afghanistan</option>
                                <option value="AL">Albania</option>
                                <option value="DZ">Algeria</option>
                                <option value="AS">American Samoa</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarctica</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AG">Antigua and Barbuda</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AU">Australia</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaijan</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BY">Belarus</option>
                                <option value="BE">Belgium</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="BO">Bolivia</option>
                                <option value="BA">Bosnia and Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BR">Brazil</option>
                                <option value="IO">British Indian Ocean Territory</option>
                                <option value="BN">Brunei Darussalam</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="KH">Cambodia</option>
                                <option value="CM">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="CV">Cape Verde</option>
                                <option value="KY">Cayman Islands</option>
                                <option value="CF">Central African Republic</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CC">Cocos (Keeling) Islands</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comoros</option>
                                <option value="CG">Congo</option>
                                <option value="CK">Cook Islands</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croatia</option>
                                <option value="CU">Cuba</option>
                                <option value="CW">Curaçao</option>
                                <option value="CY">Cyprus</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="DO">Dominican Republic</option>
                                <option value="EC">Ecuador</option>
                                <option value="EG">Egypt</option>
                                <option value="SV">El Salvador</option>
                                <option value="GQ">Equatorial Guinea</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Ethiopia</option>
                                <option value="FK">Falkland Islands (Malvinas)</option>
                                <option value="FO">Faroe Islands</option>
                                <option value="FJ">Fiji</option>
                                <option value="FI">Finland</option>
                                <option value="FR">France</option>
                                <option value="GF">French Guiana</option>
                                <option value="PF">French Polynesia</option>
                                <option value="GA">Gabon</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="DE">Germany</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GR">Greece</option>
                                <option value="GL">Greenland</option>
                                <option value="GD">Grenada</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="HU">Hungary</option>
                                <option value="IS">Iceland</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IR">Iran</option>
                                <option value="IQ">Iraq</option>
                                <option value="IE">Ireland</option>
                                <option value="IT">Italy</option>
                                <option value="CI">Ivory Coast</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japan</option>
                                <option value="JO">Jordan</option>
                                <option value="KZ">Kazakhstan</option>
                                <option value="KE">Kenya</option>
                                <option value="KI">Kiribati</option>
                                <option value="KP">Korea(North Korea)</option>
                                <option value="KR">Korea(South Korea)</option>
                                <option value="XK">Kosovo</option>
                                <option value="KW">Kuwait</option>
                                <option value="KG">Kyrgyzstan</option>
                                <option value="LA">Lao PDR</option>
                                <option value="LV">Latvia</option>
                                <option value="LB">Lebanon</option>
                                <option value="LS">Lesotho</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libya</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lithuania</option>
                                <option value="LU">Luxembourg</option>
                                <option value="MO">Macau</option>
                                <option value="MK">Macedonia</option>
                                <option value="MG">Madagascar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Maldives</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MH">Marshall Islands</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauritania</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">Mexico</option>
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldova</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="MS">Montserrat</option>
                                <option value="MA">Morocco</option>
                                <option value="MZ">Mozambique</option>
                                <option value="MM">Myanmar</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NL">Netherlands</option>
                                <option value="AN">Netherlands Antilles</option>
                                <option value="NC">New Caledonia</option>
                                <option value="NZ">New Zealand</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk Island</option>
                                <option value="MP">Northern Mariana Islands</option>
                                <option value="NO">Norway</option>
                                <option value="OM">Oman</option>
                                <option value="PK">Pakistan</option>
                                <option value="PW">Palau</option>
                                <option value="PS">Palestine</option>
                                <option value="PS">Palestine</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua New Guinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippines</option>
                                <option value="PL">Poland</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Reunion Island</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russian</option>
                                <option value="RW">Rwanda</option>
                                <option value="SH">Saint Helena</option>
                                <option value="SH">Saint Helena</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="KN">Saint Kitts and Nevis</option>
                                <option value="LC">Saint Pierre and Miquelon</option>
                                <option value="VC">Saint Vincent and the Grenadines</option>
                                <option value="WS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome and Principe</option>
                                <option value="SA">Saudi Arabia</option>
                                <option value="SN">Senegal</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapore</option>
                                <option value="SK">Slovakia</option>
                                <option value="SI">Slovenia</option>
                                <option value="SB">Solomon Islands</option>
                                <option value="SO">Somalia</option>
                                <option value="ZA">South Africa</option>
                                <option value="SS">South Sudan</option>
                                <option value="ES">Spain</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Suriname</option>
                                <option value="SZ">Swaziland</option>
                                <option value="SE">Sweden</option>
                                <option value="CH">Switzerland</option>
                                <option value="SY">Syria</option>
                                <option value="TW">Taiwan</option>
                                <option value="TJ">Tajikistan</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TH">Thailand</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad and Tobago</option>
                                <option value="TN">Tunisia</option>
                                <option value="TR">Turkey</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks and Caicos Islands</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="US">United States of America</option>
                                <option value="UY">Uruguay</option>
                                <option value="UM">US Minor Outlying Islands</option>
                                <option value="UZ">Uzbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VA">Vatican City</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="VI">Virgin Islands (U.S.)</option>
                                <option value="WF">Wallis and Futuna Islands</option>
                                <option value="YE">Yemen</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabwe</option>
                            </select>
                        </div> --}}

                        <div class=" btn1 col-12 col-sm-12 col-md-6 col-lg-4">
                            <button type="button" class="btn p-2 w-100">{{ __('Search') }}</button>
                        </div>

                    </div>
                </div>
                <div class="panel" id="two-panel">
                    <div class="add2 d-flex flex-wrap justify-content-center align-content-center align-items-center">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <label for="date-in" class="form-label">{{ __("From") }} <span>*</span></label>
                            <input type="text" name="date-in" id="date-in" class="form-control col-3"
                                placeholder="{{ __("From") }}">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <label for="date-out" class="form-label">{{ __("To") }} <span>*</span></label>
                            <input type="text" name="date-out" id="date-out" class="form-control col-3"
                                placeholder="{{ __("To") }}">
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <label for="date-in" class="form-label">Checkin <span>*</span></label>
                            <input type="date" name="date-in" id="date-in" class="form-control col-3">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <label for="date-out" class="form-label">Checkout <span>*</span></label>
                            <input type="date" name="date-out" id="date-out" class="form-control col-3">
                        </div>
                        <div class="btn1 col-12 col-sm-12 col-md-6 col-lg-3 d-flex justify-content-center m-auto">
                            <button class="btn p-2 w-100" type="submit">{{ __("Search") }}</button>
                        </div>
                    </div>
                </div>
                <div class="panel" id="three-panel">
                    <div class="panel" id="three-panel">
                        <div
                            class="add2 d-flex flex-wrap justify-content-start align-content-center align-items-center">

                        </div>
                    </div>
                </div>
            </div>
    </header>
    <!-- About-->
    <section class="about-section text-center" id="about">

    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-6"><img class="img-fluid mb-3 mb-lg-0 w-100" src="{{ asset('cms/assets/img/WhatsApp Image 2022-06-19 at 4.08.40 PM.svg') }}" alt="..." /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>{{ __('About Us') }}</h4>
                        <p>{{ __("'Sero' is a step that started its journey from the era of the founder, may God rest his soul, whose first goal is to facilitate the matters of tourism and travel for travelers by providing multiple services at flexible prices.") }}</p>
                    </div>
                </div>
            </div>

            <!-- Project One Row-->
        </div>
    </section>
    <section class="save container col-10">
        <img src="{{ asset('cms/assets/img/save.jpeg') }}" alt="">
    </section>
    <!-- Travel packages-->
    <section id="packages" class="container d-flex justify-content-center align-items-center align-content-center flex-wrap gap-4" style="padding: 10rem 0;">
        <figure class="snip1577">
            <img src="{{ asset('cms/assets/img/111.jpg') }}" alt="sample99" />
            <figcaption>
              <h3 class="p-1">{{ __('Abha city tour') }}</h3>
              <h4><div class="col card-social">
                <a class="mx-2 " href="https://twitter.com/serovision1?s=21&t=ObGKxjr4RhzOnCC9EgP2mg"><i class="fab fa-twitter "></i></a>
                <a class="mx-2 " href="https://www.facebook.com/profile.php?id=100082581573020"><i class="fab fa-facebook-f "></i></a>
                <a class="mx-2 " href="https://www.instagram.com/serovision.1/"><i class="fab fa-instagram "></i></a>
                <a class="mx-2 " href="https://wa.me/message/PTITBIUHHPWWJ1"><i class="fab fa-whatsapp "></i></a>
                </div></h4>
            </figcaption>
            <a href="#"></a>
          </figure>
          <figure class="snip1577">
            <img src="{{ asset('cms/assets/img/222.jpg') }}" alt="sample99" />
            <figcaption>
              <h3 class="p-1">{{ __('A tour in Taif') }}</h3>
              <h4><div class="col card-social">
                <a class="mx-2 " href="https://twitter.com/serovision1?s=21&t=ObGKxjr4RhzOnCC9EgP2mg"><i class="fab fa-twitter "></i></a>
                <a class="mx-2 " href="https://www.facebook.com/profile.php?id=100082581573020"><i class="fab fa-facebook-f "></i></a>
                <a class="mx-2 " href="https://www.instagram.com/serovision.1/"><i class="fab fa-instagram "></i></a>
                <a class="mx-2 " href="https://wa.me/message/PTITBIUHHPWWJ1"><i class="fab fa-whatsapp "></i></a>
                </div></h4>
            </figcaption>
            <a href="#"></a>
          </figure>
          <figure class="snip1577">
            <img src="{{ asset('cms/assets/img/333.jpg') }}" alt="sample99" />
            <figcaption>
              <h3 class="p-1">{{ __('Diving trip in Jeddah') }}</h3>
              <h4><div class="col card-social">
                <a class="mx-2 " href="https://twitter.com/serovision1?s=21&t=ObGKxjr4RhzOnCC9EgP2mg"><i class="fab fa-twitter "></i></a>
                <a class="mx-2 " href="https://www.facebook.com/profile.php?id=100082581573020"><i class="fab fa-facebook-f "></i></a>
                <a class="mx-2 " href="https://www.instagram.com/serovision.1/"><i class="fab fa-instagram "></i></a>
                <a class="mx-2 " href="https://wa.me/message/PTITBIUHHPWWJ1"><i class="fab fa-whatsapp "></i></a>
                </div></h4>
            </figcaption>
            <a href="#"></a>
          </figure>
    </section>

    <!-- Footer -->
        <footer>
        	<div class="footer-top">
		        <div class="container">
		        	<div class="row">
		        		<div class="col-md-3 footer-about wow fadeInUp">
		        			<h3>{{__("About us")}}</h3>
		        			<p>
		        				{{ __("Sero is a Saudi company operating on a global scale") }}
		        			</p>
		        			<p>{{ __("All rights reserved Privacy Policy") }} &copy; {{__("Sero 2022 - 2023")}}</p>
	                    </div>
		        		<div class="col-md-4 offset-md-1 footer-contact wow fadeInDown" >
		        			<h3>{{__("Contact")}}</h3>
		                	<p><i class="fas fa-map-marker-alt"></i> {{__("Address")}} : <a href="https://goo.gl/maps/XDdhFi7ybUqznFH97">{{ __("tariq almalik eabdallah alfarei , almadinat almunawara") }}</a></p>
		                	<p><i class="fas fa-phone"></i> {{__("Phone")}} : <a href="tel:+966920007075">+966920007075</a></p>
		                	<p><i class="fas fa-envelope"></i> {{__("Email")}} : <a href="mailto:info@sero.com.sa">info@sero.com.sa</a></p>
	                    </div>
	                    <div class="col-md-4 footer-links wow fadeInUp">
	                    	<div class="row">
	                    		<div class="footer-contact col-md-6">
                                    <h3>{{__("Links")}}</h3>
	                    			<p><a href="{{ route("home") }}">{{__("Home")}}</a></p>
	                    			<p><a href="#projects">{{__("About us")}}</a></p>
	                    			<p><a href="#packages">{{__("Travel packages")}}</a></p>
                                        <!-- link trigger modal -->
                                        <p><a href="" data-bs-toggle="modal" data-bs-target="#Modal">{{ __("privacy policy") }}</a></p>

                                        <!-- Modal -->
                                        <div class="modal modal-fullscreen-lg-down text-center fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-black" id="ModalLabel">{{ __("privacy policy") }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-black">
                                                        <div class=" p-5">

                                                            <h3 class="text-danger">{{ __("Sero com platform rules and policies") }}</h3>
                                                            <p>{{ __("Our company and all our systems are subject to the general system and policies of the country of origin, which is the Kingdom of Saudi Arabia. Currently, we accept online payments by using credit cards, which include “Visa and MasterCard” cards and can be debited through the currency available in the services via the platform, which can be in Saudi riyals or US dollars, In the event that you wish to usee the electronic payment method via the Internet, there must be a match and complete authorization and a match in the details in the customer ID and the ID of the card holder, which must be completely identical to make purchases") }}</p>

                                                            <p>{{ __("In cases of refund, only refundable amounts of transactions made on this electronic platform will be refunded to the original payment method through which the payment for the transactions was completed.") }}

                                                            <p>{{ __("Some basic data related to delivery information, such as customer name, location, postal address and contact numbers, will be stored for the purposes of ensuring delivery. Other personally identifiable information will not be stored.") }}</p>

                                                            <h3 class="text-danger">{{ __("Cancellation fees") }}
                                                            </h3>
                                                            <ul>
                                                                <li>{{ __("If cancellation is made between 0 days – 24 days prior to the departure date, 100% of the reservations value will be deducted and will not be refunded in any way.") }}</li>

                                                                <li>{{ __("If the cancellation is made within a period of time between 25 to 60 days before the scheduled departure date, 50% of the reservation value will be deducted.") }}</li>

                                                                <li>{{ __("If the cancellation is made within a period of time equal to or greater than 61 days from the scheduled departure date, only 10% of the total value of the reservations will be charged.") }}</li>

                                                                <li>{{ __("In the event that the name of the data provided in the reservations does not match the data details in the passport, a fine of only 150 Saudi riyals will be required to change the name of the traveler if the change is possible") }}</li>

                                                                <li>{{ __("For hotels, the siro.com platform does not charge any special additional fees to provide cancellation services as an additional fee in addition to the cancellation fees charged by the hotel in its cancellation policy") }}</li>
                                                            </ul>

                                                            <h3 class="text-danger">{{ __("General Provisions") }}</h3>

                                                            <p>{{ __("Through our platform, you can book and travel to any specific destinations you wish, and these destinations may involve greater risks than others, whatever kind of risk, and you will have to bear all responsibility in terms of costs, consequences and full personal responsibility") }}</p>

                                                            <p>{{ __("sero com platform requests its travelers and all guests to consult the local authorities in their country or the country of travel, and to evaluate travel ban decisions, warnings, advertisements or all instructions issued by local authorities before booking travel to international or domestic destinations in general, certain regions and destinations Especially without any responsibility on the platform") }}</p>

                                                            <p>{{ __("By providing and selling travel and reservation services to certain countries or destinations, the siro com platform is not in any way responsible or liable for the warning or risks in those destinations, and the siro platform is not considered a guarantor or recommender of travel to these destinations, and the siro platform does not bear any responsibility for Damages, losses or delays that may result from failure to provide correct documents relating to travel, entry, exit or length of stay at those destinations") }}</p>

                                                            <p>{{ __("Sero Platform and its affiliates, agencies, or suppliers are not responsible in any way for errors, acts, omissions, representations, warranties, violations or negligence made by any airline, hotel or other service provider, and the platform is not responsible for Any personal injury, death, property damage, or any other damages, fees or expenses arising therefrom, Neither Sero nor any of the companies and agents it deals with or any of the service providers of the platform assume any responsibility and will not refund the money in the event of any delay, cancellation of reservation, increase in taxes, force majeure, strikes and riots, or any other actions Others are out of direct control, and the platform shall not be liable for any additional expenses, litigation, delay, redirection, or litigation to any parties or authorities") }}</p>

                                                            <p>{{ __("Sero Platform reserves its exclusive and complete rights and in its sole discretion to delete, change, limit or discontinue the Site or any material posted on it, and is under no obligation to take into account the needs of any user in connection therewith.") }}</p>

                                                            <p>{{ __("Sero Platform reserves all its exclusive rights to prevent or deny access to any user of this website or any part of it without prior notice.") }}</p>

                                                            <p>{{ __("By agreeing to the terms and conditions relating to any of the operations on this platform, you expressly and are bound to agree to be bound by the terms and conditions of purchase and services imposed by any provider or supplier of the service you choose to deal with, including, but not limited to, the payment of all amounts when due in accordance with to the restrictions and rules imposed by the provider or supplier of the services in relation to the availability of the services and the timely use of prices, products or services, and you acknowledge that there may be additional requirements from some suppliers and/or a third party In relation to a third party, the provision of the Service or participation in the Participation, and that you are fully aware that the terms, conditions, rules, and restrictions imposed on the Offer may result in the cancellation of your reservations, or that the Sero Platform debits your account for costs incurred by the Platform as a result of your stay") }}</p>

                                                            <p>{{ __("No waiver by Sero platform shall be deemed or enforceable in any of the terms and conditions and in any form whatsoever, as is binding, what is stated in writing on the site, or approved and signed by its authorized representative in accordance with the regulations and laws") }}</p>

                                                            <p>{{ __("All these terms and conditions shall be governed by and construed in accordance with the laws and regulations in force in the Kingdom of Saudi Arabia, and any dispute shall be subject to the exclusive jurisdiction of the appropriate and competent courts and judicial organs located in the Kingdom of Saudi Arabia.") }}</p>

                                                            <h3 class="text-danger">{{ __("Payment terms and conditions") }}</h3>

                                                            <p>{{ __("Neither the Sero platform nor its developer will and will not request, store or share any data related to customers credit cards, login data for their bank accounts, or prepaid cards over the phone or e-mail and under any circumstances") }}</p>

                                                            <p>{{ __("In the event of a note on payments through our electronic payment gateway, our security team will contact you via e-mail from the following address info@sero.com.sa, and a photo of the credit card will be requested from the front and back on the CVV code For verification, please contact the secure email address: info@sero.com.sa") }}</p>

                                                            <p>{{ __("In the event that you receive any communication or email from another email address purporting to be sent to you by the Siro platform and requesting any personal or security data, please never reply to that email, and please forward such message to our specialized email which is info@sero.com.sa You will also have to delete, directly and immediately, this anonymous message") }}</p>

                                                            <h3 class="text-danger">{{ __("Payment for the services provided by the Sero platform can be paid through the following channels:") }}</h3>

                                                            <ul>
                                                                <li>{{ __("The electronic payment gateway page on our website") }}</li>
                                                                <li>{{ __("Electronic payment via the secure link on the domain of the Siro platform") }}</li>
                                                                <li>{{ __("Deposit cash into the Siro platform account at Alinma Bank according to the following IBAN data (IBAN SA1205000068203403610000)") }}</li>
                                                            </ul>

                                                            <p>{{ __("The user will be warned, and confirmed to agree that he will create electronic payments and that he will issue or create electronic payment instructions and that he will provide his card or credit card data or his or her bank data") }}</p>

                                                            <p>{{ __("The user is considered the legal user and authorized to use his credit card or bank account, and he is considered legally authorized to carry out payments, withdrawals and bank debits from his accounts in favor of these operations") }}</p>

                                                            <p>{{ __("The user fully bears all responsibility related to the need to ensure that he has provided the card or bank account details accurately and correctly") }}</p>

                                                            <p>{{ __("The user will authorize the debiting of the credit card or/and the bank account specified by him for payment in favor of the Sero platform") }}</p>

                                                            <p>{{ __("The user / customer bears all responsibility for providing sufficient cash balance in the credit card / or bank account that he will use during the payment process for the financial dues and invoices resulting from the services and reservations chosen by him, bearing in mind that all payments are inclusive of all fees related to") }}</p>


                                                            <h3 class="text-danger">{{ __("Visa Terms and Conditions") }}</h3>

                                                            <p>{{ __("Nationals of the Arabian Gulf [GCC countries] do not need to obtain a visa, and these terms and conditions relate to all other nationalities outside of the Gulf Cooperation Council countries") }}</p>

                                                            <ul>
                                                                <li>{{ __("Tourist visa is not valid for work or residence") }}</li>

                                                                <li>{{ __("The standard duration of a tourist visa is 90 days (unless the visa states otherwise on the sticker or printed visa document).") }}</li>

                                                                <li>{{ __("The tourist must not default or exceed the legal period of the visa, and violating this is considered a violation of the laws of the Kingdom of Saudi Arabia, and the violator will be subject to legal procedures and legal penalties, which may include, but are not limited to financial fines or even access to a ban on entering the Kingdom of Saudi Arabia in the future") }}</li>

                                                                <li>{{ __("A passport must be valid and valid for a period of no less than six months, and it must be capable of entering the Kingdom of Saudi Arabia and then the next destination. At least two blank pages must be available in the passport, corresponding to one another.") }}</li>

                                                                <li>{{ __("Al-Sayeh had to cooperate fully with the work team of the Sero platform to fill in and verify the data as follows") }}</li>

                                                                <li>{{ __("Al-Sayeh is responsible and accountable for the correctness and safety of all the data he submits to the platform, as well as the safety and authenticity of all documents that he will submit to the Siro platform team, including all documents and data that Al-Sayeh himself uploads on the Siro website") }}</li>

                                                                <li>{{ __("Tourist visa fees are not refundable or refundable in any way, in the event that the tourist decides to cancel a trip after the issuance of the visa reference number (MOVA), [issued after the success of the tourist visa application]") }}</li>

                                                                <li>{{ __("Sero platform or its team does not bear any legal responsibility or any complaints related to the customer’s violation of the terms, conditions and codes referred to above, and the policies and procedures related to them, and does not accept any kind of liability of any kind in this regard.") }}</li>

                                                                <li>{{ __("Visitors to the Kingdom of Saudi Arabia must obey the Islamic laws and regulations of the Kingdom and the controls, customs and traditions related to its civilization and society.") }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
	                    		</div>
	                    	</div>
	                    </div>
		            </div>
		        </div>
	        </div>
	        <div class="footer-bottom">
	        	<div class="container">
	        		<div class="row">
	           			<div class="col footer-social text-center">
	                    <a class="mx-2 " href="https://twitter.com/serovision1?s=21&t=ObGKxjr4RhzOnCC9EgP2mg"><i class="fab fa-twitter "></i></a>
                        <a class="mx-2 " href="https://www.facebook.com/profile.php?id=100082581573020"><i class="fab fa-facebook-f "></i></a>
                        <a class="mx-2 " href="https://www.instagram.com/serovision.1/"><i class="fab fa-instagram "></i></a>
                        <a class="mx-2 " href="https://wa.me/message/PTITBIUHHPWWJ1"><i class="fab fa-whatsapp "></i></a>
	                    </div>
	           		</div>
	        	</div>
	        </div>
        </footer>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('cms/js/scripts.js') }}"></script>
 <!-- Bootstrap core JS-->
 <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    <script src="scripts/third_page.js"></script>
    {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</body>


</html>
