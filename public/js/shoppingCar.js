var productos = [];

$(document).ready(function() {});

$('#btnCotizar').click(function() {
    getDataProducts();
});

$('input[name=cantidad]').keyup(function() {
    var valor = parseInt($(this).val());
    if (valor <= 0 || valor > 1000) {
        $(this).addClass('is-invalid');
        $(this).focus();
        $(this).val(1);
    } else {
        $(this).removeClass('is-invalid');
    }
});

function getDataProducts() {
    productos = [];
    $('.dataProduct').each(function(index, item) {
        var hijos = $(this).children();
        //Input para el idProducto
        var idProducto = hijos[0].value;
        //Input para la cantidad de ese producto
        var cantidad = hijos[2].value;

        var producto = {
            'idProducto': idProducto,
            'cantidad': cantidad
        }
        productos.push(producto);
    });
    sendCotizacion();
}

function sendCotizacion() {
    var data = JSON.stringify(productos);
    //console.log(data);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/saveCotizacion',
        type: 'POST',
        contentType: 'application/json',
        data: data,
        dataType: 'json',
        success: function(response) {
            console.log(response);
            var html = '<div class="alert alert-' + response.status + ' col-lg-12">' + response.message + '</div>"';
            $('#message').html(html).focus();

        },
        error: function(response) {
            console.log(response);
            var html = '<div class="alert alert-' + response.status + ' col-lg-12">' + response.message + '</div>"';
            $('#message').html(html);
        }
    });
}