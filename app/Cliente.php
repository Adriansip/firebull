<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $table = 'clientes';

  protected $fillable = ['nombre', 'email', 'telefono', 'idUsuario', 'idCiudad', 'direccion', 'RFC',
  'logo','imagen'];

  protected $primaryKey = 'idCliente';

  public function usuario()
  {
      return $this->belongsTo(User::class, 'idUsuario', 'id');
  }

  public function ciudad()
  {
      return $this->belongsTo(Ciudad::class, 'idCiudad');
  }
}
