<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/cms/css/main.css') }}">
    <title>SERO</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="{{ asset('public/cms/js/main.js') }}"></script>

</head>
<body>

    <div class="page-nav">
        <div class="logo">
            <div class="logo-img">
                <img src="{{ asset('public/cms/assets/img/logo.png') }}">
            </div>
            <div class="logo-name">
                <span class="n1">SERO</span>
            </div>
        </div>
        <div class="trans-parent">
            <div class="translation">
                <img src="{{ asset('public/cms/assets/img/united kingdom.png') }}">
                <span>EN</span>
            </div>
            <div class="trans-selection">
                <div class="trans-select">
                    <img src="{{ asset('public/cms/assets/img/united kingdom.png') }}">
                    <span>EN</span>
                </div>
                <div class="trans-select">
                    <img style="border-radius: 5px;" src="{{ asset('public/cms/assets/img/ar-AE.png') }}">
                    <span>AR</span>
                </div>
            </div>
        </div>
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

    <div class="pages-pointers">
        <div class="pointer active"></div>
        <div class="pointer"></div>
        <div class="pointer"></div>
        <div class="pointer"></div>
    </div>

    <div class="part1">

        <div class="background">
            <img class="ground-img" src="{{ asset('public/cms/assets/img/jaddah.png') }}">
            <img class="ground-cover" src="{{ asset('public/cms/assets/img/background cover.png') }}">
        </div>

        <div class="page-container">
            <img class="welcome-word" src="{{ asset('public/cms/assets/img/welcome.png') }}">
            <img class="to-word" src="{{ asset('public/cms/assets/img/to.png') }}">
            <img class="sero-word" src="{{ asset('public/cms/assets/img/sero.png') }}">
            <img class="travel-word" src="{{ asset('public/cms/assets/img/travel.png') }}">
            <div class="buttons">
                <div class="buton first-btn">
                    <a href="{{ route('local') }}"><span>Travel to</span>&nbsp;<span class="sp">Saudi Arabia</span></a>
                    <div class="shape"></div>
                </div>
                <div class="buton second-btn">
                    <a href="{{ route('b2c') }}"><span>Tourism around</span>&nbsp;<span class="sp">the world</span></a>
                    <div class="shape"></div>
                </div>
            </div>
        </div>

        <div class="travel-line-plans">
            <img class="travel-line first-line" src="{{ asset('public/cms/assets/img/travel line.png') }}">
            <img class="travel-line second-line" src="{{ asset('public/cms/assets/img/travel line.png') }}">
            <img class="travel-line third-line" src="{{ asset('public/cms/assets/img/travel line.png') }}">
            <img class="travel-plan first-plan" src="{{ asset('public/cms/assets/img/travel plan1.png') }}">
            <img class="travel-plan second-plan" src="{{ asset('public/cms/assets/img/travel plan2.png') }}">
            <img class="travel-plan third-plan" src="{{ asset('public/cms/assets/img/travel plan3.png') }}">
        </div>

    </div>

    <div class="part2">

        <img class="ground-img" src="{{ asset('public/cms/assets/img/background.jpg') }}">
        <div class="ground-cover"></div>

        <div class="part-header">
            <h1>Flights inside Saudi Arabia</h1>
            <p>You can book an enjoyable or exploratory trip, historical heritage, beach and more for yourself only or with your friends or with your family through the following packages</p>
            <div>- Explore more through the following -</div>
        </div>

        <div class="packages">
            <?php
            use App\Models\Package;
            $packages = Package::orderBy('id','desc')->paginate(6);


            ?>
                @foreach ( $packages as $package )
                <a href="{{ route('viewPackage',$package->id) }}">

            <div class="package" >

                <div class="info">click to see more</div>
                <img class="package-img" src="{{ asset('storage/images/package/'.$package->image) }}">
                <div class="package-cover"></div>
                <div class="package-name">
                    <span>Riyadh</span>
                </div>
                <div class="package-details">
                    <div class="detail">entertainment</div>
                </div>
            </div>
        </a>

            @endforeach


            {{-- <div class="package">
                <div class="info">click to see more</div>
                <img class="package-img" src="{{ asset('public/cms/assets/img/makkah.jpg') }}">
                <div class="package-cover"></div>
                <div class="package-name">
                    <span>Makkah</span>
                </div>
                <div class="package-details">
                    <div class="detail">entertainment</div>
                </div>
            </div>
            <div class="package">
                <div class="info">click to see more</div>
                <img class="package-img" src="{{ asset('public/cms/assets/img/madenah.jpg') }}">
                <div class="package-cover"></div>
                <div class="package-name">
                    <span>Al Madina</span>
                </div>
                <div class="package-details">
                    <div class="detail">entertainment</div>
                </div>
            </div>
            <div class="package">
                <div class="info">click to see more</div>
                <img class="package-img" src="{{ asset('public/cms/assets/img/damam.jpg') }}">
                <div class="package-cover"></div>
                <div class="package-name">
                    <span>Al Damam</span>
                </div>
                <div class="package-details">
                    <div class="detail">entertainment</div>
                </div>
            </div>
            <div class="package">
                <div class="info">click to see more</div>
                <img class="package-img" src="{{ asset('public/cms/assets/img/taeef.jpg') }}">
                <div class="package-cover"></div>
                <div class="package-name">
                    <span>Al Taayif</span>
                </div>
                <div class="package-details">
                    <div class="detail">entertainment</div>
                </div>
            </div>
            <div class="package">
                <div class="info">click to see more</div>
                <img class="package-img" src="{{ asset('public/cms/assets/img/jaddah.png') }}">
                <div class="package-cover"></div>
                <div class="package-name">
                    <span>Jaddah</span>
                </div>
                <div class="package-details">
                    <div class="detail">entertainment</div>
                </div>
            </div> --}}
        </div>
        <div class="pack-block-parent" >



            <div class="package-block" id="">
                <div class="pl-overscroll">
                    <div class="background-image">
                        <img src="{{ asset('storage/images/package/') }}">
                        <div class="bi-cover"></div>
                        <div class="package-close">X</div>
                        <div class="package-price">$ 450</div>
                        <div class="package-bottom">
                            <div class="bi-desc">entertainment</div>
                            <div class="pdt-parent">
                                <div class="package-duration">5 days</div>
                                <div class="start-package-date">05 Octoper 2022</div>
                            </div>
                        </div>
                    </div>

                    <div class="package-content">

                        <div class="package-content-text">
                            <div class="package-name">Riyadh</div>

                            <div class="package-info">
                                <span>Boulevard Riyadh City is one of the biggest zones in the season. Triple in size this year, each of the sub-areas features its own set of activities, restaurants, events, and outlets that are catered to all visitor.</span>
                                <span>It is the largest city on the Arabian Peninsula, and receives around 5 million tourists each year, making it the 49th most visited city in the world and the 6th in the Middle East. Riyadh had a population of 7.6 million people in 2019, making it the most-populous city in Saudi Arabia, 3rd most populous in the Middle East, and 38th most populous in Asia .</span>
                            </div>
                        </div>

                        <div class="ticket-btn-parent">
                            <div class="buy-ticket-btn">Buy Tickets</div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="part3">

        <img class="ground-img" src="{{ asset('public/cms/assets/img/part3 background.jpg') }}">
        <div class="ground-cover"></div>

        <div class="part3-container">
            <div class="logo">
                <img src="{{ asset('public/cms/assets/img/original logo.svg') }}">
            </div>
            <div class="part-text">
                <h1>Why SERO Company ?</h1>
                <p>SERO Travel company Is A Step That Started Its Journey From The Era Of The Founder "May God Rest His Soul", Whose First Goal Is To Facilitate The Matters Of Tourism And Travel For Travelers By Providing Multiple Services At Flexible Prices</p>
                <p>and we are a trusted company by the Ministry of Tourism in Saudi Arabia and also provides many features for customers to provide the best services</p>
                <div class="advantages">
                    <div class="advantage"><img src="{{ asset('public/cms/assets/img/badge.png') }}"><span>Extracting A Visa From Anywhere In The World Within 24 Hours.</span></div>
                    <div class="advantage"><img src="{{ asset('public/cms/assets/img/badge.png') }}"><span>Providing Reservations For All Hotels Around The World.</span></div>
                    <div class="advantage"><img src="{{ asset('public/cms/assets/img/badge.png') }}"><span>Providing Ground Services Of All Kinds (Providing Buses, Metro Tickets, Transportation Services).</span></div>
                    <div class="advantage"><img src="{{ asset('public/cms/assets/img/badge.png') }}"><span>Designing Flexible And Special Packages That Suit Travelers Of All Levels.</span></div>
                    <div class="advantage"><img src="{{ asset('public/cms/assets/img/badge.png') }}"><span>Book Flights At The Lowest Prices With A Group Of Airlines.</span></div>
                </div>
            </div>
        </div>

    </div>

    <div class="part4">

        <img class="ground-img" src="{{ asset('public/cms/assets/img/background.jpg') }}">
        <div class="ground-cover"></div>

        <div class="part-header">
            <h1>What services do we provide ?</h1>
            <p>We can provide many services that help the customer in his trip <br> <span style="color: #a76672;">Discover the many services we offer</span></p>
            <div><svg viewBox="0 0 6 6.12"><path class="st0" d="M5.8,3.52L3.36,5.96c-0.21,0.21-0.55,0.21-0.76,0L0.16,3.52c-0.21-0.21-0.21-0.55,0-0.76L0.2,2.72c0.21-0.21,0.55-0.21,0.76,0l1.68,1.68c0.21,0.21,0.55,0.21,0.76,0l1.64-1.63c0.21-0.21,0.55-0.21,0.76,0l0,0C6.01,2.97,6.01,3.31,5.8,3.52z"/><path class="st0" d="M5.84,0.96L3.4,3.4c-0.21,0.21-0.55,0.21-0.76,0L0.2,0.96c-0.21-0.21-0.21-0.55,0-0.76l0.04-0.04c0.21-0.21,0.55-0.21,0.76,0l1.68,1.68c0.21,0.21,0.55,0.21,0.76,0L5.08,0.2c0.21-0.21,0.55-0.21,0.76,0l0,0C6.05,0.41,6.05,0.75,5.84,0.96z"/></svg></div>
        </div>

        <div class="services">
            <div class="service">
                <img src="{{ asset('public/cms/assets/img/flying-removebg-preview.png') }}">
                <div class="service-name">Flight Service</div>
                <div class="service-describe">Extracting A Visa From Anywhere In The World Within 24 Hours</div>
            </div>
            <div class="service">
                <img src="{{ asset('public/cms/assets/img/hotel-building-07-removebg-preview.png') }}">
                <div class="service-name">Booking Of Hotels</div>
                <div class="service-describe">Providing Reservations For All Hotels Around The World</div>
            </div>
            <div class="service">
                <img src="{{ asset('public/cms/assets/img/car-3d-removebg-preview.png') }}">
                <div class="service-name">Transportation</div>
                <div class="service-describe">Sero Provides A car Service</div>
            </div>
        </div>

    </div>

    <div class="part5">
        <div class="ground-cover"></div>
        <div class="footer">
            <div class="footer-logo">
                <div class="logo-img">
                    <img src="{{ asset('public/cms/assets/img/logo.png') }}">
                </div>
                <div class="logo-name">
                    <span class="n1">SERO</span>
                </div>
            </div>
            <div class="footer-details">
                <div class="email"><img src="{{ asset('public/cms/assets/img/email.png') }}" alt="Email : "><a style="text-decoration: none;" href="mailto:info@sero.com.sa">Info@Sero.Com.Sa</a></div>
                <div class="phone"><img src="{{ asset('public/cms/assets/img/phone.png') }}" alt="Call : "><a style="text-decoration: none;" href="tel:+966920003593">+966920003593</a></div>
                <div class="address"><img src="{{ asset('public/cms/assets/img/address.png') }}" alt="Address : "><a  style="text-decoration: none;" href="https://goo.gl/maps/XDdhFi7ybUqznFH97">Tariq Almalik Eabdallah Alfarei Almadinat Almunawara</a></div>
            </div>
            <div class="footer-social">
                <div class="facebook"><img src="{{ asset('public/cms/assets/img/facebook.png') }}" alt="Facebook : "><a style="text-decoration: none;" href="https://www.facebook.com/profile.php?id=100082581573020">Sero11</a></div>
                <div class="twitter"><img src="{{ asset('public/cms/assets/img/twitter.png') }}" alt="Twitter : "><a style="text-decoration: none;" href="https://twitter.com/serovision1?s=21&t=ObGKxjr4RhzOnCC9EgP2mg">sero_comp</a></div>
                <div class="instgram"><img src="{{ asset('public/cms/assets/img/instagram.png') }}" alt="Instgram : "><a style="text-decoration: none;" href="https://www.instagram.com/serovision.1/">sero_travel</a></div>
                <div class="whatsapp"><img src="{{ asset('public/cms/assets/img/whatsapp.png') }}" alt="Whatsapp : "><a style="text-decoration: none;" href="http://iwtsp.com/966148255990">+966920003593</a></div>
            </div>

            <div class="copyright"><img src="{{ asset('public/cms/assets/img/copyright.png') }}"><span>Copyright 2022, All Right Reserved</span></div>
        </div>
    </div>




</body>
</html>
