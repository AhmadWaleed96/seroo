@extends('cms.master')

@section('title',' الصلاحيات')

@section('styles')

@endsection

@section('active title',' الصلاحيات ')
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
                      <h3 class="card-title">الصلاحية</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-6">
                                <label for="guard_name">النوع الوظيفي</label>
                                <select type="text" name="guard_name" class="form-control" id="guard_name">
                                    <option value="admin">مشرف</option>
                                    <option value="web">مستخدم</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name"> اسم الصلاحية </label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="ادخل اسم الصلاحية ">
                            </div>
                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performStore()" class="btn btn-lg btn-warning">حفظ</button>
                         <a href="{{route('permissions.index')}}"><button type="button" class="btn btn-lg btn-danger"> قائمة الصلاحيات </button></a>
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

     function performStore() {

        let formData = new FormData();
        formData.append('guard_name',document.getElementById('guard_name').value);
            formData.append('name',document.getElementById('name').value);
        //store('/cms/admin/permissions',formData);

        var APP_URL = {!! json_encode(url('/cms/admin/permissions')) !!}
        store( APP_URL ,formData);

    }

</script>


@endsection


