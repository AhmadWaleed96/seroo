@extends('cms.master')

@section('title',' الطرق')

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
                      <h3 class="card-title">الطرق</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                            <div class="form-group col-md-6">
                                <label for="name_way">الاسم الطريق</label>
                                <input type="text" name="name_way" class="form-control" id="name_way"
                                   value="{{ $ways->name_way }}" placeholder="أدخل الاسم الطريق">
                            </div>


                        </div>

                          <br>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$ways->id}})" class="btn btn-lg btn-warning">حفظ</button>
                         <a href="{{route('ways.index')}}"><button type="button" class="btn btn-lg btn-danger"> قائمة المدن </button></a>
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
    formData.append('name_way' , document.getElementById('name_way').value);
    storeRoute('/cms/admin/update_ways/'+id , formData );

    var APP_URL = {!! json_encode(url('/cms/admin/update_ways')) !!}
        storeRoute( APP_URL+'/'+id ,formData);
    }
    </script>


@endsection


