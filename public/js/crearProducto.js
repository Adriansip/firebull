var idProducto;
var isInsert = true;

$(document).ready(function() {
    option = 'productos';
    route = '/productos/crear'
});

function asignarTitulos() {
    if (isInsert) {
        $('#tituloModalProducto').text('Nuevo producto');
        $('#btnAgregar').text('Agregar');
    } else {
        $('#tituloModalProducto').text('Editar producto: ' + idProducto);
        $('#btnAgregar').text('Actualizar');
    }
}

$('#btnNuevo').click(function() {
    fillCategorias();
    isInsert = true;
    $('#frmProductos')[0].reset();
});

/*Boton editar de la tabla*/
$('.editar').click(function() {
    fillCategorias();
    isInsert = false;
    idProducto = $(this).val();
    asignarTitulos();
    getDataByProducto(idProducto);
});

/*Boton agregar del modal
$('#btnAgregar').click(function(e) {
    //e.preventDefault();
    let form = $('#frmProductos');
    if (form[0].checkValidity()) {
        if (isInsert) {
            insertarProducto();
        } else {
            actualizarProducto();
        }
    } else {
        form.addClass('was-validated');
    }
});*/

/*Obtener la informacion del producto*/
function getDataByProducto() {
    $.ajax({
        url: '/productos/id/' + idProducto,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            //console.log(response);
            fillDataForm(response);
        },
        error: function(response) {

        }
    });
}


/*Llenar el modal para editar el producto*/
function fillDataForm(data) {
    $('input[name=producto]').val(data.producto);
    $('textarea[name=descripcion]').val(data.descripcion);
    //$('#categoria').find(':selected').attr('selected', 'false');
    $('#categoria option[value="' + data.idCategoria + '"]').attr('selected', 'true');
    $('#imgProducto').attr('src', '../../imagenes/' + data.imagen);
}

$('#frmProductos').submit(function(e) {
    e.preventDefault();
    let form = $('#frmProductos');
    var data = new FormData($(this)[0]);
    if (form[0].checkValidity()) {
        if (isInsert) {
            insertarProducto(data);
        } else {
            actualizarProducto();
        }
    } else {
        form.addClass('was-validated');
    }
});



function insertarProducto(data) {
    //  var data = getDataForm();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/productos',
        type: 'POST',
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response) {
            //console.log(response);
            showMessages(response);
        },
        error: function(response) {
            console.log(response.responseJSON);
            showMessages(response.responseJSON);
        }
    });
    $('#modalProducto').modal('hide');
}


function getDataForm() {
    /*var data = {
        'producto': $('input[name=producto]').val(),
        'categoria': $('select[name=categoria]').val(),
        'descripcion': $('textarea[name=descripcion]').val(),
        'imagen': $('input[name=archivo]')
    };*/
    //return JSON.stringify(data);
    var data = new FormData($('#frmProductos')[0]);
    //console.log(data);
}

/*Llenar combo de categorias*/
function fillCategorias() {
    $.ajax({
        url: '/categorias/listar',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            fillSelectCategorias(response);
        },
        error: function(response) {

        }
    });
}


function fillSelectCategorias(response) {
    var html = "";
    if (response.length > 0) {
        response.forEach(function(item, index) {
            html += '<option value="' + item.idCategoria + '">' + item.categoria + '</option>';
        });
    } else {
        html += '<div class="invalid-feedback">No hay categorias registradas</div>';
        $('#categoria').addClass('is-invalid');
    }
    $('#categoria').html(html);
}