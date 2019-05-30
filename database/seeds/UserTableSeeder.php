<?php

use Illuminate\Database\Seeder;
use App\Rol;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $rolAdmin   = Rol::where('rol', 'admin')->first();
      $rolCliente = Rol::where('rol', 'cliente')->first();

      $user           = new User();
      $user->name     = 'Adrian';
      $user->email    = 'adrian.cruz.islas@gmail.com';
      $user->password = bcrypt('a8795%()');
      $user->idRol    = $rolAdmin->idRol;
      $user->save();

      $user           = new User();
      $user->name     = 'Cliente';
      $user->email    = 'cliente@gmail.com';
      $user->password = bcrypt('12345678');
      $user->idRol    = $rolCliente->idRol;
      $user->save();
    }
}
