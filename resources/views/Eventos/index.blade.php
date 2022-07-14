@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">Eventos</div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descricao</th>
                            <th scope="col">Imagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $eventos)
                                <tr>
                                    <td>{{$eventos->titulo}}</td>
                                    <td>{{$eventos->descricao}}</td>
                                    <td><img src = {{$eventos->img}} width = 50px, height = 50px></td>
                                    <td>
                                        <div>
                                            <a href="{{route('eventos.edit',['evento'=>$eventos->id])}}" class="btn btn-secondary btn-sm" type="button" name="edit" value="{{$eventos}}" onclick="javascript:void(0)">Editar</a>
                                            <form method="POST" action="{{route('eventos.destroy',['evento'=>$eventos->id])}}">
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
