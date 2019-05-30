<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table='productos';

  protected $fillable=['producto','idCategoria','descripcion','imagen'];

  protected $primaryKey='idProducto';

  public function categoria()
  {
    return $this->belongsTo(Categoria::class,'idCategoria');
  }
}
