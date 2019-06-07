var idUsuario;

$(document).ready(function() {
    option = 'usuarios';
    route = '/usuarios';
    fillRoles();
});


/***************Eventos ***************/
$('.editar').click(function() {
    idUsuario = $(this).val();
    getDataByUsuario(idUsuario);
});


$('#btnAgregar').click(function(e) {
    e.preventDefault();
    editarRol();
});

/***************Funciones ***************/

function getDataByUsuario(idUsuario) {
    $.ajax({
        url: '/usuarios/' + idUsuario,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            fillDataForm(response);
        },
        error: function(response) {
            console.log(response.responseJSON);
        }
    });
}

function fillDataForm(response) {
    $('input[name=name]').val(response.name);
    $('input[name=email]').val(response.email);
    $('input[name=created_at]').val(response.created_at);

    //$('select[name=idRol]').find(':selected').attr('selected', 'false');
    $('select option[value="' + response.idRol + '"]').attr('selected', 'true');
}

function getDataForm() {
    var data = {
        'idRol': $('select[name=idRol]').val()
    };
    return JSON.stringify(data);
}

function fillRoles() {
    $.ajax({
        url: '/roles',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            fillRolesSelect(response);
            //console.log(response);
        },
        error: function(response) {
            //console.log(response.responseJSON);
        }
    });
}

function fillRolesSelect(response) {
    var html = '';
    response.forEach(function(item, index) {
        html += '<option value="' + item.idRol + '">' + item.rol + '</option>';
    });
    $('select[name=idRol]').html(html);
}

function editarRol() {
    var data = getDataForm();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/usuarios/' + idUsuario,
        type: 'PUT',
        contentType: 'application/json',
        dataType: 'json',
        data: data,
        success: function(response) {
            showMessages(response);
            getTableUsuarios(route, page);
            //console.log(response);
        },
        error: function(response) {
            showMessages(response);
            console.log(response.responseJSON);
        }
    });
    $('#modalUsuario').modal('hide');
}