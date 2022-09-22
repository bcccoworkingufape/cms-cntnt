@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <div class="nav">
        <a href="{{route('users.index')}}">Users</a>
        <a href="{{route('noticias.index')}}">Notícias</a>
        <a href="{{route('eventos.index')}}">Eventos</a>
        <a href="{{route('projetos.index')}}">Projetos</a>
        <a href="{{route('documentos.index')}}">Documentos</a>
    </div>
</div>
@endsection
