




        <a href="{{ route('admin.articles.create') }}" class="btn btn-info">Registrar nuevo articulo</a><hr>
        <!-- BUSCADOR DE TAGS -->
        {!! Form::open(['route'=>'admin.articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="form-group">
                {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Buscar articulos..']) !!}
        </div>
        {!! Form::close() !!}
                <!-- FIN DEL BUSCADOR-->
        <hr>
        <table class="table table-striped">
                <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Usuario</th>
                <th>Acción</th>
                </thead>
                <tbody>
                @foreach($ArtCategories as $article)
                        <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->name }}</td>
                        </tr>
                @endforeach
                </tbody>
        </table>


