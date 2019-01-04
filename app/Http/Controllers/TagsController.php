<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TagRequest;
use Laracasts\Flash\Flash;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)//El request es para recibir los datos del formulario. Necesario para el buscador
                                            //Requestt es un parámetro opcional en este caso?
                                            //Por que Tag::Search funciona??
    {
        $tags= Tag::search($request->name)->orderBy('id','DESC')->paginate(5);//Info sobre el metodo paginate se encuentra en la documentación de laravel.
        return view('admin.tags.index')->with('tags',$tags); //Se le pasará la variable $users a la vista users

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag($request->all()); //$request->all() para que?
        $tag->name = $request->name;

        $tag->save();

        Flash::success("El Tag se ha creado de forma exitosa!");
        return redirect()->route('admin.tags.index');
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
        $tag = Tag::find($id);
        return view('admin.tags.edit')->with('tag',$tag);

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
        $tag= Tag::find($id);
        $tag->fill($request->all());
        $tag->save();

        Flash::warning('El tag ha sido editado exitosamente.');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag= Tag::find($id);
        $tag->delete();

        Flash::error('El tag ha sido eliminado.');
        return redirect()->route('admin.tags.index');
    }
}
