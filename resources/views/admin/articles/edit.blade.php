@extends('admin.template.main')

@section('title','Editar Artículo')

@section('content')

    {!! Form::open(['route'=>['admin.articles.update',$article->id],'method' => 'PUT', 'files' => true ]) !!}

    <div class="form-group">
        {!! Form::label('title','Título') !!}
        {!! Form::text('title',$article->title,['class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content','Contenido') !!}
        {!! Form::textarea('content',$article->content,['class' => 'form-control','required']) !!}
    </div>

    {{ Form::hidden('user_id', Auth::user()->id ) }}

    <div class="form-group">
        {!! Form::label('type','Categoría') !!}
        {!! Form::select('category_id',$categories,$article->category->id,['class' => 'form-control select-category','required'])!!}

    </div>

    <div class="form-group">
        {!! Form::label('type','Tags') !!}
        {!! Form::select('tags[]',$tags,$my_tags,['class' => 'form-control select-tag','multiple','required'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('type','Imagen') !!}
        <div class="row">
            @foreach( $images as $image)
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                {{--<input type="radio" name="image" value={{$image->name}}>--}}
                                <img src="/images/articles/{{$image->name}}" width="220" height="200">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="checkbox" align="center">
                                <label>
                                    <input type="checkbox" name="images[]" value="{{ $image->id }}"> Eliminar
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </ul>
    </div>
    <input name="image[]" type="file" multiple>
    <br>
    <div class="form-group">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
    </div>

    {!! Form::close() !!}

@endsection

@section('js')
    <script>
        $(function () {
            $('.select-tag').chosen({});
            $('.select-category').chosen({});
            $('.textarea-content').trumbowyg();
        });
    </script>
@endsection


