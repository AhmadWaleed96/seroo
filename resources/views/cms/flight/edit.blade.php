@extends('cms.master')

@section('title',' الطائرات')

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
                      <h3 class="card-title">الطائرات</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                        <br>
                        <div class="row">

                            <div class="form-group col-md-4">
                                <label for="name"> اسم الطائرات </label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $flights->name }}"
                                    placeholder="ادخل اسم الطائرات ">
                            </div>

                            <div class="form-group col-md-4">
                                      <label for="rate"> التقيم </label>
                                      <input type="number" name="rate" class="form-control" max="5" min="1"
                                      value="{{ $flights->rate }}"
                                          id="rate" placeholder="ادخل التقيم">
                            </div>

                            <div class="form-group col-6">
                                <label for="image">صورة الطائرات</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                  </div>
                                </div>
                              </div>
                        </div>

                       </div>
                        </div>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$flights->id}})" class="btn btn-lg btn-warning">حفظ</button>
                         <a href="{{route('flights.index')}}"><button type="button" class="btn btn-lg btn-danger"> الغاء</button></a>
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
        formData.append('rate',document.getElementById('rate').value);
        formData.append('image',document.getElementById('image').files[0]);
        var APP_URL = {!! json_encode(url('/cms/admin/update_flights')) !!}
        storeRoute( APP_URL+'/'+id ,formData);

    }
    </script>


@endsection


