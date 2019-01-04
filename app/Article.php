<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

//Uso de trait e interface

class Article extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title', //De donde se va a sacar el slug
        'save_to' => 'slug', //Se guardará en una columna llamada slug. Debe hacerse una nueva migración para la nueva columna a migrar.
    ];

    protected $table = "articles";
    protected $fillable = ['title','content','category_id','user_id'];

    //Relación en el artículo
    //Es en singular por un artículo puede pertenecer a una sola categoría.

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function scopeSearch($query, $title) //No se entiente query?
    {
        return $query->where('title', 'LIKE', "%$title%");
    }
}
