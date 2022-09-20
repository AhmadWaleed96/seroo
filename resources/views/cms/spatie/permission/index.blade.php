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
                <a href="{{route('permissions.create')}}"><button type="button" class="btn btn-lg btn-warning">انشاء صلاحية جديد </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0 ">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center  ">
              <thead>
                <tr class="bg-danger">
                  <th> رقم الدور </th>
                  <th>  الاسم الصلاحية </th>
                  <th> النوع الوظيفي</th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $permission )
                <tr>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->name}}</td>
                  @if ($permission->guard_name == 'admin')
                  <td><span class="badge bg-success">{{$permission->guard_name}}</span></td>
                  @endif
                  @if ($permission->guard_name == 'web')
                  <td><span class="badge bg-warning ">{{$permission->guard_name}}</span></td>
                  @endif

                  <td>
                    <div class="btn-group">
                      {{-- @can('Edit-permission') --}}
                      <a href="{{route('permissions.edit',$permission->id)}}" class="btn btn-warning" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-permission') --}}
                      <a href="#" onclick="performDestroy({{$permission->id}}, this)" class="btn btn-danger" title="Delete">
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
            {{ $permissions->links() }}
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
    //let url = '/cms/admin/permissions/'+id;
    //confirmDestroy(url, reference);

    var APP_URL = {!! json_encode(url('/cms/admin/permissions')) !!}
    confirmDestroy(APP_URL+'/'+id ,reference);
  }
 </script>
@endsection


