<?php

namespace App\Http\Controllers\Api;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Evento::all()->toJSON(JSON_PRETTY_PRINT);
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
        try{
            $userID = Auth::id();
            $request->validateWithBag('evento',[
                'titulo' => ['required','string'],
                'data' => ['required','date'],
                'descricao' => ['required', 'string'],
            ]);

            $evento = new Evento();
            $evento->titulo = $request->titulo;
            if(isset($userID)){
                $evento->userID = $userID;
            }else{
                $evento->userID = 3;
            }
            $evento->data = $request->data;
            $evento->descricao = $request->descricao;
            $evento->save();
            return response($evento,201);

        }catch(Exception $exception){
            return response($exception,400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Evento::find($id)->toJSON(JSON_PRETTY_PRINT);
        return response($data,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        try{
            $request->validateWithBag('evento',[
                'titulo' => ['required','string'],
                'data' => ['required','date'],
                'descricao' => ['required', 'string'],
            ]);

            $evento->update(['titulo'=>$request->titulo]);
            $evento->update(['data'=>$request->data]);
            $evento->update(['descricao'=>$request->descricao]);
            return response($evento,200);
        }catch(Exception $e){
            return response($e,400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($evento = Evento::find($id)){
            $evento->delete();
        }
        return response(null,200);
    }
}
