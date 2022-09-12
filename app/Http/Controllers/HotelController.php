<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels=Hotel::withCount('images','facilitie','rooms')->orderBy("id",'desc')->paginate(5);
        return response()->view('cms.hotel.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::all();
        return response()->view('cms.hotel.create',compact('cities'));
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
            'rate'=>"required|min:0|max:1",
        ],[
            'rate.max'=>'طول قيمة التقيم اكبر من المتوقع ',
        ]);
        if(!$validetor->fails()){
            $hotels=new Hotel();



                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/hotels', $imageName);

                    $hotels->image = $imageName;

                    }



            $hotels->name=$request->get('name');
            $hotels->address=$request->get('address');
            $hotels->rate=$request->get('rate');
            $hotels->checkin=$request->get('checkin');
            $hotels->checkout=$request->get('checkout');
            $hotels->number_of_room=$request->get('number_of_room');
            $hotels->number_of_people=$request->get('number_of_people');
            $hotels->number_of_children=$request->get('number_of_children');
            $hotels->discreption=$request->get('discreption');
            $hotels->city_id=$request->get('city_id');
            $isSaved=$hotels->save();
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم اضافة الفندق بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت الفندق المستخدم  '],400);
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
        $hotels= Hotel::findOrFail($id);
        $cities=City::all();
        return response()->view("cms.hotel.show",compact("hotels",'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels=Hotel::findOrFail($id);
        $cities=City::all();
        return response()->view("cms.hotel.edit",compact('cities','hotels'));
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
            'rate'=>"required|min:0|max:1",
        ],[
            'rate.max'=>'طول قيمة التقيم اكبر من المتوقع ',
        ]);
        if(!$validetor->fails()){
            $hotels=Hotel::findOrFail($id);



                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/hotels', $imageName);

                    $hotels->image = $imageName;

                    }



            $hotels->name=$request->get('name');
            $hotels->address=$request->get('address');
            $hotels->rate=$request->get('rate');
            $hotels->checkin=$request->get('checkin');
            $hotels->checkout=$request->get('checkout');
            $hotels->number_of_room=$request->get('number_of_room');
            $hotels->number_of_people=$request->get('number_of_people');
            $hotels->number_of_children=$request->get('number_of_children');
            $hotels->discreption=$request->get('discreption');
            $hotels->city_id=$request->get('city_id');
            $isSaved=$hotels->save();
            return ['redirect'=>route("hotels.index")];

            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم تعديل الفندق بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت تعديل الفندق  '],400);
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
        Hotel::destroy($id);
    }
}
