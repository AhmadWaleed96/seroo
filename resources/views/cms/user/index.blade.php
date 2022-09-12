@extends('cms.master')
@section('title','المستخدمين ')


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
            <h3 class="card-title"> عرض المستخدمين </h3>
            <div class="card-tools">
                <a href="{{route('register')}}"><button type="button" class="btn btn-lg btn-warning">انشاء مستخدم جديد </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-danger">
                  <th>  اسم المستخدم  </th>
                  <th>  المدينة </th>
                  <th>  الأيميل </th>
                  <th>   رقم الجوال </th>
                  <th>  الصورة  </th>
                  
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user )
                <tr>
           
                  {{-- <td>{{$user->who}}</td> --}}
                  
                  <td>{{ $user->first_name  .' '. $user->last_name  }}</td>
                  {{-- <td>{{$user->city ? $user->city->name:' ' }}</td> --}}
                  <td>{{$user->city_id}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->mobile}}</td>
                  @if ($user->image != '')
                      
                  <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/register/'.$user->image)}}" width="60" height="60" alt="User Image"> </td>
                  @else
                  
                  <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/users.jpg')}}" width="60" height="60" alt="User Image"> </td>
                  @endif

                  <td>
                    <div class="btn-group">
                      {{-- <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary" title="Edit">
                        تعديل
                        </a> --}}

                      <button type="button" onclick="performDestroy({{$user->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </button>

                      <a href="{{route('users.show',$user->id)}}" class="btn btn-success" title="Show">
                        معلومات
                      </a>
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
{{ $users->links() }}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/users/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


