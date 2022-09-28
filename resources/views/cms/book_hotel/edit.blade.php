@extends('cms.master')

@section('title',' تعديل الحجز')

@section('styles')

@endsection

@section('content')

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
      <div class="row">
          <!-- left column -->
          <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-danger">
                  <div class="card-header">
                      <h3 class="card-title">تعديل الحجز</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                        <br>
                        <div class="row">
                            <div class="form-group col-md-4">
                                    <label for="price"> سعر الحجز  </label>
                                    <input type="text" name="price" class="form-control" value="{{ $item_hotels->price }}"
                                        id="price" placeholder="ادخل سعر الحجز ">
                                </div>
                            <div class="form-group col-md-4">
                                    <label for="checkin"> وقت الدخول </label>
                                    <input type="date" name="checkin" class="form-control" value="{{ $item_hotels->checkin }}"
                                        id="checkin" placeholder="ادخل وقت الدخول ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="checkout"> وقت المغادرة </label>
                                    <input type="date" name="checkout" class="form-control" value="{{ $item_hotels->checkout }}"
                                        id="checkout" placeholder="ادخل وقت المغادرة ">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number_of_people"> عدد المسافرين  </label>
                                    <input type="number" name="number_of_people" class="form-control"
                                        id="number_of_people" placeholder="ادخل  عدد المسافرين  " value="{{ $item_hotels->number_of_people }}">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number_of_children"> عدد الاطفال  </label>
                                    <input type="number" name="number_of_children" class="form-control" value="{{ $item_hotels->number_of_children }}"
                                        id="number_of_children" placeholder="ادخل  عدد الاطفال  ">

                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number_of_room"> عدد الغرف  </label>
                                    <input type="number" name="number_of_room" class="form-control" value="{{ $item_hotels->number_of_room }}"
                                        id="number_of_room" placeholder="ادخل  عدد الغرف  ">

                                </div>

                                <div class="form-group col-md-4">
                                    <label for="city_id">  واجهة الطريق   </label>
                                    <select class="form-control" name="city_id"
                                    id="city_id" >
                                    @foreach ($cities as $city)

                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label for="city_id"> الفندق  </label>
                                    <select class="form-control" name="hotel_id"
                                    id="hotel_id" >
                                    @foreach ($hotels as $hotel)

                                    <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                    @endforeach
                                    </select>
                                </div> --}}

                        </div>

                        </div>

                      <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$item_hotels->id}})" class="btn btn-lg btn-warning">حفظ</button>
                         <a href="{{route('item_hotels.index')}}"><button type="button" class="btn btn-lg btn-danger"> الغاء</button></a>
                      </div>
                  </form>
              </div>
              <!-- /.card -->
          </div>
          <!--/.col (left) -->
      </div>
      <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

  </section>
  <!-- /.content -->

@endsection

@section('scripts')


<script>

    function performUpdate(id){
    let formData = new FormData();
    formData.append('city_id',document.getElementById('city_id').value);
            // formData.append('hotel_id',document.getElementById('hotel_id').value);
            formData.append('price',document.getElementById('price').value);
            formData.append('checkin',document.getElementById('checkin').value);
            formData.append('checkout',document.getElementById('checkout').value);
            formData.append('number_of_room',document.getElementById('number_of_room').value);
            formData.append('number_of_people',document.getElementById('number_of_people').value);
            formData.append('number_of_children',document.getElementById('number_of_children').value);
        var APP_URL = {!! json_encode(url('/cms/admin/update_item_hotels/')) !!}
        storeRoute( APP_URL+'/'+id ,formData);

    }
    </script>


@endsection


