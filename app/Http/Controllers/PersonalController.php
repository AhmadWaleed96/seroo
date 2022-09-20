<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personals = Personal::orderBy('id','desc')->paginate(5);
        return response()->view('cms.personal.index',compact('personals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.Personal.create');
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
        $Personals=new Personal();
        $Personals->firstName=$request->get('firstName');
        $Personals->lastName=$request->get('lastName');
        $Personals->email=$request->get('email');
        $Personals->phone=$request->get('phone');
        $Personals->phone2=$request->get('phone2');
        $Personals->country=$request->get('country');
        $Personals->city=$request->get('city');
        $Personals->address=$request->get('address');
        $Personals->postalCode=$request->get('postalCode');
        $Personals->startDate=$request->get('startDate');
        $Personals->endDate=$request->get('endDate');
        $Personals->adultsCount=$request->get('adultsCount');
        $Personals->childrenCount=$request->get('childrenCount');
        $Personals->infantCount=$request->get('infantCount');


        $isSaved=$Personals->save();
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
        $Personals=Personal::findOrFail($id);
        return response()->view('cms.Personal.edit',compact('personals' , 'countries'));
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
            // 'name_room' => 'required|string|min:3|max:20',
        ]
    );

        if(!$validator->fails()){

            $Personals=Personal::findOrFail($id);
            $Personals->firstName=$request->get('firstName');
            $Personals->lastName=$request->get('lastName');
            $Personals->email=$request->get('email');
            $Personals->phone=$request->get('phone');
            $Personals->phone2=$request->get('phone2');
            $Personals->country=$request->get('country_id');
            $Personals->city=$request->get('city_id');
            $Personals->address=$request->get('address');
            $Personals->postalCode=$request->get('postalCode');
            $Personals->startDate=$request->get('startDate');
            $Personals->endDate=$request->get('endDate');
            $Personals->adultsCount=$request->get('adultsCount');
            $Personals->childrenCount=$request->get('childrenCount');
            $Personals->infantCount=$request->get('infantCount');

            $isSaved = $Personals->save();
            return ['redirect'=>route('Personals.index',$id)];

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
        Personal::destroy($id);
    }
}
