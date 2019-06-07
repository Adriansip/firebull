<!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="frmUsuario" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModalUsuario"> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <div id="message">

                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12 form-group">
                            <label for="Nombre">Nombre del usuario</label>
                            <input type="text" name="name" class="form-control" value="" disabled>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12 form-group">
                            <label for="Email">Correo</label>
                            <input type="text" name="email" class="form-control" value="" disabled>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12 form-group">
                            <label for="Rol">Rol del usuario</label>
                            <select class="form-control" name="idRol">

                            </select>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12 form-group">
                            <label for="Registro">Fecha de registro</label>
                            <input type="text" name="created_at" class="form-control" value="" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnAgregar">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</div>