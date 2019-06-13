@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-3 col-12 mb-2">
        <div style="border: 1px solid gray;" class="p-2">
            <p class="h3">Buscar mis cotizaciones</p>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="form-group">
                        <label for="noCotizacion">Numero de cotizacion</label>
                        <input type="text" class="form-control" name="noCotizacion" value="" maxlength="10" placeholder="NCOT-#">
                        <div class="invalid-feedback">El numero de cotizacion es incorrecto</div>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="form-group">
                        <label for="noCotizacion">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="" maxlength="10">
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <button type="button" class="btn btn-block btn-lg btn-success" name="button" id="btnBuscar">Buscar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-12">
        <div style="border: 1px solid gray;" class="p-2">
            <p class="h2 text-center col-12">Mis Cotizaciones</p>
            <div id="cotizaciones">
                @foreach(Auth::user()->cotizaciones as $cotizacion)
                <p class="h5 col-lg-12">Fecha de solicitud: {{$cotizacion->created_at}}</p>
                <div class="alert alert-{{$cotizacion->atendido?'success':'danger'}}">
                    <div class="row">
                        <p class="h5 col-lg-4 col-4">NCOT-{{$cotizacion->idCotizacion}}</p>
                        <p class="h5 col-lg-4 col-4">Articulos: {{$cotizacion->noArticulos}}</p>
                        <p class="h5 col-lg-4 col-4">Estatus: {{$cotizacion->atendido?'Atendido':'En espera de atencion'}}</p>
                        @if($cotizacion->atendido)
                        <p class="h5 col-lg-4 col-12">Subtotal: {{$cotizacion->subtotal}}</p>
                        <p class="h5 col-lg-4 col-12">IVA: {{$cotizacion->iva}}</p>
                        <p class="h5 col-lg-4 col-12">Total: {{$cotizacion->total}}</p>
                        @endif
                    </div>
                </div>
                <div class="row alert">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Precio U.</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                @foreach($cotizacion->detalles as $detalle)
                                <tr class="text-center">
                                    <td>{{$detalle->cantidad}}</td>
                                    <td>{{$detalle->producto->producto}}</td>
                                    <td>{{$detalle->precioUnitario}}</td>
                                    <td>{{$detalle->total}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/misCotizaciones.js')}}">
</script>
@endsection