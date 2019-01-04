@extends('front.template.main')

@section('content')
    <h3 class="tittle-front left">Ultimos Artículos</h3>
    <div class="row">
        <div class="col-md-8">
            <div class="row">

                @foreach($articles as $article)

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <a href="{{ route('front.view.article', $article->slug) }}" class="thumbnail">
                                    @foreach($article->images as $image)
                                        <img class="img-responsive" src="{{ asset('images/articles/' . $image->name)}}"
                                             alt="...">
                                    @endforeach
                                </a>
                                <a href="{{ route('front.view.article', $article->slug) }}">
                                    <h3 class="text-center">{{ $article->title }}</h3>
                                </a>
                                <hr>
                                <i class="fa fa-folder-open-o"></i><a
                                        href="{{ route('front.search.category', $article->category->name) }}">{{ $article->category->name }}</a>
                                <div class="pull-right">
                                    <i class="fa fa-clock-o"></i> {{ $article->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

                {!! $articles->render() !!}

            </div>

        </div>
        <div class="col-md-4 aside">
            @include('front.partials.aside')
        </div>

    </div>
@endsection