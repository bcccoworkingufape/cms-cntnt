<?php

namespace App\Http\Controllers\Api;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Teacher::all()->toJSON(JSON_PRETTY_PRINT);
        return response($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exists = Teacher::where('name','=', $request->name)->exists();
        if(!$exists) {
            $request->img->store('teachers','public');
            try{
                $teacher = Teacher::create([
                    'name' => $request->name,
                    'area' => $request->area,
                    'lattes' => $request->lattes,
                    'img' => $request->img->hashName(),
                ]);
                return response($teacher,200);
            }catch(Exception $e){
                return response($e,400);
            }

        }else{
            return response(null,409);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        try{
            $teacher->update(['name' => $request->name]);
            $teacher->update(['area' => $request->area]);
            $teacher->update(['lattes' => $request->lattes]);
            $teacher->update(['img' => $request->img->hashName()]);
            return response($teacher,200);

        }catch(Exception $exception){
            return response($exception,400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        if($teacher = Teacher::find($id)){
            $teacher->delete();
        }
        return response(null,200);
    }
}
