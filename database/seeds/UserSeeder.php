<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; //Se llama la clase Model de Eloquent para poder utilizar DB::

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Acá se define lo que el seeder va a hacer.
        //insert() para insertar datos.
        //Array asociativo. La llave es el nombre de la columna.
//        DB::table('users')->insert([
//            //Para un solo usuario.
//            'name'  => 'Pedrito Perez',
//            'email' => 'pedrito@juase.com',
//            'password' => bcrypt('123456')
//        ]);//Se indica el nombre de la tabla.

        //Crea 50 usuarios (sin probar)
//        factory(App\User::class, 50)->create()->each(function($u) {
//            $u->posts()->save(factory(App\Post::class)->make());
//        });

        factory(App\User::class, 10)->create(); //Así se ejecuta el model factory creado en ModelFactory.php

    }

}
