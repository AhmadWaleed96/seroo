<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    
    public function indexRoom($id)
    {
        $rooms=Room::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return response()->view('cms.room.index', compact('rooms','id'));
    }

    public function createRoom($id)
    {
        
          return response()->view('cms.room.create', compact('id'));
    }
    
    
    
     public function index()
    {
        $rooms=Room::with('hotel')->orderBy('id','desc')->paginate(5);
        return response()->view('cms.room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels=Hotel::all();
        return response()->view('cms.room.create',compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name_room' => 'required|string|min:3|max:20',
        ]
    );

        if(!$validator->fails()){

            $rooms = new Room();
            
            $rooms->name_room = $request->get('name_room');
            $rooms->number_room = $request->get('number_room');
            $rooms->discreption = $request->get('discreption');
            $rooms->Advantages = $request->get('Advantages');
            $rooms->accommodation_type = $request->get('accommodation_type');
            $rooms->price = $request->get('price');
            $rooms->hotel_id = $request->get('hotel_id');

            $isSaved = $rooms->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم إضافة الغرفة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة الغرفة'] , 400);
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
        $rooms=Room::findOrFail($id);
        $hotels=Hotel::all();
        return response()->view('cms.room.edit',compact('hotels','rooms'));    
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

            $rooms=Room::findOrFail($id);
            
            $rooms->name_room = $request->get('name_room');
            $rooms->number_room = $request->get('number_room');
            $rooms->discreption = $request->get('discreption');
            $rooms->Advantages = $request->get('Advantages');
            $rooms->accommodation_type = $request->get('accommodation_type');
            $rooms->price = $request->get('price');
            $rooms->hotel_id = $request->get('hotel_id');

            $isSaved = $rooms->save();
            return ['redirect'=>route('indexRoom',$id)];

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
        Room::destroy($id);
    }
}
