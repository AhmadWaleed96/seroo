<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as ValidationValidator;

class UserAuthController extends Controller
{
    public function showLogin($guard){
        return response()->view('cms.auth.login' , compact('guard'));
    }

    public function Login(Request $request){

        $validator = Validator($request->all() ,[
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'

        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        if (!$validator->fails()) {
            if (Auth::guard($request->get('guard'))->attempt($credentials, $request->get('remember_me'))) {
                return response()->json(['icon' => 'success', 'title' => 'نجحت عملية تسجيل الدخول'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'فشلت عملية تسجيل الدخول '], 400);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }

    public function Logout(Request $request){

        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect()->back();
    }

    public function editPassword(){
        return response()->view('cms.auth.edit-password');
    }

    public function updatePassword(Request $request){
        $guard = auth('admin')->check() ? 'admin' : 'web';
        $validator = Validator($request->all(),[

            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed',
            'new_password_confirmation' => 'required|string'
        ]);
        if(!$validator->fails()){
            $users = auth($guard)->user();
            $users->password = Hash::make($request->get('new_password'));
            $isSaved = $users->save();
            // return ['redirect' =>route('admins.index')];

            if($isSaved){
            return response()->json(['icon' => 'success' , 'title'=> 'تم تغيير كلمة المرور بنجاح'], 200 );


         } else {
            return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تغيير كلمة المرور'] , 400);
        }
    }
        else {
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()], 400);
        }
    }







# edit profile admins
    public function editProfile(Request $request){

        $admins = Admin::findOrFail(Auth::guard('admin')->id());
        $cities = City::all();
        return response()->view('cms.auth.edit-profile' , compact('admins' , 'cities') );
    }
    public function updateProfile(Request $request){
        $validator = Validator($request->all(), [

        ]);

        if (!$validator->fails()) {

            $admins = Admin::findOrFail(Auth::guard('admin')->id());
            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/admin', $imageName);

                $admins->image = $imageName;

                }



            $admins->first_name=$request->get('first_name');
            $admins->last_name=$request->get('last_name');
            $admins->email=$request->get('email');
            $admins->mobile=$request->get('mobile');
            $admins->date_of_birth=$request->get('date_of_birth');
            $admins->salary_value=$request->get('salary_value');
            $admins->city_id=$request->get('city_id');
            $isSaved=$admins->save();
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم تعديل صفحتك بنجاح '],200);
            }elseif(!$isSaved){
                return response()->json(['icon'=>'error','title'=>'فشلت تعديل صفحتك  '],400);

            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت تعديل صفحتك  '],400);
            }
        }else{
            return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);

        }
    }



}
