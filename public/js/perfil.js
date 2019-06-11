var idUsuario;
var isInsert = false;
$(document).ready(function() {
    idUsuario = $('input[name=idUsuario]').val();
    fillEstados();
    fillCiudades(1);
    getClienteData();
});

/***********EVENTOS ***********/

$('#imagen').on('change', function(e) {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    addImagen(e);
});


$('#estado').change(function() {
    var idEstado = $(this).val();
    fillCiudades(idEstado);
});

/*Boton submit del modal para Insertar o actualizar*/
$('#frmCliente').submit(function(e) {
    e.preventDefault();
    let form = $('#frmCliente');
    var data = new FormData($(this)[0]);
    if (form[0].checkValidity()) {
        if (isInsert) {
            registrarCliente(data);
        } else {
            editarCliente(data);
        }
    } else {
        form.addClass('was-validated');
    }
});


/*********** Funciones ***********/
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
    $('#imgCliente').attr('src', result);
}

function getClienteData() {
    $.ajax({
        url: '/clientes/' + idUsuario,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            //console.log(response);
            isInsert = false;
            if (response.code == 200) {
                fillDataForm(response);
            }
        },
        error: function(response) {
            isInsert = true;
            //  console.log(response.responseJSON);
        }
    });
}

function fillDataForm(response) {
    $('input[name=nombre]').val(response.cliente.nombre);
    $('input[name=rfc]').val(response.cliente.RFC);
    $('input[name=email]').val(response.cliente.email);
    $('input[name=telefono]').val(response.cliente.telefono);

    //$('#estado').find(':selected').attr('selected', 'false');
    $('#estado option[value="' + response.idEstado + '"]').attr('selected', 'true');
    fillCiudades(response.idEstado, response.cliente.idCiudad);

    $('textarea[name=direccion]').val(response.cliente.direccion);
    $('input[name=url]').val(response.cliente.url);
    $('#imgCliente').attr('src', '../../imagenes/' + response.cliente.logo);
}



function fillEstados() {
    $.ajax({
        url: '/estados',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            //console.log(response);
            fillSelectEstados(response);
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function fillSelectEstados(response) {
    var html = '';
    response.forEach(function(item, index) {
        html += '<option value="' + item.idEstado + '">' + item.estado + '</option>';
    });
    $('#estado').html(html);
}

function fillCiudades(idEstado, idCiudad) {
    $.ajax({
        url: '/ciudades/' + idEstado,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            fillSelectCiudades(response);
            if (idCiudad) {
                $('#ciudad option[value="' + idCiudad + '"]').attr('selected', 'true');
            }
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function fillSelectCiudades(response) {
    var html = '';
    response.forEach(function(item, index) {
        html += '<option value="' + item.idCiudad + '">' + item.ciudad + '</option>';
    });
    $('#ciudad').html(html);
}

function registrarCliente(data) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/clientes',
        type: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: data,
        success: function(response) {
            //console.log(response);
            showMessages(response);
        },
        error: function(response) {
            //console.log(response);
            showMessages(response);
        }
    });
}

function editarCliente(data) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/clientes/' + idUsuario,
        type: 'POST',
        dataType: 'json',
        contentType: false,
        processData: false,
        data: data,
        success: function(response) {
            console.log(response);
            showMessages(response);
        },
        error: function(response) {
            console.log(response);
            showMessages(response);
        }
    });
}

function showMessages(response) {
    html = '<div class="alert alert-' + response.estatus + ' col-12 alert-dismissable">';
    html += '<button type="button" class="close" data-dismiss="alert">&times;</button>' + response.message;
    html += '</div>';
    $('#messageCliente').html(html);
    $('#messageCliente').focus();
}