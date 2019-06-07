<table class="table table-sm table-striped" id="tblProductos">
    <thead>
        <tr class="text-center">
            <th>Id</th>
            <th>Producto</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr class="text-center">
            <td>{{$producto->idProducto}}</td>
            <!--<td>
                <div class="img-responsive col-12">
                    <img src="{{asset('imagenes/')}}/{{$producto->imagen}}" alt="{{$producto->imagen}}" class="img-fluid" width="50px">
                </div>
            </td>-->
            <td>{{$producto->producto}}</td>
            <td>{{$producto->categoria->categoria}}</td>
            <td>
                <button data-toggle="modal" data-target="#modalProducto" class="btn btn-sm btn-info editar" value="{{$producto->idProducto}}"><i class="small material-icons">create</i></button>
                <button class="btn btn-sm btn-danger eliminar" value="{{$producto->idProducto}}"><i class="small material-icons">delete</i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$productos->links()}}
@include('Productos.modalProducto')
<script type="text/javascript" src="{{asset('js/crearProducto.js')}}">

</script>