@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastrar Notícia: </div>

                <div class="card-body">
                    <form class="formFix" method="POST" action="{{ route('noticias.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo:</label>
                            <div class="col-md-8">
                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>
                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descricao" class="col-md-4 col-form-label text-md-right">Descrição:</label>
                            <div class="col-md-8">
                                <textarea class="ckeditor form-control @error('descricao') is-invalid @enderror" name="descricao"  required autocomplete="descricao" id="descricao" type="text" placeholder="Digite o corpo da notícia aqui"></textarea>
                                @error('descricao')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">Imagem:</label>
                            <div class="col-md-8">
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
@section('script')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="{{asset('CKEDITOR/adapters/jquery.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    CKEDITOR.replace('descricao', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>


@endsection
