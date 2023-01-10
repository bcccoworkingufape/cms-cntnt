@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header headerFix">Noticias
                    <a href="{{route('noticias.create')}}" class="btn btn-primary btn-sm" type="button" name="edit" onclick="javascript:void(0)">Cadastrar Nova Notícia</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover indexNews">
                        <thead>
                            <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descricao</th>
                            <th scope="col">Imagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $noticias)
                                <tr>
                                    <td>{{$noticias->titulo}}</td>
                                    <td>{{$noticias->descricao}}</td>
                                    <td><img src = {{$noticias->img}} width = 50px, height = 50px></td>
                                    <td class="actions">
                                        <div class="formFix">
                                            <a href="{{route('noticias.edit',['noticia'=>$noticias->id])}}" class="btn btn-secondary btn-sm" type="button" name="edit" value="{{$noticias}}" onclick="javascript:void(0)">Editar</a>
                                            <form method="POST" action="{{route('noticias.destroy',['noticia'=>$noticias->id])}}">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    {{ __('Deletar') }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
