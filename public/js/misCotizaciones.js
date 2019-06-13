var isNoCotizacion = true;
$(document).ready(function() {

});


/************ EVENTOS ************/
$('#btnBuscar').click(function() {
    var valor = '';
    if (isNoCotizacion) {
        valor = $('input[name=noCotizacion]').val();
        buscarCotizaciones(valor);
    } else {
        valor = $('input[name=fecha]').val();
        buscarCotizaciones(null, valor);
    }
});

$('input[name=noCotizacion]').keyup(function() {
    var valor = $(this).val();
    if (valor != '') {
        $('input[name=fecha]').attr('disabled', 'true');
        isNoCotizacion = true;
    } else {
        $('input[name=fecha]').removeAttr('disabled');
    }
});

$('input[name=fecha]').change(function() {
    var valor = $(this).val();
    if (valor != '') {
        $('input[name=noCotizacion]').attr('disabled', 'true');
        isNoCotizacion = false;
    } else {
        $('input[name=noCotizacion]').removeAttr('disabled');
    }
});

/************ FUNCIONES ************/
function buscarCotizaciones(noCotizacion, fecha) {
    if (isNoCotizacion) {
        var valor = noCotizacion.split('-');
        if (validarNoCotizacion(valor)) {
            buscarPorCotizacion(valor[1]);
            $('input[name=noCotizacion]').removeClass('is-invalid');
        } else {
            $('input[name=noCotizacion]').addClass('is-invalid');
        }
    } else {
        buscarPorFecha(fecha);
    }
}

function buscarPorCotizacion(idCotizacion) {
    $.ajax({
        url: '/mis_cotizaciones/' + idCotizacion,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            //console.log(response);
            buildCotizaciones(response.cotizacion);
        },
        error: function(response) {
            //console.log(response);
        }
    });
}

function buscarPorFecha(fecha) {
    $.ajax({
        url: '/mis_cotizaciones/0/' + fecha,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            //console.log(response);
            buildCotizaciones(response.cotizacion);
        },
        error: function(response) {
            //console.log(response);
        }
    });

}

function buildCotizaciones(data) {
    var html = '';
    data.forEach(function(item, index) {
        html += '<p class="h5 col-lg-12">Fecha de solicitud: ' + item.created_at + '</p>';
        var alert = item.atendido ? 'success' : 'danger';
        html += '<div class="alert alert-' + alert + '">';
        html += '<div class="row">';
        html += '<p class="h5 col-lg-4 col-4">NCOT-' + item.idCotizacion + '</p>';
        html += '<p class="h5 col-lg-4 col-4">Articulos: ' + item.noArticulos + '</p>';
        var estatus = item.atendido ? 'Atendido' : 'En espera de atencion';
        html += '<p class="h5 col-lg-4 col-4">Estatus: ' + estatus + '</p>';
        if (item.atendido == 1) {
            html += '<p class="h5 col-lg-4 col-12">Subtotal:' + item.subtotal + '</p>';
            html += '<p class="h5 col-lg-4 col-12">IVA: ' + item.iva + '</p>';
            html += '<p class="h5 col-lg-4 col-12">Total: ' + item.total + '</p>';
        }
        html += '</div>';
        html += '</div>';

        /*** TABLA ***/
        html += '<div class="row alert">';
        html += '<div class="table-responsive">';
        html += '<table class="table table-striped table-sm">';
        html += '<thead>';
        html += '<tr class="text-center">';
        html += '<th>Cantidad</th>';
        html += '<th>Producto</th>';
        html += '<th>Precio U.</th>';
        html += '<th>Total</th>';
        html += '</tr>';
        html += '</thead>';
        html += '<tbody>';
        item.detalles.forEach(function(detalle, index) {
            html += '<tr class="text-center">';
            html += '<td>' + detalle.cantidad + '</td>';
            html += '<td>' + detalle.producto.producto + '</td>';
            var precioUnitario = detalle.precioUnitario == null ? ' ' : detalle.precioUnitario;
            html += '<td>' + precioUnitario + '</td>';
            var total = detalle.total == null ? '' : detalle.total;
            html += '<td>' + total + '</td>';
            html += '</tr>';
        });
        html += '</tbody>';
        html += '</table>';
        html += '</div>';
        html += '</div>';
    });
    $('#cotizaciones').html(html);
}

function validarNoCotizacion(valor) {
    return valor[0] == 'NCOT' && $.isNumeric(valor[1]);
}