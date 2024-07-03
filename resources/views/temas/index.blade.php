@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Temas</h2>
        </div>
        <div class="pull-right">
            @can('crear-temas')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('temas.create') }}"><i class="fa fa-plus"></i> Crear Nuevo Tema</a>
            @endcan
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert"> 
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
    <tr>
        <th>N</th>
        <th>Titulo</th>
        <th>area</th>
        <th>palabras clave</th>
        <th>estado</th>
        <th>descripcion</th>
        <th width="280px">Acciones</th>
    </tr>
    @foreach ($temas as $tema)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $tema->titulo }}</td>
        <td>{{ $tema->area }}</td>
        <td>{{ $tema->palabras_clave }}</td>
        <td>
            @if ($tema->estado == 'libre')
              <span class="badge badge-success">Libre</span>
            @elseif ($tema->estado == 'asignado')
              <span class="badge badge-danger">Asignado</span>
             @elseif ($tema->estado == 'terminado')
              <span class="badge badge-danger">terminado</span>
            @endif  
        </td>
        <td>{{ $tema->descripcion }}</td>
        <td>
            <form action="{{ route('temas.destroy',$tema->id) }}" method="POST">
                <a class="btn btn-info btn-sm" href="{{ route('temas.show',$tema->id) }}"><i class="fa-solid fa-list"></i> Mostrar</a>
                @can('editar-temas')
                <a class="btn btn-primary btn-sm" href="{{ route('temas.edit',$tema->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                @endcan

                @csrf
                @method('DELETE')

                @can('borrar-temas')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Borrar</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $temas->links() !!}

<p class="text-center text-primary"><small>Temas de grado</small></p>
@endsection