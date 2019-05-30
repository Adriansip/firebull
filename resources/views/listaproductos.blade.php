<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>FireBull (New Productos)</title>        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Boostrap -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     

         <!-- Mi  CSS -->
         <link rel="stylesheet" href="{{asset('css/listaproductos.css')}}">
    

    </head>
    <body>                     
        @include('navbar')               
        <hr>
        <br>
        <div class="container">          
        <hr>              
            <div class="table-responsive-md">
                <table class="table table-striped table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id producto</th>
                            <th scope="col">Nombre del producto</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Ruta imagen</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>                    
                            @foreach($productos as $producto)
                            <tr>
                                <th scope="row">{{$producto->idProducto}}</th>
                                <td>{{$producto->producto}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->rutaImagen}}</td>
                                <td><a href="#ventana" data-toggle="modal"><img src="{{asset('imagenes/editar.png')}}" alt="Editar" value="{{$producto->idProducto}}"></a></td><td><a href=""><img src="{{asset('imagenes/eliminar.png')}}" alt="Eliminar" value="{{$producto->idProducto}}"></a></td>                              
                                </tr>
                            @endforeach 
                            
                                              
                    </tbody>                    
                </table>            
            </div>
             {!!$productos->render()!!}           

    <!--Ventana Modal -->
             <div class="modal fade" id="ventana">
                 <div class="modal-dialog">
                     <div class="modal-content">
                        
                        <!-- HEADER -->
                         <div class="modal-header">                            
                             <h2 class="modal-title">Nombre del producto</h2>
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         </div>

                        <!-- BODY -->
                        <div class="modal-body">
                            <p>Contenido</p>
                        </div>

                        <!-- FOOTER -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">Agregar</button>
                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cerrar</button>
                        </div>

                     </div>
                 </div>
             </div>

        </div>

        <!--JQuery-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
        <script src="{{asset('js/productos.js')}}"></script>      
    </body>
</html>