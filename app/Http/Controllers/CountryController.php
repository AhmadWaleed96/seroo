<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(5);
        return response()->view('cms.Country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.Country.create');
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
            'name' => 'required|string|min:3|max:20',
        ]
    );

        if(!$validator->fails()){

            $countries = new Country();

            $countries->name = $request->get('name');

            $isSaved = $countries->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم إضافة المدينة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة المدينة'] , 400);
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
        $countries = Country::findOrFail($id);
        return response()->view('cms.Country.edit' , compact('countries'));
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
            'name' => 'required|string|min:3|max:20',
        ]);

        if(!$validator->fails()){

        $countries = Country::findOrFail($id);
        $countries->name = $request->get('name');
        $isUpdate = $countries->save();
        return ['redirect' =>route('countries.index')];

        if($isUpdate){
            return response()->json(['icon' => 'success' , 'title' => 'تم تعديل المدينة بنجاح'] , 200);
         }
         else {
            return response()->json(['icon' => 'error' , 'title' => ' فشلت عملية تعديل المدينة'] , 400);
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
        $countries = Country::destroy($id);
       return response()->json(['icon' => 'success' , 'title' => 'تم حذف الدولة بنجاح'] , $countries ? 200 : 400);
    }
}
