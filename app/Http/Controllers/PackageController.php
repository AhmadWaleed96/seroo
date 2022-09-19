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
        $packages = Package::orderBy('id','desc')->paginate(5);
        return response()->view('cms.package.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.package.create');
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
        $packages=new Package();
        $packages->name=$request->get('name');
        $packages->price=$request->get('price');
        $packages->entertainment=$request->get('entertainment');
        $packages->duration=$request->get('duration');
        $packages->checkin=$request->get('checkin');
        $packages->checkout=$request->get('checkout');
        $packages->description=$request->get('description');

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/package', $imageName);

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
        $packages= package::findOrFail($id);
        return response()->view("cms.package.show",compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $packages=package::findOrFail($id);
        return response()->view('cms.package.edit',compact('packages'));
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
        $validator = Validator($request->all(),[
            'name_room' => 'required|string|min:3|max:20',
        ]
    );

        if(!$validator->fails()){

            $packages=package::findOrFail($id);

            $packages->name=$request->get('name');
        $packages->price=$request->get('price');
        $packages->entertainment=$request->get('entertainment');
        $packages->duration=$request->get('duration');
        $packages->checkin=$request->get('checkin');
        $packages->checkout=$request->get('checkout');
        $packages->description=$request->get('description');

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/package', $imageName);

                $packages->image = $imageName;

                }

            $isSaved = $packages->save();
            return ['redirect'=>route('packages.index',$id)];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تعديل الغرفة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت تعديل الغرفة'] , 400);
            }
        }
            else{
                return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
            }
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
