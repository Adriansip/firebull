@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{asset('css/productos/productos.css')}}">
@section('banner')
<div class="row">
    <div class="col-lg-12">
        @include('slider')
    </div>
</div>
@endsection
@section('content')
<div class="row" id="message" tabindex="0">

</div>
<div class="row alert" id="productos">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="consumibles-tab" data-toggle="tab" href="#consumibles" role="tab" aria-controls="consumibles" aria-selected="true" value="1">Consumibles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cabeza-tab" data-toggle="tab" href="#cabeza" role="tab" aria-controls="cabeza" value="2">
                Proteccion para la cabeza</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="manos-tab" data-toggle="tab" href="#manos" role="tab" aria-controls="manos" value="3">Proteccion para las manos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cintura-tab" data-toggle="tab" href="#cintura" role="tab" aria-controls="cintura" value="4">Proteccion para la cintura</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="ojos-tab" data-toggle="tab" href="#ojos" role="tab" aria-controls="ojos" value="5">Proteccion para la ojos</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="consumibles" role="tabpanel" aria-labelledby="consumibles-tab">
            <div class="row" id="contentProduct"></div>
            <div class="row" id="contentProductLogin"></div>

        </div>
    </div>
    <div class="tab-pane fade" id="cabeza" role="tabpanel" aria-labelledby="cabeza-tab"></div>
    <div class="tab-pane fade" id="manos" role="tabpanel" aria-labelledby="manos-tab"></div>
    <div class="tab-pane fade" id="cintura" role="tabpanel" aria-labelledby="cintura-tab"></div>
    <div class="tab-pane fade" id="ojos" role="tabpanel" aria-labelledby="ojos-tab"></div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/productos.js')}}"></script>
@endsection