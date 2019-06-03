<h1>Orden de cotizacion</h1>
<h2>Firebull - Resultado de la cotizacion para NCOT-{{$idCotizacion}} </h2>
<div class="table-responsive">
    <table class="table table-sm table-striped">
        <thead>
            <tr class="text-center">
                <th col="span">
                    <h2>Cantidad</h2>
                </th>
                <th col="span">
                    <h2>Producto</h2>
                </th>
                <th col="span">
                    <h2></h2>
                </th>
                <th col="span">
                    <h2>Precio Unitario</h2>
                </th>
                <th col="span">
                    <h2>Total</h2>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $detalle)
            <tr class="text-center">
                <td col="span">
                    <h3 class="text-center"> {{$detalle->cantidad}}</h3>
                </td>
                <td col="span">
                    <h3 class="text-center"> {{$detalle->producto->producto}}</h3>
                </td>
                <td col="span">
                    <h3 class="text-center">---------</h3>
                </td>
                <td col="span">
                    <h3 class="text-center"> {{$detalle->precioUnitario}}</h3>
                </td>
                <td col="span">
                    <h3 class="text-center"> {{$detalle->total}}</h3>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan=4>
                    <h3>Subtotal</h3>
                </td>
                <td>
                    <h2>$ {{$subtotal}}</h2>
                </td>
            </tr>
            <tr>
                <td colspan=4>
                    <h3>IVA</h3>
                </td>
                <td>
                    <h2>{{$iva}}%</h2>
                </td>
            </tr>
            <tr>
                <td colspan=4>
                    <h3>Total</h3>
                </td>
                <td>
                    <h2 style="color: red;">$ {{$total}}</h2>
                </td>
            </tr>
        </tbody>
    </table>
</div>