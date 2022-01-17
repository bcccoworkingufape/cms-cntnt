<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Evento::all();
        return view("Eventos.index",['data'=>$data]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Eventos.create");    
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
            return view('Eventos.show')->with('evento',$evento);

        }catch(Exception $exception){
            return redirect(route(eventos.create))->withErros($exception->getValidator())->withInput();
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
        $data = Evento::find($id);
        return view('Eventos.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eventos  $eventos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Evento::find($id);
        return view('Eventos.edit',['data'=>$data]);
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
            return view('Eventos.show')->with('evento',$evento);
        }catch(Exception $e){

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
        return redirect()->route('home');
    }
}
