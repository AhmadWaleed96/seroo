@extends('cms.master')

@section('title',' الشركة')

@section('styles')

@endsection

@section('active title',' الشركة')
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
                      <h3 class="card-title">الشركة</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-6">
                                <label for="name">الاسم الشركة</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="أدخل الاسم الشركة">
                            </div>


                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performStore()" class="btn btn-lg btn-warning">حفظ</button>
                         <a href="{{route('companes.index')}}"><button type="button" class="btn btn-lg btn-danger"> قائمة الشركات </button></a>
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
            formData.append('name',document.getElementById('name').value);
            var APP_URL = {!! json_encode(url('/cms/admin/companes')) !!}
        store( APP_URL ,formData);
        //store('/cms/admin/companes',formData);

    }

</script>


@endsection


