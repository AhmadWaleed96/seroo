@extends('cms.master')
@section('title','الصور ')


@section('styles')
  <style>

</style>
@endsection

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card ">
          <div class="card-header">
            <h3 class="card-title">الصور</h3>
            <div class="card-tools">
                <a href="{{route('create.image-cars',$id)}}"><button type="button" class="btn btn-lg btn-warning">اضافة صور </button></a>
              </div>
              <br>
            </div>
            <div class="container">
            <div class="row" style="justify-content: space-around;">
             @foreach ($images as $image )
                 
             
            <div class="card card-primary card-outline col-5 mt-3 ">
                <div class="card-body box-profile">
                  <div class="text-center mt-3">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/image_car/'.$image->image)}}" width="60" height="60" alt="Car Image">
                  </div>
  
                  <h3 class="profile-username text-center mt-4">رقم الصورة <b class="badge bg-success">{{$image->id}}</b></h3>
  
  
                  
                  <a href="{{route('image_cars.edit',$image->id)}}" class="btn btn-primary mt-4" title="Edit">تعديل</a>
                  <a href="#" onclick="performDestroy({{$image->id}}, this)" class="btn btn-danger mt-4 "><b>حذف</b></a>
                </div>
                <!-- /.card-body -->
              </div> 
              @endforeach 
            </div>      
        </div>  
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/image_cars/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


