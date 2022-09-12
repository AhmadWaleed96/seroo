<?php

namespace App\Http\Controllers;

use App\Models\BookHotel;
use App\Models\Facilitie;
use App\Models\Hotel;
use App\Models\ImageHotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookHotelController extends Controller
{

    // start function search 

    public function search_hotel(Request $request ){
        $hotels = Hotel::with("city")->orderBy('id' ,'desc');

        //  form search 

        if ($request->get('search')) {
            $moduleIndex = Hotel::where('created_at', 'like', '%' . $request->search . '%');
        }
        if ($request->get('checkin')) {
            $hotels = Hotel::where('checkin', 'like', '%' . $request->checkin . '%');
        }
        if ($request->get('checkout')) {
            $hotels = Hotel::where('checkout', 'like', '%' . $request->checkout . '%');
        }
        if ($request->get('number_of_room')) {
            $hotels = Hotel::where('number_of_room', 'like', '%' . $request->number_of_room . '%');
        }
        if ($request->get('number_of_people')) {
            $hotels = Hotel::where('number_of_people', 'like', '%' . $request->number_of_people . '%');
        }
        if ($request->get('number_of_children')) {
            $hotels = Hotel::where('number_of_children', 'like', '%' . $request->number_of_children . '%');
        }
        if ($request->get('city_id')) {
            $hotels = Hotel::with("city")->where('city_id', 'like', '%' . $request->city_id . '%');
        }
        //  form search all

        if( $request->get('city_id') && $request->get('checkin') && $request->get('checkout') && $request->get('number_of_room') && $request->get('number_of_people') &&$request->get('number_of_children')){
            $hotels = Hotel::with("city")->where('city_id', 'like', '%' . $request->city_id . '%')
            ->orWhere('checkin', 'like', '%' . $request->checkin . '%')
            ->orWhere('checkout', 'like', '%' . $request->checkout . '%')
            ->orWhere('number_of_room', 'like', '%' . $request->number_of_room . '%')
            ->orWhere('number_of_people', 'like', '%' . $request->number_of_people . '%')
            ->orWhere('number_of_children', 'like', '%' . $request->number_of_children . '%');
        }

        if ($request->status != null) {
            $hotels = Hotel::where('status', $request->status);
        }
        $hotels = $hotels->paginate(5);
        return response()->view('front_end.search-hotel' , compact('hotels' ,'request'));

    }

    // end function search 

    // public function indexBook($id)
    // {
    //     $book_hotels=BookHotel::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(4);
    //     return response()->view('front_end.book-hotel', compact('book_hotels','id'));
    // }

    public function createBook($id)
    {
        $book_hotels=BookHotel::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(4);

        $hotels= Hotel::where('id',$id)->get();
        $images=ImageHotel::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(4);
        $rooms=Room::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $facilities=Facilitie::where('hotel_id', $id)->orderBy('created_at', 'desc')->paginate(5);


          return response()->view('front_end.book-hotel', compact('id','hotels','book_hotels','rooms','facilities','images'));
    }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        ]);

        if(!$validator->fails()){

        $book_hotels = new BookHotel();
            $book_hotels->date_of_arrival= $request->get('date_of_arrival');
            $book_hotels->departure_date= $request->get('departure_date');
            $book_hotels->number_of_people= $request->get('number_of_people');
            $book_hotels->number_of_room= $request->get('number_of_room');
            $book_hotels->hotel_id= $request->get('hotel_id');
            $book_hotels->user_id= Auth::id();
            $isSaved=$book_hotels->save();

        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' => 'تم الحجز  بنجاح'] , 200);
         }
         else {
            return response()->json(['icon' => 'error' , 'title' => ' فشلت عملية الحجز الصورة'] , 400);

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
        //
    }

}
