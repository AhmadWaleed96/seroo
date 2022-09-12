<?php

namespace App\Http\Controllers;

use App\Models\ImageCar;
use Illuminate\Http\Request;

class ImageCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */
    public function indexImage($id)
    {
        $images=ImageCar::where('car_id', $id)->orderBy('created_at', 'desc')->paginate(4);
        return response()->view('cms.imageCar.show', compact('images','id'));
    }

    public function createImage($id)
    {
        
          return response()->view('cms.imageCar.create', compact('id'));
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

        $images = new ImageCar();

        if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/image_car/', $imageName);

            $images->image = $imageName;

            }
            $images->car_id= $request->get('car_id');
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
        $images=ImageCar::findOrFail($id);
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

            $images=ImageCar::findOrFail($id);

        if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/image_car/', $imageName);

            $images->image = $imageName;

            }
            $images->car_id= $request->get('car_id');
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
        ImageCar::destroy($id);
    }
}
