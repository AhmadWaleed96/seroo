@extends('cms.master')
@section('title','الحزم  ')

@section('left-title','عرض الحزم ')

@section('active title','عرض الحزم ')

@section('styles')
  <style>

</style>
@endsection

@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"> عرض الحزم </h3>
            <div class="card-tools">

                <a href="{{route('packages.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء حزمة جديدة</button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الحزمة </th>
                  <th>  اسم الحزمة  </th>
                  <th>  السعر  </th>
                  <th>   نوع السياحة </th>
                  <th>   مدة الرحلة </th>
                  <th>  تاريخ البدأ  </th>
                  <th>  تاريخ النهاية  </th>
                  <th>   وصف الرحلة </th>
                  <th>   اضافة صورة</th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($packages as $package )
                <tr>
                  <td>{{$package->id}}</td>
                  <td>{{$package->name }}</td>
                  <td>{{$package->price }}</td>
                  <td>{{$package->entertainment }}</td>
                  <td>{{$package->duration }}</td>
                  <td>{{$package->date_start}}</td>
                  <td>{{$package->date_end}}</td>
                  <td>{{$package->description }}</td>
                  @if ($package->image != '')

                    <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/package/'.$package->image)}}" width="60" height="60" alt="User Image"> </td>
                    @else

                    <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/hotels/1659308670image.jpg')}}" width="60" height="60" alt="User Image"> </td>
                    @endif
                    <td>
                        <div class="btn-group">
                            <a href="{{route('packages.edit',$package->id)}}" class="btn btn-info" title="Edit"><i class="fa-solid fa-pen-to-square nav-icon"></i></a>
                                <a href="#" onclick="performDestroy({{$package->id}}, this)" class="btn btn-danger" title="Delete"><i class="fa-solid fa-trash nav-icon"></i></a>
                          <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" style="">
                              <a class="dropdown-item " href="{{route('packages.show',$package->id)}}" title="Show" ><i class="fa-solid fa-info nav-icon"></i> معلومات</a>
                            </div>
                          </div>
                        </div>
                      </td>

                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="span text-center" style="margin-top: 20px; margin-bottom:10px">
            </span>

        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
</div>
{{ $packages->links() }}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/packages/'+id;
   confirmDestroy(url, reference);
  }
 </script>
@endsection
