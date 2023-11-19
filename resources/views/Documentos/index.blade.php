@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">Documentos</div>
                <div class="card-body">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th scope="col" colspan="3">Título</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $documento)
                                <tr>
                                    <td>
                                        {{$documento->titulo}}
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm" type="button" href="{{route('documentos.download', $documento)}}">Download</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="{{route('documentos.delete', $documento)}}">Deletar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('documentos.create')}}" class="btn btn-primary">Cadastrar documento</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
