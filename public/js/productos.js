$(document).ready(function() {
    getProductos(1);
});

$('a[data-toggle=tab]').on('click', function() {
    var idCategoria = $(this)[0].attributes.value.value;
    if (idCategoria != 0) {
        getProductos(idCategoria);
        $('#message').html('');
    }
});

$('#btnFindProducto').click(function() {
    var filtro = $('#txtfindProducto').val();
    $('#nav-item-find').css('display', 'block');
    $('#myTab li:last-child a').tab('show')
    findProductos(filtro);
});

function getProductos(idCategoria) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/productos/show/' + idCategoria,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            console.log("token");
            console.log($('meta[name="csrf-token"]').attr('content'));
            drawProductos(data.productos, data.session);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function findProductos(producto) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/productos/' + producto,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            //console.log(data);
            drawProductos(data.productos, data.session);
            showMessages(data);
        },
        error: function(data) {
            //console.log(data);
            drawProductos(data.responseJSON.productos, data.responseJSON.session);
            showMessages(data.responseJSON);
        }
    });
}

function drawProductos(data, session) {
    var html = "";
    if (data.length == 0) {
        html += "<h1 class='text-center text-title mt-3 pl-2'> No hay productos registrados </h1>";
        //console.log("sin registrados");
    }
    for (var i = 0; i < data.length; i++) {
        if (data.length < 2) {
            html += "<div class='alert col-12 col-lg-6 mb-1 mt-2 pl-2 pr-2'>";
        } else {
            html += "<div class='alert col-12 col-lg-4 mb-1 mt-2 pl-2 pr-2'>";
        }
        html += "<div class='col-12' style='border: 2px solid gray;'>"
        html += "<div class='alert col-12 text-title text-center font-weight-bold'>" + data[i].producto + "</div>";
        html += "<div class='alert img-responsive'>";
        html += "<img src='../../imagenes/" + data[i].imagen + "' width='400px' alt='imagen' class='img-fluid'>";
        html += "</div>";
        html += "<div class='alert pl-1 pr-1'>";
        html += "<div class='row pl-2 pr-2'>";
        if (session) {
            html += "<div class='form-group col-lg-12'>"
            html += "<input type='number' class='form-control cantidad text-center' name='cantidad' value='1' min='1' max='1000'>";
            html += "<div class='invalid-feedback' style='color: #fff;'>Ingrese un dato valido entre 1 y 1000</div>";
            html += "<button class='btn btn-lg btn-block btn-dark mt-2' value='" + data[i].idProducto + "' onclick='addShopping($(this))'>Agregar</button>";
            html += "</div>"
        } else {
            html += '<p class="text-center" style="color: white; font-size: 18px;">Inicia session o registrate para realizar el pedido de tu cotizacion</p>';
            html += '<a class="btn btn-info btn-lg btn-block mt-2 col-12 col-lg-10 offset-lg-1" href="/login">Loguearse</a>';
        }
        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";

    }
    $('#contentProduct').html(html);
}


function addShopping(boton) {
    var input = boton.siblings()[0];
    var idProducto = boton.val();

    var cantidad = parseInt(input.value);
    //console.log(cantidad);
    if (cantidad <= 0 || cantidad > 1000) {
        //  console.log(input);
        input.classList.add('is-invalid');
    } else {
        //console.log(valid);
        input.classList.remove('is-invalid');

        var productInformation = {
            'idProducto': idProducto,
            'cantidad': cantidad
        };

        var data = JSON.stringify(productInformation);
        //console.log(data);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/addProducto',
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: data,
            success: function(response) {
                console.log(response);
                showMessages(response);
                $('#sizeCar').text(response.cantidad);
            }
        });
    }
}

function showMessages(response) {
    html = '<div class="alert alert-' + response.estatus + ' col-12 alert-dismissable">';
    html += '<button type="button" class="close" data-dismiss="alert">&times;</button>' + response.message;
    html += '</div>';
    $('#message').html(html);
    $('#message').focus();
}