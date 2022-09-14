<!DOCTYPE HTML>

<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search Car</title>
        <link rel="stylesheet" href="{{ asset('cms/css/first_page.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/189263d7ef.js" crossorigin="anonymous"></script>

    </head>

    <body>

        <div class="background">

            <img src="{{ asset('cms/assets/img/background2.jpg') }}">
            <div class="gradiant"></div>
            <div class="steps">
                <div class="step search_step done"><i class="fas fa-search step_icon"></i></div>
                <div class="step_line done"></div>
                <div class="step results_step active"><i class="fa fa-hotel step_icon"></i></div>
                <div class="step_line active">
                    <div class="active_motion"></div>
                </div>
                <div class="step info_step">
                    <svg class="travelers" viewBox="0 0 512 512">
                        <path class="step_icon" d="M352 48C352 21.49 373.5 0 400 0C426.5 0 448 21.49 448 48C448 74.51 426.5 96 400 96C373.5 96 352 74.51 352 48zM304.6 205.4C289.4 212.2 277.4 224.6 271.2 240.1L269.7 243.9C263.1 260.3 244.5 268.3 228.1 261.7C211.7 255.1 203.7 236.5 210.3 220.1L211.8 216.3C224.2 185.4 248.2 160.5 278.7 146.9L289.7 142C310.5 132.8 332.1 128 355.7 128C400.3 128 440.5 154.8 457.6 195.9L472.1 232.7L494.3 243.4C510.1 251.3 516.5 270.5 508.6 286.3C500.7 302.1 481.5 308.5 465.7 300.6L439 287.3C428.7 282.1 420.6 273.4 416.2 262.8L406.6 239.8L387.3 305.3L436.8 359.4C442.2 365.3 446.1 372.4 448 380.2L471 472.2C475.3 489.4 464.9 506.8 447.8 511C430.6 515.3 413.2 504.9 408.1 487.8L386.9 399.6L316.3 322.5C301.5 306.4 295.1 283.9 301.6 262.8L318.5 199.3C317.6 199.7 316.6 200.1 315.7 200.5L304.6 205.4zM292.7 344.2L333.4 388.6L318.9 424.8C316.5 430.9 312.9 436.4 308.3 440.9L246.6 502.6C234.1 515.1 213.9 515.1 201.4 502.6C188.9 490.1 188.9 469.9 201.4 457.4L260.7 398L285.7 335.6C287.8 338.6 290.2 341.4 292.7 344.2H292.7zM223.1 274.1C231.7 278.6 234.3 288.3 229.9 295.1L186.1 371.8C185.4 374.5 184.3 377.2 182.9 379.7L118.9 490.6C110 505.9 90.44 511.1 75.14 502.3L19.71 470.3C4.407 461.4-.8371 441.9 7.999 426.6L71.1 315.7C80.84 300.4 100.4 295.2 115.7 303.1L170.1 335.4L202.1 279.1C206.6 272.3 216.3 269.7 223.1 274.1H223.1z"/>
                    </svg>
                </div>
                <div class="step_line"></div>
                <div class="step pay_step">
                    <svg class="pay" viewBox="0 0 576 512">
                        <path class="step_icon" d="M251.1 207.1C251.1 196.1 260.1 187.1 271.1 187.1H287.1C299 187.1 308 196.1 308 207.1V275.1H312C323 275.1 332 284.1 332 295.1C332 307 323 315.1 312 315.1H263.1C252.1 315.1 243.1 307 243.1 295.1C243.1 284.1 252.1 275.1 263.1 275.1H267.1V227.6C258.9 225.7 251.1 217.7 251.1 207.1zM48.66 79.13C128.4 100.9 208.2 80.59 288 60.25C375 38.08 462 15.9 549 48.38C565.9 54.69 576 71.62 576 89.66V399.5C576 423.4 550.4 439.2 527.3 432.9C447.6 411.1 367.8 431.4 288 451.7C200.1 473.9 113.1 496.1 26.97 463.6C10.06 457.3 0 440.4 0 422.3V112.5C0 88.59 25.61 72.83 48.66 79.13L48.66 79.13zM127.1 416C127.1 380.7 99.35 352 63.1 352V416H127.1zM63.1 223.1C99.35 223.1 127.1 195.3 127.1 159.1H63.1V223.1zM512 352V287.1C476.7 287.1 448 316.7 448 352H512zM512 95.1H448C448 131.3 476.7 159.1 512 159.1V95.1zM287.1 143.1C234.1 143.1 191.1 194.1 191.1 255.1C191.1 317.9 234.1 368 287.1 368C341 368 384 317.9 384 255.1C384 194.1 341 143.1 287.1 143.1z"/>
                    </svg>
                </div>
            </div>

        </div>
        <?php
        use App\Models\City;
        $cities=City::all();
        ?>
        <div class="page_navbar">

            <div class="item item1">
                <div class="parent">
                    <div class="label-name">وجهة السفر</div>
                    <div class="value">المدينة:
                        @foreach ($cities as $city )
                        @if($city->id == request()->city_id)
                         <span class="des"> {{$city->name}} </span>
                         @endif

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="item item2">
                <div class="parent">
                    <li class="nav-item dropdown">
                        <a class="nav-link"  id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            الوصول
                        </a>
                    </li>
                    <div class="value"><span class="day"> ( {{ request()->checkin}} )</span></div>
                </div>
            </div>
            <div class="item item3">
                <div class="parent">
                    <li class="nav-item dropdown">
                        <a class="nav-link"  id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            المغادرة
                        </a>

                    </li>
                    <div class="value"><span class="day">({{ request()->checkout}})</span></div>
                </div>
            </div>
            <div class="item item4">
                <div class="parent">
                    <li class="nav-item dropdown">
                        <a class="nav-link"  id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            المسافرين
                        </a>

                    </li>
                    <div class="value"><span class="label">الكبار:</span><span class="num">({{ request()->number_of_people}}) </span> - <span class="label">الصغار:</span> <span class="num">({{ request()->number_of_children}}) </span></div>
                </div>
            </div>
            <div class="item item5">
                <div class="parent">
                    <li class="nav-item dropdown">
                        <a class="nav-link"  id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            الغرف
                        </a>

                    </li>
                    <div class="value"><span class="label">الغرف</span><span class="num">({{ request()->number_of_room}})</span> </div>
                </div>
            </div>
            <div class="item item6">
                <div class="parent">
                    <a class="btn btn-sm" href="{{route("local")}}"><button  class="btn btn-secondary btn-sm">تعديل</button></a>
                </div>
            </div>

        </div>

        <div class="page_contain">
            <div class="filter">
                <div class="filter_header">
                    <div class="label"><span>مصنفة بواسطة</span></div>
                    <div class="bar">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-light btn-sm" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bars"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">الخيار الاول</a></li>
                                <li><a class="dropdown-item" href="#">الخيار التاني</a></li>
                                <li><a class="dropdown-item" href="#">الخيار التالت</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
                <div class="mb-3 search_parent">
                    <label for="exampleFormControlInput1" class="form-label">البحث عن اسم الفندق</label>
                    <input type="email" class="form-control search" id="exampleFormControlInput1" placeholder="ابحث هنا ...">
                </div>
                <div class="block"></div>
                <div class="mb-3 price_parent">
                    <label for="exampleFormControlInput1" class="form-label">فرز حسب السعر</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>حدد طلب السعر</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="block"></div>
                <div class="mb-3 rating_parent">
                    <label for="exampleFormControlInput1" class="form-label">تصنيف النجوم</label>
                    <div class="form-check">
                        <input class="form-check-input 1star" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <i class="fas fa-star"></i>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input 2star" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input 3star" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input 4star" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input 5star" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="results_container">
                <div class="results">
                    @foreach ($hotels as $hotel )
                    <div class="result">
                        <div class="image">
                            @if ($hotel->image !='')
                            <img class="default_img" src="{{asset('storage/images/hotels/'.$hotel->image)}}">
                            @else
                            <img class="default_img" src="{{ asset('cms/assets/img/hotel_default_background.jpg') }}">
                            @endif
                            {{-- <img class="result_img" src="{{ asset('cms/assets/img/hotel1.jpg') }}"> --}}
                        </div>
                        <div class="card_container">
                            <div class="label"><i class="fas fa-tag"></i><span>{{ $hotel->name }} </span></div>
                            <div class="address"><img src="{{ asset('cms/assets/img/map.svg') }}"><span>{{ $hotel->city->name }} - {{ $hotel->address }}</span></div>
                            <div class="rating">
                                @if ($hotel->rate  =='5')
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> <span class="ratings_num">{{ $hotel->rate }}</span>
                                    @elseif ($hotel->rate  =='4')
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><span class="ratings_num">{{ $hotel->rate }}</span>
                                    @elseif ($hotel->rate  =='3')
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><span class="ratings_num">{{ $hotel->rate }}</span>
                                    @elseif ($hotel->rate  =='2')
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><span class="ratings_num">{{ $hotel->rate }}</span>
                                    @elseif ($hotel->rate  =='1')
                                    <i class="fas fa-star"></i><span class="ratings_num">{{ $hotel->rate }}</span>
                                    @else
                                    <span class="badge bg-danger">not found</span>

                                    @endif


                                    <a href="{{route('create-book-hotel',['id'=>$hotel->id])}}" class="btn btn-danger btn-sm "> حجز الفندق</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="result">
                        <div class="image">
                            <img class="default_img" src="{{ asset('cms/assets/img/hotel_default_background.jpg') }}">
                            <img class="result_img" src="{{ asset('cms/assets/img/hotel1.jpg') }}">
                        </div>
                        <div class="card_container">
                            <div class="label"><i class="fas fa-tag"></i><span>فندق الماسه</span></div>
                            <div class="address"><img src="{{ asset('cms/assets/img/map.svg') }}"><span>طريق الامارة - الخبيب - القصيم</span></div>
                            <div class="rating"><i class="fas fa-star"></i> <span class="ratings_num">1</span></div>
                        </div>
                    </div>
                    <div class="result">
                        <div class="image">
                            <img class="default_img" src="{{ asset('cms/assets/img/hotel_default_background.jpg') }}">
                            <img class="result_img" src="{{ asset('cms/assets/img/hotel1.jpg') }}">
                        </div>
                        <div class="card_container">
                            <div class="label"><i class="fas fa-tag"></i><span>فندق الماسه</span></div>
                            <div class="address"><img src="{{ asset('cms/assets/img/map.svg') }}"><span>طريق الامارة - الخبيب - القصيم</span></div>
                            <div class="rating"><i class="fas fa-star"></i> <span class="ratings_num">1</span></div>
                        </div>
                    </div>
                    <div class="result">
                        <div class="image">
                            <img class="default_img" src="{{ asset('cms/assets/img/hotel_default_background.jpg') }}">
                            <img class="result_img" src="{{ asset('cms/assets/img/hotel1.jpg') }}">
                        </div>
                        <div class="card_container">
                            <div class="label"><i class="fas fa-tag"></i><span>فندق الماسه</span></div>
                            <div class="address"><img src="{{ asset('cms/assets/img/map.svg') }}"><span>طريق الامارة - الخبيب - القصيم</span></div>
                            <div class="rating"><i class="fas fa-star"></i> <span class="ratings_num">1</span></div>
                        </div>
                    </div>
                    <div class="result">
                        <div class="image">
                            <img class="default_img" src="{{ asset('cms/assets/img/hotel_default_background.jpg') }}">
                            <img class="result_img" src="{{ asset('cms/assets/img/hotel1.jpg') }}">
                        </div>
                        <div class="card_container">
                            <div class="label"><i class="fas fa-tag"></i><span>فندق الماسه</span></div>
                            <div class="address"><img src="{{ asset('cms/assets/img/map.svg') }}"><span>طريق الامارة - الخبيب - القصيم</span></div>
                            <div class="rating"><i class="fas fa-star"></i> <span class="ratings_num">1</span></div>
                        </div>
                    </div>
                    <div class="result">
                        <div class="image">
                            <img class="default_img" src="{{ asset('cms/assets/img/hotel_default_background.jpg') }}">
                            <img class="result_img" src="{{ asset('cms/assets/img/hotel1.jpg') }}">
                        </div>
                        <div class="card_container">
                            <div class="label"><i class="fas fa-tag"></i><span>فندق الماسه</span></div>
                            <div class="address"><img src="{{ asset('cms/assets/img/map.svg') }}"><span>طريق الامارة - الخبيب - القصيم</span></div>
                            <div class="rating"><i class="fas fa-star"></i> <span class="ratings_num">1</span></div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

        <script src="{{ asset('cms/js/first_page.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>

</html>
