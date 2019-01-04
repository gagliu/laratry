<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Image;

class ImagesController extends Controller
{
    public function index(Request $request)
    {
        //$articles = Article::orderBy('id', 'ASC')->paginate(5); all()
        $images = Image::orderBy('id', 'ASC')->paginate(6); //Search($request->title)->

//        $images->each(function($images){
//            $images->article;
//        });

        //var_dump($articles->title);

        //var_dump($images);

        return view('admin.images.index')->with('images', $images);

    }

}
