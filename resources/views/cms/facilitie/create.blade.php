@extends('cms.master')

@section('title',' المرافق')

@section('styles')

@endsection

@section('active title',' المرافق')
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
                      <h3 class="card-title">المرافق</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">
                        
                        <div class="card-body">
                            <div  class="row">
                             
                              <div class="form-group col-md-12">
                              <label>الوصف</label>
                              <textarea class="form-control" name="discription"  rows="3" id="discription" placeholder="Enter ..."></textarea>
                            </div>
                           
                            <input type="text" hidden id="hotel_id" name="hotel_id" value="{{ $id }}" />
                              
                            </div>
                            <div class="table table-striped files" id="previews">
                              
                            </div>
                          </div>
                            
                        </div>
                      </div>



                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performStore()" class="btn btn-lg btn-warning">حفظ</button>
                         <a href="{{route('indexFacilitie',$id)}}"><button type="button" class="btn btn-lg btn-danger"> قائمة الصور</button></a>
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
            formData.append('hotel_id',document.getElementById('hotel_id').value);
            formData.append('discription',document.getElementById('discription').value);
        store('/cms/admin/facilitie',formData);

    }

</script>


@endsection


