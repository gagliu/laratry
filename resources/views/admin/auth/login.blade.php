@extends('admin.template.main')

@section('title','Login')

@section('content')
    {!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('email', 'Correo Electrónico') !!}
            {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'example@email.com']) !!}

        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password') !!}
            {!! Form::password('password',['class' => 'form-control','placeholder' => '**********']) !!}

        </div>
        <div class="form-group">
            {!! Form::submit('Acceder', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection()

{{--<form method="POST" action="/auth/login">--}}
    {{--{!! csrf_field() !!}--}}

    {{--<div>--}}
        {{--Email--}}
        {{--<input type="email" name="email" value="{{ old('email') }}">--}}
    {{--</div>--}}

    {{--<div>--}}
        {{--Password--}}
        {{--<input type="password" name="password" id="password">--}}
    {{--</div>--}}

    {{--<div>--}}
        {{--<input type="checkbox" name="remember"> Remember Me--}}
    {{--</div>--}}

    {{--<div>--}}
        {{--<button type="submit">Login</button>--}}
    {{--</div>--}}
{{--</form>--}}

