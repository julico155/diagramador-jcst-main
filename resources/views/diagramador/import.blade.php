@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importar Archivo XML</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('importar-xml') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="titulo">Título del Diagramador</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="nombre_autor">Nombre del Autor</label>
                            <input type="text" class="form-control" id="nombre_autor" name="autornombre" value="{{ old('autornombre') ?? auth()->user()->name }}">
                        </div>
                        
                        <div class="form-group">
                             
                            <input type="text" class="form-control hidden" id="id_autor" name="autor" value="{{ old('autor') ?? auth()->user()->id }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="archivo_xml">Seleccionar Archivo XML</label>
                            <input type="file" class="form-control-file" id="archivo_xml" name="archivo_xml">
                            @error('archivo_xml')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Importar XML</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
