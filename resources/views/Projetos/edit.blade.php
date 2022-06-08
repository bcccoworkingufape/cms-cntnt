@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Project') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('projetos.update',['projeto'=>$data->id]) }}">
                        @csrf
                        @method("PUT")

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>

                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{ old('tipo') }}" required autocomplete="tipo">

                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area">

                                @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descricao') }}</label>

                            <div class="col-md-6">
                                <input id="descricao" type="descricao" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ old('descricao') }}" required autocomplete="descricao">

                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                            <div class="col-md-6">
                                <input id="link" type="link" class="form-control @error('link') is-invalid @enderror" name="link" required autocomplete="new-link">

                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
