<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use App\Image;

use File;
use Input;

use Illuminate\Http\Request;

use Laracasts\Flash\Flash; //se llama el paquete instalado. La clase es Flash. Es igual al alias de config/app.php
use App\Http\Requests\ArticleRequest;


use App\Http\Requests;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::orderBy('id', 'ASC')->get(); //paginate(5)
        //dd($articles);
        return view('admin.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('admin.articles.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //dd($request->all());


        $article = new Article($request->all()); //Que significa $request->all()???
        //Falta $article->user_id = \Auth::user()->id; no se sabe si afecta en el momento
        $article->save();

        //Imagen
        $file = $request->file('image');
        $name = "laratry-" . time() . $file->getClientOriginalName();
        $path = public_path() . "/images/articles/"; //public_path() trae la direccion de dodne se encuentra el proyecto.
        $file->move($path, $name);

        $image = new Image();
        $image->name = $name;
        $image->article_id = $article->id; //Es una forma válida. Si varias personas crean un articulo a la misma
        //vez podría haber un problema. Podría almacenarse el id de un
        //artículo incorrecto.
        $image->article()->associate($article); //Asocia image y article a travéz de la llave foranea (article_id)
        $image->save();

        $article->tags()->sync($request->tags);


        Flash::success("El articulo se ha creado de forma exitosa!");
        //return session()->all();

        return redirect()->route('admin.articles.index'); //Redireccionar después de ejecutar el método
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article = Article::find($id);
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');
        $my_tags = $article->tags->lists('id')->toArray(); //To array es un método de la clase Collection ver más métodos disponibles en la documentación
        //dd($my_tags);

        $images = $article->images;

        //dd($article->images->pluck('name'));

        //dd($article->category->id); // dd($article->tags->id);

        //$article->category;

        return view('admin.articles.edit')
            ->with('article', $article)
            ->with('categories', $categories)
            ->with('tags', $tags)
            ->with('my_tags', $my_tags)
            ->with('images', $images);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//        return ($request->file('image'));
        //dd($request->file('image'));
//
        $article = Article::find($id);
        $article->fill($request->all());
        $article->update();


        //Imagen

        $files=$request->file('image');

        if ($request->hasFile('image')) {

            //dd($request->file('image'));
            foreach ($files as $file){

            $name = "laratry-".time().$file->getClientOriginalName();
            $path = public_path() . "/images/articles/"; //public_path() trae la direccion de dodne se encuentra el proyecto.
            $file->move($path, $name);


            $image = new Image();
            $image->name = $name;
            $image->article()->associate($article); //Asocia image y article a travéz de la llave foranea (article_id)
            $image->save();
            }
        }

        ///Funcional ejemplo internet con validaciones

//        $files = $request->file('image');
//
//        if ($request->hasFile('image')) {
//
//            foreach ($files as $file) {
//                // Validate each file
////            $rules = array('file' => 'required'); // 'required|mimes:png,gif,jpeg,txt,pdf,doc'
////            $validator = Validator::make(array('file'=> $file), $rules);
////
////            if($validator->passes()) {
//
//                $destinationPath = public_path() . "/images/articles/";
//                $filename = $file->getClientOriginalName();
//                $file->move($destinationPath, $filename);
//
//                $image = new Image();
//                $image->name = $filename;
//                $image->article()->associate($article); //Asocia image y article a travéz de la llave foranea (article_id)
//                $image->save();
//
//
//                // Flash a message and return the user back to a page...
////            } else {
////                // redirect back with errors.
////                return Redirect::to('upload')->withInput()->withErrors($validator);
////            }
//            }
//        }

        if ($request->images)
            foreach ($request->images as $imageId) {

                $image = Image::find($imageId);
                $image->delete();

                File::delete(public_path() . "/images/articles/" . $image->name);

            }

        Flash::success('Artículo editado correctamente');

        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('admin.articles.index');
    }
}
