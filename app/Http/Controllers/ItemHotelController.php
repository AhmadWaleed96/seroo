<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use App\Models\ItemHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ItemHotelController extends Controller
{

    public function indexItem($id)
    {
        $item_hotels=ItemHotel::with('hotel','city')->where('hotel_id',$id)->orderBy("id",'desc')->paginate(5);
        return response()->view('cms.item_hotel.index',compact('item_hotels','id'));
    }


    public function createItem($id)
    {
        // $hotels=Hotel::all();
        $cities=City::all();
        return response()->view('cms.item_hotel.create',compact('cities','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , ItemHotel $itemHotel)
    {

        $validetor=validator($request->all(),[

        ]);
        if(!$validetor->fails()){
            $item_hotels=new ItemHotel();
            $item_hotels->checkin=$request->get('checkin');
            $item_hotels->checkout=$request->get('checkout');
            $item_hotels->number_of_room=$request->get('number_of_room');
            $item_hotels->number_of_people=$request->get('number_of_people');
            $item_hotels->number_of_children=$request->get('number_of_children');
            $item_hotels->price=$request->get('price');
            $item_hotels->city_id=$request->get('city_id');
            $item_hotels->hotel_id=$request->get('hotel_id');
            $isSaved=$item_hotels->save();
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم اضافة العناصر بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت اضافة العناصر  '],400);
            }
        }else{
            return response()->json(['icon'=>'error','title'=>$validetor->getMessageBag()->first()],400);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemHotel  $itemHotel
     * @return \Illuminate\Http\Response
     */
    public function show(ItemHotel $itemHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemHotel  $itemHotel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotels=Hotel::all();
        $cities=City::all();
        $item_hotels=ItemHotel::findOrFail($id);
        return response()->view('cms.item_hotel.edit',compact('item_hotels','cities','hotels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemHotel  $itemHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validetor=validator($request->all(),[

        ]);
        if(!$validetor->fails()){
            $item_hotels=ItemHotel::findOrFail($id);
            $item_hotels->checkin=$request->get('checkin');
            $item_hotels->checkout=$request->get('checkout');
            $item_hotels->number_of_room=$request->get('number_of_room');
            $item_hotels->number_of_people=$request->get('number_of_people');
            $item_hotels->number_of_children=$request->get('number_of_children');
            $item_hotels->price=$request->get('price');
            $item_hotels->city_id=$request->get('city_id');
            // $item_hotels->hotel_id=$request->get('hotel_id');
            $isSaved=$item_hotels->save();
            return ['redirect'=>route("item_hotels.index")];
            if ($isSaved) {
                return response()->json(['icon'=>'success','title'=>'تم تعديل العناصر بنجاح '],200);
            }else{
                return response()->json(['icon'=>'error','title'=>'فشلت تعديل العناصر  '],400);
            }
        }else{
            return response()->json(['icon'=>'error','title'=>$validetor->getMessageBag()->first()],400);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemHotel  $itemHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        ItemHotel::destroy($id);
    }
}
