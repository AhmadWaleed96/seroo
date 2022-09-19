{{-- @extends('dashboard.parent') --}}
@extends('cms.master')

@section('title',' الفنادق ')

@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">عرض بيانات الفنادق </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form ">
                        @csrf
                        <div class="card-body">

                            <div class=" col-md-6">
                                <label for="name">الصورة  </label>


                            @if ($hotels->image != '')

                             <img class="img-circle img-bordered-sm" src="{{asset('storage/images/hotels/'.$hotels->image)}}" width="60" height="60" alt="User Image"> 
                            @else
          
                             <img class="img-circle img-bordered-sm" src="{{asset('storage/images/users.jpg')}}" width="60" height="60" alt="User Image">
                            @endif
                            </div>
                            <br>
                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label for="name">الاسم الفندق</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $hotels->name }}" disabled
                                        placeholder="أدخل اسم الفندق">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="address"> العنوان</label>
                                    <input type="text" name="address" class="form-control" value="{{ $hotels->address }}" disabled
                                        id="address" placeholder="ادخل العنوان   ">
                                </div>


                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="rate"> التقيم </label>
                                    <input type="number" name="rate" class="form-control" max="5" min="1" value="1" value="{{ $hotels->rate }}" disabled
                                        id="rate" placeholder="ادخل التقيم">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="rate">رقم الموبايل  </label>
                                    <input class="form-control"  value="{{ $hotels->mobile }}" disabled
                                        id="rate" placeholder="ادخل رقم الموبايل ">
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label for="checkin"> وقت الدخول </label>
                                    <input type="date" name="checkin" class="form-control" value="{{ $hotels->checkin }}" disabled
                                        id="checkin" placeholder="ادخل وقت الدخول ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="checkout"> وقت المغادرة </label>
                                    <input type="date" name="checkout" class="form-control" value="{{ $hotels->checkout }}" disabled
                                        id="checkout" placeholder="ادخل وقت المغادرة ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number_of_people"> عدد المسافرين  </label>
                                    <input type="number" name="number_of_people" class="form-control" disabled
                                        id="number_of_people" placeholder="ادخل  عدد المسافرين  " value="{{ $hotels->number_of_people }}">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number_of_children"> عدد الاطفال  </label>
                                    <input type="number" name="number_of_children" class="form-control" value="{{ $hotels->number_of_children }}" disabled
                                        id="number_of_children" placeholder="ادخل  عدد الاطفال  ">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number_of_room"> عدد الغرف  </label>
                                    <input type="number" name="number_of_room" class="form-control" value="{{ $hotels->number_of_room }}" disabled
                                        id="number_of_room" placeholder="ادخل  عدد الغرف  ">

                                </div> --}}

                                 <div class="form-group col-md-4">
                                    <label for="city_id"> المدينة  </label>
                                    <select class="form-control" name="city_id" disabled
                                    id="city_id" >
                                    @foreach ($cities as $city)
                                    @if ($hotels->city_id == $city->id)
                                        
                                    <option >{{ $city->name }}</option>
                                    @endif

                                    @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="discreption"> الوصف</label>
                                        <textarea class="form-control" style="resize: none;" id="discreption" disabled
                                            name="discreption" rows="4" placeholder="ادخل الوصف" cols="50"> {{ $hotels->discreption }}</textarea>
                                    </div>
                                </div>


                            </div>

                        </div>








                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{route('hotels.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة الفنادق </button></a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</section>
<!-- /.content -->

@endsection
<script src="{{ asset('cms/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

@section('scripts')





@endsection
