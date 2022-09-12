<?php

namespace App\Http\Controllers;

use App\Models\ImageHotel;
use Illuminate\Http\Request;

class ImageHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */public function indexImage($id)
    {
        $images=ImageHotel::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(4);
        return response()->view('cms.imageHotel.index1', compact('images','id'));
    }

    public function createImage($id)
    {
        
          return response()->view('cms.imageHotel.create', compact('id'));
    }



    public function index()
    {
        //
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
            'image' => 'required',

        ]);

        if(!$validator->fails()){

        $images = new ImageHotel();

        if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/image_hotel/', $imageName);

            $images->image = $imageName;

            }
            $images->hotel_id= $request->get('hotel_id');
            $isSaved=$images->save();

        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'تم اضافة الصورة بنجاح'] , 200);
         }
         else {
            return response()->json(['icon' => 'error' , 'title' => ' فشلت عملية اضافة الصورة'] , 400);

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
        $images=ImageHotel::findOrFail($id);
        return response()->view("cms.imageHotel.edit",compact('id','images'));
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
            'image' => 'required',

        ]);

        if(!$validator->fails()){

            $images=ImageHotel::findOrFail($id);

        if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/image_hotel/', $imageName);

            $images->image = $imageName;

            }
            $images->hotel_id= $request->get('hotel_id');
            $isUpdate=$images->save();
            return ['redirect'=>route("indexImage",$id)];

        if($isUpdate){
            return response()->json(['icon' => 'success' , 'title' => 'تم تعديل الصورة بنجاح'] , 200);
         }
         else {
            return response()->json(['icon' => 'error' , 'title' => ' فشلت عملية تعديل الصورة'] , 400);

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
        ImageHotel::destroy($id);
    }
}
