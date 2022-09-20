@extends('cms.master')

@section('title','الغرف')

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
                      <h3 class="card-title">الغرف</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="create_form">
                      @csrf
                      <div class="card-body">

                      <br>
                      <div class="row">


                        <div class="form-group col-md-4">
                            <label for="name_room">الاسم الغرفة</label>
                            <input type="text" name="name_room" class="form-control" id="name_room" value="{{ $rooms->name_room }}"
                                placeholder="أدخل الاسم الغرف">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="number_room"> رقم الغرفة</label>
                            <input type="text" name="number_room" class="form-control" id="number_room" value="{{ $rooms->number_room }}"
                                placeholder="ادخل رقم الغرفة ">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Advantages"> المزايا</label>
                            <input type="text" name="Advantages" class="form-control" id="Advantages" value="{{ $rooms->Advantages }}"
                                placeholder="ادخل  المزايا">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="accommodation_type"> نوع الاقامة</label>
                            <input type="text" name="accommodation_type" class="form-control" id="accommodation_type" value="{{ $rooms->name_room }}"
                                placeholder="ادخل  نوع الاقامة">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price"> السعر</label>
                            <input type="text" name="price" class="form-control" id="price"  value="{{ $rooms->price }}"
                                placeholder="ادخل السعر">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hotel_id">الفنادق</label>
                            <select type="text" name="hotel_id" class="form-control" id="hotel_id">
                                @foreach ($hotels as  $hotel)

                                <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="discreption">الوصف</label>
                            <textarea class="form-control" name="discreption"  rows="3" id="discreption" placeholder="Enter ..."> {{ $rooms->discreption }}</textarea>
                          </div>

                    </div>

                      <br>

                  <!-- /.card-body -->
                      <div class="card-footer">
                          <button type="button" onclick="performUpdate({{$rooms->id}})" class="btn btn-lg btn-warning">حفظ</button>
                         <a href="{{route('rooms.index')}}"><button type="button" class="btn btn-lg btn-danger"> قائمة الغرف </button></a>
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
        formData.append('name_room',document.getElementById('name_room').value);
        formData.append('number_room',document.getElementById('number_room').value);
        formData.append('discreption',document.getElementById('discreption').value);
        formData.append('Advantages',document.getElementById('Advantages').value);
        formData.append('accommodation_type',document.getElementById('accommodation_type').value);
        formData.append('hotel_id',document.getElementById('hotel_id').value);
        formData.append('price',document.getElementById('price').value);
    //storeRoute('/cms/admin/update_rooms/'+id , formData );

    var APP_URL = {!! json_encode(url('/cms/admin/update_rooms')) !!}
        storeRoute( APP_URL+'/'+id ,formData);
    }
    </script>


@endsection


