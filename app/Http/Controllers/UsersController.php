<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Laracasts\Flash\Flash; //se llama el paquete instalado. La clase es Flash. Es igual al alias de config/app.php
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(5);//Info sobre el metodo paginate se encuentra en la documentación de laravel.
        return view('admin.users.index')->with('users',$users); //Se le pasará la variable $users a la vista users
                                                                // La paginación se hace a través del controlador.|
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request) //En vez de usar Request, se puede usar el creado (UserRequest)
    {
        //dd($request);

        $user = new User($request->all());
        //$user -> password = bcrypt($request->password);
        $user->save();

        Flash::success("Se ha registrado de forma exitosa!" );
        //return session()->all();

        return redirect()->route('admin.users.index'); //Redireccionar después de ejecutar el método
        //dd('usuario creado');
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
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);

        //return view('admin.users.index');
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
        $user= User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type= $request->type;
        //$user->fill($request->all()); Equivale a las 3 lineas anteriores
        $user->save();

        Flash::warning('El usuario ha sido editado exitosamente.');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Flash::warning('El usuario '.$user->name . " ha sido eliminado");
        return redirect()->route('admin.users.index');
    }
}
