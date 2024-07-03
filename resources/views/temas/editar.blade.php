@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Temas</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('temas.index') }}"><i class="fa fa-arrow-left"></i> atras</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hay un problema de entrada.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('temas.update',$tema->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                <input type="text" name="titulo" value="{{ $tema->titulo }}" class="form-control" placeholder="titulo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>area:</strong>
                <input type="text" name="area" value="{{ $tema->area }}" class="form-control" placeholder="area">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>palabras clave:</strong>
                <input type="text" name="palabras_clave" value="{{ $tema->palabras_clave }}" class="form-control" placeholder="palabras_clave">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                <select class="form-control" name="estado">
                    <option value="libre" {{ $tema->estado == 'libre' ? 'selected' : '' }}>Libre</option>
                    <option value="asignado" {{ $tema->estado == 'asignado' ? 'selected' : '' }}>Asignado</option>
                    <option value="asignado" {{ $tema->estado == 'terminado' ? 'selected' : '' }}>Terminado</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <input type="textarea" name="descripcion" value="{{ $tema->descripcion }}" class="form-control" placeholder="descripcion">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary btn-sm mb-2 mt-2"><i class="fa-solid fa-floppy-disk"></i> Editar</button>
        </div>
    </div>
</form>

<p class="text-center text-primary"><small>Temas de grado</small></p>
@endsection