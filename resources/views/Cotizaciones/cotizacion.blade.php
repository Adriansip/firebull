    <table class="table table-sm" id="tblCotizaciones">
        <thead>
            <tr class="text-center">
                <th scope="col">idCotizacion</th>
                <th scope="col">Cliente</th>
                <th scope="col"># articulos</th>
                <th scope="col">Fecha</th>
                <th scope="col">Atender</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cotizaciones as $cotizacion)
            @if($cotizacion->atendido==0)
                <tr class="table-danger">
                    @else
                <tr>
                    @endif
                    <td>{{$cotizacion->idCotizacion}}</td>
                    <td>{{$cotizacion->usuario->name}}</td>
                    <td>{{$cotizacion->noArticulos}}</td>
                    <td>{{$cotizacion->created_at}}</td>
                    <td>
                        @if($cotizacion->atendido==0)
                            <button data-toggle="modal" data-target="#modalCotizacion" class="atender btn btn-sm btn-success" value="{{$cotizacion->idCotizacion}}" onclick="detallesCotizacion($(this))">Atender</button>
                            @else
                            <button data-toggle="modal" data-target="#modalCotizacion" class="ver btn btn-sm btn-info" value={{$cotizacion->idCotizacion}}>Ver info</button>
                            @endif
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {{$cotizaciones->links()}}
    @include('Cotizaciones.modalCotizacion')