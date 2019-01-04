@extends('admin.template.main')

@section('title','Crear Artículo')

@section('content')

    {!! Form::open(['route'=>'admin.articles.store','method' => 'POST', 'files' => true ]) !!}

    <div class="form-group">
        {!! Form::label('title','Título') !!}
        {!! Form::text('title',null,['class' => 'form-control','placeholder'=>'Titulo del artículo','required']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('content','Contenido') !!}
        {!! Form::textarea('content',null,['class' => 'form-control textarea-content', 'required']) !!}
    </div>

    {{ Form::hidden('user_id', Auth::user()->id ) }}

    <div class="form-group">
        {!! Form::label('type','Categoría') !!}
        {!! Form::select('category_id',$categories,null,['class' => 'form-control select-category','required'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('type','Tags') !!}
        {!! Form::select('tags[]',$tags,null,['class' => 'form-control select-tag','multiple','required'])!!}
        {{--tags[] Indica que los id de los tags se envían como un array en el request al controlador --}}
    </div>

    <div class="form-group">
        {!! Form::label('type','Imagen') !!}
        {!! Form::file('image')!!}
    </div>


    <div class="form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
@endsection

@section('js')
    <script>
        $('.select-tag').chosen({});
        $('.select-category').chosen({});

        $('.textarea-content').trumbowyg();
    </script>
@endsection


