<?php

namespace App\Http\Controllers;

use App\Models\Compane;
use Illuminate\Http\Request;

class CompaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companes=compane::orderBy("id",'desc')->paginate(5);
        return response()->view("cms.compane.index",compact('companes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.compane.create');
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
            // 'name' => 'required|string|min:3|max:20',
        ]
    );

        if(!$validator->fails()){

            $companes = new Compane();

            $companes->name = $request->get('name');

            $isSaved = $companes->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم إضافة الشركة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت إضافة الشركة'] , 400);
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
        $companes=Compane::findOrFail($id);
        return response()->view("cms.compane.edit" ,compact('companes'));
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
            'name' => 'required|string|min:3|max:20',
        ]
    );

        if(!$validator->fails()){

            $companes=Compane::findOrFail($id);

            $companes->name = $request->get('name');

            $isSaved = $companes->save();
            return ['redirect'=>route('companes.index')];

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'تم تعديل الشركة بنجاح'] , 200);

            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'فشلت تعديل الشركة'] , 400);
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
        Compane::destroy($id);
    }
}
