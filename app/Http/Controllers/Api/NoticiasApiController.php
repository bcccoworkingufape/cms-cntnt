<?php

namespace App\Http\Controllers\Api;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Noticia::all()->toJSON(JSON_PRETTY_PRINT);
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
            return response($noticia,201);

        }catch(Exception $exception){
            return response($exception,400);
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
        $data = Noticia::find($id)->toJSON(JSON_PRETTY_PRINT);
        return response($data, 200);
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
        try{
            $request->validateWithBag('noticia',[
                'titulo' => ['required','string'],
                'descricao' => ['required', 'string'],
                'link' => ['required', 'string'],
                'img' => ['required', 'string'],
            ]);

            $noticia->update(['titulo'=>$request->titulo]);
            $noticia->update(['descricao'=>$request->descricao]);
            $noticia->update(['link'=>$request->link]);
            $noticia->update(['img'=>$request->img]);
            $noticia->descricao = $request->descricao;
            return response($noticia,200);

        }catch(Exception $exception){
            return response($exception,400);
        }
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
        return response(null,200);
    }
}
