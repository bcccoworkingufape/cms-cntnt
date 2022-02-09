@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar Professor</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('teachers.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Nome:</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">Area:</label>
                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" required autocomplete="area">
                                @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lattes" class="col-md-4 col-form-label text-md-right">Lattes:</label>
                            <div class="col-md-6">
                              
                                <input id="lattes" type="url" placeholder="http://example.com" value="https://" class="form-control @error('lattes') is-invalid @enderror" name="lattes" required autocomplete="lattes">
                                @error('lattes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">Imagem:</label>
                            <div class="col-md-6">
                                <input style="border:1;box-shadow:none;padding:0;height:calc(1.6em + 0.75rem - 4px)"id="img"  accept="image/png, image/jpeg, image/jpg, image/bmp" type="file" class="form-control-file form-control @error('img') is-invalid @enderror" name="img" required placeholder="Selecione um arquivo">
                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary float-right">
                                    Submeter
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