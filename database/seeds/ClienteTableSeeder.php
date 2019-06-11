<?php

use Illuminate\Database\Seeder;
use App\Cliente;
use App\Ciudad;
use App\User;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ciudad=Ciudad::find(6);
        $user=User::find(3);

        $cliente=new Cliente();
        $cliente->nombre='Cliente 1';
        $cliente->email='cliente1@gmail.com';
        $cliente->telefono='5587778403';
        $cliente->idUsuario=$user->id;
        $cliente->idCiudad=4;
        $cliente->direccion='5 de mayo #31';
        $cliente->RFC='ADR080795D03';
        $cliente->logo='fire.png';
        $cliente->url='www.google.com';
        $cliente->save();

        $cliente=new Cliente();
        $cliente->nombre='Cliente 2';
        $cliente->email='cliente2@gmail.com';
        $cliente->telefono='5587778403';
        $cliente->idUsuario=$user->id;
        $cliente->idCiudad=2;
        $cliente->direccion='5 de mayo #31';
        $cliente->RFC='ADR080795D03';
        $cliente->logo='fire.png';
        $cliente->url='www.youtube.com';
        $cliente->save();

        $cliente=new Cliente();
        $cliente->nombre='Cliente 3';
        $cliente->email='cliente3@gmail.com';
        $cliente->telefono='5587778403';
        $cliente->idUsuario=$user->id;
        $cliente->idCiudad=$ciudad->idCiudad;
        $cliente->direccion='5 de mayo #31';
        $cliente->RFC='ADR080795D03';
        $cliente->logo='fire.png';
        $cliente->url='www.yahoo.com';
        $cliente->save();

        $cliente=new Cliente();
        $cliente->nombre='Cliente 4';
        $cliente->email='cliente4@gmail.com';
        $cliente->telefono='5587778403';
        $cliente->idUsuario=$user->id;
        $cliente->idCiudad=$ciudad->idCiudad;
        $cliente->direccion='5 de mayo #31';
        $cliente->RFC='ADR080795D03';
        $cliente->logo='fire.png';
        $cliente->url='www.google.com';
        $cliente->save();

        $cliente=new Cliente();
        $cliente->nombre='Cliente 5';
        $cliente->email='cliente5@gmail.com';
        $cliente->telefono='5587778403';
        $cliente->idUsuario=$user->id;
        $cliente->idCiudad=$ciudad->idCiudad;
        $cliente->direccion='5 de mayo #31';
        $cliente->RFC='ADR080795D03';
        $cliente->logo='fire.png';
        $cliente->url='www.youtube.com';
        $cliente->save();

        $cliente=new Cliente();
        $cliente->nombre='Cliente 6';
        $cliente->email='cliente6@gmail.com';
        $cliente->telefono='5587778403';
        $cliente->idUsuario=$user->id;
        $cliente->idCiudad=$ciudad->idCiudad;
        $cliente->direccion='5 de mayo #31';
        $cliente->RFC='ADR080795D03';
        $cliente->logo='fire.png';
        $cliente->url='www.yahoo.com';
        $cliente->save();

        $cliente=new Cliente();
        $cliente->nombre='Cliente 7';
        $cliente->email='cliente7@gmail.com';
        $cliente->telefono='5587778403';
        $cliente->idUsuario=$user->id;
        $cliente->idCiudad=$ciudad->idCiudad;
        $cliente->direccion='5 de mayo #31';
        $cliente->RFC='ADR080795D03';
        $cliente->logo='fire.png';
        $cliente->url='www.google.com';
        $cliente->save();

        $cliente=new Cliente();
        $cliente->nombre='Cliente 8';
        $cliente->email='cliente8@gmail.com';
        $cliente->telefono='5587778403';
        $cliente->idUsuario=$user->id;
        $cliente->idCiudad=$ciudad->idCiudad;
        $cliente->direccion='5 de mayo #31';
        $cliente->RFC='ADR080795D03';
        $cliente->logo='fire.png';
        $cliente->url='www.youtube.com';
        $cliente->save();
    }
}
