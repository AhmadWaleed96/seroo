@extends('cms.master')
@section('title','الطائرات ')


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
            <h3 class="card-title">الطائرات</h3>
            <div class="card-tools">
                <a href="{{route('cars.create')}}"><button type="button" class="btn btn-lg btn-warning">انشاء طائرة جديدة </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0 ">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center  ">
              <thead>
                <tr class="bg-danger">
                  <th>  اسم الطائرة </th>
                  <th>تقييم الطائرة</th>
                  <th> اضافة صور</th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($flights as $flight )
                <tr>
                  <td >{{$flight->name}}</td>
                  @if ( $hotel->rate  =='5')
                  <td><span class="text-warning"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span></td>
                  @elseif ($hotel->rate  =='4')
                      <td><span class="text-warning"><i class="fa-solid fa-star"><i class="fa-solid fa-star"><i class="fa-solid fa-star"><i class="fa-solid fa-star"></span></td>
                  @elseif ($hotel->rate  =='3')
                      <td><span class="text-warning"><i class="fa-solid fa-star"><i class="fa-solid fa-star"><i class="fa-solid fa-star"></span></td>
                  @elseif ($hotel->rate  =='2')
                      <td><span class="text-warning"><i class="fa-solid fa-star"><i class="fa-solid fa-star"></span></td>
                  @elseif ($hotel->rate  =='1')
                      <td><span class="text-warning"><i class="fa-solid fa-star"></span></td>
                        @else
                        <td><span class="badge bg-danger">not found</span></td>
                  @endif
                  <td><a href="{{route('index.image-flights',['id'=>$flight->id])}}"
                    class="btn btn-outline-danger btn-sm">({{$flight->images_count}})
                    الصور</a> </td>


                  <td>
                    <div class="btn-group">
                      {{-- @can('Edit-flight') --}}
                      <a href="{{route('flights.edit',$flight->id)}}" class="btn btn-warning" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-flight') --}}
                      <a href="#" onclick="performDestroy({{$flight->id}}, this)" class="btn btn-danger" title="Delete">
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
            {{ $flights->links() }}
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
    //let url = '/cms/admin/flights/'+id;
    //confirmDestroy(url, reference);

    var APP_URL = {!! json_encode(url('/cms/admin/flights')) !!}
    confirmDestroy(APP_URL+'/'+id ,reference);
  }
 </script>
@endsection


