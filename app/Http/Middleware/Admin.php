<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;


    public function __construct(Guard $auth)  //No estaba en el middleware Authenticate. Devuelve el tipo de usuario tmbn
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next, $guard = null)
    {
       // dd($this->auth->user()->admin());

        if($this->auth->user()->admin()) //Metodo eloquent sin parentesis (retorna una relacion, entre tablas)
        {
            return $next($request);

        } else {

            abort(401);//Aborta el acceso y muestra este error. Podría mostrarse una vista diciendo que no puede darse acceso a la pagina por el rol.

            dd("Solo administradores pueden acceder a esta sección");

        }
                         //User es el modelo. Debe retornar el usuario autentificado.
                       // Usa el método admin definido en el modelo user para validar si el usuario actual tiene rol de administrador.
                       // Retorna true o false.
    }
}
