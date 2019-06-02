<!-- Modal -->
<div class="modal fade" id="modalCotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Atender cotizacion: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <div id="message">

                </div>
                <table class="table table-sm table-striped" id="modalTable">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No. articulos</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">idProducto</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio Uni.</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="atender()">Atender</button>
            </div>
        </div>
    </div>
</div>