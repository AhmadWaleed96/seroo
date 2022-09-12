<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free-6.1.1/css/all.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <style>
    body{background: rgb(51, 39, 120)}.form-control:focus{box-shadow: none;border-color: #BA68C8}.profile-button{background: rgb(99, 39, 120);box-shadow: none;border: none}.profile-button:hover{background: #682773}.profile-button:focus{background: #682773;box-shadow: none}.profile-button:active{background: #682773;box-shadow: none}.back:hover{color: #682773;cursor: pointer}.labels{font-size: 11px}.add-experience:hover{background: #BA68C8;color: #fff;cursor: pointer;border: solid 1px #BA68C8}

    </style>
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if ($users->image !='')

                <img class="rounded-circle" width="100" height="100" src="{{ asset('storage/images/register/'.$users->image) }}">
                @else
                <img class="rounded-circle" width="100" height="100" src="{{ asset('storage/images/userSolid.png') }}">

                @endif

                <label for="image" class="btn btn-outline-success btn-sm mt-3">  اضافة صورة <i class="fas fa-plus"></i></label>
                <input type="file" id="image" name="image" multiple hidden/>
                <span class="font-weight-bold">{{ $users->first_name }}</span>
                <span class="text-black-50">{{ $users->email }}</span>
                <span> </span>
            </div>
            </div>

        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="first_name">First Name</label>
                        <input type="text" class="form-control" placeholder="first name" value="{{$users->first_name}}" name="first_name" id="first_name">
                    </div>
                     <div class="col-md-6">
                        <label class="last_name">Last Name</label>
                        <input type="text" class="form-control" placeholder="last name" value="{{$users->last_name}}" name="last_name" id="last_name">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="email">Email ID</label>
                        <input type="text" class="form-control" placeholder="enter email id" value="{{$users->email}}" name="email" id="email">
                    </div>
                    <div class="col-md-12">
                        <label class="mobile">PhoneNumber</label>
                        <input type="text" class="form-control" placeholder="enter phone number" value="{{$users->mobile}}" name="mobile" id="mobile">
                    </div>
                    <div class="col-md-6">
                        <label class="city_id">City</label>
                        <select class="form-control" name="city_id" id="city_id" >
                            @foreach ($cities as$city )
                            <option value="{{ $city->id }}">{{ $city->name }}</option>

                            @endforeach

                        </select>
                </div>
                    <div class="col-md-6 ">
                        <label class="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender" >
                            <option value="male">Male</option>
                            <option value="famela">Famela</option>
                        </select>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" onclick="update()" type="button">Save Profile</button>
                </div>
            </div>
        </div>

        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Password Settings</h4>
                </div>
                <div class="form-group col-md-12">
                    <label for="current_password"> كلمة المرور الحالية</label>
                    <input type="password"  class="form-control" id="current_password"
                        placeholder="أدخل كلمة المرور الحالية ">
                </div>

                <div class="form-group col-md-12">
                    <label for="new_password">  كلمة المرور الجديدة</label>
                    <input type="password"  class="form-control" id="new_password"
                        placeholder="أدخل كلمة المرور الجديدة">
                </div>

                <div class="form-group col-md-12">
                    <label for="new_password_confirmation"> تأكيد كلمة المرور</label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        placeholder="تأكيد كلمة المرور الجديدة  ">
                </div>
                <button type="button" onclick="performStore()" class="btn btn-lg btn-success col-10">تغيير كلمة المرور</button>

            </div>
            </div>

    </div>
</div>

</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="{{asset('cms/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('cms/js/crud.js')}}"></script>
<script>


        function update(){

let formData = new FormData();
    formData.append('first_name',document.getElementById('first_name').value);
    formData.append('last_name',document.getElementById('last_name').value);
    formData.append('mobile',document.getElementById('mobile').value);
    formData.append('email',document.getElementById('email').value);
    formData.append('gender',document.getElementById('gender').value);
    formData.append('city_id',document.getElementById('city_id').value);
    formData.append('image',document.getElementById('image').files[0]);
    var APP_URL = {!! json_encode(url('/update/profile')) !!}
    store( APP_URL ,formData);
    //storeRoute('/update/profile' , formData );
}



</script>

{{-- edit password function --}}
<script>

    function performStore() {

       let formData = new FormData();
           formData.append('current_password',document.getElementById('current_password').value);
           formData.append('new_password',document.getElementById('new_password').value);
           formData.append('new_password_confirmation',document.getElementById('new_password_confirmation').value);
           var APP_URL = {!! json_encode(url('/password/update')) !!}
           store( APP_URL ,formData);

           //store('/password/update',formData);

   }

</script>
</body>
</html>
