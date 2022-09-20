@extends('cms.master')
@section('title','الادوار ')


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
            <h3 class="card-title">الادوار</h3>
            <div class="card-tools">
                <a href="{{route('roles.create')}}"><button type="button" class="btn btn-lg btn-warning">انشاء دور جديد </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0 ">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center  ">
              <thead>
                <tr class="bg-danger">
                  <th> رقم الدور </th>
                  <th>  الاسم الوظيفي </th>
                  <th>  الصلاحيات  </th>
                  <th> النوع الوظيفي</th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role )
                <tr>
                  <td>{{$role->id}}</td>
                  <td>{{$role->name}}</td>
                  <td>
                    <a href="{{ route('role.permissions.index' , $role->id)}}"
                      class="btn btn-primary"> الصلاحيات ({{ $role->permissions_count }})
                    </a>
                  </td>
                  @if ($role->guard_name == 'admin')
                  <td><span class="badge bg-success">{{$role->guard_name}}</span></td>
                  @endif
                  @if ($role->guard_name == 'web')
                  <td><span class="badge bg-warning">{{$role->guard_name}}</span></td>
                  @endif

                  <td>
                    <div class="btn-group">
                      {{-- @can('Edit-role') --}}
                      <a href="{{route('roles.edit',$role->id)}}" class="btn btn-warning" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-role') --}}
                      <a href="#" onclick="performDestroy({{$role->id}}, this)" class="btn btn-danger" title="Delete">
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
            {{ $roles->links() }}
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
    //let url = '/cms/admin/roles/'+id;
    //confirmDestroy(url, reference);

    var APP_URL = {!! json_encode(url('/cms/admin/roles')) !!}
    confirmDestroy(APP_URL+'/'+id ,reference);
  }
 </script>
@endsection


