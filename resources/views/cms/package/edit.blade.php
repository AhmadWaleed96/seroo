{{-- @extends('dashboard.parent') --}}
@extends('cms.master')

@section('title',' الحزم ')

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
                        <h3 class="card-title">تعديل بيانات الحزم </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="create_form ">
                        @csrf
                        <div class="card-body">

                            <br>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="name">الاسم الحزم</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $packages->name }}"
                                        placeholder="أدخل اسم الحزمة">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="price"> السعر</label>
                                    <input type="text" name="price" class="form-control" value="{{ $packages->price }}"
                                        id="price" placeholder="ادخل السعر   ">
                                </div>


                            </div>
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="entertainment"> نوع السياحة  </label>
                                    <input type="number" name="entertainment" class="form-control" max="5" min="1"
                                        id="entertainment" value="{{ $packages->entertainment }}" placeholder="ادخل نوع السياحة ">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="duration"> مدة الرحلة </label>
                                    <input type="text" name="duration" class="form-control" id="duration" value="{{ $packages->duration }}"
                                        placeholder="أدخل مدة الرحلة  ">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="checkin"> وقت الدخول </label>
                                    <input type="date" name="checkin" class="form-control"
                                        id="checkin" value="{{ $packages->checkin }}" placeholder="ادخل وقت الدخول ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="checkout"> وقت المغادرة </label>
                                    <input type="date" name="checkout" class="form-control"
                                        id="checkout" value="{{ $packages->checkout }}" placeholder="ادخل وقت المغادرة ">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="discreption"> الوصف</label>
                                        <textarea class="form-control" style="resize: none;" id="discreption" value="{{ $packages->discreption }}"
                                            name="discreption" rows="4" placeholder="ادخل الوصف" cols="50"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-4">
                                     <label for="image">اضافة صورة</label>

                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="image" name="image" value="{{ $packages->image }}">
                                      <label class="custom-file-label" for="image" _msthash="4886232" _msttexthash="1448837">اختر ملف</label>
                                    </div>
                                  </div>

                            </div>
                        </div>
                        <br>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="update({{ $packages->id }})" class="btn btn-lg btn-success">حفظ</button>
                            <a href="{{route('packages.index')}}"><button type="button" class="btn btn-lg btn-primary">قائمة الحزم </button></a>
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

@section('scripts')


<script>


    function update(id){

        let formData = new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('price',document.getElementById('price').value);
            formData.append('entertainment',document.getElementById('entertainment').value);
            formData.append('discreption',document.getElementById('discreption').value);
            formData.append('duration',document.getElementById('duration').value);
            formData.append('checkin',document.getElementById('checkin').value);
            formData.append('checkout',document.getElementById('checkout').value);
            formData.append('image',document.getElementById('image').files[0]);

            var APP_URL = {!! json_encode(url('/cms/admin/update_packages/')) !!}
        storeRoute( APP_URL+'/'+id ,formData);

    }

</script>


@endsection
