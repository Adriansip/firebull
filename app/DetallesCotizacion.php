<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallesCotizacion extends Model
{
  protected $table = 'detalles_cotizacion';

  protected $fillable = ['idCotizacion','cantidad','idProducto'];

  protected $primaryKey = 'idDetalle';

  public function cotizacion()
  {
    return $this->belongsTo(Cotizacion::class,'idCotizacion');
  }

  public function productos()
  {
    return $this->hasMany(Producto::class,'idProducto');
  }  
}
