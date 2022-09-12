@extends('cms.master')
@section('title','الفنادق  ')

@section('left-title','عرض الفنادق ')

@section('active title','عرض الفنادق ')

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
            <h3 class="card-title"> عرض الفنادق </h3>
            <div class="card-tools">
                {{-- <form action="" method="get" >
                    <div class="row">
                        <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="search Name "
                               name='hotel_name' @if( request()->hotel_name) value={{request()->hotel_name}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>

                            <div class="input-icon col-md-2">
                            <input type="text" class="form-control" placeholder="search mobile"
                               name='mobile' @if( request()->mobile) value={{request()->mobile}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>

                            <div class="input-icon col-md-2">
                            <input type="date" class="form-control" placeholder="Search By Date"
                               name='created_at' @if( request()->created_at) value={{request()->created_at}} @endif/>
                              <span>
                                  <i class="flaticon2-search-1 text-muted"></i>
                              </span>
                            </div>

                    <div class="col-md-5 col-4">
                          <button class="btn btn-success btn-md" type="submit">فلتر البحث</button>
                          <a href="{{route('hotels.index')}}"  class="btn btn-danger">إنهاء البحث</a>
                          <a href="{{route('hotels.create')}}"><button type="button" class="btn  btn-primary">انشاء زائر جديدة </button></a>
                        </div>



                  </div>
            </form> --}}
                <a href="{{route('hotels.create')}}"><button type="button" class="btn btn-lg btn-primary">انشاء فندق جديد </button></a>
              </div>
              <br>
            </div>

          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-bordered table-striped text-nowrap text-center">
              <thead>
                <tr class="bg-info">
                  <th> رقم الفندق </th>
                  <th>  اسم الفندق  </th>
                  <th>  التقيم  </th>
                  <th>   العنوان</th>
                  <th>   اضافة صورة</th>
                  <th>   اضافة مرافق</th>
                  <th>   اضافة غرفة</th>

                  <th> الاعدادات </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hotels as $hotel )
                <tr>
                  <td>{{$hotel->id}}</td>
                  <td>{{$hotel->name }}</td>
                  @if ( $hotel->rate  =='5')
                  <td><span class="text-warning"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span></td>
                  @elseif ($hotel->rate  =='4')
                      <td><span class="text-warning"><i class="fa-solid fa-star"><i class="fa-solid fa-star"><i class="fa-solid fa-star"><i class="fa-solid fa-star"></span></td>
                  @elseif ($hotel->rate  =='3')
                      <td><span class="text-warning"><i class="fa-solid fa-star"><i class="fa-solid fa-star"><i class="fa-solid fa-star"></span></td>
                  @elseif ($hotel->rate  =='2')
                      <td><span class="text-warning"><i class="fa-solid fa-star"><i class="fa-solid fa-star"></span></td>
                  @elseif ($hotel->rate  =='1')
                      <td><span class="text-warning"><i class="fa-solid fa-star"></span></td>
                        @else
                        <td><span class="badge bg-danger">not found</span></td>
                  @endif
                 

                  <td>{{$hotel->address}}</td>

                  <td><a href="{{route('indexImage',['id'=>$hotel->id])}}"
                    class="btn btn-outline-danger btn-sm">({{$hotel->images_count}})
                    الصور</a> </td>

                  <td ><a href="{{route('indexFacilitie',['id'=>$hotel->id])}}"
                    class="btn btn-outline-success btn-sm">({{$hotel->facilitie_count}})
                    مرافق</a> </td>

                  

                  <td ><a href="{{route('indexRoom',['id'=>$hotel->id])}}"
                    class="btn btn-outline-warning btn-sm">({{$hotel->rooms_count}})
                    الغرف</a> </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('hotels.edit',$hotel->id)}}" class="btn btn-info" title="Edit"><i class="fa-solid fa-pen-to-square nav-icon"></i></a>
                                <a href="#" onclick="performDestroy({{$hotel->id}}, this)" class="btn btn-danger" title="Delete"><i class="fa-solid fa-trash nav-icon"></i></a>  
                          <div class="btn-group">
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" style="">
                              <a class="dropdown-item " href="{{route('hotels.show',$hotel->id)}}" title="Show" ><i class="fa-solid fa-info nav-icon"></i> معلومات</a>
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
{{ $hotels->links() }}
</div>
  </div>
</section>

@endsection

@section('scripts')

 <script>
  function performDestroy(id, reference){
    let url = '/cms/admin/hotels/'+id;
   confirmDestroy(url, reference);
  }
 </script>
@endsection


