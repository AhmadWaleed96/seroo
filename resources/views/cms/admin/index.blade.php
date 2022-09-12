@extends('cms.master')
@section('title','المشرفين ')


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
            <h3 class="card-title"> عرض المشرفين </h3>
            <div class="card-tools">
                <a href="{{route('admins.create')}}"><button type="button" class="btn btn-lg btn-warning">انشاء مشرف جديد </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-danger">

                    <th>  الصورة  </th>
                  <th>  اسم المشرف  </th>
                  <th>  تاريخ الميلاد </th>
                  <th>  الأيميل </th>
                  <th>   رقم الجوال </th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($admins as $admin )
                <tr>

                  {{-- <td>{{$admin->who}}</td> --}}
                  {{-- <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('images/admin_who/'.$admin->image_who)}}" width="60" height="60" alt="User Image">
                  </td> --}}
                  @if ($admin->image != '')

                  <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/admin/'.$admin->image)}}" width="60" height="60" alt="User Image"> </td>
                  @else

                  <td>  <img class="img-circle img-bordered-sm" src="{{asset('storage/images/users.jpg')}}" width="60" height="60" alt="User Image"> </td>
                  @endif
                  <td>{{$admin->first_name .' '. $admin->last_name  }}</td>
                  <td>{{$admin->date_of_birth }}</td>
                  <td>{{$admin->email}}</td>
                  <td>{{$admin->mobile}}</td>

                  <td>
                    <div class="btn-group">
                      {{-- <a href="{{route('admins.edit',$admin->id)}}" class="btn btn-primary" title="Edit">
                        تعديل
                        </a> --}}

                      <button type="button" onclick="performDestroy({{$admin->id}}, this)" class="btn btn-danger" title="Delete">
                        حذف
                      </button>

                      <a href="{{route('admins.show',$admin->id)}}" class="btn btn-success" title="Show">
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
{{ $admins->links() }}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/admins/'+id;
   confirmDestroy(url, reference);
  }
 </script>
@endsection


