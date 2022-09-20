@extends('cms.master')
@section('title','التأمين  ')

@section('left-title','عرض بيانات التأمين ')

@section('active title','عرض بيانات التأمين ')

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
            <h3 class="card-title"> عرض بيانات التأمين </h3>
            <div class="card-tools">

                <a href="{{route('personals.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء تأمين جديدة</button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> الاسم الاول </th>
                  <th>  الاسم الاخير  </th>
                  <th>  الايميل  </th>
                  <th>   رقم الجوال  </th>
                  <th>   رقم الجوال الاحتياط  </th>
                  <th>  الدولة   </th>
                  <th>  المدينة   </th>
                  <th>  العنوان   </th>
                  <th>   رقم جواز السفر  </th>
                  <th>   تاريخ البدأ  </th>
                  <th>   تاريخ الانتهاء  </th>
                  <th>   عدد الاشخاص  </th>
                  <th>   عدد الاطفال  </th>
                  <th>   عدد الاطفال الرضع  </th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($personals as $personal )
                <tr>
                  <td>{{$personal->id}}</td>
                  <td>{{$personal->firstName }}</td>
                  <td>{{$personal->firstName }}</td>
                  <td>{{$personal->email }}</td>
                  <td>{{$personal->phone }}</td>
                  <td>{{$personal->phone2}}</td>
                  <td>{{$personal->country_id}}</td>
                  <td>{{$personal->city_id}}</td>
                  <td>{{$personal->address }}</td>
                  <td>{{$personal->postalCode }}</td>
                  <td>{{$personal->startDate }}</td>
                  <td>{{$personal->endDate }}</td>
                  <td>{{$personal->adultsCount }}</td>
                  <td>{{$personal->childrenCount }}</td>
                  <td>{{$personal->infantCount }}</td>

                        <div class="btn-group">
                            <a href="{{route('personals.edit',$personal->id)}}" class="btn btn-info" title="Edit"><i class="fa-solid fa-pen-to-square nav-icon"></i></a>
                                <a href="#" onclick="performDestroy({{$personal->id}}, this)" class="btn btn-danger" title="Delete"><i class="fa-solid fa-trash nav-icon"></i></a>
                          <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" style="">
                              <a class="dropdown-item " href="{{route('personals.show',$personal->id)}}" title="Show" ><i class="fa-solid fa-info nav-icon"></i> معلومات</a>
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
{{ $personals->links() }}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    //let url = '/cms/admin/packages/'+id;
   //confirmDestroy(url, reference);

   var APP_URL = {!! json_encode(url('/cms/admin/personals')) !!}
    confirmDestroy(APP_URL+'/'+id ,reference);
  }
 </script>
@endsection
