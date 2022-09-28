<!DOCTYPE HTML>

<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Hotel</title>
        <link rel="stylesheet" href="{{ asset('public/cms/css/second_page.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{ asset('public/cms/plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-xBuQ/xzmlsLoJpyjoggmTEz8OWUFM0/RC5BsqQBDX2v5cMvDHcMakNTNrHIW2I5f" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/189263d7ef.js" crossorigin="anonymous"></script>
        <style>
            * {
  box-sizing: border-box;
}

img {
  max-width: 100%;
  vertical-align: top;
}

.gallery {
  display: flex;
  margin: 10px auto;
  max-width: 600px;
  position: relative;
  padding-top: 66.6666666667%;
}
@media screen and (min-width: 600px) {
  .gallery {
    padding-top: 400px;
  }
}
.gallery__img {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
}
.gallery__thumb {
  padding-top: 6px;
  margin: 6px;
  display: block;
}
.gallery__selector {
  position: absolute;
  opacity: 0;
  visibility: hidden;
}
.gallery__selector:checked + .gallery__img {
  opacity: 1;
}
.gallery__selector:checked ~ .gallery__thumb > img {
  box-shadow: 0 0 0 3px #0be2f6;
}
        </style>

    </head>

    <body>

        <div class="background">

            <img src="images/background2.jpg">
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


        <div class="page_contain">
            <section class="gallery " >
                @foreach ($images as $image)


                <div class="gallery__item">
                  <input type="radio" id="{{ $image->id }}" checked name="gallery" class="gallery__selector" value="{{ $image->id }}" />
                  <img class="gallery__img" src="{{asset('storage/image_hotel/'.$image->image)}}" alt="" width="600px" height="400px" />
                  <label for="{{ $image->id }}" class="gallery__thumb"><img src="{{asset('storage/image_hotel/'.$image->image)}}" alt="" width="150px" height="100px" /></label>
                </div>

                @endforeach
            </section>
            <div class="div2">
                <form>


                    @foreach ($item_hotels as $item )
                <div class="header">

                    <div class="header_price"><span class="coin">SAR</span><span class="price">{{ $item->price }} <input type="hidden" name="price" id="price" value="{{ $item->price }}"></span><div class="info">* شامل ضريبة القيمة المضافة</div></div>

                </div>
                <div class="block"></div>
                <div class="info2">السعر ل 1 سعر الغرف ل ليالي 12</div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">وقت الدخول *  </label>
                    <input type="text" class="form-control" disabled name="date_of_arrival" id="date_of_arrival" value="{{ $item->checkin }}">

                </div>
                <input type="hidden" name="hotel_id" id="hotel_id" value="{{$id}}">
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}">
                <div class="mb-2">
                    <label for="exampleFormControlInput1" class="form-label"> عدد الغرف *</label>
                     <input type="text" class="form-control" disabled name="number_of_room" id="number_of_room" value="{{ $item->number_of_room}}">
                </div>
                <div class="mb-2 leave">
                    <label for="exampleFormControlInput1" class="form-label">  عدد المسافرين *</label>
                     <input type="text" class="form-control" disabled name="number_of_people" id="number_of_people" value="{{ $item->number_of_people }}">
                    </div>


                    {{-- <div class="mb-2 leave">
                        <label for="exampleFormControlInput1" class="form-label">فرز حسب السعر</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>حدد طلب السعر</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">وقت المغادرة *</label>
                        <input type="text" class="form-control" disabled name="departure_date" id="departure_date" value="{{ $item->checkout }}">
                   {{-- <select class="form-select" aria-label="Default select example">
                        <option selected>حدد طلب السعر</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select> --}}
                    </div>
                    @endforeach
                <button type="button" onclick="performStore()" class="btn btn-secondary btn-sm">احجز الان</button>
            </form>
            </div>

            <div class="div3">

                <div class="header">

                    @foreach ($hotels as $hotel)

                    <div class="name_parent"><span class="name">{{ $hotel->name }}</span></div>
                    <div class="phone"><span>{{ $hotel->mobile }}</span><i class="fas fa-phone"></i></div>
                    <div class="map">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>
                        {{$hotel->city->name}} - {{ $hotel->address }}
                        </span>
                    </div>
                    <div class="rating"><span class="num">{{ $hotel->rate }}</span><span> :التقييم</span>
                                    @if ($hotel->rate  =='5')
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    @elseif ($hotel->rate  =='4')
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    @elseif ($hotel->rate  =='3')
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    @elseif ($hotel->rate  =='2')
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    @elseif ($hotel->rate  =='1')
                                    <i class="fas fa-star"></i>
                                    @else
                                    <span class="badge bg-danger">not found</span>

                                    @endif

                    </div>
                    @endforeach
                </div>
            </div>

            <div class="block full"></div>
            <div class="select-btns">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="pill" href="#menu3">وصف</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="pill" href="#menu2">مرافق</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" data-bs-toggle="pill" href="#menu1">الغرف</a>
                    </li>
                  </ul>
            </div>

            <div class="tab-content">
                <div id="menu1" class="container tab-pane active"><br>
                    <div class="bottom-title"><span class="select_value">الغرف 1</span><span class="value_details">(الى عن على 2 البالغ/البالغون و 0 الطفل/الاطفال للغرفة)</span></div>
                    <div class="bottom-info">الرجاء تحديد اي من الخيار ادناه</div>
                    <div class="rooms">
                        @foreach ($rooms as $room )


                        <div class="room">
                            <div class="header"><span> {{$room->number_room}}</span><input class="form-check-input 1star" type="checkbox" value="" id="flexCheckDefault"></div>
                            <div class="info"> {{$room->name_room}}</div>
                            {{-- <div class="info">( عدد الغرف : <span>1</span> )</div> --}}
                            <div class="info">{{$room->Advantages}}  : <span></span></div>
                            <div class="info"> {{$room->accommodation_type}} : <span>غرفة بدون وجبات</span></div>
                            <div class="info"><span class="coin">SAR</span><span class="price">{{$room->price}}</span><div class="info NB">* شامل لجميع الضرائب</div></div>
                            <div class="info warn">غير قابل للاسترجاع <i class="fas fa-info-circle"></i></div>
                        </div>
                        @endforeach
                        {{-- <div class="room">
                            <div class="header"><img src="images/living-room.png"><span>second room</span><input class="form-check-input 1star" type="checkbox" value="" id="flexCheckDefault"></div>
                            <div class="info">غرفة ثنائية</div>
                            <div class="info">( عدد الغرف : <span>1</span> )</div>
                            <div class="info">المميزات والخدمات : <span></span></div>
                            <div class="info">نوع الاقامة : <span>غرفة بدون وجبات</span></div>
                            <div class="info"><span class="coin">SAR</span><span class="price">511.24</span><div class="info NB">* شامل لجميع الضرائب</div></div>
                            <div class="info warn">غير قابل للاسترجاع <i class="fas fa-info-circle"></i></div>
                        </div> --}}
                    </div>
                </div>
                @foreach ($facilities as $facilitie)
                <div id="menu2" class="container tab-pane fade"><br>

                    <h3>{{ $facilitie->id }}</h3>
                    <p>{{ $facilitie->discription }}</p>
                </div>
                @endforeach
                @foreach ($facilities as $facilitie)
                <div id="menu3" class="container tab-pane fade"><br>

                    <p>{{ $facilitie->discription }}</p>
                </div>
                @endforeach
              </div>

        </div>


        <script src="{{ asset('public/cms/js/second_page.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

        <script src="{{asset('public/cms/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('public/cms/js/crud.js')}}"></script>
        <script>



            function performStore() {

                let formData = new FormData();
                    formData.append('date_of_arrival',document.getElementById('date_of_arrival').value);
                    formData.append('departure_date',document.getElementById('departure_date').value);
                    formData.append('number_of_room',document.getElementById('number_of_room').value);
                    formData.append('number_of_people',document.getElementById('number_of_people').value);
                    formData.append('hotel_id',document.getElementById('hotel_id').value);
                    formData.append('price',document.getElementById('price').value);
                    var APP_URL = {!! json_encode(url('/book_hotels')) !!}


                store(APP_URL,formData);

            }

        </script>
    </body>

</html>
