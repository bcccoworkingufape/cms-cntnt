@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('noticias.index') }}" class="btn btn-primary" style="margin-bottom:15px;">Voltar</a>
        <h1>{{ $noticia->titulo }}</h1>
        {!! $noticia->descricao !!}
        <img src="data:image/jpeg;base64,{{ $noticia->img }}" alt="{{ $noticia->titulo }}" class="img-fluid mx-auto d-block" style="max-width: 600px; height: auto;">

        {{-- Adicione outras informações da notícia conforme necessário --}}
    </div>
@endsection