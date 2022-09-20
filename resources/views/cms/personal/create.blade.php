{{-- @extends('dashboard.parent') --}}
@extends('cms.master')

@section('title','التأمين')

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
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">اضافة بيانات التأمين </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form ">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-6">
                                    <label for="name">الاسم الاول</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="أدخل الاسم الاول">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="name2   ">الاسم الاخير</label>
                                    <input type="text" name="name2" class="form-control" id="name2"
                                        placeholder="أدخل الاسم الاخير">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email"> الايميل</label>
                                    <input type="email" name="email" class="form-control"
                                        id="email" placeholder="ادخل الايميل">
                                </div>


                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="phone"> الموبايل </label>
                                    <input type="text" name="phone" class="form-control"
                                        id="phone" placeholder="ادخل الموبايل  ">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="phone2"> الموبايل الثاني </label>
                                    <input type="text" name="phone2" class="form-control" id="phone2"
                                        placeholder="أدخل الموبايل الثاني  ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="country_id"> الدولة  </label>
                                    <select class="form-control" name="country_id"
                                    id="country_id" >
                                    @foreach ($countries as $country)

                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="city_id"> المدينة  </label>
                                    <select class="form-control" name="city_id"
                                    id="city_id" >
                                    @foreach ($cities as $city)

                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="address"> العنوان </label>
                                    <input type="text" name="address" class="form-control"
                                        id="address" placeholder="ادخل العنوان  ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="postalCode"> رقم التأشيرة </label>
                                    <input type="text" name="postalCode" class="form-control"
                                        id="postalCode" placeholder="ادخل رقم التأشيرة  ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="startDate"> وقت الدخول </label>
                                    <input type="date" name="startDate" class="form-control"
                                        id="startDate" placeholder="ادخل وقت الدخول ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="endDate"> وقت المغادرة </label>
                                    <input type="date" name="endDate" class="form-control"
                                        id="endDate" placeholder="ادخل وقت المغادرة ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="adultsCount"> الاشخاص البالغين  </label>
                                    <select class="form-control" name="adultsCount"
                                    id="adultsCount" >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="childrenCount"> الاطفال </label>
                                    <select class="form-control" name="childrenCount"
                                    id="childrenCount" >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="infantCount"> طفل رضيع </label>
                                    <select class="form-control" name="infantCount"
                                    id="infantCount" >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select>
                                </div>



                            </div>
                        </div>
                        <br>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performStore()" class="btn btn-lg btn-success">حفظ</button>
                            <a href="{{route('packages.index')}}"><button type="button" class="btn btn-lg btn-primary">
                                    قائمة التأمين </button></a>
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



    function performStore() {

        let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('name2',document.getElementById('name2').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('phone',document.getElementById('phone').value);
            formData.append('phone2',document.getElementById('phone2').value);
            formData.append('country_id',document.getElementById('country_id').value);
            formData.append('city_id',document.getElementById('city_id').value);
            formData.append('address',document.getElementById('address').value);
            formData.append('postalCode',document.getElementById('postalCode').value);
            formData.append('startDate',document.getElementById('startDate').value);
            formData.append('endDate',document.getElementById('endDate').value);
            formData.append('adultsCount',document.getElementById('adultsCount').value);
            formData.append('childrenCount',document.getElementById('childrenCount').value);
            formData.append('infantCount',document.getElementById('infantCount').value);

            var APP_URL = {!! json_encode(url('/cms/admin/packages')) !!}
        store( APP_URL ,formData);


        //store('/cms/admin/hotels',formData);

    }

</script>


@endsection
