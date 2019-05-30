@extends('layouts.app') @section('styles')
<link rel="stylesheet" href="{{asset('css/nosotros/nosotros.css')}}">
@endsection @section('content')
<div class="row">
    <div class="contenido">
        <p class="toogle">Nosotros
            <img class="img-res verdescripcion" src="{{asset('imagenes/next.png')}}" align="left" alt="Bajar" value="0"></p>
        <div id="descripcion0">
            Nos ponemos a sus apreciables órdenes con el fin de poder brindarles nuestros servicios con la calidad y eficacia requerida, en el momento que ustedes lo requieran. Nos es grato presentarnos ante ustedes como una empresa especializada en distribución
            y mantenimiento de equipo contra incendio. Contamos con personal altamente capacitado en seguridad industrial, lo que nos permite brindar a nuestros clientes un servicio integral de acuerdo a sus necesidades. Nuestra empresa cubre las áreas de venta
            y distribución.
            <ul>
                <li>1) Equipo Contra Incendio, Gabinetes, Recarga y Mantenimiento de Extintores</li>
                <li>2) Señalización Normalizada</li>
                <li>3) Equipo de Protección Personal</li>
                <li>4) Cursos</li>
                <li>5) Programa Interno</li>
            </ul>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="contenido">
        <p class="toogle">Mision
            <img class="img-res verdescripcion" src="{{asset('imagenes/bajar.png')}}" align="left" alt="Bajar" value="1"></p>
        <div id="descripcion1">
            Mejorar la calidad y precio para formar parte esencial de las empresas en las que colaboramos y ser competitivas, con un sólido compromiso social hacia nuestros clientes, así como a necesidades del desarrollo económico.
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="contenido">
        <p class="toogle">Vision
            <img class="img-res verdescripcion" src="{{asset('imagenes/bajar.png')}}" align="left" alt="Bajar" value="2"></p>
        <div id="descripcion2">
            Ser una empresa líder en el abastecimiento de agua potable con un modelo flexible e innovador en las entregas para un amplio reconocimiento social y empresarial.
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="contenido">
        <p class="toogle">Objetivo
            <img class="img-res verdescripcion" src="{{asset('imagenes/bajar.png')}}" align="left" alt="Bajar" value="3"></p>
        <div id="descripcion3">
            Ampliar las oportunidades y atender la demanda del suministro de agua potable, bajo criterios y estándares de calidad para brindar atención especializada a las empresas que por diversas razones no tienen acceso total al servició de agua potable.
        </div>
    </div>
</div>
@endsection @section('scripts')
<!--Jquery -->
<script src="{{asset('js/nosotros.js')}}"></script>
@endsection