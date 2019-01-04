<?php

//Route::group(['middleware' => 'web'], function () {
//
//    Route::get('/', function () {
//        return view('welcome'); //LLamar vista a través de rutas
//    });
//});

//RUTAS DEL FRONTEND

Route::get('/', [
    'as' => 'front.index',   //Pasar primero por un controlador antes de retornar la vistada
    'uses' => 'FrontController@index'
]);

Route::get('categories/{name}',[
    'uses' => 'frontController@searchCategory',
    'as' => 'front.search.category'
]);

Route::get('tags/{name}',[
    'uses' => 'frontController@searchTag',
    'as' => 'front.search.tag'
]);

Route::get('articles/{slug}',[
    'uses' => 'frontController@viewArticle',
    'as' => 'front.view.article'
]);



//RUTAS DEL PANEL DE ADMINISTRACIÓN

//Route::get('profile', ['middleware' => 'auth.basic', function() {

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {

    Route::get('/', ['as' => 'admin.index', function () {
        return view('admin.index');
        }
    ]);

    Route::group(['middleware' => 'admin'], function () {
        Route::resource('users', 'UsersController'); //Recibe dos parámetros: el nombre para este grupo de rutas
        //  y el segundo es el nombre del controlador que va a tomar y definir
        // las rutas que le corresponden
        Route::get('users/{id}/destroy', [
            'uses' => 'UsersController@destroy',
            'as' => 'admin.users.destroy'
        ]);
    });

    Route::resource('categories', 'CategoriesController');

    Route::get('categories/{id}/destroy', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'admin.categories.destroy'
    ]);

    Route::resource('tags', 'TagsController');

    Route::get('tags/{id}/destroy', [
        'uses' => 'TagsController@destroy',
        'as' => 'admin.tags.destroy'
    ]);

    Route::resource('articles', 'ArticlesController');

    Route::get('articles/{id}/destroy', [
        'uses' => 'ArticlesController@destroy',
        'as' => 'admin.articles.destroy'
    ]);

    Route::get('images', [
        'uses' => 'ImagesController@index',
        'as' => 'admin.images.index'
    ]);


});

// Authentication routes...


// Registration routes...
/*Route::get('admin/auth/register', [ //Rutas para registrar ya estan creadas arriba.
    'uses' => 'Auth\AuthController@getRegister',
    'as' => 'admin.auth.login'
]);

Route::get('admin/auth/register', [
    'uses' => 'Auth\AuthController@postRegister',
    'as' => 'admin.auth.register'
]);*/


/*Route::get('articles/{nombre?}', function ($nombre = "no coloco nombre") {
    echo "esta es la seccion de articulos con el nombre " . $nombre;
});

Route::group(['prefix' => 'articles'], function(){ //prefix significa que debe siempre ponerse esa parte,
                                                    // en este caso articles, no puede omitirse
   /* Route::get('view/{article?}', function ($article = "Vacio") {
        echo $article;
    });*/


/*
    Route::get('view/{id}', [
        'uses' =>  'TestController@view',
        'as' => 'articlesView'
    ]);
});*/

//Puede usarse

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => 'web'], function(){


//Route::group(['prefix' => 'admin','middleware' => ['web']], function () {


Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['guest']], function () {

        Route::get('admin/auth/login', [
            'uses' => 'Auth\AuthController@getLogin',
            'as' => 'admin.auth.login'
        ]);

        Route::post('admin/auth/login', [
            'uses' => 'Auth\AuthController@postLogin',
            'as' => 'admin.auth.login'
        ]);

        // Registration routes creadas manualente para efectos didácticos
        Route::get('admin/auth/register', [
            'uses' => 'Auth\AuthController@getRegister',
            'as' => 'admin.auth.register'
        ]);

        Route::post('admin/auth/register', [
            'uses' => 'Auth\AuthController@register', //Se llama al método register del controlador. Este método no se
            'as' => 'admin.auth.create'               //ve directamente en el controlador, se hereda del trait
            //RegistersUsers que a su vez hereda de AuthenticatesAndRegistersUsers
            //El as es importtante y es bueno siempre usarlo. Es el nombre que le doy a este ruta, para usarla
            // en formularios, por ejemplo. Al utilizar este numbre, no importa si la ruta original cambia, el uso
            // que se le da en el html segurá siendo funcional.
            //Para utilziar este nombre en el html siempre debe utilizarse {{ route('admin.auth.create') }}


        ]);


// Registration routes... (de laravel 5.1)
        //Route::get('auth/register', 'Auth\AuthController@getRegister');
        //Route::post('auth/register', 'Auth\AuthController@postRegister');
    });
    Route::get('admin/auth/logout', [
        'uses' => 'Auth\AuthController@getLogout',
        'as' => 'admin.auth.logout'
    ]);

});

//Rutas de registro creadas por laravel 5.2
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
