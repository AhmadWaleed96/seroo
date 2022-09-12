<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::orderBy('id','desc')->paginate(5);
        return response()->view('cms.admin.index',compact("admins"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return response()->view('cms.admin.create' , compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validetor=validator($request->all(),[
            // 'name'=>"required|min:4"
        ]);
        if(!$validetor->fails()){
            $admins=new Admin();

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
            $admins->password=Hash::make($request->get('password'));
            $admins->date_of_birth=$request->get('date_of_birth');
            $admins->salary_value=$request->get('salary_value');
            $admins->city_id=$request->get('city_id');
            $isSaved=$admins->save();
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم اضافة مشرف بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت اضافة المشرف  '],400);
            }
        }else{
            return response()->json(['icon'=>'error','title'=>$validetor->getMessageBag()->first()],400);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        
        if ($admin->id == Auth::id()){
            return redirect()->route('admins.index')
            ->withErrors(trans('cannot delete yourself'));
        }
        else {
            // $admin->user()->delete();
            $isDeleted = $admin->delete();
            return $isDeleted;
                // return response()->json(['icon' => 'success', 'title' => 'admin deleted successfully'], $isDeleted ? 200 : 400);
            }
    }
}
