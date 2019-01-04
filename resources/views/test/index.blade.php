<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $prueba->title }}</title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/general.css')}}">
</head>
<body>
    HOLA!!

    <br><br>
    <h1>{{ $prueba->title }}</h1> | {{ $prueba->category->name }} |
    @foreach($prueba->tags as $tag)
        {{ $tag->name }}
    @endforeach

</body>
</html>
