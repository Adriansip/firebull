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
                <tr class="table-danger text-center">
                    @else
                <tr class="text-center">
                    @endif
                    <td>{{$cotizacion->idCotizacion}}</td>
                    <td>{{$cotizacion->usuario->name}}</td>
                    <td>{{$cotizacion->noArticulos}}</td>
                    <td>
                        <?php
			                     setlocale(LC_ALL,"es_ES","esp");
			                        echo $fecha = strftime( "%d de %B de %Y - %T ",strtotime($cotizacion->created_at) );
			                           ?> </td>
                    <td>
                        @if($cotizacion->atendido==0)
                            <button data-toggle="modal" data-target="#modalCotizacion" class="atender btn btn-sm btn-success" value="{{$cotizacion->idCotizacion}}" onclick="detallesCotizacion($(this),true)">Atender</button>
                            @else
                            <button data-toggle="modal" data-target="#modalCotizacion" class="ver btn btn-sm btn-info" value={{$cotizacion->idCotizacion}} onclick="detallesCotizacion($(this))">Ver info</button>
                            @endif
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    {{$cotizaciones->links()}}
    @include('Cotizaciones.modalCotizacion')
    <script type="text/javascript" src="{{asset('js/cotizaciones.js')}}">
    </script>