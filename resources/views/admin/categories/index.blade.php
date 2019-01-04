@extends('admin.template.main');

@section('title', 'Listado de Categorias');

@section('content')

    <a href="{{ route('admin.categories.create') }}" class="btn btn-info">Crear nueva categoria</a>
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acción</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                   <tr>
                       <td>{{$category->id}}</td>
                       <td>{{$category->name}}</td>
                       <td>
                           <a href=" {{route('admin.categories.edit',$category->id)}} " class="btn btn-warning" >Editar</a>
                           <a href=" {{route('admin.categories.destroy',$category->id)}} " class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar la categoría?')">Eliminar</a>
                       </td>
                   </tr>
            @endforeach
        </tbody>
    </table>
    {!! $categories->render() !!}
@endsection