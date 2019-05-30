<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $table='categorias';

  protected $fillable=['categoria'];

  protected $primaryKey='idCategoria';

  public function productos()
  {
    return $this->hasMany(Producto::class,'idCategoria');
  }
}
