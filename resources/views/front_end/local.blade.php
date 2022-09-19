<!DOCTYPE html>

<html>

    <head>

        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Emoji:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/cms/css/dashboard.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <title>SERO</title>

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
                            @if (auth('web')->user()->image !='')

                            <img src="{{ asset('storage/images/register/'.auth('web')->user()->image) }}" style="width: 25px; height: 25px;">

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


        <div class="page-container">
            <img class="ground-img" src="{{ asset('public/cms/assets/img/toa-heftiba-8gI1RPr32e8-unsplash.jpg') }}">
            <div class="ground-cover"></div>
            <div class="page-paragraph">
                <div class="p-header">Book and enjoy</div>
                <div class="p-info">Book by registering your personal data below and book your hotel and you can rent a car with a captain to go anywhere anytime you want</div>
                <div class="p-insurance">We guarantee the complete safety of you and everyone with you on the trip with free insurance for you in case of any damage during the trip</div>
            </div>
        </div>

        <div class="dashboard-container">

            <h1>Package Data</h1>
            <p>Please choose each of the following options and fill the fields</p>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Personal</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Flight</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Hotel</button>
                    <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Transport</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">First Name</div>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ali">
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Second Name</div>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kamal">
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Email</div>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="sero@gmail.com">
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Phone Number</div>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0155 552 8003">
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">2nd Phone Number</div>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="optional">
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Country</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>Egypt</option>
                            <option value="2">Phalastine</option>
                            <option value="3">Saudi Arabia</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">City</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>Cairo</option>
                            <option value="2">Ghaza</option>
                            <option value="3">Riayadh</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Address</div>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="7st Riyadh Elsham, Emarg, Cairo">
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Postal Code</div>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent date">
                        <div class="datepicker input-daterange input-group" id="start-end">
                            <div class="datepicker-parent start">
                                <div class="dropdown-name">Start Date</div>
                                <input type="button" class="input-sm form-control" value="📅 From" name="start">
                                <div class="dropdown-info">!</div>
                            </div>
                            <div class="datepicker-parent end">
                                <div class="dropdown-name">End Date</div>
                                <input type="button" class="input-sm form-control" value="📅 To" name="end">
                                <div class="dropdown-info">!</div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-parent">
                        <div class="dropdown-name">Adults Count</div>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle-sp">
                                <img class="input-icon" src="{{ asset('public/cms/assets/img/man.png') }}"><span class="adults_num">0</span> Adults
                            </a>
                            <ul class="dropdown-menu-sp">
                                <div class="li_parent adults">
                                    <div class="minus_btn"><span>-</span></div>
                                    <div class="num_parent"><span class="num">0</span><span class="label">adults</span></div>
                                    <div class="positive_btn"><span>+</span></div>
                                </div>
                            </ul>
                        </div>
                        <div class="dropdown-info">From 18 to 74 years</div>
                    </div>

                    <div class="dropdown-parent">
                        <div class="dropdown-name">Children Count</div>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle-sp">
                                <img class="input-icon" style="height: 32px;top: -2px;" src="{{ asset('public/cms/assets/img/boy.png') }}"><span class="adults_num">0</span> children
                            </a>
                            <ul class="dropdown-menu-sp">
                                <div class="li_parent adults">
                                    <div class="minus_btn"><span>-</span></div>
                                    <div class="num_parent"><span class="num">0</span><span class="label">children</span></div>
                                    <div class="positive_btn"><span>+</span></div>
                                </div>
                            </ul>
                        </div>
                        <div class="dropdown-info">From 3 to 17 years</div>
                    </div>

                    <div class="dropdown-parent">
                        <div class="dropdown-name">Infant Count</div>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle-sp">
                                <img class="input-icon" style="height: 22px;padding-right: 5px;" src="{{ asset('public/cms/assets/img/newborn.png') }}"><span class="adults_num">0</span> infant
                            </a>
                            <ul class="dropdown-menu-sp">
                                <div class="li_parent adults">
                                    <div class="minus_btn"><span>-</span></div>
                                    <div class="num_parent"><span class="num">0</span><span class="label">infant</span></div>
                                    <div class="positive_btn"><span>+</span></div>
                                </div>
                            </ul>
                        </div>
                        <div class="dropdown-info">From 0 to 2 years</div>
                    </div>

                    <div class="next-previous">
                        <div class="npbtn next-btn">Next</div>
                        <div class="npbtn previous-btn" disabled>Previous</div>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">

                    <div class="ul-items">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">one way only</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Back and forth</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">multiple cities</button>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown-parent date">
                        <div class="datepicker input-daterange input-group" id="leave-return">
                            <div class="datepicker-parent start">
                                <div class="dropdown-name">Departure Date</div>
                                <input type="button" class="input-sm form-control" value="📅 leave" name="start">
                                <div class="dropdown-info">!</div>
                            </div>
                            <div class="datepicker-parent end">
                                <div class="dropdown-name">Return date</div>
                                <input type="button" class="input-sm form-control" value="📅 return" name="end">
                                <div class="dropdown-info">!</div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">travelers</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>1 passenger</option>
                            <option value="2">2 passengers</option>
                            <option value="3">3 passengers</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Economie</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>economie</option>
                            <option value="2">economie</option>
                            <option value="3">economie</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Nationality</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>Egypt</option>
                            <option value="2">Phalastine</option>
                            <option value="3">Saudi Arabia</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">mark</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>mark %</option>
                            <option value="2">mark %</option>
                            <option value="3">mark %</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="flex-parent">
                        <div class="dropdown-parent text-input">
                            <div class="dropdown-name">Favourite Airlines</div>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="optional">
                            <div class="dropdown-info">!</div>
                        </div>

                        <button type="button" class="btn btn-primary">Search</button>
                    </div>

                    <div class="next-previous">
                        <div class="npbtn next-btn">Next</div>
                        <div class="npbtn previous-btn">Previous</div>
                    </div>

                </div>
                {{-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0"> --}}
                    <form action="{{ route("search-hotels") }}" onsubmit="people1(),room1(),children1()" class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">

                    <div class="dropdown-parent text-input">
                        <?php
            use App\Models\City;
            $cities=City::all();
            ?>
                        <div class="dropdown-name">City </div>
                        <select class="form-select" aria-label="Default select example" name="city_id" @if( request()->city_id) value={{request()->city->name}} @endif>
                            <option >select on </option>
                            @foreach ($cities as $city )

                            <option value="{{ $city->id }}" >{{ $city->name }}</option>
                            @endforeach
                            {{-- <option value="2">Phalastine</option>
                            <option value="3">Saudi Arabia</option> --}}
                        </select>
                        <div class="dropdown-info">!</div>
                    </div>

                    <div class="dropdown-parent date">
                        <div class="datepicker input-daterange input-group" id="hotel-date">
                            <div class="datepicker-parent start">
                                <div class="dropdown-name">Start Date</div>
                                <input type="text" class="input-sm form-control"  name="checkin">
                                <div class="dropdown-info">!</div>
                            </div>
                            <div class="datepicker-parent end">
                                <div class="dropdown-name">End Date</div>
                                <input type="text" class="input-sm form-control"  name="checkout" >
                                <div class="dropdown-info">!</div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Nights</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>1 night</option>
                            <option value="2">2 nights</option>
                            <option value="3">3 nights</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div> --}}
                    <div class="dropdown-parent text-input">
                    <div class="dropdown col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="dropdown-name">Details</div>
                        <a class="btn btn-secondary dropdown-toggle-sp form-control w-100">

                            <input type="text" hidden id="input1"  name='number_of_people' @if( request()->number_of_people) value={{request()->number_of_people}} @endif >
                            <input type="text" hidden id="input2"  name='number_of_room' @if( request()->number_of_room) value={{request()->number_of_room}} @endif >
                            <input type="text" hidden id="input3"  name='number_of_children' @if( request()->number_of_children) value={{request()->number_of_children}} @endif >

                            <span class="adults_num" id="number_of_people">0</span> {{__("Adults")}} <span class="children_num" id='number_of_children'>0</span> {{__("Children")}} <span class="rooms_num" id='number_of_room'>0</span> {{__("Rooms")}}
                            <script>
                                function people1() {
                                    let people=document.querySelector('#number_of_people');
                                    let input1=document.querySelector('#input1');
                                    return input1.value=people.innerHTML;
                                }
                                function room1() {
                                    let room=document.querySelector('#number_of_room');
                                    let input2=document.querySelector('#input2');
                                    return input2.value=room.innerHTML;
                                }
                                function children1() {
                                    let children=document.querySelector('#number_of_children');
                                    let input3=document.querySelector('#input3');
                                    return input3.value=children.innerHTML;
                                }
                            </script>
                        </a>
                        <ul class="dropdown-menu-sp" id="btnMenu">
                            <div class="li_parent adults">
                                <div class="minus_btn"><span> - </span></div>
                                <div class="num_parent"><span class="num" >0</span><span class="label"> {{__("Adults")}} </span></div>
                                <div class="positive_btn"><span>+</span></div>
                            </div>
                            <div class="li_parent children">
                                <div class="minus_btn"><span> - </span></div>
                                <div class="num_parent"><span class="num">0</span><span class="label"> {{__("Children")}} </span></div>
                                <div class="positive_btn"><span>+</span></div>
                            </div>
                            <div class="li_parent rooms">
                                <div class="minus_btn"><span> - </span></div>
                                <div class="num_parent"><span class="num">0</span><span class="label"> {{__("Rooms")}} </span></div>
                                <div class="positive_btn"><span>+</span></div>
                            </div>
                        </ul>
                    </div>
                    <div class="dropdown-info">!</div>
                    </div>

                    {{-- <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Rooms</div>
                        <input type="text" class="form-control" style="width: 100px" >
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>1 persons 1 room</option>
                            <option value="2">2 persons 1 room</option>
                            <option value="3">2 persons 2 room</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div> --}}

                    {{-- <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Mark up</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>mark %</option>
                            <option value="2">mark %</option>
                            <option value="3">mark %</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div> --}}
                    

                    <ul class="nav nav-pills mb-3 stars-list" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><img class="empty-star" src="{{ asset('public/cms/assets/img/star.png') }}" alt="star"><img class="full-star" src="{{ asset('public/cms/assets/img/star (1).png') }}" alt="star"></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><img class="empty-star" src="{{ asset('public/cms/assets/img/star.png') }}" alt="star"><img class="full-star" src="{{ asset('public/cms/assets/img/star (1).png') }}" alt="star"></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><img class="empty-star" src="{{ asset('public/cms/assets/img/star.png') }}" alt="star"><img class="full-star" src="{{ asset('public/cms/assets/img/star (1).png') }}" alt="star"></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><img class="empty-star" src="{{ asset('public/cms/assets/img/star.png') }}" alt="star"><img class="full-star" src="{{ asset('public/cms/assets/img/star (1).png') }}" alt="star"></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><img class="empty-star" src="{{ asset('public/cms/assets/img/star.png') }}" alt="star"><img class="full-star" src="{{ asset('public/cms/assets/img/star (1).png') }}" alt="star"></button>
                        </li>
                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
                            <label class="form-check-label" for="firstCheckbox">vacant only</label>
                        </li>
                    </ul>

                    <button type="submit" class="btn btn-primary d-block">Search</button>

                    <div class="next-previous">
                        <div class="npbtn next-btn">Next</div>
                        <div class="npbtn previous-btn">Previous</div>
                    </div>
                    </form>

                {{-- </div> --}}
                <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">

                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Nationality</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>Egypt</option>
                            <option value="2">Phalastine</option>
                            <option value="3">Saudi Arabia</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
                            <label class="form-check-label" for="firstCheckbox">Return to different location</label>
                        </li>
                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
                            <label class="form-check-label" for="firstCheckbox">Driver aged between 30 - 65</label>
                        </li>
                    </ul>

                    <div class="date-time-parent">

                        <div class="date-with-time">

                            <div class="dropdown-parent date">
                                <div class="datepicker input-daterange input-group" id="transport-date">
                                    <div class="datepicker-parent start">
                                        <div class="dropdown-name">Rental Start Date</div>
                                        <input type="button" class="input-sm form-control" value="📅 From" name="start">
                                        <div class="dropdown-info">!</div>
                                    </div>
                                    <div class="datepicker-parent end">
                                        <div class="dropdown-name">Rental End Date</div>
                                        <input type="button" class="input-sm form-control" value="📅 To" name="end">
                                        <div class="dropdown-info">!</div>
                                    </div>
                                </div>
                            </div>

                            <div class="wrapper">
                                <div class="values">
                                    <span id="range1">
                                        0
                                    </span>
                                    <span> &dash; </span>
                                    <span id="range2">
                                        48
                                    </span>
                                </div>
                                <div class="range-container">
                                    <div class="start-slider">12 AM</div>
                                    <div class="slider-track"></div>
                                    <input class="dbl-range-input" type="range" min="0" max="48" value="0" id="slider-1">
                                    <input class="dbl-range-input" type="range" min="0" max="48" value="10" id="slider-2">
                                    <div class="end-slider">12 PM</div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="dropdown-parent text-input">
                        <div class="dropdown-name">Mark up</div>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1" selected>mark %</option>
                            <option value="2">mark %</option>
                            <option value="3">mark %</option>
                        </select>
                        <div class="dropdown-info">!</div>
                    </div>

                    <button type="button" class="btn btn-primary">Search</button>

                    <div class="next-previous">
                        <div class="npbtn next-btn" disabled>Next</div>
                        <div class="npbtn previous-btn">Previous</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-part">
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
                    <div class="email"><img src="{{ asset('public/cms/assets/img/email.png') }}" alt="Email : "><span>Info@Sero.Com.Sa</span></div>
                    <div class="phone"><img src="{{ asset('public/cms/assets/img/phone.png') }}" alt="Call : "><span>+966920007075</span></div>
                    <div class="address"><img src="{{ asset('public/cms/assets/img/address.png') }}" alt="Address : "><span>Tariq Almalik Eabdallah Alfarei Almadinat Almunawara</span></div>
                </div>
                <div class="footer-social">
                    <div class="facebook"><img src="{{ asset('public/cms/assets/img/facebook.png') }}" alt="Facebook : "><span>Sero11</span></div>
                    <div class="twitter"><img src="{{ asset('public/cms/assets/img/twitter.png') }}" alt="Twitter : "><span>sero_comp</span></div>
                    <div class="instgram"><img src="{{ asset('public/cms/assets/img/instagram.png') }}" alt="Instgram : "><span>sero_travel</span></div>
                    <div class="whatsapp"><img src="{{ asset('public/cms/assets/img/whatsapp.png') }}" alt="Whatsapp : "><span>+966 920 007 075</span></div>
                </div>

                <div class="copyright"><img src="{{ asset('public/cms/assets/img/copyright.png') }}"><span>Copyright 2022, All Right Reserved</span></div>
            </div>
        </div>

        <script src="{{ asset('public/cms/js/dashboard.js') }}"></script>

    </body>

</html>
