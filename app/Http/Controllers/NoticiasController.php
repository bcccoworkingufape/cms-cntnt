<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Noticia::all();
        return view("Noticias.index",['data'=>$data]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Noticias.create");
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
            $request->validateWithBag('noticia',[
                'titulo' => ['required','string'],
                'descricao' => ['required', 'string'],
                'link' => ['required', 'string'],
                'img' => ['required', 'string'],
            ]);

            $noticia = new Noticia();
            $noticia->titulo = $request->titulo;
            if(isset($userID)){
                $noticia->userID = $userID;
            }else{
                $noticia->userID = 3;
            }
            $noticia->descricao = $request->descricao;
            $noticia->link = $request->link;
            $noticia->img = $request->img;
            $noticia->save();
            return view('Noticias.show')->with('noticia',$noticia);

        }catch(Exception $exception){
            return redirect(route(noticias.create))->withErros($exception->getValidator())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Noticia::find($id);
        return view('Noticias.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Noticia::find($id);
        return view('Noticias.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($noticia = Noticia::find($id)){
            $noticia->delete();
        }
        return redirect()->route('home');
    }
}
