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
                        <h3 class="card-title">تعديل بيانات الفنادق </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form ">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label for="name">الاسم الفندق</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $hotels->name }}"
                                        placeholder="أدخل اسم الفندق">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="address"> العنوان</label>
                                    <input type="text" name="address" class="form-control" value="{{ $hotels->address }}"
                                        id="address" placeholder="ادخل العنوان   ">
                                </div>


                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="rate"> التقيم </label>
                                    <input type="number" name="rate" class="form-control" max="5" min="1" value="1" value="{{ $hotels->rate }}"
                                        id="rate" placeholder="ادخل التقيم">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mobile"> رقم الموبايل </label>
                                    <input type="number" name="mobile" class="form-control" value="{{ $hotels->mobile }}"
                                        id="mobile" placeholder="ادخل رقم الموبايل">
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label for="checkin"> وقت الدخول </label>
                                    <input type="date" name="checkin" class="form-control" value="{{ $hotels->checkin }}"
                                        id="checkin" placeholder="ادخل وقت الدخول ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="checkout"> وقت المغادرة </label>
                                    <input type="date" name="checkout" class="form-control" value="{{ $hotels->checkout }}"
                                        id="checkout" placeholder="ادخل وقت المغادرة ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number_of_people"> عدد المسافرين  </label>
                                    <input type="number" name="number_of_people" class="form-control"
                                        id="number_of_people" placeholder="ادخل  عدد المسافرين  " value="{{ $hotels->number_of_people }}">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number_of_children"> عدد الاطفال  </label>
                                    <input type="number" name="number_of_children" class="form-control" value="{{ $hotels->number_of_children }}"
                                        id="number_of_children" placeholder="ادخل  عدد الاطفال  ">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number_of_room"> عدد الغرف  </label>
                                    <input type="number" name="number_of_room" class="form-control" value="{{ $hotels->number_of_room }}"
                                        id="number_of_room" placeholder="ادخل  عدد الغرف  ">

                                </div> --}}

                                 <div class="form-group col-md-4">
                                    <label for="city_id"> المدينة  </label>
                                    <select class="form-control" name="city_id"
                                    id="city_id" >
                                    @foreach ($cities as $city)

                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                     <label for="image">اضافة صورة</label>

                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="image" name="image">
                                      <label class="custom-file-label" for="image" _msthash="4886232" _msttexthash="1448837">اختر ملف</label>
                                    </div>
                                  </div>

                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="discreption"> الوصف</label>
                                        <textarea class="form-control" style="resize: none;" id="discreption" value="{{ $hotels->discreption }}"
                                            name="discreption" rows="4" placeholder="ادخل الوصف" cols="50"></textarea>
                                    </div>
                                </div>


                            </div>

                        </div>








                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="update({{ $hotels->id }})" class="btn btn-lg btn-success">حفظ</button>
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


<script>

$('.city_id').select2({
      theme: 'bootstrap4'
    })


    function update(id){

        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
            formData.append('address',document.getElementById('address').value);
            formData.append('rate',document.getElementById('rate').value);
            formData.append('image',document.getElementById('image').files[0]);
            formData.append('discreption',document.getElementById('discreption').value);
            formData.append('city_id',document.getElementById('city_id').value);
            formData.append('mobile',document.getElementById('mobile').value);
            // formData.append('checkin',document.getElementById('checkin').value);
            // formData.append('checkout',document.getElementById('checkout').value);
            // formData.append('number_of_room',document.getElementById('number_of_room').value);
            // formData.append('number_of_people',document.getElementById('number_of_people').value);
            // formData.append('number_of_children',document.getElementById('number_of_children').value);
            var APP_URL = {!! json_encode(url('/cms/admin/update_hotels/')) !!}


            storeRoute(APP_URL+'/'+id , formData );


    }

</script>


@endsection
