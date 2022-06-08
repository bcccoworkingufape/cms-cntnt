<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;

class ProjetosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Projeto::all();
        return view("Projetos.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Projetos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exists = Projeto::where('titulo','=', $request->titulo)->exists();
        if(!$exists) {
            $request->img->store('teachers','public');
            Projeto::create([
                'titulo' => $request->titulo,
                'tipo' => $request->tipo,
                'area' => $request->area,
                'descricao' => $request->descricao,
                'link' => $request->link,
                'img' => $request->img->hashName(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show(Projeto $projeto)
    {
        // return view("Projeto",['data'=>$data->$id])
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Projeto::find($id);
        return view('Projetos.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $projeto = Projeto::find($id);
        try{
            $request->validateWithBag('projeto',[
                'titulo' => ['required', 'string', 'max:255'],
                'tipo' => ['required', 'string', 'max:255'],
                'area' => ['required', 'string', 'max:255'],
                'descricao' => ['required', 'string', 'max:255'],
                'link' => ['required', 'string', 'max:255'],
            ]);
            $projeto->update(['titulo'=>$request->input('titulo')]);
            $projeto->update(['tipo'=>$request->input('tipo')]);
            $projeto->update(['area'=>$request->input('area')]);
            $projeto->update(['descricao'=>$request->input('descricao')]);
            $projeto->update(['area'=>$request->input('area')]);
            $projeto->update(['link'=>$request->input('link')]);
            return view('Projetos.show')->with('projeto',$projeto);

        }catch(Exception $e){

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($projeto = Projeto::find($id)){
            $projeto->delete();
        }
        return redirect()->route('projetos.index');
    }
}
