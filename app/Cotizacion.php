<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DetallesCotizacion;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';

    protected $fillable = ['idCotizacion','idCliente','noArticulos','atendido','subtotal','iva','total'];

    protected $primaryKey = 'idCotizacion';

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idCliente', 'id');
    }

    public function detalles()
    {
        return $this->hasMany(DetallesCotizacion::class, 'idCotizacion');
    }
}
