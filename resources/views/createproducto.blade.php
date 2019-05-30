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

         <!-- Mi  CSS
         <link rel="stylesheet" href="{{asset('css/productos/productos.css')}}"> -->


    </head>
    <body>
        @include('navbar')
        <hr>
        <br>
        <div class="container">
        <hr>
             <form action="/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Producto">Nombre del producto</label>
                    <input type="text" class="form-control" placeholder="Nombre del producto" name="producto">
                    <label for="Descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion"> </textarea>
                   <label for="Imagen">Imagen</label>
                    <input type="file" class="form-control" name="imagen">
                    <br>
                    <input type="submit" value="Agregar" class="btn btn-success btn-block" >
                </div>

             </form>
        @if(Session::has('message'))
            <div class="alert alert-{{Session::get('class')}}">{{Session::get('message')}}</div>
        @endif

        </div>

        <!--JQuery-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <script src="{{asset('js/productos.js')}}"></script>
    </body>
</html>
