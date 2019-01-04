<nav class="navbar navbar-default ">
    <div class="container-fluid">
        @if(Auth::check())
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Inicio</a></li>
                    @if(Auth::user()->admin())
                        <li><a href={{route('admin.users.index')}}>Usuarios</a></li>
                    @endif
                    <li><a href="{{ route('admin.categories.index') }}">Categorias</a></li>
                    <li><a href={{route('admin.articles.index')}}>Articulos</a></li>
                    <li><a href={{route('admin.images.index')}}>Imagenes</a></li>
                    <li><a href={{route('admin.tags.index')}}>Tags</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('admin.index') }}" target="_blank">Pagina principal</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('admin.auth.logout') }}">Salir</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
    </div>
</nav>
