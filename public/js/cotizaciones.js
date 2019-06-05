var idCotizacion;

$(document).ready(function() {
    option = 'cotizaciones';
    route = '/cotizaciones';
});

function atender() {
    procesarCotizacion();
}
/*Funcion para ver los detalles de la cotizacion,
ya sea para atenderlo o solo ver informacion, depende
del estatus de atendido*/
function detallesCotizacion(boton, isAtender) {
    //console.log(boton[0]);
    idCotizacion = boton[0].value;
    var html = '';
    $.get('/detalles/' + idCotizacion, function(response) {
        //  console.log(response);
        response.forEach(function(item, index) {
            html += '<tr class="text-center fila">';
            html += '<td>' + (index + 1) + '</td>';
            html += '<td class="cantidad">' + item.cantidad + '</td>';
            html += '<td class="ids">' + item.idProducto + '</td>';
            html += '<td>' + item.producto.producto + '</td>';
            if (isAtender) {
                html += '<td>';
                //            html += '<div class="form-control">';
                html += '<input type="number" step="any" class="form-control text-center precio" onChange="calcularTotal($(this),' + item.cantidad + ')" onkeyup="calcularTotal($(this),' + item.cantidad + ')" value="0">';
                html += '<div class="invalid-feedback">Inserta un numero valido</div>';
                //          html += '</div>';
                html += '</td>';
                html += '<td><input type="number" class="form-control text-center total" value="0" disabled></td>';
            } else {
                html += '<td>$ ' + item.precioUnitario + '</td>';
                html += '<td>$ ' + item.total + '</td>';
            }
            html += '</tr>';
        });
        $('#modalTable tbody').html(html);
        if (!isAtender) {
            getCotizacion(idCotizacion);
        }
    });
}

/*Traer el registro de la cotizacion*/
function getCotizacion(idCotizacion) {
    $.get(route + "/" + idCotizacion, function(response) {
        //console.log(response);
        var html = '<tr class="text-center">';
        html += '<td colspan="5">Subtotal</td>';
        html += '<td>$ ' + response.cotizacion.subtotal + '</td>';
        html += '</tr>';

        html += '<tr class="text-center">';
        html += '<td colspan="5">IVA</td>';
        html += '<td>' + response.cotizacion.iva + ' %</td>';
        html += '</tr>';

        html += '<tr class="text-center">';
        html += '<td colspan="5">Total</td>';
        html += '<td>$ ' + response.cotizacion.total + '</td>';
        html += '</tr>';
        $('#modalTable tbody').append(html);
    });
}

function calcularTotal(input, cantidad) {
    var value = parseFloat(input.val());
    var txtTotal = input.parent('td').parent('tr').children()[5].children[0];
    if ($.isNumeric(value) && value > 0) {
        txtTotal.value = value * cantidad;
        input.removeClass('is-invalid');
    } else {
        input.addClass('is-invalid');
        txtTotal.value = '0';
    }
}

/*Extraer cada fila del modal, para llenar el JSON,
y enviarlo por ajax al controlador*/
function getData() {
    var cotizaciones = [];
    var cantidades = $('.fila .cantidad');
    var ids = $('.fila .ids');
    var precios = $('.fila .precio');
    var totales = $('.fila .total');

    for (var i = 0; i < cantidades.length; i++) {
        var cantidad = parseFloat(cantidades[i].textContent);
        var id = parseFloat(ids[i].textContent);
        var precio = parseFloat(precios[i].value);
        var total = parseFloat(totales[i].value);
        if (validarDatos(cantidad, id, precio, total)) {
            var articulo = {
                'cantidad': cantidad,
                'idProducto': id,
                'precioUnitario': precio,
                'total': total
            };
            cotizaciones.push(articulo);
        } else {
            cotizaciones = [];
            return null;
        }
    }
    var cotizacion = {
        'idCotizacion': idCotizacion
    };
    cotizaciones.push(cotizacion);
    return JSON.stringify(cotizaciones);
}

/*Validar que todos los campos, esten llenos*/
function validarDatos(cantidad, id, precio, total) {
    if (cantidad > 0 && id > 0 && precio > 0 && total > 0) {
        return true;
    } else {
        html = '<div class="alert alert-warning" col-12 alert-dismissable">';
        html += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        html += 'Por favor asegurate de llenar todos los campos correctamente</div>';
        $('#message').html(html);
        return false;
    }
}

/*Hacer todo el proceso para realizar la cotizacion, incluyendo
la actualizacion de los resultados (precios, totales)
asi como el estatus de la cotizacion (atendido=1)
tambien se envia el correo electronico*/
function procesarCotizacion() {
    var data = getData();
    $('#messageHome').html('<div class="alert alert-warning col-12">Procesando solicitud, espere...</div>').focus();
    if (data != null) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/detalles',
            type: 'POST',
            data: data,
            contentType: 'application/json',
            dataType: 'json',
            success: function(response) {
                //console.log(response);
                var html = '<div class="alert alert-' + response.estatus + ' col-12">';
                html += response.message + '</div>';
                $('#messageHome').html(html).focus();
                cargarTabla(1, route);
            },
            error: function(response) {
                console.log(response.responseJSON);
            }
        });
    }
}