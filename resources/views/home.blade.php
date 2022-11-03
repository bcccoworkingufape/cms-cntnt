@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row gy-3">
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Usuários</h5>
              <p class="card-text">Gerenciamento de Usuários</p>
              <a href="{{route('users.index')}}" class="btn btn-primary">Ir</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Notícias</h5>
              <p class="card-text">Gerenciamento de Notícias</p>
              <a href="{{route('noticias.index')}}" class="btn btn-primary">Ir</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Eventos</h5>
                <p class="card-text">Gerenciamento de Eventos</p>
                <a href="{{route('eventos.index')}}" class="btn btn-primary">Ir</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Projetos</h5>
                <p class="card-text">Gerenciamento de Projetos</p>
                <a href="{{route('projetos.index')}}" class="btn btn-primary">Ir</a>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Documentos</h5>
                <p class="card-text">Gerenciamento de Documentos</p>
                <a href="{{route('documentos.index')}}" class="btn btn-primary">Ir</a>
              </div>
            </div>
          </div>
      </div>
</div>
@endsection
