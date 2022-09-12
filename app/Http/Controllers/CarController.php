<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Compane;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars=Car::withCount('images')->orderBy("id",'desc')->paginate(5);
        return response()->view('cms.car.index' , compact('cars'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $companes=Compane::all();
        return response()->view('cms.car.create' , compact('companes'));
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
            'name'=>"required|min:4",
        ]);
        if(!$validetor->fails()){
            $cars=new Car();



                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/car', $imageName);

                    $cars->image = $imageName;

                    }



            $cars->name=$request->get('name');
            $cars->type_car=$request->get('type_car');
            $cars->model=$request->get('model');
            $cars->vehicle_class=$request->get('vehicle_class');
            $cars->car_color=$request->get('car_color');
            $cars->car_number=$request->get('car_number');
            $cars->compane_id=$request->get('compane_id');
            $isSaved=$cars->save();
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم اضافة المركبة بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت اضافة المركبة المستخدم  '],400);
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
        $cars=Car::findOrFail($id);
        $companes=Compane::all();
        return response()->view('cms.car.edit',compact('companes','cars'));
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
        $validetor=validator($request->all(),[
            'name'=>"required|min:4",
        ]);
        if(!$validetor->fails()){
            $cars=Car::findOrFail($id);



                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/car', $imageName);

                    $cars->image = $imageName;

                    }



            $cars->name=$request->get('name');
            $cars->type_car=$request->get('type_car');
            $cars->model=$request->get('model');
            $cars->vehicle_class=$request->get('vehicle_class');
            $cars->car_color=$request->get('car_color');
            $cars->car_number=$request->get('car_number');
            $cars->compane_id=$request->get('compane_id');
            $isSaved=$cars->save();
            return ['redirect'=>route('cars.index')];
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم تعديل المركبة بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت اضافة المركبة المستخدم  '],400);
            }
        }else{
            return response()->json(['icon'=>'error','title'=>$validetor->getMessageBag()->first()],400);

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
        car::destroy($id);
    }
}
