{{-- @extends('dashboard.parent') --}}
@extends('cms.master')

@section('title','المشرفين')

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
                        <h3 class="card-title">عرض بيانات المشرفين</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label for="first_name">الاسم الاول</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name"
                                        placeholder="أدخل اسم الاول">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="last_name">الاسم الثاني</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name"
                                        placeholder="أدخل الاسم الثاني">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="email"> الإيميل</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="ادخل الايمل   ">
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="password"> كلمة المرور </label>
                                    <input type="password" name="password" class="form-control"
                                        id="password" placeholder="ادخل رقم الجوال  ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mobile"> رقم الجوال </label>
                                    <input type="text" name="mobile" class="form-control"
                                        id="mobile" placeholder="ادخل رقم الجوال  ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="date_of_birth">تاريخ الولادة  </label>
                                    <input type="date" name="date_of_birth" class="form-control"
                                        id="date_of_birth" placeholder=" تاريخ الولادة  ">
                                </div>


                            </div>




                            <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="salary_value">قيمة الراتب  </label>
                                        <input type="number" name="salary_value" class="form-control"
                                            id="salary_value" placeholder=" تاريخ الولادة  ">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="city_id">اسم المدينة</label>
                                        <select class="form-control" name="city_id"
                                        id="city_id">
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>

                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="image">الصورة </label>
                                    <input type="file" name="image" class="form-control"
                                        id="image" placeholder=" اضف صورة ">
                                </div>


                            </div>
                        </div>








                        <br>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performStore()" class="btn btn-lg btn-warning">حفظ</button>
                            <a href="{{route('admins.index')}}"><button type="button" class="btn btn-lg btn-danger">
                                    قائمة المشرفين </button></a>
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

$('.group_id').select2({
      theme: 'bootstrap4'
    })


    function performStore() {

        let formData = new FormData();
            formData.append('first_name',document.getElementById('first_name').value);
            formData.append('last_name',document.getElementById('last_name').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('salary_value',document.getElementById('salary_value').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('password',document.getElementById('password').value);
            formData.append('date_of_birth',document.getElementById('date_of_birth').value);
            formData.append('city_id',document.getElementById('city_id').value);
            formData.append('image',document.getElementById('image').files[0]);
            var APP_URL = {!! json_encode(url('/cms/admin/admins')) !!}
        store( APP_URL ,formData);

        //store('/cms/admin/admins',formData);

    }

</script>


@endsection
