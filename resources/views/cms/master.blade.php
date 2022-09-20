<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CMSA | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/cms/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/cms/plugins/fontawesome-free-6.1.1/css/all.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('public/cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('public/cms/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/cms/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/cms/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('public/cms/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Bootstrap 4 RTL -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/cms/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Custom style for RTL -->
    <link rel="stylesheet" href="{{ asset('public/cms/dist/css/custom.css') }}">
    @yield('styles')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Amiri&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Amiri&family=Mada:wght@400&family=Markazi+Text:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Amiri&family=El+Messiri:wght@500&display=swap');
        *{
            /* font-family: 'Amiri', serif; */
            /* font-family: 'El Messiri', sans-serif; */
            /* font-family: 'Markazi Text', serif; */




        }
        </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>


  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('public/cms/dist/img/pro-center.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SERO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if (Auth::guard('admin')->id())
            <img src="{{ asset('public/storage/images/'.auth('admin')->user()->image) }}" class="img-circle elevation-2" alt="User Image">
            {{--  <img class="img-circle elevation-2" src="{{asset('public/storage/images/admin/'.$admin->image)}}" alt="Admin Image">  --}}
            @else
            <img class="img-circle elevation-2" src="{{asset('public/storage/images/users.jpg')}}"  alt="Admin Image">
            @endif

        </div>
        <div class="info">
            @if (Auth::guard('admin')->id())
            <a href="#" class="d-block"> {{ auth('admin')->user()->full_name }}</a>
            @elseif (Auth::guard('web')->id())
            <a href="#" class="d-block"> {{ auth('web')->user()->full_name }}</a>
            @else
            <a href="#" class="d-block"> users</a>

            @endif
        </div>
      </div>





      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          </li>
          {{-- <li class="nav-header">الادوار والصلاحيات </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-friends nav-icon"></i>
              <p>
                الادوار
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route("roles.index") }}" class="nav-link">
                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض الادوار</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route("roles.create") }}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>
                  <p>اضافة دور جديد </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-friends nav-icon"></i>
              <p>
                الصلاحيات
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route("permissions.index") }}" class="nav-link">
                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض الصلاحيات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route("permissions.create") }}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>
                  <p>اضافة صلاحية جديدة </p>
                </a>
              </li>
            </ul>
          </li> --}}

          <li class="nav-header">المستخدمين</li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-friends nav-icon"></i>
              <p>
                المشرفين
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route("admins.index") }}" class="nav-link">
                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض المشرفين</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route("admins.create") }}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>
                  <p>اضافة مشرف </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-friends nav-icon"></i>
              <p>
                المستخدمين
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="fas fa-desktop nav-icon"></i>
                  <p> عرض المستخدمين</p>
                </a>
              </li>



              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>
                  <p> اضافة مستخدم</p>
                </a>
              </li>
            </ul>

          </li>

          <li class="nav-header">dashborad</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="fas fa-city "></i> --}}
                <i class="fa-solid fa-road nav-icon"></i>
            <p>
                الطرق
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ways.index')}}" class="nav-link">

                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض الطرق</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ways.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                  <p>اضافة طريق </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="fas fa-city "></i> --}}
                <i class="fa-solid fa-building nav-icon"></i>
            <p>
                الشركات
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('companes.index')}}" class="nav-link">

                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض الشركات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('companes.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                    <p>اضافة شركة </p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
          <i class="fas fa-city nav-icon"></i>
      <p>
          المدن
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('cities.index')}}" class="nav-link">

              <i class="fas fa-desktop nav-icon"></i>
            <p>عرض المدن</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('cities.create')}}" class="nav-link">
              <i class="fas fa-plus nav-icon"></i>

            <p>اضافة مدينة </p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-city nav-icon"></i>
        <p>
            الدول
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('countries.index')}}" class="nav-link">

                <i class="fas fa-desktop nav-icon"></i>
              <p>عرض الدول</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('countries.create')}}" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>

              <p>اضافة دولة </p>
            </a>
          </li>
        </ul>
      </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="fas fa-city "></i> --}}
                <i class="fa-solid fa-car nav-icon"></i>
            <p>
                الحزم
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('packages.index')}}" class="nav-link">

                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض الحزم</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('packages.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                  <p>اضافة حزم </p>
                </a>
              </li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-users nav-icon"></i>
            <p>
                العناصر
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('item_hotels.index')}}" class="nav-link">

                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض عناصر الفنادق</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('item_hotels.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                  <p>اضافة عناصر للفنادق </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('packages.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                  <p>عرض عناصر السيارات </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('packages.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                  <p>اضافة عناصر لسيارات </p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="fas fa-city "></i> --}}
                <i class="fa-solid fa-car nav-icon"></i>
            <p>
                المركبات
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cars.index')}}" class="nav-link">

                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض المركبات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('cars.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                  <p>اضافة مركبة </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="fas fa-city "></i> --}}
                <i class="fa-solid fa-car nav-icon"></i>
            <p>
                الطائرات
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('flights.index')}}" class="nav-link">

                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض الطائرات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('flights.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                  <p>اضافة طائرات </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="fas fa-city "></i> --}}
                <i class="fa-solid fa-hotel nav-icon"></i>
            <p>
                الفنادق
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('hotels.index')}}" class="nav-link">

                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض الفنادق</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('hotels.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                  <p>اضافة فندق </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="fas fa-city "></i> --}}
                <i class="fa-solid fa-car nav-icon"></i>
            <p>
                التأمين
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('personals.index')}}" class="nav-link">

                    <i class="fas fa-desktop nav-icon"></i>
                  <p>عرض التأمين</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('personals.create')}}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>

                  <p>اضافة تأمين </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">
            الإعدادات
       </li>

             <li class="nav-item">
               <a href="{{ route('cms.auth.profile-edit') }}" class="nav-link">
                   <i class="fas fa-user-cog ml-2"></i>
                 <p>   تعديل الصفحة الشخصية</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('cms.admin.edit-password') }}" class="nav-link">
                   <i class="fas fa-lock ml-2"></i>
                 <p> تغيير كلمة المرور  </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ route('logout-admin') }}" class="nav-link">
                   <i class="fas fa-sign-out-alt ml-2"></i>
                     <p>   تسجيل الخروج  </p>
               </a>
             </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> @yield("page title")</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">الرئيسية</a> </li>
              <li class="breadcrumb-item active"> @yield('active title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @yield('content')

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>    جميع الحقوق محفوظة  {{ now()->year }}-{{ now()->year+1 }} &copy;<a href="#">{{ env('APP_NAME') }}</a>.</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> {{ env('APP_VERSION') }}
    </div>
   </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/cms/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="{{ asset('https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('public/cms/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/cms/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('public/cms/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('public/cms/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/cms/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/cms/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/cms/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('public/cms/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/cms/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/cms/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/cms/dist/js/demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="{{asset('public/cms/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('public/cms/js/crud.js')}}"></script>
@yield('scripts')
</body>
</html>
