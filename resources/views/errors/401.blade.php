@extends('admin.template.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">Acceso restringido</div>
                    </div>
                    <div class="panel-body">
                        <strong class="text-center">
                            <p class="text-center">Usted no tiene acceso a esta zona</p>
                            <p>
                                <a href="{{ route('front.index') }}">¿Desea volver al inicio?</a>
                            </p>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


