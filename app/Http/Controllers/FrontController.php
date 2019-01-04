<?php

//Controlador usado para manejar el contenido que el usuario va a ver. Carga categorías, tags y artículos


namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use Carbon\Carbon; //Tiene namespace Carbon
use DB;



class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        Carbon::setLocale('es');

    }

    public function index()
    {
        $articles = Article::orderBy('id','DESC')->paginate(4);

        $articles->each(function($articles){
            $articles->images;  //Entender lucho
            route('front.view.article', $articles->slug);
        });

        return view('front.index')
            ->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchCategory($name){

        $category = Category::SearchCategory($name)->first(); //Debe traerse un objeto, no una colecciòn. First trae el primer resultado, que es unico para cada categorìa
        $articles = $category->articles()->paginate(4); //Llama la relacion del modelo, de las categorias con los articulos. Lista todos los articulos que la categorìa tiene.
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });

        //Paginar cuando esté llamando los artículos

        /*$ArtCategories = DB::table('articles')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->where('name', $name)->get();*/

        return view('front.index')
            ->with('articles',$articles);


    }

    public function searchTag($name){

        $tag = Tag::search($name)->first();
        $articles = $tag->articles()->paginate(4);
        $articles->each(function($articles){
            $articles->category;
            $articles->images;
        });

        return view('front.index')
            ->with('articles',$articles);


        /*$ArtTags = DB::table('article_tag')
            ->join('articles','articles.id','=','article_tag.article_id')
            ->join('tags','tags.id','=','article_tag.tag_id')
            ->where('name',$name)->get();

        //dd($ArtTags );

        return view('front.search.tag')
            ->with('ArtTags',$ArtTags); */
    }

    public function viewArticle($slug)//Estamos recibiendo un slug, como se definió en la ruta para este método
    {
        $article = Article::findBySlugOrFail($slug); //Busca por slug o falla. Sino encuentra el artículo por el slug saca un error.
        $article->category;
        $article->user;
        $article->tags;
        $article->images;

        return view('front.article')->with('article', $article);

    }
}
