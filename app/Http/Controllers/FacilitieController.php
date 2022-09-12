<?php

namespace App\Http\Controllers;

use App\Models\Facilitie;
use Illuminate\Http\Request;

class FacilitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFacilitie($id)
    {
        $facilities=Facilitie::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return response()->view('cms.facilitie.index', compact('facilities','id'));
    }

    public function createFacilitie($id)
    {
        
          return response()->view('cms.facilitie.create', compact('id'));
    }



    public function index()
    {
        // $facilities=Facilitie::orderBy('created_at', 'desc')->paginate(5);
        // return response()->view('cms.facilitie.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return response()->view('cms.imageHotel.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'discription' => 'required',

        ]);

        if(!$validator->fails()){

        $facilities = new Facilitie();

        
            $facilities->discription= $request->get('discription');
            $facilities->hotel_id= $request->get('hotel_id');
            $isSaved=$facilities->save();

        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'تم اضافة مرافق بنجاح'] , 200);
         }
         else {
            return response()->json(['icon' => 'error' , 'title' => ' فشلت عملية مرافق الصورة'] , 400);

         }

    }
    else{
        return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
        $facilities=Facilitie::findOrFail($id);
        return response()->view("cms.facilitie.show",compact('facilities','id'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facilities=Facilitie::findOrFail($id);
        return response()->view("cms.facilitie.edit",compact('id','facilities'));
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
        $validator = Validator($request->all(), [
            'discription' => 'required',

        ]);

        if(!$validator->fails()){

            $facilities=Facilitie::findOrFail($id);

            $facilities->discription= $request->get('discription');
            $facilities->hotel_id= $request->get('hotel_id');
        
            $isUpdate=$facilities->save();
            return ['redirect'=>route("indexFacilitie",$id)];

        if($isUpdate){
            return response()->json(['icon' => 'success' , 'title' => 'تم تعديل مرافق بنجاح'] , 200);
         }
         else {
            return response()->json(['icon' => 'error' , 'title' => ' فشلت عملية تعديل المرافق'] , 400);

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
        Facilitie::destroy($id);
    }
}
