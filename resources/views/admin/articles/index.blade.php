@extends('admin.template.main')

@section('title','Lista de Articulos')

@section('content')
    <a href="{{ route('admin.articles.create') }}" class="btn btn-info">Registrar nuevo articulo</a><hr>
    <!-- BUSCADOR DE TAGS -->
    {!! Form::open(['route'=>'admin.articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
    <div class="form-group">
        {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Buscar articulos..']) !!}
    </div>
    {!! Form::close() !!}
            <!-- FIN DEL BUSCADOR-->
    <hr>
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Usuario</th>
        <th>Acción</th>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->category->name }}</td>
                <td>{{ $article->user->name }}</td>
                <td><a href="{{ route('admin.articles.edit',$article->id) }}" class="btn btn-warning">Editar</a>
                    <a href="{{ route('admin.articles.destroy', $article->id)  }}" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar el usuario?')">Eliminar</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $articles->render()!!}
@endsection
