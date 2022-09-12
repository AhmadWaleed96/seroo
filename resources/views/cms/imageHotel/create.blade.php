@extends('cms.master')

@section('title',' صور')

@section('styles')

@endsection

@section('active title',' صور')
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
                      <h3 class="card-title">صور</h3>
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
                              <div class="col-lg-6 d-flex"  >
                                <label for="image" class="w-100" >
                                <div class="btn-group w-100">
                                  <span class="btn btn-success col ">
                                    <i class="fas fa-plus"></i>
                                    <span>Add Image</span>
                                  </span>
                                  
                                </div>
                                <div class="form-control mt-3"> Value :<span id="value" class="text-danger text-bold"></span></div>
                               </label>
                            </div>
                            <input type="file" hidden id="image" name="image"  multiple  oninput="input()">
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
                         <a href="{{route('indexImage',$id)}}"><button type="button" class="btn btn-lg btn-danger"> قائمة الصور</button></a>
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
            formData.append('image',document.getElementById('image').files[0]);
        store('/cms/admin/image_hotels',formData);

    }

</script>

<script>
    let value=document.getElementById('value');
    let image=document.getElementById('image');
    function input(){
        value.innerHTML= image.value;
    }

</script>
@endsection


