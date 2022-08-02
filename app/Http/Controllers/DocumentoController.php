<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use Illuminate\Support\Facades\Storage;

class DocumentoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Documento::all();
        return view("Documentos.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Documentos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nomeDocumento = $request->file('documento')->getClientOriginalName();
        $exists = Documento::where('titulo', '=', $nomeDocumento)->exists();
        
        if(!$exists)
        {
            // Documento::create([
            //     'titulo' => $nomeDocumento,
            //     'path' => $request->file('documento')->store('documentos'),
            //     'categoria' => $request->categoria,
            //     'userID' => auth()->user()->id
            // ]);
            
            $documento = new Documento();
            $documento->titulo = $nomeDocumento;
            $documento->path = $request->file('documento')->store('documentos');
            $documento->categoria = $request->categoria;
            $documento->userID = auth()->user()->id;
            $documento->save();

            $documento->update(['url' => url("storage/" . $documento->path . "/" . $documento->nome)]);
        }

        return view("Documentos.index", ['data'=> Documento::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        // return view("Document",['data'=>$data->$id])
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function delete(Documento $documento)
    {
        Documento::where('id', '=', $documento->id)->delete();

        return view("Documentos.index", ['data'=> Documento::all()]);
    }

    public function download(Documento $documento)
    {
        return response()->download(public_path('storage/' . $documento->path), $documento->titulo);
    }
}
