@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Nuevo Tema</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('temas.index') }}"><i class="fa fa-arrow-left"></i> Atras</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hubo un Error.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('temas.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                <input type="text" name="titulo" class="form-control" placeholder="titulo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>area:</strong>
                <input type="text" name="area" class="form-control" placeholder="area">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>palabras clave:</strong>
                <input type="text" name="palabras_clave" class="form-control" placeholder="palabras_clave">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                <select class="form-control" name="estado">
                    <option value="libre" >Libre</option>
                    <option value="asignado">Asignado</option>
                    <option value="asignado">Terminado</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                <input type="textarea" name="descripcion" class="form-control" placeholder="descripcion">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i class="fa-solid fa-floppy-disk"></i> Crear</button>
        </div>
    </div>
</form>

<p class="text-center text-primary"><small>Temas de Grado</small></p>
@endsection