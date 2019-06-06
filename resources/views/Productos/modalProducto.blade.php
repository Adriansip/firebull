<!-- Modal -->
<div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="frmProductos" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloModalProducto"> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <div id="message">

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="img-fluid col-12 mb-2 text-center">
                                    <img src="{{asset('imagenes/no disponible.png')}}" alt="no disponible" id="imgProducto" class="img-fluid" width="60%">
                                </div>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imagen" name="imagen" lang="es">
                                        <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                                        <small class="email-help">Maximo 3 Mb</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="producto">Producto <span style="color:red;">*</span></label>
                                    <input type="text" name="producto" class="form-control" pattern="[a-zA-Z0-9ñ ]+" required maxlength="50" placeholder="Nombre del producto">
                                    <div class="invalid-feedback">Este campo es obligatorio y debe contener solo caracteres alfanumericos</div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="categoria">Categoria</label>
                                    <select name="categoria" id="categoria" class="form-control" required>

                                    </select>
                                    <div class="invalid-categoria"></div>
                                </div>
                                <div class="form-group col-12">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea name="descripcion" class="form-control" rows="3" cols="3" placeholder="Breve descripcion del producto"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnAgregar">Agregar</button>
                </div>
            </div>
        </form>
    </div>
</div>