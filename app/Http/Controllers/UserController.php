<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('city')->orderBy('id','desc')->paginate(5);
        return response()->view('cms.user.index',compact('users'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();
        return response()->view('cms.auth.register' ,compact('cities'));
    }

    
    public function store(Request $request)
    {
        $validetor=validator($request->all(),[
            'first_name'=>"required|min:4",
            'last_name'=>"required|min:4",
            'email'=>"required|min:4|email",
            'password'=>"required|min:4"
        ]);
        if(!$validetor->fails()){
            $users=new User();
            $users->first_name=$request->get('first_name');
            $users->last_name=$request->get('last_name');
            $users->email=$request->get('email');
            $users->password=Hash::make($request->get('password'));
            $users->mobile=$request->get('mobile');
            $isSaved=$users->save();
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم اضافة المستخدم بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت اضافة المستخدم  '],400);
            }
        }else{
            return response()->json(['icon'=>'error','title'=>$validetor->getMessageBag()->first()],400);

        }
    }
    public function edit(Request $request){
    
        $users = User::findOrFail(Auth::guard('web')->id());
        $cities = City::all();
        return response()->view('cms.user.edit_profile' , compact('users' , 'cities') );
    }


    public function update(Request $request){
        $validator = Validator($request->all(), [
            'first_name'=>"required|min:4",
            'last_name'=>"required|min:4",
            'email'=>"required|min:4|email",

        ]);

        if (!$validator->fails()) {

            $users = User::findOrFail(Auth::guard('web')->id());

           
    
                if (request()->hasFile('image')) {
    
                    $image = $request->file('image');
    
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
    
                    $image->move('storage/images/register', $imageName);
    
                    $users->image = $imageName;
    
                    }



            $users->first_name=$request->get('first_name');
            $users->last_name=$request->get('last_name');
            $users->email=$request->get('email');
            $users->mobile=$request->get('mobile');
            $users->gender=$request->get('gender');
            $isSaved=$users->save();
            return ['redirect'=>route('home')];
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم تعديل المستخدم بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت عملية تعديل المستخدم  '],400);
            }
        }else{
            return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(User $user)
    {
        // $users=User::destroy($id);
        if ($user->id == Auth::id()) {
            return redirect()->route('users.index');
        }else{
            $user->delete();
            
        }
    }
}
