<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //relaciona la clave foranea con la columna y tabla a la que se requiere.
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); //relaciona la clave foranea con la columna y tabla a la que se requiere.
                                                                                    //onDelete elimina los articulos asociados a el usuario que se elimine.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
