@extends('layouts.app') @section('content')
@if($productos!=null)
<div class="row">
@for($i=0; $i<count($productos); $i++)
  <div class="col-12 col-lg-4 mb-3">
    <div class="col-12 col-lg-12" style="border: 2px solid gray;">
      <div class="alert alert-dismissable" style="height:50px">
        <a role="button" href="{{url('/deleteProducto/')}}/{{$i}}" class="btn btn-sm btn-danger" value="{{$i}}">&times;</a>
      </div>
      <div class="img-responsive">
        <img src="{{asset('imagenes/')}}/{{$productos[$i]->producto->imagen}}" class="img-fluid" width="100%" alt="">
      </div>
      <p class="h3 mt-4">{{$productos[$i]->producto->producto}}</p>
      <p class="h5 text-center">Cantidad: {{$productos[$i]->cantidad}}</p>
  </div>
  </div>
@endfor
</div>
@else
No hay
@endif
@endsection
