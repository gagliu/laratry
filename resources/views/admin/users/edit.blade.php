@extends('admin.template.main')

@section('title','Editar Usuario '.$user->name)

@section('content')

    {!! Form::open(['route'=>['admin.users.update',$user->id],'method' => 'PUT' ]) !!}

    <div class="form-group">
        {!! Form::label('name','Nombre') !!}
        {!! Form::text('name',$user->name,['class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Correo Electronico') !!}
        {!! Form::text('email',$user->email,['class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('type','Tipo') !!}
        {!! Form::select('type',[''=>$user->type,'member' => 'Miembro','admin' => 'Administrador']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection
