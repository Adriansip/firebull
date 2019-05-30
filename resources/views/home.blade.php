@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de control</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}                            
                        </div>
                    @endif            
                    <div class="secciones">
                        <div id="productos">
                            <a href="{{url('/createp')}}"><img src="{{asset('imagenes/icono productos.png')}}" alt="" class="imagen"></a>
                            <p class="opcion">Administrar Productos</p>
                        </div>           
                        <div id="clientes">
                            <img src="{{asset('imagenes/icono clientes.png')}}" alt="" class="imagen">
                            <p class="opcion">Administrar Clientes</p>
                        </div>
                        <div id="cursos">
                            <img src="{{asset('imagenes/icono cursos.png')}}" alt="" class="imagen">
                            <p class="opcion">Administrar Cursos</p>
                        </div>
                    </div>                    
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
