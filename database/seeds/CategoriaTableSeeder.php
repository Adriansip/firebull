<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria=new Categoria();
        $categoria->categoria='Consumibles';
        $categoria->save();

        $categoria=new Categoria();
        $categoria->categoria='Proteccion a la cabeza';
        $categoria->save();

        $categoria=new Categoria();
        $categoria->categoria='Proteccion a las manos';
        $categoria->save();

        $categoria=new Categoria();
        $categoria->categoria='Proteccion a la cintura';
        $categoria->save();

        $categoria=new Categoria();
        $categoria->categoria='Proteccion a los ojos';
        $categoria->save();
    }
}
