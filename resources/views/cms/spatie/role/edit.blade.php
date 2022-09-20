@extends('cms.master')

@section('title',' المدينة')

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
                      <h3 class="card-title">المدينة</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                        <div class="form-group col-md-6">
                            <label for="guard_name">الاسم المدينة</label>
                            <select type="text" name="guard_name" class="form-control" id="guard_name">
                                <option value="trainer" @if($roles->guard_name == 'trainer') selected @endif>مدرب</option>
                                <option value="web" @if($roles->guard_name == 'web') selected @endif>مستخدم</option>
                                <option value="student" @if($roles->guard_name == 'student') selected @endif>طالب</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name"> اسم الوظيفي</label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="ادخل اسم الوظيفي " value="{{ $roles->name }}">
                        </div>
                    </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$roles->id}})" class="btn btn-lg btn-warning">حفظ</button>
                         <a href="{{route('roles.index')}}"><button type="button" class="btn btn-lg btn-danger"> الغاء</button></a>
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
    formData.append('name' , document.getElementById('name').value);
    formData.append('guard_name' , document.getElementById('guard_name').value);
    //storeRoute('/cms/admin/update_roles/'+id , formData );

    var APP_URL = {!! json_encode(url('/cms/admin/update_roles')) !!}
        storeRoute( APP_URL+'/'+id ,formData);
    }
    </script>


@endsection


