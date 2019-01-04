@extends('admin.template.main')

@section('title')

@section('content')

    <a href="{{ route('admin.tags.create') }}" class="btn btn-info">Crear nuevo Tag</a>
    <!-- BUSCADOR DE TAGS -->
    {!! Form::open(['route'=>'admin.tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
            <div class="form-group">
                {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Buscar tag..']) !!}
            </div>
    {!! Form::close() !!}
    <!-- FIN DEL BUSCADOR-->
    <hr>
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acción</th>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td><a href="{{ route('admin.tags.edit',$tag->id) }}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="{{ route('admin.tags.destroy', $tag->id)  }}" class="btn btn-danger btn-sm "
                       onclick="return confirm('¿Seguro desea eliminar el tag?')"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $tags->render()!!}
@endsection
