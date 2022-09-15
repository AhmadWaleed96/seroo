<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages=Package::all()->orderBy('id','desc')->paginate(5);
        return response()->view('cms.package.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Package::all();
        return response()->view('cms.package.create' ,compact('packages'));
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

        $packages=new Package();
        $packages->name=$request->get('name');
        $packages->price=$request->get('price');
        $packages->entertainment=$request->get('entertainment');
        $packages->duration=$request->get('duration');
        $packages->checkin=$request->get('checkin');
        $packages->checkout=$request->get('checkout');
        $packages->description=$request->get('description');
        if(!$validetor->fails()){

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/admin', $imageName);

                $packages->image = $imageName;

                }

        $isSaved=$packages->save();
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم اضافة الحزمة بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت اضافة الحزمة  '],400);
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
    public function destroy($id)
    {
        Package::destroy($id);
    }
}
