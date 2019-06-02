var route = "/cotizaciones";
var idCotizacion;
$(document).ready(function() {
    cargarTabla(1, route);
    $('.footer').css('display', 'none');
});

$(document).on('click', '.pagination a', function(e) {
    //console.log('click');
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    cargarTabla(page, route);
});

function atender() {
    //Validar datos
    procesarCotizacion();
}

function detallesCotizacion(boton) {
    //console.log(boton[0]);
    idCotizacion = boton[0].value;
    var html = '';
    $.get('/detalles/' + idCotizacion, function(response) {
        //console.log(response);
        response.forEach(function(item, index) {
            html += '<tr class="text-center fila">';
            html += '<td>' + (index + 1) + '</td>';
            html += '<td class="cantidad">' + item.cantidad + '</td>';
            html += '<td class="ids">' + item.idProducto + '</td>';
            html += '<td>' + item.producto.producto + '</td>';
            html += '<td>';
            //            html += '<div class="form-control">';
            html += '<input type="number" step="any" class="form-control text-center precio" onChange="calcularTotal($(this),' + item.cantidad + ')" onkeyup="calcularTotal($(this),' + item.cantidad + ')" value="0">';
            html += '<div class="invalid-feedback">Inserta un numero valido</div>';
            //          html += '</div>';
            html += '</td>';
            html += '<td><input type="number" class="form-control text-center total" value="0"></td>';
            html += '</tr>';
        });
        $('#modalTable tbody').html(html);
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

function cargarTabla(page, route) {
    $.ajax({
        url: route + '?page=' + page,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#tblContainer').html(response);
            //  console.log(response);
        },
        error: function(response) {
            console.log('error');
            console.log(response);
        }
    });
}

function getData() {
    var cotizaciones = [];
    var cantidades = $('.fila .cantidad');
    //console.log(cantidades);
    var ids = $('.fila .ids');
    //console.log(ids);
    var precios = $('.fila .precio');
    //console.log(precios);
    var totales = $('.fila .total');
    //console.log(totales);

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

function procesarCotizacion() {
    var data = getData();
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
                console.log(response);
            },
            error: function(response) {
                console.log(response.responseJSON);
            }
        });
    }
}