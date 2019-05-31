<li class="nav-item">
    <a class="nav-link" href="{{url('/nosotros')}}">Nosotros</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('/productos')}}">Productos</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('/clientes')}}">Clientes</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('/cursos')}}">Cursos</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('/contacto')}}">Contacto</a>
</li>

<form class="form-inline my-2 my-lg-0 ml-5">
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar producto" aria-label="Search" id="txtfindProducto">
    <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btnFindProducto">Buscar</button>
</form>
@if(Auth::check())
<div class="img-responsive ml-4">
    <a href="{{url('/shoppingCar')}}">
        <img src="{{asset('imagenes/shoppingcar.png')}}" alt="Carrito" width="50px" class="img-fluid">
        <span class="badge badge-pill badge-warning" id="sizeCar">
            @if(\Session::has('carro'))
            {{count(\Session::get('carro'))}}
            @else 0
            @endif
        </span>
    </a>
</div>
@endif