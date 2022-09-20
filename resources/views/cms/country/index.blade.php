@extends('cms.master')
@section('title','الدولة ')


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
            <h3 class="card-title">الدولة</h3>
            <div class="card-tools">
                <a href="{{route('countries.create')}}"><button type="button" class="btn btn-lg btn-warning">انشاء دولة </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0 ">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center  ">
              <thead>
                <tr class="bg-danger">
                  <th> رقم الدولة </th>
                  <th>  اسم الدولة </th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($countries as $country )
                <tr>
                  <td>{{$country->id}}</td>

                  <td>{{$country->name}}</td>
                  <td>
                    <div class="btn-group">
                      {{-- @can('Edit-City') --}}
                      <a href="{{route('countries.edit',$country->id)}}" class="btn btn-primary" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-City') --}}
                      <a href="#" onclick="performDestroy({{$country->id}}, this)" class="btn btn-danger" title="Delete">
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
            {{ $countries->links() }}
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
    //let url = '/cms/admin/cities/'+id;
    //confirmDestroy(url, reference);

    var APP_URL = {!! json_encode(url('/cms/admin/countries')) !!}
    confirmDestroy(APP_URL+'/'+id ,reference);
  }
 </script>
@endsection


