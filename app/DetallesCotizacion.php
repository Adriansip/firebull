<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallesCotizacion extends Model
{
    protected $table = 'detalles_cotizacion';

    protected $fillable = ['idCotizacion','cantidad','idProducto','precioUnitario','total'];

    protected $primaryKey = 'idDetalle';

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'idCotizacion');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
