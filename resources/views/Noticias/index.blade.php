@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">Noticias</div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descricao</th>
                            <th scope="col">Link</th>
                            <th scope="col">Imagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $noticias)
                                <tr>
                                    <td>{{$noticias->titulo}}</td>
                                    <td>{{$noticias->descricao}}</td>
                                    <td>{{$noticias->link}}</td>
                                    <td><img src = {{$noticias->img}} width = 50px, height = 50px></td>
                                    <td>
                                        <div>
                                            <a href="{{route('noticias.edit',['noticia'=>$noticias->id])}}" class="btn btn-secondary btn-sm" type="button" name="edit" value="{{$noticias}}" onclick="javascript:void(0)">Editar</a>
                                            <form method="POST" action="{{route('noticias.destroy',['noticia'=>$noticias->id])}}">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
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
