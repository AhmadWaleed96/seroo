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

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0 ">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center  ">
              <thead>
                <tr class="bg-danger">
                  <th> رقم الصور </th>
                  <th>   الصورة </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($images as $image )
                <tr>
                  <td>{{$image->id}}</td>
                  <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('public/storage/image_car/'.$image->image)}}" width="60px" height="60px" alt="User Image">
                  </td>

                  <td>
                    <div class="btn-group">
                      {{-- @can('Edit-City') --}}
                      <a href="{{route('image_cars.edit',$image->id)}}" class="btn btn-primary" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-City') --}}
                      <a href="#" onclick="performDestroy({{$image->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </a>
                      {{-- @endcan --}}

                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
            {{-- { $cities->links()} --}}
            {{ $images->links() }}
        </span>

          </div>
          <!-- /.card-body -->

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
    //let url = '/cms/admin/image_cars/'+id;
    //confirmDestroy(url, reference);

    var APP_URL = {!! json_encode(url('/cms/admin/image_cars')) !!}
    confirmDestroy(APP_URL+'/'+id ,reference);
  }
 </script>
@endsection


