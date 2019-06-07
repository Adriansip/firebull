@extends('layouts.app')
@section('styles')
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('content')
<h1 class="text-center">Panel de administracion</h1>
<div class="row" id="messageHome" tabindex="0">

</div>
<div class="row">
    <div class="nav flex-column nav-pills col-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-cotizacion-tab" data-toggle="pill" href="#v-pills-cotizacion" role="tab" aria-controls="v-pills-cotizacion" aria-selected="true">Cotizaciones</a>
        <a class="nav-link" id="v-pills-producto-tab" data-toggle="pill" href="#v-pills-producto" role="tab" aria-controls="v-pills-producto" aria-selected="false">Productos</a>
        @if(Auth::check() && Auth::user()->rol->rol=='superadmin')
        <a class="nav-link" id="v-pills-usuario-tab" data-toggle="pill" href="#v-pills-usuario" role="tab" aria-controls="v-pills-usuario" aria-selected="false">Usuarios</a>
        @endif
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
    </div>
    <div class="tab-content col-10" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-cotizacion" role="tabpanel" aria-labelledby="v-pills-cotizacion-tab">
            <div class="table-responsive pl-5" id='tblContainer'>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-producto" role="tabpanel" aria-labelledby="v-pills-producto-tab">
            <div class="row mt-2 mb-2">
                <div class="col-12 ml-5 text-left">
                    <button data-toggle="modal" data-target="#modalProducto" class="btn btn-md btn-primary btn-block col-md-4 col-12" name="button" id="btnNuevo">Nuevo Producto</button>
                </div>
            </div>
            <div class="table-responsive pl-5" id='productosContainer'>

            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-usuario" role="tabpanel" aria-labelledby="v-pills-usuario-tab">
            <div class="table-responsive pl-5" id='usuariosContainer'>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{{asset('js/administracion.js')}}">

</script>
@endsection