@extends('cms.master')
@section('title','الغرف ')


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
            <h3 class="card-title">الغرف</h3>
            <div class="card-tools">
                <a href="{{route('createRoom',$id)}}"><button type="button" class="btn btn-lg btn-warning">انشاء غرفة </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0 ">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center  ">
              <thead>
                <tr class="bg-danger">
                  <th> رقم الغرفة </th>
                  <th>  اسم الغرفة </th>
                  <th> نوع الاقامة </th>
                  <th> المزايا</th>
                  <th> السعر</th>
                  <th> الفندق</th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($rooms as $room )
                <tr>
                  <td>{{$room->number_room}}</td>
                  <td>{{$room->name_room}}</td>
                  <td>{{$room->accommodation_type}}</td>
                  <td>{{$room->Advantages}}</td>
                  <td>{{$room->price}}</td>
                  <td>{{$room->hotel->name}}</td>

                  <td>
                    <div class="btn-group">
                      {{-- @can('Edit-City') --}}
                      <a href="{{route('rooms.edit',$room->id)}}" class="btn btn-primary" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-City') --}}
                      <a href="#" onclick="performDestroy({{$room->id}}, this)" class="btn btn-danger" title="Delete">
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
            {{ $rooms->links() }}
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
    let url = '/cms/admin/rooms/'+id;
    confirmDestroy(url, reference);
  }
 </script>
@endsection


