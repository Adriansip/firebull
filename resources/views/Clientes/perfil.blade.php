@extends('layouts.app')
@section('content')
<div class="card">
    <h5 class="card-header">Mi perfil</h5>
    <div class="card-body">
        <h5 class="card-title">Datos de inicio de sesion</h5>
        <div class="row text-center">
            <input type="hidden" class="form-control text-center" name="idUsuario" value="{{Auth::user()->id}}">
            <div class="form-group col-md-6 col-12">
                <label for="Usuario">Nombre</label>
                <input type="text" class="form-control text-center" name="" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="Correo">Correo</label>
                <input type="text" class="form-control text-center" name="correo" value="{{Auth::user()->email}}" disabled>
            </div>
            <div class="form-group col-md-6 col-12">
                <label for="fecha">Fecha de registro</label>
                <input type="text" class="form-control" name="registro" value="
                <?php
                   setlocale(LC_ALL,'es_ES','esp');
                      echo $fecha = strftime('%d de %B de %Y - %T ',strtotime(Auth::user()->created_at));
                         ?>" disabled>
            </div>
            <div class="form-group col-md-6 col-12">
                <button type="button" class="mt-4 btn btn-md btn-success " name="button">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<!-- CLIENTE -->

<div class="card mt-5">
    <h5 class="card-header">Cliente frecuente</h5>
    <div class="card-body">
        <div class="row" id="messageCliente" tabindex="0">
        </div>
        <form id="frmCliente">
            <div class="row text-center">
                <div class="col-md-6 col-12">
                    <label for="">Logotipo de la empresa</label>
                    <div class="img-fluid col-10 text-center">
                        <img src="{{asset('imagenes/no disponible.png')}}" alt="no disponible" id="imgCliente" class="img-fluid" width="60%">
                    </div>
                    <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" id="imagen" name="imagen" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                        <small class="email-help">Maximo 3 Mb</small>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="nombre">Nombre de la empresa u organizacion <span style="color:red;">*</span></label>
                            <input type="text" name="nombre" value="" class="form-control" required maxlength="100">
                            <div class="invalid-feedback">Campo requerido</div>
                        </div>
                        <div class="form-group col-12">
                            <label for="nombre">RFC</label>
                            <input type="text" name="rfc" value="" class="form-control" maxlength="13">
                        </div>
                        <div class="form-group col-12">
                            <label for="email">Email </label>
                            <input type="email" name="email" value="" class="form-control" maxlength="100">
                        </div>
                        <div class="form-group col-12">
                            <label for="telefono">Telefono de contacto</label>
                            <input type="tel" name="telefono" value="" class="form-control" maxlength="100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 text-center">
                <div class="form-group col-md-3 col-12">
                    <label for="estado">Estado</label>
                    <select class="form-control" name="estado" id="estado">

                    </select>
                </div>
                <div class="form-group col-md-3 col-12">
                    <label for="ciudad">Ciudad</label>
                    <select class="form-control" name="ciudad" id="ciudad">

                    </select>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="direccion">Direccion</label>
                    <textarea name="direccion" class="form-control" rows="1"></textarea>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="url">Pagina o sitio web</label>
                    <input type="text" name="url" class="form-control">
                </div>
                <div class="form-group col-md-6 col-12">
                    <button type="submit" class="mt-4 btn btn-lg btn-block btn-success" name="button">Asignar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/perfil.js')}}">
</script>
@endsection