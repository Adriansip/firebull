@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/clientes.css')}}">
@endsection
@section('banner')
<div class="row">
    <div class="col-lg-12">
        <div class="img-responsive">
            <img src="{{asset('imagenes/clientes.png')}}" alt="clientes" class="img-fluid" width="100%">
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <h1 class="text-center col-12" style="color: #FFF;">
        PRINCIPALES CLIENTES Y COLABORADORES
    </h1>
</div>
<div class="row">
    @if(count($clientes)>=2)
        @for($i=0; $i
        <2; $i++) @if($i==0)<div class="alert img-responsive col-md-3 offset-md-3">
        @else
        <div class="alert img-responsive col-md-3">
            @endif
            <div class="titulo text-center">{{$clientes[$i]->nombre}}</div>
            <img src="{{asset('imagenes/')}}/{{$clientes[$i]->imagen}}" class="img-fluid p-1 img-clientes" alt="">
            <div class="datosContacto text-center">{{$clientes[$i]->direccion}} ({{$clientes[$i]->ciudad->ciudad}}, {{$clientes[$i]->ciudad->estado->estado}})</div>
        </div>
        @endfor
        @endif
</div>
<div class="row">
    @if(count($clientes)>=4)
        @for($i=0; $i<4; $i++) <div class="alert img-responsive col-md-3">
            <div class="titulo text-center">{{$clientes[$i]->nombre}}</div>
            <img src="{{asset('imagenes/')}}/{{$clientes[$i]->imagen}}" class="img-fluid p-1 img-clientes" alt="">
            <div class="datosContacto text-center">{{$clientes[$i]->direccion}} ({{$clientes[$i]->ciudad->ciudad}}, {{$clientes[$i]->ciudad->estado->estado}})</div>
</div>
@endfor
@endif
</div>
{{$clientes->links()}}
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/clientes.js')}}">
</script>
@endsection