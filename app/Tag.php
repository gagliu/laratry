<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany('App\Article')->withTimestamps();
    }

    public function scopeSearch($query, $name) //No se entiente query?
    {
        return $query->where('name', 'LIKE', "%$name%");
    }

    public function scopeSearchTag($query, $name) //No se entiente query?
    {
        return $query->where('name', '=', "$name");
    }
}
