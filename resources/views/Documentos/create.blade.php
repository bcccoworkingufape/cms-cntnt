@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">Cadastrar documento</div>
                <div class="card-body">
                    <form action="{{route('documentos.store')}}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction:column">
                        @csrf
                        <div class="form-group row">
                            <label for="">Categoria</label>
                            <input style="width: 20%; margin-bottom:8px;margin-left:10px" id="categoria" type="number" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="{{ old('categoria') }}" required>
                        </div>
                        <input type="file" name="documento" style="margin-bottom: 8px">
                        <button style="width:20%" type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
