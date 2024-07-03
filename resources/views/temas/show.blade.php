@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Mostrar Temas</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('temas.index') }}"> Back</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Titulos:</strong>
            {{ $tema->titulo }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>area:</strong>
            {{ $tema->area }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Palabras clave:</strong>
            {{ $tema->palabras_clave }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Estado:</strong>
            {{ $tema->estado }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripcion:</strong>
            {{ $tema->descripcion }}
        </div>
    </div>
</div>

<p class="text-center text-primary"><small>temas de grado</small></p>
@endsection