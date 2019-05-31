<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = 'cotizaciones';

    protected $fillable = ['idCotizacion','idCliente','noArticulos'];

    protected $primaryKey = 'idCotizacion';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }
}
