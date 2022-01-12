@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">Professores</div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Área</th>
                            <th scope="col">Lattes</th>
                            <th scope="col">Data de criação</th>
                            <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $prof)
                                <tr>
                                    <td>{{$prof->name}}</td>
                                    <td>{{$prof->area}}</td>
                                    <td style="width: 25vw;">{{$prof->lattes}}</td>
                                    <td>{{$prof->created_at}}</td>
                                    <td>
                                        <div>
                                            <a href="{{route('teachers.show',['teacher'=>$prof->id])}}" class="btn btn-primary btn-sm" type="button" name="show" value="{{$prof}}" onclick="javascript:void(0)">Ver</a>
                                            <a href="{{route('teachers.edit',['teacher'=>$prof->id])}}" class="btn btn-secondary btn-sm" type="button" name="edit" value="{{$prof}}" onclick="javascript:void(0)">Editar</a>
                                            <a href="{{route('teachers.destroy',['teacher'=>$prof->id])}}" class="btn btn-danger btn-sm"type="button" name="delete" value="{{$prof}}" onclick="javascript:void(0)">Deletar</a>
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