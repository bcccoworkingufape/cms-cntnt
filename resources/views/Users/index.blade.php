@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">Usuários</div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Área</th>
                            <th scope="col">Lattes</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de criação</th>
                            <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $users)
                                <tr>
                                    <td>{{$users->nome}}</td>
                                    <td>{{$users->area}}</td>
                                    <td style="width: 25vw;">{{$users->lattes}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->created_at}}</td>
                                    <td>
                                        <div class="formFix">
                                            <a href="{{route('users.edit',['user'=>$users->id])}}" class="btn btn-secondary btn-sm" type="button" name="edit" value="{{$users}}" onclick="javascript:void(0)">Editar</a>
                                            <form method="POST" action="{{route('users.destroy',['user'=>$users->id])}}">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
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
