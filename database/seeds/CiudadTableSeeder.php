<?php

use Illuminate\Database\Seeder;
use App\Ciudad;

class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudad=new Ciudad();
        $ciudad->ciudad='Aguscalientes';
        $ciudad->idEstado=1;
        $ciudad->save();

        $ciudad=new Ciudad();
        $ciudad->ciudad='Ensenada';
        $ciudad->idEstado=2;
        $ciudad->save();

        $ciudad=new Ciudad();
        $ciudad->ciudad='La Paz';
        $ciudad->idEstado=3;
        $ciudad->save();
    }
}
