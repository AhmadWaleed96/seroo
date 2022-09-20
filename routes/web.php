<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookHotelController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CompaneController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FacilitieController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ImageCarController;
use App\Http\Controllers\ImageHotelController;
use App\Http\Controllers\ItemHotelController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\presonalController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WayController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware('auth:admin,web')->get('/', function () {
//     return view('cms.master');
// });
// Route::get('/register', function () {
//     return view('cms.auth.register');
// });


Route::get('/register', [UserController::class,'create'])->name('register');
Route::post('/register', [UserController::class,'store']);




Route::prefix('cms/')->middleware('guest:admin,web')->group(function(){
    route::get('{guard}/login' , [UserAuthController::class , 'showLogin'])->name('view.login');
    route::post('{guard}/login' , [UserAuthController::class , 'Login']);
});



route::prefix('cms/admin/')->middleware('auth:admin')->group(function(){
    Route::get('/logout-admin',[UserAuthController::class,'logOut'])->name('logout-admin');
    Route::get('profile/edit' , [UserAuthController::class , 'editProfile'])->name('cms.auth.profile-edit');
    Route::post('profile/update' , [UserAuthController::class , 'updateProfile'])->name('cms.auth.update-profile');
    Route::get('password/edit' , [UserAuthController::class , 'editPassword'])->name('cms.admin.edit-password');
    Route::post('update/password', [UserAuthController::class, 'updatePassword']);

});
// Route::middleware()->group(['prefix' => LaravelLocalization::setLocale()], function(){

// });
route::prefix('cms/admin/')->middleware('auth:admin')->group(function(){
    Route::view('/','cms.home')->name('home');

    Route::resource('cities', CityController::class);
    Route::post('update_cities/{id}' , [CityController::class , 'update'])->name('update_cities');

    Route::resource('countries', CountryController::class);
    Route::post('update_countries/{id}' , [CountryController::class , 'update'])->name('update_countries');

    Route::resource('packages', PackageController::class);
    Route::post('update_packages/{id}' , [PackageController::class , 'update'])->name('update_packages');

    Route::resource('admins', AdminController::class);
    Route::post('update_admins/{id}' , [AdminController::class , 'update'])->name('update_admins');

    Route::resource('users', UserController::class)->except('create');
    Route::post('update_users/{id}' , [UserController::class , 'update'])->name('update_users');

    Route::resource('hotels', HotelController::class);
    Route::post('update_hotels/{id}' , [HotelController::class , 'update'])->name('update_hotels');

    Route::resource('personals', PersonalController::class);
    Route::post('update_personals/{id}' , [PersonalController::class , 'update'])->name('update_personals');


    Route::resource('image_hotels', ImageHotelController::class);
    Route::post('update_image_hotels/{id}' , [ImageHotelController::class , 'update'])->name('update_image_hotels');
    Route::get('/create/image-hotels/{id}', [ImageHotelController::class, 'createImage'])->name('createImage');
    Route::get('/index/image-hotels/{id}', [ImageHotelController::class, 'indexImage'])->name('indexImage');

    Route::resource('facilitie', FacilitieController::class);
    Route::post('update_facilitie/{id}' , [FacilitieController::class , 'update'])->name('update_Facilitie');
    Route::get('/create/facilitie-hotels/{id}', [FacilitieController::class, 'createFacilitie'])->name('createFacilitie');
    Route::get('/index/facilitie-hotels/{id}', [FacilitieController::class, 'indexFacilitie'])->name('indexFacilitie');

    Route::resource('companes', CompaneController::class);
    Route::post('update_companes/{id}' , [CompaneController::class , 'update'])->name('update_companes');

    Route::resource('cars', CarController::class);
    Route::post('update_cars/{id}' , [CarController::class , 'update'])->name('update_cars');

    Route::resource('flights', FlightController::class);
    Route::post('update_flights/{id}' , [FlightController::class , 'update'])->name('update_flights');

    Route::resource('image_cars', ImageCarController::class);
    Route::post('update_image_cars/{id}' , [ImageCarController::class , 'update'])->name('update_image_cars');
    Route::get('/create/image-cars/{id}', [ImageCarController::class, 'createImage'])->name('create.image-cars');
    Route::get('/index/image-cars/{id}', [ImageCarController::class, 'indexImage'])->name('index.image-cars');

    Route::resource('rooms', RoomController::class);
    Route::post('update_rooms/{id}' , [RoomController::class , 'update'])->name('update_rooms');
    Route::get('/create/hotel-rooms/{id}', [RoomController::class, 'createRoom'])->name('createRoom');
    Route::get('/index/hotel-rooms/{id}', [RoomController::class, 'indexRoom'])->name('indexRoom');

    Route::resource('ways', WayController::class);
    Route::post('update_ways/{id}' , [WayController::class , 'update'])->name('update_ways');

    Route::resource('item_hotels', ItemHotelController::class);
    Route::post('update_item_hotels/{id}' , [ItemHotelController::class , 'update'])->name('update_item_hotels');
        Route::get('/create/hotel-item/{id}', [ItemHotelController::class, 'createItem'])->name('createItem_hotel');
    Route::get('/index/hotel-item/{id}', [ItemHotelController::class, 'indexItem'])->name('indexItem_hotel');





    // Route::resource('roles', RoleController::class);
    // Route::post('update_roles/{id}' , [RoleController::class , 'update'])->name('update_roles');
    // Route::resource('permissions', PermissionController::class);
    // Route::post('update_permissions/{id}' , [PermissionController::class , 'update'])->name('update_permissions');
    // Route::resource('role.permissions', RolePermissionController::class);

});

Route::prefix( LaravelLocalization::setLocale())->group(function(){
    Route::get('', function () {return view('front_end.main');})->name('home');
    Route::get('b2c', function () {return view('front_end.b2c');})->name('b2c');
    Route::get('local', function () {return view('front_end.local');})->name('local');
    Route::get('package', function () {return view('front_end.package');})->name('package');
});


Route::prefix('/')->middleware('auth:web')->group(function(){
    Route::get('edit/profile' , [UserController::class , 'edit'])->name('profile_edit_user');
    Route::post('update/profile' , [UserController::class , 'update'])->name('update.profile');
    Route::get('/logout',[UserAuthController::class,'logOut'])->name('logout');
    Route::post('/password/update', [UserController::class, 'updatePassword']);

    Route::resource('book_hotels', BookHotelController::class);
    Route::post('book_hotels/{id}' , [BookHotelController::class , 'update'])->name('book_hotels');
    Route::get('/create/book-hotel/{id}', [BookHotelController::class, 'createBook'])->name('create-book-hotel');







    // Route::get('/index/book-hotel/{id}', [BookHotelController::class, 'indexBook'])->name('index-book-hotel');
});

Route::prefix('/')->group(function(){
    Route::get('search-hotels' , [BookHotelController::class , 'search_hotel'])->name('search-hotels');


    // Route::get('get',function()
    // {

    //     $hotels=App\Models\Hotel::with('city')->where('number_of_children', 'like', '%' . 5 . '%')->select('city_id')->get();
    //     return response()->view('dd',compact('hotels'));
    //     // foreach( $hotels as $hotel){
    //     // // return dd($hotel) ;
    //     // }
    // });
});
