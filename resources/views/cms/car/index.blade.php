@extends('cms.master')
@section('title','الصلاحيات ')


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
            <h3 class="card-title">الصلاحيات</h3>
            <div class="card-tools">
                <a href="{{route('cars.create')}}"><button type="button" class="btn btn-lg btn-warning">انشاء مركبة جديدة </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0 ">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center  ">
              <thead>
                <tr class="bg-danger">
                    <th>صورة المركبة</th>
                  <th>  اسم المركبة </th>
                  <th>نمرة المركبة</th>
                  <th >لون المركبة</th>
                  <th>نوع المركبة</th>
                  <th>مودل المركبة</th>
                  <th> اضافة صور</th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cars as $car )
                <tr>
                    @if ($car->image != '')

                    <td>  <img class="img-circle img-bordered-sm" src="{{asset('public/storage/images/car/'.$car->image)}}" width="60" height="60" alt="User Image"> </td>
                    @else

                    <td>  <img class="img-circle img-bordered-sm" src="{{asset('public/storage/images/Taxi.png')}}" width="60" height="60" alt="User Image"> </td>
                    @endif
                  <td >{{$car->name}}</td>
                  <td>{{$car->car_number}}</td>
                  <td><span style="background-color:{{$car->car_color}};" class="badge">{{$car->car_color}}</span></td>
                  <td>{{$car->type_car}}</td>
                  <td>{{$car->model}}</td>
                  <td><a href="{{route('index.image-cars',['id'=>$car->id])}}"
                    class="btn btn-outline-danger btn-sm">({{$car->images_count}})
                    الصور</a> </td>


                  <td>
                    <div class="btn-group">
                      {{-- @can('Edit-car') --}}
                      <a href="{{route('cars.edit',$car->id)}}" class="btn btn-warning" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-car') --}}
                      <a href="#" onclick="performDestroy({{$car->id}}, this)" class="btn btn-danger" title="Delete">
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
            {{ $cars->links() }}
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
    let url = '/cms/admin/cars/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


