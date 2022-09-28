@extends('cms.master')
@section('title','الرئيسة')

@section('styles')

@endsection

@section('content')

<div class="container-fluid">
    <div class="row">

        @php
        use App\Models\Admin;
        $count = Admin::count('id');
        @endphp

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><a href="{{route('admins.index')}}" class="small-box-footer nav-link"><i class="fas fa-user"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text">عدد المشرفين</span>
                <span class="info-box-number"><span class='badge bg-success'  >{{$count}} </span> أشخاص</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

        @php
        use App\Models\User;
        $serCount = User::count('id');
        @endphp
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><a href="{{route('users.index')}}" class="small-box-footer nav-link"><i class="fas fa-users"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text">عدد المستخدمين</span>
                <span class="info-box-number"> <span class='badge bg-warning'  >{{$serCount}}</span>  اشخاص </span>

            </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- ./col -->

        @php
        use App\Models\Car;
        $sparCount = Car::count('id');
        @endphp
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><a href="{{route('cars.index')}}" class="small-box-footer nav-link"><i class="fas fa-car"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text">عدد المركبات</span>
                <span class="info-box-number"> <span class='badge bg-danger'  >{{$sparCount}}</span>  مركبة </span>

            </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- ./col -->

        @php
        use App\Models\Hotel;
        $count = Hotel::count('id');
        @endphp

<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-primary elevation-1"><a href="{{route('hotels.index')}}" class="small-box-footer nav-link"><i class="fas fa-hotel"></i></a></span>

      <div class="info-box-content">
        <span class="info-box-text">عدد الفنادق</span>
        <span class="info-box-number"> <span class='badge bg-primary'  >{{$count}}</span>  فندق </span>

    </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>




    <div class="container-fluid col-10 mt-4">
        <h2 class="text-center display-4">النظام</h2>





            <div class="col-md-8 offset-md-2 mt-3">
                <form action="">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" placeholder="ابحث عن جداول النظام " id="search" >
                        <div class="input-group-append ">
                            <button type="button" id="btn"  class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            
    </div>




    </div>
</div>

@endsection

@section('scripts')
<script>
    let search = document.getElementById('search');
    let btn = document.getElementById('btn');
    btn.onclick=function(){
        // console.log(search.value);
        if (search.value === 'مشرفين'||search.value === 'admins'|| search.value === 'admin') {
        window.location.href = '/cms/admin/admins'


    }else if(search.value === 'مستخدمين'||search.value === 'user'|| search.value === 'users'){

        window.location.href = '/cms/admin/users'
    }else if(search.value === 'فنادق'||search.value === 'hotels'|| search.value === 'hotel'){

        window.location.href = '/cms/admin/hotels'
    }
    else if(search.value === 'مركبات'||search.value === 'سيارات'|| search.value === 'car'){

        window.location.href = '/cms/admin/cars'
    }
    else if(search.value === 'مدينة'||search.value === 'مدن'|| search.value === 'city'){

        window.location.href = '/cms/admin/cities'
    }
     else {
        window.location.href = '/cms/admin/'

    }
    }

</script>
@endsection
