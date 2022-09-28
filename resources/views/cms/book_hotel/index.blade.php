@extends('cms.master')
@section('title','عرض الحجوزات   ')


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
            <h3 class="card-title">عرض الحجوزات  </h3>
            <div class="card-tools">
               
                    
                <a href="{{route('book_hotels.create')}}"><button type="button" class="btn btn-lg btn-warning">انشاء حجز جديد </button></a>
                    
                
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0 ">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center  ">
              <thead>
                <tr class="bg-danger">
                    <th> سعر الحجز   </th>
                    <th>وقت الدخول  </th>
                    <th>وقت المغادرة  </th>
                  <th>عدد الغرف </th>
                  <th>عدد الاشخاص </th>
                  <th> اسم المستخدم</th>
                  <th>  الفنادق</th>
                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($book_hotels as $item )
                <tr>
                   
                  <td >{{$item->price}}</td>
                  <td >{{$item->date_of_arrival}}</td>
                  <td>{{$item->departure_date}}</td>
                  <td>{{$item->number_of_room}}</td>
                  <td>{{$item->number_of_people}}</td>
                  
                  @foreach (App\Models\User::where('id', $item->user_id)->get() as $user )
                      
                  <td>{{ $user->first_name . ' '. $user->last_name}}</td>
                  @endforeach
                  <td>{{$item->hotel->name}}</td>
                  


                  <td>
                    <div class="btn-group">
                      {{-- @can('Edit-car') --}}
                      <a href="{{route('book_hotels.edit',$item->id)}}" class="btn btn-warning" title="Edit">
                        تعديل
                        </a>
                      {{-- @endcan --}}
                      {{-- @can('Delete-car') --}}
                      <a href="#" onclick="performDestroy({{$item->id}}, this)" class="btn btn-danger" title="Delete">
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
            {{ $book_hotels->links() }}
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
    // let url = '/cms/admin/item_hotels/'+id;
    var APP_URL = {!! json_encode(url('/cms/admin/item_hotels')) !!}
    confirmDestroy(APP_URL+'/'+id, reference);
  }
 </script>
@endsection


