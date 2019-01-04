<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','default') | Panel de Administración</title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/chosen/chosen.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/trumbowyg/dist/ui/trumbowyg.css') }}">
</head>

<body>

<div class="container">
    @include('admin.template.partials.nav')
<section>
    @include('flash::message')
    @yield('title')
</section>

<section>
    @include('admin.template.partials.errors')
    @yield('content')
</section>
</div>

<script src="{{ asset('plugins/bootstrap/jquery/jquery-2.2.1.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.js') }}"></script>

@yield('js')

</body>
</html>
