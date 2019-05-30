@extends('layouts.app')
@section('styles')
<!-- Mi  CSS-->
<link rel="stylesheet" href="{{asset('css/contacto.css')}}">
@endsection
@section('content')
<div class="row mb-3" id="direccion">
    <div class="col-md-12 text-center">
        Calle Oro Mz. 4 LT. 2 Col. Lomas de San Carlos C.P. 55080 Ecatepec de Morelos, Estado de Mexico
    </div>
</div>
<div class="row">

    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7518.270972473138!2d-99.05823462735192!3d19.578695355751602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f054d3a9b151%3A0x4c22310847ccb940!2sLomas+de+San+Carlos%2C+Ecatepec+de+Morelos%2C+M%C3%A9x.!5e0!3m2!1ses!2smx!4v1541638713739"
      width="100%" height="300" frameborder="0" allowfullscreen></iframe>
</div>
<div class="row mt-3 p-3" id="contacto">
    <div class="col-md-2 offset-1">
        <div class="img-responsive text-center mb-2">
            <img src="{{asset('imagenes/phone.png')}}" alt="ejemplo" class="img-fluid" width="40%">
        </div>
        <div class="col-md-12">
            <p class="text-center">CEL</p>
            <p class="text-center"> 044-55-29-17-32-66</p>
        </div>
    </div>

    <div class="col-md-2">
        <div class="img-responsive text-center mb-2">
            <img src="{{asset('imagenes/cellphone.png')}}" alt="ejemplo" class="img-fluid" width="40%">
        </div>
        <div class="col-md-12">
            <p class="text-center">TEL</p>
            <p class="text-center"> 51-16-71-97</p>
        </div>
    </div>

    <div class="col-md-2">
        <div class="img-responsive text-center mb-2">
            <img src="{{asset('imagenes/nextel.png')}}" alt="ejemplo" class="img-fluid" width="40%">
        </div>
        <div class="col-md-12">
            <p class="text-center">NEXTEL</p>
            <p class="text-center"> 4614 8937</p>
        </div>
    </div>

    <div class="col-md-2">
        <div class="img-responsive text-center mb-2">
            <img src="{{asset('imagenes/id.png')}}" alt="ejemplo" class="img-fluid" width="40%">
        </div>
        <div class="col-md-12">
            <p class="text-center">ID</p>
            <p class="text-center"> 92*11*21963</p>
        </div>
    </div>

    <div class="col-md-2">
        <div class="img-responsive text-center mb-2">
            <img src="{{asset('imagenes/email.png')}}" alt="ejemplo" class="img-fluid" width="40%">
        </div>
        <div class="col-md-12">
            <p class="text-center">E-MAIL</p>
            <p class="text-center"> disfirebull
                @hotmail.com</p>
        </div>
    </div>




</div>
@endsection