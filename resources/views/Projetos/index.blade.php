@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header headerFix">Projetos
                    {{-- <a href="{{route('projetos.create')}}" class="btn btn-primary btn-sm" type="button" name="edit" onclick="javascript:void(0)">Cadastrar Novo Projeto</a> --}}
                </div>
                <div class="card-body">
                    <table class="table table-sm table-hover indexNews">
                        <thead>
                            <tr>
                            <th scope="col">Titulo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Area</th>
                            <th scope="col">Descricao</th>
                            <th scope="col">Link</th>
                            <th scope="col">Imagem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $projetos)
                                <tr>
                                    <td>{{$projetos->titulo}}</td>
                                    <td>{{$projetos->tipo}}</td>
                                    <td>{{$projetos->area}}</td>
                                    <td>{{$projetos->descricao}}</td>
                                    <td>{{$projetos->link}}</td>
                                    <td><img src = {{$projetos->img}} width = 50px, height = 50px></td>
                                    <td>
                                        <div class="formFix">
                                            <a href="{{route('projetos.edit',['projeto'=>$projetos->id])}}" class="btn btn-secondary btn-sm" type="button" name="edit" value="{{$projetos}}" onclick="javascript:void(0)">Editar</a>
                                            <form method="POST" action="{{route('projetos.destroy',['projeto'=>$projetos->id])}}">
                                                @method("DELETE")
                                                @csrf
                                                <button style="width:100%" type="submit" class="btn btn-danger btn-sm">
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
