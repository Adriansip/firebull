<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table='roles';

    protected $fillable=['rol'];

    protected $primaryKet='idRol';

    public function usuarios()
    {
      return $this->belongsTo(User::class,'idRol');
    }
}
