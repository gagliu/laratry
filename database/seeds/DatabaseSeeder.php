<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class); //Se indica el nombre de la clase del seeder que queremos llamar
        // $this->call(UserTableSeeder::class);
    }
}
