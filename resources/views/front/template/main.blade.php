<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Home') | Blog Facilito</title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/journal/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.6.3/css/font-awesome.min.css') }}">
</head>
<body>
    <header>
        @include('front.template.partials.header')
    </header>
    <div class="container">
        @yield('content')
    <footer>
            <hr>
            Todos los derechos reservados
            <div class="pull-right">Juan Diego Giraldo</div>
    </footer>
    </div>
    <script src="{{ asset('plugins/bootstrap/jquery/jquery-2.2.1.js') }}"></script>
</body>
</html>