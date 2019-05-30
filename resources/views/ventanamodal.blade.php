

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>FireBull (Productos)</title>        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Boostrap -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     

         <!-- Mi  CSS-->    
         <link rel="stylesheet" href="{{asset('css/productos/ventanamodal.css')}}">
    

    </head>
    <body>                       
        <div class="container">
            <div class="ventana">                               
                    <div class="form">
                        <a href=# id="cerrar">X Cerrar</a>
                            
                        <h1 id="titulo">Ventana modal</h1>   
                        <hr>                     
                        <img id="imagen" src="{{asset('imagenes/extintor.png')}}">
                        <p id="descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quo nesciunt quasi est, nostrum veritatis ex perferendis, vero alias, voluptatibus facilis blanditiis mollitia. Id perferendis consectetur, voluptas neque voluptate rerum.


                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, ipsam iste. Eum suscipit, porro nesciunt sint officia exercitationem libero tempore velit placeat, nobis eaque. Doloremque ipsa, eaque harum architecto voluptatem!</p>
                    </div>
            </div>                                    
        </div>
        <h1>lao</h1>
        <!--JQuery-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
<!--        <script src="{{asset('js/productos.js')}}"></script>-->

    </body>
</html>