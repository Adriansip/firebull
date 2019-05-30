<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
  protected $table = 'estados';

  protected $fillable = ['estado', 'abreviacion'];

  protected $primaryKey = 'idEstado';

  public function ciudades()
  {
      return $this->hasMany(Ciudad::class, 'idEstado');
  }
}
