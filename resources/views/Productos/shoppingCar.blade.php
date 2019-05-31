@extends('layouts.app')
@section('content')
<div id="message" tabindex="0">

</div>
@if($productos!=null)
<div class="row">
    @for($i=0; $i<count($productos); $i++) <div class="col-12 col-lg-4 mb-3">
        <div class="col-12 col-lg-12 productos" style="border: 2px solid gray;" value="{{$i}}">
            <div class="alert alert-dismissable text-right" style="height:50px;">
                <a href="{{url('/deleteProducto/')}}/{{$i}}" class="btn btn-sm btn-danger" value="{{$i}}">&times;</a>
            </div>
            <div class="img-responsive">
                <img src="{{asset('imagenes/')}}/{{$productos[$i]->producto->imagen}}" class="img-fluid" width="100%" alt="">
            </div>
            <p class="h4 mt-4 text-center">{{$productos[$i]->producto->producto}}</p>
            <div class="form-group dataProduct">
                <input type="hidden" name="" value="{{$productos[$i]->idProducto}}">
                <label for="cantidad">Cantidad </label>
                <input type="number" name="cantidad" class="form-control text-center" min="1" max="1000" value="{{$productos[$i]->cantidad}}">
                <div class="invalid-feedback">Ingrese un dato valido entre 1 y 1000</div>
                <small>Cambie la cantidad solo si ya no va agregar mas productos.</small>
            </div>
        </div>
</div>
@endfor
</div>
<div class="row">
    <button type="button" name="button" id="btnCotizar" class="col-lg-12 btn btn-lg  btn-success">Realizar mi cotizacion</button>
</div>
<div class="row mt-3">
    <a href="{{url('/destroySession')}}" name="button" id="btnVaciar" class="col-lg-12 btn btn-lg btn-warning">Vaciar mi carrito</a>
</div>
@else
<div class="alert alert-info col-lg-12">
    No tienes elementos agregados
</div>
<style media="screen">
    .footer {
        display: none;
    }
</style>
@endif
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/shoppingCar.js')}}">

</script>
@endsection