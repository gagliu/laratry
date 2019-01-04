<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories"; //Nombre de la tabla
    protected $fillable = ['name']; //Son los campos permitidos para mostrar en los objetos json
                                    //Las relaciones también se definen acá.

    //Creación de una relación
    //Debe llevar el nombre del modelo que se va a relacionar de manera plural.
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function scopeSearchCategory($query, $name){

        return $query->where('name','=', $name);
    }
}

