@extends('cms.master')

@section('title',' المركبات')

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
                      <h3 class="card-title">المركبات</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                        <br>
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="name"> اسم المركبة </label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $cars->name }}"
                                    placeholder="ادخل اسم المركبة ">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="type_car"> نوع المركبة </label>
                                <input type="text" name="type_car" class="form-control" id="type_car" value="{{ $cars->type_car }}"
                                    placeholder="ادخل نوع المركبة ">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="model">المودل </label>
                                <input type="text" name="model" class="form-control" id="model" value="{{ $cars->model }}"
                                    placeholder="ادخل مودل المركبة ">
                            </div>
                        </div>
                        <div class="row">

                              <div class="form-group col-md-4">
                                  <label for="vehicle_class">فئة السيارة</label>
                                  <select type="text" name="vehicle_class" class="form-control" id="vehicle_class">
                                      <option value="ممتاز">ممتاز</option>
                                      <option value="متميز">متميز</option>
                                      <option value="عادي">عادي</option>
                                  </select>
                              </div>

                              <div class="form-group col-md-4">
                                  <label for="car_color"> لون المركبة </label>
                                  <input type="color" name="car_color" class="form-control" id="car_color"  value="{{ $cars->car_color }}"
                                      placeholder="ادخل اسم الصلاحية ">
                              </div>
                              <div class="form-group col-md-4">
                                  <label for="car_number">  نمرة المركبة </label>
                                  <input type="text" name="car_number" class="form-control" id="car_number" value="{{ $cars->car_number }}"
                                      placeholder="ادخل نمرة المركبة  ">
                              </div>
                          </div>

                          <div class="row">
                              <div class="form-group col-md-6">
                                  <label for="compane_id">الشركة</label>
                                  <select type="text" name="compane_id" class="form-control" id="compane_id">
                                      @foreach ($companes as $compane )

                                      <option value="{{ $compane->id }}">{{ $compane->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="form-group col-6">
                                  <label for="image">صورة المركبة</label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="image" name="image">
                                      <label class="custom-file-label" for="image">Choose file</label>
                                    </div>

                                  </div>
                                </div>


                              </div>

  {{--
                                   --}}
                              {{-- <div class="col-lg-6 form-group "  >
                                  <label for="image"  > --}}
                              {{-- </label> --}}

                       </div>
                        </div>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$cars->id}})" class="btn btn-lg btn-warning">حفظ</button>
                         <a href="{{route('cars.index')}}"><button type="button" class="btn btn-lg btn-danger"> الغاء</button></a>
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

    function performUpdate(id){
    let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('type_car',document.getElementById('type_car').value);
        formData.append('model',document.getElementById('model').value);
        formData.append('vehicle_class',document.getElementById('vehicle_class').value);
        formData.append('car_color',document.getElementById('car_color').value);
        formData.append('car_number',document.getElementById('car_number').value);
        formData.append('compane_id',document.getElementById('compane_id').value);
        formData.append('image',document.getElementById('image').files[0]);
        var APP_URL = {!! json_encode(url('/cms/admin/update_cars/')) !!}
        storeRoute( APP_URL+id ,formData);

    //storeRoute(url('/cms/admin/update_cars/')+id , formData );
    }
    </script>


@endsection


