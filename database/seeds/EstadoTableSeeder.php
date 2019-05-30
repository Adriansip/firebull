<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado=new Estado();
        $estado->estado='Aguscalientes';
        $estado->abreviacion='Ags';
        $estado->save();

        $estado=new Estado();
        $estado->estado='Baja California';
        $estado->abreviacion='BC';
        $estado->save();

        $estado=new Estado();
        $estado->estado='Baja California Sur';
        $estado->abreviacion='BCS';
        $estado->save();
    }
}
