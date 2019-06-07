var idCotizacion;
var page;
/*comprobar si es, cotizaciones, productos, etc.
Se llena desde cada js independiente*/
var route;
var option;
$(document).on('click', '.pagination a', function(e) {
    //console.log(option);
    e.preventDefault();
    page = $(this).attr('href').split('page=')[1];
    if (option == 'cotizaciones') {
        cargarTabla(route, page);
    } else if (option == 'productos') {
        getTableProductos(route, page);
    } else if (option == 'usuarios') {
        getTableUsuarios(route, page);
    }
});


$(document).ready(function() {
    cargarTabla('/cotizaciones', 1);
    $('.footer').css('display', 'none');
});

$('#v-pills-cotizacion-tab').click(function() {
    cargarTabla('/cotizaciones', 1);
});

$('#v-pills-producto-tab').click(function() {
    getTableProductos('/productos/crear', 1);
});

$('#v-pills-usuario-tab').click(function() {
    getTableUsuarios('/usuarios', 1);
});

/*Al iniciar el panel de administracion,
es lo primero que debemos mostrar*/
function cargarTabla(route, page) {
    $.ajax({
        url: route + '?page=' + page,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#tblContainer').html(response);

            $('#tblCotizaciones').DataTable({
                "paging": false,
                "order": [
                    [4, 'asc']
                ]
            });
            //  console.log(response);
        },
        error: function(response) {
            console.log('error');
            console.log(response);
        }
    });
}

function getTableProductos(route, page) {
    $.ajax({
        url: route + '?page=' + page,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            //console.log(response);
            $('#productosContainer').html(response);
            $('#tblProductos').DataTable({
                "paging": false
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function getTableUsuarios(route, page) {
    $.ajax({
        url: route + '?page=' + page,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            //console.log(response);
            $('#usuariosContainer').html(response);
            $('#tblUsuarios').DataTable({
                "paging": false
            });
        },
        error: function(response) {
            console.log(response);
        }
    });
}

function showMessages(response) {
    html = '<div class="alert alert-' + response.estatus + ' col-12 alert-dismissable">';
    html += '<button type="button" class="close" data-dismiss="alert">&times;</button>' + response.message;
    html += '</div>';
    $('#messageHome').html(html);
    $('#messageHome').focus();
}