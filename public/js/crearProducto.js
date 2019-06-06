var idProducto;
var isInsert = true;

$(document).ready(function() {
    option = 'productos';
    route = '/productos/crear'
});

/*********************EVENTOS***********************/
$('#btnNuevo').click(function() {
    fillCategorias();
    isInsert = true;
    $('#frmProductos')[0].reset();
});

/*Boton submit del modal para Insertar o actualizar*/
$('#frmProductos').submit(function(e) {
    e.preventDefault();
    let form = $('#frmProductos');
    var data = new FormData($(this)[0]);
    if (form[0].checkValidity()) {
        if (isInsert) {
            insertarProducto(data);
        } else {
            actualizarProducto(data);
        }
    } else {
        form.addClass('was-validated');
    }
});

/*Boton editar de la tabla*/
$('.editar').click(function() {
    fillCategorias();
    isInsert = false;
    idProducto = $(this).val();
    //Titulos del modal y boton
    asignarTitulos();
    //Llenar el modal con los datos del registro
    getDataByProducto(idProducto);
});

$('.eliminar').click(function() {
    idProducto = $(this).val();
    if (confirm("Confirmar eliminacion")) {
        eliminarProducto(idProducto);
    }
});

$('#imagen').on('change', function(e) {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    addImagen(e);
});


/**************FUNCIONES************/

/*Obtener imagen*/
function addImagen(e) {
    var file = e.target.files[0],
        imageType = /image.*/;

    if (!file.type.match(imageType))
        return;

    var reader = new FileReader();
    reader.onload = fileOnload;
    reader.readAsDataURL(file);
}

function fileOnload(e) {
    var result = e.target.result;
    $('#imgProducto').attr('src', result);
}


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
            //console.log(response);
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

/*Funcion para insertar*/
function insertarProducto(data) {
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
            getTableProductos(route, page);
        },
        error: function(response) {
            //console.log(response.responseJSON);
            showMessages(response.responseJSON);
        }
    });
    $('#modalProducto').modal('hide');
}

function actualizarProducto(data) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/productos/' + idProducto,
        type: 'POST',
        data: data,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(response) {
            showMessages(response);
            //console.log(response);
            getTableProductos(route, page);
        },
        error: function(response) {
            console.log(response.responseJSON);
        }
    });
    $('#modalProducto').modal('hide');
}

function eliminarProducto(idProducto) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/productos/' + idProducto,
        type: 'DELETE',
        dataType: 'json',
        success: function(response) {
            console.log(response);
            showMessages(response);
            getTableProductos(route, page);
        },
        error: function(response) {
            console.log(response);
        }
    });
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

//Llenar el select con la data de la llamada AJAX
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

/*Funcion para cambiar los titulos del modal y del boton del modal*/
function asignarTitulos() {
    if (isInsert) {
        $('#tituloModalProducto').text('Nuevo producto');
        $('#btnAgregar').text('Agregar');
    } else {
        $('#tituloModalProducto').text('Editar producto: ' + idProducto);
        $('#btnAgregar').text('Actualizar');
    }
}