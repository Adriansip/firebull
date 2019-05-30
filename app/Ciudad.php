<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
  protected $table = 'ciudades';

  protected $fillable = ['ciudad', 'idEstado'];

  protected $primaryKey = 'idCiudad';

  public function estado()
  {
      return $this->belongsTo(Estado::class, 'idEstado');
  }
}
